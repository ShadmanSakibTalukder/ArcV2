<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatelogPartList extends Model
{
    use HasFactory;

    protected $fillable = ['item_no', 'nsn', 'part_no', 'description', 'cagec', 'page_no'];

    // Add a virtual attribute to store the missing flag
    protected $appends = ['is_missing'];

    // Define the accessor method for the virtual attribute
    public function getIsMissingAttribute()
    {
        return empty($this->part_no) || empty($this->nsn);
    }
}
