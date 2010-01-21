<?php


abstract class BaseCcamopagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccamopag';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccamopag';

	
	const NUM_COLUMNS = 26;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccamopag.ID';

	
	const DEBMONINT = 'ccamopag.DEBMONINT';

	
	const DEBMONCAP = 'ccamopag.DEBMONCAP';

	
	const DEBMONINTMOR = 'ccamopag.DEBMONINTMOR';

	
	const DEBMONINTGRA = 'ccamopag.DEBMONINTGRA';

	
	const DEBMONINTCUM = 'ccamopag.DEBMONINTCUM';

	
	const PAGMONCAP = 'ccamopag.PAGMONCAP';

	
	const PAGMONINT = 'ccamopag.PAGMONINT';

	
	const PAGMONINTMOR = 'ccamopag.PAGMONINTMOR';

	
	const PAGMONINTGRA = 'ccamopag.PAGMONINTGRA';

	
	const PAGMONINTCUM = 'ccamopag.PAGMONINTCUM';

	
	const SALMONCAP = 'ccamopag.SALMONCAP';

	
	const SALMONINT = 'ccamopag.SALMONINT';

	
	const SALMONINTMOR = 'ccamopag.SALMONINTMOR';

	
	const SALMONINTGRA = 'ccamopag.SALMONINTGRA';

	
	const SALMONINTCUM = 'ccamopag.SALMONINTCUM';

	
	const FECPAG = 'ccamopag.FECPAG';

	
	const FECVEN = 'ccamopag.FECVEN';

	
	const CEDRIFCUE = 'ccamopag.CEDRIFCUE';

	
	const ESTATU = 'ccamopag.ESTATU';

	
	const CCAMOACT_ID = 'ccamopag.CCAMOACT_ID';

	
	const CCPAGO_ID = 'ccamopag.CCPAGO_ID';

	
	const CCCREDIT_ID = 'ccamopag.CCCREDIT_ID';

	
	const CCPERPRE_ID = 'ccamopag.CCPERPRE_ID';

	
	const CCPARTID_ID = 'ccamopag.CCPARTID_ID';

	
	const CCPROGRA_ID = 'ccamopag.CCPROGRA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Debmonint', 'Debmoncap', 'Debmonintmor', 'Debmonintgra', 'Debmonintcum', 'Pagmoncap', 'Pagmonint', 'Pagmonintmor', 'Pagmonintgra', 'Pagmonintcum', 'Salmoncap', 'Salmonint', 'Salmonintmor', 'Salmonintgra', 'Salmonintcum', 'Fecpag', 'Fecven', 'Cedrifcue', 'Estatu', 'CcamoactId', 'CcpagoId', 'CccreditId', 'CcperpreId', 'CcpartidId', 'CcprograId', ),
		BasePeer::TYPE_COLNAME => array (CcamopagPeer::ID, CcamopagPeer::DEBMONINT, CcamopagPeer::DEBMONCAP, CcamopagPeer::DEBMONINTMOR, CcamopagPeer::DEBMONINTGRA, CcamopagPeer::DEBMONINTCUM, CcamopagPeer::PAGMONCAP, CcamopagPeer::PAGMONINT, CcamopagPeer::PAGMONINTMOR, CcamopagPeer::PAGMONINTGRA, CcamopagPeer::PAGMONINTCUM, CcamopagPeer::SALMONCAP, CcamopagPeer::SALMONINT, CcamopagPeer::SALMONINTMOR, CcamopagPeer::SALMONINTGRA, CcamopagPeer::SALMONINTCUM, CcamopagPeer::FECPAG, CcamopagPeer::FECVEN, CcamopagPeer::CEDRIFCUE, CcamopagPeer::ESTATU, CcamopagPeer::CCAMOACT_ID, CcamopagPeer::CCPAGO_ID, CcamopagPeer::CCCREDIT_ID, CcamopagPeer::CCPERPRE_ID, CcamopagPeer::CCPARTID_ID, CcamopagPeer::CCPROGRA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'debmonint', 'debmoncap', 'debmonintmor', 'debmonintgra', 'debmonintcum', 'pagmoncap', 'pagmonint', 'pagmonintmor', 'pagmonintgra', 'pagmonintcum', 'salmoncap', 'salmonint', 'salmonintmor', 'salmonintgra', 'salmonintcum', 'fecpag', 'fecven', 'cedrifcue', 'estatu', 'ccamoact_id', 'ccpago_id', 'cccredit_id', 'ccperpre_id', 'ccpartid_id', 'ccprogra_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Debmonint' => 1, 'Debmoncap' => 2, 'Debmonintmor' => 3, 'Debmonintgra' => 4, 'Debmonintcum' => 5, 'Pagmoncap' => 6, 'Pagmonint' => 7, 'Pagmonintmor' => 8, 'Pagmonintgra' => 9, 'Pagmonintcum' => 10, 'Salmoncap' => 11, 'Salmonint' => 12, 'Salmonintmor' => 13, 'Salmonintgra' => 14, 'Salmonintcum' => 15, 'Fecpag' => 16, 'Fecven' => 17, 'Cedrifcue' => 18, 'Estatu' => 19, 'CcamoactId' => 20, 'CcpagoId' => 21, 'CccreditId' => 22, 'CcperpreId' => 23, 'CcpartidId' => 24, 'CcprograId' => 25, ),
		BasePeer::TYPE_COLNAME => array (CcamopagPeer::ID => 0, CcamopagPeer::DEBMONINT => 1, CcamopagPeer::DEBMONCAP => 2, CcamopagPeer::DEBMONINTMOR => 3, CcamopagPeer::DEBMONINTGRA => 4, CcamopagPeer::DEBMONINTCUM => 5, CcamopagPeer::PAGMONCAP => 6, CcamopagPeer::PAGMONINT => 7, CcamopagPeer::PAGMONINTMOR => 8, CcamopagPeer::PAGMONINTGRA => 9, CcamopagPeer::PAGMONINTCUM => 10, CcamopagPeer::SALMONCAP => 11, CcamopagPeer::SALMONINT => 12, CcamopagPeer::SALMONINTMOR => 13, CcamopagPeer::SALMONINTGRA => 14, CcamopagPeer::SALMONINTCUM => 15, CcamopagPeer::FECPAG => 16, CcamopagPeer::FECVEN => 17, CcamopagPeer::CEDRIFCUE => 18, CcamopagPeer::ESTATU => 19, CcamopagPeer::CCAMOACT_ID => 20, CcamopagPeer::CCPAGO_ID => 21, CcamopagPeer::CCCREDIT_ID => 22, CcamopagPeer::CCPERPRE_ID => 23, CcamopagPeer::CCPARTID_ID => 24, CcamopagPeer::CCPROGRA_ID => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'debmonint' => 1, 'debmoncap' => 2, 'debmonintmor' => 3, 'debmonintgra' => 4, 'debmonintcum' => 5, 'pagmoncap' => 6, 'pagmonint' => 7, 'pagmonintmor' => 8, 'pagmonintgra' => 9, 'pagmonintcum' => 10, 'salmoncap' => 11, 'salmonint' => 12, 'salmonintmor' => 13, 'salmonintgra' => 14, 'salmonintcum' => 15, 'fecpag' => 16, 'fecven' => 17, 'cedrifcue' => 18, 'estatu' => 19, 'ccamoact_id' => 20, 'ccpago_id' => 21, 'cccredit_id' => 22, 'ccperpre_id' => 23, 'ccpartid_id' => 24, 'ccprogra_id' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcamopagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcamopagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcamopagPeer::getTableMap();
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
		return str_replace(CcamopagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcamopagPeer::ID);

		$criteria->addSelectColumn(CcamopagPeer::DEBMONINT);

		$criteria->addSelectColumn(CcamopagPeer::DEBMONCAP);

		$criteria->addSelectColumn(CcamopagPeer::DEBMONINTMOR);

		$criteria->addSelectColumn(CcamopagPeer::DEBMONINTGRA);

		$criteria->addSelectColumn(CcamopagPeer::DEBMONINTCUM);

		$criteria->addSelectColumn(CcamopagPeer::PAGMONCAP);

		$criteria->addSelectColumn(CcamopagPeer::PAGMONINT);

		$criteria->addSelectColumn(CcamopagPeer::PAGMONINTMOR);

		$criteria->addSelectColumn(CcamopagPeer::PAGMONINTGRA);

		$criteria->addSelectColumn(CcamopagPeer::PAGMONINTCUM);

		$criteria->addSelectColumn(CcamopagPeer::SALMONCAP);

		$criteria->addSelectColumn(CcamopagPeer::SALMONINT);

		$criteria->addSelectColumn(CcamopagPeer::SALMONINTMOR);

		$criteria->addSelectColumn(CcamopagPeer::SALMONINTGRA);

		$criteria->addSelectColumn(CcamopagPeer::SALMONINTCUM);

		$criteria->addSelectColumn(CcamopagPeer::FECPAG);

		$criteria->addSelectColumn(CcamopagPeer::FECVEN);

		$criteria->addSelectColumn(CcamopagPeer::CEDRIFCUE);

		$criteria->addSelectColumn(CcamopagPeer::ESTATU);

		$criteria->addSelectColumn(CcamopagPeer::CCAMOACT_ID);

		$criteria->addSelectColumn(CcamopagPeer::CCPAGO_ID);

		$criteria->addSelectColumn(CcamopagPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcamopagPeer::CCPERPRE_ID);

		$criteria->addSelectColumn(CcamopagPeer::CCPARTID_ID);

		$criteria->addSelectColumn(CcamopagPeer::CCPROGRA_ID);

	}

	const COUNT = 'COUNT(ccamopag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccamopag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamopagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcamopagPeer::doSelectRS($criteria, $con);
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
		$objects = CcamopagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcamopagPeer::populateObjects(CcamopagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcamopagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcamopagPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcamoact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamopagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);

		$rs = CcamopagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcpago(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamopagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);

		$rs = CcamopagPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamopagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcamopagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcperpre(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamopagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);

		$rs = CcamopagPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamopagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);

		$rs = CcamopagPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamopagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);

		$rs = CcamopagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcamoact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamopagPeer::addSelectColumns($c);
		$startcol = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcamoactPeer::addSelectColumns($c);

		$c->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcamoactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcamoact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcamopag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamopags();
				$obj2->addCcamopag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcpago(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamopagPeer::addSelectColumns($c);
		$startcol = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpagoPeer::addSelectColumns($c);

		$c->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcpagoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcpago(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcamopag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamopags();
				$obj2->addCcamopag($obj1); 			}
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

		CcamopagPeer::addSelectColumns($c);
		$startcol = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

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
										$temp_obj2->addCcamopag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamopags();
				$obj2->addCcamopag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamopagPeer::addSelectColumns($c);
		$startcol = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperprePeer::addSelectColumns($c);

		$c->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperprePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperpre(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcamopag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamopags();
				$obj2->addCcamopag($obj1); 			}
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

		CcamopagPeer::addSelectColumns($c);
		$startcol = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpartidPeer::addSelectColumns($c);

		$c->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

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
										$temp_obj2->addCcamopag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamopags();
				$obj2->addCcamopag($obj1); 			}
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

		CcamopagPeer::addSelectColumns($c);
		$startcol = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcprograPeer::addSelectColumns($c);

		$c->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

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
										$temp_obj2->addCcamopag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcamopags();
				$obj2->addCcamopag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcamopagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
	
			$criteria->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
	
			$criteria->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$criteria->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$criteria->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
	
		$rs = CcamopagPeer::doSelectRS($criteria, $con);
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

		CcamopagPeer::addSelectColumns($c);
		$startcol2 = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcamoactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcamoactPeer::NUM_COLUMNS;
	
			CcpagoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpagoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcperprePeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcamoactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcamoact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamopag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamopags();
					$obj2->addCcamopag($obj1);
				}
	

							
				$omClass = CcpagoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpago(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcamopag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamopags();
					$obj3->addCcamopag($obj1);
				}
	

							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcamopag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamopags();
					$obj4->addCcamopag($obj1);
				}
	

							
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcperpre(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcamopag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcamopags();
					$obj5->addCcamopag($obj1);
				}
	

							
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcpartid(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcamopag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcamopags();
					$obj6->addCcamopag($obj1);
				}
	

							
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcprogra(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcamopag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initCcamopags();
					$obj7->addCcamopag($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcamoact(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamopagPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamopagPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcpago(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamopagPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamopagPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamopagPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamopagPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcperpre(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamopagPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamopagPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamopagPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcamopagPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcamopagPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcamopagPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
		
			$rs = CcamopagPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcamoact(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamopagPeer::addSelectColumns($c);
		$startcol2 = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcpagoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcpagoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcperprePeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcpagoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcpago(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamopags();
					$obj2->addCcamopag($obj1);
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
						$temp_obj3->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamopags();
					$obj3->addCcamopag($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcperpre(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamopags();
					$obj4->addCcamopag($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcpartid(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcamopags();
					$obj5->addCcamopag($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcprogra(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcamopags();
					$obj6->addCcamopag($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcpago(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamopagPeer::addSelectColumns($c);
		$startcol2 = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcamoactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcamoactPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcperprePeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcamoactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcamoact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamopags();
					$obj2->addCcamopag($obj1);
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
						$temp_obj3->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamopags();
					$obj3->addCcamopag($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcperpre(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamopags();
					$obj4->addCcamopag($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcpartid(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcamopags();
					$obj5->addCcamopag($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcprogra(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcamopags();
					$obj6->addCcamopag($obj1);
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

		CcamopagPeer::addSelectColumns($c);
		$startcol2 = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcamoactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcamoactPeer::NUM_COLUMNS;
	
			CcpagoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpagoPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcperprePeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcamoactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcamoact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamopags();
					$obj2->addCcamopag($obj1);
				}
	
				$omClass = CcpagoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpago(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamopags();
					$obj3->addCcamopag($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcperpre(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamopags();
					$obj4->addCcamopag($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcpartid(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcamopags();
					$obj5->addCcamopag($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcprogra(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcamopags();
					$obj6->addCcamopag($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcamopagPeer::addSelectColumns($c);
		$startcol2 = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcamoactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcamoactPeer::NUM_COLUMNS;
	
			CcpagoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpagoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcamoactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcamoact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamopags();
					$obj2->addCcamopag($obj1);
				}
	
				$omClass = CcpagoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpago(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamopags();
					$obj3->addCcamopag($obj1);
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
						$temp_obj4->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamopags();
					$obj4->addCcamopag($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcpartid(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcamopags();
					$obj5->addCcamopag($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcprogra(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcamopags();
					$obj6->addCcamopag($obj1);
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

		CcamopagPeer::addSelectColumns($c);
		$startcol2 = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcamoactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcamoactPeer::NUM_COLUMNS;
	
			CcpagoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpagoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcperprePeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcamoactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcamoact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamopags();
					$obj2->addCcamopag($obj1);
				}
	
				$omClass = CcpagoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpago(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamopags();
					$obj3->addCcamopag($obj1);
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
						$temp_obj4->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamopags();
					$obj4->addCcamopag($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcperpre(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcamopags();
					$obj5->addCcamopag($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcprogra(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcamopags();
					$obj6->addCcamopag($obj1);
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

		CcamopagPeer::addSelectColumns($c);
		$startcol2 = (CcamopagPeer::NUM_COLUMNS - CcamopagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcamoactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcamoactPeer::NUM_COLUMNS;
	
			CcpagoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcpagoPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			CcperprePeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcperprePeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcpartidPeer::NUM_COLUMNS;
	
			$c->addJoin(CcamopagPeer::CCAMOACT_ID, CcamoactPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPAGO_ID, CcpagoPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcamopagPeer::CCPARTID_ID, CcpartidPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcamopagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcamoactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcamoact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcamopags();
					$obj2->addCcamopag($obj1);
				}
	
				$omClass = CcpagoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcpago(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcamopags();
					$obj3->addCcamopag($obj1);
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
						$temp_obj4->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcamopags();
					$obj4->addCcamopag($obj1);
				}
	
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcperpre(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcamopags();
					$obj5->addCcamopag($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcpartid(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcamopag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcamopags();
					$obj6->addCcamopag($obj1);
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
		return CcamopagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcamopagPeer::ID); 

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
			$comparison = $criteria->getComparison(CcamopagPeer::ID);
			$selectCriteria->add(CcamopagPeer::ID, $criteria->remove(CcamopagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcamopagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcamopagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccamopag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcamopagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccamopag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcamopagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcamopagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcamopagPeer::DATABASE_NAME, CcamopagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcamopagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcamopagPeer::DATABASE_NAME);

		$criteria->add(CcamopagPeer::ID, $pk);


		$v = CcamopagPeer::doSelect($criteria, $con);

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
			$criteria->add(CcamopagPeer::ID, $pks, Criteria::IN);
			$objs = CcamopagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcamopagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcamopagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcamopagMapBuilder');
}
