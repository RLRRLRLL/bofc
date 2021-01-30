<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pom;

class Image extends Model
{
	use HasFactory;
	
	public function pom()
	{
		return $this->belongsTo(Pom::class);
	}
}
