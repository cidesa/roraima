<?php


abstract class BaseFcactcomPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcactcom';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcactcom';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'fcactcom.CODACT';

	
	const DESACT = 'fcactcom.DESACT';

	
	const MINTRI = 'fcactcom.MINTRI';

	
	const EXONER = 'fcactcom.EXONER';

	
	const MINOFAC = 'fcactcom.MINOFAC';

	
	const TIPALI = 'fcactcom.TIPALI';

	
	const PORREB = 'fcactcom.PORREB';

	
	const EXEPTO = 'fcactcom.EXEPTO';

	
	const REBAJA = 'fcactcom.REBAJA';

	
	const EXENTO = 'fcactcom.EXENTO';

	
	const TEM = 'fcactcom.TEM';

	
	const AFOACT = 'fcactcom.AFOACT';

	
	const ANOACT = 'fcactcom.ANOACT';

	
	const ID = 'fcactcom.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Desact', 'Mintri', 'Exoner', 'Minofac', 'Tipali', 'Porreb', 'Exepto', 'Rebaja', 'Exento', 'Tem', 'Afoact', 'Anoact', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcactcomPeer::CODACT, FcactcomPeer::DESACT, FcactcomPeer::MINTRI, FcactcomPeer::EXONER, FcactcomPeer::MINOFAC, FcactcomPeer::TIPALI, FcactcomPeer::PORREB, FcactcomPeer::EXEPTO, FcactcomPeer::REBAJA, FcactcomPeer::EXENTO, FcactcomPeer::TEM, FcactcomPeer::AFOACT, FcactcomPeer::ANOACT, FcactcomPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'desact', 'mintri', 'exoner', 'minofac', 'tipali', 'porreb', 'exepto', 'rebaja', 'exento', 'tem', 'afoact', 'anoact', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Desact' => 1, 'Mintri' => 2, 'Exoner' => 3, 'Minofac' => 4, 'Tipali' => 5, 'Porreb' => 6, 'Exepto' => 7, 'Rebaja' => 8, 'Exento' => 9, 'Tem' => 10, 'Afoact' => 11, 'Anoact' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (FcactcomPeer::CODACT => 0, FcactcomPeer::DESACT => 1, FcactcomPeer::MINTRI => 2, FcactcomPeer::EXONER => 3, FcactcomPeer::MINOFAC => 4, FcactcomPeer::TIPALI => 5, FcactcomPeer::PORREB => 6, FcactcomPeer::EXEPTO => 7, FcactcomPeer::REBAJA => 8, FcactcomPeer::EXENTO => 9, FcactcomPeer::TEM => 10, FcactcomPeer::AFOACT => 11, FcactcomPeer::ANOACT => 12, FcactcomPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'desact' => 1, 'mintri' => 2, 'exoner' => 3, 'minofac' => 4, 'tipali' => 5, 'porreb' => 6, 'exepto' => 7, 'rebaja' => 8, 'exento' => 9, 'tem' => 10, 'afoact' => 11, 'anoact' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcactcomMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcactcomMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcactcomPeer::getTableMap();
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
		return str_replace(FcactcomPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcactcomPeer::CODACT);

		$criteria->addSelectColumn(FcactcomPeer::DESACT);

		$criteria->addSelectColumn(FcactcomPeer::MINTRI);

		$criteria->addSelectColumn(FcactcomPeer::EXONER);

		$criteria->addSelectColumn(FcactcomPeer::MINOFAC);

		$criteria->addSelectColumn(FcactcomPeer::TIPALI);

		$criteria->addSelectColumn(FcactcomPeer::PORREB);

		$criteria->addSelectColumn(FcactcomPeer::EXEPTO);

		$criteria->addSelectColumn(FcactcomPeer::REBAJA);

		$criteria->addSelectColumn(FcactcomPeer::EXENTO);

		$criteria->addSelectColumn(FcactcomPeer::TEM);

		$criteria->addSelectColumn(FcactcomPeer::AFOACT);

		$criteria->addSelectColumn(FcactcomPeer::ANOACT);

		$criteria->addSelectColumn(FcactcomPeer::ID);

	}

	const COUNT = 'COUNT(fcactcom.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcactcom.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcactcomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcactcomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcactcomPeer::doSelectRS($criteria, $con);
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
		$objects = FcactcomPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcactcomPeer::populateObjects(FcactcomPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcactcomPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcactcomPeer::getOMClass();
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
		return FcactcomPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcactcomPeer::ID); 

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
			$comparison = $criteria->getComparison(FcactcomPeer::ID);
			$selectCriteria->add(FcactcomPeer::ID, $criteria->remove(FcactcomPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcactcomPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcactcomPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcactcom) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcactcomPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcactcom $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcactcomPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcactcomPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcactcomPeer::DATABASE_NAME, FcactcomPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcactcomPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcactcomPeer::DATABASE_NAME);

		$criteria->add(FcactcomPeer::ID, $pk);


		$v = FcactcomPeer::doSelect($criteria, $con);

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
			$criteria->add(FcactcomPeer::ID, $pks, Criteria::IN);
			$objs = FcactcomPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcactcomPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcactcomMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcactcomMapBuilder');
}
