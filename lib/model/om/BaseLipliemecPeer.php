<?php


abstract class BaseLipliemecPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lipliemec';

	
	const CLASS_DEFAULT = 'lib.model.Lipliemec';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPLIE = 'lipliemec.NUMPLIE';

	
	const NUMEXP = 'lipliemec.NUMEXP';

	
	const CODMEC = 'lipliemec.CODMEC';

	
	const FECSOB1 = 'lipliemec.FECSOB1';

	
	const HORSOB1 = 'lipliemec.HORSOB1';

	
	const FECSOB2 = 'lipliemec.FECSOB2';

	
	const HORSOB2 = 'lipliemec.HORSOB2';

	
	const DIROFE = 'lipliemec.DIROFE';

	
	const ID = 'lipliemec.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie', 'Numexp', 'Codmec', 'Fecsob1', 'Horsob1', 'Fecsob2', 'Horsob2', 'Dirofe', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LipliemecPeer::NUMPLIE, LipliemecPeer::NUMEXP, LipliemecPeer::CODMEC, LipliemecPeer::FECSOB1, LipliemecPeer::HORSOB1, LipliemecPeer::FECSOB2, LipliemecPeer::HORSOB2, LipliemecPeer::DIROFE, LipliemecPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie', 'numexp', 'codmec', 'fecsob1', 'horsob1', 'fecsob2', 'horsob2', 'dirofe', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie' => 0, 'Numexp' => 1, 'Codmec' => 2, 'Fecsob1' => 3, 'Horsob1' => 4, 'Fecsob2' => 5, 'Horsob2' => 6, 'Dirofe' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (LipliemecPeer::NUMPLIE => 0, LipliemecPeer::NUMEXP => 1, LipliemecPeer::CODMEC => 2, LipliemecPeer::FECSOB1 => 3, LipliemecPeer::HORSOB1 => 4, LipliemecPeer::FECSOB2 => 5, LipliemecPeer::HORSOB2 => 6, LipliemecPeer::DIROFE => 7, LipliemecPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie' => 0, 'numexp' => 1, 'codmec' => 2, 'fecsob1' => 3, 'horsob1' => 4, 'fecsob2' => 5, 'horsob2' => 6, 'dirofe' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LipliemecMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LipliemecMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LipliemecPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(LipliemecPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LipliemecPeer::NUMPLIE);

		$criteria->addSelectColumn(LipliemecPeer::NUMEXP);

		$criteria->addSelectColumn(LipliemecPeer::CODMEC);

		$criteria->addSelectColumn(LipliemecPeer::FECSOB1);

		$criteria->addSelectColumn(LipliemecPeer::HORSOB1);

		$criteria->addSelectColumn(LipliemecPeer::FECSOB2);

		$criteria->addSelectColumn(LipliemecPeer::HORSOB2);

		$criteria->addSelectColumn(LipliemecPeer::DIROFE);

		$criteria->addSelectColumn(LipliemecPeer::ID);

	}

	const COUNT = 'COUNT(lipliemec.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lipliemec.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LipliemecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LipliemecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LipliemecPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = LipliemecPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LipliemecPeer::populateObjects(LipliemecPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LipliemecPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LipliemecPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return LipliemecPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LipliemecPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(LipliemecPeer::ID);
			$selectCriteria->add(LipliemecPeer::ID, $criteria->remove(LipliemecPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(LipliemecPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(LipliemecPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lipliemec) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LipliemecPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Lipliemec $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LipliemecPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LipliemecPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(LipliemecPeer::DATABASE_NAME, LipliemecPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LipliemecPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(LipliemecPeer::DATABASE_NAME);

		$criteria->add(LipliemecPeer::ID, $pk);


		$v = LipliemecPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(LipliemecPeer::ID, $pks, Criteria::IN);
			$objs = LipliemecPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLipliemecPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LipliemecMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LipliemecMapBuilder');
}
