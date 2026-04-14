<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;

    protected $fillable = ['name','entry_id','main_id','dessert_id'];

    public function EntryComponent()
    {
        return $this->belongsTo(Component::class, 'entry_id');
    }

    public function MainComponent()
    {
        return $this->belongsTo(Component::class, 'main_id');
    }

    public function DessertComponent()
    {
        return $this->belongsTo(Component::class, 'dessert_id');
    }

    public function assignments()
    {
        return $this->hasMany(MenuPlanning::class);
    }


}
