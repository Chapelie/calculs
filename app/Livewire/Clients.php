<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class Clients extends Component
{
    public $nom;
    public $nomEntreprise;
    public $mail;
    public $adresse;
    public $numero;

    protected $auth;
    public $user_id;

    public function __construct()
    {
        $this->auth = Auth::class;
        $this->user_id = Auth::user()->id;
    }

    public function createClient()
    {
        $maxId = Client::max('id');
        if ($maxId == null) {
            $maxId = 1;
        }else {
        $maxId++;
        }


        // Validate the data
        $validator = Validator::make([
            'mail' => $this->mail,
            'numero' => $this->numero,
        ], [
            'mail' => 'required|email',
            'numero' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            // Return the validation errors
            return $validator->errors();
        }

        // Create the new client
        $client = new Client();
        $client->nom = $this->nom;
        $client->nom_entreprise = $this->nomEntreprise;
        $client->mail = $this->mail;
        $client->adresse = $this->adresse;
        $client->numero = $this->numero;
        $client->id = $maxId;
        $client->users_id = Auth::user()->id;
        $client->save();
        session()->flash('message', 'Fouille enregistrée avec succès !');

        // Redirect to the client list
    }
    public function render()
    {
        return view('livewire.clients');
    }
}
