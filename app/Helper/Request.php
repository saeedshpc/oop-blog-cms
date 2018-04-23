<?php namespace App\Helper;

use App\Contracts\RequestInterface;

class Request implements RequestInterface
{

    /**
     * @param $field
     * @param bool $post
     * @return mixed
     */
    public function input($field, $post = true)
    {
        if ($this->isPost() && $post)
            return isset($_POST[$field]) ? htmlspecialchars($_POST[$field]) : "";

        return isset($_GET[$field]) ? htmlspecialchars($_GET[$field]) : "";

    }

    /**
     * @param bool $post
     * @return mixed
     */
    public function all($post = true)
    {
        if ($this->ispost() && $post)
            return isset($_POST) ? array_map('htmlspecialchars', $_POST) : null;

        return isset($_GET) ? array_map('htmlspecialchars', $_GET) : null;
    }

    /**
     * @return mixed
     */
    public function isPost()
    {
       return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
}