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
		$comm_sql = $this->_db->prepare('SELECT * FROM comments WHERE resource_id=? ORDER BY time');
		$comm_sql->execute(array($this->resource['id']));
		$comments = $comm_sql->fetchAll(PDO::FETCH_ASSOC);

		$comm_arr = array();

		foreach ($comments as $val) {
			if ($val['relation'] == null) {
				$comm_arr[$val['id']]['comm'] = $val;
			} else {
				$comm_arr[$val['relation']]['replay'][$val['id']] = $val;
			}
		}

		$this->comments = array_reverse($comm_arr);

	}

	private function addResource($res) {
		$url = urldecode($res);
		$ins_res = $this->_db->prepare('INSERT INTO resources (url,title) VALUES (:url,:title)');
		$ins_res->execute(array(
		'url'=>$url,
		'title'=>$this->parse($url)
		));
		header('Location: /comment?r='.urlencode($res));
		exit;
	}

	private function parse($url) {

		$title = '';
		
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$html = curl_exec($ch);
		
		curl_close($ch);

		if (strpos($url, 'youtube') !== false) {
			preg_match('/<.*?eow-title.*?>(.*?)<\/.*?>/is', $html, $matches);
			$title = $matches[1];
		} else {
			preg_match('/<.*?title.*?>(.*?)<\/.*?>/is', $html, $matches);
			$title = $matches[1];
		}

		$title = trim(str_replace(array("\r\n", "\n", "\r"), '', $title), ' ');

		return $title;
	}

}
?>