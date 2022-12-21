<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserVechicle;
use App\Models\Vechicle;
use Illuminate\Support\Facades\Auth;


class Vechicles extends Component
{
    public $uservechicleid;
    public $vechicle_id;

    public $uservechicles;
    public $vechicles;

    public function mount()
    {
        $this->uservechicles = User::with('vechicles')->where('id', \Auth::user()->id)->get();
        $this->vechicles = Vechicle::all();
    }


    public function saveUserVechicle()
    {
        // dd('Aqui deveria vir o id do carro: ' . $this->vechicle_id);
        UserVechicle::create([
            'user_id' => Auth::user()->id,
            'vechicle_id' => $this->vechicle_id,
        ]);

        $this->uservechicles = User::with('vechicles')->where('id', \Auth::user()->id)->get();;
    }

    public function render()
    {

        return view('livewire.vechicles');
    }
}
