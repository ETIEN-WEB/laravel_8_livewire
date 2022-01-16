<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class Search extends Component
{
    // on appel cet fonction quan on apui touch du bas
    //updatedQuery() s'exécute lorsqu'on clique dans le champ de recherche
     // public string $query = 'aze'; recupere ce que l'utlisateur a saisie dans le input
    // [$this->jobs[$this->selectedIndex]['id']] : dans le tableau(la liste des jobs($this->jobs)) on recupere l'ndx sur lequel on est ($this->selectedIndex) le champ id ('id')
    public string $query = '';
    public $jobs = [];  
    public Int $selectedIndex = 0; 

    public function incrementIndex()
    {
        if ($this->selectedIndex == count($this->jobs) -1) {
            $this->selectedIndex = 0;
            return; 
        }
        $this->selectedIndex++;
    }

    public function decrementIndex()
    { 
        if ($this->selectedIndex == 0) {
            $this->selectedIndex == (count($this->jobs) -1);
            return;
        }
        $this->selectedIndex--;
    }

    public function show_Job()
    {
        if ($this->jobs->isNotEmpty()) {
            return redirect()->route('jobs.show', [$this->jobs[$this->selectedIndex]['id']]);
        }
    }

    public function updatedQuery()
    {
        $words = '%' . $this->query . '%';
        if (strlen($this->query) > 2) {
            $this->jobs = Job::where('title', 'like', $words)
            ->orWhere('description', 'like', $words)
            ->get();
            
        }
    }

    public function resetIndex()
    {
        $this->reset('selectedIndex'); 
    }
   
    public function render()
    {
        return view('livewire.search');
    }
}
