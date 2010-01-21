<?php


abstract class BaseCcgarsolPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccgarsol';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccgarsol';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccgarsol.ID';

	
	const NOMGAR = 'ccgarsol.NOMGAR';

	
	const MONESTGAR = 'ccgarsol.MONESTGAR';

	
	const DESGAR = 'ccgarsol.DESGAR';

	
	const MONAVA = 'ccgarsol.MONAVA';

	
	const FECREC = 'ccgarsol.FECREC';

	
	const CODUSU = 'ccgarsol.CODUSU';

	
	const UBINOMURB = 'ccgarsol.UBINOMURB';

	
	const UBINUMCASEDI = 'ccgarsol.UBINUMCASEDI';

	
	const UBINUMCAL = 'ccgarsol.UBINUMCAL';

	
	const UBINUMPIS = 'ccgarsol.UBINUMPIS';

	
	const UBINUMAPT = 'ccgarsol.UBINUMAPT';

	
	const UBIPUNREF = 'ccgarsol.UBIPUNREF';

	
	const GRAVAM = 'ccgarsol.GRAVAM';

	
	const GRADO = 'ccgarsol.GRADO';

	
	const REAPOR = 'ccgarsol.REAPOR';

	
	const NOMPRO = 'ccgarsol.NOMPRO';

	
	const CEDPRO = 'ccgarsol.CEDPRO';

	
	const NUMGAR = 'ccgarsol.NUMGAR';

	
	const CCTIPGAR_ID = 'ccgarsol.CCTIPGAR_ID';

	
	const CCSOLICI_ID = 'ccgarsol.CCSOLICI_ID';

	
	const CCPARROQ_ID = 'ccgarsol.CCPARROQ_ID';

	
	const CCCREDIT_ID = 'ccgarsol.CCCREDIT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomgar', 'Monestgar', 'Desgar', 'Monava', 'Fecrec', 'Codusu', 'Ubinomurb', 'Ubinumcasedi', 'Ubinumcal', 'Ubinumpis', 'Ubinumapt', 'Ubipunref', 'Gravam', 'Grado', 'Reapor', 'Nompro', 'Cedpro', 'Numgar', 'CctipgarId', 'CcsoliciId', 'CcparroqId', 'CccreditId', ),
		BasePeer::TYPE_COLNAME => array (CcgarsolPeer::ID, CcgarsolPeer::NOMGAR, CcgarsolPeer::MONESTGAR, CcgarsolPeer::DESGAR, CcgarsolPeer::MONAVA, CcgarsolPeer::FECREC, CcgarsolPeer::CODUSU, CcgarsolPeer::UBINOMURB, CcgarsolPeer::UBINUMCASEDI, CcgarsolPeer::UBINUMCAL, CcgarsolPeer::UBINUMPIS, CcgarsolPeer::UBINUMAPT, CcgarsolPeer::UBIPUNREF, CcgarsolPeer::GRAVAM, CcgarsolPeer::GRADO, CcgarsolPeer::REAPOR, CcgarsolPeer::NOMPRO, CcgarsolPeer::CEDPRO, CcgarsolPeer::NUMGAR, CcgarsolPeer::CCTIPGAR_ID, CcgarsolPeer::CCSOLICI_ID, CcgarsolPeer::CCPARROQ_ID, CcgarsolPeer::CCCREDIT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomgar', 'monestgar', 'desgar', 'monava', 'fecrec', 'codusu', 'ubinomurb', 'ubinumcasedi', 'ubinumcal', 'ubinumpis', 'ubinumapt', 'ubipunref', 'gravam', 'grado', 'reapor', 'nompro', 'cedpro', 'numgar', 'cctipgar_id', 'ccsolici_id', 'ccparroq_id', 'cccredit_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomgar' => 1, 'Monestgar' => 2, 'Desgar' => 3, 'Monava' => 4, 'Fecrec' => 5, 'Codusu' => 6, 'Ubinomurb' => 7, 'Ubinumcasedi' => 8, 'Ubinumcal' => 9, 'Ubinumpis' => 10, 'Ubinumapt' => 11, 'Ubipunref' => 12, 'Gravam' => 13, 'Grado' => 14, 'Reapor' => 15, 'Nompro' => 16, 'Cedpro' => 17, 'Numgar' => 18, 'CctipgarId' => 19, 'CcsoliciId' => 20, 'CcparroqId' => 21, 'CccreditId' => 22, ),
		BasePeer::TYPE_COLNAME => array (CcgarsolPeer::ID => 0, CcgarsolPeer::NOMGAR => 1, CcgarsolPeer::MONESTGAR => 2, CcgarsolPeer::DESGAR => 3, CcgarsolPeer::MONAVA => 4, CcgarsolPeer::FECREC => 5, CcgarsolPeer::CODUSU => 6, CcgarsolPeer::UBINOMURB => 7, CcgarsolPeer::UBINUMCASEDI => 8, CcgarsolPeer::UBINUMCAL => 9, CcgarsolPeer::UBINUMPIS => 10, CcgarsolPeer::UBINUMAPT => 11, CcgarsolPeer::UBIPUNREF => 12, CcgarsolPeer::GRAVAM => 13, CcgarsolPeer::GRADO => 14, CcgarsolPeer::REAPOR => 15, CcgarsolPeer::NOMPRO => 16, CcgarsolPeer::CEDPRO => 17, CcgarsolPeer::NUMGAR => 18, CcgarsolPeer::CCTIPGAR_ID => 19, CcgarsolPeer::CCSOLICI_ID => 20, CcgarsolPeer::CCPARROQ_ID => 21, CcgarsolPeer::CCCREDIT_ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomgar' => 1, 'monestgar' => 2, 'desgar' => 3, 'monava' => 4, 'fecrec' => 5, 'codusu' => 6, 'ubinomurb' => 7, 'ubinumcasedi' => 8, 'ubinumcal' => 9, 'ubinumpis' => 10, 'ubinumapt' => 11, 'ubipunref' => 12, 'gravam' => 13, 'grado' => 14, 'reapor' => 15, 'nompro' => 16, 'cedpro' => 17, 'numgar' => 18, 'cctipgar_id' => 19, 'ccsolici_id' => 20, 'ccparroq_id' => 21, 'cccredit_id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcgarsolMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcgarsolMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcgarsolPeer::getTableMap();
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
		return str_replace(CcgarsolPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcgarsolPeer::ID);

		$criteria->addSelectColumn(CcgarsolPeer::NOMGAR);

		$criteria->addSelectColumn(CcgarsolPeer::MONESTGAR);

		$criteria->addSelectColumn(CcgarsolPeer::DESGAR);

		$criteria->addSelectColumn(CcgarsolPeer::MONAVA);

		$criteria->addSelectColumn(CcgarsolPeer::FECREC);

		$criteria->addSelectColumn(CcgarsolPeer::CODUSU);

		$criteria->addSelectColumn(CcgarsolPeer::UBINOMURB);

		$criteria->addSelectColumn(CcgarsolPeer::UBINUMCASEDI);

		$criteria->addSelectColumn(CcgarsolPeer::UBINUMCAL);

		$criteria->addSelectColumn(CcgarsolPeer::UBINUMPIS);

		$criteria->addSelectColumn(CcgarsolPeer::UBINUMAPT);

		$criteria->addSelectColumn(CcgarsolPeer::UBIPUNREF);

		$criteria->addSelectColumn(CcgarsolPeer::GRAVAM);

		$criteria->addSelectColumn(CcgarsolPeer::GRADO);

		$criteria->addSelectColumn(CcgarsolPeer::REAPOR);

		$criteria->addSelectColumn(CcgarsolPeer::NOMPRO);

		$criteria->addSelectColumn(CcgarsolPeer::CEDPRO);

		$criteria->addSelectColumn(CcgarsolPeer::NUMGAR);

		$criteria->addSelectColumn(CcgarsolPeer::CCTIPGAR_ID);

		$criteria->addSelectColumn(CcgarsolPeer::CCSOLICI_ID);

		$criteria->addSelectColumn(CcgarsolPeer::CCPARROQ_ID);

		$criteria->addSelectColumn(CcgarsolPeer::CCCREDIT_ID);

	}

	const COUNT = 'COUNT(ccgarsol.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccgarsol.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgarsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcgarsolPeer::doSelectRS($criteria, $con);
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
		$objects = CcgarsolPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcgarsolPeer::populateObjects(CcgarsolPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcgarsolPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcgarsolPeer::getOMClass();
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
			$criteria->addSelectColumn(CcgarsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgarsolPeer::CCTIPGAR_ID, CctipgarPeer::ID);

		$rs = CcgarsolPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcsolici(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgarsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgarsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);

		$rs = CcgarsolPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcgarsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgarsolPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcgarsolPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcgarsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgarsolPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcgarsolPeer::doSelectRS($criteria, $con);
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

		CcgarsolPeer::addSelectColumns($c);
		$startcol = (CcgarsolPeer::NUM_COLUMNS - CcgarsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipgarPeer::addSelectColumns($c);

		$c->addJoin(CcgarsolPeer::CCTIPGAR_ID, CctipgarPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarsolPeer::getOMClass();

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
										$temp_obj2->addCcgarsol($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgarsols();
				$obj2->addCcgarsol($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcsolici(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgarsolPeer::addSelectColumns($c);
		$startcol = (CcgarsolPeer::NUM_COLUMNS - CcgarsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoliciPeer::addSelectColumns($c);

		$c->addJoin(CcgarsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcsolici(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcgarsol($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgarsols();
				$obj2->addCcgarsol($obj1); 			}
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

		CcgarsolPeer::addSelectColumns($c);
		$startcol = (CcgarsolPeer::NUM_COLUMNS - CcgarsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcgarsolPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarsolPeer::getOMClass();

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
										$temp_obj2->addCcgarsol($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgarsols();
				$obj2->addCcgarsol($obj1); 			}
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

		CcgarsolPeer::addSelectColumns($c);
		$startcol = (CcgarsolPeer::NUM_COLUMNS - CcgarsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcgarsolPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarsolPeer::getOMClass();

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
										$temp_obj2->addCcgarsol($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgarsols();
				$obj2->addCcgarsol($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgarsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgarsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcgarsolPeer::CCTIPGAR_ID, CctipgarPeer::ID);
	
			$criteria->addJoin(CcgarsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$criteria->addJoin(CcgarsolPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$criteria->addJoin(CcgarsolPeer::CCCREDIT_ID, CccreditPeer::ID);
	
		$rs = CcgarsolPeer::doSelectRS($criteria, $con);
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

		CcgarsolPeer::addSelectColumns($c);
		$startcol2 = (CcgarsolPeer::NUM_COLUMNS - CcgarsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipgarPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipgarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgarsolPeer::CCTIPGAR_ID, CctipgarPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCCREDIT_ID, CccreditPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarsolPeer::getOMClass();


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
						$temp_obj2->addCcgarsol($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgarsols();
					$obj2->addCcgarsol($obj1);
				}
	

							
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcsolici(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgarsol($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgarsols();
					$obj3->addCcgarsol($obj1);
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
						$temp_obj4->addCcgarsol($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgarsols();
					$obj4->addCcgarsol($obj1);
				}
	

							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccredit(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcgarsol($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcgarsols();
					$obj5->addCcgarsol($obj1);
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
				$criteria->addSelectColumn(CcgarsolPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgarsolPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgarsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcgarsolPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcgarsolPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcgarsolPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcsolici(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcgarsolPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgarsolPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgarsolPeer::CCTIPGAR_ID, CctipgarPeer::ID);
		
				$criteria->addJoin(CcgarsolPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcgarsolPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcgarsolPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcgarsolPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgarsolPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgarsolPeer::CCTIPGAR_ID, CctipgarPeer::ID);
		
				$criteria->addJoin(CcgarsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcgarsolPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CcgarsolPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcgarsolPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgarsolPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgarsolPeer::CCTIPGAR_ID, CctipgarPeer::ID);
		
				$criteria->addJoin(CcgarsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcgarsolPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcgarsolPeer::doSelectRS($criteria, $con);
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

		CcgarsolPeer::addSelectColumns($c);
		$startcol2 = (CcgarsolPeer::NUM_COLUMNS - CcgarsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgarsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcsolici(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgarsols();
					$obj2->addCcgarsol($obj1);
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
						$temp_obj3->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgarsols();
					$obj3->addCcgarsol($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgarsols();
					$obj4->addCcgarsol($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcsolici(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgarsolPeer::addSelectColumns($c);
		$startcol2 = (CcgarsolPeer::NUM_COLUMNS - CcgarsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipgarPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipgarPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgarsolPeer::CCTIPGAR_ID, CctipgarPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarsolPeer::getOMClass();

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
						$temp_obj2->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgarsols();
					$obj2->addCcgarsol($obj1);
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
						$temp_obj3->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgarsols();
					$obj3->addCcgarsol($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgarsols();
					$obj4->addCcgarsol($obj1);
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

		CcgarsolPeer::addSelectColumns($c);
		$startcol2 = (CcgarsolPeer::NUM_COLUMNS - CcgarsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipgarPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipgarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgarsolPeer::CCTIPGAR_ID, CctipgarPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarsolPeer::getOMClass();

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
						$temp_obj2->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgarsols();
					$obj2->addCcgarsol($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcsolici(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgarsols();
					$obj3->addCcgarsol($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgarsols();
					$obj4->addCcgarsol($obj1);
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

		CcgarsolPeer::addSelectColumns($c);
		$startcol2 = (CcgarsolPeer::NUM_COLUMNS - CcgarsolPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipgarPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipgarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgarsolPeer::CCTIPGAR_ID, CctipgarPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcgarsolPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgarsolPeer::getOMClass();

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
						$temp_obj2->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgarsols();
					$obj2->addCcgarsol($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcsolici(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgarsols();
					$obj3->addCcgarsol($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparroq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcgarsol($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgarsols();
					$obj4->addCcgarsol($obj1);
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
		return CcgarsolPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcgarsolPeer::ID); 

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
			$comparison = $criteria->getComparison(CcgarsolPeer::ID);
			$selectCriteria->add(CcgarsolPeer::ID, $criteria->remove(CcgarsolPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcgarsolPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcgarsolPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccgarsol) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcgarsolPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccgarsol $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcgarsolPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcgarsolPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcgarsolPeer::DATABASE_NAME, CcgarsolPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcgarsolPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcgarsolPeer::DATABASE_NAME);

		$criteria->add(CcgarsolPeer::ID, $pk);


		$v = CcgarsolPeer::doSelect($criteria, $con);

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
			$criteria->add(CcgarsolPeer::ID, $pks, Criteria::IN);
			$objs = CcgarsolPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcgarsolPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcgarsolMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcgarsolMapBuilder');
}
