<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TravelPackage;

class Gallery extends Model
{

    protected $fillable =[
        'travel_package_id', 'image'
    ];

    protected $hidden = [

    ];

    public function travel_package() {
        return $this->belongsTo(TravelPackage::class);
    }
}
