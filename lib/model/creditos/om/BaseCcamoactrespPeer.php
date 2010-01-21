<?php


abstract class BaseCcamoactrespPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccamoactresp';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccamoactresp';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccamoactresp.ID';

	
	const CAPINI = 'ccamoactresp.CAPINI';

	
	const MONINT = 'ccamoactresp.MONINT';

	
	const FECVEN = 'ccamoactresp.FECVEN';

	
	const ESTATU = 'ccamoactresp.ESTATU';

	
	const MONPRI = 'ccamoactresp.MONPRI';

	
	const MONSALCAP = 'ccamoactresp.MONSALCAP';

	
	const NUMCUO = 'ccamoactresp.NUMCUO';

	
	const MONCUO = 'ccamoactresp.MONCUO';

	
	const MONINTMOR = 'ccamoactresp.MONINTMOR';

	
	const CCDEFAMO_ID = 'ccamoactresp.CCDEFAMO_ID';

	
	const CCCREDIT_ID = 'ccamoactresp.CCCREDIT_ID';

	
	const CCPARTID_ID = 'ccamoactresp.CCPARTID_ID';

	
	const CCPROGRA_ID = 'ccamoactresp.CCPROGRA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Capini', 'Monint', 'Fecven', 'Estatu', 'Monpri', 'Monsalcap', 'Numcuo', 'Moncuo', 'Monintmor', 'CcdefamoId', 'CccreditId', 'CcpartidId', 'CcprograId', ),
		BasePeer::TYPE_COLNAME => array (CcamoactrespPeer::ID, CcamoactrespPeer::CAPINI, CcamoactrespPeer::MONINT, CcamoactrespPeer::FECVEN, CcamoactrespPeer::ESTATU, CcamoactrespPeer::MONPRI, CcamoactrespPeer::MONSALCAP, CcamoactrespPeer::NUMCUO, CcamoactrespPeer::MONCUO, CcamoactrespPeer::MONINTMOR, CcamoactrespPeer::CCDEFAMO_ID, CcamoactrespPeer::CCCREDIT_ID, CcamoactrespPeer::CCPARTID_ID, CcamoactrespPeer::CCPROGRA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'capini', 'monint', 'fecven', 'estatu', 'monpri', 'monsalcap', 'numcuo', 'moncuo', 'monintmor', 'ccdefamo_id', 'cccredit_id', 'ccpartid_id', 'ccprogra_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Capini' => 1, 'Monint' => 2, 'Fecven' => 3, 'Estatu' => 4, 'Monpri' => 5, 'Monsalcap' => 6, 'Numcuo' => 7, 'Moncuo' => 8, 'Monintmor' => 9, 'CcdefamoId' => 10, 'CccreditId' => 11, 'CcpartidId' => 12, 'CcprograId' => 13, ),
		BasePeer::TYPE_COLNAME => array (CcamoactrespPeer::ID => 0, CcamoactrespPeer::CAPINI => 1, CcamoactrespPeer::MONINT => 2, CcamoactrespPeer::FECVEN => 3, CcamoactrespPeer::ESTATU => 4, CcamoactrespPeer::MONPRI => 5, CcamoactrespPeer::MONSALCAP => 6, CcamoactrespPeer::NUMCUO => 7, CcamoactrespPeer::MONCUO => 8, CcamoactrespPeer::MONINTMOR => 9, CcamoactrespPeer::CCDEFAMO_ID => 10, CcamoactrespPeer::CCCREDIT_ID => 11, CcamoactrespPeer::CCPARTID_ID => 12, CcamoactrespPeer::CCPROGRA_ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'capini' => 1, 'monint' => 2, 'fecven' => 3, 'estatu' => 4, 'monpri' => 5, 'monsalcap' => 6, 'numcuo' => 7, 'moncuo' => 8, 'monintmor' => 9, 'ccdefamo_id' => 10, 'cccredit_id' => 11, 'ccpartid_id' => 12, 'ccprogra_id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcamoactrespMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcamoactrespMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcamoactrespPeer::getTableMap();
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
		return str_replace(CcamoactrespPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcamoactrespPeer::ID);

		$criteria->addSelectColumn(CcamoactrespPeer::CAPINI);

		$criteria->addSelectColumn(CcamoactrespPeer::MONINT);

		$criteria->addSelectColumn(CcamoactrespPeer::FECVEN);

		$criteria->addSelectColumn(CcamoactrespPeer::ESTATU);

		$criteria->addSelectColumn(CcamoactrespPeer::MONPRI);

		$criteria->addSelectColumn(CcamoactrespPeer::MONSALCAP);

		$criteria->addSelectColumn(CcamoactrespPeer::NUMCUO);

		$criteria->addSelectColumn(CcamoactrespPeer::MONCUO);

		$criteria->addSelectColumn(CcamoactrespPeer::MONINTMOR);

		$criteria->addSelectColumn(CcamoactrespPeer::CCDEFAMO_ID);

		$criteria->addSelectColumn(CcamoactrespPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcamoactrespPeer::CCPARTID_ID);

		$criteria->addSelectColumn(CcamoactrespPeer::CCPROGRA_ID);

	}

	const COUNT = 'COUNT(ccamoactresp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccamoactresp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcamoactrespPeer::doSelectRS($criteria, $con);
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
		$objects = CcamoactrespPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcamoactrespPeer::populateObjects(CcamoactrespPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcamoactrespPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcamoactrespPeer::getOMClass();
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
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamoactrespPeer::CCDEFAMO_ID, CcdefamoPeer::ID);

		$rs = CcamoactrespPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamoactrespPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcamoactrespPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamoactrespPeer::CCPARTID_ID, CcpartidPeer::ID);

		$rs = CcamoactrespPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamoactrespPeer::CCPROGRA_ID, CcprograPeer::ID);

		$rs = CcamoactrespPeer::doSelectRS($criteria, $con);
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

		CcamoactrespPeer::addSelectColumns($c);
		$startcol = (CcamoactrespPeer::NUM_COLUMNS - CcamoactrespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcdefamoPeer::addSelectColumns($c);

		$c->addJoin(CcamoactrespPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactrespPeer::getOMClass();

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
										$temp_obj2->addCcamoactresp($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamoactresps();
				$obj2->addCcamoactresp($obj1); 			}
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

		CcamoactrespPeer::addSelectColumns($c);
		$startcol = (CcamoactrespPeer::NUM_COLUMNS - CcamoactrespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcamoactrespPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactrespPeer::getOMClass();

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
										$temp_obj2->addCcamoactresp($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamoactresps();
				$obj2->addCcamoactresp($obj1); 			}
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

		CcamoactrespPeer::addSelectColumns($c);
		$startcol = (CcamoactrespPeer::NUM_COLUMNS - CcamoactrespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpartidPeer::addSelectColumns($c);

		$c->addJoin(CcamoactrespPeer::CCPARTID_ID, CcpartidPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactrespPeer::getOMClass();

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
										$temp_obj2->addCcamoactresp($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamoactresps();
				$obj2->addCcamoactresp($obj1); 			}
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

		CcamoactrespPeer::addSelectColumns($c);
		$startcol = (CcamoactrespPeer::NUM_COLUMNS - CcamoactrespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcprograPeer::addSelectColumns($c);

		$c->addJoin(CcamoactrespPeer::CCPROGRA_ID, CcprograPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactrespPeer::getOMClass();

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
										$temp_obj2->addCcamoactresp($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamoactresps();
				$obj2->addCcamoactresp($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamoactrespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcamoactrespPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
			$criteria->addJoin(CcamoactrespPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcamoactrespPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$criteria->addJoin(CcamoactrespPeer::CCPROGRA_ID, CcprograPeer::ID);
	
		$rs = CcamoactrespPeer::doSelectRS($criteria, $con);
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

		CcamoactrespPeer::addSelectColumns($c);
		$startcol2 = (CcamoactrespPeer::NUM_COLUMNS - CcamoactrespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcdefamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcdefamoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoactrespPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCPROGRA_ID, CcprograPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactrespPeer::getOMClass();


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
						$temp_obj2->addCcamoactresp($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoactresps();
					$obj2->addCcamoactresp($obj1);
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
						$temp_obj3->addCcamoactresp($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoactresps();
					$obj3->addCcamoactresp($obj1);
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
						$temp_obj4->addCcamoactresp($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamoactresps();
					$obj4->addCcamoactresp($obj1);
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
						$temp_obj5->addCcamoactresp($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcamoactresps();
					$obj5->addCcamoactresp($obj1);
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
				$criteria->addSelectColumn(CcamoactrespPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamoactrespPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamoactrespPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamoactrespPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcamoactrespPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamoactrespPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcamoactrespPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamoactrespPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamoactrespPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
		
				$criteria->addJoin(CcamoactrespPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcamoactrespPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamoactrespPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcamoactrespPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamoactrespPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamoactrespPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
		
				$criteria->addJoin(CcamoactrespPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamoactrespPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamoactrespPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcamoactrespPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamoactrespPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamoactrespPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
		
				$criteria->addJoin(CcamoactrespPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamoactrespPeer::CCPARTID_ID, CcpartidPeer::ID);
		
			$rs = CcamoactrespPeer::doSelectRS($criteria, $con);
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

		CcamoactrespPeer::addSelectColumns($c);
		$startcol2 = (CcamoactrespPeer::NUM_COLUMNS - CcamoactrespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoactrespPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactrespPeer::getOMClass();

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
						$temp_obj2->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoactresps();
					$obj2->addCcamoactresp($obj1);
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
						$temp_obj3->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoactresps();
					$obj3->addCcamoactresp($obj1);
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
						$temp_obj4->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamoactresps();
					$obj4->addCcamoactresp($obj1);
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

		CcamoactrespPeer::addSelectColumns($c);
		$startcol2 = (CcamoactrespPeer::NUM_COLUMNS - CcamoactrespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcdefamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcdefamoPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoactrespPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactrespPeer::getOMClass();

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
						$temp_obj2->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoactresps();
					$obj2->addCcamoactresp($obj1);
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
						$temp_obj3->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoactresps();
					$obj3->addCcamoactresp($obj1);
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
						$temp_obj4->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamoactresps();
					$obj4->addCcamoactresp($obj1);
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

		CcamoactrespPeer::addSelectColumns($c);
		$startcol2 = (CcamoactrespPeer::NUM_COLUMNS - CcamoactrespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcdefamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcdefamoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoactrespPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactrespPeer::getOMClass();

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
						$temp_obj2->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoactresps();
					$obj2->addCcamoactresp($obj1);
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
						$temp_obj3->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoactresps();
					$obj3->addCcamoactresp($obj1);
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
						$temp_obj4->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamoactresps();
					$obj4->addCcamoactresp($obj1);
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

		CcamoactrespPeer::addSelectColumns($c);
		$startcol2 = (CcamoactrespPeer::NUM_COLUMNS - CcamoactrespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcdefamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcdefamoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamoactrespPeer::CCDEFAMO_ID, CcdefamoPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamoactrespPeer::CCPARTID_ID, CcpartidPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamoactrespPeer::getOMClass();

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
						$temp_obj2->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamoactresps();
					$obj2->addCcamoactresp($obj1);
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
						$temp_obj3->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamoactresps();
					$obj3->addCcamoactresp($obj1);
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
						$temp_obj4->addCcamoactresp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamoactresps();
					$obj4->addCcamoactresp($obj1);
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
		return CcamoactrespPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcamoactrespPeer::ID); 

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
			$comparison = $criteria->getComparison(CcamoactrespPeer::ID);
			$selectCriteria->add(CcamoactrespPeer::ID, $criteria->remove(CcamoactrespPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcamoactrespPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcamoactrespPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccamoactresp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcamoactrespPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccamoactresp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcamoactrespPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcamoactrespPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcamoactrespPeer::DATABASE_NAME, CcamoactrespPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcamoactrespPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcamoactrespPeer::DATABASE_NAME);

		$criteria->add(CcamoactrespPeer::ID, $pk);


		$v = CcamoactrespPeer::doSelect($criteria, $con);

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
			$criteria->add(CcamoactrespPeer::ID, $pks, Criteria::IN);
			$objs = CcamoactrespPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcamoactrespPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcamoactrespMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcamoactrespMapBuilder');
}
