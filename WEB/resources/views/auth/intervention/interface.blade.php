@extends('auth.home')
@section('auth.intervention.interface.view')
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center">
                      <th>Type intervention</th>
                      <th>Position intervention</th>
                      <th>Début intervention</th>
                      <th>Fin intervention</th>
                      <th>Personnel sur place</th>
                      <th>Dernière modification</th>
                      <th>Rapport</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($interventions as $intervention)
                        @foreach($statutInterventions as $statutIntervention)
                        <tr class="text-center">
                            @if($statutIntervention->intervention_id == $intervention->id)
                                @foreach($typeInterventions as $typeIntervention)
                                    @if($intervention->type_intervention_id == $typeIntervention->id)
                                        <td>{{$typeIntervention->libelle}}</td>
                                    @endif
                                @endforeach
                                <td>{{$intervention->latitude.','.$intervention->longitude}}</td>
                                <td>{{date('d-m-Y à H:i', strtotime($statutIntervention->debut_intervention_at))}}</td>
                                <td>{{date('d-m-Y à H:i', strtotime($statutIntervention->fin_intervention_at))}}</td>
                                <td>{{$intervention->nb_intervenant}}</td>
                                <td>{{date('d-m-Y à H:i', strtotime($statutIntervention->updated_at))}}</td>
                                @if(empty($statutIntervention->commentaire) || $statutIntervention->commentaire === null)
                                    <td><button class="btn btn-success" data-toggle="modal" data-target="#modal_creation_{{$statutIntervention->id}}"><i class="far fa-plus-square"></i> Remplir</button></td>
                                    <td>/</td>
                                    <div class="modal" id="modal_creation_{{$statutIntervention->id}}">
                                        <div class="modal-dialog modal-dialog modal-xl">
                                          <div class="modal-content">
                                              <form action="{{route('commentaire.update')}}" method="POST">
                                                  @csrf
                                                  <input type="hidden" name="statutintervention_id" value="{{$statutIntervention->id}}">
                                                  <div class="modal-header">
                                                    <h4 class="modal-title text-center">Création du rapport d'intervention du {{date('d-m-Y - H:i', strtotime($statutIntervention->fin_intervention_at))}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <p class="text-center">Veuillez remplir votre rapport d'intervention. Si vous souhaitez accéder à la page d'aide pour remplir votre formulaire, <a href="" target="_blank" rel="noopener noreferrer">cliquez ici</a>.</p>
                                                      <textarea name="commentaire" rows="10" placeholder="Tapez votre rapport ici" class="btn form-control" required></textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger"><i class="far fa-plus-square"></i> Valider</button>
                                                  </div>
                                              </form>
                                          </div>
                                        </div>
                                      </div>
                                @else
                                    <td>{{$statutIntervention->commentaire}}</td>
                                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#modal_update_{{$statutIntervention->id}}"><i class="fas fa-edit"></i> Modifier</button></td>
                                    <div class="modal" id="modal_update_{{$statutIntervention->id}}">
                                        <div class="modal-dialog modal-dialog modal-xl">
                                          <div class="modal-content">
                                              <form action="{{route('commentaire.update')}}" method="POST">
                                                  @csrf
                                                  <input type="hidden" name="statutintervention_id" value="{{$statutIntervention->id}}">
                                                  <div class="modal-header">
                                                    <h4 class="modal-title text-center">Création du rapport d'intervention du {{date('d-m-Y - H:i', strtotime($statutIntervention->fin_intervention_at))}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <p class="text-center">Veuillez remplir votre rapport d'intervention. Si vous souhaitez accéder à la page d'aide pour remplir votre formulaire, <a href="" target="_blank" rel="noopener noreferrer">cliquez ici</a>.</p>
                                                      <textarea name="commentaire" rows="10" placeholder="Tapez votre rapport ici" class="btn form-control" required>{{$statutIntervention->commentaire}}</textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-edit"></i> Valider</button>
                                                  </div>
                                              </form>
                                          </div>
                                        </div>
                                      </div>
                                @endif
                            @endif
                        </tr>  
                        @endforeach   
                      @endforeach 
                  </tbody>
            </table>
          </div> 
    </div>
</div>


  


@endsection