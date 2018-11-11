<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accordion;

class AccordionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Менеджер раздела Аккордеон';
        $accordions = Accordion::get();

        $template = 'admin.accordions.accordions_content';

        return view('admin.generic', [
            'title' => $title,
            'accordions' => $accordions,
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
        $title = 'Добавить данные в раздел Аккордеон';
        $template = 'admin.accordions.accordions_create_content';

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
            'name' => 'required',
            'title' => 'required',
            'text' => 'required'
        ], $messages);

        $data = $request->all();

        if(Accordion::create($data)) {
            return redirect()->route('accordions.index')
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
        $accordion = Accordion::where('id',$id)->first();
        $title = 'Редактирование данных в разделе Аккордеон';
        $template = 'admin.accordions.accordions_create_content';

        return view('admin.generic', [
            'accordion' => $accordion,
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
        $accordion = Accordion::where('id',$id)->first();

        $ru_mess = [
            'required' => "Нужно заполнить поле :attribute."
        ];
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'text' => 'required'
        ], $ru_mess);

        $data = $request->all();

        if($accordion->update($data)) {
            return redirect()->route('accordions.index')
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
        $accordion = Accordion::where('id', $id)->first();

        if($accordion->delete()) {
            return redirect()->route('accordions.index')
                ->with(['status' => 'Материал был успешно удален']);
        }

        return redirect()->route('accordions.index')
            ->with(['error' => 'Ошибка удаления данных']);
    }
}
