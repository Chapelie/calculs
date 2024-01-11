<?php

namespace App\Livewire;
use App\Models\Projet;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Gesprojet extends Component
{

  public $projets = NULL;
  public $nom;
  public $description;
  public $localisation;
  public $client;
  public $responsable;
  public $date_debut;
  public $date_fin;
  public $budget;

    public function mount()
    {
        $this->projets = Projet::all();
    }


    public function create()
{


  $projet = new Projet();
$projet->nom = $this->nom;
$projet->description = $this->description;
$projet->localisation = $this->localisation;
$projet->date_debut = $this->date_debut;
$projet->date_fin = $this->date_fin;
$projet->responsable = $this->responsable;
$projet->budget = $this->budget;
$projet->user_id = Auth::id();




    // Actualisation de la liste des projets
    $this->projets = Projet::all();

     session()->flash('success', 'Le projet a été enregistré avec succès !');
     return redirect()->route('projet_listes');
}

public function ProjetDetail($projetId)
{
    $this->selected = Projet::find($projetId);
    return view('livewire.projet.affichedetailprojet', [
        'selected' => $this->selected, // Passer le projet sélectionné à la vue
    ]);
}



public function pagecreation(){
      return view('livewire.projet.creerprojet');
}
public function voir()
{
    // Récupère tous les projets
    $projets = Projet::all();

    // Passe les projets à la vue 'livewire.projet.gesprojet'
    return view('livewire.projet.gesprojet', [
        'projets' => $projets,
    ]);
}

}
