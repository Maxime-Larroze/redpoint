@extends('auth.home')
@section('auth.dashboard.interface.view')
<div class="row">
    <div class="col-lg-4 text-center">
        <h4>Nombre total d'interventions</h4>
        <p class="display-4">{{count($statutInterventions)}}</p>
        <hr>
        <h4>Nombre total d'interventions 30 jours</h4>
        <p class="display-4">{{count($interventions30j)}}</p>
        <hr>
        <h4>Intervention totales par types</h4>
        <div class="row">
            @foreach($typeInterventions as $typeIntervention)
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <h5>{{$typeIntervention->libelle}}: </h5>
                </div>
                @php $i = 0; @endphp
                @foreach($interventions as $intervention)
                    @foreach($statutInterventions as $statutIntervention)
                        @if($intervention->id === $statutIntervention->intervention_id && $intervention->type_intervention_id === $typeIntervention->id)
                            @php $i++; @endphp
                        @endif
                    @endforeach
                @endforeach
                <div class="col-lg-2">{{$i}}</div>
            @endforeach
        </div>
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Interventions par types</h3>
            </div>
            <div class="panel-body">
                <div id="chart_circle"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Nombre d'intervention sur les 30 derniers jours</h3>
            </div>
            <div class="panel-body">
                <div id="chart_bar"></div>
            </div>
        </div>
    </div>
</div>
<div class="mb-5"></div>
<script type="text/javascript">
    jQuery(function ($) {
        var data1 = [{{implode(",", $type_tb)}}];
            
        $(function () {            
            $("#chart_circle").shieldChart({
                exportOptions: {
                    image: false,
                    print: false
                },
                axisY: {
                    title: {
                        text: "Break-Down for selected quarter"
                    }
                },               
                dataSeries: [{
                    seriesType: "pie",
                    enablePointSelection: true,
                    data: data1
                }]
            });
        });
    });
</script>
<script type="text/javascript">
    jQuery(function ($) {
        var data1 = [{{implode(",", $interventions_tb)}}];
            
        $("#chart_bar").shieldChart({
            exportOptions: {
                image: false,
                print: false
            },
            axisY: {
                title: {text: "Nombre d'intervention par unité"}
            },
            axisX: {
                title: {text: "Date sur 30 jours"}
            },
            dataSeries: [{
                seriesType: "line",
                data: data1
            }]
        });
    });
</script>
@endsection