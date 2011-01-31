<?php


abstract class BaseCcperbenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccperben';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccperben';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccperben.ID';

	
	const NOMPERBEN = 'ccperben.NOMPERBEN';

	
	const CEDPERBEN = 'ccperben.CEDPERBEN';

	
	const DIRPERBEN = 'ccperben.DIRPERBEN';

	
	const TELPERBEN = 'ccperben.TELPERBEN';

	
	const CELULAR = 'ccperben.CELULAR';

	
	const CODARETEL = 'ccperben.CODARETEL';

	
	const CODARECEL = 'ccperben.CODARECEL';

	
	const SEXPERBEN = 'ccperben.SEXPERBEN';

	
	const EMAIL = 'ccperben.EMAIL';

	
	const CCCARGO_ID = 'ccperben.CCCARGO_ID';

	
	const CCPERPRE_ID = 'ccperben.CCPERPRE_ID';

	
	const CCPARROQ_ID = 'ccperben.CCPARROQ_ID';

	
	const CCBENEFI_ID = 'ccperben.CCBENEFI_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomperben', 'Cedperben', 'Dirperben', 'Telperben', 'Celular', 'Codaretel', 'Codarecel', 'Sexperben', 'Email', 'CccargoId', 'CcperpreId', 'CcparroqId', 'CcbenefiId', ),
		BasePeer::TYPE_COLNAME => array (CcperbenPeer::ID, CcperbenPeer::NOMPERBEN, CcperbenPeer::CEDPERBEN, CcperbenPeer::DIRPERBEN, CcperbenPeer::TELPERBEN, CcperbenPeer::CELULAR, CcperbenPeer::CODARETEL, CcperbenPeer::CODARECEL, CcperbenPeer::SEXPERBEN, CcperbenPeer::EMAIL, CcperbenPeer::CCCARGO_ID, CcperbenPeer::CCPERPRE_ID, CcperbenPeer::CCPARROQ_ID, CcperbenPeer::CCBENEFI_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomperben', 'cedperben', 'dirperben', 'telperben', 'celular', 'codaretel', 'codarecel', 'sexperben', 'email', 'cccargo_id', 'ccperpre_id', 'ccparroq_id', 'ccbenefi_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomperben' => 1, 'Cedperben' => 2, 'Dirperben' => 3, 'Telperben' => 4, 'Celular' => 5, 'Codaretel' => 6, 'Codarecel' => 7, 'Sexperben' => 8, 'Email' => 9, 'CccargoId' => 10, 'CcperpreId' => 11, 'CcparroqId' => 12, 'CcbenefiId' => 13, ),
		BasePeer::TYPE_COLNAME => array (CcperbenPeer::ID => 0, CcperbenPeer::NOMPERBEN => 1, CcperbenPeer::CEDPERBEN => 2, CcperbenPeer::DIRPERBEN => 3, CcperbenPeer::TELPERBEN => 4, CcperbenPeer::CELULAR => 5, CcperbenPeer::CODARETEL => 6, CcperbenPeer::CODARECEL => 7, CcperbenPeer::SEXPERBEN => 8, CcperbenPeer::EMAIL => 9, CcperbenPeer::CCCARGO_ID => 10, CcperbenPeer::CCPERPRE_ID => 11, CcperbenPeer::CCPARROQ_ID => 12, CcperbenPeer::CCBENEFI_ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomperben' => 1, 'cedperben' => 2, 'dirperben' => 3, 'telperben' => 4, 'celular' => 5, 'codaretel' => 6, 'codarecel' => 7, 'sexperben' => 8, 'email' => 9, 'cccargo_id' => 10, 'ccperpre_id' => 11, 'ccparroq_id' => 12, 'ccbenefi_id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcperbenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcperbenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcperbenPeer::getTableMap();
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
		return str_replace(CcperbenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcperbenPeer::ID);

		$criteria->addSelectColumn(CcperbenPeer::NOMPERBEN);

		$criteria->addSelectColumn(CcperbenPeer::CEDPERBEN);

		$criteria->addSelectColumn(CcperbenPeer::DIRPERBEN);

		$criteria->addSelectColumn(CcperbenPeer::TELPERBEN);

		$criteria->addSelectColumn(CcperbenPeer::CELULAR);

		$criteria->addSelectColumn(CcperbenPeer::CODARETEL);

		$criteria->addSelectColumn(CcperbenPeer::CODARECEL);

		$criteria->addSelectColumn(CcperbenPeer::SEXPERBEN);

		$criteria->addSelectColumn(CcperbenPeer::EMAIL);

		$criteria->addSelectColumn(CcperbenPeer::CCCARGO_ID);

		$criteria->addSelectColumn(CcperbenPeer::CCPERPRE_ID);

		$criteria->addSelectColumn(CcperbenPeer::CCPARROQ_ID);

		$criteria->addSelectColumn(CcperbenPeer::CCBENEFI_ID);

	}

	const COUNT = 'COUNT(ccperben.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccperben.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcperbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcperbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcperbenPeer::doSelectRS($criteria, $con);
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
		$objects = CcperbenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcperbenPeer::populateObjects(CcperbenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcperbenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcperbenPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCccargo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcperbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcperbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcperbenPeer::CCCARGO_ID, CccargoPeer::ID);

		$rs = CcperbenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcperpre(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcperbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcperbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcperbenPeer::CCPERPRE_ID, CcperprePeer::ID);

		$rs = CcperbenPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcperbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcperbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcperbenPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcperbenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcperbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcperbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcperbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);

		$rs = CcperbenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCccargo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcperbenPeer::addSelectColumns($c);
		$startcol = (CcperbenPeer::NUM_COLUMNS - CcperbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccargoPeer::addSelectColumns($c);

		$c->addJoin(CcperbenPeer::CCCARGO_ID, CccargoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcperbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccargoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccargo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcperben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcperbens();
				$obj2->addCcperben($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcperbenPeer::addSelectColumns($c);
		$startcol = (CcperbenPeer::NUM_COLUMNS - CcperbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperprePeer::addSelectColumns($c);

		$c->addJoin(CcperbenPeer::CCPERPRE_ID, CcperprePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcperbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperprePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperpre(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcperben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcperbens();
				$obj2->addCcperben($obj1); 			}
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

		CcperbenPeer::addSelectColumns($c);
		$startcol = (CcperbenPeer::NUM_COLUMNS - CcperbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcperbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcperbenPeer::getOMClass();

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
										$temp_obj2->addCcperben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcperbens();
				$obj2->addCcperben($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcperbenPeer::addSelectColumns($c);
		$startcol = (CcperbenPeer::NUM_COLUMNS - CcperbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbenefiPeer::addSelectColumns($c);

		$c->addJoin(CcperbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcperbenPeer::getOMClass();

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
										$temp_obj2->addCcperben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcperbens();
				$obj2->addCcperben($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcperbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcperbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcperbenPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$criteria->addJoin(CcperbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$criteria->addJoin(CcperbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$criteria->addJoin(CcperbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
		$rs = CcperbenPeer::doSelectRS($criteria, $con);
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

		CcperbenPeer::addSelectColumns($c);
		$startcol2 = (CcperbenPeer::NUM_COLUMNS - CcperbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccargoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccargoPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcperprePeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CcperbenPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcperbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcperbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcperbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcperbenPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccargo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcperben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcperbens();
					$obj2->addCcperben($obj1);
				}
	

							
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcperpre(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcperben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcperbens();
					$obj3->addCcperben($obj1);
				}
	

							
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparroq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcperben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcperbens();
					$obj4->addCcperben($obj1);
				}
	

							
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcbenefi(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcperben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcperbens();
					$obj5->addCcperben($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCccargo(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcperbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcperbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcperbenPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcperbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcperbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
			$rs = CcperbenPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcperpre(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcperbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcperbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcperbenPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcperbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcperbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
			$rs = CcperbenPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcperbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcperbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcperbenPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcperbenPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcperbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
			$rs = CcperbenPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcbenefi(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcperbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcperbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcperbenPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcperbenPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcperbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcperbenPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCccargo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcperbenPeer::addSelectColumns($c);
		$startcol2 = (CcperbenPeer::NUM_COLUMNS - CcperbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CcperbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcperbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcperbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcperbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcperbens();
					$obj2->addCcperben($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcparroq(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcperbens();
					$obj3->addCcperben($obj1);
				}
	
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcbenefi(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcperbens();
					$obj4->addCcperben($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcperbenPeer::addSelectColumns($c);
		$startcol2 = (CcperbenPeer::NUM_COLUMNS - CcperbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccargoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccargoPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CcperbenPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcperbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcperbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcperbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccargo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcperbens();
					$obj2->addCcperben($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcparroq(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcperbens();
					$obj3->addCcperben($obj1);
				}
	
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcbenefi(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcperbens();
					$obj4->addCcperben($obj1);
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

		CcperbenPeer::addSelectColumns($c);
		$startcol2 = (CcperbenPeer::NUM_COLUMNS - CcperbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccargoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccargoPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcperprePeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CcperbenPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcperbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcperbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcperbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccargo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcperbens();
					$obj2->addCcperben($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcperpre(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcperbens();
					$obj3->addCcperben($obj1);
				}
	
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcbenefi(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcperbens();
					$obj4->addCcperben($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcperbenPeer::addSelectColumns($c);
		$startcol2 = (CcperbenPeer::NUM_COLUMNS - CcperbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccargoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccargoPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcperprePeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcperbenPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcperbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcperbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcperbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccargo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcperbens();
					$obj2->addCcperben($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcperpre(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcperbens();
					$obj3->addCcperben($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparroq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcperben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcperbens();
					$obj4->addCcperben($obj1);
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
		return CcperbenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcperbenPeer::ID); 

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
			$comparison = $criteria->getComparison(CcperbenPeer::ID);
			$selectCriteria->add(CcperbenPeer::ID, $criteria->remove(CcperbenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcperbenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcperbenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccperben) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcperbenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccperben $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcperbenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcperbenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcperbenPeer::DATABASE_NAME, CcperbenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcperbenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcperbenPeer::DATABASE_NAME);

		$criteria->add(CcperbenPeer::ID, $pk);


		$v = CcperbenPeer::doSelect($criteria, $con);

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
			$criteria->add(CcperbenPeer::ID, $pks, Criteria::IN);
			$objs = CcperbenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcperbenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcperbenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcperbenMapBuilder');
}
