<?php
 
require_once('opencart/config.php');

define('DB_PREFIX', 'oc_');

class MySqlDatabase
{
	protected $con;
	public function __construct()
	{
		$this->con = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	}

	public function query($query)
	{
		return mysqli_query($this->con, $query);
	}

	public function __destruct()
	{
		mysqli_close($this->con);
	}
}

class Model
{
	protected $db;

	function __construct()
	{
		$this->db = new MySqlDatabase();
	}
}

require_once 'opencart/admin/model/module/names.php';

class NamesTest extends PHPUnit_Framework_TestCase
{
	protected $names_model;

	protected function setUp()
	{
		$this->names_model = new ModelModuleNames();
		$this->names_model->createTables();
	}

	protected function tearDown()
	{
		$this->names_model->clearTables();
		$this->names_model = NULL;
	}

	public function testAdd()
	{
		$this->names_model->addName('Steve', 'steve@gmail.com');
		$this->names_model->addName('Bob', 'bob@yahoo.com');
		$this->assertTrue($this->names_model->getNames()->num_rows == 2);
	}
}
?>
