<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $fillable = [
		'fullname', 'email', 'phone','sex', 'city', 'content','street'
	];
	protected $table = 'contacts';
}
