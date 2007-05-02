<?php


abstract class BaseFcbansalPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcbansal';

	
	const CLASS_DEFAULT = 'lib.model.Fcbansal';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODDOC = 'fcbansal.CODDOC';

	
	const CODFUN = 'fcbansal.CODFUN';

	
	const CODENTEXT = 'fcbansal.CODENTEXT';

	
	const CODTIPDOC = 'fcbansal.CODTIPDOC';

	
	const FECDOC = 'fcbansal.FECDOC';

	
	const HORDOC = 'fcbansal.HORDOC';

	
	const ASUNTO = 'fcbansal.ASUNTO';

	
	const CODUBIFIS = 'fcbansal.CODUBIFIS';

	
	const FECUBIFIS = 'fcbansal.FECUBIFIS';

	
	const HORUBIFIS = 'fcbansal.HORUBIFIS';

	
	const CODUBIMAG = 'fcbansal.CODUBIMAG';

	
	const FECUBIMAG = 'fcbansal.FECUBIMAG';

	
	const HORUBIMAG = 'fcbansal.HORUBIMAG';

	
	const ID = 'fcbansal.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Coddoc', 'Codfun', 'Codentext', 'Codtipdoc', 'Fecdoc', 'Hordoc', 'Asunto', 'Codubifis', 'Fecubifis', 'Horubifis', 'Codubimag', 'Fecubimag', 'Horubimag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcbansalPeer::CODDOC, FcbansalPeer::CODFUN, FcbansalPeer::CODENTEXT, FcbansalPeer::CODTIPDOC, FcbansalPeer::FECDOC, FcbansalPeer::HORDOC, FcbansalPeer::ASUNTO, FcbansalPeer::CODUBIFIS, FcbansalPeer::FECUBIFIS, FcbansalPeer::HORUBIFIS, FcbansalPeer::CODUBIMAG, FcbansalPeer::FECUBIMAG, FcbansalPeer::HORUBIMAG, FcbansalPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('coddoc', 'codfun', 'codentext', 'codtipdoc', 'fecdoc', 'hordoc', 'asunto', 'codubifis', 'fecubifis', 'horubifis', 'codubimag', 'fecubimag', 'horubimag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Coddoc' => 0, 'Codfun' => 1, 'Codentext' => 2, 'Codtipdoc' => 3, 'Fecdoc' => 4, 'Hordoc' => 5, 'Asunto' => 6, 'Codubifis' => 7, 'Fecubifis' => 8, 'Horubifis' => 9, 'Codubimag' => 10, 'Fecubimag' => 11, 'Horubimag' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (FcbansalPeer::CODDOC => 0, FcbansalPeer::CODFUN => 1, FcbansalPeer::CODENTEXT => 2, FcbansalPeer::CODTIPDOC => 3, FcbansalPeer::FECDOC => 4, FcbansalPeer::HORDOC => 5, FcbansalPeer::ASUNTO => 6, FcbansalPeer::CODUBIFIS => 7, FcbansalPeer::FECUBIFIS => 8, FcbansalPeer::HORUBIFIS => 9, FcbansalPeer::CODUBIMAG => 10, FcbansalPeer::FECUBIMAG => 11, FcbansalPeer::HORUBIMAG => 12, FcbansalPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('coddoc' => 0, 'codfun' => 1, 'codentext' => 2, 'codtipdoc' => 3, 'fecdoc' => 4, 'hordoc' => 5, 'asunto' => 6, 'codubifis' => 7, 'fecubifis' => 8, 'horubifis' => 9, 'codubimag' => 10, 'fecubimag' => 11, 'horubimag' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcbansalMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcbansalMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcbansalPeer::getTableMap();
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
		return str_replace(FcbansalPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcbansalPeer::CODDOC);

		$criteria->addSelectColumn(FcbansalPeer::CODFUN);

		$criteria->addSelectColumn(FcbansalPeer::CODENTEXT);

		$criteria->addSelectColumn(FcbansalPeer::CODTIPDOC);

		$criteria->addSelectColumn(FcbansalPeer::FECDOC);

		$criteria->addSelectColumn(FcbansalPeer::HORDOC);

		$criteria->addSelectColumn(FcbansalPeer::ASUNTO);

		$criteria->addSelectColumn(FcbansalPeer::CODUBIFIS);

		$criteria->addSelectColumn(FcbansalPeer::FECUBIFIS);

		$criteria->addSelectColumn(FcbansalPeer::HORUBIFIS);

		$criteria->addSelectColumn(FcbansalPeer::CODUBIMAG);

		$criteria->addSelectColumn(FcbansalPeer::FECUBIMAG);

		$criteria->addSelectColumn(FcbansalPeer::HORUBIMAG);

		$criteria->addSelectColumn(FcbansalPeer::ID);

	}

	const COUNT = 'COUNT(fcbansal.CODDOC)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcbansal.CODDOC)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
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
		$objects = FcbansalPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcbansalPeer::populateObjects(FcbansalPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcbansalPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcbansalPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFcdeffun(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFcdefentext(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFcdeftipdoc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFcdefubifis(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFcdefubimag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFcdeffun(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcbansalPeer::addSelectColumns($c);
		$startcol = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcdeffunPeer::addSelectColumns($c);

		$c->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcdeffunPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcdeffun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcbansal($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFcdefentext(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcbansalPeer::addSelectColumns($c);
		$startcol = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcdefentextPeer::addSelectColumns($c);

		$c->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcdefentextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcdefentext(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcbansal($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFcdeftipdoc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcbansalPeer::addSelectColumns($c);
		$startcol = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcdeftipdocPeer::addSelectColumns($c);

		$c->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcdeftipdocPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcdeftipdoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcbansal($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFcdefubifis(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcbansalPeer::addSelectColumns($c);
		$startcol = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcdefubifisPeer::addSelectColumns($c);

		$c->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcdefubifisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcdefubifis(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcbansal($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFcdefubimag(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcbansalPeer::addSelectColumns($c);
		$startcol = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcdefubimagPeer::addSelectColumns($c);

		$c->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcdefubimagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcdefubimag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcbansal($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$criteria->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$criteria->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$criteria->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);

		$criteria->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
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

		FcbansalPeer::addSelectColumns($c);
		$startcol2 = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FcdeffunPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FcdeffunPeer::NUM_COLUMNS;

		FcdefentextPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FcdefentextPeer::NUM_COLUMNS;

		FcdeftipdocPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + FcdeftipdocPeer::NUM_COLUMNS;

		FcdefubifisPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + FcdefubifisPeer::NUM_COLUMNS;

		FcdefubimagPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + FcdefubimagPeer::NUM_COLUMNS;

		$c->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$c->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$c->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$c->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);

		$c->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = FcdeffunPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFcdeffun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcbansal($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1);
			}

				
					
			$omClass = FcdefentextPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFcdefentext(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFcbansal($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj3->initFcbansals();
				$obj3->addFcbansal($obj1);
			}

				
					
			$omClass = FcdeftipdocPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getFcdeftipdoc(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addFcbansal($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj4->initFcbansals();
				$obj4->addFcbansal($obj1);
			}

				
					
			$omClass = FcdefubifisPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getFcdefubifis(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addFcbansal($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj5->initFcbansals();
				$obj5->addFcbansal($obj1);
			}

				
					
			$omClass = FcdefubimagPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getFcdefubimag(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addFcbansal($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj6->initFcbansals();
				$obj6->addFcbansal($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptFcdeffun(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$criteria->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$criteria->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);

		$criteria->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptFcdefentext(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$criteria->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$criteria->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);

		$criteria->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptFcdeftipdoc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$criteria->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$criteria->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);

		$criteria->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptFcdefubifis(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$criteria->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$criteria->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$criteria->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptFcdefubimag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$criteria->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$criteria->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$criteria->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptFcdeffun(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcbansalPeer::addSelectColumns($c);
		$startcol2 = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FcdefentextPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FcdefentextPeer::NUM_COLUMNS;

		FcdeftipdocPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FcdeftipdocPeer::NUM_COLUMNS;

		FcdefubifisPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + FcdefubifisPeer::NUM_COLUMNS;

		FcdefubimagPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + FcdefubimagPeer::NUM_COLUMNS;

		$c->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$c->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$c->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);

		$c->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = FcdefentextPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFcdefentext(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1);
			}

			$omClass = FcdeftipdocPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFcdeftipdoc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initFcbansals();
				$obj3->addFcbansal($obj1);
			}

			$omClass = FcdefubifisPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getFcdefubifis(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initFcbansals();
				$obj4->addFcbansal($obj1);
			}

			$omClass = FcdefubimagPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getFcdefubimag(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initFcbansals();
				$obj5->addFcbansal($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFcdefentext(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcbansalPeer::addSelectColumns($c);
		$startcol2 = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FcdeffunPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FcdeffunPeer::NUM_COLUMNS;

		FcdeftipdocPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FcdeftipdocPeer::NUM_COLUMNS;

		FcdefubifisPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + FcdefubifisPeer::NUM_COLUMNS;

		FcdefubimagPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + FcdefubimagPeer::NUM_COLUMNS;

		$c->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$c->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$c->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);

		$c->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = FcdeffunPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFcdeffun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1);
			}

			$omClass = FcdeftipdocPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFcdeftipdoc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initFcbansals();
				$obj3->addFcbansal($obj1);
			}

			$omClass = FcdefubifisPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getFcdefubifis(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initFcbansals();
				$obj4->addFcbansal($obj1);
			}

			$omClass = FcdefubimagPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getFcdefubimag(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initFcbansals();
				$obj5->addFcbansal($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFcdeftipdoc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcbansalPeer::addSelectColumns($c);
		$startcol2 = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FcdeffunPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FcdeffunPeer::NUM_COLUMNS;

		FcdefentextPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FcdefentextPeer::NUM_COLUMNS;

		FcdefubifisPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + FcdefubifisPeer::NUM_COLUMNS;

		FcdefubimagPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + FcdefubimagPeer::NUM_COLUMNS;

		$c->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$c->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$c->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);

		$c->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = FcdeffunPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFcdeffun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1);
			}

			$omClass = FcdefentextPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFcdefentext(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initFcbansals();
				$obj3->addFcbansal($obj1);
			}

			$omClass = FcdefubifisPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getFcdefubifis(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initFcbansals();
				$obj4->addFcbansal($obj1);
			}

			$omClass = FcdefubimagPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getFcdefubimag(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initFcbansals();
				$obj5->addFcbansal($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFcdefubifis(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcbansalPeer::addSelectColumns($c);
		$startcol2 = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FcdeffunPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FcdeffunPeer::NUM_COLUMNS;

		FcdefentextPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FcdefentextPeer::NUM_COLUMNS;

		FcdeftipdocPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + FcdeftipdocPeer::NUM_COLUMNS;

		FcdefubimagPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + FcdefubimagPeer::NUM_COLUMNS;

		$c->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$c->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$c->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$c->addJoin(FcbansalPeer::CODUBIMAG, FcdefubimagPeer::CODUBIMAG);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = FcdeffunPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFcdeffun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1);
			}

			$omClass = FcdefentextPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFcdefentext(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initFcbansals();
				$obj3->addFcbansal($obj1);
			}

			$omClass = FcdeftipdocPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getFcdeftipdoc(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initFcbansals();
				$obj4->addFcbansal($obj1);
			}

			$omClass = FcdefubimagPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getFcdefubimag(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initFcbansals();
				$obj5->addFcbansal($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFcdefubimag(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcbansalPeer::addSelectColumns($c);
		$startcol2 = (FcbansalPeer::NUM_COLUMNS - FcbansalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FcdeffunPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FcdeffunPeer::NUM_COLUMNS;

		FcdefentextPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FcdefentextPeer::NUM_COLUMNS;

		FcdeftipdocPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + FcdeftipdocPeer::NUM_COLUMNS;

		FcdefubifisPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + FcdefubifisPeer::NUM_COLUMNS;

		$c->addJoin(FcbansalPeer::CODFUN, FcdeffunPeer::CODFUN);

		$c->addJoin(FcbansalPeer::CODENTEXT, FcdefentextPeer::CODENTEXT);

		$c->addJoin(FcbansalPeer::CODTIPDOC, FcdeftipdocPeer::CODTIPDOC);

		$c->addJoin(FcbansalPeer::CODUBIFIS, FcdefubifisPeer::CODUBIFIS);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcbansalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = FcdeffunPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFcdeffun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcbansals();
				$obj2->addFcbansal($obj1);
			}

			$omClass = FcdefentextPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFcdefentext(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initFcbansals();
				$obj3->addFcbansal($obj1);
			}

			$omClass = FcdeftipdocPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getFcdeftipdoc(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj4->initFcbansals();
				$obj4->addFcbansal($obj1);
			}

			$omClass = FcdefubifisPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getFcdefubifis(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addFcbansal($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj5->initFcbansals();
				$obj5->addFcbansal($obj1);
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
		return FcbansalPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(FcbansalPeer::CODDOC);
			$selectCriteria->add(FcbansalPeer::CODDOC, $criteria->remove(FcbansalPeer::CODDOC), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcbansalPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcbansalPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcbansal) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcbansalPeer::CODDOC, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcbansal $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcbansalPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcbansalPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcbansalPeer::DATABASE_NAME, FcbansalPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcbansalPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcbansalPeer::DATABASE_NAME);

		$criteria->add(FcbansalPeer::CODDOC, $pk);


		$v = FcbansalPeer::doSelect($criteria, $con);

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
			$criteria->add(FcbansalPeer::CODDOC, $pks, Criteria::IN);
			$objs = FcbansalPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcbansalPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcbansalMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcbansalMapBuilder');
}
