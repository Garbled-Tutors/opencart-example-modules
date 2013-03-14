<?php

class ModelModuleNames extends Model
{
	public function createTables()
	{
		$this->db->query("CREATE TABLE ".DB_PREFIX."names (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100), email VARCHAR(100) );");
	}

	public function clearTables()
	{
		$this->db->query("DROP TABLE ".DB_PREFIX."names;");
	}

	public function addName($name, $email)
	{
		$this->db->query("INSERT INTO ".DB_PREFIX."names (name, email) VALUES ('$name', '$email')");
	}
}
?>
