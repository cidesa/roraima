<?php


abstract class BaseCccuadesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cccuades';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Cccuades';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'cccuades.ID';

	
	const ORDDES = 'cccuades.ORDDES';

	
	const MONDES = 'cccuades.MONDES';

	
	const ESTATU = 'cccuades.ESTATU';

	
	const FECDES = 'cccuades.FECDES';

	
	const CODUSUAUT = 'cccuades.CODUSUAUT';

	
	const APLDED = 'cccuades.APLDED';

	
	const NUMCHEDED = 'cccuades.NUMCHEDED';

	
	const CCCREDIT_ID = 'cccuades.CCCREDIT_ID';

	
	const CCPARTID_ID = 'cccuades.CCPARTID_ID';

	
	const CCPROGRA_ID = 'cccuades.CCPROGRA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Orddes', 'Mondes', 'Estatu', 'Fecdes', 'Codusuaut', 'Aplded', 'Numcheded', 'CccreditId', 'CcpartidId', 'CcprograId', ),
		BasePeer::TYPE_COLNAME => array (CccuadesPeer::ID, CccuadesPeer::ORDDES, CccuadesPeer::MONDES, CccuadesPeer::ESTATU, CccuadesPeer::FECDES, CccuadesPeer::CODUSUAUT, CccuadesPeer::APLDED, CccuadesPeer::NUMCHEDED, CccuadesPeer::CCCREDIT_ID, CccuadesPeer::CCPARTID_ID, CccuadesPeer::CCPROGRA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'orddes', 'mondes', 'estatu', 'fecdes', 'codusuaut', 'aplded', 'numcheded', 'cccredit_id', 'ccpartid_id', 'ccprogra_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Orddes' => 1, 'Mondes' => 2, 'Estatu' => 3, 'Fecdes' => 4, 'Codusuaut' => 5, 'Aplded' => 6, 'Numcheded' => 7, 'CccreditId' => 8, 'CcpartidId' => 9, 'CcprograId' => 10, ),
		BasePeer::TYPE_COLNAME => array (CccuadesPeer::ID => 0, CccuadesPeer::ORDDES => 1, CccuadesPeer::MONDES => 2, CccuadesPeer::ESTATU => 3, CccuadesPeer::FECDES => 4, CccuadesPeer::CODUSUAUT => 5, CccuadesPeer::APLDED => 6, CccuadesPeer::NUMCHEDED => 7, CccuadesPeer::CCCREDIT_ID => 8, CccuadesPeer::CCPARTID_ID => 9, CccuadesPeer::CCPROGRA_ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'orddes' => 1, 'mondes' => 2, 'estatu' => 3, 'fecdes' => 4, 'codusuaut' => 5, 'aplded' => 6, 'numcheded' => 7, 'cccredit_id' => 8, 'ccpartid_id' => 9, 'ccprogra_id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CccuadesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CccuadesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CccuadesPeer::getTableMap();
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
		return str_replace(CccuadesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CccuadesPeer::ID);

		$criteria->addSelectColumn(CccuadesPeer::ORDDES);

		$criteria->addSelectColumn(CccuadesPeer::MONDES);

		$criteria->addSelectColumn(CccuadesPeer::ESTATU);

		$criteria->addSelectColumn(CccuadesPeer::FECDES);

		$criteria->addSelectColumn(CccuadesPeer::CODUSUAUT);

		$criteria->addSelectColumn(CccuadesPeer::APLDED);

		$criteria->addSelectColumn(CccuadesPeer::NUMCHEDED);

		$criteria->addSelectColumn(CccuadesPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CccuadesPeer::CCPARTID_ID);

		$criteria->addSelectColumn(CccuadesPeer::CCPROGRA_ID);

	}

	const COUNT = 'COUNT(cccuades.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cccuades.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CccuadesPeer::doSelectRS($criteria, $con);
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
		$objects = CccuadesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CccuadesPeer::populateObjects(CccuadesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CccuadesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CccuadesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCccredit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccuadesPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CccuadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcpartid(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccuadesPeer::CCPARTID_ID, CcpartidPeer::ID);

		$rs = CccuadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcprogra(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccuadesPeer::CCPROGRA_ID, CcprograPeer::ID);

		$rs = CccuadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccuadesPeer::addSelectColumns($c);
		$startcol = (CccuadesPeer::NUM_COLUMNS - CccuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CccuadesPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccuadesPeer::getOMClass();

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
										$temp_obj2->addCccuades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccuadess();
				$obj2->addCccuades($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcpartid(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccuadesPeer::addSelectColumns($c);
		$startcol = (CccuadesPeer::NUM_COLUMNS - CccuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpartidPeer::addSelectColumns($c);

		$c->addJoin(CccuadesPeer::CCPARTID_ID, CcpartidPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccuadesPeer::getOMClass();

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
										$temp_obj2->addCccuades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccuadess();
				$obj2->addCccuades($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcprogra(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccuadesPeer::addSelectColumns($c);
		$startcol = (CccuadesPeer::NUM_COLUMNS - CccuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcprograPeer::addSelectColumns($c);

		$c->addJoin(CccuadesPeer::CCPROGRA_ID, CcprograPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcprograPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcprogra(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccuades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccuadess();
				$obj2->addCccuades($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CccuadesPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CccuadesPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$criteria->addJoin(CccuadesPeer::CCPROGRA_ID, CcprograPeer::ID);
	
		$rs = CccuadesPeer::doSelectRS($criteria, $con);
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

		CccuadesPeer::addSelectColumns($c);
		$startcol2 = (CccuadesPeer::NUM_COLUMNS - CccuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CccuadesPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CccuadesPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CccuadesPeer::CCPROGRA_ID, CcprograPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccuadesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccredit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccuades($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCccuadess();
					$obj2->addCccuades($obj1);
				}
	

							
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpartid(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccuades($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCccuadess();
					$obj3->addCccuades($obj1);
				}
	

							
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcprogra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccuades($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCccuadess();
					$obj4->addCccuades($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCccredit(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccuadesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccuadesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccuadesPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CccuadesPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CccuadesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcpartid(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccuadesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccuadesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccuadesPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CccuadesPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CccuadesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcprogra(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccuadesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccuadesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccuadesPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CccuadesPeer::CCPARTID_ID, CcpartidPeer::ID);
		
			$rs = CccuadesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccuadesPeer::addSelectColumns($c);
		$startcol2 = (CccuadesPeer::NUM_COLUMNS - CccuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpartidPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CccuadesPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CccuadesPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccuadesPeer::getOMClass();

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
						$temp_obj2->addCccuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccuadess();
					$obj2->addCccuades($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcprogra(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccuadess();
					$obj3->addCccuades($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcpartid(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccuadesPeer::addSelectColumns($c);
		$startcol2 = (CccuadesPeer::NUM_COLUMNS - CccuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CccuadesPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CccuadesPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccredit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccuadess();
					$obj2->addCccuades($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcprogra(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccuadess();
					$obj3->addCccuades($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcprogra(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccuadesPeer::addSelectColumns($c);
		$startcol2 = (CccuadesPeer::NUM_COLUMNS - CccuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			$c->addJoin(CccuadesPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CccuadesPeer::CCPARTID_ID, CcpartidPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccredit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccuadess();
					$obj2->addCccuades($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpartid(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccuadess();
					$obj3->addCccuades($obj1);
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
		return CccuadesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CccuadesPeer::ID); 

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
			$comparison = $criteria->getComparison(CccuadesPeer::ID);
			$selectCriteria->add(CccuadesPeer::ID, $criteria->remove(CccuadesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CccuadesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CccuadesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cccuades) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CccuadesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cccuades $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CccuadesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CccuadesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CccuadesPeer::DATABASE_NAME, CccuadesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CccuadesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CccuadesPeer::DATABASE_NAME);

		$criteria->add(CccuadesPeer::ID, $pk);


		$v = CccuadesPeer::doSelect($criteria, $con);

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
			$criteria->add(CccuadesPeer::ID, $pks, Criteria::IN);
			$objs = CccuadesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCccuadesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CccuadesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CccuadesMapBuilder');
}
