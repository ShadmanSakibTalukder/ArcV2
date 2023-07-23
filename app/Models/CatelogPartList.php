<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatelogPartList extends Model
{
    use HasFactory;

    protected $fillable = ['item_no', 'nsn', 'part_no', 'description', 'cagec'];
}
