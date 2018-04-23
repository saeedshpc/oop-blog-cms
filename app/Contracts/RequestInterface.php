<?php namespace App\Contracts;

interface RequestInterface
{

    /**
     * @param $field
     * @param bool $post
     * @return mixed
     */
    public function input($field, $post = true);

    /**
     * @param bool $post
     * @return mixed
     */
    public function all($post = true);

    /**
     * @return mixed
     */
    public function isPost();
}