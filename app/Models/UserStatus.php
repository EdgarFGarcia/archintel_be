<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;

    /**
     * table
     */
    protected $table = "user_statuses";

    /**
     * fillable
     */
    protected $fillable = [
        'name'
    ];
}
