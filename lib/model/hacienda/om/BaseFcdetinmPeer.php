<?php


abstract class BaseFcdetinmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcdetinm';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcdetinm';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROINM = 'fcdetinm.NROINM';

	
	const ANOAVA = 'fcdetinm.ANOAVA';

	
	const CODEST = 'fcdetinm.CODEST';

	
	const CODZON = 'fcdetinm.CODZON';

	
	const CODTIP = 'fcdetinm.CODTIP';

	
	const ANOCON = 'fcdetinm.ANOCON';

	
	const VALTER = 'fcdetinm.VALTER';

	
	const VALCON = 'fcdetinm.VALCON';

	
	const MTRTER = 'fcdetinm.MTRTER';

	
	const MTRCON = 'fcdetinm.MTRCON';

	
	const DPRCON = 'fcdetinm.DPRCON';

	
	const ID = 'fcdetinm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm', 'Anoava', 'Codest', 'Codzon', 'Codtip', 'Anocon', 'Valter', 'Valcon', 'Mtrter', 'Mtrcon', 'Dprcon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcdetinmPeer::NROINM, FcdetinmPeer::ANOAVA, FcdetinmPeer::CODEST, FcdetinmPeer::CODZON, FcdetinmPeer::CODTIP, FcdetinmPeer::ANOCON, FcdetinmPeer::VALTER, FcdetinmPeer::VALCON, FcdetinmPeer::MTRTER, FcdetinmPeer::MTRCON, FcdetinmPeer::DPRCON, FcdetinmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm', 'anoava', 'codest', 'codzon', 'codtip', 'anocon', 'valter', 'valcon', 'mtrter', 'mtrcon', 'dprcon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm' => 0, 'Anoava' => 1, 'Codest' => 2, 'Codzon' => 3, 'Codtip' => 4, 'Anocon' => 5, 'Valter' => 6, 'Valcon' => 7, 'Mtrter' => 8, 'Mtrcon' => 9, 'Dprcon' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (FcdetinmPeer::NROINM => 0, FcdetinmPeer::ANOAVA => 1, FcdetinmPeer::CODEST => 2, FcdetinmPeer::CODZON => 3, FcdetinmPeer::CODTIP => 4, FcdetinmPeer::ANOCON => 5, FcdetinmPeer::VALTER => 6, FcdetinmPeer::VALCON => 7, FcdetinmPeer::MTRTER => 8, FcdetinmPeer::MTRCON => 9, FcdetinmPeer::DPRCON => 10, FcdetinmPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm' => 0, 'anoava' => 1, 'codest' => 2, 'codzon' => 3, 'codtip' => 4, 'anocon' => 5, 'valter' => 6, 'valcon' => 7, 'mtrter' => 8, 'mtrcon' => 9, 'dprcon' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcdetinmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcdetinmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcdetinmPeer::getTableMap();
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
		return str_replace(FcdetinmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcdetinmPeer::NROINM);

		$criteria->addSelectColumn(FcdetinmPeer::ANOAVA);

		$criteria->addSelectColumn(FcdetinmPeer::CODEST);

		$criteria->addSelectColumn(FcdetinmPeer::CODZON);

		$criteria->addSelectColumn(FcdetinmPeer::CODTIP);

		$criteria->addSelectColumn(FcdetinmPeer::ANOCON);

		$criteria->addSelectColumn(FcdetinmPeer::VALTER);

		$criteria->addSelectColumn(FcdetinmPeer::VALCON);

		$criteria->addSelectColumn(FcdetinmPeer::MTRTER);

		$criteria->addSelectColumn(FcdetinmPeer::MTRCON);

		$criteria->addSelectColumn(FcdetinmPeer::DPRCON);

		$criteria->addSelectColumn(FcdetinmPeer::ID);

	}

	const COUNT = 'COUNT(fcdetinm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcdetinm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcdetinmPeer::doSelectRS($criteria, $con);
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
		$objects = FcdetinmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcdetinmPeer::populateObjects(FcdetinmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcdetinmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcdetinmPeer::getOMClass();
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
		return FcdetinmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcdetinmPeer::ID); 

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
			$comparison = $criteria->getComparison(FcdetinmPeer::ID);
			$selectCriteria->add(FcdetinmPeer::ID, $criteria->remove(FcdetinmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcdetinmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcdetinmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcdetinm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcdetinmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcdetinm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcdetinmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcdetinmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcdetinmPeer::DATABASE_NAME, FcdetinmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcdetinmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcdetinmPeer::DATABASE_NAME);

		$criteria->add(FcdetinmPeer::ID, $pk);


		$v = FcdetinmPeer::doSelect($criteria, $con);

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
			$criteria->add(FcdetinmPeer::ID, $pks, Criteria::IN);
			$objs = FcdetinmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcdetinmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcdetinmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcdetinmMapBuilder');
}
