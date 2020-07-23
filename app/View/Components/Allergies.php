<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Allergies extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $allergies = [
          'Corn Allergy',
          'Eggs Allergy',
          'Fish Allergy',
          'Meat Allergy',
          'Milk Allergy',
          'Peanut Allergy',
          'Shellfish Allergy',
          'Soy Allergy',
          'Free Nut Allergy',
          'Wheat Allergy',
          'FPIES Allergy',
        ];
        return view('components.allergies', [
            'allergies' => $allergies
        ]);
    }
}
