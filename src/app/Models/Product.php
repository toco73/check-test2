<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description'
    ];

    public function scopeKeywordSearch($query,$keyword)
    {

        if(!empty($keyword)){
            $query->where('name' , 'like' , '%' . $keyword . '%');
        }
        return $query;
    }

    public function scopeSortByPrice($query,$sort)
    {
        if($sort === 'price-desc'){
            $query->orderBy('price','desc');
        }elseif($sort === 'price-asc'){
            $query->orderBy('price','asc');
        }
        return $query;
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class);
    }
}
