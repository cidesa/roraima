<?php


abstract class BaseCobdetforPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cobdetfor';

	
	const CLASS_DEFAULT = 'lib.model.Cobdetfor';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMTRA = 'cobdetfor.NUMTRA';

	
	const CODCLI = 'cobdetfor.CODCLI';

	
	const CORREL = 'cobdetfor.CORREL';

	
	const NUMIDE = 'cobdetfor.NUMIDE';

	
	const CODBAN = 'cobdetfor.CODBAN';

	
	const MONPAG = 'cobdetfor.MONPAG';

	
	const FATIPPAG_ID = 'cobdetfor.FATIPPAG_ID';

	
	const ID = 'cobdetfor.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra', 'Codcli', 'Correl', 'Numide', 'Codban', 'Monpag', 'FatippagId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CobdetforPeer::NUMTRA, CobdetforPeer::CODCLI, CobdetforPeer::CORREL, CobdetforPeer::NUMIDE, CobdetforPeer::CODBAN, CobdetforPeer::MONPAG, CobdetforPeer::FATIPPAG_ID, CobdetforPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra', 'codcli', 'correl', 'numide', 'codban', 'monpag', 'fatippag_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra' => 0, 'Codcli' => 1, 'Correl' => 2, 'Numide' => 3, 'Codban' => 4, 'Monpag' => 5, 'FatippagId' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (CobdetforPeer::NUMTRA => 0, CobdetforPeer::CODCLI => 1, CobdetforPeer::CORREL => 2, CobdetforPeer::NUMIDE => 3, CobdetforPeer::CODBAN => 4, CobdetforPeer::MONPAG => 5, CobdetforPeer::FATIPPAG_ID => 6, CobdetforPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra' => 0, 'codcli' => 1, 'correl' => 2, 'numide' => 3, 'codban' => 4, 'monpag' => 5, 'fatippag_id' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CobdetforMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CobdetforMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CobdetforPeer::getTableMap();
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
		return str_replace(CobdetforPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CobdetforPeer::NUMTRA);

		$criteria->addSelectColumn(CobdetforPeer::CODCLI);

		$criteria->addSelectColumn(CobdetforPeer::CORREL);

		$criteria->addSelectColumn(CobdetforPeer::NUMIDE);

		$criteria->addSelectColumn(CobdetforPeer::CODBAN);

		$criteria->addSelectColumn(CobdetforPeer::MONPAG);

		$criteria->addSelectColumn(CobdetforPeer::FATIPPAG_ID);

		$criteria->addSelectColumn(CobdetforPeer::ID);

	}

	const COUNT = 'COUNT(cobdetfor.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cobdetfor.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobdetforPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobdetforPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CobdetforPeer::doSelectRS($criteria, $con);
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
		$objects = CobdetforPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CobdetforPeer::populateObjects(CobdetforPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CobdetforPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CobdetforPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFatippag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobdetforPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobdetforPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CobdetforPeer::FATIPPAG_ID, FatippagPeer::ID);

		$rs = CobdetforPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFatippag(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CobdetforPeer::addSelectColumns($c);
		$startcol = (CobdetforPeer::NUM_COLUMNS - CobdetforPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FatippagPeer::addSelectColumns($c);

		$c->addJoin(CobdetforPeer::FATIPPAG_ID, FatippagPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CobdetforPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FatippagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFatippag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCobdetfor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCobdetfors();
				$obj2->addCobdetfor($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobdetforPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobdetforPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CobdetforPeer::FATIPPAG_ID, FatippagPeer::ID);

		$rs = CobdetforPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CobdetforPeer::addSelectColumns($c);
		$startcol2 = (CobdetforPeer::NUM_COLUMNS - CobdetforPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FatippagPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FatippagPeer::NUM_COLUMNS;

		$c->addJoin(CobdetforPeer::FATIPPAG_ID, FatippagPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CobdetforPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = FatippagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFatippag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCobdetfor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCobdetfors();
				$obj2->addCobdetfor($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return CobdetforPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CobdetforPeer::ID); 

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
			$comparison = $criteria->getComparison(CobdetforPeer::ID);
			$selectCriteria->add(CobdetforPeer::ID, $criteria->remove(CobdetforPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CobdetforPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CobdetforPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cobdetfor) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CobdetforPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cobdetfor $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CobdetforPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CobdetforPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CobdetforPeer::DATABASE_NAME, CobdetforPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CobdetforPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CobdetforPeer::DATABASE_NAME);

		$criteria->add(CobdetforPeer::ID, $pk);


		$v = CobdetforPeer::doSelect($criteria, $con);

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
			$criteria->add(CobdetforPeer::ID, $pks, Criteria::IN);
			$objs = CobdetforPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCobdetforPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CobdetforMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CobdetforMapBuilder');
}
