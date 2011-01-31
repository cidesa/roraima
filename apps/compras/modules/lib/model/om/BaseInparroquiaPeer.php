<?php


abstract class BaseInparroquiaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'inparroquia';

	
	const CLASS_DEFAULT = 'lib.model.Inparroquia';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const INESTADO_ID = 'inparroquia.INESTADO_ID';

	
	const INMUNICIPIO_ID = 'inparroquia.INMUNICIPIO_ID';

	
	const CODPAR = 'inparroquia.CODPAR';

	
	const NOMPAR = 'inparroquia.NOMPAR';

	
	const ID = 'inparroquia.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('InestadoId', 'InmunicipioId', 'Codpar', 'Nompar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (InparroquiaPeer::INESTADO_ID, InparroquiaPeer::INMUNICIPIO_ID, InparroquiaPeer::CODPAR, InparroquiaPeer::NOMPAR, InparroquiaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('inestado_id', 'inmunicipio_id', 'codpar', 'nompar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('InestadoId' => 0, 'InmunicipioId' => 1, 'Codpar' => 2, 'Nompar' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (InparroquiaPeer::INESTADO_ID => 0, InparroquiaPeer::INMUNICIPIO_ID => 1, InparroquiaPeer::CODPAR => 2, InparroquiaPeer::NOMPAR => 3, InparroquiaPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('inestado_id' => 0, 'inmunicipio_id' => 1, 'codpar' => 2, 'nompar' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/InparroquiaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.InparroquiaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = InparroquiaPeer::getTableMap();
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
		return str_replace(InparroquiaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(InparroquiaPeer::INESTADO_ID);

		$criteria->addSelectColumn(InparroquiaPeer::INMUNICIPIO_ID);

		$criteria->addSelectColumn(InparroquiaPeer::CODPAR);

		$criteria->addSelectColumn(InparroquiaPeer::NOMPAR);

		$criteria->addSelectColumn(InparroquiaPeer::ID);

	}

	const COUNT = 'COUNT(inparroquia.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT inparroquia.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = InparroquiaPeer::doSelectRS($criteria, $con);
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
		$objects = InparroquiaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return InparroquiaPeer::populateObjects(InparroquiaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			InparroquiaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = InparroquiaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinInestado(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InparroquiaPeer::INESTADO_ID, InestadoPeer::ID);

		$rs = InparroquiaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinInmunicipio(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InparroquiaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$rs = InparroquiaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinInestado(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InparroquiaPeer::addSelectColumns($c);
		$startcol = (InparroquiaPeer::NUM_COLUMNS - InparroquiaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InestadoPeer::addSelectColumns($c);

		$c->addJoin(InparroquiaPeer::INESTADO_ID, InestadoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InparroquiaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InestadoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getInestado(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInparroquia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInparroquias();
				$obj2->addInparroquia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinInmunicipio(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InparroquiaPeer::addSelectColumns($c);
		$startcol = (InparroquiaPeer::NUM_COLUMNS - InparroquiaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InmunicipioPeer::addSelectColumns($c);

		$c->addJoin(InparroquiaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InparroquiaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InmunicipioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getInmunicipio(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInparroquia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInparroquias();
				$obj2->addInparroquia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InparroquiaPeer::INESTADO_ID, InestadoPeer::ID);

		$criteria->addJoin(InparroquiaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$rs = InparroquiaPeer::doSelectRS($criteria, $con);
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

		InparroquiaPeer::addSelectColumns($c);
		$startcol2 = (InparroquiaPeer::NUM_COLUMNS - InparroquiaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InestadoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InestadoPeer::NUM_COLUMNS;

		InmunicipioPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InmunicipioPeer::NUM_COLUMNS;

		$c->addJoin(InparroquiaPeer::INESTADO_ID, InestadoPeer::ID);

		$c->addJoin(InparroquiaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InparroquiaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = InestadoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInestado(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInparroquia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initInparroquias();
				$obj2->addInparroquia($obj1);
			}


					
			$omClass = InmunicipioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getInmunicipio(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInparroquia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initInparroquias();
				$obj3->addInparroquia($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptInestado(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InparroquiaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);

		$rs = InparroquiaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptInmunicipio(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InparroquiaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InparroquiaPeer::INESTADO_ID, InestadoPeer::ID);

		$rs = InparroquiaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptInestado(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InparroquiaPeer::addSelectColumns($c);
		$startcol2 = (InparroquiaPeer::NUM_COLUMNS - InparroquiaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InmunicipioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InmunicipioPeer::NUM_COLUMNS;

		$c->addJoin(InparroquiaPeer::INMUNICIPIO_ID, InmunicipioPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InparroquiaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InmunicipioPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInmunicipio(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInparroquia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInparroquias();
				$obj2->addInparroquia($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptInmunicipio(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InparroquiaPeer::addSelectColumns($c);
		$startcol2 = (InparroquiaPeer::NUM_COLUMNS - InparroquiaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InestadoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InestadoPeer::NUM_COLUMNS;

		$c->addJoin(InparroquiaPeer::INESTADO_ID, InestadoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InparroquiaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InestadoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInestado(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInparroquia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInparroquias();
				$obj2->addInparroquia($obj1);
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
		return InparroquiaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(InparroquiaPeer::ID); 

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
			$comparison = $criteria->getComparison(InparroquiaPeer::ID);
			$selectCriteria->add(InparroquiaPeer::ID, $criteria->remove(InparroquiaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(InparroquiaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(InparroquiaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Inparroquia) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(InparroquiaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Inparroquia $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(InparroquiaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(InparroquiaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(InparroquiaPeer::DATABASE_NAME, InparroquiaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = InparroquiaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(InparroquiaPeer::DATABASE_NAME);

		$criteria->add(InparroquiaPeer::ID, $pk);


		$v = InparroquiaPeer::doSelect($criteria, $con);

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
			$criteria->add(InparroquiaPeer::ID, $pks, Criteria::IN);
			$objs = InparroquiaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseInparroquiaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/InparroquiaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.InparroquiaMapBuilder');
}
