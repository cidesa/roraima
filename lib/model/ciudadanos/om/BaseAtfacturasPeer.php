<?php


abstract class BaseAtfacturasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atfacturas';

	
	const CLASS_DEFAULT = 'lib.model.ciudadanos.Atfacturas';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ATAYUDAS_ID = 'atfacturas.ATAYUDAS_ID';

	
	const NUMFAC = 'atfacturas.NUMFAC';

	
	const BASIMP = 'atfacturas.BASIMP';

	
	const IVA = 'atfacturas.IVA';

	
	const EXENTOS = 'atfacturas.EXENTOS';

	
	const TOTAL = 'atfacturas.TOTAL';

	
	const NROSPD = 'atfacturas.NROSPD';

	
	const ID = 'atfacturas.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId', 'Numfac', 'Basimp', 'Iva', 'Exentos', 'Total', 'Nrospd', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtfacturasPeer::ATAYUDAS_ID, AtfacturasPeer::NUMFAC, AtfacturasPeer::BASIMP, AtfacturasPeer::IVA, AtfacturasPeer::EXENTOS, AtfacturasPeer::TOTAL, AtfacturasPeer::NROSPD, AtfacturasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id', 'numfac', 'basimp', 'iva', 'exentos', 'total', 'nrospd', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId' => 0, 'Numfac' => 1, 'Basimp' => 2, 'Iva' => 3, 'Exentos' => 4, 'Total' => 5, 'Nrospd' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (AtfacturasPeer::ATAYUDAS_ID => 0, AtfacturasPeer::NUMFAC => 1, AtfacturasPeer::BASIMP => 2, AtfacturasPeer::IVA => 3, AtfacturasPeer::EXENTOS => 4, AtfacturasPeer::TOTAL => 5, AtfacturasPeer::NROSPD => 6, AtfacturasPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id' => 0, 'numfac' => 1, 'basimp' => 2, 'iva' => 3, 'exentos' => 4, 'total' => 5, 'nrospd' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/ciudadanos/map/AtfacturasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.ciudadanos.map.AtfacturasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtfacturasPeer::getTableMap();
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
		return str_replace(AtfacturasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtfacturasPeer::ATAYUDAS_ID);

		$criteria->addSelectColumn(AtfacturasPeer::NUMFAC);

		$criteria->addSelectColumn(AtfacturasPeer::BASIMP);

		$criteria->addSelectColumn(AtfacturasPeer::IVA);

		$criteria->addSelectColumn(AtfacturasPeer::EXENTOS);

		$criteria->addSelectColumn(AtfacturasPeer::TOTAL);

		$criteria->addSelectColumn(AtfacturasPeer::NROSPD);

		$criteria->addSelectColumn(AtfacturasPeer::ID);

	}

	const COUNT = 'COUNT(atfacturas.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atfacturas.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtfacturasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtfacturasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtfacturasPeer::doSelectRS($criteria, $con);
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
		$objects = AtfacturasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtfacturasPeer::populateObjects(AtfacturasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtfacturasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtfacturasPeer::getOMClass();
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
			$criteria->addSelectColumn(AtfacturasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtfacturasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtfacturasPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$rs = AtfacturasPeer::doSelectRS($criteria, $con);
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

		AtfacturasPeer::addSelectColumns($c);
		$startcol = (AtfacturasPeer::NUM_COLUMNS - AtfacturasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtayudasPeer::addSelectColumns($c);

		$c->addJoin(AtfacturasPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtfacturasPeer::getOMClass();

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
										$temp_obj2->addAtfacturas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtfacturass();
				$obj2->addAtfacturas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtfacturasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtfacturasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtfacturasPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$rs = AtfacturasPeer::doSelectRS($criteria, $con);
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

		AtfacturasPeer::addSelectColumns($c);
		$startcol2 = (AtfacturasPeer::NUM_COLUMNS - AtfacturasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtayudasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;

		$c->addJoin(AtfacturasPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtfacturasPeer::getOMClass();


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
				$temp_obj2 = $temp_obj1->getAtayudas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtfacturas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAtfacturass();
				$obj2->addAtfacturas($obj1);
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
		return AtfacturasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtfacturasPeer::ID); 

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
			$comparison = $criteria->getComparison(AtfacturasPeer::ID);
			$selectCriteria->add(AtfacturasPeer::ID, $criteria->remove(AtfacturasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtfacturasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtfacturasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atfacturas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtfacturasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atfacturas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtfacturasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtfacturasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtfacturasPeer::DATABASE_NAME, AtfacturasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtfacturasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtfacturasPeer::DATABASE_NAME);

		$criteria->add(AtfacturasPeer::ID, $pk);


		$v = AtfacturasPeer::doSelect($criteria, $con);

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
			$criteria->add(AtfacturasPeer::ID, $pks, Criteria::IN);
			$objs = AtfacturasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtfacturasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/ciudadanos/map/AtfacturasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.ciudadanos.map.AtfacturasMapBuilder');
}
