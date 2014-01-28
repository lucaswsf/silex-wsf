<?php
namespace Blog;

Class Controller
{
    public $app;
    public $data = array();

    public function __construct($app)
    {
        $this->app = $app;
    }
}
