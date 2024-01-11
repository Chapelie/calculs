<?php

namespace App\Livewire;

use Livewire\Component;

class Calculporte extends Component
{
    
    public $nombre;
    public $largeur;
    public $hauteur_porte;
    public $largeur_porte;
    public $surface_imposte;
    public $type_porte;
    public $imposte_hauteur;
    public $imposte_largeur;
    public $id;
    public $surface_imposte_totale;
    public $surface_fenetre;
    public $surface_fenetre_totale;

   /* public function mount()
    {
        $this->poutres = Poutre::all();
    }*/

    public function calculer()
    {
        
        $this->surface_imposte = $this->imposte_largeur * $this->imposte_hauteur;
        $this->surface_imposte_totale = $this->surface_imposte * $this->nombre;
        $this->surface_fenetre = $this->largeur_porte * $this->hauteur_porte;
        $this->surface_fenetre_totale = $this->surface_fenetre * $this->nombre;
    }



  
    public function typePorteChange()
    {
        switch ($this->type_porte) {
            case 'vitre-avec-imposte':
                $this->imposte_hauteur = $this->hauteur / 2;
                $this->imposte_largeur = $this->largeur;
                break;
            case 'isoplane-ou-placard-avec-imposte':
                $this->imposte_hauteur = $this->hauteur / 2;
                $this->imposte_largeur = $this->largeur;
                break;
            case 'persiennie':
                $this->imposte_hauteur = 0;
                $this->imposte_largeur = 0;
                break;
        }
        $this->largeur = $this->largeur + $this->imposte_largeur;
        $this->calculer();
    }
    public function store()
    {
        // Validation des données
        $this->validate([
            'nombre' => 'required|numeric',
            'largeur_porte' => 'required|numeric',
            'hauteur_porte' => 'required|numeric',
            'imposte_largeur' => 'required|numeric',
            'imposte_hauteur' => 'required|numeric',
            'type_porte' => 'required|string',
        ]);
    
        // Enregistrement de la porte dans la base de données
        $porte = new Calculporte();
        $porte->nombre = $this->nombre;
        $porte->largeur_porte = $this->largeur_porte;
        $porte->hauteur_porte = $this->hauteur_porte;
        $porte->surface_imposte = $this->surface_imposte;
        $porte->type_porte = $this->type_porte;
        $porte->imposte_hauteur = $this->imposte_hauteur;
        $porte->imposte_largeur = $this->imposte_largeur;
        $porte->surface_imposte_totale = $this->surface_imposte_totale;
        $porte->surface_fenetre = $this->surface_fenetre;
        $porte->surface_fenetre_totale = $this->surface_fenetre_totale;
        $porte->save();
    
        // Affiche un message de confirmation
        session()->flash('message', 'Porte enregistrée avec succès !');
    }
    
    public function edit(int $id)
    {
        // Récupère la porte à partir de la base de données
        $porte = Calculporte::findOrFail($id);
    
        // Définit les propriétés du composant avec les valeurs de la porte
        $this->nombre = $porte->nombre;
        $this->largeur_porte = $porte->largeur_porte;
        $this->hauteur_porte = $porte->hauteur_porte;
        $this->surface_imposte = $porte->surface_imposte;
        $this->type_porte = $porte->type_porte;
        $this->imposte_hauteur = $porte->imposte_hauteur;
        $this->imposte_largeur = $porte->imposte_largeur;
        $this->surface_imposte_totale = $porte->surface_imposte_totale;
        $this->surface_fenetre = $porte->surface_fenetre;
        $this->surface_fenetre_totale = $porte->surface_fenetre_totale;
    }
 

    public function render()
    {
        return view('livewire.calculporte');
    }
}


