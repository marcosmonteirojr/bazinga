<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actions extends Model
{
    protected $fillable=[
        'title',
        'description',
        'category_id',
        'points'
    ];
    public function categories(){
        return $this->belongsTo(Categories::class, 'category_id','id');
    }
     public function users()
    {
        return $this->belongsToMany(User::class, 'user_actions', 'action_id', 'user_id')
                    ->withPivot('quantity', 'date')
                    ->withTimestamps();
    }
}
