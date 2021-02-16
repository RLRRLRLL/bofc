<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Breeder;
use App\Models\Image;
use App\Models\Owner;

class Pom extends Model
{
	use HasFactory;

	protected $fillable = [
		'name', 'color', 'gender', 'height', 'weight', 'teeth', 'birthday', 
		'has_fontanel', 'is_for_sale', 'is_puppy',
		'breeder_id', 'owner_id', 'titles',
		'father_id', 'mother_id', 'grandmother_id', 'grandfather_id',
		'child_id', 'grandchild_id'
	];

	public function images()
	{
		return $this->hasMany(Image::class);
	}

	public function owner()
	{
		return $this->belongsTo(Owner::class);
	}

	public function breeder()
	{
		return $this->belongsTo(Breeder::class);
	}
}
