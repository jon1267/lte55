<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Promotion;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Менеджер раздела Promotions';
        $promotions = Promotion::get();

        $template = 'admin.promotions.promotions_content';

        return view('admin.generic', [
            'title' => $title,
            'promotions' => $promotions,
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
        $title = 'Создание материала раздела Promotions';
        $template = 'admin.promotions.promotions_create_content';

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
        ];
        $this->validate($request, [
            'title' => 'required',
            'p1' => 'required',
            't1' => 'required',
            'p2' => 'required',
            't2' => 'required',
            'p3' => 'required',
            't3' => 'required',
        ], $messages);

        if(Promotion::create($request->all())) {
            return redirect()->route('promotions.index')
                ->with(['status' => 'Запись в раздел promotions добавлена']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка добавления в раздел promotions']);
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
        $promotion = Promotion::where('id',$id)->first();
        $title = 'Редактирование информации раздела promotions';
        $template = 'admin.promotions.promotions_create_content';

        return view('admin.generic', [
            'promotion' => $promotion,
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
        $promotion = Promotion::where('id',$id)->first();

        $messages = [
            'required' => "Нужно обязательно заполнить поле :attribute",
        ];
        $this->validate($request, [
            'title' => 'required',
            'p1' => 'required',
            't1' => 'required',
            'p2' => 'required',
            't2' => 'required',
            'p3' => 'required',
            't3' => 'required',
        ], $messages);

        $data = $request->all();

        if($promotion->update($data)) {
            return redirect()->route('promotions.index')
                ->with(['status' => 'Данные в разделе Promotions изменены']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка сохранения в раздел Promotions']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::where('id',$id)->first();

        if(empty($promotion)) return ['error' => 'Ошибка удаления данных.'];

        if($promotion->delete()) {
            return redirect()->route('promotions.index')
                ->with(['status' => 'Данные успешно удалены']);
        }

        return redirect()->route('promotions.index')
            ->with(['error' => 'Ошибка удаления данных.']);
    }
}
