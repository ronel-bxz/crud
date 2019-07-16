<?php 
	/**
	* 
	*/
	require('functions.php');
	class Ajax extends Database
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function do_ajax(){
			$method=$_POST['action'];
			$this->$method($_POST);
		}

		public function delete_data($post){
			// echo $post['id'];
			$result=$this->delete_user_data($post['id']);
			if ($result) {
				echo "data deleted";
			}
			else{
				echo "failed to delete data";
			}
		}
	}

	$ajax=new Ajax();
	$ajax->do_ajax();
 ?>