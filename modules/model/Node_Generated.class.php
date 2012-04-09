<?php

/**
 * This is the base class for Node.
 * 
 * @see Node, CoughObject
 **/
abstract class Node_Generated extends CoughObject {
	
	protected static $db = null;
	protected static $dbName = 'engranaje2';
	protected static $tableName = 'node';
	protected static $pkFieldNames = array('id');
	
	protected $fields = array(
		'id' => null,
		'user_id' => null,
		'title' => null,
		'description' => null,
		'content' => null,
		'count' => null,
		'comments' => null,
		'status' => null,
		'created_at' => null,
		'updated_at' => null,
		'slug' => null,
	);
	
	protected $fieldDefinitions = array(
		'id' => array(
			'db_column_name' => 'id',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'user_id' => array(
			'db_column_name' => 'user_id',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'title' => array(
			'db_column_name' => 'title',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'description' => array(
			'db_column_name' => 'description',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'content' => array(
			'db_column_name' => 'content',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'count' => array(
			'db_column_name' => 'count',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'comments' => array(
			'db_column_name' => 'comments',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'status' => array(
			'db_column_name' => 'status',
			'is_null_allowed' => true,
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
		'slug' => array(
			'db_column_name' => 'slug',
			'is_null_allowed' => true,
			'default_value' => null
		),
	);
	
	protected $objectDefinitions = array(
		'User_Object' => array(
			'class_name' => 'User'
		),
	);
	
	// Static Definition Methods
	
	public static function getDb() {
		if (is_null(Node::$db)) {
			Node::$db = CoughDatabaseFactory::getDatabase(Node::$dbName);
		}
		return Node::$db;
	}
	
	public static function getDbName() {
		return CoughDatabaseFactory::getDatabaseName(Node::$dbName);
	}
	
	public static function getTableName() {
		return Node::$tableName;
	}
	
	public static function getPkFieldNames() {
		return Node::$pkFieldNames;
	}
	
	// Static Construction (factory) Methods
	
	/**
	 * Constructs a new Node object from
	 * a single id (for single key PKs) or a hash of [field_name] => [field_value].
	 * 
	 * The key is used to pull data from the database, and, if no data is found,
	 * null is returned. You can use this function with any unique keys or the
	 * primary key as long as a hash is used. If the primary key is a single
	 * field, you may pass its value in directly without using a hash.
	 * 
	 * @param mixed $idOrHash - id or hash of [field_name] => [field_value]
	 * @return mixed - Node or null if no record found.
	 **/
	public static function constructByKey($idOrHash, $forPhp5Strict = '') {
		return CoughObject::constructByKey($idOrHash, 'Node');
	}
	
	/**
	 * Constructs a new Node object from custom SQL.
	 * 
	 * @param string $sql
	 * @return mixed - Node or null if exactly one record could not be found.
	 **/
	public static function constructBySql($sql, $forPhp5Strict = '') {
		return CoughObject::constructBySql($sql, 'Node');
	}
	
	/**
	 * Constructs a new Node object after
	 * checking the fields array to make sure the appropriate subclass is
	 * used.
	 * 
	 * No queries are run against the database.
	 * 
	 * @param array $hash - hash of [field_name] => [field_value] pairs
	 * @return Node
	 **/
	public static function constructByFields($hash) {
		return new Node($hash);
	}
	
	public function notifyChildrenOfKeyChange(array $key) {
		foreach ($this->getNodeTerm_Collection() as $nodeTerm) {
			$nodeTerm->setNodeId($key['id']);
		}
	}
	
	public static function getLoadSql() {
		$tableName = Node::getTableName();
		return '
			SELECT
				`' . $tableName . '`.*
			FROM
				`' . Node::getDbName() . '`.`' . $tableName . '`
		';
	}
	
	// Generated attribute accessors (getters and setters)
	
	public function getId() {
		return $this->getField('id');
	}
	
	public function setId($value) {
		$this->setField('id', $value);
	}
	
	public function getUserId() {
		return $this->getField('user_id');
	}
	
	public function setUserId($value) {
		$this->setField('user_id', $value);
	}
	
	public function getTitle() {
		return $this->getField('title');
	}
	
	public function setTitle($value) {
		$this->setField('title', $value);
	}
	
	public function getDescription() {
		return $this->getField('description');
	}
	
	public function setDescription($value) {
		$this->setField('description', $value);
	}
	
	public function getContent() {
		return $this->getField('content');
	}
	
	public function setContent($value) {
		$this->setField('content', $value);
	}
	
	public function getCount() {
		return $this->getField('count');
	}
	
	public function setCount($value) {
		$this->setField('count', $value);
	}
	
	public function getComments() {
		return $this->getField('comments');
	}
	
	public function setComments($value) {
		$this->setField('comments', $value);
	}
	
	public function getStatus() {
		return $this->getField('status');
	}
	
	public function setStatus($value) {
		$this->setField('status', $value);
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
	
	public function getSlug() {
		return $this->getField('slug');
	}
	
	public function setSlug($value) {
		$this->setField('slug', $value);
	}
	
	// Generated one-to-one accessors (loaders, getters, and setters)
	
	public function loadUser_Object() {
		$this->setUser_Object(User::constructByKey($this->getUserId()));
	}
	
	public function getUser_Object() {
		if (!isset($this->objects['User_Object'])) {
			$this->loadUser_Object();
		}
		return $this->objects['User_Object'];
	}
	
	public function setUser_Object($user) {
		$this->objects['User_Object'] = $user;
	}
	
	// Generated one-to-many collection loaders, getters, setters, adders, and removers
	
	public function loadNodeTerm_Collection() {
		
		// Always create the collection
		$collection = new NodeTerm_Collection();
		$this->setNodeTerm_Collection($collection);
		
		// But only populate it if we have key ID
		if ($this->hasKeyId()) {
			$db = NodeTerm::getDb();
			$tableName = NodeTerm::getTableName();
			$sql = '
				SELECT
					`' . $tableName . '`.*
				FROM
					`' . NodeTerm::getDbName() . '`.`' . $tableName . '`
				WHERE
					`' . $tableName . '`.`node_id` = ' . $db->quote($this->getId()) . '
			';

			// Construct and populate the collection
			$collection->loadBySql($sql);
			foreach ($collection as $element) {
				$element->setNode_Object($this);
			}
		}
	}
	
	public function getNodeTerm_Collection() {
		if (!isset($this->collections['NodeTerm_Collection'])) {
			$this->loadNodeTerm_Collection();
		}
		return $this->collections['NodeTerm_Collection'];
	}
	
	public function setNodeTerm_Collection($nodeTermCollection) {
		$this->collections['NodeTerm_Collection'] = $nodeTermCollection;
	}
	
	public function addNodeTerm(NodeTerm $object) {
		$object->setNodeId($this->getId());
		$object->setNode_Object($this);
		$this->getNodeTerm_Collection()->add($object);
		return $object;
	}
	
	public function removeNodeTerm($objectOrId) {
		$removedObject = $this->getNodeTerm_Collection()->remove($objectOrId);
		if (is_object($removedObject)) {
			$removedObject->setNodeId(null);
			$removedObject->setNode_Object(null);
		}
		return $removedObject;
	}
	
}

?>