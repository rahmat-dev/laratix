<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
  public $active;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($active)
  {
    $this->active = $active;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.menu');
  }

  public function listMenu()
  {
    return [
      [
        'label' => 'Dashboard'
      ],
      [
        'label' => 'Movies'
      ],
      [
        'label' => 'Theaters'
      ],
      [
        'label' => 'Tickets'
      ],
      [
        'label' => 'Users'
      ],
    ];
  }

  public function isActive($label)
  {
    return $label === $this->active;
  }
}
