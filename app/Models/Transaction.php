<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name' ,
        'description' ,
        'user_id' ,
        'payment_id' ,
        'transaction_date' ,
        'cost' ,
        'type' ,
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_transaction');
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class,'transaction_id');
    }
}
