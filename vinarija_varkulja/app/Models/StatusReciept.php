<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusReciept extends Model
{
    use HasFactory;
    protected $table = 'reciept_status';
    protected $fillable = ['name'];
}
