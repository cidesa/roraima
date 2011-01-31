<?php


abstract class BaseCattramoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cattramo';

	
	const CLASS_DEFAULT = 'lib.model.catastro.Cattramo';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'cattramo.ID';

	
	const CATDIVGEO_ID = 'cattramo.CATDIVGEO_ID';

	
	const NOMTRAMO = 'cattramo.NOMTRAMO';

	
	const ALITRAMO = 'cattramo.ALITRAMO';

	
	const CATTIPVIA_ID = 'cattramo.CATTIPVIA_ID';

	
	const CATSENVIA_ID = 'cattramo.CATSENVIA_ID';

	
	const CATDIRVIA_ID = 'cattramo.CATDIRVIA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'CatdivgeoId', 'Nomtramo', 'Alitramo', 'CattipviaId', 'CatsenviaId', 'CatdirviaId', ),
		BasePeer::TYPE_COLNAME => array (CattramoPeer::ID, CattramoPeer::CATDIVGEO_ID, CattramoPeer::NOMTRAMO, CattramoPeer::ALITRAMO, CattramoPeer::CATTIPVIA_ID, CattramoPeer::CATSENVIA_ID, CattramoPeer::CATDIRVIA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'catdivgeo_id', 'nomtramo', 'alitramo', 'cattipvia_id', 'catsenvia_id', 'catdirvia_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'CatdivgeoId' => 1, 'Nomtramo' => 2, 'Alitramo' => 3, 'CattipviaId' => 4, 'CatsenviaId' => 5, 'CatdirviaId' => 6, ),
		BasePeer::TYPE_COLNAME => array (CattramoPeer::ID => 0, CattramoPeer::CATDIVGEO_ID => 1, CattramoPeer::NOMTRAMO => 2, CattramoPeer::ALITRAMO => 3, CattramoPeer::CATTIPVIA_ID => 4, CattramoPeer::CATSENVIA_ID => 5, CattramoPeer::CATDIRVIA_ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'catdivgeo_id' => 1, 'nomtramo' => 2, 'alitramo' => 3, 'cattipvia_id' => 4, 'catsenvia_id' => 5, 'catdirvia_id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/catastro/map/CattramoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.catastro.map.CattramoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CattramoPeer::getTableMap();
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
		return str_replace(CattramoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CattramoPeer::ID);

		$criteria->addSelectColumn(CattramoPeer::CATDIVGEO_ID);

		$criteria->addSelectColumn(CattramoPeer::NOMTRAMO);

		$criteria->addSelectColumn(CattramoPeer::ALITRAMO);

		$criteria->addSelectColumn(CattramoPeer::CATTIPVIA_ID);

		$criteria->addSelectColumn(CattramoPeer::CATSENVIA_ID);

		$criteria->addSelectColumn(CattramoPeer::CATDIRVIA_ID);

	}

	const COUNT = 'COUNT(cattramo.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cattramo.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CattramoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CattramoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CattramoPeer::doSelectRS($criteria, $con);
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
		$objects = CattramoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CattramoPeer::populateObjects(CattramoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CattramoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CattramoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatdivgeo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CattramoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CattramoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CattramoPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$rs = CattramoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCattipvia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CattramoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CattramoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CattramoPeer::CATTIPVIA_ID, CattipviaPeer::ID);

		$rs = CattramoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatsenvia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CattramoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CattramoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CattramoPeer::CATSENVIA_ID, CatsenviaPeer::ID);

		$rs = CattramoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatdirvia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CattramoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CattramoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CattramoPeer::CATDIRVIA_ID, CatdirviaPeer::ID);

		$rs = CattramoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatdivgeo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CattramoPeer::addSelectColumns($c);
		$startcol = (CattramoPeer::NUM_COLUMNS - CattramoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatdivgeoPeer::addSelectColumns($c);

		$c->addJoin(CattramoPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatdivgeoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCattramo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCattramos();
				$obj2->addCattramo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCattipvia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CattramoPeer::addSelectColumns($c);
		$startcol = (CattramoPeer::NUM_COLUMNS - CattramoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattipviaPeer::addSelectColumns($c);

		$c->addJoin(CattramoPeer::CATTIPVIA_ID, CattipviaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattipviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattipvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCattramo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCattramos();
				$obj2->addCattramo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatsenvia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CattramoPeer::addSelectColumns($c);
		$startcol = (CattramoPeer::NUM_COLUMNS - CattramoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatsenviaPeer::addSelectColumns($c);

		$c->addJoin(CattramoPeer::CATSENVIA_ID, CatsenviaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsenviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatsenvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCattramo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCattramos();
				$obj2->addCattramo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatdirvia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CattramoPeer::addSelectColumns($c);
		$startcol = (CattramoPeer::NUM_COLUMNS - CattramoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatdirviaPeer::addSelectColumns($c);

		$c->addJoin(CattramoPeer::CATDIRVIA_ID, CatdirviaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatdirviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatdirvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCattramo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCattramos();
				$obj2->addCattramo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CattramoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CattramoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CattramoPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CattramoPeer::CATTIPVIA_ID, CattipviaPeer::ID);

		$criteria->addJoin(CattramoPeer::CATSENVIA_ID, CatsenviaPeer::ID);

		$criteria->addJoin(CattramoPeer::CATDIRVIA_ID, CatdirviaPeer::ID);

		$rs = CattramoPeer::doSelectRS($criteria, $con);
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

		CattramoPeer::addSelectColumns($c);
		$startcol2 = (CattramoPeer::NUM_COLUMNS - CattramoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatdivgeoPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CattipviaPeer::NUM_COLUMNS;

		CatsenviaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatsenviaPeer::NUM_COLUMNS;

		CatdirviaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatdirviaPeer::NUM_COLUMNS;

		$c->addJoin(CattramoPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CattramoPeer::CATTIPVIA_ID, CattipviaPeer::ID);

		$c->addJoin(CattramoPeer::CATSENVIA_ID, CatsenviaPeer::ID);

		$c->addJoin(CattramoPeer::CATDIRVIA_ID, CatdirviaPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCattramo($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCattramos();
				$obj2->addCattramo($obj1);
			}


					
			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattipvia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCattramo($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCattramos();
				$obj3->addCattramo($obj1);
			}


					
			$omClass = CatsenviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatsenvia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCattramo($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCattramos();
				$obj4->addCattramo($obj1);
			}


					
			$omClass = CatdirviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatdirvia(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCattramo($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initCattramos();
				$obj5->addCattramo($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCatdivgeo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CattramoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CattramoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CattramoPeer::CATTIPVIA_ID, CattipviaPeer::ID);

		$criteria->addJoin(CattramoPeer::CATSENVIA_ID, CatsenviaPeer::ID);

		$criteria->addJoin(CattramoPeer::CATDIRVIA_ID, CatdirviaPeer::ID);

		$rs = CattramoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattipvia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CattramoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CattramoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CattramoPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CattramoPeer::CATSENVIA_ID, CatsenviaPeer::ID);

		$criteria->addJoin(CattramoPeer::CATDIRVIA_ID, CatdirviaPeer::ID);

		$rs = CattramoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatsenvia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CattramoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CattramoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CattramoPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CattramoPeer::CATTIPVIA_ID, CattipviaPeer::ID);

		$criteria->addJoin(CattramoPeer::CATDIRVIA_ID, CatdirviaPeer::ID);

		$rs = CattramoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatdirvia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CattramoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CattramoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CattramoPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CattramoPeer::CATTIPVIA_ID, CattipviaPeer::ID);

		$criteria->addJoin(CattramoPeer::CATSENVIA_ID, CatsenviaPeer::ID);

		$rs = CattramoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCatdivgeo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CattramoPeer::addSelectColumns($c);
		$startcol2 = (CattramoPeer::NUM_COLUMNS - CattramoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CattipviaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CattipviaPeer::NUM_COLUMNS;

		CatsenviaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsenviaPeer::NUM_COLUMNS;

		CatdirviaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatdirviaPeer::NUM_COLUMNS;

		$c->addJoin(CattramoPeer::CATTIPVIA_ID, CattipviaPeer::ID);

		$c->addJoin(CattramoPeer::CATSENVIA_ID, CatsenviaPeer::ID);

		$c->addJoin(CattramoPeer::CATDIRVIA_ID, CatdirviaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCattipvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCattramos();
				$obj2->addCattramo($obj1);
			}

			$omClass = CatsenviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsenvia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCattramos();
				$obj3->addCattramo($obj1);
			}

			$omClass = CatdirviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatdirvia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCattramos();
				$obj4->addCattramo($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattipvia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CattramoPeer::addSelectColumns($c);
		$startcol2 = (CattramoPeer::NUM_COLUMNS - CattramoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatdivgeoPeer::NUM_COLUMNS;

		CatsenviaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsenviaPeer::NUM_COLUMNS;

		CatdirviaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatdirviaPeer::NUM_COLUMNS;

		$c->addJoin(CattramoPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CattramoPeer::CATSENVIA_ID, CatsenviaPeer::ID);

		$c->addJoin(CattramoPeer::CATDIRVIA_ID, CatdirviaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCattramos();
				$obj2->addCattramo($obj1);
			}

			$omClass = CatsenviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsenvia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCattramos();
				$obj3->addCattramo($obj1);
			}

			$omClass = CatdirviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatdirvia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCattramos();
				$obj4->addCattramo($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatsenvia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CattramoPeer::addSelectColumns($c);
		$startcol2 = (CattramoPeer::NUM_COLUMNS - CattramoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatdivgeoPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CattipviaPeer::NUM_COLUMNS;

		CatdirviaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatdirviaPeer::NUM_COLUMNS;

		$c->addJoin(CattramoPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CattramoPeer::CATTIPVIA_ID, CattipviaPeer::ID);

		$c->addJoin(CattramoPeer::CATDIRVIA_ID, CatdirviaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCattramos();
				$obj2->addCattramo($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattipvia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCattramos();
				$obj3->addCattramo($obj1);
			}

			$omClass = CatdirviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatdirvia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCattramos();
				$obj4->addCattramo($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatdirvia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CattramoPeer::addSelectColumns($c);
		$startcol2 = (CattramoPeer::NUM_COLUMNS - CattramoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatdivgeoPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CattipviaPeer::NUM_COLUMNS;

		CatsenviaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatsenviaPeer::NUM_COLUMNS;

		$c->addJoin(CattramoPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CattramoPeer::CATTIPVIA_ID, CattipviaPeer::ID);

		$c->addJoin(CattramoPeer::CATSENVIA_ID, CatsenviaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCattramos();
				$obj2->addCattramo($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattipvia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCattramos();
				$obj3->addCattramo($obj1);
			}

			$omClass = CatsenviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatsenvia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCattramo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCattramos();
				$obj4->addCattramo($obj1);
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
		return CattramoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CattramoPeer::ID); 

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
			$comparison = $criteria->getComparison(CattramoPeer::ID);
			$selectCriteria->add(CattramoPeer::ID, $criteria->remove(CattramoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CattramoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CattramoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cattramo) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CattramoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cattramo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CattramoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CattramoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CattramoPeer::DATABASE_NAME, CattramoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CattramoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CattramoPeer::DATABASE_NAME);

		$criteria->add(CattramoPeer::ID, $pk);


		$v = CattramoPeer::doSelect($criteria, $con);

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
			$criteria->add(CattramoPeer::ID, $pks, Criteria::IN);
			$objs = CattramoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCattramoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/catastro/map/CattramoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.catastro.map.CattramoMapBuilder');
}
