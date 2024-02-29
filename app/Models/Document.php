<?php

namespace App\Models;

use App\Models\CourtCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'court_case_id',
        'name',
        'document_type',
        'description',
        'path',
    ];
    
    public function courtCase()
    {
        return $this->belongsTo(CourtCase::class);
    }
}

