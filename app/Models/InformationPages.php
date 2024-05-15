<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationPages extends Model
{
    use HasFactory;
    
    protected $table = 'information_pages';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}