@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title m-b-0">Détail dépense:</h4>
    </div>
    <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        <div class="d-flex flex-row m-t-0">
            <div class="p-2"><img src="{{asset('storage/'.$depense->filePath)}}" alt="user" width="100%" height="100%"></div>
            <div class="comment-text w-100">
                <h6 class="font-medium">Date: {{$depense->dateDepense}}</h6><br>
                <h6 class="font-medium">Nature: {{$depense->designation}}</h6><br>
                <h6 class="font-medium">Montant: {{$depense->montant}}</h6><br>
                <h6 class="font-medium">Fournisseur: {{$depense->fournisseur}}</h6><br>
                <span class="m-b-15 d-block">Description: {{$depense->description}}. </span>
                <span class="m-b-15 d-block">Commentaire: {{$depense->commentaire}}. </span>
                <div class="comment-footer">
                    {{-- <span class="text-muted float-right">Date: {{$depense->dateDepense}}</span>  --}}
                <a href="{{route('depense.validate', $depense->id)}}" class="btn btn-success btn-sm">Valider</a>
                <a href="{{route('depense.rejeter', $depense->id)}}"  class="btn btn-cyan btn-sm">Rejeter</a>
                <a href="{{route('depense_to_validate.get')}}" class="btn btn-danger btn-sm">Fermer</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection