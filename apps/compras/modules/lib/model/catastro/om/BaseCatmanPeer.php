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

	
	const CATTRAMONOR_ID = 'catman.CATTRAMONOR_ID';

	
	const TIPLINNOR_ID = 'catman.TIPLINNOR_ID';

	
	const CATTRAMOSUR_ID = 'catman.CATTRAMOSUR_ID';

	
	const TIPLINSUR_ID = 'catman.TIPLINSUR_ID';

	
	const CATTRAMOEST_ID = 'catman.CATTRAMOEST_ID';

	
	const TIPLINEST_ID = 'catman.TIPLINEST_ID';

	
	const CATTRAMOOES_ID = 'catman.CATTRAMOOES_ID';

	
	const TIPLINOES_ID = 'catman.TIPLINOES_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'CatdivgeoId', 'Nomman', 'Aliman', 'CattramonorId', 'TiplinnorId', 'CattramosurId', 'TiplinsurId', 'CattramoestId', 'TiplinestId', 'CattramooesId', 'TiplinoesId', ),
		BasePeer::TYPE_COLNAME => array (CatmanPeer::ID, CatmanPeer::CATDIVGEO_ID, CatmanPeer::NOMMAN, CatmanPeer::ALIMAN, CatmanPeer::CATTRAMONOR_ID, CatmanPeer::TIPLINNOR_ID, CatmanPeer::CATTRAMOSUR_ID, CatmanPeer::TIPLINSUR_ID, CatmanPeer::CATTRAMOEST_ID, CatmanPeer::TIPLINEST_ID, CatmanPeer::CATTRAMOOES_ID, CatmanPeer::TIPLINOES_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'catdivgeo_id', 'nomman', 'aliman', 'cattramonor_id', 'tiplinnor_id', 'cattramosur_id', 'tiplinsur_id', 'cattramoest_id', 'tiplinest_id', 'cattramooes_id', 'tiplinoes_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'CatdivgeoId' => 1, 'Nomman' => 2, 'Aliman' => 3, 'CattramonorId' => 4, 'TiplinnorId' => 5, 'CattramosurId' => 6, 'TiplinsurId' => 7, 'CattramoestId' => 8, 'TiplinestId' => 9, 'CattramooesId' => 10, 'TiplinoesId' => 11, ),
		BasePeer::TYPE_COLNAME => array (CatmanPeer::ID => 0, CatmanPeer::CATDIVGEO_ID => 1, CatmanPeer::NOMMAN => 2, CatmanPeer::ALIMAN => 3, CatmanPeer::CATTRAMONOR_ID => 4, CatmanPeer::TIPLINNOR_ID => 5, CatmanPeer::CATTRAMOSUR_ID => 6, CatmanPeer::TIPLINSUR_ID => 7, CatmanPeer::CATTRAMOEST_ID => 8, CatmanPeer::TIPLINEST_ID => 9, CatmanPeer::CATTRAMOOES_ID => 10, CatmanPeer::TIPLINOES_ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'catdivgeo_id' => 1, 'nomman' => 2, 'aliman' => 3, 'cattramonor_id' => 4, 'tiplinnor_id' => 5, 'cattramosur_id' => 6, 'tiplinsur_id' => 7, 'cattramoest_id' => 8, 'tiplinest_id' => 9, 'cattramooes_id' => 10, 'tiplinoes_id' => 11, ),
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

		$criteria->addSelectColumn(CatmanPeer::CATTRAMONOR_ID);

		$criteria->addSelectColumn(CatmanPeer::TIPLINNOR_ID);

		$criteria->addSelectColumn(CatmanPeer::CATTRAMOSUR_ID);

		$criteria->addSelectColumn(CatmanPeer::TIPLINSUR_ID);

		$criteria->addSelectColumn(CatmanPeer::CATTRAMOEST_ID);

		$criteria->addSelectColumn(CatmanPeer::TIPLINEST_ID);

		$criteria->addSelectColumn(CatmanPeer::CATTRAMOOES_ID);

		$criteria->addSelectColumn(CatmanPeer::TIPLINOES_ID);

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


	
	public static function doCountJoinCattipviaRelatedByTiplinnorId(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

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


	
	public static function doCountJoinCattipviaRelatedByTiplinsurId(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

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


	
	public static function doCountJoinCattipviaRelatedByTiplinestId(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

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


	
	public static function doCountJoinCattipviaRelatedByTiplinoesId(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);

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


	
	public static function doSelectJoinCattipviaRelatedByTiplinnorId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattipviaPeer::addSelectColumns($c);

		$c->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattipviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattipviaRelatedByTiplinnorId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatmanRelatedByTiplinnorId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatmansRelatedByTiplinnorId();
				$obj2->addCatmanRelatedByTiplinnorId($obj1); 			}
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


	
	public static function doSelectJoinCattipviaRelatedByTiplinsurId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattipviaPeer::addSelectColumns($c);

		$c->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattipviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattipviaRelatedByTiplinsurId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatmanRelatedByTiplinsurId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatmansRelatedByTiplinsurId();
				$obj2->addCatmanRelatedByTiplinsurId($obj1); 			}
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


	
	public static function doSelectJoinCattipviaRelatedByTiplinestId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattipviaPeer::addSelectColumns($c);

		$c->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattipviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattipviaRelatedByTiplinestId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatmanRelatedByTiplinestId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatmansRelatedByTiplinestId();
				$obj2->addCatmanRelatedByTiplinestId($obj1); 			}
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


	
	public static function doSelectJoinCattipviaRelatedByTiplinoesId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatmanPeer::addSelectColumns($c);
		$startcol = (CatmanPeer::NUM_COLUMNS - CatmanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattipviaPeer::addSelectColumns($c);

		$c->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattipviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattipviaRelatedByTiplinoesId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatmanRelatedByTiplinoesId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatmansRelatedByTiplinoesId();
				$obj2->addCatmanRelatedByTiplinoesId($obj1); 			}
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

		$criteria->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOSUR_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOEST_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOOES_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);

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

		CattipviaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CattipviaPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CattramoPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CattipviaPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CattramoPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CattipviaPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CattramoPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattipviaPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMONOR_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOSUR_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOEST_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOOES_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);

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


					
			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattipviaRelatedByTiplinnorId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByTiplinnorId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByTiplinnorId();
				$obj4->addCatmanRelatedByTiplinnorId($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattramoRelatedByCattramosurId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByCattramosurId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByCattramosurId();
				$obj5->addCatmanRelatedByCattramosurId($obj1);
			}


					
			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattipviaRelatedByTiplinsurId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByTiplinsurId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initCatmansRelatedByTiplinsurId();
				$obj6->addCatmanRelatedByTiplinsurId($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCattramoRelatedByCattramoestId(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatmanRelatedByCattramoestId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initCatmansRelatedByCattramoestId();
				$obj7->addCatmanRelatedByCattramoestId($obj1);
			}


					
			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCattipviaRelatedByTiplinestId(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatmanRelatedByTiplinestId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initCatmansRelatedByTiplinestId();
				$obj8->addCatmanRelatedByTiplinestId($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9 = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCattramoRelatedByCattramooesId(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatmanRelatedByCattramooesId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj9->initCatmansRelatedByCattramooesId();
				$obj9->addCatmanRelatedByCattramooesId($obj1);
			}


					
			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10 = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattipviaRelatedByTiplinoesId(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatmanRelatedByTiplinoesId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj10->initCatmansRelatedByTiplinoesId();
				$obj10->addCatmanRelatedByTiplinoesId($obj1);
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

		$criteria->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOSUR_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOEST_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::CATTRAMOOES_ID, CattramoPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);

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

		$criteria->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattipviaRelatedByTiplinnorId(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattipviaRelatedByTiplinsurId(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattipviaRelatedByTiplinestId(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$criteria->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);

		$rs = CatmanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattipviaRelatedByTiplinoesId(Criteria $criteria, $distinct = false, $con = null)
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

		CattipviaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CattipviaPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CattramoPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CattipviaPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CattramoPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CattipviaPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CattramoPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CattipviaPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATTRAMONOR_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOSUR_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOEST_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::CATTRAMOOES_ID, CattramoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);


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

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattipviaRelatedByTiplinnorId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByTiplinnorId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByTiplinnorId();
				$obj3->addCatmanRelatedByTiplinnorId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattramoRelatedByCattramosurId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByCattramosurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByCattramosurId();
				$obj4->addCatmanRelatedByCattramosurId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattipviaRelatedByTiplinsurId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByTiplinsurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByTiplinsurId();
				$obj5->addCatmanRelatedByTiplinsurId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattramoRelatedByCattramoestId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByCattramoestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatmansRelatedByCattramoestId();
				$obj6->addCatmanRelatedByCattramoestId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCattipviaRelatedByTiplinestId(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatmanRelatedByTiplinestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatmansRelatedByTiplinestId();
				$obj7->addCatmanRelatedByTiplinestId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCattramoRelatedByCattramooesId(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatmanRelatedByCattramooesId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatmansRelatedByCattramooesId();
				$obj8->addCatmanRelatedByCattramooesId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCattipviaRelatedByTiplinoesId(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatmanRelatedByTiplinoesId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatmansRelatedByTiplinoesId();
				$obj9->addCatmanRelatedByTiplinoesId($obj1);
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

		CattipviaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CattipviaPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);


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

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattipviaRelatedByTiplinnorId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByTiplinnorId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByTiplinnorId();
				$obj3->addCatmanRelatedByTiplinnorId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattipviaRelatedByTiplinsurId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByTiplinsurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByTiplinsurId();
				$obj4->addCatmanRelatedByTiplinsurId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattipviaRelatedByTiplinestId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByTiplinestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByTiplinestId();
				$obj5->addCatmanRelatedByTiplinestId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattipviaRelatedByTiplinoesId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByTiplinoesId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatmansRelatedByTiplinoesId();
				$obj6->addCatmanRelatedByTiplinoesId($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattipviaRelatedByTiplinnorId(Criteria $c, $con = null)
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

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattramoRelatedByCattramonorId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByCattramonorId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByCattramonorId();
				$obj3->addCatmanRelatedByCattramonorId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattramoRelatedByCattramosurId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByCattramosurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByCattramosurId();
				$obj4->addCatmanRelatedByCattramosurId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattramoRelatedByCattramoestId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByCattramoestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByCattramoestId();
				$obj5->addCatmanRelatedByCattramoestId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattramoRelatedByCattramooesId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByCattramooesId($obj1);
					break;
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

		CattipviaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CattipviaPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);


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

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattipviaRelatedByTiplinnorId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByTiplinnorId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByTiplinnorId();
				$obj3->addCatmanRelatedByTiplinnorId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattipviaRelatedByTiplinsurId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByTiplinsurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByTiplinsurId();
				$obj4->addCatmanRelatedByTiplinsurId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattipviaRelatedByTiplinestId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByTiplinestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByTiplinestId();
				$obj5->addCatmanRelatedByTiplinestId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattipviaRelatedByTiplinoesId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByTiplinoesId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatmansRelatedByTiplinoesId();
				$obj6->addCatmanRelatedByTiplinoesId($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattipviaRelatedByTiplinsurId(Criteria $c, $con = null)
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

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattramoRelatedByCattramonorId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByCattramonorId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByCattramonorId();
				$obj3->addCatmanRelatedByCattramonorId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattramoRelatedByCattramosurId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByCattramosurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByCattramosurId();
				$obj4->addCatmanRelatedByCattramosurId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattramoRelatedByCattramoestId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByCattramoestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByCattramoestId();
				$obj5->addCatmanRelatedByCattramoestId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattramoRelatedByCattramooesId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByCattramooesId($obj1);
					break;
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

		CattipviaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CattipviaPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);


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

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattipviaRelatedByTiplinnorId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByTiplinnorId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByTiplinnorId();
				$obj3->addCatmanRelatedByTiplinnorId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattipviaRelatedByTiplinsurId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByTiplinsurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByTiplinsurId();
				$obj4->addCatmanRelatedByTiplinsurId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattipviaRelatedByTiplinestId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByTiplinestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByTiplinestId();
				$obj5->addCatmanRelatedByTiplinestId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattipviaRelatedByTiplinoesId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByTiplinoesId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatmansRelatedByTiplinoesId();
				$obj6->addCatmanRelatedByTiplinoesId($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattipviaRelatedByTiplinestId(Criteria $c, $con = null)
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

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattramoRelatedByCattramonorId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByCattramonorId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByCattramonorId();
				$obj3->addCatmanRelatedByCattramonorId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattramoRelatedByCattramosurId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByCattramosurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByCattramosurId();
				$obj4->addCatmanRelatedByCattramosurId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattramoRelatedByCattramoestId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByCattramoestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByCattramoestId();
				$obj5->addCatmanRelatedByCattramoestId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattramoRelatedByCattramooesId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByCattramooesId($obj1);
					break;
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

		CattipviaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CattipviaPeer::NUM_COLUMNS;

		CattipviaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CattipviaPeer::NUM_COLUMNS;

		$c->addJoin(CatmanPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINNOR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINSUR_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINEST_ID, CattipviaPeer::ID);

		$c->addJoin(CatmanPeer::TIPLINOES_ID, CattipviaPeer::ID);


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

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattipviaRelatedByTiplinnorId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByTiplinnorId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByTiplinnorId();
				$obj3->addCatmanRelatedByTiplinnorId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattipviaRelatedByTiplinsurId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByTiplinsurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByTiplinsurId();
				$obj4->addCatmanRelatedByTiplinsurId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattipviaRelatedByTiplinestId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByTiplinestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByTiplinestId();
				$obj5->addCatmanRelatedByTiplinestId($obj1);
			}

			$omClass = CattipviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattipviaRelatedByTiplinoesId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByTiplinoesId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatmansRelatedByTiplinoesId();
				$obj6->addCatmanRelatedByTiplinoesId($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattipviaRelatedByTiplinoesId(Criteria $c, $con = null)
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

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCattramoRelatedByCattramonorId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatmanRelatedByCattramonorId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatmansRelatedByCattramonorId();
				$obj3->addCatmanRelatedByCattramonorId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCattramoRelatedByCattramosurId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatmanRelatedByCattramosurId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatmansRelatedByCattramosurId();
				$obj4->addCatmanRelatedByCattramosurId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCattramoRelatedByCattramoestId(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatmanRelatedByCattramoestId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatmansRelatedByCattramoestId();
				$obj5->addCatmanRelatedByCattramoestId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCattramoRelatedByCattramooesId(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatmanRelatedByCattramooesId($obj1);
					break;
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
