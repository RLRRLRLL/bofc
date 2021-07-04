<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pom;

class Person extends Model
{
    use HasFactory;

		protected $fillable = ['name', 'type'];

		public function poms()
		{
			return $this->belongsToMany(Pom::class);
		}
}
