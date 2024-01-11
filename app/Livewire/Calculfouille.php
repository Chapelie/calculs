<?php

namespace App\Livewire;
use App\Models\Calculfouilles;
use Livewire\Component;
use Request;

class Calculfouille extends Component
{
    protected $model=Calculfouilles::class;
    public $typeFouille;
    public $quantiteMateriaux;
    public $largeur;
    public $longueur;
    public $profondeur;
    public $surface;
    public $volume;
    public $diametre;
    public $suggestions= 0;
/*Les fouilles permettent de créer l'espace nécessaire pour la fondation de la maison. C'est dans ces tranchées que les fondations seront coulées.*/


public function mount()
    {
        $this->typeFouille = 'isolé';
        $this->largeur = 1;
        $this->longueur = 1;
        $this->profondeur = 1;
        $this->surface = 1;
        $this->volume = 1;
        $this->diametre = 1;
    }
public function calculer()
    {
        
        $this->typeFouille= ['isolé', 'filantes','radié', 'pieux'];
        // Effectuez les calculs en client en fonction du type de fouille
        if ($this->typeFouille === 'isolé') {
            // Calculs spécifiques pour Fouille A
            $this->volume = $this->largeur * $this->longueur * $this->profondeur;
            $this->surface = $this->largeur * $this->longueur;
        } elseif ($this->typeFouille === 'filantes') {
            // Calculs spécifiques pour Fouille B
            $this->volume = $this->largeur * $this->longueur * $this->profondeur;
            $this->surface = $this->largeur * $this->longueur;
        }
        if ($this->typeFouille === 'radié'){
            $this->surface = $this->volume = pi() *($this->diametre / 2) * $this->profondeur;
        }
        if ($this->typeFouille === 'pieux'){
        }
        // Ajoutez d'autres conditions pour les différents types de fouilles

        // Vous pouvez également effectuer des calculs généraux ici

        // Émettez un événement pour mettre à jour les résultats
    }




    public function store(Request $request)
    {
        $data = $request->all();
            // Validation des données
    $this->validate([
        'typeFouille' => 'required|string',
        'largeur' => 'required|numeric',
        'longueur' => 'required|numeric',
        'profondeur' => 'required|numeric',
        'diametre' => 'required|numeric',

    ]);

    // Enregistrement de la fouille dans la base de données
    $fouille = new Calculfouilles();
    $fouille->typeFouille = $this->typeFouille;
    $fouille->largeur = $this->largeur;
    $fouille->longueur = $this->longueur;
    $fouille->profondeur = $this->profondeur;
    $fouille->surface = $this->surface;
    $fouille->volume = $this->volume;
    $fouille->save();

    // Affiche un message de confirmation
    session()->flash('message', 'Fouille enregistrée avec succès !');
}





public function edit(int $id)
{
    // Récupère la fouille à partir de la base de données
    $fouille = Calculfouilles::findOrFail($id);

    // Définit les propriétés du composant avec les valeurs de la fouille
    $this->typeFouille = $fouille->typeFouille;
    $this->largeur = $fouille->largeur;
    $this->longueur = $fouille->longueur;
    $this->profondeur = $fouille->profondeur;
}





public function update()
  {
    // Validation des données
    $this->validate([
      'typeFouille' => 'required|string',
      'largeur' => 'required|numeric',
      'longueur' => 'required|numeric',
      'profondeur' => 'required|numeric',
      'diametre' => 'required|numeric',
    ]);

    // Met à jour la fouille dans la base de données
    $fouille = Calculfouilles::findOrFail($this->id);
    $fouille->typeFouille = $this->typeFouille;
    $fouille->largeur = $this->largeur;
    $fouille->longueur = $this->longueur;
    $fouille->profondeur = $this->profondeur;
    $fouille->surface = $this->surface;
    $fouille->volume = $this->volume;
    $fouille->save();

    // Affiche un message de confirmation
    session()->flash('message', 'Fouille mise à jour avec succès !');
  }
    public function render()
    {
        
        return view('livewire.calculfouille');
    }
}
