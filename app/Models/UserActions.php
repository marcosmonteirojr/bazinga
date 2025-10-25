<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActions extends Model
{
  protected $fillable=[
    'user_id',
    'action_id',
    'quantity',
    'date'
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function action()
  {
    return $this->belongsTo(Actions::class);
  }
}
