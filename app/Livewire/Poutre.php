<?php

namespace App\Livewire;

use Livewire\Component;

class Poutre extends Component
{

    public $type;
    public $distance_entre_supports;
    
    public $nombre;
    public $largeur;
    public $hauteur;
    public $longueur;
    public $surface;
    public $volume;




    public function calculer()
    {
       

        $this->surface = $this->nombre * $this->largeur * $this->hauteur;
        $this->volume = $this->largeur * $this->longueur * $this->nombre * $this->longueur;
        $this->coffrageB_O = ($this->nombre) * $this->hauteur * 2 * $this->longueur * $this->largeur +2;
    }

    public function typeChange()
    {
        $this->section_transversale = $this->poutres->where('type', $this->type)->first()->section_transversale;
    }

    public function linteau()
    {
        $this->longueur = $this->largeur * 2;
        $this->calculer();
    }
    public function store()
    {
        $poutre = new Poutre();
        $poutre->type = $this->type;
        $poutre->distance_entre_supports = $this->distance_entre_supports;
        $poutre->nombre = $this->nombre;
        $poutre->largeur = $this->largeur;
        $poutre->hauteur = $this->hauteur;
        $poutre->longueur = $this->longueur;
        $poutre->surface = $this->surface;
        $poutre->volume = $this->volume;
        $poutre->save();

        $this->poutres->push($poutre);
    }

    public function update($poutre)
    {
        $poutre->type = $this->type;
        $poutre->distance_entre_supports = $this->distance_entre_supports;
        $poutre->nombre = $this->nombre;
        $poutre->largeur = $this->largeur;
        $poutre->hauteur = $this->hauteur;
        $poutre->longueur = $this->longueur;
        $poutre->surface = $this->surface;
        $poutre->volume = $this->volume;
        $poutre->save();
    }

    public function delete($poutre)
    {
        $poutre->delete();

        $this->poutres = $this->poutres->filter(function ($item) use ($poutre) {
            return $item->id !== $poutre->id;
        });
    }

    public function render()
    {
        return view('livewire.poutre');
    }

}