<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Менеджер пользователей';
        $users = User::get();

        $template = 'admin.users.users_content';

        return view('admin.generic', [
            'title' => $title,
            'users' => $users,
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
        $title = 'Добавление нового пользователя';
        $template = 'admin.users.users_create_content';

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
        $ru_mess = [
            'required' => "Нужно заполнить поле :attribute.",
            'unique' => "Поле :attribute уже используется.",
            'email' => "Поле :attribute должно содержать корректный электронный адрес.",
            'between' => "Поле :attribute должно содержать от 6 до 26 символов.",
            'confirmed' => "Пароли не совпадают"
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|between:6,25|confirmed'
        ], $ru_mess);

        $data = $request->except('_token', 'password_confirmation');
        $data['password'] = bcrypt($data['password']);

        try {
            User::create($data);
        } catch(\Exception $e) {
            $request->flash();
            return redirect()->route('users.index')
                ->with(['error' => 'Ошибка добавления пользователя']);
        }

        return redirect()->route('users.index')
            ->with(['status' => 'Пользователь успешно добавлен']);
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
        $user = User::where('id',$id)->first();
        $title = 'Редактирование данных пользователя';
        $template = 'admin.users.users_create_content';

        return view('admin.generic', [
            'user' => $user,
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
        $user = User::where('id',$id)->first();
        //dd($request, $user, $id);

        $ru_mess = [
            'required' => "Нужно заполнить поле :attribute.",
            'unique' => "Поле :attribute уже используется.",
            'email' => "Поле :attribute должно содержать корректный электронный адрес.",
            'between' => "Поле :attribute должно содержать от 6 до 26 символов.",
            'confirmed' => "Пароли не совпадают"
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id ,
            'password' => 'nullable|between:6,25|confirmed'
        ], $ru_mess);

        $data = $request->except('_token', '_method' ,'password_confirmation');

        if(isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }

        /*try {
            $user->update($data);

        } catch(\Exception $e) {
            $request->flash();
            return redirect()->route('users.index')
                ->with(['error' => 'Ошибка измения пользователя']);
        }

        return redirect()->route('users.index')
            ->with(['status' => 'Пользователь успешно изменен']);*/
        // код выше рабочий ...

        if($user->update($data)) {
            return redirect()->route('users.index')
                ->with(['status' => 'Данные пользователя изменены']);
        }

        return redirect()->route('users.index')
            ->with(['error' => 'Ошибка сохранения данных пользователя']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id)->first();

        if($user->delete()) {
            return redirect()->route('users.index')
                ->with(['status' => 'Данные пльзователя удалены']);
        }

        return redirect()->route('users.index')
            ->with(['error' => 'Ошибка удаления данных.']);
    }
}
