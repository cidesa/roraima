<?php


abstract class BaseCcrecdesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccrecdes';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccrecdes';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccrecdes.ID';

	
	const OBSREC = 'ccrecdes.OBSREC';

	
	const FECREC = 'ccrecdes.FECREC';

	
	const CODUSUREC = 'ccrecdes.CODUSUREC';

	
	const FECRECCEN = 'ccrecdes.FECRECCEN';

	
	const CODUSUCEN = 'ccrecdes.CODUSUCEN';

	
	const ESTATU = 'ccrecdes.ESTATU';

	
	const CCRECAUD_ID = 'ccrecdes.CCRECAUD_ID';

	
	const CCCUADES_ID = 'ccrecdes.CCCUADES_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Obsrec', 'Fecrec', 'Codusurec', 'Fecreccen', 'Codusucen', 'Estatu', 'CcrecaudId', 'CccuadesId', ),
		BasePeer::TYPE_COLNAME => array (CcrecdesPeer::ID, CcrecdesPeer::OBSREC, CcrecdesPeer::FECREC, CcrecdesPeer::CODUSUREC, CcrecdesPeer::FECRECCEN, CcrecdesPeer::CODUSUCEN, CcrecdesPeer::ESTATU, CcrecdesPeer::CCRECAUD_ID, CcrecdesPeer::CCCUADES_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'obsrec', 'fecrec', 'codusurec', 'fecreccen', 'codusucen', 'estatu', 'ccrecaud_id', 'cccuades_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Obsrec' => 1, 'Fecrec' => 2, 'Codusurec' => 3, 'Fecreccen' => 4, 'Codusucen' => 5, 'Estatu' => 6, 'CcrecaudId' => 7, 'CccuadesId' => 8, ),
		BasePeer::TYPE_COLNAME => array (CcrecdesPeer::ID => 0, CcrecdesPeer::OBSREC => 1, CcrecdesPeer::FECREC => 2, CcrecdesPeer::CODUSUREC => 3, CcrecdesPeer::FECRECCEN => 4, CcrecdesPeer::CODUSUCEN => 5, CcrecdesPeer::ESTATU => 6, CcrecdesPeer::CCRECAUD_ID => 7, CcrecdesPeer::CCCUADES_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'obsrec' => 1, 'fecrec' => 2, 'codusurec' => 3, 'fecreccen' => 4, 'codusucen' => 5, 'estatu' => 6, 'ccrecaud_id' => 7, 'cccuades_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcrecdesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcrecdesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcrecdesPeer::getTableMap();
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
		return str_replace(CcrecdesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcrecdesPeer::ID);

		$criteria->addSelectColumn(CcrecdesPeer::OBSREC);

		$criteria->addSelectColumn(CcrecdesPeer::FECREC);

		$criteria->addSelectColumn(CcrecdesPeer::CODUSUREC);

		$criteria->addSelectColumn(CcrecdesPeer::FECRECCEN);

		$criteria->addSelectColumn(CcrecdesPeer::CODUSUCEN);

		$criteria->addSelectColumn(CcrecdesPeer::ESTATU);

		$criteria->addSelectColumn(CcrecdesPeer::CCRECAUD_ID);

		$criteria->addSelectColumn(CcrecdesPeer::CCCUADES_ID);

	}

	const COUNT = 'COUNT(ccrecdes.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccrecdes.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrecdesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrecdesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcrecdesPeer::doSelectRS($criteria, $con);
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
		$objects = CcrecdesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcrecdesPeer::populateObjects(CcrecdesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcrecdesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcrecdesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcrecaud(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrecdesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrecdesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrecdesPeer::CCRECAUD_ID, CcrecaudPeer::ID);

		$rs = CcrecdesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccuades(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrecdesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrecdesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrecdesPeer::CCCUADES_ID, CccuadesPeer::ID);

		$rs = CcrecdesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcrecaud(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrecdesPeer::addSelectColumns($c);
		$startcol = (CcrecdesPeer::NUM_COLUMNS - CcrecdesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcrecaudPeer::addSelectColumns($c);

		$c->addJoin(CcrecdesPeer::CCRECAUD_ID, CcrecaudPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecdesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcrecaudPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcrecaud(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcrecdes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrecdess();
				$obj2->addCcrecdes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccuades(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrecdesPeer::addSelectColumns($c);
		$startcol = (CcrecdesPeer::NUM_COLUMNS - CcrecdesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccuadesPeer::addSelectColumns($c);

		$c->addJoin(CcrecdesPeer::CCCUADES_ID, CccuadesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecdesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccuades(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcrecdes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrecdess();
				$obj2->addCcrecdes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrecdesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrecdesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcrecdesPeer::CCRECAUD_ID, CcrecaudPeer::ID);
	
			$criteria->addJoin(CcrecdesPeer::CCCUADES_ID, CccuadesPeer::ID);
	
		$rs = CcrecdesPeer::doSelectRS($criteria, $con);
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

		CcrecdesPeer::addSelectColumns($c);
		$startcol2 = (CcrecdesPeer::NUM_COLUMNS - CcrecdesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcrecaudPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcrecaudPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuadesPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrecdesPeer::CCRECAUD_ID, CcrecaudPeer::ID);
	
			$c->addJoin(CcrecdesPeer::CCCUADES_ID, CccuadesPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecdesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcrecaudPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcrecaud(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrecdes($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrecdess();
					$obj2->addCcrecdes($obj1);
				}
	

							
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccuades(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcrecdes($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrecdess();
					$obj3->addCcrecdes($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcrecaud(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcrecdesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrecdesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrecdesPeer::CCCUADES_ID, CccuadesPeer::ID);
		
			$rs = CcrecdesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccuades(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcrecdesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrecdesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrecdesPeer::CCRECAUD_ID, CcrecaudPeer::ID);
		
			$rs = CcrecdesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcrecaud(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrecdesPeer::addSelectColumns($c);
		$startcol2 = (CcrecdesPeer::NUM_COLUMNS - CcrecdesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccuadesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccuadesPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrecdesPeer::CCCUADES_ID, CccuadesPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecdesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccuades(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrecdes($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrecdess();
					$obj2->addCcrecdes($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccuades(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrecdesPeer::addSelectColumns($c);
		$startcol2 = (CcrecdesPeer::NUM_COLUMNS - CcrecdesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcrecaudPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcrecaudPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrecdesPeer::CCRECAUD_ID, CcrecaudPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecdesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcrecaudPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcrecaud(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrecdes($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrecdess();
					$obj2->addCcrecdes($obj1);
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
		return CcrecdesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcrecdesPeer::ID); 

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
			$comparison = $criteria->getComparison(CcrecdesPeer::ID);
			$selectCriteria->add(CcrecdesPeer::ID, $criteria->remove(CcrecdesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcrecdesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcrecdesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccrecdes) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcrecdesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccrecdes $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcrecdesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcrecdesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcrecdesPeer::DATABASE_NAME, CcrecdesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcrecdesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcrecdesPeer::DATABASE_NAME);

		$criteria->add(CcrecdesPeer::ID, $pk);


		$v = CcrecdesPeer::doSelect($criteria, $con);

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
			$criteria->add(CcrecdesPeer::ID, $pks, Criteria::IN);
			$objs = CcrecdesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcrecdesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcrecdesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcrecdesMapBuilder');
}
