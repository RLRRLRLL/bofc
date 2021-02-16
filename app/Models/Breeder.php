<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pom;

class Breeder extends Model
{
    use HasFactory;

	protected $fillable = ['breeder'];
	
	public function poms()
	{
		return $this->hasMany(Pom::class);
	}
}
