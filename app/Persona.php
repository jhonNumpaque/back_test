<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Persona extends Model
{

    use HasApiTokens;

    protected $table = "person";
    protected $primaryKey = "id";
}
