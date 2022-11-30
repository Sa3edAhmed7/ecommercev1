<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPayment extends Model
{
    use HasFactory;
    protected $fillable = ['freeshipping','guarantee'];
    protected $table = "about_payments";
}
