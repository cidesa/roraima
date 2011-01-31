<?php


abstract class BaseCccreditPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cccredit';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Cccredit';

	
	const NUM_COLUMNS = 27;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'cccredit.ID';

	
	const NUMEXP = 'cccredit.NUMEXP';

	
	const NATCRE = 'cccredit.NATCRE';

	
	const DESTINO = 'cccredit.DESTINO';

	
	const MONAPR = 'cccredit.MONAPR';

	
	const ACTAPR = 'cccredit.ACTAPR';

	
	const FECAPR = 'cccredit.FECAPR';

	
	const APERCUE = 'cccredit.APERCUE';

	
	const FECCRECUE = 'cccredit.FECCRECUE';

	
	const NUMCUE = 'cccredit.NUMCUE';

	
	const GENTXT = 'cccredit.GENTXT';

	
	const FECLIQ = 'cccredit.FECLIQ';

	
	const DISDES = 'cccredit.DISDES';

	
	const ESTATU = 'cccredit.ESTATU';

	
	const CCBENEFI_ID = 'cccredit.CCBENEFI_ID';

	
	const CCFUEFIN_ID = 'cccredit.CCFUEFIN_ID';

	
	const CCTIPCAR_ID = 'cccredit.CCTIPCAR_ID';

	
	const CCSOLICI_ID = 'cccredit.CCSOLICI_ID';

	
	const CCTIPMON_ID = 'cccredit.CCTIPMON_ID';

	
	const CCBANCO_ID = 'cccredit.CCBANCO_ID';

	
	const CCAGENCI_ID = 'cccredit.CCAGENCI_ID';

	
	const CCPRIORIDAD_ID = 'cccredit.CCPRIORIDAD_ID';

	
	const CCCONDIC_ID = 'cccredit.CCCONDIC_ID';

	
	const OBSERV = 'cccredit.OBSERV';

	
	const CCTIPUPS_ID = 'cccredit.CCTIPUPS_ID';

	
	const NUMNOM = 'cccredit.NUMNOM';

	
	const CPCOMPRO_ID = 'cccredit.CPCOMPRO_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Numexp', 'Natcre', 'Destino', 'Monapr', 'Actapr', 'Fecapr', 'Apercue', 'Feccrecue', 'Numcue', 'Gentxt', 'Fecliq', 'Disdes', 'Estatu', 'CcbenefiId', 'CcfuefinId', 'CctipcarId', 'CcsoliciId', 'CctipmonId', 'CcbancoId', 'CcagenciId', 'CcprioridadId', 'CccondicId', 'Observ', 'CctipupsId', 'Numnom', 'CpcomproId', ),
		BasePeer::TYPE_COLNAME => array (CccreditPeer::ID, CccreditPeer::NUMEXP, CccreditPeer::NATCRE, CccreditPeer::DESTINO, CccreditPeer::MONAPR, CccreditPeer::ACTAPR, CccreditPeer::FECAPR, CccreditPeer::APERCUE, CccreditPeer::FECCRECUE, CccreditPeer::NUMCUE, CccreditPeer::GENTXT, CccreditPeer::FECLIQ, CccreditPeer::DISDES, CccreditPeer::ESTATU, CccreditPeer::CCBENEFI_ID, CccreditPeer::CCFUEFIN_ID, CccreditPeer::CCTIPCAR_ID, CccreditPeer::CCSOLICI_ID, CccreditPeer::CCTIPMON_ID, CccreditPeer::CCBANCO_ID, CccreditPeer::CCAGENCI_ID, CccreditPeer::CCPRIORIDAD_ID, CccreditPeer::CCCONDIC_ID, CccreditPeer::OBSERV, CccreditPeer::CCTIPUPS_ID, CccreditPeer::NUMNOM, CccreditPeer::CPCOMPRO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'numexp', 'natcre', 'destino', 'monapr', 'actapr', 'fecapr', 'apercue', 'feccrecue', 'numcue', 'gentxt', 'fecliq', 'disdes', 'estatu', 'ccbenefi_id', 'ccfuefin_id', 'cctipcar_id', 'ccsolici_id', 'cctipmon_id', 'ccbanco_id', 'ccagenci_id', 'ccprioridad_id', 'cccondic_id', 'observ', 'cctipups_id', 'numnom', 'cpcompro_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Numexp' => 1, 'Natcre' => 2, 'Destino' => 3, 'Monapr' => 4, 'Actapr' => 5, 'Fecapr' => 6, 'Apercue' => 7, 'Feccrecue' => 8, 'Numcue' => 9, 'Gentxt' => 10, 'Fecliq' => 11, 'Disdes' => 12, 'Estatu' => 13, 'CcbenefiId' => 14, 'CcfuefinId' => 15, 'CctipcarId' => 16, 'CcsoliciId' => 17, 'CctipmonId' => 18, 'CcbancoId' => 19, 'CcagenciId' => 20, 'CcprioridadId' => 21, 'CccondicId' => 22, 'Observ' => 23, 'CctipupsId' => 24, 'Numnom' => 25, 'CpcomproId' => 26, ),
		BasePeer::TYPE_COLNAME => array (CccreditPeer::ID => 0, CccreditPeer::NUMEXP => 1, CccreditPeer::NATCRE => 2, CccreditPeer::DESTINO => 3, CccreditPeer::MONAPR => 4, CccreditPeer::ACTAPR => 5, CccreditPeer::FECAPR => 6, CccreditPeer::APERCUE => 7, CccreditPeer::FECCRECUE => 8, CccreditPeer::NUMCUE => 9, CccreditPeer::GENTXT => 10, CccreditPeer::FECLIQ => 11, CccreditPeer::DISDES => 12, CccreditPeer::ESTATU => 13, CccreditPeer::CCBENEFI_ID => 14, CccreditPeer::CCFUEFIN_ID => 15, CccreditPeer::CCTIPCAR_ID => 16, CccreditPeer::CCSOLICI_ID => 17, CccreditPeer::CCTIPMON_ID => 18, CccreditPeer::CCBANCO_ID => 19, CccreditPeer::CCAGENCI_ID => 20, CccreditPeer::CCPRIORIDAD_ID => 21, CccreditPeer::CCCONDIC_ID => 22, CccreditPeer::OBSERV => 23, CccreditPeer::CCTIPUPS_ID => 24, CccreditPeer::NUMNOM => 25, CccreditPeer::CPCOMPRO_ID => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'numexp' => 1, 'natcre' => 2, 'destino' => 3, 'monapr' => 4, 'actapr' => 5, 'fecapr' => 6, 'apercue' => 7, 'feccrecue' => 8, 'numcue' => 9, 'gentxt' => 10, 'fecliq' => 11, 'disdes' => 12, 'estatu' => 13, 'ccbenefi_id' => 14, 'ccfuefin_id' => 15, 'cctipcar_id' => 16, 'ccsolici_id' => 17, 'cctipmon_id' => 18, 'ccbanco_id' => 19, 'ccagenci_id' => 20, 'ccprioridad_id' => 21, 'cccondic_id' => 22, 'observ' => 23, 'cctipups_id' => 24, 'numnom' => 25, 'cpcompro_id' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CccreditMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CccreditMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CccreditPeer::getTableMap();
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
		return str_replace(CccreditPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CccreditPeer::ID);

		$criteria->addSelectColumn(CccreditPeer::NUMEXP);

		$criteria->addSelectColumn(CccreditPeer::NATCRE);

		$criteria->addSelectColumn(CccreditPeer::DESTINO);

		$criteria->addSelectColumn(CccreditPeer::MONAPR);

		$criteria->addSelectColumn(CccreditPeer::ACTAPR);

		$criteria->addSelectColumn(CccreditPeer::FECAPR);

		$criteria->addSelectColumn(CccreditPeer::APERCUE);

		$criteria->addSelectColumn(CccreditPeer::FECCRECUE);

		$criteria->addSelectColumn(CccreditPeer::NUMCUE);

		$criteria->addSelectColumn(CccreditPeer::GENTXT);

		$criteria->addSelectColumn(CccreditPeer::FECLIQ);

		$criteria->addSelectColumn(CccreditPeer::DISDES);

		$criteria->addSelectColumn(CccreditPeer::ESTATU);

		$criteria->addSelectColumn(CccreditPeer::CCBENEFI_ID);

		$criteria->addSelectColumn(CccreditPeer::CCFUEFIN_ID);

		$criteria->addSelectColumn(CccreditPeer::CCTIPCAR_ID);

		$criteria->addSelectColumn(CccreditPeer::CCSOLICI_ID);

		$criteria->addSelectColumn(CccreditPeer::CCTIPMON_ID);

		$criteria->addSelectColumn(CccreditPeer::CCBANCO_ID);

		$criteria->addSelectColumn(CccreditPeer::CCAGENCI_ID);

		$criteria->addSelectColumn(CccreditPeer::CCPRIORIDAD_ID);

		$criteria->addSelectColumn(CccreditPeer::CCCONDIC_ID);

		$criteria->addSelectColumn(CccreditPeer::OBSERV);

		$criteria->addSelectColumn(CccreditPeer::CCTIPUPS_ID);

		$criteria->addSelectColumn(CccreditPeer::NUMNOM);

		$criteria->addSelectColumn(CccreditPeer::CPCOMPRO_ID);

	}

	const COUNT = 'COUNT(cccredit.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cccredit.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CccreditPeer::doSelectRS($criteria, $con);
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
		$objects = CccreditPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CccreditPeer::populateObjects(CccreditPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CccreditPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CccreditPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcfuefin(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCctipcar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCctipmon(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcbanco(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcagenci(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcprioridad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccondic(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCctipups(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpcompro(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);

		$rs = CccreditPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbenefiPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcbenefi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcfuefin(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcfuefinPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcfuefinPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcfuefin(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCctipcar(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipcarPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipcarPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipcar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
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

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoliciPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

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
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCctipmon(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipmonPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipmonPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipmon(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcbanco(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbancoPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcbancoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcbanco(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcagenci(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcagenciPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcagenciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcagenci(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcprioridad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcprioridadPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcprioridadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcprioridad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccondic(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccondicPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccondicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccondic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCctipups(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipupsPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipupsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipups(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpcompro(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpcomproPeer::addSelectColumns($c);

		$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpcomproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpcompro(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccredit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccredits();
				$obj2->addCccredit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	
		$rs = CccreditPeer::doSelectRS($criteria, $con);
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

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipcarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CctipmonPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcbancoPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcagenciPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CcprioridadPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CccondicPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CctipupsPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol13 = $startcol12 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	

							
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	

							
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipcar(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
				}
	

							
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolici(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	

							
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCctipmon(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	

							
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcbanco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	

							
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8 = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcagenci(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	

							
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9 = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCcprioridad(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	

							
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10 = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCccondic(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	

							
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11 = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCctipups(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
				}
	

							
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj12 = new $cls();
				$obj12->hydrate($rs, $startcol12);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj12 = $temp_obj1->getCpcompro(); 					if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
						$newObject = false;
						$temp_obj12->addCccredit($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj12->initCccredits();
					$obj12->addCccredit($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcbenefi(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcfuefin(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCctipcar(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCctipmon(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcbanco(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcagenci(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcprioridad(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccondic(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCctipups(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpcompro(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreditPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreditPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
			$rs = CccreditPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcfuefinPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcfuefinPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipcarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctipmonPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcbancoPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcagenciPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprioridadPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CctipupsPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcfuefin(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipcar(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcsolici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
				}
	
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCctipmon(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcbanco(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcagenci(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprioridad(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCctipups(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCpcompro(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcfuefin(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipcarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctipmonPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcbancoPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcagenciPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprioridadPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CctipupsPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipcar(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcsolici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
				}
	
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCctipmon(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcbanco(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcagenci(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprioridad(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCctipups(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCpcompro(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCctipcar(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctipmonPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcbancoPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcagenciPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprioridadPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CctipupsPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcsolici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
				}
	
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCctipmon(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcbanco(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcagenci(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprioridad(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCctipups(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCpcompro(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
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

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipcarPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CctipmonPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcbancoPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcagenciPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprioridadPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CctipupsPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipcar(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
				}
	
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCctipmon(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcbanco(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcagenci(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprioridad(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCctipups(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCpcompro(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCctipmon(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipcarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcbancoPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcagenciPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprioridadPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CctipupsPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipcar(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
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
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcbanco(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcagenci(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprioridad(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCctipups(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCpcompro(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcbanco(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipcarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CctipmonPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcagenciPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprioridadPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CctipupsPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipcar(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
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
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCctipmon(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcagenci(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprioridad(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCctipups(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCpcompro(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcagenci(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipcarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CctipmonPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcbancoPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcprioridadPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CctipupsPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipcar(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
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
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCctipmon(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcbanco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcprioridad(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCctipups(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCpcompro(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcprioridad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipcarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CctipmonPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcbancoPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcagenciPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CctipupsPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipcar(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
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
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCctipmon(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcbanco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcagenci(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCctipups(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCpcompro(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccondic(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipcarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CctipmonPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcbancoPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcagenciPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CcprioridadPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CctipupsPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipcar(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
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
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCctipmon(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcbanco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcagenci(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCcprioridad(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCctipups(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCpcompro(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCctipups(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipcarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CctipmonPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcbancoPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcagenciPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CcprioridadPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CccondicPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CPCOMPRO_ID, CpcomproPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipcar(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
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
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCctipmon(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcbanco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcagenci(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCcprioridad(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCccondic(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCpcompro(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpcompro(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreditPeer::addSelectColumns($c);
		$startcol2 = (CccreditPeer::NUM_COLUMNS - CccreditPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcfuefinPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcfuefinPeer::NUM_COLUMNS;
	
			CctipcarPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipcarPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			CctipmonPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CctipmonPeer::NUM_COLUMNS;
	
			CcbancoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcbancoPeer::NUM_COLUMNS;
	
			CcagenciPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcagenciPeer::NUM_COLUMNS;
	
			CcprioridadPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CcprioridadPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CccondicPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CctipupsPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreditPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CccreditPeer::CCFUEFIN_ID, CcfuefinPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPCAR_ID, CctipcarPeer::ID);
	
			$c->addJoin(CccreditPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPMON_ID, CctipmonPeer::ID);
	
			$c->addJoin(CccreditPeer::CCBANCO_ID, CcbancoPeer::ID);
	
			$c->addJoin(CccreditPeer::CCAGENCI_ID, CcagenciPeer::ID);
	
			$c->addJoin(CccreditPeer::CCPRIORIDAD_ID, CcprioridadPeer::ID);
	
			$c->addJoin(CccreditPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CccreditPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccredits();
					$obj2->addCccredit($obj1);
				}
	
				$omClass = CcfuefinPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcfuefin(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCccredits();
					$obj3->addCccredit($obj1);
				}
	
				$omClass = CctipcarPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipcar(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCccredits();
					$obj4->addCccredit($obj1);
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
						$temp_obj5->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCccredits();
					$obj5->addCccredit($obj1);
				}
	
				$omClass = CctipmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCctipmon(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCccredits();
					$obj6->addCccredit($obj1);
				}
	
				$omClass = CcbancoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcbanco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCccredits();
					$obj7->addCccredit($obj1);
				}
	
				$omClass = CcagenciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcagenci(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCccredits();
					$obj8->addCccredit($obj1);
				}
	
				$omClass = CcprioridadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCcprioridad(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCccredits();
					$obj9->addCccredit($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCccondic(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCccredits();
					$obj10->addCccredit($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCctipups(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCccredit($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCccredits();
					$obj11->addCccredit($obj1);
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
		return CccreditPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CccreditPeer::ID); 

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
			$comparison = $criteria->getComparison(CccreditPeer::ID);
			$selectCriteria->add(CccreditPeer::ID, $criteria->remove(CccreditPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CccreditPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CccreditPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cccredit) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CccreditPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cccredit $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CccreditPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CccreditPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CccreditPeer::DATABASE_NAME, CccreditPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CccreditPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CccreditPeer::DATABASE_NAME);

		$criteria->add(CccreditPeer::ID, $pk);


		$v = CccreditPeer::doSelect($criteria, $con);

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
			$criteria->add(CccreditPeer::ID, $pks, Criteria::IN);
			$objs = CccreditPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCccreditPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CccreditMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CccreditMapBuilder');
}
