<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadFilePath extends Model
{
    use HasFactory;
    protected $table = 'download_file_path';
    protected $guarded = ['id'];
}
