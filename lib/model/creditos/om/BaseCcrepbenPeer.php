<?php


abstract class BaseCcrepbenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccrepben';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccrepben';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccrepben.ID';

	
	const NOMREPBEN = 'ccrepben.NOMREPBEN';

	
	const CEDRIFBEN = 'ccrepben.CEDRIFBEN';

	
	const FECNAC = 'ccrepben.FECNAC';

	
	const OCUPA = 'ccrepben.OCUPA';

	
	const DIRNOMURB = 'ccrepben.DIRNOMURB';

	
	const DIRNUMCAL = 'ccrepben.DIRNUMCAL';

	
	const DIRNUMCASEDI = 'ccrepben.DIRNUMCASEDI';

	
	const DIRNUMPIS = 'ccrepben.DIRNUMPIS';

	
	const DIRNUMAPT = 'ccrepben.DIRNUMAPT';

	
	const DIRPUNREF = 'ccrepben.DIRPUNREF';

	
	const NUMTEL = 'ccrepben.NUMTEL';

	
	const NUMCEL = 'ccrepben.NUMCEL';

	
	const NUMFAX = 'ccrepben.NUMFAX';

	
	const CODARETEL = 'ccrepben.CODARETEL';

	
	const CODARECEL = 'ccrepben.CODARECEL';

	
	const CODAREFAX = 'ccrepben.CODAREFAX';

	
	const CORELE = 'ccrepben.CORELE';

	
	const SEXREPBEN = 'ccrepben.SEXREPBEN';

	
	const PARLOCCAS = 'ccrepben.PARLOCCAS';

	
	const CCPERPRE_ID = 'ccrepben.CCPERPRE_ID';

	
	const CCBENEFI_ID = 'ccrepben.CCBENEFI_ID';

	
	const CCPARROQ_ID = 'ccrepben.CCPARROQ_ID';

	
	const CCPARENT_ID = 'ccrepben.CCPARENT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomrepben', 'Cedrifben', 'Fecnac', 'Ocupa', 'Dirnomurb', 'Dirnumcal', 'Dirnumcasedi', 'Dirnumpis', 'Dirnumapt', 'Dirpunref', 'Numtel', 'Numcel', 'Numfax', 'Codaretel', 'Codarecel', 'Codarefax', 'Corele', 'Sexrepben', 'Parloccas', 'CcperpreId', 'CcbenefiId', 'CcparroqId', 'CcparentId', ),
		BasePeer::TYPE_COLNAME => array (CcrepbenPeer::ID, CcrepbenPeer::NOMREPBEN, CcrepbenPeer::CEDRIFBEN, CcrepbenPeer::FECNAC, CcrepbenPeer::OCUPA, CcrepbenPeer::DIRNOMURB, CcrepbenPeer::DIRNUMCAL, CcrepbenPeer::DIRNUMCASEDI, CcrepbenPeer::DIRNUMPIS, CcrepbenPeer::DIRNUMAPT, CcrepbenPeer::DIRPUNREF, CcrepbenPeer::NUMTEL, CcrepbenPeer::NUMCEL, CcrepbenPeer::NUMFAX, CcrepbenPeer::CODARETEL, CcrepbenPeer::CODARECEL, CcrepbenPeer::CODAREFAX, CcrepbenPeer::CORELE, CcrepbenPeer::SEXREPBEN, CcrepbenPeer::PARLOCCAS, CcrepbenPeer::CCPERPRE_ID, CcrepbenPeer::CCBENEFI_ID, CcrepbenPeer::CCPARROQ_ID, CcrepbenPeer::CCPARENT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomrepben', 'cedrifben', 'fecnac', 'ocupa', 'dirnomurb', 'dirnumcal', 'dirnumcasedi', 'dirnumpis', 'dirnumapt', 'dirpunref', 'numtel', 'numcel', 'numfax', 'codaretel', 'codarecel', 'codarefax', 'corele', 'sexrepben', 'parloccas', 'ccperpre_id', 'ccbenefi_id', 'ccparroq_id', 'ccparent_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomrepben' => 1, 'Cedrifben' => 2, 'Fecnac' => 3, 'Ocupa' => 4, 'Dirnomurb' => 5, 'Dirnumcal' => 6, 'Dirnumcasedi' => 7, 'Dirnumpis' => 8, 'Dirnumapt' => 9, 'Dirpunref' => 10, 'Numtel' => 11, 'Numcel' => 12, 'Numfax' => 13, 'Codaretel' => 14, 'Codarecel' => 15, 'Codarefax' => 16, 'Corele' => 17, 'Sexrepben' => 18, 'Parloccas' => 19, 'CcperpreId' => 20, 'CcbenefiId' => 21, 'CcparroqId' => 22, 'CcparentId' => 23, ),
		BasePeer::TYPE_COLNAME => array (CcrepbenPeer::ID => 0, CcrepbenPeer::NOMREPBEN => 1, CcrepbenPeer::CEDRIFBEN => 2, CcrepbenPeer::FECNAC => 3, CcrepbenPeer::OCUPA => 4, CcrepbenPeer::DIRNOMURB => 5, CcrepbenPeer::DIRNUMCAL => 6, CcrepbenPeer::DIRNUMCASEDI => 7, CcrepbenPeer::DIRNUMPIS => 8, CcrepbenPeer::DIRNUMAPT => 9, CcrepbenPeer::DIRPUNREF => 10, CcrepbenPeer::NUMTEL => 11, CcrepbenPeer::NUMCEL => 12, CcrepbenPeer::NUMFAX => 13, CcrepbenPeer::CODARETEL => 14, CcrepbenPeer::CODARECEL => 15, CcrepbenPeer::CODAREFAX => 16, CcrepbenPeer::CORELE => 17, CcrepbenPeer::SEXREPBEN => 18, CcrepbenPeer::PARLOCCAS => 19, CcrepbenPeer::CCPERPRE_ID => 20, CcrepbenPeer::CCBENEFI_ID => 21, CcrepbenPeer::CCPARROQ_ID => 22, CcrepbenPeer::CCPARENT_ID => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomrepben' => 1, 'cedrifben' => 2, 'fecnac' => 3, 'ocupa' => 4, 'dirnomurb' => 5, 'dirnumcal' => 6, 'dirnumcasedi' => 7, 'dirnumpis' => 8, 'dirnumapt' => 9, 'dirpunref' => 10, 'numtel' => 11, 'numcel' => 12, 'numfax' => 13, 'codaretel' => 14, 'codarecel' => 15, 'codarefax' => 16, 'corele' => 17, 'sexrepben' => 18, 'parloccas' => 19, 'ccperpre_id' => 20, 'ccbenefi_id' => 21, 'ccparroq_id' => 22, 'ccparent_id' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcrepbenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcrepbenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcrepbenPeer::getTableMap();
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
		return str_replace(CcrepbenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcrepbenPeer::ID);

		$criteria->addSelectColumn(CcrepbenPeer::NOMREPBEN);

		$criteria->addSelectColumn(CcrepbenPeer::CEDRIFBEN);

		$criteria->addSelectColumn(CcrepbenPeer::FECNAC);

		$criteria->addSelectColumn(CcrepbenPeer::OCUPA);

		$criteria->addSelectColumn(CcrepbenPeer::DIRNOMURB);

		$criteria->addSelectColumn(CcrepbenPeer::DIRNUMCAL);

		$criteria->addSelectColumn(CcrepbenPeer::DIRNUMCASEDI);

		$criteria->addSelectColumn(CcrepbenPeer::DIRNUMPIS);

		$criteria->addSelectColumn(CcrepbenPeer::DIRNUMAPT);

		$criteria->addSelectColumn(CcrepbenPeer::DIRPUNREF);

		$criteria->addSelectColumn(CcrepbenPeer::NUMTEL);

		$criteria->addSelectColumn(CcrepbenPeer::NUMCEL);

		$criteria->addSelectColumn(CcrepbenPeer::NUMFAX);

		$criteria->addSelectColumn(CcrepbenPeer::CODARETEL);

		$criteria->addSelectColumn(CcrepbenPeer::CODARECEL);

		$criteria->addSelectColumn(CcrepbenPeer::CODAREFAX);

		$criteria->addSelectColumn(CcrepbenPeer::CORELE);

		$criteria->addSelectColumn(CcrepbenPeer::SEXREPBEN);

		$criteria->addSelectColumn(CcrepbenPeer::PARLOCCAS);

		$criteria->addSelectColumn(CcrepbenPeer::CCPERPRE_ID);

		$criteria->addSelectColumn(CcrepbenPeer::CCBENEFI_ID);

		$criteria->addSelectColumn(CcrepbenPeer::CCPARROQ_ID);

		$criteria->addSelectColumn(CcrepbenPeer::CCPARENT_ID);

	}

	const COUNT = 'COUNT(ccrepben.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccrepben.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrepbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrepbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcrepbenPeer::doSelectRS($criteria, $con);
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
		$objects = CcrepbenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcrepbenPeer::populateObjects(CcrepbenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcrepbenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcrepbenPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcperpre(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrepbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrepbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrepbenPeer::CCPERPRE_ID, CcperprePeer::ID);

		$rs = CcrepbenPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcrepbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrepbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrepbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);

		$rs = CcrepbenPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcrepbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrepbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrepbenPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcrepbenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcparent(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrepbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrepbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrepbenPeer::CCPARENT_ID, CcparentPeer::ID);

		$rs = CcrepbenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrepbenPeer::addSelectColumns($c);
		$startcol = (CcrepbenPeer::NUM_COLUMNS - CcrepbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperprePeer::addSelectColumns($c);

		$c->addJoin(CcrepbenPeer::CCPERPRE_ID, CcperprePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrepbenPeer::getOMClass();

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
										$temp_obj2->addCcrepben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrepbens();
				$obj2->addCcrepben($obj1); 			}
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

		CcrepbenPeer::addSelectColumns($c);
		$startcol = (CcrepbenPeer::NUM_COLUMNS - CcrepbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbenefiPeer::addSelectColumns($c);

		$c->addJoin(CcrepbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrepbenPeer::getOMClass();

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
										$temp_obj2->addCcrepben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrepbens();
				$obj2->addCcrepben($obj1); 			}
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

		CcrepbenPeer::addSelectColumns($c);
		$startcol = (CcrepbenPeer::NUM_COLUMNS - CcrepbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcrepbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrepbenPeer::getOMClass();

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
										$temp_obj2->addCcrepben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrepbens();
				$obj2->addCcrepben($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcparent(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrepbenPeer::addSelectColumns($c);
		$startcol = (CcrepbenPeer::NUM_COLUMNS - CcrepbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparentPeer::addSelectColumns($c);

		$c->addJoin(CcrepbenPeer::CCPARENT_ID, CcparentPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrepbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcparentPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcparent(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcrepben($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrepbens();
				$obj2->addCcrepben($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrepbenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrepbenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcrepbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$criteria->addJoin(CcrepbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$criteria->addJoin(CcrepbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$criteria->addJoin(CcrepbenPeer::CCPARENT_ID, CcparentPeer::ID);
	
		$rs = CcrepbenPeer::doSelectRS($criteria, $con);
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

		CcrepbenPeer::addSelectColumns($c);
		$startcol2 = (CcrepbenPeer::NUM_COLUMNS - CcrepbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcbenefiPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			CcparentPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparentPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrepbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCPARENT_ID, CcparentPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrepbenPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrepben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrepbens();
					$obj2->addCcrepben($obj1);
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
						$temp_obj3->addCcrepben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrepbens();
					$obj3->addCcrepben($obj1);
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
						$temp_obj4->addCcrepben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcrepbens();
					$obj4->addCcrepben($obj1);
				}
	

							
				$omClass = CcparentPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparent(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcrepben($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcrepbens();
					$obj5->addCcrepben($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcperpre(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcrepbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrepbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrepbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcrepbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcrepbenPeer::CCPARENT_ID, CcparentPeer::ID);
		
			$rs = CcrepbenPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcrepbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrepbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrepbenPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcrepbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcrepbenPeer::CCPARENT_ID, CcparentPeer::ID);
		
			$rs = CcrepbenPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcrepbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrepbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrepbenPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcrepbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcrepbenPeer::CCPARENT_ID, CcparentPeer::ID);
		
			$rs = CcrepbenPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcparent(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcrepbenPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrepbenPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrepbenPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcrepbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcrepbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcrepbenPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrepbenPeer::addSelectColumns($c);
		$startcol2 = (CcrepbenPeer::NUM_COLUMNS - CcrepbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			CcparentPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparentPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrepbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCPARENT_ID, CcparentPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrepbenPeer::getOMClass();

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
						$temp_obj2->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrepbens();
					$obj2->addCcrepben($obj1);
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
						$temp_obj3->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrepbens();
					$obj3->addCcrepben($obj1);
				}
	
				$omClass = CcparentPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparent(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcrepbens();
					$obj4->addCcrepben($obj1);
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

		CcrepbenPeer::addSelectColumns($c);
		$startcol2 = (CcrepbenPeer::NUM_COLUMNS - CcrepbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcparroqPeer::NUM_COLUMNS;
	
			CcparentPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparentPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrepbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCPARENT_ID, CcparentPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrepbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrepbens();
					$obj2->addCcrepben($obj1);
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
						$temp_obj3->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrepbens();
					$obj3->addCcrepben($obj1);
				}
	
				$omClass = CcparentPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparent(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcrepbens();
					$obj4->addCcrepben($obj1);
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

		CcrepbenPeer::addSelectColumns($c);
		$startcol2 = (CcrepbenPeer::NUM_COLUMNS - CcrepbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcbenefiPeer::NUM_COLUMNS;
	
			CcparentPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparentPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrepbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCPARENT_ID, CcparentPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrepbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrepbens();
					$obj2->addCcrepben($obj1);
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
						$temp_obj3->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrepbens();
					$obj3->addCcrepben($obj1);
				}
	
				$omClass = CcparentPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparent(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcrepbens();
					$obj4->addCcrepben($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcparent(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrepbenPeer::addSelectColumns($c);
		$startcol2 = (CcrepbenPeer::NUM_COLUMNS - CcrepbenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcbenefiPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrepbenPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcrepbenPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrepbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrepbens();
					$obj2->addCcrepben($obj1);
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
						$temp_obj3->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrepbens();
					$obj3->addCcrepben($obj1);
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
						$temp_obj4->addCcrepben($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcrepbens();
					$obj4->addCcrepben($obj1);
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
		return CcrepbenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcrepbenPeer::ID); 

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
			$comparison = $criteria->getComparison(CcrepbenPeer::ID);
			$selectCriteria->add(CcrepbenPeer::ID, $criteria->remove(CcrepbenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcrepbenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcrepbenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccrepben) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcrepbenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccrepben $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcrepbenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcrepbenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcrepbenPeer::DATABASE_NAME, CcrepbenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcrepbenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcrepbenPeer::DATABASE_NAME);

		$criteria->add(CcrepbenPeer::ID, $pk);


		$v = CcrepbenPeer::doSelect($criteria, $con);

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
			$criteria->add(CcrepbenPeer::ID, $pks, Criteria::IN);
			$objs = CcrepbenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcrepbenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcrepbenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcrepbenMapBuilder');
}
