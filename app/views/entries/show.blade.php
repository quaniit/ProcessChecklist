@extends('layouts.scaffold')

@section('main')

<h1>Show Entry</h1>

<p>{{ link_to_route('entries.index', 'Return to all entries') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Content</th>
				<th>ChecklistID</th>
				<th>Order</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $entry->content }}}</td>
					<td>{{{ $entry->checklistID }}}</td>
					<td>{{{ $entry->order }}}</td>
                    <td>{{ link_to_route('entries.edit', 'Edit', array($entry->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('entries.destroy', $entry->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
