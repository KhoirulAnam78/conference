<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuGroup extends Model
{
    use Uuid, HasFactory;
    protected $table='menu_groups';
    protected $guarded = ['id'];

    
    protected $casts = ['status' => 'boolean'];
}