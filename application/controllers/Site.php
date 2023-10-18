<?php

class Site extends CI_Controller{
  function __construct()
    {
        parent::__construct();
      
        $this->load->model('m_umum');
    }

 
    public function index()
    {
  $data = array(
           'judul' => 'Booking Salon Online'
          
           
           
        );
        $this->template->load('site/template', 'site/home', $data);
    }

}

 