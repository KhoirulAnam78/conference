<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviouslyEvent extends Model
{
    use HasFactory;
    protected $table = 'previously_event';
    protected $guarded = ['id'];
}
