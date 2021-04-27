@extends('layouts.master')
@section('css')
    <style>
        .table {
            margin: auto;
            width: 90% !important;  
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <form class="form-horizontal" id="agent_form" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Définition d'un utilisateur</legend>
                    <div class="form-group row">
                        <label for="username" class="col-12 col-lg-2 text-right control-label col-form-label">Nom d'utilisateur:</label>
                        <div class="col-12 col-lg-9">
                            <input type="text" class="form-control" id="username" placeholder="Saisir le nom d'utilisateur ici" name="username" value="{{old('username')}}" autocomplete="off">
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="role" class="col-12 col-lg-3 text-right control-label col-form-label">Agent:</label>
                                <div class="col-12 col-lg-8">
                                    <select name="agent_id" class="form-control" id="agent_id">
                                        <option selected>------Choisir un agent---------</option>
                                        @foreach ($agents as $agent)
                                            <option value="{{$agent->id}}">{{$agent->code.' '.$agent->nom.' '.$agent->prenom}}</option>
                                        @endforeach
                                      </select>
                                    <span class="text-danger">{{ $errors->first('agent_id') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="role" class="col-12 col-lg-3 text-right control-label col-form-label">Role:</label>
                                <div class="col-12 col-lg-8">
                                    <select name="role" class="form-control" id="role">
                                        <option selected>------Choisir le role de l'agent---------</option>
                                        <option value="1">Admin</option>
                                        <option value="3">User</option>
                                      </select>
                                    <span class="text-danger">{{ $errors->first('dateOuverture') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-12 col-lg-2 text-right control-label col-form-label">Mot de passe:</label>
                        <div class="col-12 col-lg-9">
                            <input type="password" class="form-control" id="password" placeholder="Saisir le mot de passe" name="password">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="confirmPassword" class="col-12 col-lg-2 text-right control-label col-form-label">Confirmer le mot de passe:</label>
                        <div class="col-12 col-lg-9">
                            <input type="password" class="form-control" id="password-confirmation" name="password_confirmation">
                            <span class="text-danger">{{ $errors->first('confirmPassword') }}</span>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7">
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-lg btn-primary text-center"><i class="fas fa-check"></i> Valider</button>
                                </div>
                                <div class="col-lg-2">
                                    <button type="reset" class="btn btn-lg btn-warning text-center"><i class="fas fa-window-close"></i> Annuler</button>
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form><br>
            @if ($users->isNotEmpty())
                <h2 class="text-center">Liste des agents enregistrés</h2>
                <table class="table table-striped mb-2">
                    <thead>
                        <tr>
                            <th >Nom d'utilisateur</th>
                            <th >Nom</th>
                            <th >Prénom</th>
                            <th >Role</th>
                            <th >Adresse email</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{$item->username}}</td>
                                <td>{{$item->nom}}</td>
                                <td>{{$item->prenom}}</td>
                                <td>
                                    @switch($item->role)
                                        @case(1)
                                            Administrateur
                                            @break
                                        @case(2)
                                            Super administrateur
                                            @break
                                        @default
                                            Utilisateur
                                    @endswitch
                                    {{-- {{$item->role}} --}}
                                </td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success"> <i class="fas fa-edit"></i> Modifier </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">Aucun agent enregistré!</h3>
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#agent_form").length > 0) {
            $("#agent_form").validate({
        
                rules: {
                    username: {
                        required: true,
                        maxlength: 255,
                    },

                    role: {
                        required: true,
                        number: true,
                    },

                    agent_id: {
                        required: true,
                        number: true,
                    },

                    password: "required",
                    password_confirmation: {
                        equalTo: "#password"
                    }
                },
                messages: {
        
                    username: {
                        required: "Le nom d'utilisateur est obligatoire",
                        maxlength: "Le nom d'utilisateur ne doit pas depasser 255 caractères"
                    },
                
                    role: {
                        required: "Vous devez choisir le pole de l'agent",
                        number: "Vous devez choisir un rôle pour l'utilisateur",
                    },

                    agent_id: {
                        required: "Vous devez choisir un agent",
                        number: "Vous devez choisir un agent",
                    },
                    
                    password: " Vous devez saisir votre mot de passe",
                    password_confirmation: "Vous devez saisir un mot de passe identique au précédent"
                },
            });
        } 
    });
</script>
@endsection