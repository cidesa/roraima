<?php


abstract class BaseCcparproPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccparpro';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccparpro';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccparpro.ID';

	
	const PLAZO = 'ccparpro.PLAZO';

	
	const PERMUE = 'ccparpro.PERMUE';

	
	const PERGRA = 'ccparpro.PERGRA';

	
	const MODALI = 'ccparpro.MODALI';

	
	const NUMCUO = 'ccparpro.NUMCUO';

	
	const NUMCUOFIN = 'ccparpro.NUMCUOFIN';

	
	const TASINT = 'ccparpro.TASINT';

	
	const TASINTMOR = 'ccparpro.TASINTMOR';

	
	const FECDESPP = 'ccparpro.FECDESPP';

	
	const FECHASPP = 'ccparpro.FECHASPP';

	
	const CODUNI = 'ccparpro.CODUNI';

	
	const INTGRAVA = 'ccparpro.INTGRAVA';

	
	const INTCUMINC = 'ccparpro.INTCUMINC';

	
	const CONTABB_ID = 'ccparpro.CONTABB_ID';

	
	const CCPARTID_ID = 'ccparpro.CCPARTID_ID';

	
	const CCPROGRA_ID = 'ccparpro.CCPROGRA_ID';

	
	const CCTIPINT_ID = 'ccparpro.CCTIPINT_ID';

	
	const CCDEDUCC_ID = 'ccparpro.CCDEDUCC_ID';

	
	const CCPERGRAVA_ID = 'ccparpro.CCPERGRAVA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Plazo', 'Permue', 'Pergra', 'Modali', 'Numcuo', 'Numcuofin', 'Tasint', 'Tasintmor', 'Fecdespp', 'Fechaspp', 'Coduni', 'Intgrava', 'Intcuminc', 'ContabbId', 'CcpartidId', 'CcprograId', 'CctipintId', 'CcdeduccId', 'CcpergravaId', ),
		BasePeer::TYPE_COLNAME => array (CcparproPeer::ID, CcparproPeer::PLAZO, CcparproPeer::PERMUE, CcparproPeer::PERGRA, CcparproPeer::MODALI, CcparproPeer::NUMCUO, CcparproPeer::NUMCUOFIN, CcparproPeer::TASINT, CcparproPeer::TASINTMOR, CcparproPeer::FECDESPP, CcparproPeer::FECHASPP, CcparproPeer::CODUNI, CcparproPeer::INTGRAVA, CcparproPeer::INTCUMINC, CcparproPeer::CONTABB_ID, CcparproPeer::CCPARTID_ID, CcparproPeer::CCPROGRA_ID, CcparproPeer::CCTIPINT_ID, CcparproPeer::CCDEDUCC_ID, CcparproPeer::CCPERGRAVA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'plazo', 'permue', 'pergra', 'modali', 'numcuo', 'numcuofin', 'tasint', 'tasintmor', 'fecdespp', 'fechaspp', 'coduni', 'intgrava', 'intcuminc', 'contabb_id', 'ccpartid_id', 'ccprogra_id', 'cctipint_id', 'ccdeducc_id', 'ccpergrava_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Plazo' => 1, 'Permue' => 2, 'Pergra' => 3, 'Modali' => 4, 'Numcuo' => 5, 'Numcuofin' => 6, 'Tasint' => 7, 'Tasintmor' => 8, 'Fecdespp' => 9, 'Fechaspp' => 10, 'Coduni' => 11, 'Intgrava' => 12, 'Intcuminc' => 13, 'ContabbId' => 14, 'CcpartidId' => 15, 'CcprograId' => 16, 'CctipintId' => 17, 'CcdeduccId' => 18, 'CcpergravaId' => 19, ),
		BasePeer::TYPE_COLNAME => array (CcparproPeer::ID => 0, CcparproPeer::PLAZO => 1, CcparproPeer::PERMUE => 2, CcparproPeer::PERGRA => 3, CcparproPeer::MODALI => 4, CcparproPeer::NUMCUO => 5, CcparproPeer::NUMCUOFIN => 6, CcparproPeer::TASINT => 7, CcparproPeer::TASINTMOR => 8, CcparproPeer::FECDESPP => 9, CcparproPeer::FECHASPP => 10, CcparproPeer::CODUNI => 11, CcparproPeer::INTGRAVA => 12, CcparproPeer::INTCUMINC => 13, CcparproPeer::CONTABB_ID => 14, CcparproPeer::CCPARTID_ID => 15, CcparproPeer::CCPROGRA_ID => 16, CcparproPeer::CCTIPINT_ID => 17, CcparproPeer::CCDEDUCC_ID => 18, CcparproPeer::CCPERGRAVA_ID => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'plazo' => 1, 'permue' => 2, 'pergra' => 3, 'modali' => 4, 'numcuo' => 5, 'numcuofin' => 6, 'tasint' => 7, 'tasintmor' => 8, 'fecdespp' => 9, 'fechaspp' => 10, 'coduni' => 11, 'intgrava' => 12, 'intcuminc' => 13, 'contabb_id' => 14, 'ccpartid_id' => 15, 'ccprogra_id' => 16, 'cctipint_id' => 17, 'ccdeducc_id' => 18, 'ccpergrava_id' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcparproMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcparproMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcparproPeer::getTableMap();
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
		return str_replace(CcparproPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcparproPeer::ID);

		$criteria->addSelectColumn(CcparproPeer::PLAZO);

		$criteria->addSelectColumn(CcparproPeer::PERMUE);

		$criteria->addSelectColumn(CcparproPeer::PERGRA);

		$criteria->addSelectColumn(CcparproPeer::MODALI);

		$criteria->addSelectColumn(CcparproPeer::NUMCUO);

		$criteria->addSelectColumn(CcparproPeer::NUMCUOFIN);

		$criteria->addSelectColumn(CcparproPeer::TASINT);

		$criteria->addSelectColumn(CcparproPeer::TASINTMOR);

		$criteria->addSelectColumn(CcparproPeer::FECDESPP);

		$criteria->addSelectColumn(CcparproPeer::FECHASPP);

		$criteria->addSelectColumn(CcparproPeer::CODUNI);

		$criteria->addSelectColumn(CcparproPeer::INTGRAVA);

		$criteria->addSelectColumn(CcparproPeer::INTCUMINC);

		$criteria->addSelectColumn(CcparproPeer::CONTABB_ID);

		$criteria->addSelectColumn(CcparproPeer::CCPARTID_ID);

		$criteria->addSelectColumn(CcparproPeer::CCPROGRA_ID);

		$criteria->addSelectColumn(CcparproPeer::CCTIPINT_ID);

		$criteria->addSelectColumn(CcparproPeer::CCDEDUCC_ID);

		$criteria->addSelectColumn(CcparproPeer::CCPERGRAVA_ID);

	}

	const COUNT = 'COUNT(ccparpro.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccparpro.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcparproPeer::doSelectRS($criteria, $con);
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
		$objects = CcparproPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcparproPeer::populateObjects(CcparproPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcparproPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcparproPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinContabb(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);

		$rs = CcparproPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcpartid(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);

		$rs = CcparproPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcprogra(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);

		$rs = CcparproPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCctipint(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);

		$rs = CcparproPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcdeducc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);

		$rs = CcparproPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcperiod(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);

		$rs = CcparproPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinContabb(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ContabbPeer::addSelectColumns($c);

		$c->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContabbPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getContabb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcparpro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcparpros();
				$obj2->addCcparpro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcpartid(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpartidPeer::addSelectColumns($c);

		$c->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcpartidPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcpartid(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcparpro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcparpros();
				$obj2->addCcparpro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcprogra(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcprograPeer::addSelectColumns($c);

		$c->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcprograPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcprogra(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcparpro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcparpros();
				$obj2->addCcparpro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCctipint(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipintPeer::addSelectColumns($c);

		$c->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipintPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipint(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcparpro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcparpros();
				$obj2->addCcparpro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcdeducc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcdeduccPeer::addSelectColumns($c);

		$c->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcdeduccPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcdeducc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcparpro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcparpros();
				$obj2->addCcparpro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcperiod(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperiodPeer::addSelectColumns($c);

		$c->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperiodPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperiod(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcparpro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcparpros();
				$obj2->addCcparpro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
	
			$criteria->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$criteria->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$criteria->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$criteria->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
	
			$criteria->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	
		$rs = CcparproPeer::doSelectRS($criteria, $con);
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

		CcparproPeer::addSelectColumns($c);
		$startcol2 = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			ContabbPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + ContabbPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			CctipintPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctipintPeer::NUM_COLUMNS;
	
			CcdeduccPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcdeduccPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getContabb(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparpro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparpros();
					$obj2->addCcparpro($obj1);
				}
	

							
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpartid(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparpro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparpros();
					$obj3->addCcparpro($obj1);
				}
	

							
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcprogra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcparpro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcparpros();
					$obj4->addCcparpro($obj1);
				}
	

							
				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCctipint(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcparpro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcparpros();
					$obj5->addCcparpro($obj1);
				}
	

							
				$omClass = CcdeduccPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcdeducc(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcparpro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcparpros();
					$obj6->addCcparpro($obj1);
				}
	

							
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcperiod(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcparpro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initCcparpros();
					$obj7->addCcparpro($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptContabb(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcparproPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		
			$rs = CcparproPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcpartid(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcparproPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		
			$rs = CcparproPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcprogra(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcparproPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		
			$rs = CcparproPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCctipint(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcparproPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		
			$rs = CcparproPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcdeducc(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcparproPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		
			$rs = CcparproPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcperiod(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcparproPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcparproPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
		
			$rs = CcparproPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptContabb(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol2 = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpartidPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcprograPeer::NUM_COLUMNS;
	
			CctipintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipintPeer::NUM_COLUMNS;
	
			CcdeduccPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcdeduccPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpartid(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparpros();
					$obj2->addCcparpro($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcprogra(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparpros();
					$obj3->addCcparpro($obj1);
				}
	
				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipint(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcparpros();
					$obj4->addCcparpro($obj1);
				}
	
				$omClass = CcdeduccPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcdeducc(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcparpros();
					$obj5->addCcparpro($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcperiod(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcparpros();
					$obj6->addCcparpro($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcpartid(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol2 = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			ContabbPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + ContabbPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcprograPeer::NUM_COLUMNS;
	
			CctipintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipintPeer::NUM_COLUMNS;
	
			CcdeduccPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcdeduccPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getContabb(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparpros();
					$obj2->addCcparpro($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcprogra(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparpros();
					$obj3->addCcparpro($obj1);
				}
	
				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipint(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcparpros();
					$obj4->addCcparpro($obj1);
				}
	
				$omClass = CcdeduccPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcdeducc(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcparpros();
					$obj5->addCcparpro($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcperiod(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcparpros();
					$obj6->addCcparpro($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcprogra(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol2 = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			ContabbPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + ContabbPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CctipintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipintPeer::NUM_COLUMNS;
	
			CcdeduccPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcdeduccPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getContabb(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparpros();
					$obj2->addCcparpro($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpartid(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparpros();
					$obj3->addCcparpro($obj1);
				}
	
				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipint(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcparpros();
					$obj4->addCcparpro($obj1);
				}
	
				$omClass = CcdeduccPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcdeducc(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcparpros();
					$obj5->addCcparpro($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcperiod(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcparpros();
					$obj6->addCcparpro($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCctipint(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol2 = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			ContabbPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + ContabbPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			CcdeduccPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcdeduccPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getContabb(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparpros();
					$obj2->addCcparpro($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpartid(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparpros();
					$obj3->addCcparpro($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcprogra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcparpros();
					$obj4->addCcparpro($obj1);
				}
	
				$omClass = CcdeduccPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcdeducc(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcparpros();
					$obj5->addCcparpro($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcperiod(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcparpros();
					$obj6->addCcparpro($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcdeducc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol2 = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			ContabbPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + ContabbPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			CctipintPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctipintPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getContabb(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparpros();
					$obj2->addCcparpro($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpartid(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparpros();
					$obj3->addCcparpro($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcprogra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcparpros();
					$obj4->addCcparpro($obj1);
				}
	
				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCctipint(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcparpros();
					$obj5->addCcparpro($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcperiod(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcparpros();
					$obj6->addCcparpro($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcperiod(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparproPeer::addSelectColumns($c);
		$startcol2 = (CcparproPeer::NUM_COLUMNS - CcparproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			ContabbPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + ContabbPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcprograPeer::NUM_COLUMNS;
	
			CctipintPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctipintPeer::NUM_COLUMNS;
	
			CcdeduccPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcdeduccPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparproPeer::CONTABB_ID, ContabbPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcparproPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcparproPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcparproPeer::CCDEDUCC_ID, CcdeduccPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getContabb(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparpros();
					$obj2->addCcparpro($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpartid(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcparpros();
					$obj3->addCcparpro($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcprogra(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcparpros();
					$obj4->addCcparpro($obj1);
				}
	
				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCctipint(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcparpros();
					$obj5->addCcparpro($obj1);
				}
	
				$omClass = CcdeduccPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcdeducc(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcparpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcparpros();
					$obj6->addCcparpro($obj1);
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
		return CcparproPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcparproPeer::ID); 

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
			$comparison = $criteria->getComparison(CcparproPeer::ID);
			$selectCriteria->add(CcparproPeer::ID, $criteria->remove(CcparproPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcparproPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcparproPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccparpro) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcparproPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccparpro $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcparproPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcparproPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcparproPeer::DATABASE_NAME, CcparproPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcparproPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcparproPeer::DATABASE_NAME);

		$criteria->add(CcparproPeer::ID, $pk);


		$v = CcparproPeer::doSelect($criteria, $con);

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
			$criteria->add(CcparproPeer::ID, $pks, Criteria::IN);
			$objs = CcparproPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcparproPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcparproMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcparproMapBuilder');
}
