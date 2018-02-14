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
		switch ($this->resource['source']) {
			case 'youtube':
			if (preg_match('/\?v=([\w\-]+)($|\&)/i', $this->resource['url'], $vid_id)) {
				$iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$vid_id[1].'?rel=0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
			}
			break;
			
			default:
				# code...
			break;
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
			$comm_sql = $this->_db->prepare('SELECT * FROM comments WHERE resource_id=?');
			$comm_sql->execute(array($this->resource['id']));
			$comments = $comm_sql->fetchAll(PDO::FETCH_ASSOC);
			$this->comments = $comments;
	}

	private function addResource($res) {
		header('Location: /comment?r='.urlencode($res));
		exit;
		return 'add';
	}

}
?>