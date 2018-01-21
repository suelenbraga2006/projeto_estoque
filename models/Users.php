<?php
class Users extends Model{

	private $info;

	public function getUsers($s=''){
		$array = array();

		if(!empty($s)){

			$sql = "SELECT * FROM users WHERE user_number = :unumber OR user_name LIKE :uname";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":unumber", $s);
			$sql->bindValue(":uname", '%'.$s.'%');
			$sql->execute();

		}else{

			$sql = "SELECT * FROM users";
			$sql = $this->db->query($sql);

		}

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getUser($id){
		$array = array();

		$sql = "SELECT * FROM users WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function verifyUser($number, $pass){

		$sql = "SELECT * FROM users WHERE user_number = :unumber AND user_pass = :upass";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":unumber", $number);
		$sql->bindValue(":upass", MD5($pass));
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}

	}

	public function verifyNumber($number){
		$sql = "SELECT * FROM users WHERE user_number = :unumber";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":unumber", $number);
		$sql->execute();

		if($sql->rowCount() > 0){
			return false;
		}else{
			return true;
		}
	}

	public function createToken($number){

		$token = MD5(time().rand(0,9999).time().rand(0,9999));

		$sql = "UPDATE users SET user_token = :token WHERE user_number = :unumber";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":unumber", $number);
		$sql->bindValue(":token", $token);
		$sql->execute();

		return $token;

	}

	public function checkLogin(){

		if(!empty($_SESSION['token'])){
			$token = $_SESSION['token'];
			$sql = "SELECT * FROM users WHERE user_token = :token";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":token", $token);
			$sql->execute();

			if($sql->rowCount() > 0){
				$this->info = $sql->fetch();
				return true;
			}
		}

		return false;

	}

	public function addUser($number, $name, $password, $level, $photo){

		$tmpname = 'no-photo.jpg';

		if(count($photo) > 0){
			$type = $photo['type'];
			if(in_array($type, array('image/jpeg','image/png'))){
				$tmpname = md5(time().rand(0,9999)).'.jpg';
				move_uploaded_file($photo['tmp_name'], 'assets/images/'.$tmpname);

				list($widt_orig, $height_orig) = getimagesize('assets/images/'.$tmpname);
				$ratio = $widt_orig / $height_orig;

				$width = 100;
				$height = 100;

				if($width / $height > $ratio){
					$width = $height * $ratio;
				}else{
					$height = $width / $ratio;
				}

				$img = imagecreatetruecolor($width, $height);

				if($type == 'image/jpeg'){
					$origi = imagecreatefromjpeg('assets/images/'.$tmpname);
				}elseif($type == 'image/png'){
					$origi = imagecreatefrompng('assets/images/'.$tmpname);
				}

				imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $widt_orig, $height_orig);

				imagejpeg($img, 'assets/images/'.$tmpname, 80);

			}
		}

		$sql = "INSERT INTO users (user_number, user_name, user_pass, user_level, user_photo) VALUES (:unumber, :uname, :upass, :ulevel, :uphoto)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":unumber", $number);
		$sql->bindValue(":uname", $name);
		$sql->bindValue(":upass", MD5($password));
		$sql->bindValue(":ulevel", $level);
		$sql->bindValue(":uphoto", $tmpname);
		$sql->execute();

	}

	public function editUsers($number, $name, $password, $level, $photoup, $photo, $id){

		$currentpass = '';

		$sql = $this->db->prepare("SELECT user_pass FROM users WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$currentpass = $sql->fetch();
			if($currentpass['user_pass'] != $password){
				$password = MD5($password);
			}
		}

		$tmpname = $photoup;

		if(count($photo) > 0){
			$type = $photo['type'];
			if(in_array($type, array('image/jpeg','image/png'))){
				$tmpname = md5(time().rand(0,9999)).'.jpg';
				move_uploaded_file($photo['tmp_name'], 'assets/images/'.$tmpname);

				list($widt_orig, $height_orig) = getimagesize('assets/images/'.$tmpname);
				$ratio = $widt_orig / $height_orig;

				$width = 100;
				$height = 100;

				if($width / $height > $ratio){
					$width = $height * $ratio;
				}else{
					$height = $width / $ratio;
				}

				$img = imagecreatetruecolor($width, $height);

				if($type == 'image/jpeg'){
					$origi = imagecreatefromjpeg('assets/images/'.$tmpname);
				}elseif($type == 'image/png'){
					$origi = imagecreatefrompng('assets/images/'.$tmpname);
				}

				imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $widt_orig, $height_orig);

				imagejpeg($img, 'assets/images/'.$tmpname, 80);

			}
		}

		$sql = "UPDATE users SET user_number = :unumber, user_name = :uname, user_pass = :upass, user_level = :ulevel, user_photo = :uphoto WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":unumber", $number);
		$sql->bindValue(":uname", $name);
		$sql->bindValue(":upass", $password);
		$sql->bindValue(":upass", $password);
		$sql->bindValue(":ulevel", $level);
		$sql->bindValue(":uphoto", $tmpname);
		$sql->bindValue(":id", $id);
		$sql->execute();

	}

}
?>