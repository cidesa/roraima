<?php


abstract class BaseAtayudasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atayudas';

	
	const CLASS_DEFAULT = 'lib.model.Atayudas';

	
	const NUM_COLUMNS = 34;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROEXP = 'atayudas.NROEXP';

	
	const REFDOC = 'atayudas.REFDOC';

	
	const PRIAYU = 'atayudas.PRIAYU';

	
	const ATSOLICI = 'atayudas.ATSOLICI';

	
	const ATBENEFI = 'atayudas.ATBENEFI';

	
	const ATTIPAYU_ID = 'atayudas.ATTIPAYU_ID';

	
	const ATRUBROS_ID = 'atayudas.ATRUBROS_ID';

	
	const ATESTAYU_ID = 'atayudas.ATESTAYU_ID';

	
	const ATTRASOC_ID = 'atayudas.ATTRASOC_ID';

	
	const ATPROVEE_ID = 'atayudas.ATPROVEE_ID';

	
	const PROAYU = 'atayudas.PROAYU';

	
	const NROOFI = 'atayudas.NROOFI';

	
	const DESAYU = 'atayudas.DESAYU';

	
	const MOTAYU = 'atayudas.MOTAYU';

	
	const CREATED_AT = 'atayudas.CREATED_AT';

	
	const UPDATED_AT = 'atayudas.UPDATED_AT';

	
	const USUCRE = 'atayudas.USUCRE';

	
	const USUMOD = 'atayudas.USUMOD';

	
	const CODPRE = 'atayudas.CODPRE';

	
	const DETAYU = 'atayudas.DETAYU';

	
	const MONAYU = 'atayudas.MONAYU';

	
	const MONAPR = 'atayudas.MONAPR';

	
	const ATMEDICO_ID = 'atayudas.ATMEDICO_ID';

	
	const RESPAT = 'atayudas.RESPAT';

	
	const INFMED = 'atayudas.INFMED';

	
	const OBSMED = 'atayudas.OBSMED';

	
	const FECDIASOC = 'atayudas.FECDIASOC';

	
	const USUDIASOC = 'atayudas.USUDIASOC';

	
	const RESDIASOC = 'atayudas.RESDIASOC';

	
	const FECVISDOC = 'atayudas.FECVISDOC';

	
	const USUVISDOC = 'atayudas.USUVISDOC';

	
	const RESVISDOC = 'atayudas.RESVISDOC';

	
	const FECSOL = 'atayudas.FECSOL';

	
	const ID = 'atayudas.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nroexp', 'Refdoc', 'Priayu', 'Atsolici', 'Atbenefi', 'AttipayuId', 'AtrubrosId', 'AtestayuId', 'AttrasocId', 'AtproveeId', 'Proayu', 'Nroofi', 'Desayu', 'Motayu', 'CreatedAt', 'UpdatedAt', 'Usucre', 'Usumod', 'Codpre', 'Detayu', 'Monayu', 'Monapr', 'AtmedicoId', 'Respat', 'Infmed', 'Obsmed', 'Fecdiasoc', 'Usudiasoc', 'Resdiasoc', 'Fecvisdoc', 'Usuvisdoc', 'Resvisdoc', 'Fecsol', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtayudasPeer::NROEXP, AtayudasPeer::REFDOC, AtayudasPeer::PRIAYU, AtayudasPeer::ATSOLICI, AtayudasPeer::ATBENEFI, AtayudasPeer::ATTIPAYU_ID, AtayudasPeer::ATRUBROS_ID, AtayudasPeer::ATESTAYU_ID, AtayudasPeer::ATTRASOC_ID, AtayudasPeer::ATPROVEE_ID, AtayudasPeer::PROAYU, AtayudasPeer::NROOFI, AtayudasPeer::DESAYU, AtayudasPeer::MOTAYU, AtayudasPeer::CREATED_AT, AtayudasPeer::UPDATED_AT, AtayudasPeer::USUCRE, AtayudasPeer::USUMOD, AtayudasPeer::CODPRE, AtayudasPeer::DETAYU, AtayudasPeer::MONAYU, AtayudasPeer::MONAPR, AtayudasPeer::ATMEDICO_ID, AtayudasPeer::RESPAT, AtayudasPeer::INFMED, AtayudasPeer::OBSMED, AtayudasPeer::FECDIASOC, AtayudasPeer::USUDIASOC, AtayudasPeer::RESDIASOC, AtayudasPeer::FECVISDOC, AtayudasPeer::USUVISDOC, AtayudasPeer::RESVISDOC, AtayudasPeer::FECSOL, AtayudasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nroexp', 'refdoc', 'priayu', 'atsolici', 'atbenefi', 'attipayu_id', 'atrubros_id', 'atestayu_id', 'attrasoc_id', 'atprovee_id', 'proayu', 'nroofi', 'desayu', 'motayu', 'created_at', 'updated_at', 'usucre', 'usumod', 'codpre', 'detayu', 'monayu', 'monapr', 'atmedico_id', 'respat', 'infmed', 'obsmed', 'fecdiasoc', 'usudiasoc', 'resdiasoc', 'fecvisdoc', 'usuvisdoc', 'resvisdoc', 'fecsol', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nroexp' => 0, 'Refdoc' => 1, 'Priayu' => 2, 'Atsolici' => 3, 'Atbenefi' => 4, 'AttipayuId' => 5, 'AtrubrosId' => 6, 'AtestayuId' => 7, 'AttrasocId' => 8, 'AtproveeId' => 9, 'Proayu' => 10, 'Nroofi' => 11, 'Desayu' => 12, 'Motayu' => 13, 'CreatedAt' => 14, 'UpdatedAt' => 15, 'Usucre' => 16, 'Usumod' => 17, 'Codpre' => 18, 'Detayu' => 19, 'Monayu' => 20, 'Monapr' => 21, 'AtmedicoId' => 22, 'Respat' => 23, 'Infmed' => 24, 'Obsmed' => 25, 'Fecdiasoc' => 26, 'Usudiasoc' => 27, 'Resdiasoc' => 28, 'Fecvisdoc' => 29, 'Usuvisdoc' => 30, 'Resvisdoc' => 31, 'Fecsol' => 32, 'Id' => 33, ),
		BasePeer::TYPE_COLNAME => array (AtayudasPeer::NROEXP => 0, AtayudasPeer::REFDOC => 1, AtayudasPeer::PRIAYU => 2, AtayudasPeer::ATSOLICI => 3, AtayudasPeer::ATBENEFI => 4, AtayudasPeer::ATTIPAYU_ID => 5, AtayudasPeer::ATRUBROS_ID => 6, AtayudasPeer::ATESTAYU_ID => 7, AtayudasPeer::ATTRASOC_ID => 8, AtayudasPeer::ATPROVEE_ID => 9, AtayudasPeer::PROAYU => 10, AtayudasPeer::NROOFI => 11, AtayudasPeer::DESAYU => 12, AtayudasPeer::MOTAYU => 13, AtayudasPeer::CREATED_AT => 14, AtayudasPeer::UPDATED_AT => 15, AtayudasPeer::USUCRE => 16, AtayudasPeer::USUMOD => 17, AtayudasPeer::CODPRE => 18, AtayudasPeer::DETAYU => 19, AtayudasPeer::MONAYU => 20, AtayudasPeer::MONAPR => 21, AtayudasPeer::ATMEDICO_ID => 22, AtayudasPeer::RESPAT => 23, AtayudasPeer::INFMED => 24, AtayudasPeer::OBSMED => 25, AtayudasPeer::FECDIASOC => 26, AtayudasPeer::USUDIASOC => 27, AtayudasPeer::RESDIASOC => 28, AtayudasPeer::FECVISDOC => 29, AtayudasPeer::USUVISDOC => 30, AtayudasPeer::RESVISDOC => 31, AtayudasPeer::FECSOL => 32, AtayudasPeer::ID => 33, ),
		BasePeer::TYPE_FIELDNAME => array ('nroexp' => 0, 'refdoc' => 1, 'priayu' => 2, 'atsolici' => 3, 'atbenefi' => 4, 'attipayu_id' => 5, 'atrubros_id' => 6, 'atestayu_id' => 7, 'attrasoc_id' => 8, 'atprovee_id' => 9, 'proayu' => 10, 'nroofi' => 11, 'desayu' => 12, 'motayu' => 13, 'created_at' => 14, 'updated_at' => 15, 'usucre' => 16, 'usumod' => 17, 'codpre' => 18, 'detayu' => 19, 'monayu' => 20, 'monapr' => 21, 'atmedico_id' => 22, 'respat' => 23, 'infmed' => 24, 'obsmed' => 25, 'fecdiasoc' => 26, 'usudiasoc' => 27, 'resdiasoc' => 28, 'fecvisdoc' => 29, 'usuvisdoc' => 30, 'resvisdoc' => 31, 'fecsol' => 32, 'id' => 33, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AtayudasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AtayudasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtayudasPeer::getTableMap();
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
		return str_replace(AtayudasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtayudasPeer::NROEXP);

		$criteria->addSelectColumn(AtayudasPeer::REFDOC);

		$criteria->addSelectColumn(AtayudasPeer::PRIAYU);

		$criteria->addSelectColumn(AtayudasPeer::ATSOLICI);

		$criteria->addSelectColumn(AtayudasPeer::ATBENEFI);

		$criteria->addSelectColumn(AtayudasPeer::ATTIPAYU_ID);

		$criteria->addSelectColumn(AtayudasPeer::ATRUBROS_ID);

		$criteria->addSelectColumn(AtayudasPeer::ATESTAYU_ID);

		$criteria->addSelectColumn(AtayudasPeer::ATTRASOC_ID);

		$criteria->addSelectColumn(AtayudasPeer::ATPROVEE_ID);

		$criteria->addSelectColumn(AtayudasPeer::PROAYU);

		$criteria->addSelectColumn(AtayudasPeer::NROOFI);

		$criteria->addSelectColumn(AtayudasPeer::DESAYU);

		$criteria->addSelectColumn(AtayudasPeer::MOTAYU);

		$criteria->addSelectColumn(AtayudasPeer::CREATED_AT);

		$criteria->addSelectColumn(AtayudasPeer::UPDATED_AT);

		$criteria->addSelectColumn(AtayudasPeer::USUCRE);

		$criteria->addSelectColumn(AtayudasPeer::USUMOD);

		$criteria->addSelectColumn(AtayudasPeer::CODPRE);

		$criteria->addSelectColumn(AtayudasPeer::DETAYU);

		$criteria->addSelectColumn(AtayudasPeer::MONAYU);

		$criteria->addSelectColumn(AtayudasPeer::MONAPR);

		$criteria->addSelectColumn(AtayudasPeer::ATMEDICO_ID);

		$criteria->addSelectColumn(AtayudasPeer::RESPAT);

		$criteria->addSelectColumn(AtayudasPeer::INFMED);

		$criteria->addSelectColumn(AtayudasPeer::OBSMED);

		$criteria->addSelectColumn(AtayudasPeer::FECDIASOC);

		$criteria->addSelectColumn(AtayudasPeer::USUDIASOC);

		$criteria->addSelectColumn(AtayudasPeer::RESDIASOC);

		$criteria->addSelectColumn(AtayudasPeer::FECVISDOC);

		$criteria->addSelectColumn(AtayudasPeer::USUVISDOC);

		$criteria->addSelectColumn(AtayudasPeer::RESVISDOC);

		$criteria->addSelectColumn(AtayudasPeer::FECSOL);

		$criteria->addSelectColumn(AtayudasPeer::ID);

	}

	const COUNT = 'COUNT(atayudas.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atayudas.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
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
		$objects = AtayudasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtayudasPeer::populateObjects(AtayudasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtayudasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtayudasPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCaordcom(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtciudadanoRelatedByAtsolici(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtciudadanoRelatedByAtbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAttipayu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtrubros(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtestayu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAttrasoc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtprovee(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtmedico(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCaordcom(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CaordcomPeer::addSelectColumns($c);

		$c->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaordcomPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCaordcom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtayudas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtciudadanoRelatedByAtsolici(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtciudadanoPeer::addSelectColumns($c);

		$c->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtciudadanoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtciudadanoRelatedByAtsolici(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtayudasRelatedByAtsolici($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtayudassRelatedByAtsolici();
				$obj2->addAtayudasRelatedByAtsolici($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtciudadanoRelatedByAtbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtciudadanoPeer::addSelectColumns($c);

		$c->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtciudadanoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtciudadanoRelatedByAtbenefi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtayudasRelatedByAtbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtayudassRelatedByAtbenefi();
				$obj2->addAtayudasRelatedByAtbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAttipayu(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AttipayuPeer::addSelectColumns($c);

		$c->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AttipayuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAttipayu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtayudas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtrubros(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtrubrosPeer::addSelectColumns($c);

		$c->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtrubrosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtrubros(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtayudas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtestayu(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtestayuPeer::addSelectColumns($c);

		$c->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtestayuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtestayu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtayudas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAttrasoc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AttrasocPeer::addSelectColumns($c);

		$c->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AttrasocPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAttrasoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtayudas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtprovee(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtproveePeer::addSelectColumns($c);

		$c->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtproveePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtprovee(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtayudas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtmedico(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtmedicoPeer::addSelectColumns($c);

		$c->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtmedicoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtmedico(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtayudas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$criteria->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
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

		AtayudasPeer::addSelectColumns($c);
		$startcol2 = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaordcomPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaordcomPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtciudadanoPeer::NUM_COLUMNS;

		AttipayuPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipayuPeer::NUM_COLUMNS;

		AtrubrosPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtrubrosPeer::NUM_COLUMNS;

		AtestayuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AtestayuPeer::NUM_COLUMNS;

		AttrasocPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AttrasocPeer::NUM_COLUMNS;

		AtproveePeer::addSelectColumns($c);
		$startcol10 = $startcol9 + AtproveePeer::NUM_COLUMNS;

		AtmedicoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + AtmedicoPeer::NUM_COLUMNS;

		$c->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$c->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$c->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$c->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$c->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CaordcomPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaordcom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtayudas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1);
			}


					
			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadanoRelatedByAtsolici(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtayudasRelatedByAtsolici($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAtayudassRelatedByAtsolici();
				$obj3->addAtayudasRelatedByAtsolici($obj1);
			}


					
			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtciudadanoRelatedByAtbenefi(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtayudasRelatedByAtbenefi($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initAtayudassRelatedByAtbenefi();
				$obj4->addAtayudasRelatedByAtbenefi($obj1);
			}


					
			$omClass = AttipayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttipayu(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtayudas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initAtayudass();
				$obj5->addAtayudas($obj1);
			}


					
			$omClass = AtrubrosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtrubros(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtayudas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initAtayudass();
				$obj6->addAtayudas($obj1);
			}


					
			$omClass = AtestayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAtestayu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtayudas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initAtayudass();
				$obj7->addAtayudas($obj1);
			}


					
			$omClass = AttrasocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAttrasoc(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtayudas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initAtayudass();
				$obj8->addAtayudas($obj1);
			}


					
			$omClass = AtproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9 = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getAtprovee(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addAtayudas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj9->initAtayudass();
				$obj9->addAtayudas($obj1);
			}


					
			$omClass = AtmedicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10 = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getAtmedico(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addAtayudas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj10->initAtayudass();
				$obj10->addAtayudas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCaordcom(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$criteria->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtciudadanoRelatedByAtsolici(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$criteria->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtciudadanoRelatedByAtbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$criteria->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAttipayu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$criteria->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtrubros(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$criteria->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtestayu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$criteria->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAttrasoc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$criteria->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtprovee(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtmedico(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtayudasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtayudasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$criteria->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$rs = AtayudasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCaordcom(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol2 = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AttipayuPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AttipayuPeer::NUM_COLUMNS;

		AtrubrosPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AtrubrosPeer::NUM_COLUMNS;

		AtestayuPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtestayuPeer::NUM_COLUMNS;

		AttrasocPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttrasocPeer::NUM_COLUMNS;

		AtproveePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AtproveePeer::NUM_COLUMNS;

		AtmedicoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + AtmedicoPeer::NUM_COLUMNS;

		$c->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$c->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$c->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$c->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getAtciudadanoRelatedByAtsolici(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtayudasRelatedByAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtayudassRelatedByAtsolici();
				$obj2->addAtayudasRelatedByAtsolici($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadanoRelatedByAtbenefi(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtayudasRelatedByAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtayudassRelatedByAtbenefi();
				$obj3->addAtayudasRelatedByAtbenefi($obj1);
			}

			$omClass = AttipayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAttipayu(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtayudass();
				$obj4->addAtayudas($obj1);
			}

			$omClass = AtrubrosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAtrubros(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtayudass();
				$obj5->addAtayudas($obj1);
			}

			$omClass = AtestayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtestayu(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtayudass();
				$obj6->addAtayudas($obj1);
			}

			$omClass = AttrasocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttrasoc(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtayudass();
				$obj7->addAtayudas($obj1);
			}

			$omClass = AtproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAtprovee(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initAtayudass();
				$obj8->addAtayudas($obj1);
			}

			$omClass = AtmedicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getAtmedico(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initAtayudass();
				$obj9->addAtayudas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtciudadanoRelatedByAtsolici(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol2 = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaordcomPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaordcomPeer::NUM_COLUMNS;

		AttipayuPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AttipayuPeer::NUM_COLUMNS;

		AtrubrosPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtrubrosPeer::NUM_COLUMNS;

		AtestayuPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AtestayuPeer::NUM_COLUMNS;

		AttrasocPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AttrasocPeer::NUM_COLUMNS;

		AtproveePeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AtproveePeer::NUM_COLUMNS;

		AtmedicoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AtmedicoPeer::NUM_COLUMNS;

		$c->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$c->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$c->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$c->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$c->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaordcomPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaordcom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1);
			}

			$omClass = AttipayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAttipayu(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtayudass();
				$obj3->addAtayudas($obj1);
			}

			$omClass = AtrubrosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtrubros(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtayudass();
				$obj4->addAtayudas($obj1);
			}

			$omClass = AtestayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAtestayu(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtayudass();
				$obj5->addAtayudas($obj1);
			}

			$omClass = AttrasocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAttrasoc(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtayudass();
				$obj6->addAtayudas($obj1);
			}

			$omClass = AtproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAtprovee(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtayudass();
				$obj7->addAtayudas($obj1);
			}

			$omClass = AtmedicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAtmedico(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initAtayudass();
				$obj8->addAtayudas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtciudadanoRelatedByAtbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol2 = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaordcomPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaordcomPeer::NUM_COLUMNS;

		AttipayuPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AttipayuPeer::NUM_COLUMNS;

		AtrubrosPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtrubrosPeer::NUM_COLUMNS;

		AtestayuPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AtestayuPeer::NUM_COLUMNS;

		AttrasocPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AttrasocPeer::NUM_COLUMNS;

		AtproveePeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AtproveePeer::NUM_COLUMNS;

		AtmedicoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AtmedicoPeer::NUM_COLUMNS;

		$c->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$c->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$c->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$c->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$c->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaordcomPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaordcom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1);
			}

			$omClass = AttipayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAttipayu(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtayudass();
				$obj3->addAtayudas($obj1);
			}

			$omClass = AtrubrosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtrubros(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtayudass();
				$obj4->addAtayudas($obj1);
			}

			$omClass = AtestayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAtestayu(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtayudass();
				$obj5->addAtayudas($obj1);
			}

			$omClass = AttrasocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAttrasoc(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtayudass();
				$obj6->addAtayudas($obj1);
			}

			$omClass = AtproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAtprovee(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtayudass();
				$obj7->addAtayudas($obj1);
			}

			$omClass = AtmedicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAtmedico(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initAtayudass();
				$obj8->addAtayudas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAttipayu(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol2 = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaordcomPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaordcomPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtciudadanoPeer::NUM_COLUMNS;

		AtrubrosPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AtrubrosPeer::NUM_COLUMNS;

		AtestayuPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtestayuPeer::NUM_COLUMNS;

		AttrasocPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttrasocPeer::NUM_COLUMNS;

		AtproveePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AtproveePeer::NUM_COLUMNS;

		AtmedicoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + AtmedicoPeer::NUM_COLUMNS;

		$c->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$c->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$c->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$c->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$c->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaordcomPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaordcom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadanoRelatedByAtsolici(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtayudasRelatedByAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtayudassRelatedByAtsolici();
				$obj3->addAtayudasRelatedByAtsolici($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtciudadanoRelatedByAtbenefi(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtayudasRelatedByAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtayudassRelatedByAtbenefi();
				$obj4->addAtayudasRelatedByAtbenefi($obj1);
			}

			$omClass = AtrubrosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAtrubros(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtayudass();
				$obj5->addAtayudas($obj1);
			}

			$omClass = AtestayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtestayu(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtayudass();
				$obj6->addAtayudas($obj1);
			}

			$omClass = AttrasocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttrasoc(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtayudass();
				$obj7->addAtayudas($obj1);
			}

			$omClass = AtproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAtprovee(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initAtayudass();
				$obj8->addAtayudas($obj1);
			}

			$omClass = AtmedicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getAtmedico(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initAtayudass();
				$obj9->addAtayudas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtrubros(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol2 = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaordcomPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaordcomPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtciudadanoPeer::NUM_COLUMNS;

		AttipayuPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipayuPeer::NUM_COLUMNS;

		AtestayuPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtestayuPeer::NUM_COLUMNS;

		AttrasocPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttrasocPeer::NUM_COLUMNS;

		AtproveePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AtproveePeer::NUM_COLUMNS;

		AtmedicoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + AtmedicoPeer::NUM_COLUMNS;

		$c->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$c->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$c->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$c->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaordcomPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaordcom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadanoRelatedByAtsolici(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtayudasRelatedByAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtayudassRelatedByAtsolici();
				$obj3->addAtayudasRelatedByAtsolici($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtciudadanoRelatedByAtbenefi(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtayudasRelatedByAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtayudassRelatedByAtbenefi();
				$obj4->addAtayudasRelatedByAtbenefi($obj1);
			}

			$omClass = AttipayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttipayu(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtayudass();
				$obj5->addAtayudas($obj1);
			}

			$omClass = AtestayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtestayu(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtayudass();
				$obj6->addAtayudas($obj1);
			}

			$omClass = AttrasocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttrasoc(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtayudass();
				$obj7->addAtayudas($obj1);
			}

			$omClass = AtproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAtprovee(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initAtayudass();
				$obj8->addAtayudas($obj1);
			}

			$omClass = AtmedicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getAtmedico(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initAtayudass();
				$obj9->addAtayudas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtestayu(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol2 = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaordcomPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaordcomPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtciudadanoPeer::NUM_COLUMNS;

		AttipayuPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipayuPeer::NUM_COLUMNS;

		AtrubrosPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtrubrosPeer::NUM_COLUMNS;

		AttrasocPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AttrasocPeer::NUM_COLUMNS;

		AtproveePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AtproveePeer::NUM_COLUMNS;

		AtmedicoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + AtmedicoPeer::NUM_COLUMNS;

		$c->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$c->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$c->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$c->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$c->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaordcomPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaordcom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadanoRelatedByAtsolici(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtayudasRelatedByAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtayudassRelatedByAtsolici();
				$obj3->addAtayudasRelatedByAtsolici($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtciudadanoRelatedByAtbenefi(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtayudasRelatedByAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtayudassRelatedByAtbenefi();
				$obj4->addAtayudasRelatedByAtbenefi($obj1);
			}

			$omClass = AttipayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttipayu(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtayudass();
				$obj5->addAtayudas($obj1);
			}

			$omClass = AtrubrosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtrubros(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtayudass();
				$obj6->addAtayudas($obj1);
			}

			$omClass = AttrasocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAttrasoc(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtayudass();
				$obj7->addAtayudas($obj1);
			}

			$omClass = AtproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAtprovee(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initAtayudass();
				$obj8->addAtayudas($obj1);
			}

			$omClass = AtmedicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getAtmedico(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initAtayudass();
				$obj9->addAtayudas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAttrasoc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol2 = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaordcomPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaordcomPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtciudadanoPeer::NUM_COLUMNS;

		AttipayuPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipayuPeer::NUM_COLUMNS;

		AtrubrosPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtrubrosPeer::NUM_COLUMNS;

		AtestayuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AtestayuPeer::NUM_COLUMNS;

		AtproveePeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AtproveePeer::NUM_COLUMNS;

		AtmedicoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + AtmedicoPeer::NUM_COLUMNS;

		$c->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$c->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$c->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);

		$c->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaordcomPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaordcom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadanoRelatedByAtsolici(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtayudasRelatedByAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtayudassRelatedByAtsolici();
				$obj3->addAtayudasRelatedByAtsolici($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtciudadanoRelatedByAtbenefi(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtayudasRelatedByAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtayudassRelatedByAtbenefi();
				$obj4->addAtayudasRelatedByAtbenefi($obj1);
			}

			$omClass = AttipayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttipayu(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtayudass();
				$obj5->addAtayudas($obj1);
			}

			$omClass = AtrubrosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtrubros(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtayudass();
				$obj6->addAtayudas($obj1);
			}

			$omClass = AtestayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAtestayu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtayudass();
				$obj7->addAtayudas($obj1);
			}

			$omClass = AtproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAtprovee(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initAtayudass();
				$obj8->addAtayudas($obj1);
			}

			$omClass = AtmedicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getAtmedico(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initAtayudass();
				$obj9->addAtayudas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtprovee(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol2 = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaordcomPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaordcomPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtciudadanoPeer::NUM_COLUMNS;

		AttipayuPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipayuPeer::NUM_COLUMNS;

		AtrubrosPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtrubrosPeer::NUM_COLUMNS;

		AtestayuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AtestayuPeer::NUM_COLUMNS;

		AttrasocPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AttrasocPeer::NUM_COLUMNS;

		AtmedicoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + AtmedicoPeer::NUM_COLUMNS;

		$c->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$c->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$c->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$c->addJoin(AtayudasPeer::ATMEDICO_ID, AtmedicoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaordcomPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaordcom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadanoRelatedByAtsolici(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtayudasRelatedByAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtayudassRelatedByAtsolici();
				$obj3->addAtayudasRelatedByAtsolici($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtciudadanoRelatedByAtbenefi(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtayudasRelatedByAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtayudassRelatedByAtbenefi();
				$obj4->addAtayudasRelatedByAtbenefi($obj1);
			}

			$omClass = AttipayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttipayu(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtayudass();
				$obj5->addAtayudas($obj1);
			}

			$omClass = AtrubrosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtrubros(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtayudass();
				$obj6->addAtayudas($obj1);
			}

			$omClass = AtestayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAtestayu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtayudass();
				$obj7->addAtayudas($obj1);
			}

			$omClass = AttrasocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAttrasoc(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initAtayudass();
				$obj8->addAtayudas($obj1);
			}

			$omClass = AtmedicoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getAtmedico(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initAtayudass();
				$obj9->addAtayudas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtmedico(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtayudasPeer::addSelectColumns($c);
		$startcol2 = (AtayudasPeer::NUM_COLUMNS - AtayudasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CaordcomPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CaordcomPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AtciudadanoPeer::NUM_COLUMNS;

		AttipayuPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AttipayuPeer::NUM_COLUMNS;

		AtrubrosPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + AtrubrosPeer::NUM_COLUMNS;

		AtestayuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + AtestayuPeer::NUM_COLUMNS;

		AttrasocPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + AttrasocPeer::NUM_COLUMNS;

		AtproveePeer::addSelectColumns($c);
		$startcol10 = $startcol9 + AtproveePeer::NUM_COLUMNS;

		$c->addJoin(AtayudasPeer::REFDOC, CaordcomPeer::ID);

		$c->addJoin(AtayudasPeer::ATSOLICI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);

		$c->addJoin(AtayudasPeer::ATTIPAYU_ID, AttipayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATRUBROS_ID, AtrubrosPeer::ID);

		$c->addJoin(AtayudasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$c->addJoin(AtayudasPeer::ATTRASOC_ID, AttrasocPeer::ID);

		$c->addJoin(AtayudasPeer::ATPROVEE_ID, AtproveePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaordcomPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCaordcom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtayudass();
				$obj2->addAtayudas($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtciudadanoRelatedByAtsolici(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtayudasRelatedByAtsolici($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAtayudassRelatedByAtsolici();
				$obj3->addAtayudasRelatedByAtsolici($obj1);
			}

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAtciudadanoRelatedByAtbenefi(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAtayudasRelatedByAtbenefi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initAtayudassRelatedByAtbenefi();
				$obj4->addAtayudasRelatedByAtbenefi($obj1);
			}

			$omClass = AttipayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAttipayu(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initAtayudass();
				$obj5->addAtayudas($obj1);
			}

			$omClass = AtrubrosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getAtrubros(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initAtayudass();
				$obj6->addAtayudas($obj1);
			}

			$omClass = AtestayuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getAtestayu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initAtayudass();
				$obj7->addAtayudas($obj1);
			}

			$omClass = AttrasocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getAttrasoc(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initAtayudass();
				$obj8->addAtayudas($obj1);
			}

			$omClass = AtproveePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getAtprovee(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addAtayudas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initAtayudass();
				$obj9->addAtayudas($obj1);
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
		return AtayudasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtayudasPeer::ID); 

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
			$comparison = $criteria->getComparison(AtayudasPeer::ID);
			$selectCriteria->add(AtayudasPeer::ID, $criteria->remove(AtayudasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtayudasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtayudasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atayudas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtayudasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atayudas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtayudasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtayudasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtayudasPeer::DATABASE_NAME, AtayudasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtayudasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtayudasPeer::DATABASE_NAME);

		$criteria->add(AtayudasPeer::ID, $pk);


		$v = AtayudasPeer::doSelect($criteria, $con);

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
			$criteria->add(AtayudasPeer::ID, $pks, Criteria::IN);
			$objs = AtayudasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtayudasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AtayudasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AtayudasMapBuilder');
}
