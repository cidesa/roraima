<?php


abstract class BaseAcdocumenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'acdocumen';

	
	const CLASS_DEFAULT = 'lib.model.Acdocumen';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DOCATE = 'acdocumen.DOCATE';

	
	const TIPDOC = 'acdocumen.TIPDOC';

	
	const ASUDOC = 'acdocumen.ASUDOC';

	
	const FECDOC = 'acdocumen.FECDOC';

	
	const CEDRIF = 'acdocumen.CEDRIF';

	
	const STADOC = 'acdocumen.STADOC';

	
	const NOMARC = 'acdocumen.NOMARC';

	
	const CONTENT = 'acdocumen.CONTENT';

	
	const ID = 'acdocumen.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Docate', 'Tipdoc', 'Asudoc', 'Fecdoc', 'Cedrif', 'Stadoc', 'Nomarc', 'Content', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AcdocumenPeer::DOCATE, AcdocumenPeer::TIPDOC, AcdocumenPeer::ASUDOC, AcdocumenPeer::FECDOC, AcdocumenPeer::CEDRIF, AcdocumenPeer::STADOC, AcdocumenPeer::NOMARC, AcdocumenPeer::CONTENT, AcdocumenPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('docate', 'tipdoc', 'asudoc', 'fecdoc', 'cedrif', 'stadoc', 'nomarc', 'content', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Docate' => 0, 'Tipdoc' => 1, 'Asudoc' => 2, 'Fecdoc' => 3, 'Cedrif' => 4, 'Stadoc' => 5, 'Nomarc' => 6, 'Content' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (AcdocumenPeer::DOCATE => 0, AcdocumenPeer::TIPDOC => 1, AcdocumenPeer::ASUDOC => 2, AcdocumenPeer::FECDOC => 3, AcdocumenPeer::CEDRIF => 4, AcdocumenPeer::STADOC => 5, AcdocumenPeer::NOMARC => 6, AcdocumenPeer::CONTENT => 7, AcdocumenPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('docate' => 0, 'tipdoc' => 1, 'asudoc' => 2, 'fecdoc' => 3, 'cedrif' => 4, 'stadoc' => 5, 'nomarc' => 6, 'content' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AcdocumenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AcdocumenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AcdocumenPeer::getTableMap();
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
		return str_replace(AcdocumenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AcdocumenPeer::DOCATE);

		$criteria->addSelectColumn(AcdocumenPeer::TIPDOC);

		$criteria->addSelectColumn(AcdocumenPeer::ASUDOC);

		$criteria->addSelectColumn(AcdocumenPeer::FECDOC);

		$criteria->addSelectColumn(AcdocumenPeer::CEDRIF);

		$criteria->addSelectColumn(AcdocumenPeer::STADOC);

		$criteria->addSelectColumn(AcdocumenPeer::NOMARC);

		$criteria->addSelectColumn(AcdocumenPeer::CONTENT);

		$criteria->addSelectColumn(AcdocumenPeer::ID);

	}

	const COUNT = 'COUNT(acdocumen.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT acdocumen.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AcdocumenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AcdocumenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AcdocumenPeer::doSelectRS($criteria, $con);
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
		$objects = AcdocumenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AcdocumenPeer::populateObjects(AcdocumenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AcdocumenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AcdocumenPeer::getOMClass();
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
		return AcdocumenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(AcdocumenPeer::ID);
			$selectCriteria->add(AcdocumenPeer::ID, $criteria->remove(AcdocumenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AcdocumenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AcdocumenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Acdocumen) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AcdocumenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Acdocumen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AcdocumenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AcdocumenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AcdocumenPeer::DATABASE_NAME, AcdocumenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AcdocumenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AcdocumenPeer::DATABASE_NAME);

		$criteria->add(AcdocumenPeer::ID, $pk);


		$v = AcdocumenPeer::doSelect($criteria, $con);

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
			$criteria->add(AcdocumenPeer::ID, $pks, Criteria::IN);
			$objs = AcdocumenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAcdocumenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AcdocumenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AcdocumenMapBuilder');
}
