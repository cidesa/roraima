<?php


abstract class BaseCcbieadqPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccbieadq';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccbieadq';

	
	const NUM_COLUMNS = 36;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccbieadq.ID';

	
	const DESBIEADQ = 'ccbieadq.DESBIEADQ';

	
	const MONPRE = 'ccbieadq.MONPRE';

	
	const MONFACPRO = 'ccbieadq.MONFACPRO';

	
	const PROCED = 'ccbieadq.PROCED';

	
	const GRAVAM = 'ccbieadq.GRAVAM';

	
	const GRADO = 'ccbieadq.GRADO';

	
	const UBINOMURB = 'ccbieadq.UBINOMURB';

	
	const UBINUMCAL = 'ccbieadq.UBINUMCAL';

	
	const UBINUMCAS = 'ccbieadq.UBINUMCAS';

	
	const UBIPUNREF = 'ccbieadq.UBIPUNREF';

	
	const TIPBIEN = 'ccbieadq.TIPBIEN';

	
	const OBSERV = 'ccbieadq.OBSERV';

	
	const UBINUMPIS = 'ccbieadq.UBINUMPIS';

	
	const UBINUMAPT = 'ccbieadq.UBINUMAPT';

	
	const DESOTR = 'ccbieadq.DESOTR';

	
	const NUMBIE = 'ccbieadq.NUMBIE';

	
	const TERMETCUA = 'ccbieadq.TERMETCUA';

	
	const CONMETCUA = 'ccbieadq.CONMETCUA';

	
	const NUMHAB = 'ccbieadq.NUMHAB';

	
	const NUMBAN = 'ccbieadq.NUMBAN';

	
	const NUMEST = 'ccbieadq.NUMEST';

	
	const PRECINMU = 'ccbieadq.PRECINMU';

	
	const DIAOFE = 'ccbieadq.DIAOFE';

	
	const NOMPROVEN = 'ccbieadq.NOMPROVEN';

	
	const CEDRIFPRO = 'ccbieadq.CEDRIFPRO';

	
	const CODAREHAB = 'ccbieadq.CODAREHAB';

	
	const TELHAB = 'ccbieadq.TELHAB';

	
	const CODARECEL = 'ccbieadq.CODARECEL';

	
	const TELCEL = 'ccbieadq.TELCEL';

	
	const CODAREOFI = 'ccbieadq.CODAREOFI';

	
	const TELOFI = 'ccbieadq.TELOFI';

	
	const CCSOLICI_ID = 'ccbieadq.CCSOLICI_ID';

	
	const CCCLABIE_ID = 'ccbieadq.CCCLABIE_ID';

	
	const CCTIPPROBIE_ID = 'ccbieadq.CCTIPPROBIE_ID';

	
	const CCPARROQ_ID = 'ccbieadq.CCPARROQ_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Desbieadq', 'Monpre', 'Monfacpro', 'Proced', 'Gravam', 'Grado', 'Ubinomurb', 'Ubinumcal', 'Ubinumcas', 'Ubipunref', 'Tipbien', 'Observ', 'Ubinumpis', 'Ubinumapt', 'Desotr', 'Numbie', 'Termetcua', 'Conmetcua', 'Numhab', 'Numban', 'Numest', 'Precinmu', 'Diaofe', 'Nomproven', 'Cedrifpro', 'Codarehab', 'Telhab', 'Codarecel', 'Telcel', 'Codareofi', 'Telofi', 'CcsoliciId', 'CcclabieId', 'CctipprobieId', 'CcparroqId', ),
		BasePeer::TYPE_COLNAME => array (CcbieadqPeer::ID, CcbieadqPeer::DESBIEADQ, CcbieadqPeer::MONPRE, CcbieadqPeer::MONFACPRO, CcbieadqPeer::PROCED, CcbieadqPeer::GRAVAM, CcbieadqPeer::GRADO, CcbieadqPeer::UBINOMURB, CcbieadqPeer::UBINUMCAL, CcbieadqPeer::UBINUMCAS, CcbieadqPeer::UBIPUNREF, CcbieadqPeer::TIPBIEN, CcbieadqPeer::OBSERV, CcbieadqPeer::UBINUMPIS, CcbieadqPeer::UBINUMAPT, CcbieadqPeer::DESOTR, CcbieadqPeer::NUMBIE, CcbieadqPeer::TERMETCUA, CcbieadqPeer::CONMETCUA, CcbieadqPeer::NUMHAB, CcbieadqPeer::NUMBAN, CcbieadqPeer::NUMEST, CcbieadqPeer::PRECINMU, CcbieadqPeer::DIAOFE, CcbieadqPeer::NOMPROVEN, CcbieadqPeer::CEDRIFPRO, CcbieadqPeer::CODAREHAB, CcbieadqPeer::TELHAB, CcbieadqPeer::CODARECEL, CcbieadqPeer::TELCEL, CcbieadqPeer::CODAREOFI, CcbieadqPeer::TELOFI, CcbieadqPeer::CCSOLICI_ID, CcbieadqPeer::CCCLABIE_ID, CcbieadqPeer::CCTIPPROBIE_ID, CcbieadqPeer::CCPARROQ_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'desbieadq', 'monpre', 'monfacpro', 'proced', 'gravam', 'grado', 'ubinomurb', 'ubinumcal', 'ubinumcas', 'ubipunref', 'tipbien', 'observ', 'ubinumpis', 'ubinumapt', 'desotr', 'numbie', 'termetcua', 'conmetcua', 'numhab', 'numban', 'numest', 'precinmu', 'diaofe', 'nomproven', 'cedrifpro', 'codarehab', 'telhab', 'codarecel', 'telcel', 'codareofi', 'telofi', 'ccsolici_id', 'ccclabie_id', 'cctipprobie_id', 'ccparroq_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Desbieadq' => 1, 'Monpre' => 2, 'Monfacpro' => 3, 'Proced' => 4, 'Gravam' => 5, 'Grado' => 6, 'Ubinomurb' => 7, 'Ubinumcal' => 8, 'Ubinumcas' => 9, 'Ubipunref' => 10, 'Tipbien' => 11, 'Observ' => 12, 'Ubinumpis' => 13, 'Ubinumapt' => 14, 'Desotr' => 15, 'Numbie' => 16, 'Termetcua' => 17, 'Conmetcua' => 18, 'Numhab' => 19, 'Numban' => 20, 'Numest' => 21, 'Precinmu' => 22, 'Diaofe' => 23, 'Nomproven' => 24, 'Cedrifpro' => 25, 'Codarehab' => 26, 'Telhab' => 27, 'Codarecel' => 28, 'Telcel' => 29, 'Codareofi' => 30, 'Telofi' => 31, 'CcsoliciId' => 32, 'CcclabieId' => 33, 'CctipprobieId' => 34, 'CcparroqId' => 35, ),
		BasePeer::TYPE_COLNAME => array (CcbieadqPeer::ID => 0, CcbieadqPeer::DESBIEADQ => 1, CcbieadqPeer::MONPRE => 2, CcbieadqPeer::MONFACPRO => 3, CcbieadqPeer::PROCED => 4, CcbieadqPeer::GRAVAM => 5, CcbieadqPeer::GRADO => 6, CcbieadqPeer::UBINOMURB => 7, CcbieadqPeer::UBINUMCAL => 8, CcbieadqPeer::UBINUMCAS => 9, CcbieadqPeer::UBIPUNREF => 10, CcbieadqPeer::TIPBIEN => 11, CcbieadqPeer::OBSERV => 12, CcbieadqPeer::UBINUMPIS => 13, CcbieadqPeer::UBINUMAPT => 14, CcbieadqPeer::DESOTR => 15, CcbieadqPeer::NUMBIE => 16, CcbieadqPeer::TERMETCUA => 17, CcbieadqPeer::CONMETCUA => 18, CcbieadqPeer::NUMHAB => 19, CcbieadqPeer::NUMBAN => 20, CcbieadqPeer::NUMEST => 21, CcbieadqPeer::PRECINMU => 22, CcbieadqPeer::DIAOFE => 23, CcbieadqPeer::NOMPROVEN => 24, CcbieadqPeer::CEDRIFPRO => 25, CcbieadqPeer::CODAREHAB => 26, CcbieadqPeer::TELHAB => 27, CcbieadqPeer::CODARECEL => 28, CcbieadqPeer::TELCEL => 29, CcbieadqPeer::CODAREOFI => 30, CcbieadqPeer::TELOFI => 31, CcbieadqPeer::CCSOLICI_ID => 32, CcbieadqPeer::CCCLABIE_ID => 33, CcbieadqPeer::CCTIPPROBIE_ID => 34, CcbieadqPeer::CCPARROQ_ID => 35, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'desbieadq' => 1, 'monpre' => 2, 'monfacpro' => 3, 'proced' => 4, 'gravam' => 5, 'grado' => 6, 'ubinomurb' => 7, 'ubinumcal' => 8, 'ubinumcas' => 9, 'ubipunref' => 10, 'tipbien' => 11, 'observ' => 12, 'ubinumpis' => 13, 'ubinumapt' => 14, 'desotr' => 15, 'numbie' => 16, 'termetcua' => 17, 'conmetcua' => 18, 'numhab' => 19, 'numban' => 20, 'numest' => 21, 'precinmu' => 22, 'diaofe' => 23, 'nomproven' => 24, 'cedrifpro' => 25, 'codarehab' => 26, 'telhab' => 27, 'codarecel' => 28, 'telcel' => 29, 'codareofi' => 30, 'telofi' => 31, 'ccsolici_id' => 32, 'ccclabie_id' => 33, 'cctipprobie_id' => 34, 'ccparroq_id' => 35, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcbieadqMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcbieadqMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcbieadqPeer::getTableMap();
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
		return str_replace(CcbieadqPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcbieadqPeer::ID);

		$criteria->addSelectColumn(CcbieadqPeer::DESBIEADQ);

		$criteria->addSelectColumn(CcbieadqPeer::MONPRE);

		$criteria->addSelectColumn(CcbieadqPeer::MONFACPRO);

		$criteria->addSelectColumn(CcbieadqPeer::PROCED);

		$criteria->addSelectColumn(CcbieadqPeer::GRAVAM);

		$criteria->addSelectColumn(CcbieadqPeer::GRADO);

		$criteria->addSelectColumn(CcbieadqPeer::UBINOMURB);

		$criteria->addSelectColumn(CcbieadqPeer::UBINUMCAL);

		$criteria->addSelectColumn(CcbieadqPeer::UBINUMCAS);

		$criteria->addSelectColumn(CcbieadqPeer::UBIPUNREF);

		$criteria->addSelectColumn(CcbieadqPeer::TIPBIEN);

		$criteria->addSelectColumn(CcbieadqPeer::OBSERV);

		$criteria->addSelectColumn(CcbieadqPeer::UBINUMPIS);

		$criteria->addSelectColumn(CcbieadqPeer::UBINUMAPT);

		$criteria->addSelectColumn(CcbieadqPeer::DESOTR);

		$criteria->addSelectColumn(CcbieadqPeer::NUMBIE);

		$criteria->addSelectColumn(CcbieadqPeer::TERMETCUA);

		$criteria->addSelectColumn(CcbieadqPeer::CONMETCUA);

		$criteria->addSelectColumn(CcbieadqPeer::NUMHAB);

		$criteria->addSelectColumn(CcbieadqPeer::NUMBAN);

		$criteria->addSelectColumn(CcbieadqPeer::NUMEST);

		$criteria->addSelectColumn(CcbieadqPeer::PRECINMU);

		$criteria->addSelectColumn(CcbieadqPeer::DIAOFE);

		$criteria->addSelectColumn(CcbieadqPeer::NOMPROVEN);

		$criteria->addSelectColumn(CcbieadqPeer::CEDRIFPRO);

		$criteria->addSelectColumn(CcbieadqPeer::CODAREHAB);

		$criteria->addSelectColumn(CcbieadqPeer::TELHAB);

		$criteria->addSelectColumn(CcbieadqPeer::CODARECEL);

		$criteria->addSelectColumn(CcbieadqPeer::TELCEL);

		$criteria->addSelectColumn(CcbieadqPeer::CODAREOFI);

		$criteria->addSelectColumn(CcbieadqPeer::TELOFI);

		$criteria->addSelectColumn(CcbieadqPeer::CCSOLICI_ID);

		$criteria->addSelectColumn(CcbieadqPeer::CCCLABIE_ID);

		$criteria->addSelectColumn(CcbieadqPeer::CCTIPPROBIE_ID);

		$criteria->addSelectColumn(CcbieadqPeer::CCPARROQ_ID);

	}

	const COUNT = 'COUNT(ccbieadq.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccbieadq.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcbieadqPeer::doSelectRS($criteria, $con);
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
		$objects = CcbieadqPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcbieadqPeer::populateObjects(CcbieadqPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcbieadqPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcbieadqPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcsolici(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbieadqPeer::CCSOLICI_ID, CcsoliciPeer::ID);

		$rs = CcbieadqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcclabie(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbieadqPeer::CCCLABIE_ID, CcclabiePeer::ID);

		$rs = CcbieadqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCctipprobie(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbieadqPeer::CCTIPPROBIE_ID, CctipprobiePeer::ID);

		$rs = CcbieadqPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcbieadqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbieadqPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcbieadqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcsolici(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbieadqPeer::addSelectColumns($c);
		$startcol = (CcbieadqPeer::NUM_COLUMNS - CcbieadqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoliciPeer::addSelectColumns($c);

		$c->addJoin(CcbieadqPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbieadqPeer::getOMClass();

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
										$temp_obj2->addCcbieadq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbieadqs();
				$obj2->addCcbieadq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcclabie(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbieadqPeer::addSelectColumns($c);
		$startcol = (CcbieadqPeer::NUM_COLUMNS - CcbieadqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcclabiePeer::addSelectColumns($c);

		$c->addJoin(CcbieadqPeer::CCCLABIE_ID, CcclabiePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbieadqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcclabiePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcclabie(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbieadq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbieadqs();
				$obj2->addCcbieadq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCctipprobie(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbieadqPeer::addSelectColumns($c);
		$startcol = (CcbieadqPeer::NUM_COLUMNS - CcbieadqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipprobiePeer::addSelectColumns($c);

		$c->addJoin(CcbieadqPeer::CCTIPPROBIE_ID, CctipprobiePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbieadqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipprobiePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipprobie(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbieadq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbieadqs();
				$obj2->addCcbieadq($obj1); 			}
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

		CcbieadqPeer::addSelectColumns($c);
		$startcol = (CcbieadqPeer::NUM_COLUMNS - CcbieadqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcbieadqPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbieadqPeer::getOMClass();

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
										$temp_obj2->addCcbieadq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbieadqs();
				$obj2->addCcbieadq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbieadqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcbieadqPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$criteria->addJoin(CcbieadqPeer::CCCLABIE_ID, CcclabiePeer::ID);
	
			$criteria->addJoin(CcbieadqPeer::CCTIPPROBIE_ID, CctipprobiePeer::ID);
	
			$criteria->addJoin(CcbieadqPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = CcbieadqPeer::doSelectRS($criteria, $con);
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

		CcbieadqPeer::addSelectColumns($c);
		$startcol2 = (CcbieadqPeer::NUM_COLUMNS - CcbieadqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			CcclabiePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclabiePeer::NUM_COLUMNS;
	
			CctipprobiePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipprobiePeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbieadqPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCCLABIE_ID, CcclabiePeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCTIPPROBIE_ID, CctipprobiePeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbieadqPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcsolici(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbieadq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbieadqs();
					$obj2->addCcbieadq($obj1);
				}
	

							
				$omClass = CcclabiePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclabie(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbieadq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbieadqs();
					$obj3->addCcbieadq($obj1);
				}
	

							
				$omClass = CctipprobiePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipprobie(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbieadq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbieadqs();
					$obj4->addCcbieadq($obj1);
				}
	

							
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbieadq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbieadqs();
					$obj5->addCcbieadq($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcsolici(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbieadqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbieadqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbieadqPeer::CCCLABIE_ID, CcclabiePeer::ID);
		
				$criteria->addJoin(CcbieadqPeer::CCTIPPROBIE_ID, CctipprobiePeer::ID);
		
				$criteria->addJoin(CcbieadqPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcbieadqPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcclabie(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbieadqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbieadqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbieadqPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcbieadqPeer::CCTIPPROBIE_ID, CctipprobiePeer::ID);
		
				$criteria->addJoin(CcbieadqPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcbieadqPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCctipprobie(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbieadqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbieadqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbieadqPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcbieadqPeer::CCCLABIE_ID, CcclabiePeer::ID);
		
				$criteria->addJoin(CcbieadqPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
			$rs = CcbieadqPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcbieadqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbieadqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbieadqPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcbieadqPeer::CCCLABIE_ID, CcclabiePeer::ID);
		
				$criteria->addJoin(CcbieadqPeer::CCTIPPROBIE_ID, CctipprobiePeer::ID);
		
			$rs = CcbieadqPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcsolici(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbieadqPeer::addSelectColumns($c);
		$startcol2 = (CcbieadqPeer::NUM_COLUMNS - CcbieadqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcclabiePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcclabiePeer::NUM_COLUMNS;
	
			CctipprobiePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipprobiePeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbieadqPeer::CCCLABIE_ID, CcclabiePeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCTIPPROBIE_ID, CctipprobiePeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbieadqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcclabiePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcclabie(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbieadqs();
					$obj2->addCcbieadq($obj1);
				}
	
				$omClass = CctipprobiePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipprobie(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbieadqs();
					$obj3->addCcbieadq($obj1);
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
						$temp_obj4->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbieadqs();
					$obj4->addCcbieadq($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcclabie(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbieadqPeer::addSelectColumns($c);
		$startcol2 = (CcbieadqPeer::NUM_COLUMNS - CcbieadqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipprobiePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipprobiePeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbieadqPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCTIPPROBIE_ID, CctipprobiePeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbieadqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcsolici(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbieadqs();
					$obj2->addCcbieadq($obj1);
				}
	
				$omClass = CctipprobiePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipprobie(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbieadqs();
					$obj3->addCcbieadq($obj1);
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
						$temp_obj4->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbieadqs();
					$obj4->addCcbieadq($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCctipprobie(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbieadqPeer::addSelectColumns($c);
		$startcol2 = (CcbieadqPeer::NUM_COLUMNS - CcbieadqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			CcclabiePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclabiePeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbieadqPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCCLABIE_ID, CcclabiePeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCPARROQ_ID, CcparroqPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbieadqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcsolici(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbieadqs();
					$obj2->addCcbieadq($obj1);
				}
	
				$omClass = CcclabiePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclabie(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbieadqs();
					$obj3->addCcbieadq($obj1);
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
						$temp_obj4->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbieadqs();
					$obj4->addCcbieadq($obj1);
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

		CcbieadqPeer::addSelectColumns($c);
		$startcol2 = (CcbieadqPeer::NUM_COLUMNS - CcbieadqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			CcclabiePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclabiePeer::NUM_COLUMNS;
	
			CctipprobiePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipprobiePeer::NUM_COLUMNS;
	
			$c->addJoin(CcbieadqPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCCLABIE_ID, CcclabiePeer::ID);
	
			$c->addJoin(CcbieadqPeer::CCTIPPROBIE_ID, CctipprobiePeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbieadqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcsolici(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbieadqs();
					$obj2->addCcbieadq($obj1);
				}
	
				$omClass = CcclabiePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclabie(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbieadqs();
					$obj3->addCcbieadq($obj1);
				}
	
				$omClass = CctipprobiePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipprobie(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbieadq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbieadqs();
					$obj4->addCcbieadq($obj1);
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
		return CcbieadqPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcbieadqPeer::ID); 

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
			$comparison = $criteria->getComparison(CcbieadqPeer::ID);
			$selectCriteria->add(CcbieadqPeer::ID, $criteria->remove(CcbieadqPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcbieadqPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcbieadqPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccbieadq) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcbieadqPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccbieadq $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcbieadqPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcbieadqPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcbieadqPeer::DATABASE_NAME, CcbieadqPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcbieadqPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcbieadqPeer::DATABASE_NAME);

		$criteria->add(CcbieadqPeer::ID, $pk);


		$v = CcbieadqPeer::doSelect($criteria, $con);

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
			$criteria->add(CcbieadqPeer::ID, $pks, Criteria::IN);
			$objs = CcbieadqPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcbieadqPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcbieadqMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcbieadqMapBuilder');
}
