<?php

namespace Core\Forms;

use Core\View;

require '/Users/home/Desktop/php projektai/core/functions/form/validators.php';

class Form extends View
{
    public $filtered_input;

    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    public function getFormAction()
    {
        return filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    }


    public function getFormInput()
    {
        $filter_parameters = [];
        foreach ($this->data['fields'] as $field_id => $field) {
            if (isset($field['filter'])) {
                $filter_parameters[$field_id] = $field['filter'];
            } else {
                $filter_parameters[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
            }
        }

        $this->filtered_input = filter_input_array(INPUT_POST, $filter_parameters);
        return $this->filtered_input;
    }


    public function &validateForm()
    {
        $this->getFormInput();
        $success = true;

        foreach ($this->data['fields'] as $field_id => &$field) {
            $field_value = $this->filtered_input[$field_id];

            // Set field value from submitted form, so the user
            // doesnt have to enter it again if form fails
            $field['value'] = $field_value;

            foreach ($field['extra']['validators'] ?? [] as $validator_id => $validator) {
                // We can make validator receive params, setting it as an array itself
                // in that case, validator id becomes its callback function
                if (is_array($validator)) {
                    $is_valid = $validator_id($field_value, $field, $validator);
                } else {
                    $is_valid = $validator($field_value, $field);
                }
                if (!$is_valid) {
                    $success = false;
                    break;
                }
            }
        }

        if ($success && isset($this->data['validators'])) {
            foreach ($this->data['validators'] as $validator_id => $validator) {
                if (is_array($validator)) {
                    $is_valid = $validator_id($this->filtered_input, $this->data, $validator);
                } else {
                    $is_valid = $validator($this->filtered_input, $this->data);
                }
                if (!$is_valid) {
                    $success = false;
                    break;
                }
            }
        }

        if ($success) {
            if (isset($this->data['callbacks']['success'])) {
                $json_string = $this->formSuccess($this->filtered_input, $this->data);
            }

        } else {
            if (isset($this->data['callbacks']['fail'])) {
                $json_string = $this->formFail($this->filtered_input, $this->data);
            }
        }
        return $json_string;


    }

    public function formSuccess($filtered_input, $data)
    {
    }

    public function formFail($filtered_input, $data)
    {

    }


    public function render($templatePath = '')
    {

        return parent::render('../core/templates/form/form.tpl.php'); // TODO: Change the autogenerated stub
    }

}