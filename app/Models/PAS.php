<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PAS extends Model
{
    protected $fillable = ['title', 'price', 'picture'];
    protected $table = 'pas';
}
