<?php


abstract class BaseCarecaudPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'carecaud';

	
	const CLASS_DEFAULT = 'lib.model.Carecaud';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODREC = 'carecaud.CODREC';

	
	const DESREC = 'carecaud.DESREC';

	
	const LIMREC = 'carecaud.LIMREC';

	
	const FECEMI = 'carecaud.FECEMI';

	
	const FECVEN = 'carecaud.FECVEN';

	
	const CANUTR = 'carecaud.CANUTR';

	
	const CODTIPREC = 'carecaud.CODTIPREC';

	
	const OBSERV = 'carecaud.OBSERV';

	
	const ID = 'carecaud.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codrec', 'Desrec', 'Limrec', 'Fecemi', 'Fecven', 'Canutr', 'Codtiprec', 'Observ', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CarecaudPeer::CODREC, CarecaudPeer::DESREC, CarecaudPeer::LIMREC, CarecaudPeer::FECEMI, CarecaudPeer::FECVEN, CarecaudPeer::CANUTR, CarecaudPeer::CODTIPREC, CarecaudPeer::OBSERV, CarecaudPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codrec', 'desrec', 'limrec', 'fecemi', 'fecven', 'canutr', 'codtiprec', 'observ', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codrec' => 0, 'Desrec' => 1, 'Limrec' => 2, 'Fecemi' => 3, 'Fecven' => 4, 'Canutr' => 5, 'Codtiprec' => 6, 'Observ' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CarecaudPeer::CODREC => 0, CarecaudPeer::DESREC => 1, CarecaudPeer::LIMREC => 2, CarecaudPeer::FECEMI => 3, CarecaudPeer::FECVEN => 4, CarecaudPeer::CANUTR => 5, CarecaudPeer::CODTIPREC => 6, CarecaudPeer::OBSERV => 7, CarecaudPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codrec' => 0, 'desrec' => 1, 'limrec' => 2, 'fecemi' => 3, 'fecven' => 4, 'canutr' => 5, 'codtiprec' => 6, 'observ' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CarecaudMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CarecaudMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CarecaudPeer::getTableMap();
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
		return str_replace(CarecaudPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CarecaudPeer::CODREC);

		$criteria->addSelectColumn(CarecaudPeer::DESREC);

		$criteria->addSelectColumn(CarecaudPeer::LIMREC);

		$criteria->addSelectColumn(CarecaudPeer::FECEMI);

		$criteria->addSelectColumn(CarecaudPeer::FECVEN);

		$criteria->addSelectColumn(CarecaudPeer::CANUTR);

		$criteria->addSelectColumn(CarecaudPeer::CODTIPREC);

		$criteria->addSelectColumn(CarecaudPeer::OBSERV);

		$criteria->addSelectColumn(CarecaudPeer::ID);

	}

	const COUNT = 'COUNT(carecaud.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT carecaud.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CarecaudPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CarecaudPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CarecaudPeer::doSelectRS($criteria, $con);
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
		$objects = CarecaudPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CarecaudPeer::populateObjects(CarecaudPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CarecaudPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CarecaudPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatiprec(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CarecaudPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CarecaudPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CarecaudPeer::CODTIPREC, CatiprecPeer::CODTIPREC);

		$rs = CarecaudPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatiprec(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CarecaudPeer::addSelectColumns($c);
		$startcol = (CarecaudPeer::NUM_COLUMNS - CarecaudPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatiprecPeer::addSelectColumns($c);

		$c->addJoin(CarecaudPeer::CODTIPREC, CatiprecPeer::CODTIPREC);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CarecaudPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatiprecPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatiprec(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCarecaud($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCarecauds();
				$obj2->addCarecaud($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CarecaudPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CarecaudPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CarecaudPeer::CODTIPREC, CatiprecPeer::CODTIPREC);

		$rs = CarecaudPeer::doSelectRS($criteria, $con);
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

		CarecaudPeer::addSelectColumns($c);
		$startcol2 = (CarecaudPeer::NUM_COLUMNS - CarecaudPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatiprecPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatiprecPeer::NUM_COLUMNS;

		$c->addJoin(CarecaudPeer::CODTIPREC, CatiprecPeer::CODTIPREC);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CarecaudPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CatiprecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatiprec(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCarecaud($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCarecauds();
				$obj2->addCarecaud($obj1);
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
		return CarecaudPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CarecaudPeer::ID); 

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
			$comparison = $criteria->getComparison(CarecaudPeer::ID);
			$selectCriteria->add(CarecaudPeer::ID, $criteria->remove(CarecaudPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CarecaudPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CarecaudPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Carecaud) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CarecaudPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Carecaud $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CarecaudPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CarecaudPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CarecaudPeer::DATABASE_NAME, CarecaudPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CarecaudPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CarecaudPeer::DATABASE_NAME);

		$criteria->add(CarecaudPeer::ID, $pk);


		$v = CarecaudPeer::doSelect($criteria, $con);

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
			$criteria->add(CarecaudPeer::ID, $pks, Criteria::IN);
			$objs = CarecaudPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCarecaudPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CarecaudMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CarecaudMapBuilder');
}
