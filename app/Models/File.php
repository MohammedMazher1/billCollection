<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'type',
        'user_id',
        'download_status'
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
