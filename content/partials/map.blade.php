@push('scripts')
<script>
   function initMap() {
     var business = {lat: {{ $site->global()->business->latitude }}, lng: {{ $site->global()->business->longitude }}};
     var map = new google.maps.Map(document.getElementById('map'), {
       zoom: 12,
       center: business
     });
     var marker = new google.maps.Marker({
       position: business,
       map: map,
	   title: '{{ $site->global('site_title') }}'
     });
   }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $site->global('google_maps_api') }}&callback=initMap"></script>
@endpush

<div id="map" class="map"></div>
