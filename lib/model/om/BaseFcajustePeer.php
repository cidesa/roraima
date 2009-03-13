<?php


abstract class BaseFcajustePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcajuste';

	
	const CLASS_DEFAULT = 'lib.model.Fcajuste';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMAJU = 'fcajuste.NUMAJU';

	
	const FECAJU = 'fcajuste.FECAJU';

	
	const DESAJU = 'fcajuste.DESAJU';

	
	const NUMDEC = 'fcajuste.NUMDEC';

	
	const STAAJU = 'fcajuste.STAAJU';

	
	const MONAJU = 'fcajuste.MONAJU';

	
	const MONREB = 'fcajuste.MONREB';

	
	const MONEXO = 'fcajuste.MONEXO';

	
	const MONIMP = 'fcajuste.MONIMP';

	
	const ID = 'fcajuste.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numaju', 'Fecaju', 'Desaju', 'Numdec', 'Staaju', 'Monaju', 'Monreb', 'Monexo', 'Monimp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcajustePeer::NUMAJU, FcajustePeer::FECAJU, FcajustePeer::DESAJU, FcajustePeer::NUMDEC, FcajustePeer::STAAJU, FcajustePeer::MONAJU, FcajustePeer::MONREB, FcajustePeer::MONEXO, FcajustePeer::MONIMP, FcajustePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numaju', 'fecaju', 'desaju', 'numdec', 'staaju', 'monaju', 'monreb', 'monexo', 'monimp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numaju' => 0, 'Fecaju' => 1, 'Desaju' => 2, 'Numdec' => 3, 'Staaju' => 4, 'Monaju' => 5, 'Monreb' => 6, 'Monexo' => 7, 'Monimp' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (FcajustePeer::NUMAJU => 0, FcajustePeer::FECAJU => 1, FcajustePeer::DESAJU => 2, FcajustePeer::NUMDEC => 3, FcajustePeer::STAAJU => 4, FcajustePeer::MONAJU => 5, FcajustePeer::MONREB => 6, FcajustePeer::MONEXO => 7, FcajustePeer::MONIMP => 8, FcajustePeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('numaju' => 0, 'fecaju' => 1, 'desaju' => 2, 'numdec' => 3, 'staaju' => 4, 'monaju' => 5, 'monreb' => 6, 'monexo' => 7, 'monimp' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcajusteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcajusteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcajustePeer::getTableMap();
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
		return str_replace(FcajustePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcajustePeer::NUMAJU);

		$criteria->addSelectColumn(FcajustePeer::FECAJU);

		$criteria->addSelectColumn(FcajustePeer::DESAJU);

		$criteria->addSelectColumn(FcajustePeer::NUMDEC);

		$criteria->addSelectColumn(FcajustePeer::STAAJU);

		$criteria->addSelectColumn(FcajustePeer::MONAJU);

		$criteria->addSelectColumn(FcajustePeer::MONREB);

		$criteria->addSelectColumn(FcajustePeer::MONEXO);

		$criteria->addSelectColumn(FcajustePeer::MONIMP);

		$criteria->addSelectColumn(FcajustePeer::ID);

	}

	const COUNT = 'COUNT(fcajuste.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcajuste.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcajustePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcajustePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcajustePeer::doSelectRS($criteria, $con);
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
		$objects = FcajustePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcajustePeer::populateObjects(FcajustePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcajustePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcajustePeer::getOMClass();
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
		return FcajustePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcajustePeer::ID); 

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
			$comparison = $criteria->getComparison(FcajustePeer::ID);
			$selectCriteria->add(FcajustePeer::ID, $criteria->remove(FcajustePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcajustePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcajustePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcajuste) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcajustePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcajuste $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcajustePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcajustePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcajustePeer::DATABASE_NAME, FcajustePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcajustePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcajustePeer::DATABASE_NAME);

		$criteria->add(FcajustePeer::ID, $pk);


		$v = FcajustePeer::doSelect($criteria, $con);

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
			$criteria->add(FcajustePeer::ID, $pks, Criteria::IN);
			$objs = FcajustePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcajustePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcajusteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcajusteMapBuilder');
}
