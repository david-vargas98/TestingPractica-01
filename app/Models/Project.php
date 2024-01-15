<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    //Método path() el cual se usa en la prueba unitaria
    public function path()
    {
        return "/projects/{$this->id}";
    }
}
