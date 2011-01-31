<?php


abstract class BaseAtpresupuestoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atpresupuesto';

	
	const CLASS_DEFAULT = 'lib.model.ciudadanos.Atpresupuesto';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ATAYUDAS_ID = 'atpresupuesto.ATAYUDAS_ID';

	
	const ATPROVEE1 = 'atpresupuesto.ATPROVEE1';

	
	const MONTO1 = 'atpresupuesto.MONTO1';

	
	const ATPROVEE2 = 'atpresupuesto.ATPROVEE2';

	
	const MONTO2 = 'atpresupuesto.MONTO2';

	
	const ATPROVEE3 = 'atpresupuesto.ATPROVEE3';

	
	const MONTO3 = 'atpresupuesto.MONTO3';

	
	const ATPROVEE4 = 'atpresupuesto.ATPROVEE4';

	
	const MONTO4 = 'atpresupuesto.MONTO4';

	
	const ATPROVEE5 = 'atpresupuesto.ATPROVEE5';

	
	const MONTO5 = 'atpresupuesto.MONTO5';

	
	const ATPROVEE6 = 'atpresupuesto.ATPROVEE6';

	
	const MONTO6 = 'atpresupuesto.MONTO6';

	
	const ID = 'atpresupuesto.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId', 'Atprovee1', 'Monto1', 'Atprovee2', 'Monto2', 'Atprovee3', 'Monto3', 'Atprovee4', 'Monto4', 'Atprovee5', 'Monto5', 'Atprovee6', 'Monto6', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtpresupuestoPeer::ATAYUDAS_ID, AtpresupuestoPeer::ATPROVEE1, AtpresupuestoPeer::MONTO1, AtpresupuestoPeer::ATPROVEE2, AtpresupuestoPeer::MONTO2, AtpresupuestoPeer::ATPROVEE3, AtpresupuestoPeer::MONTO3, AtpresupuestoPeer::ATPROVEE4, AtpresupuestoPeer::MONTO4, AtpresupuestoPeer::ATPROVEE5, AtpresupuestoPeer::MONTO5, AtpresupuestoPeer::ATPROVEE6, AtpresupuestoPeer::MONTO6, AtpresupuestoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id', 'atprovee1', 'monto1', 'atprovee2', 'monto2', 'atprovee3', 'monto3', 'atprovee4', 'monto4', 'atprovee5', 'monto5', 'atprovee6', 'monto6', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId' => 0, 'Atprovee1' => 1, 'Monto1' => 2, 'Atprovee2' => 3, 'Monto2' => 4, 'Atprovee3' => 5, 'Monto3' => 6, 'Atprovee4' => 7, 'Monto4' => 8, 'Atprovee5' => 9, 'Monto5' => 10, 'Atprovee6' => 11, 'Monto6' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (AtpresupuestoPeer::ATAYUDAS_ID => 0, AtpresupuestoPeer::ATPROVEE1 => 1, AtpresupuestoPeer::MONTO1 => 2, AtpresupuestoPeer::ATPROVEE2 => 3, AtpresupuestoPeer::MONTO2 => 4, AtpresupuestoPeer::ATPROVEE3 => 5, AtpresupuestoPeer::MONTO3 => 6, AtpresupuestoPeer::ATPROVEE4 => 7, AtpresupuestoPeer::MONTO4 => 8, AtpresupuestoPeer::ATPROVEE5 => 9, AtpresupuestoPeer::MONTO5 => 10, AtpresupuestoPeer::ATPROVEE6 => 11, AtpresupuestoPeer::MONTO6 => 12, AtpresupuestoPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id' => 0, 'atprovee1' => 1, 'monto1' => 2, 'atprovee2' => 3, 'monto2' => 4, 'atprovee3' => 5, 'monto3' => 6, 'atprovee4' => 7, 'monto4' => 8, 'atprovee5' => 9, 'monto5' => 10, 'atprovee6' => 11, 'monto6' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/ciudadanos/map/AtpresupuestoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.ciudadanos.map.AtpresupuestoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtpresupuestoPeer::getTableMap();
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
		return str_replace(AtpresupuestoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtpresupuestoPeer::ATAYUDAS_ID);

		$criteria->addSelectColumn(AtpresupuestoPeer::ATPROVEE1);

		$criteria->addSelectColumn(AtpresupuestoPeer::MONTO1);

		$criteria->addSelectColumn(AtpresupuestoPeer::ATPROVEE2);

		$criteria->addSelectColumn(AtpresupuestoPeer::MONTO2);

		$criteria->addSelectColumn(AtpresupuestoPeer::ATPROVEE3);

		$criteria->addSelectColumn(AtpresupuestoPeer::MONTO3);

		$criteria->addSelectColumn(AtpresupuestoPeer::ATPROVEE4);

		$criteria->addSelectColumn(AtpresupuestoPeer::MONTO4);

		$criteria->addSelectColumn(AtpresupuestoPeer::ATPROVEE5);

		$criteria->addSelectColumn(AtpresupuestoPeer::MONTO5);

		$criteria->addSelectColumn(AtpresupuestoPeer::ATPROVEE6);

		$criteria->addSelectColumn(AtpresupuestoPeer::MONTO6);

		$criteria->addSelectColumn(AtpresupuestoPeer::ID);

	}

	const COUNT = 'COUNT(atpresupuesto.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atpresupuesto.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
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
		$objects = AtpresupuestoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtpresupuestoPeer::populateObjects(AtpresupuestoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtpresupuestoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtpresupuestoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAtayudas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtproveeRelatedByAtprovee1(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtpresupuestoPeer::ATPROVEE1, AtproveePeer::ID);

		$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtproveeRelatedByAtprovee2(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtpresupuestoPeer::ATPROVEE2, AtproveePeer::ID);

		$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtproveeRelatedByAtprovee3(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtpresupuestoPeer::ATPROVEE3, AtproveePeer::ID);

		$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtproveeRelatedByAtprovee4(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtpresupuestoPeer::ATPROVEE4, AtproveePeer::ID);

		$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtproveeRelatedByAtprovee5(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtpresupuestoPeer::ATPROVEE5, AtproveePeer::ID);

		$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtproveeRelatedByAtprovee6(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtpresupuestoPeer::ATPROVEE6, AtproveePeer::ID);

		$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAtayudas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtayudasPeer::addSelectColumns($c);

		$c->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtayudas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtpresupuesto($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtpresupuestos();
				$obj2->addAtpresupuesto($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtproveeRelatedByAtprovee1(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtproveePeer::addSelectColumns($c);

		$c->addJoin(AtpresupuestoPeer::ATPROVEE1, AtproveePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtproveePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtproveeRelatedByAtprovee1(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtpresupuestoRelatedByAtprovee1($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtpresupuestosRelatedByAtprovee1();
				$obj2->addAtpresupuestoRelatedByAtprovee1($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtproveeRelatedByAtprovee2(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtproveePeer::addSelectColumns($c);

		$c->addJoin(AtpresupuestoPeer::ATPROVEE2, AtproveePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtproveePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtproveeRelatedByAtprovee2(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtpresupuestoRelatedByAtprovee2($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtpresupuestosRelatedByAtprovee2();
				$obj2->addAtpresupuestoRelatedByAtprovee2($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtproveeRelatedByAtprovee3(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtproveePeer::addSelectColumns($c);

		$c->addJoin(AtpresupuestoPeer::ATPROVEE3, AtproveePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtproveePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtproveeRelatedByAtprovee3(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtpresupuestoRelatedByAtprovee3($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtpresupuestosRelatedByAtprovee3();
				$obj2->addAtpresupuestoRelatedByAtprovee3($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtproveeRelatedByAtprovee4(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtproveePeer::addSelectColumns($c);

		$c->addJoin(AtpresupuestoPeer::ATPROVEE4, AtproveePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtproveePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtproveeRelatedByAtprovee4(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtpresupuestoRelatedByAtprovee4($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtpresupuestosRelatedByAtprovee4();
				$obj2->addAtpresupuestoRelatedByAtprovee4($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtproveeRelatedByAtprovee5(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtproveePeer::addSelectColumns($c);

		$c->addJoin(AtpresupuestoPeer::ATPROVEE5, AtproveePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtproveePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtproveeRelatedByAtprovee5(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtpresupuestoRelatedByAtprovee5($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtpresupuestosRelatedByAtprovee5();
				$obj2->addAtpresupuestoRelatedByAtprovee5($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtproveeRelatedByAtprovee6(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtproveePeer::addSelectColumns($c);

		$c->addJoin(AtpresupuestoPeer::ATPROVEE6, AtproveePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtproveePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtproveeRelatedByAtprovee6(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtpresupuestoRelatedByAtprovee6($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtpresupuestosRelatedByAtprovee6();
				$obj2->addAtpresupuestoRelatedByAtprovee6($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$criteria->addJoin(AtpresupuestoPeer::ATPROVEE1, AtproveePeer::ID);
	
			$criteria->addJoin(AtpresupuestoPeer::ATPROVEE2, AtproveePeer::ID);
	
			$criteria->addJoin(AtpresupuestoPeer::ATPROVEE3, AtproveePeer::ID);
	
			$criteria->addJoin(AtpresupuestoPeer::ATPROVEE4, AtproveePeer::ID);
	
			$criteria->addJoin(AtpresupuestoPeer::ATPROVEE5, AtproveePeer::ID);
	
			$criteria->addJoin(AtpresupuestoPeer::ATPROVEE6, AtproveePeer::ID);
	
		$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
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

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol2 = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtproveePeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AtproveePeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol6 = $startcol5 + AtproveePeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol7 = $startcol6 + AtproveePeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol8 = $startcol7 + AtproveePeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol9 = $startcol8 + AtproveePeer::NUM_COLUMNS;
	
			$c->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE1, AtproveePeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE2, AtproveePeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE3, AtproveePeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE4, AtproveePeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE5, AtproveePeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE6, AtproveePeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtpresupuesto($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initAtpresupuestos();
					$obj2->addAtpresupuesto($obj1);
				}
	

							
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtproveeRelatedByAtprovee1(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtpresupuestoRelatedByAtprovee1($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initAtpresupuestosRelatedByAtprovee1();
					$obj3->addAtpresupuestoRelatedByAtprovee1($obj1);
				}
	

							
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAtproveeRelatedByAtprovee2(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtpresupuestoRelatedByAtprovee2($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initAtpresupuestosRelatedByAtprovee2();
					$obj4->addAtpresupuestoRelatedByAtprovee2($obj1);
				}
	

							
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getAtproveeRelatedByAtprovee3(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addAtpresupuestoRelatedByAtprovee3($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initAtpresupuestosRelatedByAtprovee3();
					$obj5->addAtpresupuestoRelatedByAtprovee3($obj1);
				}
	

							
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getAtproveeRelatedByAtprovee4(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addAtpresupuestoRelatedByAtprovee4($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initAtpresupuestosRelatedByAtprovee4();
					$obj6->addAtpresupuestoRelatedByAtprovee4($obj1);
				}
	

							
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getAtproveeRelatedByAtprovee5(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addAtpresupuestoRelatedByAtprovee5($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initAtpresupuestosRelatedByAtprovee5();
					$obj7->addAtpresupuestoRelatedByAtprovee5($obj1);
				}
	

							
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8 = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getAtproveeRelatedByAtprovee6(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addAtpresupuestoRelatedByAtprovee6($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj8->initAtpresupuestosRelatedByAtprovee6();
					$obj8->addAtpresupuestoRelatedByAtprovee6($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptAtayudas(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtpresupuestoPeer::ATPROVEE1, AtproveePeer::ID);
		
				$criteria->addJoin(AtpresupuestoPeer::ATPROVEE2, AtproveePeer::ID);
		
				$criteria->addJoin(AtpresupuestoPeer::ATPROVEE3, AtproveePeer::ID);
		
				$criteria->addJoin(AtpresupuestoPeer::ATPROVEE4, AtproveePeer::ID);
		
				$criteria->addJoin(AtpresupuestoPeer::ATPROVEE5, AtproveePeer::ID);
		
				$criteria->addJoin(AtpresupuestoPeer::ATPROVEE6, AtproveePeer::ID);
		
			$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtproveeRelatedByAtprovee1(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
			$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtproveeRelatedByAtprovee2(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
			$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtproveeRelatedByAtprovee3(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
			$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtproveeRelatedByAtprovee4(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
			$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtproveeRelatedByAtprovee5(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
			$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtproveeRelatedByAtprovee6(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtpresupuestoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
			$rs = AtpresupuestoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptAtayudas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol2 = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtproveePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtproveePeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtproveePeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AtproveePeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol6 = $startcol5 + AtproveePeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol7 = $startcol6 + AtproveePeer::NUM_COLUMNS;
	
			AtproveePeer::addSelectColumns($c);
			$startcol8 = $startcol7 + AtproveePeer::NUM_COLUMNS;
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE1, AtproveePeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE2, AtproveePeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE3, AtproveePeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE4, AtproveePeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE5, AtproveePeer::ID);
	
			$c->addJoin(AtpresupuestoPeer::ATPROVEE6, AtproveePeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtproveeRelatedByAtprovee1(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtpresupuestoRelatedByAtprovee1($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtpresupuestosRelatedByAtprovee1();
					$obj2->addAtpresupuestoRelatedByAtprovee1($obj1);
				}
	
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtproveeRelatedByAtprovee2(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtpresupuestoRelatedByAtprovee2($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtpresupuestosRelatedByAtprovee2();
					$obj3->addAtpresupuestoRelatedByAtprovee2($obj1);
				}
	
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAtproveeRelatedByAtprovee3(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtpresupuestoRelatedByAtprovee3($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initAtpresupuestosRelatedByAtprovee3();
					$obj4->addAtpresupuestoRelatedByAtprovee3($obj1);
				}
	
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getAtproveeRelatedByAtprovee4(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addAtpresupuestoRelatedByAtprovee4($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initAtpresupuestosRelatedByAtprovee4();
					$obj5->addAtpresupuestoRelatedByAtprovee4($obj1);
				}
	
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getAtproveeRelatedByAtprovee5(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addAtpresupuestoRelatedByAtprovee5($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initAtpresupuestosRelatedByAtprovee5();
					$obj6->addAtpresupuestoRelatedByAtprovee5($obj1);
				}
	
				$omClass = AtproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getAtproveeRelatedByAtprovee6(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addAtpresupuestoRelatedByAtprovee6($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initAtpresupuestosRelatedByAtprovee6();
					$obj7->addAtpresupuestoRelatedByAtprovee6($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtproveeRelatedByAtprovee1(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol2 = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			$c->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtpresupuesto($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtpresupuestos();
					$obj2->addAtpresupuesto($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtproveeRelatedByAtprovee2(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol2 = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			$c->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtpresupuesto($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtpresupuestos();
					$obj2->addAtpresupuesto($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtproveeRelatedByAtprovee3(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol2 = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			$c->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtpresupuesto($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtpresupuestos();
					$obj2->addAtpresupuesto($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtproveeRelatedByAtprovee4(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol2 = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			$c->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtpresupuesto($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtpresupuestos();
					$obj2->addAtpresupuesto($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtproveeRelatedByAtprovee5(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol2 = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			$c->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtpresupuesto($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtpresupuestos();
					$obj2->addAtpresupuesto($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtproveeRelatedByAtprovee6(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtpresupuestoPeer::addSelectColumns($c);
		$startcol2 = (AtpresupuestoPeer::NUM_COLUMNS - AtpresupuestoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			$c->addJoin(AtpresupuestoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtpresupuestoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtpresupuesto($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtpresupuestos();
					$obj2->addAtpresupuesto($obj1);
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
		return AtpresupuestoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtpresupuestoPeer::ID); 

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
			$comparison = $criteria->getComparison(AtpresupuestoPeer::ID);
			$selectCriteria->add(AtpresupuestoPeer::ID, $criteria->remove(AtpresupuestoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtpresupuestoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtpresupuestoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atpresupuesto) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtpresupuestoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atpresupuesto $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtpresupuestoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtpresupuestoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtpresupuestoPeer::DATABASE_NAME, AtpresupuestoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtpresupuestoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtpresupuestoPeer::DATABASE_NAME);

		$criteria->add(AtpresupuestoPeer::ID, $pk);


		$v = AtpresupuestoPeer::doSelect($criteria, $con);

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
			$criteria->add(AtpresupuestoPeer::ID, $pks, Criteria::IN);
			$objs = AtpresupuestoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtpresupuestoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/ciudadanos/map/AtpresupuestoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.ciudadanos.map.AtpresupuestoMapBuilder');
}
