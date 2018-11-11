<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home;
use Image;

class HomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Раздел - статья на странице Home2';
        $homes = Home::get();

        $template = 'admin.homes.homes_content';

        return view('admin.generic', [
            'title' => $title,
            'homes' => $homes,
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
        $title = 'Добавить статью на странице Home2';
        $template = 'admin.homes.homes_create_content';

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
            'text' => 'required'
        ], $messages);

        $data = $this->getData($request); //Intervention/Image

        if(Home::create($data)) {
            return redirect()->route('homes.index')
                ->with(['status' => 'Материал успешно добавлен']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка добавления материала']);
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
//                $img->fit(800,400)->save(public_path().'/'.'mhost/img/servers/'.$filename);
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
        $home = Home::where('id',$id)->first();
        $title = 'Редактирование статьи на странице Home2';
        $template = 'admin.homes.homes_create_content';

        return view('admin.generic', [
            'home' => $home,
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
        $home = Home::where('id',$id)->first();

        $ru_mess = [
            'required' => "Нужно заполнить поле :attribute."
        ];
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'text' => 'required'
        ], $ru_mess);

        $data = $this->getData($request); //Intervention/Image

        if($home->update($data)) {
            return redirect()->route('homes.index')
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
        $home = Home::where('id', $id)->first();

        //if(empty($home)) return ['error' => 'Ошибка удаления данных.'];
        //на винде это срабатывает подыбильному - json вывод, русский текст не читаем

        // удаляем изображение удаляемой записи...
        $imageDeleted = ' Изображение удалено.';
        try {
            unlink(public_path().'/'.'mhost/img/servers/'.$home->img);
        }
        catch (\Exception $e) {
            $imageDeleted = ' Изображение не удалено...';
        }

        if($home->delete()) {
            return redirect()->route('homes.index')
                ->with(['status' => 'Материал был успешно удален.'.$imageDeleted]);
        }

        return redirect()->route('homes.index')
            ->with(['error' => 'Ошибка удаления данных']);
    }
}
