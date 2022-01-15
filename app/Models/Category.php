<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'TopCategory_id',
        'category',
        'position'
    ];

    public function topCategory()
    {
        return $this->belongsTo(TopCategory::class);
    }
}
