<?php


abstract class BaseCcasiganaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccasigana';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccasigana';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccasigana.ID';

	
	const FECASIG = 'ccasigana.FECASIG';

	
	const TIPASIG = 'ccasigana.TIPASIG';

	
	const ESTATUS = 'ccasigana.ESTATUS';

	
	const CCANALIS_ID = 'ccasigana.CCANALIS_ID';

	
	const CCSOLICI_ID = 'ccasigana.CCSOLICI_ID';

	
	const CCUSUINT_ID = 'ccasigana.CCUSUINT_ID';

	
	const CCGERENC_ID = 'ccasigana.CCGERENC_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecasig', 'Tipasig', 'Estatus', 'CcanalisId', 'CcsoliciId', 'CcusuintId', 'CcgerencId', ),
		BasePeer::TYPE_COLNAME => array (CcasiganaPeer::ID, CcasiganaPeer::FECASIG, CcasiganaPeer::TIPASIG, CcasiganaPeer::ESTATUS, CcasiganaPeer::CCANALIS_ID, CcasiganaPeer::CCSOLICI_ID, CcasiganaPeer::CCUSUINT_ID, CcasiganaPeer::CCGERENC_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecasig', 'tipasig', 'estatus', 'ccanalis_id', 'ccsolici_id', 'ccusuint_id', 'ccgerenc_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecasig' => 1, 'Tipasig' => 2, 'Estatus' => 3, 'CcanalisId' => 4, 'CcsoliciId' => 5, 'CcusuintId' => 6, 'CcgerencId' => 7, ),
		BasePeer::TYPE_COLNAME => array (CcasiganaPeer::ID => 0, CcasiganaPeer::FECASIG => 1, CcasiganaPeer::TIPASIG => 2, CcasiganaPeer::ESTATUS => 3, CcasiganaPeer::CCANALIS_ID => 4, CcasiganaPeer::CCSOLICI_ID => 5, CcasiganaPeer::CCUSUINT_ID => 6, CcasiganaPeer::CCGERENC_ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecasig' => 1, 'tipasig' => 2, 'estatus' => 3, 'ccanalis_id' => 4, 'ccsolici_id' => 5, 'ccusuint_id' => 6, 'ccgerenc_id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcasiganaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcasiganaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcasiganaPeer::getTableMap();
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
		return str_replace(CcasiganaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcasiganaPeer::ID);

		$criteria->addSelectColumn(CcasiganaPeer::FECASIG);

		$criteria->addSelectColumn(CcasiganaPeer::TIPASIG);

		$criteria->addSelectColumn(CcasiganaPeer::ESTATUS);

		$criteria->addSelectColumn(CcasiganaPeer::CCANALIS_ID);

		$criteria->addSelectColumn(CcasiganaPeer::CCSOLICI_ID);

		$criteria->addSelectColumn(CcasiganaPeer::CCUSUINT_ID);

		$criteria->addSelectColumn(CcasiganaPeer::CCGERENC_ID);

	}

	const COUNT = 'COUNT(ccasigana.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccasigana.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcasiganaPeer::doSelectRS($criteria, $con);
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
		$objects = CcasiganaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcasiganaPeer::populateObjects(CcasiganaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcasiganaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcasiganaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcanalis(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcasiganaPeer::CCANALIS_ID, CcanalisPeer::ID);

		$rs = CcasiganaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcasiganaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcasiganaPeer::CCSOLICI_ID, CcsoliciPeer::ID);

		$rs = CcasiganaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcusuint(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcasiganaPeer::CCUSUINT_ID, CcusuintPeer::ID);

		$rs = CcasiganaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcgerenc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcasiganaPeer::CCGERENC_ID, CcgerencPeer::ID);

		$rs = CcasiganaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcanalis(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcasiganaPeer::addSelectColumns($c);
		$startcol = (CcasiganaPeer::NUM_COLUMNS - CcasiganaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcanalisPeer::addSelectColumns($c);

		$c->addJoin(CcasiganaPeer::CCANALIS_ID, CcanalisPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcasiganaPeer::getOMClass();

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
										$temp_obj2->addCcasigana($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcasiganas();
				$obj2->addCcasigana($obj1); 			}
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

		CcasiganaPeer::addSelectColumns($c);
		$startcol = (CcasiganaPeer::NUM_COLUMNS - CcasiganaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoliciPeer::addSelectColumns($c);

		$c->addJoin(CcasiganaPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcasiganaPeer::getOMClass();

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
										$temp_obj2->addCcasigana($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcasiganas();
				$obj2->addCcasigana($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcusuint(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcasiganaPeer::addSelectColumns($c);
		$startcol = (CcasiganaPeer::NUM_COLUMNS - CcasiganaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcusuintPeer::addSelectColumns($c);

		$c->addJoin(CcasiganaPeer::CCUSUINT_ID, CcusuintPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcasiganaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcusuintPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcusuint(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcasigana($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcasiganas();
				$obj2->addCcasigana($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcgerenc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcasiganaPeer::addSelectColumns($c);
		$startcol = (CcasiganaPeer::NUM_COLUMNS - CcasiganaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcgerencPeer::addSelectColumns($c);

		$c->addJoin(CcasiganaPeer::CCGERENC_ID, CcgerencPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcasiganaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcgerencPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcgerenc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcasigana($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcasiganas();
				$obj2->addCcasigana($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcasiganaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcasiganaPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$criteria->addJoin(CcasiganaPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$criteria->addJoin(CcasiganaPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$criteria->addJoin(CcasiganaPeer::CCGERENC_ID, CcgerencPeer::ID);
	
		$rs = CcasiganaPeer::doSelectRS($criteria, $con);
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

		CcasiganaPeer::addSelectColumns($c);
		$startcol2 = (CcasiganaPeer::NUM_COLUMNS - CcasiganaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcanalisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcanalisPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuintPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcasiganaPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCGERENC_ID, CcgerencPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcasiganaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcanalis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcasigana($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcasiganas();
					$obj2->addCcasigana($obj1);
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
						$temp_obj3->addCcasigana($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcasiganas();
					$obj3->addCcasigana($obj1);
				}
	

							
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcusuint(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcasigana($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcasiganas();
					$obj4->addCcasigana($obj1);
				}
	

							
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcgerenc(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcasigana($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcasiganas();
					$obj5->addCcasigana($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcanalis(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcasiganaPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcasiganaPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcasiganaPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcasiganaPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcasiganaPeer::CCGERENC_ID, CcgerencPeer::ID);
		
			$rs = CcasiganaPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcasiganaPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcasiganaPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcasiganaPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcasiganaPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcasiganaPeer::CCGERENC_ID, CcgerencPeer::ID);
		
			$rs = CcasiganaPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcusuint(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcasiganaPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcasiganaPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcasiganaPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcasiganaPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcasiganaPeer::CCGERENC_ID, CcgerencPeer::ID);
		
			$rs = CcasiganaPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcgerenc(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcasiganaPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcasiganaPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcasiganaPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcasiganaPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcasiganaPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
			$rs = CcasiganaPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcanalis(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcasiganaPeer::addSelectColumns($c);
		$startcol2 = (CcasiganaPeer::NUM_COLUMNS - CcasiganaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcasiganaPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCGERENC_ID, CcgerencPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcasiganaPeer::getOMClass();

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
						$temp_obj2->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcasiganas();
					$obj2->addCcasigana($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcasiganas();
					$obj3->addCcasigana($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcgerenc(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcasiganas();
					$obj4->addCcasigana($obj1);
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

		CcasiganaPeer::addSelectColumns($c);
		$startcol2 = (CcasiganaPeer::NUM_COLUMNS - CcasiganaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcanalisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcanalisPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcasiganaPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCGERENC_ID, CcgerencPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcasiganaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcanalis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcasiganas();
					$obj2->addCcasigana($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcasiganas();
					$obj3->addCcasigana($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcgerenc(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcasiganas();
					$obj4->addCcasigana($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcusuint(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcasiganaPeer::addSelectColumns($c);
		$startcol2 = (CcasiganaPeer::NUM_COLUMNS - CcasiganaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcanalisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcanalisPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcasiganaPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCGERENC_ID, CcgerencPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcasiganaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcanalis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcasiganas();
					$obj2->addCcasigana($obj1);
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
						$temp_obj3->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcasiganas();
					$obj3->addCcasigana($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcgerenc(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcasiganas();
					$obj4->addCcasigana($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcgerenc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcasiganaPeer::addSelectColumns($c);
		$startcol2 = (CcasiganaPeer::NUM_COLUMNS - CcasiganaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcanalisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcanalisPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuintPeer::NUM_COLUMNS;
	
			$c->addJoin(CcasiganaPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcasiganaPeer::CCUSUINT_ID, CcusuintPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcasiganaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcanalis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcasiganas();
					$obj2->addCcasigana($obj1);
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
						$temp_obj3->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcasiganas();
					$obj3->addCcasigana($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcusuint(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcasigana($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcasiganas();
					$obj4->addCcasigana($obj1);
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
		return CcasiganaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcasiganaPeer::ID); 

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
			$comparison = $criteria->getComparison(CcasiganaPeer::ID);
			$selectCriteria->add(CcasiganaPeer::ID, $criteria->remove(CcasiganaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcasiganaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcasiganaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccasigana) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcasiganaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccasigana $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcasiganaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcasiganaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcasiganaPeer::DATABASE_NAME, CcasiganaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcasiganaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcasiganaPeer::DATABASE_NAME);

		$criteria->add(CcasiganaPeer::ID, $pk);


		$v = CcasiganaPeer::doSelect($criteria, $con);

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
			$criteria->add(CcasiganaPeer::ID, $pks, Criteria::IN);
			$objs = CcasiganaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcasiganaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcasiganaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcasiganaMapBuilder');
}
