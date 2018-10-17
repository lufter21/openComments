<?php
abstract class Core {
	protected $_db;
	public $user;
	public $meta;

	public function __construct($opt = '') {
		$db = DbConnect::getInstance();
		$this->_db = $db->getDb();
		$this->_opt = $opt;
		$this->user = $this->getUser();
		$this->run();
	}

	protected function getUser() {
		session_start();

		$user_info = array();

		if (!empty($_GET['logout']) && $_GET['logout']) {
			SetCookie('access','');
			unset($_SESSION['access']);
			header('Location: /');
			exit;
		} else {
			if(!$_SESSION['access']){
				if($_COOKIE['access']){
					$access_key = $_SESSION['access'] = $_COOKIE['access'];
				}
			} else {
				$access_key = $_SESSION['access'];
			}

			if ($access_key) {
				$sql_users = $this->_db->prepare('SELECT * FROM users WHERE access_key=?');
				$sql_users->execute(array($access_key));
				$user_data = $sql_users->fetch(PDO::FETCH_ASSOC);

				if ($user_data) {
					$user_info = array(
						'user_id'=>$user_data['id'],
						'name'=>$user_data['name'],
						'avatar'=>$user_data['avatar']
					);
				}
			}
		}
		
		return $user_info;
	}
}
?>