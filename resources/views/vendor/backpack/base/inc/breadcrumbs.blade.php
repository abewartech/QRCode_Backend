@if (config('backpack.base.breadcrumbs') && isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs))
	<nav aria-label="breadcrumb" class="d-none d-lg-block">
	  <ol class="breadcrumb bg-transparent p-0 {{ config('backpack.base.html_direction') == 'rtl' ? 'justify-content-start' : 'justify-content-end' }}">
	  	@foreach ($breadcrumbs as $label => $link)
	  		@if ($link)
		  		@if ($loop->first)
        			
			    <li class="breadcrumb-item text-capitalize"><a href="{{ $link }}">{{ backpack_user()->name }}</a></li>
				@else

			    <li class="breadcrumb-item text-capitalize"><a href="{{ $link }}">{{ $label }}</a></li>
    			@endif
	  		@else
			  @if ($loop->first)
			    <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ backpack_user()->name }}</li>
				@else
				<li class="breadcrumb-item text-capitalize active" aria-current="page">{{ $label }}</li>
				@endif
	  		@endif
	  	@endforeach
	  </ol>
	</nav>
@endif
