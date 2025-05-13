<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'capster_id', 'service_id', 'total_price', 'status', 'transaction_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function capster()
    {
        return $this->belongsTo(Capster::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
