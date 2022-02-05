{{-- relationships (switchboard; supports both single and multiple: 1-1, 1-n, n-n) --}}
@php
   $allows_multiple = $crud->guessIfFieldHasMultipleFromRelationType($column['relation_type']);
@endphp

@if ($allows_multiple)
	@include('crud::columns.select_multiple')
@else
	@include('crud::columns.select')
@endif
