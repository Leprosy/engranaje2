<?php

/**
 * This is the base class for User.
 * 
 * @see User, CoughObject
 **/
abstract class User_Generated extends CoughObject {
	
	protected static $db = null;
	protected static $dbName = 'engranaje2';
	protected static $tableName = 'user';
	protected static $pkFieldNames = array('id');
	
	protected $fields = array(
		'id' => null,
		'name' => null,
		'login' => null,
		'mail' => null,
		'password' => null,
		'created_at' => null,
		'updated_at' => null,
	);
	
	protected $fieldDefinitions = array(
		'id' => array(
			'db_column_name' => 'id',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'name' => array(
			'db_column_name' => 'name',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'login' => array(
			'db_column_name' => 'login',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'mail' => array(
			'db_column_name' => 'mail',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'password' => array(
			'db_column_name' => 'password',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'created_at' => array(
			'db_column_name' => 'created_at',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'updated_at' => array(
			'db_column_name' => 'updated_at',
			'is_null_allowed' => false,
			'default_value' => null
		),
	);
	
	protected $objectDefinitions = array();
	
	// Static Definition Methods
	
	public static function getDb() {
		if (is_null(User::$db)) {
			User::$db = CoughDatabaseFactory::getDatabase(User::$dbName);
		}
		return User::$db;
	}
	
	public static function getDbName() {
		return CoughDatabaseFactory::getDatabaseName(User::$dbName);
	}
	
	public static function getTableName() {
		return User::$tableName;
	}
	
	public static function getPkFieldNames() {
		return User::$pkFieldNames;
	}
	
	// Static Construction (factory) Methods
	
	/**
	 * Constructs a new User object from
	 * a single id (for single key PKs) or a hash of [field_name] => [field_value].
	 * 
	 * The key is used to pull data from the database, and, if no data is found,
	 * null is returned. You can use this function with any unique keys or the
	 * primary key as long as a hash is used. If the primary key is a single
	 * field, you may pass its value in directly without using a hash.
	 * 
	 * @param mixed $idOrHash - id or hash of [field_name] => [field_value]
	 * @return mixed - User or null if no record found.
	 **/
	public static function constructByKey($idOrHash, $forPhp5Strict = '') {
		return CoughObject::constructByKey($idOrHash, 'User');
	}
	
	/**
	 * Constructs a new User object from custom SQL.
	 * 
	 * @param string $sql
	 * @return mixed - User or null if exactly one record could not be found.
	 **/
	public static function constructBySql($sql, $forPhp5Strict = '') {
		return CoughObject::constructBySql($sql, 'User');
	}
	
	/**
	 * Constructs a new User object after
	 * checking the fields array to make sure the appropriate subclass is
	 * used.
	 * 
	 * No queries are run against the database.
	 * 
	 * @param array $hash - hash of [field_name] => [field_value] pairs
	 * @return User
	 **/
	public static function constructByFields($hash) {
		return new User($hash);
	}
	
	public function notifyChildrenOfKeyChange(array $key) {
		foreach ($this->getNode_Collection() as $node) {
			$node->setUserId($key['id']);
		}
	}
	
	public static function getLoadSql() {
		$tableName = User::getTableName();
		return '
			SELECT
				`' . $tableName . '`.*
			FROM
				`' . User::getDbName() . '`.`' . $tableName . '`
		';
	}
	
	// Generated attribute accessors (getters and setters)
	
	public function getId() {
		return $this->getField('id');
	}
	
	public function setId($value) {
		$this->setField('id', $value);
	}
	
	public function getName() {
		return $this->getField('name');
	}
	
	public function setName($value) {
		$this->setField('name', $value);
	}
	
	public function getLogin() {
		return $this->getField('login');
	}
	
	public function setLogin($value) {
		$this->setField('login', $value);
	}
	
	public function getMail() {
		return $this->getField('mail');
	}
	
	public function setMail($value) {
		$this->setField('mail', $value);
	}
	
	public function getPassword() {
		return $this->getField('password');
	}
	
	public function setPassword($value) {
		$this->setField('password', $value);
	}
	
	public function getCreatedAt() {
		return $this->getField('created_at');
	}
	
	public function setCreatedAt($value) {
		$this->setField('created_at', $value);
	}
	
	public function getUpdatedAt() {
		return $this->getField('updated_at');
	}
	
	public function setUpdatedAt($value) {
		$this->setField('updated_at', $value);
	}
	
	// Generated one-to-one accessors (loaders, getters, and setters)
	
	// Generated one-to-many collection loaders, getters, setters, adders, and removers
	
	public function loadNode_Collection() {
		
		// Always create the collection
		$collection = new Node_Collection();
		$this->setNode_Collection($collection);
		
		// But only populate it if we have key ID
		if ($this->hasKeyId()) {
			$db = Node::getDb();
			$tableName = Node::getTableName();
			$sql = '
				SELECT
					`' . $tableName . '`.*
				FROM
					`' . Node::getDbName() . '`.`' . $tableName . '`
				WHERE
					`' . $tableName . '`.`user_id` = ' . $db->quote($this->getId()) . '
			';

			// Construct and populate the collection
			$collection->loadBySql($sql);
			foreach ($collection as $element) {
				$element->setUser_Object($this);
			}
		}
	}
	
	public function getNode_Collection() {
		if (!isset($this->collections['Node_Collection'])) {
			$this->loadNode_Collection();
		}
		return $this->collections['Node_Collection'];
	}
	
	public function setNode_Collection($nodeCollection) {
		$this->collections['Node_Collection'] = $nodeCollection;
	}
	
	public function addNode(Node $object) {
		$object->setUserId($this->getId());
		$object->setUser_Object($this);
		$this->getNode_Collection()->add($object);
		return $object;
	}
	
	public function removeNode($objectOrId) {
		$removedObject = $this->getNode_Collection()->remove($objectOrId);
		if (is_object($removedObject)) {
			$removedObject->setUserId(null);
			$removedObject->setUser_Object(null);
		}
		return $removedObject;
	}
	
}

?>