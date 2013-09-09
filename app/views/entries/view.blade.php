<h2>Procedure</h2>

@if ($entries->count())
	<table class="table table-striped">
		<tbody id="sortable">
			@foreach ($entries as $entry)
				<tr>
					<td>{{{ $entry->order }}}</td>					
					<td>{{{ $entry->content }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no entries
@endif