<?php


abstract class BaseCcpagterPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccpagter';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccpagter';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccpagter.ID';

	
	const NOMTER = 'ccpagter.NOMTER';

	
	const RIFTER = 'ccpagter.RIFTER';

	
	const TELTER = 'ccpagter.TELTER';

	
	const CODARETEL = 'ccpagter.CODARETEL';

	
	const DIRTEL = 'ccpagter.DIRTEL';

	
	const OBSERV = 'ccpagter.OBSERV';

	
	const CCACTECO_ID = 'ccpagter.CCACTECO_ID';

	
	const CCPERPRE_ID = 'ccpagter.CCPERPRE_ID';

	
	const CCTIPUPS_ID = 'ccpagter.CCTIPUPS_ID';

	
	const CCPARROQ_ID = 'ccpagter.CCPARROQ_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomter', 'Rifter', 'Telter', 'Codaretel', 'Dirtel', 'Observ', 'CcactecoId', 'CcperpreId', 'CctipupsId', 'CcparroqId', ),
		BasePeer::TYPE_COLNAME => array (CcpagterPeer::ID, CcpagterPeer::NOMTER, CcpagterPeer::RIFTER, CcpagterPeer::TELTER, CcpagterPeer::CODARETEL, CcpagterPeer::DIRTEL, CcpagterPeer::OBSERV, CcpagterPeer::CCACTECO_ID, CcpagterPeer::CCPERPRE_ID, CcpagterPeer::CCTIPUPS_ID, CcpagterPeer::CCPARROQ_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomter', 'rifter', 'telter', 'codaretel', 'dirtel', 'observ', 'ccacteco_id', 'ccperpre_id', 'cctipups_id', 'ccparroq_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomter' => 1, 'Rifter' => 2, 'Telter' => 3, 'Codaretel' => 4, 'Dirtel' => 5, 'Observ' => 6, 'CcactecoId' => 7, 'CcperpreId' => 8, 'CctipupsId' => 9, 'CcparroqId' => 10, ),
		BasePeer::TYPE_COLNAME => array (CcpagterPeer::ID => 0, CcpagterPeer::NOMTER => 1, CcpagterPeer::RIFTER => 2, CcpagterPeer::TELTER => 3, CcpagterPeer::CODARETEL => 4, CcpagterPeer::DIRTEL => 5, CcpagterPeer::OBSERV => 6, CcpagterPeer::CCACTECO_ID => 7, CcpagterPeer::CCPERPRE_ID => 8, CcpagterPeer::CCTIPUPS_ID => 9, CcpagterPeer::CCPARROQ_ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomter' => 1, 'rifter' => 2, 'telter' => 3, 'codaretel' => 4, 'dirtel' => 5, 'observ' => 6, 'ccacteco_id' => 7, 'ccperpre_id' => 8, 'cctipups_id' => 9, 'ccparroq_id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcpagterMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcpagterMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcpagterPeer::getTableMap();
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
		return str_replace(CcpagterPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcpagterPeer::ID);

		$criteria->addSelectColumn(CcpagterPeer::NOMTER);

		$criteria->addSelectColumn(CcpagterPeer::RIFTER);

		$criteria->addSelectColumn(CcpagterPeer::TELTER);

		$criteria->addSelectColumn(CcpagterPeer::CODARETEL);

		$criteria->addSelectColumn(CcpagterPeer::DIRTEL);

		$criteria->addSelectColumn(CcpagterPeer::OBSERV);

		$criteria->addSelectColumn(CcpagterPeer::CCACTECO_ID);

		$criteria->addSelectColumn(CcpagterPeer::CCPERPRE_ID);

		$criteria->addSelectColumn(CcpagterPeer::CCTIPUPS_ID);

		$criteria->addSelectColumn(CcpagterPeer::CCPARROQ_ID);

	}

	const COUNT = 'COUNT(ccpagter.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccpagter.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagterPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagterPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcpagterPeer::doSelectRS($criteria, $con);
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
		$objects = CcpagterPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcpagterPeer::populateObjects(CcpagterPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcpagterPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcpagterPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcacteco(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagterPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagterPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcpagterPeer::CCACTECO_ID, CcactecoPeer::ID);

		$rs = CcpagterPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcperpre(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagterPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagterPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcpagterPeer::CCPERPRE_ID, CcperprePeer::ID);

		$rs = CcpagterPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCctipups(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagterPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagterPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcpagterPeer::CCTIPUPS_ID, CctipupsPeer::ID);

		$rs = CcpagterPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcparroq(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagterPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagterPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcpagterPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcpagterPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcacteco(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagterPeer::addSelectColumns($c);
		$startcol = (CcpagterPeer::NUM_COLUMNS - CcpagterPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcactecoPeer::addSelectColumns($c);

		$c->addJoin(CcpagterPeer::CCACTECO_ID, CcactecoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcactecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcacteco(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcpagter($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcpagters();
				$obj2->addCcpagter($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagterPeer::addSelectColumns($c);
		$startcol = (CcpagterPeer::NUM_COLUMNS - CcpagterPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperprePeer::addSelectColumns($c);

		$c->addJoin(CcpagterPeer::CCPERPRE_ID, CcperprePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperprePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperpre(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcpagter($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcpagters();
				$obj2->addCcpagter($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCctipups(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagterPeer::addSelectColumns($c);
		$startcol = (CcpagterPeer::NUM_COLUMNS - CcpagterPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipupsPeer::addSelectColumns($c);

		$c->addJoin(CcpagterPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipupsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipups(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcpagter($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcpagters();
				$obj2->addCcpagter($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcparroq(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagterPeer::addSelectColumns($c);
		$startcol = (CcpagterPeer::NUM_COLUMNS - CcpagterPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcpagterPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcparroqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcparroq(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcpagter($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcpagters();
				$obj2->addCcpagter($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagterPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagterPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcpagterPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$criteria->addJoin(CcpagterPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$criteria->addJoin(CcpagterPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$criteria->addJoin(CcpagterPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = CcpagterPeer::doSelectRS($criteria, $con);
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

		CcpagterPeer::addSelectColumns($c);
		$startcol2 = (CcpagterPeer::NUM_COLUMNS - CcpagterPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactecoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactecoPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcperprePeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagterPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcpagterPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcpagterPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcpagterPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcacteco(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpagter($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagters();
					$obj2->addCcpagter($obj1);
				}
	

							
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcperpre(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcpagter($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagters();
					$obj3->addCcpagter($obj1);
				}
	

							
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpagter($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagters();
					$obj4->addCcpagter($obj1);
				}
	

							
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcpagter($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcpagters();
					$obj5->addCcpagter($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcacteco(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcpagterPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcpagterPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcpagterPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcpagterPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcpagterPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcpagterPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcperpre(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcpagterPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcpagterPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcpagterPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcpagterPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcpagterPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcpagterPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCctipups(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcpagterPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcpagterPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcpagterPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcpagterPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcpagterPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcpagterPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcparroq(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcpagterPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcpagterPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcpagterPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcpagterPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcpagterPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
			$rs = CcpagterPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcacteco(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagterPeer::addSelectColumns($c);
		$startcol2 = (CcpagterPeer::NUM_COLUMNS - CcpagterPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagterPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcpagterPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcpagterPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagters();
					$obj2->addCcpagter($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipups(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagters();
					$obj3->addCcpagter($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparroq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagters();
					$obj4->addCcpagter($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagterPeer::addSelectColumns($c);
		$startcol2 = (CcpagterPeer::NUM_COLUMNS - CcpagterPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactecoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactecoPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagterPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcpagterPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcpagterPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcacteco(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagters();
					$obj2->addCcpagter($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipups(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagters();
					$obj3->addCcpagter($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparroq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagters();
					$obj4->addCcpagter($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCctipups(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagterPeer::addSelectColumns($c);
		$startcol2 = (CcpagterPeer::NUM_COLUMNS - CcpagterPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactecoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactecoPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcperprePeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagterPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcpagterPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcpagterPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcacteco(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagters();
					$obj2->addCcpagter($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcperpre(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagters();
					$obj3->addCcpagter($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparroq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagters();
					$obj4->addCcpagter($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcparroq(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagterPeer::addSelectColumns($c);
		$startcol2 = (CcpagterPeer::NUM_COLUMNS - CcpagterPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactecoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactecoPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcperprePeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagterPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcpagterPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcpagterPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcacteco(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagters();
					$obj2->addCcpagter($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcperpre(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagters();
					$obj3->addCcpagter($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpagter($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagters();
					$obj4->addCcpagter($obj1);
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
		return CcpagterPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcpagterPeer::ID); 

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
			$comparison = $criteria->getComparison(CcpagterPeer::ID);
			$selectCriteria->add(CcpagterPeer::ID, $criteria->remove(CcpagterPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcpagterPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcpagterPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccpagter) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcpagterPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccpagter $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcpagterPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcpagterPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcpagterPeer::DATABASE_NAME, CcpagterPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcpagterPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcpagterPeer::DATABASE_NAME);

		$criteria->add(CcpagterPeer::ID, $pk);


		$v = CcpagterPeer::doSelect($criteria, $con);

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
			$criteria->add(CcpagterPeer::ID, $pks, Criteria::IN);
			$objs = CcpagterPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcpagterPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcpagterMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcpagterMapBuilder');
}
