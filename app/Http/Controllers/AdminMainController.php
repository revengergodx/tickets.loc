<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMainController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.main.index');
    }
}
