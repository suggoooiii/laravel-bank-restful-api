<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banknet extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'balance'];
    protected $attributes = ['balance' => 0];

}
