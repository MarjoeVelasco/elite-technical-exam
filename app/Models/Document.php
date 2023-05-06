<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'document_number',
        'date_issued', 'date_expirt', 'remarks', 'crew_id'
    ];

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
