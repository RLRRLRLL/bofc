<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Title;

class Pom extends Model
{
	use HasFactory;
	protected $fillable = [
		'name','color','gender','height','weight',
		'teeth','birthday','fontanel','is_for_sale','is_puppy',
		'father','mother','grandmother','grandfather',
		'breeder','title','owner'
	];

	public function images()
	{
		return $this->hasMany(Image::class);
	}

	public function titles()
	{
		return $this->hasMany(Title::class);
	}
}
