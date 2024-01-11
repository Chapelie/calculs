@extends('layouts/contentNavbarLayout')

@section('title', 'Quantum-Calculus')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<a href="{{ route('projetcreation') }}" class="btn btn-primary">Ajouter un nouveau projet</a>
<!-- listes des projets existantes -->
@if(isset($projets) && $projets->isEmpty())
    <div class="card text-center">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>
@elseif(isset($projets))
    @foreach($projets as $projet)
        <div class="card text-center mb-3">
            <div class="card-header">
                {{ $projet->nom }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $projet->description }}</h5>
                <p class="card-text">{{ $projet->localisation }}</p>
                <a href="{{route('projetdetail',$projet->id)}}"> <button type="button" class="btn btn-primary" wire:click="ProjetDetail($projetId)">  Détails du projet
                </button></a>
            </div>
            <div class="card-footer text-muted">
                Créé le {{ $projet->created_at->format('d/m/Y') }}
            </div>
        </div>
    @endforeach
@endif
<!-- listes des projets existantes -->




<!--details et gestion d'un projet-->


@endsection
