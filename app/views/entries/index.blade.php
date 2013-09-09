<h2>Procedure</h2>

<p>{{ link_to_route('entries.create', 'Add new entry') }}</p>

@if ($entries->count())
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>Order</th>
				<th>Content</th>
			</tr>
		</thead>

		<tbody id="sortable">
			@foreach ($entries as $entry)
				<tr>
					<td class="handle"><i class="icon-resize-vertical"></i>{{{ $entry->order }}}</td>					
					<td>{{{ $entry->content }}}</td>
                    <td>{{ link_to_route('entries.edit', 'Edit', array($entry->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('entries.destroy', $entry->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no entries
@endif