<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
    use Uuid, HasFactory;
    protected $table='menu_items';
    protected $guarded = ['id'];
    
    protected $casts = ['status' => 'boolean'];
    protected $keyType = 'string';

    public $incrementing = false;

}