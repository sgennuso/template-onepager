@php
$autoId = isset($id) ? $id : 'gallery' . rand();
@endphp

@if( isset($filters) )
	@section('foot')
	<script src="{{ $site->vendor('npm-asset/list.js/dist/list.min.js') }}"></script>
	@endsection

	@push('scripts')
	<script>
		var options = {
		    valueNames: {!! json_encode($filters) !!}
		};

		var gallery = new List('{{ $autoId }}', options);

		$("[data-filter]").on('click', function(){
			var $filter = $(this);
			var filterBy = $filter.data('filter');

			if( filterBy == "reset" ) {
				gallery.filter(function(item) {
					return true;
				});
			} else {
				gallery.filter(function(item) {
					var values = item.values();
					if ( values[filterBy] == $filter.text() ) {
					   return true;
					} else {
					   return false;
					}
				});
			}
		});

	</script>
	@endpush
@endif

<div id="{{ $autoId }}">
	{{ $slot }}
</div>
