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
        'national_id',
        'military_id',
        'phone_number',
        'attorney',
        'party_type',
    ];
    
    public function courtCase()
    {
        return $this->belongsTo(CourtCase::class);
    }
}
