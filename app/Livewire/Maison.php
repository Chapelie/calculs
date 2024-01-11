<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Etage;

class Maison extends Component
{
    public $nombreEtages;

    public function mount()
    {
        $this->nombreEtages = 1;
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

   

    public function getEtages()
    {
        $etages = [];

        for ($i = 1; $i <= $this->nombreEtages; $i++) {
            $etages[] = new Etage();
        }

        return $etages;
    }
    public function render()
    {
        return view('livewire.maison', [
            'etages' => $this->getEtages(),
        ]);
    }
}
