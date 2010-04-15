<?php


abstract class BaseLiregsolPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liregsol';

	
	const CLASS_DEFAULT = 'lib.model.Liregsol';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'liregsol.NUMSOL';

	
	const DESSOL = 'liregsol.DESSOL';

	
	const LIDATSTE_ID = 'liregsol.LIDATSTE_ID';

	
	const LITIPSOL_ID = 'liregsol.LITIPSOL_ID';

	
	const FECSOL = 'liregsol.FECSOL';

	
	const FECRES = 'liregsol.FECRES';

	
	const OBSSOL = 'liregsol.OBSSOL';

	
	const LICOMLIC_ID = 'liregsol.LICOMLIC_ID';

	
	const CODEMP = 'liregsol.CODEMP';

	
	const ID = 'liregsol.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Dessol', 'LidatsteId', 'LitipsolId', 'Fecsol', 'Fecres', 'Obssol', 'LicomlicId', 'Codemp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiregsolPeer::NUMSOL, LiregsolPeer::DESSOL, LiregsolPeer::LIDATSTE_ID, LiregsolPeer::LITIPSOL_ID, LiregsolPeer::FECSOL, LiregsolPeer::FECRES, LiregsolPeer::OBSSOL, LiregsolPeer::LICOMLIC_ID, LiregsolPeer::CODEMP, LiregsolPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'dessol', 'lidatste_id', 'litipsol_id', 'fecsol', 'fecres', 'obssol', 'licomlic_id', 'codemp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Dessol' => 1, 'LidatsteId' => 2, 'LitipsolId' => 3, 'Fecsol' => 4, 'Fecres' => 5, 'Obssol' => 6, 'LicomlicId' => 7, 'Codemp' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (LiregsolPeer::NUMSOL => 0, LiregsolPeer::DESSOL => 1, LiregsolPeer::LIDATSTE_ID => 2, LiregsolPeer::LITIPSOL_ID => 3, LiregsolPeer::FECSOL => 4, LiregsolPeer::FECRES => 5, LiregsolPeer::OBSSOL => 6, LiregsolPeer::LICOMLIC_ID => 7, LiregsolPeer::CODEMP => 8, LiregsolPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'dessol' => 1, 'lidatste_id' => 2, 'litipsol_id' => 3, 'fecsol' => 4, 'fecres' => 5, 'obssol' => 6, 'licomlic_id' => 7, 'codemp' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LiregsolMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LiregsolMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiregsolPeer::getTableMap();
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
		return str_replace(LiregsolPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiregsolPeer::NUMSOL);

		$criteria->addSelectColumn(LiregsolPeer::DESSOL);

		$criteria->addSelectColumn(LiregsolPeer::LIDATSTE_ID);

		$criteria->addSelectColumn(LiregsolPeer::LITIPSOL_ID);

		$criteria->addSelectColumn(LiregsolPeer::FECSOL);

		$criteria->addSelectColumn(LiregsolPeer::FECRES);

		$criteria->addSelectColumn(LiregsolPeer::OBSSOL);

		$criteria->addSelectColumn(LiregsolPeer::LICOMLIC_ID);

		$criteria->addSelectColumn(LiregsolPeer::CODEMP);

		$criteria->addSelectColumn(LiregsolPeer::ID);

	}

	const COUNT = 'COUNT(liregsol.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liregsol.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiregsolPeer::doSelectRS($criteria, $con);
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
		$objects = LiregsolPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiregsolPeer::populateObjects(LiregsolPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiregsolPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiregsolPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLidatste(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregsolPeer::LIDATSTE_ID, LidatstePeer::ID);

		$rs = LiregsolPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLitipsol(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregsolPeer::LITIPSOL_ID, LitipsolPeer::ID);

		$rs = LiregsolPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLicomlic(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregsolPeer::LICOMLIC_ID, LicomlicPeer::ID);

		$rs = LiregsolPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLidatste(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregsolPeer::addSelectColumns($c);
		$startcol = (LiregsolPeer::NUM_COLUMNS - LiregsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstePeer::addSelectColumns($c);

		$c->addJoin(LiregsolPeer::LIDATSTE_ID, LidatstePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LidatstePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLidatste(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiregsol($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregsols();
				$obj2->addLiregsol($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLitipsol(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregsolPeer::addSelectColumns($c);
		$startcol = (LiregsolPeer::NUM_COLUMNS - LiregsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LitipsolPeer::addSelectColumns($c);

		$c->addJoin(LiregsolPeer::LITIPSOL_ID, LitipsolPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitipsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLitipsol(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiregsol($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregsols();
				$obj2->addLiregsol($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLicomlic(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregsolPeer::addSelectColumns($c);
		$startcol = (LiregsolPeer::NUM_COLUMNS - LiregsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicomlicPeer::addSelectColumns($c);

		$c->addJoin(LiregsolPeer::LICOMLIC_ID, LicomlicPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LicomlicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLicomlic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiregsol($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregsols();
				$obj2->addLiregsol($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregsolPeer::LIDATSTE_ID, LidatstePeer::ID);

		$criteria->addJoin(LiregsolPeer::LITIPSOL_ID, LitipsolPeer::ID);

		$criteria->addJoin(LiregsolPeer::LICOMLIC_ID, LicomlicPeer::ID);

		$rs = LiregsolPeer::doSelectRS($criteria, $con);
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

		LiregsolPeer::addSelectColumns($c);
		$startcol2 = (LiregsolPeer::NUM_COLUMNS - LiregsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LidatstePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LidatstePeer::NUM_COLUMNS;

		LitipsolPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LitipsolPeer::NUM_COLUMNS;

		LicomlicPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LicomlicPeer::NUM_COLUMNS;

		$c->addJoin(LiregsolPeer::LIDATSTE_ID, LidatstePeer::ID);

		$c->addJoin(LiregsolPeer::LITIPSOL_ID, LitipsolPeer::ID);

		$c->addJoin(LiregsolPeer::LICOMLIC_ID, LicomlicPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = LidatstePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLidatste(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLiregsol($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initLiregsols();
				$obj2->addLiregsol($obj1);
			}


					
			$omClass = LitipsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLitipsol(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLiregsol($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initLiregsols();
				$obj3->addLiregsol($obj1);
			}


					
			$omClass = LicomlicPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLicomlic(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addLiregsol($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initLiregsols();
				$obj4->addLiregsol($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptLidatste(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregsolPeer::LITIPSOL_ID, LitipsolPeer::ID);

		$criteria->addJoin(LiregsolPeer::LICOMLIC_ID, LicomlicPeer::ID);

		$rs = LiregsolPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLitipsol(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregsolPeer::LIDATSTE_ID, LidatstePeer::ID);

		$criteria->addJoin(LiregsolPeer::LICOMLIC_ID, LicomlicPeer::ID);

		$rs = LiregsolPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLicomlic(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregsolPeer::LIDATSTE_ID, LidatstePeer::ID);

		$criteria->addJoin(LiregsolPeer::LITIPSOL_ID, LitipsolPeer::ID);

		$rs = LiregsolPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptLidatste(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregsolPeer::addSelectColumns($c);
		$startcol2 = (LiregsolPeer::NUM_COLUMNS - LiregsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LitipsolPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LitipsolPeer::NUM_COLUMNS;

		LicomlicPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LicomlicPeer::NUM_COLUMNS;

		$c->addJoin(LiregsolPeer::LITIPSOL_ID, LitipsolPeer::ID);

		$c->addJoin(LiregsolPeer::LICOMLIC_ID, LicomlicPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitipsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLitipsol(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLiregsol($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLiregsols();
				$obj2->addLiregsol($obj1);
			}

			$omClass = LicomlicPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLicomlic(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLiregsol($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initLiregsols();
				$obj3->addLiregsol($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLitipsol(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregsolPeer::addSelectColumns($c);
		$startcol2 = (LiregsolPeer::NUM_COLUMNS - LiregsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LidatstePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LidatstePeer::NUM_COLUMNS;

		LicomlicPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LicomlicPeer::NUM_COLUMNS;

		$c->addJoin(LiregsolPeer::LIDATSTE_ID, LidatstePeer::ID);

		$c->addJoin(LiregsolPeer::LICOMLIC_ID, LicomlicPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LidatstePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLidatste(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLiregsol($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLiregsols();
				$obj2->addLiregsol($obj1);
			}

			$omClass = LicomlicPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLicomlic(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLiregsol($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initLiregsols();
				$obj3->addLiregsol($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLicomlic(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregsolPeer::addSelectColumns($c);
		$startcol2 = (LiregsolPeer::NUM_COLUMNS - LiregsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LidatstePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LidatstePeer::NUM_COLUMNS;

		LitipsolPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LitipsolPeer::NUM_COLUMNS;

		$c->addJoin(LiregsolPeer::LIDATSTE_ID, LidatstePeer::ID);

		$c->addJoin(LiregsolPeer::LITIPSOL_ID, LitipsolPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LidatstePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLidatste(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLiregsol($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLiregsols();
				$obj2->addLiregsol($obj1);
			}

			$omClass = LitipsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLitipsol(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLiregsol($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initLiregsols();
				$obj3->addLiregsol($obj1);
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
		return LiregsolPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiregsolPeer::ID); 

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
			$comparison = $criteria->getComparison(LiregsolPeer::ID);
			$selectCriteria->add(LiregsolPeer::ID, $criteria->remove(LiregsolPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiregsolPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiregsolPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liregsol) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiregsolPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liregsol $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiregsolPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiregsolPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiregsolPeer::DATABASE_NAME, LiregsolPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiregsolPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiregsolPeer::DATABASE_NAME);

		$criteria->add(LiregsolPeer::ID, $pk);


		$v = LiregsolPeer::doSelect($criteria, $con);

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
			$criteria->add(LiregsolPeer::ID, $pks, Criteria::IN);
			$objs = LiregsolPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiregsolPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LiregsolMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LiregsolMapBuilder');
}
