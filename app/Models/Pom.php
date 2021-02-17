<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Pom extends Model
{
	use HasFactory;

	protected $fillable = [
		'name', 'color', 'gender', 'height', 'weight', 
		'teeth', 'birthday', 'has_fontanel', 'is_for_sale', 
		'age', 'titles', 
		'father_id', 'mother_id', 'grandmother_id', 
		'grandfather_id', 'child_id', 'grandchild_id'
	];

	public function images()
	{
		return $this->hasMany(Image::class);
	}

	public function people()
	{
		return $this->belongsToMany(Person::class);
	}
}
