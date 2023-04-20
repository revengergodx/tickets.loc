<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentMainController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('agent.main.index');
    }
}
