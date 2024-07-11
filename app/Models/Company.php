<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * table
     */
    protected $table = "companies";

    /**
     * fillable
     */
    protected $fillable = [
        'logo',
        'name',
        'company_status_id'
    ];

    /**
     * cast
     */
    protected $casts = [
        'created_at'    => 'datetime:M d, Y h:i a'
    ];

    public function getStatus() : HasOne{
        return $this->hasOne(CompanyStatus::class, 'id', 'company_status_id');
    }
}
