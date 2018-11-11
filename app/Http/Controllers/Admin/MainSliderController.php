<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mslider;

class MainSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Слайдер главной страницы';
        $msliders = Mslider::get();

        $template = 'admin.sliders.msliders_content';

        return view('admin.generic', [
            'title' => $title,
            'msliders' => $msliders,
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
        $title = 'Создание материала слайдера';
        $template = 'admin.sliders.msliders_create_content';

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
            'max' => "Длина фразы слайдера не более 100 символов",
            //'numeric' => 'Цена должна быть числом',
        ];
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required|max:100',
            'p1' => 'required',
            'p2' => 'required',
            'p3' => 'required',
            'p4' => 'required',
            'price' => 'decimal',
        ],$messages);

        $data = $request->all();
        $data['img'] = ''; // костыль:) выбор изображения тут (см FeaturesController)

        if(Mslider::create($data)) {
            return redirect()->route('msliders.index')
                ->with(['status' => 'Тарифный план успешно добавлен']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка добавления тарифного плана']);
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
        $mslider = Mslider::where('id',$id)->first();
        $title = 'Редактирование информации слайдера';
        $template = 'admin.sliders.msliders_create_content';

        return view('admin.generic', [
            'mslider' => $mslider,
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
        $mslider = Mslider::where('id', $id)->first();

        $messages = [
            'required' => "Нужно обязательно заполнить поле :attribute",
            'numeric' => "Цена должна быть числом",
            //'numeric' => 'Цена должна быть числом',
        ];
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required|max:100',
            'p1' => 'required',
            'p2' => 'required',
            'p3' => 'required',
            'p4' => 'required',
            'price' => 'numeric',
        ],$messages);

        $data = $request->all();
        //$data['img'] = ''; // костыль:) выбор изображения тут (см FeaturesController)

        if($mslider->update($data)) {
            return redirect()->route('msliders.index')
                ->with(['status' => 'Тарифный план успешно добавлен']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка добавления тарифного плана']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mslider = Mslider::where('id',$id)->first();

        if(empty($mslider)) return ['error' => 'Ошибка удаления данных.'];

        if($mslider->delete()) {
            return redirect()->route('msliders.index')
                ->with(['status' => 'Данные успешно удалены']);
        }

        return redirect()->route('msliders.index')
            ->with(['error' => 'Ошибка удаления данных.']);
    }
}
