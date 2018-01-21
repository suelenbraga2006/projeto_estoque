<?php
class usersController extends Controller {

	private $user;

	public function __construct(){
		parent::__construct();

		$this->user = new Users();
		if(!$this->user->checkLogin()){
			header("Location: ".BASE_URL."login");
			exit;
		}
	}

    public function index() {
        $data = array();

        $u = new Users();

        $s = '';

        if(isset($_GET['busca']) && !empty($_GET['busca'])){
        	$s = $_GET['busca'];
        }

        $data['users'] = $u->getUsers($s);

        $this->loadTemplate('users', $data);
    }

    public function add(){
        $data = array();

        if(isset($_POST['number']) && !empty($_POST['number'])){
            $number = addslashes($_POST['number']);
            $name = addslashes($_POST['name']);
            $password = addslashes($_POST['password']);
            $level = addslashes($_POST['level']);
            if(isset($_FILES['photo'])){
                $photo = $_FILES['photo'];
            }else{
                $photo = array();
            }

            $u = new Users();

            if($u->verifyNumber($number)){
                $u->addUser($number, $name, $password, $level, $photo);
            }else{
                $data['msg'] = "<div class='alert alert-danger' role='alert'>
                                  Número de usuário já existe.
                                </div>";
            }

            header("Location: ".BASE_URL."users");
            exit;
        }

        $this->loadTemplate('addUser', $data);
    }

    public function edit($id){
        $data = array();

        $u = new Users();

        if(isset($_POST['number']) && !empty($_POST['number'])){
            $number = addslashes($_POST['number']);
            $name = addslashes($_POST['name']);
            $password = addslashes($_POST['password']);
            $level = addslashes($_POST['level']);
            $photoup = addslashes($_POST['photoup']);
            if(!empty($_FILES['photo'])){
                $photo = $_FILES['photo'];
            }else{
                $photo = array();
            }

            $u->editUsers($number, $name, $password, $level, $photoup, $photo, $id);

            header("Location: ".BASE_URL."users");
            exit;
        }

        $data['user'] = $u->getUser($id);

        $this->loadTemplate('editUser', $data);
    }    

}