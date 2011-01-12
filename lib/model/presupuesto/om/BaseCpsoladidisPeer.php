<?php


abstract class BaseCpsoladidisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpsoladidis';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpsoladidis';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DESPRE = 'cpsoladidis.DESPRE';

	
	const JUSTIFICACION = 'cpsoladidis.JUSTIFICACION';

	
	const ENUNCIADO = 'cpsoladidis.ENUNCIADO';

	
	const REFADI = 'cpsoladidis.REFADI';

	
	const FECADI = 'cpsoladidis.FECADI';

	
	const ANOADI = 'cpsoladidis.ANOADI';

	
	const DESADI = 'cpsoladidis.DESADI';

	
	const DESANU = 'cpsoladidis.DESANU';

	
	const FECANU = 'cpsoladidis.FECANU';

	
	const TOTADI = 'cpsoladidis.TOTADI';

	
	const STAADI = 'cpsoladidis.STAADI';

	
	const ADIDIS = 'cpsoladidis.ADIDIS';

	
	const CODART = 'cpsoladidis.CODART';

	
	const STACON = 'cpsoladidis.STACON';

	
	const FECCON = 'cpsoladidis.FECCON';

	
	const DESCON = 'cpsoladidis.DESCON';

	
	const STAGOB = 'cpsoladidis.STAGOB';

	
	const FECGOB = 'cpsoladidis.FECGOB';

	
	const DESGOB = 'cpsoladidis.DESGOB';

	
	const STAPRE = 'cpsoladidis.STAPRE';

	
	const FECPRE = 'cpsoladidis.FECPRE';

	
	const ID = 'cpsoladidis.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Despre', 'Justificacion', 'Enunciado', 'Refadi', 'Fecadi', 'Anoadi', 'Desadi', 'Desanu', 'Fecanu', 'Totadi', 'Staadi', 'Adidis', 'Codart', 'Stacon', 'Feccon', 'Descon', 'Stagob', 'Fecgob', 'Desgob', 'Stapre', 'Fecpre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpsoladidisPeer::DESPRE, CpsoladidisPeer::JUSTIFICACION, CpsoladidisPeer::ENUNCIADO, CpsoladidisPeer::REFADI, CpsoladidisPeer::FECADI, CpsoladidisPeer::ANOADI, CpsoladidisPeer::DESADI, CpsoladidisPeer::DESANU, CpsoladidisPeer::FECANU, CpsoladidisPeer::TOTADI, CpsoladidisPeer::STAADI, CpsoladidisPeer::ADIDIS, CpsoladidisPeer::CODART, CpsoladidisPeer::STACON, CpsoladidisPeer::FECCON, CpsoladidisPeer::DESCON, CpsoladidisPeer::STAGOB, CpsoladidisPeer::FECGOB, CpsoladidisPeer::DESGOB, CpsoladidisPeer::STAPRE, CpsoladidisPeer::FECPRE, CpsoladidisPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('despre', 'justificacion', 'enunciado', 'refadi', 'fecadi', 'anoadi', 'desadi', 'desanu', 'fecanu', 'totadi', 'staadi', 'adidis', 'codart', 'stacon', 'feccon', 'descon', 'stagob', 'fecgob', 'desgob', 'stapre', 'fecpre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Despre' => 0, 'Justificacion' => 1, 'Enunciado' => 2, 'Refadi' => 3, 'Fecadi' => 4, 'Anoadi' => 5, 'Desadi' => 6, 'Desanu' => 7, 'Fecanu' => 8, 'Totadi' => 9, 'Staadi' => 10, 'Adidis' => 11, 'Codart' => 12, 'Stacon' => 13, 'Feccon' => 14, 'Descon' => 15, 'Stagob' => 16, 'Fecgob' => 17, 'Desgob' => 18, 'Stapre' => 19, 'Fecpre' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (CpsoladidisPeer::DESPRE => 0, CpsoladidisPeer::JUSTIFICACION => 1, CpsoladidisPeer::ENUNCIADO => 2, CpsoladidisPeer::REFADI => 3, CpsoladidisPeer::FECADI => 4, CpsoladidisPeer::ANOADI => 5, CpsoladidisPeer::DESADI => 6, CpsoladidisPeer::DESANU => 7, CpsoladidisPeer::FECANU => 8, CpsoladidisPeer::TOTADI => 9, CpsoladidisPeer::STAADI => 10, CpsoladidisPeer::ADIDIS => 11, CpsoladidisPeer::CODART => 12, CpsoladidisPeer::STACON => 13, CpsoladidisPeer::FECCON => 14, CpsoladidisPeer::DESCON => 15, CpsoladidisPeer::STAGOB => 16, CpsoladidisPeer::FECGOB => 17, CpsoladidisPeer::DESGOB => 18, CpsoladidisPeer::STAPRE => 19, CpsoladidisPeer::FECPRE => 20, CpsoladidisPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('despre' => 0, 'justificacion' => 1, 'enunciado' => 2, 'refadi' => 3, 'fecadi' => 4, 'anoadi' => 5, 'desadi' => 6, 'desanu' => 7, 'fecanu' => 8, 'totadi' => 9, 'staadi' => 10, 'adidis' => 11, 'codart' => 12, 'stacon' => 13, 'feccon' => 14, 'descon' => 15, 'stagob' => 16, 'fecgob' => 17, 'desgob' => 18, 'stapre' => 19, 'fecpre' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpsoladidisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpsoladidisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpsoladidisPeer::getTableMap();
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
		return str_replace(CpsoladidisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpsoladidisPeer::DESPRE);

		$criteria->addSelectColumn(CpsoladidisPeer::JUSTIFICACION);

		$criteria->addSelectColumn(CpsoladidisPeer::ENUNCIADO);

		$criteria->addSelectColumn(CpsoladidisPeer::REFADI);

		$criteria->addSelectColumn(CpsoladidisPeer::FECADI);

		$criteria->addSelectColumn(CpsoladidisPeer::ANOADI);

		$criteria->addSelectColumn(CpsoladidisPeer::DESADI);

		$criteria->addSelectColumn(CpsoladidisPeer::DESANU);

		$criteria->addSelectColumn(CpsoladidisPeer::FECANU);

		$criteria->addSelectColumn(CpsoladidisPeer::TOTADI);

		$criteria->addSelectColumn(CpsoladidisPeer::STAADI);

		$criteria->addSelectColumn(CpsoladidisPeer::ADIDIS);

		$criteria->addSelectColumn(CpsoladidisPeer::CODART);

		$criteria->addSelectColumn(CpsoladidisPeer::STACON);

		$criteria->addSelectColumn(CpsoladidisPeer::FECCON);

		$criteria->addSelectColumn(CpsoladidisPeer::DESCON);

		$criteria->addSelectColumn(CpsoladidisPeer::STAGOB);

		$criteria->addSelectColumn(CpsoladidisPeer::FECGOB);

		$criteria->addSelectColumn(CpsoladidisPeer::DESGOB);

		$criteria->addSelectColumn(CpsoladidisPeer::STAPRE);

		$criteria->addSelectColumn(CpsoladidisPeer::FECPRE);

		$criteria->addSelectColumn(CpsoladidisPeer::ID);

	}

	const COUNT = 'COUNT(cpsoladidis.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpsoladidis.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpsoladidisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpsoladidisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpsoladidisPeer::doSelectRS($criteria, $con);
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
		$objects = CpsoladidisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpsoladidisPeer::populateObjects(CpsoladidisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpsoladidisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpsoladidisPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpadidis(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpsoladidisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpsoladidisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpsoladidisPeer::REFADI, CpadidisPeer::REFADI);

		$rs = CpsoladidisPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpartley(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpsoladidisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpsoladidisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpsoladidisPeer::CODART, CpartleyPeer::CODART);

		$rs = CpsoladidisPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpadidis(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpsoladidisPeer::addSelectColumns($c);
		$startcol = (CpsoladidisPeer::NUM_COLUMNS - CpsoladidisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpadidisPeer::addSelectColumns($c);

		$c->addJoin(CpsoladidisPeer::REFADI, CpadidisPeer::REFADI);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpsoladidisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpadidisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpadidis(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpsoladidis($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpsoladidiss();
				$obj2->addCpsoladidis($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpartley(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpsoladidisPeer::addSelectColumns($c);
		$startcol = (CpsoladidisPeer::NUM_COLUMNS - CpsoladidisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpartleyPeer::addSelectColumns($c);

		$c->addJoin(CpsoladidisPeer::CODART, CpartleyPeer::CODART);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpsoladidisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpartleyPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpartley(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpsoladidis($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpsoladidiss();
				$obj2->addCpsoladidis($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpsoladidisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpsoladidisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CpsoladidisPeer::REFADI, CpadidisPeer::REFADI);
	
			$criteria->addJoin(CpsoladidisPeer::CODART, CpartleyPeer::CODART);
	
		$rs = CpsoladidisPeer::doSelectRS($criteria, $con);
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

		CpsoladidisPeer::addSelectColumns($c);
		$startcol2 = (CpsoladidisPeer::NUM_COLUMNS - CpsoladidisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpadidisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpadidisPeer::NUM_COLUMNS;
	
			CpartleyPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpartleyPeer::NUM_COLUMNS;
	
			$c->addJoin(CpsoladidisPeer::REFADI, CpadidisPeer::REFADI);
	
			$c->addJoin(CpsoladidisPeer::CODART, CpartleyPeer::CODART);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpsoladidisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpadidisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpadidis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpsoladidis($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCpsoladidiss();
					$obj2->addCpsoladidis($obj1);
				}
	

							
				$omClass = CpartleyPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpartley(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpsoladidis($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCpsoladidiss();
					$obj3->addCpsoladidis($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCpadidis(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpsoladidisPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpsoladidisPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpsoladidisPeer::CODART, CpartleyPeer::CODART);
		
			$rs = CpsoladidisPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpartley(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpsoladidisPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpsoladidisPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpsoladidisPeer::REFADI, CpadidisPeer::REFADI);
		
			$rs = CpsoladidisPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCpadidis(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpsoladidisPeer::addSelectColumns($c);
		$startcol2 = (CpsoladidisPeer::NUM_COLUMNS - CpsoladidisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpartleyPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpartleyPeer::NUM_COLUMNS;
	
			$c->addJoin(CpsoladidisPeer::CODART, CpartleyPeer::CODART);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpsoladidisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpartleyPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpartley(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpsoladidis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpsoladidiss();
					$obj2->addCpsoladidis($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpartley(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpsoladidisPeer::addSelectColumns($c);
		$startcol2 = (CpsoladidisPeer::NUM_COLUMNS - CpsoladidisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpadidisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpadidisPeer::NUM_COLUMNS;
	
			$c->addJoin(CpsoladidisPeer::REFADI, CpadidisPeer::REFADI);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpsoladidisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpadidisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpadidis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpsoladidis($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpsoladidiss();
					$obj2->addCpsoladidis($obj1);
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
		return CpsoladidisPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpsoladidisPeer::ID); 

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
			$comparison = $criteria->getComparison(CpsoladidisPeer::ID);
			$selectCriteria->add(CpsoladidisPeer::ID, $criteria->remove(CpsoladidisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpsoladidisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpsoladidisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpsoladidis) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpsoladidisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpsoladidis $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpsoladidisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpsoladidisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpsoladidisPeer::DATABASE_NAME, CpsoladidisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpsoladidisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpsoladidisPeer::DATABASE_NAME);

		$criteria->add(CpsoladidisPeer::ID, $pk);


		$v = CpsoladidisPeer::doSelect($criteria, $con);

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
			$criteria->add(CpsoladidisPeer::ID, $pks, Criteria::IN);
			$objs = CpsoladidisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpsoladidisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpsoladidisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpsoladidisMapBuilder');
}
