<?php


abstract class BaseCcindbalgerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccindbalger';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccindbalger';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccindbalger.ID';

	
	const FECINDBALGER = 'ccindbalger.FECINDBALGER';

	
	const MONINDBALGER = 'ccindbalger.MONINDBALGER';

	
	const CCBALGER_ID = 'ccindbalger.CCBALGER_ID';

	
	const CCINDICA_ID = 'ccindbalger.CCINDICA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecindbalger', 'Monindbalger', 'CcbalgerId', 'CcindicaId', ),
		BasePeer::TYPE_COLNAME => array (CcindbalgerPeer::ID, CcindbalgerPeer::FECINDBALGER, CcindbalgerPeer::MONINDBALGER, CcindbalgerPeer::CCBALGER_ID, CcindbalgerPeer::CCINDICA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecindbalger', 'monindbalger', 'ccbalger_id', 'ccindica_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecindbalger' => 1, 'Monindbalger' => 2, 'CcbalgerId' => 3, 'CcindicaId' => 4, ),
		BasePeer::TYPE_COLNAME => array (CcindbalgerPeer::ID => 0, CcindbalgerPeer::FECINDBALGER => 1, CcindbalgerPeer::MONINDBALGER => 2, CcindbalgerPeer::CCBALGER_ID => 3, CcindbalgerPeer::CCINDICA_ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecindbalger' => 1, 'monindbalger' => 2, 'ccbalger_id' => 3, 'ccindica_id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcindbalgerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcindbalgerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcindbalgerPeer::getTableMap();
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
		return str_replace(CcindbalgerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcindbalgerPeer::ID);

		$criteria->addSelectColumn(CcindbalgerPeer::FECINDBALGER);

		$criteria->addSelectColumn(CcindbalgerPeer::MONINDBALGER);

		$criteria->addSelectColumn(CcindbalgerPeer::CCBALGER_ID);

		$criteria->addSelectColumn(CcindbalgerPeer::CCINDICA_ID);

	}

	const COUNT = 'COUNT(ccindbalger.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccindbalger.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcindbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcindbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcindbalgerPeer::doSelectRS($criteria, $con);
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
		$objects = CcindbalgerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcindbalgerPeer::populateObjects(CcindbalgerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcindbalgerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcindbalgerPeer::getOMClass();
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
			$criteria->addSelectColumn(CcindbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcindbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcindbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);

		$rs = CcindbalgerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcindica(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcindbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcindbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcindbalgerPeer::CCINDICA_ID, CcindicaPeer::ID);

		$rs = CcindbalgerPeer::doSelectRS($criteria, $con);
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

		CcindbalgerPeer::addSelectColumns($c);
		$startcol = (CcindbalgerPeer::NUM_COLUMNS - CcindbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbalgerPeer::addSelectColumns($c);

		$c->addJoin(CcindbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcindbalgerPeer::getOMClass();

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
										$temp_obj2->addCcindbalger($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcindbalgers();
				$obj2->addCcindbalger($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcindica(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcindbalgerPeer::addSelectColumns($c);
		$startcol = (CcindbalgerPeer::NUM_COLUMNS - CcindbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcindicaPeer::addSelectColumns($c);

		$c->addJoin(CcindbalgerPeer::CCINDICA_ID, CcindicaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcindbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcindicaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcindica(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcindbalger($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcindbalgers();
				$obj2->addCcindbalger($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcindbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcindbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcindbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);
	
			$criteria->addJoin(CcindbalgerPeer::CCINDICA_ID, CcindicaPeer::ID);
	
		$rs = CcindbalgerPeer::doSelectRS($criteria, $con);
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

		CcindbalgerPeer::addSelectColumns($c);
		$startcol2 = (CcindbalgerPeer::NUM_COLUMNS - CcindbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbalgerPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbalgerPeer::NUM_COLUMNS;
	
			CcindicaPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcindicaPeer::NUM_COLUMNS;
	
			$c->addJoin(CcindbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);
	
			$c->addJoin(CcindbalgerPeer::CCINDICA_ID, CcindicaPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcindbalgerPeer::getOMClass();


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
						$temp_obj2->addCcindbalger($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcindbalgers();
					$obj2->addCcindbalger($obj1);
				}
	

							
				$omClass = CcindicaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcindica(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcindbalger($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcindbalgers();
					$obj3->addCcindbalger($obj1);
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
				$criteria->addSelectColumn(CcindbalgerPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcindbalgerPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcindbalgerPeer::CCINDICA_ID, CcindicaPeer::ID);
		
			$rs = CcindbalgerPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcindica(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcindbalgerPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcindbalgerPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcindbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);
		
			$rs = CcindbalgerPeer::doSelectRS($criteria, $con);
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

		CcindbalgerPeer::addSelectColumns($c);
		$startcol2 = (CcindbalgerPeer::NUM_COLUMNS - CcindbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcindicaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcindicaPeer::NUM_COLUMNS;
	
			$c->addJoin(CcindbalgerPeer::CCINDICA_ID, CcindicaPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcindbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcindicaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcindica(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcindbalger($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcindbalgers();
					$obj2->addCcindbalger($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcindica(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcindbalgerPeer::addSelectColumns($c);
		$startcol2 = (CcindbalgerPeer::NUM_COLUMNS - CcindbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbalgerPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbalgerPeer::NUM_COLUMNS;
	
			$c->addJoin(CcindbalgerPeer::CCBALGER_ID, CcbalgerPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcindbalgerPeer::getOMClass();

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
						$temp_obj2->addCcindbalger($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcindbalgers();
					$obj2->addCcindbalger($obj1);
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
		return CcindbalgerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcindbalgerPeer::ID); 

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
			$comparison = $criteria->getComparison(CcindbalgerPeer::ID);
			$selectCriteria->add(CcindbalgerPeer::ID, $criteria->remove(CcindbalgerPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcindbalgerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcindbalgerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccindbalger) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcindbalgerPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccindbalger $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcindbalgerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcindbalgerPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcindbalgerPeer::DATABASE_NAME, CcindbalgerPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcindbalgerPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcindbalgerPeer::DATABASE_NAME);

		$criteria->add(CcindbalgerPeer::ID, $pk);


		$v = CcindbalgerPeer::doSelect($criteria, $con);

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
			$criteria->add(CcindbalgerPeer::ID, $pks, Criteria::IN);
			$objs = CcindbalgerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcindbalgerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcindbalgerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcindbalgerMapBuilder');
}
