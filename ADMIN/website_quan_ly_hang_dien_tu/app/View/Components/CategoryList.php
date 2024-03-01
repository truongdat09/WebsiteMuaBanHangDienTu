<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryList extends Component
{
    public $catList;
    public function __construct($catList)
    {
        $this->catList = $catList;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-list');
    }
}