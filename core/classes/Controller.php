<?php

namespace Core;

use App\Views\Navbar;

class Controller
{

    /**
     * Page data container
     * @var array
     */
    protected $page;

    public function __construct()
    {
        // Init Page Defaults
        $this->page = [
            'title' => 'Įmonių duomenys',
            'stylesheets' => ["https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"],
            'scripts' => [
                'head' => [],
                'body_start' => [],
                'body_end' => [],
            ],
            'header' => '',
            'footer' => '',
            'content' => [
            ],
        ];
    }

    public function onRender()
    {
        return (new View($this->page))->render(ROOT . $templatePath);
    }

}
