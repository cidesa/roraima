<?php


abstract class BaseCcrecprocrePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccrecprocre';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccrecprocre';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccrecprocre.ID';

	
	const FECREC = 'ccrecprocre.FECREC';

	
	const CODUSUREC = 'ccrecprocre.CODUSUREC';

	
	const FECRECCEN = 'ccrecprocre.FECRECCEN';

	
	const CODUSUCEN = 'ccrecprocre.CODUSUCEN';

	
	const ESTATU = 'ccrecprocre.ESTATU';

	
	const CCRECAUD_ID = 'ccrecprocre.CCRECAUD_ID';

	
	const CCPROGRA_ID = 'ccrecprocre.CCPROGRA_ID';

	
	const CCCREDIT_ID = 'ccrecprocre.CCCREDIT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecrec', 'Codusurec', 'Fecreccen', 'Codusucen', 'Estatu', 'CcrecaudId', 'CcprograId', 'CccreditId', ),
		BasePeer::TYPE_COLNAME => array (CcrecprocrePeer::ID, CcrecprocrePeer::FECREC, CcrecprocrePeer::CODUSUREC, CcrecprocrePeer::FECRECCEN, CcrecprocrePeer::CODUSUCEN, CcrecprocrePeer::ESTATU, CcrecprocrePeer::CCRECAUD_ID, CcrecprocrePeer::CCPROGRA_ID, CcrecprocrePeer::CCCREDIT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecrec', 'codusurec', 'fecreccen', 'codusucen', 'estatu', 'ccrecaud_id', 'ccprogra_id', 'cccredit_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecrec' => 1, 'Codusurec' => 2, 'Fecreccen' => 3, 'Codusucen' => 4, 'Estatu' => 5, 'CcrecaudId' => 6, 'CcprograId' => 7, 'CccreditId' => 8, ),
		BasePeer::TYPE_COLNAME => array (CcrecprocrePeer::ID => 0, CcrecprocrePeer::FECREC => 1, CcrecprocrePeer::CODUSUREC => 2, CcrecprocrePeer::FECRECCEN => 3, CcrecprocrePeer::CODUSUCEN => 4, CcrecprocrePeer::ESTATU => 5, CcrecprocrePeer::CCRECAUD_ID => 6, CcrecprocrePeer::CCPROGRA_ID => 7, CcrecprocrePeer::CCCREDIT_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecrec' => 1, 'codusurec' => 2, 'fecreccen' => 3, 'codusucen' => 4, 'estatu' => 5, 'ccrecaud_id' => 6, 'ccprogra_id' => 7, 'cccredit_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcrecprocreMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcrecprocreMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcrecprocrePeer::getTableMap();
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
		return str_replace(CcrecprocrePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcrecprocrePeer::ID);

		$criteria->addSelectColumn(CcrecprocrePeer::FECREC);

		$criteria->addSelectColumn(CcrecprocrePeer::CODUSUREC);

		$criteria->addSelectColumn(CcrecprocrePeer::FECRECCEN);

		$criteria->addSelectColumn(CcrecprocrePeer::CODUSUCEN);

		$criteria->addSelectColumn(CcrecprocrePeer::ESTATU);

		$criteria->addSelectColumn(CcrecprocrePeer::CCRECAUD_ID);

		$criteria->addSelectColumn(CcrecprocrePeer::CCPROGRA_ID);

		$criteria->addSelectColumn(CcrecprocrePeer::CCCREDIT_ID);

	}

	const COUNT = 'COUNT(ccrecprocre.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccrecprocre.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrecprocrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrecprocrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcrecprocrePeer::doSelectRS($criteria, $con);
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
		$objects = CcrecprocrePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcrecprocrePeer::populateObjects(CcrecprocrePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcrecprocrePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcrecprocrePeer::getOMClass();
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
			$criteria->addSelectColumn(CcrecprocrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrecprocrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrecprocrePeer::CCRECAUD_ID, CcrecaudPeer::ID);

		$rs = CcrecprocrePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcprogra(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrecprocrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrecprocrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrecprocrePeer::CCPROGRA_ID, CcprograPeer::ID);

		$rs = CcrecprocrePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcrecprocrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrecprocrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrecprocrePeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcrecprocrePeer::doSelectRS($criteria, $con);
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

		CcrecprocrePeer::addSelectColumns($c);
		$startcol = (CcrecprocrePeer::NUM_COLUMNS - CcrecprocrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcrecaudPeer::addSelectColumns($c);

		$c->addJoin(CcrecprocrePeer::CCRECAUD_ID, CcrecaudPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecprocrePeer::getOMClass();

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
										$temp_obj2->addCcrecprocre($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrecprocres();
				$obj2->addCcrecprocre($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcprogra(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrecprocrePeer::addSelectColumns($c);
		$startcol = (CcrecprocrePeer::NUM_COLUMNS - CcrecprocrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcprograPeer::addSelectColumns($c);

		$c->addJoin(CcrecprocrePeer::CCPROGRA_ID, CcprograPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecprocrePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcprograPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcprogra(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcrecprocre($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrecprocres();
				$obj2->addCcrecprocre($obj1); 			}
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

		CcrecprocrePeer::addSelectColumns($c);
		$startcol = (CcrecprocrePeer::NUM_COLUMNS - CcrecprocrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcrecprocrePeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecprocrePeer::getOMClass();

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
										$temp_obj2->addCcrecprocre($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrecprocres();
				$obj2->addCcrecprocre($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrecprocrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrecprocrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcrecprocrePeer::CCRECAUD_ID, CcrecaudPeer::ID);
	
			$criteria->addJoin(CcrecprocrePeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$criteria->addJoin(CcrecprocrePeer::CCCREDIT_ID, CccreditPeer::ID);
	
		$rs = CcrecprocrePeer::doSelectRS($criteria, $con);
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

		CcrecprocrePeer::addSelectColumns($c);
		$startcol2 = (CcrecprocrePeer::NUM_COLUMNS - CcrecprocrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcrecaudPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcrecaudPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcprograPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrecprocrePeer::CCRECAUD_ID, CcrecaudPeer::ID);
	
			$c->addJoin(CcrecprocrePeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcrecprocrePeer::CCCREDIT_ID, CccreditPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecprocrePeer::getOMClass();


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
						$temp_obj2->addCcrecprocre($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrecprocres();
					$obj2->addCcrecprocre($obj1);
				}
	

							
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcprogra(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcrecprocre($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrecprocres();
					$obj3->addCcrecprocre($obj1);
				}
	

							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcrecprocre($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcrecprocres();
					$obj4->addCcrecprocre($obj1);
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
				$criteria->addSelectColumn(CcrecprocrePeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrecprocrePeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrecprocrePeer::CCPROGRA_ID, CcprograPeer::ID);
		
				$criteria->addJoin(CcrecprocrePeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcrecprocrePeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcprogra(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcrecprocrePeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrecprocrePeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrecprocrePeer::CCRECAUD_ID, CcrecaudPeer::ID);
		
				$criteria->addJoin(CcrecprocrePeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcrecprocrePeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcrecprocrePeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrecprocrePeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrecprocrePeer::CCRECAUD_ID, CcrecaudPeer::ID);
		
				$criteria->addJoin(CcrecprocrePeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcrecprocrePeer::doSelectRS($criteria, $con);
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

		CcrecprocrePeer::addSelectColumns($c);
		$startcol2 = (CcrecprocrePeer::NUM_COLUMNS - CcrecprocrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcprograPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcprograPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrecprocrePeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcrecprocrePeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecprocrePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcprogra(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrecprocre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrecprocres();
					$obj2->addCcrecprocre($obj1);
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
						$temp_obj3->addCcrecprocre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrecprocres();
					$obj3->addCcrecprocre($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcprogra(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrecprocrePeer::addSelectColumns($c);
		$startcol2 = (CcrecprocrePeer::NUM_COLUMNS - CcrecprocrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcrecaudPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcrecaudPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrecprocrePeer::CCRECAUD_ID, CcrecaudPeer::ID);
	
			$c->addJoin(CcrecprocrePeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecprocrePeer::getOMClass();

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
						$temp_obj2->addCcrecprocre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrecprocres();
					$obj2->addCcrecprocre($obj1);
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
						$temp_obj3->addCcrecprocre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrecprocres();
					$obj3->addCcrecprocre($obj1);
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

		CcrecprocrePeer::addSelectColumns($c);
		$startcol2 = (CcrecprocrePeer::NUM_COLUMNS - CcrecprocrePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcrecaudPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcrecaudPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrecprocrePeer::CCRECAUD_ID, CcrecaudPeer::ID);
	
			$c->addJoin(CcrecprocrePeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrecprocrePeer::getOMClass();

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
						$temp_obj2->addCcrecprocre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrecprocres();
					$obj2->addCcrecprocre($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcprogra(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcrecprocre($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrecprocres();
					$obj3->addCcrecprocre($obj1);
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
		return CcrecprocrePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcrecprocrePeer::ID); 

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
			$comparison = $criteria->getComparison(CcrecprocrePeer::ID);
			$selectCriteria->add(CcrecprocrePeer::ID, $criteria->remove(CcrecprocrePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcrecprocrePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcrecprocrePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccrecprocre) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcrecprocrePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccrecprocre $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcrecprocrePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcrecprocrePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcrecprocrePeer::DATABASE_NAME, CcrecprocrePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcrecprocrePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcrecprocrePeer::DATABASE_NAME);

		$criteria->add(CcrecprocrePeer::ID, $pk);


		$v = CcrecprocrePeer::doSelect($criteria, $con);

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
			$criteria->add(CcrecprocrePeer::ID, $pks, Criteria::IN);
			$objs = CcrecprocrePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcrecprocrePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcrecprocreMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcrecprocreMapBuilder');
}
