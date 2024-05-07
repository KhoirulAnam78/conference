<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicScope extends Model
{
    use HasFactory;
    protected $table ="topic_scope";
    protected $guarded = ['id'];
    
}