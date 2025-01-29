<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */

    public $colortext;
    public $colorbg;

    public function __construct($colortext = 'red', $colorbg = 'yellow') // Se le asigna un valor por defecto
    {
        $this->colortext = $colortext;
        $this->colorbg = $colorbg;
        //
    }

    public function peligro() {
        if ($this->colortext == 'red') {
            return '¡Peligro!';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
