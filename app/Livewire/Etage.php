<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Mur;
use App\Livewire\Calculpoto;
use App\Livewire\CalculDalle;
use App\Livewire\Calculfenetre;
use App\Livewire\Calculporte;
use App\Livewire\Poutre;
use App\Livewire\Cloture;
use App\Livewire\Calculfondation;
use App\Livewire\Calculfouille;


class Etage extends Component
{
    public $nombreEtages;

    public function mount()
    {
        $this->nombreEtages = 0;
    }

    public function incrementerNombreEtages()
    {
        $this->nombreEtages++;
    }

    public function decrementerNombreEtages()
    {
        if ($this->nombreEtages > 1) {
            $this->nombreEtages--;
        }
    }

    public function render()
    {
        $murs = [];
        $potos = [];
        if ($this->nombreEtages == 0) {
            $murs[] = new Mur();
            $potos[] = new Calculpoto();
            $clotures[] = new Cloture();
            $fondations[] = new Calculfondation();
            $poutres[] = new Poutre();
            $fouilles[] = new Calculfouille();
            $fenetres[] = new Calculfenetre();
            $porte[] = new Calculporte();
            $dalle[] = new Calculdalle();
        }
        else {
        for ($i = 1; $i <= $this->nombreEtages; $i++) {
            $murs[] = new Mur();
            $potos[] = new Calculpoto();
            $clotures[] = new Cloture();
            $fondations[] = new Calculfondation();
            $poutres[] = new Poutre();
            $fouilles[] = new Calculfouille();
            $fenetres[] = new Calculfenetre();
            $porte[] = new Calculporte();
            $dalle[] = new Calculdalle();
        }
    }
        return view('livewire.etage', [
            'murs' => $murs,
            'potos' => $potos,
            'clotures' => $clotures,
            'fondations' => $fondations,
            'poutres' => $poutres,
            'fouilles' => $fouilles,
            'fenetres' => $fenetres,
            'porte' => $porte,
            'dalle' => $dalle,
        ]);
    }
}
