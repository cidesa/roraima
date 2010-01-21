<?php


abstract class BaseCcanalisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccanalis';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccanalis';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccanalis.ID';

	
	const CEDANA = 'ccanalis.CEDANA';

	
	const NOMANA = 'ccanalis.NOMANA';

	
	const SEXANA = 'ccanalis.SEXANA';

	
	const TELANA = 'ccanalis.TELANA';

	
	const CELANA = 'ccanalis.CELANA';

	
	const CODARETEL = 'ccanalis.CODARETEL';

	
	const CODARECEL = 'ccanalis.CODARECEL';

	
	const DIRANA = 'ccanalis.DIRANA';

	
	const ESTATU = 'ccanalis.ESTATU';

	
	const CCPERPRE_ID = 'ccanalis.CCPERPRE_ID';

	
	const CCTIPANA_ID = 'ccanalis.CCTIPANA_ID';

	
	const CCAREGER_ID = 'ccanalis.CCAREGER_ID';

	
	const CCPARROQ_ID = 'ccanalis.CCPARROQ_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Cedana', 'Nomana', 'Sexana', 'Telana', 'Celana', 'Codaretel', 'Codarecel', 'Dirana', 'Estatu', 'CcperpreId', 'CctipanaId', 'CcaregerId', 'CcparroqId', ),
		BasePeer::TYPE_COLNAME => array (CcanalisPeer::ID, CcanalisPeer::CEDANA, CcanalisPeer::NOMANA, CcanalisPeer::SEXANA, CcanalisPeer::TELANA, CcanalisPeer::CELANA, CcanalisPeer::CODARETEL, CcanalisPeer::CODARECEL, CcanalisPeer::DIRANA, CcanalisPeer::ESTATU, CcanalisPeer::CCPERPRE_ID, CcanalisPeer::CCTIPANA_ID, CcanalisPeer::CCAREGER_ID, CcanalisPeer::CCPARROQ_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'cedana', 'nomana', 'sexana', 'telana', 'celana', 'codaretel', 'codarecel', 'dirana', 'estatu', 'ccperpre_id', 'cctipana_id', 'ccareger_id', 'ccparroq_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Cedana' => 1, 'Nomana' => 2, 'Sexana' => 3, 'Telana' => 4, 'Celana' => 5, 'Codaretel' => 6, 'Codarecel' => 7, 'Dirana' => 8, 'Estatu' => 9, 'CcperpreId' => 10, 'CctipanaId' => 11, 'CcaregerId' => 12, 'CcparroqId' => 13, ),
		BasePeer::TYPE_COLNAME => array (CcanalisPeer::ID => 0, CcanalisPeer::CEDANA => 1, CcanalisPeer::NOMANA => 2, CcanalisPeer::SEXANA => 3, CcanalisPeer::TELANA => 4, CcanalisPeer::CELANA => 5, CcanalisPeer::CODARETEL => 6, CcanalisPeer::CODARECEL => 7, CcanalisPeer::DIRANA => 8, CcanalisPeer::ESTATU => 9, CcanalisPeer::CCPERPRE_ID => 10, CcanalisPeer::CCTIPANA_ID => 11, CcanalisPeer::CCAREGER_ID => 12, CcanalisPeer::CCPARROQ_ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'cedana' => 1, 'nomana' => 2, 'sexana' => 3, 'telana' => 4, 'celana' => 5, 'codaretel' => 6, 'codarecel' => 7, 'dirana' => 8, 'estatu' => 9, 'ccperpre_id' => 10, 'cctipana_id' => 11, 'ccareger_id' => 12, 'ccparroq_id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcanalisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcanalisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcanalisPeer::getTableMap();
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
		return str_replace(CcanalisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcanalisPeer::ID);

		$criteria->addSelectColumn(CcanalisPeer::CEDANA);

		$criteria->addSelectColumn(CcanalisPeer::NOMANA);

		$criteria->addSelectColumn(CcanalisPeer::SEXANA);

		$criteria->addSelectColumn(CcanalisPeer::TELANA);

		$criteria->addSelectColumn(CcanalisPeer::CELANA);

		$criteria->addSelectColumn(CcanalisPeer::CODARETEL);

		$criteria->addSelectColumn(CcanalisPeer::CODARECEL);

		$criteria->addSelectColumn(CcanalisPeer::DIRANA);

		$criteria->addSelectColumn(CcanalisPeer::ESTATU);

		$criteria->addSelectColumn(CcanalisPeer::CCPERPRE_ID);

		$criteria->addSelectColumn(CcanalisPeer::CCTIPANA_ID);

		$criteria->addSelectColumn(CcanalisPeer::CCAREGER_ID);

		$criteria->addSelectColumn(CcanalisPeer::CCPARROQ_ID);

	}

	const COUNT = 'COUNT(ccanalis.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccanalis.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcanalisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcanalisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcanalisPeer::doSelectRS($criteria, $con);
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
		$objects = CcanalisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcanalisPeer::populateObjects(CcanalisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcanalisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcanalisPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcperpre(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcanalisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcanalisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcanalisPeer::CCPERPRE_ID, CcperprePeer::ID);

		$rs = CcanalisPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCctipana(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcanalisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcanalisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcanalisPeer::CCTIPANA_ID, CctipanaPeer::ID);

		$rs = CcanalisPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcareger(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcanalisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcanalisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcanalisPeer::CCAREGER_ID, CcaregerPeer::ID);

		$rs = CcanalisPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcanalisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcanalisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcanalisPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcanalisPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcanalisPeer::addSelectColumns($c);
		$startcol = (CcanalisPeer::NUM_COLUMNS - CcanalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperprePeer::addSelectColumns($c);

		$c->addJoin(CcanalisPeer::CCPERPRE_ID, CcperprePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcanalisPeer::getOMClass();

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
										$temp_obj2->addCcanalis($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcanaliss();
				$obj2->addCcanalis($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCctipana(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcanalisPeer::addSelectColumns($c);
		$startcol = (CcanalisPeer::NUM_COLUMNS - CcanalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipanaPeer::addSelectColumns($c);

		$c->addJoin(CcanalisPeer::CCTIPANA_ID, CctipanaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcanalisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipanaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipana(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcanalis($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcanaliss();
				$obj2->addCcanalis($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcareger(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcanalisPeer::addSelectColumns($c);
		$startcol = (CcanalisPeer::NUM_COLUMNS - CcanalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcaregerPeer::addSelectColumns($c);

		$c->addJoin(CcanalisPeer::CCAREGER_ID, CcaregerPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcanalisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcaregerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcareger(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcanalis($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcanaliss();
				$obj2->addCcanalis($obj1); 			}
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

		CcanalisPeer::addSelectColumns($c);
		$startcol = (CcanalisPeer::NUM_COLUMNS - CcanalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcanalisPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcanalisPeer::getOMClass();

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
										$temp_obj2->addCcanalis($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcanaliss();
				$obj2->addCcanalis($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcanalisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcanalisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcanalisPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$criteria->addJoin(CcanalisPeer::CCTIPANA_ID, CctipanaPeer::ID);
	
			$criteria->addJoin(CcanalisPeer::CCAREGER_ID, CcaregerPeer::ID);
	
			$criteria->addJoin(CcanalisPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = CcanalisPeer::doSelectRS($criteria, $con);
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

		CcanalisPeer::addSelectColumns($c);
		$startcol2 = (CcanalisPeer::NUM_COLUMNS - CcanalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CctipanaPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipanaPeer::NUM_COLUMNS;
	
			CcaregerPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcaregerPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcanalisPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcanalisPeer::CCTIPANA_ID, CctipanaPeer::ID);
	
			$c->addJoin(CcanalisPeer::CCAREGER_ID, CcaregerPeer::ID);
	
			$c->addJoin(CcanalisPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcanalisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcanalis($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcanaliss();
					$obj2->addCcanalis($obj1);
				}
	

							
				$omClass = CctipanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipana(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcanalis($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcanaliss();
					$obj3->addCcanalis($obj1);
				}
	

							
				$omClass = CcaregerPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcareger(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcanalis($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcanaliss();
					$obj4->addCcanalis($obj1);
				}
	

							
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcanalis($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcanaliss();
					$obj5->addCcanalis($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcperpre(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcanalisPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcanalisPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcanalisPeer::CCTIPANA_ID, CctipanaPeer::ID);
		
				$criteria->addJoin(CcanalisPeer::CCAREGER_ID, CcaregerPeer::ID);
		
				$criteria->addJoin(CcanalisPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcanalisPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCctipana(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcanalisPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcanalisPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcanalisPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcanalisPeer::CCAREGER_ID, CcaregerPeer::ID);
		
				$criteria->addJoin(CcanalisPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcanalisPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcareger(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcanalisPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcanalisPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcanalisPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcanalisPeer::CCTIPANA_ID, CctipanaPeer::ID);
		
				$criteria->addJoin(CcanalisPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcanalisPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcanalisPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcanalisPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcanalisPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcanalisPeer::CCTIPANA_ID, CctipanaPeer::ID);
		
				$criteria->addJoin(CcanalisPeer::CCAREGER_ID, CcaregerPeer::ID);
		
			$rs = CcanalisPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcanalisPeer::addSelectColumns($c);
		$startcol2 = (CcanalisPeer::NUM_COLUMNS - CcanalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipanaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipanaPeer::NUM_COLUMNS;
	
			CcaregerPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcaregerPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcanalisPeer::CCTIPANA_ID, CctipanaPeer::ID);
	
			$c->addJoin(CcanalisPeer::CCAREGER_ID, CcaregerPeer::ID);
	
			$c->addJoin(CcanalisPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcanalisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CctipanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCctipana(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcanaliss();
					$obj2->addCcanalis($obj1);
				}
	
				$omClass = CcaregerPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcareger(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcanaliss();
					$obj3->addCcanalis($obj1);
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
						$temp_obj4->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcanaliss();
					$obj4->addCcanalis($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCctipana(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcanalisPeer::addSelectColumns($c);
		$startcol2 = (CcanalisPeer::NUM_COLUMNS - CcanalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcaregerPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcaregerPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcanalisPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcanalisPeer::CCAREGER_ID, CcaregerPeer::ID);
	
			$c->addJoin(CcanalisPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcanalisPeer::getOMClass();

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
						$temp_obj2->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcanaliss();
					$obj2->addCcanalis($obj1);
				}
	
				$omClass = CcaregerPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcareger(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcanaliss();
					$obj3->addCcanalis($obj1);
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
						$temp_obj4->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcanaliss();
					$obj4->addCcanalis($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcareger(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcanalisPeer::addSelectColumns($c);
		$startcol2 = (CcanalisPeer::NUM_COLUMNS - CcanalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CctipanaPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipanaPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcanalisPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcanalisPeer::CCTIPANA_ID, CctipanaPeer::ID);
	
			$c->addJoin(CcanalisPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcanalisPeer::getOMClass();

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
						$temp_obj2->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcanaliss();
					$obj2->addCcanalis($obj1);
				}
	
				$omClass = CctipanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipana(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcanaliss();
					$obj3->addCcanalis($obj1);
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
						$temp_obj4->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcanaliss();
					$obj4->addCcanalis($obj1);
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

		CcanalisPeer::addSelectColumns($c);
		$startcol2 = (CcanalisPeer::NUM_COLUMNS - CcanalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CctipanaPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipanaPeer::NUM_COLUMNS;
	
			CcaregerPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcaregerPeer::NUM_COLUMNS;
	
			$c->addJoin(CcanalisPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcanalisPeer::CCTIPANA_ID, CctipanaPeer::ID);
	
			$c->addJoin(CcanalisPeer::CCAREGER_ID, CcaregerPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcanalisPeer::getOMClass();

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
						$temp_obj2->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcanaliss();
					$obj2->addCcanalis($obj1);
				}
	
				$omClass = CctipanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipana(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcanaliss();
					$obj3->addCcanalis($obj1);
				}
	
				$omClass = CcaregerPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcareger(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcanalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcanaliss();
					$obj4->addCcanalis($obj1);
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
		return CcanalisPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcanalisPeer::ID); 

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
			$comparison = $criteria->getComparison(CcanalisPeer::ID);
			$selectCriteria->add(CcanalisPeer::ID, $criteria->remove(CcanalisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcanalisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcanalisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccanalis) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcanalisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccanalis $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcanalisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcanalisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcanalisPeer::DATABASE_NAME, CcanalisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcanalisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcanalisPeer::DATABASE_NAME);

		$criteria->add(CcanalisPeer::ID, $pk);


		$v = CcanalisPeer::doSelect($criteria, $con);

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
			$criteria->add(CcanalisPeer::ID, $pks, Criteria::IN);
			$objs = CcanalisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcanalisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcanalisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcanalisMapBuilder');
}
