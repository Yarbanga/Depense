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
            @if ($depenses->isNotEmpty())
                <h2 class="text-center">Liste des dépenses à valider</h2>
                <table class="table table-striped mb-2">
                    <thead>
                        <tr>
                            <th >Nature </th>
                            <th >Montant</th>
                            <th >Date</th>
                            <th >Fournisseur</th>
                            <th >Solde</th>
                            <th >statut</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($depenses as $item)
                            <tr>
                                <td>{{$item->designation}}</td>
                                <td>{{$item->montant}}</td>
                                <td>{{$item->dateDepense}}</td>
                                <td>{{$item->fournisseur}}</td>
                                <td>{{$item->nouveauSolde}}</td>
                                <td>
                                    @switch($item->statut)
                                        @case(0)
                                            En cours...
                                            @break
                                        @case(1)
                                            Validée
                                            @break
                                        @default
                                            Rejetée
                                    @endswitch
                                    {{-- {{$item->nouveauSolde}} --}}
                                </td>
                                <td>
                                    <a href="{{route('depense.show', $item->id)}}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> Détails </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">Aucune dépense invalide trouvée!</h3>
            @endif
        </div>
    </div>
</div>
@endsection
