<?php

namespace App\Livewire;
use App\Models\Securite;
use Livewire\Component;

class Incident extends Component
{
    public $projetId;
    public $type;
    public $description;
    public $date;
    public $responsable;

    public $selectedSecurite;

    protected $rules = [
        'type' => 'required',
        'description' => 'required',
        'date' => 'required|date',
        'responsable' => 'required|responsable',

    ];

    public function mount($projetId)
    {
        $this->projetId = $projetId;
    }

    public function createSecurite()
    {
        $this->validate();

        Securite::create([
            'type' => $this->type,
            'description' => $this->description,
            'date' => $this->date,
            'projet_id' => $this->projetId,
            'responsable' => $this->responsable,

        ]);

        $this->resetFields();
    }

    public function editSecurite($securiteId)
    {
        $this->selectedSecurite = Securite::find($securiteId);
        $this->type = $this->selectedSecurite->type;
        $this->description = $this->selectedSecurite->description;
        $this->date = $this->selectedSecurite->date;
        $this->responsable = $this->selectedSecurite->responsable;

    }

    public function updateSecurite()
    {
        $this->validate();

        $this->selectedSecurite->update([
            'type' => $this->type,
            'description' => $this->description,
            'date' => $this->date,
            'responsable' => $this->responsable,

        ]);

        $this->resetFields();
    }

    public function deleteSecurite($securiteId)
    {
        Securite::find($securiteId)->delete();
    }

    private function resetFields()
    {
        $this->type = '';
        $this->description = '';
        $this->date = '';
        $this->responsable = '';

        $this->selectedSecurite = null;
    }

    public function render()
    {
        $securites = Securite::where('projet_id', $this->projetId)->get();
        return view('livewire.incident');
    }
}
