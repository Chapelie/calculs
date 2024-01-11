<?php

namespace App\Livewire;

use Livewire\Component;

class Mur extends Component
{
    public $hauteur;
    public $epaisseur;
    public $longueur;
    public $typeMur;
    public $surfaceCreuse;
    public $surfacePleine;
    public $volumeBeton;
    public $volumeBetonArmee;

    public function mount()
    {
        $this->surfaceCreuse = 0;
        $this->surfacePleine = 0;
        $this->volumeBeton = 0;
        $this->volumeBetonArmee = 0;
    }

    public function calculer()
    {
        switch ($this->typeMur) {
           //pleinte,ouverture prise en charge
           //ouverure beantes
            //a refaire
            case 'creux':
                $this->surfaceCreuse = $this->hauteur * $this->epaisseur * $this->longueur;
                $this->surfacePleine = 0;
                $this->volumeBeton = $this->surfaceCreuse * 0.25;
                $this->volumeBetonArmee = $this->surfaceCreuse * 0.35;
                break;
            case 'plein':
                $this->surfacePleine = $this->hauteur  * $this->longueur;
                $this->surfaceCreuse = 0;
                $this->volumeBeton = $this->surfacePleine * 0.25;
                $this->volumeBetonArmee = $this->surfacePleine * 0.35;
                break;
            default:
                $this->surfaceCreuse = $this->hauteur * $this->epaisseur * $this->longueur * 0.9;
                $this->surfacePleine = $this->hauteur * $this->epaisseur * $this->longueur * 0.1;
                $this->volumeBeton = $this->surfacePleine * 0.25;
                $this->volumeBetonArmee = $this->surfacePleine * 0.35;
                break;
        }
    }

    public function store()
    {
        $mur = new Mur();
        $mur->hauteur = $this->hauteur;
        $mur->epaisseur = $this->epaisseur;
        $mur->longueur = $this->longueur;
        $mur->type = $this->typeMur;
        $mur->save();

        $this->reset();
    }

    public function update($id)
    {
        $mur = Mur::findOrFail($id);
        $mur->hauteur = $this->hauteur;
        $mur->epaisseur = $this->epaisseur;
        $mur->longueur = $this->longueur;
        $mur->type = $this->typeMur;
        $mur->save();

        $this->reset();
    }

    public function delete($id)
    {
        $mur = Mur::findOrFail($id);
        $mur->delete();

        $this->reset();
    }

    public function render()
    {
        return view('livewire.mur');
    }
}
