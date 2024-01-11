<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Request;

class Calculfenetre extends Component
{

    public $type;
    public $nombre;
    public $imposte;
    public $hauteurImposte;
    public $hauteurFenêtre;
    public $largeurFenêtre;
    public $matériau;

    public $superficieTotale;
    public $superficieImposte;
    public $superficieFenêtre;

    public function mount()
    {
        $this->superficieTotale = 0;
        $this->superficieImposte = 0;
        $this->superficieFenêtre = 0;
    }

    public function updatedType()
    {
        $this->calculerSuperficies();
    }

    public function updatedNombre()
    {
        $this->calculerSuperficies();
    }

    public function updatedHauteurImposte()
    {
        $this->calculerSuperficies();
    }

    public function updatedHauteurFenêtre()
    {
        $this->calculerSuperficies();
    }

    public function updatedLargeurFenêtre()
    {
        $this->calculerSuperficies();
    }

    public function updatedMatériau()
    {
        $this->calculerSuperficies();
    }

    public function calculerSuperficies()
    {
        $this->superficieTotale = 0;
        $this->superficieImposte = 0;
        $this->superficieFenêtre = 0;

        
            switch ($this->type && $this->imposte) {
                case "vitrée" && "oui":
                    $this->superficieTotale = $this->hauteurFenêtre * $this->largeurFenêtre;
                    $this->superficieImposte = $this->hauteurImposte * $this->largeurFenêtre;
                    $this->superficieFenêtre = $this->hauteurFenêtre * $this->largeurFenêtre - $this->hauteurImposte * $this->largeurFenêtre;
                    break;
                case "vitrée" && "Non":
                        $this->superficieFenêtre = $this->hauteurFenêtre * $this->largeurFenêtre;
                        $this->superficieTotale = $this->hauteur * $this->largeurFenêtre * $this->nombre;
                        break;
                case "persienne && oui":
                    $this->superficieTotale = $this->hauteurFenêtre * $this->largeurFenêtre;
                    $this->superficieImposte = $this->hauteurImposte * $this->largeurFenêtre;
                    $this->superficieFenêtre = $this->hauteurFenêtre * $this->largeurFenêtre - $this->hauteurImposte * $this->largeurFenêtre;
                    break;
                case "persienne" && "Non":
                        $this->superficieFenêtre = $this->hauteurFenêtre * $this->largeurFenêtre;
                        $this->superficieTotale = $this->hauteur * $this->largeurFenêtre * $this->nombre;
                        break;
                case "pleine && non":
                    $this->superficieTotale = $this->hauteurFenêtre * $this->largeurFenêtre * $this->nombre;
                    break;
                }
            
            }
            public function store(Request $request)
            {
                // Validation des données
                $this->validate([
                    'type' => 'required|string',
                    'nombre' => 'required|numeric',
                    'imposte' => 'required|string',
                    'hauteurImposte' => 'required|numeric',
                    'hauteurFenêtre' => 'required|numeric',
                    'largeurFenêtre' => 'required|numeric',
                    'matériau' => 'required|string',
                ]);
            
                // Enregistrement de la fenêtre dans la base de données
                $fenetre = new Calculfenetre();
                $fenetre->type = $request->type;
                $fenetre->nombre = $request->nombre;
                $fenetre->imposte = $request->imposte;
                $fenetre->hauteurImposte = $request->hauteurImposte;
                $fenetre->hauteurFenêtre = $request->hauteurFenêtre;
                $fenetre->largeurFenêtre = $request->largeurFenêtre;
                $fenetre->matériau = $request->matériau;
                $fenetre->save();
            
                // Affiche un message de confirmation
                session()->flash('message', 'Fenêtre enregistrée avec succès !');
            }
            
            public function edit(int $id)
            {
                // Récupère la fenêtre à partir de la base de données
                $fenetre = Calculfenetre::findOrFail($id);
            
                // Définit les propriétés du composant avec les valeurs de la fenêtre
                $this->type = $fenetre->type;
                $this->nombre = $fenetre->nombre;
                $this->imposte = $fenetre->imposte;
                $this->hauteurImposte = $fenetre->hauteurImposte;
                $this->hauteurFenêtre = $fenetre->hauteurFenêtre;
                $this->largeurFenêtre = $fenetre->largeurFenêtre;
                $this->matériau = $fenetre->matériau;
            }
            

    public function render()
    {
        return view('livewire.calculfenetre');
    }
}
