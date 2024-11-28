<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        "title",
        "description",
        "due_date",
        "completion_date",
        "status",
        "priority",
        "assigned_to",
        "created_by"
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by");
    }


    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, "assigned_to");
    }

    public function getStatus():BelongsTo{
        return $this->belongsTo(TaskStatus::class, "status");
    }
}
