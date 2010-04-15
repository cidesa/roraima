<?php


abstract class BaseInempresaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'inempresa';

	
	const CLASS_DEFAULT = 'lib.model.Inempresa';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RIFEMP = 'inempresa.RIFEMP';

	
	const RAZSOC = 'inempresa.RAZSOC';

	
	const INTIPEMP_ID = 'inempresa.INTIPEMP_ID';

	
	const INESTADO_ID = 'inempresa.INESTADO_ID';

	
	const INMUNICIPIO_ID = 'inempresa.INMUNICIPIO_ID';

	
	const INPARROQUIA_ID = 'inempresa.INPARROQUIA_ID';

	
	const DIREMP = 'inempresa.DIREMP';

	
	const CODPOST = 'inempresa.CODPOST';

	
	const TELEMP = 'inempresa.TELEMP';

	
	const EMAIL = 'inempresa.EMAIL';

	
	const CEDREPLEG = 'inempresa.CEDREPLEG';

	
	const VENEXTREPLEG = 'inempresa.VENEXTREPLEG';

	
	const NOMREPLEG = 'inempresa.NOMREPLEG';

	
	const APEREPLEG = 'inempresa.APEREPLEG';

	
	const SEXO = 'inempresa.SEXO';

	
	const FECNAC = 'inempresa.FECNAC';

	
	const ESTCIV = 'inempresa.ESTCIV';

	
	const TELHAB = 'inempresa.TELHAB';

	
	const TELCEL = 'inempresa.TELCEL';

	
	const EMAILREPLEG = 'inempresa.EMAILREPLEG';

	
	const ID = 'inempresa.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Rifemp', 'Razsoc', 'IntipempId', 'InestadoId', 'InmunicipioId', 'InparroquiaId', 'Diremp', 'Codpost', 'Telemp', 'Email', 'Cedrepleg', 'Venextrepleg', 'Nomrepleg', 'Aperepleg', 'Sexo', 'Fecnac', 'Estciv', 'Telhab', 'Telcel', 'Emailrepleg', 'Id', ),
		BasePeer::TYPE_COLNAME => array (InempresaPeer::RIFEMP, InempresaPeer::RAZSOC, InempresaPeer::INTIPEMP_ID, InempresaPeer::INESTADO_ID, InempresaPeer::INMUNICIPIO_ID, InempresaPeer::INPARROQUIA_ID, InempresaPeer::DIREMP, InempresaPeer::CODPOST, InempresaPeer::TELEMP, InempresaPeer::EMAIL, InempresaPeer::CEDREPLEG, InempresaPeer::VENEXTREPLEG, InempresaPeer::NOMREPLEG, InempresaPeer::APEREPLEG, InempresaPeer::SEXO, InempresaPeer::FECNAC, InempresaPeer::ESTCIV, InempresaPeer::TELHAB, InempresaPeer::TELCEL, InempresaPeer::EMAILREPLEG, InempresaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('rifemp', 'razsoc', 'intipemp_id', 'inestado_id', 'inmunicipio_id', 'inparroquia_id', 'diremp', 'codpost', 'telemp', 'email', 'cedrepleg', 'venextrepleg', 'nomrepleg', 'aperepleg', 'sexo', 'fecnac', 'estciv', 'telhab', 'telcel', 'emailrepleg', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Rifemp' => 0, 'Razsoc' => 1, 'IntipempId' => 2, 'InestadoId' => 3, 'InmunicipioId' => 4, 'InparroquiaId' => 5, 'Diremp' => 6, 'Codpost' => 7, 'Telemp' => 8, 'Email' => 9, 'Cedrepleg' => 10, 'Venextrepleg' => 11, 'Nomrepleg' => 12, 'Aperepleg' => 13, 'Sexo' => 14, 'Fecnac' => 15, 'Estciv' => 16, 'Telhab' => 17, 'Telcel' => 18, 'Emailrepleg' => 19, 'Id' => 20, ),
		BasePeer::TYPE_COLNAME => array (InempresaPeer::RIFEMP => 0, InempresaPeer::RAZSOC => 1, InempresaPeer::INTIPEMP_ID => 2, InempresaPeer::INESTADO_ID => 3, InempresaPeer::INMUNICIPIO_ID => 4, InempresaPeer::INPARROQUIA_ID => 5, InempresaPeer::DIREMP => 6, InempresaPeer::CODPOST => 7, InempresaPeer::TELEMP => 8, InempresaPeer::EMAIL => 9, InempresaPeer::CEDREPLEG => 10, InempresaPeer::VENEXTREPLEG => 11, InempresaPeer::NOMREPLEG => 12, InempresaPeer::APEREPLEG => 13, InempresaPeer::SEXO => 14, InempresaPeer::FECNAC => 15, InempresaPeer::ESTCIV => 16, InempresaPeer::TELHAB => 17, InempresaPeer::TELCEL => 18, InempresaPeer::EMAILREPLEG => 19, InempresaPeer::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('rifemp' => 0, 'razsoc' => 1, 'intipemp_id' => 2, 'inestado_id' => 3, 'inmunicipio_id' => 4, 'inparroquia_id' => 5, 'diremp' => 6, 'codpost' => 7, 'telemp' => 8, 'email' => 9, 'cedrepleg' => 10, 'venextrepleg' => 11, 'nomrepleg' => 12, 'aperepleg' => 13, 'sexo' => 14, 'fecnac' => 15, 'estciv' => 16, 'telhab' => 17, 'telcel' => 18, 'emailrepleg' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/InempresaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.InempresaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = InempresaPeer::getTableMap();
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
		return str_replace(InempresaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(InempresaPeer::RIFEMP);

		$criteria->addSelectColumn(InempresaPeer::RAZSOC);

		$criteria->addSelectColumn(InempresaPeer::INTIPEMP_ID);

		$criteria->addSelectColumn(InempresaPeer::INESTADO_ID);

		$criteria->addSelectColumn(InempresaPeer::INMUNICIPIO_ID);

		$criteria->addSelectColumn(InempresaPeer::INPARROQUIA_ID);

		$criteria->addSelectColumn(InempresaPeer::DIREMP);

		$criteria->addSelectColumn(InempresaPeer::CODPOST);

		$criteria->addSelectColumn(InempresaPeer::TELEMP);

		$criteria->addSelectColumn(InempresaPeer::EMAIL);

		$criteria->addSelectColumn(InempresaPeer::CEDREPLEG);

		$criteria->addSelectColumn(InempresaPeer::VENEXTREPLEG);

		$criteria->addSelectColumn(InempresaPeer::NOMREPLEG);

		$criteria->addSelectColumn(InempresaPeer::APEREPLEG);

		$criteria->addSelectColumn(InempresaPeer::SEXO);

		$criteria->addSelectColumn(InempresaPeer::FECNAC);

		$criteria->addSelectColumn(InempresaPeer::ESTCIV);

		$criteria->addSelectColumn(InempresaPeer::TELHAB);

		$criteria->addSelectColumn(InempresaPeer::TELCEL);

		$criteria->addSelectColumn(InempresaPeer::EMAILREPLEG);

		$criteria->addSelectColumn(InempresaPeer::ID);

	}

	const COUNT = 'COUNT(inempresa.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT inempresa.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InempresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InempresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = InempresaPeer::doSelectRS($criteria, $con);
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
		$objects = InempresaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return InempresaPeer::populateObjects(InempresaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			InempresaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = InempresaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinIntipemp(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InempresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InempresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InempresaPeer::INTIPEMP_ID, IntipempPeer::ID);

		$rs = InempresaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinInestado(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InempresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InempresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InempresaPeer::INESTADO_ID, InestadoPeer::ID);

		$rs = InempresaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InempresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InempresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InempresaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$rs = InempresaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InempresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InempresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InempresaPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$rs = InempresaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinIntipemp(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InempresaPeer::addSelectColumns($c);
		$startcol = (InempresaPeer::NUM_COLUMNS - InempresaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		IntipempPeer::addSelectColumns($c);

		$c->addJoin(InempresaPeer::INTIPEMP_ID, IntipempPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InempresaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IntipempPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getIntipemp(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInempresa($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInempresas();
				$obj2->addInempresa($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinInestado(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InempresaPeer::addSelectColumns($c);
		$startcol = (InempresaPeer::NUM_COLUMNS - InempresaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InestadoPeer::addSelectColumns($c);

		$c->addJoin(InempresaPeer::INESTADO_ID, InestadoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InempresaPeer::getOMClass();

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
										$temp_obj2->addInempresa($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInempresas();
				$obj2->addInempresa($obj1); 			}
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

		InempresaPeer::addSelectColumns($c);
		$startcol = (InempresaPeer::NUM_COLUMNS - InempresaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InmunicipioPeer::addSelectColumns($c);

		$c->addJoin(InempresaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InempresaPeer::getOMClass();

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
										$temp_obj2->addInempresa($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInempresas();
				$obj2->addInempresa($obj1); 			}
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

		InempresaPeer::addSelectColumns($c);
		$startcol = (InempresaPeer::NUM_COLUMNS - InempresaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InparroquiaPeer::addSelectColumns($c);

		$c->addJoin(InempresaPeer::INPARROQUIA_ID, InparroquiaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InempresaPeer::getOMClass();

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
										$temp_obj2->addInempresa($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInempresas();
				$obj2->addInempresa($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InempresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InempresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InempresaPeer::INTIPEMP_ID, IntipempPeer::ID);

		$criteria->addJoin(InempresaPeer::INESTADO_ID, InestadoPeer::ID);

		$criteria->addJoin(InempresaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$criteria->addJoin(InempresaPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$rs = InempresaPeer::doSelectRS($criteria, $con);
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

		InempresaPeer::addSelectColumns($c);
		$startcol2 = (InempresaPeer::NUM_COLUMNS - InempresaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		IntipempPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + IntipempPeer::NUM_COLUMNS;

		InestadoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InestadoPeer::NUM_COLUMNS;

		InmunicipioPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InmunicipioPeer::NUM_COLUMNS;

		InparroquiaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + InparroquiaPeer::NUM_COLUMNS;

		$c->addJoin(InempresaPeer::INTIPEMP_ID, IntipempPeer::ID);

		$c->addJoin(InempresaPeer::INESTADO_ID, InestadoPeer::ID);

		$c->addJoin(InempresaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$c->addJoin(InempresaPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InempresaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = IntipempPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getIntipemp(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInempresa($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initInempresas();
				$obj2->addInempresa($obj1);
			}


					
			$omClass = InestadoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getInestado(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInempresa($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initInempresas();
				$obj3->addInempresa($obj1);
			}


					
			$omClass = InmunicipioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getInmunicipio(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInempresa($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initInempresas();
				$obj4->addInempresa($obj1);
			}


					
			$omClass = InparroquiaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getInparroquia(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInempresa($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initInempresas();
				$obj5->addInempresa($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptIntipemp(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InempresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InempresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InempresaPeer::INESTADO_ID, InestadoPeer::ID);

		$criteria->addJoin(InempresaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$criteria->addJoin(InempresaPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$rs = InempresaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptInestado(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InempresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InempresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InempresaPeer::INTIPEMP_ID, IntipempPeer::ID);

		$criteria->addJoin(InempresaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$criteria->addJoin(InempresaPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$rs = InempresaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InempresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InempresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InempresaPeer::INTIPEMP_ID, IntipempPeer::ID);

		$criteria->addJoin(InempresaPeer::INESTADO_ID, InestadoPeer::ID);

		$criteria->addJoin(InempresaPeer::INPARROQUIA_ID, InparroquiaPeer::ID);

		$rs = InempresaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InempresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InempresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InempresaPeer::INTIPEMP_ID, IntipempPeer::ID);

		$criteria->addJoin(InempresaPeer::INESTADO_ID, InestadoPeer::ID);

		$criteria->addJoin(InempresaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$rs = InempresaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptIntipemp(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InempresaPeer::addSelectColumns($c);
		$startcol2 = (InempresaPeer::NUM_COLUMNS - InempresaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InestadoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InestadoPeer::NUM_COLUMNS;

		InmunicipioPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InmunicipioPeer::NUM_COLUMNS;

		InparroquiaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InparroquiaPeer::NUM_COLUMNS;

		$c->addJoin(InempresaPeer::INESTADO_ID, InestadoPeer::ID);

		$c->addJoin(InempresaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$c->addJoin(InempresaPeer::INPARROQUIA_ID, InparroquiaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InempresaPeer::getOMClass();

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
					$temp_obj2->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInempresas();
				$obj2->addInempresa($obj1);
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
					$temp_obj3->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInempresas();
				$obj3->addInempresa($obj1);
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
					$temp_obj4->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInempresas();
				$obj4->addInempresa($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptInestado(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InempresaPeer::addSelectColumns($c);
		$startcol2 = (InempresaPeer::NUM_COLUMNS - InempresaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		IntipempPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + IntipempPeer::NUM_COLUMNS;

		InmunicipioPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InmunicipioPeer::NUM_COLUMNS;

		InparroquiaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InparroquiaPeer::NUM_COLUMNS;

		$c->addJoin(InempresaPeer::INTIPEMP_ID, IntipempPeer::ID);

		$c->addJoin(InempresaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$c->addJoin(InempresaPeer::INPARROQUIA_ID, InparroquiaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InempresaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IntipempPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getIntipemp(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInempresas();
				$obj2->addInempresa($obj1);
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
					$temp_obj3->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInempresas();
				$obj3->addInempresa($obj1);
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
					$temp_obj4->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInempresas();
				$obj4->addInempresa($obj1);
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

		InempresaPeer::addSelectColumns($c);
		$startcol2 = (InempresaPeer::NUM_COLUMNS - InempresaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		IntipempPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + IntipempPeer::NUM_COLUMNS;

		InestadoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InestadoPeer::NUM_COLUMNS;

		InparroquiaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InparroquiaPeer::NUM_COLUMNS;

		$c->addJoin(InempresaPeer::INTIPEMP_ID, IntipempPeer::ID);

		$c->addJoin(InempresaPeer::INESTADO_ID, InestadoPeer::ID);

		$c->addJoin(InempresaPeer::INPARROQUIA_ID, InparroquiaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InempresaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IntipempPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getIntipemp(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInempresas();
				$obj2->addInempresa($obj1);
			}

			$omClass = InestadoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getInestado(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInempresas();
				$obj3->addInempresa($obj1);
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
					$temp_obj4->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInempresas();
				$obj4->addInempresa($obj1);
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

		InempresaPeer::addSelectColumns($c);
		$startcol2 = (InempresaPeer::NUM_COLUMNS - InempresaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		IntipempPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + IntipempPeer::NUM_COLUMNS;

		InestadoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InestadoPeer::NUM_COLUMNS;

		InmunicipioPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InmunicipioPeer::NUM_COLUMNS;

		$c->addJoin(InempresaPeer::INTIPEMP_ID, IntipempPeer::ID);

		$c->addJoin(InempresaPeer::INESTADO_ID, InestadoPeer::ID);

		$c->addJoin(InempresaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InempresaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IntipempPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getIntipemp(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInempresas();
				$obj2->addInempresa($obj1);
			}

			$omClass = InestadoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getInestado(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInempresas();
				$obj3->addInempresa($obj1);
			}

			$omClass = InmunicipioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getInmunicipio(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInempresa($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInempresas();
				$obj4->addInempresa($obj1);
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
		return InempresaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(InempresaPeer::ID); 

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
			$comparison = $criteria->getComparison(InempresaPeer::ID);
			$selectCriteria->add(InempresaPeer::ID, $criteria->remove(InempresaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(InempresaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(InempresaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Inempresa) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(InempresaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Inempresa $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(InempresaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(InempresaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(InempresaPeer::DATABASE_NAME, InempresaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = InempresaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(InempresaPeer::DATABASE_NAME);

		$criteria->add(InempresaPeer::ID, $pk);


		$v = InempresaPeer::doSelect($criteria, $con);

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
			$criteria->add(InempresaPeer::ID, $pks, Criteria::IN);
			$objs = InempresaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseInempresaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/InempresaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.InempresaMapBuilder');
}
