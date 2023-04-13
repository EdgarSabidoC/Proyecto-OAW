<?php
require_once("../db/mariaDB.php");
class rssReaderModel
{
	private $db;
	private $items;

	public function __construct()
	{
		$this->db = MariaDBConnection::connect();
		$this->items = array();
	}

	// Obtiene todas las noticias/artículos de la DB:
	public function get_items() {
		$sql = "SELECT * FROM feed ORDER BY date DESC;";
		$query = $this->db->query($sql);
		while ($rows = $query->fetch_assoc()) {
			$this->items[] = $rows;
		}
		return $this->items;
	}

	// Buscar las noticias/artículos de la DB:
	public function search_items($text) {
		$sql = "SELECT * FROM feed WHERE (title LIKE '%" . $text . "%' OR description LIKE '%" . $text . "%');";
		$query = $this->db->query($sql);
		while ($rows = $query->fetch_assoc()) {
			$this->items[] = $rows;
		}
		return $this->items;
	}

	// Buscar las noticias/artículos de la DB de una categoría:
	public function search_items_by_category($category) {
		$sql = "SELECT * FROM feed WHERE categories LIKE '%" . $category . "%';";
		$query = $this->db->query($sql);
		while ($rows = $query->fetch_assoc()) {
			$this->items[] = $rows;
		}
		return $this->items;
	}

	public function search_items_and_sort($text, $selectOption, $category) {
		$sql = '';
		if (!$text && !$category) {
			$sql = "SELECT * FROM feed ";
		} else {
			$sql = "SELECT * FROM feed WHERE (title LIKE '%" . $text . "%' OR
			description LIKE '%" . $text . "%') ";
		}

		if ($category && $category !== '') {
			$sql = $sql . 'AND categories LIKE ' . "'%{$category}%'" . $selectOption . ';';
		} else {
			$sql = $sql . $selectOption . ';';
		}
		$query = $this->db->query($sql);
		while ($rows = $query->fetch_assoc()) {
			$this->items[] = $rows;
		}
		return $this->items;
	}

	public function get_categories() {
		$sql = "SELECT categories FROM feed;";
		$query = $this->db->query($sql);
		while ($rows = $query->fetch_assoc()) {
			$this->items[] = $rows;
		}
		return $this->items;
	}

	// Almacena en la BD los items:
	public function set_item($title, $date, $description, $permalink, $categories, $image) {
		$sql = "INSERT INTO feed (title, date, description, permalink, categories, image)
							VALUES ('" . $title . "', '" . $date . "', '" . $description . "', '" .
							$permalink . "', '" . $categories . "', '" . $image . "')";
		if ($this->db->query($sql)) {
			return true;
		}
		return false;
	}

	// Elimina los items dentro de la BD:
	public function delete_items() {
		$sql = "DELETE FROM feed";
		if ($this->db->query($sql)) {
			return true;
		}
		return false;
	}
}