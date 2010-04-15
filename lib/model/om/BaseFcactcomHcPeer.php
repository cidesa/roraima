<?php


abstract class BaseFcactcomHcPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcactcom_hc';

	
	const CLASS_DEFAULT = 'lib.model.FcactcomHc';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'fcactcom_hc.CODACT';

	
	const DESACT = 'fcactcom_hc.DESACT';

	
	const MINTRI = 'fcactcom_hc.MINTRI';

	
	const EXONER = 'fcactcom_hc.EXONER';

	
	const MINOFAC = 'fcactcom_hc.MINOFAC';

	
	const TIPALI = 'fcactcom_hc.TIPALI';

	
	const PORREB = 'fcactcom_hc.PORREB';

	
	const EXEPTO = 'fcactcom_hc.EXEPTO';

	
	const REBAJA = 'fcactcom_hc.REBAJA';

	
	const EXENTO = 'fcactcom_hc.EXENTO';

	
	const TEM = 'fcactcom_hc.TEM';

	
	const AFOACT = 'fcactcom_hc.AFOACT';

	
	const ANOACT = 'fcactcom_hc.ANOACT';

	
	const ID = 'fcactcom_hc.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Desact', 'Mintri', 'Exoner', 'Minofac', 'Tipali', 'Porreb', 'Exepto', 'Rebaja', 'Exento', 'Tem', 'Afoact', 'Anoact', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcactcomHcPeer::CODACT, FcactcomHcPeer::DESACT, FcactcomHcPeer::MINTRI, FcactcomHcPeer::EXONER, FcactcomHcPeer::MINOFAC, FcactcomHcPeer::TIPALI, FcactcomHcPeer::PORREB, FcactcomHcPeer::EXEPTO, FcactcomHcPeer::REBAJA, FcactcomHcPeer::EXENTO, FcactcomHcPeer::TEM, FcactcomHcPeer::AFOACT, FcactcomHcPeer::ANOACT, FcactcomHcPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'desact', 'mintri', 'exoner', 'minofac', 'tipali', 'porreb', 'exepto', 'rebaja', 'exento', 'tem', 'afoact', 'anoact', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Desact' => 1, 'Mintri' => 2, 'Exoner' => 3, 'Minofac' => 4, 'Tipali' => 5, 'Porreb' => 6, 'Exepto' => 7, 'Rebaja' => 8, 'Exento' => 9, 'Tem' => 10, 'Afoact' => 11, 'Anoact' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (FcactcomHcPeer::CODACT => 0, FcactcomHcPeer::DESACT => 1, FcactcomHcPeer::MINTRI => 2, FcactcomHcPeer::EXONER => 3, FcactcomHcPeer::MINOFAC => 4, FcactcomHcPeer::TIPALI => 5, FcactcomHcPeer::PORREB => 6, FcactcomHcPeer::EXEPTO => 7, FcactcomHcPeer::REBAJA => 8, FcactcomHcPeer::EXENTO => 9, FcactcomHcPeer::TEM => 10, FcactcomHcPeer::AFOACT => 11, FcactcomHcPeer::ANOACT => 12, FcactcomHcPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'desact' => 1, 'mintri' => 2, 'exoner' => 3, 'minofac' => 4, 'tipali' => 5, 'porreb' => 6, 'exepto' => 7, 'rebaja' => 8, 'exento' => 9, 'tem' => 10, 'afoact' => 11, 'anoact' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcactcomHcMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcactcomHcMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcactcomHcPeer::getTableMap();
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
		return str_replace(FcactcomHcPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcactcomHcPeer::CODACT);

		$criteria->addSelectColumn(FcactcomHcPeer::DESACT);

		$criteria->addSelectColumn(FcactcomHcPeer::MINTRI);

		$criteria->addSelectColumn(FcactcomHcPeer::EXONER);

		$criteria->addSelectColumn(FcactcomHcPeer::MINOFAC);

		$criteria->addSelectColumn(FcactcomHcPeer::TIPALI);

		$criteria->addSelectColumn(FcactcomHcPeer::PORREB);

		$criteria->addSelectColumn(FcactcomHcPeer::EXEPTO);

		$criteria->addSelectColumn(FcactcomHcPeer::REBAJA);

		$criteria->addSelectColumn(FcactcomHcPeer::EXENTO);

		$criteria->addSelectColumn(FcactcomHcPeer::TEM);

		$criteria->addSelectColumn(FcactcomHcPeer::AFOACT);

		$criteria->addSelectColumn(FcactcomHcPeer::ANOACT);

		$criteria->addSelectColumn(FcactcomHcPeer::ID);

	}

	const COUNT = 'COUNT(fcactcom_hc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcactcom_hc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcactcomHcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcactcomHcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcactcomHcPeer::doSelectRS($criteria, $con);
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
		$objects = FcactcomHcPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcactcomHcPeer::populateObjects(FcactcomHcPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcactcomHcPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcactcomHcPeer::getOMClass();
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
		return FcactcomHcPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcactcomHcPeer::ID); 

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
			$comparison = $criteria->getComparison(FcactcomHcPeer::ID);
			$selectCriteria->add(FcactcomHcPeer::ID, $criteria->remove(FcactcomHcPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcactcomHcPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcactcomHcPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof FcactcomHc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcactcomHcPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(FcactcomHc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcactcomHcPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcactcomHcPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcactcomHcPeer::DATABASE_NAME, FcactcomHcPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcactcomHcPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcactcomHcPeer::DATABASE_NAME);

		$criteria->add(FcactcomHcPeer::ID, $pk);


		$v = FcactcomHcPeer::doSelect($criteria, $con);

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
			$criteria->add(FcactcomHcPeer::ID, $pks, Criteria::IN);
			$objs = FcactcomHcPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcactcomHcPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcactcomHcMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcactcomHcMapBuilder');
}
