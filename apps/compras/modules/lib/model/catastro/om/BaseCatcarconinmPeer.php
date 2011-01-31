<?php


abstract class BaseCatcarconinmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'catcarconinm';

	
	const CLASS_DEFAULT = 'lib.model.catastro.Catcarconinm';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CATREGINM_ID = 'catcarconinm.CATREGINM_ID';

	
	const CATCARCON_ID = 'catcarconinm.CATCARCON_ID';

	
	const CANCAR = 'catcarconinm.CANCAR';

	
	const METARE = 'catcarconinm.METARE';

	
	const ID = 'catcarconinm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CatreginmId', 'CatcarconId', 'Cancar', 'Metare', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CatcarconinmPeer::CATREGINM_ID, CatcarconinmPeer::CATCARCON_ID, CatcarconinmPeer::CANCAR, CatcarconinmPeer::METARE, CatcarconinmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('catreginm_id', 'catcarcon_id', 'cancar', 'metare', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CatreginmId' => 0, 'CatcarconId' => 1, 'Cancar' => 2, 'Metare' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (CatcarconinmPeer::CATREGINM_ID => 0, CatcarconinmPeer::CATCARCON_ID => 1, CatcarconinmPeer::CANCAR => 2, CatcarconinmPeer::METARE => 3, CatcarconinmPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('catreginm_id' => 0, 'catcarcon_id' => 1, 'cancar' => 2, 'metare' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/catastro/map/CatcarconinmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.catastro.map.CatcarconinmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CatcarconinmPeer::getTableMap();
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
		return str_replace(CatcarconinmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CatcarconinmPeer::CATREGINM_ID);

		$criteria->addSelectColumn(CatcarconinmPeer::CATCARCON_ID);

		$criteria->addSelectColumn(CatcarconinmPeer::CANCAR);

		$criteria->addSelectColumn(CatcarconinmPeer::METARE);

		$criteria->addSelectColumn(CatcarconinmPeer::ID);

	}

	const COUNT = 'COUNT(catcarconinm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT catcarconinm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CatcarconinmPeer::doSelectRS($criteria, $con);
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
		$objects = CatcarconinmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CatcarconinmPeer::populateObjects(CatcarconinmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CatcarconinmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CatcarconinmPeer::getOMClass();
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
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatcarconinmPeer::CATREGINM_ID, CatreginmPeer::ID);

		$rs = CatcarconinmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatcarcon(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatcarconinmPeer::CATCARCON_ID, CatcarconPeer::ID);

		$rs = CatcarconinmPeer::doSelectRS($criteria, $con);
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

		CatcarconinmPeer::addSelectColumns($c);
		$startcol = (CatcarconinmPeer::NUM_COLUMNS - CatcarconinmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatreginmPeer::addSelectColumns($c);

		$c->addJoin(CatcarconinmPeer::CATREGINM_ID, CatreginmPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatcarconinmPeer::getOMClass();

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
										$temp_obj2->addCatcarconinm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatcarconinms();
				$obj2->addCatcarconinm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatcarcon(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatcarconinmPeer::addSelectColumns($c);
		$startcol = (CatcarconinmPeer::NUM_COLUMNS - CatcarconinmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatcarconPeer::addSelectColumns($c);

		$c->addJoin(CatcarconinmPeer::CATCARCON_ID, CatcarconPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatcarconinmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatcarconPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatcarcon(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatcarconinm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatcarconinms();
				$obj2->addCatcarconinm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatcarconinmPeer::CATREGINM_ID, CatreginmPeer::ID);

		$criteria->addJoin(CatcarconinmPeer::CATCARCON_ID, CatcarconPeer::ID);

		$rs = CatcarconinmPeer::doSelectRS($criteria, $con);
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

		CatcarconinmPeer::addSelectColumns($c);
		$startcol2 = (CatcarconinmPeer::NUM_COLUMNS - CatcarconinmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatreginmPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatreginmPeer::NUM_COLUMNS;

		CatcarconPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatcarconPeer::NUM_COLUMNS;

		$c->addJoin(CatcarconinmPeer::CATREGINM_ID, CatreginmPeer::ID);

		$c->addJoin(CatcarconinmPeer::CATCARCON_ID, CatcarconPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatcarconinmPeer::getOMClass();


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
					$temp_obj2->addCatcarconinm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCatcarconinms();
				$obj2->addCatcarconinm($obj1);
			}


					
			$omClass = CatcarconPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatcarcon(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatcarconinm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCatcarconinms();
				$obj3->addCatcarconinm($obj1);
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
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatcarconinmPeer::CATCARCON_ID, CatcarconPeer::ID);

		$rs = CatcarconinmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatcarcon(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatcarconinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatcarconinmPeer::CATREGINM_ID, CatreginmPeer::ID);

		$rs = CatcarconinmPeer::doSelectRS($criteria, $con);
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

		CatcarconinmPeer::addSelectColumns($c);
		$startcol2 = (CatcarconinmPeer::NUM_COLUMNS - CatcarconinmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatcarconPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatcarconPeer::NUM_COLUMNS;

		$c->addJoin(CatcarconinmPeer::CATCARCON_ID, CatcarconPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatcarconinmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatcarconPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatcarcon(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatcarconinm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatcarconinms();
				$obj2->addCatcarconinm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatcarcon(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatcarconinmPeer::addSelectColumns($c);
		$startcol2 = (CatcarconinmPeer::NUM_COLUMNS - CatcarconinmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatreginmPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatreginmPeer::NUM_COLUMNS;

		$c->addJoin(CatcarconinmPeer::CATREGINM_ID, CatreginmPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatcarconinmPeer::getOMClass();

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
					$temp_obj2->addCatcarconinm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatcarconinms();
				$obj2->addCatcarconinm($obj1);
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
		return CatcarconinmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CatcarconinmPeer::ID); 

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
			$comparison = $criteria->getComparison(CatcarconinmPeer::ID);
			$selectCriteria->add(CatcarconinmPeer::ID, $criteria->remove(CatcarconinmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CatcarconinmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CatcarconinmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Catcarconinm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CatcarconinmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Catcarconinm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CatcarconinmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CatcarconinmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CatcarconinmPeer::DATABASE_NAME, CatcarconinmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CatcarconinmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CatcarconinmPeer::DATABASE_NAME);

		$criteria->add(CatcarconinmPeer::ID, $pk);


		$v = CatcarconinmPeer::doSelect($criteria, $con);

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
			$criteria->add(CatcarconinmPeer::ID, $pks, Criteria::IN);
			$objs = CatcarconinmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCatcarconinmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/catastro/map/CatcarconinmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.catastro.map.CatcarconinmMapBuilder');
}
