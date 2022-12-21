<?php

namespace App\Http\Livewire;

use App\Models\UserVechicle;
use Livewire\Component;
use App\Models\Vechicle;
use Illuminate\Support\Facades\Auth;

class Addvechicles extends Component
{
    public $vechicle_id;

    public function saveUserVechicle()
    {
        // dd('Aqui deveria vir o id do carro: ' . $this->vechicle_id);
        UserVechicle::create([
            'user_id' => Auth::user()->id,
            'vechicle_id' => $this->vechicle_id,
        ]);
    }

    public function render()
    {
        $vechicles = Vechicle::all();
        return view('livewire.addvechicles', ['vechicles' => $vechicles]);
    }
}
