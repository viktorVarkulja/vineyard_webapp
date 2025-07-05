<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bottle extends Model
{
    use HasFactory;
    protected $table = 'bottles';
    protected $fillable = ['wine_id','name','size','image','quantity','in_stock','cost_RSD'];
}
