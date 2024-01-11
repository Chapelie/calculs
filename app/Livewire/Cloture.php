<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Cloture extends Component
{
    public $longueurTotale;
    public $hauteur;
    public $hauteurMax;
    public $hauteurMin;
    public $hauteurSoubassement;
    public $largeurSoubassement;
    public $largeurFondations;
    public $aPeindre;

    

    public function mount()
    {
        $this->hauteur = 1;
        $this->hauteurMax = 2;
        $this->hauteurMin = 0.5;
        $this->hauteurSoubassement = 0.5;
        $this->largeurSoubassement = 0.2;
        $this->largeurFondations = 0.3;
        $this->aPeindre = true;
    }

    public function calculer()
    {
        $this->hauteur = max($this->hauteurMin, min($this->hauteur, $this->hauteurMax));
        $this->surfaceSoubassement = $this->hauteurSoubassement * $this->largeurSoubassement * $this->longueurTotale;
        $this->surfaceFondations = $this->hauteur * $this->largeurFondations * $this->longueurTotale;
        $this->volumeBetonSoubassement = $this->surfaceSoubassement * 0.25;
        $this->volumeBetonFondations = $this->surfaceFondations * 0.25;
    }

    public function store()
    {
        DB::table('clotures')->insert([
            'longueurTotale' => $this->longueurTotale,
            'hauteur' => $this->hauteur,
            'hauteurMax' => $this->hauteurMax,
            'hauteurMin' => $this->hauteurMin,
            'hauteurSoubassement' => $this->hauteurSoubassement,
            'largeurSoubassement' => $this->largeurSoubassement,
            'largeurFondations' => $this->largeurFondations,
            'aPeindre' => $this->aPeindre,
        ]);

        $this->reset();
    }

    public function update($id)
    {
        DB::table('clotures')->where('id', $id)->update([
            'longueurTotale' => $this->longueurTotale,
            'hauteur' => $this->hauteur,
            'hauteurMax' => $this->hauteurMax,
            'hauteurMin' => $this->hauteurMin,
            'hauteurSoubassement' => $this->hauteurSoubassement,
            'largeurSoubassement' => $this->largeurSoubassement,
            'largeurFondations' => $this->largeurFondations,
            'aPeindre' => $this->aPeindre,
        ]);

        $this->reset();
    }

    public function delete($id)
    {
        DB::table('clotures')->where('id', $id)->delete();

        $this->reset();
    }

    public function render()
    {
        return view('livewire.cloture');
    }
}
