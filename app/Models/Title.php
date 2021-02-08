<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pom;

class Title extends Model
{
    use HasFactory;

	protected $fillable = ['title', 'pom_id'];

	public function pom()
	{
		return $this->belongsTo(Pom::class);
	}
}
