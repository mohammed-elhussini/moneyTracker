<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory ;
    protected $fillable = [
        'image' ,
        'note' ,
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
