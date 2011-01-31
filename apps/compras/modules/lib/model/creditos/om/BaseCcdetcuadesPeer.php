<?php


abstract class BaseCcdetcuadesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccdetcuades';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccdetcuades';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccdetcuades.ID';

	
	const MONTO = 'ccdetcuades.MONTO';

	
	const MONDED = 'ccdetcuades.MONDED';

	
	const NROCHEQCON = 'ccdetcuades.NROCHEQCON';

	
	const BENPRO = 'ccdetcuades.BENPRO';

	
	const CCPAGTER_ID = 'ccdetcuades.CCPAGTER_ID';

	
	const CCBENEFI_ID = 'ccdetcuades.CCBENEFI_ID';

	
	const CCCUEBAN_ID = 'ccdetcuades.CCCUEBAN_ID';

	
	const CCCONCEP_ID = 'ccdetcuades.CCCONCEP_ID';

	
	const CCCUADES_ID = 'ccdetcuades.CCCUADES_ID';

	
	const CPCAUSAD_ID = 'ccdetcuades.CPCAUSAD_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Monto', 'Monded', 'Nrocheqcon', 'Benpro', 'CcpagterId', 'CcbenefiId', 'CccuebanId', 'CcconcepId', 'CccuadesId', 'CpcausadId', ),
		BasePeer::TYPE_COLNAME => array (CcdetcuadesPeer::ID, CcdetcuadesPeer::MONTO, CcdetcuadesPeer::MONDED, CcdetcuadesPeer::NROCHEQCON, CcdetcuadesPeer::BENPRO, CcdetcuadesPeer::CCPAGTER_ID, CcdetcuadesPeer::CCBENEFI_ID, CcdetcuadesPeer::CCCUEBAN_ID, CcdetcuadesPeer::CCCONCEP_ID, CcdetcuadesPeer::CCCUADES_ID, CcdetcuadesPeer::CPCAUSAD_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'monto', 'monded', 'nrocheqcon', 'benpro', 'ccpagter_id', 'ccbenefi_id', 'cccueban_id', 'ccconcep_id', 'cccuades_id', 'cpcausad_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Monto' => 1, 'Monded' => 2, 'Nrocheqcon' => 3, 'Benpro' => 4, 'CcpagterId' => 5, 'CcbenefiId' => 6, 'CccuebanId' => 7, 'CcconcepId' => 8, 'CccuadesId' => 9, 'CpcausadId' => 10, ),
		BasePeer::TYPE_COLNAME => array (CcdetcuadesPeer::ID => 0, CcdetcuadesPeer::MONTO => 1, CcdetcuadesPeer::MONDED => 2, CcdetcuadesPeer::NROCHEQCON => 3, CcdetcuadesPeer::BENPRO => 4, CcdetcuadesPeer::CCPAGTER_ID => 5, CcdetcuadesPeer::CCBENEFI_ID => 6, CcdetcuadesPeer::CCCUEBAN_ID => 7, CcdetcuadesPeer::CCCONCEP_ID => 8, CcdetcuadesPeer::CCCUADES_ID => 9, CcdetcuadesPeer::CPCAUSAD_ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'monto' => 1, 'monded' => 2, 'nrocheqcon' => 3, 'benpro' => 4, 'ccpagter_id' => 5, 'ccbenefi_id' => 6, 'cccueban_id' => 7, 'ccconcep_id' => 8, 'cccuades_id' => 9, 'cpcausad_id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcdetcuadesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcdetcuadesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcdetcuadesPeer::getTableMap();
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
		return str_replace(CcdetcuadesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcdetcuadesPeer::ID);

		$criteria->addSelectColumn(CcdetcuadesPeer::MONTO);

		$criteria->addSelectColumn(CcdetcuadesPeer::MONDED);

		$criteria->addSelectColumn(CcdetcuadesPeer::NROCHEQCON);

		$criteria->addSelectColumn(CcdetcuadesPeer::BENPRO);

		$criteria->addSelectColumn(CcdetcuadesPeer::CCPAGTER_ID);

		$criteria->addSelectColumn(CcdetcuadesPeer::CCBENEFI_ID);

		$criteria->addSelectColumn(CcdetcuadesPeer::CCCUEBAN_ID);

		$criteria->addSelectColumn(CcdetcuadesPeer::CCCONCEP_ID);

		$criteria->addSelectColumn(CcdetcuadesPeer::CCCUADES_ID);

		$criteria->addSelectColumn(CcdetcuadesPeer::CPCAUSAD_ID);

	}

	const COUNT = 'COUNT(ccdetcuades.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccdetcuades.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
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
		$objects = CcdetcuadesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcdetcuadesPeer::populateObjects(CcdetcuadesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcdetcuadesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcdetcuadesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcpagter(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);

		$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);

		$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);

		$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);

		$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);

		$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpcausad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);

		$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcpagter(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpagterPeer::addSelectColumns($c);

		$c->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

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
										$temp_obj2->addCcdetcuades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdetcuadess();
				$obj2->addCcdetcuades($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbenefiPeer::addSelectColumns($c);

		$c->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcbenefi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdetcuades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdetcuadess();
				$obj2->addCcdetcuades($obj1); 			}
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

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccuebanPeer::addSelectColumns($c);

		$c->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

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
										$temp_obj2->addCcdetcuades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdetcuadess();
				$obj2->addCcdetcuades($obj1); 			}
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

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcconcepPeer::addSelectColumns($c);

		$c->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

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
										$temp_obj2->addCcdetcuades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdetcuadess();
				$obj2->addCcdetcuades($obj1); 			}
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

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccuadesPeer::addSelectColumns($c);

		$c->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

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
										$temp_obj2->addCcdetcuades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdetcuadess();
				$obj2->addCcdetcuades($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpcausad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpcausadPeer::addSelectColumns($c);

		$c->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpcausadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpcausad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdetcuades($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdetcuadess();
				$obj2->addCcdetcuades($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$criteria->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$criteria->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$criteria->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$criteria->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$criteria->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
	
		$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
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

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol2 = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpagterPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpagterPeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcbenefiPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccuebanPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcconcepPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccuadesPeer::NUM_COLUMNS;
	
			CpcausadPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CpcausadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpagter(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdetcuades($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdetcuadess();
					$obj2->addCcdetcuades($obj1);
				}
	

							
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdetcuades($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdetcuadess();
					$obj3->addCcdetcuades($obj1);
				}
	

							
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccueban(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdetcuades($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdetcuadess();
					$obj4->addCcdetcuades($obj1);
				}
	

							
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcconcep(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdetcuades($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdetcuadess();
					$obj5->addCcdetcuades($obj1);
				}
	

							
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccuades(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdetcuades($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdetcuadess();
					$obj6->addCcdetcuades($obj1);
				}
	

							
				$omClass = CpcausadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCpcausad(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcdetcuades($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initCcdetcuadess();
					$obj7->addCcdetcuades($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcpagter(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
		
			$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcbenefi(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
		
			$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
		
			$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
		
			$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
		
			$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpcausad(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdetcuadesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
		
				$criteria->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
		
			$rs = CcdetcuadesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcpagter(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol2 = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuebanPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcconcepPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccuadesPeer::NUM_COLUMNS;
	
			CpcausadPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CpcausadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdetcuadess();
					$obj2->addCcdetcuades($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccueban(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdetcuadess();
					$obj3->addCcdetcuades($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcconcep(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdetcuadess();
					$obj4->addCcdetcuades($obj1);
				}
	
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccuades(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdetcuadess();
					$obj5->addCcdetcuades($obj1);
				}
	
				$omClass = CpcausadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCpcausad(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdetcuadess();
					$obj6->addCcdetcuades($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol2 = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpagterPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpagterPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccuebanPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcconcepPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccuadesPeer::NUM_COLUMNS;
	
			CpcausadPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CpcausadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpagter(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdetcuadess();
					$obj2->addCcdetcuades($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccueban(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdetcuadess();
					$obj3->addCcdetcuades($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcconcep(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdetcuadess();
					$obj4->addCcdetcuades($obj1);
				}
	
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccuades(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdetcuadess();
					$obj5->addCcdetcuades($obj1);
				}
	
				$omClass = CpcausadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCpcausad(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdetcuadess();
					$obj6->addCcdetcuades($obj1);
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

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol2 = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpagterPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpagterPeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcbenefiPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcconcepPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccuadesPeer::NUM_COLUMNS;
	
			CpcausadPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CpcausadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpagter(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdetcuadess();
					$obj2->addCcdetcuades($obj1);
				}
	
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdetcuadess();
					$obj3->addCcdetcuades($obj1);
				}
	
				$omClass = CcconcepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcconcep(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdetcuadess();
					$obj4->addCcdetcuades($obj1);
				}
	
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccuades(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdetcuadess();
					$obj5->addCcdetcuades($obj1);
				}
	
				$omClass = CpcausadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCpcausad(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdetcuadess();
					$obj6->addCcdetcuades($obj1);
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

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol2 = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpagterPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpagterPeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcbenefiPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccuebanPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccuadesPeer::NUM_COLUMNS;
	
			CpcausadPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CpcausadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpagter(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdetcuadess();
					$obj2->addCcdetcuades($obj1);
				}
	
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdetcuadess();
					$obj3->addCcdetcuades($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccueban(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdetcuadess();
					$obj4->addCcdetcuades($obj1);
				}
	
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccuades(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdetcuadess();
					$obj5->addCcdetcuades($obj1);
				}
	
				$omClass = CpcausadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCpcausad(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdetcuadess();
					$obj6->addCcdetcuades($obj1);
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

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol2 = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpagterPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpagterPeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcbenefiPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccuebanPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcconcepPeer::NUM_COLUMNS;
	
			CpcausadPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CpcausadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CPCAUSAD_ID, CpcausadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpagter(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdetcuadess();
					$obj2->addCcdetcuades($obj1);
				}
	
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdetcuadess();
					$obj3->addCcdetcuades($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccueban(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdetcuadess();
					$obj4->addCcdetcuades($obj1);
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
						$temp_obj5->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdetcuadess();
					$obj5->addCcdetcuades($obj1);
				}
	
				$omClass = CpcausadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCpcausad(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdetcuadess();
					$obj6->addCcdetcuades($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpcausad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdetcuadesPeer::addSelectColumns($c);
		$startcol2 = (CcdetcuadesPeer::NUM_COLUMNS - CcdetcuadesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpagterPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpagterPeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcbenefiPeer::NUM_COLUMNS;
	
			CccuebanPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccuebanPeer::NUM_COLUMNS;
	
			CcconcepPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcconcepPeer::NUM_COLUMNS;
	
			CccuadesPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccuadesPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdetcuadesPeer::CCPAGTER_ID, CcpagterPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUEBAN_ID, CccuebanPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCONCEP_ID, CcconcepPeer::ID);
	
			$c->addJoin(CcdetcuadesPeer::CCCUADES_ID, CccuadesPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdetcuadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcpagterPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpagter(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdetcuadess();
					$obj2->addCcdetcuades($obj1);
				}
	
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdetcuadess();
					$obj3->addCcdetcuades($obj1);
				}
	
				$omClass = CccuebanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccueban(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdetcuadess();
					$obj4->addCcdetcuades($obj1);
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
						$temp_obj5->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdetcuadess();
					$obj5->addCcdetcuades($obj1);
				}
	
				$omClass = CccuadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccuades(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdetcuades($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdetcuadess();
					$obj6->addCcdetcuades($obj1);
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
		return CcdetcuadesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcdetcuadesPeer::ID); 

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
			$comparison = $criteria->getComparison(CcdetcuadesPeer::ID);
			$selectCriteria->add(CcdetcuadesPeer::ID, $criteria->remove(CcdetcuadesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcdetcuadesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcdetcuadesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccdetcuades) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcdetcuadesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccdetcuades $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcdetcuadesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcdetcuadesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcdetcuadesPeer::DATABASE_NAME, CcdetcuadesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcdetcuadesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcdetcuadesPeer::DATABASE_NAME);

		$criteria->add(CcdetcuadesPeer::ID, $pk);


		$v = CcdetcuadesPeer::doSelect($criteria, $con);

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
			$criteria->add(CcdetcuadesPeer::ID, $pks, Criteria::IN);
			$objs = CcdetcuadesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcdetcuadesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcdetcuadesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcdetcuadesMapBuilder');
}
