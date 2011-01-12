<?php


abstract class BaseCcactanaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccactana';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccactana';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccactana.ID';

	
	const OBSERV = 'ccactana.OBSERV';

	
	const FECASI = 'ccactana.FECASI';

	
	const FECCUL = 'ccactana.FECCUL';

	
	const NOMACT = 'ccactana.NOMACT';

	
	const DESACT = 'ccactana.DESACT';

	
	const RESACT = 'ccactana.RESACT';

	
	const ESTATU = 'ccactana.ESTATU';

	
	const CCACTIVI_ID = 'ccactana.CCACTIVI_ID';

	
	const CCCLAACT_ID = 'ccactana.CCCLAACT_ID';

	
	const CCANALIS_ID = 'ccactana.CCANALIS_ID';

	
	const CCCREDIT_ID = 'ccactana.CCCREDIT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Observ', 'Fecasi', 'Feccul', 'Nomact', 'Desact', 'Resact', 'Estatu', 'CcactiviId', 'CcclaactId', 'CcanalisId', 'CccreditId', ),
		BasePeer::TYPE_COLNAME => array (CcactanaPeer::ID, CcactanaPeer::OBSERV, CcactanaPeer::FECASI, CcactanaPeer::FECCUL, CcactanaPeer::NOMACT, CcactanaPeer::DESACT, CcactanaPeer::RESACT, CcactanaPeer::ESTATU, CcactanaPeer::CCACTIVI_ID, CcactanaPeer::CCCLAACT_ID, CcactanaPeer::CCANALIS_ID, CcactanaPeer::CCCREDIT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'observ', 'fecasi', 'feccul', 'nomact', 'desact', 'resact', 'estatu', 'ccactivi_id', 'ccclaact_id', 'ccanalis_id', 'cccredit_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Observ' => 1, 'Fecasi' => 2, 'Feccul' => 3, 'Nomact' => 4, 'Desact' => 5, 'Resact' => 6, 'Estatu' => 7, 'CcactiviId' => 8, 'CcclaactId' => 9, 'CcanalisId' => 10, 'CccreditId' => 11, ),
		BasePeer::TYPE_COLNAME => array (CcactanaPeer::ID => 0, CcactanaPeer::OBSERV => 1, CcactanaPeer::FECASI => 2, CcactanaPeer::FECCUL => 3, CcactanaPeer::NOMACT => 4, CcactanaPeer::DESACT => 5, CcactanaPeer::RESACT => 6, CcactanaPeer::ESTATU => 7, CcactanaPeer::CCACTIVI_ID => 8, CcactanaPeer::CCCLAACT_ID => 9, CcactanaPeer::CCANALIS_ID => 10, CcactanaPeer::CCCREDIT_ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'observ' => 1, 'fecasi' => 2, 'feccul' => 3, 'nomact' => 4, 'desact' => 5, 'resact' => 6, 'estatu' => 7, 'ccactivi_id' => 8, 'ccclaact_id' => 9, 'ccanalis_id' => 10, 'cccredit_id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcactanaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcactanaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcactanaPeer::getTableMap();
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
		return str_replace(CcactanaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcactanaPeer::ID);

		$criteria->addSelectColumn(CcactanaPeer::OBSERV);

		$criteria->addSelectColumn(CcactanaPeer::FECASI);

		$criteria->addSelectColumn(CcactanaPeer::FECCUL);

		$criteria->addSelectColumn(CcactanaPeer::NOMACT);

		$criteria->addSelectColumn(CcactanaPeer::DESACT);

		$criteria->addSelectColumn(CcactanaPeer::RESACT);

		$criteria->addSelectColumn(CcactanaPeer::ESTATU);

		$criteria->addSelectColumn(CcactanaPeer::CCACTIVI_ID);

		$criteria->addSelectColumn(CcactanaPeer::CCCLAACT_ID);

		$criteria->addSelectColumn(CcactanaPeer::CCANALIS_ID);

		$criteria->addSelectColumn(CcactanaPeer::CCCREDIT_ID);

	}

	const COUNT = 'COUNT(ccactana.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccactana.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcactanaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcactanaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcactanaPeer::doSelectRS($criteria, $con);
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
		$objects = CcactanaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcactanaPeer::populateObjects(CcactanaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcactanaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcactanaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcactivi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcactanaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcactanaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcactanaPeer::CCACTIVI_ID, CcactiviPeer::ID);

		$rs = CcactanaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcclaact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcactanaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcactanaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcactanaPeer::CCCLAACT_ID, CcclaactPeer::ID);

		$rs = CcactanaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcanalis(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcactanaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcactanaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcactanaPeer::CCANALIS_ID, CcanalisPeer::ID);

		$rs = CcactanaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccredit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcactanaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcactanaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcactanaPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcactanaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcactivi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcactanaPeer::addSelectColumns($c);
		$startcol = (CcactanaPeer::NUM_COLUMNS - CcactanaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcactiviPeer::addSelectColumns($c);

		$c->addJoin(CcactanaPeer::CCACTIVI_ID, CcactiviPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactanaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcactiviPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcactivi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcactana($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcactanas();
				$obj2->addCcactana($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcclaact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcactanaPeer::addSelectColumns($c);
		$startcol = (CcactanaPeer::NUM_COLUMNS - CcactanaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcclaactPeer::addSelectColumns($c);

		$c->addJoin(CcactanaPeer::CCCLAACT_ID, CcclaactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactanaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcclaactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcclaact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcactana($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcactanas();
				$obj2->addCcactana($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcanalis(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcactanaPeer::addSelectColumns($c);
		$startcol = (CcactanaPeer::NUM_COLUMNS - CcactanaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcanalisPeer::addSelectColumns($c);

		$c->addJoin(CcactanaPeer::CCANALIS_ID, CcanalisPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactanaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcanalisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcanalis(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcactana($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcactanas();
				$obj2->addCcactana($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcactanaPeer::addSelectColumns($c);
		$startcol = (CcactanaPeer::NUM_COLUMNS - CcactanaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcactanaPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactanaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccredit(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcactana($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcactanas();
				$obj2->addCcactana($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcactanaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcactanaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcactanaPeer::CCACTIVI_ID, CcactiviPeer::ID);
	
			$criteria->addJoin(CcactanaPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$criteria->addJoin(CcactanaPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$criteria->addJoin(CcactanaPeer::CCCREDIT_ID, CccreditPeer::ID);
	
		$rs = CcactanaPeer::doSelectRS($criteria, $con);
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

		CcactanaPeer::addSelectColumns($c);
		$startcol2 = (CcactanaPeer::NUM_COLUMNS - CcactanaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactiviPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactiviPeer::NUM_COLUMNS;
	
			CcclaactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclaactPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcanalisPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcactanaPeer::CCACTIVI_ID, CcactiviPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCCREDIT_ID, CccreditPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactanaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcactiviPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcactivi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcactana($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcactanas();
					$obj2->addCcactana($obj1);
				}
	

							
				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclaact(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcactana($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcactanas();
					$obj3->addCcactana($obj1);
				}
	

							
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcanalis(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcactana($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcactanas();
					$obj4->addCcactana($obj1);
				}
	

							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccredit(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcactana($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcactanas();
					$obj5->addCcactana($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcactivi(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcactanaPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcactanaPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcactanaPeer::CCCLAACT_ID, CcclaactPeer::ID);
		
				$criteria->addJoin(CcactanaPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcactanaPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcactanaPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcclaact(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcactanaPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcactanaPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcactanaPeer::CCACTIVI_ID, CcactiviPeer::ID);
		
				$criteria->addJoin(CcactanaPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcactanaPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcactanaPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcanalis(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcactanaPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcactanaPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcactanaPeer::CCACTIVI_ID, CcactiviPeer::ID);
		
				$criteria->addJoin(CcactanaPeer::CCCLAACT_ID, CcclaactPeer::ID);
		
				$criteria->addJoin(CcactanaPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcactanaPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccredit(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcactanaPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcactanaPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcactanaPeer::CCACTIVI_ID, CcactiviPeer::ID);
		
				$criteria->addJoin(CcactanaPeer::CCCLAACT_ID, CcclaactPeer::ID);
		
				$criteria->addJoin(CcactanaPeer::CCANALIS_ID, CcanalisPeer::ID);
		
			$rs = CcactanaPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcactivi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcactanaPeer::addSelectColumns($c);
		$startcol2 = (CcactanaPeer::NUM_COLUMNS - CcactanaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcclaactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcclaactPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcanalisPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcactanaPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactanaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcclaact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcactanas();
					$obj2->addCcactana($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcanalis(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcactanas();
					$obj3->addCcactana($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcactanas();
					$obj4->addCcactana($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcclaact(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcactanaPeer::addSelectColumns($c);
		$startcol2 = (CcactanaPeer::NUM_COLUMNS - CcactanaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactiviPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactiviPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcanalisPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcactanaPeer::CCACTIVI_ID, CcactiviPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactanaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcactiviPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcactivi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcactanas();
					$obj2->addCcactana($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcanalis(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcactanas();
					$obj3->addCcactana($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcactanas();
					$obj4->addCcactana($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcanalis(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcactanaPeer::addSelectColumns($c);
		$startcol2 = (CcactanaPeer::NUM_COLUMNS - CcactanaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactiviPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactiviPeer::NUM_COLUMNS;
	
			CcclaactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclaactPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcactanaPeer::CCACTIVI_ID, CcactiviPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactanaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcactiviPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcactivi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcactanas();
					$obj2->addCcactana($obj1);
				}
	
				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclaact(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcactanas();
					$obj3->addCcactana($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcactanas();
					$obj4->addCcactana($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcactanaPeer::addSelectColumns($c);
		$startcol2 = (CcactanaPeer::NUM_COLUMNS - CcactanaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactiviPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactiviPeer::NUM_COLUMNS;
	
			CcclaactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclaactPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcanalisPeer::NUM_COLUMNS;
	
			$c->addJoin(CcactanaPeer::CCACTIVI_ID, CcactiviPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcactanaPeer::CCANALIS_ID, CcanalisPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactanaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcactiviPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcactivi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcactanas();
					$obj2->addCcactana($obj1);
				}
	
				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclaact(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcactanas();
					$obj3->addCcactana($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcanalis(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcactana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcactanas();
					$obj4->addCcactana($obj1);
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
		return CcactanaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcactanaPeer::ID); 

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
			$comparison = $criteria->getComparison(CcactanaPeer::ID);
			$selectCriteria->add(CcactanaPeer::ID, $criteria->remove(CcactanaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcactanaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcactanaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccactana) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcactanaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccactana $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcactanaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcactanaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcactanaPeer::DATABASE_NAME, CcactanaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcactanaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcactanaPeer::DATABASE_NAME);

		$criteria->add(CcactanaPeer::ID, $pk);


		$v = CcactanaPeer::doSelect($criteria, $con);

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
			$criteria->add(CcactanaPeer::ID, $pks, Criteria::IN);
			$objs = CcactanaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcactanaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcactanaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcactanaMapBuilder');
}
