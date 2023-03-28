<?php
	class MariaDBConnection {
		public static function connect() {
			$conn = new mysqli('localhost', 'root', '', 'rssFeed');
			$conn->query("SET NAMES 'utf8'");
			return $conn;
		}
	}
