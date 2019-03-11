<?php

class Admin extends CI_Controller{
    public function __construct() {
        parent::__construct();
        //Esta parte se necesita para mandar llamar un templete
        $this->load->library("parser");
        $this->load->helper("url");
        $this->load->helper('form');
        /*Este helper fue agregado en la parte helpers/Post_helper*/
        $this->load->helper('Post_helper');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function index(){
       $this->load->view("Admin/test");
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function post_list(){
         $view["body"] = $this->load->view("Admin/post/list",NULL,TRUE);
         $view["title"]="Post";
          $this->parser->parse("Admin/templetes/body",$view);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function post_save(){
        //Esta variable sale de nuestro archivo helpers/Post_helper.php
        $data["data_posted"] = posted();
        //mandamos el arreglo data  a la vista save y tambien tomamos toda la vista para mandarla al templete 
       $view["body"] = $this->load->view("Admin/post/save",$data,TRUE);
        //En esta parte mandamos la vista y lo fijamos el archivo admin/templetes/body  donde se encuentra la variabel {body} 
        //Para que en esa parte ponga la tablita y con eso tenemos para reutilizar codigo
       $view["title"]="Crear post";
        $this->parser->parse("Admin/templetes/body",$view);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////
}