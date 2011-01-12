<?php


abstract class BaseCacotizaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cacotiza';

	
	const CLASS_DEFAULT = 'lib.model.Cacotiza';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOT = 'cacotiza.REFCOT';

	
	const FECCOT = 'cacotiza.FECCOT';

	
	const CODPRO = 'cacotiza.CODPRO';

	
	const DESCOT = 'cacotiza.DESCOT';

	
	const REFSOL = 'cacotiza.REFSOL';

	
	const MONCOT = 'cacotiza.MONCOT';

	
	const CONPAG = 'cacotiza.CONPAG';

	
	const FORENT = 'cacotiza.FORENT';

	
	const PRIORI = 'cacotiza.PRIORI';

	
	const MONDES = 'cacotiza.MONDES';

	
	const MONREC = 'cacotiza.MONREC';

	
	const TIPMON = 'cacotiza.TIPMON';

	
	const VALMON = 'cacotiza.VALMON';

	
	const REFPRO = 'cacotiza.REFPRO';

	
	const TIPO = 'cacotiza.TIPO';

	
	const CORREL = 'cacotiza.CORREL';

	
	const PORVAN = 'cacotiza.PORVAN';

	
	const PORANT = 'cacotiza.PORANT';

	
	const OBSCOT = 'cacotiza.OBSCOT';

	
	const ID = 'cacotiza.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcot', 'Feccot', 'Codpro', 'Descot', 'Refsol', 'Moncot', 'Conpag', 'Forent', 'Priori', 'Mondes', 'Monrec', 'Tipmon', 'Valmon', 'Refpro', 'Tipo', 'Correl', 'Porvan', 'Porant', 'Obscot', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CacotizaPeer::REFCOT, CacotizaPeer::FECCOT, CacotizaPeer::CODPRO, CacotizaPeer::DESCOT, CacotizaPeer::REFSOL, CacotizaPeer::MONCOT, CacotizaPeer::CONPAG, CacotizaPeer::FORENT, CacotizaPeer::PRIORI, CacotizaPeer::MONDES, CacotizaPeer::MONREC, CacotizaPeer::TIPMON, CacotizaPeer::VALMON, CacotizaPeer::REFPRO, CacotizaPeer::TIPO, CacotizaPeer::CORREL, CacotizaPeer::PORVAN, CacotizaPeer::PORANT, CacotizaPeer::OBSCOT, CacotizaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcot', 'feccot', 'codpro', 'descot', 'refsol', 'moncot', 'conpag', 'forent', 'priori', 'mondes', 'monrec', 'tipmon', 'valmon', 'refpro', 'tipo', 'correl', 'porvan', 'porant', 'obscot', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcot' => 0, 'Feccot' => 1, 'Codpro' => 2, 'Descot' => 3, 'Refsol' => 4, 'Moncot' => 5, 'Conpag' => 6, 'Forent' => 7, 'Priori' => 8, 'Mondes' => 9, 'Monrec' => 10, 'Tipmon' => 11, 'Valmon' => 12, 'Refpro' => 13, 'Tipo' => 14, 'Correl' => 15, 'Porvan' => 16, 'Porant' => 17, 'Obscot' => 18, 'Id' => 19, ),
		BasePeer::TYPE_COLNAME => array (CacotizaPeer::REFCOT => 0, CacotizaPeer::FECCOT => 1, CacotizaPeer::CODPRO => 2, CacotizaPeer::DESCOT => 3, CacotizaPeer::REFSOL => 4, CacotizaPeer::MONCOT => 5, CacotizaPeer::CONPAG => 6, CacotizaPeer::FORENT => 7, CacotizaPeer::PRIORI => 8, CacotizaPeer::MONDES => 9, CacotizaPeer::MONREC => 10, CacotizaPeer::TIPMON => 11, CacotizaPeer::VALMON => 12, CacotizaPeer::REFPRO => 13, CacotizaPeer::TIPO => 14, CacotizaPeer::CORREL => 15, CacotizaPeer::PORVAN => 16, CacotizaPeer::PORANT => 17, CacotizaPeer::OBSCOT => 18, CacotizaPeer::ID => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('refcot' => 0, 'feccot' => 1, 'codpro' => 2, 'descot' => 3, 'refsol' => 4, 'moncot' => 5, 'conpag' => 6, 'forent' => 7, 'priori' => 8, 'mondes' => 9, 'monrec' => 10, 'tipmon' => 11, 'valmon' => 12, 'refpro' => 13, 'tipo' => 14, 'correl' => 15, 'porvan' => 16, 'porant' => 17, 'obscot' => 18, 'id' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CacotizaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CacotizaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CacotizaPeer::getTableMap();
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
		return str_replace(CacotizaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CacotizaPeer::REFCOT);

		$criteria->addSelectColumn(CacotizaPeer::FECCOT);

		$criteria->addSelectColumn(CacotizaPeer::CODPRO);

		$criteria->addSelectColumn(CacotizaPeer::DESCOT);

		$criteria->addSelectColumn(CacotizaPeer::REFSOL);

		$criteria->addSelectColumn(CacotizaPeer::MONCOT);

		$criteria->addSelectColumn(CacotizaPeer::CONPAG);

		$criteria->addSelectColumn(CacotizaPeer::FORENT);

		$criteria->addSelectColumn(CacotizaPeer::PRIORI);

		$criteria->addSelectColumn(CacotizaPeer::MONDES);

		$criteria->addSelectColumn(CacotizaPeer::MONREC);

		$criteria->addSelectColumn(CacotizaPeer::TIPMON);

		$criteria->addSelectColumn(CacotizaPeer::VALMON);

		$criteria->addSelectColumn(CacotizaPeer::REFPRO);

		$criteria->addSelectColumn(CacotizaPeer::TIPO);

		$criteria->addSelectColumn(CacotizaPeer::CORREL);

		$criteria->addSelectColumn(CacotizaPeer::PORVAN);

		$criteria->addSelectColumn(CacotizaPeer::PORANT);

		$criteria->addSelectColumn(CacotizaPeer::OBSCOT);

		$criteria->addSelectColumn(CacotizaPeer::ID);

	}

	const COUNT = 'COUNT(cacotiza.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cacotiza.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CacotizaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CacotizaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CacotizaPeer::doSelectRS($criteria, $con);
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
		$objects = CacotizaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CacotizaPeer::populateObjects(CacotizaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CacotizaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CacotizaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCaprovee(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CacotizaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CacotizaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CacotizaPeer::CODPRO, CaproveePeer::CODPRO);

		$rs = CacotizaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTsdesmon(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CacotizaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CacotizaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CacotizaPeer::TIPMON, TsdesmonPeer::CODMON);

		$rs = CacotizaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCaprovee(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CacotizaPeer::addSelectColumns($c);
		$startcol = (CacotizaPeer::NUM_COLUMNS - CacotizaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CaproveePeer::addSelectColumns($c);

		$c->addJoin(CacotizaPeer::CODPRO, CaproveePeer::CODPRO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CacotizaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaproveePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCaprovee(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCacotiza($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCacotizas();
				$obj2->addCacotiza($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTsdesmon(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CacotizaPeer::addSelectColumns($c);
		$startcol = (CacotizaPeer::NUM_COLUMNS - CacotizaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TsdesmonPeer::addSelectColumns($c);

		$c->addJoin(CacotizaPeer::TIPMON, TsdesmonPeer::CODMON);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CacotizaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TsdesmonPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTsdesmon(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCacotiza($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCacotizas();
				$obj2->addCacotiza($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CacotizaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CacotizaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CacotizaPeer::CODPRO, CaproveePeer::CODPRO);

		$criteria->addJoin(CacotizaPeer::TIPMON, TsdesmonPeer::CODMON);

		$rs = CacotizaPeer::doSelectRS($criteria, $con);
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

		CacotizaPeer::addSelectColumns($c);
		$startcol2 = (CacotizaPeer::NUM_COLUMNS - CacotizaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaproveePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaproveePeer::NUM_COLUMNS;

		TsdesmonPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TsdesmonPeer::NUM_COLUMNS;

		$c->addJoin(CacotizaPeer::CODPRO, CaproveePeer::CODPRO);

		$c->addJoin(CacotizaPeer::TIPMON, TsdesmonPeer::CODMON);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CacotizaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CaproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaprovee(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCacotiza($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCacotizas();
				$obj2->addCacotiza($obj1);
			}


					
			$omClass = TsdesmonPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTsdesmon(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCacotiza($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCacotizas();
				$obj3->addCacotiza($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCaprovee(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CacotizaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CacotizaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CacotizaPeer::TIPMON, TsdesmonPeer::CODMON);

		$rs = CacotizaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTsdesmon(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CacotizaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CacotizaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CacotizaPeer::CODPRO, CaproveePeer::CODPRO);

		$rs = CacotizaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCaprovee(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CacotizaPeer::addSelectColumns($c);
		$startcol2 = (CacotizaPeer::NUM_COLUMNS - CacotizaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TsdesmonPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TsdesmonPeer::NUM_COLUMNS;

		$c->addJoin(CacotizaPeer::TIPMON, TsdesmonPeer::CODMON);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CacotizaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TsdesmonPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTsdesmon(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCacotiza($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCacotizas();
				$obj2->addCacotiza($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTsdesmon(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CacotizaPeer::addSelectColumns($c);
		$startcol2 = (CacotizaPeer::NUM_COLUMNS - CacotizaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaproveePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaproveePeer::NUM_COLUMNS;

		$c->addJoin(CacotizaPeer::CODPRO, CaproveePeer::CODPRO);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CacotizaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaprovee(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCacotiza($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCacotizas();
				$obj2->addCacotiza($obj1);
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
		return CacotizaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CacotizaPeer::ID); 

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
			$comparison = $criteria->getComparison(CacotizaPeer::ID);
			$selectCriteria->add(CacotizaPeer::ID, $criteria->remove(CacotizaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CacotizaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CacotizaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cacotiza) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CacotizaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cacotiza $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CacotizaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CacotizaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CacotizaPeer::DATABASE_NAME, CacotizaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CacotizaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CacotizaPeer::DATABASE_NAME);

		$criteria->add(CacotizaPeer::ID, $pk);


		$v = CacotizaPeer::doSelect($criteria, $con);

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
			$criteria->add(CacotizaPeer::ID, $pks, Criteria::IN);
			$objs = CacotizaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCacotizaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CacotizaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CacotizaMapBuilder');
}
