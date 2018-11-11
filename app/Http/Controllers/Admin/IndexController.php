<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {

        $title = 'Уапрвление сайтом';
        return view('admin.index')->with('title', $title);
    }
}
