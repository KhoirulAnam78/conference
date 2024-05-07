<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function uploadAbstracts()
    {
        return $this->hasMany(UploadAbstract::class);
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
