<?php
class Comment extends Core {

	public $resource;
	public $comments;
	
	protected function run() {
		$this->getResource();
	}

	private function getResource() {
		if(!empty($_GET['r'])){
			$res = trim(strip_tags($_GET['r']));
			$res_sql = $this->_db->prepare('SELECT * FROM resources WHERE url LIKE ?');
			$res_sql->execute(array(urldecode('%'.$res.'%')));
			$resource = $res_sql->fetch(PDO::FETCH_ASSOC);
			if ($resource) {
				$this->resource = $resource;
				$this->getIframe();
				$this->getComments();
				$this->getMeta();
			} else {
				$this->addResource($res);
			}
		}
	}

	private function getIframe() {
		$iframe = '';
		if (preg_match('/youtube.*?\?v=([\w\-]+)($|\&)/i', $this->resource['url'], $vid_id)) {
			$iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$vid_id[1].'?rel=0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
		} else {
			# code...
		}
		$this->resource['iframe'] = $iframe;
	}

	private function getMeta() {
		$this->meta = array(
			'title' => $this->resource['title'],
			'description' => $this->resource['description'],
			'h1' => $this->resource['title']
		);
	}

	private function getComments() {
		$comm_sql = $this->_db->prepare('SELECT * FROM comments WHERE resource_id=? ORDER BY time DESC');
		$comm_sql->execute(array($this->resource['id']));
		$comments = $comm_sql->fetchAll(PDO::FETCH_ASSOC);

		$this->comments = array();

		foreach ($comments as $val) {
			if ($val['relation'] == null) {
				$this->comments[$val['id']] = $val;
			} else {
				$this->comments[$val['relation']]['replay_comm'] = array();
			}
		}

		print_r($this->comments);

	}

	private function addResource($res) {
		$ins_res = $this->_db->prepare('INSERT INTO resources (url,title) VALUES (:url,:title)');
		$ins_res->execute(array(
		'url'=>urldecode($res),
		'title'=>''
		));
		header('Location: /comment?r='.urlencode($res));
		exit;
	}

}
?>