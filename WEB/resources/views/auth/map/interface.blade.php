@extends('auth.home')
@section('auth.map.interface.view')
<script type="text/javascript">
    window.onload = function maping() {
      L.mapquest.key = '5l4aRuE9OLOPxJCgzv5vALK4xWRfCq8e';
  
      var map = L.mapquest.map('map', {
            center: [ @if(!empty($user->latitude))
              {{$user->latitude.','.$user->longitude}}
              @else
              47.3178988,5.0522709
              @endif],
            layers: L.mapquest.tileLayer('map'),
            zoom: 18
          });
  
          L.mapquest.textMarker([{{$user->latitude.','.$user->longitude}}], {
            text: '{{$user->prenom}} {{$user->nom}}',
            position: 'right',
            type: 'marker',
            icon: {
              primaryColor: '#4B6978',
              secondaryColor: '#0916BB',
              size: 'sm'
            }
          }).addTo(map);

          @if(!empty($interventions) && $interventions != null)
            @foreach($interventions as $intervention)
            L.mapquest.textMarker([{{$intervention->latitude.','.$intervention->longitude}}], {
              @foreach($typeinterventions as $typeintervention)
                  @if($typeintervention->id === $intervention->type_intervention_id)
                    text: 'Urgence  {{$typeintervention->libelle}}',
                    position: 'right',
                    type: 'marker',
                    icon: {
                    primaryColor: '#4B6978',
                    secondaryColor: '#{{$typeintervention->couleur}}',
                    size: 'sm'
                  @endif
                @endforeach
              }
            }).addTo(map);
            @endforeach
          @endif
          L.mapquest.geocoding();
        }
      map.addControl(L.mapquest.control());
  </script>
<div class="row">
    <div class="col-lg-12">
        <div id="map" style="width: 100%; height: 850px;"></div>
    </div>
</div>
{{-- <script>
    setTimeout(function(){
   window.location.reload(1);
}, 5000);
</script> --}}
@endsection