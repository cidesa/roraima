<?php


abstract class BaseAtdetestPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atdetest';

	
	const CLASS_DEFAULT = 'lib.model.ciudadanos.Atdetest';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ATAYUDAS_ID = 'atdetest.ATAYUDAS_ID';

	
	const ATESTAYU_DESDE = 'atdetest.ATESTAYU_DESDE';

	
	const ATESTAYU_HASTA = 'atdetest.ATESTAYU_HASTA';

	
	const USUARIO = 'atdetest.USUARIO';

	
	const CREATED_AT = 'atdetest.CREATED_AT';

	
	const ID = 'atdetest.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId', 'AtestayuDesde', 'AtestayuHasta', 'Usuario', 'CreatedAt', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtdetestPeer::ATAYUDAS_ID, AtdetestPeer::ATESTAYU_DESDE, AtdetestPeer::ATESTAYU_HASTA, AtdetestPeer::USUARIO, AtdetestPeer::CREATED_AT, AtdetestPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id', 'atestayu_desde', 'atestayu_hasta', 'usuario', 'created_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId' => 0, 'AtestayuDesde' => 1, 'AtestayuHasta' => 2, 'Usuario' => 3, 'CreatedAt' => 4, 'Id' => 5, ),
		BasePeer::TYPE_COLNAME => array (AtdetestPeer::ATAYUDAS_ID => 0, AtdetestPeer::ATESTAYU_DESDE => 1, AtdetestPeer::ATESTAYU_HASTA => 2, AtdetestPeer::USUARIO => 3, AtdetestPeer::CREATED_AT => 4, AtdetestPeer::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id' => 0, 'atestayu_desde' => 1, 'atestayu_hasta' => 2, 'usuario' => 3, 'created_at' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/ciudadanos/map/AtdetestMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.ciudadanos.map.AtdetestMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtdetestPeer::getTableMap();
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
		return str_replace(AtdetestPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtdetestPeer::ATAYUDAS_ID);

		$criteria->addSelectColumn(AtdetestPeer::ATESTAYU_DESDE);

		$criteria->addSelectColumn(AtdetestPeer::ATESTAYU_HASTA);

		$criteria->addSelectColumn(AtdetestPeer::USUARIO);

		$criteria->addSelectColumn(AtdetestPeer::CREATED_AT);

		$criteria->addSelectColumn(AtdetestPeer::ID);

	}

	const COUNT = 'COUNT(atdetest.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atdetest.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdetestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdetestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtdetestPeer::doSelectRS($criteria, $con);
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
		$objects = AtdetestPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtdetestPeer::populateObjects(AtdetestPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtdetestPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtdetestPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAtayudas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdetestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdetestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtdetestPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$rs = AtdetestPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtestayuRelatedByAtestayuDesde(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdetestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdetestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtdetestPeer::ATESTAYU_DESDE, AtestayuPeer::ID);

		$rs = AtdetestPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtestayuRelatedByAtestayuHasta(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdetestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdetestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtdetestPeer::ATESTAYU_HASTA, AtestayuPeer::ID);

		$rs = AtdetestPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAtayudas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdetestPeer::addSelectColumns($c);
		$startcol = (AtdetestPeer::NUM_COLUMNS - AtdetestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtayudasPeer::addSelectColumns($c);

		$c->addJoin(AtdetestPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtayudas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtdetest($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtdetests();
				$obj2->addAtdetest($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtestayuRelatedByAtestayuDesde(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdetestPeer::addSelectColumns($c);
		$startcol = (AtdetestPeer::NUM_COLUMNS - AtdetestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtestayuPeer::addSelectColumns($c);

		$c->addJoin(AtdetestPeer::ATESTAYU_DESDE, AtestayuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtestayuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtestayuRelatedByAtestayuDesde(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtdetestRelatedByAtestayuDesde($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtdetestsRelatedByAtestayuDesde();
				$obj2->addAtdetestRelatedByAtestayuDesde($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtestayuRelatedByAtestayuHasta(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdetestPeer::addSelectColumns($c);
		$startcol = (AtdetestPeer::NUM_COLUMNS - AtdetestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtestayuPeer::addSelectColumns($c);

		$c->addJoin(AtdetestPeer::ATESTAYU_HASTA, AtestayuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtestayuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtestayuRelatedByAtestayuHasta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtdetestRelatedByAtestayuHasta($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtdetestsRelatedByAtestayuHasta();
				$obj2->addAtdetestRelatedByAtestayuHasta($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdetestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdetestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(AtdetestPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$criteria->addJoin(AtdetestPeer::ATESTAYU_DESDE, AtestayuPeer::ID);
	
			$criteria->addJoin(AtdetestPeer::ATESTAYU_HASTA, AtestayuPeer::ID);
	
		$rs = AtdetestPeer::doSelectRS($criteria, $con);
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

		AtdetestPeer::addSelectColumns($c);
		$startcol2 = (AtdetestPeer::NUM_COLUMNS - AtdetestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			AtestayuPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtestayuPeer::NUM_COLUMNS;
	
			AtestayuPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AtestayuPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdetestPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$c->addJoin(AtdetestPeer::ATESTAYU_DESDE, AtestayuPeer::ID);
	
			$c->addJoin(AtdetestPeer::ATESTAYU_HASTA, AtestayuPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdetest($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdetests();
					$obj2->addAtdetest($obj1);
				}
	

							
				$omClass = AtestayuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtestayuRelatedByAtestayuDesde(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtdetestRelatedByAtestayuDesde($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initAtdetestsRelatedByAtestayuDesde();
					$obj3->addAtdetestRelatedByAtestayuDesde($obj1);
				}
	

							
				$omClass = AtestayuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAtestayuRelatedByAtestayuHasta(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtdetestRelatedByAtestayuHasta($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initAtdetestsRelatedByAtestayuHasta();
					$obj4->addAtdetestRelatedByAtestayuHasta($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptAtayudas(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtdetestPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtdetestPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtdetestPeer::ATESTAYU_DESDE, AtestayuPeer::ID);
		
				$criteria->addJoin(AtdetestPeer::ATESTAYU_HASTA, AtestayuPeer::ID);
		
			$rs = AtdetestPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtestayuRelatedByAtestayuDesde(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtdetestPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtdetestPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtdetestPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
			$rs = AtdetestPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtestayuRelatedByAtestayuHasta(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtdetestPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtdetestPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtdetestPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
			$rs = AtdetestPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptAtayudas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdetestPeer::addSelectColumns($c);
		$startcol2 = (AtdetestPeer::NUM_COLUMNS - AtdetestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtestayuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtestayuPeer::NUM_COLUMNS;
	
			AtestayuPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtestayuPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdetestPeer::ATESTAYU_DESDE, AtestayuPeer::ID);
	
			$c->addJoin(AtdetestPeer::ATESTAYU_HASTA, AtestayuPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtestayuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtestayuRelatedByAtestayuDesde(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdetestRelatedByAtestayuDesde($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdetestsRelatedByAtestayuDesde();
					$obj2->addAtdetestRelatedByAtestayuDesde($obj1);
				}
	
				$omClass = AtestayuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtestayuRelatedByAtestayuHasta(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtdetestRelatedByAtestayuHasta($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtdetestsRelatedByAtestayuHasta();
					$obj3->addAtdetestRelatedByAtestayuHasta($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtestayuRelatedByAtestayuDesde(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdetestPeer::addSelectColumns($c);
		$startcol2 = (AtdetestPeer::NUM_COLUMNS - AtdetestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdetestPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdetest($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdetests();
					$obj2->addAtdetest($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtestayuRelatedByAtestayuHasta(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdetestPeer::addSelectColumns($c);
		$startcol2 = (AtdetestPeer::NUM_COLUMNS - AtdetestPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdetestPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdetest($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdetests();
					$obj2->addAtdetest($obj1);
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
		return AtdetestPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtdetestPeer::ID); 

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
			$comparison = $criteria->getComparison(AtdetestPeer::ID);
			$selectCriteria->add(AtdetestPeer::ID, $criteria->remove(AtdetestPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtdetestPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtdetestPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atdetest) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtdetestPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atdetest $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtdetestPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtdetestPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtdetestPeer::DATABASE_NAME, AtdetestPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtdetestPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtdetestPeer::DATABASE_NAME);

		$criteria->add(AtdetestPeer::ID, $pk);


		$v = AtdetestPeer::doSelect($criteria, $con);

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
			$criteria->add(AtdetestPeer::ID, $pks, Criteria::IN);
			$objs = AtdetestPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtdetestPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/ciudadanos/map/AtdetestMapBuilder.php';
	Propel::registerMapBuilder('lib.model.ciudadanos.map.AtdetestMapBuilder');
}
