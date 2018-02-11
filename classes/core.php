<?php
abstract class Core {
	
	protected $_db;
	public $user;

	public function __construct() {
		$db = DbConnect::getInstance();
		$this->_db = $db->getDb();
		$this->user = $this->getUser();
		$this->run();
	}

	protected function getUser() {

		session_start();

		if(!$_SESSION['access']){
			if($_COOKIE['access']){
				$access_key = $_SESSION['access'] = $_COOKIE['access'];
			}
		} else {
			$access_key = $_SESSION['access'];
		}

		if ($access_key) {

			$sql_users = $this->db->prepare('SELECT * FROM users WHERE access_key=?');
			$sql_users->execute(array($access_key));
			$user_data = $sql_users->fetch(PDO::FETCH_ASSOC);

			if ($user_data) {
				$user_info = array(
					'user_id'=>$user_data['id'],
					'name'=>$user_data['name'],
					'country'=>$user_data['country'],
					'registration_date'=>$user_data['registration_date']
					);
			}

		}

		return $user_info ?: array();
	}
	
	protected function getMenu($menu_arr){
		$menu = '<ul class="menu">';
		foreach($menu_arr as $key=>$val){
			$menu .= '<li class="menu__item ';
			
			if ($key == $this->_route) {
				$menu .= 'menu__item_current';
			} else if($key == $this->_template){
				$menu .= 'menu__item_current-parent';
			} else if (is_array($val)){
				foreach($val[1] as $s_key=>$s_val){
					if ($s_key == $this->_route) {
						$menu .= 'menu__item_current-parent';
					}
				}
			}
			
			if(is_array($val)){
				$menu .= ' menu__item_has-sub-menu"><a href="/'.$key.'">'.$val[0].'</a>';
				$menu .= '<ul class="menu__sub-menu">';
				foreach($val[1] as $s_key=>$s_val){
					$menu .= '<li><a href="/'.$s_key.'">'.$s_val.'</a></li>';
				}
				$menu .= '</ul>';
			} else {
				$menu .= '"><a href="/'.$key.'">'.$val.'</a>';
			}
			$menu .= '</li>';
		}
		$menu .= '</ul>';
		
		return $menu;
	}
	
}
?>