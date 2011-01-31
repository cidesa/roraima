<?php


abstract class BaseCadefcenacoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadefcenaco';

	
	const CLASS_DEFAULT = 'lib.model.Cadefcenaco';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCENACO = 'cadefcenaco.CODCENACO';

	
	const DESCENACO = 'cadefcenaco.DESCENACO';

	
	const CODPAI = 'cadefcenaco.CODPAI';

	
	const CODEDO = 'cadefcenaco.CODEDO';

	
	const CODCIU = 'cadefcenaco.CODCIU';

	
	const CODMUN = 'cadefcenaco.CODMUN';

	
	const ID = 'cadefcenaco.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcenaco', 'Descenaco', 'Codpai', 'Codedo', 'Codciu', 'Codmun', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadefcenacoPeer::CODCENACO, CadefcenacoPeer::DESCENACO, CadefcenacoPeer::CODPAI, CadefcenacoPeer::CODEDO, CadefcenacoPeer::CODCIU, CadefcenacoPeer::CODMUN, CadefcenacoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcenaco', 'descenaco', 'codpai', 'codedo', 'codciu', 'codmun', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcenaco' => 0, 'Descenaco' => 1, 'Codpai' => 2, 'Codedo' => 3, 'Codciu' => 4, 'Codmun' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (CadefcenacoPeer::CODCENACO => 0, CadefcenacoPeer::DESCENACO => 1, CadefcenacoPeer::CODPAI => 2, CadefcenacoPeer::CODEDO => 3, CadefcenacoPeer::CODCIU => 4, CadefcenacoPeer::CODMUN => 5, CadefcenacoPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codcenaco' => 0, 'descenaco' => 1, 'codpai' => 2, 'codedo' => 3, 'codciu' => 4, 'codmun' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CadefcenacoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CadefcenacoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadefcenacoPeer::getTableMap();
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
		return str_replace(CadefcenacoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadefcenacoPeer::CODCENACO);

		$criteria->addSelectColumn(CadefcenacoPeer::DESCENACO);

		$criteria->addSelectColumn(CadefcenacoPeer::CODPAI);

		$criteria->addSelectColumn(CadefcenacoPeer::CODEDO);

		$criteria->addSelectColumn(CadefcenacoPeer::CODCIU);

		$criteria->addSelectColumn(CadefcenacoPeer::CODMUN);

		$criteria->addSelectColumn(CadefcenacoPeer::ID);

	}

	const COUNT = 'COUNT(cadefcenaco.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadefcenaco.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadefcenacoPeer::doSelectRS($criteria, $con);
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
		$objects = CadefcenacoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadefcenacoPeer::populateObjects(CadefcenacoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadefcenacoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadefcenacoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinOcpais(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CadefcenacoPeer::CODPAI, OcpaisPeer::CODPAI);

		$rs = CadefcenacoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinOcestado(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CadefcenacoPeer::CODEDO, OcestadoPeer::CODEDO);

		$rs = CadefcenacoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinOcciudad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CadefcenacoPeer::CODCIU, OcciudadPeer::CODCIU);

		$rs = CadefcenacoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinOcmunici(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CadefcenacoPeer::CODMUN, OcmuniciPeer::CODMUN);

		$rs = CadefcenacoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinOcpais(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefcenacoPeer::addSelectColumns($c);
		$startcol = (CadefcenacoPeer::NUM_COLUMNS - CadefcenacoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OcpaisPeer::addSelectColumns($c);

		$c->addJoin(CadefcenacoPeer::CODPAI, OcpaisPeer::CODPAI);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefcenacoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OcpaisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOcpais(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCadefcenaco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCadefcenacos();
				$obj2->addCadefcenaco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinOcestado(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefcenacoPeer::addSelectColumns($c);
		$startcol = (CadefcenacoPeer::NUM_COLUMNS - CadefcenacoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OcestadoPeer::addSelectColumns($c);

		$c->addJoin(CadefcenacoPeer::CODEDO, OcestadoPeer::CODEDO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefcenacoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OcestadoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOcestado(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCadefcenaco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCadefcenacos();
				$obj2->addCadefcenaco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinOcciudad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefcenacoPeer::addSelectColumns($c);
		$startcol = (CadefcenacoPeer::NUM_COLUMNS - CadefcenacoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OcciudadPeer::addSelectColumns($c);

		$c->addJoin(CadefcenacoPeer::CODCIU, OcciudadPeer::CODCIU);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefcenacoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OcciudadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOcciudad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCadefcenaco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCadefcenacos();
				$obj2->addCadefcenaco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinOcmunici(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefcenacoPeer::addSelectColumns($c);
		$startcol = (CadefcenacoPeer::NUM_COLUMNS - CadefcenacoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OcmuniciPeer::addSelectColumns($c);

		$c->addJoin(CadefcenacoPeer::CODMUN, OcmuniciPeer::CODMUN);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefcenacoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OcmuniciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOcmunici(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCadefcenaco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCadefcenacos();
				$obj2->addCadefcenaco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefcenacoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CadefcenacoPeer::CODPAI, OcpaisPeer::CODPAI);
	
			$criteria->addJoin(CadefcenacoPeer::CODEDO, OcestadoPeer::CODEDO);
	
			$criteria->addJoin(CadefcenacoPeer::CODCIU, OcciudadPeer::CODCIU);
	
			$criteria->addJoin(CadefcenacoPeer::CODMUN, OcmuniciPeer::CODMUN);
	
		$rs = CadefcenacoPeer::doSelectRS($criteria, $con);
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

		CadefcenacoPeer::addSelectColumns($c);
		$startcol2 = (CadefcenacoPeer::NUM_COLUMNS - CadefcenacoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OcpaisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OcpaisPeer::NUM_COLUMNS;
	
			OcestadoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OcestadoPeer::NUM_COLUMNS;
	
			OcciudadPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + OcciudadPeer::NUM_COLUMNS;
	
			OcmuniciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + OcmuniciPeer::NUM_COLUMNS;
	
			$c->addJoin(CadefcenacoPeer::CODPAI, OcpaisPeer::CODPAI);
	
			$c->addJoin(CadefcenacoPeer::CODEDO, OcestadoPeer::CODEDO);
	
			$c->addJoin(CadefcenacoPeer::CODCIU, OcciudadPeer::CODCIU);
	
			$c->addJoin(CadefcenacoPeer::CODMUN, OcmuniciPeer::CODMUN);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefcenacoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = OcpaisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOcpais(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCadefcenaco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCadefcenacos();
					$obj2->addCadefcenaco($obj1);
				}
	

							
				$omClass = OcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOcestado(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCadefcenaco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCadefcenacos();
					$obj3->addCadefcenaco($obj1);
				}
	

							
				$omClass = OcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getOcciudad(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCadefcenaco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCadefcenacos();
					$obj4->addCadefcenaco($obj1);
				}
	

							
				$omClass = OcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getOcmunici(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCadefcenaco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCadefcenacos();
					$obj5->addCadefcenaco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptOcpais(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CadefcenacoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CadefcenacoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CadefcenacoPeer::CODEDO, OcestadoPeer::CODEDO);
		
				$criteria->addJoin(CadefcenacoPeer::CODCIU, OcciudadPeer::CODCIU);
		
				$criteria->addJoin(CadefcenacoPeer::CODMUN, OcmuniciPeer::CODMUN);
		
			$rs = CadefcenacoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptOcestado(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CadefcenacoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CadefcenacoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CadefcenacoPeer::CODPAI, OcpaisPeer::CODPAI);
		
				$criteria->addJoin(CadefcenacoPeer::CODCIU, OcciudadPeer::CODCIU);
		
				$criteria->addJoin(CadefcenacoPeer::CODMUN, OcmuniciPeer::CODMUN);
		
			$rs = CadefcenacoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptOcciudad(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CadefcenacoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CadefcenacoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CadefcenacoPeer::CODPAI, OcpaisPeer::CODPAI);
		
				$criteria->addJoin(CadefcenacoPeer::CODEDO, OcestadoPeer::CODEDO);
		
				$criteria->addJoin(CadefcenacoPeer::CODMUN, OcmuniciPeer::CODMUN);
		
			$rs = CadefcenacoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptOcmunici(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CadefcenacoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CadefcenacoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CadefcenacoPeer::CODPAI, OcpaisPeer::CODPAI);
		
				$criteria->addJoin(CadefcenacoPeer::CODEDO, OcestadoPeer::CODEDO);
		
				$criteria->addJoin(CadefcenacoPeer::CODCIU, OcciudadPeer::CODCIU);
		
			$rs = CadefcenacoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptOcpais(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefcenacoPeer::addSelectColumns($c);
		$startcol2 = (CadefcenacoPeer::NUM_COLUMNS - CadefcenacoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OcestadoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OcestadoPeer::NUM_COLUMNS;
	
			OcciudadPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OcciudadPeer::NUM_COLUMNS;
	
			OcmuniciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + OcmuniciPeer::NUM_COLUMNS;
	
			$c->addJoin(CadefcenacoPeer::CODEDO, OcestadoPeer::CODEDO);
	
			$c->addJoin(CadefcenacoPeer::CODCIU, OcciudadPeer::CODCIU);
	
			$c->addJoin(CadefcenacoPeer::CODMUN, OcmuniciPeer::CODMUN);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefcenacoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = OcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOcestado(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCadefcenacos();
					$obj2->addCadefcenaco($obj1);
				}
	
				$omClass = OcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOcciudad(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCadefcenacos();
					$obj3->addCadefcenaco($obj1);
				}
	
				$omClass = OcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getOcmunici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCadefcenacos();
					$obj4->addCadefcenaco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptOcestado(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefcenacoPeer::addSelectColumns($c);
		$startcol2 = (CadefcenacoPeer::NUM_COLUMNS - CadefcenacoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OcpaisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OcpaisPeer::NUM_COLUMNS;
	
			OcciudadPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OcciudadPeer::NUM_COLUMNS;
	
			OcmuniciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + OcmuniciPeer::NUM_COLUMNS;
	
			$c->addJoin(CadefcenacoPeer::CODPAI, OcpaisPeer::CODPAI);
	
			$c->addJoin(CadefcenacoPeer::CODCIU, OcciudadPeer::CODCIU);
	
			$c->addJoin(CadefcenacoPeer::CODMUN, OcmuniciPeer::CODMUN);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefcenacoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = OcpaisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOcpais(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCadefcenacos();
					$obj2->addCadefcenaco($obj1);
				}
	
				$omClass = OcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOcciudad(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCadefcenacos();
					$obj3->addCadefcenaco($obj1);
				}
	
				$omClass = OcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getOcmunici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCadefcenacos();
					$obj4->addCadefcenaco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptOcciudad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefcenacoPeer::addSelectColumns($c);
		$startcol2 = (CadefcenacoPeer::NUM_COLUMNS - CadefcenacoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OcpaisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OcpaisPeer::NUM_COLUMNS;
	
			OcestadoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OcestadoPeer::NUM_COLUMNS;
	
			OcmuniciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + OcmuniciPeer::NUM_COLUMNS;
	
			$c->addJoin(CadefcenacoPeer::CODPAI, OcpaisPeer::CODPAI);
	
			$c->addJoin(CadefcenacoPeer::CODEDO, OcestadoPeer::CODEDO);
	
			$c->addJoin(CadefcenacoPeer::CODMUN, OcmuniciPeer::CODMUN);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefcenacoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = OcpaisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOcpais(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCadefcenacos();
					$obj2->addCadefcenaco($obj1);
				}
	
				$omClass = OcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOcestado(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCadefcenacos();
					$obj3->addCadefcenaco($obj1);
				}
	
				$omClass = OcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getOcmunici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCadefcenacos();
					$obj4->addCadefcenaco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptOcmunici(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefcenacoPeer::addSelectColumns($c);
		$startcol2 = (CadefcenacoPeer::NUM_COLUMNS - CadefcenacoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OcpaisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OcpaisPeer::NUM_COLUMNS;
	
			OcestadoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OcestadoPeer::NUM_COLUMNS;
	
			OcciudadPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + OcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CadefcenacoPeer::CODPAI, OcpaisPeer::CODPAI);
	
			$c->addJoin(CadefcenacoPeer::CODEDO, OcestadoPeer::CODEDO);
	
			$c->addJoin(CadefcenacoPeer::CODCIU, OcciudadPeer::CODCIU);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefcenacoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = OcpaisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOcpais(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCadefcenacos();
					$obj2->addCadefcenaco($obj1);
				}
	
				$omClass = OcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOcestado(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCadefcenacos();
					$obj3->addCadefcenaco($obj1);
				}
	
				$omClass = OcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getOcciudad(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCadefcenaco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCadefcenacos();
					$obj4->addCadefcenaco($obj1);
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
		return CadefcenacoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CadefcenacoPeer::ID); 

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
			$comparison = $criteria->getComparison(CadefcenacoPeer::ID);
			$selectCriteria->add(CadefcenacoPeer::ID, $criteria->remove(CadefcenacoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadefcenacoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadefcenacoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadefcenaco) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadefcenacoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadefcenaco $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadefcenacoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadefcenacoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadefcenacoPeer::DATABASE_NAME, CadefcenacoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadefcenacoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadefcenacoPeer::DATABASE_NAME);

		$criteria->add(CadefcenacoPeer::ID, $pk);


		$v = CadefcenacoPeer::doSelect($criteria, $con);

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
			$criteria->add(CadefcenacoPeer::ID, $pks, Criteria::IN);
			$objs = CadefcenacoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadefcenacoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CadefcenacoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CadefcenacoMapBuilder');
}
