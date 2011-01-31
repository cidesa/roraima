<?php


abstract class BaseCatparPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'catpar';

	
	const CLASS_DEFAULT = 'lib.model.catastro.Catpar';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'catpar.ID';

	
	const CATMUN_ID = 'catpar.CATMUN_ID';

	
	const CATCIU_ID = 'catpar.CATCIU_ID';

	
	const CATEST_ID = 'catpar.CATEST_ID';

	
	const NOMPAR = 'catpar.NOMPAR';

	
	const ALIPAR = 'catpar.ALIPAR';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'CatmunId', 'CatciuId', 'CatestId', 'Nompar', 'Alipar', ),
		BasePeer::TYPE_COLNAME => array (CatparPeer::ID, CatparPeer::CATMUN_ID, CatparPeer::CATCIU_ID, CatparPeer::CATEST_ID, CatparPeer::NOMPAR, CatparPeer::ALIPAR, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'catmun_id', 'catciu_id', 'catest_id', 'nompar', 'alipar', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'CatmunId' => 1, 'CatciuId' => 2, 'CatestId' => 3, 'Nompar' => 4, 'Alipar' => 5, ),
		BasePeer::TYPE_COLNAME => array (CatparPeer::ID => 0, CatparPeer::CATMUN_ID => 1, CatparPeer::CATCIU_ID => 2, CatparPeer::CATEST_ID => 3, CatparPeer::NOMPAR => 4, CatparPeer::ALIPAR => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'catmun_id' => 1, 'catciu_id' => 2, 'catest_id' => 3, 'nompar' => 4, 'alipar' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/catastro/map/CatparMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.catastro.map.CatparMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CatparPeer::getTableMap();
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
		return str_replace(CatparPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CatparPeer::ID);

		$criteria->addSelectColumn(CatparPeer::CATMUN_ID);

		$criteria->addSelectColumn(CatparPeer::CATCIU_ID);

		$criteria->addSelectColumn(CatparPeer::CATEST_ID);

		$criteria->addSelectColumn(CatparPeer::NOMPAR);

		$criteria->addSelectColumn(CatparPeer::ALIPAR);

	}

	const COUNT = 'COUNT(catpar.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT catpar.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatparPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatparPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CatparPeer::doSelectRS($criteria, $con);
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
		$objects = CatparPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CatparPeer::populateObjects(CatparPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CatparPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CatparPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatmun(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatparPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatparPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatparPeer::CATMUN_ID, CatmunPeer::ID);

		$rs = CatparPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatciu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatparPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatparPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatparPeer::CATCIU_ID, CatciuPeer::ID);

		$rs = CatparPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatest(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatparPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatparPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatparPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatparPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatmun(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatparPeer::addSelectColumns($c);
		$startcol = (CatparPeer::NUM_COLUMNS - CatparPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatmunPeer::addSelectColumns($c);

		$c->addJoin(CatparPeer::CATMUN_ID, CatmunPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatparPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatmunPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatmun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatpar($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatpars();
				$obj2->addCatpar($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatciu(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatparPeer::addSelectColumns($c);
		$startcol = (CatparPeer::NUM_COLUMNS - CatparPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatciuPeer::addSelectColumns($c);

		$c->addJoin(CatparPeer::CATCIU_ID, CatciuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatparPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatciuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatciu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatpar($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatpars();
				$obj2->addCatpar($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatest(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatparPeer::addSelectColumns($c);
		$startcol = (CatparPeer::NUM_COLUMNS - CatparPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatestPeer::addSelectColumns($c);

		$c->addJoin(CatparPeer::CATEST_ID, CatestPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatparPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatest(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatpar($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatpars();
				$obj2->addCatpar($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatparPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatparPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatparPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatparPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatparPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatparPeer::doSelectRS($criteria, $con);
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

		CatparPeer::addSelectColumns($c);
		$startcol2 = (CatparPeer::NUM_COLUMNS - CatparPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatmunPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatparPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatparPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatparPeer::CATEST_ID, CatestPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatmun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatpar($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCatpars();
				$obj2->addCatpar($obj1);
			}


					
			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatciu(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatpar($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCatpars();
				$obj3->addCatpar($obj1);
			}


					
			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatest(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatpar($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCatpars();
				$obj4->addCatpar($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCatmun(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatparPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatparPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatparPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatparPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatparPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatciu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatparPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatparPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatparPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatparPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatparPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatest(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatparPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatparPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatparPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatparPeer::CATCIU_ID, CatciuPeer::ID);

		$rs = CatparPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCatmun(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatparPeer::addSelectColumns($c);
		$startcol2 = (CatparPeer::NUM_COLUMNS - CatparPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatciuPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatparPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatparPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatparPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatciu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatpar($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatpars();
				$obj2->addCatpar($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatest(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatpar($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatpars();
				$obj3->addCatpar($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatciu(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatparPeer::addSelectColumns($c);
		$startcol2 = (CatparPeer::NUM_COLUMNS - CatparPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatmunPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatmunPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatparPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatparPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatparPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatmun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatpar($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatpars();
				$obj2->addCatpar($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatest(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatpar($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatpars();
				$obj3->addCatpar($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatest(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatparPeer::addSelectColumns($c);
		$startcol2 = (CatparPeer::NUM_COLUMNS - CatparPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatmunPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatciuPeer::NUM_COLUMNS;

		$c->addJoin(CatparPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatparPeer::CATCIU_ID, CatciuPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatparPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatmun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatpar($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatpars();
				$obj2->addCatpar($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatciu(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatpar($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatpars();
				$obj3->addCatpar($obj1);
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
		return CatparPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CatparPeer::ID); 

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
			$comparison = $criteria->getComparison(CatparPeer::ID);
			$selectCriteria->add(CatparPeer::ID, $criteria->remove(CatparPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CatparPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CatparPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Catpar) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CatparPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Catpar $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CatparPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CatparPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CatparPeer::DATABASE_NAME, CatparPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CatparPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CatparPeer::DATABASE_NAME);

		$criteria->add(CatparPeer::ID, $pk);


		$v = CatparPeer::doSelect($criteria, $con);

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
			$criteria->add(CatparPeer::ID, $pks, Criteria::IN);
			$objs = CatparPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCatparPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/catastro/map/CatparMapBuilder.php';
	Propel::registerMapBuilder('lib.model.catastro.map.CatparMapBuilder');
}
