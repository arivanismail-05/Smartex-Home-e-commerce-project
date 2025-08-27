<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{

    public $search;

    public $filter;

    public $sortby = 'created_at';

    public $sortdir = 'asc';



    public function sortDir(){
        $this->sortdir = ($this->sortdir === 'asc') ? 'desc' : 'asc';
    }
    public function render()
    {
        $users = ModelsUser::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orWhere('phone', 'like', '%'.$this->search.'%')
        ->orderBy($this->sortby, $this->sortdir)
        ->get();


        if($this->filter) {
            $users = $users->where('location', $this->filter);
        }

        $locations = ModelsUser::all();
        return view('livewire.user', compact('users', 'locations'));
    }
}
