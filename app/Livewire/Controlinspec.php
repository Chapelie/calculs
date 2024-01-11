<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inspection;
class Controlinspec extends Component
{
    public $projetId;
    public $type;
    public $description;
    public $date;
    public $inspections;

    public function mount($projetId)
    {
        $this->projetId = $projetId;
        $this->inspections = Inspection::where('projet_id', $projetId)->get();
    }
    public function createOrUpdateInspection()
    {
        Inspection::updateOrCreate(
            ['id' => $this->inspectionId],
            [
                'type' => $this->type,
                'description' => $this->description,
                'date' => $this->date,
                'projet_id' => $this->projetId,
            ]
        );
        $this->resetInputFields();
    }

    public function editInspection($inspectionId)
    {
        $inspection = Inspection::findOrFail($inspectionId);
        $this->type = $inspection->type;
        $this->description = $inspection->description;
        $this->date = $inspection->date;
        // Autres propriétés à éditer si nécessaire
    }

    public function deleteInspection($inspectionId)
    {
        Inspection::find($inspectionId)->delete();
    }

    private function resetInputFields()
    {
        $this->type = '';
        $this->description = '';
        $this->date = '';
        // Réinitialisation d'autres propriétés si nécessaire
    }
    public function render()
    {
        return view('livewire.controlinspec');
    }
}
