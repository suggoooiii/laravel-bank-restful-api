<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable
     * @var array<int,string>
     */
    protected $fillable = [
        'id',
    ];

    /**
     * The attr that should be hidden
     * @var array<int,string>
     */
    protected $hidden = [
        'name',
        'PAN'
    ];

    protected $attributes = [
        'Authenticated' => false,
    ];

}
