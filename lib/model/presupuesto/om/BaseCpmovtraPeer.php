<?php


abstract class BaseCpmovtraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpmovtra';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpmovtra';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFTRA = 'cpmovtra.REFTRA';

	
	const CODORI = 'cpmovtra.CODORI';

	
	const CODDES = 'cpmovtra.CODDES';

	
	const MONMOV = 'cpmovtra.MONMOV';

	
	const STAMOV = 'cpmovtra.STAMOV';

	
	const ID = 'cpmovtra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reftra', 'Codori', 'Coddes', 'Monmov', 'Stamov', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpmovtraPeer::REFTRA, CpmovtraPeer::CODORI, CpmovtraPeer::CODDES, CpmovtraPeer::MONMOV, CpmovtraPeer::STAMOV, CpmovtraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reftra', 'codori', 'coddes', 'monmov', 'stamov', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reftra' => 0, 'Codori' => 1, 'Coddes' => 2, 'Monmov' => 3, 'Stamov' => 4, 'Id' => 5, ),
		BasePeer::TYPE_COLNAME => array (CpmovtraPeer::REFTRA => 0, CpmovtraPeer::CODORI => 1, CpmovtraPeer::CODDES => 2, CpmovtraPeer::MONMOV => 3, CpmovtraPeer::STAMOV => 4, CpmovtraPeer::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('reftra' => 0, 'codori' => 1, 'coddes' => 2, 'monmov' => 3, 'stamov' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpmovtraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpmovtraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpmovtraPeer::getTableMap();
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
		return str_replace(CpmovtraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpmovtraPeer::REFTRA);

		$criteria->addSelectColumn(CpmovtraPeer::CODORI);

		$criteria->addSelectColumn(CpmovtraPeer::CODDES);

		$criteria->addSelectColumn(CpmovtraPeer::MONMOV);

		$criteria->addSelectColumn(CpmovtraPeer::STAMOV);

		$criteria->addSelectColumn(CpmovtraPeer::ID);

	}

	const COUNT = 'COUNT(cpmovtra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpmovtra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovtraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovtraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpmovtraPeer::doSelectRS($criteria, $con);
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
		$objects = CpmovtraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpmovtraPeer::populateObjects(CpmovtraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpmovtraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpmovtraPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCptrasla(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovtraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovtraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpmovtraPeer::REFTRA, CptraslaPeer::REFTRA);

		$rs = CpmovtraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpdeftitRelatedByCodori(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovtraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovtraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpmovtraPeer::CODORI, CpdeftitPeer::CODPRE);

		$rs = CpmovtraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpdeftitRelatedByCoddes(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovtraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovtraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpmovtraPeer::CODDES, CpdeftitPeer::CODPRE);

		$rs = CpmovtraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCptrasla(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovtraPeer::addSelectColumns($c);
		$startcol = (CpmovtraPeer::NUM_COLUMNS - CpmovtraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CptraslaPeer::addSelectColumns($c);

		$c->addJoin(CpmovtraPeer::REFTRA, CptraslaPeer::REFTRA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovtraPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CptraslaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCptrasla(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpmovtra($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpmovtras();
				$obj2->addCpmovtra($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpdeftitRelatedByCodori(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovtraPeer::addSelectColumns($c);
		$startcol = (CpmovtraPeer::NUM_COLUMNS - CpmovtraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpdeftitPeer::addSelectColumns($c);

		$c->addJoin(CpmovtraPeer::CODORI, CpdeftitPeer::CODPRE);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovtraPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpdeftitPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpdeftitRelatedByCodori(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpmovtraRelatedByCodori($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpmovtrasRelatedByCodori();
				$obj2->addCpmovtraRelatedByCodori($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpdeftitRelatedByCoddes(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovtraPeer::addSelectColumns($c);
		$startcol = (CpmovtraPeer::NUM_COLUMNS - CpmovtraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpdeftitPeer::addSelectColumns($c);

		$c->addJoin(CpmovtraPeer::CODDES, CpdeftitPeer::CODPRE);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovtraPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpdeftitPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpdeftitRelatedByCoddes(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpmovtraRelatedByCoddes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpmovtrasRelatedByCoddes();
				$obj2->addCpmovtraRelatedByCoddes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovtraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovtraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CpmovtraPeer::REFTRA, CptraslaPeer::REFTRA);
	
			$criteria->addJoin(CpmovtraPeer::CODORI, CpdeftitPeer::CODPRE);
	
			$criteria->addJoin(CpmovtraPeer::CODDES, CpdeftitPeer::CODPRE);
	
		$rs = CpmovtraPeer::doSelectRS($criteria, $con);
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

		CpmovtraPeer::addSelectColumns($c);
		$startcol2 = (CpmovtraPeer::NUM_COLUMNS - CpmovtraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CptraslaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CptraslaPeer::NUM_COLUMNS;
	
			CpdeftitPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpdeftitPeer::NUM_COLUMNS;
	
			CpdeftitPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CpdeftitPeer::NUM_COLUMNS;
	
			$c->addJoin(CpmovtraPeer::REFTRA, CptraslaPeer::REFTRA);
	
			$c->addJoin(CpmovtraPeer::CODORI, CpdeftitPeer::CODPRE);
	
			$c->addJoin(CpmovtraPeer::CODDES, CpdeftitPeer::CODPRE);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovtraPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CptraslaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCptrasla(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpmovtra($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCpmovtras();
					$obj2->addCpmovtra($obj1);
				}
	

							
				$omClass = CpdeftitPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpdeftitRelatedByCodori(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpmovtraRelatedByCodori($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCpmovtrasRelatedByCodori();
					$obj3->addCpmovtraRelatedByCodori($obj1);
				}
	

							
				$omClass = CpdeftitPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCpdeftitRelatedByCoddes(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCpmovtraRelatedByCoddes($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCpmovtrasRelatedByCoddes();
					$obj4->addCpmovtraRelatedByCoddes($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCptrasla(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpmovtraPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpmovtraPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpmovtraPeer::CODORI, CpdeftitPeer::CODPRE);
		
				$criteria->addJoin(CpmovtraPeer::CODDES, CpdeftitPeer::CODPRE);
		
			$rs = CpmovtraPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpdeftitRelatedByCodori(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpmovtraPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpmovtraPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpmovtraPeer::REFTRA, CptraslaPeer::REFTRA);
		
			$rs = CpmovtraPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpdeftitRelatedByCoddes(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpmovtraPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpmovtraPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpmovtraPeer::REFTRA, CptraslaPeer::REFTRA);
		
			$rs = CpmovtraPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCptrasla(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovtraPeer::addSelectColumns($c);
		$startcol2 = (CpmovtraPeer::NUM_COLUMNS - CpmovtraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdeftitPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdeftitPeer::NUM_COLUMNS;
	
			CpdeftitPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpdeftitPeer::NUM_COLUMNS;
	
			$c->addJoin(CpmovtraPeer::CODORI, CpdeftitPeer::CODPRE);
	
			$c->addJoin(CpmovtraPeer::CODDES, CpdeftitPeer::CODPRE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovtraPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpdeftitPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdeftitRelatedByCodori(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpmovtraRelatedByCodori($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpmovtrasRelatedByCodori();
					$obj2->addCpmovtraRelatedByCodori($obj1);
				}
	
				$omClass = CpdeftitPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpdeftitRelatedByCoddes(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpmovtraRelatedByCoddes($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCpmovtrasRelatedByCoddes();
					$obj3->addCpmovtraRelatedByCoddes($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpdeftitRelatedByCodori(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovtraPeer::addSelectColumns($c);
		$startcol2 = (CpmovtraPeer::NUM_COLUMNS - CpmovtraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CptraslaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CptraslaPeer::NUM_COLUMNS;
	
			$c->addJoin(CpmovtraPeer::REFTRA, CptraslaPeer::REFTRA);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovtraPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CptraslaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCptrasla(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpmovtra($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpmovtras();
					$obj2->addCpmovtra($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpdeftitRelatedByCoddes(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovtraPeer::addSelectColumns($c);
		$startcol2 = (CpmovtraPeer::NUM_COLUMNS - CpmovtraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CptraslaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CptraslaPeer::NUM_COLUMNS;
	
			$c->addJoin(CpmovtraPeer::REFTRA, CptraslaPeer::REFTRA);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovtraPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CptraslaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCptrasla(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpmovtra($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpmovtras();
					$obj2->addCpmovtra($obj1);
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
		return CpmovtraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpmovtraPeer::ID); 

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
			$comparison = $criteria->getComparison(CpmovtraPeer::ID);
			$selectCriteria->add(CpmovtraPeer::ID, $criteria->remove(CpmovtraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpmovtraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpmovtraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpmovtra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpmovtraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpmovtra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpmovtraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpmovtraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpmovtraPeer::DATABASE_NAME, CpmovtraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpmovtraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpmovtraPeer::DATABASE_NAME);

		$criteria->add(CpmovtraPeer::ID, $pk);


		$v = CpmovtraPeer::doSelect($criteria, $con);

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
			$criteria->add(CpmovtraPeer::ID, $pks, Criteria::IN);
			$objs = CpmovtraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpmovtraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpmovtraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpmovtraMapBuilder');
}
