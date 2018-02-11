<?php
class MainPage extends Core	{

	protected function getContent($query) {
		
		
		
		return $result;
	}

	protected function getLastComments() {
		if(!empty($this->_region)){
			$cat[0] = 'all';
			$cat[1] = $this->_region;
			$cat[2] = 1;
			$par = '(region=? OR region=?) AND available=?';
		} else {
			$cat[0] = 1;
			$par = 'available=?';
		}
		$sql = $this->db->prepare('SELECT name, alias FROM shops WHERE '.$par);
		$sql->execute($cat);
		$result = $sql->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
	
}
?>