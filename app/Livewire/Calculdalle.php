<?php

namespace App\Livewire;
use Livewire\Component;
use Illuminate\Http\Request;

class Calculdalle extends Component
{
    public $largeur;
    public $longueur;
    public $surface;
    public $volume;
    public $type;
    public $hourdi;
    public $enduitsousface;
    public $epaisseur;
    public $coffrageBrut;
    public $ferraillement;
 // Vous pouvez ajouter d'autres propriétés si nécessaire

    public function calculer()
    {
        // Calcul de la surface en mètres carrés
        $this->surface = $this->largeur * $this->longueur;

        // Calcul du volume en mètres cubes
        $this->volume = $this->surface * $this->epaisseur;

        // Calcul de la superficie du coffrage brut (par exemple, 2 fois la surface de la dalle)
        $this->coffrageBrut = 2 * $this->surface;

        // Calcul de la superficie de ferraillement (par exemple, 1% de la surface de la dalle)
        $this->ferraillement = ($this->surface * 0.01);

        // Vous pouvez ajouter d'autres calculs en fonction des besoins ici

    
    }

    public function store(Request $request)
    {
        // Validation des données
        $this->validate([
            'largeur' => 'required|numeric',
            'longueur' => 'required|numeric',
            'epaisseur' => 'required|numeric',
        ]);

        // Enregistrement de la dalle dans la base de données
        $dalle = new Calculdalle();
        $dalle->largeur = $this->largeur;
        $dalle->longueur = $this->longueur;
        $dalle->epaisseur = $this->epaisseur;
        $dalle->save();

        // Affiche un message de confirmation
        session()->flash('message', 'Dalle enregistrée avec succès !');

        // Réinitialise les valeurs des propriétés
        $this->largeur = null;
        $this->longueur = null;
        $this->epaisseur = null;
    }

    public function edit(int $id)
    {
        // Récupère la dalle à partir de la base de données
        $dalle = Calculdalle::findOrFail($id);

        // Définit les propriétés du composant avec les valeurs de la dalle
        $this->largeur = $dalle->largeur;
        $this->longueur = $dalle->longueur;
        $this->epaisseur = $dalle->epaisseur;
    }

    public function update(Request $request, int $id)
    {
        // Validation des données
        $this->validate([
            'largeur' => 'required|numeric',
            'longueur' => 'required|numeric',
            'epaisseur' => 'required|numeric',
        ]);

        // Met à jour la dalle dans la base de données
        $dalle = Calculdalle::findOrFail($id);
        $dalle->largeur = $this->largeur;
        $dalle->longueur = $this->longueur;
        $dalle->epaisseur = $this->epaisseur;
        $dalle->save();

        // Affiche un message de confirmation
        session()->flash('message', 'Dalle mise à jour avec succès !');
    }

    public function destroy(int $id)
    {
        // Supprime la dalle de la base de données
        $dalle = Calculdalle::findOrFail($id);
        $dalle->delete();

        // Affiche un message de confirmation
        session()->flash('message', 'Dalle supprimée avec succès !');
    }


    
    public function render()
    {
        return view('livewire.calculdalle');
    }
}