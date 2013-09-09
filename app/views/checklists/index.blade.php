@extends('layouts.scaffold')

@section('main')

<h1>All Checklists</h1>

<p>{{ link_to_route('checklists.create', 'Add new checklist') }}</p>

@if ($checklists->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>DetailURL</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($checklists as $checklist)
				<tr>
					<td>{{ link_to_route('checklists.show', $checklist->name, array($checklist->id)) }}</td>
					<td>{{{ $checklist->detailURL }}}</td>
                    <td>{{ link_to_route('checklists.edit', 'Edit', array($checklist->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('checklists.destroy', $checklist->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no checklists
@endif

@stop
