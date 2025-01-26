<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    // Définir la relation "un enfant appartient à une personne"
    public function child()
    {
        return $this->belongsTo(Person::class, 'child_id');
    }

    // Définir la relation "un parent appartient à une personne"
    public function parent()
    {
        return $this->belongsTo(Person::class, 'parent_id');
    }
}
