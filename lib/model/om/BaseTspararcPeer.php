<?php


abstract class BaseTspararcPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tspararc';

	
	const CLASS_DEFAULT = 'lib.model.Tspararc';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCUE = 'tspararc.NUMCUE';

	
	const INICUE = 'tspararc.INICUE';

	
	const FINCUE = 'tspararc.FINCUE';

	
	const INIREF = 'tspararc.INIREF';

	
	const FINREF = 'tspararc.FINREF';

	
	const INIFEC = 'tspararc.INIFEC';

	
	const FINFEC = 'tspararc.FINFEC';

	
	const INITIP = 'tspararc.INITIP';

	
	const FINTIP = 'tspararc.FINTIP';

	
	const INIDES = 'tspararc.INIDES';

	
	const FINDES = 'tspararc.FINDES';

	
	const INIMON = 'tspararc.INIMON';

	
	const FINMON = 'tspararc.FINMON';

	
	const ID = 'tspararc.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue', 'Inicue', 'Fincue', 'Iniref', 'Finref', 'Inifec', 'Finfec', 'Initip', 'Fintip', 'Inides', 'Findes', 'Inimon', 'Finmon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TspararcPeer::NUMCUE, TspararcPeer::INICUE, TspararcPeer::FINCUE, TspararcPeer::INIREF, TspararcPeer::FINREF, TspararcPeer::INIFEC, TspararcPeer::FINFEC, TspararcPeer::INITIP, TspararcPeer::FINTIP, TspararcPeer::INIDES, TspararcPeer::FINDES, TspararcPeer::INIMON, TspararcPeer::FINMON, TspararcPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue', 'inicue', 'fincue', 'iniref', 'finref', 'inifec', 'finfec', 'initip', 'fintip', 'inides', 'findes', 'inimon', 'finmon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue' => 0, 'Inicue' => 1, 'Fincue' => 2, 'Iniref' => 3, 'Finref' => 4, 'Inifec' => 5, 'Finfec' => 6, 'Initip' => 7, 'Fintip' => 8, 'Inides' => 9, 'Findes' => 10, 'Inimon' => 11, 'Finmon' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (TspararcPeer::NUMCUE => 0, TspararcPeer::INICUE => 1, TspararcPeer::FINCUE => 2, TspararcPeer::INIREF => 3, TspararcPeer::FINREF => 4, TspararcPeer::INIFEC => 5, TspararcPeer::FINFEC => 6, TspararcPeer::INITIP => 7, TspararcPeer::FINTIP => 8, TspararcPeer::INIDES => 9, TspararcPeer::FINDES => 10, TspararcPeer::INIMON => 11, TspararcPeer::FINMON => 12, TspararcPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue' => 0, 'inicue' => 1, 'fincue' => 2, 'iniref' => 3, 'finref' => 4, 'inifec' => 5, 'finfec' => 6, 'initip' => 7, 'fintip' => 8, 'inides' => 9, 'findes' => 10, 'inimon' => 11, 'finmon' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TspararcMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TspararcMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TspararcPeer::getTableMap();
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
		return str_replace(TspararcPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TspararcPeer::NUMCUE);

		$criteria->addSelectColumn(TspararcPeer::INICUE);

		$criteria->addSelectColumn(TspararcPeer::FINCUE);

		$criteria->addSelectColumn(TspararcPeer::INIREF);

		$criteria->addSelectColumn(TspararcPeer::FINREF);

		$criteria->addSelectColumn(TspararcPeer::INIFEC);

		$criteria->addSelectColumn(TspararcPeer::FINFEC);

		$criteria->addSelectColumn(TspararcPeer::INITIP);

		$criteria->addSelectColumn(TspararcPeer::FINTIP);

		$criteria->addSelectColumn(TspararcPeer::INIDES);

		$criteria->addSelectColumn(TspararcPeer::FINDES);

		$criteria->addSelectColumn(TspararcPeer::INIMON);

		$criteria->addSelectColumn(TspararcPeer::FINMON);

		$criteria->addSelectColumn(TspararcPeer::ID);

	}

	const COUNT = 'COUNT(tspararc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tspararc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TspararcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TspararcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TspararcPeer::doSelectRS($criteria, $con);
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
		$objects = TspararcPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TspararcPeer::populateObjects(TspararcPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TspararcPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TspararcPeer::getOMClass();
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
		return TspararcPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TspararcPeer::ID); 

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
			$comparison = $criteria->getComparison(TspararcPeer::ID);
			$selectCriteria->add(TspararcPeer::ID, $criteria->remove(TspararcPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TspararcPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TspararcPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tspararc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TspararcPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tspararc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TspararcPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TspararcPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TspararcPeer::DATABASE_NAME, TspararcPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TspararcPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TspararcPeer::DATABASE_NAME);

		$criteria->add(TspararcPeer::ID, $pk);


		$v = TspararcPeer::doSelect($criteria, $con);

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
			$criteria->add(TspararcPeer::ID, $pks, Criteria::IN);
			$objs = TspararcPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTspararcPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TspararcMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TspararcMapBuilder');
}
