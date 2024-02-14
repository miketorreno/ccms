<?php

namespace App\Models;

use App\Models\CourtCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Party extends Model
{
    use HasFactory;

    protected $fillable = [
        'court_case_id',
        'name',
        'address',
        'phone_number',
        // 'user_id',
        'party_type',
    ];
    
    public function courtCase()
    {
        return $this->belongsTo(CourtCase::class);
    }
}
