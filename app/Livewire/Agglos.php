<?
namespace App\Livewire;

use Livewire\Component;
use App\Models\Mur;

class Agglos extends Component
{
    public $typeMur;
    public $surface;
    public $nombre;

    public function mount()
    {
        $this->typeMur = 'creux';
        $this->surface = 0;
        $this->nombre = 0;
    }

    public function calculer()
    {
        $mur = Mur::where('type', $this->typeMur)->first();

        $this->surface = $this->surfaceCreuse();
        $this->nombre = $this->surface / $mur->surfaceAgglo;
    }

    public function surfaceCreuse()
    {
        switch ($this->typeMur) {
            case 'creux':
                return $this->hauteur * $this->epaisseur * $this->longueur;
            case 'plein':
                return 0;
            default:
                return $this->hauteur * $this->epaisseur * $this->longueur * 0.9;
        }
    }

    public function render()
    {
        return view('livewire.agglos');
    }
}
