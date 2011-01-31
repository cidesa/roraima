<?php


abstract class BaseCcfiadorPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccfiador';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccfiador';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccfiador.ID';

	
	const NOMFIA = 'ccfiador.NOMFIA';

	
	const CEDFIA = 'ccfiador.CEDFIA';

	
	const TELFIA = 'ccfiador.TELFIA';

	
	const CELFIA = 'ccfiador.CELFIA';

	
	const DIRFIA = 'ccfiador.DIRFIA';

	
	const CODARETEL = 'ccfiador.CODARETEL';

	
	const CODARECEL = 'ccfiador.CODARECEL';

	
	const PARENT = 'ccfiador.PARENT';

	
	const CCCREDIT_ID = 'ccfiador.CCCREDIT_ID';

	
	const CCPARROQ_ID = 'ccfiador.CCPARROQ_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomfia', 'Cedfia', 'Telfia', 'Celfia', 'Dirfia', 'Codaretel', 'Codarecel', 'Parent', 'CccreditId', 'CcparroqId', ),
		BasePeer::TYPE_COLNAME => array (CcfiadorPeer::ID, CcfiadorPeer::NOMFIA, CcfiadorPeer::CEDFIA, CcfiadorPeer::TELFIA, CcfiadorPeer::CELFIA, CcfiadorPeer::DIRFIA, CcfiadorPeer::CODARETEL, CcfiadorPeer::CODARECEL, CcfiadorPeer::PARENT, CcfiadorPeer::CCCREDIT_ID, CcfiadorPeer::CCPARROQ_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomfia', 'cedfia', 'telfia', 'celfia', 'dirfia', 'codaretel', 'codarecel', 'parent', 'cccredit_id', 'ccparroq_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomfia' => 1, 'Cedfia' => 2, 'Telfia' => 3, 'Celfia' => 4, 'Dirfia' => 5, 'Codaretel' => 6, 'Codarecel' => 7, 'Parent' => 8, 'CccreditId' => 9, 'CcparroqId' => 10, ),
		BasePeer::TYPE_COLNAME => array (CcfiadorPeer::ID => 0, CcfiadorPeer::NOMFIA => 1, CcfiadorPeer::CEDFIA => 2, CcfiadorPeer::TELFIA => 3, CcfiadorPeer::CELFIA => 4, CcfiadorPeer::DIRFIA => 5, CcfiadorPeer::CODARETEL => 6, CcfiadorPeer::CODARECEL => 7, CcfiadorPeer::PARENT => 8, CcfiadorPeer::CCCREDIT_ID => 9, CcfiadorPeer::CCPARROQ_ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomfia' => 1, 'cedfia' => 2, 'telfia' => 3, 'celfia' => 4, 'dirfia' => 5, 'codaretel' => 6, 'codarecel' => 7, 'parent' => 8, 'cccredit_id' => 9, 'ccparroq_id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcfiadorMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcfiadorMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcfiadorPeer::getTableMap();
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
		return str_replace(CcfiadorPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcfiadorPeer::ID);

		$criteria->addSelectColumn(CcfiadorPeer::NOMFIA);

		$criteria->addSelectColumn(CcfiadorPeer::CEDFIA);

		$criteria->addSelectColumn(CcfiadorPeer::TELFIA);

		$criteria->addSelectColumn(CcfiadorPeer::CELFIA);

		$criteria->addSelectColumn(CcfiadorPeer::DIRFIA);

		$criteria->addSelectColumn(CcfiadorPeer::CODARETEL);

		$criteria->addSelectColumn(CcfiadorPeer::CODARECEL);

		$criteria->addSelectColumn(CcfiadorPeer::PARENT);

		$criteria->addSelectColumn(CcfiadorPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcfiadorPeer::CCPARROQ_ID);

	}

	const COUNT = 'COUNT(ccfiador.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccfiador.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcfiadorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcfiadorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcfiadorPeer::doSelectRS($criteria, $con);
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
		$objects = CcfiadorPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcfiadorPeer::populateObjects(CcfiadorPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcfiadorPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcfiadorPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCccredit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcfiadorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcfiadorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcfiadorPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcfiadorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcparroq(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcfiadorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcfiadorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcfiadorPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcfiadorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcfiadorPeer::addSelectColumns($c);
		$startcol = (CcfiadorPeer::NUM_COLUMNS - CcfiadorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcfiadorPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcfiadorPeer::getOMClass();

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
										$temp_obj2->addCcfiador($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcfiadors();
				$obj2->addCcfiador($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcparroq(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcfiadorPeer::addSelectColumns($c);
		$startcol = (CcfiadorPeer::NUM_COLUMNS - CcfiadorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcfiadorPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcfiadorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcparroqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcparroq(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcfiador($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcfiadors();
				$obj2->addCcfiador($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcfiadorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcfiadorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcfiadorPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcfiadorPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = CcfiadorPeer::doSelectRS($criteria, $con);
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

		CcfiadorPeer::addSelectColumns($c);
		$startcol2 = (CcfiadorPeer::NUM_COLUMNS - CcfiadorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcfiadorPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcfiadorPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcfiadorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccredit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcfiador($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcfiadors();
					$obj2->addCcfiador($obj1);
				}
	

							
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcparroq(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcfiador($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcfiadors();
					$obj3->addCcfiador($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCccredit(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcfiadorPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcfiadorPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcfiadorPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcfiadorPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcparroq(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcfiadorPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcfiadorPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcfiadorPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcfiadorPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcfiadorPeer::addSelectColumns($c);
		$startcol2 = (CcfiadorPeer::NUM_COLUMNS - CcfiadorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcparroqPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcfiadorPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcfiadorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcparroq(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcfiador($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcfiadors();
					$obj2->addCcfiador($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcparroq(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcfiadorPeer::addSelectColumns($c);
		$startcol2 = (CcfiadorPeer::NUM_COLUMNS - CcfiadorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcfiadorPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcfiadorPeer::getOMClass();

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
						$temp_obj2->addCcfiador($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcfiadors();
					$obj2->addCcfiador($obj1);
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
		return CcfiadorPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcfiadorPeer::ID); 

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
			$comparison = $criteria->getComparison(CcfiadorPeer::ID);
			$selectCriteria->add(CcfiadorPeer::ID, $criteria->remove(CcfiadorPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcfiadorPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcfiadorPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccfiador) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcfiadorPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccfiador $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcfiadorPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcfiadorPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcfiadorPeer::DATABASE_NAME, CcfiadorPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcfiadorPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcfiadorPeer::DATABASE_NAME);

		$criteria->add(CcfiadorPeer::ID, $pk);


		$v = CcfiadorPeer::doSelect($criteria, $con);

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
			$criteria->add(CcfiadorPeer::ID, $pks, Criteria::IN);
			$objs = CcfiadorPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcfiadorPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcfiadorMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcfiadorMapBuilder');
}
