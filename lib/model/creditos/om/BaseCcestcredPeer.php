<?php


abstract class BaseCcestcredPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccestcred';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccestcred';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccestcred.ID';

	
	const FECHA = 'ccestcred.FECHA';

	
	const MEMO = 'ccestcred.MEMO';

	
	const CCESTATU_ID = 'ccestcred.CCESTATU_ID';

	
	const CCSOLICI_ID = 'ccestcred.CCSOLICI_ID';

	
	const CCUSUINT_ID = 'ccestcred.CCUSUINT_ID';

	
	const CCGERENCORI_ID = 'ccestcred.CCGERENCORI_ID';

	
	const CCGERENCDES_ID = 'ccestcred.CCGERENCDES_ID';

	
	const CCESTSIG_ID = 'ccestcred.CCESTSIG_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecha', 'Memo', 'CcestatuId', 'CcsoliciId', 'CcusuintId', 'CcgerencoriId', 'CcgerencdesId', 'CcestsigId', ),
		BasePeer::TYPE_COLNAME => array (CcestcredPeer::ID, CcestcredPeer::FECHA, CcestcredPeer::MEMO, CcestcredPeer::CCESTATU_ID, CcestcredPeer::CCSOLICI_ID, CcestcredPeer::CCUSUINT_ID, CcestcredPeer::CCGERENCORI_ID, CcestcredPeer::CCGERENCDES_ID, CcestcredPeer::CCESTSIG_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecha', 'memo', 'ccestatu_id', 'ccsolici_id', 'ccusuint_id', 'ccgerencori_id', 'ccgerencdes_id', 'ccestsig_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecha' => 1, 'Memo' => 2, 'CcestatuId' => 3, 'CcsoliciId' => 4, 'CcusuintId' => 5, 'CcgerencoriId' => 6, 'CcgerencdesId' => 7, 'CcestsigId' => 8, ),
		BasePeer::TYPE_COLNAME => array (CcestcredPeer::ID => 0, CcestcredPeer::FECHA => 1, CcestcredPeer::MEMO => 2, CcestcredPeer::CCESTATU_ID => 3, CcestcredPeer::CCSOLICI_ID => 4, CcestcredPeer::CCUSUINT_ID => 5, CcestcredPeer::CCGERENCORI_ID => 6, CcestcredPeer::CCGERENCDES_ID => 7, CcestcredPeer::CCESTSIG_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecha' => 1, 'memo' => 2, 'ccestatu_id' => 3, 'ccsolici_id' => 4, 'ccusuint_id' => 5, 'ccgerencori_id' => 6, 'ccgerencdes_id' => 7, 'ccestsig_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcestcredMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcestcredMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcestcredPeer::getTableMap();
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
		return str_replace(CcestcredPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcestcredPeer::ID);

		$criteria->addSelectColumn(CcestcredPeer::FECHA);

		$criteria->addSelectColumn(CcestcredPeer::MEMO);

		$criteria->addSelectColumn(CcestcredPeer::CCESTATU_ID);

		$criteria->addSelectColumn(CcestcredPeer::CCSOLICI_ID);

		$criteria->addSelectColumn(CcestcredPeer::CCUSUINT_ID);

		$criteria->addSelectColumn(CcestcredPeer::CCGERENCORI_ID);

		$criteria->addSelectColumn(CcestcredPeer::CCGERENCDES_ID);

		$criteria->addSelectColumn(CcestcredPeer::CCESTSIG_ID);

	}

	const COUNT = 'COUNT(ccestcred.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccestcred.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcestcredPeer::doSelectRS($criteria, $con);
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
		$objects = CcestcredPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcestcredPeer::populateObjects(CcestcredPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcestcredPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcestcredPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcestatuRelatedByCcestatuId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);

		$rs = CcestcredPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);

		$rs = CcestcredPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);

		$rs = CcestcredPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcgerencRelatedByCcgerencoriId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);

		$rs = CcestcredPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcgerencRelatedByCcgerencdesId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);

		$rs = CcestcredPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcestatuRelatedByCcestsigId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);

		$rs = CcestcredPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcestatuRelatedByCcestatuId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcredPeer::addSelectColumns($c);
		$startcol = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcestatuPeer::addSelectColumns($c);

		$c->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcestatuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcestatuRelatedByCcestatuId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcestcredRelatedByCcestatuId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcestcredsRelatedByCcestatuId();
				$obj2->addCcestcredRelatedByCcestatuId($obj1); 			}
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

		CcestcredPeer::addSelectColumns($c);
		$startcol = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoliciPeer::addSelectColumns($c);

		$c->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

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
										$temp_obj2->addCcestcred($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcestcreds();
				$obj2->addCcestcred($obj1); 			}
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

		CcestcredPeer::addSelectColumns($c);
		$startcol = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcusuintPeer::addSelectColumns($c);

		$c->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

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
										$temp_obj2->addCcestcred($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcestcreds();
				$obj2->addCcestcred($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcgerencRelatedByCcgerencoriId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcredPeer::addSelectColumns($c);
		$startcol = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcgerencPeer::addSelectColumns($c);

		$c->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcgerencPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcgerencRelatedByCcgerencoriId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcestcredRelatedByCcgerencoriId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcestcredsRelatedByCcgerencoriId();
				$obj2->addCcestcredRelatedByCcgerencoriId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcgerencRelatedByCcgerencdesId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcredPeer::addSelectColumns($c);
		$startcol = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcgerencPeer::addSelectColumns($c);

		$c->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcgerencPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcgerencRelatedByCcgerencdesId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcestcredRelatedByCcgerencdesId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcestcredsRelatedByCcgerencdesId();
				$obj2->addCcestcredRelatedByCcgerencdesId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcestatuRelatedByCcestsigId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcredPeer::addSelectColumns($c);
		$startcol = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcestatuPeer::addSelectColumns($c);

		$c->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcestatuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcestatuRelatedByCcestsigId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcestcredRelatedByCcestsigId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcestcredsRelatedByCcestsigId();
				$obj2->addCcestcredRelatedByCcestsigId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestcredPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$criteria->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$criteria->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$criteria->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
	
			$criteria->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
	
			$criteria->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
	
		$rs = CcestcredPeer::doSelectRS($criteria, $con);
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

		CcestcredPeer::addSelectColumns($c);
		$startcol2 = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuintPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcgerencPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcgerencPeer::NUM_COLUMNS;
	
			CcestatuPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcestatuPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcestatuRelatedByCcestatuId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcestcredRelatedByCcestatuId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcredsRelatedByCcestatuId();
					$obj2->addCcestcredRelatedByCcestatuId($obj1);
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
						$temp_obj3->addCcestcred($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcreds();
					$obj3->addCcestcred($obj1);
				}
	

							
				$omClass = CcusuintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcusuint(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcestcred($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcestcreds();
					$obj4->addCcestcred($obj1);
				}
	

							
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcgerencRelatedByCcgerencoriId(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcestcredRelatedByCcgerencoriId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcestcredsRelatedByCcgerencoriId();
					$obj5->addCcestcredRelatedByCcgerencoriId($obj1);
				}
	

							
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcgerencRelatedByCcgerencdesId(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcestcredRelatedByCcgerencdesId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcestcredsRelatedByCcgerencdesId();
					$obj6->addCcestcredRelatedByCcgerencdesId($obj1);
				}
	

							
				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcestatuRelatedByCcestsigId(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcestcredRelatedByCcestsigId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initCcestcredsRelatedByCcestsigId();
					$obj7->addCcestcredRelatedByCcestsigId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcestatuRelatedByCcestatuId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcestcredPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
		
			$rs = CcestcredPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcestcredPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
		
			$rs = CcestcredPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcestcredPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
		
			$rs = CcestcredPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcgerencRelatedByCcgerencoriId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcestcredPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
		
			$rs = CcestcredPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcgerencRelatedByCcgerencdesId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcestcredPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
		
			$rs = CcestcredPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcestatuRelatedByCcestsigId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcestcredPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcestcredPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
		
			$rs = CcestcredPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcestatuRelatedByCcestatuId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcredPeer::addSelectColumns($c);
		$startcol2 = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcgerencPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

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
						$temp_obj2->addCcestcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcreds();
					$obj2->addCcestcred($obj1);
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
						$temp_obj3->addCcestcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcreds();
					$obj3->addCcestcred($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcgerencRelatedByCcgerencoriId(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcestcredRelatedByCcgerencoriId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcestcredsRelatedByCcgerencoriId();
					$obj4->addCcestcredRelatedByCcgerencoriId($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcgerencRelatedByCcgerencdesId(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcestcredRelatedByCcgerencdesId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcestcredsRelatedByCcgerencdesId();
					$obj5->addCcestcredRelatedByCcgerencdesId($obj1);
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

		CcestcredPeer::addSelectColumns($c);
		$startcol2 = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcgerencPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcgerencPeer::NUM_COLUMNS;
	
			CcestatuPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcestatuPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcestatuRelatedByCcestatuId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcestcredRelatedByCcestatuId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcredsRelatedByCcestatuId();
					$obj2->addCcestcredRelatedByCcestatuId($obj1);
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
						$temp_obj3->addCcestcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcreds();
					$obj3->addCcestcred($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcgerencRelatedByCcgerencoriId(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcestcredRelatedByCcgerencoriId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcestcredsRelatedByCcgerencoriId();
					$obj4->addCcestcredRelatedByCcgerencoriId($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcgerencRelatedByCcgerencdesId(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcestcredRelatedByCcgerencdesId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcestcredsRelatedByCcgerencdesId();
					$obj5->addCcestcredRelatedByCcgerencdesId($obj1);
				}
	
				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcestatuRelatedByCcestsigId(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcestcredRelatedByCcestsigId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcestcredsRelatedByCcestsigId();
					$obj6->addCcestcredRelatedByCcestsigId($obj1);
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

		CcestcredPeer::addSelectColumns($c);
		$startcol2 = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcgerencPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcgerencPeer::NUM_COLUMNS;
	
			CcestatuPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcestatuPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcestatuRelatedByCcestatuId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcestcredRelatedByCcestatuId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcredsRelatedByCcestatuId();
					$obj2->addCcestcredRelatedByCcestatuId($obj1);
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
						$temp_obj3->addCcestcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcreds();
					$obj3->addCcestcred($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcgerencRelatedByCcgerencoriId(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcestcredRelatedByCcgerencoriId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcestcredsRelatedByCcgerencoriId();
					$obj4->addCcestcredRelatedByCcgerencoriId($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcgerencRelatedByCcgerencdesId(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcestcredRelatedByCcgerencdesId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcestcredsRelatedByCcgerencdesId();
					$obj5->addCcestcredRelatedByCcgerencdesId($obj1);
				}
	
				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcestatuRelatedByCcestsigId(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcestcredRelatedByCcestsigId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcestcredsRelatedByCcestsigId();
					$obj6->addCcestcredRelatedByCcestsigId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcgerencRelatedByCcgerencoriId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcredPeer::addSelectColumns($c);
		$startcol2 = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuintPeer::NUM_COLUMNS;
	
			CcestatuPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcestatuPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcestatuRelatedByCcestatuId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcestcredRelatedByCcestatuId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcredsRelatedByCcestatuId();
					$obj2->addCcestcredRelatedByCcestatuId($obj1);
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
						$temp_obj3->addCcestcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcreds();
					$obj3->addCcestcred($obj1);
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
						$temp_obj4->addCcestcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcestcreds();
					$obj4->addCcestcred($obj1);
				}
	
				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcestatuRelatedByCcestsigId(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcestcredRelatedByCcestsigId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcestcredsRelatedByCcestsigId();
					$obj5->addCcestcredRelatedByCcestsigId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcgerencRelatedByCcgerencdesId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcredPeer::addSelectColumns($c);
		$startcol2 = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestatuPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestatuPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcusuintPeer::NUM_COLUMNS;
	
			CcestatuPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcestatuPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcredPeer::CCESTATU_ID, CcestatuPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCESTSIG_ID, CcestatuPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcestatuRelatedByCcestatuId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcestcredRelatedByCcestatuId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcredsRelatedByCcestatuId();
					$obj2->addCcestcredRelatedByCcestatuId($obj1);
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
						$temp_obj3->addCcestcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcreds();
					$obj3->addCcestcred($obj1);
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
						$temp_obj4->addCcestcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcestcreds();
					$obj4->addCcestcred($obj1);
				}
	
				$omClass = CcestatuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcestatuRelatedByCcestsigId(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcestcredRelatedByCcestsigId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcestcredsRelatedByCcestsigId();
					$obj5->addCcestcredRelatedByCcestsigId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcestatuRelatedByCcestsigId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestcredPeer::addSelectColumns($c);
		$startcol2 = (CcestcredPeer::NUM_COLUMNS - CcestcredPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			CcusuintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuintPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcgerencPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestcredPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCUSUINT_ID, CcusuintPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCGERENCORI_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcestcredPeer::CCGERENCDES_ID, CcgerencPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestcredPeer::getOMClass();

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
						$temp_obj2->addCcestcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestcreds();
					$obj2->addCcestcred($obj1);
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
						$temp_obj3->addCcestcred($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcestcreds();
					$obj3->addCcestcred($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcgerencRelatedByCcgerencoriId(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcestcredRelatedByCcgerencoriId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcestcredsRelatedByCcgerencoriId();
					$obj4->addCcestcredRelatedByCcgerencoriId($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcgerencRelatedByCcgerencdesId(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcestcredRelatedByCcgerencdesId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcestcredsRelatedByCcgerencdesId();
					$obj5->addCcestcredRelatedByCcgerencdesId($obj1);
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
		return CcestcredPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcestcredPeer::ID); 

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
			$comparison = $criteria->getComparison(CcestcredPeer::ID);
			$selectCriteria->add(CcestcredPeer::ID, $criteria->remove(CcestcredPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcestcredPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcestcredPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccestcred) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcestcredPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccestcred $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcestcredPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcestcredPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcestcredPeer::DATABASE_NAME, CcestcredPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcestcredPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcestcredPeer::DATABASE_NAME);

		$criteria->add(CcestcredPeer::ID, $pk);


		$v = CcestcredPeer::doSelect($criteria, $con);

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
			$criteria->add(CcestcredPeer::ID, $pks, Criteria::IN);
			$objs = CcestcredPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcestcredPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcestcredMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcestcredMapBuilder');
}
