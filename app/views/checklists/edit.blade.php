@extends('layouts.scaffold')

@section('main')

<h1>Edit Checklist</h1>

<div>
{{ Form::model($checklist, array('method' => 'PATCH', 'route' => array('checklists.update', $checklist->id))) }}
	<div class="row-fluid">
		<div class="span4">
            {{ Form::text('name', Input::old('name'), array('placeholder'=>'Name')) }}
        </div>
        <div class="span4">
            {{ Form::text('detailURL', Input::old('detailURL'), array('placeholder'=>'URL')) }}
        </div>
        <div class="span3 pagination-centered">
	        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}    	
	    </div>
	</div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
</div>
<div>
    {{  $entriesView }}
</div>
@stop
