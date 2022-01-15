<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'appId',
        'countryId'
    ];
    public function getUrl()
    {
        $url = 'https://api.apptica.com/package/top_history/%d/%d?date_from=%s&date_to=%s&B4NKGg=fVN5Q9KVOlOHDx9mOsKPAQsFBlEhBOwguLkNEDTZvKzJzT3l';
        return sprintf($url, $this->appId, $this->countryId, $this->date, $this->date);
    }
}
