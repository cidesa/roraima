<?php


abstract class BaseCcestcrePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccestcre';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccestcre';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccestcre.ID';

	
	const FECHA = 'ccestcre.FECHA';

	
	const CCESTATU_ID = 'ccestcre.CCESTATU_ID';

	
	const CCCREDIT_ID = 'ccestcre.CCCREDIT_ID';

	
	const CCUSUINT_ID = 'ccestcre.CCUSUINT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecha', 'CcestatuId', 'CccreditId', 'CcusuintId', ),
		BasePeer::TYPE_COLNAME => array (CcestcrePeer::ID, CcestcrePeer::FECHA, CcestcrePeer::CCESTATU_ID, CcestcrePeer::CCCREDIT_ID, CcestcrePeer::CCUSUINT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecha', 'ccestatu_id', 'cccredit_id', 'ccusuint_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecha' => 1, 'CcestatuId' => 2, 'CccreditId' => 3, 'CcusuintId' => 4, ),
		BasePeer::TYPE_COLNAME => array (CcestcrePeer::ID => 0, CcestcrePeer::FECHA => 1, CcestcrePeer::CCESTATU_ID => 2, CcestcrePeer::CCCREDIT_ID => 3, CcestcrePeer::CCUSUINT_ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecha' => 1, 'ccestatu_id' => 2, 'cccredit_id' => 3, 'ccusuint_id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcestcreMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcestcreMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcestcrePeer::getTableMap();
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
		return str_replace(CcestcrePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcestcrePeer::ID);

		$criteria->addSelectColumn(CcestcrePeer::FECHA);

		$criteria->addSelectColumn(CcestcrePeer::CCESTATU_ID);

		$criteria->addSelectColumn(CcestcrePeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcestcrePeer::CCUSUINT_ID);

	}

	const COUNT = 'COUNT(ccestcre.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccestcre.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestcrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcestcrePeer::doSelectRS($criteria, $con);
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
		$objects = CcestcrePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcestcrePeer::populateObjects(CcestcrePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcestcrePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcestcrePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcestatu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestcrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcestcrePeer::CCESTATU_ID, CcestatuPeer::ID);

		$rs = CcestcrePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcestcrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcestcrePeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcestcrePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcusuint(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestcrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcestcrePeer::CCUSUINT_ID, CcusuintPeer::ID);

		$rs = CcestcrePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcestatu(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcrePeer::addSelectColumns($c);
		$startcol = (CcestcrePeer::NUM_COLUMNS - CcestcrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcestatuPeer::addSelectColumns($c);

		$c->addJoin(CcestcrePeer::CCESTATU_ID, CcestatuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcrePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcestatuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcestatu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcestcre($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcestcres();
				$obj2->addCcestcre($obj1); 			}
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

		CcestcrePeer::addSelectColumns($c);
		$startcol = (CcestcrePeer::NUM_COLUMNS - CcestcrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcestcrePeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcrePeer::getOMClass();

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
										$temp_obj2->addCcestcre($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcestcres();
				$obj2->addCcestcre($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcusuint(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcrePeer::addSelectColumns($c);
		$startcol = (CcestcrePeer::NUM_COLUMNS - CcestcrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcusuintPeer::addSelectColumns($c);

		$c->addJoin(CcestcrePeer::CCUSUINT_ID, CcusuintPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcrePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcusuintPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcusuint(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcestcre($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcestcres();
				$obj2->addCcestcre($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestcrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcestcrePeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$criteria->addJoin(CcestcrePeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcestcrePeer::CCUSUINT_ID, CcusuintPeer::ID);
	
		$rs = CcestcrePeer::doSelectRS($criteria, $con);
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

		CcestcrePeer::addSelectColumns($c);
		$startcol2 = (CcestcrePeer::NUM_COLUMNS - CcestcrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuintPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcrePeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcestcrePeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcestcrePeer::CCUSUINT_ID, CcusuintPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcrePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcestatu(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcestcre($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcres();
					$obj2->addCcestcre($obj1);
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
						$temp_obj3->addCcestcre($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcres();
					$obj3->addCcestcre($obj1);
				}
	

							
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcusuint(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcestcre($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcestcres();
					$obj4->addCcestcre($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcestatu(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcestcrePeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcestcrePeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcestcrePeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcestcrePeer::CCUSUINT_ID, CcusuintPeer::ID);
		
			$rs = CcestcrePeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcestcrePeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcestcrePeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcestcrePeer::CCESTATU_ID, CcestatuPeer::ID);
		
				$criteria->addJoin(CcestcrePeer::CCUSUINT_ID, CcusuintPeer::ID);
		
			$rs = CcestcrePeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcusuint(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcestcrePeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcestcrePeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcestcrePeer::CCESTATU_ID, CcestatuPeer::ID);
		
				$criteria->addJoin(CcestcrePeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcestcrePeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcestatu(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcrePeer::addSelectColumns($c);
		$startcol2 = (CcestcrePeer::NUM_COLUMNS - CcestcrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcrePeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcestcrePeer::CCUSUINT_ID, CcusuintPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcrePeer::getOMClass();

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
						$temp_obj2->addCcestcre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcres();
					$obj2->addCcestcre($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcestcre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcres();
					$obj3->addCcestcre($obj1);
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

		CcestcrePeer::addSelectColumns($c);
		$startcol2 = (CcestcrePeer::NUM_COLUMNS - CcestcrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcrePeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcestcrePeer::CCUSUINT_ID, CcusuintPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcrePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcestatu(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcestcre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcres();
					$obj2->addCcestcre($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcestcre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcres();
					$obj3->addCcestcre($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcusuint(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcrePeer::addSelectColumns($c);
		$startcol2 = (CcestcrePeer::NUM_COLUMNS - CcestcrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcrePeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcestcrePeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcrePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcestatu(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcestcre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcres();
					$obj2->addCcestcre($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccredit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcestcre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcres();
					$obj3->addCcestcre($obj1);
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
		return CcestcrePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcestcrePeer::ID); 

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
			$comparison = $criteria->getComparison(CcestcrePeer::ID);
			$selectCriteria->add(CcestcrePeer::ID, $criteria->remove(CcestcrePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcestcrePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcestcrePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccestcre) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcestcrePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccestcre $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcestcrePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcestcrePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcestcrePeer::DATABASE_NAME, CcestcrePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcestcrePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcestcrePeer::DATABASE_NAME);

		$criteria->add(CcestcrePeer::ID, $pk);


		$v = CcestcrePeer::doSelect($criteria, $con);

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
			$criteria->add(CcestcrePeer::ID, $pks, Criteria::IN);
			$objs = CcestcrePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcestcrePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcestcreMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcestcreMapBuilder');
}
