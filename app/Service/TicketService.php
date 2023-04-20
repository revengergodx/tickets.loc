<?php

namespace App\Service;

use App\Http\Requests\User\Ticket\StoreRequest;
use App\Models\TicketImage;

class TicketService
{
    public function store($ticket, $request)
    {
        $ticket->category()->attach($request['category_ids']);
        $ticket->label()->attach($request['label_ids']);
        if ($request->hasFile('images')){
            $files = $request->file('images');
            foreach ($files as $file){
                $imageName = $file->hashName();
                $request['ticket_id'] = $ticket->id;
                $request['image'] = $imageName;
                $file->move(\public_path('/images'), $imageName);
                TicketImage::create($request->all());
            }
        }
    }

    public function update($ticket, $request)
    {
        $ticket->category()->sync($request['category_ids']);
        $ticket->label()->sync($request['label_ids']);
        if ($request->hasFile('images')){
            $files = $request->file('images');
            foreach ($files as $file){
                $imageName = $file->hashName();
                $request['ticket_id'] = $ticket->id;
                $request['image'] = $imageName;
                $file->move(\public_path('/images'), $imageName);
                TicketImage::create($request->all());
            }
        }
    }
}
