<?php


abstract class BaseCcavalisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccavalis';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccavalis';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccavalis.ID';

	
	const NOMAVA = 'ccavalis.NOMAVA';

	
	const CEDAVA = 'ccavalis.CEDAVA';

	
	const CORAVA = 'ccavalis.CORAVA';

	
	const CODARETEL = 'ccavalis.CODARETEL';

	
	const NUMTELLOC = 'ccavalis.NUMTELLOC';

	
	const CODARECEL = 'ccavalis.CODARECEL';

	
	const NUMCEL = 'ccavalis.NUMCEL';

	
	const CODAREOTRO = 'ccavalis.CODAREOTRO';

	
	const NUMOTRTEL = 'ccavalis.NUMOTRTEL';

	
	const DIRNOMURB = 'ccavalis.DIRNOMURB';

	
	const DIRNUMCAL = 'ccavalis.DIRNUMCAL';

	
	const DIRNUMCASEDIF = 'ccavalis.DIRNUMCASEDIF';

	
	const DIRNUMPIS = 'ccavalis.DIRNUMPIS';

	
	const DIRPUNREF = 'ccavalis.DIRPUNREF';

	
	const DIRNUMAPT = 'ccavalis.DIRNUMAPT';

	
	const CCPERPRE_ID = 'ccavalis.CCPERPRE_ID';

	
	const CCGARANT_ID = 'ccavalis.CCGARANT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomava', 'Cedava', 'Corava', 'Codaretel', 'Numtelloc', 'Codarecel', 'Numcel', 'Codareotro', 'Numotrtel', 'Dirnomurb', 'Dirnumcal', 'Dirnumcasedif', 'Dirnumpis', 'Dirpunref', 'Dirnumapt', 'CcperpreId', 'CcgarantId', ),
		BasePeer::TYPE_COLNAME => array (CcavalisPeer::ID, CcavalisPeer::NOMAVA, CcavalisPeer::CEDAVA, CcavalisPeer::CORAVA, CcavalisPeer::CODARETEL, CcavalisPeer::NUMTELLOC, CcavalisPeer::CODARECEL, CcavalisPeer::NUMCEL, CcavalisPeer::CODAREOTRO, CcavalisPeer::NUMOTRTEL, CcavalisPeer::DIRNOMURB, CcavalisPeer::DIRNUMCAL, CcavalisPeer::DIRNUMCASEDIF, CcavalisPeer::DIRNUMPIS, CcavalisPeer::DIRPUNREF, CcavalisPeer::DIRNUMAPT, CcavalisPeer::CCPERPRE_ID, CcavalisPeer::CCGARANT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomava', 'cedava', 'corava', 'codaretel', 'numtelloc', 'codarecel', 'numcel', 'codareotro', 'numotrtel', 'dirnomurb', 'dirnumcal', 'dirnumcasedif', 'dirnumpis', 'dirpunref', 'dirnumapt', 'ccperpre_id', 'ccgarant_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomava' => 1, 'Cedava' => 2, 'Corava' => 3, 'Codaretel' => 4, 'Numtelloc' => 5, 'Codarecel' => 6, 'Numcel' => 7, 'Codareotro' => 8, 'Numotrtel' => 9, 'Dirnomurb' => 10, 'Dirnumcal' => 11, 'Dirnumcasedif' => 12, 'Dirnumpis' => 13, 'Dirpunref' => 14, 'Dirnumapt' => 15, 'CcperpreId' => 16, 'CcgarantId' => 17, ),
		BasePeer::TYPE_COLNAME => array (CcavalisPeer::ID => 0, CcavalisPeer::NOMAVA => 1, CcavalisPeer::CEDAVA => 2, CcavalisPeer::CORAVA => 3, CcavalisPeer::CODARETEL => 4, CcavalisPeer::NUMTELLOC => 5, CcavalisPeer::CODARECEL => 6, CcavalisPeer::NUMCEL => 7, CcavalisPeer::CODAREOTRO => 8, CcavalisPeer::NUMOTRTEL => 9, CcavalisPeer::DIRNOMURB => 10, CcavalisPeer::DIRNUMCAL => 11, CcavalisPeer::DIRNUMCASEDIF => 12, CcavalisPeer::DIRNUMPIS => 13, CcavalisPeer::DIRPUNREF => 14, CcavalisPeer::DIRNUMAPT => 15, CcavalisPeer::CCPERPRE_ID => 16, CcavalisPeer::CCGARANT_ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomava' => 1, 'cedava' => 2, 'corava' => 3, 'codaretel' => 4, 'numtelloc' => 5, 'codarecel' => 6, 'numcel' => 7, 'codareotro' => 8, 'numotrtel' => 9, 'dirnomurb' => 10, 'dirnumcal' => 11, 'dirnumcasedif' => 12, 'dirnumpis' => 13, 'dirpunref' => 14, 'dirnumapt' => 15, 'ccperpre_id' => 16, 'ccgarant_id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcavalisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcavalisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcavalisPeer::getTableMap();
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
		return str_replace(CcavalisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcavalisPeer::ID);

		$criteria->addSelectColumn(CcavalisPeer::NOMAVA);

		$criteria->addSelectColumn(CcavalisPeer::CEDAVA);

		$criteria->addSelectColumn(CcavalisPeer::CORAVA);

		$criteria->addSelectColumn(CcavalisPeer::CODARETEL);

		$criteria->addSelectColumn(CcavalisPeer::NUMTELLOC);

		$criteria->addSelectColumn(CcavalisPeer::CODARECEL);

		$criteria->addSelectColumn(CcavalisPeer::NUMCEL);

		$criteria->addSelectColumn(CcavalisPeer::CODAREOTRO);

		$criteria->addSelectColumn(CcavalisPeer::NUMOTRTEL);

		$criteria->addSelectColumn(CcavalisPeer::DIRNOMURB);

		$criteria->addSelectColumn(CcavalisPeer::DIRNUMCAL);

		$criteria->addSelectColumn(CcavalisPeer::DIRNUMCASEDIF);

		$criteria->addSelectColumn(CcavalisPeer::DIRNUMPIS);

		$criteria->addSelectColumn(CcavalisPeer::DIRPUNREF);

		$criteria->addSelectColumn(CcavalisPeer::DIRNUMAPT);

		$criteria->addSelectColumn(CcavalisPeer::CCPERPRE_ID);

		$criteria->addSelectColumn(CcavalisPeer::CCGARANT_ID);

	}

	const COUNT = 'COUNT(ccavalis.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccavalis.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcavalisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcavalisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcavalisPeer::doSelectRS($criteria, $con);
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
		$objects = CcavalisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcavalisPeer::populateObjects(CcavalisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcavalisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcavalisPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcperpre(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcavalisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcavalisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcavalisPeer::CCPERPRE_ID, CcperprePeer::ID);

		$rs = CcavalisPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcgarant(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcavalisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcavalisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcavalisPeer::CCGARANT_ID, CcgarantPeer::ID);

		$rs = CcavalisPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcavalisPeer::addSelectColumns($c);
		$startcol = (CcavalisPeer::NUM_COLUMNS - CcavalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperprePeer::addSelectColumns($c);

		$c->addJoin(CcavalisPeer::CCPERPRE_ID, CcperprePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcavalisPeer::getOMClass();

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
										$temp_obj2->addCcavalis($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcavaliss();
				$obj2->addCcavalis($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcgarant(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcavalisPeer::addSelectColumns($c);
		$startcol = (CcavalisPeer::NUM_COLUMNS - CcavalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcgarantPeer::addSelectColumns($c);

		$c->addJoin(CcavalisPeer::CCGARANT_ID, CcgarantPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcavalisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcgarantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcgarant(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcavalis($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcavaliss();
				$obj2->addCcavalis($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcavalisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcavalisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcavalisPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$criteria->addJoin(CcavalisPeer::CCGARANT_ID, CcgarantPeer::ID);
	
		$rs = CcavalisPeer::doSelectRS($criteria, $con);
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

		CcavalisPeer::addSelectColumns($c);
		$startcol2 = (CcavalisPeer::NUM_COLUMNS - CcavalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcgarantPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcgarantPeer::NUM_COLUMNS;
	
			$c->addJoin(CcavalisPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcavalisPeer::CCGARANT_ID, CcgarantPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcavalisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcavalis($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcavaliss();
					$obj2->addCcavalis($obj1);
				}
	

							
				$omClass = CcgarantPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcgarant(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcavalis($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcavaliss();
					$obj3->addCcavalis($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcperpre(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcavalisPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcavalisPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcavalisPeer::CCGARANT_ID, CcgarantPeer::ID);
		
			$rs = CcavalisPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcgarant(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcavalisPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcavalisPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcavalisPeer::CCPERPRE_ID, CcperprePeer::ID);
		
			$rs = CcavalisPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcavalisPeer::addSelectColumns($c);
		$startcol2 = (CcavalisPeer::NUM_COLUMNS - CcavalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcgarantPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcgarantPeer::NUM_COLUMNS;
	
			$c->addJoin(CcavalisPeer::CCGARANT_ID, CcgarantPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcavalisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcgarantPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcgarant(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcavalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcavaliss();
					$obj2->addCcavalis($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcgarant(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcavalisPeer::addSelectColumns($c);
		$startcol2 = (CcavalisPeer::NUM_COLUMNS - CcavalisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			$c->addJoin(CcavalisPeer::CCPERPRE_ID, CcperprePeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcavalisPeer::getOMClass();

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
						$temp_obj2->addCcavalis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcavaliss();
					$obj2->addCcavalis($obj1);
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
		return CcavalisPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcavalisPeer::ID); 

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
			$comparison = $criteria->getComparison(CcavalisPeer::ID);
			$selectCriteria->add(CcavalisPeer::ID, $criteria->remove(CcavalisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcavalisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcavalisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccavalis) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcavalisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccavalis $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcavalisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcavalisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcavalisPeer::DATABASE_NAME, CcavalisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcavalisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcavalisPeer::DATABASE_NAME);

		$criteria->add(CcavalisPeer::ID, $pk);


		$v = CcavalisPeer::doSelect($criteria, $con);

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
			$criteria->add(CcavalisPeer::ID, $pks, Criteria::IN);
			$objs = CcavalisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcavalisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcavalisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcavalisMapBuilder');
}
