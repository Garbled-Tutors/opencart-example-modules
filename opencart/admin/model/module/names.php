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

	public function updateName($name, $email, $id)
	{
		//$this->db->query("UPDATE ".DB_PREFIX."names SET (name = '$name', email = '$email') WHERE id = '".$id ."'");
		$this->db->query("UPDATE `".DB_PREFIX."names` SET `name`='$name', `email`='$email' WHERE `id`='$id'");

	}

	public function getNames()
	{
		return $this->db->query("SELECT * FROM ".DB_PREFIX."names");
	}
	public function removeName($id)
	{
		$this->db->query("DELETE FROM ".DB_PREFIX."names WHERE id = ".$id);
	}
}
?>
