<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arbol extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'parent_id', 'created_at', 'updated_at'
    ];

    public function children(){
        return $this->hasMany(Arbol::class, "parent_id");
    }

    public function father(){
        return $this->belongsTo(Arbol::class, "parent_id", "id");
    }

}
