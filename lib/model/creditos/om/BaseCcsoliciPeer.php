<?php


abstract class BaseCcsoliciPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccsolici';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccsolici';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccsolici.ID';

	
	const NUMSOL = 'ccsolici.NUMSOL';

	
	const MONSOL = 'ccsolici.MONSOL';

	
	const FECSOL = 'ccsolici.FECSOL';

	
	const OBSBIE = 'ccsolici.OBSBIE';

	
	const FECREV = 'ccsolici.FECREV';

	
	const NOMREV = 'ccsolici.NOMREV';

	
	const CARREV = 'ccsolici.CARREV';

	
	const OBSERV = 'ccsolici.OBSERV';

	
	const ACTAPR = 'ccsolici.ACTAPR';

	
	const FECAPR = 'ccsolici.FECAPR';

	
	const NOMCOR = 'ccsolici.NOMCOR';

	
	const EXISTEAVAL = 'ccsolici.EXISTEAVAL';

	
	const ESTATU = 'ccsolici.ESTATU';

	
	const CCBENEFI_ID = 'ccsolici.CCBENEFI_ID';

	
	const CCUSUARIO_ID = 'ccsolici.CCUSUARIO_ID';

	
	const CCCIUDAD_ID = 'ccsolici.CCCIUDAD_ID';

	
	const CCMUNICI_ID = 'ccsolici.CCMUNICI_ID';

	
	const CCCIRCUITO_ID = 'ccsolici.CCCIRCUITO_ID';

	
	const CCCONDIC_ID = 'ccsolici.CCCONDIC_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Numsol', 'Monsol', 'Fecsol', 'Obsbie', 'Fecrev', 'Nomrev', 'Carrev', 'Observ', 'Actapr', 'Fecapr', 'Nomcor', 'Existeaval', 'Estatu', 'CcbenefiId', 'CcusuarioId', 'CcciudadId', 'CcmuniciId', 'CccircuitoId', 'CccondicId', ),
		BasePeer::TYPE_COLNAME => array (CcsoliciPeer::ID, CcsoliciPeer::NUMSOL, CcsoliciPeer::MONSOL, CcsoliciPeer::FECSOL, CcsoliciPeer::OBSBIE, CcsoliciPeer::FECREV, CcsoliciPeer::NOMREV, CcsoliciPeer::CARREV, CcsoliciPeer::OBSERV, CcsoliciPeer::ACTAPR, CcsoliciPeer::FECAPR, CcsoliciPeer::NOMCOR, CcsoliciPeer::EXISTEAVAL, CcsoliciPeer::ESTATU, CcsoliciPeer::CCBENEFI_ID, CcsoliciPeer::CCUSUARIO_ID, CcsoliciPeer::CCCIUDAD_ID, CcsoliciPeer::CCMUNICI_ID, CcsoliciPeer::CCCIRCUITO_ID, CcsoliciPeer::CCCONDIC_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'numsol', 'monsol', 'fecsol', 'obsbie', 'fecrev', 'nomrev', 'carrev', 'observ', 'actapr', 'fecapr', 'nomcor', 'existeaval', 'estatu', 'ccbenefi_id', 'ccusuario_id', 'ccciudad_id', 'ccmunici_id', 'cccircuito_id', 'cccondic_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Numsol' => 1, 'Monsol' => 2, 'Fecsol' => 3, 'Obsbie' => 4, 'Fecrev' => 5, 'Nomrev' => 6, 'Carrev' => 7, 'Observ' => 8, 'Actapr' => 9, 'Fecapr' => 10, 'Nomcor' => 11, 'Existeaval' => 12, 'Estatu' => 13, 'CcbenefiId' => 14, 'CcusuarioId' => 15, 'CcciudadId' => 16, 'CcmuniciId' => 17, 'CccircuitoId' => 18, 'CccondicId' => 19, ),
		BasePeer::TYPE_COLNAME => array (CcsoliciPeer::ID => 0, CcsoliciPeer::NUMSOL => 1, CcsoliciPeer::MONSOL => 2, CcsoliciPeer::FECSOL => 3, CcsoliciPeer::OBSBIE => 4, CcsoliciPeer::FECREV => 5, CcsoliciPeer::NOMREV => 6, CcsoliciPeer::CARREV => 7, CcsoliciPeer::OBSERV => 8, CcsoliciPeer::ACTAPR => 9, CcsoliciPeer::FECAPR => 10, CcsoliciPeer::NOMCOR => 11, CcsoliciPeer::EXISTEAVAL => 12, CcsoliciPeer::ESTATU => 13, CcsoliciPeer::CCBENEFI_ID => 14, CcsoliciPeer::CCUSUARIO_ID => 15, CcsoliciPeer::CCCIUDAD_ID => 16, CcsoliciPeer::CCMUNICI_ID => 17, CcsoliciPeer::CCCIRCUITO_ID => 18, CcsoliciPeer::CCCONDIC_ID => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'numsol' => 1, 'monsol' => 2, 'fecsol' => 3, 'obsbie' => 4, 'fecrev' => 5, 'nomrev' => 6, 'carrev' => 7, 'observ' => 8, 'actapr' => 9, 'fecapr' => 10, 'nomcor' => 11, 'existeaval' => 12, 'estatu' => 13, 'ccbenefi_id' => 14, 'ccusuario_id' => 15, 'ccciudad_id' => 16, 'ccmunici_id' => 17, 'cccircuito_id' => 18, 'cccondic_id' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcsoliciMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcsoliciMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcsoliciPeer::getTableMap();
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
		return str_replace(CcsoliciPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcsoliciPeer::ID);

		$criteria->addSelectColumn(CcsoliciPeer::NUMSOL);

		$criteria->addSelectColumn(CcsoliciPeer::MONSOL);

		$criteria->addSelectColumn(CcsoliciPeer::FECSOL);

		$criteria->addSelectColumn(CcsoliciPeer::OBSBIE);

		$criteria->addSelectColumn(CcsoliciPeer::FECREV);

		$criteria->addSelectColumn(CcsoliciPeer::NOMREV);

		$criteria->addSelectColumn(CcsoliciPeer::CARREV);

		$criteria->addSelectColumn(CcsoliciPeer::OBSERV);

		$criteria->addSelectColumn(CcsoliciPeer::ACTAPR);

		$criteria->addSelectColumn(CcsoliciPeer::FECAPR);

		$criteria->addSelectColumn(CcsoliciPeer::NOMCOR);

		$criteria->addSelectColumn(CcsoliciPeer::EXISTEAVAL);

		$criteria->addSelectColumn(CcsoliciPeer::ESTATU);

		$criteria->addSelectColumn(CcsoliciPeer::CCBENEFI_ID);

		$criteria->addSelectColumn(CcsoliciPeer::CCUSUARIO_ID);

		$criteria->addSelectColumn(CcsoliciPeer::CCCIUDAD_ID);

		$criteria->addSelectColumn(CcsoliciPeer::CCMUNICI_ID);

		$criteria->addSelectColumn(CcsoliciPeer::CCCIRCUITO_ID);

		$criteria->addSelectColumn(CcsoliciPeer::CCCONDIC_ID);

	}

	const COUNT = 'COUNT(ccsolici.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccsolici.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcsoliciPeer::doSelectRS($criteria, $con);
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
		$objects = CcsoliciPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcsoliciPeer::populateObjects(CcsoliciPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcsoliciPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcsoliciPeer::getOMClass();
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
			$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);

		$rs = CcsoliciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcusuario(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);

		$rs = CcsoliciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcciudad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);

		$rs = CcsoliciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcmunici(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);

		$rs = CcsoliciPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccircuito(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);

		$rs = CcsoliciPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);

		$rs = CcsoliciPeer::doSelectRS($criteria, $con);
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

		CcsoliciPeer::addSelectColumns($c);
		$startcol = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcbenefiPeer::addSelectColumns($c);

		$c->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

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
										$temp_obj2->addCcsolici($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolicis();
				$obj2->addCcsolici($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcusuario(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoliciPeer::addSelectColumns($c);
		$startcol = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcusuarioPeer::addSelectColumns($c);

		$c->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcusuarioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcusuario(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolici($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolicis();
				$obj2->addCcsolici($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcciudad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoliciPeer::addSelectColumns($c);
		$startcol = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcciudadPeer::addSelectColumns($c);

		$c->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcciudadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcciudad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolici($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolicis();
				$obj2->addCcsolici($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcmunici(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoliciPeer::addSelectColumns($c);
		$startcol = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcmuniciPeer::addSelectColumns($c);

		$c->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcmuniciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcmunici(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolici($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolicis();
				$obj2->addCcsolici($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccircuito(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoliciPeer::addSelectColumns($c);
		$startcol = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccircuitoPeer::addSelectColumns($c);

		$c->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccircuitoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccircuito(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcsolici($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolicis();
				$obj2->addCcsolici($obj1); 			}
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

		CcsoliciPeer::addSelectColumns($c);
		$startcol = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccondicPeer::addSelectColumns($c);

		$c->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

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
										$temp_obj2->addCcsolici($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcsolicis();
				$obj2->addCcsolici($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcsoliciPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$criteria->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
			$criteria->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	
			$criteria->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
	
			$criteria->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
	
			$criteria->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
	
		$rs = CcsoliciPeer::doSelectRS($criteria, $con);
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

		CcsoliciPeer::addSelectColumns($c);
		$startcol2 = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuarioPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcciudadPeer::NUM_COLUMNS;
	
			CcmuniciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcmuniciPeer::NUM_COLUMNS;
	
			CccircuitoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccircuitoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CccondicPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();


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
						$temp_obj2->addCcsolici($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolicis();
					$obj2->addCcsolici($obj1);
				}
	

							
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuario(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolici($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolicis();
					$obj3->addCcsolici($obj1);
				}
	

							
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcciudad(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolici($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolicis();
					$obj4->addCcsolici($obj1);
				}
	

							
				$omClass = CcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcmunici(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcsolici($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcsolicis();
					$obj5->addCcsolici($obj1);
				}
	

							
				$omClass = CccircuitoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccircuito(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcsolici($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcsolicis();
					$obj6->addCcsolici($obj1);
				}
	

							
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCccondic(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcsolici($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initCcsolicis();
					$obj7->addCcsolici($obj1);
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
				$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsoliciPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
		
			$rs = CcsoliciPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcusuario(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsoliciPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
		
			$rs = CcsoliciPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcciudad(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsoliciPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
		
			$rs = CcsoliciPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcmunici(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsoliciPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
		
			$rs = CcsoliciPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccircuito(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsoliciPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
		
			$rs = CcsoliciPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcsoliciPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcsoliciPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
		
				$criteria->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
		
			$rs = CcsoliciPeer::doSelectRS($criteria, $con);
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

		CcsoliciPeer::addSelectColumns($c);
		$startcol2 = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcusuarioPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcusuarioPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcciudadPeer::NUM_COLUMNS;
	
			CcmuniciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcmuniciPeer::NUM_COLUMNS;
	
			CccircuitoPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccircuitoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccondicPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcusuario(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolicis();
					$obj2->addCcsolici($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcciudad(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolicis();
					$obj3->addCcsolici($obj1);
				}
	
				$omClass = CcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcmunici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolicis();
					$obj4->addCcsolici($obj1);
				}
	
				$omClass = CccircuitoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccircuito(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcsolicis();
					$obj5->addCcsolici($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccondic(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcsolicis();
					$obj6->addCcsolici($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcusuario(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoliciPeer::addSelectColumns($c);
		$startcol2 = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcciudadPeer::NUM_COLUMNS;
	
			CcmuniciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcmuniciPeer::NUM_COLUMNS;
	
			CccircuitoPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccircuitoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccondicPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

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
						$temp_obj2->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolicis();
					$obj2->addCcsolici($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcciudad(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolicis();
					$obj3->addCcsolici($obj1);
				}
	
				$omClass = CcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcmunici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolicis();
					$obj4->addCcsolici($obj1);
				}
	
				$omClass = CccircuitoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccircuito(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcsolicis();
					$obj5->addCcsolici($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccondic(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcsolicis();
					$obj6->addCcsolici($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcciudad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoliciPeer::addSelectColumns($c);
		$startcol2 = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuarioPeer::NUM_COLUMNS;
	
			CcmuniciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcmuniciPeer::NUM_COLUMNS;
	
			CccircuitoPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccircuitoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccondicPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

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
						$temp_obj2->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolicis();
					$obj2->addCcsolici($obj1);
				}
	
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuario(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolicis();
					$obj3->addCcsolici($obj1);
				}
	
				$omClass = CcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcmunici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolicis();
					$obj4->addCcsolici($obj1);
				}
	
				$omClass = CccircuitoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccircuito(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcsolicis();
					$obj5->addCcsolici($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccondic(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcsolicis();
					$obj6->addCcsolici($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcmunici(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoliciPeer::addSelectColumns($c);
		$startcol2 = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuarioPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcciudadPeer::NUM_COLUMNS;
	
			CccircuitoPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CccircuitoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccondicPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

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
						$temp_obj2->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolicis();
					$obj2->addCcsolici($obj1);
				}
	
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuario(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolicis();
					$obj3->addCcsolici($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcciudad(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolicis();
					$obj4->addCcsolici($obj1);
				}
	
				$omClass = CccircuitoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCccircuito(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcsolicis();
					$obj5->addCcsolici($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccondic(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcsolicis();
					$obj6->addCcsolici($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccircuito(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcsoliciPeer::addSelectColumns($c);
		$startcol2 = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuarioPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcciudadPeer::NUM_COLUMNS;
	
			CcmuniciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcmuniciPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccondicPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCONDIC_ID, CccondicPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

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
						$temp_obj2->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolicis();
					$obj2->addCcsolici($obj1);
				}
	
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuario(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolicis();
					$obj3->addCcsolici($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcciudad(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolicis();
					$obj4->addCcsolici($obj1);
				}
	
				$omClass = CcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcmunici(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcsolicis();
					$obj5->addCcsolici($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccondic(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcsolicis();
					$obj6->addCcsolici($obj1);
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

		CcsoliciPeer::addSelectColumns($c);
		$startcol2 = (CcsoliciPeer::NUM_COLUMNS - CcsoliciPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcbenefiPeer::NUM_COLUMNS;
	
			CcusuarioPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcusuarioPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcciudadPeer::NUM_COLUMNS;
	
			CcmuniciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcmuniciPeer::NUM_COLUMNS;
	
			CccircuitoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CccircuitoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcsoliciPeer::CCBENEFI_ID, CcbenefiPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCUSUARIO_ID, CcusuarioPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCMUNICI_ID, CcmuniciPeer::ID);
	
			$c->addJoin(CcsoliciPeer::CCCIRCUITO_ID, CccircuitoPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcsoliciPeer::getOMClass();

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
						$temp_obj2->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcsolicis();
					$obj2->addCcsolici($obj1);
				}
	
				$omClass = CcusuarioPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcusuario(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcsolicis();
					$obj3->addCcsolici($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcciudad(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcsolicis();
					$obj4->addCcsolici($obj1);
				}
	
				$omClass = CcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcmunici(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcsolicis();
					$obj5->addCcsolici($obj1);
				}
	
				$omClass = CccircuitoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCccircuito(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcsolici($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcsolicis();
					$obj6->addCcsolici($obj1);
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
		return CcsoliciPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcsoliciPeer::ID); 

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
			$comparison = $criteria->getComparison(CcsoliciPeer::ID);
			$selectCriteria->add(CcsoliciPeer::ID, $criteria->remove(CcsoliciPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcsoliciPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcsoliciPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccsolici) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcsoliciPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccsolici $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcsoliciPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcsoliciPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcsoliciPeer::DATABASE_NAME, CcsoliciPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcsoliciPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcsoliciPeer::DATABASE_NAME);

		$criteria->add(CcsoliciPeer::ID, $pk);


		$v = CcsoliciPeer::doSelect($criteria, $con);

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
			$criteria->add(CcsoliciPeer::ID, $pks, Criteria::IN);
			$objs = CcsoliciPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcsoliciPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcsoliciMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcsoliciMapBuilder');
}
