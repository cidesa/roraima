<?php


abstract class BaseCatmanPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'catman';

	
	const CLASS_DEFAULT = 'lib.model.catastro.Catman';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'catman.ID';

	
	const CATDIVGEO_ID = 'catman.CATDIVGEO_ID';

	
	const NOMMAN = 'catman.NOMMAN';

	
	const ALIMAN = 'catman.ALIMAN';

	
	const TIPLINNOR = 'catman.TIPLINNOR';

	
	const CATTRAMONOR_ID = 'catman.CATTRAMONOR_ID';

	
	const TIPLINSUR = 'catman.TIPLINSUR';

	
	const CATTRAMOSUR_ID = 'catman.CATTRAMOSUR_ID';

	
	const TIPLINEST = 'catman.TIPLINEST';

	
	const CATTRAMOEST_ID = 'catman.CATTRAMOEST_ID';

	
	const TIPLINOES = 'catman.TIPLINOES';

	
	const CATTRAMOOES_ID = 'catman.CATTRAMOOES_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'CatdivgeoId', 'Nomman', 'Aliman', 'Tiplinnor', 'CattramonorId', 'Tiplinsur', 'CattramosurId', 'Tiplinest', 'CattramoestId', 'Tiplinoes', 'CattramooesId', ),
		BasePeer::TYPE_COLNAME => array (CatmanPeer::ID, CatmanPeer::CATDIVGEO_ID, CatmanPeer::NOMMAN, CatmanPeer::ALIMAN, CatmanPeer::TIPLINNOR, CatmanPeer::CATTRAMONOR_ID, CatmanPeer::TIPLINSUR, CatmanPeer::CATTRAMOSUR_ID, CatmanPeer::TIPLINEST, CatmanPeer::CATTRAMOEST_ID, CatmanPeer::TIPLINOES, CatmanPeer::CATTRAMOOES_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'catdivgeo_id', 'nomman', 'aliman', 'tiplinnor', 'cattramonor_id', 'tiplinsur', 'cattramosur_id', 'tiplinest', 'cattramoest_id', 'tiplinoes', 'cattramooes_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'CatdivgeoId' => 1, 'Nomman' => 2, 'Aliman' => 3, 'Tiplinnor' => 4, 'CattramonorId' => 5, 'Tiplinsur' => 6, 'CattramosurId' => 7, 'Tiplinest' => 8, 'CattramoestId' => 9, 'Tiplinoes' => 10, 'CattramooesId' => 11, ),
		BasePeer::TYPE_COLNAME => array (CatmanPeer::ID => 0, CatmanPeer::CATDIVGEO_ID => 1, CatmanPeer::NOMMAN => 2, CatmanPeer::ALIMAN => 3, CatmanPeer::TIPLINNOR => 4, CatmanPeer::CATTRAMONOR_ID => 5, CatmanPeer::TIPLINSUR => 6, CatmanPeer::CATTRAMOSUR_ID => 7, CatmanPeer::TIPLINEST => 8, CatmanPeer::CATTRAMOEST_ID => 9, CatmanPeer::TIPLINOES => 10, CatmanPeer::CATTRAMOOES_ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'catdivgeo_id' => 1, 'nomman' => 2, 'aliman' => 3, 'tiplinnor' => 4, 'cattramonor_id' => 5, 'tiplinsur' => 6, 'cattramosur_id' => 7, 'tiplinest' => 8, 'cattramoest_id' => 9, 'tiplinoes' => 10, 'cattramooes_id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/catastro/map/CatmanMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.catastro.map.CatmanMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CatmanPeer::getTableMap();
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
		return str_replace(CatmanPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CatmanPeer::ID);

		$criteria->addSelectColumn(CatmanPeer::CATDIVGEO_ID);

		$criteria->addSelectColumn(CatmanPeer::NOMMAN);

		$criteria->addSelectColumn(CatmanPeer::ALIMAN);

		$criteria->addSelectColumn(CatmanPeer::TIPLINNOR);

		$criteria->addSelectColumn(CatmanPeer::CATTRAMONOR_ID);

		$criteria->addSelectColumn(CatmanPeer::TIPLINSUR);

		$criteria->addSelectColumn(CatmanPeer::CATTRAMOSUR_ID);

		$criteria->addSelectColumn(CatmanPeer::TIPLINEST);

		$criteria->addSelectColumn(CatmanPeer::CATTRAMOEST_ID);

		$criteria->addSelectColumn(CatmanPeer::TIPLINOES);

		$criteria->addSelectColumn(CatmanPeer::CATTRAMOOES_ID);

	}

	const COUNT = 'COUNT(catman.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT catman.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CatmanPeer::doSelectRS($criteria, $con);
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
		$objects = CatmanPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CatmanPeer::populateObjects(CatmanPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CatmanPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CatmanPeer::getOMClass();
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
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCattramoRelatedByCattramonorId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATTRAMONOR_ID, CattramoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCattramoRelatedByCattramosurId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATTRAMOSUR_ID, CattramoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCattramoRelatedByCattramoestId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATTRAMOEST_ID, CattramoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCattramoRelatedByCattramooesId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATTRAMOOES_ID, CattramoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
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

		CatmanPeer::addSelectColumns($c);
		$startcol = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatdivgeoPeer::addSelectColumns($c);

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

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
										$temp_obj2->addCatman($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatmans();
				$obj2->addCatman($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCattramoRelatedByCattramonorId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattramoPeer::addSelectColumns($c);

		$c->addJoin(CatmanPeer::CATTRAMONOR_ID, CattramoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattramoRelatedByCattramonorId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatmanRelatedByCattramonorId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatmansRelatedByCattramonorId();
				$obj2->addCatmanRelatedByCattramonorId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCattramoRelatedByCattramosurId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattramoPeer::addSelectColumns($c);

		$c->addJoin(CatmanPeer::CATTRAMOSUR_ID, CattramoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattramoRelatedByCattramosurId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatmanRelatedByCattramosurId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatmansRelatedByCattramosurId();
				$obj2->addCatmanRelatedByCattramosurId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCattramoRelatedByCattramoestId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattramoPeer::addSelectColumns($c);

		$c->addJoin(CatmanPeer::CATTRAMOEST_ID, CattramoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattramoRelatedByCattramoestId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatmanRelatedByCattramoestId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatmansRelatedByCattramoestId();
				$obj2->addCatmanRelatedByCattramoestId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCattramoRelatedByCattramooesId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattramoPeer::addSelectColumns($c);

		$c->addJoin(CatmanPeer::CATTRAMOOES_ID, CattramoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattramoRelatedByCattramooesId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatmanRelatedByCattramooesId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatmansRelatedByCattramooesId();
				$obj2->addCatmanRelatedByCattramooesId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMONOR_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOSUR_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOEST_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOOES_ID, CattramoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
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

		CatmanPeer::addSelectColumns($c);
		$startcol2 = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatdivgeoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CattramoPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMONOR_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOSUR_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOEST_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOOES_ID, CattramoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();


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
					$temp_obj2->addCatman($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCatmans();
				$obj2->addCatman($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattramoRelatedByCattramonorId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByCattramonorId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByCattramonorId();
				$obj3->addCatmanRelatedByCattramonorId($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattramoRelatedByCattramosurId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByCattramosurId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByCattramosurId();
				$obj4->addCatmanRelatedByCattramosurId($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattramoRelatedByCattramoestId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByCattramoestId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByCattramoestId();
				$obj5->addCatmanRelatedByCattramoestId($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattramoRelatedByCattramooesId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByCattramooesId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initCatmansRelatedByCattramooesId();
				$obj6->addCatmanRelatedByCattramooesId($obj1);
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
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATTRAMONOR_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOSUR_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOEST_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOOES_ID, CattramoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattramoRelatedByCattramonorId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattramoRelatedByCattramosurId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattramoRelatedByCattramoestId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattramoRelatedByCattramooesId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatmanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatmanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
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

		CatmanPeer::addSelectColumns($c);
		$startcol2 = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CattramoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CattramoPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATTRAMONOR_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOSUR_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOEST_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOOES_ID, CattramoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCattramoRelatedByCattramonorId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatmanRelatedByCattramonorId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatmansRelatedByCattramonorId();
				$obj2->addCatmanRelatedByCattramonorId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattramoRelatedByCattramosurId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByCattramosurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByCattramosurId();
				$obj3->addCatmanRelatedByCattramosurId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattramoRelatedByCattramoestId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByCattramoestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByCattramoestId();
				$obj4->addCatmanRelatedByCattramoestId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattramoRelatedByCattramooesId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByCattramooesId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByCattramooesId();
				$obj5->addCatmanRelatedByCattramooesId($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattramoRelatedByCattramonorId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol2 = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatdivgeoPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

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
					$temp_obj2->addCatman($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatmans();
				$obj2->addCatman($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattramoRelatedByCattramosurId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol2 = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatdivgeoPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

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
					$temp_obj2->addCatman($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatmans();
				$obj2->addCatman($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattramoRelatedByCattramoestId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol2 = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatdivgeoPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

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
					$temp_obj2->addCatman($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatmans();
				$obj2->addCatman($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattramoRelatedByCattramooesId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol2 = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatdivgeoPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

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
					$temp_obj2->addCatman($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatmans();
				$obj2->addCatman($obj1);
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
		return CatmanPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CatmanPeer::ID); 

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
			$comparison = $criteria->getComparison(CatmanPeer::ID);
			$selectCriteria->add(CatmanPeer::ID, $criteria->remove(CatmanPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CatmanPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CatmanPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Catman) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CatmanPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Catman $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CatmanPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CatmanPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CatmanPeer::DATABASE_NAME, CatmanPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CatmanPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CatmanPeer::DATABASE_NAME);

		$criteria->add(CatmanPeer::ID, $pk);


		$v = CatmanPeer::doSelect($criteria, $con);

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
			$criteria->add(CatmanPeer::ID, $pks, Criteria::IN);
			$objs = CatmanPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCatmanPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/catastro/map/CatmanMapBuilder.php';
	Propel::registerMapBuilder('lib.model.catastro.map.CatmanMapBuilder');
}
