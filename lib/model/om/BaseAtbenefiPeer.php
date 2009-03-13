<?php


abstract class BaseAtbenefiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atbenefi';

	
	const CLASS_DEFAULT = 'lib.model.Atbenefi';

	
	const NUM_COLUMNS = 48;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDBEN = 'atbenefi.CEDBEN';

	
	const NOMBEN = 'atbenefi.NOMBEN';

	
	const APEBEN = 'atbenefi.APEBEN';

	
	const FECNAC = 'atbenefi.FECNAC';

	
	const PAIS = 'atbenefi.PAIS';

	
	const CONEXT = 'atbenefi.CONEXT';

	
	const LUGNAC = 'atbenefi.LUGNAC';

	
	const TIPO = 'atbenefi.TIPO';

	
	const SEXO = 'atbenefi.SEXO';

	
	const NACBEN = 'atbenefi.NACBEN';

	
	const DIRNAC = 'atbenefi.DIRNAC';

	
	const ESTCIV = 'atbenefi.ESTCIV';

	
	const TELHAB = 'atbenefi.TELHAB';

	
	const TELADIHAB = 'atbenefi.TELADIHAB';

	
	const PROBEN = 'atbenefi.PROBEN';

	
	const ATESTADOS_ID = 'atbenefi.ATESTADOS_ID';

	
	const ATMUNICIPIOS_ID = 'atbenefi.ATMUNICIPIOS_ID';

	
	const ATPARROQUIAS_ID = 'atbenefi.ATPARROQUIAS_ID';

	
	const CIUDAD = 'atbenefi.CIUDAD';

	
	const CASERIO = 'atbenefi.CASERIO';

	
	const DIRHAB = 'atbenefi.DIRHAB';

	
	const DIRTRA = 'atbenefi.DIRTRA';

	
	const CONCOMBEN = 'atbenefi.CONCOMBEN';

	
	const CARCONCOMBEN = 'atbenefi.CARCONCOMBEN';

	
	const NOTA = 'atbenefi.NOTA';

	
	const GRAINS = 'atbenefi.GRAINS';

	
	const TRABEN = 'atbenefi.TRABEN';

	
	const NOMEMP = 'atbenefi.NOMEMP';

	
	const DIREMP = 'atbenefi.DIREMP';

	
	const TELEMP = 'atbenefi.TELEMP';

	
	const TIPING = 'atbenefi.TIPING';

	
	const MONING = 'atbenefi.MONING';

	
	const TIPVIV = 'atbenefi.TIPVIV';

	
	const TENVIV = 'atbenefi.TENVIV';

	
	const CARVIVSAL = 'atbenefi.CARVIVSAL';

	
	const CARVIVCOM = 'atbenefi.CARVIVCOM';

	
	const CARVIVHAB = 'atbenefi.CARVIVHAB';

	
	const CARVIVCOC = 'atbenefi.CARVIVCOC';

	
	const CARVIVBAN = 'atbenefi.CARVIVBAN';

	
	const CARVIVPAT = 'atbenefi.CARVIVPAT';

	
	const CARVIVAREVER = 'atbenefi.CARVIVAREVER';

	
	const CARVIVPIS = 'atbenefi.CARVIVPIS';

	
	const CARVIVPAR = 'atbenefi.CARVIVPAR';

	
	const CARVIVTEC = 'atbenefi.CARVIVTEC';

	
	const ANASOCECO = 'atbenefi.ANASOCECO';

	
	const ANAFAM = 'atbenefi.ANAFAM';

	
	const OTROS = 'atbenefi.OTROS';

	
	const ID = 'atbenefi.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedben', 'Nomben', 'Apeben', 'Fecnac', 'Pais', 'Conext', 'Lugnac', 'Tipo', 'Sexo', 'Nacben', 'Dirnac', 'Estciv', 'Telhab', 'Teladihab', 'Proben', 'AtestadosId', 'AtmunicipiosId', 'AtparroquiasId', 'Ciudad', 'Caserio', 'Dirhab', 'Dirtra', 'Concomben', 'Carconcomben', 'Nota', 'Grains', 'Traben', 'Nomemp', 'Diremp', 'Telemp', 'Tiping', 'Moning', 'Tipviv', 'Tenviv', 'Carvivsal', 'Carvivcom', 'Carvivhab', 'Carvivcoc', 'Carvivban', 'Carvivpat', 'Carvivarever', 'Carvivpis', 'Carvivpar', 'Carvivtec', 'Anasoceco', 'Anafam', 'Otros', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtbenefiPeer::CEDBEN, AtbenefiPeer::NOMBEN, AtbenefiPeer::APEBEN, AtbenefiPeer::FECNAC, AtbenefiPeer::PAIS, AtbenefiPeer::CONEXT, AtbenefiPeer::LUGNAC, AtbenefiPeer::TIPO, AtbenefiPeer::SEXO, AtbenefiPeer::NACBEN, AtbenefiPeer::DIRNAC, AtbenefiPeer::ESTCIV, AtbenefiPeer::TELHAB, AtbenefiPeer::TELADIHAB, AtbenefiPeer::PROBEN, AtbenefiPeer::ATESTADOS_ID, AtbenefiPeer::ATMUNICIPIOS_ID, AtbenefiPeer::ATPARROQUIAS_ID, AtbenefiPeer::CIUDAD, AtbenefiPeer::CASERIO, AtbenefiPeer::DIRHAB, AtbenefiPeer::DIRTRA, AtbenefiPeer::CONCOMBEN, AtbenefiPeer::CARCONCOMBEN, AtbenefiPeer::NOTA, AtbenefiPeer::GRAINS, AtbenefiPeer::TRABEN, AtbenefiPeer::NOMEMP, AtbenefiPeer::DIREMP, AtbenefiPeer::TELEMP, AtbenefiPeer::TIPING, AtbenefiPeer::MONING, AtbenefiPeer::TIPVIV, AtbenefiPeer::TENVIV, AtbenefiPeer::CARVIVSAL, AtbenefiPeer::CARVIVCOM, AtbenefiPeer::CARVIVHAB, AtbenefiPeer::CARVIVCOC, AtbenefiPeer::CARVIVBAN, AtbenefiPeer::CARVIVPAT, AtbenefiPeer::CARVIVAREVER, AtbenefiPeer::CARVIVPIS, AtbenefiPeer::CARVIVPAR, AtbenefiPeer::CARVIVTEC, AtbenefiPeer::ANASOCECO, AtbenefiPeer::ANAFAM, AtbenefiPeer::OTROS, AtbenefiPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedben', 'nomben', 'apeben', 'fecnac', 'pais', 'conext', 'lugnac', 'tipo', 'sexo', 'nacben', 'dirnac', 'estciv', 'telhab', 'teladihab', 'proben', 'atestados_id', 'atmunicipios_id', 'atparroquias_id', 'ciudad', 'caserio', 'dirhab', 'dirtra', 'concomben', 'carconcomben', 'nota', 'grains', 'traben', 'nomemp', 'diremp', 'telemp', 'tiping', 'moning', 'tipviv', 'tenviv', 'carvivsal', 'carvivcom', 'carvivhab', 'carvivcoc', 'carvivban', 'carvivpat', 'carvivarever', 'carvivpis', 'carvivpar', 'carvivtec', 'anasoceco', 'anafam', 'otros', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedben' => 0, 'Nomben' => 1, 'Apeben' => 2, 'Fecnac' => 3, 'Pais' => 4, 'Conext' => 5, 'Lugnac' => 6, 'Tipo' => 7, 'Sexo' => 8, 'Nacben' => 9, 'Dirnac' => 10, 'Estciv' => 11, 'Telhab' => 12, 'Teladihab' => 13, 'Proben' => 14, 'AtestadosId' => 15, 'AtmunicipiosId' => 16, 'AtparroquiasId' => 17, 'Ciudad' => 18, 'Caserio' => 19, 'Dirhab' => 20, 'Dirtra' => 21, 'Concomben' => 22, 'Carconcomben' => 23, 'Nota' => 24, 'Grains' => 25, 'Traben' => 26, 'Nomemp' => 27, 'Diremp' => 28, 'Telemp' => 29, 'Tiping' => 30, 'Moning' => 31, 'Tipviv' => 32, 'Tenviv' => 33, 'Carvivsal' => 34, 'Carvivcom' => 35, 'Carvivhab' => 36, 'Carvivcoc' => 37, 'Carvivban' => 38, 'Carvivpat' => 39, 'Carvivarever' => 40, 'Carvivpis' => 41, 'Carvivpar' => 42, 'Carvivtec' => 43, 'Anasoceco' => 44, 'Anafam' => 45, 'Otros' => 46, 'Id' => 47, ),
		BasePeer::TYPE_COLNAME => array (AtbenefiPeer::CEDBEN => 0, AtbenefiPeer::NOMBEN => 1, AtbenefiPeer::APEBEN => 2, AtbenefiPeer::FECNAC => 3, AtbenefiPeer::PAIS => 4, AtbenefiPeer::CONEXT => 5, AtbenefiPeer::LUGNAC => 6, AtbenefiPeer::TIPO => 7, AtbenefiPeer::SEXO => 8, AtbenefiPeer::NACBEN => 9, AtbenefiPeer::DIRNAC => 10, AtbenefiPeer::ESTCIV => 11, AtbenefiPeer::TELHAB => 12, AtbenefiPeer::TELADIHAB => 13, AtbenefiPeer::PROBEN => 14, AtbenefiPeer::ATESTADOS_ID => 15, AtbenefiPeer::ATMUNICIPIOS_ID => 16, AtbenefiPeer::ATPARROQUIAS_ID => 17, AtbenefiPeer::CIUDAD => 18, AtbenefiPeer::CASERIO => 19, AtbenefiPeer::DIRHAB => 20, AtbenefiPeer::DIRTRA => 21, AtbenefiPeer::CONCOMBEN => 22, AtbenefiPeer::CARCONCOMBEN => 23, AtbenefiPeer::NOTA => 24, AtbenefiPeer::GRAINS => 25, AtbenefiPeer::TRABEN => 26, AtbenefiPeer::NOMEMP => 27, AtbenefiPeer::DIREMP => 28, AtbenefiPeer::TELEMP => 29, AtbenefiPeer::TIPING => 30, AtbenefiPeer::MONING => 31, AtbenefiPeer::TIPVIV => 32, AtbenefiPeer::TENVIV => 33, AtbenefiPeer::CARVIVSAL => 34, AtbenefiPeer::CARVIVCOM => 35, AtbenefiPeer::CARVIVHAB => 36, AtbenefiPeer::CARVIVCOC => 37, AtbenefiPeer::CARVIVBAN => 38, AtbenefiPeer::CARVIVPAT => 39, AtbenefiPeer::CARVIVAREVER => 40, AtbenefiPeer::CARVIVPIS => 41, AtbenefiPeer::CARVIVPAR => 42, AtbenefiPeer::CARVIVTEC => 43, AtbenefiPeer::ANASOCECO => 44, AtbenefiPeer::ANAFAM => 45, AtbenefiPeer::OTROS => 46, AtbenefiPeer::ID => 47, ),
		BasePeer::TYPE_FIELDNAME => array ('cedben' => 0, 'nomben' => 1, 'apeben' => 2, 'fecnac' => 3, 'pais' => 4, 'conext' => 5, 'lugnac' => 6, 'tipo' => 7, 'sexo' => 8, 'nacben' => 9, 'dirnac' => 10, 'estciv' => 11, 'telhab' => 12, 'teladihab' => 13, 'proben' => 14, 'atestados_id' => 15, 'atmunicipios_id' => 16, 'atparroquias_id' => 17, 'ciudad' => 18, 'caserio' => 19, 'dirhab' => 20, 'dirtra' => 21, 'concomben' => 22, 'carconcomben' => 23, 'nota' => 24, 'grains' => 25, 'traben' => 26, 'nomemp' => 27, 'diremp' => 28, 'telemp' => 29, 'tiping' => 30, 'moning' => 31, 'tipviv' => 32, 'tenviv' => 33, 'carvivsal' => 34, 'carvivcom' => 35, 'carvivhab' => 36, 'carvivcoc' => 37, 'carvivban' => 38, 'carvivpat' => 39, 'carvivarever' => 40, 'carvivpis' => 41, 'carvivpar' => 42, 'carvivtec' => 43, 'anasoceco' => 44, 'anafam' => 45, 'otros' => 46, 'id' => 47, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AtbenefiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AtbenefiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtbenefiPeer::getTableMap();
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
		return str_replace(AtbenefiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtbenefiPeer::CEDBEN);

		$criteria->addSelectColumn(AtbenefiPeer::NOMBEN);

		$criteria->addSelectColumn(AtbenefiPeer::APEBEN);

		$criteria->addSelectColumn(AtbenefiPeer::FECNAC);

		$criteria->addSelectColumn(AtbenefiPeer::PAIS);

		$criteria->addSelectColumn(AtbenefiPeer::CONEXT);

		$criteria->addSelectColumn(AtbenefiPeer::LUGNAC);

		$criteria->addSelectColumn(AtbenefiPeer::TIPO);

		$criteria->addSelectColumn(AtbenefiPeer::SEXO);

		$criteria->addSelectColumn(AtbenefiPeer::NACBEN);

		$criteria->addSelectColumn(AtbenefiPeer::DIRNAC);

		$criteria->addSelectColumn(AtbenefiPeer::ESTCIV);

		$criteria->addSelectColumn(AtbenefiPeer::TELHAB);

		$criteria->addSelectColumn(AtbenefiPeer::TELADIHAB);

		$criteria->addSelectColumn(AtbenefiPeer::PROBEN);

		$criteria->addSelectColumn(AtbenefiPeer::ATESTADOS_ID);

		$criteria->addSelectColumn(AtbenefiPeer::ATMUNICIPIOS_ID);

		$criteria->addSelectColumn(AtbenefiPeer::ATPARROQUIAS_ID);

		$criteria->addSelectColumn(AtbenefiPeer::CIUDAD);

		$criteria->addSelectColumn(AtbenefiPeer::CASERIO);

		$criteria->addSelectColumn(AtbenefiPeer::DIRHAB);

		$criteria->addSelectColumn(AtbenefiPeer::DIRTRA);

		$criteria->addSelectColumn(AtbenefiPeer::CONCOMBEN);

		$criteria->addSelectColumn(AtbenefiPeer::CARCONCOMBEN);

		$criteria->addSelectColumn(AtbenefiPeer::NOTA);

		$criteria->addSelectColumn(AtbenefiPeer::GRAINS);

		$criteria->addSelectColumn(AtbenefiPeer::TRABEN);

		$criteria->addSelectColumn(AtbenefiPeer::NOMEMP);

		$criteria->addSelectColumn(AtbenefiPeer::DIREMP);

		$criteria->addSelectColumn(AtbenefiPeer::TELEMP);

		$criteria->addSelectColumn(AtbenefiPeer::TIPING);

		$criteria->addSelectColumn(AtbenefiPeer::MONING);

		$criteria->addSelectColumn(AtbenefiPeer::TIPVIV);

		$criteria->addSelectColumn(AtbenefiPeer::TENVIV);

		$criteria->addSelectColumn(AtbenefiPeer::CARVIVSAL);

		$criteria->addSelectColumn(AtbenefiPeer::CARVIVCOM);

		$criteria->addSelectColumn(AtbenefiPeer::CARVIVHAB);

		$criteria->addSelectColumn(AtbenefiPeer::CARVIVCOC);

		$criteria->addSelectColumn(AtbenefiPeer::CARVIVBAN);

		$criteria->addSelectColumn(AtbenefiPeer::CARVIVPAT);

		$criteria->addSelectColumn(AtbenefiPeer::CARVIVAREVER);

		$criteria->addSelectColumn(AtbenefiPeer::CARVIVPIS);

		$criteria->addSelectColumn(AtbenefiPeer::CARVIVPAR);

		$criteria->addSelectColumn(AtbenefiPeer::CARVIVTEC);

		$criteria->addSelectColumn(AtbenefiPeer::ANASOCECO);

		$criteria->addSelectColumn(AtbenefiPeer::ANAFAM);

		$criteria->addSelectColumn(AtbenefiPeer::OTROS);

		$criteria->addSelectColumn(AtbenefiPeer::ID);

	}

	const COUNT = 'COUNT(atbenefi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atbenefi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtbenefiPeer::doSelectRS($criteria, $con);
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
		$objects = AtbenefiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtbenefiPeer::populateObjects(AtbenefiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtbenefiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtbenefiPeer::getOMClass();
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
			$criteria->addSelectColumn(AtbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtbenefiPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$rs = AtbenefiPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtbenefiPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$rs = AtbenefiPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtbenefiPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = AtbenefiPeer::doSelectRS($criteria, $con);
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

		AtbenefiPeer::addSelectColumns($c);
		$startcol = (AtbenefiPeer::NUM_COLUMNS - AtbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtestadosPeer::addSelectColumns($c);

		$c->addJoin(AtbenefiPeer::ATESTADOS_ID, AtestadosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtbenefiPeer::getOMClass();

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
										$temp_obj2->addAtbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtbenefis();
				$obj2->addAtbenefi($obj1); 			}
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

		AtbenefiPeer::addSelectColumns($c);
		$startcol = (AtbenefiPeer::NUM_COLUMNS - AtbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtmunicipiosPeer::addSelectColumns($c);

		$c->addJoin(AtbenefiPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtbenefiPeer::getOMClass();

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
										$temp_obj2->addAtbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtbenefis();
				$obj2->addAtbenefi($obj1); 			}
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

		AtbenefiPeer::addSelectColumns($c);
		$startcol = (AtbenefiPeer::NUM_COLUMNS - AtbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtparroquiasPeer::addSelectColumns($c);

		$c->addJoin(AtbenefiPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtbenefiPeer::getOMClass();

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
										$temp_obj2->addAtbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtbenefis();
				$obj2->addAtbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtbenefiPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtbenefiPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtbenefiPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = AtbenefiPeer::doSelectRS($criteria, $con);
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

		AtbenefiPeer::addSelectColumns($c);
		$startcol2 = (AtbenefiPeer::NUM_COLUMNS - AtbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtmunicipiosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtparroquiasPeer::NUM_COLUMNS;

		$c->addJoin(AtbenefiPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtbenefiPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtbenefiPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtbenefiPeer::getOMClass();


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
					$temp_obj2->addAtbenefi($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAtbenefis();
				$obj2->addAtbenefi($obj1);
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
					$temp_obj3->addAtbenefi($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAtbenefis();
				$obj3->addAtbenefi($obj1);
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
					$temp_obj4->addAtbenefi($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initAtbenefis();
				$obj4->addAtbenefi($obj1);
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
			$criteria->addSelectColumn(AtbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtbenefiPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtbenefiPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = AtbenefiPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtbenefiPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtbenefiPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = AtbenefiPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtbenefiPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtbenefiPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$rs = AtbenefiPeer::doSelectRS($criteria, $con);
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

		AtbenefiPeer::addSelectColumns($c);
		$startcol2 = (AtbenefiPeer::NUM_COLUMNS - AtbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtmunicipiosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtparroquiasPeer::NUM_COLUMNS;

		$c->addJoin(AtbenefiPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtbenefiPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtbenefiPeer::getOMClass();

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
					$temp_obj2->addAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtbenefis();
				$obj2->addAtbenefi($obj1);
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
					$temp_obj3->addAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtbenefis();
				$obj3->addAtbenefi($obj1);
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

		AtbenefiPeer::addSelectColumns($c);
		$startcol2 = (AtbenefiPeer::NUM_COLUMNS - AtbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtparroquiasPeer::NUM_COLUMNS;

		$c->addJoin(AtbenefiPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtbenefiPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtbenefiPeer::getOMClass();

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
					$temp_obj2->addAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtbenefis();
				$obj2->addAtbenefi($obj1);
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
					$temp_obj3->addAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtbenefis();
				$obj3->addAtbenefi($obj1);
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

		AtbenefiPeer::addSelectColumns($c);
		$startcol2 = (AtbenefiPeer::NUM_COLUMNS - AtbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtmunicipiosPeer::NUM_COLUMNS;

		$c->addJoin(AtbenefiPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtbenefiPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtbenefiPeer::getOMClass();

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
					$temp_obj2->addAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtbenefis();
				$obj2->addAtbenefi($obj1);
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
					$temp_obj3->addAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtbenefis();
				$obj3->addAtbenefi($obj1);
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
		return AtbenefiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtbenefiPeer::ID); 

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
			$comparison = $criteria->getComparison(AtbenefiPeer::ID);
			$selectCriteria->add(AtbenefiPeer::ID, $criteria->remove(AtbenefiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtbenefiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtbenefiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atbenefi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtbenefiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atbenefi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtbenefiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtbenefiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtbenefiPeer::DATABASE_NAME, AtbenefiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtbenefiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtbenefiPeer::DATABASE_NAME);

		$criteria->add(AtbenefiPeer::ID, $pk);


		$v = AtbenefiPeer::doSelect($criteria, $con);

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
			$criteria->add(AtbenefiPeer::ID, $pks, Criteria::IN);
			$objs = AtbenefiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtbenefiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AtbenefiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AtbenefiMapBuilder');
}
