<?php

namespace App\Livewire;
use App\Models\Projet;
use App\Models\Tache;
use Livewire\Component;

class Gestache extends Component
{
    public $projetId;
    public $nomTache;
    public $descriptionTache;
    public $dateDebut;
    public $dateFin;
    public $taches;

    public function ajoutertache(){
      return view('livewire.tache.ajutache');
    }
    
    public function mount($projetId)
    {
        $this->projetId = $projetId;
        $this->taches = Projet::find($projetId)->taches;
    }
      // Méthode pour réinitialiser les champs du formulaire



    public function enterTaskProgress($taskId, $progress)
    {
        $task = Tache::findOrFail($taskId);
        $task->evolution = $progress;
        $task->save();
    }
    // Méthode pour filtrer les tâches par état
    public function filterTasks($status)
    {
        $this->taches = Projet::find($this->projetId)->taches()->where('status', $status)->get();
    }
    // Méthode pour effectuer une recherche dans les tâches
    public function searchTasks($term)
    {
        $this->taches = Projet::find($this->projetId)->taches()->where('nomTache', 'like', '%' . $term . '%')->get();
    }
    public function render()
    {
        return view('livewire.gestache');
    }
}
