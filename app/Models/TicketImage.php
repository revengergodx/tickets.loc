<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketImage extends Model
{
    use HasFactory;

    protected $table = 'ticket_images';
    protected $fillable = [
        'image',
        'ticket_id'
    ];
    protected $guarded = false;

    public function tickets(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
