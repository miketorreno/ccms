<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Court extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'state',
        'zip_code',
        'judge_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'judge_id');
    }
}
