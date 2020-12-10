<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
	protected $guarded = [];
	
	public function chats()
	{
		return $this->hasManyThrough(Chat::class, Message::class);
	}

	public function message() 
	{
		return $this->hasMany(Message::class);
	}

	public function deleteChats() 
	{
		$this->chats()->where('user_id', auth()->id())->delete();
	}

	public function deleteMessages() 
	{
		$this->message()->delete();
	}

//	public function block()
//	{
//		$this->block = true;
//        $this->blocked_by = auth()->id();
//        $this->save();
//	}
//
//	public function unblock()
//	{
//		$this->block = false;
//        $this->blocked_by = null;
//        $this->save();
//	}

}
