<?php


abstract class BaseCatsubprcPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'catsubprc';

	
	const CLASS_DEFAULT = 'lib.model.catastro.Catsubprc';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'catsubprc.ID';

	
	const CATPRC_ID = 'catsubprc.CATPRC_ID';

	
	const CATMAN_ID = 'catsubprc.CATMAN_ID';

	
	const CATSEC_ID = 'catsubprc.CATSEC_ID';

	
	const CATPAR_ID = 'catsubprc.CATPAR_ID';

	
	const CATMUN_ID = 'catsubprc.CATMUN_ID';

	
	const CATCIU_ID = 'catsubprc.CATCIU_ID';

	
	const CATEST_ID = 'catsubprc.CATEST_ID';

	
	const NOMSUBPRC = 'catsubprc.NOMSUBPRC';

	
	const ALISUBPRC = 'catsubprc.ALISUBPRC';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'CatprcId', 'CatmanId', 'CatsecId', 'CatparId', 'CatmunId', 'CatciuId', 'CatestId', 'Nomsubprc', 'Alisubprc', ),
		BasePeer::TYPE_COLNAME => array (CatsubprcPeer::ID, CatsubprcPeer::CATPRC_ID, CatsubprcPeer::CATMAN_ID, CatsubprcPeer::CATSEC_ID, CatsubprcPeer::CATPAR_ID, CatsubprcPeer::CATMUN_ID, CatsubprcPeer::CATCIU_ID, CatsubprcPeer::CATEST_ID, CatsubprcPeer::NOMSUBPRC, CatsubprcPeer::ALISUBPRC, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'catprc_id', 'catman_id', 'catsec_id', 'catpar_id', 'catmun_id', 'catciu_id', 'catest_id', 'nomsubprc', 'alisubprc', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'CatprcId' => 1, 'CatmanId' => 2, 'CatsecId' => 3, 'CatparId' => 4, 'CatmunId' => 5, 'CatciuId' => 6, 'CatestId' => 7, 'Nomsubprc' => 8, 'Alisubprc' => 9, ),
		BasePeer::TYPE_COLNAME => array (CatsubprcPeer::ID => 0, CatsubprcPeer::CATPRC_ID => 1, CatsubprcPeer::CATMAN_ID => 2, CatsubprcPeer::CATSEC_ID => 3, CatsubprcPeer::CATPAR_ID => 4, CatsubprcPeer::CATMUN_ID => 5, CatsubprcPeer::CATCIU_ID => 6, CatsubprcPeer::CATEST_ID => 7, CatsubprcPeer::NOMSUBPRC => 8, CatsubprcPeer::ALISUBPRC => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'catprc_id' => 1, 'catman_id' => 2, 'catsec_id' => 3, 'catpar_id' => 4, 'catmun_id' => 5, 'catciu_id' => 6, 'catest_id' => 7, 'nomsubprc' => 8, 'alisubprc' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/catastro/map/CatsubprcMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.catastro.map.CatsubprcMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CatsubprcPeer::getTableMap();
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
		return str_replace(CatsubprcPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CatsubprcPeer::ID);

		$criteria->addSelectColumn(CatsubprcPeer::CATPRC_ID);

		$criteria->addSelectColumn(CatsubprcPeer::CATMAN_ID);

		$criteria->addSelectColumn(CatsubprcPeer::CATSEC_ID);

		$criteria->addSelectColumn(CatsubprcPeer::CATPAR_ID);

		$criteria->addSelectColumn(CatsubprcPeer::CATMUN_ID);

		$criteria->addSelectColumn(CatsubprcPeer::CATCIU_ID);

		$criteria->addSelectColumn(CatsubprcPeer::CATEST_ID);

		$criteria->addSelectColumn(CatsubprcPeer::NOMSUBPRC);

		$criteria->addSelectColumn(CatsubprcPeer::ALISUBPRC);

	}

	const COUNT = 'COUNT(catsubprc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT catsubprc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
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
		$objects = CatsubprcPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CatsubprcPeer::populateObjects(CatsubprcPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CatsubprcPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CatsubprcPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatprc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatman(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatsec(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatprc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatsubprcPeer::addSelectColumns($c);
		$startcol = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatprcPeer::addSelectColumns($c);

		$c->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatsubprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatman(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatsubprcPeer::addSelectColumns($c);
		$startcol = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatmanPeer::addSelectColumns($c);

		$c->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatman(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatsubprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatsec(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatsubprcPeer::addSelectColumns($c);
		$startcol = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatsecPeer::addSelectColumns($c);

		$c->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

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
										$temp_obj2->addCatsubprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1); 			}
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

		CatsubprcPeer::addSelectColumns($c);
		$startcol = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatparPeer::addSelectColumns($c);

		$c->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

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
										$temp_obj2->addCatsubprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1); 			}
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

		CatsubprcPeer::addSelectColumns($c);
		$startcol = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatmunPeer::addSelectColumns($c);

		$c->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

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
										$temp_obj2->addCatsubprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1); 			}
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

		CatsubprcPeer::addSelectColumns($c);
		$startcol = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatciuPeer::addSelectColumns($c);

		$c->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

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
										$temp_obj2->addCatsubprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1); 			}
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

		CatsubprcPeer::addSelectColumns($c);
		$startcol = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatestPeer::addSelectColumns($c);

		$c->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

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
										$temp_obj2->addCatsubprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
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

		CatsubprcPeer::addSelectColumns($c);
		$startcol2 = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatsubprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1);
			}


					
			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatman(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatsubprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsubprcs();
				$obj3->addCatsubprc($obj1);
			}


					
			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatsec(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsubprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsubprcs();
				$obj4->addCatsubprc($obj1);
			}


					
			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatpar(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatsubprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initCatsubprcs();
				$obj5->addCatsubprc($obj1);
			}


					
			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatmun(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatsubprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initCatsubprcs();
				$obj6->addCatsubprc($obj1);
			}


					
			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatciu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatsubprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initCatsubprcs();
				$obj7->addCatsubprc($obj1);
			}


					
			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatest(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatsubprc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initCatsubprcs();
				$obj8->addCatsubprc($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCatprc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatman(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatsec(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatsubprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatsubprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$rs = CatsubprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCatprc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatsubprcPeer::addSelectColumns($c);
		$startcol2 = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatmanPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatman(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsubprcs();
				$obj3->addCatsubprc($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsubprcs();
				$obj4->addCatsubprc($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatsubprcs();
				$obj5->addCatsubprc($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatciu(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatsubprcs();
				$obj6->addCatsubprc($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatsubprcs();
				$obj7->addCatsubprc($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatman(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatsubprcPeer::addSelectColumns($c);
		$startcol2 = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatprcPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsubprcs();
				$obj3->addCatsubprc($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsubprcs();
				$obj4->addCatsubprc($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatsubprcs();
				$obj5->addCatsubprc($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatciu(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatsubprcs();
				$obj6->addCatsubprc($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatsubprcs();
				$obj7->addCatsubprc($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatsec(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatsubprcPeer::addSelectColumns($c);
		$startcol2 = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmanPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatman(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsubprcs();
				$obj3->addCatsubprc($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsubprcs();
				$obj4->addCatsubprc($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatsubprcs();
				$obj5->addCatsubprc($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatciu(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatsubprcs();
				$obj6->addCatsubprc($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatsubprcs();
				$obj7->addCatsubprc($obj1);
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

		CatsubprcPeer::addSelectColumns($c);
		$startcol2 = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatsecPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatman(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsubprcs();
				$obj3->addCatsubprc($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatsec(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsubprcs();
				$obj4->addCatsubprc($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatsubprcs();
				$obj5->addCatsubprc($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatciu(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatsubprcs();
				$obj6->addCatsubprc($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatsubprcs();
				$obj7->addCatsubprc($obj1);
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

		CatsubprcPeer::addSelectColumns($c);
		$startcol2 = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatparPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatman(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsubprcs();
				$obj3->addCatsubprc($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatsec(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsubprcs();
				$obj4->addCatsubprc($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatpar(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatsubprcs();
				$obj5->addCatsubprc($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatciu(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatsubprcs();
				$obj6->addCatsubprc($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatsubprcs();
				$obj7->addCatsubprc($obj1);
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

		CatsubprcPeer::addSelectColumns($c);
		$startcol2 = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatmunPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		$c->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsubprcPeer::CATEST_ID, CatestPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatman(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsubprcs();
				$obj3->addCatsubprc($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatsec(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsubprcs();
				$obj4->addCatsubprc($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatpar(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatsubprcs();
				$obj5->addCatsubprc($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatmun(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatsubprcs();
				$obj6->addCatsubprc($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatsubprcs();
				$obj7->addCatsubprc($obj1);
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

		CatsubprcPeer::addSelectColumns($c);
		$startcol2 = (CatsubprcPeer::NUM_COLUMNS - CatsubprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatciuPeer::NUM_COLUMNS;

		$c->addJoin(CatsubprcPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatsubprcPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatsubprcPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatsubprcPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatsubprcPeer::CATCIU_ID, CatciuPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatsubprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatsubprcs();
				$obj2->addCatsubprc($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatman(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatsubprcs();
				$obj3->addCatsubprc($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatsec(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatsubprcs();
				$obj4->addCatsubprc($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatpar(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatsubprcs();
				$obj5->addCatsubprc($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatmun(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatsubprcs();
				$obj6->addCatsubprc($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatciu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatsubprc($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatsubprcs();
				$obj7->addCatsubprc($obj1);
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
		return CatsubprcPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CatsubprcPeer::ID); 

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
			$comparison = $criteria->getComparison(CatsubprcPeer::ID);
			$selectCriteria->add(CatsubprcPeer::ID, $criteria->remove(CatsubprcPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CatsubprcPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CatsubprcPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Catsubprc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CatsubprcPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Catsubprc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CatsubprcPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CatsubprcPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CatsubprcPeer::DATABASE_NAME, CatsubprcPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CatsubprcPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CatsubprcPeer::DATABASE_NAME);

		$criteria->add(CatsubprcPeer::ID, $pk);


		$v = CatsubprcPeer::doSelect($criteria, $con);

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
			$criteria->add(CatsubprcPeer::ID, $pks, Criteria::IN);
			$objs = CatsubprcPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCatsubprcPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/catastro/map/CatsubprcMapBuilder.php';
	Propel::registerMapBuilder('lib.model.catastro.map.CatsubprcMapBuilder');
}
