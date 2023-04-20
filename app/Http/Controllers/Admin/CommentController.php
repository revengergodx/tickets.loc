<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Ticket\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Ticket;
use App\Models\User;

class CommentController extends BaseController
{
    public function __invoke(Ticket $ticket, StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['ticket_id'] = $ticket->id;
        Comment::create($data);
        if (auth()->user()->role == User::ROLE_ADMIN) {
            return redirect()->route('admin.ticket.show', $ticket->id);
        } elseif (auth()->user()->role == User::ROLE_AGENT) {
            return redirect()->route('agent.ticket.show', $ticket->id);
        } else {
            return redirect()->route('user.ticket.show', $ticket->id);
        }
    }
}
