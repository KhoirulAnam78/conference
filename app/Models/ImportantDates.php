<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportantDates extends Model
{
    use HasFactory;
    protected $table = 'important_dates';
    protected $guarded = ['id'];
}