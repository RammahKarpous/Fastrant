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

            return view( 'components.allergies', [
                'allergies' => $this->list()
            ] );
        }

        public function list() {
            return [
                'corn'      => [
                    'identifier' => 'corn',
                    'allergy'    => 'Corn'
                ],
                'eggs'      => [
                    'identifier' => 'eggs',
                    'allergy'    => 'Eggs'
                ],
                'fish'      => [
                    'identifier' => 'fish',
                    'allergy'    => 'Fish'
                ],
                'meat'      => [
                    'identifier' => 'meat',
                    'allergy'    => 'Meat'
                ],
                'milk'      => [
                    'identifier' => 'milk',
                    'allergy'    => 'Milk'
                ],
                'peanut'    => [
                    'identifier' => 'peanut',
                    'allergy'    => 'Peanut'
                ],
                'shellfish' => [
                    'identifier' => 'shellfish',
                    'allergy'    => 'Shellfish'
                ],
                'soy'       => [
                    'identifier' => 'soy',
                    'allergy'    => 'Soy'
                ],
                'free_nut'  => [
                    'identifier' => 'free_nut',
                    'allergy'    => 'Free nut'
                ],
                'wheat'     => [
                    'identifier' => 'wheat',
                    'allergy'    => 'Wheat'
                ],
                'fpies'     => [
                    'identifier' => 'fpies',
                    'allergy'    => 'FPIES'
                ],
            ];
        }
    }
