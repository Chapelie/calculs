<?php

namespace App\Livewire;
use App\Models\Client;
use Livewire\Component;

class Batiments extends Component
{
    public $nom;
    public $type;
    public $surface;
    public $nombre_etages;
    public $client_id;

    public function store()
    {
        $this->validate([
            'nom' => 'required|string',
            'type' => 'required|string',
            'surface' => 'required|numeric',
            'nombre_etages' => 'required|numeric',
            'client_id' => 'required|integer',
        ]);

        Batiments::create([
            'nom' => $this->nom,
            'type' => $this->type,
            'surface' => $this->surface,
            'nombre_etages' => $this->nombre_etages,
            'client_id' => $this->client_id,
        ]);

        session()->flash('message', 'Bâtiment enregistré avec succès!');

        $this->resetForm();
    }

    private function resetForm()
    {
        $this->nom = '';
        $this->type = '';
        $this->surface = '';
        $this->nombre_etages = '';
        $this->client_id = '';
    }
    public function render()
    {
        $clients = Client::all();
        return view('livewire.batiments',compact('clients'));
    }
}
