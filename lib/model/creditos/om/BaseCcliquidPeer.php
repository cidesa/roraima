<?php


abstract class BaseCcliquidPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccliquid';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccliquid';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccliquid.ID';

	
	const ORDLIQ = 'ccliquid.ORDLIQ';

	
	const MONLIQ = 'ccliquid.MONLIQ';

	
	const NUMCHE = 'ccliquid.NUMCHE';

	
	const CODUSUAUT = 'ccliquid.CODUSUAUT';

	
	const ESTCHE = 'ccliquid.ESTCHE';

	
	const MONACULIQ = 'ccliquid.MONACULIQ';

	
	const CCCREDIT_ID = 'ccliquid.CCCREDIT_ID';

	
	const CCCUADES_ID = 'ccliquid.CCCUADES_ID';

	
	const CCPARTID_ID = 'ccliquid.CCPARTID_ID';

	
	const CCSOLLIQ_ID = 'ccliquid.CCSOLLIQ_ID';

	
	const CCCONCEP_ID = 'ccliquid.CCCONCEP_ID';

	
	const CCPAGTER_ID = 'ccliquid.CCPAGTER_ID';

	
	const CCCUEBAN_ID = 'ccliquid.CCCUEBAN_ID';

	
	const CCPROGRA_ID = 'ccliquid.CCPROGRA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Ordliq', 'Monliq', 'Numche', 'Codusuaut', 'Estche', 'Monaculiq', 'CccreditId', 'CccuadesId', 'CcpartidId', 'CcsolliqId', 'CcconcepId', 'CcpagterId', 'CccuebanId', 'CcprograId', ),
		BasePeer::TYPE_COLNAME => array (CcliquidPeer::ID, CcliquidPeer::ORDLIQ, CcliquidPeer::MONLIQ, CcliquidPeer::NUMCHE, CcliquidPeer::CODUSUAUT, CcliquidPeer::ESTCHE, CcliquidPeer::MONACULIQ, CcliquidPeer::CCCREDIT_ID, CcliquidPeer::CCCUADES_ID, CcliquidPeer::CCPARTID_ID, CcliquidPeer::CCSOLLIQ_ID, CcliquidPeer::CCCONCEP_ID, CcliquidPeer::CCPAGTER_ID, CcliquidPeer::CCCUEBAN_ID, CcliquidPeer::CCPROGRA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'ordliq', 'monliq', 'numche', 'codusuaut', 'estche', 'monaculiq', 'cccredit_id', 'cccuades_id', 'ccpartid_id', 'ccsolliq_id', 'ccconcep_id', 'ccpagter_id', 'cccueban_id', 'ccprogra_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Ordliq' => 1, 'Monliq' => 2, 'Numche' => 3, 'Codusuaut' => 4, 'Estche' => 5, 'Monaculiq' => 6, 'CccreditId' => 7, 'CccuadesId' => 8, 'CcpartidId' => 9, 'CcsolliqId' => 10, 'CcconcepId' => 11, 'CcpagterId' => 12, 'CccuebanId' => 13, 'CcprograId' => 14, ),
		BasePeer::TYPE_COLNAME => array (CcliquidPeer::ID => 0, CcliquidPeer::ORDLIQ => 1, CcliquidPeer::MONLIQ => 2, CcliquidPeer::NUMCHE => 3, CcliquidPeer::CODUSUAUT => 4, CcliquidPeer::ESTCHE => 5, CcliquidPeer::MONACULIQ => 6, CcliquidPeer::CCCREDIT_ID => 7, CcliquidPeer::CCCUADES_ID => 8, CcliquidPeer::CCPARTID_ID => 9, CcliquidPeer::CCSOLLIQ_ID => 10, CcliquidPeer::CCCONCEP_ID => 11, CcliquidPeer::CCPAGTER_ID => 12, CcliquidPeer::CCCUEBAN_ID => 13, CcliquidPeer::CCPROGRA_ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'ordliq' => 1, 'monliq' => 2, 'numche' => 3, 'codusuaut' => 4, 'estche' => 5, 'monaculiq' => 6, 'cccredit_id' => 7, 'cccuades_id' => 8, 'ccpartid_id' => 9, 'ccsolliq_id' => 10, 'ccconcep_id' => 11, 'ccpagter_id' => 12, 'cccueban_id' => 13, 'ccprogra_id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcliquidMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcliquidMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcliquidPeer::getTableMap();
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
		return str_replace(CcliquidPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcliquidPeer::ID);

		$criteria->addSelectColumn(CcliquidPeer::ORDLIQ);

		$criteria->addSelectColumn(CcliquidPeer::MONLIQ);

		$criteria->addSelectColumn(CcliquidPeer::NUMCHE);

		$criteria->addSelectColumn(CcliquidPeer::CODUSUAUT);

		$criteria->addSelectColumn(CcliquidPeer::ESTCHE);

		$criteria->addSelectColumn(CcliquidPeer::MONACULIQ);

		$criteria->addSelectColumn(CcliquidPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcliquidPeer::CCCUADES_ID);

		$criteria->addSelectColumn(CcliquidPeer::CCPARTID_ID);

		$criteria->addSelectColumn(CcliquidPeer::CCSOLLIQ_ID);

		$criteria->addSelectColumn(CcliquidPeer::CCCONCEP_ID);

		$criteria->addSelectColumn(CcliquidPeer::CCPAGTER_ID);

		$criteria->addSelectColumn(CcliquidPeer::CCCUEBAN_ID);

		$criteria->addSelectColumn(CcliquidPeer::CCPROGRA_ID);

	}

	const COUNT = 'COUNT(ccliquid.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccliquid.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcliquidPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcliquidPeer::doSelectRS($criteria, $con);
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
		$objects = CcliquidPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcliquidPeer::populateObjects(CcliquidPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcliquidPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcliquidPeer::getOMClass();
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
			$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcliquidPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcliquidPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcliquidPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);

		$rs = CcliquidPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcliquidPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);

		$rs = CcliquidPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcsolliq(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcliquidPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);

		$rs = CcliquidPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcconcep(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcliquidPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);

		$rs = CcliquidPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcpagter(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcliquidPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);

		$rs = CcliquidPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccueban(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcliquidPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);

		$rs = CcliquidPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcliquidPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);

		$rs = CcliquidPeer::doSelectRS($criteria, $con);
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

		CcliquidPeer::addSelectColumns($c);
		$startcol = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
										$temp_obj2->addCcliquid($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcliquids();
				$obj2->addCcliquid($obj1); 			}
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

		CcliquidPeer::addSelectColumns($c);
		$startcol = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccuadesPeer::addSelectColumns($c);

		$c->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
										$temp_obj2->addCcliquid($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcliquids();
				$obj2->addCcliquid($obj1); 			}
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

		CcliquidPeer::addSelectColumns($c);
		$startcol = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpartidPeer::addSelectColumns($c);

		$c->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
										$temp_obj2->addCcliquid($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcliquids();
				$obj2->addCcliquid($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcsolliq(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcliquidPeer::addSelectColumns($c);
		$startcol = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsolliqPeer::addSelectColumns($c);

		$c->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcsolliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcsolliq(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcliquid($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcliquids();
				$obj2->addCcliquid($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcconcep(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcliquidPeer::addSelectColumns($c);
		$startcol = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcconcepPeer::addSelectColumns($c);

		$c->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcconcepPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcconcep(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcliquid($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcliquids();
				$obj2->addCcliquid($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcpagter(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcliquidPeer::addSelectColumns($c);
		$startcol = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpagterPeer::addSelectColumns($c);

		$c->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcpagterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcpagter(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcliquid($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcliquids();
				$obj2->addCcliquid($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccueban(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcliquidPeer::addSelectColumns($c);
		$startcol = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccuebanPeer::addSelectColumns($c);

		$c->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccuebanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccueban(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcliquid($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcliquids();
				$obj2->addCcliquid($obj1); 			}
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

		CcliquidPeer::addSelectColumns($c);
		$startcol = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcprograPeer::addSelectColumns($c);

		$c->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
										$temp_obj2->addCcliquid($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcliquids();
				$obj2->addCcliquid($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcliquidPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$criteria->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$criteria->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$criteria->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$criteria->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$criteria->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$criteria->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
	
		$rs = CcliquidPeer::doSelectRS($criteria, $con);
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

		CcliquidPeer::addSelectColumns($c);
		$startcol2 = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuadesPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcsolliqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsolliqPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcconcepPeer::NUM_COLUMNS;
	
			CcpagterPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcpagterPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CccuebanPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();


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
						$temp_obj2->addCcliquid($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcliquids();
					$obj2->addCcliquid($obj1);
				}
	

							
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccuades(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcliquid($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcliquids();
					$obj3->addCcliquid($obj1);
				}
	

							
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcliquid($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcliquids();
					$obj4->addCcliquid($obj1);
				}
	

							
				$omClass = CcsolliqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolliq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcliquid($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcliquids();
					$obj5->addCcliquid($obj1);
				}
	

							
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcconcep(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcliquid($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcliquids();
					$obj6->addCcliquid($obj1);
				}
	

							
				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcpagter(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcliquid($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initCcliquids();
					$obj7->addCcliquid($obj1);
				}
	

							
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8 = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCccueban(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcliquid($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj8->initCcliquids();
					$obj8->addCcliquid($obj1);
				}
	

							
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9 = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCcprogra(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcliquid($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj9->initCcliquids();
					$obj9->addCcliquid($obj1);
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
				$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcliquidPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcliquidPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcliquidPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcliquidPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcliquidPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcliquidPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcsolliq(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcliquidPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcliquidPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcconcep(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcliquidPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcliquidPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcpagter(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcliquidPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcliquidPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccueban(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcliquidPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcliquidPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcliquidPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcliquidPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
			$rs = CcliquidPeer::doSelectRS($criteria, $con);
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

		CcliquidPeer::addSelectColumns($c);
		$startcol2 = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccuadesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccuadesPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcsolliqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcsolliqPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcconcepPeer::NUM_COLUMNS;
	
			CcpagterPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcpagterPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CccuebanPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccuades(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcliquids();
					$obj2->addCcliquid($obj1);
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
						$temp_obj3->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcliquids();
					$obj3->addCcliquid($obj1);
				}
	
				$omClass = CcsolliqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcsolliq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcliquids();
					$obj4->addCcliquid($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcconcep(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcliquids();
					$obj5->addCcliquid($obj1);
				}
	
				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcpagter(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcliquids();
					$obj6->addCcliquid($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCccueban(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcliquids();
					$obj7->addCcliquid($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprogra(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcliquids();
					$obj8->addCcliquid($obj1);
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

		CcliquidPeer::addSelectColumns($c);
		$startcol2 = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpartidPeer::NUM_COLUMNS;
	
			CcsolliqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcsolliqPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcconcepPeer::NUM_COLUMNS;
	
			CcpagterPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcpagterPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CccuebanPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
						$temp_obj2->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcliquids();
					$obj2->addCcliquid($obj1);
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
						$temp_obj3->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcliquids();
					$obj3->addCcliquid($obj1);
				}
	
				$omClass = CcsolliqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcsolliq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcliquids();
					$obj4->addCcliquid($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcconcep(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcliquids();
					$obj5->addCcliquid($obj1);
				}
	
				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcpagter(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcliquids();
					$obj6->addCcliquid($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCccueban(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcliquids();
					$obj7->addCcliquid($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprogra(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcliquids();
					$obj8->addCcliquid($obj1);
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

		CcliquidPeer::addSelectColumns($c);
		$startcol2 = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuadesPeer::NUM_COLUMNS;
	
			CcsolliqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcsolliqPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcconcepPeer::NUM_COLUMNS;
	
			CcpagterPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcpagterPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CccuebanPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
						$temp_obj2->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcliquids();
					$obj2->addCcliquid($obj1);
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
						$temp_obj3->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcliquids();
					$obj3->addCcliquid($obj1);
				}
	
				$omClass = CcsolliqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcsolliq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcliquids();
					$obj4->addCcliquid($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcconcep(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcliquids();
					$obj5->addCcliquid($obj1);
				}
	
				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcpagter(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcliquids();
					$obj6->addCcliquid($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCccueban(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcliquids();
					$obj7->addCcliquid($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprogra(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcliquids();
					$obj8->addCcliquid($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcsolliq(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcliquidPeer::addSelectColumns($c);
		$startcol2 = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuadesPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcconcepPeer::NUM_COLUMNS;
	
			CcpagterPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcpagterPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CccuebanPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
						$temp_obj2->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcliquids();
					$obj2->addCcliquid($obj1);
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
						$temp_obj3->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcliquids();
					$obj3->addCcliquid($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcliquids();
					$obj4->addCcliquid($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcconcep(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcliquids();
					$obj5->addCcliquid($obj1);
				}
	
				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcpagter(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcliquids();
					$obj6->addCcliquid($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCccueban(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcliquids();
					$obj7->addCcliquid($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprogra(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcliquids();
					$obj8->addCcliquid($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcconcep(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcliquidPeer::addSelectColumns($c);
		$startcol2 = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuadesPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcsolliqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsolliqPeer::NUM_COLUMNS;
	
			CcpagterPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcpagterPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CccuebanPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
						$temp_obj2->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcliquids();
					$obj2->addCcliquid($obj1);
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
						$temp_obj3->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcliquids();
					$obj3->addCcliquid($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcliquids();
					$obj4->addCcliquid($obj1);
				}
	
				$omClass = CcsolliqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolliq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcliquids();
					$obj5->addCcliquid($obj1);
				}
	
				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcpagter(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcliquids();
					$obj6->addCcliquid($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCccueban(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcliquids();
					$obj7->addCcliquid($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprogra(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcliquids();
					$obj8->addCcliquid($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcpagter(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcliquidPeer::addSelectColumns($c);
		$startcol2 = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuadesPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcsolliqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsolliqPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcconcepPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CccuebanPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
						$temp_obj2->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcliquids();
					$obj2->addCcliquid($obj1);
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
						$temp_obj3->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcliquids();
					$obj3->addCcliquid($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcliquids();
					$obj4->addCcliquid($obj1);
				}
	
				$omClass = CcsolliqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolliq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcliquids();
					$obj5->addCcliquid($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcconcep(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcliquids();
					$obj6->addCcliquid($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCccueban(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcliquids();
					$obj7->addCcliquid($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprogra(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcliquids();
					$obj8->addCcliquid($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccueban(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcliquidPeer::addSelectColumns($c);
		$startcol2 = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuadesPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcsolliqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsolliqPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcconcepPeer::NUM_COLUMNS;
	
			CcpagterPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcpagterPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
						$temp_obj2->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcliquids();
					$obj2->addCcliquid($obj1);
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
						$temp_obj3->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcliquids();
					$obj3->addCcliquid($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcliquids();
					$obj4->addCcliquid($obj1);
				}
	
				$omClass = CcsolliqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolliq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcliquids();
					$obj5->addCcliquid($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcconcep(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcliquids();
					$obj6->addCcliquid($obj1);
				}
	
				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcpagter(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcliquids();
					$obj7->addCcliquid($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprogra(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcliquids();
					$obj8->addCcliquid($obj1);
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

		CcliquidPeer::addSelectColumns($c);
		$startcol2 = (CcliquidPeer::NUM_COLUMNS - CcliquidPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuadesPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcsolliqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsolliqPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcconcepPeer::NUM_COLUMNS;
	
			CcpagterPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcpagterPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CccuebanPeer::NUM_COLUMNS;
	
			$c->addJoin(CcliquidPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCSOLLIQ_ID, CcsolliqPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcliquidPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcliquidPeer::getOMClass();

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
						$temp_obj2->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcliquids();
					$obj2->addCcliquid($obj1);
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
						$temp_obj3->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcliquids();
					$obj3->addCcliquid($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcliquids();
					$obj4->addCcliquid($obj1);
				}
	
				$omClass = CcsolliqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolliq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcliquids();
					$obj5->addCcliquid($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcconcep(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcliquids();
					$obj6->addCcliquid($obj1);
				}
	
				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcpagter(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcliquids();
					$obj7->addCcliquid($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCccueban(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcliquid($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcliquids();
					$obj8->addCcliquid($obj1);
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
		return CcliquidPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcliquidPeer::ID); 

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
			$comparison = $criteria->getComparison(CcliquidPeer::ID);
			$selectCriteria->add(CcliquidPeer::ID, $criteria->remove(CcliquidPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcliquidPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcliquidPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccliquid) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcliquidPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccliquid $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcliquidPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcliquidPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcliquidPeer::DATABASE_NAME, CcliquidPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcliquidPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcliquidPeer::DATABASE_NAME);

		$criteria->add(CcliquidPeer::ID, $pk);


		$v = CcliquidPeer::doSelect($criteria, $con);

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
			$criteria->add(CcliquidPeer::ID, $pks, Criteria::IN);
			$objs = CcliquidPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcliquidPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcliquidMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcliquidMapBuilder');
}
