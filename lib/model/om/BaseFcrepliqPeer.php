<?php


abstract class BaseFcrepliqPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcrepliq';

	
	const CLASS_DEFAULT = 'lib.model.Fcrepliq';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMREP = 'fcrepliq.NUMREP';

	
	const ANO = 'fcrepliq.ANO';

	
	const CODACT = 'fcrepliq.CODACT';

	
	const MONING = 'fcrepliq.MONING';

	
	const MONIMP = 'fcrepliq.MONIMP';

	
	const MONFIS = 'fcrepliq.MONFIS';

	
	const PORALI = 'fcrepliq.PORALI';

	
	const MONLIQ = 'fcrepliq.MONLIQ';

	
	const ID = 'fcrepliq.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numrep', 'Ano', 'Codact', 'Moning', 'Monimp', 'Monfis', 'Porali', 'Monliq', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcrepliqPeer::NUMREP, FcrepliqPeer::ANO, FcrepliqPeer::CODACT, FcrepliqPeer::MONING, FcrepliqPeer::MONIMP, FcrepliqPeer::MONFIS, FcrepliqPeer::PORALI, FcrepliqPeer::MONLIQ, FcrepliqPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numrep', 'ano', 'codact', 'moning', 'monimp', 'monfis', 'porali', 'monliq', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numrep' => 0, 'Ano' => 1, 'Codact' => 2, 'Moning' => 3, 'Monimp' => 4, 'Monfis' => 5, 'Porali' => 6, 'Monliq' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (FcrepliqPeer::NUMREP => 0, FcrepliqPeer::ANO => 1, FcrepliqPeer::CODACT => 2, FcrepliqPeer::MONING => 3, FcrepliqPeer::MONIMP => 4, FcrepliqPeer::MONFIS => 5, FcrepliqPeer::PORALI => 6, FcrepliqPeer::MONLIQ => 7, FcrepliqPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('numrep' => 0, 'ano' => 1, 'codact' => 2, 'moning' => 3, 'monimp' => 4, 'monfis' => 5, 'porali' => 6, 'monliq' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcrepliqMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcrepliqMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcrepliqPeer::getTableMap();
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
		return str_replace(FcrepliqPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcrepliqPeer::NUMREP);

		$criteria->addSelectColumn(FcrepliqPeer::ANO);

		$criteria->addSelectColumn(FcrepliqPeer::CODACT);

		$criteria->addSelectColumn(FcrepliqPeer::MONING);

		$criteria->addSelectColumn(FcrepliqPeer::MONIMP);

		$criteria->addSelectColumn(FcrepliqPeer::MONFIS);

		$criteria->addSelectColumn(FcrepliqPeer::PORALI);

		$criteria->addSelectColumn(FcrepliqPeer::MONLIQ);

		$criteria->addSelectColumn(FcrepliqPeer::ID);

	}

	const COUNT = 'COUNT(fcrepliq.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcrepliq.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcrepliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcrepliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcrepliqPeer::doSelectRS($criteria, $con);
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
		$objects = FcrepliqPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcrepliqPeer::populateObjects(FcrepliqPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcrepliqPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcrepliqPeer::getOMClass();
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
		return FcrepliqPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcrepliqPeer::ID); 

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
			$comparison = $criteria->getComparison(FcrepliqPeer::ID);
			$selectCriteria->add(FcrepliqPeer::ID, $criteria->remove(FcrepliqPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcrepliqPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcrepliqPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcrepliq) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcrepliqPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcrepliq $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcrepliqPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcrepliqPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcrepliqPeer::DATABASE_NAME, FcrepliqPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcrepliqPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcrepliqPeer::DATABASE_NAME);

		$criteria->add(FcrepliqPeer::ID, $pk);


		$v = FcrepliqPeer::doSelect($criteria, $con);

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
			$criteria->add(FcrepliqPeer::ID, $pks, Criteria::IN);
			$objs = FcrepliqPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcrepliqPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcrepliqMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcrepliqMapBuilder');
}
