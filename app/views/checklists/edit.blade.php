@extends('layouts.scaffold')

@section('main')

<h1>Edit Checklist</h1>
{{ Form::model($checklist, array('method' => 'PATCH', 'route' => array('checklists.update', $checklist->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('detailURL', 'DetailURL:') }}
            {{ Form::text('detailURL') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('checklists.show', 'Cancel', $checklist->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
