
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
        <div class="row">
          <div class="col-md-6">
            <h4>Informations générales</h4>
            <p><strong>Nom :</strong> {{ $selected->nom }}</p>
            <p><strong>Description :</strong> {{ $selected->description }}</p>
            <p><strong>Localisation :</strong> {{ $selected->localisation }}</p>
            <p><strong>Client :</strong> {{ $selected->client }}</p>
            <p><strong>Responsable :</strong> {{ $selected->responsable }}</p>
            <p><strong>Date de début :</strong> {{ $selected->date_debut }}</p>
            <p><strong>Date de fin :</strong> {{ $selected->date_fin }}</p>
            <p><strong>Budget :</strong> {{ $selected->budget }}</p>
          </div>

        </div>
<!--details et gestion d'un projet-->
<a href="{{ route('projetcreation') }}" class="btn btn-primary">Ajouter une tache</a>
<a href="{{ route('projetcreation') }}" class="btn btn-primary">Listes des taches</a>
@endsection
