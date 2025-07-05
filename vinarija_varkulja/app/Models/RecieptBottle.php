<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecieptBottle extends Model
{
    use HasFactory;
    protected $table = 'receipt_bottle';
    protected $fillable = ['reciept_id','bottle_id','bottle_quantity'];
}
