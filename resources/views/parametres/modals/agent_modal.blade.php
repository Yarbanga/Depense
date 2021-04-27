<!-- The Modal -->
<div class="modal fade modal-agent" id="{{'agent'.$item->id}}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-dark text-white">
          <h4 class="modal-title">Modification d'un agent</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      <form action="{{route('agent.update', $item->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <!-- Modal body -->
          <div class="modal-body">
          <div class="form-group row">
              <label for="code" class="col-12 col-lg-3 text-right control-label col-form-label">Code:</label>
              <div class="col-12 col-lg-9">
              <input type="text" class="form-control" id="code" placeholder="Saisir le code" name="code" value="{{$item->code}}" autocomplete="off">
                  <span class="text-danger">{{ $errors->first('code') }}</span>
              </div>
          </div>
          <div class="form-group row">
              <label for="nom" class="col-12 col-lg-3 text-right control-label col-form-label">Nom:</label>
              <div class="col-12 col-lg-9">
                  <input type="text" class="form-control" id="nom" placeholder="Saisir le nom de l'agent" name="nom" value="{{$item->nom}}" autocomplete="off">
                  <span class="text-danger">{{ $errors->first('nom') }}</span>
              </div>
              {{-- <div class="col-lg-1"></div> --}}
          </div>
          <div class="form-group row">
              <label for="prenom" class="col-12 col-lg-3 text-right control-label col-form-label">Prénom:</label>
              <div class="col-12 col-lg-9">
                  <input type="text" class="form-control" id="prenom" placeholder="Saisir le prénom de l'agent" name="prenom" value="{{$item->prenom}}" autocomplete="off">
                  <span class="text-danger">{{ $errors->first('prenom') }}</span>
              </div>
          </div>
          <div class="form-group row">
              <label for="pole_id" class="col-12 col-lg-3 text-right control-label col-form-label">Pole:</label>
              <div class="col-12 col-lg-9">
                  <select name="pole_id" class="form-control" id="pole_id">
                      <option value="{{$item->id}}" selected>{{$item->libelle}}</option>
                      @foreach ($poles as $pole)
                        @if (($pole->id <> $item->pole_id) && ($pole->libelle <> $item->libelle))
                          <option value="{{$pole->id}}">{{$pole->libelle}}</option>
                        @endif
                      @endforeach
                  </select>
                  <span class="text-danger">{{ $errors->first('pole_id') }}</span>
              </div>
          </div>
          <div class="form-group row">
              <label for="email" class="col-12 col-lg-3 text-right control-label col-form-label">Adresse email:</label>
              <div class="col-12 col-lg-9">
                  <input type="email" class="form-control" id="email" placeholder="Saisir l'email ici" name="email" value="{{$item->email}}" autocomplete="off">
                  <span class="text-danger">{{ $errors->first('email') }}</span>
              </div>
          </div>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Modifier</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">fermer</button>
          </div>
        </form>
      </div>
    </div>
  </div>