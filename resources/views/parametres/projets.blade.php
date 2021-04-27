@extends('layouts.master')
@section('css')
    <style>
        .table {
            margin: auto;
            width: 50% !important;  
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <form class="form-horizontal" id="agent_form" action="{{route('project.save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Projets</legend>
                    <div class="form-group row">
                        <label for="intitule" class="col-12 col-lg-2 text-right control-label col-form-label">Code:</label>
                        <div class="col-12 col-lg-9">
                            <input type="text" class="form-control" id="intitule" placeholder="Saisir le code ici" name="intitule" autocomplete="off" value="{{old('intitule')}}">
                            <span class="text-danger">{{ $errors->first('intitule') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-12 col-lg-2 text-right control-label col-form-label">Libellé:</label>
                        <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="description" placeholder="Saisir le libellé" name="description" autocomplete="off" value="{{old('description')}}">
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9">
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-lg btn-primary text-center"><i class="fas fa-plus"></i> Ajouter</button>
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form><br>
            @if ($projets->isNotEmpty())
            <h2 class="text-center">Liste des projets enregistrées</h2>
                <table class="table table-striped mb-2">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projets as $item)
                            <tr>
                                <td>{{$item->intitule}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="{{'#agent'.$item->id}}" data-backdrop="static"> <i class="fas fa-edit"></i> Modifier </button>
                                    @include('parametres.modals.projet_modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">Aucun projet enregistré!</h3>
            @endif
            <div class="row mt-2 mb-2">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                <a href="{{route('dashboard')}}" class="btn btn-lg btn-warning">Fermer</a>
                </div>
                <div class="col-lg-5"></div>
            </div>
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
                    intitule: {
                        required: true,
                        unique: true,
                    },

                    description: {
                        required: true,
                        unique: true,
                    },
                },
                messages: {
        
                    intitule: {
                        required: "Le code est obligatoire",
                        unique: "Le code ne doit pas être dupliqué"
                    },

                    description: {
                        required: "Le libellé est obligatoire",
                        unique: "Le libellé ne doit pas être dupliqué"
                    },
                },
            });
        } 
    });
</script>
@endsection