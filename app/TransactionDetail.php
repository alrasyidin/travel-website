<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transaction;

class TransactionDetail extends Model
{

    protected $fillable =[
        'transaction_id', 'username', 'nationality', 'is_visa', 'doe_passport'
    ];

    protected $hidden = [

    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
