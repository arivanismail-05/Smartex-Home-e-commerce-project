<?php

namespace App\Livewire;

use App\Models\Message as ModelsMessage;
use Livewire\Component;

class Message extends Component
{

    public $search;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';


    public function toggleIsRead($id)
    {
        $message = ModelsMessage::find($id);
        $message->is_read = !$message->is_read;
        $message->save();
        flash()->success('Message status updated successfully.');
    }


    public function delete($id)
    {
        $message = ModelsMessage::find($id);
        $message->delete();
        flash()->success('Message deleted successfully.');
    }
    public function render()
    {

        if($this->sortBy === 'latest'){
            $this->sortBy = 'created_at';
            $this->sortDir = 'DESC';
        }elseif($this->sortBy === 'oldest'){
            $this->sortBy = 'created_at';
            $this->sortDir = 'ASC';
        }

        $messages = ModelsMessage::with('user')
        ->where('content', 'like', '%'.$this->search.'%')
        ->orWhereHas('user', function ($query)  {
                $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->orderBy($this->sortBy, $this->sortDir)
        ->get();
        return view('livewire.message', compact('messages'));
    }
}
