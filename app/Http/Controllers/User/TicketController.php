<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\User\Ticket\StoreRequest;
use App\Models\Category;
use App\Models\Label;
use App\Models\Priority;
use App\Models\Ticket;
use App\Models\TicketImage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class TicketController extends BaseController
{
    public function index()
    {
        $tickets = Ticket::where('user_id', '=', auth()->user()->id)->get();
        return view('user.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $categories = Category::all();
        $labels = Label::all();
        $priorities = Priority::all();
        $agents = User::where('role', '=', '1')->get()->toArray();
        $agent = Arr::random($agents);
        return view('user.tickets.create', compact('categories', 'labels', 'agent', 'priorities'));
    }

    public function store(StoreRequest $request)
    {
        $ticket = auth()->user()->tickets()->create($request->only('title', 'message', 'status', 'priority_id', 'agent_id'));
        $this->service->store($ticket, $request);

        return redirect()->route('user.ticket.index');
    }

    public function show(Ticket $ticket)
    {
        return view('user.tickets.show', compact('ticket'));
    }
}
