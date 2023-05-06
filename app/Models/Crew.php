<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname', 'middlename',
        'email', 'address', 'education', 'contact_details'
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
