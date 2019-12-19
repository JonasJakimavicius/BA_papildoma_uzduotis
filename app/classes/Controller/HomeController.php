<?php

namespace App\Controller;

use Core\Controller;
use Core\View;

class HomeController extends Controller
{

    public $form;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializePost()
    {
    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializeGet()
    {
        $this->page['content'] = [''];
        $this->page['stylesheets'][] = 'media/CSS/main.css';
        $this->page['scripts']['body_end'][] = 'media/JS/main.js';
        $this->page['scripts']['body_end'][] = 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js';
        $this->page['content'][] = (new \App\Views\SearchForm())->render();
        $this->page['content'][] = (new \App\Views\HomePage())->render();
    }

    public function onRender()
    {
        return (new View($this->page))->render(ROOT . '/core/views/layout.tpl.php');
    }
}

;