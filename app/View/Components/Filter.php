<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Filter extends Component
{
    public $chosenFilter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($chosenFilter)
    {
        $this->chosenFilter = $chosenFilter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.filter');
    }

    public function list(){
        return [
            [
                'value'=>'name,asc',
                'label'=>'a-z'
            ],
            [
                'value'=>'name,desc',
                'label'=>'z-a'
            ],
            [
                'value'=>'price,asc',
                'label'=>'Price (low - high)'
            ],
            [
                'value'=>'price,desc',
                'label'=>'Price (high - low)'
            ]
        ];
    }
}
