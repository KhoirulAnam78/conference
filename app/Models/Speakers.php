<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speakers extends Model
{
    use HasFactory;
    protected $table = 'speakers';
    protected $guarded = ['id'];
    public function listSpeaker()
    {
        return $this->hasMany(DetailSpeakers::class, 'id_speakers', 'id');
    }
}
