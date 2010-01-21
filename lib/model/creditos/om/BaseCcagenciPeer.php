<?php


abstract class BaseCcagenciPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccagenci';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccagenci';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccagenci.ID';

	
	const CODAGE = 'ccagenci.CODAGE';

	
	const DIRAGE = 'ccagenci.DIRAGE';

	
	const TELAGE = 'ccagenci.TELAGE';

	
	const TELAGE2 = 'ccagenci.TELAGE2';

	
	const FAXAGE = 'ccagenci.FAXAGE';

	
	const CODARETEL = 'ccagenci.CODARETEL';

	
	const CODARETEL2 = 'ccagenci.CODARETEL2';

	
	const CODAREFAX = 'ccagenci.CODAREFAX';

	
	const CCBANCO_ID = 'ccagenci.CCBANCO_ID';

	
	const CCPARROQ_ID = 'ccagenci.CCPARROQ_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Codage', 'Dirage', 'Telage', 'Telage2', 'Faxage', 'Codaretel', 'Codaretel2', 'Codarefax', 'CcbancoId', 'CcparroqId', ),
		BasePeer::TYPE_COLNAME => array (CcagenciPeer::ID, CcagenciPeer::CODAGE, CcagenciPeer::DIRAGE, CcagenciPeer::TELAGE, CcagenciPeer::TELAGE2, CcagenciPeer::FAXAGE, CcagenciPeer::CODARETEL, CcagenciPeer::CODARETEL2, CcagenciPeer::CODAREFAX, CcagenciPeer::CCBANCO_ID, CcagenciPeer::CCPARROQ_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'codage', 'dirage', 'telage', 'telage2', 'faxage', 'codaretel', 'codaretel2', 'codarefax', 'ccbanco_id', 'ccparroq_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Codage' => 1, 'Dirage' => 2, 'Telage' => 3, 'Telage2' => 4, 'Faxage' => 5, 'Codaretel' => 6, 'Codaretel2' => 7, 'Codarefax' => 8, 'CcbancoId' => 9, 'CcparroqId' => 10, ),
		BasePeer::TYPE_COLNAME => array (CcagenciPeer::ID => 0, CcagenciPeer::CODAGE => 1, CcagenciPeer::DIRAGE => 2, CcagenciPeer::TELAGE => 3, CcagenciPeer::TELAGE2 => 4, CcagenciPeer::FAXAGE => 5, CcagenciPeer::CODARETEL => 6, CcagenciPeer::CODARETEL2 => 7, CcagenciPeer::CODAREFAX => 8, CcagenciPeer::CCBANCO_ID => 9, CcagenciPeer::CCPARROQ_ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'codage' => 1, 'dirage' => 2, 'telage' => 3, 'telage2' => 4, 'faxage' => 5, 'codaretel' => 6, 'codaretel2' => 7, 'codarefax' => 8, 'ccbanco_id' => 9, 'ccparroq_id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcagenciMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcagenciMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcagenciPeer::getTableMap();
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
		return str_replace(CcagenciPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcagenciPeer::ID);

		$criteria->addSelectColumn(CcagenciPeer::CODAGE);

		$criteria->addSelectColumn(CcagenciPeer::DIRAGE);

		$criteria->addSelectColumn(CcagenciPeer::TELAGE);

		$criteria->addSelectColumn(CcagenciPeer::TELAGE2);

		$criteria->addSelectColumn(CcagenciPeer::FAXAGE);

		$criteria->addSelectColumn(CcagenciPeer::CODARETEL);

		$criteria->addSelectColumn(CcagenciPeer::CODARETEL2);

		$criteria->addSelectColumn(CcagenciPeer::CODAREFAX);

		$criteria->addSelectColumn(CcagenciPeer::CCBANCO_ID);

		$criteria->addSelectColumn(CcagenciPeer::CCPARROQ_ID);

	}

	const COUNT = 'COUNT(ccagenci.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccagenci.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcagenciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcagenciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcagenciPeer::doSelectRS($criteria, $con);
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
		$objects = CcagenciPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcagenciPeer::populateObjects(CcagenciPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcagenciPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcagenciPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcbanco(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcagenciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcagenciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcagenciPeer::CCBANCO_ID, CcbancoPeer::ID);

		$rs = CcagenciPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcagenciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcagenciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcagenciPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcagenciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcbanco(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcagenciPeer::addSelectColumns($c);
		$startcol = (CcagenciPeer::NUM_COLUMNS - CcagenciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbancoPeer::addSelectColumns($c);

		$c->addJoin(CcagenciPeer::CCBANCO_ID, CcbancoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcagenciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcbancoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcbanco(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcagenci($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcagencis();
				$obj2->addCcagenci($obj1); 			}
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

		CcagenciPeer::addSelectColumns($c);
		$startcol = (CcagenciPeer::NUM_COLUMNS - CcagenciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcagenciPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcagenciPeer::getOMClass();

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
										$temp_obj2->addCcagenci($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcagencis();
				$obj2->addCcagenci($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcagenciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcagenciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcagenciPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$criteria->addJoin(CcagenciPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = CcagenciPeer::doSelectRS($criteria, $con);
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

		CcagenciPeer::addSelectColumns($c);
		$startcol2 = (CcagenciPeer::NUM_COLUMNS - CcagenciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbancoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbancoPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcagenciPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CcagenciPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcagenciPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbanco(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcagenci($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcagencis();
					$obj2->addCcagenci($obj1);
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
						$temp_obj3->addCcagenci($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcagencis();
					$obj3->addCcagenci($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcbanco(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcagenciPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcagenciPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcagenciPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcagenciPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcagenciPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcagenciPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcagenciPeer::CCBANCO_ID, CcbancoPeer::ID);
		
			$rs = CcagenciPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcbanco(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcagenciPeer::addSelectColumns($c);
		$startcol2 = (CcagenciPeer::NUM_COLUMNS - CcagenciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcparroqPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcagenciPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcagenciPeer::getOMClass();

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
						$temp_obj2->addCcagenci($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcagencis();
					$obj2->addCcagenci($obj1);
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

		CcagenciPeer::addSelectColumns($c);
		$startcol2 = (CcagenciPeer::NUM_COLUMNS - CcagenciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbancoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbancoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcagenciPeer::CCBANCO_ID, CcbancoPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcagenciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbanco(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcagenci($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcagencis();
					$obj2->addCcagenci($obj1);
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
		return CcagenciPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcagenciPeer::ID); 

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
			$comparison = $criteria->getComparison(CcagenciPeer::ID);
			$selectCriteria->add(CcagenciPeer::ID, $criteria->remove(CcagenciPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcagenciPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcagenciPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccagenci) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcagenciPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccagenci $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcagenciPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcagenciPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcagenciPeer::DATABASE_NAME, CcagenciPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcagenciPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcagenciPeer::DATABASE_NAME);

		$criteria->add(CcagenciPeer::ID, $pk);


		$v = CcagenciPeer::doSelect($criteria, $con);

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
			$criteria->add(CcagenciPeer::ID, $pks, Criteria::IN);
			$objs = CcagenciPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcagenciPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcagenciMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcagenciMapBuilder');
}
