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
            $allergies = collect( [
                [
                    'name'    => 'corn',
                    'allergy' => 'Corn'
                ],
                [
                    'name'    => 'eggs',
                    'allergy' => 'Eggs'
                ],
                [
                    'name'    => 'fish',
                    'allergy' => 'Fish'
                ],
                [
                    'name'    => 'meat',
                    'allergy' => 'Meat'
                ],
                [
                    'name'    => 'milk',
                    'allergy' => 'Milk'
                ],
                [
                    'name'    => 'peanut',
                    'allergy' => 'Peanut'
                ],
                [
                    'name'    => 'shellfish',
                    'allergy' => 'Shellfish'
                ],
                [
                    'name'    => 'soy',
                    'allergy' => 'Soy'
                ],
                [
                    'name'    => 'free_nut',
                    'allergy' => 'Free nut'
                ],
                [
                    'name'    => 'wheat',
                    'allergy' => 'Wheat'
                ],
                [
                    'name'    => 'fpies',
                    'allergy' => 'FPIES'
                ],
                [
                    'name'    => 'no_allergies',
                    'allergy' => 'No allergies'
                ],
            ] );

            return $allergies->all();
        }
    }
