<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Search extends Component
{
    public $query;

    public function mount()
    {
        $this->query = '';
    }

    public function updatedQuery()
    {
        $this->emit('search');
    }

    public function render()
    {
        $results = $this->query ? $this->queryResults() : [];

        return view('livewire.search', compact('results'));
    }

    private function queryResults()
    {
        $query = $this->query;

        //$builder = (new \App\Models\Composant())->newQuery();

        if ($query) {
            $builder->where('nom', 'like', '%' . $query . '%');
        }

        return $builder->get();
    }
}
