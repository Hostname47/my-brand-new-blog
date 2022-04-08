<?php

namespace App\View\Components\Admin\Post\PanelManagementSections;

use Illuminate\View\Component;

class AdSection extends Component
{
    public $post;
    
    public function __construct($post=null)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render($data=[])
    {
        return view('components.admin.post.panel-management-sections.ad-section', $data);
    }
}
