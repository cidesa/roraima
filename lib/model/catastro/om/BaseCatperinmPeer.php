<?php


abstract class BaseCatperinmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'catperinm';

	
	const CLASS_DEFAULT = 'lib.model.catastro.Catperinm';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CATREGINM_ID = 'catperinm.CATREGINM_ID';

	
	const CATREGPER_ID = 'catperinm.CATREGPER_ID';

	
	const CONOCU = 'catperinm.CONOCU';

	
	const TIPPER = 'catperinm.TIPPER';

	
	const ID = 'catperinm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CatreginmId', 'CatregperId', 'Conocu', 'Tipper', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CatperinmPeer::CATREGINM_ID, CatperinmPeer::CATREGPER_ID, CatperinmPeer::CONOCU, CatperinmPeer::TIPPER, CatperinmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('catreginm_id', 'catregper_id', 'conocu', 'tipper', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CatreginmId' => 0, 'CatregperId' => 1, 'Conocu' => 2, 'Tipper' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (CatperinmPeer::CATREGINM_ID => 0, CatperinmPeer::CATREGPER_ID => 1, CatperinmPeer::CONOCU => 2, CatperinmPeer::TIPPER => 3, CatperinmPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('catreginm_id' => 0, 'catregper_id' => 1, 'conocu' => 2, 'tipper' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/catastro/map/CatperinmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.catastro.map.CatperinmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CatperinmPeer::getTableMap();
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
		return str_replace(CatperinmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CatperinmPeer::CATREGINM_ID);

		$criteria->addSelectColumn(CatperinmPeer::CATREGPER_ID);

		$criteria->addSelectColumn(CatperinmPeer::CONOCU);

		$criteria->addSelectColumn(CatperinmPeer::TIPPER);

		$criteria->addSelectColumn(CatperinmPeer::ID);

	}

	const COUNT = 'COUNT(catperinm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT catperinm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatperinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatperinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CatperinmPeer::doSelectRS($criteria, $con);
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
		$objects = CatperinmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CatperinmPeer::populateObjects(CatperinmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CatperinmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CatperinmPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatreginm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatperinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatperinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatperinmPeer::CATREGINM_ID, CatreginmPeer::ID);

		$rs = CatperinmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatregper(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatperinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatperinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatperinmPeer::CATREGPER_ID, CatregperPeer::ID);

		$rs = CatperinmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatreginm(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatperinmPeer::addSelectColumns($c);
		$startcol = (CatperinmPeer::NUM_COLUMNS - CatperinmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatreginmPeer::addSelectColumns($c);

		$c->addJoin(CatperinmPeer::CATREGINM_ID, CatreginmPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatperinmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatreginm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatperinm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatperinms();
				$obj2->addCatperinm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatregper(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatperinmPeer::addSelectColumns($c);
		$startcol = (CatperinmPeer::NUM_COLUMNS - CatperinmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatregperPeer::addSelectColumns($c);

		$c->addJoin(CatperinmPeer::CATREGPER_ID, CatregperPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatperinmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatregper(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatperinm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatperinms();
				$obj2->addCatperinm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatperinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatperinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatperinmPeer::CATREGINM_ID, CatreginmPeer::ID);

		$criteria->addJoin(CatperinmPeer::CATREGPER_ID, CatregperPeer::ID);

		$rs = CatperinmPeer::doSelectRS($criteria, $con);
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

		CatperinmPeer::addSelectColumns($c);
		$startcol2 = (CatperinmPeer::NUM_COLUMNS - CatperinmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatreginmPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatreginmPeer::NUM_COLUMNS;

		CatregperPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatregperPeer::NUM_COLUMNS;

		$c->addJoin(CatperinmPeer::CATREGINM_ID, CatreginmPeer::ID);

		$c->addJoin(CatperinmPeer::CATREGPER_ID, CatregperPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatperinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CatreginmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatreginm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatperinm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCatperinms();
				$obj2->addCatperinm($obj1);
			}


					
			$omClass = CatregperPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatregper(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatperinm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCatperinms();
				$obj3->addCatperinm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCatreginm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatperinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatperinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatperinmPeer::CATREGPER_ID, CatregperPeer::ID);

		$rs = CatperinmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatregper(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatperinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatperinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatperinmPeer::CATREGINM_ID, CatreginmPeer::ID);

		$rs = CatperinmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCatreginm(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatperinmPeer::addSelectColumns($c);
		$startcol2 = (CatperinmPeer::NUM_COLUMNS - CatperinmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatregperPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatregperPeer::NUM_COLUMNS;

		$c->addJoin(CatperinmPeer::CATREGPER_ID, CatregperPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatperinmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatregperPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatregper(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatperinm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatperinms();
				$obj2->addCatperinm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatregper(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatperinmPeer::addSelectColumns($c);
		$startcol2 = (CatperinmPeer::NUM_COLUMNS - CatperinmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatreginmPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatreginmPeer::NUM_COLUMNS;

		$c->addJoin(CatperinmPeer::CATREGINM_ID, CatreginmPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatperinmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatreginmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatreginm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatperinm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatperinms();
				$obj2->addCatperinm($obj1);
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
		return CatperinmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CatperinmPeer::ID); 

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
			$comparison = $criteria->getComparison(CatperinmPeer::ID);
			$selectCriteria->add(CatperinmPeer::ID, $criteria->remove(CatperinmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CatperinmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CatperinmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Catperinm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CatperinmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Catperinm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CatperinmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CatperinmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CatperinmPeer::DATABASE_NAME, CatperinmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CatperinmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CatperinmPeer::DATABASE_NAME);

		$criteria->add(CatperinmPeer::ID, $pk);


		$v = CatperinmPeer::doSelect($criteria, $con);

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
			$criteria->add(CatperinmPeer::ID, $pks, Criteria::IN);
			$objs = CatperinmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCatperinmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/catastro/map/CatperinmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.catastro.map.CatperinmMapBuilder');
}
