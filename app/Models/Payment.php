<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detailPayments()
    {
        return $this->hasMany(DetailPayment::class);
    }

    public function uploadAbstract()
    {
        return $this->belongsTo(UploadAbstract::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function uploadFulltexts()
    {
        return $this->hasMany(UploadFulltext::class);
    }
}
