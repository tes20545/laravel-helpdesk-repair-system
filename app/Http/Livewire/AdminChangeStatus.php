<?php

namespace App\Http\Livewire;

use App\Models\Helpdesk;
use App\Models\Technician;
use Livewire\Component;

class AdminChangeStatus extends Component
{
    public $id_helpdesk,$status_now,$technic,$tech_id;

    public function mount()
    {
        $this->technic = Technician::all();
        $this->status_now = Helpdesk::where('id',$this->id_helpdesk)->first();
    }

    public function render()
    {
        return view('livewire.admin-change-status');
    }

    public function status($status)
    {
        Helpdesk::where('id',$this->id_helpdesk)->update(['status' => $status]);
    }

    public function technical()
    {
        if($this->tech_id == null){
            
        }else{
            Helpdesk::where('id',$this->id_helpdesk)->update(['technician_id' => $this->tech_id]);
        }
    }
}
