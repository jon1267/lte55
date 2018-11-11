<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sslider;
use Image;

class SecondSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Слайдер страницы Home1';
        $ssliders = Sslider::get();

        $template = 'admin.sliders.ssliders_content';

        return view('admin.generic', [
            'title' => $title,
            'ssliders' => $ssliders,
            'template' => $template
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Создание данных для слайдера страницы Home1';
        $template = 'admin.sliders.ssliders_create_content';

        return view('admin.generic', [
            'title' => $title,
            'template' => $template
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => "Нужно обязательно заполнить поле :attribute"
        ];
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ], $messages);

        $data = $this->getData($request); //Intervention/Image

        if(Sslider::create($data)) {
            return redirect()->route('ssliders.index')
                ->with(['status' => 'Данные успешно добавлены']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка добавления данных']);
    }

    public function getData($request) {

        //$data = $request->except('_token', 'img');// for save old value
        $data = $request->except('_token');

        if(empty($data)) {
            return ['error' => 'Нет данных.'];
        }

        // обрабатываем изображение
        if($request->hasFile('img')) {
            $image = $request->file('img');
            if($image->isValid()) {
                //dd($image);
                $filename = str_random(8).'.jpg';

                $img = Image::make($image);
                //$img->fit(800,400)->save(public_path().'/'.'mhost/img/servers/'.$filename);
                $img->save(public_path().'/'.'mhost/img/servers/'.$filename);

                $data['img'] = $filename;
            }
        }

        // mysql error, if add new & not choice pic - insert '' (not null)
        if($request->method() == 'POST') {
            $data['img'] = (!empty($data['img'])) ? $data['img'] : '' ;
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sslider = Sslider::where('id',$id)->first();
        $title = 'Редактирование слайдера страницы Home1';
        $template = 'admin.sliders.ssliders_create_content';

        return view('admin.generic', [
            'sslider' => $sslider,
            'title' => $title,
            'template' => $template
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sslider = Sslider::where('id', $id)->first();

        $messages = [
            'required' => "Нужно обязательно заполнить поле :attribute"
        ];
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ], $messages);

        $data = $this->getData($request); //Intervention/Image

        if($sslider->update($data)) {
            return redirect()->route('ssliders.index')
                ->with(['status' => 'Материал успешно изменен']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка сохранения материала']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sslider = Sslider::where('id', $id)->first();

        if(empty($sslider)) return ['error' => 'Ошибка удаления данных.'];

        // удаляем изображение удаляемой записи...
        $imageDeleted = ' Изображение удалено.';
        try {
            unlink(public_path().'/'.'mhost/img/servers/'.$sslider->img);
        }
        catch (\Exception $e) {
            $imageDeleted = ' Изображение не удалено...';
        }

        if($sslider->delete()) {
            return redirect()->route('ssliders.index')
                ->with(['status' => 'Материал был успешно удален.'.$imageDeleted]);
        }

        return redirect()->route('ssliders.index')
            ->with(['error' => 'Ошибка удаления данных']);
    }
}
