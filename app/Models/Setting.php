<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['email','phone','phone2','address','map','twiter','facebook','pinterest','instagram','youtube'];
    protected $table = "settings";
}
