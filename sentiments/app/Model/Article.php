<?php
	class Article extends AppModel {
		
		private static $ARTICLE_EXISTS_QUERY = "select count(*) as exist from tblarticles where headline like ?";
		
		public function existsArticle($title) {
			$db = $this->getDataSource();
			$articles = $db->fetchAll(self::$ARTICLE_EXISTS_QUERY, array($title));
			if($articles[0][0]['exist'] > 0) {
				return true;
			} else {
				return false;
			}
		}
		
	}
?>