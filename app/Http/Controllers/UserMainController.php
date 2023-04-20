<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMainController extends BaseController
{
    public function __invoke(Request $request)
    {
        return view('user.main.index');
    }
}
