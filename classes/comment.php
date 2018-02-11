<?php
class Comment extends Core {

	public $resource;
	public $comments;
	public $meta;

	protected function run() {
		$this->getResource();
	}

	private function getResource() {
		if(!empty($_GET['r'])){
			$res = trim(htmlspecialchars(strip_tags($_GET['r'])));
			$res_sql = $this->_db->prepare('SELECT * FROM resources WHERE url=?');
			$res_sql->execute(array(urldecode($res)));
			$resource = $res_sql->fetch(PDO::FETCH_ASSOC);
			if ($resource) {
				$this->resource = $resource;
				$this->getComments();
				$this->getMeta();
			} else {
				$this->addResource();
				header('Location: /?r='.urlencode($res));
				exit;
			}
		}
	}

	private function getMeta() {
		$this->meta = array(
			'title' => $this->resource['title'],
			'description' => $this->resource['description'],
			'h1' => $this->resource['title']
		);
	}

	private function getComments() {
			$comm_sql = $this->_db->prepare('SELECT * FROM comments WHERE resource_id=?');
			$comm_sql->execute(array($this->resource['id']));
			$comments = $comm_sql->fetchAll(PDO::FETCH_ASSOC);
			$this->comments = $comments;
	}

	private function addResource($value='') {
		return 'add';
	}

}
?>