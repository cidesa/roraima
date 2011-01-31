<?php


abstract class BaseCcpagoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccpago';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccpago';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccpago.ID';

	
	const MONTOT = 'ccpago.MONTOT';

	
	const NUMTRA = 'ccpago.NUMTRA';

	
	const FECPAG = 'ccpago.FECPAG';

	
	const FECREG = 'ccpago.FECREG';

	
	const NUMCUE = 'ccpago.NUMCUE';

	
	const CEDRIFCUE = 'ccpago.CEDRIFCUE';

	
	const CCPERPARAMO_ID = 'ccpago.CCPERPARAMO_ID';

	
	const CCCUEBAN_ID = 'ccpago.CCCUEBAN_ID';

	
	const CCPERPRE_ID = 'ccpago.CCPERPRE_ID';

	
	const CCTIPTRA_ID = 'ccpago.CCTIPTRA_ID';

	
	const CCCREDIT_ID = 'ccpago.CCCREDIT_ID';

	
	const RESAMOCAP = 'ccpago.RESAMOCAP';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Montot', 'Numtra', 'Fecpag', 'Fecreg', 'Numcue', 'Cedrifcue', 'CcperparamoId', 'CccuebanId', 'CcperpreId', 'CctiptraId', 'CccreditId', 'Resamocap', ),
		BasePeer::TYPE_COLNAME => array (CcpagoPeer::ID, CcpagoPeer::MONTOT, CcpagoPeer::NUMTRA, CcpagoPeer::FECPAG, CcpagoPeer::FECREG, CcpagoPeer::NUMCUE, CcpagoPeer::CEDRIFCUE, CcpagoPeer::CCPERPARAMO_ID, CcpagoPeer::CCCUEBAN_ID, CcpagoPeer::CCPERPRE_ID, CcpagoPeer::CCTIPTRA_ID, CcpagoPeer::CCCREDIT_ID, CcpagoPeer::RESAMOCAP, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'montot', 'numtra', 'fecpag', 'fecreg', 'numcue', 'cedrifcue', 'ccperparamo_id', 'cccueban_id', 'ccperpre_id', 'cctiptra_id', 'cccredit_id', 'resamocap', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Montot' => 1, 'Numtra' => 2, 'Fecpag' => 3, 'Fecreg' => 4, 'Numcue' => 5, 'Cedrifcue' => 6, 'CcperparamoId' => 7, 'CccuebanId' => 8, 'CcperpreId' => 9, 'CctiptraId' => 10, 'CccreditId' => 11, 'Resamocap' => 12, ),
		BasePeer::TYPE_COLNAME => array (CcpagoPeer::ID => 0, CcpagoPeer::MONTOT => 1, CcpagoPeer::NUMTRA => 2, CcpagoPeer::FECPAG => 3, CcpagoPeer::FECREG => 4, CcpagoPeer::NUMCUE => 5, CcpagoPeer::CEDRIFCUE => 6, CcpagoPeer::CCPERPARAMO_ID => 7, CcpagoPeer::CCCUEBAN_ID => 8, CcpagoPeer::CCPERPRE_ID => 9, CcpagoPeer::CCTIPTRA_ID => 10, CcpagoPeer::CCCREDIT_ID => 11, CcpagoPeer::RESAMOCAP => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'montot' => 1, 'numtra' => 2, 'fecpag' => 3, 'fecreg' => 4, 'numcue' => 5, 'cedrifcue' => 6, 'ccperparamo_id' => 7, 'cccueban_id' => 8, 'ccperpre_id' => 9, 'cctiptra_id' => 10, 'cccredit_id' => 11, 'resamocap' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcpagoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcpagoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcpagoPeer::getTableMap();
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
		return str_replace(CcpagoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcpagoPeer::ID);

		$criteria->addSelectColumn(CcpagoPeer::MONTOT);

		$criteria->addSelectColumn(CcpagoPeer::NUMTRA);

		$criteria->addSelectColumn(CcpagoPeer::FECPAG);

		$criteria->addSelectColumn(CcpagoPeer::FECREG);

		$criteria->addSelectColumn(CcpagoPeer::NUMCUE);

		$criteria->addSelectColumn(CcpagoPeer::CEDRIFCUE);

		$criteria->addSelectColumn(CcpagoPeer::CCPERPARAMO_ID);

		$criteria->addSelectColumn(CcpagoPeer::CCCUEBAN_ID);

		$criteria->addSelectColumn(CcpagoPeer::CCPERPRE_ID);

		$criteria->addSelectColumn(CcpagoPeer::CCTIPTRA_ID);

		$criteria->addSelectColumn(CcpagoPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcpagoPeer::RESAMOCAP);

	}

	const COUNT = 'COUNT(ccpago.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccpago.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcpagoPeer::doSelectRS($criteria, $con);
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
		$objects = CcpagoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcpagoPeer::populateObjects(CcpagoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcpagoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcpagoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcperparamo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);

		$rs = CcpagoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccueban(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);

		$rs = CcpagoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);

		$rs = CcpagoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCctiptra(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);

		$rs = CcpagoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcpagoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcperparamo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagoPeer::addSelectColumns($c);
		$startcol = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperparamoPeer::addSelectColumns($c);

		$c->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperparamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperparamo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcpago($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcpagos();
				$obj2->addCcpago($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccueban(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagoPeer::addSelectColumns($c);
		$startcol = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccuebanPeer::addSelectColumns($c);

		$c->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccuebanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccueban(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcpago($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcpagos();
				$obj2->addCcpago($obj1); 			}
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

		CcpagoPeer::addSelectColumns($c);
		$startcol = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperprePeer::addSelectColumns($c);

		$c->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();

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
										$temp_obj2->addCcpago($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcpagos();
				$obj2->addCcpago($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCctiptra(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagoPeer::addSelectColumns($c);
		$startcol = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctiptraPeer::addSelectColumns($c);

		$c->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctiptraPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctiptra(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcpago($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcpagos();
				$obj2->addCcpago($obj1); 			}
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

		CcpagoPeer::addSelectColumns($c);
		$startcol = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();

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
										$temp_obj2->addCcpago($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcpagos();
				$obj2->addCcpago($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcpagoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
	
			$criteria->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$criteria->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$criteria->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$criteria->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
	
		$rs = CcpagoPeer::doSelectRS($criteria, $con);
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

		CcpagoPeer::addSelectColumns($c);
		$startcol2 = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperparamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperparamoPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuebanPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcperprePeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctiptraPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcperparamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperparamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpago($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagos();
					$obj2->addCcpago($obj1);
				}
	

							
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccueban(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcpago($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagos();
					$obj3->addCcpago($obj1);
				}
	

							
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcperpre(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpago($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagos();
					$obj4->addCcpago($obj1);
				}
	

							
				$omClass = CctiptraPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCctiptra(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcpago($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcpagos();
					$obj5->addCcpago($obj1);
				}
	

							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccredit(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcpago($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcpagos();
					$obj6->addCcpago($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcperparamo(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcpagoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcpagoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccueban(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcpagoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcpagoPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcpagoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcpagoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCctiptra(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcpagoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcpagoPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcpagoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcpagoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		
			$rs = CcpagoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcperparamo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagoPeer::addSelectColumns($c);
		$startcol2 = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccuebanPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccuebanPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcperprePeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctiptraPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccueban(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagos();
					$obj2->addCcpago($obj1);
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
						$temp_obj3->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagos();
					$obj3->addCcpago($obj1);
				}
	
				$omClass = CctiptraPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctiptra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagos();
					$obj4->addCcpago($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccredit(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcpagos();
					$obj5->addCcpago($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccueban(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagoPeer::addSelectColumns($c);
		$startcol2 = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperparamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperparamoPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcperprePeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctiptraPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperparamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperparamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagos();
					$obj2->addCcpago($obj1);
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
						$temp_obj3->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagos();
					$obj3->addCcpago($obj1);
				}
	
				$omClass = CctiptraPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctiptra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagos();
					$obj4->addCcpago($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccredit(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcpagos();
					$obj5->addCcpago($obj1);
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

		CcpagoPeer::addSelectColumns($c);
		$startcol2 = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperparamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperparamoPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuebanPeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctiptraPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperparamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperparamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagos();
					$obj2->addCcpago($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccueban(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagos();
					$obj3->addCcpago($obj1);
				}
	
				$omClass = CctiptraPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctiptra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagos();
					$obj4->addCcpago($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccredit(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcpagos();
					$obj5->addCcpago($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCctiptra(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcpagoPeer::addSelectColumns($c);
		$startcol2 = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperparamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperparamoPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuebanPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcperprePeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcpagoPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperparamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperparamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagos();
					$obj2->addCcpago($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccueban(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagos();
					$obj3->addCcpago($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcperpre(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagos();
					$obj4->addCcpago($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccredit(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcpagos();
					$obj5->addCcpago($obj1);
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

		CcpagoPeer::addSelectColumns($c);
		$startcol2 = (CcpagoPeer::NUM_COLUMNS - CcpagoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperparamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperparamoPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuebanPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcperprePeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctiptraPeer::NUM_COLUMNS;
	
			$c->addJoin(CcpagoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcpagoPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcpagoPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcpagoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperparamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperparamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcpagos();
					$obj2->addCcpago($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccueban(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcpagos();
					$obj3->addCcpago($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcperpre(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcpagos();
					$obj4->addCcpago($obj1);
				}
	
				$omClass = CctiptraPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCctiptra(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcpago($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcpagos();
					$obj5->addCcpago($obj1);
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
		return CcpagoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcpagoPeer::ID); 

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
			$comparison = $criteria->getComparison(CcpagoPeer::ID);
			$selectCriteria->add(CcpagoPeer::ID, $criteria->remove(CcpagoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcpagoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcpagoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccpago) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcpagoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccpago $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcpagoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcpagoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcpagoPeer::DATABASE_NAME, CcpagoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcpagoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcpagoPeer::DATABASE_NAME);

		$criteria->add(CcpagoPeer::ID, $pk);


		$v = CcpagoPeer::doSelect($criteria, $con);

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
			$criteria->add(CcpagoPeer::ID, $pks, Criteria::IN);
			$objs = CcpagoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcpagoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcpagoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcpagoMapBuilder');
}
