<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = ['consumer_number', 'consumer_name', 'amount'];


    public function utility()
    {
        return $this->belongsTo(Utility::class);
    }
}
