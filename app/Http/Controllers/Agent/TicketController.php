<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Agent\Ticket\StoreRequest;
use App\Http\Requests\Agent\Ticket\UpdateRequest;
use App\Models\Category;
use App\Models\Label;
use App\Models\Priority;
use App\Models\Ticket;
use App\Models\TicketImage;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class TicketController extends BaseController
{
    public function index()
    {
        $tickets = Ticket::where('agent_id', '=', auth()->user()->id)->get();
        return view('agent.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $categories = Category::all();
        $labels = Label::all();
        $priorities = Priority::all();
        $agents = User::where('role', '=', '1')->get()->toArray();
        $agent = Arr::random($agents);
        return view('agent.tickets.create', compact('categories', 'labels', 'agent', 'priorities'));
    }

    public function store(StoreRequest $request)
    {
        $ticket = auth()->user()->tickets()->create($request->only('title', 'message', 'status', 'priority_id', 'agent_id'));
        $this->service->store($ticket, $request);

        return redirect()->route('agent.ticket.index');
    }

    public function show(Ticket $ticket)
    {
        return view('agent.tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $categories = Category::all();
        $labels = Label::all();
        $priorities = Priority::all();
        $agents = User::all()->where('role', '=', '1');
        return view('agent.tickets.edit', compact('categories', 'labels', 'agents', 'ticket', 'priorities'));
    }

    public function update(UpdateRequest $request, Ticket $ticket)
    {
        $ticket->update($request->only('title', 'message', 'status', 'priority_id', 'assigned_to'));
        $this->service->update($ticket, $request);
        return redirect()->route('agent.ticket.index');
    }

    public function delete(Ticket $ticket)
    {
        $ticket->delete();
        return back();
    }

    public function delete_image($id)
    {
        $images = TicketImage::findOrFail($id);
        if (File::exists('images/' . $images->image)) {
            File::delete('images/' . $images->image);
        }
        TicketImage::find($id)->delete();
        return back();
    }

}
