<?php


abstract class BaseCcgarantPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccgarant';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccgarant';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccgarant.ID';

	
	const NOMGAR = 'ccgarant.NOMGAR';

	
	const MONESTGAR = 'ccgarant.MONESTGAR';

	
	const DESGAR = 'ccgarant.DESGAR';

	
	const MONAVA = 'ccgarant.MONAVA';

	
	const FECREC = 'ccgarant.FECREC';

	
	const CODUSU = 'ccgarant.CODUSU';

	
	const UBINOMURB = 'ccgarant.UBINOMURB';

	
	const UBINUMCASEDI = 'ccgarant.UBINUMCASEDI';

	
	const UBINUMCAL = 'ccgarant.UBINUMCAL';

	
	const UBINUMPIS = 'ccgarant.UBINUMPIS';

	
	const UBINUMAPT = 'ccgarant.UBINUMAPT';

	
	const UBIPUNREF = 'ccgarant.UBIPUNREF';

	
	const GRAVAM = 'ccgarant.GRAVAM';

	
	const GRADO = 'ccgarant.GRADO';

	
	const REAPOR = 'ccgarant.REAPOR';

	
	const NOMPRO = 'ccgarant.NOMPRO';

	
	const CEDPRO = 'ccgarant.CEDPRO';

	
	const CCTIPGAR_ID = 'ccgarant.CCTIPGAR_ID';

	
	const CCCREDIT_ID = 'ccgarant.CCCREDIT_ID';

	
	const CCPARROQ_ID = 'ccgarant.CCPARROQ_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomgar', 'Monestgar', 'Desgar', 'Monava', 'Fecrec', 'Codusu', 'Ubinomurb', 'Ubinumcasedi', 'Ubinumcal', 'Ubinumpis', 'Ubinumapt', 'Ubipunref', 'Gravam', 'Grado', 'Reapor', 'Nompro', 'Cedpro', 'CctipgarId', 'CccreditId', 'CcparroqId', ),
		BasePeer::TYPE_COLNAME => array (CcgarantPeer::ID, CcgarantPeer::NOMGAR, CcgarantPeer::MONESTGAR, CcgarantPeer::DESGAR, CcgarantPeer::MONAVA, CcgarantPeer::FECREC, CcgarantPeer::CODUSU, CcgarantPeer::UBINOMURB, CcgarantPeer::UBINUMCASEDI, CcgarantPeer::UBINUMCAL, CcgarantPeer::UBINUMPIS, CcgarantPeer::UBINUMAPT, CcgarantPeer::UBIPUNREF, CcgarantPeer::GRAVAM, CcgarantPeer::GRADO, CcgarantPeer::REAPOR, CcgarantPeer::NOMPRO, CcgarantPeer::CEDPRO, CcgarantPeer::CCTIPGAR_ID, CcgarantPeer::CCCREDIT_ID, CcgarantPeer::CCPARROQ_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomgar', 'monestgar', 'desgar', 'monava', 'fecrec', 'codusu', 'ubinomurb', 'ubinumcasedi', 'ubinumcal', 'ubinumpis', 'ubinumapt', 'ubipunref', 'gravam', 'grado', 'reapor', 'nompro', 'cedpro', 'cctipgar_id', 'cccredit_id', 'ccparroq_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomgar' => 1, 'Monestgar' => 2, 'Desgar' => 3, 'Monava' => 4, 'Fecrec' => 5, 'Codusu' => 6, 'Ubinomurb' => 7, 'Ubinumcasedi' => 8, 'Ubinumcal' => 9, 'Ubinumpis' => 10, 'Ubinumapt' => 11, 'Ubipunref' => 12, 'Gravam' => 13, 'Grado' => 14, 'Reapor' => 15, 'Nompro' => 16, 'Cedpro' => 17, 'CctipgarId' => 18, 'CccreditId' => 19, 'CcparroqId' => 20, ),
		BasePeer::TYPE_COLNAME => array (CcgarantPeer::ID => 0, CcgarantPeer::NOMGAR => 1, CcgarantPeer::MONESTGAR => 2, CcgarantPeer::DESGAR => 3, CcgarantPeer::MONAVA => 4, CcgarantPeer::FECREC => 5, CcgarantPeer::CODUSU => 6, CcgarantPeer::UBINOMURB => 7, CcgarantPeer::UBINUMCASEDI => 8, CcgarantPeer::UBINUMCAL => 9, CcgarantPeer::UBINUMPIS => 10, CcgarantPeer::UBINUMAPT => 11, CcgarantPeer::UBIPUNREF => 12, CcgarantPeer::GRAVAM => 13, CcgarantPeer::GRADO => 14, CcgarantPeer::REAPOR => 15, CcgarantPeer::NOMPRO => 16, CcgarantPeer::CEDPRO => 17, CcgarantPeer::CCTIPGAR_ID => 18, CcgarantPeer::CCCREDIT_ID => 19, CcgarantPeer::CCPARROQ_ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomgar' => 1, 'monestgar' => 2, 'desgar' => 3, 'monava' => 4, 'fecrec' => 5, 'codusu' => 6, 'ubinomurb' => 7, 'ubinumcasedi' => 8, 'ubinumcal' => 9, 'ubinumpis' => 10, 'ubinumapt' => 11, 'ubipunref' => 12, 'gravam' => 13, 'grado' => 14, 'reapor' => 15, 'nompro' => 16, 'cedpro' => 17, 'cctipgar_id' => 18, 'cccredit_id' => 19, 'ccparroq_id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcgarantMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcgarantMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcgarantPeer::getTableMap();
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
		return str_replace(CcgarantPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcgarantPeer::ID);

		$criteria->addSelectColumn(CcgarantPeer::NOMGAR);

		$criteria->addSelectColumn(CcgarantPeer::MONESTGAR);

		$criteria->addSelectColumn(CcgarantPeer::DESGAR);

		$criteria->addSelectColumn(CcgarantPeer::MONAVA);

		$criteria->addSelectColumn(CcgarantPeer::FECREC);

		$criteria->addSelectColumn(CcgarantPeer::CODUSU);

		$criteria->addSelectColumn(CcgarantPeer::UBINOMURB);

		$criteria->addSelectColumn(CcgarantPeer::UBINUMCASEDI);

		$criteria->addSelectColumn(CcgarantPeer::UBINUMCAL);

		$criteria->addSelectColumn(CcgarantPeer::UBINUMPIS);

		$criteria->addSelectColumn(CcgarantPeer::UBINUMAPT);

		$criteria->addSelectColumn(CcgarantPeer::UBIPUNREF);

		$criteria->addSelectColumn(CcgarantPeer::GRAVAM);

		$criteria->addSelectColumn(CcgarantPeer::GRADO);

		$criteria->addSelectColumn(CcgarantPeer::REAPOR);

		$criteria->addSelectColumn(CcgarantPeer::NOMPRO);

		$criteria->addSelectColumn(CcgarantPeer::CEDPRO);

		$criteria->addSelectColumn(CcgarantPeer::CCTIPGAR_ID);

		$criteria->addSelectColumn(CcgarantPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcgarantPeer::CCPARROQ_ID);

	}

	const COUNT = 'COUNT(ccgarant.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccgarant.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgarantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcgarantPeer::doSelectRS($criteria, $con);
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
		$objects = CcgarantPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcgarantPeer::populateObjects(CcgarantPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcgarantPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcgarantPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCctipgar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgarantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgarantPeer::CCTIPGAR_ID, CctipgarPeer::ID);

		$rs = CcgarantPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcgarantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgarantPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcgarantPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcparroq(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgarantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgarantPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcgarantPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCctipgar(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgarantPeer::addSelectColumns($c);
		$startcol = (CcgarantPeer::NUM_COLUMNS - CcgarantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipgarPeer::addSelectColumns($c);

		$c->addJoin(CcgarantPeer::CCTIPGAR_ID, CctipgarPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipgarPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipgar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcgarant($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgarants();
				$obj2->addCcgarant($obj1); 			}
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

		CcgarantPeer::addSelectColumns($c);
		$startcol = (CcgarantPeer::NUM_COLUMNS - CcgarantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcgarantPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarantPeer::getOMClass();

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
										$temp_obj2->addCcgarant($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgarants();
				$obj2->addCcgarant($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcparroq(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgarantPeer::addSelectColumns($c);
		$startcol = (CcgarantPeer::NUM_COLUMNS - CcgarantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcgarantPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcparroqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcparroq(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcgarant($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgarants();
				$obj2->addCcgarant($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgarantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcgarantPeer::CCTIPGAR_ID, CctipgarPeer::ID);
	
			$criteria->addJoin(CcgarantPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcgarantPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = CcgarantPeer::doSelectRS($criteria, $con);
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

		CcgarantPeer::addSelectColumns($c);
		$startcol2 = (CcgarantPeer::NUM_COLUMNS - CcgarantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipgarPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipgarPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgarantPeer::CCTIPGAR_ID, CctipgarPeer::ID);
	
			$c->addJoin(CcgarantPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcgarantPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarantPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CctipgarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCctipgar(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgarant($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgarants();
					$obj2->addCcgarant($obj1);
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
						$temp_obj3->addCcgarant($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgarants();
					$obj3->addCcgarant($obj1);
				}
	

							
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparroq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcgarant($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgarants();
					$obj4->addCcgarant($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCctipgar(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcgarantPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgarantPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgarantPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcgarantPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcgarantPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcgarantPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgarantPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgarantPeer::CCTIPGAR_ID, CctipgarPeer::ID);
		
				$criteria->addJoin(CcgarantPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcgarantPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcparroq(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcgarantPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgarantPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgarantPeer::CCTIPGAR_ID, CctipgarPeer::ID);
		
				$criteria->addJoin(CcgarantPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcgarantPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCctipgar(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgarantPeer::addSelectColumns($c);
		$startcol2 = (CcgarantPeer::NUM_COLUMNS - CcgarantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgarantPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcgarantPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarantPeer::getOMClass();

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
						$temp_obj2->addCcgarant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgarants();
					$obj2->addCcgarant($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcparroq(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgarant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgarants();
					$obj3->addCcgarant($obj1);
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

		CcgarantPeer::addSelectColumns($c);
		$startcol2 = (CcgarantPeer::NUM_COLUMNS - CcgarantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipgarPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipgarPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgarantPeer::CCTIPGAR_ID, CctipgarPeer::ID);
	
			$c->addJoin(CcgarantPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CctipgarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCctipgar(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgarant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgarants();
					$obj2->addCcgarant($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcparroq(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgarant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgarants();
					$obj3->addCcgarant($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcparroq(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgarantPeer::addSelectColumns($c);
		$startcol2 = (CcgarantPeer::NUM_COLUMNS - CcgarantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipgarPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipgarPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgarantPeer::CCTIPGAR_ID, CctipgarPeer::ID);
	
			$c->addJoin(CcgarantPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CctipgarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCctipgar(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgarant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgarants();
					$obj2->addCcgarant($obj1);
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
						$temp_obj3->addCcgarant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgarants();
					$obj3->addCcgarant($obj1);
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
		return CcgarantPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcgarantPeer::ID); 

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
			$comparison = $criteria->getComparison(CcgarantPeer::ID);
			$selectCriteria->add(CcgarantPeer::ID, $criteria->remove(CcgarantPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcgarantPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcgarantPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccgarant) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcgarantPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccgarant $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcgarantPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcgarantPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcgarantPeer::DATABASE_NAME, CcgarantPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcgarantPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcgarantPeer::DATABASE_NAME);

		$criteria->add(CcgarantPeer::ID, $pk);


		$v = CcgarantPeer::doSelect($criteria, $con);

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
			$criteria->add(CcgarantPeer::ID, $pks, Criteria::IN);
			$objs = CcgarantPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcgarantPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcgarantMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcgarantMapBuilder');
}
