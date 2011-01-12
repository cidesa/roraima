<?php


abstract class BaseCcbitcredPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccbitcred';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccbitcred';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccbitcred.ID';

	
	const FECVIG = 'ccbitcred.FECVIG';

	
	const FECVEN = 'ccbitcred.FECVEN';

	
	const NOMESTATU = 'ccbitcred.NOMESTATU';

	
	const NOMGERENC = 'ccbitcred.NOMGERENC';

	
	const CCESTATU_ID = 'ccbitcred.CCESTATU_ID';

	
	const CCCREDIT_ID = 'ccbitcred.CCCREDIT_ID';

	
	const CCUSUARIO_ID = 'ccbitcred.CCUSUARIO_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecvig', 'Fecven', 'Nomestatu', 'Nomgerenc', 'CcestatuId', 'CccreditId', 'CcusuarioId', ),
		BasePeer::TYPE_COLNAME => array (CcbitcredPeer::ID, CcbitcredPeer::FECVIG, CcbitcredPeer::FECVEN, CcbitcredPeer::NOMESTATU, CcbitcredPeer::NOMGERENC, CcbitcredPeer::CCESTATU_ID, CcbitcredPeer::CCCREDIT_ID, CcbitcredPeer::CCUSUARIO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecvig', 'fecven', 'nomestatu', 'nomgerenc', 'ccestatu_id', 'cccredit_id', 'ccusuario_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecvig' => 1, 'Fecven' => 2, 'Nomestatu' => 3, 'Nomgerenc' => 4, 'CcestatuId' => 5, 'CccreditId' => 6, 'CcusuarioId' => 7, ),
		BasePeer::TYPE_COLNAME => array (CcbitcredPeer::ID => 0, CcbitcredPeer::FECVIG => 1, CcbitcredPeer::FECVEN => 2, CcbitcredPeer::NOMESTATU => 3, CcbitcredPeer::NOMGERENC => 4, CcbitcredPeer::CCESTATU_ID => 5, CcbitcredPeer::CCCREDIT_ID => 6, CcbitcredPeer::CCUSUARIO_ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecvig' => 1, 'fecven' => 2, 'nomestatu' => 3, 'nomgerenc' => 4, 'ccestatu_id' => 5, 'cccredit_id' => 6, 'ccusuario_id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcbitcredMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcbitcredMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcbitcredPeer::getTableMap();
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
		return str_replace(CcbitcredPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcbitcredPeer::ID);

		$criteria->addSelectColumn(CcbitcredPeer::FECVIG);

		$criteria->addSelectColumn(CcbitcredPeer::FECVEN);

		$criteria->addSelectColumn(CcbitcredPeer::NOMESTATU);

		$criteria->addSelectColumn(CcbitcredPeer::NOMGERENC);

		$criteria->addSelectColumn(CcbitcredPeer::CCESTATU_ID);

		$criteria->addSelectColumn(CcbitcredPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcbitcredPeer::CCUSUARIO_ID);

	}

	const COUNT = 'COUNT(ccbitcred.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccbitcred.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbitcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbitcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcbitcredPeer::doSelectRS($criteria, $con);
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
		$objects = CcbitcredPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcbitcredPeer::populateObjects(CcbitcredPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcbitcredPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcbitcredPeer::getOMClass();
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
			$criteria->addSelectColumn(CcbitcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbitcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbitcredPeer::CCESTATU_ID, CcestatuPeer::ID);

		$rs = CcbitcredPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcbitcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbitcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbitcredPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcbitcredPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcusuario(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbitcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbitcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbitcredPeer::CCUSUARIO_ID, CcusuarioPeer::ID);

		$rs = CcbitcredPeer::doSelectRS($criteria, $con);
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

		CcbitcredPeer::addSelectColumns($c);
		$startcol = (CcbitcredPeer::NUM_COLUMNS - CcbitcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcestatuPeer::addSelectColumns($c);

		$c->addJoin(CcbitcredPeer::CCESTATU_ID, CcestatuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbitcredPeer::getOMClass();

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
										$temp_obj2->addCcbitcred($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbitcreds();
				$obj2->addCcbitcred($obj1); 			}
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

		CcbitcredPeer::addSelectColumns($c);
		$startcol = (CcbitcredPeer::NUM_COLUMNS - CcbitcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcbitcredPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbitcredPeer::getOMClass();

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
										$temp_obj2->addCcbitcred($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbitcreds();
				$obj2->addCcbitcred($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcusuario(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbitcredPeer::addSelectColumns($c);
		$startcol = (CcbitcredPeer::NUM_COLUMNS - CcbitcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcusuarioPeer::addSelectColumns($c);

		$c->addJoin(CcbitcredPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbitcredPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcusuarioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcusuario(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbitcred($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbitcreds();
				$obj2->addCcbitcred($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbitcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbitcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcbitcredPeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$criteria->addJoin(CcbitcredPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcbitcredPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
		$rs = CcbitcredPeer::doSelectRS($criteria, $con);
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

		CcbitcredPeer::addSelectColumns($c);
		$startcol2 = (CcbitcredPeer::NUM_COLUMNS - CcbitcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuarioPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbitcredPeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcbitcredPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcbitcredPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbitcredPeer::getOMClass();


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
						$temp_obj2->addCcbitcred($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbitcreds();
					$obj2->addCcbitcred($obj1);
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
						$temp_obj3->addCcbitcred($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbitcreds();
					$obj3->addCcbitcred($obj1);
				}
	

							
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcusuario(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbitcred($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbitcreds();
					$obj4->addCcbitcred($obj1);
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
				$criteria->addSelectColumn(CcbitcredPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbitcredPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbitcredPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcbitcredPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		
			$rs = CcbitcredPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcbitcredPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbitcredPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbitcredPeer::CCESTATU_ID, CcestatuPeer::ID);
		
				$criteria->addJoin(CcbitcredPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		
			$rs = CcbitcredPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcusuario(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbitcredPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbitcredPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbitcredPeer::CCESTATU_ID, CcestatuPeer::ID);
		
				$criteria->addJoin(CcbitcredPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcbitcredPeer::doSelectRS($criteria, $con);
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

		CcbitcredPeer::addSelectColumns($c);
		$startcol2 = (CcbitcredPeer::NUM_COLUMNS - CcbitcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuarioPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbitcredPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcbitcredPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbitcredPeer::getOMClass();

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
						$temp_obj2->addCcbitcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbitcreds();
					$obj2->addCcbitcred($obj1);
				}
	
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuario(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbitcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbitcreds();
					$obj3->addCcbitcred($obj1);
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

		CcbitcredPeer::addSelectColumns($c);
		$startcol2 = (CcbitcredPeer::NUM_COLUMNS - CcbitcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuarioPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbitcredPeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcbitcredPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbitcredPeer::getOMClass();

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
						$temp_obj2->addCcbitcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbitcreds();
					$obj2->addCcbitcred($obj1);
				}
	
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuario(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbitcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbitcreds();
					$obj3->addCcbitcred($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcusuario(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbitcredPeer::addSelectColumns($c);
		$startcol2 = (CcbitcredPeer::NUM_COLUMNS - CcbitcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbitcredPeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcbitcredPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbitcredPeer::getOMClass();

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
						$temp_obj2->addCcbitcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbitcreds();
					$obj2->addCcbitcred($obj1);
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
						$temp_obj3->addCcbitcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbitcreds();
					$obj3->addCcbitcred($obj1);
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
		return CcbitcredPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcbitcredPeer::ID); 

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
			$comparison = $criteria->getComparison(CcbitcredPeer::ID);
			$selectCriteria->add(CcbitcredPeer::ID, $criteria->remove(CcbitcredPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcbitcredPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcbitcredPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccbitcred) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcbitcredPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccbitcred $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcbitcredPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcbitcredPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcbitcredPeer::DATABASE_NAME, CcbitcredPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcbitcredPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcbitcredPeer::DATABASE_NAME);

		$criteria->add(CcbitcredPeer::ID, $pk);


		$v = CcbitcredPeer::doSelect($criteria, $con);

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
			$criteria->add(CcbitcredPeer::ID, $pks, Criteria::IN);
			$objs = CcbitcredPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcbitcredPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcbitcredMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcbitcredMapBuilder');
}
