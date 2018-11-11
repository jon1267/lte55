<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gray;

class GrayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Раздел дополнительная информация';
        $grays = Gray::get();

        $template = 'admin.grays.grays_content';

        return view('admin.generic', [
            'title' => $title,
            'grays' => $grays,
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
        $title = 'Добавление дополнительной информации';
        $template = 'admin.grays.grays_create_content';

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
            'text' => 'required'
        ], $messages);

        $data = $request->all();

        if(Gray::create($data)) {
            return redirect()->route('grays.index')
                ->with(['status' => 'Материал успешно добавлен']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка добавления материала']);
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
        $gray = Gray::where('id',$id)->first();
        $title = 'Редактирование дополнительной информации';
        $template = 'admin.grays.grays_create_content';

        return view('admin.generic', [
            'gray' => $gray,
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
        $gray = Gray::where('id',$id)->first();

        $ru_mess = [
            'required' => "Нужно заполнить поле :attribute."
        ];
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ], $ru_mess);

        $data = $request->all();

        if($gray->update($data)) {
            return redirect()->route('grays.index')
                ->with(['status' => 'Данные успешно сохранены']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка сохранения данных']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gray = Gray::where('id', $id)->first();

        if($gray->delete()) {
            return redirect()->route('grays.index')
                ->with(['status' => 'Материал был успешно удален']);
        }

        return redirect()->route('grays.index')
            ->with(['error' => 'Ошибка удаления данных']);
    }
}
