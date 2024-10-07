<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTraining extends Model
{
     protected $table ='datatraining';
    protected $guarded = ['id'];
    use HasFactory;

     public static function hapusSemuaData()
{
    self::truncate();
}
}