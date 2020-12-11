<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'form';
    protected $primaryKey = 'id';
    protected $fillable = [
        'firstName',
        'lastName',
        'address',
        'email',
        'phone',
    ];
}
