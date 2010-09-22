<?php


abstract class BaseTsdetfonPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tsdetfon';

	
	const CLASS_DEFAULT = 'lib.model.Tsdetfon';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFFON = 'tsdetfon.REFFON';

	
	const CODART = 'tsdetfon.CODART';

	
	const CODCAT = 'tsdetfon.CODCAT';

	
	const MONFON = 'tsdetfon.MONFON';

	
	const MONREC = 'tsdetfon.MONREC';

	
	const TOTFON = 'tsdetfon.TOTFON';

	
	const STAFON = 'tsdetfon.STAFON';

	
	const ID = 'tsdetfon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reffon', 'Codart', 'Codcat', 'Monfon', 'Monrec', 'Totfon', 'Stafon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TsdetfonPeer::REFFON, TsdetfonPeer::CODART, TsdetfonPeer::CODCAT, TsdetfonPeer::MONFON, TsdetfonPeer::MONREC, TsdetfonPeer::TOTFON, TsdetfonPeer::STAFON, TsdetfonPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reffon', 'codart', 'codcat', 'monfon', 'monrec', 'totfon', 'stafon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reffon' => 0, 'Codart' => 1, 'Codcat' => 2, 'Monfon' => 3, 'Monrec' => 4, 'Totfon' => 5, 'Stafon' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (TsdetfonPeer::REFFON => 0, TsdetfonPeer::CODART => 1, TsdetfonPeer::CODCAT => 2, TsdetfonPeer::MONFON => 3, TsdetfonPeer::MONREC => 4, TsdetfonPeer::TOTFON => 5, TsdetfonPeer::STAFON => 6, TsdetfonPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('reffon' => 0, 'codart' => 1, 'codcat' => 2, 'monfon' => 3, 'monrec' => 4, 'totfon' => 5, 'stafon' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TsdetfonMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TsdetfonMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TsdetfonPeer::getTableMap();
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
		return str_replace(TsdetfonPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TsdetfonPeer::REFFON);

		$criteria->addSelectColumn(TsdetfonPeer::CODART);

		$criteria->addSelectColumn(TsdetfonPeer::CODCAT);

		$criteria->addSelectColumn(TsdetfonPeer::MONFON);

		$criteria->addSelectColumn(TsdetfonPeer::MONREC);

		$criteria->addSelectColumn(TsdetfonPeer::TOTFON);

		$criteria->addSelectColumn(TsdetfonPeer::STAFON);

		$criteria->addSelectColumn(TsdetfonPeer::ID);

	}

	const COUNT = 'COUNT(tsdetfon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tsdetfon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsdetfonPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsdetfonPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TsdetfonPeer::doSelectRS($criteria, $con);
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
		$objects = TsdetfonPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TsdetfonPeer::populateObjects(TsdetfonPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TsdetfonPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TsdetfonPeer::getOMClass();
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
		return TsdetfonPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TsdetfonPeer::ID); 

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
			$comparison = $criteria->getComparison(TsdetfonPeer::ID);
			$selectCriteria->add(TsdetfonPeer::ID, $criteria->remove(TsdetfonPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TsdetfonPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TsdetfonPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tsdetfon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TsdetfonPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tsdetfon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TsdetfonPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TsdetfonPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TsdetfonPeer::DATABASE_NAME, TsdetfonPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TsdetfonPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TsdetfonPeer::DATABASE_NAME);

		$criteria->add(TsdetfonPeer::ID, $pk);


		$v = TsdetfonPeer::doSelect($criteria, $con);

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
			$criteria->add(TsdetfonPeer::ID, $pks, Criteria::IN);
			$objs = TsdetfonPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTsdetfonPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TsdetfonMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TsdetfonMapBuilder');
}
