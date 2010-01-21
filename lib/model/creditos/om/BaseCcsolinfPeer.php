<?php


abstract class BaseCcsolinfPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccsolinf';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccsolinf';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccsolinf.ID';

	
	const NOMSOLINF = 'ccsolinf.NOMSOLINF';

	
	const OBSSOLINF = 'ccsolinf.OBSSOLINF';

	
	const FECSOLINF = 'ccsolinf.FECSOLINF';

	
	const CCGERENC_ID = 'ccsolinf.CCGERENC_ID';

	
	const CCANALIS_ID = 'ccsolinf.CCANALIS_ID';

	
	const CCCLAINF_ID = 'ccsolinf.CCCLAINF_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomsolinf', 'Obssolinf', 'Fecsolinf', 'CcgerencId', 'CcanalisId', 'CcclainfId', ),
		BasePeer::TYPE_COLNAME => array (CcsolinfPeer::ID, CcsolinfPeer::NOMSOLINF, CcsolinfPeer::OBSSOLINF, CcsolinfPeer::FECSOLINF, CcsolinfPeer::CCGERENC_ID, CcsolinfPeer::CCANALIS_ID, CcsolinfPeer::CCCLAINF_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomsolinf', 'obssolinf', 'fecsolinf', 'ccgerenc_id', 'ccanalis_id', 'ccclainf_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomsolinf' => 1, 'Obssolinf' => 2, 'Fecsolinf' => 3, 'CcgerencId' => 4, 'CcanalisId' => 5, 'CcclainfId' => 6, ),
		BasePeer::TYPE_COLNAME => array (CcsolinfPeer::ID => 0, CcsolinfPeer::NOMSOLINF => 1, CcsolinfPeer::OBSSOLINF => 2, CcsolinfPeer::FECSOLINF => 3, CcsolinfPeer::CCGERENC_ID => 4, CcsolinfPeer::CCANALIS_ID => 5, CcsolinfPeer::CCCLAINF_ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomsolinf' => 1, 'obssolinf' => 2, 'fecsolinf' => 3, 'ccgerenc_id' => 4, 'ccanalis_id' => 5, 'ccclainf_id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcsolinfMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcsolinfMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcsolinfPeer::getTableMap();
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
		return str_replace(CcsolinfPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcsolinfPeer::ID);

		$criteria->addSelectColumn(CcsolinfPeer::NOMSOLINF);

		$criteria->addSelectColumn(CcsolinfPeer::OBSSOLINF);

		$criteria->addSelectColumn(CcsolinfPeer::FECSOLINF);

		$criteria->addSelectColumn(CcsolinfPeer::CCGERENC_ID);

		$criteria->addSelectColumn(CcsolinfPeer::CCANALIS_ID);

		$criteria->addSelectColumn(CcsolinfPeer::CCCLAINF_ID);

	}

	const COUNT = 'COUNT(ccsolinf.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccsolinf.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolinfPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolinfPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcsolinfPeer::doSelectRS($criteria, $con);
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
		$objects = CcsolinfPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcsolinfPeer::populateObjects(CcsolinfPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcsolinfPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcsolinfPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcgerenc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolinfPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolinfPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsolinfPeer::CCGERENC_ID, CcgerencPeer::ID);

		$rs = CcsolinfPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcanalis(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolinfPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolinfPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsolinfPeer::CCANALIS_ID, CcanalisPeer::ID);

		$rs = CcsolinfPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcclainf(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolinfPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolinfPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsolinfPeer::CCCLAINF_ID, CcclainfPeer::ID);

		$rs = CcsolinfPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcgerenc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolinfPeer::addSelectColumns($c);
		$startcol = (CcsolinfPeer::NUM_COLUMNS - CcsolinfPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcgerencPeer::addSelectColumns($c);

		$c->addJoin(CcsolinfPeer::CCGERENC_ID, CcgerencPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolinfPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcgerencPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcgerenc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolinf($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolinfs();
				$obj2->addCcsolinf($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcanalis(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolinfPeer::addSelectColumns($c);
		$startcol = (CcsolinfPeer::NUM_COLUMNS - CcsolinfPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcanalisPeer::addSelectColumns($c);

		$c->addJoin(CcsolinfPeer::CCANALIS_ID, CcanalisPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolinfPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcanalisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcanalis(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolinf($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolinfs();
				$obj2->addCcsolinf($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcclainf(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolinfPeer::addSelectColumns($c);
		$startcol = (CcsolinfPeer::NUM_COLUMNS - CcsolinfPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcclainfPeer::addSelectColumns($c);

		$c->addJoin(CcsolinfPeer::CCCLAINF_ID, CcclainfPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolinfPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcclainfPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcclainf(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolinf($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolinfs();
				$obj2->addCcsolinf($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolinfPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolinfPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcsolinfPeer::CCGERENC_ID, CcgerencPeer::ID);
	
			$criteria->addJoin(CcsolinfPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$criteria->addJoin(CcsolinfPeer::CCCLAINF_ID, CcclainfPeer::ID);
	
		$rs = CcsolinfPeer::doSelectRS($criteria, $con);
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

		CcsolinfPeer::addSelectColumns($c);
		$startcol2 = (CcsolinfPeer::NUM_COLUMNS - CcsolinfPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcgerencPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcgerencPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcanalisPeer::NUM_COLUMNS;
	
			CcclainfPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcclainfPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolinfPeer::CCGERENC_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcsolinfPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcsolinfPeer::CCCLAINF_ID, CcclainfPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolinfPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcgerenc(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsolinf($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolinfs();
					$obj2->addCcsolinf($obj1);
				}
	

							
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcanalis(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolinf($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolinfs();
					$obj3->addCcsolinf($obj1);
				}
	

							
				$omClass = CcclainfPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcclainf(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolinf($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolinfs();
					$obj4->addCcsolinf($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcgerenc(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsolinfPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsolinfPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsolinfPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcsolinfPeer::CCCLAINF_ID, CcclainfPeer::ID);
		
			$rs = CcsolinfPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcanalis(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsolinfPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsolinfPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsolinfPeer::CCGERENC_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcsolinfPeer::CCCLAINF_ID, CcclainfPeer::ID);
		
			$rs = CcsolinfPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcclainf(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsolinfPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsolinfPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsolinfPeer::CCGERENC_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcsolinfPeer::CCANALIS_ID, CcanalisPeer::ID);
		
			$rs = CcsolinfPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcgerenc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolinfPeer::addSelectColumns($c);
		$startcol2 = (CcsolinfPeer::NUM_COLUMNS - CcsolinfPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcanalisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcanalisPeer::NUM_COLUMNS;
	
			CcclainfPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclainfPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolinfPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcsolinfPeer::CCCLAINF_ID, CcclainfPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolinfPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcanalis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsolinf($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolinfs();
					$obj2->addCcsolinf($obj1);
				}
	
				$omClass = CcclainfPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclainf(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolinf($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolinfs();
					$obj3->addCcsolinf($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcanalis(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolinfPeer::addSelectColumns($c);
		$startcol2 = (CcsolinfPeer::NUM_COLUMNS - CcsolinfPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcgerencPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcgerencPeer::NUM_COLUMNS;
	
			CcclainfPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclainfPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolinfPeer::CCGERENC_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcsolinfPeer::CCCLAINF_ID, CcclainfPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolinfPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcgerenc(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsolinf($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolinfs();
					$obj2->addCcsolinf($obj1);
				}
	
				$omClass = CcclainfPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclainf(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolinf($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolinfs();
					$obj3->addCcsolinf($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcclainf(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolinfPeer::addSelectColumns($c);
		$startcol2 = (CcsolinfPeer::NUM_COLUMNS - CcsolinfPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcgerencPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcgerencPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcanalisPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolinfPeer::CCGERENC_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcsolinfPeer::CCANALIS_ID, CcanalisPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolinfPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcgerenc(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsolinf($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolinfs();
					$obj2->addCcsolinf($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcanalis(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolinf($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolinfs();
					$obj3->addCcsolinf($obj1);
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
		return CcsolinfPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcsolinfPeer::ID); 

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
			$comparison = $criteria->getComparison(CcsolinfPeer::ID);
			$selectCriteria->add(CcsolinfPeer::ID, $criteria->remove(CcsolinfPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcsolinfPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcsolinfPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccsolinf) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcsolinfPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccsolinf $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcsolinfPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcsolinfPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcsolinfPeer::DATABASE_NAME, CcsolinfPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcsolinfPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcsolinfPeer::DATABASE_NAME);

		$criteria->add(CcsolinfPeer::ID, $pk);


		$v = CcsolinfPeer::doSelect($criteria, $con);

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
			$criteria->add(CcsolinfPeer::ID, $pks, Criteria::IN);
			$objs = CcsolinfPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcsolinfPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcsolinfMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcsolinfMapBuilder');
}
