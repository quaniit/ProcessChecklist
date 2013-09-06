<?php

class Entry extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'content' => 'required',
		'checklistID' => 'required',
		'order' => 'required'
	);
}
