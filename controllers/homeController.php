<?php
class homeController extends Controller {

	private $user;

	public function __construct(){
		parent::__construct();

		$this->user = new Users();
		if(!$this->user->checkLogin()){
			header("Location: ".BASE_URL."login");
		}
	}

    public function index() {
        $data = array();

        $this->loadTemplate('home', $data);
    }

}