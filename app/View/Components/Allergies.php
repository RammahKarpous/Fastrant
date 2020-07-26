<?php

    namespace App\View\Components;

    use Illuminate\View\Component;

    class Allergies extends Component {
        /**
         * Create a new component instance.
         *
         * @return void
         */
        public function __construct() {
            //
        }

        /**
         * Get the view / contents that represent the component.
         *
         * @return \Illuminate\View\View|string
         */
        public function render() {

//            dd($this->list());

            return view( 'components.allergies', [
                'allergies' => $this->list()
            ] );
        }

        public function list() {
            return [
                'corn'      => [
                    'name' => 'corn',
                    'allergy'    => 'Corn'
                ],
                'eggs'      => [
                    'name' => 'eggs',
                    'allergy'    => 'Eggs'
                ],
                'fish'      => [
                    'name' => 'fish',
                    'allergy'    => 'Fish'
                ],
                'meat'      => [
                    'name' => 'meat',
                    'allergy'    => 'Meat'
                ],
                'milk'      => [
                    'name' => 'milk',
                    'allergy'    => 'Milk'
                ],
                'peanut'    => [
                    'name' => 'peanut',
                    'allergy'    => 'Peanut'
                ],
                'shellfish' => [
                    'name' => 'shellfish',
                    'allergy'    => 'Shellfish'
                ],
                'soy'       => [
                    'name' => 'soy',
                    'allergy'    => 'Soy'
                ],
                'free_nut'  => [
                    'name' => 'free_nut',
                    'allergy'    => 'Free nut'
                ],
                'wheat'     => [
                    'name' => 'wheat',
                    'allergy'    => 'Wheat'
                ],
                'fpies'     => [
                    'name' => 'fpies',
                    'allergy'    => 'FPIES'
                ],
            ];
        }
    }
