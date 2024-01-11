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
<form action="{{ route('projet_enregistrer') }}" method="post">
      @csrf
    <div class="mb-3">
        <label for="nom" class="form-label">Nom du projet</label>
        <input id="nom" class="form-control form-control-lg" type="text" wire:model="nom" required placeholder="Nom du projet" />
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" class="form-control" wire:model="description" placeholder="Une brève description"></textarea>
    </div>
    <div class="mb-3">
        <label for="localisation" class="form-label">Localisation</label>
        <input id="localisation" class="form-control form-control-sm" type="text" wire:model="localisation" placeholder="Localisation" />
    </div>
    <div class="mb-3">
        <label for="client" class="form-label">Client</label>
        <input id="client" class="form-control rounded-pill" type="text" wire:model="client" placeholder="Nom du client" />
    </div>
    <div class="mb-3">
        <label for="responsable" class="form-label">Responsable</label>
        <input id="responsable" class="form-control" type="text" wire:model="responsable" placeholder="Responsable" />
    </div>
    <div class="mb-3">
        <label for="date_debut" class="form-label">Date de début</label>
        <input id="date_debut" class="form-control" type="date" wire:model="date_debut" />
    </div>
    <div class="mb-3">
        <label for="date_fin" class="form-label">Date de fin</label>
        <input id="date_fin" class="form-control" type="date" wire:model="date_fin" />
    </div>
    <div class="mb-3">
        <label for="budget" class="form-label">Budget</label>
        <input id="budget" class="form-control" type="number" wire:model="budget" step="0.01" placeholder="Budget" />
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>

</form>

@endsection
