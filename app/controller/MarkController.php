<?php
/**
 * Created by PhpStorm.
 * User: akker
 * Date: 7/20/2018
 * Time: 2:35 PM
 */

class MarkController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->view->render('mark/index');
    }
}