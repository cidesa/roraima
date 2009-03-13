<?php


abstract class BaseFcrepfisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcrepfis';

	
	const CLASS_DEFAULT = 'lib.model.Fcrepfis';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMLIC = 'fcrepfis.NUMLIC';

	
	const FUNREC = 'fcrepfis.FUNREC';

	
	const FECREP = 'fcrepfis.FECREP';

	
	const NUMREP = 'fcrepfis.NUMREP';

	
	const MONREP = 'fcrepfis.MONREP';

	
	const CONREP = 'fcrepfis.CONREP';

	
	const MODO = 'fcrepfis.MODO';

	
	const MONADI = 'fcrepfis.MONADI';

	
	const FUEREP = 'fcrepfis.FUEREP';

	
	const FUESAN = 'fcrepfis.FUESAN';

	
	const FECREC = 'fcrepfis.FECREC';

	
	const ID = 'fcrepfis.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numlic', 'Funrec', 'Fecrep', 'Numrep', 'Monrep', 'Conrep', 'Modo', 'Monadi', 'Fuerep', 'Fuesan', 'Fecrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcrepfisPeer::NUMLIC, FcrepfisPeer::FUNREC, FcrepfisPeer::FECREP, FcrepfisPeer::NUMREP, FcrepfisPeer::MONREP, FcrepfisPeer::CONREP, FcrepfisPeer::MODO, FcrepfisPeer::MONADI, FcrepfisPeer::FUEREP, FcrepfisPeer::FUESAN, FcrepfisPeer::FECREC, FcrepfisPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numlic', 'funrec', 'fecrep', 'numrep', 'monrep', 'conrep', 'modo', 'monadi', 'fuerep', 'fuesan', 'fecrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numlic' => 0, 'Funrec' => 1, 'Fecrep' => 2, 'Numrep' => 3, 'Monrep' => 4, 'Conrep' => 5, 'Modo' => 6, 'Monadi' => 7, 'Fuerep' => 8, 'Fuesan' => 9, 'Fecrec' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (FcrepfisPeer::NUMLIC => 0, FcrepfisPeer::FUNREC => 1, FcrepfisPeer::FECREP => 2, FcrepfisPeer::NUMREP => 3, FcrepfisPeer::MONREP => 4, FcrepfisPeer::CONREP => 5, FcrepfisPeer::MODO => 6, FcrepfisPeer::MONADI => 7, FcrepfisPeer::FUEREP => 8, FcrepfisPeer::FUESAN => 9, FcrepfisPeer::FECREC => 10, FcrepfisPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('numlic' => 0, 'funrec' => 1, 'fecrep' => 2, 'numrep' => 3, 'monrep' => 4, 'conrep' => 5, 'modo' => 6, 'monadi' => 7, 'fuerep' => 8, 'fuesan' => 9, 'fecrec' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcrepfisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcrepfisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcrepfisPeer::getTableMap();
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
		return str_replace(FcrepfisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcrepfisPeer::NUMLIC);

		$criteria->addSelectColumn(FcrepfisPeer::FUNREC);

		$criteria->addSelectColumn(FcrepfisPeer::FECREP);

		$criteria->addSelectColumn(FcrepfisPeer::NUMREP);

		$criteria->addSelectColumn(FcrepfisPeer::MONREP);

		$criteria->addSelectColumn(FcrepfisPeer::CONREP);

		$criteria->addSelectColumn(FcrepfisPeer::MODO);

		$criteria->addSelectColumn(FcrepfisPeer::MONADI);

		$criteria->addSelectColumn(FcrepfisPeer::FUEREP);

		$criteria->addSelectColumn(FcrepfisPeer::FUESAN);

		$criteria->addSelectColumn(FcrepfisPeer::FECREC);

		$criteria->addSelectColumn(FcrepfisPeer::ID);

	}

	const COUNT = 'COUNT(fcrepfis.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcrepfis.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcrepfisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcrepfisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcrepfisPeer::doSelectRS($criteria, $con);
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
		$objects = FcrepfisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcrepfisPeer::populateObjects(FcrepfisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcrepfisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcrepfisPeer::getOMClass();
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
		return FcrepfisPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcrepfisPeer::ID); 

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
			$comparison = $criteria->getComparison(FcrepfisPeer::ID);
			$selectCriteria->add(FcrepfisPeer::ID, $criteria->remove(FcrepfisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcrepfisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcrepfisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcrepfis) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcrepfisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcrepfis $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcrepfisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcrepfisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcrepfisPeer::DATABASE_NAME, FcrepfisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcrepfisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcrepfisPeer::DATABASE_NAME);

		$criteria->add(FcrepfisPeer::ID, $pk);


		$v = FcrepfisPeer::doSelect($criteria, $con);

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
			$criteria->add(FcrepfisPeer::ID, $pks, Criteria::IN);
			$objs = FcrepfisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcrepfisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcrepfisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcrepfisMapBuilder');
}
