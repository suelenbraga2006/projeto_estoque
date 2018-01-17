<?php
class productsController extends Controller {

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

        $p = new Products();

        $data['list'] = $p->getProducts();

        $this->loadTemplate('products', $data);
    }

    public function add(){
    	$data = array();

    	if(isset($_POST['cod']) && !empty($_POST['cod'])){
    		$cod = addslashes($_POST['cod']);
    		$name = addslashes($_POST['name']);
    		$price = addslashes($_POST['price']);
    		$quantity = addslashes($_POST['quantity']);
    		$min_quantity = addslashes($_POST['min_quantity']);

    		$p = new Products();

    		$p->addProduct($cod, $name, $price, $quantity, $min_quantity);

    		header("Location: ".BASE_URL."products");
    		exit;
    	}

    	$this->loadTemplate('addProduct', $data);
    }

    public function edit($id){
    	$data = array();

    	$p = new Products();

    	if(isset($_POST['cod']) && !empty($_POST['cod'])){
    		$cod = addslashes($_POST['cod']);
    		$name = addslashes($_POST['name']);
    		$price = addslashes($_POST['price']);
    		$quantity = addslashes($_POST['quantity']);
    		$min_quantity = addslashes($_POST['min_quantity']);

    		$p->editProduct($cod, $name, $price, $quantity, $min_quantity, $id);

    		header("Location: ".BASE_URL."products");
    		exit;
    	}

    	$data['product'] = $p->getProduct($id);

    	$this->loadTemplate('editProduct', $data);
    }

}