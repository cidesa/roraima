<?php


abstract class BaseInprofesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'inprofes';

	
	const CLASS_DEFAULT = 'lib.model.Inprofes';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const VENEXT = 'inprofes.VENEXT';

	
	const CEDPROF = 'inprofes.CEDPROF';

	
	const NOMPROF = 'inprofes.NOMPROF';

	
	const APEPROF = 'inprofes.APEPROF';

	
	const NACPROF = 'inprofes.NACPROF';

	
	const PAIS = 'inprofes.PAIS';

	
	const LUGNAC = 'inprofes.LUGNAC';

	
	const SEXO = 'inprofes.SEXO';

	
	const FECNAC = 'inprofes.FECNAC';

	
	const DIRNAC = 'inprofes.DIRNAC';

	
	const ESTCIV = 'inprofes.ESTCIV';

	
	const TELHAB = 'inprofes.TELHAB';

	
	const TELCEL = 'inprofes.TELCEL';

	
	const INESTADO_ID = 'inprofes.INESTADO_ID';

	
	const INMUNICIPIO_ID = 'inprofes.INMUNICIPIO_ID';

	
	const INPARROQUIA_ID = 'inprofes.INPARROQUIA_ID';

	
	const INESPECI_ID = 'inprofes.INESPECI_ID';

	
	const DIRHAB = 'inprofes.DIRHAB';

	
	const CODPOST = 'inprofes.CODPOST';

	
	const EMAIL = 'inprofes.EMAIL';

	
	const ID = 'inprofes.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Venext', 'Cedprof', 'Nomprof', 'Apeprof', 'Nacprof', 'Pais', 'Lugnac', 'Sexo', 'Fecnac', 'Dirnac', 'Estciv', 'Telhab', 'Telcel', 'InestadoId', 'InmunicipioId', 'InparroquiaId', 'InespeciId', 'Dirhab', 'Codpost', 'Email', 'Id', ),
		BasePeer::TYPE_COLNAME => array (InprofesPeer::VENEXT, InprofesPeer::CEDPROF, InprofesPeer::NOMPROF, InprofesPeer::APEPROF, InprofesPeer::NACPROF, InprofesPeer::PAIS, InprofesPeer::LUGNAC, InprofesPeer::SEXO, InprofesPeer::FECNAC, InprofesPeer::DIRNAC, InprofesPeer::ESTCIV, InprofesPeer::TELHAB, InprofesPeer::TELCEL, InprofesPeer::INESTADO_ID, InprofesPeer::INMUNICIPIO_ID, InprofesPeer::INPARROQUIA_ID, InprofesPeer::INESPECI_ID, InprofesPeer::DIRHAB, InprofesPeer::CODPOST, InprofesPeer::EMAIL, InprofesPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('venext', 'cedprof', 'nomprof', 'apeprof', 'nacprof', 'pais', 'lugnac', 'sexo', 'fecnac', 'dirnac', 'estciv', 'telhab', 'telcel', 'inestado_id', 'inmunicipio_id', 'inparroquia_id', 'inespeci_id', 'dirhab', 'codpost', 'email', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Venext' => 0, 'Cedprof' => 1, 'Nomprof' => 2, 'Apeprof' => 3, 'Nacprof' => 4, 'Pais' => 5, 'Lugnac' => 6, 'Sexo' => 7, 'Fecnac' => 8, 'Dirnac' => 9, 'Estciv' => 10, 'Telhab' => 11, 'Telcel' => 12, 'InestadoId' => 13, 'InmunicipioId' => 14, 'InparroquiaId' => 15, 'InespeciId' => 16, 'Dirhab' => 17, 'Codpost' => 18, 'Email' => 19, 'Id' => 20, ),
		BasePeer::TYPE_COLNAME => array (InprofesPeer::VENEXT => 0, InprofesPeer::CEDPROF => 1, InprofesPeer::NOMPROF => 2, InprofesPeer::APEPROF => 3, InprofesPeer::NACPROF => 4, InprofesPeer::PAIS => 5, InprofesPeer::LUGNAC => 6, InprofesPeer::SEXO => 7, InprofesPeer::FECNAC => 8, InprofesPeer::DIRNAC => 9, InprofesPeer::ESTCIV => 10, InprofesPeer::TELHAB => 11, InprofesPeer::TELCEL => 12, InprofesPeer::INESTADO_ID => 13, InprofesPeer::INMUNICIPIO_ID => 14, InprofesPeer::INPARROQUIA_ID => 15, InprofesPeer::INESPECI_ID => 16, InprofesPeer::DIRHAB => 17, InprofesPeer::CODPOST => 18, InprofesPeer::EMAIL => 19, InprofesPeer::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('venext' => 0, 'cedprof' => 1, 'nomprof' => 2, 'apeprof' => 3, 'nacprof' => 4, 'pais' => 5, 'lugnac' => 6, 'sexo' => 7, 'fecnac' => 8, 'dirnac' => 9, 'estciv' => 10, 'telhab' => 11, 'telcel' => 12, 'inestado_id' => 13, 'inmunicipio_id' => 14, 'inparroquia_id' => 15, 'inespeci_id' => 16, 'dirhab' => 17, 'codpost' => 18, 'email' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/InprofesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.InprofesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = InprofesPeer::getTableMap();
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
		return str_replace(InprofesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(InprofesPeer::VENEXT);

		$criteria->addSelectColumn(InprofesPeer::CEDPROF);

		$criteria->addSelectColumn(InprofesPeer::NOMPROF);

		$criteria->addSelectColumn(InprofesPeer::APEPROF);

		$criteria->addSelectColumn(InprofesPeer::NACPROF);

		$criteria->addSelectColumn(InprofesPeer::PAIS);

		$criteria->addSelectColumn(InprofesPeer::LUGNAC);

		$criteria->addSelectColumn(InprofesPeer::SEXO);

		$criteria->addSelectColumn(InprofesPeer::FECNAC);

		$criteria->addSelectColumn(InprofesPeer::DIRNAC);

		$criteria->addSelectColumn(InprofesPeer::ESTCIV);

		$criteria->addSelectColumn(InprofesPeer::TELHAB);

		$criteria->addSelectColumn(InprofesPeer::TELCEL);

		$criteria->addSelectColumn(InprofesPeer::INESTADO_ID);

		$criteria->addSelectColumn(InprofesPeer::INMUNICIPIO_ID);

		$criteria->addSelectColumn(InprofesPeer::INPARROQUIA_ID);

		$criteria->addSelectColumn(InprofesPeer::INESPECI_ID);

		$criteria->addSelectColumn(InprofesPeer::DIRHAB);

		$criteria->addSelectColumn(InprofesPeer::CODPOST);

		$criteria->addSelectColumn(InprofesPeer::EMAIL);

		$criteria->addSelectColumn(InprofesPeer::ID);

	}

	const COUNT = 'COUNT(inprofes.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT inprofes.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InprofesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InprofesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = InprofesPeer::doSelectRS($criteria, $con);
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
		$objects = InprofesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return InprofesPeer::populateObjects(InprofesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			InprofesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = InprofesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinInestado(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InprofesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InprofesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InprofesPeer::INESTADO_ID, InestadoPeer::ID);

		$rs = InprofesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinInmunicipio(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InprofesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InprofesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InprofesPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$rs = InprofesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinInparroquia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InprofesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InprofesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InprofesPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$rs = InprofesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinInespeci(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InprofesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InprofesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InprofesPeer::INESPECI_ID, InespeciPeer::ID);

		$rs = InprofesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinInestado(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InprofesPeer::addSelectColumns($c);
		$startcol = (InprofesPeer::NUM_COLUMNS - InprofesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InestadoPeer::addSelectColumns($c);

		$c->addJoin(InprofesPeer::INESTADO_ID, InestadoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InprofesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InestadoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getInestado(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInprofes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInprofess();
				$obj2->addInprofes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinInmunicipio(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InprofesPeer::addSelectColumns($c);
		$startcol = (InprofesPeer::NUM_COLUMNS - InprofesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InmunicipioPeer::addSelectColumns($c);

		$c->addJoin(InprofesPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InprofesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InmunicipioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getInmunicipio(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInprofes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInprofess();
				$obj2->addInprofes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinInparroquia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InprofesPeer::addSelectColumns($c);
		$startcol = (InprofesPeer::NUM_COLUMNS - InprofesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InparroquiaPeer::addSelectColumns($c);

		$c->addJoin(InprofesPeer::INPARROQUIA_ID, InparroquiaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InprofesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InparroquiaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getInparroquia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInprofes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInprofess();
				$obj2->addInprofes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinInespeci(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InprofesPeer::addSelectColumns($c);
		$startcol = (InprofesPeer::NUM_COLUMNS - InprofesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InespeciPeer::addSelectColumns($c);

		$c->addJoin(InprofesPeer::INESPECI_ID, InespeciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InprofesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InespeciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getInespeci(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInprofes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInprofess();
				$obj2->addInprofes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InprofesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InprofesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InprofesPeer::INESTADO_ID, InestadoPeer::ID);

		$criteria->addJoin(InprofesPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$criteria->addJoin(InprofesPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$criteria->addJoin(InprofesPeer::INESPECI_ID, InespeciPeer::ID);

		$rs = InprofesPeer::doSelectRS($criteria, $con);
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

		InprofesPeer::addSelectColumns($c);
		$startcol2 = (InprofesPeer::NUM_COLUMNS - InprofesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InestadoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InestadoPeer::NUM_COLUMNS;

		InmunicipioPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InmunicipioPeer::NUM_COLUMNS;

		InparroquiaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InparroquiaPeer::NUM_COLUMNS;

		InespeciPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + InespeciPeer::NUM_COLUMNS;

		$c->addJoin(InprofesPeer::INESTADO_ID, InestadoPeer::ID);

		$c->addJoin(InprofesPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$c->addJoin(InprofesPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$c->addJoin(InprofesPeer::INESPECI_ID, InespeciPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InprofesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = InestadoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInestado(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInprofes($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initInprofess();
				$obj2->addInprofes($obj1);
			}


					
			$omClass = InmunicipioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getInmunicipio(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInprofes($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initInprofess();
				$obj3->addInprofes($obj1);
			}


					
			$omClass = InparroquiaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getInparroquia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInprofes($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initInprofess();
				$obj4->addInprofes($obj1);
			}


					
			$omClass = InespeciPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getInespeci(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInprofes($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initInprofess();
				$obj5->addInprofes($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptInestado(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InprofesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InprofesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InprofesPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$criteria->addJoin(InprofesPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$criteria->addJoin(InprofesPeer::INESPECI_ID, InespeciPeer::ID);

		$rs = InprofesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptInmunicipio(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InprofesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InprofesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InprofesPeer::INESTADO_ID, InestadoPeer::ID);

		$criteria->addJoin(InprofesPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$criteria->addJoin(InprofesPeer::INESPECI_ID, InespeciPeer::ID);

		$rs = InprofesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptInparroquia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InprofesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InprofesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InprofesPeer::INESTADO_ID, InestadoPeer::ID);

		$criteria->addJoin(InprofesPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$criteria->addJoin(InprofesPeer::INESPECI_ID, InespeciPeer::ID);

		$rs = InprofesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptInespeci(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InprofesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InprofesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InprofesPeer::INESTADO_ID, InestadoPeer::ID);

		$criteria->addJoin(InprofesPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$criteria->addJoin(InprofesPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$rs = InprofesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptInestado(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InprofesPeer::addSelectColumns($c);
		$startcol2 = (InprofesPeer::NUM_COLUMNS - InprofesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InmunicipioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InmunicipioPeer::NUM_COLUMNS;

		InparroquiaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InparroquiaPeer::NUM_COLUMNS;

		InespeciPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InespeciPeer::NUM_COLUMNS;

		$c->addJoin(InprofesPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$c->addJoin(InprofesPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$c->addJoin(InprofesPeer::INESPECI_ID, InespeciPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InprofesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InmunicipioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInmunicipio(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInprofess();
				$obj2->addInprofes($obj1);
			}

			$omClass = InparroquiaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getInparroquia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInprofess();
				$obj3->addInprofes($obj1);
			}

			$omClass = InespeciPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getInespeci(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInprofess();
				$obj4->addInprofes($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptInmunicipio(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InprofesPeer::addSelectColumns($c);
		$startcol2 = (InprofesPeer::NUM_COLUMNS - InprofesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InestadoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InestadoPeer::NUM_COLUMNS;

		InparroquiaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InparroquiaPeer::NUM_COLUMNS;

		InespeciPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InespeciPeer::NUM_COLUMNS;

		$c->addJoin(InprofesPeer::INESTADO_ID, InestadoPeer::ID);

		$c->addJoin(InprofesPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$c->addJoin(InprofesPeer::INESPECI_ID, InespeciPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InprofesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InestadoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInestado(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInprofess();
				$obj2->addInprofes($obj1);
			}

			$omClass = InparroquiaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getInparroquia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInprofess();
				$obj3->addInprofes($obj1);
			}

			$omClass = InespeciPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getInespeci(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInprofess();
				$obj4->addInprofes($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptInparroquia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InprofesPeer::addSelectColumns($c);
		$startcol2 = (InprofesPeer::NUM_COLUMNS - InprofesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InestadoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InestadoPeer::NUM_COLUMNS;

		InmunicipioPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InmunicipioPeer::NUM_COLUMNS;

		InespeciPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InespeciPeer::NUM_COLUMNS;

		$c->addJoin(InprofesPeer::INESTADO_ID, InestadoPeer::ID);

		$c->addJoin(InprofesPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$c->addJoin(InprofesPeer::INESPECI_ID, InespeciPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InprofesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InestadoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInestado(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInprofess();
				$obj2->addInprofes($obj1);
			}

			$omClass = InmunicipioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getInmunicipio(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInprofess();
				$obj3->addInprofes($obj1);
			}

			$omClass = InespeciPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getInespeci(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInprofess();
				$obj4->addInprofes($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptInespeci(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InprofesPeer::addSelectColumns($c);
		$startcol2 = (InprofesPeer::NUM_COLUMNS - InprofesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InestadoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InestadoPeer::NUM_COLUMNS;

		InmunicipioPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InmunicipioPeer::NUM_COLUMNS;

		InparroquiaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InparroquiaPeer::NUM_COLUMNS;

		$c->addJoin(InprofesPeer::INESTADO_ID, InestadoPeer::ID);

		$c->addJoin(InprofesPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$c->addJoin(InprofesPeer::INPARROQUIA_ID, InparroquiaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InprofesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InestadoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInestado(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInprofess();
				$obj2->addInprofes($obj1);
			}

			$omClass = InmunicipioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getInmunicipio(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInprofess();
				$obj3->addInprofes($obj1);
			}

			$omClass = InparroquiaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getInparroquia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInprofes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInprofess();
				$obj4->addInprofes($obj1);
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
		return InprofesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(InprofesPeer::ID); 

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
			$comparison = $criteria->getComparison(InprofesPeer::ID);
			$selectCriteria->add(InprofesPeer::ID, $criteria->remove(InprofesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(InprofesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(InprofesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Inprofes) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(InprofesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Inprofes $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(InprofesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(InprofesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(InprofesPeer::DATABASE_NAME, InprofesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = InprofesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(InprofesPeer::DATABASE_NAME);

		$criteria->add(InprofesPeer::ID, $pk);


		$v = InprofesPeer::doSelect($criteria, $con);

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
			$criteria->add(InprofesPeer::ID, $pks, Criteria::IN);
			$objs = InprofesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseInprofesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/InprofesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.InprofesMapBuilder');
}
