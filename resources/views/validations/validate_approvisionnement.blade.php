@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title m-b-0">Détails approvisionnement:</h4>
    </div>
    <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        <div class="d-flex flex-row m-t-0">
            <div class="p-2">
                {{-- <img src="{{asset('storage/'.$appro->filePath)}}" alt="user" width="100%" height="100%"> --}}
            </div>
            <div class="comment-text w-100">
                <h6 class="font-medium">Date: {{$appro->dateAppro}}</h6><br>
                <h6 class="font-medium">Type: {{$appro->libelle}}</h6><br>
                <h6 class="font-medium">Montant: {{$appro->montantAppro}}</h6><br>
                <h6 class="font-medium">
                    @if ($appro->source == 1)
                        Source: Banque
                    @else
                        Source: Remboursement
                    @endif
                    {{-- Source: {{$appro->source}} --}}
                </h6><br>
                {{-- <span class="m-b-15 d-block">Description: {{$appro->description}}. </span>
                <span class="m-b-15 d-block">Commentaire: {{$appro->commentaire}}. </span> --}}
                <div class="comment-footer">
                    {{-- <span class="text-muted float-right">Date: {{$appro->dateappro}}</span>  --}}
                <a href="{{route('approvisionnement.validate', $appro->id)}}" class="btn btn-success btn-sm">Valider</a>
                <a href="{{route('approvisionnement.rejeter', $appro->id)}}"  class="btn btn-cyan btn-sm">Rejeter</a>
                <a href="{{route('approvisionnement_to_validate.get')}}" class="btn btn-danger btn-sm">Fermer</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection