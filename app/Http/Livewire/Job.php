<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Job extends Component
{
    public $job;

    public function addLike()
    {
        if (auth()->check()) {
            auth()->user()->likes()->toggle($this->job->id);
        } else{
        $this->emit('flash', 'Merci de vous connceter pour ajouter une mission à vos favoris', 'info');

        }
        
    }

    public function render()
    {
        return view('livewire.job');
    }
}
