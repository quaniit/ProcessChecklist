@extends('layouts.scaffold')

@section('main')

<h1>Edit Entry</h1>
{{ Form::model($entry, array('method' => 'PATCH', 'route' => array('entries.update', $entry->id))) }}
	<ul>
        <li>
            {{ Form::label('content', 'Content:') }}
            {{ Form::textarea('content') }}
        </li>

        <li>
            {{ Form::label('checklistID', 'ChecklistID:') }}
            {{ Form::input('number', 'checklistID') }}
        </li>

        <li>
            {{ Form::label('order', 'Order:') }}
            {{ Form::input('number', 'order') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('checklists.edit', 'Cancel', $entry->checklistID, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
