<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangeLocationComponent extends Component
{
    public $streetnumber;
    public $routes;
    public $city;
    public $country;
    public $zipcode;

    public function changeLocation()
    {
        session()->put('streetnumber', $this->streetnumber);
        session()->put('routes', $this->routes);
        session()->put('city', $this->city);
        session()->put('country', $this->country);
        session()->put('zipcode', $this->zipcode);
        session()->flash('message', 'Location has been changed');
        $this->emitTo('location-component', 'refreshComponent');
    }

    public function render()
    {

        return view('livewire.change-location-component')->layout('layouts.base');
    }
}
