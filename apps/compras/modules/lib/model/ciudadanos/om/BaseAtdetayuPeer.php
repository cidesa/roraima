<?php


abstract class BaseAtdetayuPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atdetayu';

	
	const CLASS_DEFAULT = 'lib.model.ciudadanos.Atdetayu';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ATAYUDAS_ID = 'atdetayu.ATAYUDAS_ID';

	
	const ATDONACIONES_ID = 'atdetayu.ATDONACIONES_ID';

	
	const CANTIDAD = 'atdetayu.CANTIDAD';

	
	const CANAPR = 'atdetayu.CANAPR';

	
	const APROBADO = 'atdetayu.APROBADO';

	
	const PRECIO = 'atdetayu.PRECIO';

	
	const UNIDAD = 'atdetayu.UNIDAD';

	
	const ID = 'atdetayu.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId', 'AtdonacionesId', 'Cantidad', 'Canapr', 'Aprobado', 'Precio', 'Unidad', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtdetayuPeer::ATAYUDAS_ID, AtdetayuPeer::ATDONACIONES_ID, AtdetayuPeer::CANTIDAD, AtdetayuPeer::CANAPR, AtdetayuPeer::APROBADO, AtdetayuPeer::PRECIO, AtdetayuPeer::UNIDAD, AtdetayuPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id', 'atdonaciones_id', 'cantidad', 'canapr', 'aprobado', 'precio', 'unidad', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId' => 0, 'AtdonacionesId' => 1, 'Cantidad' => 2, 'Canapr' => 3, 'Aprobado' => 4, 'Precio' => 5, 'Unidad' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (AtdetayuPeer::ATAYUDAS_ID => 0, AtdetayuPeer::ATDONACIONES_ID => 1, AtdetayuPeer::CANTIDAD => 2, AtdetayuPeer::CANAPR => 3, AtdetayuPeer::APROBADO => 4, AtdetayuPeer::PRECIO => 5, AtdetayuPeer::UNIDAD => 6, AtdetayuPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id' => 0, 'atdonaciones_id' => 1, 'cantidad' => 2, 'canapr' => 3, 'aprobado' => 4, 'precio' => 5, 'unidad' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/ciudadanos/map/AtdetayuMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.ciudadanos.map.AtdetayuMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtdetayuPeer::getTableMap();
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
		return str_replace(AtdetayuPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtdetayuPeer::ATAYUDAS_ID);

		$criteria->addSelectColumn(AtdetayuPeer::ATDONACIONES_ID);

		$criteria->addSelectColumn(AtdetayuPeer::CANTIDAD);

		$criteria->addSelectColumn(AtdetayuPeer::CANAPR);

		$criteria->addSelectColumn(AtdetayuPeer::APROBADO);

		$criteria->addSelectColumn(AtdetayuPeer::PRECIO);

		$criteria->addSelectColumn(AtdetayuPeer::UNIDAD);

		$criteria->addSelectColumn(AtdetayuPeer::ID);

	}

	const COUNT = 'COUNT(atdetayu.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atdetayu.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdetayuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdetayuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtdetayuPeer::doSelectRS($criteria, $con);
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
		$objects = AtdetayuPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtdetayuPeer::populateObjects(AtdetayuPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtdetayuPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtdetayuPeer::getOMClass();
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
			$criteria->addSelectColumn(AtdetayuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdetayuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtdetayuPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$rs = AtdetayuPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtdonaciones(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdetayuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdetayuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtdetayuPeer::ATDONACIONES_ID, AtdonacionesPeer::ID);

		$rs = AtdetayuPeer::doSelectRS($criteria, $con);
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

		AtdetayuPeer::addSelectColumns($c);
		$startcol = (AtdetayuPeer::NUM_COLUMNS - AtdetayuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtayudasPeer::addSelectColumns($c);

		$c->addJoin(AtdetayuPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetayuPeer::getOMClass();

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
										$temp_obj2->addAtdetayu($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtdetayus();
				$obj2->addAtdetayu($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtdonaciones(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdetayuPeer::addSelectColumns($c);
		$startcol = (AtdetayuPeer::NUM_COLUMNS - AtdetayuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtdonacionesPeer::addSelectColumns($c);

		$c->addJoin(AtdetayuPeer::ATDONACIONES_ID, AtdonacionesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetayuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtdonacionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtdonaciones(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtdetayu($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtdetayus();
				$obj2->addAtdetayu($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdetayuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdetayuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(AtdetayuPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$criteria->addJoin(AtdetayuPeer::ATDONACIONES_ID, AtdonacionesPeer::ID);
	
		$rs = AtdetayuPeer::doSelectRS($criteria, $con);
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

		AtdetayuPeer::addSelectColumns($c);
		$startcol2 = (AtdetayuPeer::NUM_COLUMNS - AtdetayuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			AtdonacionesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtdonacionesPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdetayuPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$c->addJoin(AtdetayuPeer::ATDONACIONES_ID, AtdonacionesPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetayuPeer::getOMClass();


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
						$temp_obj2->addAtdetayu($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdetayus();
					$obj2->addAtdetayu($obj1);
				}
	

							
				$omClass = AtdonacionesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtdonaciones(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtdetayu($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initAtdetayus();
					$obj3->addAtdetayu($obj1);
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
				$criteria->addSelectColumn(AtdetayuPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtdetayuPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtdetayuPeer::ATDONACIONES_ID, AtdonacionesPeer::ID);
		
			$rs = AtdetayuPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtdonaciones(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtdetayuPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtdetayuPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtdetayuPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
			$rs = AtdetayuPeer::doSelectRS($criteria, $con);
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

		AtdetayuPeer::addSelectColumns($c);
		$startcol2 = (AtdetayuPeer::NUM_COLUMNS - AtdetayuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtdonacionesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtdonacionesPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdetayuPeer::ATDONACIONES_ID, AtdonacionesPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetayuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtdonacionesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtdonaciones(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdetayu($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdetayus();
					$obj2->addAtdetayu($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtdonaciones(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdetayuPeer::addSelectColumns($c);
		$startcol2 = (AtdetayuPeer::NUM_COLUMNS - AtdetayuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdetayuPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdetayuPeer::getOMClass();

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
						$temp_obj2->addAtdetayu($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdetayus();
					$obj2->addAtdetayu($obj1);
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
		return AtdetayuPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtdetayuPeer::ID); 

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
			$comparison = $criteria->getComparison(AtdetayuPeer::ID);
			$selectCriteria->add(AtdetayuPeer::ID, $criteria->remove(AtdetayuPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtdetayuPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtdetayuPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atdetayu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtdetayuPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atdetayu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtdetayuPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtdetayuPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtdetayuPeer::DATABASE_NAME, AtdetayuPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtdetayuPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtdetayuPeer::DATABASE_NAME);

		$criteria->add(AtdetayuPeer::ID, $pk);


		$v = AtdetayuPeer::doSelect($criteria, $con);

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
			$criteria->add(AtdetayuPeer::ID, $pks, Criteria::IN);
			$objs = AtdetayuPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtdetayuPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/ciudadanos/map/AtdetayuMapBuilder.php';
	Propel::registerMapBuilder('lib.model.ciudadanos.map.AtdetayuMapBuilder');
}
