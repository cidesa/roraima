<?php


abstract class BaseCcparsolPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccparsol';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccparsol';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccparsol.ID';

	
	const MONTO = 'ccparsol.MONTO';

	
	const CCPARTID_ID = 'ccparsol.CCPARTID_ID';

	
	const CCSOLICI_ID = 'ccparsol.CCSOLICI_ID';

	
	const CCCONCEP_ID = 'ccparsol.CCCONCEP_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Monto', 'CcpartidId', 'CcsoliciId', 'CcconcepId', ),
		BasePeer::TYPE_COLNAME => array (CcparsolPeer::ID, CcparsolPeer::MONTO, CcparsolPeer::CCPARTID_ID, CcparsolPeer::CCSOLICI_ID, CcparsolPeer::CCCONCEP_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'monto', 'ccpartid_id', 'ccsolici_id', 'ccconcep_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Monto' => 1, 'CcpartidId' => 2, 'CcsoliciId' => 3, 'CcconcepId' => 4, ),
		BasePeer::TYPE_COLNAME => array (CcparsolPeer::ID => 0, CcparsolPeer::MONTO => 1, CcparsolPeer::CCPARTID_ID => 2, CcparsolPeer::CCSOLICI_ID => 3, CcparsolPeer::CCCONCEP_ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'monto' => 1, 'ccpartid_id' => 2, 'ccsolici_id' => 3, 'ccconcep_id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcparsolMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcparsolMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcparsolPeer::getTableMap();
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
		return str_replace(CcparsolPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcparsolPeer::ID);

		$criteria->addSelectColumn(CcparsolPeer::MONTO);

		$criteria->addSelectColumn(CcparsolPeer::CCPARTID_ID);

		$criteria->addSelectColumn(CcparsolPeer::CCSOLICI_ID);

		$criteria->addSelectColumn(CcparsolPeer::CCCONCEP_ID);

	}

	const COUNT = 'COUNT(ccparsol.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccparsol.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcparsolPeer::doSelectRS($criteria, $con);
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
		$objects = CcparsolPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcparsolPeer::populateObjects(CcparsolPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcparsolPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcparsolPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcpartid(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcparsolPeer::CCPARTID_ID, CcpartidPeer::ID);

		$rs = CcparsolPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcsolici(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcparsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);

		$rs = CcparsolPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcconcep(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcparsolPeer::CCCONCEP_ID, CcconcepPeer::ID);

		$rs = CcparsolPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcpartid(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparsolPeer::addSelectColumns($c);
		$startcol = (CcparsolPeer::NUM_COLUMNS - CcparsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpartidPeer::addSelectColumns($c);

		$c->addJoin(CcparsolPeer::CCPARTID_ID, CcpartidPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcpartidPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcpartid(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcparsol($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcparsols();
				$obj2->addCcparsol($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcsolici(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparsolPeer::addSelectColumns($c);
		$startcol = (CcparsolPeer::NUM_COLUMNS - CcparsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoliciPeer::addSelectColumns($c);

		$c->addJoin(CcparsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcsolici(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcparsol($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcparsols();
				$obj2->addCcparsol($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcconcep(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparsolPeer::addSelectColumns($c);
		$startcol = (CcparsolPeer::NUM_COLUMNS - CcparsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcconcepPeer::addSelectColumns($c);

		$c->addJoin(CcparsolPeer::CCCONCEP_ID, CcconcepPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcconcepPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcconcep(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcparsol($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcparsols();
				$obj2->addCcparsol($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcparsolPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$criteria->addJoin(CcparsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$criteria->addJoin(CcparsolPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
		$rs = CcparsolPeer::doSelectRS($criteria, $con);
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

		CcparsolPeer::addSelectColumns($c);
		$startcol2 = (CcparsolPeer::NUM_COLUMNS - CcparsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpartidPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpartidPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcconcepPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparsolPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcparsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcparsolPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpartid(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparsol($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparsols();
					$obj2->addCcparsol($obj1);
				}
	

							
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcsolici(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparsol($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparsols();
					$obj3->addCcparsol($obj1);
				}
	

							
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcconcep(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcparsol($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcparsols();
					$obj4->addCcparsol($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcpartid(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcparsolPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcparsolPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcparsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcparsolPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
			$rs = CcparsolPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcsolici(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcparsolPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcparsolPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcparsolPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcparsolPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
			$rs = CcparsolPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcconcep(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcparsolPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcparsolPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcparsolPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcparsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
			$rs = CcparsolPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcpartid(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparsolPeer::addSelectColumns($c);
		$startcol2 = (CcparsolPeer::NUM_COLUMNS - CcparsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcconcepPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcparsolPeer::CCCONCEP_ID, CcconcepPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcsolici(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparsols();
					$obj2->addCcparsol($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcconcep(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparsols();
					$obj3->addCcparsol($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcsolici(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparsolPeer::addSelectColumns($c);
		$startcol2 = (CcparsolPeer::NUM_COLUMNS - CcparsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpartidPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpartidPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcconcepPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparsolPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcparsolPeer::CCCONCEP_ID, CcconcepPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpartid(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparsols();
					$obj2->addCcparsol($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcconcep(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparsols();
					$obj3->addCcparsol($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcconcep(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparsolPeer::addSelectColumns($c);
		$startcol2 = (CcparsolPeer::NUM_COLUMNS - CcparsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpartidPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpartidPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparsolPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcparsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpartid(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparsols();
					$obj2->addCcparsol($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcsolici(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparsols();
					$obj3->addCcparsol($obj1);
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
		return CcparsolPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcparsolPeer::ID); 

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
			$comparison = $criteria->getComparison(CcparsolPeer::ID);
			$selectCriteria->add(CcparsolPeer::ID, $criteria->remove(CcparsolPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcparsolPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcparsolPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccparsol) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcparsolPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccparsol $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcparsolPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcparsolPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcparsolPeer::DATABASE_NAME, CcparsolPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcparsolPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcparsolPeer::DATABASE_NAME);

		$criteria->add(CcparsolPeer::ID, $pk);


		$v = CcparsolPeer::doSelect($criteria, $con);

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
			$criteria->add(CcparsolPeer::ID, $pks, Criteria::IN);
			$objs = CcparsolPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcparsolPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcparsolMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcparsolMapBuilder');
}
