<?php


abstract class BaseCcvarbalgerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccvarbalger';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccvarbalger';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccvarbalger.ID';

	
	const FECVARBALGER = 'ccvarbalger.FECVARBALGER';

	
	const MONVARBALGER = 'ccvarbalger.MONVARBALGER';

	
	const CCBALGER_ID = 'ccvarbalger.CCBALGER_ID';

	
	const CCVARIAB_ID = 'ccvarbalger.CCVARIAB_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecvarbalger', 'Monvarbalger', 'CcbalgerId', 'CcvariabId', ),
		BasePeer::TYPE_COLNAME => array (CcvarbalgerPeer::ID, CcvarbalgerPeer::FECVARBALGER, CcvarbalgerPeer::MONVARBALGER, CcvarbalgerPeer::CCBALGER_ID, CcvarbalgerPeer::CCVARIAB_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecvarbalger', 'monvarbalger', 'ccbalger_id', 'ccvariab_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecvarbalger' => 1, 'Monvarbalger' => 2, 'CcbalgerId' => 3, 'CcvariabId' => 4, ),
		BasePeer::TYPE_COLNAME => array (CcvarbalgerPeer::ID => 0, CcvarbalgerPeer::FECVARBALGER => 1, CcvarbalgerPeer::MONVARBALGER => 2, CcvarbalgerPeer::CCBALGER_ID => 3, CcvarbalgerPeer::CCVARIAB_ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecvarbalger' => 1, 'monvarbalger' => 2, 'ccbalger_id' => 3, 'ccvariab_id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcvarbalgerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcvarbalgerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcvarbalgerPeer::getTableMap();
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
		return str_replace(CcvarbalgerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcvarbalgerPeer::ID);

		$criteria->addSelectColumn(CcvarbalgerPeer::FECVARBALGER);

		$criteria->addSelectColumn(CcvarbalgerPeer::MONVARBALGER);

		$criteria->addSelectColumn(CcvarbalgerPeer::CCBALGER_ID);

		$criteria->addSelectColumn(CcvarbalgerPeer::CCVARIAB_ID);

	}

	const COUNT = 'COUNT(ccvarbalger.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccvarbalger.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcvarbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcvarbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcvarbalgerPeer::doSelectRS($criteria, $con);
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
		$objects = CcvarbalgerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcvarbalgerPeer::populateObjects(CcvarbalgerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcvarbalgerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcvarbalgerPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcbalger(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcvarbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcvarbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcvarbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);

		$rs = CcvarbalgerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcvariab(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcvarbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcvarbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcvarbalgerPeer::CCVARIAB_ID, CcvariabPeer::ID);

		$rs = CcvarbalgerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcbalger(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcvarbalgerPeer::addSelectColumns($c);
		$startcol = (CcvarbalgerPeer::NUM_COLUMNS - CcvarbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbalgerPeer::addSelectColumns($c);

		$c->addJoin(CcvarbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcvarbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcbalger(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcvarbalger($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcvarbalgers();
				$obj2->addCcvarbalger($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcvariab(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcvarbalgerPeer::addSelectColumns($c);
		$startcol = (CcvarbalgerPeer::NUM_COLUMNS - CcvarbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcvariabPeer::addSelectColumns($c);

		$c->addJoin(CcvarbalgerPeer::CCVARIAB_ID, CcvariabPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcvarbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcvariabPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcvariab(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcvarbalger($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcvarbalgers();
				$obj2->addCcvarbalger($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcvarbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcvarbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcvarbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);
	
			$criteria->addJoin(CcvarbalgerPeer::CCVARIAB_ID, CcvariabPeer::ID);
	
		$rs = CcvarbalgerPeer::doSelectRS($criteria, $con);
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

		CcvarbalgerPeer::addSelectColumns($c);
		$startcol2 = (CcvarbalgerPeer::NUM_COLUMNS - CcvarbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbalgerPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbalgerPeer::NUM_COLUMNS;
	
			CcvariabPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcvariabPeer::NUM_COLUMNS;
	
			$c->addJoin(CcvarbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);
	
			$c->addJoin(CcvarbalgerPeer::CCVARIAB_ID, CcvariabPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcvarbalgerPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcbalgerPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbalger(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcvarbalger($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcvarbalgers();
					$obj2->addCcvarbalger($obj1);
				}
	

							
				$omClass = CcvariabPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcvariab(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcvarbalger($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcvarbalgers();
					$obj3->addCcvarbalger($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcbalger(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcvarbalgerPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcvarbalgerPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcvarbalgerPeer::CCVARIAB_ID, CcvariabPeer::ID);
		
			$rs = CcvarbalgerPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcvariab(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcvarbalgerPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcvarbalgerPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcvarbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);
		
			$rs = CcvarbalgerPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcbalger(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcvarbalgerPeer::addSelectColumns($c);
		$startcol2 = (CcvarbalgerPeer::NUM_COLUMNS - CcvarbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcvariabPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcvariabPeer::NUM_COLUMNS;
	
			$c->addJoin(CcvarbalgerPeer::CCVARIAB_ID, CcvariabPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcvarbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcvariabPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcvariab(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcvarbalger($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcvarbalgers();
					$obj2->addCcvarbalger($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcvariab(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcvarbalgerPeer::addSelectColumns($c);
		$startcol2 = (CcvarbalgerPeer::NUM_COLUMNS - CcvarbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbalgerPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbalgerPeer::NUM_COLUMNS;
	
			$c->addJoin(CcvarbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcvarbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbalgerPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbalger(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcvarbalger($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcvarbalgers();
					$obj2->addCcvarbalger($obj1);
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
		return CcvarbalgerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcvarbalgerPeer::ID); 

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
			$comparison = $criteria->getComparison(CcvarbalgerPeer::ID);
			$selectCriteria->add(CcvarbalgerPeer::ID, $criteria->remove(CcvarbalgerPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcvarbalgerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcvarbalgerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccvarbalger) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcvarbalgerPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccvarbalger $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcvarbalgerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcvarbalgerPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcvarbalgerPeer::DATABASE_NAME, CcvarbalgerPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcvarbalgerPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcvarbalgerPeer::DATABASE_NAME);

		$criteria->add(CcvarbalgerPeer::ID, $pk);


		$v = CcvarbalgerPeer::doSelect($criteria, $con);

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
			$criteria->add(CcvarbalgerPeer::ID, $pks, Criteria::IN);
			$objs = CcvarbalgerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcvarbalgerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcvarbalgerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcvarbalgerMapBuilder');
}
