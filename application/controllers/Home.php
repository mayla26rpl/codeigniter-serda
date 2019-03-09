<?php

class Home extends CI_Controller {
    public function index()
    { 
        if ($this->session->userdata('login_status') == TRUE) {
            $data['content_view'] = 'dashboard_view';
            $this->load->view('template', $data);
         } else {
             redirect('login');
         }
    }
       
}