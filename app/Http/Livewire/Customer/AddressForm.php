<?php

namespace App\Http\Livewire\Customer;

use App\Models\User;
use Livewire\Component;

class AddressForm extends Component
{
    public $address,$open=false;

    public function render()
    {
        return view('livewire.customer.address-form');
    }

    public function search_map()
    {
        $this->address;
    }

    public function save()
    {
        $address = User::find(request()->user()->id);

        $address->address = $this->address;

        if($address->save()){
            $this->reset('address');
            session()->flash('status','สำเร็จ');
        }

    }

    public function edit()
    {
        $this->open = true;
    }
}
