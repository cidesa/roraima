<?php


abstract class BaseOptipretPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'optipret';

	
	const CLASS_DEFAULT = 'lib.model.Optipret';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODTIP = 'optipret.CODTIP';

	
	const DESTIP = 'optipret.DESTIP';

	
	const CODCON = 'optipret.CODCON';

	
	const BASIMP = 'optipret.BASIMP';

	
	const PORRET = 'optipret.PORRET';

	
	const UNITRI = 'optipret.UNITRI';

	
	const PORSUS = 'optipret.PORSUS';

	
	const FACTOR = 'optipret.FACTOR';

	
	const CODTIPSEN = 'optipret.CODTIPSEN';

	
	const MBASMI = 'optipret.MBASMI';

	
	const ID = 'optipret.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codtip', 'Destip', 'Codcon', 'Basimp', 'Porret', 'Unitri', 'Porsus', 'Factor', 'Codtipsen', 'Mbasmi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OptipretPeer::CODTIP, OptipretPeer::DESTIP, OptipretPeer::CODCON, OptipretPeer::BASIMP, OptipretPeer::PORRET, OptipretPeer::UNITRI, OptipretPeer::PORSUS, OptipretPeer::FACTOR, OptipretPeer::CODTIPSEN, OptipretPeer::MBASMI, OptipretPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codtip', 'destip', 'codcon', 'basimp', 'porret', 'unitri', 'porsus', 'factor', 'codtipsen', 'mbasmi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codtip' => 0, 'Destip' => 1, 'Codcon' => 2, 'Basimp' => 3, 'Porret' => 4, 'Unitri' => 5, 'Porsus' => 6, 'Factor' => 7, 'Codtipsen' => 8, 'Mbasmi' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (OptipretPeer::CODTIP => 0, OptipretPeer::DESTIP => 1, OptipretPeer::CODCON => 2, OptipretPeer::BASIMP => 3, OptipretPeer::PORRET => 4, OptipretPeer::UNITRI => 5, OptipretPeer::PORSUS => 6, OptipretPeer::FACTOR => 7, OptipretPeer::CODTIPSEN => 8, OptipretPeer::MBASMI => 9, OptipretPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codtip' => 0, 'destip' => 1, 'codcon' => 2, 'basimp' => 3, 'porret' => 4, 'unitri' => 5, 'porsus' => 6, 'factor' => 7, 'codtipsen' => 8, 'mbasmi' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OptipretMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OptipretMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OptipretPeer::getTableMap();
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
		return str_replace(OptipretPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OptipretPeer::CODTIP);

		$criteria->addSelectColumn(OptipretPeer::DESTIP);

		$criteria->addSelectColumn(OptipretPeer::CODCON);

		$criteria->addSelectColumn(OptipretPeer::BASIMP);

		$criteria->addSelectColumn(OptipretPeer::PORRET);

		$criteria->addSelectColumn(OptipretPeer::UNITRI);

		$criteria->addSelectColumn(OptipretPeer::PORSUS);

		$criteria->addSelectColumn(OptipretPeer::FACTOR);

		$criteria->addSelectColumn(OptipretPeer::CODTIPSEN);

		$criteria->addSelectColumn(OptipretPeer::MBASMI);

		$criteria->addSelectColumn(OptipretPeer::ID);

	}

	const COUNT = 'COUNT(optipret.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT optipret.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OptipretPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OptipretPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OptipretPeer::doSelectRS($criteria, $con);
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
		$objects = OptipretPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OptipretPeer::populateObjects(OptipretPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OptipretPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OptipretPeer::getOMClass();
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
		return OptipretPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OptipretPeer::ID); 

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
			$comparison = $criteria->getComparison(OptipretPeer::ID);
			$selectCriteria->add(OptipretPeer::ID, $criteria->remove(OptipretPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OptipretPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OptipretPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Optipret) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OptipretPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Optipret $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OptipretPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OptipretPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OptipretPeer::DATABASE_NAME, OptipretPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OptipretPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OptipretPeer::DATABASE_NAME);

		$criteria->add(OptipretPeer::ID, $pk);


		$v = OptipretPeer::doSelect($criteria, $con);

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
			$criteria->add(OptipretPeer::ID, $pks, Criteria::IN);
			$objs = OptipretPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOptipretPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OptipretMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OptipretMapBuilder');
}
