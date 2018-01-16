<?php
class loginController extends Controller {

    public function index() {
        $data = array();

        if(isset($_POST['number']) && !empty($_POST['number'])){
        	$number = addslashes($_POST['number']);
        	$password = addslashes($_POST['password']);

        	$u = new Users();

        	if($u->verifyUser($number, $password)){
        		$token = $u->createToken($number);
        		$_SESSION['token'] = $token;
        		header("Location: ".BASE_URL);
        	}else{
        		$data['msg'] = "<div class='alert alert-danger' role='alert'>
								  Número e/ou senha inválidos.
								</div>";
        	}
        }

        $this->loadTemplate('login', $data);
    }

    public function sair(){
        session_start();
        unset($_SESSION['token']);
        header("Location: ".BASE_URL."login");
    }

}