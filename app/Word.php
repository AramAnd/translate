<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Word extends Model
{
    protected $fillable = ['label', 'lng'];

    public static function translate(array $attributes)
	{
		$translation = DB::table('words')->where(['words.label' => $attributes['word'], 'words.lng' => $attributes['source_language']])
			->leftjoin('word_translate', function($join)
	        {
	            $join->on('word_translate.lng1', '=', 'words.id')->orOn('word_translate.lng2', '=', 'words.id');
	        })
	        ->leftjoin('words as tr', function($join)
	        {
	            $join->on('word_translate.lng1', '=', 'tr.id')->orOn('word_translate.lng2', '=', 'tr.id');
	        })->where('tr.label', '!=', $attributes['word'])->where('tr.lng' , $attributes['target_language'])
	        ->select('tr.label')
	        ->get();

        if (!empty($translation)) {
        	$translation = $translation[0];

	        $response = [
	        	'word' => $attributes['word'],
	        	'source' => $attributes['source_language'],
	        	'target' => $attributes['target_language'],
	        	'result' => $translation->label,
	        ];

	        if (ctype_upper($attributes['word'][0])) {
				$response['result'] = ucfirst($translation->label);
	        }
        	return $response;
    	}
	}

}
