<?php


abstract class BaseAtciudadanoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atciudadano';

	
	const CLASS_DEFAULT = 'lib.model.Atciudadano';

	
	const NUM_COLUMNS = 39;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDCIU = 'atciudadano.CEDCIU';

	
	const NOMCIU = 'atciudadano.NOMCIU';

	
	const APECIU = 'atciudadano.APECIU';

	
	const NACCIU = 'atciudadano.NACCIU';

	
	const PAIS = 'atciudadano.PAIS';

	
	const CONEXT = 'atciudadano.CONEXT';

	
	const LUGNAC = 'atciudadano.LUGNAC';

	
	const TIPO = 'atciudadano.TIPO';

	
	const SEXO = 'atciudadano.SEXO';

	
	const FECNAC = 'atciudadano.FECNAC';

	
	const DIRNAC = 'atciudadano.DIRNAC';

	
	const ESTCIV = 'atciudadano.ESTCIV';

	
	const TELHAB = 'atciudadano.TELHAB';

	
	const TELADIHAB = 'atciudadano.TELADIHAB';

	
	const PROCIU = 'atciudadano.PROCIU';

	
	const ATESTADOS_ID = 'atciudadano.ATESTADOS_ID';

	
	const ATMUNICIPIOS_ID = 'atciudadano.ATMUNICIPIOS_ID';

	
	const ATPARROQUIAS_ID = 'atciudadano.ATPARROQUIAS_ID';

	
	const CIUDAD = 'atciudadano.CIUDAD';

	
	const CASERIO = 'atciudadano.CASERIO';

	
	const DIRHAB = 'atciudadano.DIRHAB';

	
	const DIRTRA = 'atciudadano.DIRTRA';

	
	const CONCOMCIU = 'atciudadano.CONCOMCIU';

	
	const CARCONCOMCIU = 'atciudadano.CARCONCOMCIU';

	
	const NOTA = 'atciudadano.NOTA';

	
	const GRAINS = 'atciudadano.GRAINS';

	
	const TRACIU = 'atciudadano.TRACIU';

	
	const NOMEMP = 'atciudadano.NOMEMP';

	
	const DIREMP = 'atciudadano.DIREMP';

	
	const TELEMP = 'atciudadano.TELEMP';

	
	const ATTIPING_ID = 'atciudadano.ATTIPING_ID';

	
	const MONING = 'atciudadano.MONING';

	
	const ATINSREFIER_ID = 'atciudadano.ATINSREFIER_ID';

	
	const AYUSOLANT = 'atciudadano.AYUSOLANT';

	
	const INSAYUANT = 'atciudadano.INSAYUANT';

	
	const SEGPRI = 'atciudadano.SEGPRI';

	
	const ATTIPPROVIV_ID = 'atciudadano.ATTIPPROVIV_ID';

	
	const ATTIPVIV_ID = 'atciudadano.ATTIPVIV_ID';

	
	const ID = 'atciudadano.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedciu', 'Nomciu', 'Apeciu', 'Nacciu', 'Pais', 'Conext', 'Lugnac', 'Tipo', 'Sexo', 'Fecnac', 'Dirnac', 'Estciv', 'Telhab', 'Teladihab', 'Prociu', 'AtestadosId', 'AtmunicipiosId', 'AtparroquiasId', 'Ciudad', 'Caserio', 'Dirhab', 'Dirtra', 'Concomciu', 'Carconcomciu', 'Nota', 'Grains', 'Traciu', 'Nomemp', 'Diremp', 'Telemp', 'AttipingId', 'Moning', 'AtinsrefierId', 'Ayusolant', 'Insayuant', 'Segpri', 'AttipprovivId', 'AttipvivId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtciudadanoPeer::CEDCIU, AtciudadanoPeer::NOMCIU, AtciudadanoPeer::APECIU, AtciudadanoPeer::NACCIU, AtciudadanoPeer::PAIS, AtciudadanoPeer::CONEXT, AtciudadanoPeer::LUGNAC, AtciudadanoPeer::TIPO, AtciudadanoPeer::SEXO, AtciudadanoPeer::FECNAC, AtciudadanoPeer::DIRNAC, AtciudadanoPeer::ESTCIV, AtciudadanoPeer::TELHAB, AtciudadanoPeer::TELADIHAB, AtciudadanoPeer::PROCIU, AtciudadanoPeer::ATESTADOS_ID, AtciudadanoPeer::ATMUNICIPIOS_ID, AtciudadanoPeer::ATPARROQUIAS_ID, AtciudadanoPeer::CIUDAD, AtciudadanoPeer::CASERIO, AtciudadanoPeer::DIRHAB, AtciudadanoPeer::DIRTRA, AtciudadanoPeer::CONCOMCIU, AtciudadanoPeer::CARCONCOMCIU, AtciudadanoPeer::NOTA, AtciudadanoPeer::GRAINS, AtciudadanoPeer::TRACIU, AtciudadanoPeer::NOMEMP, AtciudadanoPeer::DIREMP, AtciudadanoPeer::TELEMP, AtciudadanoPeer::ATTIPING_ID, AtciudadanoPeer::MONING, AtciudadanoPeer::ATINSREFIER_ID, AtciudadanoPeer::AYUSOLANT, AtciudadanoPeer::INSAYUANT, AtciudadanoPeer::SEGPRI, AtciudadanoPeer::ATTIPPROVIV_ID, AtciudadanoPeer::ATTIPVIV_ID, AtciudadanoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedciu', 'nomciu', 'apeciu', 'nacciu', 'pais', 'conext', 'lugnac', 'tipo', 'sexo', 'fecnac', 'dirnac', 'estciv', 'telhab', 'teladihab', 'prociu', 'atestados_id', 'atmunicipios_id', 'atparroquias_id', 'ciudad', 'caserio', 'dirhab', 'dirtra', 'concomciu', 'carconcomciu', 'nota', 'grains', 'traciu', 'nomemp', 'diremp', 'telemp', 'attiping_id', 'moning', 'atinsrefier_id', 'ayusolant', 'insayuant', 'segpri', 'attipproviv_id', 'attipviv_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedciu' => 0, 'Nomciu' => 1, 'Apeciu' => 2, 'Nacciu' => 3, 'Pais' => 4, 'Conext' => 5, 'Lugnac' => 6, 'Tipo' => 7, 'Sexo' => 8, 'Fecnac' => 9, 'Dirnac' => 10, 'Estciv' => 11, 'Telhab' => 12, 'Teladihab' => 13, 'Prociu' => 14, 'AtestadosId' => 15, 'AtmunicipiosId' => 16, 'AtparroquiasId' => 17, 'Ciudad' => 18, 'Caserio' => 19, 'Dirhab' => 20, 'Dirtra' => 21, 'Concomciu' => 22, 'Carconcomciu' => 23, 'Nota' => 24, 'Grains' => 25, 'Traciu' => 26, 'Nomemp' => 27, 'Diremp' => 28, 'Telemp' => 29, 'AttipingId' => 30, 'Moning' => 31, 'AtinsrefierId' => 32, 'Ayusolant' => 33, 'Insayuant' => 34, 'Segpri' => 35, 'AttipprovivId' => 36, 'AttipvivId' => 37, 'Id' => 38, ),
		BasePeer::TYPE_COLNAME => array (AtciudadanoPeer::CEDCIU => 0, AtciudadanoPeer::NOMCIU => 1, AtciudadanoPeer::APECIU => 2, AtciudadanoPeer::NACCIU => 3, AtciudadanoPeer::PAIS => 4, AtciudadanoPeer::CONEXT => 5, AtciudadanoPeer::LUGNAC => 6, AtciudadanoPeer::TIPO => 7, AtciudadanoPeer::SEXO => 8, AtciudadanoPeer::FECNAC => 9, AtciudadanoPeer::DIRNAC => 10, AtciudadanoPeer::ESTCIV => 11, AtciudadanoPeer::TELHAB => 12, AtciudadanoPeer::TELADIHAB => 13, AtciudadanoPeer::PROCIU => 14, AtciudadanoPeer::ATESTADOS_ID => 15, AtciudadanoPeer::ATMUNICIPIOS_ID => 16, AtciudadanoPeer::ATPARROQUIAS_ID => 17, AtciudadanoPeer::CIUDAD => 18, AtciudadanoPeer::CASERIO => 19, AtciudadanoPeer::DIRHAB => 20, AtciudadanoPeer::DIRTRA => 21, AtciudadanoPeer::CONCOMCIU => 22, AtciudadanoPeer::CARCONCOMCIU => 23, AtciudadanoPeer::NOTA => 24, AtciudadanoPeer::GRAINS => 25, AtciudadanoPeer::TRACIU => 26, AtciudadanoPeer::NOMEMP => 27, AtciudadanoPeer::DIREMP => 28, AtciudadanoPeer::TELEMP => 29, AtciudadanoPeer::ATTIPING_ID => 30, AtciudadanoPeer::MONING => 31, AtciudadanoPeer::ATINSREFIER_ID => 32, AtciudadanoPeer::AYUSOLANT => 33, AtciudadanoPeer::INSAYUANT => 34, AtciudadanoPeer::SEGPRI => 35, AtciudadanoPeer::ATTIPPROVIV_ID => 36, AtciudadanoPeer::ATTIPVIV_ID => 37, AtciudadanoPeer::ID => 38, ),
		BasePeer::TYPE_FIELDNAME => array ('cedciu' => 0, 'nomciu' => 1, 'apeciu' => 2, 'nacciu' => 3, 'pais' => 4, 'conext' => 5, 'lugnac' => 6, 'tipo' => 7, 'sexo' => 8, 'fecnac' => 9, 'dirnac' => 10, 'estciv' => 11, 'telhab' => 12, 'teladihab' => 13, 'prociu' => 14, 'atestados_id' => 15, 'atmunicipios_id' => 16, 'atparroquias_id' => 17, 'ciudad' => 18, 'caserio' => 19, 'dirhab' => 20, 'dirtra' => 21, 'concomciu' => 22, 'carconcomciu' => 23, 'nota' => 24, 'grains' => 25, 'traciu' => 26, 'nomemp' => 27, 'diremp' => 28, 'telemp' => 29, 'attiping_id' => 30, 'moning' => 31, 'atinsrefier_id' => 32, 'ayusolant' => 33, 'insayuant' => 34, 'segpri' => 35, 'attipproviv_id' => 36, 'attipviv_id' => 37, 'id' => 38, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AtciudadanoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AtciudadanoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtciudadanoPeer::getTableMap();
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
		return str_replace(AtciudadanoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtciudadanoPeer::CEDCIU);

		$criteria->addSelectColumn(AtciudadanoPeer::NOMCIU);

		$criteria->addSelectColumn(AtciudadanoPeer::APECIU);

		$criteria->addSelectColumn(AtciudadanoPeer::NACCIU);

		$criteria->addSelectColumn(AtciudadanoPeer::PAIS);

		$criteria->addSelectColumn(AtciudadanoPeer::CONEXT);

		$criteria->addSelectColumn(AtciudadanoPeer::LUGNAC);

		$criteria->addSelectColumn(AtciudadanoPeer::TIPO);

		$criteria->addSelectColumn(AtciudadanoPeer::SEXO);

		$criteria->addSelectColumn(AtciudadanoPeer::FECNAC);

		$criteria->addSelectColumn(AtciudadanoPeer::DIRNAC);

		$criteria->addSelectColumn(AtciudadanoPeer::ESTCIV);

		$criteria->addSelectColumn(AtciudadanoPeer::TELHAB);

		$criteria->addSelectColumn(AtciudadanoPeer::TELADIHAB);

		$criteria->addSelectColumn(AtciudadanoPeer::PROCIU);

		$criteria->addSelectColumn(AtciudadanoPeer::ATESTADOS_ID);

		$criteria->addSelectColumn(AtciudadanoPeer::ATMUNICIPIOS_ID);

		$criteria->addSelectColumn(AtciudadanoPeer::ATPARROQUIAS_ID);

		$criteria->addSelectColumn(AtciudadanoPeer::CIUDAD);

		$criteria->addSelectColumn(AtciudadanoPeer::CASERIO);

		$criteria->addSelectColumn(AtciudadanoPeer::DIRHAB);

		$criteria->addSelectColumn(AtciudadanoPeer::DIRTRA);

		$criteria->addSelectColumn(AtciudadanoPeer::CONCOMCIU);

		$criteria->addSelectColumn(AtciudadanoPeer::CARCONCOMCIU);

		$criteria->addSelectColumn(AtciudadanoPeer::NOTA);

		$criteria->addSelectColumn(AtciudadanoPeer::GRAINS);

		$criteria->addSelectColumn(AtciudadanoPeer::TRACIU);

		$criteria->addSelectColumn(AtciudadanoPeer::NOMEMP);

		$criteria->addSelectColumn(AtciudadanoPeer::DIREMP);

		$criteria->addSelectColumn(AtciudadanoPeer::TELEMP);

		$criteria->addSelectColumn(AtciudadanoPeer::ATTIPING_ID);

		$criteria->addSelectColumn(AtciudadanoPeer::MONING);

		$criteria->addSelectColumn(AtciudadanoPeer::ATINSREFIER_ID);

		$criteria->addSelectColumn(AtciudadanoPeer::AYUSOLANT);

		$criteria->addSelectColumn(AtciudadanoPeer::INSAYUANT);

		$criteria->addSelectColumn(AtciudadanoPeer::SEGPRI);

		$criteria->addSelectColumn(AtciudadanoPeer::ATTIPPROVIV_ID);

		$criteria->addSelectColumn(AtciudadanoPeer::ATTIPVIV_ID);

		$criteria->addSelectColumn(AtciudadanoPeer::ID);

	}

	const COUNT = 'COUNT(atciudadano.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atciudadano.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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
		$objects = AtciudadanoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtciudadanoPeer::populateObjects(AtciudadanoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtciudadanoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtciudadanoPeer::getOMClass();
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
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAttiping(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtinsrefier(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtestadosPeer::addSelectColumns($c);

		$c->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
										$temp_obj2->addAtciudadano($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1); 			}
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtmunicipiosPeer::addSelectColumns($c);

		$c->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
										$temp_obj2->addAtciudadano($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1); 			}
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtparroquiasPeer::addSelectColumns($c);

		$c->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
										$temp_obj2->addAtciudadano($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAttiping(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtciudadanoPeer::addSelectColumns($c);
		$startcol = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AttipingPeer::addSelectColumns($c);

		$c->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AttipingPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAttiping(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtciudadano($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtinsrefier(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtciudadanoPeer::addSelectColumns($c);
		$startcol = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtinsrefierPeer::addSelectColumns($c);

		$c->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtinsrefierPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtinsrefier(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtciudadano($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1); 			}
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AttipprovivPeer::addSelectColumns($c);

		$c->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
										$temp_obj2->addAtciudadano($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1); 			}
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AttipvivPeer::addSelectColumns($c);

		$c->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
										$temp_obj2->addAtciudadano($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol2 = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtmunicipiosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtparroquiasPeer::NUM_COLUMNS;

		AttipingPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipingPeer::NUM_COLUMNS;

		AtinsrefierPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtinsrefierPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttipprovivPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AttipvivPeer::NUM_COLUMNS;

		$c->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();


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
					$temp_obj2->addAtciudadano($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1);
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
					$temp_obj3->addAtciudadano($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAtciudadanos();
				$obj3->addAtciudadano($obj1);
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
					$temp_obj4->addAtciudadano($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initAtciudadanos();
				$obj4->addAtciudadano($obj1);
			}


					
			$omClass = AttipingPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttiping(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtciudadano($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initAtciudadanos();
				$obj5->addAtciudadano($obj1);
			}


					
			$omClass = AtinsrefierPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtinsrefier(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtciudadano($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initAtciudadanos();
				$obj6->addAtciudadano($obj1);
			}


					
			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttipproviv(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtciudadano($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initAtciudadanos();
				$obj7->addAtciudadano($obj1);
			}


					
			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAttipviv(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtciudadano($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initAtciudadanos();
				$obj8->addAtciudadano($obj1);
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
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAttiping(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtinsrefier(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtciudadanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$criteria->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$rs = AtciudadanoPeer::doSelectRS($criteria, $con);
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol2 = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtmunicipiosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtparroquiasPeer::NUM_COLUMNS;

		AttipingPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AttipingPeer::NUM_COLUMNS;

		AtinsrefierPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AtinsrefierPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AttipprovivPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttipvivPeer::NUM_COLUMNS;

		$c->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
					$temp_obj2->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1);
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
					$temp_obj3->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtciudadanos();
				$obj3->addAtciudadano($obj1);
			}

			$omClass = AttipingPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAttiping(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtciudadanos();
				$obj4->addAtciudadano($obj1);
			}

			$omClass = AtinsrefierPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAtinsrefier(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtciudadanos();
				$obj5->addAtciudadano($obj1);
			}

			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAttipproviv(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtciudadanos();
				$obj6->addAtciudadano($obj1);
			}

			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttipviv(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtciudadanos();
				$obj7->addAtciudadano($obj1);
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol2 = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtparroquiasPeer::NUM_COLUMNS;

		AttipingPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AttipingPeer::NUM_COLUMNS;

		AtinsrefierPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AtinsrefierPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AttipprovivPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttipvivPeer::NUM_COLUMNS;

		$c->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
					$temp_obj2->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1);
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
					$temp_obj3->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtciudadanos();
				$obj3->addAtciudadano($obj1);
			}

			$omClass = AttipingPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAttiping(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtciudadanos();
				$obj4->addAtciudadano($obj1);
			}

			$omClass = AtinsrefierPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAtinsrefier(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtciudadanos();
				$obj5->addAtciudadano($obj1);
			}

			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAttipproviv(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtciudadanos();
				$obj6->addAtciudadano($obj1);
			}

			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttipviv(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtciudadanos();
				$obj7->addAtciudadano($obj1);
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol2 = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtmunicipiosPeer::NUM_COLUMNS;

		AttipingPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AttipingPeer::NUM_COLUMNS;

		AtinsrefierPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AtinsrefierPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AttipprovivPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttipvivPeer::NUM_COLUMNS;

		$c->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
					$temp_obj2->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1);
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
					$temp_obj3->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtciudadanos();
				$obj3->addAtciudadano($obj1);
			}

			$omClass = AttipingPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAttiping(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtciudadanos();
				$obj4->addAtciudadano($obj1);
			}

			$omClass = AtinsrefierPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAtinsrefier(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtciudadanos();
				$obj5->addAtciudadano($obj1);
			}

			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAttipproviv(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtciudadanos();
				$obj6->addAtciudadano($obj1);
			}

			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttipviv(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtciudadanos();
				$obj7->addAtciudadano($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAttiping(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtciudadanoPeer::addSelectColumns($c);
		$startcol2 = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtmunicipiosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtparroquiasPeer::NUM_COLUMNS;

		AtinsrefierPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AtinsrefierPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AttipprovivPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttipvivPeer::NUM_COLUMNS;

		$c->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
					$temp_obj2->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1);
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
					$temp_obj3->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtciudadanos();
				$obj3->addAtciudadano($obj1);
			}

			$omClass = AtparroquiasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtparroquias(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtciudadanos();
				$obj4->addAtciudadano($obj1);
			}

			$omClass = AtinsrefierPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAtinsrefier(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtciudadanos();
				$obj5->addAtciudadano($obj1);
			}

			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAttipproviv(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtciudadanos();
				$obj6->addAtciudadano($obj1);
			}

			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttipviv(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtciudadanos();
				$obj7->addAtciudadano($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtinsrefier(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtciudadanoPeer::addSelectColumns($c);
		$startcol2 = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtmunicipiosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtparroquiasPeer::NUM_COLUMNS;

		AttipingPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipingPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AttipprovivPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttipvivPeer::NUM_COLUMNS;

		$c->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
					$temp_obj2->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1);
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
					$temp_obj3->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtciudadanos();
				$obj3->addAtciudadano($obj1);
			}

			$omClass = AtparroquiasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtparroquias(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtciudadanos();
				$obj4->addAtciudadano($obj1);
			}

			$omClass = AttipingPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttiping(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtciudadanos();
				$obj5->addAtciudadano($obj1);
			}

			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAttipproviv(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtciudadanos();
				$obj6->addAtciudadano($obj1);
			}

			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttipviv(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtciudadanos();
				$obj7->addAtciudadano($obj1);
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol2 = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtmunicipiosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtparroquiasPeer::NUM_COLUMNS;

		AttipingPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipingPeer::NUM_COLUMNS;

		AtinsrefierPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtinsrefierPeer::NUM_COLUMNS;

		AttipvivPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttipvivPeer::NUM_COLUMNS;

		$c->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPVIV_ID, AttipvivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
					$temp_obj2->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1);
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
					$temp_obj3->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtciudadanos();
				$obj3->addAtciudadano($obj1);
			}

			$omClass = AtparroquiasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtparroquias(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtciudadanos();
				$obj4->addAtciudadano($obj1);
			}

			$omClass = AttipingPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttiping(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtciudadanos();
				$obj5->addAtciudadano($obj1);
			}

			$omClass = AtinsrefierPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtinsrefier(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtciudadanos();
				$obj6->addAtciudadano($obj1);
			}

			$omClass = AttipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttipviv(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtciudadanos();
				$obj7->addAtciudadano($obj1);
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

		AtciudadanoPeer::addSelectColumns($c);
		$startcol2 = (AtciudadanoPeer::NUM_COLUMNS - AtciudadanoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtestadosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtestadosPeer::NUM_COLUMNS;

		AtmunicipiosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtmunicipiosPeer::NUM_COLUMNS;

		AtparroquiasPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtparroquiasPeer::NUM_COLUMNS;

		AttipingPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipingPeer::NUM_COLUMNS;

		AtinsrefierPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtinsrefierPeer::NUM_COLUMNS;

		AttipprovivPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttipprovivPeer::NUM_COLUMNS;

		$c->addJoin(AtciudadanoPeer::ATESTADOS_ID, AtestadosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATMUNICIPIOS_ID, AtmunicipiosPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATPARROQUIAS_ID, AtparroquiasPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPING_ID, AttipingPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$c->addJoin(AtciudadanoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtciudadanoPeer::getOMClass();

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
					$temp_obj2->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtciudadanos();
				$obj2->addAtciudadano($obj1);
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
					$temp_obj3->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtciudadanos();
				$obj3->addAtciudadano($obj1);
			}

			$omClass = AtparroquiasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtparroquias(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtciudadanos();
				$obj4->addAtciudadano($obj1);
			}

			$omClass = AttipingPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttiping(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtciudadanos();
				$obj5->addAtciudadano($obj1);
			}

			$omClass = AtinsrefierPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtinsrefier(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtciudadanos();
				$obj6->addAtciudadano($obj1);
			}

			$omClass = AttipprovivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttipproviv(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtciudadano($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtciudadanos();
				$obj7->addAtciudadano($obj1);
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
		return AtciudadanoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtciudadanoPeer::ID); 

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
			$comparison = $criteria->getComparison(AtciudadanoPeer::ID);
			$selectCriteria->add(AtciudadanoPeer::ID, $criteria->remove(AtciudadanoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtciudadanoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtciudadanoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atciudadano) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtciudadanoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atciudadano $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtciudadanoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtciudadanoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtciudadanoPeer::DATABASE_NAME, AtciudadanoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtciudadanoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtciudadanoPeer::DATABASE_NAME);

		$criteria->add(AtciudadanoPeer::ID, $pk);


		$v = AtciudadanoPeer::doSelect($criteria, $con);

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
			$criteria->add(AtciudadanoPeer::ID, $pks, Criteria::IN);
			$objs = AtciudadanoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtciudadanoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AtciudadanoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AtciudadanoMapBuilder');
}
