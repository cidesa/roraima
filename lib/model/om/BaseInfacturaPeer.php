<?php


abstract class BaseInfacturaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'infactura';

	
	const CLASS_DEFAULT = 'lib.model.Infactura';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMFAC = 'infactura.NUMFAC';

	
	const TIPPER = 'infactura.TIPPER';

	
	const CEDRIF = 'infactura.CEDRIF';

	
	const TIPCONC = 'infactura.TIPCONC';

	
	const IDCONC = 'infactura.IDCONC';

	
	const MONCAN = 'infactura.MONCAN';

	
	const INDEFBAN_ID = 'infactura.INDEFBAN_ID';

	
	const NUMDEP = 'infactura.NUMDEP';

	
	const FECEMI = 'infactura.FECEMI';

	
	const ID = 'infactura.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numfac', 'Tipper', 'Cedrif', 'Tipconc', 'Idconc', 'Moncan', 'IndefbanId', 'Numdep', 'Fecemi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (InfacturaPeer::NUMFAC, InfacturaPeer::TIPPER, InfacturaPeer::CEDRIF, InfacturaPeer::TIPCONC, InfacturaPeer::IDCONC, InfacturaPeer::MONCAN, InfacturaPeer::INDEFBAN_ID, InfacturaPeer::NUMDEP, InfacturaPeer::FECEMI, InfacturaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numfac', 'tipper', 'cedrif', 'tipconc', 'idconc', 'moncan', 'indefban_id', 'numdep', 'fecemi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numfac' => 0, 'Tipper' => 1, 'Cedrif' => 2, 'Tipconc' => 3, 'Idconc' => 4, 'Moncan' => 5, 'IndefbanId' => 6, 'Numdep' => 7, 'Fecemi' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (InfacturaPeer::NUMFAC => 0, InfacturaPeer::TIPPER => 1, InfacturaPeer::CEDRIF => 2, InfacturaPeer::TIPCONC => 3, InfacturaPeer::IDCONC => 4, InfacturaPeer::MONCAN => 5, InfacturaPeer::INDEFBAN_ID => 6, InfacturaPeer::NUMDEP => 7, InfacturaPeer::FECEMI => 8, InfacturaPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('numfac' => 0, 'tipper' => 1, 'cedrif' => 2, 'tipconc' => 3, 'idconc' => 4, 'moncan' => 5, 'indefban_id' => 6, 'numdep' => 7, 'fecemi' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/InfacturaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.InfacturaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = InfacturaPeer::getTableMap();
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
		return str_replace(InfacturaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(InfacturaPeer::NUMFAC);

		$criteria->addSelectColumn(InfacturaPeer::TIPPER);

		$criteria->addSelectColumn(InfacturaPeer::CEDRIF);

		$criteria->addSelectColumn(InfacturaPeer::TIPCONC);

		$criteria->addSelectColumn(InfacturaPeer::IDCONC);

		$criteria->addSelectColumn(InfacturaPeer::MONCAN);

		$criteria->addSelectColumn(InfacturaPeer::INDEFBAN_ID);

		$criteria->addSelectColumn(InfacturaPeer::NUMDEP);

		$criteria->addSelectColumn(InfacturaPeer::FECEMI);

		$criteria->addSelectColumn(InfacturaPeer::ID);

	}

	const COUNT = 'COUNT(infactura.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT infactura.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InfacturaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InfacturaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = InfacturaPeer::doSelectRS($criteria, $con);
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
		$objects = InfacturaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return InfacturaPeer::populateObjects(InfacturaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			InfacturaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = InfacturaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinIndefban(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InfacturaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InfacturaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InfacturaPeer::INDEFBAN_ID, IndefbanPeer::ID);

		$rs = InfacturaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinIndefban(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InfacturaPeer::addSelectColumns($c);
		$startcol = (InfacturaPeer::NUM_COLUMNS - InfacturaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		IndefbanPeer::addSelectColumns($c);

		$c->addJoin(InfacturaPeer::INDEFBAN_ID, IndefbanPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InfacturaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IndefbanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getIndefban(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInfactura($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInfacturas();
				$obj2->addInfactura($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InfacturaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InfacturaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InfacturaPeer::INDEFBAN_ID, IndefbanPeer::ID);

		$rs = InfacturaPeer::doSelectRS($criteria, $con);
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

		InfacturaPeer::addSelectColumns($c);
		$startcol2 = (InfacturaPeer::NUM_COLUMNS - InfacturaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		IndefbanPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + IndefbanPeer::NUM_COLUMNS;

		$c->addJoin(InfacturaPeer::INDEFBAN_ID, IndefbanPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InfacturaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = IndefbanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getIndefban(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInfactura($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initInfacturas();
				$obj2->addInfactura($obj1);
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
		return InfacturaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(InfacturaPeer::ID); 

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
			$comparison = $criteria->getComparison(InfacturaPeer::ID);
			$selectCriteria->add(InfacturaPeer::ID, $criteria->remove(InfacturaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(InfacturaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(InfacturaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Infactura) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(InfacturaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Infactura $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(InfacturaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(InfacturaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(InfacturaPeer::DATABASE_NAME, InfacturaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = InfacturaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(InfacturaPeer::DATABASE_NAME);

		$criteria->add(InfacturaPeer::ID, $pk);


		$v = InfacturaPeer::doSelect($criteria, $con);

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
			$criteria->add(InfacturaPeer::ID, $pks, Criteria::IN);
			$objs = InfacturaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseInfacturaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/InfacturaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.InfacturaMapBuilder');
}
