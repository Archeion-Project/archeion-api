<?php

namespace App;

use App\Issue;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

	protected $fillable = [
		'numero', 'filepath', 'conteudo', 'issue_id'
	];

	public function Issue()
	{
		return $this->belongsTo(Issue::class);
	}

}
