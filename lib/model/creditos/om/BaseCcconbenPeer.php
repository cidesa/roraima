<?php


abstract class BaseCcconbenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccconben';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccconben';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccconben.ID';

	
	const CEDCON = 'ccconben.CEDCON';

	
	const NOMCON = 'ccconben.NOMCON';

	
	const LUGTRACON = 'ccconben.LUGTRACON';

	
	const TELCON = 'ccconben.TELCON';

	
	const CELCON = 'ccconben.CELCON';

	
	const FECNAC = 'ccconben.FECNAC';

	
	const DIRNOMURB = 'ccconben.DIRNOMURB';

	
	const DIRCALLES = 'ccconben.DIRCALLES';

	
	const DIRCASEDI = 'ccconben.DIRCASEDI';

	
	const DIRNUMPIS = 'ccconben.DIRNUMPIS';

	
	const DIRAPATAR = 'ccconben.DIRAPATAR';

	
	const DIRPUNREF = 'ccconben.DIRPUNREF';

	
	const CODARETEL = 'ccconben.CODARETEL';

	
	const CODARECEL = 'ccconben.CODARECEL';

	
	const CORELE = 'ccconben.CORELE';

	
	const OCUPA = 'ccconben.OCUPA';

	
	const PROFE = 'ccconben.PROFE';

	
	const INGMEN = 'ccconben.INGMEN';

	
	const CCPERPRE_ID = 'ccconben.CCPERPRE_ID';

	
	const CCBENEFI_ID = 'ccconben.CCBENEFI_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Cedcon', 'Nomcon', 'Lugtracon', 'Telcon', 'Celcon', 'Fecnac', 'Dirnomurb', 'Dircalles', 'Dircasedi', 'Dirnumpis', 'Dirapatar', 'Dirpunref', 'Codaretel', 'Codarecel', 'Corele', 'Ocupa', 'Profe', 'Ingmen', 'CcperpreId', 'CcbenefiId', ),
		BasePeer::TYPE_COLNAME => array (CcconbenPeer::ID, CcconbenPeer::CEDCON, CcconbenPeer::NOMCON, CcconbenPeer::LUGTRACON, CcconbenPeer::TELCON, CcconbenPeer::CELCON, CcconbenPeer::FECNAC, CcconbenPeer::DIRNOMURB, CcconbenPeer::DIRCALLES, CcconbenPeer::DIRCASEDI, CcconbenPeer::DIRNUMPIS, CcconbenPeer::DIRAPATAR, CcconbenPeer::DIRPUNREF, CcconbenPeer::CODARETEL, CcconbenPeer::CODARECEL, CcconbenPeer::CORELE, CcconbenPeer::OCUPA, CcconbenPeer::PROFE, CcconbenPeer::INGMEN, CcconbenPeer::CCPERPRE_ID, CcconbenPeer::CCBENEFI_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'cedcon', 'nomcon', 'lugtracon', 'telcon', 'celcon', 'fecnac', 'dirnomurb', 'dircalles', 'dircasedi', 'dirnumpis', 'dirapatar', 'dirpunref', 'codaretel', 'codarecel', 'corele', 'ocupa', 'profe', 'ingmen', 'ccperpre_id', 'ccbenefi_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Cedcon' => 1, 'Nomcon' => 2, 'Lugtracon' => 3, 'Telcon' => 4, 'Celcon' => 5, 'Fecnac' => 6, 'Dirnomurb' => 7, 'Dircalles' => 8, 'Dircasedi' => 9, 'Dirnumpis' => 10, 'Dirapatar' => 11, 'Dirpunref' => 12, 'Codaretel' => 13, 'Codarecel' => 14, 'Corele' => 15, 'Ocupa' => 16, 'Profe' => 17, 'Ingmen' => 18, 'CcperpreId' => 19, 'CcbenefiId' => 20, ),
		BasePeer::TYPE_COLNAME => array (CcconbenPeer::ID => 0, CcconbenPeer::CEDCON => 1, CcconbenPeer::NOMCON => 2, CcconbenPeer::LUGTRACON => 3, CcconbenPeer::TELCON => 4, CcconbenPeer::CELCON => 5, CcconbenPeer::FECNAC => 6, CcconbenPeer::DIRNOMURB => 7, CcconbenPeer::DIRCALLES => 8, CcconbenPeer::DIRCASEDI => 9, CcconbenPeer::DIRNUMPIS => 10, CcconbenPeer::DIRAPATAR => 11, CcconbenPeer::DIRPUNREF => 12, CcconbenPeer::CODARETEL => 13, CcconbenPeer::CODARECEL => 14, CcconbenPeer::CORELE => 15, CcconbenPeer::OCUPA => 16, CcconbenPeer::PROFE => 17, CcconbenPeer::INGMEN => 18, CcconbenPeer::CCPERPRE_ID => 19, CcconbenPeer::CCBENEFI_ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'cedcon' => 1, 'nomcon' => 2, 'lugtracon' => 3, 'telcon' => 4, 'celcon' => 5, 'fecnac' => 6, 'dirnomurb' => 7, 'dircalles' => 8, 'dircasedi' => 9, 'dirnumpis' => 10, 'dirapatar' => 11, 'dirpunref' => 12, 'codaretel' => 13, 'codarecel' => 14, 'corele' => 15, 'ocupa' => 16, 'profe' => 17, 'ingmen' => 18, 'ccperpre_id' => 19, 'ccbenefi_id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcconbenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcconbenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcconbenPeer::getTableMap();
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
		return str_replace(CcconbenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcconbenPeer::ID);

		$criteria->addSelectColumn(CcconbenPeer::CEDCON);

		$criteria->addSelectColumn(CcconbenPeer::NOMCON);

		$criteria->addSelectColumn(CcconbenPeer::LUGTRACON);

		$criteria->addSelectColumn(CcconbenPeer::TELCON);

		$criteria->addSelectColumn(CcconbenPeer::CELCON);

		$criteria->addSelectColumn(CcconbenPeer::FECNAC);

		$criteria->addSelectColumn(CcconbenPeer::DIRNOMURB);

		$criteria->addSelectColumn(CcconbenPeer::DIRCALLES);

		$criteria->addSelectColumn(CcconbenPeer::DIRCASEDI);

		$criteria->addSelectColumn(CcconbenPeer::DIRNUMPIS);

		$criteria->addSelectColumn(CcconbenPeer::DIRAPATAR);

		$criteria->addSelectColumn(CcconbenPeer::DIRPUNREF);

		$criteria->addSelectColumn(CcconbenPeer::CODARETEL);

		$criteria->addSelectColumn(CcconbenPeer::CODARECEL);

		$criteria->addSelectColumn(CcconbenPeer::CORELE);

		$criteria->addSelectColumn(CcconbenPeer::OCUPA);

		$criteria->addSelectColumn(CcconbenPeer::PROFE);

		$criteria->addSelectColumn(CcconbenPeer::INGMEN);

		$criteria->addSelectColumn(CcconbenPeer::CCPERPRE_ID);

		$criteria->addSelectColumn(CcconbenPeer::CCBENEFI_ID);

	}

	const COUNT = 'COUNT(ccconben.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccconben.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcconbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcconbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcconbenPeer::doSelectRS($criteria, $con);
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
		$objects = CcconbenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcconbenPeer::populateObjects(CcconbenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcconbenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcconbenPeer::getOMClass();
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
			$criteria->addSelectColumn(CcconbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcconbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcconbenPeer::CCPERPRE_ID, CcperprePeer::ID);

		$rs = CcconbenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcconbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcconbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcconbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);

		$rs = CcconbenPeer::doSelectRS($criteria, $con);
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

		CcconbenPeer::addSelectColumns($c);
		$startcol = (CcconbenPeer::NUM_COLUMNS - CcconbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperprePeer::addSelectColumns($c);

		$c->addJoin(CcconbenPeer::CCPERPRE_ID, CcperprePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcconbenPeer::getOMClass();

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
										$temp_obj2->addCcconben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcconbens();
				$obj2->addCcconben($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcconbenPeer::addSelectColumns($c);
		$startcol = (CcconbenPeer::NUM_COLUMNS - CcconbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbenefiPeer::addSelectColumns($c);

		$c->addJoin(CcconbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcconbenPeer::getOMClass();

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
										$temp_obj2->addCcconben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcconbens();
				$obj2->addCcconben($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcconbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcconbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcconbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$criteria->addJoin(CcconbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
		$rs = CcconbenPeer::doSelectRS($criteria, $con);
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

		CcconbenPeer::addSelectColumns($c);
		$startcol2 = (CcconbenPeer::NUM_COLUMNS - CcconbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CcconbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcconbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcconbenPeer::getOMClass();


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
						$temp_obj2->addCcconben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcconbens();
					$obj2->addCcconben($obj1);
				}
	

							
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcconben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcconbens();
					$obj3->addCcconben($obj1);
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
				$criteria->addSelectColumn(CcconbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcconbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcconbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
			$rs = CcconbenPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcbenefi(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcconbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcconbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcconbenPeer::CCPERPRE_ID, CcperprePeer::ID);
		
			$rs = CcconbenPeer::doSelectRS($criteria, $con);
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

		CcconbenPeer::addSelectColumns($c);
		$startcol2 = (CcconbenPeer::NUM_COLUMNS - CcconbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CcconbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcconbenPeer::getOMClass();

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
						$temp_obj2->addCcconben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcconbens();
					$obj2->addCcconben($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcconbenPeer::addSelectColumns($c);
		$startcol2 = (CcconbenPeer::NUM_COLUMNS - CcconbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			$c->addJoin(CcconbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcconbenPeer::getOMClass();

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
						$temp_obj2->addCcconben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcconbens();
					$obj2->addCcconben($obj1);
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
		return CcconbenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcconbenPeer::ID); 

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
			$comparison = $criteria->getComparison(CcconbenPeer::ID);
			$selectCriteria->add(CcconbenPeer::ID, $criteria->remove(CcconbenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcconbenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcconbenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccconben) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcconbenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccconben $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcconbenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcconbenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcconbenPeer::DATABASE_NAME, CcconbenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcconbenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcconbenPeer::DATABASE_NAME);

		$criteria->add(CcconbenPeer::ID, $pk);


		$v = CcconbenPeer::doSelect($criteria, $con);

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
			$criteria->add(CcconbenPeer::ID, $pks, Criteria::IN);
			$objs = CcconbenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcconbenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcconbenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcconbenMapBuilder');
}
