<?php


abstract class BaseCcamoactPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccamoact';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccamoact';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccamoact.ID';

	
	const CAPINI = 'ccamoact.CAPINI';

	
	const MONINT = 'ccamoact.MONINT';

	
	const FECVEN = 'ccamoact.FECVEN';

	
	const ESTATU = 'ccamoact.ESTATU';

	
	const MONPRI = 'ccamoact.MONPRI';

	
	const MONSALCAP = 'ccamoact.MONSALCAP';

	
	const NUMCUO = 'ccamoact.NUMCUO';

	
	const MONCUO = 'ccamoact.MONCUO';

	
	const MONINTMOR = 'ccamoact.MONINTMOR';

	
	const MONINTGRA = 'ccamoact.MONINTGRA';

	
	const MONINTCUM = 'ccamoact.MONINTCUM';

	
	const MONTOTCUO = 'ccamoact.MONTOTCUO';

	
	const TIPCUO = 'ccamoact.TIPCUO';

	
	const CCDEFAMO_ID = 'ccamoact.CCDEFAMO_ID';

	
	const CCCREDIT_ID = 'ccamoact.CCCREDIT_ID';

	
	const CCPARTID_ID = 'ccamoact.CCPARTID_ID';

	
	const CCPROGRA_ID = 'ccamoact.CCPROGRA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Capini', 'Monint', 'Fecven', 'Estatu', 'Monpri', 'Monsalcap', 'Numcuo', 'Moncuo', 'Monintmor', 'Monintgra', 'Monintcum', 'Montotcuo', 'Tipcuo', 'CcdefamoId', 'CccreditId', 'CcpartidId', 'CcprograId', ),
		BasePeer::TYPE_COLNAME => array (CcamoactPeer::ID, CcamoactPeer::CAPINI, CcamoactPeer::MONINT, CcamoactPeer::FECVEN, CcamoactPeer::ESTATU, CcamoactPeer::MONPRI, CcamoactPeer::MONSALCAP, CcamoactPeer::NUMCUO, CcamoactPeer::MONCUO, CcamoactPeer::MONINTMOR, CcamoactPeer::MONINTGRA, CcamoactPeer::MONINTCUM, CcamoactPeer::MONTOTCUO, CcamoactPeer::TIPCUO, CcamoactPeer::CCDEFAMO_ID, CcamoactPeer::CCCREDIT_ID, CcamoactPeer::CCPARTID_ID, CcamoactPeer::CCPROGRA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'capini', 'monint', 'fecven', 'estatu', 'monpri', 'monsalcap', 'numcuo', 'moncuo', 'monintmor', 'monintgra', 'monintcum', 'montotcuo', 'tipcuo', 'ccdefamo_id', 'cccredit_id', 'ccpartid_id', 'ccprogra_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Capini' => 1, 'Monint' => 2, 'Fecven' => 3, 'Estatu' => 4, 'Monpri' => 5, 'Monsalcap' => 6, 'Numcuo' => 7, 'Moncuo' => 8, 'Monintmor' => 9, 'Monintgra' => 10, 'Monintcum' => 11, 'Montotcuo' => 12, 'Tipcuo' => 13, 'CcdefamoId' => 14, 'CccreditId' => 15, 'CcpartidId' => 16, 'CcprograId' => 17, ),
		BasePeer::TYPE_COLNAME => array (CcamoactPeer::ID => 0, CcamoactPeer::CAPINI => 1, CcamoactPeer::MONINT => 2, CcamoactPeer::FECVEN => 3, CcamoactPeer::ESTATU => 4, CcamoactPeer::MONPRI => 5, CcamoactPeer::MONSALCAP => 6, CcamoactPeer::NUMCUO => 7, CcamoactPeer::MONCUO => 8, CcamoactPeer::MONINTMOR => 9, CcamoactPeer::MONINTGRA => 10, CcamoactPeer::MONINTCUM => 11, CcamoactPeer::MONTOTCUO => 12, CcamoactPeer::TIPCUO => 13, CcamoactPeer::CCDEFAMO_ID => 14, CcamoactPeer::CCCREDIT_ID => 15, CcamoactPeer::CCPARTID_ID => 16, CcamoactPeer::CCPROGRA_ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'capini' => 1, 'monint' => 2, 'fecven' => 3, 'estatu' => 4, 'monpri' => 5, 'monsalcap' => 6, 'numcuo' => 7, 'moncuo' => 8, 'monintmor' => 9, 'monintgra' => 10, 'monintcum' => 11, 'montotcuo' => 12, 'tipcuo' => 13, 'ccdefamo_id' => 14, 'cccredit_id' => 15, 'ccpartid_id' => 16, 'ccprogra_id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcamoactMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcamoactMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcamoactPeer::getTableMap();
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
		return str_replace(CcamoactPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcamoactPeer::ID);

		$criteria->addSelectColumn(CcamoactPeer::CAPINI);

		$criteria->addSelectColumn(CcamoactPeer::MONINT);

		$criteria->addSelectColumn(CcamoactPeer::FECVEN);

		$criteria->addSelectColumn(CcamoactPeer::ESTATU);

		$criteria->addSelectColumn(CcamoactPeer::MONPRI);

		$criteria->addSelectColumn(CcamoactPeer::MONSALCAP);

		$criteria->addSelectColumn(CcamoactPeer::NUMCUO);

		$criteria->addSelectColumn(CcamoactPeer::MONCUO);

		$criteria->addSelectColumn(CcamoactPeer::MONINTMOR);

		$criteria->addSelectColumn(CcamoactPeer::MONINTGRA);

		$criteria->addSelectColumn(CcamoactPeer::MONINTCUM);

		$criteria->addSelectColumn(CcamoactPeer::MONTOTCUO);

		$criteria->addSelectColumn(CcamoactPeer::TIPCUO);

		$criteria->addSelectColumn(CcamoactPeer::CCDEFAMO_ID);

		$criteria->addSelectColumn(CcamoactPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcamoactPeer::CCPARTID_ID);

		$criteria->addSelectColumn(CcamoactPeer::CCPROGRA_ID);

	}

	const COUNT = 'COUNT(ccamoact.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccamoact.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamoactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcamoactPeer::doSelectRS($criteria, $con);
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
		$objects = CcamoactPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcamoactPeer::populateObjects(CcamoactPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcamoactPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcamoactPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcdefamo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamoactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamoactPeer::CCDEFAMO_ID, CcdefamoPeer::ID);

		$rs = CcamoactPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcamoactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamoactPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcamoactPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcamoactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamoactPeer::CCPARTID_ID, CcpartidPeer::ID);

		$rs = CcamoactPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcamoactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamoactPeer::CCPROGRA_ID, CcprograPeer::ID);

		$rs = CcamoactPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcdefamo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamoactPeer::addSelectColumns($c);
		$startcol = (CcamoactPeer::NUM_COLUMNS - CcamoactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcdefamoPeer::addSelectColumns($c);

		$c->addJoin(CcamoactPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcdefamo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcamoact($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamoacts();
				$obj2->addCcamoact($obj1); 			}
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

		CcamoactPeer::addSelectColumns($c);
		$startcol = (CcamoactPeer::NUM_COLUMNS - CcamoactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcamoactPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactPeer::getOMClass();

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
										$temp_obj2->addCcamoact($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamoacts();
				$obj2->addCcamoact($obj1); 			}
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

		CcamoactPeer::addSelectColumns($c);
		$startcol = (CcamoactPeer::NUM_COLUMNS - CcamoactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpartidPeer::addSelectColumns($c);

		$c->addJoin(CcamoactPeer::CCPARTID_ID, CcpartidPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactPeer::getOMClass();

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
										$temp_obj2->addCcamoact($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamoacts();
				$obj2->addCcamoact($obj1); 			}
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

		CcamoactPeer::addSelectColumns($c);
		$startcol = (CcamoactPeer::NUM_COLUMNS - CcamoactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcprograPeer::addSelectColumns($c);

		$c->addJoin(CcamoactPeer::CCPROGRA_ID, CcprograPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactPeer::getOMClass();

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
										$temp_obj2->addCcamoact($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamoacts();
				$obj2->addCcamoact($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamoactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcamoactPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
			$criteria->addJoin(CcamoactPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcamoactPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$criteria->addJoin(CcamoactPeer::CCPROGRA_ID, CcprograPeer::ID);
	
		$rs = CcamoactPeer::doSelectRS($criteria, $con);
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

		CcamoactPeer::addSelectColumns($c);
		$startcol2 = (CcamoactPeer::NUM_COLUMNS - CcamoactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcdefamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcdefamoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoactPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCPROGRA_ID, CcprograPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcdefamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcdefamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamoact($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoacts();
					$obj2->addCcamoact($obj1);
				}
	

							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccredit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcamoact($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoacts();
					$obj3->addCcamoact($obj1);
				}
	

							
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcamoact($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamoacts();
					$obj4->addCcamoact($obj1);
				}
	

							
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcprogra(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcamoact($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcamoacts();
					$obj5->addCcamoact($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcdefamo(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcamoactPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamoactPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamoactPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamoactPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcamoactPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamoactPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcamoactPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamoactPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamoactPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
		
				$criteria->addJoin(CcamoactPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcamoactPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamoactPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcamoactPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamoactPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamoactPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
		
				$criteria->addJoin(CcamoactPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamoactPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamoactPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcamoactPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamoactPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamoactPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
		
				$criteria->addJoin(CcamoactPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamoactPeer::CCPARTID_ID, CcpartidPeer::ID);
		
			$rs = CcamoactPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcdefamo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamoactPeer::addSelectColumns($c);
		$startcol2 = (CcamoactPeer::NUM_COLUMNS - CcamoactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoactPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactPeer::getOMClass();

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
						$temp_obj2->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoacts();
					$obj2->addCcamoact($obj1);
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
						$temp_obj3->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoacts();
					$obj3->addCcamoact($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcprogra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamoacts();
					$obj4->addCcamoact($obj1);
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

		CcamoactPeer::addSelectColumns($c);
		$startcol2 = (CcamoactPeer::NUM_COLUMNS - CcamoactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcdefamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcdefamoPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoactPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcdefamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcdefamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoacts();
					$obj2->addCcamoact($obj1);
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
						$temp_obj3->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoacts();
					$obj3->addCcamoact($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcprogra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamoacts();
					$obj4->addCcamoact($obj1);
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

		CcamoactPeer::addSelectColumns($c);
		$startcol2 = (CcamoactPeer::NUM_COLUMNS - CcamoactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcdefamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcdefamoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoactPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcdefamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcdefamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoacts();
					$obj2->addCcamoact($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccredit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoacts();
					$obj3->addCcamoact($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcprogra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamoacts();
					$obj4->addCcamoact($obj1);
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

		CcamoactPeer::addSelectColumns($c);
		$startcol2 = (CcamoactPeer::NUM_COLUMNS - CcamoactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcdefamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcdefamoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoactPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamoactPeer::CCPARTID_ID, CcpartidPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcdefamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcdefamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoacts();
					$obj2->addCcamoact($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccredit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoacts();
					$obj3->addCcamoact($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcamoact($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamoacts();
					$obj4->addCcamoact($obj1);
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
		return CcamoactPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcamoactPeer::ID); 

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
			$comparison = $criteria->getComparison(CcamoactPeer::ID);
			$selectCriteria->add(CcamoactPeer::ID, $criteria->remove(CcamoactPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcamoactPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcamoactPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccamoact) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcamoactPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccamoact $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcamoactPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcamoactPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcamoactPeer::DATABASE_NAME, CcamoactPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcamoactPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcamoactPeer::DATABASE_NAME);

		$criteria->add(CcamoactPeer::ID, $pk);


		$v = CcamoactPeer::doSelect($criteria, $con);

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
			$criteria->add(CcamoactPeer::ID, $pks, Criteria::IN);
			$objs = CcamoactPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcamoactPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcamoactMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcamoactMapBuilder');
}
