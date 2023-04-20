<?php

namespace App\Http\Controllers;

use App\Service\TicketService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function __construct(TicketService $service)
    {
        $this->service = $service;
    }
}
