<?php

namespace App\Models;

use App\Models\User;
use App\Models\Court;
use App\Models\Party;
use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourtCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_number',
        'archive_number',
        'rank',
        'accused',
        'accuser',
        'location',
        'case_type',
        'case_status',
        'cause_of_action',
        'case_details',
        'decision',
        'court_id',
        'clerk_id',
        'lawyer_id',
        'start_date',
        'app_date',
        'app_reason',
    ];

    // protected $casts = [
    //     'start_date'    => 'datetime',
    //     'app_date'    => 'datetime',
    // ];
    
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
    
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
