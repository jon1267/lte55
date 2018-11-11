<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feature;
use Image;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Раздел Features';
        $features = Feature::get();

        $template = 'admin.features.features_content';

        return view('admin.generic', [
            'title' => $title,
            'features' => $features,
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
        $title = 'Создание материала раздела Features';
        $template = 'admin.features.features_create_content';

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
            'required' => "Нужно обязательно заполнить поле :attribute",
            'max' => "Длина заголовков не более 100 символов"
        ];
        $this->validate($request, [
            'title' => 'required|max:100',
            'blue' => 'required|max:100',
            'text' => 'required'
        ],$messages);

        $data = $this->getData($request); //Intervention/Image

        if(Feature::create($data)) {
            return redirect()->route('features.index')
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
                //$img->fit(64,64)->save(public_path().'/'.'mhost/img/icons_features/'.$filename);
                $img->save(public_path().'/'.'mhost/img/icons_features/'.$filename);


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
        $feature = Feature::where('id',$id)->first();
        $title = 'Редактирование раздела Features';
        $template = 'admin.Features.Features_create_content';

        return view('admin.generic', [
            'feature' => $feature,
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
        $feature = Feature::where('id', $id)->first();

        $messages = [
            'required' => "Нужно обязательно заполнить поле :attribute",
            'max' => "Длина заголовков не более 100 символов"
        ];
        $this->validate($request, [
            'title' => 'required|max:100',
            'blue' => 'required|max:100',
            'text' => 'required'
        ],$messages);

        $data = $this->getData($request); //Intervention/Image

        if($feature->update($data)) {
            return redirect()->route('features.index')
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
        $feature = Feature::where('id', $id)->first();

        // удаляем изображение удаляемой записи...
        // если файла нет unlink() кидает error, что будет на убунду хз ???
        $imageDeleted = ' Изображение удалено.';
        try {
            unlink(public_path().'/'.'mhost/img/icons_features/'.$feature->img);
        }
        catch (\Exception $e) {
            $imageDeleted = ' Изображение не удалено...';
        }

        if($feature->delete()) {
            return redirect()->route('features.index')
                ->with(['status' => 'Материал был успешно удален.'. $imageDeleted]);
        }

        return redirect()->route('feature.index')
            ->with(['error' => 'Ошибка удаления данных']);
    }
}
