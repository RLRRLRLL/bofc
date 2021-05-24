<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

	protected $guarded = [];

	const EXCERPT_LENGTH = 60;

	public function excerpt()
	{
		return Str::limit($this->body, self::EXCERPT_LENGTH);
	}

	// Images
	public function images()
	{
		return $this->morphMany(Image::class, 'imageable');
	}

	// Get first or main image url
	public function firstOrMain(): String
	{
		// For now only returns first one!
		return asset('storage/images/articles').'/'.$this->id.'/'.$this->images->first()->url;
	}
}
