<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    /** @use HasFactory<\Database\Factories\DemandeFactory> */
    use HasFactory;

    protected $fillable = ['component_id','user_id','expires_at','status'];

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
