<?php

namespace App\Livewire;
use App\Models\Chantier;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comchantiers extends Component
{
    
    public $nom;
    public $etages;
    public $superficie;
    public $nombre_batiments;
    public $cloture_id;
    public $client_id;

    public function mount()
    {
        $this->client_id = Auth::user()->id;
    }

    public function create()
    {
        $chantier = Chantier::create([
            'nom' => $this->nom,
            'etages' => $this->etages,
            'superficie' => $this->superficie,
            'nombre_batiments' => $this->nombre_batiments,
            'cloture_id' => $this->cloture_id,
            'client_id' => $this->client_id,
        ]);

        $this->reset();

        $this->emit('chantierCreated', $chantier);
    }

    /*public function edit($id)
    {
        $chantier = Chantier::find($id);

        $this->nom = $chantier->nom;
        $this->etages = $chantier->etages;
        $this->superficie = $chantier->superficie;
        $this->nombre_batiments = $chantier->nombre_batiments;
        $this->cloture_id = $chantier->cloture_id;
        $this->client_id = $chantier->client_id;
    }*/

   /* public function update()
    {
        $chantier = Chantier::find($this->id);

        $chantier->nom = $this->nom;
        $chantier->etages = $this->etages;
        $chantier->superficie = $this->superficie;
        $chantier->nombre_batiments = $this->nombre_batiments;
        $chantier->cloture_id = $this->cloture_id;
        $chantier->client_id = $this->client_id;

        $chantier->save();

        $this->reset();

        $this->emit('chantierUpdated', $chantier);
    }

    public function delete($id)
    {
        $chantier = Chantier::find($id);

        $chantier->delete();

        $this->emit('chantierDeleted', $chantier);
    }*/

    public function render()
    {
       

        return view('livewire.comchantiers');
    }
}

