<?php


abstract class BaseCcsolliqdocanePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccsolliqdocane';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccsolliqdocane';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccsolliqdocane.ID';

	
	const CCSOLLIQ_ID = 'ccsolliqdocane.CCSOLLIQ_ID';

	
	const CCDOCANE_ID = 'ccsolliqdocane.CCDOCANE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'CcsolliqId', 'CcdocaneId', ),
		BasePeer::TYPE_COLNAME => array (CcsolliqdocanePeer::ID, CcsolliqdocanePeer::CCSOLLIQ_ID, CcsolliqdocanePeer::CCDOCANE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'ccsolliq_id', 'ccdocane_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'CcsolliqId' => 1, 'CcdocaneId' => 2, ),
		BasePeer::TYPE_COLNAME => array (CcsolliqdocanePeer::ID => 0, CcsolliqdocanePeer::CCSOLLIQ_ID => 1, CcsolliqdocanePeer::CCDOCANE_ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'ccsolliq_id' => 1, 'ccdocane_id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcsolliqdocaneMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcsolliqdocaneMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcsolliqdocanePeer::getTableMap();
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
		return str_replace(CcsolliqdocanePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcsolliqdocanePeer::ID);

		$criteria->addSelectColumn(CcsolliqdocanePeer::CCSOLLIQ_ID);

		$criteria->addSelectColumn(CcsolliqdocanePeer::CCDOCANE_ID);

	}

	const COUNT = 'COUNT(ccsolliqdocane.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccsolliqdocane.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcsolliqdocanePeer::doSelectRS($criteria, $con);
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
		$objects = CcsolliqdocanePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcsolliqdocanePeer::populateObjects(CcsolliqdocanePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcsolliqdocanePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcsolliqdocanePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcsolliq(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsolliqdocanePeer::CCSOLLIQ_ID, CcsolliqPeer::ID);

		$rs = CcsolliqdocanePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcdocane(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsolliqdocanePeer::CCDOCANE_ID, CcdocanePeer::ID);

		$rs = CcsolliqdocanePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcsolliq(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqdocanePeer::addSelectColumns($c);
		$startcol = (CcsolliqdocanePeer::NUM_COLUMNS - CcsolliqdocanePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsolliqPeer::addSelectColumns($c);

		$c->addJoin(CcsolliqdocanePeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqdocanePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcsolliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcsolliq(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolliqdocane($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolliqdocanes();
				$obj2->addCcsolliqdocane($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcdocane(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqdocanePeer::addSelectColumns($c);
		$startcol = (CcsolliqdocanePeer::NUM_COLUMNS - CcsolliqdocanePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcdocanePeer::addSelectColumns($c);

		$c->addJoin(CcsolliqdocanePeer::CCDOCANE_ID, CcdocanePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqdocanePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcdocanePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcdocane(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolliqdocane($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolliqdocanes();
				$obj2->addCcsolliqdocane($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcsolliqdocanePeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$criteria->addJoin(CcsolliqdocanePeer::CCDOCANE_ID, CcdocanePeer::ID);
	
		$rs = CcsolliqdocanePeer::doSelectRS($criteria, $con);
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

		CcsolliqdocanePeer::addSelectColumns($c);
		$startcol2 = (CcsolliqdocanePeer::NUM_COLUMNS - CcsolliqdocanePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsolliqPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsolliqPeer::NUM_COLUMNS;
	
			CcdocanePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcdocanePeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolliqdocanePeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$c->addJoin(CcsolliqdocanePeer::CCDOCANE_ID, CcdocanePeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqdocanePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcsolliqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcsolliq(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsolliqdocane($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolliqdocanes();
					$obj2->addCcsolliqdocane($obj1);
				}
	

							
				$omClass = CcdocanePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcdocane(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolliqdocane($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolliqdocanes();
					$obj3->addCcsolliqdocane($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcsolliq(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsolliqdocanePeer::CCDOCANE_ID, CcdocanePeer::ID);
		
			$rs = CcsolliqdocanePeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcdocane(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsolliqdocanePeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsolliqdocanePeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
		
			$rs = CcsolliqdocanePeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcsolliq(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqdocanePeer::addSelectColumns($c);
		$startcol2 = (CcsolliqdocanePeer::NUM_COLUMNS - CcsolliqdocanePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcdocanePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcdocanePeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolliqdocanePeer::CCDOCANE_ID, CcdocanePeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqdocanePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcdocanePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcdocane(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsolliqdocane($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolliqdocanes();
					$obj2->addCcsolliqdocane($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcdocane(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqdocanePeer::addSelectColumns($c);
		$startcol2 = (CcsolliqdocanePeer::NUM_COLUMNS - CcsolliqdocanePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsolliqPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsolliqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolliqdocanePeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqdocanePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcsolliqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcsolliq(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsolliqdocane($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolliqdocanes();
					$obj2->addCcsolliqdocane($obj1);
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
		return CcsolliqdocanePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcsolliqdocanePeer::ID); 

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
			$comparison = $criteria->getComparison(CcsolliqdocanePeer::ID);
			$selectCriteria->add(CcsolliqdocanePeer::ID, $criteria->remove(CcsolliqdocanePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcsolliqdocanePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcsolliqdocanePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccsolliqdocane) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcsolliqdocanePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccsolliqdocane $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcsolliqdocanePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcsolliqdocanePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcsolliqdocanePeer::DATABASE_NAME, CcsolliqdocanePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcsolliqdocanePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcsolliqdocanePeer::DATABASE_NAME);

		$criteria->add(CcsolliqdocanePeer::ID, $pk);


		$v = CcsolliqdocanePeer::doSelect($criteria, $con);

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
			$criteria->add(CcsolliqdocanePeer::ID, $pks, Criteria::IN);
			$objs = CcsolliqdocanePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcsolliqdocanePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcsolliqdocaneMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcsolliqdocaneMapBuilder');
}
