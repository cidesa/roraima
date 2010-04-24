<?php


abstract class BaseFapresupPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fapresup';

	
	const CLASS_DEFAULT = 'lib.model.Fapresup';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPRE = 'fapresup.REFPRE';

	
	const DESPRE = 'fapresup.DESPRE';

	
	const FECPRE = 'fapresup.FECPRE';

	
	const CODCLI = 'fapresup.CODCLI';

	
	const MONPRE = 'fapresup.MONPRE';

	
	const MONDESC = 'fapresup.MONDESC';

	
	const MONRGO = 'fapresup.MONRGO';

	
	const FACONPAG_ID = 'fapresup.FACONPAG_ID';

	
	const FAFORDES_ID = 'fapresup.FAFORDES_ID';

	
	const FAFORSOL_ID = 'fapresup.FAFORSOL_ID';

	
	const TIPMON = 'fapresup.TIPMON';

	
	const VALMON = 'fapresup.VALMON';

	
	const AUTPOR = 'fapresup.AUTPOR';

	
	const OBSERV = 'fapresup.OBSERV';

	
	const CODUBI = 'fapresup.CODUBI';

	
	const ID = 'fapresup.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpre', 'Despre', 'Fecpre', 'Codcli', 'Monpre', 'Mondesc', 'Monrgo', 'FaconpagId', 'FafordesId', 'FaforsolId', 'Tipmon', 'Valmon', 'Autpor', 'Observ', 'Codubi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FapresupPeer::REFPRE, FapresupPeer::DESPRE, FapresupPeer::FECPRE, FapresupPeer::CODCLI, FapresupPeer::MONPRE, FapresupPeer::MONDESC, FapresupPeer::MONRGO, FapresupPeer::FACONPAG_ID, FapresupPeer::FAFORDES_ID, FapresupPeer::FAFORSOL_ID, FapresupPeer::TIPMON, FapresupPeer::VALMON, FapresupPeer::AUTPOR, FapresupPeer::OBSERV, FapresupPeer::CODUBI, FapresupPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpre', 'despre', 'fecpre', 'codcli', 'monpre', 'mondesc', 'monrgo', 'faconpag_id', 'fafordes_id', 'faforsol_id', 'tipmon', 'valmon', 'autpor', 'observ', 'codubi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpre' => 0, 'Despre' => 1, 'Fecpre' => 2, 'Codcli' => 3, 'Monpre' => 4, 'Mondesc' => 5, 'Monrgo' => 6, 'FaconpagId' => 7, 'FafordesId' => 8, 'FaforsolId' => 9, 'Tipmon' => 10, 'Valmon' => 11, 'Autpor' => 12, 'Observ' => 13, 'Codubi' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (FapresupPeer::REFPRE => 0, FapresupPeer::DESPRE => 1, FapresupPeer::FECPRE => 2, FapresupPeer::CODCLI => 3, FapresupPeer::MONPRE => 4, FapresupPeer::MONDESC => 5, FapresupPeer::MONRGO => 6, FapresupPeer::FACONPAG_ID => 7, FapresupPeer::FAFORDES_ID => 8, FapresupPeer::FAFORSOL_ID => 9, FapresupPeer::TIPMON => 10, FapresupPeer::VALMON => 11, FapresupPeer::AUTPOR => 12, FapresupPeer::OBSERV => 13, FapresupPeer::CODUBI => 14, FapresupPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('refpre' => 0, 'despre' => 1, 'fecpre' => 2, 'codcli' => 3, 'monpre' => 4, 'mondesc' => 5, 'monrgo' => 6, 'faconpag_id' => 7, 'fafordes_id' => 8, 'faforsol_id' => 9, 'tipmon' => 10, 'valmon' => 11, 'autpor' => 12, 'observ' => 13, 'codubi' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FapresupMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FapresupMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FapresupPeer::getTableMap();
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
		return str_replace(FapresupPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FapresupPeer::REFPRE);

		$criteria->addSelectColumn(FapresupPeer::DESPRE);

		$criteria->addSelectColumn(FapresupPeer::FECPRE);

		$criteria->addSelectColumn(FapresupPeer::CODCLI);

		$criteria->addSelectColumn(FapresupPeer::MONPRE);

		$criteria->addSelectColumn(FapresupPeer::MONDESC);

		$criteria->addSelectColumn(FapresupPeer::MONRGO);

		$criteria->addSelectColumn(FapresupPeer::FACONPAG_ID);

		$criteria->addSelectColumn(FapresupPeer::FAFORDES_ID);

		$criteria->addSelectColumn(FapresupPeer::FAFORSOL_ID);

		$criteria->addSelectColumn(FapresupPeer::TIPMON);

		$criteria->addSelectColumn(FapresupPeer::VALMON);

		$criteria->addSelectColumn(FapresupPeer::AUTPOR);

		$criteria->addSelectColumn(FapresupPeer::OBSERV);

		$criteria->addSelectColumn(FapresupPeer::CODUBI);

		$criteria->addSelectColumn(FapresupPeer::ID);

	}

	const COUNT = 'COUNT(fapresup.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fapresup.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapresupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapresupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FapresupPeer::doSelectRS($criteria, $con);
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
		$objects = FapresupPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FapresupPeer::populateObjects(FapresupPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FapresupPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FapresupPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFaconpag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapresupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapresupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FapresupPeer::FACONPAG_ID, FaconpagPeer::ID);

		$rs = FapresupPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFafordes(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapresupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapresupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FapresupPeer::FAFORDES_ID, FafordesPeer::ID);

		$rs = FapresupPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFaforsol(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapresupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapresupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FapresupPeer::FAFORSOL_ID, FaforsolPeer::ID);

		$rs = FapresupPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFaconpag(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FapresupPeer::addSelectColumns($c);
		$startcol = (FapresupPeer::NUM_COLUMNS - FapresupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FaconpagPeer::addSelectColumns($c);

		$c->addJoin(FapresupPeer::FACONPAG_ID, FaconpagPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FapresupPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaconpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFaconpag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFapresup($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFapresups();
				$obj2->addFapresup($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFafordes(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FapresupPeer::addSelectColumns($c);
		$startcol = (FapresupPeer::NUM_COLUMNS - FapresupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FafordesPeer::addSelectColumns($c);

		$c->addJoin(FapresupPeer::FAFORDES_ID, FafordesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FapresupPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FafordesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFafordes(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFapresup($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFapresups();
				$obj2->addFapresup($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFaforsol(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FapresupPeer::addSelectColumns($c);
		$startcol = (FapresupPeer::NUM_COLUMNS - FapresupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FaforsolPeer::addSelectColumns($c);

		$c->addJoin(FapresupPeer::FAFORSOL_ID, FaforsolPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FapresupPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaforsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFaforsol(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFapresup($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFapresups();
				$obj2->addFapresup($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapresupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapresupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FapresupPeer::FACONPAG_ID, FaconpagPeer::ID);

		$criteria->addJoin(FapresupPeer::FAFORDES_ID, FafordesPeer::ID);

		$criteria->addJoin(FapresupPeer::FAFORSOL_ID, FaforsolPeer::ID);

		$rs = FapresupPeer::doSelectRS($criteria, $con);
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

		FapresupPeer::addSelectColumns($c);
		$startcol2 = (FapresupPeer::NUM_COLUMNS - FapresupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FaconpagPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FaconpagPeer::NUM_COLUMNS;

		FafordesPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FafordesPeer::NUM_COLUMNS;

		FaforsolPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + FaforsolPeer::NUM_COLUMNS;

		$c->addJoin(FapresupPeer::FACONPAG_ID, FaconpagPeer::ID);

		$c->addJoin(FapresupPeer::FAFORDES_ID, FafordesPeer::ID);

		$c->addJoin(FapresupPeer::FAFORSOL_ID, FaforsolPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FapresupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = FaconpagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFaconpag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFapresup($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initFapresups();
				$obj2->addFapresup($obj1);
			}


					
			$omClass = FafordesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFafordes(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFapresup($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initFapresups();
				$obj3->addFapresup($obj1);
			}


					
			$omClass = FaforsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getFaforsol(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addFapresup($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initFapresups();
				$obj4->addFapresup($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptFaconpag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapresupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapresupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FapresupPeer::FAFORDES_ID, FafordesPeer::ID);

		$criteria->addJoin(FapresupPeer::FAFORSOL_ID, FaforsolPeer::ID);

		$rs = FapresupPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptFafordes(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapresupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapresupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FapresupPeer::FACONPAG_ID, FaconpagPeer::ID);

		$criteria->addJoin(FapresupPeer::FAFORSOL_ID, FaforsolPeer::ID);

		$rs = FapresupPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptFaforsol(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapresupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapresupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FapresupPeer::FACONPAG_ID, FaconpagPeer::ID);

		$criteria->addJoin(FapresupPeer::FAFORDES_ID, FafordesPeer::ID);

		$rs = FapresupPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptFaconpag(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FapresupPeer::addSelectColumns($c);
		$startcol2 = (FapresupPeer::NUM_COLUMNS - FapresupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FafordesPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FafordesPeer::NUM_COLUMNS;

		FaforsolPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FaforsolPeer::NUM_COLUMNS;

		$c->addJoin(FapresupPeer::FAFORDES_ID, FafordesPeer::ID);

		$c->addJoin(FapresupPeer::FAFORSOL_ID, FaforsolPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FapresupPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FafordesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFafordes(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFapresup($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initFapresups();
				$obj2->addFapresup($obj1);
			}

			$omClass = FaforsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFaforsol(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFapresup($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initFapresups();
				$obj3->addFapresup($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFafordes(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FapresupPeer::addSelectColumns($c);
		$startcol2 = (FapresupPeer::NUM_COLUMNS - FapresupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FaconpagPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FaconpagPeer::NUM_COLUMNS;

		FaforsolPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FaforsolPeer::NUM_COLUMNS;

		$c->addJoin(FapresupPeer::FACONPAG_ID, FaconpagPeer::ID);

		$c->addJoin(FapresupPeer::FAFORSOL_ID, FaforsolPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FapresupPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaconpagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFaconpag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFapresup($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initFapresups();
				$obj2->addFapresup($obj1);
			}

			$omClass = FaforsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFaforsol(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFapresup($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initFapresups();
				$obj3->addFapresup($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFaforsol(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FapresupPeer::addSelectColumns($c);
		$startcol2 = (FapresupPeer::NUM_COLUMNS - FapresupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FaconpagPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FaconpagPeer::NUM_COLUMNS;

		FafordesPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FafordesPeer::NUM_COLUMNS;

		$c->addJoin(FapresupPeer::FACONPAG_ID, FaconpagPeer::ID);

		$c->addJoin(FapresupPeer::FAFORDES_ID, FafordesPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FapresupPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaconpagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFaconpag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFapresup($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initFapresups();
				$obj2->addFapresup($obj1);
			}

			$omClass = FafordesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFafordes(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFapresup($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initFapresups();
				$obj3->addFapresup($obj1);
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
		return FapresupPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FapresupPeer::ID); 

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
			$comparison = $criteria->getComparison(FapresupPeer::ID);
			$selectCriteria->add(FapresupPeer::ID, $criteria->remove(FapresupPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FapresupPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FapresupPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fapresup) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FapresupPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fapresup $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FapresupPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FapresupPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FapresupPeer::DATABASE_NAME, FapresupPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FapresupPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FapresupPeer::DATABASE_NAME);

		$criteria->add(FapresupPeer::ID, $pk);


		$v = FapresupPeer::doSelect($criteria, $con);

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
			$criteria->add(FapresupPeer::ID, $pks, Criteria::IN);
			$objs = FapresupPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFapresupPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FapresupMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FapresupMapBuilder');
}
