<?php
	require_once("../db/mariaDB.php");
	class rssReaderModel {
		private $db;
		private $items;

		public function __construct(){
				$this->db = MariaDBConnection::connect();
				$this->items = array();
		}

		// Obtiene todas las noticias/artículos de la DB:
		public function get_items() {
				$sql = "select * from feed;";
				$query = $this->db->query($sql);
				while ($rows=$query->fetch_assoc()) {
					$this->items[]=$rows;
				}
				return $this->items;
		}

		// Obtiene todas las noticias/artículos de la DB:
		public function search_items($text) {
			$sql = "SELECT * FROM feed WHERE (title LIKE '%".$text."%' OR description LIKE '%".$text."%');";
			$query = $this->db->query($sql);
			while ($rows=$query->fetch_assoc()) {
				$this->items[]=$rows;
			}
			return $this->items;
	}

		// Almacena en la BD los items:
		public function set_item($title, $date, $description, $permalink, $categories) {
			$sql = "INSERT INTO feed (title, date, description, permalink, categories)
							VALUES ('{$title}', '{$date}', '{$description}', '{$permalink}', '{$categories}')";
			if ($this->db->query($sql)) {
				return true;
			}
			return false;
		}

		public function delete_items() {
			$sql = "DELETE FROM feed";
			if ($this->db->query($sql)) {
				return true;
			}
			return false;
		}
}
