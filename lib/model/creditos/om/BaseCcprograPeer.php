<?php


abstract class BaseCcprograPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccprogra';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccprogra';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccprogra.ID';

	
	const NOMPRO = 'ccprogra.NOMPRO';

	
	const MONMAX = 'ccprogra.MONMAX';

	
	const PREPRO = 'ccprogra.PREPRO';

	
	const FECVIG = 'ccprogra.FECVIG';

	
	const FECVEN = 'ccprogra.FECVEN';

	
	const CODUNI = 'ccprogra.CODUNI';

	
	const CODCAT = 'ccprogra.CODCAT';

	
	const OBJETO = 'ccprogra.OBJETO';

	
	const DESTINO = 'ccprogra.DESTINO';

	
	const MONFIN = 'ccprogra.MONFIN';

	
	const CONDIC = 'ccprogra.CONDIC';

	
	const GARANT = 'ccprogra.GARANT';

	
	const RECAUD = 'ccprogra.RECAUD';

	
	const PLAFIN = 'ccprogra.PLAFIN';

	
	const NOMPROCOM = 'ccprogra.NOMPROCOM';

	
	const CCPERIOD_ID = 'ccprogra.CCPERIOD_ID';

	
	const CCFUEFIN_ID = 'ccprogra.CCFUEFIN_ID';

	
	const TIPCOM = 'ccprogra.TIPCOM';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nompro', 'Monmax', 'Prepro', 'Fecvig', 'Fecven', 'Coduni', 'Codcat', 'Objeto', 'Destino', 'Monfin', 'Condic', 'Garant', 'Recaud', 'Plafin', 'Nomprocom', 'CcperiodId', 'CcfuefinId', 'Tipcom', ),
		BasePeer::TYPE_COLNAME => array (CcprograPeer::ID, CcprograPeer::NOMPRO, CcprograPeer::MONMAX, CcprograPeer::PREPRO, CcprograPeer::FECVIG, CcprograPeer::FECVEN, CcprograPeer::CODUNI, CcprograPeer::CODCAT, CcprograPeer::OBJETO, CcprograPeer::DESTINO, CcprograPeer::MONFIN, CcprograPeer::CONDIC, CcprograPeer::GARANT, CcprograPeer::RECAUD, CcprograPeer::PLAFIN, CcprograPeer::NOMPROCOM, CcprograPeer::CCPERIOD_ID, CcprograPeer::CCFUEFIN_ID, CcprograPeer::TIPCOM, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nompro', 'monmax', 'prepro', 'fecvig', 'fecven', 'coduni', 'codcat', 'objeto', 'destino', 'monfin', 'condic', 'garant', 'recaud', 'plafin', 'nomprocom', 'ccperiod_id', 'ccfuefin_id', 'tipcom', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nompro' => 1, 'Monmax' => 2, 'Prepro' => 3, 'Fecvig' => 4, 'Fecven' => 5, 'Coduni' => 6, 'Codcat' => 7, 'Objeto' => 8, 'Destino' => 9, 'Monfin' => 10, 'Condic' => 11, 'Garant' => 12, 'Recaud' => 13, 'Plafin' => 14, 'Nomprocom' => 15, 'CcperiodId' => 16, 'CcfuefinId' => 17, 'Tipcom' => 18, ),
		BasePeer::TYPE_COLNAME => array (CcprograPeer::ID => 0, CcprograPeer::NOMPRO => 1, CcprograPeer::MONMAX => 2, CcprograPeer::PREPRO => 3, CcprograPeer::FECVIG => 4, CcprograPeer::FECVEN => 5, CcprograPeer::CODUNI => 6, CcprograPeer::CODCAT => 7, CcprograPeer::OBJETO => 8, CcprograPeer::DESTINO => 9, CcprograPeer::MONFIN => 10, CcprograPeer::CONDIC => 11, CcprograPeer::GARANT => 12, CcprograPeer::RECAUD => 13, CcprograPeer::PLAFIN => 14, CcprograPeer::NOMPROCOM => 15, CcprograPeer::CCPERIOD_ID => 16, CcprograPeer::CCFUEFIN_ID => 17, CcprograPeer::TIPCOM => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nompro' => 1, 'monmax' => 2, 'prepro' => 3, 'fecvig' => 4, 'fecven' => 5, 'coduni' => 6, 'codcat' => 7, 'objeto' => 8, 'destino' => 9, 'monfin' => 10, 'condic' => 11, 'garant' => 12, 'recaud' => 13, 'plafin' => 14, 'nomprocom' => 15, 'ccperiod_id' => 16, 'ccfuefin_id' => 17, 'tipcom' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcprograMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcprograMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcprograPeer::getTableMap();
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
		return str_replace(CcprograPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcprograPeer::ID);

		$criteria->addSelectColumn(CcprograPeer::NOMPRO);

		$criteria->addSelectColumn(CcprograPeer::MONMAX);

		$criteria->addSelectColumn(CcprograPeer::PREPRO);

		$criteria->addSelectColumn(CcprograPeer::FECVIG);

		$criteria->addSelectColumn(CcprograPeer::FECVEN);

		$criteria->addSelectColumn(CcprograPeer::CODUNI);

		$criteria->addSelectColumn(CcprograPeer::CODCAT);

		$criteria->addSelectColumn(CcprograPeer::OBJETO);

		$criteria->addSelectColumn(CcprograPeer::DESTINO);

		$criteria->addSelectColumn(CcprograPeer::MONFIN);

		$criteria->addSelectColumn(CcprograPeer::CONDIC);

		$criteria->addSelectColumn(CcprograPeer::GARANT);

		$criteria->addSelectColumn(CcprograPeer::RECAUD);

		$criteria->addSelectColumn(CcprograPeer::PLAFIN);

		$criteria->addSelectColumn(CcprograPeer::NOMPROCOM);

		$criteria->addSelectColumn(CcprograPeer::CCPERIOD_ID);

		$criteria->addSelectColumn(CcprograPeer::CCFUEFIN_ID);

		$criteria->addSelectColumn(CcprograPeer::TIPCOM);

	}

	const COUNT = 'COUNT(ccprogra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccprogra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcprograPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcprograPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcprograPeer::doSelectRS($criteria, $con);
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
		$objects = CcprograPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcprograPeer::populateObjects(CcprograPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcprograPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcprograPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcperiod(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcprograPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcprograPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcprograPeer::CCPERIOD_ID, CcperiodPeer::ID);

		$rs = CcprograPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcfuefin(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcprograPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcprograPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcprograPeer::CCFUEFIN_ID, CcfuefinPeer::ID);

		$rs = CcprograPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpdoccom(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcprograPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcprograPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcprograPeer::TIPCOM, CpdoccomPeer::TIPCOM);

		$rs = CcprograPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcperiod(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcprograPeer::addSelectColumns($c);
		$startcol = (CcprograPeer::NUM_COLUMNS - CcprograPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperiodPeer::addSelectColumns($c);

		$c->addJoin(CcprograPeer::CCPERIOD_ID, CcperiodPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcprograPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperiodPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperiod(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcprogra($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcprogras();
				$obj2->addCcprogra($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcfuefin(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcprograPeer::addSelectColumns($c);
		$startcol = (CcprograPeer::NUM_COLUMNS - CcprograPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcfuefinPeer::addSelectColumns($c);

		$c->addJoin(CcprograPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcprograPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcfuefinPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcfuefin(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcprogra($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcprogras();
				$obj2->addCcprogra($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpdoccom(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcprograPeer::addSelectColumns($c);
		$startcol = (CcprograPeer::NUM_COLUMNS - CcprograPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpdoccomPeer::addSelectColumns($c);

		$c->addJoin(CcprograPeer::TIPCOM, CpdoccomPeer::TIPCOM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcprograPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpdoccomPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpdoccom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcprogra($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcprogras();
				$obj2->addCcprogra($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcprograPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcprograPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcprograPeer::CCPERIOD_ID, CcperiodPeer::ID);
	
			$criteria->addJoin(CcprograPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$criteria->addJoin(CcprograPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	
		$rs = CcprograPeer::doSelectRS($criteria, $con);
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

		CcprograPeer::addSelectColumns($c);
		$startcol2 = (CcprograPeer::NUM_COLUMNS - CcprograPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperiodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperiodPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CpdoccomPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CpdoccomPeer::NUM_COLUMNS;
	
			$c->addJoin(CcprograPeer::CCPERIOD_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcprograPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CcprograPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcprograPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperiod(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcprogra($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcprogras();
					$obj2->addCcprogra($obj1);
				}
	

							
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcprogra($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcprogras();
					$obj3->addCcprogra($obj1);
				}
	

							
				$omClass = CpdoccomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCpdoccom(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcprogra($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcprogras();
					$obj4->addCcprogra($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcperiod(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcprograPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcprograPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcprograPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CcprograPeer::TIPCOM, CpdoccomPeer::TIPCOM);
		
			$rs = CcprograPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcfuefin(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcprograPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcprograPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcprograPeer::CCPERIOD_ID, CcperiodPeer::ID);
		
				$criteria->addJoin(CcprograPeer::TIPCOM, CpdoccomPeer::TIPCOM);
		
			$rs = CcprograPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpdoccom(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcprograPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcprograPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcprograPeer::CCPERIOD_ID, CcperiodPeer::ID);
		
				$criteria->addJoin(CcprograPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
			$rs = CcprograPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcperiod(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcprograPeer::addSelectColumns($c);
		$startcol2 = (CcprograPeer::NUM_COLUMNS - CcprograPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcfuefinPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcfuefinPeer::NUM_COLUMNS;
	
			CpdoccomPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpdoccomPeer::NUM_COLUMNS;
	
			$c->addJoin(CcprograPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CcprograPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcprograPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcfuefin(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcprogra($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcprogras();
					$obj2->addCcprogra($obj1);
				}
	
				$omClass = CpdoccomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpdoccom(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcprogra($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcprogras();
					$obj3->addCcprogra($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcfuefin(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcprograPeer::addSelectColumns($c);
		$startcol2 = (CcprograPeer::NUM_COLUMNS - CcprograPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperiodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperiodPeer::NUM_COLUMNS;
	
			CpdoccomPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpdoccomPeer::NUM_COLUMNS;
	
			$c->addJoin(CcprograPeer::CCPERIOD_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcprograPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcprograPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperiod(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcprogra($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcprogras();
					$obj2->addCcprogra($obj1);
				}
	
				$omClass = CpdoccomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpdoccom(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcprogra($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcprogras();
					$obj3->addCcprogra($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpdoccom(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcprograPeer::addSelectColumns($c);
		$startcol2 = (CcprograPeer::NUM_COLUMNS - CcprograPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperiodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperiodPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			$c->addJoin(CcprograPeer::CCPERIOD_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcprograPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcprograPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperiod(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcprogra($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcprogras();
					$obj2->addCcprogra($obj1);
				}
	
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcprogra($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcprogras();
					$obj3->addCcprogra($obj1);
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
		return CcprograPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcprograPeer::ID); 

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
			$comparison = $criteria->getComparison(CcprograPeer::ID);
			$selectCriteria->add(CcprograPeer::ID, $criteria->remove(CcprograPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcprograPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcprograPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccprogra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcprograPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccprogra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcprograPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcprograPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcprograPeer::DATABASE_NAME, CcprograPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcprograPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcprograPeer::DATABASE_NAME);

		$criteria->add(CcprograPeer::ID, $pk);


		$v = CcprograPeer::doSelect($criteria, $con);

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
			$criteria->add(CcprograPeer::ID, $pks, Criteria::IN);
			$objs = CcprograPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcprograPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcprograMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcprograMapBuilder');
}
