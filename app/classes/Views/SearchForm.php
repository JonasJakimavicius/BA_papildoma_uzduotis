<?php

namespace App\Views;

use App\App;
use Core\Forms\Form;

class SearchForm extends Form
{
    protected $data = [
        'attr' => [
            'method' => 'POST',
            'id' => 'searchForm'
        ],
        'fields' => [
            'code' => [
                'type' => 'text',
                'label' => 'Įveskite ieškomos įmonės kodą',

                'extra' => [
                    'attr' => [
                        'placeholder' => 'Įmonės kodas',
                        'class' => 'searchInput',
                    ],
                    'validators' => [
                        'validate_not_empty',
                    ],
                ],
            ],

        ],
        'buttons' => [
            'search' => [
                'type' => 'submit',
                'value' => 'search',
                'name' => 'action',
                'title' => 'Ieškoti',
                'extra'=>[
                    'attr'=>[
                        'class'=>'search-btn'
                    ],
                ],
            ],
            'export' => [
                'type' => 'submit',
                'value' => 'export',
                'name' => 'action',
                'title' => 'Parsisiųsti CSV failą',
                'extra'=>[
                    'attr'=>[
                        'class'=>'export-btn'
                    ],
                ],
            ],
        ],
        'validators' => [
        ],
        'callbacks' => [
            'success' => 'form_success',
            'fail' => 'form_fail',
        ],
    ];

    public function __construct()
    {
        parent::__construct($this->data);
    }

    public function formSuccess($filtered_input, $data)
    {

    }

    public function formFail($filtered_input, $data)
    {
        try {
            return $this->render();
        } catch (\Exception $e) {
        }
    }

    public function render($templatePath = '')
    {
        return parent::render('../core/templates/form/form.tpl.php'); // TODO: Change the autogenerated stub
    }
}