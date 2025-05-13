<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capster extends Model
{
    protected $fillable = ['name', 'tempat_tinggal', 'phone', 'email', 'experience', 'specialization', 'available', 'foto'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
