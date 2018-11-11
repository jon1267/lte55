<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seo_page;

class SeopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Менеджер SEO данных';

        $seops = Seo_page::paginate(3); //$seops = Seo_page::get();

        $template = 'admin.seo.seo_content';

        return view('admin.generic', [
            'title' => $title,
            'seops' => $seops,
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
        $title = 'Создание SEO записи';
        $template = 'admin.seo.seo_create_content';

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
            'page' => 'required',
            'slug' => 'required',
            'title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required'
        ],$messages);

        $data = $request->all();

        if(Seo_page::create($data)) {
            return redirect()->route('seops.index')
                ->with(['status' => 'SEO данные успешно добавлены']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка добавления SEO данных']);
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
        $seop = Seo_page::where('id',$id)->first();
        $title = 'Редактирование SEO данных';
        $template = 'admin.seo.seo_create_content';

        return view('admin.generic', [
            'seop' => $seop,
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
        $seop = Seo_page::where('id', $id)->first();

        $messages = [
            'required' => "Нужно обязательно заполнить поле :attribute",
        ];
        $this->validate($request, [
            'page' => 'required',
            'slug' => 'required',
            'title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required'
        ],$messages);

        $data = $request->all();

        if($seop->update($data)) {
            return redirect()->route('seops.index')
                ->with(['status' => 'SEO данные успешно изменены']);
        }

        $request->flash();
        return redirect()->back()
            ->with(['error' => 'Ошибка сохранения SEO данных']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seop = Seo_page::where('id', $id)->first();

        if(empty($seop)) return ['error' => 'Ошибка удаления данных.'];

        if($seop->delete()) {
            return redirect()->route('seops.index')
                ->with(['status' => 'Данные успешно удалены']);
        }

        return redirect()->route('seops.index')
            ->with(['error' => 'Ошибка удаления данных.']);
    }
}
