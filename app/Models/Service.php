<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable=[
        "name" , "desc" , "category_id"
    ];
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
