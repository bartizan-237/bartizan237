<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Job;

class Jobs extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $fields = Job::select('id', 'industry', 'name')->get()->groupBy("industry");
        return view('components.jobs', [
            'fields' => $fields,
        ]);
    }
}
