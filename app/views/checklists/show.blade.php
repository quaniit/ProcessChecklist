@extends('layouts.scaffold')

@section('main')

<h1>Checklist: {{{ $checklist->name }}}</h1>
<a href="{{{ $checklist->detailURL }}}">Detailed Entry</a>

{{ $entriesView }}

<p>{{ link_to_route('checklists.index', 'Return to all checklists') }}</p>
@stop
