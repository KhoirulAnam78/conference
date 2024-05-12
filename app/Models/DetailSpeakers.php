<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSpeakers extends Model
{
    use HasFactory;
    protected $table = 'list_speaker';
    protected $guarded = ['id'];
}
