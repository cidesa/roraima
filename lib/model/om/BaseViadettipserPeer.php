<?php


abstract class BaseViadettipserPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viadettipser';

	
	const CLASS_DEFAULT = 'lib.model.Viadettipser';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MONTOEUR = 'viadettipser.MONTOEUR';

	
	const MONTODOL = 'viadettipser.MONTODOL';

	
	const MONTOBS = 'viadettipser.MONTOBS';

	
	const VIAREGTIPTAB_ID = 'viadettipser.VIAREGTIPTAB_ID';

	
	const OCCIUDAD_ID = 'viadettipser.OCCIUDAD_ID';

	
	const VIAREGTIPSER_ID = 'viadettipser.VIAREGTIPSER_ID';

	
	const ID = 'viadettipser.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Montoeur', 'Montodol', 'Montobs', 'ViaregtiptabId', 'OcciudadId', 'ViaregtipserId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViadettipserPeer::MONTOEUR, ViadettipserPeer::MONTODOL, ViadettipserPeer::MONTOBS, ViadettipserPeer::VIAREGTIPTAB_ID, ViadettipserPeer::OCCIUDAD_ID, ViadettipserPeer::VIAREGTIPSER_ID, ViadettipserPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('montoeur', 'montodol', 'montobs', 'viaregtiptab_id', 'occiudad_id', 'viaregtipser_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Montoeur' => 0, 'Montodol' => 1, 'Montobs' => 2, 'ViaregtiptabId' => 3, 'OcciudadId' => 4, 'ViaregtipserId' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (ViadettipserPeer::MONTOEUR => 0, ViadettipserPeer::MONTODOL => 1, ViadettipserPeer::MONTOBS => 2, ViadettipserPeer::VIAREGTIPTAB_ID => 3, ViadettipserPeer::OCCIUDAD_ID => 4, ViadettipserPeer::VIAREGTIPSER_ID => 5, ViadettipserPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('montoeur' => 0, 'montodol' => 1, 'montobs' => 2, 'viaregtiptab_id' => 3, 'occiudad_id' => 4, 'viaregtipser_id' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViadettipserMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViadettipserMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViadettipserPeer::getTableMap();
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
		return str_replace(ViadettipserPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViadettipserPeer::MONTOEUR);

		$criteria->addSelectColumn(ViadettipserPeer::MONTODOL);

		$criteria->addSelectColumn(ViadettipserPeer::MONTOBS);

		$criteria->addSelectColumn(ViadettipserPeer::VIAREGTIPTAB_ID);

		$criteria->addSelectColumn(ViadettipserPeer::OCCIUDAD_ID);

		$criteria->addSelectColumn(ViadettipserPeer::VIAREGTIPSER_ID);

		$criteria->addSelectColumn(ViadettipserPeer::ID);

	}

	const COUNT = 'COUNT(viadettipser.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viadettipser.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViadettipserPeer::doSelectRS($criteria, $con);
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
		$objects = ViadettipserPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViadettipserPeer::populateObjects(ViadettipserPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViadettipserPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViadettipserPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinViaregtiptab(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViadettipserPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);

		$rs = ViadettipserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinOcciudad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViadettipserPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$rs = ViadettipserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinViaregtipser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViadettipserPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);

		$rs = ViadettipserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinViaregtiptab(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViadettipserPeer::addSelectColumns($c);
		$startcol = (ViadettipserPeer::NUM_COLUMNS - ViadettipserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ViaregtiptabPeer::addSelectColumns($c);

		$c->addJoin(ViadettipserPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViadettipserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregtiptabPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getViaregtiptab(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addViadettipser($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initViadettipsers();
				$obj2->addViadettipser($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinOcciudad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViadettipserPeer::addSelectColumns($c);
		$startcol = (ViadettipserPeer::NUM_COLUMNS - ViadettipserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OcciudadPeer::addSelectColumns($c);

		$c->addJoin(ViadettipserPeer::OCCIUDAD_ID, OcciudadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViadettipserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OcciudadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOcciudad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addViadettipser($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initViadettipsers();
				$obj2->addViadettipser($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinViaregtipser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViadettipserPeer::addSelectColumns($c);
		$startcol = (ViadettipserPeer::NUM_COLUMNS - ViadettipserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ViaregtipserPeer::addSelectColumns($c);

		$c->addJoin(ViadettipserPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViadettipserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregtipserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getViaregtipser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addViadettipser($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initViadettipsers();
				$obj2->addViadettipser($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViadettipserPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);

		$criteria->addJoin(ViadettipserPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$criteria->addJoin(ViadettipserPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);

		$rs = ViadettipserPeer::doSelectRS($criteria, $con);
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

		ViadettipserPeer::addSelectColumns($c);
		$startcol2 = (ViadettipserPeer::NUM_COLUMNS - ViadettipserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregtiptabPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregtiptabPeer::NUM_COLUMNS;

		OcciudadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + OcciudadPeer::NUM_COLUMNS;

		ViaregtipserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ViaregtipserPeer::NUM_COLUMNS;

		$c->addJoin(ViadettipserPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);

		$c->addJoin(ViadettipserPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$c->addJoin(ViadettipserPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViadettipserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ViaregtiptabPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregtiptab(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViadettipser($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initViadettipsers();
				$obj2->addViadettipser($obj1);
			}


					
			$omClass = OcciudadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getOcciudad(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addViadettipser($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initViadettipsers();
				$obj3->addViadettipser($obj1);
			}


					
			$omClass = ViaregtipserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getViaregtipser(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addViadettipser($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initViadettipsers();
				$obj4->addViadettipser($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptViaregtiptab(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViadettipserPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$criteria->addJoin(ViadettipserPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);

		$rs = ViadettipserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptOcciudad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViadettipserPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);

		$criteria->addJoin(ViadettipserPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);

		$rs = ViadettipserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptViaregtipser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadettipserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViadettipserPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);

		$criteria->addJoin(ViadettipserPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$rs = ViadettipserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptViaregtiptab(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViadettipserPeer::addSelectColumns($c);
		$startcol2 = (ViadettipserPeer::NUM_COLUMNS - ViadettipserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		OcciudadPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + OcciudadPeer::NUM_COLUMNS;

		ViaregtipserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ViaregtipserPeer::NUM_COLUMNS;

		$c->addJoin(ViadettipserPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$c->addJoin(ViadettipserPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViadettipserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OcciudadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getOcciudad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViadettipser($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initViadettipsers();
				$obj2->addViadettipser($obj1);
			}

			$omClass = ViaregtipserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getViaregtipser(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addViadettipser($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initViadettipsers();
				$obj3->addViadettipser($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptOcciudad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViadettipserPeer::addSelectColumns($c);
		$startcol2 = (ViadettipserPeer::NUM_COLUMNS - ViadettipserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregtiptabPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregtiptabPeer::NUM_COLUMNS;

		ViaregtipserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ViaregtipserPeer::NUM_COLUMNS;

		$c->addJoin(ViadettipserPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);

		$c->addJoin(ViadettipserPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViadettipserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregtiptabPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregtiptab(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViadettipser($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initViadettipsers();
				$obj2->addViadettipser($obj1);
			}

			$omClass = ViaregtipserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getViaregtipser(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addViadettipser($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initViadettipsers();
				$obj3->addViadettipser($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptViaregtipser(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViadettipserPeer::addSelectColumns($c);
		$startcol2 = (ViadettipserPeer::NUM_COLUMNS - ViadettipserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregtiptabPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregtiptabPeer::NUM_COLUMNS;

		OcciudadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + OcciudadPeer::NUM_COLUMNS;

		$c->addJoin(ViadettipserPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);

		$c->addJoin(ViadettipserPeer::OCCIUDAD_ID, OcciudadPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViadettipserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregtiptabPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregtiptab(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViadettipser($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initViadettipsers();
				$obj2->addViadettipser($obj1);
			}

			$omClass = OcciudadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getOcciudad(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addViadettipser($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initViadettipsers();
				$obj3->addViadettipser($obj1);
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
		return ViadettipserPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViadettipserPeer::ID); 

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
			$comparison = $criteria->getComparison(ViadettipserPeer::ID);
			$selectCriteria->add(ViadettipserPeer::ID, $criteria->remove(ViadettipserPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViadettipserPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViadettipserPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viadettipser) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViadettipserPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viadettipser $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViadettipserPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViadettipserPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViadettipserPeer::DATABASE_NAME, ViadettipserPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViadettipserPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViadettipserPeer::DATABASE_NAME);

		$criteria->add(ViadettipserPeer::ID, $pk);


		$v = ViadettipserPeer::doSelect($criteria, $con);

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
			$criteria->add(ViadettipserPeer::ID, $pks, Criteria::IN);
			$objs = ViadettipserPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViadettipserPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViadettipserMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViadettipserMapBuilder');
}
