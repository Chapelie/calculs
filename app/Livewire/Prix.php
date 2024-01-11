<?php

namespace App\Http\Livewire;

use App\Models\Prix;
use Livewire\Component;

class Prixs extends Component
{
    public $prix;

    public function mount()
    {
        $this->prix = new Prix();
    }

    public function store()
    {
        $this->prix->nomComposant = $this->input('nomComposant');
        $this->prix->valeur = $this->input('valeur');
        $this->prix->devise = $this->input('devise');
        $this->prix->utilisateur = $this->user()->id;

        $this->prix->save();

        $this->emit('prixAdded');
    }

    public function update($id)
    {
        $prix = Prix::find($id);

        $prix->nomComposant = $this->input('nomComposant');
        $prix->valeur = $this->input('valeur');
        $prix->devise = $this->input('devise');
        $prix->utilisateur = $this->user()->id;

        $prix->save();

        $this->emit('prixUpdated');
    }

    public function delete($id)
    {
        $prix = Prix::find($id);

        $prix->delete();

        $this->emit('prixDeleted');
    }

    public function render()
    {
        return view('livewire.prix');
    }
}
