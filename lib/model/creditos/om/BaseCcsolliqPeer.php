<?php


abstract class BaseCcsolliqPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccsolliq';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccsolliq';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccsolliq.ID';

	
	const NUMSOLLIQ = 'ccsolliq.NUMSOLLIQ';

	
	const FECLIQ = 'ccsolliq.FECLIQ';

	
	const ESTATU = 'ccsolliq.ESTATU';

	
	const MONTO = 'ccsolliq.MONTO';

	
	const MONCAPTRA = 'ccsolliq.MONCAPTRA';

	
	const MONACTFIJ = 'ccsolliq.MONACTFIJ';

	
	const MONTRAUTI = 'ccsolliq.MONTRAUTI';

	
	const MONOTR = 'ccsolliq.MONOTR';

	
	const OBSERV = 'ccsolliq.OBSERV';

	
	const DESDOCANE = 'ccsolliq.DESDOCANE';

	
	const FECANU = 'ccsolliq.FECANU';

	
	const DESANU = 'ccsolliq.DESANU';

	
	const CCCREDIT_ID = 'ccsolliq.CCCREDIT_ID';

	
	const CCSOLDES_ID = 'ccsolliq.CCSOLDES_ID';

	
	const CCCUADES_ID = 'ccsolliq.CCCUADES_ID';

	
	const CCUSUINT_ID = 'ccsolliq.CCUSUINT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Numsolliq', 'Fecliq', 'Estatu', 'Monto', 'Moncaptra', 'Monactfij', 'Montrauti', 'Monotr', 'Observ', 'Desdocane', 'Fecanu', 'Desanu', 'CccreditId', 'CcsoldesId', 'CccuadesId', 'CcusuintId', ),
		BasePeer::TYPE_COLNAME => array (CcsolliqPeer::ID, CcsolliqPeer::NUMSOLLIQ, CcsolliqPeer::FECLIQ, CcsolliqPeer::ESTATU, CcsolliqPeer::MONTO, CcsolliqPeer::MONCAPTRA, CcsolliqPeer::MONACTFIJ, CcsolliqPeer::MONTRAUTI, CcsolliqPeer::MONOTR, CcsolliqPeer::OBSERV, CcsolliqPeer::DESDOCANE, CcsolliqPeer::FECANU, CcsolliqPeer::DESANU, CcsolliqPeer::CCCREDIT_ID, CcsolliqPeer::CCSOLDES_ID, CcsolliqPeer::CCCUADES_ID, CcsolliqPeer::CCUSUINT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'numsolliq', 'fecliq', 'estatu', 'monto', 'moncaptra', 'monactfij', 'montrauti', 'monotr', 'observ', 'desdocane', 'fecanu', 'desanu', 'cccredit_id', 'ccsoldes_id', 'cccuades_id', 'ccusuint_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Numsolliq' => 1, 'Fecliq' => 2, 'Estatu' => 3, 'Monto' => 4, 'Moncaptra' => 5, 'Monactfij' => 6, 'Montrauti' => 7, 'Monotr' => 8, 'Observ' => 9, 'Desdocane' => 10, 'Fecanu' => 11, 'Desanu' => 12, 'CccreditId' => 13, 'CcsoldesId' => 14, 'CccuadesId' => 15, 'CcusuintId' => 16, ),
		BasePeer::TYPE_COLNAME => array (CcsolliqPeer::ID => 0, CcsolliqPeer::NUMSOLLIQ => 1, CcsolliqPeer::FECLIQ => 2, CcsolliqPeer::ESTATU => 3, CcsolliqPeer::MONTO => 4, CcsolliqPeer::MONCAPTRA => 5, CcsolliqPeer::MONACTFIJ => 6, CcsolliqPeer::MONTRAUTI => 7, CcsolliqPeer::MONOTR => 8, CcsolliqPeer::OBSERV => 9, CcsolliqPeer::DESDOCANE => 10, CcsolliqPeer::FECANU => 11, CcsolliqPeer::DESANU => 12, CcsolliqPeer::CCCREDIT_ID => 13, CcsolliqPeer::CCSOLDES_ID => 14, CcsolliqPeer::CCCUADES_ID => 15, CcsolliqPeer::CCUSUINT_ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'numsolliq' => 1, 'fecliq' => 2, 'estatu' => 3, 'monto' => 4, 'moncaptra' => 5, 'monactfij' => 6, 'montrauti' => 7, 'monotr' => 8, 'observ' => 9, 'desdocane' => 10, 'fecanu' => 11, 'desanu' => 12, 'cccredit_id' => 13, 'ccsoldes_id' => 14, 'cccuades_id' => 15, 'ccusuint_id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcsolliqMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcsolliqMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcsolliqPeer::getTableMap();
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
		return str_replace(CcsolliqPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcsolliqPeer::ID);

		$criteria->addSelectColumn(CcsolliqPeer::NUMSOLLIQ);

		$criteria->addSelectColumn(CcsolliqPeer::FECLIQ);

		$criteria->addSelectColumn(CcsolliqPeer::ESTATU);

		$criteria->addSelectColumn(CcsolliqPeer::MONTO);

		$criteria->addSelectColumn(CcsolliqPeer::MONCAPTRA);

		$criteria->addSelectColumn(CcsolliqPeer::MONACTFIJ);

		$criteria->addSelectColumn(CcsolliqPeer::MONTRAUTI);

		$criteria->addSelectColumn(CcsolliqPeer::MONOTR);

		$criteria->addSelectColumn(CcsolliqPeer::OBSERV);

		$criteria->addSelectColumn(CcsolliqPeer::DESDOCANE);

		$criteria->addSelectColumn(CcsolliqPeer::FECANU);

		$criteria->addSelectColumn(CcsolliqPeer::DESANU);

		$criteria->addSelectColumn(CcsolliqPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcsolliqPeer::CCSOLDES_ID);

		$criteria->addSelectColumn(CcsolliqPeer::CCCUADES_ID);

		$criteria->addSelectColumn(CcsolliqPeer::CCUSUINT_ID);

	}

	const COUNT = 'COUNT(ccsolliq.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccsolliq.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcsolliqPeer::doSelectRS($criteria, $con);
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
		$objects = CcsolliqPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcsolliqPeer::populateObjects(CcsolliqPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcsolliqPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcsolliqPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCccredit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsolliqPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcsolliqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcsoldes(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsolliqPeer::CCSOLDES_ID, CcsoldesPeer::ID);

		$rs = CcsolliqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccuades(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsolliqPeer::CCCUADES_ID, CccuadesPeer::ID);

		$rs = CcsolliqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcusuint(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsolliqPeer::CCUSUINT_ID, CcusuintPeer::ID);

		$rs = CcsolliqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqPeer::addSelectColumns($c);
		$startcol = (CcsolliqPeer::NUM_COLUMNS - CcsolliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcsolliqPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqPeer::getOMClass();

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
										$temp_obj2->addCcsolliq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolliqs();
				$obj2->addCcsolliq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcsoldes(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqPeer::addSelectColumns($c);
		$startcol = (CcsolliqPeer::NUM_COLUMNS - CcsolliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoldesPeer::addSelectColumns($c);

		$c->addJoin(CcsolliqPeer::CCSOLDES_ID, CcsoldesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcsoldesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcsoldes(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolliq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolliqs();
				$obj2->addCcsolliq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccuades(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqPeer::addSelectColumns($c);
		$startcol = (CcsolliqPeer::NUM_COLUMNS - CcsolliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccuadesPeer::addSelectColumns($c);

		$c->addJoin(CcsolliqPeer::CCCUADES_ID, CccuadesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccuades(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolliq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolliqs();
				$obj2->addCcsolliq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcusuint(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqPeer::addSelectColumns($c);
		$startcol = (CcsolliqPeer::NUM_COLUMNS - CcsolliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcusuintPeer::addSelectColumns($c);

		$c->addJoin(CcsolliqPeer::CCUSUINT_ID, CcusuintPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcusuintPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcusuint(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolliq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolliqs();
				$obj2->addCcsolliq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsolliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcsolliqPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcsolliqPeer::CCSOLDES_ID, CcsoldesPeer::ID);
	
			$criteria->addJoin(CcsolliqPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$criteria->addJoin(CcsolliqPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
		$rs = CcsolliqPeer::doSelectRS($criteria, $con);
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

		CcsolliqPeer::addSelectColumns($c);
		$startcol2 = (CcsolliqPeer::NUM_COLUMNS - CcsolliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcsoldesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoldesPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccuadesPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcusuintPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolliqPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCSOLDES_ID, CcsoldesPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccredit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsolliq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolliqs();
					$obj2->addCcsolliq($obj1);
				}
	

							
				$omClass = CcsoldesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcsoldes(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolliq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolliqs();
					$obj3->addCcsolliq($obj1);
				}
	

							
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccuades(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolliq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolliqs();
					$obj4->addCcsolliq($obj1);
				}
	

							
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcusuint(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcsolliq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcsolliqs();
					$obj5->addCcsolliq($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCccredit(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsolliqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsolliqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsolliqPeer::CCSOLDES_ID, CcsoldesPeer::ID);
		
				$criteria->addJoin(CcsolliqPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcsolliqPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
			$rs = CcsolliqPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcsoldes(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsolliqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsolliqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsolliqPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcsolliqPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcsolliqPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
			$rs = CcsolliqPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccuades(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsolliqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsolliqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsolliqPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcsolliqPeer::CCSOLDES_ID, CcsoldesPeer::ID);
		
				$criteria->addJoin(CcsolliqPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
			$rs = CcsolliqPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcusuint(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsolliqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsolliqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsolliqPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcsolliqPeer::CCSOLDES_ID, CcsoldesPeer::ID);
		
				$criteria->addJoin(CcsolliqPeer::CCCUADES_ID, CccuadesPeer::ID);
		
			$rs = CcsolliqPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqPeer::addSelectColumns($c);
		$startcol2 = (CcsolliqPeer::NUM_COLUMNS - CcsolliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoldesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoldesPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuadesPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuintPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolliqPeer::CCSOLDES_ID, CcsoldesPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCUSUINT_ID, CcusuintPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcsoldesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcsoldes(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolliqs();
					$obj2->addCcsolliq($obj1);
				}
	
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccuades(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolliqs();
					$obj3->addCcsolliq($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcusuint(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolliqs();
					$obj4->addCcsolliq($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcsoldes(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqPeer::addSelectColumns($c);
		$startcol2 = (CcsolliqPeer::NUM_COLUMNS - CcsolliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuadesPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuintPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolliqPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCUSUINT_ID, CcusuintPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqPeer::getOMClass();

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
						$temp_obj2->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolliqs();
					$obj2->addCcsolliq($obj1);
				}
	
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccuades(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolliqs();
					$obj3->addCcsolliq($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcusuint(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolliqs();
					$obj4->addCcsolliq($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccuades(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqPeer::addSelectColumns($c);
		$startcol2 = (CcsolliqPeer::NUM_COLUMNS - CcsolliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcsoldesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoldesPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuintPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolliqPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCSOLDES_ID, CcsoldesPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCUSUINT_ID, CcusuintPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqPeer::getOMClass();

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
						$temp_obj2->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolliqs();
					$obj2->addCcsolliq($obj1);
				}
	
				$omClass = CcsoldesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcsoldes(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolliqs();
					$obj3->addCcsolliq($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcusuint(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolliqs();
					$obj4->addCcsolliq($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcusuint(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsolliqPeer::addSelectColumns($c);
		$startcol2 = (CcsolliqPeer::NUM_COLUMNS - CcsolliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcsoldesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoldesPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccuadesPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsolliqPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCSOLDES_ID, CcsoldesPeer::ID);
	
			$c->addJoin(CcsolliqPeer::CCCUADES_ID, CccuadesPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsolliqPeer::getOMClass();

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
						$temp_obj2->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolliqs();
					$obj2->addCcsolliq($obj1);
				}
	
				$omClass = CcsoldesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcsoldes(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolliqs();
					$obj3->addCcsolliq($obj1);
				}
	
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccuades(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolliqs();
					$obj4->addCcsolliq($obj1);
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
		return CcsolliqPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcsolliqPeer::ID); 

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
			$comparison = $criteria->getComparison(CcsolliqPeer::ID);
			$selectCriteria->add(CcsolliqPeer::ID, $criteria->remove(CcsolliqPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcsolliqPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcsolliqPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccsolliq) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcsolliqPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccsolliq $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcsolliqPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcsolliqPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcsolliqPeer::DATABASE_NAME, CcsolliqPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcsolliqPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcsolliqPeer::DATABASE_NAME);

		$criteria->add(CcsolliqPeer::ID, $pk);


		$v = CcsolliqPeer::doSelect($criteria, $con);

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
			$criteria->add(CcsolliqPeer::ID, $pks, Criteria::IN);
			$objs = CcsolliqPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcsolliqPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcsolliqMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcsolliqMapBuilder');
}
