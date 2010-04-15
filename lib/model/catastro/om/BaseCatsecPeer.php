<?php


abstract class BaseCatsecPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'catsec';

	
	const CLASS_DEFAULT = 'lib.model.catastro.Catsec';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'catsec.ID';

	
	const CATPAR_ID = 'catsec.CATPAR_ID';

	
	const CATMUN_ID = 'catsec.CATMUN_ID';

	
	const CATCIU_ID = 'catsec.CATCIU_ID';

	
	const CATEST_ID = 'catsec.CATEST_ID';

	
	const NOMSEC = 'catsec.NOMSEC';

	
	const ALISEC = 'catsec.ALISEC';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'CatparId', 'CatmunId', 'CatciuId', 'CatestId', 'Nomsec', 'Alisec', ),
		BasePeer::TYPE_COLNAME => array (CatsecPeer::ID, CatsecPeer::CATPAR_ID, CatsecPeer::CATMUN_ID, CatsecPeer::CATCIU_ID, CatsecPeer::CATEST_ID, CatsecPeer::NOMSEC, CatsecPeer::ALISEC, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'catpar_id', 'catmun_id', 'catciu_id', 'catest_id', 'nomsec', 'alisec', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'CatparId' => 1, 'CatmunId' => 2, 'CatciuId' => 3, 'CatestId' => 4, 'Nomsec' => 5, 'Alisec' => 6, ),
		BasePeer::TYPE_COLNAME => array (CatsecPeer::ID => 0, CatsecPeer::CATPAR_ID => 1, CatsecPeer::CATMUN_ID => 2, CatsecPeer::CATCIU_ID => 3, CatsecPeer::CATEST_ID => 4, CatsecPeer::NOMSEC => 5, CatsecPeer::ALISEC => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'catpar_id' => 1, 'catmun_id' => 2, 'catciu_id' => 3, 'catest_id' => 4, 'nomsec' => 5, 'alisec' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/catastro/map/CatsecMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.catastro.map.CatsecMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CatsecPeer::getTableMap();
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
		return str_replace(CatsecPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CatsecPeer::ID);

		$criteria->addSelectColumn(CatsecPeer::CATPAR_ID);

		$criteria->addSelectColumn(CatsecPeer::CATMUN_ID);

		$criteria->addSelectColumn(CatsecPeer::CATCIU_ID);

		$criteria->addSelectColumn(CatsecPeer::CATEST_ID);

		$criteria->addSelectColumn(CatsecPeer::NOMSEC);

		$criteria->addSelectColumn(CatsecPeer::ALISEC);

	}

	const COUNT = 'COUNT(catsec.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT catsec.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CatsecPeer::doSelectRS($criteria, $con);
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
		$objects = CatsecPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CatsecPeer::populateObjects(CatsecPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CatsecPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CatsecPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatpar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsecPeer::CATPAR_ID, CatparPeer::ID);

		$rs = CatsecPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsecPeer::CATMUN_ID, CatmunPeer::ID);

		$rs = CatsecPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsecPeer::CATCIU_ID, CatciuPeer::ID);

		$rs = CatsecPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsecPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsecPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatpar(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatsecPeer::addSelectColumns($c);
		$startcol = (CatsecPeer::NUM_COLUMNS - CatsecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatparPeer::addSelectColumns($c);

		$c->addJoin(CatsecPeer::CATPAR_ID, CatparPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsecPeer::getOMClass();

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
										$temp_obj2->addCatsec($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsecs();
				$obj2->addCatsec($obj1); 			}
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

		CatsecPeer::addSelectColumns($c);
		$startcol = (CatsecPeer::NUM_COLUMNS - CatsecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatmunPeer::addSelectColumns($c);

		$c->addJoin(CatsecPeer::CATMUN_ID, CatmunPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsecPeer::getOMClass();

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
										$temp_obj2->addCatsec($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsecs();
				$obj2->addCatsec($obj1); 			}
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

		CatsecPeer::addSelectColumns($c);
		$startcol = (CatsecPeer::NUM_COLUMNS - CatsecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatciuPeer::addSelectColumns($c);

		$c->addJoin(CatsecPeer::CATCIU_ID, CatciuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsecPeer::getOMClass();

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
										$temp_obj2->addCatsec($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsecs();
				$obj2->addCatsec($obj1); 			}
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

		CatsecPeer::addSelectColumns($c);
		$startcol = (CatsecPeer::NUM_COLUMNS - CatsecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatestPeer::addSelectColumns($c);

		$c->addJoin(CatsecPeer::CATEST_ID, CatestPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsecPeer::getOMClass();

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
										$temp_obj2->addCatsec($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsecs();
				$obj2->addCatsec($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsecPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsecPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsecPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatsecPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsecPeer::doSelectRS($criteria, $con);
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

		CatsecPeer::addSelectColumns($c);
		$startcol2 = (CatsecPeer::NUM_COLUMNS - CatsecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatparPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsecPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsecPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsecPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatsecPeer::CATEST_ID, CatestPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatpar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatsec($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsecs();
				$obj2->addCatsec($obj1);
			}


					
			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatmun(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatsec($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsecs();
				$obj3->addCatsec($obj1);
			}


					
			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatciu(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsec($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsecs();
				$obj4->addCatsec($obj1);
			}


					
			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatest(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatsec($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initCatsecs();
				$obj5->addCatsec($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCatpar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsecPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsecPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatsecPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsecPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsecPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsecPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatsecPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsecPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsecPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsecPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsecPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsecPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsecPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsecPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsecPeer::CATCIU_ID, CatciuPeer::ID);

		$rs = CatsecPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCatpar(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatsecPeer::addSelectColumns($c);
		$startcol2 = (CatsecPeer::NUM_COLUMNS - CatsecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatmunPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsecPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsecPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatsecPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsecPeer::getOMClass();

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
					$temp_obj2->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsecs();
				$obj2->addCatsec($obj1);
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
					$temp_obj3->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsecs();
				$obj3->addCatsec($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatest(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsecs();
				$obj4->addCatsec($obj1);
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

		CatsecPeer::addSelectColumns($c);
		$startcol2 = (CatsecPeer::NUM_COLUMNS - CatsecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatparPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatparPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsecPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsecPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatsecPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsecPeer::getOMClass();

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
					$temp_obj2->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsecs();
				$obj2->addCatsec($obj1);
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
					$temp_obj3->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsecs();
				$obj3->addCatsec($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatest(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsecs();
				$obj4->addCatsec($obj1);
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

		CatsecPeer::addSelectColumns($c);
		$startcol2 = (CatsecPeer::NUM_COLUMNS - CatsecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatparPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmunPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsecPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsecPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsecPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsecPeer::getOMClass();

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
					$temp_obj2->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsecs();
				$obj2->addCatsec($obj1);
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
					$temp_obj3->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsecs();
				$obj3->addCatsec($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatest(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsecs();
				$obj4->addCatsec($obj1);
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

		CatsecPeer::addSelectColumns($c);
		$startcol2 = (CatsecPeer::NUM_COLUMNS - CatsecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatparPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatciuPeer::NUM_COLUMNS;

		$c->addJoin(CatsecPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsecPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsecPeer::CATCIU_ID, CatciuPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsecPeer::getOMClass();

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
					$temp_obj2->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsecs();
				$obj2->addCatsec($obj1);
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
					$temp_obj3->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsecs();
				$obj3->addCatsec($obj1);
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
					$temp_obj4->addCatsec($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsecs();
				$obj4->addCatsec($obj1);
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
		return CatsecPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CatsecPeer::ID); 

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
			$comparison = $criteria->getComparison(CatsecPeer::ID);
			$selectCriteria->add(CatsecPeer::ID, $criteria->remove(CatsecPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CatsecPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CatsecPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Catsec) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CatsecPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Catsec $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CatsecPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CatsecPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CatsecPeer::DATABASE_NAME, CatsecPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CatsecPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CatsecPeer::DATABASE_NAME);

		$criteria->add(CatsecPeer::ID, $pk);


		$v = CatsecPeer::doSelect($criteria, $con);

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
			$criteria->add(CatsecPeer::ID, $pks, Criteria::IN);
			$objs = CatsecPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCatsecPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/catastro/map/CatsecMapBuilder.php';
	Propel::registerMapBuilder('lib.model.catastro.map.CatsecMapBuilder');
}
