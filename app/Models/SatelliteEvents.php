<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatelliteEvents extends Model
{
    use HasFactory;
    protected $table = 'satellite_events';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}