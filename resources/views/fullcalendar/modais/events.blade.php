
<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Título do modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="message"></div>

                <form id="formEvent">
                    @csrf
                @if (Session::has('idAdmin'))
                    <div class="form-group row" id="activation">
                    <label for="title" class="col-sm-4 col-form-label">Activation demande </label>
                        <div class="col-sm-8">
                            <input type="hidden" name="prof" id="prof" value="{{$prof->id}}">
                             <select name="etat" id="etat" class="form-control">
                                 <option value="" readonly>Choisir</option>
                                 <option value="1">Activer</option>
                                 <option value="0">Désactiver</option>
                             </select>
                        </div>
                    </div>
                @endif
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Nom événement </label>
                        <div class="col-sm-8">
                            <input type="text" name="title" class="form-control" id="title">
                            <input type="hidden" name="id">
                            <input type="hidden" value="{{$idLigClasProf}}" name="class" id="class">
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Type cours  </label>
                        <div class="col-sm-8">
                            <select name="type" id="type" class="form-control">
                             <option   disabled selected>Choisir type</option>
                               <option value="document">Document</option>
                               <option   value="en ligne">En ligne</option>
                            </select>
                            
                            
                        </div>
                    </div>
                    <div class="form-group row" style="display:none" id="cours">
                        <label for="title" class="col-sm-4 col-form-label">Cours</label>
                        <div class="col-sm-8">
                            <select name="cours" id="cour"  class="form-control">
                             <option   disabled selected>Choisir cours</option>
                               @foreach($cours as $c)
                               <option   value="{{$c->id}}">{{$c->nomCour}}</option>
                               @endforeach
                            </select>
                            
                        </div>
                    </div>

                    <div class="form-group row" style="display:none" id="salles">
                        <label for="title" class="col-sm-4 col-form-label">Salle en ligne</label>
                        <div class="col-sm-8">
                            <select name="salle" id="salle" class="form-control">
                             <option   disabled selected>Choisir salle</option>
                               @foreach($lives as $l)
                               <option   value="{{$l->id}}">{{$l->nomSalle}}</option>
                               @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="start" class="col-sm-4 col-form-label">Date debut</label>
                        <div class="col-sm-8">
                            <input type="text" name="start" class="form-control date-time" id="start">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end" class="col-sm-4 col-form-label">Date fin</label>
                        <div class="col-sm-8">
                            <input type="text" name="end" class="form-control date-time" id="end">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label">Description</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="40" rows="4"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger deleteEvent">Supprimer</button>
                <button type="button" class="btn btn-primary saveEvent">Ajouter</button>
            </div>
        </div>
    </div>
</div>

