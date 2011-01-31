<?php


abstract class BaseTsdeffonantPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tsdeffonant';

	
	const CLASS_DEFAULT = 'lib.model.Tsdeffonant';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODFON = 'tsdeffonant.CODFON';

	
	const DESFON = 'tsdeffonant.DESFON';

	
	const UNIEJE = 'tsdeffonant.UNIEJE';

	
	const CODUNIADM = 'tsdeffonant.CODUNIADM';

	
	const CEDRIF = 'tsdeffonant.CEDRIF';

	
	const CODCAT = 'tsdeffonant.CODCAT';

	
	const NUMCUE = 'tsdeffonant.NUMCUE';

	
	const TIPMOVSAL = 'tsdeffonant.TIPMOVSAL';

	
	const TIPMOVREN = 'tsdeffonant.TIPMOVREN';

	
	const MONMINCON = 'tsdeffonant.MONMINCON';

	
	const MONMAXCON = 'tsdeffonant.MONMAXCON';

	
	const PORREP = 'tsdeffonant.PORREP';

	
	const NUMINI = 'tsdeffonant.NUMINI';

	
	const ID = 'tsdeffonant.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codfon', 'Desfon', 'Unieje', 'Coduniadm', 'Cedrif', 'Codcat', 'Numcue', 'Tipmovsal', 'Tipmovren', 'Monmincon', 'Monmaxcon', 'Porrep', 'Numini', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TsdeffonantPeer::CODFON, TsdeffonantPeer::DESFON, TsdeffonantPeer::UNIEJE, TsdeffonantPeer::CODUNIADM, TsdeffonantPeer::CEDRIF, TsdeffonantPeer::CODCAT, TsdeffonantPeer::NUMCUE, TsdeffonantPeer::TIPMOVSAL, TsdeffonantPeer::TIPMOVREN, TsdeffonantPeer::MONMINCON, TsdeffonantPeer::MONMAXCON, TsdeffonantPeer::PORREP, TsdeffonantPeer::NUMINI, TsdeffonantPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codfon', 'desfon', 'unieje', 'coduniadm', 'cedrif', 'codcat', 'numcue', 'tipmovsal', 'tipmovren', 'monmincon', 'monmaxcon', 'porrep', 'numini', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codfon' => 0, 'Desfon' => 1, 'Unieje' => 2, 'Coduniadm' => 3, 'Cedrif' => 4, 'Codcat' => 5, 'Numcue' => 6, 'Tipmovsal' => 7, 'Tipmovren' => 8, 'Monmincon' => 9, 'Monmaxcon' => 10, 'Porrep' => 11, 'Numini' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (TsdeffonantPeer::CODFON => 0, TsdeffonantPeer::DESFON => 1, TsdeffonantPeer::UNIEJE => 2, TsdeffonantPeer::CODUNIADM => 3, TsdeffonantPeer::CEDRIF => 4, TsdeffonantPeer::CODCAT => 5, TsdeffonantPeer::NUMCUE => 6, TsdeffonantPeer::TIPMOVSAL => 7, TsdeffonantPeer::TIPMOVREN => 8, TsdeffonantPeer::MONMINCON => 9, TsdeffonantPeer::MONMAXCON => 10, TsdeffonantPeer::PORREP => 11, TsdeffonantPeer::NUMINI => 12, TsdeffonantPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('codfon' => 0, 'desfon' => 1, 'unieje' => 2, 'coduniadm' => 3, 'cedrif' => 4, 'codcat' => 5, 'numcue' => 6, 'tipmovsal' => 7, 'tipmovren' => 8, 'monmincon' => 9, 'monmaxcon' => 10, 'porrep' => 11, 'numini' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TsdeffonantMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TsdeffonantMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TsdeffonantPeer::getTableMap();
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
		return str_replace(TsdeffonantPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TsdeffonantPeer::CODFON);

		$criteria->addSelectColumn(TsdeffonantPeer::DESFON);

		$criteria->addSelectColumn(TsdeffonantPeer::UNIEJE);

		$criteria->addSelectColumn(TsdeffonantPeer::CODUNIADM);

		$criteria->addSelectColumn(TsdeffonantPeer::CEDRIF);

		$criteria->addSelectColumn(TsdeffonantPeer::CODCAT);

		$criteria->addSelectColumn(TsdeffonantPeer::NUMCUE);

		$criteria->addSelectColumn(TsdeffonantPeer::TIPMOVSAL);

		$criteria->addSelectColumn(TsdeffonantPeer::TIPMOVREN);

		$criteria->addSelectColumn(TsdeffonantPeer::MONMINCON);

		$criteria->addSelectColumn(TsdeffonantPeer::MONMAXCON);

		$criteria->addSelectColumn(TsdeffonantPeer::PORREP);

		$criteria->addSelectColumn(TsdeffonantPeer::NUMINI);

		$criteria->addSelectColumn(TsdeffonantPeer::ID);

	}

	const COUNT = 'COUNT(tsdeffonant.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tsdeffonant.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
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
		$objects = TsdeffonantPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TsdeffonantPeer::populateObjects(TsdeffonantPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TsdeffonantPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TsdeffonantPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinBnubica(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);

		$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTsuniadm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);

		$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinOpbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);

		$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinNpcatpre(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);

		$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTsdefban(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);

		$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinBnubica(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsdeffonantPeer::addSelectColumns($c);
		$startcol = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BnubicaPeer::addSelectColumns($c);

		$c->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BnubicaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getBnubica(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTsdeffonant($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTsdeffonants();
				$obj2->addTsdeffonant($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTsuniadm(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsdeffonantPeer::addSelectColumns($c);
		$startcol = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TsuniadmPeer::addSelectColumns($c);

		$c->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TsuniadmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTsuniadm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTsdeffonant($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTsdeffonants();
				$obj2->addTsdeffonant($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinOpbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsdeffonantPeer::addSelectColumns($c);
		$startcol = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OpbenefiPeer::addSelectColumns($c);

		$c->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OpbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOpbenefi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTsdeffonant($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTsdeffonants();
				$obj2->addTsdeffonant($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinNpcatpre(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsdeffonantPeer::addSelectColumns($c);
		$startcol = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		NpcatprePeer::addSelectColumns($c);

		$c->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = NpcatprePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getNpcatpre(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTsdeffonant($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTsdeffonants();
				$obj2->addTsdeffonant($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTsdefban(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsdeffonantPeer::addSelectColumns($c);
		$startcol = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TsdefbanPeer::addSelectColumns($c);

		$c->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TsdefbanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTsdefban(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTsdeffonant($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTsdeffonants();
				$obj2->addTsdeffonant($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
	
			$criteria->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
	
			$criteria->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
			$criteria->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
	
			$criteria->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	
		$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
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

		TsdeffonantPeer::addSelectColumns($c);
		$startcol2 = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			BnubicaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + BnubicaPeer::NUM_COLUMNS;
	
			TsuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + TsuniadmPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + OpbenefiPeer::NUM_COLUMNS;
	
			NpcatprePeer::addSelectColumns($c);
			$startcol6 = $startcol5 + NpcatprePeer::NUM_COLUMNS;
	
			TsdefbanPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + TsdefbanPeer::NUM_COLUMNS;
	
			$c->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
	
			$c->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
	
			$c->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
			$c->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
	
			$c->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = BnubicaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getBnubica(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTsdeffonant($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initTsdeffonants();
					$obj2->addTsdeffonant($obj1);
				}
	

							
				$omClass = TsuniadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getTsuniadm(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addTsdeffonant($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initTsdeffonants();
					$obj3->addTsdeffonant($obj1);
				}
	

							
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getOpbenefi(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addTsdeffonant($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initTsdeffonants();
					$obj4->addTsdeffonant($obj1);
				}
	

							
				$omClass = NpcatprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getNpcatpre(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addTsdeffonant($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initTsdeffonants();
					$obj5->addTsdeffonant($obj1);
				}
	

							
				$omClass = TsdefbanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getTsdefban(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addTsdeffonant($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initTsdeffonants();
					$obj6->addTsdeffonant($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptBnubica(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
		
				$criteria->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		
				$criteria->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
		
				$criteria->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
		
			$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptTsuniadm(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
		
				$criteria->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		
				$criteria->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
		
				$criteria->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
		
			$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptOpbenefi(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
		
				$criteria->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
		
				$criteria->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
		
				$criteria->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
		
			$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptNpcatpre(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
		
				$criteria->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
		
				$criteria->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		
				$criteria->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
		
			$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptTsdefban(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(TsdeffonantPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(TsdeffonantPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
		
				$criteria->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
		
				$criteria->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		
				$criteria->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
		
			$rs = TsdeffonantPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptBnubica(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsdeffonantPeer::addSelectColumns($c);
		$startcol2 = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TsuniadmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TsuniadmPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OpbenefiPeer::NUM_COLUMNS;
	
			NpcatprePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + NpcatprePeer::NUM_COLUMNS;
	
			TsdefbanPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + TsdefbanPeer::NUM_COLUMNS;
	
			$c->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
	
			$c->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
			$c->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
	
			$c->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = TsuniadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getTsuniadm(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initTsdeffonants();
					$obj2->addTsdeffonant($obj1);
				}
	
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOpbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initTsdeffonants();
					$obj3->addTsdeffonant($obj1);
				}
	
				$omClass = NpcatprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getNpcatpre(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initTsdeffonants();
					$obj4->addTsdeffonant($obj1);
				}
	
				$omClass = TsdefbanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getTsdefban(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initTsdeffonants();
					$obj5->addTsdeffonant($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTsuniadm(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsdeffonantPeer::addSelectColumns($c);
		$startcol2 = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			BnubicaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + BnubicaPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OpbenefiPeer::NUM_COLUMNS;
	
			NpcatprePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + NpcatprePeer::NUM_COLUMNS;
	
			TsdefbanPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + TsdefbanPeer::NUM_COLUMNS;
	
			$c->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
	
			$c->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
			$c->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
	
			$c->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = BnubicaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getBnubica(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initTsdeffonants();
					$obj2->addTsdeffonant($obj1);
				}
	
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOpbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initTsdeffonants();
					$obj3->addTsdeffonant($obj1);
				}
	
				$omClass = NpcatprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getNpcatpre(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initTsdeffonants();
					$obj4->addTsdeffonant($obj1);
				}
	
				$omClass = TsdefbanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getTsdefban(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initTsdeffonants();
					$obj5->addTsdeffonant($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptOpbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsdeffonantPeer::addSelectColumns($c);
		$startcol2 = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			BnubicaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + BnubicaPeer::NUM_COLUMNS;
	
			TsuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + TsuniadmPeer::NUM_COLUMNS;
	
			NpcatprePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + NpcatprePeer::NUM_COLUMNS;
	
			TsdefbanPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + TsdefbanPeer::NUM_COLUMNS;
	
			$c->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
	
			$c->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
	
			$c->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
	
			$c->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = BnubicaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getBnubica(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initTsdeffonants();
					$obj2->addTsdeffonant($obj1);
				}
	
				$omClass = TsuniadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getTsuniadm(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initTsdeffonants();
					$obj3->addTsdeffonant($obj1);
				}
	
				$omClass = NpcatprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getNpcatpre(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initTsdeffonants();
					$obj4->addTsdeffonant($obj1);
				}
	
				$omClass = TsdefbanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getTsdefban(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initTsdeffonants();
					$obj5->addTsdeffonant($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptNpcatpre(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsdeffonantPeer::addSelectColumns($c);
		$startcol2 = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			BnubicaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + BnubicaPeer::NUM_COLUMNS;
	
			TsuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + TsuniadmPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + OpbenefiPeer::NUM_COLUMNS;
	
			TsdefbanPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + TsdefbanPeer::NUM_COLUMNS;
	
			$c->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
	
			$c->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
	
			$c->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
			$c->addJoin(TsdeffonantPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = BnubicaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getBnubica(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initTsdeffonants();
					$obj2->addTsdeffonant($obj1);
				}
	
				$omClass = TsuniadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getTsuniadm(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initTsdeffonants();
					$obj3->addTsdeffonant($obj1);
				}
	
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getOpbenefi(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initTsdeffonants();
					$obj4->addTsdeffonant($obj1);
				}
	
				$omClass = TsdefbanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getTsdefban(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initTsdeffonants();
					$obj5->addTsdeffonant($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTsdefban(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsdeffonantPeer::addSelectColumns($c);
		$startcol2 = (TsdeffonantPeer::NUM_COLUMNS - TsdeffonantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			BnubicaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + BnubicaPeer::NUM_COLUMNS;
	
			TsuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + TsuniadmPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + OpbenefiPeer::NUM_COLUMNS;
	
			NpcatprePeer::addSelectColumns($c);
			$startcol6 = $startcol5 + NpcatprePeer::NUM_COLUMNS;
	
			$c->addJoin(TsdeffonantPeer::UNIEJE, BnubicaPeer::CODUBI);
	
			$c->addJoin(TsdeffonantPeer::CODUNIADM, TsuniadmPeer::CODUNIADM);
	
			$c->addJoin(TsdeffonantPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
			$c->addJoin(TsdeffonantPeer::CODCAT, NpcatprePeer::CODCAT);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsdeffonantPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = BnubicaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getBnubica(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initTsdeffonants();
					$obj2->addTsdeffonant($obj1);
				}
	
				$omClass = TsuniadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getTsuniadm(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initTsdeffonants();
					$obj3->addTsdeffonant($obj1);
				}
	
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getOpbenefi(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initTsdeffonants();
					$obj4->addTsdeffonant($obj1);
				}
	
				$omClass = NpcatprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getNpcatpre(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addTsdeffonant($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initTsdeffonants();
					$obj5->addTsdeffonant($obj1);
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
		return TsdeffonantPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TsdeffonantPeer::ID); 

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
			$comparison = $criteria->getComparison(TsdeffonantPeer::ID);
			$selectCriteria->add(TsdeffonantPeer::ID, $criteria->remove(TsdeffonantPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TsdeffonantPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TsdeffonantPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tsdeffonant) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TsdeffonantPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tsdeffonant $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TsdeffonantPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TsdeffonantPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TsdeffonantPeer::DATABASE_NAME, TsdeffonantPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TsdeffonantPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TsdeffonantPeer::DATABASE_NAME);

		$criteria->add(TsdeffonantPeer::ID, $pk);


		$v = TsdeffonantPeer::doSelect($criteria, $con);

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
			$criteria->add(TsdeffonantPeer::ID, $pks, Criteria::IN);
			$objs = TsdeffonantPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTsdeffonantPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TsdeffonantMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TsdeffonantMapBuilder');
}
