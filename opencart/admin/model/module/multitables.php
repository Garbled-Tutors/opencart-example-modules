<?php

class ModelModuleMultitables extends Model
{
	public function createTables()
	{
		$this->db->query("CREATE TABLE ".DB_PREFIX."multitables (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100), email VARCHAR(100) );");
	}

	public function clearTables()
	{
		$this->db->query("DROP TABLE ".DB_PREFIX."multitables;");
	}

	public function addName($name, $email)
	{
		$this->db->query("INSERT INTO ".DB_PREFIX."multitables (name, email) VALUES ('$name', '$email')");
	}

	public function updateName($name, $email, $id)
	{
		$this->db->query("UPDATE `".DB_PREFIX."multitables` SET `name`='$name', `email`='$email' WHERE `id`='$id'");
	}

	public function getMultitables()
	{
		return $this->db->query("SELECT * FROM ".DB_PREFIX."multitables");
	}
	public function removeName($id)
	{
		$this->db->query("DELETE FROM ".DB_PREFIX."multitables WHERE id = ".$id);
	}
}
?>
