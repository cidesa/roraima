<?php


abstract class BaseCcsoldesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccsoldes';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccsoldes';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccsoldes.ID';

	
	const NUMSOLDES = 'ccsoldes.NUMSOLDES';

	
	const FECSOLDES = 'ccsoldes.FECSOLDES';

	
	const CODUSUACT = 'ccsoldes.CODUSUACT';

	
	const ESTATU = 'ccsoldes.ESTATU';

	
	const OBSERVACION = 'ccsoldes.OBSERVACION';

	
	const PARA = 'ccsoldes.PARA';

	
	const DE = 'ccsoldes.DE';

	
	const FECANU = 'ccsoldes.FECANU';

	
	const DESANU = 'ccsoldes.DESANU';

	
	const CCTIPDES_ID = 'ccsoldes.CCTIPDES_ID';

	
	const CCCREDIT_ID = 'ccsoldes.CCCREDIT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Numsoldes', 'Fecsoldes', 'Codusuact', 'Estatu', 'Observacion', 'Para', 'De', 'Fecanu', 'Desanu', 'CctipdesId', 'CccreditId', ),
		BasePeer::TYPE_COLNAME => array (CcsoldesPeer::ID, CcsoldesPeer::NUMSOLDES, CcsoldesPeer::FECSOLDES, CcsoldesPeer::CODUSUACT, CcsoldesPeer::ESTATU, CcsoldesPeer::OBSERVACION, CcsoldesPeer::PARA, CcsoldesPeer::DE, CcsoldesPeer::FECANU, CcsoldesPeer::DESANU, CcsoldesPeer::CCTIPDES_ID, CcsoldesPeer::CCCREDIT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'numsoldes', 'fecsoldes', 'codusuact', 'estatu', 'observacion', 'para', 'de', 'fecanu', 'desanu', 'cctipdes_id', 'cccredit_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Numsoldes' => 1, 'Fecsoldes' => 2, 'Codusuact' => 3, 'Estatu' => 4, 'Observacion' => 5, 'Para' => 6, 'De' => 7, 'Fecanu' => 8, 'Desanu' => 9, 'CctipdesId' => 10, 'CccreditId' => 11, ),
		BasePeer::TYPE_COLNAME => array (CcsoldesPeer::ID => 0, CcsoldesPeer::NUMSOLDES => 1, CcsoldesPeer::FECSOLDES => 2, CcsoldesPeer::CODUSUACT => 3, CcsoldesPeer::ESTATU => 4, CcsoldesPeer::OBSERVACION => 5, CcsoldesPeer::PARA => 6, CcsoldesPeer::DE => 7, CcsoldesPeer::FECANU => 8, CcsoldesPeer::DESANU => 9, CcsoldesPeer::CCTIPDES_ID => 10, CcsoldesPeer::CCCREDIT_ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'numsoldes' => 1, 'fecsoldes' => 2, 'codusuact' => 3, 'estatu' => 4, 'observacion' => 5, 'para' => 6, 'de' => 7, 'fecanu' => 8, 'desanu' => 9, 'cctipdes_id' => 10, 'cccredit_id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcsoldesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcsoldesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcsoldesPeer::getTableMap();
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
		return str_replace(CcsoldesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcsoldesPeer::ID);

		$criteria->addSelectColumn(CcsoldesPeer::NUMSOLDES);

		$criteria->addSelectColumn(CcsoldesPeer::FECSOLDES);

		$criteria->addSelectColumn(CcsoldesPeer::CODUSUACT);

		$criteria->addSelectColumn(CcsoldesPeer::ESTATU);

		$criteria->addSelectColumn(CcsoldesPeer::OBSERVACION);

		$criteria->addSelectColumn(CcsoldesPeer::PARA);

		$criteria->addSelectColumn(CcsoldesPeer::DE);

		$criteria->addSelectColumn(CcsoldesPeer::FECANU);

		$criteria->addSelectColumn(CcsoldesPeer::DESANU);

		$criteria->addSelectColumn(CcsoldesPeer::CCTIPDES_ID);

		$criteria->addSelectColumn(CcsoldesPeer::CCCREDIT_ID);

	}

	const COUNT = 'COUNT(ccsoldes.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccsoldes.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsoldesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoldesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcsoldesPeer::doSelectRS($criteria, $con);
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
		$objects = CcsoldesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcsoldesPeer::populateObjects(CcsoldesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcsoldesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcsoldesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCctipdes(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsoldesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoldesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsoldesPeer::CCTIPDES_ID, CctipdesPeer::ID);

		$rs = CcsoldesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccredit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsoldesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoldesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsoldesPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcsoldesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCctipdes(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoldesPeer::addSelectColumns($c);
		$startcol = (CcsoldesPeer::NUM_COLUMNS - CcsoldesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipdesPeer::addSelectColumns($c);

		$c->addJoin(CcsoldesPeer::CCTIPDES_ID, CctipdesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoldesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipdesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipdes(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsoldes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsoldess();
				$obj2->addCcsoldes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoldesPeer::addSelectColumns($c);
		$startcol = (CcsoldesPeer::NUM_COLUMNS - CcsoldesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcsoldesPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoldesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccredit(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsoldes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsoldess();
				$obj2->addCcsoldes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsoldesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoldesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcsoldesPeer::CCTIPDES_ID, CctipdesPeer::ID);
	
			$criteria->addJoin(CcsoldesPeer::CCCREDIT_ID, CccreditPeer::ID);
	
		$rs = CcsoldesPeer::doSelectRS($criteria, $con);
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

		CcsoldesPeer::addSelectColumns($c);
		$startcol2 = (CcsoldesPeer::NUM_COLUMNS - CcsoldesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipdesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipdesPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsoldesPeer::CCTIPDES_ID, CctipdesPeer::ID);
	
			$c->addJoin(CcsoldesPeer::CCCREDIT_ID, CccreditPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoldesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CctipdesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCctipdes(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsoldes($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsoldess();
					$obj2->addCcsoldes($obj1);
				}
	

							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccredit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsoldes($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsoldess();
					$obj3->addCcsoldes($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCctipdes(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsoldesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsoldesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsoldesPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcsoldesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccredit(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsoldesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsoldesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsoldesPeer::CCTIPDES_ID, CctipdesPeer::ID);
		
			$rs = CcsoldesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCctipdes(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoldesPeer::addSelectColumns($c);
		$startcol2 = (CcsoldesPeer::NUM_COLUMNS - CcsoldesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsoldesPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoldesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccredit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsoldes($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsoldess();
					$obj2->addCcsoldes($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoldesPeer::addSelectColumns($c);
		$startcol2 = (CcsoldesPeer::NUM_COLUMNS - CcsoldesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipdesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipdesPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsoldesPeer::CCTIPDES_ID, CctipdesPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoldesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CctipdesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCctipdes(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsoldes($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsoldess();
					$obj2->addCcsoldes($obj1);
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
		return CcsoldesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcsoldesPeer::ID); 

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
			$comparison = $criteria->getComparison(CcsoldesPeer::ID);
			$selectCriteria->add(CcsoldesPeer::ID, $criteria->remove(CcsoldesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcsoldesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcsoldesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccsoldes) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcsoldesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccsoldes $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcsoldesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcsoldesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcsoldesPeer::DATABASE_NAME, CcsoldesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcsoldesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcsoldesPeer::DATABASE_NAME);

		$criteria->add(CcsoldesPeer::ID, $pk);


		$v = CcsoldesPeer::doSelect($criteria, $con);

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
			$criteria->add(CcsoldesPeer::ID, $pks, Criteria::IN);
			$objs = CcsoldesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcsoldesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcsoldesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcsoldesMapBuilder');
}
