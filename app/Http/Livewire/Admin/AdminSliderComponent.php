<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSliderComponent extends Component
{
    use WithPagination;

    public function deleteSlide($slide_id)
    {
        $slide = Slider::find($slide_id);
        unlink('images/slider/' . $slide->image);
        $slide->delete();
        session()->flash('message', 'Slide has been deleted succsessfully!');
    }

    public function render()
    {
        $slides = Slider::paginate(10);
        return view('livewire.admin.admin-slider-component', ['slides' => $slides])->layout('layouts.base');
    }
}
