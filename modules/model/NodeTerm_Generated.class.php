<?php

/**
 * This is the base class for NodeTerm.
 * 
 * @see NodeTerm, CoughObject
 **/
abstract class NodeTerm_Generated extends CoughObject {
	
	protected static $db = null;
	protected static $dbName = 'engranaje2';
	protected static $tableName = 'node_term';
	protected static $pkFieldNames = array('id');
	
	protected $fields = array(
		'id' => null,
		'node_id' => null,
		'term_id' => null,
	);
	
	protected $fieldDefinitions = array(
		'id' => array(
			'db_column_name' => 'id',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'node_id' => array(
			'db_column_name' => 'node_id',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'term_id' => array(
			'db_column_name' => 'term_id',
			'is_null_allowed' => true,
			'default_value' => null
		),
	);
	
	protected $objectDefinitions = array(
		'Node_Object' => array(
			'class_name' => 'Node'
		),
		'Term_Object' => array(
			'class_name' => 'Term'
		),
	);
	
	// Static Definition Methods
	
	public static function getDb() {
		if (is_null(NodeTerm::$db)) {
			NodeTerm::$db = CoughDatabaseFactory::getDatabase(NodeTerm::$dbName);
		}
		return NodeTerm::$db;
	}
	
	public static function getDbName() {
		return CoughDatabaseFactory::getDatabaseName(NodeTerm::$dbName);
	}
	
	public static function getTableName() {
		return NodeTerm::$tableName;
	}
	
	public static function getPkFieldNames() {
		return NodeTerm::$pkFieldNames;
	}
	
	// Static Construction (factory) Methods
	
	/**
	 * Constructs a new NodeTerm object from
	 * a single id (for single key PKs) or a hash of [field_name] => [field_value].
	 * 
	 * The key is used to pull data from the database, and, if no data is found,
	 * null is returned. You can use this function with any unique keys or the
	 * primary key as long as a hash is used. If the primary key is a single
	 * field, you may pass its value in directly without using a hash.
	 * 
	 * @param mixed $idOrHash - id or hash of [field_name] => [field_value]
	 * @return mixed - NodeTerm or null if no record found.
	 **/
	public static function constructByKey($idOrHash, $forPhp5Strict = '') {
		return CoughObject::constructByKey($idOrHash, 'NodeTerm');
	}
	
	/**
	 * Constructs a new NodeTerm object from custom SQL.
	 * 
	 * @param string $sql
	 * @return mixed - NodeTerm or null if exactly one record could not be found.
	 **/
	public static function constructBySql($sql, $forPhp5Strict = '') {
		return CoughObject::constructBySql($sql, 'NodeTerm');
	}
	
	/**
	 * Constructs a new NodeTerm object after
	 * checking the fields array to make sure the appropriate subclass is
	 * used.
	 * 
	 * No queries are run against the database.
	 * 
	 * @param array $hash - hash of [field_name] => [field_value] pairs
	 * @return NodeTerm
	 **/
	public static function constructByFields($hash) {
		return new NodeTerm($hash);
	}
	
	public static function getLoadSql() {
		$tableName = NodeTerm::getTableName();
		return '
			SELECT
				`' . $tableName . '`.*
			FROM
				`' . NodeTerm::getDbName() . '`.`' . $tableName . '`
		';
	}
	
	// Generated attribute accessors (getters and setters)
	
	public function getId() {
		return $this->getField('id');
	}
	
	public function setId($value) {
		$this->setField('id', $value);
	}
	
	public function getNodeId() {
		return $this->getField('node_id');
	}
	
	public function setNodeId($value) {
		$this->setField('node_id', $value);
	}
	
	public function getTermId() {
		return $this->getField('term_id');
	}
	
	public function setTermId($value) {
		$this->setField('term_id', $value);
	}
	
	// Generated one-to-one accessors (loaders, getters, and setters)
	
	public function loadNode_Object() {
		$this->setNode_Object(Node::constructByKey($this->getNodeId()));
	}
	
	public function getNode_Object() {
		if (!isset($this->objects['Node_Object'])) {
			$this->loadNode_Object();
		}
		return $this->objects['Node_Object'];
	}
	
	public function setNode_Object($node) {
		$this->objects['Node_Object'] = $node;
	}
	
	public function loadTerm_Object() {
		$this->setTerm_Object(Term::constructByKey($this->getTermId()));
	}
	
	public function getTerm_Object() {
		if (!isset($this->objects['Term_Object'])) {
			$this->loadTerm_Object();
		}
		return $this->objects['Term_Object'];
	}
	
	public function setTerm_Object($term) {
		$this->objects['Term_Object'] = $term;
	}
	
	// Generated one-to-many collection loaders, getters, setters, adders, and removers
	
}

?>