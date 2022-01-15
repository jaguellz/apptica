<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
    ];
    public function getUrl()
    {
        $url = 'https://api.apptica.com/package/top_history/%d/%d?date_from=%s&date_to=%s&B4NKGg=fVN5Q9KVOlOHDx9mOsKPAQsFBlEhBOwguLkNEDTZvKzJzT3l';
        return sprintf($url, 1421444, 1, $this->date, $this->date);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
