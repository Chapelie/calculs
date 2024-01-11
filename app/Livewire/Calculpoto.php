<?
namespace App\Livewire;

use Livewire\Component;
use App\Models\Poto;

class Calculpoto extends Component
{
    public $nombre;
    public $type;
    public $hauteur;
    public $largeur;//dimension de la section du poto
    public $epaisseur;//dimension de la section du poto
    public $surface;
    public $surfaceTotale;
    public $diametre;
    public $volume;
    public $volumeTotale;
    public $potos;

    public function mount()
    {
        $this->potos = Calculpoto::all();
    }

    public function calculer()
    {
        if ($this->type == 'rectangle') {
            $this->surface = $this->largeur * $this->hauteur;
            $this->surfaceTotale = $this->surface * $this->nombre;
            $this->volume = $this->largeur * $this->epaisseur * $this->hauteur;
            $this->volumeTotale = $this->volume * $this->nombre;
        } else if ($this->type == 'circulaire') {
            $this->volumeTotale = $this->volume * $this->nombre;
            $this->volume = pi() * pow(($this->diametre / 2), 2) * $this->hauteur;
        }
    }

    public function stocker()
    {
        $poto = new Calculpoto();
        $poto->nombre = $this->nombre;
        $poto->type = $this->type;
        $poto->hauteur = $this->hauteur;
        $poto->largeur = $this->largeur;
        $poto->epaisseur = $this->epaisseur;
        $poto->surface = $this->surface;
        $poto->surfaceTotale = $this->surfaceTotale;
        $poto->diametre = $this->diametre;
        $poto->volume = $this->volume;
        $poto->volumeTotale = $this->volumeTotale;
        $poto->save();

        $this->potos->push($poto);
    }

    public function mettreAJour($poto)
    {
        $poto->nombre = $this->nombre;
        $poto->type = $this->type;
        $poto->hauteur = $this->hauteur;
        $poto->largeur = $this->largeur;
        $poto->epaisseur = $this->epaisseur;
        $poto->surface = $this->surface;
        $poto->surfaceTotale = $this->surfaceTotale;
        $poto->diametre = $this->diametre;
        $poto->volume = $this->volume;
        $poto->volumeTotale = $this->volumeTotale;
        $poto->save();
    }

    public function supprimer($poto)
    {
        $poto->delete();

        $this->potos = $this->potos->filter(function ($item) use ($poto) {
            return $item->id !== $poto->id;
        });
    }

    public function render()
    {
        return view('livewire.calculpoto', ['potos' => $this->potos]);
    }
}
