<?php

use Blog\Controller;

Class UserController extends Controller
{

    public function getLogin()
    {
        $data = array();

        return $this->app['twig']->render('user/login.twig', $data);
    }

}
