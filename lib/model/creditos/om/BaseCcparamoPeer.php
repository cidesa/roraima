<?php


abstract class BaseCcparamoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccparamo';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccparamo';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccparamo.ID';

	
	const PRIORI = 'ccparamo.PRIORI';

	
	const NOMBRE = 'ccparamo.NOMBRE';

	
	const PRIMONINTMOR = 'ccparamo.PRIMONINTMOR';

	
	const PRIMONINT = 'ccparamo.PRIMONINT';

	
	const PRIMONPRI = 'ccparamo.PRIMONPRI';

	
	const PRIMONINTGRA = 'ccparamo.PRIMONINTGRA';

	
	const PRIMONINTCUM = 'ccparamo.PRIMONINTCUM';

	
	const CCPERPARAMO_ID = 'ccparamo.CCPERPARAMO_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Priori', 'Nombre', 'Primonintmor', 'Primonint', 'Primonpri', 'Primonintgra', 'Primonintcum', 'CcperparamoId', ),
		BasePeer::TYPE_COLNAME => array (CcparamoPeer::ID, CcparamoPeer::PRIORI, CcparamoPeer::NOMBRE, CcparamoPeer::PRIMONINTMOR, CcparamoPeer::PRIMONINT, CcparamoPeer::PRIMONPRI, CcparamoPeer::PRIMONINTGRA, CcparamoPeer::PRIMONINTCUM, CcparamoPeer::CCPERPARAMO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'priori', 'nombre', 'primonintmor', 'primonint', 'primonpri', 'primonintgra', 'primonintcum', 'ccperparamo_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Priori' => 1, 'Nombre' => 2, 'Primonintmor' => 3, 'Primonint' => 4, 'Primonpri' => 5, 'Primonintgra' => 6, 'Primonintcum' => 7, 'CcperparamoId' => 8, ),
		BasePeer::TYPE_COLNAME => array (CcparamoPeer::ID => 0, CcparamoPeer::PRIORI => 1, CcparamoPeer::NOMBRE => 2, CcparamoPeer::PRIMONINTMOR => 3, CcparamoPeer::PRIMONINT => 4, CcparamoPeer::PRIMONPRI => 5, CcparamoPeer::PRIMONINTGRA => 6, CcparamoPeer::PRIMONINTCUM => 7, CcparamoPeer::CCPERPARAMO_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'priori' => 1, 'nombre' => 2, 'primonintmor' => 3, 'primonint' => 4, 'primonpri' => 5, 'primonintgra' => 6, 'primonintcum' => 7, 'ccperparamo_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcparamoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcparamoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcparamoPeer::getTableMap();
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
		return str_replace(CcparamoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcparamoPeer::ID);

		$criteria->addSelectColumn(CcparamoPeer::PRIORI);

		$criteria->addSelectColumn(CcparamoPeer::NOMBRE);

		$criteria->addSelectColumn(CcparamoPeer::PRIMONINTMOR);

		$criteria->addSelectColumn(CcparamoPeer::PRIMONINT);

		$criteria->addSelectColumn(CcparamoPeer::PRIMONPRI);

		$criteria->addSelectColumn(CcparamoPeer::PRIMONINTGRA);

		$criteria->addSelectColumn(CcparamoPeer::PRIMONINTCUM);

		$criteria->addSelectColumn(CcparamoPeer::CCPERPARAMO_ID);

	}

	const COUNT = 'COUNT(ccparamo.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccparamo.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcparamoPeer::doSelectRS($criteria, $con);
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
		$objects = CcparamoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcparamoPeer::populateObjects(CcparamoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcparamoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcparamoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcperparamo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcparamoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);

		$rs = CcparamoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcperparamo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcparamoPeer::addSelectColumns($c);
		$startcol = (CcparamoPeer::NUM_COLUMNS - CcparamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperparamoPeer::addSelectColumns($c);

		$c->addJoin(CcparamoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperparamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperparamo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcparamo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcparamos();
				$obj2->addCcparamo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcparamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcparamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcparamoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
	
		$rs = CcparamoPeer::doSelectRS($criteria, $con);
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

		CcparamoPeer::addSelectColumns($c);
		$startcol2 = (CcparamoPeer::NUM_COLUMNS - CcparamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperparamoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperparamoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcparamoPeer::CCPERPARAMO_ID, CcperparamoPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcparamoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcperparamoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperparamo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcparamo($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcparamos();
					$obj2->addCcparamo($obj1);
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
		return CcparamoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcparamoPeer::ID); 

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
			$comparison = $criteria->getComparison(CcparamoPeer::ID);
			$selectCriteria->add(CcparamoPeer::ID, $criteria->remove(CcparamoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcparamoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcparamoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccparamo) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcparamoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccparamo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcparamoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcparamoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcparamoPeer::DATABASE_NAME, CcparamoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcparamoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcparamoPeer::DATABASE_NAME);

		$criteria->add(CcparamoPeer::ID, $pk);


		$v = CcparamoPeer::doSelect($criteria, $con);

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
			$criteria->add(CcparamoPeer::ID, $pks, Criteria::IN);
			$objs = CcparamoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcparamoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcparamoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcparamoMapBuilder');
}
