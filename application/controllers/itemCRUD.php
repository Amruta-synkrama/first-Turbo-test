

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class itemcrud extends CI_Controller {


   public $itemcrud;



   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
      parent::__construct(); 


      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('ItemcrudModel');


      $this->itemcrud = new ItemcrudModel;
   }


   /**
    * Display Data this method.
    *
    * @return Response
   */
   public function index()
   {
       $data['data'] = $this->itemcrud->get_itemCRUD();


       $this->load->view('templates/header');       
       $this->load->view('itemcrud/list',$data);
       $this->load->view('templates/footer');
   }


   /**
    * Show Details this method.
    *
    * @return Response
   */
   public function show($id)
   {
      $item = $this->itemcrud->find_item($id);


      $this->load->view('templates/header');
      $this->load->view('itemcrud/show',array('item'=>$item));
      $this->load->view('templates/footer');
   }


   /**
    * Create from display on this method.
    *
    * @return Response
   */
   public function create()
   {
      $this->load->view('templates/header');
      $this->load->view('itemcrud/create');
      $this->load->view('templates/footer');   
   }


   /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function store()
   {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('itemcrud/create'));
        }else{
           $this->itemcrud->insert_item();
           redirect(base_url('itemcrud'));
        }
    }


   /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($id)
   {
       $item = $this->itemcrud->find_item($id);


       $this->load->view('templates/header');
       $this->load->view('itemcrud/edit',array('item'=>$item));
       $this->load->view('templates/footer');
   }


   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($id)
   {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('itemcrud/edit/'.$id));
        }else{ 
          $this->itemcrud->update_item($id);
          redirect(base_url('itemcrud'));
        }
   }


   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
       $item = $this->itemcrud->delete_item($id);
       redirect(base_url('itemcrud'));
   }
}