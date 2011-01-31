<?php


abstract class BaseCatprcPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'catprc';

	
	const CLASS_DEFAULT = 'lib.model.catastro.Catprc';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'catprc.ID';

	
	const CATSEC_ID = 'catprc.CATSEC_ID';

	
	const CATPAR_ID = 'catprc.CATPAR_ID';

	
	const CATMUN_ID = 'catprc.CATMUN_ID';

	
	const CATCIU_ID = 'catprc.CATCIU_ID';

	
	const CATEST_ID = 'catprc.CATEST_ID';

	
	const NOMPRC = 'catprc.NOMPRC';

	
	const ALIPRC = 'catprc.ALIPRC';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'CatsecId', 'CatparId', 'CatmunId', 'CatciuId', 'CatestId', 'Nomprc', 'Aliprc', ),
		BasePeer::TYPE_COLNAME => array (CatprcPeer::ID, CatprcPeer::CATSEC_ID, CatprcPeer::CATPAR_ID, CatprcPeer::CATMUN_ID, CatprcPeer::CATCIU_ID, CatprcPeer::CATEST_ID, CatprcPeer::NOMPRC, CatprcPeer::ALIPRC, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'catsec_id', 'catpar_id', 'catmun_id', 'catciu_id', 'catest_id', 'nomprc', 'aliprc', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'CatsecId' => 1, 'CatparId' => 2, 'CatmunId' => 3, 'CatciuId' => 4, 'CatestId' => 5, 'Nomprc' => 6, 'Aliprc' => 7, ),
		BasePeer::TYPE_COLNAME => array (CatprcPeer::ID => 0, CatprcPeer::CATSEC_ID => 1, CatprcPeer::CATPAR_ID => 2, CatprcPeer::CATMUN_ID => 3, CatprcPeer::CATCIU_ID => 4, CatprcPeer::CATEST_ID => 5, CatprcPeer::NOMPRC => 6, CatprcPeer::ALIPRC => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'catsec_id' => 1, 'catpar_id' => 2, 'catmun_id' => 3, 'catciu_id' => 4, 'catest_id' => 5, 'nomprc' => 6, 'aliprc' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/catastro/map/CatprcMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.catastro.map.CatprcMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CatprcPeer::getTableMap();
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
		return str_replace(CatprcPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CatprcPeer::ID);

		$criteria->addSelectColumn(CatprcPeer::CATSEC_ID);

		$criteria->addSelectColumn(CatprcPeer::CATPAR_ID);

		$criteria->addSelectColumn(CatprcPeer::CATMUN_ID);

		$criteria->addSelectColumn(CatprcPeer::CATCIU_ID);

		$criteria->addSelectColumn(CatprcPeer::CATEST_ID);

		$criteria->addSelectColumn(CatprcPeer::NOMPRC);

		$criteria->addSelectColumn(CatprcPeer::ALIPRC);

	}

	const COUNT = 'COUNT(catprc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT catprc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CatprcPeer::doSelectRS($criteria, $con);
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
		$objects = CatprcPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CatprcPeer::populateObjects(CatprcPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CatprcPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CatprcPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatsec(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatpar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatmun(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatsec(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatprcPeer::addSelectColumns($c);
		$startcol = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatsecPeer::addSelectColumns($c);

		$c->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsecPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatsec(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatpar(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatprcPeer::addSelectColumns($c);
		$startcol = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatparPeer::addSelectColumns($c);

		$c->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatparPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatpar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatmun(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatprcPeer::addSelectColumns($c);
		$startcol = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatmunPeer::addSelectColumns($c);

		$c->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();

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
										$temp_obj2->addCatprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1); 			}
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

		CatprcPeer::addSelectColumns($c);
		$startcol = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatciuPeer::addSelectColumns($c);

		$c->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();

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
										$temp_obj2->addCatprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1); 			}
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

		CatprcPeer::addSelectColumns($c);
		$startcol = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatestPeer::addSelectColumns($c);

		$c->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();

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
										$temp_obj2->addCatprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
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

		CatprcPeer::addSelectColumns($c);
		$startcol2 = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsecPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsec(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1);
			}


					
			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatpar(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCatprcs();
				$obj3->addCatprc($obj1);
			}


					
			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatmun(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCatprcs();
				$obj4->addCatprc($obj1);
			}


					
			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatciu(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initCatprcs();
				$obj5->addCatprc($obj1);
			}


					
			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatest(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initCatprcs();
				$obj6->addCatprc($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCatsec(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatpar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatmun(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);

		$rs = CatprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCatsec(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatprcPeer::addSelectColumns($c);
		$startcol2 = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatparPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatpar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatmun(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatprcs();
				$obj3->addCatprc($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatciu(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatprcs();
				$obj4->addCatprc($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatest(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatprcs();
				$obj5->addCatprc($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatpar(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatprcPeer::addSelectColumns($c);
		$startcol2 = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsecPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsecPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsec(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatmun(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatprcs();
				$obj3->addCatprc($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatciu(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatprcs();
				$obj4->addCatprc($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatest(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatprcs();
				$obj5->addCatprc($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatmun(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatprcPeer::addSelectColumns($c);
		$startcol2 = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsecPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatparPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsec(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatpar(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatprcs();
				$obj3->addCatprc($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatciu(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatprcs();
				$obj4->addCatprc($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatest(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatprcs();
				$obj5->addCatprc($obj1);
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

		CatprcPeer::addSelectColumns($c);
		$startcol2 = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsecPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmunPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatprcPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsec(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatpar(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatprcs();
				$obj3->addCatprc($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatmun(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatprcs();
				$obj4->addCatprc($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatest(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatprcs();
				$obj5->addCatprc($obj1);
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

		CatprcPeer::addSelectColumns($c);
		$startcol2 = (CatprcPeer::NUM_COLUMNS - CatprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsecPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatciuPeer::NUM_COLUMNS;

		$c->addJoin(CatprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatprcPeer::CATCIU_ID, CatciuPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsec(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatprcs();
				$obj2->addCatprc($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatpar(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatprcs();
				$obj3->addCatprc($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatmun(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatprcs();
				$obj4->addCatprc($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatciu(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatprcs();
				$obj5->addCatprc($obj1);
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
		return CatprcPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CatprcPeer::ID); 

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
			$comparison = $criteria->getComparison(CatprcPeer::ID);
			$selectCriteria->add(CatprcPeer::ID, $criteria->remove(CatprcPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CatprcPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CatprcPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Catprc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CatprcPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Catprc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CatprcPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CatprcPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CatprcPeer::DATABASE_NAME, CatprcPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CatprcPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CatprcPeer::DATABASE_NAME);

		$criteria->add(CatprcPeer::ID, $pk);


		$v = CatprcPeer::doSelect($criteria, $con);

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
			$criteria->add(CatprcPeer::ID, $pks, Criteria::IN);
			$objs = CatprcPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCatprcPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/catastro/map/CatprcMapBuilder.php';
	Propel::registerMapBuilder('lib.model.catastro.map.CatprcMapBuilder');
}
