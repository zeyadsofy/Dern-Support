<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'requests';
    protected $fillable=[
        "name","user_id" , "service_id" , "category_id","desc"
    ];
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
