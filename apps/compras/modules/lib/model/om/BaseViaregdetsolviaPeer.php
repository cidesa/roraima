<?php


abstract class BaseViaregdetsolviaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viaregdetsolvia';

	
	const CLASS_DEFAULT = 'lib.model.Viaregdetsolvia';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const VIAREGSOLVIA_ID = 'viaregdetsolvia.VIAREGSOLVIA_ID';

	
	const VIAREGENTE_ID = 'viaregdetsolvia.VIAREGENTE_ID';

	
	const VIAREGACT_ID = 'viaregdetsolvia.VIAREGACT_ID';

	
	const OCCIUDAD_ID = 'viaregdetsolvia.OCCIUDAD_ID';

	
	const CODMON = 'viaregdetsolvia.CODMON';

	
	const VALMON = 'viaregdetsolvia.VALMON';

	
	const FECHA_SAL = 'viaregdetsolvia.FECHA_SAL';

	
	const FECHA_REG = 'viaregdetsolvia.FECHA_REG';

	
	const NUM_DIA = 'viaregdetsolvia.NUM_DIA';

	
	const MONTO = 'viaregdetsolvia.MONTO';

	
	const ID = 'viaregdetsolvia.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ViaregsolviaId', 'ViaregenteId', 'ViaregactId', 'OcciudadId', 'Codmon', 'Valmon', 'FechaSal', 'FechaReg', 'NumDia', 'Monto', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregdetsolviaPeer::VIAREGACT_ID, ViaregdetsolviaPeer::OCCIUDAD_ID, ViaregdetsolviaPeer::CODMON, ViaregdetsolviaPeer::VALMON, ViaregdetsolviaPeer::FECHA_SAL, ViaregdetsolviaPeer::FECHA_REG, ViaregdetsolviaPeer::NUM_DIA, ViaregdetsolviaPeer::MONTO, ViaregdetsolviaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('viaregsolvia_id', 'viaregente_id', 'viaregact_id', 'occiudad_id', 'codmon', 'valmon', 'fecha_sal', 'fecha_reg', 'num_dia', 'monto', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ViaregsolviaId' => 0, 'ViaregenteId' => 1, 'ViaregactId' => 2, 'OcciudadId' => 3, 'Codmon' => 4, 'Valmon' => 5, 'FechaSal' => 6, 'FechaReg' => 7, 'NumDia' => 8, 'Monto' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (ViaregdetsolviaPeer::VIAREGSOLVIA_ID => 0, ViaregdetsolviaPeer::VIAREGENTE_ID => 1, ViaregdetsolviaPeer::VIAREGACT_ID => 2, ViaregdetsolviaPeer::OCCIUDAD_ID => 3, ViaregdetsolviaPeer::CODMON => 4, ViaregdetsolviaPeer::VALMON => 5, ViaregdetsolviaPeer::FECHA_SAL => 6, ViaregdetsolviaPeer::FECHA_REG => 7, ViaregdetsolviaPeer::NUM_DIA => 8, ViaregdetsolviaPeer::MONTO => 9, ViaregdetsolviaPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('viaregsolvia_id' => 0, 'viaregente_id' => 1, 'viaregact_id' => 2, 'occiudad_id' => 3, 'codmon' => 4, 'valmon' => 5, 'fecha_sal' => 6, 'fecha_reg' => 7, 'num_dia' => 8, 'monto' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViaregdetsolviaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViaregdetsolviaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViaregdetsolviaPeer::getTableMap();
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
		return str_replace(ViaregdetsolviaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViaregdetsolviaPeer::VIAREGSOLVIA_ID);

		$criteria->addSelectColumn(ViaregdetsolviaPeer::VIAREGENTE_ID);

		$criteria->addSelectColumn(ViaregdetsolviaPeer::VIAREGACT_ID);

		$criteria->addSelectColumn(ViaregdetsolviaPeer::OCCIUDAD_ID);

		$criteria->addSelectColumn(ViaregdetsolviaPeer::CODMON);

		$criteria->addSelectColumn(ViaregdetsolviaPeer::VALMON);

		$criteria->addSelectColumn(ViaregdetsolviaPeer::FECHA_SAL);

		$criteria->addSelectColumn(ViaregdetsolviaPeer::FECHA_REG);

		$criteria->addSelectColumn(ViaregdetsolviaPeer::NUM_DIA);

		$criteria->addSelectColumn(ViaregdetsolviaPeer::MONTO);

		$criteria->addSelectColumn(ViaregdetsolviaPeer::ID);

	}

	const COUNT = 'COUNT(viaregdetsolvia.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viaregdetsolvia.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViaregdetsolviaPeer::doSelectRS($criteria, $con);
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
		$objects = ViaregdetsolviaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViaregdetsolviaPeer::populateObjects(ViaregdetsolviaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViaregdetsolviaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViaregdetsolviaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinViaregsolvia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregsolviaPeer::ID);

		$rs = ViaregdetsolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinViaregente(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregentePeer::ID);

		$rs = ViaregdetsolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinViaregact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGACT_ID, ViaregactPeer::ID);

		$rs = ViaregdetsolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinOcciudad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetsolviaPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$rs = ViaregdetsolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinViaregsolvia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol = (ViaregdetsolviaPeer::NUM_COLUMNS - ViaregdetsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ViaregsolviaPeer::addSelectColumns($c);

		$c->addJoin(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregsolviaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getViaregsolvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addViaregdetsolvia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initViaregdetsolvias();
				$obj2->addViaregdetsolvia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinViaregente(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol = (ViaregdetsolviaPeer::NUM_COLUMNS - ViaregdetsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ViaregentePeer::addSelectColumns($c);

		$c->addJoin(ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregentePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregentePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getViaregente(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addViaregdetsolvia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initViaregdetsolvias();
				$obj2->addViaregdetsolvia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinViaregact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol = (ViaregdetsolviaPeer::NUM_COLUMNS - ViaregdetsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ViaregactPeer::addSelectColumns($c);

		$c->addJoin(ViaregdetsolviaPeer::VIAREGACT_ID, ViaregactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getViaregact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addViaregdetsolvia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initViaregdetsolvias();
				$obj2->addViaregdetsolvia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinOcciudad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol = (ViaregdetsolviaPeer::NUM_COLUMNS - ViaregdetsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OcciudadPeer::addSelectColumns($c);

		$c->addJoin(ViaregdetsolviaPeer::OCCIUDAD_ID, OcciudadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OcciudadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOcciudad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addViaregdetsolvia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initViaregdetsolvias();
				$obj2->addViaregdetsolvia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregsolviaPeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregentePeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGACT_ID, ViaregactPeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$rs = ViaregdetsolviaPeer::doSelectRS($criteria, $con);
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

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol2 = (ViaregdetsolviaPeer::NUM_COLUMNS - ViaregdetsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregsolviaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregsolviaPeer::NUM_COLUMNS;

		ViaregentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ViaregentePeer::NUM_COLUMNS;

		ViaregactPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ViaregactPeer::NUM_COLUMNS;

		OcciudadPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + OcciudadPeer::NUM_COLUMNS;

		$c->addJoin(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregsolviaPeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregentePeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::VIAREGACT_ID, ViaregactPeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetsolviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ViaregsolviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregsolvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViaregdetsolvia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initViaregdetsolvias();
				$obj2->addViaregdetsolvia($obj1);
			}


					
			$omClass = ViaregentePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getViaregente(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addViaregdetsolvia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initViaregdetsolvias();
				$obj3->addViaregdetsolvia($obj1);
			}


					
			$omClass = ViaregactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getViaregact(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addViaregdetsolvia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initViaregdetsolvias();
				$obj4->addViaregdetsolvia($obj1);
			}


					
			$omClass = OcciudadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getOcciudad(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addViaregdetsolvia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initViaregdetsolvias();
				$obj5->addViaregdetsolvia($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptViaregsolvia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregentePeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGACT_ID, ViaregactPeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$rs = ViaregdetsolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptViaregente(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregsolviaPeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGACT_ID, ViaregactPeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$rs = ViaregdetsolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptViaregact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregsolviaPeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregentePeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::OCCIUDAD_ID, OcciudadPeer::ID);

		$rs = ViaregdetsolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptOcciudad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregsolviaPeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregentePeer::ID);

		$criteria->addJoin(ViaregdetsolviaPeer::VIAREGACT_ID, ViaregactPeer::ID);

		$rs = ViaregdetsolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptViaregsolvia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol2 = (ViaregdetsolviaPeer::NUM_COLUMNS - ViaregdetsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregentePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregentePeer::NUM_COLUMNS;

		ViaregactPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ViaregactPeer::NUM_COLUMNS;

		OcciudadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + OcciudadPeer::NUM_COLUMNS;

		$c->addJoin(ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregentePeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::VIAREGACT_ID, ViaregactPeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::OCCIUDAD_ID, OcciudadPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregentePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregente(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initViaregdetsolvias();
				$obj2->addViaregdetsolvia($obj1);
			}

			$omClass = ViaregactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getViaregact(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initViaregdetsolvias();
				$obj3->addViaregdetsolvia($obj1);
			}

			$omClass = OcciudadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getOcciudad(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initViaregdetsolvias();
				$obj4->addViaregdetsolvia($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptViaregente(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol2 = (ViaregdetsolviaPeer::NUM_COLUMNS - ViaregdetsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregsolviaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregsolviaPeer::NUM_COLUMNS;

		ViaregactPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ViaregactPeer::NUM_COLUMNS;

		OcciudadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + OcciudadPeer::NUM_COLUMNS;

		$c->addJoin(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregsolviaPeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::VIAREGACT_ID, ViaregactPeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::OCCIUDAD_ID, OcciudadPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregsolviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregsolvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initViaregdetsolvias();
				$obj2->addViaregdetsolvia($obj1);
			}

			$omClass = ViaregactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getViaregact(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initViaregdetsolvias();
				$obj3->addViaregdetsolvia($obj1);
			}

			$omClass = OcciudadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getOcciudad(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initViaregdetsolvias();
				$obj4->addViaregdetsolvia($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptViaregact(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol2 = (ViaregdetsolviaPeer::NUM_COLUMNS - ViaregdetsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregsolviaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregsolviaPeer::NUM_COLUMNS;

		ViaregentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ViaregentePeer::NUM_COLUMNS;

		OcciudadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + OcciudadPeer::NUM_COLUMNS;

		$c->addJoin(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregsolviaPeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregentePeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::OCCIUDAD_ID, OcciudadPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregsolviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregsolvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initViaregdetsolvias();
				$obj2->addViaregdetsolvia($obj1);
			}

			$omClass = ViaregentePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getViaregente(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initViaregdetsolvias();
				$obj3->addViaregdetsolvia($obj1);
			}

			$omClass = OcciudadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getOcciudad(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initViaregdetsolvias();
				$obj4->addViaregdetsolvia($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptOcciudad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol2 = (ViaregdetsolviaPeer::NUM_COLUMNS - ViaregdetsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregsolviaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregsolviaPeer::NUM_COLUMNS;

		ViaregentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ViaregentePeer::NUM_COLUMNS;

		ViaregactPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ViaregactPeer::NUM_COLUMNS;

		$c->addJoin(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, ViaregsolviaPeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::VIAREGENTE_ID, ViaregentePeer::ID);

		$c->addJoin(ViaregdetsolviaPeer::VIAREGACT_ID, ViaregactPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregsolviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregsolvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initViaregdetsolvias();
				$obj2->addViaregdetsolvia($obj1);
			}

			$omClass = ViaregentePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getViaregente(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initViaregdetsolvias();
				$obj3->addViaregdetsolvia($obj1);
			}

			$omClass = ViaregactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getViaregact(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addViaregdetsolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initViaregdetsolvias();
				$obj4->addViaregdetsolvia($obj1);
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
		return ViaregdetsolviaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViaregdetsolviaPeer::ID); 

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
			$comparison = $criteria->getComparison(ViaregdetsolviaPeer::ID);
			$selectCriteria->add(ViaregdetsolviaPeer::ID, $criteria->remove(ViaregdetsolviaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViaregdetsolviaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViaregdetsolviaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viaregdetsolvia) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViaregdetsolviaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viaregdetsolvia $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViaregdetsolviaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViaregdetsolviaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViaregdetsolviaPeer::DATABASE_NAME, ViaregdetsolviaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViaregdetsolviaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViaregdetsolviaPeer::DATABASE_NAME);

		$criteria->add(ViaregdetsolviaPeer::ID, $pk);


		$v = ViaregdetsolviaPeer::doSelect($criteria, $con);

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
			$criteria->add(ViaregdetsolviaPeer::ID, $pks, Criteria::IN);
			$objs = ViaregdetsolviaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViaregdetsolviaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViaregdetsolviaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViaregdetsolviaMapBuilder');
}
