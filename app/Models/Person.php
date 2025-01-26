<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    // Définir la relation "une personne peut avoir plusieurs enfants"
    public function children()
    {
        return $this->hasMany(Relationship::class, 'parent_id');
    }

    // Définir la relation "une personne peut avoir plusieurs parents"
    public function parents()
    {
        return $this->hasMany(Relationship::class, 'child_id');
    }

    // Définir la relation "une personne a un utilisateur-créateur"
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
