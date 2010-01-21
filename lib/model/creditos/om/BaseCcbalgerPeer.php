<?php


abstract class BaseCcbalgerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccbalger';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccbalger';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccbalger.ID';

	
	const FECBALGER = 'ccbalger.FECBALGER';

	
	const CCBENEFI_ID = 'ccbalger.CCBENEFI_ID';

	
	const CCSOLICI_ID = 'ccbalger.CCSOLICI_ID';

	
	const CCUSUARIO_ID = 'ccbalger.CCUSUARIO_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecbalger', 'CcbenefiId', 'CcsoliciId', 'CcusuarioId', ),
		BasePeer::TYPE_COLNAME => array (CcbalgerPeer::ID, CcbalgerPeer::FECBALGER, CcbalgerPeer::CCBENEFI_ID, CcbalgerPeer::CCSOLICI_ID, CcbalgerPeer::CCUSUARIO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecbalger', 'ccbenefi_id', 'ccsolici_id', 'ccusuario_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecbalger' => 1, 'CcbenefiId' => 2, 'CcsoliciId' => 3, 'CcusuarioId' => 4, ),
		BasePeer::TYPE_COLNAME => array (CcbalgerPeer::ID => 0, CcbalgerPeer::FECBALGER => 1, CcbalgerPeer::CCBENEFI_ID => 2, CcbalgerPeer::CCSOLICI_ID => 3, CcbalgerPeer::CCUSUARIO_ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecbalger' => 1, 'ccbenefi_id' => 2, 'ccsolici_id' => 3, 'ccusuario_id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcbalgerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcbalgerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcbalgerPeer::getTableMap();
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
		return str_replace(CcbalgerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcbalgerPeer::ID);

		$criteria->addSelectColumn(CcbalgerPeer::FECBALGER);

		$criteria->addSelectColumn(CcbalgerPeer::CCBENEFI_ID);

		$criteria->addSelectColumn(CcbalgerPeer::CCSOLICI_ID);

		$criteria->addSelectColumn(CcbalgerPeer::CCUSUARIO_ID);

	}

	const COUNT = 'COUNT(ccbalger.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccbalger.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcbalgerPeer::doSelectRS($criteria, $con);
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
		$objects = CcbalgerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcbalgerPeer::populateObjects(CcbalgerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcbalgerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcbalgerPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbalgerPeer::CCBENEFI_ID, CcbenefiPeer::ID);

		$rs = CcbalgerPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbalgerPeer::CCSOLICI_ID, CcsoliciPeer::ID);

		$rs = CcbalgerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcusuario(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbalgerPeer::CCUSUARIO_ID, CcusuarioPeer::ID);

		$rs = CcbalgerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbalgerPeer::addSelectColumns($c);
		$startcol = (CcbalgerPeer::NUM_COLUMNS - CcbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbenefiPeer::addSelectColumns($c);

		$c->addJoin(CcbalgerPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcbenefi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbalger($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbalgers();
				$obj2->addCcbalger($obj1); 			}
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

		CcbalgerPeer::addSelectColumns($c);
		$startcol = (CcbalgerPeer::NUM_COLUMNS - CcbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoliciPeer::addSelectColumns($c);

		$c->addJoin(CcbalgerPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbalgerPeer::getOMClass();

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
										$temp_obj2->addCcbalger($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbalgers();
				$obj2->addCcbalger($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcusuario(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbalgerPeer::addSelectColumns($c);
		$startcol = (CcbalgerPeer::NUM_COLUMNS - CcbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcusuarioPeer::addSelectColumns($c);

		$c->addJoin(CcbalgerPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcusuarioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcusuario(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbalger($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbalgers();
				$obj2->addCcbalger($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbalgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbalgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcbalgerPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$criteria->addJoin(CcbalgerPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$criteria->addJoin(CcbalgerPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
		$rs = CcbalgerPeer::doSelectRS($criteria, $con);
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

		CcbalgerPeer::addSelectColumns($c);
		$startcol2 = (CcbalgerPeer::NUM_COLUMNS - CcbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuarioPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbalgerPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcbalgerPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcbalgerPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbalgerPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbalger($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbalgers();
					$obj2->addCcbalger($obj1);
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
						$temp_obj3->addCcbalger($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbalgers();
					$obj3->addCcbalger($obj1);
				}
	

							
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcusuario(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbalger($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbalgers();
					$obj4->addCcbalger($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcbenefi(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbalgerPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbalgerPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbalgerPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcbalgerPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		
			$rs = CcbalgerPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcbalgerPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbalgerPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbalgerPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcbalgerPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		
			$rs = CcbalgerPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcusuario(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbalgerPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbalgerPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbalgerPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcbalgerPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
			$rs = CcbalgerPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbalgerPeer::addSelectColumns($c);
		$startcol2 = (CcbalgerPeer::NUM_COLUMNS - CcbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuarioPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbalgerPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcbalgerPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbalgerPeer::getOMClass();

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
						$temp_obj2->addCcbalger($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbalgers();
					$obj2->addCcbalger($obj1);
				}
	
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuario(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbalger($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbalgers();
					$obj3->addCcbalger($obj1);
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

		CcbalgerPeer::addSelectColumns($c);
		$startcol2 = (CcbalgerPeer::NUM_COLUMNS - CcbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuarioPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbalgerPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcbalgerPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbalger($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbalgers();
					$obj2->addCcbalger($obj1);
				}
	
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuario(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbalger($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbalgers();
					$obj3->addCcbalger($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcusuario(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbalgerPeer::addSelectColumns($c);
		$startcol2 = (CcbalgerPeer::NUM_COLUMNS - CcbalgerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbalgerPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcbalgerPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbalgerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbalger($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbalgers();
					$obj2->addCcbalger($obj1);
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
						$temp_obj3->addCcbalger($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbalgers();
					$obj3->addCcbalger($obj1);
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
		return CcbalgerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcbalgerPeer::ID); 

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
			$comparison = $criteria->getComparison(CcbalgerPeer::ID);
			$selectCriteria->add(CcbalgerPeer::ID, $criteria->remove(CcbalgerPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcbalgerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcbalgerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccbalger) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcbalgerPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccbalger $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcbalgerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcbalgerPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcbalgerPeer::DATABASE_NAME, CcbalgerPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcbalgerPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcbalgerPeer::DATABASE_NAME);

		$criteria->add(CcbalgerPeer::ID, $pk);


		$v = CcbalgerPeer::doSelect($criteria, $con);

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
			$criteria->add(CcbalgerPeer::ID, $pks, Criteria::IN);
			$objs = CcbalgerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcbalgerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcbalgerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcbalgerMapBuilder');
}
