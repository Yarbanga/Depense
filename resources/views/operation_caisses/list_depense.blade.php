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
            <div class="row mt-2">
                <div class="col-lg-6">
                    <h2 class="text-center">Liste des dépenses réalisées</h2>
                </div>
                <div class="col-lg-4">
                <a href="{{route('depense.get')}}" class="btn btn-primary btn-la float-right"> <i class="fas fa-plus"></i> Nouveau </a>
                </div>
                <div class="col-lg-2"></div>
            </div>
            @if ($depenses->isNotEmpty())
                <table class="table table-striped mb-2">
                    <thead>
                        <tr>
                            <th >Nature </th>
                            <th >Montant</th>
                            <th >Date</th>
                            <th >Fournisseur</th>
                            <th >Solde</th>
                            {{-- <th >Action</th> --}}
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
                                {{-- <td>
                                    <a href="#" class="btn btn-sm btn-success"> <i class="fas fa-edit"></i> Modifier </a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-t-15" style="margin-left: 70%; margin-right:20px;">
                    <div class="bg-dark p-10 text-white text-center" style="display: inline-block;">
                       <h5 class="m-b-0 m-t-5"><small class="font-light">Total : </small>{{$totalDep}} Frs CFA</h5>
                    </div>
                </div>
            @else
                <h3 class="text-center">Aucune dépense valide trouvée!</h3>
            @endif
        </div>
    </div>
</div>
@endsection
