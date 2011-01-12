<?php


abstract class BaseCcdircorbenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccdircorben';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccdircorben';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccdircorben.ID';

	
	const DIRNOMURB = 'ccdircorben.DIRNOMURB';

	
	const DIRNUMCAL = 'ccdircorben.DIRNUMCAL';

	
	const DIRNUMCASEDI = 'ccdircorben.DIRNUMCASEDI';

	
	const DIRNUMPIS = 'ccdircorben.DIRNUMPIS';

	
	const DIRNUMAPT = 'ccdircorben.DIRNUMAPT';

	
	const DIRPUNREF = 'ccdircorben.DIRPUNREF';

	
	const NUMTEL = 'ccdircorben.NUMTEL';

	
	const NUMCEL = 'ccdircorben.NUMCEL';

	
	const NUMFAX = 'ccdircorben.NUMFAX';

	
	const CODARETEL = 'ccdircorben.CODARETEL';

	
	const CODARECEL = 'ccdircorben.CODARECEL';

	
	const CODAREFAX = 'ccdircorben.CODAREFAX';

	
	const MAIL = 'ccdircorben.MAIL';

	
	const CCBENEFI_ID = 'ccdircorben.CCBENEFI_ID';

	
	const CCPARROQ_ID = 'ccdircorben.CCPARROQ_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Dirnomurb', 'Dirnumcal', 'Dirnumcasedi', 'Dirnumpis', 'Dirnumapt', 'Dirpunref', 'Numtel', 'Numcel', 'Numfax', 'Codaretel', 'Codarecel', 'Codarefax', 'Mail', 'CcbenefiId', 'CcparroqId', ),
		BasePeer::TYPE_COLNAME => array (CcdircorbenPeer::ID, CcdircorbenPeer::DIRNOMURB, CcdircorbenPeer::DIRNUMCAL, CcdircorbenPeer::DIRNUMCASEDI, CcdircorbenPeer::DIRNUMPIS, CcdircorbenPeer::DIRNUMAPT, CcdircorbenPeer::DIRPUNREF, CcdircorbenPeer::NUMTEL, CcdircorbenPeer::NUMCEL, CcdircorbenPeer::NUMFAX, CcdircorbenPeer::CODARETEL, CcdircorbenPeer::CODARECEL, CcdircorbenPeer::CODAREFAX, CcdircorbenPeer::MAIL, CcdircorbenPeer::CCBENEFI_ID, CcdircorbenPeer::CCPARROQ_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'dirnomurb', 'dirnumcal', 'dirnumcasedi', 'dirnumpis', 'dirnumapt', 'dirpunref', 'numtel', 'numcel', 'numfax', 'codaretel', 'codarecel', 'codarefax', 'mail', 'ccbenefi_id', 'ccparroq_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Dirnomurb' => 1, 'Dirnumcal' => 2, 'Dirnumcasedi' => 3, 'Dirnumpis' => 4, 'Dirnumapt' => 5, 'Dirpunref' => 6, 'Numtel' => 7, 'Numcel' => 8, 'Numfax' => 9, 'Codaretel' => 10, 'Codarecel' => 11, 'Codarefax' => 12, 'Mail' => 13, 'CcbenefiId' => 14, 'CcparroqId' => 15, ),
		BasePeer::TYPE_COLNAME => array (CcdircorbenPeer::ID => 0, CcdircorbenPeer::DIRNOMURB => 1, CcdircorbenPeer::DIRNUMCAL => 2, CcdircorbenPeer::DIRNUMCASEDI => 3, CcdircorbenPeer::DIRNUMPIS => 4, CcdircorbenPeer::DIRNUMAPT => 5, CcdircorbenPeer::DIRPUNREF => 6, CcdircorbenPeer::NUMTEL => 7, CcdircorbenPeer::NUMCEL => 8, CcdircorbenPeer::NUMFAX => 9, CcdircorbenPeer::CODARETEL => 10, CcdircorbenPeer::CODARECEL => 11, CcdircorbenPeer::CODAREFAX => 12, CcdircorbenPeer::MAIL => 13, CcdircorbenPeer::CCBENEFI_ID => 14, CcdircorbenPeer::CCPARROQ_ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'dirnomurb' => 1, 'dirnumcal' => 2, 'dirnumcasedi' => 3, 'dirnumpis' => 4, 'dirnumapt' => 5, 'dirpunref' => 6, 'numtel' => 7, 'numcel' => 8, 'numfax' => 9, 'codaretel' => 10, 'codarecel' => 11, 'codarefax' => 12, 'mail' => 13, 'ccbenefi_id' => 14, 'ccparroq_id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcdircorbenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcdircorbenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcdircorbenPeer::getTableMap();
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
		return str_replace(CcdircorbenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcdircorbenPeer::ID);

		$criteria->addSelectColumn(CcdircorbenPeer::DIRNOMURB);

		$criteria->addSelectColumn(CcdircorbenPeer::DIRNUMCAL);

		$criteria->addSelectColumn(CcdircorbenPeer::DIRNUMCASEDI);

		$criteria->addSelectColumn(CcdircorbenPeer::DIRNUMPIS);

		$criteria->addSelectColumn(CcdircorbenPeer::DIRNUMAPT);

		$criteria->addSelectColumn(CcdircorbenPeer::DIRPUNREF);

		$criteria->addSelectColumn(CcdircorbenPeer::NUMTEL);

		$criteria->addSelectColumn(CcdircorbenPeer::NUMCEL);

		$criteria->addSelectColumn(CcdircorbenPeer::NUMFAX);

		$criteria->addSelectColumn(CcdircorbenPeer::CODARETEL);

		$criteria->addSelectColumn(CcdircorbenPeer::CODARECEL);

		$criteria->addSelectColumn(CcdircorbenPeer::CODAREFAX);

		$criteria->addSelectColumn(CcdircorbenPeer::MAIL);

		$criteria->addSelectColumn(CcdircorbenPeer::CCBENEFI_ID);

		$criteria->addSelectColumn(CcdircorbenPeer::CCPARROQ_ID);

	}

	const COUNT = 'COUNT(ccdircorben.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccdircorben.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdircorbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdircorbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcdircorbenPeer::doSelectRS($criteria, $con);
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
		$objects = CcdircorbenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcdircorbenPeer::populateObjects(CcdircorbenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcdircorbenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcdircorbenPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdircorbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdircorbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdircorbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);

		$rs = CcdircorbenPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcdircorbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdircorbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdircorbenPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcdircorbenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdircorbenPeer::addSelectColumns($c);
		$startcol = (CcdircorbenPeer::NUM_COLUMNS - CcdircorbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbenefiPeer::addSelectColumns($c);

		$c->addJoin(CcdircorbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdircorbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcbenefi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdircorben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdircorbens();
				$obj2->addCcdircorben($obj1); 			}
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

		CcdircorbenPeer::addSelectColumns($c);
		$startcol = (CcdircorbenPeer::NUM_COLUMNS - CcdircorbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcdircorbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdircorbenPeer::getOMClass();

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
										$temp_obj2->addCcdircorben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdircorbens();
				$obj2->addCcdircorben($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdircorbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdircorbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcdircorbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$criteria->addJoin(CcdircorbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = CcdircorbenPeer::doSelectRS($criteria, $con);
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

		CcdircorbenPeer::addSelectColumns($c);
		$startcol2 = (CcdircorbenPeer::NUM_COLUMNS - CcdircorbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdircorbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcdircorbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdircorbenPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdircorben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdircorbens();
					$obj2->addCcdircorben($obj1);
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
						$temp_obj3->addCcdircorben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdircorbens();
					$obj3->addCcdircorben($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcbenefi(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdircorbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdircorbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdircorbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcdircorbenPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcdircorbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdircorbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdircorbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
			$rs = CcdircorbenPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdircorbenPeer::addSelectColumns($c);
		$startcol2 = (CcdircorbenPeer::NUM_COLUMNS - CcdircorbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcparroqPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdircorbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdircorbenPeer::getOMClass();

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
						$temp_obj2->addCcdircorben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdircorbens();
					$obj2->addCcdircorben($obj1);
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

		CcdircorbenPeer::addSelectColumns($c);
		$startcol2 = (CcdircorbenPeer::NUM_COLUMNS - CcdircorbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdircorbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdircorbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdircorben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdircorbens();
					$obj2->addCcdircorben($obj1);
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
		return CcdircorbenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcdircorbenPeer::ID); 

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
			$comparison = $criteria->getComparison(CcdircorbenPeer::ID);
			$selectCriteria->add(CcdircorbenPeer::ID, $criteria->remove(CcdircorbenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcdircorbenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcdircorbenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccdircorben) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcdircorbenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccdircorben $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcdircorbenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcdircorbenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcdircorbenPeer::DATABASE_NAME, CcdircorbenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcdircorbenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcdircorbenPeer::DATABASE_NAME);

		$criteria->add(CcdircorbenPeer::ID, $pk);


		$v = CcdircorbenPeer::doSelect($criteria, $con);

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
			$criteria->add(CcdircorbenPeer::ID, $pks, Criteria::IN);
			$objs = CcdircorbenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcdircorbenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcdircorbenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcdircorbenMapBuilder');
}
