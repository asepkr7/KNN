<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSet extends Model
{
    protected $table ='dataset';
    protected $guarded = ['id'];
    use HasFactory;
    public static function hapusSemuaData()
{
    self::truncate();
}

}