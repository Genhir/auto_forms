<?php 
class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		redirect('dashboard', 'refresh');
	}
}
?>