<?php


abstract class BaseCcamoprinPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccamoprin';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccamoprin';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccamoprin.ID';

	
	const CAPINI = 'ccamoprin.CAPINI';

	
	const MONINT = 'ccamoprin.MONINT';

	
	const FECVEN = 'ccamoprin.FECVEN';

	
	const ESTATU = 'ccamoprin.ESTATU';

	
	const MONPRI = 'ccamoprin.MONPRI';

	
	const MONSALCAP = 'ccamoprin.MONSALCAP';

	
	const NUMCUO = 'ccamoprin.NUMCUO';

	
	const CCAMOACT_ID = 'ccamoprin.CCAMOACT_ID';

	
	const CCDEFAMO_ID = 'ccamoprin.CCDEFAMO_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Capini', 'Monint', 'Fecven', 'Estatu', 'Monpri', 'Monsalcap', 'Numcuo', 'CcamoactId', 'CcdefamoId', ),
		BasePeer::TYPE_COLNAME => array (CcamoprinPeer::ID, CcamoprinPeer::CAPINI, CcamoprinPeer::MONINT, CcamoprinPeer::FECVEN, CcamoprinPeer::ESTATU, CcamoprinPeer::MONPRI, CcamoprinPeer::MONSALCAP, CcamoprinPeer::NUMCUO, CcamoprinPeer::CCAMOACT_ID, CcamoprinPeer::CCDEFAMO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'capini', 'monint', 'fecven', 'estatu', 'monpri', 'monsalcap', 'numcuo', 'ccamoact_id', 'ccdefamo_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Capini' => 1, 'Monint' => 2, 'Fecven' => 3, 'Estatu' => 4, 'Monpri' => 5, 'Monsalcap' => 6, 'Numcuo' => 7, 'CcamoactId' => 8, 'CcdefamoId' => 9, ),
		BasePeer::TYPE_COLNAME => array (CcamoprinPeer::ID => 0, CcamoprinPeer::CAPINI => 1, CcamoprinPeer::MONINT => 2, CcamoprinPeer::FECVEN => 3, CcamoprinPeer::ESTATU => 4, CcamoprinPeer::MONPRI => 5, CcamoprinPeer::MONSALCAP => 6, CcamoprinPeer::NUMCUO => 7, CcamoprinPeer::CCAMOACT_ID => 8, CcamoprinPeer::CCDEFAMO_ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'capini' => 1, 'monint' => 2, 'fecven' => 3, 'estatu' => 4, 'monpri' => 5, 'monsalcap' => 6, 'numcuo' => 7, 'ccamoact_id' => 8, 'ccdefamo_id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcamoprinMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcamoprinMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcamoprinPeer::getTableMap();
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
		return str_replace(CcamoprinPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcamoprinPeer::ID);

		$criteria->addSelectColumn(CcamoprinPeer::CAPINI);

		$criteria->addSelectColumn(CcamoprinPeer::MONINT);

		$criteria->addSelectColumn(CcamoprinPeer::FECVEN);

		$criteria->addSelectColumn(CcamoprinPeer::ESTATU);

		$criteria->addSelectColumn(CcamoprinPeer::MONPRI);

		$criteria->addSelectColumn(CcamoprinPeer::MONSALCAP);

		$criteria->addSelectColumn(CcamoprinPeer::NUMCUO);

		$criteria->addSelectColumn(CcamoprinPeer::CCAMOACT_ID);

		$criteria->addSelectColumn(CcamoprinPeer::CCDEFAMO_ID);

	}

	const COUNT = 'COUNT(ccamoprin.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccamoprin.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamoprinPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoprinPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcamoprinPeer::doSelectRS($criteria, $con);
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
		$objects = CcamoprinPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcamoprinPeer::populateObjects(CcamoprinPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcamoprinPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcamoprinPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcamoact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamoprinPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoprinPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamoprinPeer::CCAMOACT_ID, CcamoactPeer::ID);

		$rs = CcamoprinPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcdefamo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamoprinPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoprinPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamoprinPeer::CCDEFAMO_ID, CcdefamoPeer::ID);

		$rs = CcamoprinPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcamoact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamoprinPeer::addSelectColumns($c);
		$startcol = (CcamoprinPeer::NUM_COLUMNS - CcamoprinPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcamoactPeer::addSelectColumns($c);

		$c->addJoin(CcamoprinPeer::CCAMOACT_ID, CcamoactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoprinPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcamoactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcamoact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcamoprin($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamoprins();
				$obj2->addCcamoprin($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcdefamo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamoprinPeer::addSelectColumns($c);
		$startcol = (CcamoprinPeer::NUM_COLUMNS - CcamoprinPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcdefamoPeer::addSelectColumns($c);

		$c->addJoin(CcamoprinPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoprinPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcdefamo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcamoprin($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamoprins();
				$obj2->addCcamoprin($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamoprinPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoprinPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcamoprinPeer::CCAMOACT_ID, CcamoactPeer::ID);
	
			$criteria->addJoin(CcamoprinPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
		$rs = CcamoprinPeer::doSelectRS($criteria, $con);
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

		CcamoprinPeer::addSelectColumns($c);
		$startcol2 = (CcamoprinPeer::NUM_COLUMNS - CcamoprinPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcamoactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcamoactPeer::NUM_COLUMNS;
	
			CcdefamoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcdefamoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoprinPeer::CCAMOACT_ID, CcamoactPeer::ID);
	
			$c->addJoin(CcamoprinPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoprinPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcamoactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcamoact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamoprin($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoprins();
					$obj2->addCcamoprin($obj1);
				}
	

							
				$omClass = CcdefamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcdefamo(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcamoprin($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoprins();
					$obj3->addCcamoprin($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcamoact(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcamoprinPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamoprinPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamoprinPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
		
			$rs = CcamoprinPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcdefamo(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcamoprinPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamoprinPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamoprinPeer::CCAMOACT_ID, CcamoactPeer::ID);
		
			$rs = CcamoprinPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcamoact(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamoprinPeer::addSelectColumns($c);
		$startcol2 = (CcamoprinPeer::NUM_COLUMNS - CcamoprinPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcdefamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcdefamoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoprinPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoprinPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcdefamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcdefamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamoprin($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoprins();
					$obj2->addCcamoprin($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcdefamo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamoprinPeer::addSelectColumns($c);
		$startcol2 = (CcamoprinPeer::NUM_COLUMNS - CcamoprinPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcamoactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcamoactPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoprinPeer::CCAMOACT_ID, CcamoactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoprinPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcamoactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcamoact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamoprin($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoprins();
					$obj2->addCcamoprin($obj1);
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
		return CcamoprinPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcamoprinPeer::ID); 

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
			$comparison = $criteria->getComparison(CcamoprinPeer::ID);
			$selectCriteria->add(CcamoprinPeer::ID, $criteria->remove(CcamoprinPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcamoprinPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcamoprinPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccamoprin) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcamoprinPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccamoprin $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcamoprinPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcamoprinPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcamoprinPeer::DATABASE_NAME, CcamoprinPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcamoprinPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcamoprinPeer::DATABASE_NAME);

		$criteria->add(CcamoprinPeer::ID, $pk);


		$v = CcamoprinPeer::doSelect($criteria, $con);

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
			$criteria->add(CcamoprinPeer::ID, $pks, Criteria::IN);
			$objs = CcamoprinPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcamoprinPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcamoprinMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcamoprinMapBuilder');
}
