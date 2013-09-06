@extends('layouts.scaffold')

@section('main')

<h1>Show Checklist</h1>

<p>{{ link_to_route('checklists.index', 'Return to all checklists') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>DetailURL</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $checklist->name }}}</td>
					<td>{{{ $checklist->detailURL }}}</td>
                    <td>{{ link_to_route('checklists.edit', 'Edit', array($checklist->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('checklists.destroy', $checklist->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
