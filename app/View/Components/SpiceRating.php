<?php

    namespace App\View\Components;

    use Illuminate\View\Component;
    use App\Product;

    class SpiceRating extends Component {
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
        public function render( ) {
            return view( 'components.spice-rating', [
                'ratings' => $this->list()
            ] );
        }

        public function list() {
            return [
                [
                    'rating' => '0',
                    'spice' => 'No spice'
                ],
                [
                    'rating' => '1',
                    'spice' => 'Mild'
                ],
                [
                    'rating' => '2',
                    'spice' => 'Hot'
                ],
                [
                    'rating' => '3',
                    'spice' => 'Extreme'
                ]
            ];
        }
    }
