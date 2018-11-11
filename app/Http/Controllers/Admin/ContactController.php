<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Image;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Менеджер раздела Контакты';
        $contacts = Contact::get();

        $template = 'admin.contact.contact_content';

        return view('admin.generic', [
            'title' => $title,
            'contacts' => $contacts,
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
        $title = 'Добавление данных в раздел Контакты';
        $template = 'admin.contact.contact_create_content';

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
            'max' => "Длина поля :attribute не более 100 символов",
        ];
        $this->validate($request, [
            'title' => 'required|max:100',
            'p1' => 'required|max:100',
            'p2' => 'required|max:100',
            'p3' => 'required|max:100',
            'description' => 'required'
        ],$messages);

        $data = $this->getData($request); //Intervention/Image

        if(Contact::create($data)) {
            return redirect()->route('contacts.index')
                ->with(['status' => 'Контакт успешно добавлен']);
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
                //$img->fit(590,390)->save(public_path().'/'.'mhost/img/locations/'.$filename);
                $img->save(public_path().'/'.'mhost/img/locations/'.$filename);

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
        $contact = Contact::where('id',$id)->first();
        $title = 'Редактирование данных раздела Контакты';
        $template = 'admin.contact.contact_create_content';

        return view('admin.generic', [
            'contact' => $contact,
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
        $contact = Contact::where('id',$id)->first();

        $messages = [
            'required' => "Нужно обязательно заполнить поле :attribute",
            'max' => "Длина поля :attribute не более 100 символов",
        ];
        $this->validate($request, [
            'title' => 'required|max:100',
            'p1' => 'required|max:100',
            'p2' => 'required|max:100',
            'p3' => 'required|max:100',
            'description' => 'required'
        ],$messages);

        $data = $this->getData($request); //Intervention/Image

        if($contact->update($data)) {
            return redirect()->route('contacts.index')
                ->with(['status' => 'Данные контакта успешно изменены.']);
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
        $contact = Contact::where('id', $id)->first();

        // удаляем изображение удаляемой записи...
        $imageDeleted = ' Изображение удалено.';
        try {
            unlink(public_path().'/'.'mhost/img/locations/'.$contact->img);
        }
        catch (\Exception $e) {
            $imageDeleted = ' Изображение не удалено...';
        }

        if($contact->delete()) {
            return redirect()->route('contacts.index')
                ->with(['status' => 'Контакт был успешно удален.'.$imageDeleted]);
        }

        return redirect()->route('contacts.index')
            ->with(['error' => 'Ошибка удаления данных']);
    }
}
