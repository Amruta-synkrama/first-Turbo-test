<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ImageUploadController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
    }

    public function index() {
        $data['image_metadata'] = NULL;
        $this->load->view('upload_form',$data);
    }

    public function store() {
        $config['upload_path'] = './images';
        $config['allowed_types'] = 'jpg|jpeg|png|JPG';
        // $config['max_size'] = 2000;
        // $config['max_width'] = 1500;
        // $config['max_height'] = 1500;
        // print_r($config);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $data['image_metadata'] = NULL;
            $data['error'] = $this->upload->display_errors();
            $this->load->view('upload_form', $data);
        } else {
            $data = array('image_metadata' => $this->upload->data());

            $this->load->view('upload_form', $data);
        }




    }

}