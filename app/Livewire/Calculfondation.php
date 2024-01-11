<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Divers;
use Livewire\Calculfouille;

class Calculfondation extends Component
{
    public $typeFouille;
    public $petitCote;
    public $grandCote;
    public $epaisseurSemelle;
    public $hauteurSemelle;
    public $niveauAssise;
    public $dessusSemellea;
    public $dessusSemelleb;

    public $dimensionsSectionFuta;
    public $dimensionsSectionFuth;

    public $hauteurFut;
    public $epaisseur;
    public $volume;
    public $surface;
    public $volume_b_p ;
    public $volume_fouille ;
    public $volume_b_pfa ;
    public $nombre;
 
    // Méthode pour effectuer les calculs en client
    public function calculer()
    {
        $this->volume_b_pfa=(($this->epaisseurSemelle - $this->epaisseurSemelle) * (($this->petitCote * $this->grandCote) + ($this->dessusSemellea * $this->dessusSemelleb)) + sqrt(($this->petitCote * $this->grandCote) + ($this->dessusSemellea * $this->dessusSemelleb)) * $this->nombre / 3 + ($this->petitCote * $this->grandCote * $this->epaisseurSemelle * $this->nombre) + $this->nombre * $this->dimensionsSectionFuta * $this->dimensionsSectionFuth * $this->niveauAssise - $this->epaisseurBetobPro - $this->hauteurSemelle) ; 
        // Effectuez les calculs en client et mettez à jour les résultats
        $this->volume_fouille = $this->nombre * ($this->petitCote * 0.05) * ($this->grandCote * 0.05) * $this->niveauAssise;
        $this->coffrage_brute = ($this->grandCote * 2) * ($this->hauteurSemelle * $this->petitCote);
        $this->volume = $this->petitCote * $this->grandCote * $this->epaisseur; // Calcul du volume
        $this->surface = $this->petitCote * $this->grandCote; // Calcul de la superficie
        $this->volume_b_p = $this->nombre * ($this->petitCote * 0.05) * ($this->grandCote * 0.05) * $this->epaisseurBetobPro;

    }
    public function store()
{
    // Validation des données
    $this->validate([
        'typeFouille' => 'required|string',
        'petitCote' => 'required|numeric',
        'grandCote' => 'required|numeric',
        'epaisseurSemelle' => 'required|numeric',
        'hauteurSemelle' => 'required|numeric',
        'niveauAssise' => 'required|numeric',
        'dessusSemelle' => 'required|numeric',
        'dimensionsSectionFut' => 'required|numeric',
        'hauteurFut' => 'required|numeric',
    ]);

    // Enregistrement de la fondation dans la base de données
    $fondation = new Calculfondation();
    $fondation->typeFouille = $this->typeFouille;
    $fondation->petitCote = $this->petitCote;
    $fondation->grandCote = $this->grandCote;
    $fondation->epaisseurSemelle = $this->epaisseurSemelle;
    $fondation->hauteurSemelle = $this->hauteurSemelle;
    $fondation->niveauAssise = $this->niveauAssise;
    $fondation->dessusSemelle = $this->dessusSemelle;
    $fondation->dimensionsSectionFut = $this->dimensionsSectionFut;
    $fondation->hauteurFut = $this->hauteurFut;
    $fondation->volume_b_p = $this->volume_b_p;
    $fondation->volume_fouille = $this->volume_fouille;
    $fondation->volume_b_pfa = $this->volume_b_pfa;
    $fondation->save();

    // Affiche un message de confirmation
    session()->flash('message', 'Fondation enregistrée avec succès !');
}

public function edit(int $id)
{
    // Récupère la fondation à partir de la base de données
    $fondation = Calculfondation::findOrFail($id);

    // Définit les propriétés du composant avec les valeurs de la fondation
    $this->typeFouille = $fondation->typeFouille;
    $this->petitCote = $fondation->petitCote;
    $this->grandCote = $fondation->grandCote;
    $this->epaisseurSemelle = $fondation->epaisseurSemelle;
    $this->hauteurSemelle = $fondation->hauteurSemelle;
    $this->niveauAssise = $fondation->niveauAssise;
    $this->dessusSemelle = $fondation->dessusSemelle;
    $this->dimensionsSectionFut = $fondation->dimensionsSectionFut;
    $this->hauteurFut = $fondation->hauteurFut;
    $this->volume_b_p = $fondation->volume_b_p;
    $this->volume_fouille = $fondation->volume_fouille;
    $this->volume_b_pfa = $fondation->volume_b_pfa;
}
    public function render()
    {
        return view('livewire.calculfondation');
    }
}
