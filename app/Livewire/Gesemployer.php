<?php

namespace App\Livewire;
use App\Models\Employer;
use Livewire\Component;

class Gesemployer extends Component
{
    public $employer_id;
    public $nom;
    public $prenom;
    public $grade;
    public $role;


    // Méthode pour afficher tous les employeurs


    // Méthode pour créer un nouvel employeur
    public function createEmployer()
    {
        Employer::create([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'grade' => $this->prenom,
            'role' => $this->prenom,

            // Autres champs
        ]);
        $this->resetInputFields();
    }

    // Méthode pour éditer un employeur existant
    public function editEmployer($id)
    {
        $employer = Employer::findOrFail($id);
        $this->employer_id = $id;
        $this->nom = $employer->nom;
        $this->prenom = $employer->prenom;
        $this->grade = $employer->grade;
        $this->role = $employer->role;

    }

    // Méthode pour mettre à jour un employeur
    public function updateEmployer()
    {
        $employer = Employer::findOrFail($this->employer_id);
        $employer->update([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'grade' => $this->grade,
            'role' => $this->role,

        ]);
        $this->resetInputFields();
    }

    // Méthode pour supprimer un employeur
    public function deleteEmployer($id)
    {
        Employer::find($id)->delete();
    }

    // Méthode pour réinitialiser les champs du formulaire
    private function resetInputFields()
    {
        $this->nom = '';
        $this->prenom = '';
        $this->grade = '';
        $this->role = '';

    }
    public function assignerProjet($employeurId, $projetId)
{
    $employeur = Employer::findOrFail($employeurId);
    $employeur->projets()->attach($projetId);
}
public function retirerProjet($employeurId, $projetId)
{
    $employeur = Employer::findOrFail($employeurId);
    $employeur->projets()->detach($projetId);
}


    public function render()
    {
        $employers = Employer::all();

        return view('livewire.gesemployer', ['employers' => $employers]);
    }
}
