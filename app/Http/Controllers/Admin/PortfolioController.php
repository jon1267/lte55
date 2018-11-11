<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Portfolio;
use Image;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Раздел Portfolio';
        $portfolios = Portfolio::get();

        $template = 'admin.portfolios.portfolios_content';

        return view('admin.generic', [
            'title' => $title,
            'portfolios' => $portfolios,
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
        $title = 'Добавление элемента Portfolio';
        $template = 'admin.portfolios.portfolios_create_content';

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

        if(Portfolio::create($data)) {
            return redirect()->route('portfolios.index')
                ->with(['status' => 'Данные успешно добавлен']);
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
                $img->save(public_path().'/'.'mhost/img/works/'.$filename);//$img->fit(800,400)->save()...


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
        $portfolio = Portfolio::where('id',$id)->first();
        $title = 'Редактирование элемента Portfolio';
        $template = 'admin.portfolios.portfolios_create_content';

        return view('admin.generic', [
            'portfolio' => $portfolio,
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
        $portfolio = Portfolio::where('id', $id)->first();

        $messages = [
            'required' => "Нужно обязательно заполнить поле :attribute"
        ];
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ], $messages);

        $data = $this->getData($request); //Intervention/Image

        if($portfolio->update($data)) {
            return redirect()->route('portfolios.index')
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
        $portfolio = Portfolio::where('id', $id)->first();

        // удаляем изображение удаляемой записи...
        $imageDeleted = ' Изображение удалено.';
        try {
            unlink(public_path().'/'.'mhost/img/works/'.$portfolio->img);
        }
        catch (\Exception $e) {
            $imageDeleted = ' Изображение не удалено...';
        }

        if($portfolio->delete()) {
            return redirect()->route('portfolios.index')
                ->with(['status' => 'Материал был успешно удален.'.$imageDeleted]);
        }

        return redirect()->route('portfolios.index')
            ->with(['error' => 'Ошибка удаления данных']);
    }
}
