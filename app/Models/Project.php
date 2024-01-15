<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //Mass assignment, which means that we can fill the attributes of the model
    protected $fillable = ['title', 'description', 'owner_id'];

    //Método path() el cual se usa en la prueba unitaria
    public function path()
    {
        return "/projects/{$this->id}";
    }
}
