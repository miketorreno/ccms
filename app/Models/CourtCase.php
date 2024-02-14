<?php

namespace App\Models;

use App\Models\User;
use App\Models\Court;
use App\Models\Party;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourtCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_number',
        'title',
        'case_type',
        'case_status',
        'cause_of_action',
        'case_details',
        'court_id',
        'clerk_id',
        'lawyer_id',
        'start_date',
        'end_date',
    ];
    
    public function court()
    {
        return $this->belongsTo(Court::class);
    }
    
    public function lawyer()
    {
        return $this->belongsTo(User::class, 'lawyer_id');
    }
    
    public function parties()
    {
        return $this->hasMany(Party::class);
    }
}
