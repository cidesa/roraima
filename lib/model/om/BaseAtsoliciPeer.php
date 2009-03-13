<?php


abstract class BaseAtsoliciPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atsolici';

	
	const CLASS_DEFAULT = 'lib.model.Atsolici';

	
	const NUM_COLUMNS = 33;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDSOL = 'atsolici.CEDSOL';

	
	const NOMSOL = 'atsolici.NOMSOL';

	
	const APESOL = 'atsolici.APESOL';

	
	const NACSOL = 'atsolici.NACSOL';

	
	const PAIS = 'atsolici.PAIS';

	
	const CONEXT = 'atsolici.CONEXT';

	
	const LUGNAC = 'atsolici.LUGNAC';

	
	const TIPO = 'atsolici.TIPO';

	
	const SEXO = 'atsolici.SEXO';

	
	const FECNAC = 'atsolici.FECNAC';

	
	const DIRNAC = 'atsolici.DIRNAC';

	
	const ESTCIV = 'atsolici.ESTCIV';

	
	const TELHAB = 'atsolici.TELHAB';

	
	const TELADIHAB = 'atsolici.TELADIHAB';

	
	const PROSOL = 'atsolici.PROSOL';

	
	const ATESTADOS_ID = 'atsolici.ATESTADOS_ID';

	
	const ATMUNICIPIOS_ID = 'atsolici.ATMUNICIPIOS_ID';

	
	const ATPARROQUIAS_ID = 'atsolici.ATPARROQUIAS_ID';

	
	const CIUDAD = 'atsolici.CIUDAD';

	
	const CASERIO = 'atsolici.CASERIO';

	
	const DIRHAB = 'atsolici.DIRHAB';

	
	const DIRTRA = 'atsolici.DIRTRA';

	
	const CONCOMSOL = 'atsolici.CONCOMSOL';

	
	const CARCONCOMSOL = 'atsolici.CARCONCOMSOL';

	
	const NOTA = 'atsolici.NOTA';

	
	const GRAINS = 'atsolici.GRAINS';

	
	const TRASOL = 'atsolici.TRASOL';

	
	const NOMEMP = 'atsolici.NOMEMP';

	
	const DIREMP = 'atsolici.DIREMP';

	
	const TELEMP = 'atsolici.TELEMP';

	
	const TIPING = 'atsolici.TIPING';

	
	const MONING = 'atsolici.MONING';

	
	const ID = 'atsolici.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedsol', 'Nomsol', 'Apesol', 'Nacsol', 'Pais', 'Conext', 'Lugnac', 'Tipo', 'Sexo', 'Fecnac', 'Dirnac', 'Estciv', 'Telhab', 'Teladihab', 'Prosol', 'AtestadosId', 'AtmunicipiosId', 'AtparroquiasId', 'Ciudad', 'Caserio', 'Dirhab', 'Dirtra', 'Concomsol', 'Carconcomsol', 'Nota', 'Grains', 'Trasol', 'Nomemp', 'Diremp', 'Telemp', 'Tiping', 'Moning', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtsoliciPeer::CEDSOL, AtsoliciPeer::NOMSOL, AtsoliciPeer::APESOL, AtsoliciPeer::NACSOL, AtsoliciPeer::PAIS, AtsoliciPeer::CONEXT, AtsoliciPeer::LUGNAC, AtsoliciPeer::TIPO, AtsoliciPeer::SEXO, AtsoliciPeer::FECNAC, AtsoliciPeer::DIRNAC, AtsoliciPeer::ESTCIV, AtsoliciPeer::TELHAB, AtsoliciPeer::TELADIHAB, AtsoliciPeer::PROSOL, AtsoliciPeer::ATESTADOS_ID, AtsoliciPeer::ATMUNICIPIOS_ID, AtsoliciPeer::ATPARROQUIAS_ID, AtsoliciPeer::CIUDAD, AtsoliciPeer::CASERIO, AtsoliciPeer::DIRHAB, AtsoliciPeer::DIRTRA, AtsoliciPeer::CONCOMSOL, AtsoliciPeer::CARCONCOMSOL, AtsoliciPeer::NOTA, AtsoliciPeer::GRAINS, AtsoliciPeer::TRASOL, AtsoliciPeer::NOMEMP, AtsoliciPeer::DIREMP, AtsoliciPeer::TELEMP, AtsoliciPeer::TIPING, AtsoliciPeer::MONING, AtsoliciPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedsol', 'nomsol', 'apesol', 'nacsol', 'pais', 'conext', 'lugnac', 'tipo', 'sexo', 'fecnac', 'dirnac', 'estciv', 'telhab', 'teladihab', 'prosol', 'atestados_id', 'atmunicipios_id', 'atparroquias_id', 'ciudad', 'caserio', 'dirhab', 'dirtra', 'concomsol', 'carconcomsol', 'nota', 'grains', 'trasol', 'nomemp', 'diremp', 'telemp', 'tiping', 'moning', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedsol' => 0, 'Nomsol' => 1, 'Apesol' => 2, 'Nacsol' => 3, 'Pais' => 4, 'Conext' => 5, 'Lugnac' => 6, 'Tipo' => 7, 'Sexo' => 8, 'Fecnac' => 9, 'Dirnac' => 10, 'Estciv' => 11, 'Telhab' => 12, 'Teladihab' => 13, 'Prosol' => 14, 'AtestadosId' => 15, 'AtmunicipiosId' => 16, 'AtparroquiasId' => 17, 'Ciudad' => 18, 'Caserio' => 19, 'Dirhab' => 20, 'Dirtra' => 21, 'Concomsol' => 22, 'Carconcomsol' => 23, 'Nota' => 24, 'Grains' => 25, 'Trasol' => 26, 'Nomemp' => 27, 'Diremp' => 28, 'Telemp' => 29, 'Tiping' => 30, 'Moning' => 31, 'Id' => 32, ),
		BasePeer::TYPE_COLNAME => array (AtsoliciPeer::CEDSOL => 0, AtsoliciPeer::NOMSOL => 1, AtsoliciPeer::APESOL => 2, AtsoliciPeer::NACSOL => 3, AtsoliciPeer::PAIS => 4, AtsoliciPeer::CONEXT => 5, AtsoliciPeer::LUGNAC => 6, AtsoliciPeer::TIPO => 7, AtsoliciPeer::SEXO => 8, AtsoliciPeer::FECNAC => 9, AtsoliciPeer::DIRNAC => 10, AtsoliciPeer::ESTCIV => 11, AtsoliciPeer::TELHAB => 12, AtsoliciPeer::TELADIHAB => 13, AtsoliciPeer::PROSOL => 14, AtsoliciPeer::ATESTADOS_ID => 15, AtsoliciPeer::ATMUNICIPIOS_ID => 16, AtsoliciPeer::ATPARROQUIAS_ID => 17, AtsoliciPeer::CIUDAD => 18, AtsoliciPeer::CASERIO => 19, AtsoliciPeer::DIRHAB => 20, AtsoliciPeer::DIRTRA => 21, AtsoliciPeer::CONCOMSOL => 22, AtsoliciPeer::CARCONCOMSOL => 23, AtsoliciPeer::NOTA => 24, AtsoliciPeer::GRAINS => 25, AtsoliciPeer::TRASOL => 26, AtsoliciPeer::NOMEMP => 27, AtsoliciPeer::DIREMP => 28, AtsoliciPeer::TELEMP => 29, AtsoliciPeer::TIPING => 30, AtsoliciPeer::MONING => 31, AtsoliciPeer::ID => 32, ),
		BasePeer::TYPE_FIELDNAME => array ('cedsol' => 0, 'nomsol' => 1, 'apesol' => 2, 'nacsol' => 3, 'pais' => 4, 'conext' => 5, 'lugnac' => 6, 'tipo' => 7, 'sexo' => 8, 'fecnac' => 9, 'dirnac' => 10, 'estciv' => 11, 'telhab' => 12, 'teladihab' => 13, 'prosol' => 14, 'atestados_id' => 15, 'atmunicipios_id' => 16, 'atparroquias_id' => 17, 'ciudad' => 18, 'caserio' => 19, 'dirhab' => 20, 'dirtra' => 21, 'concomsol' => 22, 'carconcomsol' => 23, 'nota' => 24, 'grains' => 25, 'trasol' => 26, 'nomemp' => 27, 'diremp' => 28, 'telemp' => 29, 'tiping' => 30, 'moning' => 31, 'id' => 32, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AtsoliciMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AtsoliciMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtsoliciPeer::getTableMap();
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
		return str_replace(AtsoliciPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtsoliciPeer::CEDSOL);

		$criteria->addSelectColumn(AtsoliciPeer::NOMSOL);

		$criteria->addSelectColumn(AtsoliciPeer::APESOL);

		$criteria->addSelectColumn(AtsoliciPeer::NACSOL);

		$criteria->addSelectColumn(AtsoliciPeer::PAIS);

		$criteria->addSelectColumn(AtsoliciPeer::CONEXT);

		$criteria->addSelectColumn(AtsoliciPeer::LUGNAC);

		$criteria->addSelectColumn(AtsoliciPeer::TIPO);

		$criteria->addSelectColumn(AtsoliciPeer::SEXO);

		$criteria->addSelectColumn(AtsoliciPeer::FECNAC);

		$criteria->addSelectColumn(AtsoliciPeer::DIRNAC);

		$criteria->addSelectColumn(AtsoliciPeer::ESTCIV);

		$criteria->addSelectColumn(AtsoliciPeer::TELHAB);

		$criteria->addSelectColumn(AtsoliciPeer::TELADIHAB);

		$criteria->addSelectColumn(AtsoliciPeer::PROSOL);

		$criteria->addSelectColumn(AtsoliciPeer::ATESTADOS_ID);

		$criteria->addSelectColumn(AtsoliciPeer::ATMUNICIPIOS_ID);

		$criteria->addSelectColumn(AtsoliciPeer::ATPARROQUIAS_ID);

		$criteria->addSelectColumn(AtsoliciPeer::CIUDAD);

		$criteria->addSelectColumn(AtsoliciPeer::CASERIO);

		$criteria->addSelectColumn(AtsoliciPeer::DIRHAB);

		$criteria->addSelectColumn(AtsoliciPeer::DIRTRA);

		$criteria->addSelectColumn(AtsoliciPeer::CONCOMSOL);

		$criteria->addSelectColumn(AtsoliciPeer::CARCONCOMSOL);

		$criteria->addSelectColumn(AtsoliciPeer::NOTA);

		$criteria->addSelectColumn(AtsoliciPeer::GRAINS);

		$criteria->addSelectColumn(AtsoliciPeer::TRASOL);

		$criteria->addSelectColumn(AtsoliciPeer::NOMEMP);

		$criteria->addSelectColumn(AtsoliciPeer::DIREMP);

		$criteria->addSelectColumn(AtsoliciPeer::TELEMP);

		$criteria->addSelectColumn(AtsoliciPeer::TIPING);

		$criteria->addSelectColumn(AtsoliciPeer::MONING);

		$criteria->addSelectColumn(AtsoliciPeer::ID);

	}

	const COUNT = 'COUNT(atsolici.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atsolici.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtsoliciPeer::doSelectRS($criteria, $con);
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
		$objects = AtsoliciPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtsoliciPeer::populateObjects(AtsoliciPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtsoliciPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtsoliciPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAtestados(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtsoliciPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$rs = AtsoliciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtmunicipios(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtsoliciPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$rs = AtsoliciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtparroquias(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtsoliciPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = AtsoliciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAtestados(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtsoliciPeer::addSelectColumns($c);
		$startcol = (AtsoliciPeer::NUM_COLUMNS - AtsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtestadosPeer::addSelectColumns($c);

		$c->addJoin(AtsoliciPeer::ATESTADOS_ID, AtestadosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtestadosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtestados(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtsolici($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtsolicis();
				$obj2->addAtsolici($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtmunicipios(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtsoliciPeer::addSelectColumns($c);
		$startcol = (AtsoliciPeer::NUM_COLUMNS - AtsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtmunicipiosPeer::addSelectColumns($c);

		$c->addJoin(AtsoliciPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtmunicipiosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtmunicipios(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtsolici($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtsolicis();
				$obj2->addAtsolici($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtparroquias(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtsoliciPeer::addSelectColumns($c);
		$startcol = (AtsoliciPeer::NUM_COLUMNS - AtsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtparroquiasPeer::addSelectColumns($c);

		$c->addJoin(AtsoliciPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtparroquiasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtparroquias(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtsolici($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtsolicis();
				$obj2->addAtsolici($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtsoliciPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtsoliciPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtsoliciPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = AtsoliciPeer::doSelectRS($criteria, $con);
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

		AtsoliciPeer::addSelectColumns($c);
		$startcol2 = (AtsoliciPeer::NUM_COLUMNS - AtsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtmunicipiosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtparroquiasPeer::NUM_COLUMNS;

		$c->addJoin(AtsoliciPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtsoliciPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtsoliciPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtsoliciPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = AtestadosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtestados(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtsolici($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAtsolicis();
				$obj2->addAtsolici($obj1);
			}


					
			$omClass = AtmunicipiosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtmunicipios(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtsolici($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAtsolicis();
				$obj3->addAtsolici($obj1);
			}


					
			$omClass = AtparroquiasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtparroquias(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtsolici($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initAtsolicis();
				$obj4->addAtsolici($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptAtestados(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtsoliciPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtsoliciPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = AtsoliciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtmunicipios(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtsoliciPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtsoliciPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = AtsoliciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtparroquias(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtsoliciPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtsoliciPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$rs = AtsoliciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptAtestados(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtsoliciPeer::addSelectColumns($c);
		$startcol2 = (AtsoliciPeer::NUM_COLUMNS - AtsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtmunicipiosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtparroquiasPeer::NUM_COLUMNS;

		$c->addJoin(AtsoliciPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtsoliciPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtmunicipiosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtmunicipios(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtsolicis();
				$obj2->addAtsolici($obj1);
			}

			$omClass = AtparroquiasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtparroquias(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtsolicis();
				$obj3->addAtsolici($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtmunicipios(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtsoliciPeer::addSelectColumns($c);
		$startcol2 = (AtsoliciPeer::NUM_COLUMNS - AtsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtparroquiasPeer::NUM_COLUMNS;

		$c->addJoin(AtsoliciPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtsoliciPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtestadosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtestados(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtsolicis();
				$obj2->addAtsolici($obj1);
			}

			$omClass = AtparroquiasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtparroquias(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtsolicis();
				$obj3->addAtsolici($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtparroquias(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtsoliciPeer::addSelectColumns($c);
		$startcol2 = (AtsoliciPeer::NUM_COLUMNS - AtsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtmunicipiosPeer::NUM_COLUMNS;

		$c->addJoin(AtsoliciPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtsoliciPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtestadosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtestados(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtsolicis();
				$obj2->addAtsolici($obj1);
			}

			$omClass = AtmunicipiosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtmunicipios(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtsolicis();
				$obj3->addAtsolici($obj1);
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
		return AtsoliciPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtsoliciPeer::ID); 

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
			$comparison = $criteria->getComparison(AtsoliciPeer::ID);
			$selectCriteria->add(AtsoliciPeer::ID, $criteria->remove(AtsoliciPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtsoliciPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtsoliciPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atsolici) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtsoliciPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atsolici $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtsoliciPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtsoliciPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtsoliciPeer::DATABASE_NAME, AtsoliciPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtsoliciPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtsoliciPeer::DATABASE_NAME);

		$criteria->add(AtsoliciPeer::ID, $pk);


		$v = AtsoliciPeer::doSelect($criteria, $con);

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
			$criteria->add(AtsoliciPeer::ID, $pks, Criteria::IN);
			$objs = AtsoliciPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtsoliciPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AtsoliciMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AtsoliciMapBuilder');
}
