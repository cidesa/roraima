<?php


abstract class BaseCcgescobPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccgescob';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccgescob';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccgescob.ID';

	
	const FECGES = 'ccgescob.FECGES';

	
	const FECCOMPAG = 'ccgescob.FECCOMPAG';

	
	const TIPACC = 'ccgescob.TIPACC';

	
	const FECDEP = 'ccgescob.FECDEP';

	
	const FECREC = 'ccgescob.FECREC';

	
	const CCBANCO_ID = 'ccgescob.CCBANCO_ID';

	
	const NUMDEP = 'ccgescob.NUMDEP';

	
	const MONDEP = 'ccgescob.MONDEP';

	
	const ENVFAX = 'ccgescob.ENVFAX';

	
	const COMENT = 'ccgescob.COMENT';

	
	const CCCLAACT_ID = 'ccgescob.CCCLAACT_ID';

	
	const CCUSUINT_ID = 'ccgescob.CCUSUINT_ID';

	
	const CCACTANA_ID = 'ccgescob.CCACTANA_ID';

	
	const CCTIPTRA_ID = 'ccgescob.CCTIPTRA_ID';

	
	const CCCREDIT_ID = 'ccgescob.CCCREDIT_ID';

	
	const CCANALIS_ID = 'ccgescob.CCANALIS_ID';

	
	const CCESTADO_ID = 'ccgescob.CCESTADO_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecges', 'Feccompag', 'Tipacc', 'Fecdep', 'Fecrec', 'CcbancoId', 'Numdep', 'Mondep', 'Envfax', 'Coment', 'CcclaactId', 'CcusuintId', 'CcactanaId', 'CctiptraId', 'CccreditId', 'CcanalisId', 'CcestadoId', ),
		BasePeer::TYPE_COLNAME => array (CcgescobPeer::ID, CcgescobPeer::FECGES, CcgescobPeer::FECCOMPAG, CcgescobPeer::TIPACC, CcgescobPeer::FECDEP, CcgescobPeer::FECREC, CcgescobPeer::CCBANCO_ID, CcgescobPeer::NUMDEP, CcgescobPeer::MONDEP, CcgescobPeer::ENVFAX, CcgescobPeer::COMENT, CcgescobPeer::CCCLAACT_ID, CcgescobPeer::CCUSUINT_ID, CcgescobPeer::CCACTANA_ID, CcgescobPeer::CCTIPTRA_ID, CcgescobPeer::CCCREDIT_ID, CcgescobPeer::CCANALIS_ID, CcgescobPeer::CCESTADO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecges', 'feccompag', 'tipacc', 'fecdep', 'fecrec', 'ccbanco_id', 'numdep', 'mondep', 'envfax', 'coment', 'ccclaact_id', 'ccusuint_id', 'ccactana_id', 'cctiptra_id', 'cccredit_id', 'ccanalis_id', 'ccestado_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecges' => 1, 'Feccompag' => 2, 'Tipacc' => 3, 'Fecdep' => 4, 'Fecrec' => 5, 'CcbancoId' => 6, 'Numdep' => 7, 'Mondep' => 8, 'Envfax' => 9, 'Coment' => 10, 'CcclaactId' => 11, 'CcusuintId' => 12, 'CcactanaId' => 13, 'CctiptraId' => 14, 'CccreditId' => 15, 'CcanalisId' => 16, 'CcestadoId' => 17, ),
		BasePeer::TYPE_COLNAME => array (CcgescobPeer::ID => 0, CcgescobPeer::FECGES => 1, CcgescobPeer::FECCOMPAG => 2, CcgescobPeer::TIPACC => 3, CcgescobPeer::FECDEP => 4, CcgescobPeer::FECREC => 5, CcgescobPeer::CCBANCO_ID => 6, CcgescobPeer::NUMDEP => 7, CcgescobPeer::MONDEP => 8, CcgescobPeer::ENVFAX => 9, CcgescobPeer::COMENT => 10, CcgescobPeer::CCCLAACT_ID => 11, CcgescobPeer::CCUSUINT_ID => 12, CcgescobPeer::CCACTANA_ID => 13, CcgescobPeer::CCTIPTRA_ID => 14, CcgescobPeer::CCCREDIT_ID => 15, CcgescobPeer::CCANALIS_ID => 16, CcgescobPeer::CCESTADO_ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecges' => 1, 'feccompag' => 2, 'tipacc' => 3, 'fecdep' => 4, 'fecrec' => 5, 'ccbanco_id' => 6, 'numdep' => 7, 'mondep' => 8, 'envfax' => 9, 'coment' => 10, 'ccclaact_id' => 11, 'ccusuint_id' => 12, 'ccactana_id' => 13, 'cctiptra_id' => 14, 'cccredit_id' => 15, 'ccanalis_id' => 16, 'ccestado_id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcgescobMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcgescobMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcgescobPeer::getTableMap();
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
		return str_replace(CcgescobPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcgescobPeer::ID);

		$criteria->addSelectColumn(CcgescobPeer::FECGES);

		$criteria->addSelectColumn(CcgescobPeer::FECCOMPAG);

		$criteria->addSelectColumn(CcgescobPeer::TIPACC);

		$criteria->addSelectColumn(CcgescobPeer::FECDEP);

		$criteria->addSelectColumn(CcgescobPeer::FECREC);

		$criteria->addSelectColumn(CcgescobPeer::CCBANCO_ID);

		$criteria->addSelectColumn(CcgescobPeer::NUMDEP);

		$criteria->addSelectColumn(CcgescobPeer::MONDEP);

		$criteria->addSelectColumn(CcgescobPeer::ENVFAX);

		$criteria->addSelectColumn(CcgescobPeer::COMENT);

		$criteria->addSelectColumn(CcgescobPeer::CCCLAACT_ID);

		$criteria->addSelectColumn(CcgescobPeer::CCUSUINT_ID);

		$criteria->addSelectColumn(CcgescobPeer::CCACTANA_ID);

		$criteria->addSelectColumn(CcgescobPeer::CCTIPTRA_ID);

		$criteria->addSelectColumn(CcgescobPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcgescobPeer::CCANALIS_ID);

		$criteria->addSelectColumn(CcgescobPeer::CCESTADO_ID);

	}

	const COUNT = 'COUNT(ccgescob.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccgescob.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgescobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcgescobPeer::doSelectRS($criteria, $con);
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
		$objects = CcgescobPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcgescobPeer::populateObjects(CcgescobPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcgescobPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcgescobPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcclaact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgescobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);

		$rs = CcgescobPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgescobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);

		$rs = CcgescobPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcactana(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgescobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);

		$rs = CcgescobPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgescobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);

		$rs = CcgescobPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgescobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcgescobPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcanalis(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgescobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);

		$rs = CcgescobPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcestado(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgescobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);

		$rs = CcgescobPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcclaact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgescobPeer::addSelectColumns($c);
		$startcol = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcclaactPeer::addSelectColumns($c);

		$c->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcclaactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcclaact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcgescob($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgescobs();
				$obj2->addCcgescob($obj1); 			}
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

		CcgescobPeer::addSelectColumns($c);
		$startcol = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcusuintPeer::addSelectColumns($c);

		$c->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

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
										$temp_obj2->addCcgescob($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgescobs();
				$obj2->addCcgescob($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcactana(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgescobPeer::addSelectColumns($c);
		$startcol = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcactanaPeer::addSelectColumns($c);

		$c->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcactanaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcactana(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcgescob($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgescobs();
				$obj2->addCcgescob($obj1); 			}
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

		CcgescobPeer::addSelectColumns($c);
		$startcol = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctiptraPeer::addSelectColumns($c);

		$c->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

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
										$temp_obj2->addCcgescob($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgescobs();
				$obj2->addCcgescob($obj1); 			}
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

		CcgescobPeer::addSelectColumns($c);
		$startcol = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

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
										$temp_obj2->addCcgescob($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgescobs();
				$obj2->addCcgescob($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcanalis(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgescobPeer::addSelectColumns($c);
		$startcol = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcanalisPeer::addSelectColumns($c);

		$c->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcanalisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcanalis(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcgescob($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgescobs();
				$obj2->addCcgescob($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcestado(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgescobPeer::addSelectColumns($c);
		$startcol = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcestadoPeer::addSelectColumns($c);

		$c->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcestadoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcestado(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcgescob($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcgescobs();
				$obj2->addCcgescob($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcgescobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$criteria->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$criteria->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
	
			$criteria->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$criteria->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$criteria->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
	
		$rs = CcgescobPeer::doSelectRS($criteria, $con);
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

		CcgescobPeer::addSelectColumns($c);
		$startcol2 = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcclaactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcclaactPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CcactanaPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcactanaPeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctiptraPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccreditPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcanalisPeer::NUM_COLUMNS;
	
			CcestadoPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcestadoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcclaact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgescob($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgescobs();
					$obj2->addCcgescob($obj1);
				}
	

							
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgescob($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgescobs();
					$obj3->addCcgescob($obj1);
				}
	

							
				$omClass = CcactanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcactana(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcgescob($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgescobs();
					$obj4->addCcgescob($obj1);
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
						$temp_obj5->addCcgescob($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcgescobs();
					$obj5->addCcgescob($obj1);
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
						$temp_obj6->addCcgescob($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcgescobs();
					$obj6->addCcgescob($obj1);
				}
	

							
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcanalis(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcgescob($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initCcgescobs();
					$obj7->addCcgescob($obj1);
				}
	

							
				$omClass = CcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8 = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcestado(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcgescob($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj8->initCcgescobs();
					$obj8->addCcgescob($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcclaact(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgescobPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
		
			$rs = CcgescobPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgescobPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
		
			$rs = CcgescobPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcactana(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgescobPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
		
			$rs = CcgescobPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgescobPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
		
			$rs = CcgescobPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgescobPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
		
			$rs = CcgescobPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcanalis(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgescobPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
		
			$rs = CcgescobPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcestado(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcgescobPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcgescobPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
		
			$rs = CcgescobPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcclaact(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgescobPeer::addSelectColumns($c);
		$startcol2 = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcusuintPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcusuintPeer::NUM_COLUMNS;
	
			CcactanaPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcactanaPeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctiptraPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccreditPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcanalisPeer::NUM_COLUMNS;
	
			CcestadoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcestadoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcusuint(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgescobs();
					$obj2->addCcgescob($obj1);
				}
	
				$omClass = CcactanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcactana(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgescobs();
					$obj3->addCcgescob($obj1);
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
						$temp_obj4->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgescobs();
					$obj4->addCcgescob($obj1);
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
						$temp_obj5->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcgescobs();
					$obj5->addCcgescob($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcanalis(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcgescobs();
					$obj6->addCcgescob($obj1);
				}
	
				$omClass = CcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcestado(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcgescobs();
					$obj7->addCcgescob($obj1);
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

		CcgescobPeer::addSelectColumns($c);
		$startcol2 = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcclaactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcclaactPeer::NUM_COLUMNS;
	
			CcactanaPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcactanaPeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctiptraPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccreditPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcanalisPeer::NUM_COLUMNS;
	
			CcestadoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcestadoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcclaact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgescobs();
					$obj2->addCcgescob($obj1);
				}
	
				$omClass = CcactanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcactana(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgescobs();
					$obj3->addCcgescob($obj1);
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
						$temp_obj4->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgescobs();
					$obj4->addCcgescob($obj1);
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
						$temp_obj5->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcgescobs();
					$obj5->addCcgescob($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcanalis(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcgescobs();
					$obj6->addCcgescob($obj1);
				}
	
				$omClass = CcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcestado(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcgescobs();
					$obj7->addCcgescob($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcactana(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgescobPeer::addSelectColumns($c);
		$startcol2 = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcclaactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcclaactPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctiptraPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccreditPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcanalisPeer::NUM_COLUMNS;
	
			CcestadoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcestadoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcclaact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgescobs();
					$obj2->addCcgescob($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgescobs();
					$obj3->addCcgescob($obj1);
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
						$temp_obj4->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgescobs();
					$obj4->addCcgescob($obj1);
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
						$temp_obj5->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcgescobs();
					$obj5->addCcgescob($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcanalis(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcgescobs();
					$obj6->addCcgescob($obj1);
				}
	
				$omClass = CcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcestado(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcgescobs();
					$obj7->addCcgescob($obj1);
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

		CcgescobPeer::addSelectColumns($c);
		$startcol2 = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcclaactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcclaactPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CcactanaPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcactanaPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccreditPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcanalisPeer::NUM_COLUMNS;
	
			CcestadoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcestadoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcclaact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgescobs();
					$obj2->addCcgescob($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgescobs();
					$obj3->addCcgescob($obj1);
				}
	
				$omClass = CcactanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcactana(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgescobs();
					$obj4->addCcgescob($obj1);
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
						$temp_obj5->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcgescobs();
					$obj5->addCcgescob($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcanalis(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcgescobs();
					$obj6->addCcgescob($obj1);
				}
	
				$omClass = CcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcestado(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcgescobs();
					$obj7->addCcgescob($obj1);
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

		CcgescobPeer::addSelectColumns($c);
		$startcol2 = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcclaactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcclaactPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CcactanaPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcactanaPeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctiptraPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcanalisPeer::NUM_COLUMNS;
	
			CcestadoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcestadoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcclaact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgescobs();
					$obj2->addCcgescob($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgescobs();
					$obj3->addCcgescob($obj1);
				}
	
				$omClass = CcactanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcactana(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgescobs();
					$obj4->addCcgescob($obj1);
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
						$temp_obj5->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcgescobs();
					$obj5->addCcgescob($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcanalis(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcgescobs();
					$obj6->addCcgescob($obj1);
				}
	
				$omClass = CcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcestado(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcgescobs();
					$obj7->addCcgescob($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcanalis(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgescobPeer::addSelectColumns($c);
		$startcol2 = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcclaactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcclaactPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CcactanaPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcactanaPeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctiptraPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccreditPeer::NUM_COLUMNS;
	
			CcestadoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcestadoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCESTADO_ID, CcestadoPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcclaact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgescobs();
					$obj2->addCcgescob($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgescobs();
					$obj3->addCcgescob($obj1);
				}
	
				$omClass = CcactanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcactana(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgescobs();
					$obj4->addCcgescob($obj1);
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
						$temp_obj5->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcgescobs();
					$obj5->addCcgescob($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccredit(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcgescobs();
					$obj6->addCcgescob($obj1);
				}
	
				$omClass = CcestadoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcestado(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcgescobs();
					$obj7->addCcgescob($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcestado(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcgescobPeer::addSelectColumns($c);
		$startcol2 = (CcgescobPeer::NUM_COLUMNS - CcgescobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcclaactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcclaactPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CcactanaPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcactanaPeer::NUM_COLUMNS;
	
			CctiptraPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctiptraPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccreditPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcanalisPeer::NUM_COLUMNS;
	
			$c->addJoin(CcgescobPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCACTANA_ID, CcactanaPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCTIPTRA_ID, CctiptraPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcgescobPeer::CCANALIS_ID, CcanalisPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcgescobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcclaact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcgescobs();
					$obj2->addCcgescob($obj1);
				}
	
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcgescobs();
					$obj3->addCcgescob($obj1);
				}
	
				$omClass = CcactanaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcactana(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcgescobs();
					$obj4->addCcgescob($obj1);
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
						$temp_obj5->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcgescobs();
					$obj5->addCcgescob($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccredit(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcgescobs();
					$obj6->addCcgescob($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcanalis(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcgescob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcgescobs();
					$obj7->addCcgescob($obj1);
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
		return CcgescobPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcgescobPeer::ID); 

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
			$comparison = $criteria->getComparison(CcgescobPeer::ID);
			$selectCriteria->add(CcgescobPeer::ID, $criteria->remove(CcgescobPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcgescobPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcgescobPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccgescob) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcgescobPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccgescob $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcgescobPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcgescobPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcgescobPeer::DATABASE_NAME, CcgescobPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcgescobPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcgescobPeer::DATABASE_NAME);

		$criteria->add(CcgescobPeer::ID, $pk);


		$v = CcgescobPeer::doSelect($criteria, $con);

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
			$criteria->add(CcgescobPeer::ID, $pks, Criteria::IN);
			$objs = CcgescobPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcgescobPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcgescobMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcgescobMapBuilder');
}
