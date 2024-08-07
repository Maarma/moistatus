<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    protected $table = 'questions';
    protected $fillable = ['question'];

    use HasFactory;
}
