<?php


abstract class BaseAtestsocecoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atestsoceco';

	
	const CLASS_DEFAULT = 'lib.model.Atestsoceco';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ATAYUDAS_ID = 'atestsoceco.ATAYUDAS_ID';

	
	const ATCIUDADANO_ID = 'atestsoceco.ATCIUDADANO_ID';

	
	const ATTIPVIV_ID = 'atestsoceco.ATTIPVIV_ID';

	
	const ATTIPPROVIV_ID = 'atestsoceco.ATTIPPROVIV_ID';

	
	const CARVIVSAL = 'atestsoceco.CARVIVSAL';

	
	const CARVIVCOM = 'atestsoceco.CARVIVCOM';

	
	const CARVIVHAB = 'atestsoceco.CARVIVHAB';

	
	const CARVIVCOC = 'atestsoceco.CARVIVCOC';

	
	const CARVIVBAN = 'atestsoceco.CARVIVBAN';

	
	const CARVIVPAT = 'atestsoceco.CARVIVPAT';

	
	const CARVIVAREVER = 'atestsoceco.CARVIVAREVER';

	
	const CARVIVPIS = 'atestsoceco.CARVIVPIS';

	
	const CARVIVPAR = 'atestsoceco.CARVIVPAR';

	
	const CARVIVTEC = 'atestsoceco.CARVIVTEC';

	
	const ANASOCECO = 'atestsoceco.ANASOCECO';

	
	const ANAFAM = 'atestsoceco.ANAFAM';

	
	const OTROS = 'atestsoceco.OTROS';

	
	const ID = 'atestsoceco.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId', 'AtciudadanoId', 'AttipvivId', 'AttipprovivId', 'Carvivsal', 'Carvivcom', 'Carvivhab', 'Carvivcoc', 'Carvivban', 'Carvivpat', 'Carvivarever', 'Carvivpis', 'Carvivpar', 'Carvivtec', 'Anasoceco', 'Anafam', 'Otros', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtestsocecoPeer::ATAYUDAS_ID, AtestsocecoPeer::ATCIUDADANO_ID, AtestsocecoPeer::ATTIPVIV_ID, AtestsocecoPeer::ATTIPPROVIV_ID, AtestsocecoPeer::CARVIVSAL, AtestsocecoPeer::CARVIVCOM, AtestsocecoPeer::CARVIVHAB, AtestsocecoPeer::CARVIVCOC, AtestsocecoPeer::CARVIVBAN, AtestsocecoPeer::CARVIVPAT, AtestsocecoPeer::CARVIVAREVER, AtestsocecoPeer::CARVIVPIS, AtestsocecoPeer::CARVIVPAR, AtestsocecoPeer::CARVIVTEC, AtestsocecoPeer::ANASOCECO, AtestsocecoPeer::ANAFAM, AtestsocecoPeer::OTROS, AtestsocecoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id', 'atciudadano_id', 'attipviv_id', 'attipproviv_id', 'carvivsal', 'carvivcom', 'carvivhab', 'carvivcoc', 'carvivban', 'carvivpat', 'carvivarever', 'carvivpis', 'carvivpar', 'carvivtec', 'anasoceco', 'anafam', 'otros', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId' => 0, 'AtciudadanoId' => 1, 'AttipvivId' => 2, 'AttipprovivId' => 3, 'Carvivsal' => 4, 'Carvivcom' => 5, 'Carvivhab' => 6, 'Carvivcoc' => 7, 'Carvivban' => 8, 'Carvivpat' => 9, 'Carvivarever' => 10, 'Carvivpis' => 11, 'Carvivpar' => 12, 'Carvivtec' => 13, 'Anasoceco' => 14, 'Anafam' => 15, 'Otros' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (AtestsocecoPeer::ATAYUDAS_ID => 0, AtestsocecoPeer::ATCIUDADANO_ID => 1, AtestsocecoPeer::ATTIPVIV_ID => 2, AtestsocecoPeer::ATTIPPROVIV_ID => 3, AtestsocecoPeer::CARVIVSAL => 4, AtestsocecoPeer::CARVIVCOM => 5, AtestsocecoPeer::CARVIVHAB => 6, AtestsocecoPeer::CARVIVCOC => 7, AtestsocecoPeer::CARVIVBAN => 8, AtestsocecoPeer::CARVIVPAT => 9, AtestsocecoPeer::CARVIVAREVER => 10, AtestsocecoPeer::CARVIVPIS => 11, AtestsocecoPeer::CARVIVPAR => 12, AtestsocecoPeer::CARVIVTEC => 13, AtestsocecoPeer::ANASOCECO => 14, AtestsocecoPeer::ANAFAM => 15, AtestsocecoPeer::OTROS => 16, AtestsocecoPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id' => 0, 'atciudadano_id' => 1, 'attipviv_id' => 2, 'attipproviv_id' => 3, 'carvivsal' => 4, 'carvivcom' => 5, 'carvivhab' => 6, 'carvivcoc' => 7, 'carvivban' => 8, 'carvivpat' => 9, 'carvivarever' => 10, 'carvivpis' => 11, 'carvivpar' => 12, 'carvivtec' => 13, 'anasoceco' => 14, 'anafam' => 15, 'otros' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AtestsocecoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AtestsocecoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtestsocecoPeer::getTableMap();
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
		return str_replace(AtestsocecoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtestsocecoPeer::ATAYUDAS_ID);

		$criteria->addSelectColumn(AtestsocecoPeer::ATCIUDADANO_ID);

		$criteria->addSelectColumn(AtestsocecoPeer::ATTIPVIV_ID);

		$criteria->addSelectColumn(AtestsocecoPeer::ATTIPPROVIV_ID);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVSAL);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVCOM);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVHAB);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVCOC);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVBAN);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVPAT);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVAREVER);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVPIS);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVPAR);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVTEC);

		$criteria->addSelectColumn(AtestsocecoPeer::ANASOCECO);

		$criteria->addSelectColumn(AtestsocecoPeer::ANAFAM);

		$criteria->addSelectColumn(AtestsocecoPeer::OTROS);

		$criteria->addSelectColumn(AtestsocecoPeer::ID);

	}

	const COUNT = 'COUNT(atestsoceco.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atestsoceco.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
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
		$objects = AtestsocecoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtestsocecoPeer::populateObjects(AtestsocecoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtestsocecoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtestsocecoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAtayudas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtciudadano(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAttipviv(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAttipproviv(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAtayudas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtayudasPeer::addSelectColumns($c);

		$c->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtayudas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtestsoceco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtciudadano(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtciudadanoPeer::addSelectColumns($c);

		$c->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtciudadanoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtciudadano(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtestsoceco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAttipviv(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AttipvivPeer::addSelectColumns($c);

		$c->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AttipvivPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAttipviv(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtestsoceco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAttipproviv(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AttipprovivPeer::addSelectColumns($c);

		$c->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AttipprovivPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAttipproviv(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtestsoceco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
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

		AtestsocecoPeer::addSelectColumns($c);
		$startcol2 = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtayudasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AttipvivPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipprovivPeer::NUM_COLUMNS;

		$c->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = AtayudasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtayudas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtestsoceco($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1);
			}


					
			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadano(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtestsoceco($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAtestsocecos();
				$obj3->addAtestsoceco($obj1);
			}


					
			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAttipviv(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtestsoceco($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initAtestsocecos();
				$obj4->addAtestsoceco($obj1);
			}


					
			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttipproviv(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtestsoceco($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initAtestsocecos();
				$obj5->addAtestsoceco($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptAtayudas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtciudadano(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAttipviv(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAttipproviv(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$criteria->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptAtayudas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol2 = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AttipvivPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AttipprovivPeer::NUM_COLUMNS;

		$c->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtciudadano(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1);
			}

			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAttipviv(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtestsocecos();
				$obj3->addAtestsoceco($obj1);
			}

			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAttipproviv(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtestsocecos();
				$obj4->addAtestsoceco($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtciudadano(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol2 = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtayudasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AttipvivPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AttipprovivPeer::NUM_COLUMNS;

		$c->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtayudasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtayudas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1);
			}

			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAttipviv(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtestsocecos();
				$obj3->addAtestsoceco($obj1);
			}

			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAttipproviv(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtestsocecos();
				$obj4->addAtestsoceco($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAttipviv(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol2 = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtayudasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AttipprovivPeer::NUM_COLUMNS;

		$c->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtayudasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtayudas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadano(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtestsocecos();
				$obj3->addAtestsoceco($obj1);
			}

			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAttipproviv(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtestsocecos();
				$obj4->addAtestsoceco($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAttipproviv(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol2 = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtayudasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AttipvivPeer::NUM_COLUMNS;

		$c->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$c->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtayudasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtayudas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadano(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtestsocecos();
				$obj3->addAtestsoceco($obj1);
			}

			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAttipviv(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtestsoceco($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtestsocecos();
				$obj4->addAtestsoceco($obj1);
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
		return AtestsocecoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtestsocecoPeer::ID); 

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
			$comparison = $criteria->getComparison(AtestsocecoPeer::ID);
			$selectCriteria->add(AtestsocecoPeer::ID, $criteria->remove(AtestsocecoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtestsocecoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtestsocecoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atestsoceco) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtestsocecoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atestsoceco $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtestsocecoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtestsocecoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtestsocecoPeer::DATABASE_NAME, AtestsocecoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtestsocecoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtestsocecoPeer::DATABASE_NAME);

		$criteria->add(AtestsocecoPeer::ID, $pk);


		$v = AtestsocecoPeer::doSelect($criteria, $con);

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
			$criteria->add(AtestsocecoPeer::ID, $pks, Criteria::IN);
			$objs = AtestsocecoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtestsocecoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AtestsocecoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AtestsocecoMapBuilder');
}
