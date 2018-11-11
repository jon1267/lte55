<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Price;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Менеджер тарифных планов';
        $prices = Price::get();

        $template = 'admin.prices.prices_content';

        return view('admin.generic', [
            'title' => $title,
            'prices' => $prices,
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
        $title = 'Создание тарифного плана';
        $template = 'admin.prices.prices_create_content';

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
            'between' => "Поле :attribute должно содержать не более 10 символов.",
            'max' => "Длина заголовка не более 100 символов"
        ];
        $this->validate($request, [
            'title' => 'required|max:100',
            'price' => 'required|numeric',
            'mo' => 'required|between:1,10',
            'hdd' => 'required',
            'bandwidth' => 'required',
            'ram' => 'required',
        ],$messages);

        if(Price::create($request->all())) {
            return redirect()->route('prices.index')
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
        $price = Price::where('id',$id)->first();
        $title = 'Редактирование тарифного плана';
        $template = 'admin.prices.prices_create_content';

        return view('admin.generic', [
            'price' => $price,
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
        $price = Price::where('id',$id)->first();

        $messages = [
            'required' => "Нужно обязательно заполнить поле :attribute",
            'between' => "Поле :attribute должно содержать не более 10 символов.",
            'max' => "Длина заголовка не более 100 символов"
        ];
        $this->validate($request, [
            'title' => 'required|max:100',
            'price' => 'required|numeric',
            'mo' => 'required|between:1,10',
            'hdd' => 'required',
            'bandwidth' => 'required',
            'ram' => 'required',
        ],$messages);

        $data = $request->all();

        if($price->update($data)) {
            return redirect()->route('prices.index')
                ->with(['status' => 'Тарифный план успешно изменен']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка сохранения тарифного плана']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Price::where('id',$id)->first();

        if(empty($price)) return ['error' => 'Ошибка удаления данных.'];

        if($price->delete()) {
            return redirect()->route('prices.index')
                ->with(['status' => 'Данные успешно удалены']);
        }

        return redirect()->route('prices.index')
            ->with(['error' => 'Ошибка удаления данных.']);
    }
}
