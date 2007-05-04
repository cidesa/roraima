<?php


abstract class BaseFcdetpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcdetpag';

	
	const CLASS_DEFAULT = 'lib.model.Fcdetpag';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPAG = 'fcdetpag.NUMPAG';

	
	const NRODET = 'fcdetpag.NRODET';

	
	const MONPAG = 'fcdetpag.MONPAG';

	
	const TIPPAG = 'fcdetpag.TIPPAG';

	
	const ID = 'fcdetpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpag', 'Nrodet', 'Monpag', 'Tippag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcdetpagPeer::NUMPAG, FcdetpagPeer::NRODET, FcdetpagPeer::MONPAG, FcdetpagPeer::TIPPAG, FcdetpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpag', 'nrodet', 'monpag', 'tippag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpag' => 0, 'Nrodet' => 1, 'Monpag' => 2, 'Tippag' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (FcdetpagPeer::NUMPAG => 0, FcdetpagPeer::NRODET => 1, FcdetpagPeer::MONPAG => 2, FcdetpagPeer::TIPPAG => 3, FcdetpagPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('numpag' => 0, 'nrodet' => 1, 'monpag' => 2, 'tippag' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcdetpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcdetpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcdetpagPeer::getTableMap();
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
		return str_replace(FcdetpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcdetpagPeer::NUMPAG);

		$criteria->addSelectColumn(FcdetpagPeer::NRODET);

		$criteria->addSelectColumn(FcdetpagPeer::MONPAG);

		$criteria->addSelectColumn(FcdetpagPeer::TIPPAG);

		$criteria->addSelectColumn(FcdetpagPeer::ID);

	}

	const COUNT = 'COUNT(fcdetpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcdetpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcdetpagPeer::doSelectRS($criteria, $con);
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
		$objects = FcdetpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcdetpagPeer::populateObjects(FcdetpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcdetpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcdetpagPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFcpagos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcdetpagPeer::NUMPAG, FcpagosPeer::NUMPAG);

		$rs = FcdetpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFctippag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcdetpagPeer::TIPPAG, FctippagPeer::TIPPAG);

		$rs = FcdetpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFcpagos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcdetpagPeer::addSelectColumns($c);
		$startcol = (FcdetpagPeer::NUM_COLUMNS - FcdetpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcpagosPeer::addSelectColumns($c);

		$c->addJoin(FcdetpagPeer::NUMPAG, FcpagosPeer::NUMPAG);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcdetpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcpagosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcpagos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcdetpag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcdetpags();
				$obj2->addFcdetpag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFctippag(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcdetpagPeer::addSelectColumns($c);
		$startcol = (FcdetpagPeer::NUM_COLUMNS - FcdetpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FctippagPeer::addSelectColumns($c);

		$c->addJoin(FcdetpagPeer::TIPPAG, FctippagPeer::TIPPAG);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcdetpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FctippagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFctippag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcdetpag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcdetpags();
				$obj2->addFcdetpag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcdetpagPeer::NUMPAG, FcpagosPeer::NUMPAG);

		$criteria->addJoin(FcdetpagPeer::TIPPAG, FctippagPeer::TIPPAG);

		$rs = FcdetpagPeer::doSelectRS($criteria, $con);
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

		FcdetpagPeer::addSelectColumns($c);
		$startcol2 = (FcdetpagPeer::NUM_COLUMNS - FcdetpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FcpagosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FcpagosPeer::NUM_COLUMNS;

		FctippagPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FctippagPeer::NUM_COLUMNS;

		$c->addJoin(FcdetpagPeer::NUMPAG, FcpagosPeer::NUMPAG);

		$c->addJoin(FcdetpagPeer::TIPPAG, FctippagPeer::TIPPAG);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcdetpagPeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = FcpagosPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFcpagos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcdetpag($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcdetpags();
				$obj2->addFcdetpag($obj1);
			}

				
					
			$omClass = FctippagPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFctippag(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFcdetpag($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj3->initFcdetpags();
				$obj3->addFcdetpag($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptFcpagos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcdetpagPeer::TIPPAG, FctippagPeer::TIPPAG);

		$rs = FcdetpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptFctippag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetpagPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcdetpagPeer::NUMPAG, FcpagosPeer::NUMPAG);

		$rs = FcdetpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptFcpagos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcdetpagPeer::addSelectColumns($c);
		$startcol2 = (FcdetpagPeer::NUM_COLUMNS - FcdetpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FctippagPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FctippagPeer::NUM_COLUMNS;

		$c->addJoin(FcdetpagPeer::TIPPAG, FctippagPeer::TIPPAG);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcdetpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = FctippagPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFctippag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcdetpag($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcdetpags();
				$obj2->addFcdetpag($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFctippag(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcdetpagPeer::addSelectColumns($c);
		$startcol2 = (FcdetpagPeer::NUM_COLUMNS - FcdetpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FcpagosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FcpagosPeer::NUM_COLUMNS;

		$c->addJoin(FcdetpagPeer::NUMPAG, FcpagosPeer::NUMPAG);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcdetpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = FcpagosPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFcpagos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcdetpag($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcdetpags();
				$obj2->addFcdetpag($obj1);
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
		return FcdetpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(FcdetpagPeer::ID);
			$selectCriteria->add(FcdetpagPeer::ID, $criteria->remove(FcdetpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcdetpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcdetpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcdetpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcdetpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcdetpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcdetpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcdetpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcdetpagPeer::DATABASE_NAME, FcdetpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcdetpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcdetpagPeer::DATABASE_NAME);

		$criteria->add(FcdetpagPeer::ID, $pk);


		$v = FcdetpagPeer::doSelect($criteria, $con);

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
			$criteria->add(FcdetpagPeer::ID, $pks, Criteria::IN);
			$objs = FcdetpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcdetpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcdetpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcdetpagMapBuilder');
}
