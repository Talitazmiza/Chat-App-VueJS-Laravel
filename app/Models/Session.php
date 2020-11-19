<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    
	public function chats()
	{
		return $this->hasManyThrough(Chat::class, Message::class);
	}

	public function message() 
	{
		return $this->hasMany(Message::class);
	}

}
