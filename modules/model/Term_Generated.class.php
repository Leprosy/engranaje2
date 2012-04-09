<?php

/**
 * This is the base class for Term.
 * 
 * @see Term, CoughObject
 **/
abstract class Term_Generated extends CoughObject {
	
	protected static $db = null;
	protected static $dbName = 'engranaje2';
	protected static $tableName = 'term';
	protected static $pkFieldNames = array('id');
	
	protected $fields = array(
		'id' => null,
		'title' => null,
		'description' => null,
		'slug' => null,
	);
	
	protected $fieldDefinitions = array(
		'id' => array(
			'db_column_name' => 'id',
			'is_null_allowed' => false,
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
		'slug' => array(
			'db_column_name' => 'slug',
			'is_null_allowed' => true,
			'default_value' => null
		),
	);
	
	protected $objectDefinitions = array();
	
	// Static Definition Methods
	
	public static function getDb() {
		if (is_null(Term::$db)) {
			Term::$db = CoughDatabaseFactory::getDatabase(Term::$dbName);
		}
		return Term::$db;
	}
	
	public static function getDbName() {
		return CoughDatabaseFactory::getDatabaseName(Term::$dbName);
	}
	
	public static function getTableName() {
		return Term::$tableName;
	}
	
	public static function getPkFieldNames() {
		return Term::$pkFieldNames;
	}
	
	// Static Construction (factory) Methods
	
	/**
	 * Constructs a new Term object from
	 * a single id (for single key PKs) or a hash of [field_name] => [field_value].
	 * 
	 * The key is used to pull data from the database, and, if no data is found,
	 * null is returned. You can use this function with any unique keys or the
	 * primary key as long as a hash is used. If the primary key is a single
	 * field, you may pass its value in directly without using a hash.
	 * 
	 * @param mixed $idOrHash - id or hash of [field_name] => [field_value]
	 * @return mixed - Term or null if no record found.
	 **/
	public static function constructByKey($idOrHash, $forPhp5Strict = '') {
		return CoughObject::constructByKey($idOrHash, 'Term');
	}
	
	/**
	 * Constructs a new Term object from custom SQL.
	 * 
	 * @param string $sql
	 * @return mixed - Term or null if exactly one record could not be found.
	 **/
	public static function constructBySql($sql, $forPhp5Strict = '') {
		return CoughObject::constructBySql($sql, 'Term');
	}
	
	/**
	 * Constructs a new Term object after
	 * checking the fields array to make sure the appropriate subclass is
	 * used.
	 * 
	 * No queries are run against the database.
	 * 
	 * @param array $hash - hash of [field_name] => [field_value] pairs
	 * @return Term
	 **/
	public static function constructByFields($hash) {
		return new Term($hash);
	}
	
	public function notifyChildrenOfKeyChange(array $key) {
		foreach ($this->getNodeTerm_Collection() as $nodeTerm) {
			$nodeTerm->setTermId($key['id']);
		}
	}
	
	public static function getLoadSql() {
		$tableName = Term::getTableName();
		return '
			SELECT
				`' . $tableName . '`.*
			FROM
				`' . Term::getDbName() . '`.`' . $tableName . '`
		';
	}
	
	// Generated attribute accessors (getters and setters)
	
	public function getId() {
		return $this->getField('id');
	}
	
	public function setId($value) {
		$this->setField('id', $value);
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
	
	public function getSlug() {
		return $this->getField('slug');
	}
	
	public function setSlug($value) {
		$this->setField('slug', $value);
	}
	
	// Generated one-to-one accessors (loaders, getters, and setters)
	
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
					`' . $tableName . '`.`term_id` = ' . $db->quote($this->getId()) . '
			';

			// Construct and populate the collection
			$collection->loadBySql($sql);
			foreach ($collection as $element) {
				$element->setTerm_Object($this);
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
		$object->setTermId($this->getId());
		$object->setTerm_Object($this);
		$this->getNodeTerm_Collection()->add($object);
		return $object;
	}
	
	public function removeNodeTerm($objectOrId) {
		$removedObject = $this->getNodeTerm_Collection()->remove($objectOrId);
		if (is_object($removedObject)) {
			$removedObject->setTermId(null);
			$removedObject->setTerm_Object(null);
		}
		return $removedObject;
	}
	
}

?>