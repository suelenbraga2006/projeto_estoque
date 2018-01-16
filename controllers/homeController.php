<?php
class homeController extends Controller {

	public function __construct(){
		//parent::__contruct();

		if(!isset($_SESSION['token'])){
			header("Location: ".BASE_URL."login");
		}
	}

    public function index() {
        $data = array();

        $this->loadTemplate('home', $data);
    }

}