<?php


abstract class BaseCcdatsoecoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccdatsoeco';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccdatsoeco';

	
	const NUM_COLUMNS = 41;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccdatsoeco.ID';

	
	const ESPTIPVI = 'ccdatsoeco.ESPTIPVI';

	
	const DORMIT = 'ccdatsoeco.DORMIT';

	
	const BANOS = 'ccdatsoeco.BANOS';

	
	const SALA = 'ccdatsoeco.SALA';

	
	const COCINA = 'ccdatsoeco.COCINA';

	
	const LAVADE = 'ccdatsoeco.LAVADE';

	
	const CLOSET = 'ccdatsoeco.CLOSET';

	
	const JARDIN = 'ccdatsoeco.JARDIN';

	
	const ESTACIO = 'ccdatsoeco.ESTACIO';

	
	const EXPLIESTRUC = 'ccdatsoeco.EXPLIESTRUC';

	
	const TECHOS = 'ccdatsoeco.TECHOS';

	
	const PAREDES = 'ccdatsoeco.PAREDES';

	
	const PISO = 'ccdatsoeco.PISO';

	
	const REVEST = 'ccdatsoeco.REVEST';

	
	const CONSER = 'ccdatsoeco.CONSER';

	
	const EDAD = 'ccdatsoeco.EDAD';

	
	const ZONA = 'ccdatsoeco.ZONA';

	
	const DIST = 'ccdatsoeco.DIST';

	
	const ACCESO = 'ccdatsoeco.ACCESO';

	
	const OBSERV = 'ccdatsoeco.OBSERV';

	
	const LINNORTE = 'ccdatsoeco.LINNORTE';

	
	const LINSUR = 'ccdatsoeco.LINSUR';

	
	const LINESTE = 'ccdatsoeco.LINESTE';

	
	const LINOESTE = 'ccdatsoeco.LINOESTE';

	
	const SUPERFI = 'ccdatsoeco.SUPERFI';

	
	const TRASOC = 'ccdatsoeco.TRASOC';

	
	const ANALISIS = 'ccdatsoeco.ANALISIS';

	
	const RECOMEN = 'ccdatsoeco.RECOMEN';

	
	const RESPON = 'ccdatsoeco.RESPON';

	
	const ASIGNA = 'ccdatsoeco.ASIGNA';

	
	const DEDUCC = 'ccdatsoeco.DEDUCC';

	
	const ASIGCON = 'ccdatsoeco.ASIGCON';

	
	const DEDUCON = 'ccdatsoeco.DEDUCON';

	
	const GASFAM = 'ccdatsoeco.GASFAM';

	
	const CAPPAGO = 'ccdatsoeco.CAPPAGO';

	
	const CCORIMATPRI_ID = 'ccdatsoeco.CCORIMATPRI_ID';

	
	const CCACTECO_ID = 'ccdatsoeco.CCACTECO_ID';

	
	const CCESTRUC_ID = 'ccdatsoeco.CCESTRUC_ID';

	
	const CCRIEZONA_ID = 'ccdatsoeco.CCRIEZONA_ID';

	
	const CCSOLICI_ID = 'ccdatsoeco.CCSOLICI_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Esptipvi', 'Dormit', 'Banos', 'Sala', 'Cocina', 'Lavade', 'Closet', 'Jardin', 'Estacio', 'Expliestruc', 'Techos', 'Paredes', 'Piso', 'Revest', 'Conser', 'Edad', 'Zona', 'Dist', 'Acceso', 'Observ', 'Linnorte', 'Linsur', 'Lineste', 'Linoeste', 'Superfi', 'Trasoc', 'Analisis', 'Recomen', 'Respon', 'Asigna', 'Deducc', 'Asigcon', 'Deducon', 'Gasfam', 'Cappago', 'CcorimatpriId', 'CcactecoId', 'CcestrucId', 'CcriezonaId', 'CcsoliciId', ),
		BasePeer::TYPE_COLNAME => array (CcdatsoecoPeer::ID, CcdatsoecoPeer::ESPTIPVI, CcdatsoecoPeer::DORMIT, CcdatsoecoPeer::BANOS, CcdatsoecoPeer::SALA, CcdatsoecoPeer::COCINA, CcdatsoecoPeer::LAVADE, CcdatsoecoPeer::CLOSET, CcdatsoecoPeer::JARDIN, CcdatsoecoPeer::ESTACIO, CcdatsoecoPeer::EXPLIESTRUC, CcdatsoecoPeer::TECHOS, CcdatsoecoPeer::PAREDES, CcdatsoecoPeer::PISO, CcdatsoecoPeer::REVEST, CcdatsoecoPeer::CONSER, CcdatsoecoPeer::EDAD, CcdatsoecoPeer::ZONA, CcdatsoecoPeer::DIST, CcdatsoecoPeer::ACCESO, CcdatsoecoPeer::OBSERV, CcdatsoecoPeer::LINNORTE, CcdatsoecoPeer::LINSUR, CcdatsoecoPeer::LINESTE, CcdatsoecoPeer::LINOESTE, CcdatsoecoPeer::SUPERFI, CcdatsoecoPeer::TRASOC, CcdatsoecoPeer::ANALISIS, CcdatsoecoPeer::RECOMEN, CcdatsoecoPeer::RESPON, CcdatsoecoPeer::ASIGNA, CcdatsoecoPeer::DEDUCC, CcdatsoecoPeer::ASIGCON, CcdatsoecoPeer::DEDUCON, CcdatsoecoPeer::GASFAM, CcdatsoecoPeer::CAPPAGO, CcdatsoecoPeer::CCORIMATPRI_ID, CcdatsoecoPeer::CCACTECO_ID, CcdatsoecoPeer::CCESTRUC_ID, CcdatsoecoPeer::CCRIEZONA_ID, CcdatsoecoPeer::CCSOLICI_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'esptipvi', 'dormit', 'banos', 'sala', 'cocina', 'lavade', 'closet', 'jardin', 'estacio', 'expliestruc', 'techos', 'paredes', 'piso', 'revest', 'conser', 'edad', 'zona', 'dist', 'acceso', 'observ', 'linnorte', 'linsur', 'lineste', 'linoeste', 'superfi', 'trasoc', 'analisis', 'recomen', 'respon', 'asigna', 'deducc', 'asigcon', 'deducon', 'gasfam', 'cappago', 'ccorimatpri_id', 'ccacteco_id', 'ccestruc_id', 'ccriezona_id', 'ccsolici_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Esptipvi' => 1, 'Dormit' => 2, 'Banos' => 3, 'Sala' => 4, 'Cocina' => 5, 'Lavade' => 6, 'Closet' => 7, 'Jardin' => 8, 'Estacio' => 9, 'Expliestruc' => 10, 'Techos' => 11, 'Paredes' => 12, 'Piso' => 13, 'Revest' => 14, 'Conser' => 15, 'Edad' => 16, 'Zona' => 17, 'Dist' => 18, 'Acceso' => 19, 'Observ' => 20, 'Linnorte' => 21, 'Linsur' => 22, 'Lineste' => 23, 'Linoeste' => 24, 'Superfi' => 25, 'Trasoc' => 26, 'Analisis' => 27, 'Recomen' => 28, 'Respon' => 29, 'Asigna' => 30, 'Deducc' => 31, 'Asigcon' => 32, 'Deducon' => 33, 'Gasfam' => 34, 'Cappago' => 35, 'CcorimatpriId' => 36, 'CcactecoId' => 37, 'CcestrucId' => 38, 'CcriezonaId' => 39, 'CcsoliciId' => 40, ),
		BasePeer::TYPE_COLNAME => array (CcdatsoecoPeer::ID => 0, CcdatsoecoPeer::ESPTIPVI => 1, CcdatsoecoPeer::DORMIT => 2, CcdatsoecoPeer::BANOS => 3, CcdatsoecoPeer::SALA => 4, CcdatsoecoPeer::COCINA => 5, CcdatsoecoPeer::LAVADE => 6, CcdatsoecoPeer::CLOSET => 7, CcdatsoecoPeer::JARDIN => 8, CcdatsoecoPeer::ESTACIO => 9, CcdatsoecoPeer::EXPLIESTRUC => 10, CcdatsoecoPeer::TECHOS => 11, CcdatsoecoPeer::PAREDES => 12, CcdatsoecoPeer::PISO => 13, CcdatsoecoPeer::REVEST => 14, CcdatsoecoPeer::CONSER => 15, CcdatsoecoPeer::EDAD => 16, CcdatsoecoPeer::ZONA => 17, CcdatsoecoPeer::DIST => 18, CcdatsoecoPeer::ACCESO => 19, CcdatsoecoPeer::OBSERV => 20, CcdatsoecoPeer::LINNORTE => 21, CcdatsoecoPeer::LINSUR => 22, CcdatsoecoPeer::LINESTE => 23, CcdatsoecoPeer::LINOESTE => 24, CcdatsoecoPeer::SUPERFI => 25, CcdatsoecoPeer::TRASOC => 26, CcdatsoecoPeer::ANALISIS => 27, CcdatsoecoPeer::RECOMEN => 28, CcdatsoecoPeer::RESPON => 29, CcdatsoecoPeer::ASIGNA => 30, CcdatsoecoPeer::DEDUCC => 31, CcdatsoecoPeer::ASIGCON => 32, CcdatsoecoPeer::DEDUCON => 33, CcdatsoecoPeer::GASFAM => 34, CcdatsoecoPeer::CAPPAGO => 35, CcdatsoecoPeer::CCORIMATPRI_ID => 36, CcdatsoecoPeer::CCACTECO_ID => 37, CcdatsoecoPeer::CCESTRUC_ID => 38, CcdatsoecoPeer::CCRIEZONA_ID => 39, CcdatsoecoPeer::CCSOLICI_ID => 40, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'esptipvi' => 1, 'dormit' => 2, 'banos' => 3, 'sala' => 4, 'cocina' => 5, 'lavade' => 6, 'closet' => 7, 'jardin' => 8, 'estacio' => 9, 'expliestruc' => 10, 'techos' => 11, 'paredes' => 12, 'piso' => 13, 'revest' => 14, 'conser' => 15, 'edad' => 16, 'zona' => 17, 'dist' => 18, 'acceso' => 19, 'observ' => 20, 'linnorte' => 21, 'linsur' => 22, 'lineste' => 23, 'linoeste' => 24, 'superfi' => 25, 'trasoc' => 26, 'analisis' => 27, 'recomen' => 28, 'respon' => 29, 'asigna' => 30, 'deducc' => 31, 'asigcon' => 32, 'deducon' => 33, 'gasfam' => 34, 'cappago' => 35, 'ccorimatpri_id' => 36, 'ccacteco_id' => 37, 'ccestruc_id' => 38, 'ccriezona_id' => 39, 'ccsolici_id' => 40, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcdatsoecoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcdatsoecoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcdatsoecoPeer::getTableMap();
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
		return str_replace(CcdatsoecoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcdatsoecoPeer::ID);

		$criteria->addSelectColumn(CcdatsoecoPeer::ESPTIPVI);

		$criteria->addSelectColumn(CcdatsoecoPeer::DORMIT);

		$criteria->addSelectColumn(CcdatsoecoPeer::BANOS);

		$criteria->addSelectColumn(CcdatsoecoPeer::SALA);

		$criteria->addSelectColumn(CcdatsoecoPeer::COCINA);

		$criteria->addSelectColumn(CcdatsoecoPeer::LAVADE);

		$criteria->addSelectColumn(CcdatsoecoPeer::CLOSET);

		$criteria->addSelectColumn(CcdatsoecoPeer::JARDIN);

		$criteria->addSelectColumn(CcdatsoecoPeer::ESTACIO);

		$criteria->addSelectColumn(CcdatsoecoPeer::EXPLIESTRUC);

		$criteria->addSelectColumn(CcdatsoecoPeer::TECHOS);

		$criteria->addSelectColumn(CcdatsoecoPeer::PAREDES);

		$criteria->addSelectColumn(CcdatsoecoPeer::PISO);

		$criteria->addSelectColumn(CcdatsoecoPeer::REVEST);

		$criteria->addSelectColumn(CcdatsoecoPeer::CONSER);

		$criteria->addSelectColumn(CcdatsoecoPeer::EDAD);

		$criteria->addSelectColumn(CcdatsoecoPeer::ZONA);

		$criteria->addSelectColumn(CcdatsoecoPeer::DIST);

		$criteria->addSelectColumn(CcdatsoecoPeer::ACCESO);

		$criteria->addSelectColumn(CcdatsoecoPeer::OBSERV);

		$criteria->addSelectColumn(CcdatsoecoPeer::LINNORTE);

		$criteria->addSelectColumn(CcdatsoecoPeer::LINSUR);

		$criteria->addSelectColumn(CcdatsoecoPeer::LINESTE);

		$criteria->addSelectColumn(CcdatsoecoPeer::LINOESTE);

		$criteria->addSelectColumn(CcdatsoecoPeer::SUPERFI);

		$criteria->addSelectColumn(CcdatsoecoPeer::TRASOC);

		$criteria->addSelectColumn(CcdatsoecoPeer::ANALISIS);

		$criteria->addSelectColumn(CcdatsoecoPeer::RECOMEN);

		$criteria->addSelectColumn(CcdatsoecoPeer::RESPON);

		$criteria->addSelectColumn(CcdatsoecoPeer::ASIGNA);

		$criteria->addSelectColumn(CcdatsoecoPeer::DEDUCC);

		$criteria->addSelectColumn(CcdatsoecoPeer::ASIGCON);

		$criteria->addSelectColumn(CcdatsoecoPeer::DEDUCON);

		$criteria->addSelectColumn(CcdatsoecoPeer::GASFAM);

		$criteria->addSelectColumn(CcdatsoecoPeer::CAPPAGO);

		$criteria->addSelectColumn(CcdatsoecoPeer::CCORIMATPRI_ID);

		$criteria->addSelectColumn(CcdatsoecoPeer::CCACTECO_ID);

		$criteria->addSelectColumn(CcdatsoecoPeer::CCESTRUC_ID);

		$criteria->addSelectColumn(CcdatsoecoPeer::CCRIEZONA_ID);

		$criteria->addSelectColumn(CcdatsoecoPeer::CCSOLICI_ID);

	}

	const COUNT = 'COUNT(ccdatsoeco.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccdatsoeco.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
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
		$objects = CcdatsoecoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcdatsoecoPeer::populateObjects(CcdatsoecoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcdatsoecoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcdatsoecoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcorimatpri(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);

		$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcacteco(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);

		$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcestruc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);

		$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcriezona(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);

		$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);

		$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcorimatpri(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcorimatpriPeer::addSelectColumns($c);

		$c->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcorimatpriPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcorimatpri(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdatsoeco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdatsoecos();
				$obj2->addCcdatsoeco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcacteco(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcactecoPeer::addSelectColumns($c);

		$c->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcactecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcacteco(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdatsoeco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdatsoecos();
				$obj2->addCcdatsoeco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcestruc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcestrucPeer::addSelectColumns($c);

		$c->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcestrucPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcestruc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdatsoeco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdatsoecos();
				$obj2->addCcdatsoeco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcriezona(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcriezonaPeer::addSelectColumns($c);

		$c->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcriezonaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcriezona(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdatsoeco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdatsoecos();
				$obj2->addCcdatsoeco($obj1); 			}
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

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoliciPeer::addSelectColumns($c);

		$c->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();

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
										$temp_obj2->addCcdatsoeco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdatsoecos();
				$obj2->addCcdatsoeco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$criteria->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$criteria->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
	
			$criteria->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
	
			$criteria->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
		$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
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

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol2 = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcorimatpriPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcorimatpriPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcactecoPeer::NUM_COLUMNS;
	
			CcestrucPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcestrucPeer::NUM_COLUMNS;
	
			CcriezonaPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcriezonaPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdatsoeco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdatsoecos();
					$obj2->addCcdatsoeco($obj1);
				}
	

							
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcacteco(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdatsoeco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdatsoecos();
					$obj3->addCcdatsoeco($obj1);
				}
	

							
				$omClass = CcestrucPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcestruc(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdatsoeco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdatsoecos();
					$obj4->addCcdatsoeco($obj1);
				}
	

							
				$omClass = CcriezonaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcriezona(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdatsoeco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdatsoecos();
					$obj5->addCcdatsoeco($obj1);
				}
	

							
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcsolici(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdatsoeco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdatsoecos();
					$obj6->addCcdatsoeco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcorimatpri(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
			$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcacteco(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
			$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcestruc(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
			$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcriezona(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
			$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcdatsoecoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdatsoecoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
		
				$criteria->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
		
			$rs = CcdatsoecoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcorimatpri(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol2 = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactecoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactecoPeer::NUM_COLUMNS;
	
			CcestrucPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestrucPeer::NUM_COLUMNS;
	
			CcriezonaPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcriezonaPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcacteco(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdatsoecos();
					$obj2->addCcdatsoeco($obj1);
				}
	
				$omClass = CcestrucPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestruc(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdatsoecos();
					$obj3->addCcdatsoeco($obj1);
				}
	
				$omClass = CcriezonaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcriezona(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdatsoecos();
					$obj4->addCcdatsoeco($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolici(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdatsoecos();
					$obj5->addCcdatsoeco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcacteco(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol2 = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcorimatpriPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcorimatpriPeer::NUM_COLUMNS;
	
			CcestrucPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestrucPeer::NUM_COLUMNS;
	
			CcriezonaPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcriezonaPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdatsoecos();
					$obj2->addCcdatsoeco($obj1);
				}
	
				$omClass = CcestrucPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestruc(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdatsoecos();
					$obj3->addCcdatsoeco($obj1);
				}
	
				$omClass = CcriezonaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcriezona(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdatsoecos();
					$obj4->addCcdatsoeco($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolici(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdatsoecos();
					$obj5->addCcdatsoeco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcestruc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol2 = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcorimatpriPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcorimatpriPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcactecoPeer::NUM_COLUMNS;
	
			CcriezonaPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcriezonaPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdatsoecos();
					$obj2->addCcdatsoeco($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcacteco(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdatsoecos();
					$obj3->addCcdatsoeco($obj1);
				}
	
				$omClass = CcriezonaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcriezona(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdatsoecos();
					$obj4->addCcdatsoeco($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolici(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdatsoecos();
					$obj5->addCcdatsoeco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcriezona(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol2 = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcorimatpriPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcorimatpriPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcactecoPeer::NUM_COLUMNS;
	
			CcestrucPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcestrucPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdatsoecos();
					$obj2->addCcdatsoeco($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcacteco(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdatsoecos();
					$obj3->addCcdatsoeco($obj1);
				}
	
				$omClass = CcestrucPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcestruc(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdatsoecos();
					$obj4->addCcdatsoeco($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolici(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdatsoecos();
					$obj5->addCcdatsoeco($obj1);
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

		CcdatsoecoPeer::addSelectColumns($c);
		$startcol2 = (CcdatsoecoPeer::NUM_COLUMNS - CcdatsoecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcorimatpriPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcorimatpriPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcactecoPeer::NUM_COLUMNS;
	
			CcestrucPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcestrucPeer::NUM_COLUMNS;
	
			CcriezonaPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcriezonaPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdatsoecoPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCESTRUC_ID, CcestrucPeer::ID);
	
			$c->addJoin(CcdatsoecoPeer::CCRIEZONA_ID, CcriezonaPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdatsoecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdatsoecos();
					$obj2->addCcdatsoeco($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcacteco(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdatsoecos();
					$obj3->addCcdatsoeco($obj1);
				}
	
				$omClass = CcestrucPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcestruc(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdatsoecos();
					$obj4->addCcdatsoeco($obj1);
				}
	
				$omClass = CcriezonaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcriezona(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdatsoeco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdatsoecos();
					$obj5->addCcdatsoeco($obj1);
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
		return CcdatsoecoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcdatsoecoPeer::ID); 

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
			$comparison = $criteria->getComparison(CcdatsoecoPeer::ID);
			$selectCriteria->add(CcdatsoecoPeer::ID, $criteria->remove(CcdatsoecoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcdatsoecoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcdatsoecoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccdatsoeco) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcdatsoecoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccdatsoeco $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcdatsoecoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcdatsoecoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcdatsoecoPeer::DATABASE_NAME, CcdatsoecoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcdatsoecoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcdatsoecoPeer::DATABASE_NAME);

		$criteria->add(CcdatsoecoPeer::ID, $pk);


		$v = CcdatsoecoPeer::doSelect($criteria, $con);

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
			$criteria->add(CcdatsoecoPeer::ID, $pks, Criteria::IN);
			$objs = CcdatsoecoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcdatsoecoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcdatsoecoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcdatsoecoMapBuilder');
}
