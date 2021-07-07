<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
	protected $fillable = [
		'name', 'height', 'mass', 'hair_color', 'skin_color',
	];
}

?>