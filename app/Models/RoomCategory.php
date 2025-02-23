<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "room_categories";
    protected $guarded = ['id'];
}
