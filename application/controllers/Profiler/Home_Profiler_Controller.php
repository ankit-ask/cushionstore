<?php 
   class Home_Profiler_Controller extends CI_Controller {
  
      public function index() {
	
         //enable profiler
      	$this->load->helper(array('url'));
         $this->output->enable_profiler(TRUE); 
         $this->load->view('Home_view'); 
      } 
  
      public function disable() {
	
         //disable profiler 
         $this->output->enable_profiler(FALSE); 
         $this->load->view('Home_view'); 
      }
		
   } 
?> 