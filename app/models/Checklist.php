<?php

class Checklist extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'detailURL' => 'required'
	);
}
