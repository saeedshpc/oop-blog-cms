<?php namespace App\Controller;

use App\Helper\Validation;
use Plasticbrain\FlashMessages\FlashMessages;

class Controller
{
    public $flash;

    public function __construct()
    {
        $this->flash = new FlashMessages();
    }

    public function validation($data, $rules)
    {
        $validation = new validation();

        $valid = $validation->make($_POST, $rules);

        if(! $valid) {
            foreach($validation->getErrors() as $error) {
                $this->flash->error($error[0]);
            }
            return false;
        }

        return true;

    }
}