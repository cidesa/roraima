<?php


abstract class BaseFafaclibPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fafaclib';

	
	const CLASS_DEFAULT = 'lib.model.Fafaclib';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFFAC = 'fafaclib.REFFAC';

	
	const FECFAC = 'fafaclib.FECFAC';

	
	const NUMFAC = 'fafaclib.NUMFAC';

	
	const NUMCTR = 'fafaclib.NUMCTR';

	
	const CODCLI = 'fafaclib.CODCLI';

	
	const TOTFAC = 'fafaclib.TOTFAC';

	
	const VALFOB = 'fafaclib.VALFOB';

	
	const VENEXEC = 'fafaclib.VENEXEC';

	
	const VENEXON = 'fafaclib.VENEXON';

	
	const BASIMP = 'fafaclib.BASIMP';

	
	const PORIVA = 'fafaclib.PORIVA';

	
	const CREFIS = 'fafaclib.CREFIS';

	
	const MONIVA = 'fafaclib.MONIVA';

	
	const NUMCOM = 'fafaclib.NUMCOM';

	
	const ID = 'fafaclib.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reffac', 'Fecfac', 'Numfac', 'Numctr', 'Codcli', 'Totfac', 'Valfob', 'Venexec', 'Venexon', 'Basimp', 'Poriva', 'Crefis', 'Moniva', 'Numcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FafaclibPeer::REFFAC, FafaclibPeer::FECFAC, FafaclibPeer::NUMFAC, FafaclibPeer::NUMCTR, FafaclibPeer::CODCLI, FafaclibPeer::TOTFAC, FafaclibPeer::VALFOB, FafaclibPeer::VENEXEC, FafaclibPeer::VENEXON, FafaclibPeer::BASIMP, FafaclibPeer::PORIVA, FafaclibPeer::CREFIS, FafaclibPeer::MONIVA, FafaclibPeer::NUMCOM, FafaclibPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reffac', 'fecfac', 'numfac', 'numctr', 'codcli', 'totfac', 'valfob', 'venexec', 'venexon', 'basimp', 'poriva', 'crefis', 'moniva', 'numcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reffac' => 0, 'Fecfac' => 1, 'Numfac' => 2, 'Numctr' => 3, 'Codcli' => 4, 'Totfac' => 5, 'Valfob' => 6, 'Venexec' => 7, 'Venexon' => 8, 'Basimp' => 9, 'Poriva' => 10, 'Crefis' => 11, 'Moniva' => 12, 'Numcom' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (FafaclibPeer::REFFAC => 0, FafaclibPeer::FECFAC => 1, FafaclibPeer::NUMFAC => 2, FafaclibPeer::NUMCTR => 3, FafaclibPeer::CODCLI => 4, FafaclibPeer::TOTFAC => 5, FafaclibPeer::VALFOB => 6, FafaclibPeer::VENEXEC => 7, FafaclibPeer::VENEXON => 8, FafaclibPeer::BASIMP => 9, FafaclibPeer::PORIVA => 10, FafaclibPeer::CREFIS => 11, FafaclibPeer::MONIVA => 12, FafaclibPeer::NUMCOM => 13, FafaclibPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('reffac' => 0, 'fecfac' => 1, 'numfac' => 2, 'numctr' => 3, 'codcli' => 4, 'totfac' => 5, 'valfob' => 6, 'venexec' => 7, 'venexon' => 8, 'basimp' => 9, 'poriva' => 10, 'crefis' => 11, 'moniva' => 12, 'numcom' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FafaclibMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FafaclibMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FafaclibPeer::getTableMap();
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
		return str_replace(FafaclibPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FafaclibPeer::REFFAC);

		$criteria->addSelectColumn(FafaclibPeer::FECFAC);

		$criteria->addSelectColumn(FafaclibPeer::NUMFAC);

		$criteria->addSelectColumn(FafaclibPeer::NUMCTR);

		$criteria->addSelectColumn(FafaclibPeer::CODCLI);

		$criteria->addSelectColumn(FafaclibPeer::TOTFAC);

		$criteria->addSelectColumn(FafaclibPeer::VALFOB);

		$criteria->addSelectColumn(FafaclibPeer::VENEXEC);

		$criteria->addSelectColumn(FafaclibPeer::VENEXON);

		$criteria->addSelectColumn(FafaclibPeer::BASIMP);

		$criteria->addSelectColumn(FafaclibPeer::PORIVA);

		$criteria->addSelectColumn(FafaclibPeer::CREFIS);

		$criteria->addSelectColumn(FafaclibPeer::MONIVA);

		$criteria->addSelectColumn(FafaclibPeer::NUMCOM);

		$criteria->addSelectColumn(FafaclibPeer::ID);

	}

	const COUNT = 'COUNT(fafaclib.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fafaclib.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FafaclibPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FafaclibPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FafaclibPeer::doSelectRS($criteria, $con);
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
		$objects = FafaclibPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FafaclibPeer::populateObjects(FafaclibPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FafaclibPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FafaclibPeer::getOMClass();
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
		return FafaclibPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FafaclibPeer::ID); 

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
			$comparison = $criteria->getComparison(FafaclibPeer::ID);
			$selectCriteria->add(FafaclibPeer::ID, $criteria->remove(FafaclibPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FafaclibPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FafaclibPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fafaclib) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FafaclibPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fafaclib $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FafaclibPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FafaclibPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FafaclibPeer::DATABASE_NAME, FafaclibPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FafaclibPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FafaclibPeer::DATABASE_NAME);

		$criteria->add(FafaclibPeer::ID, $pk);


		$v = FafaclibPeer::doSelect($criteria, $con);

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
			$criteria->add(FafaclibPeer::ID, $pks, Criteria::IN);
			$objs = FafaclibPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFafaclibPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FafaclibMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FafaclibMapBuilder');
}
