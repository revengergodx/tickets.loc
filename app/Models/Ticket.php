<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $guarded = false;


    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'ticket_categories', 'ticket_id', 'category_id');
    }

    public function label(): BelongsToMany
    {
        return $this->belongsToMany(Label::class, 'ticket_labels', 'ticket_id', 'label_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(TicketImage::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class, 'priority_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'ticket_id', 'id');
    }
}
