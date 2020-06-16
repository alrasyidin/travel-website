<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TravelPackage;
use App\User;
use App\TransactionDetail;

class Transaction extends Model
{

    protected $fillable =[
        'travel_package_id', 'user_id', 'additional_visa', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [

    ];

    public function detail(){
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_package_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
