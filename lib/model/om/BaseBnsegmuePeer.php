<?php


abstract class BaseBnsegmuePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bnsegmue';

	
	const CLASS_DEFAULT = 'lib.model.Bnsegmue';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bnsegmue.CODACT';

	
	const CODMUE = 'bnsegmue.CODMUE';

	
	const NROSEGMUE = 'bnsegmue.NROSEGMUE';

	
	const FECSEGMUE = 'bnsegmue.FECSEGMUE';

	
	const NOMSEGMUE = 'bnsegmue.NOMSEGMUE';

	
	const COBSEGMUE = 'bnsegmue.COBSEGMUE';

	
	const MONSEGMUE = 'bnsegmue.MONSEGMUE';

	
	const FECSEGVEN = 'bnsegmue.FECSEGVEN';

	
	const PROSEGMUE = 'bnsegmue.PROSEGMUE';

	
	const OBSSEGMUE = 'bnsegmue.OBSSEGMUE';

	
	const STASEGMUE = 'bnsegmue.STASEGMUE';

	
	const ID = 'bnsegmue.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codmue', 'Nrosegmue', 'Fecsegmue', 'Nomsegmue', 'Cobsegmue', 'Monsegmue', 'Fecsegven', 'Prosegmue', 'Obssegmue', 'Stasegmue', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BnsegmuePeer::CODACT, BnsegmuePeer::CODMUE, BnsegmuePeer::NROSEGMUE, BnsegmuePeer::FECSEGMUE, BnsegmuePeer::NOMSEGMUE, BnsegmuePeer::COBSEGMUE, BnsegmuePeer::MONSEGMUE, BnsegmuePeer::FECSEGVEN, BnsegmuePeer::PROSEGMUE, BnsegmuePeer::OBSSEGMUE, BnsegmuePeer::STASEGMUE, BnsegmuePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codmue', 'nrosegmue', 'fecsegmue', 'nomsegmue', 'cobsegmue', 'monsegmue', 'fecsegven', 'prosegmue', 'obssegmue', 'stasegmue', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codmue' => 1, 'Nrosegmue' => 2, 'Fecsegmue' => 3, 'Nomsegmue' => 4, 'Cobsegmue' => 5, 'Monsegmue' => 6, 'Fecsegven' => 7, 'Prosegmue' => 8, 'Obssegmue' => 9, 'Stasegmue' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (BnsegmuePeer::CODACT => 0, BnsegmuePeer::CODMUE => 1, BnsegmuePeer::NROSEGMUE => 2, BnsegmuePeer::FECSEGMUE => 3, BnsegmuePeer::NOMSEGMUE => 4, BnsegmuePeer::COBSEGMUE => 5, BnsegmuePeer::MONSEGMUE => 6, BnsegmuePeer::FECSEGVEN => 7, BnsegmuePeer::PROSEGMUE => 8, BnsegmuePeer::OBSSEGMUE => 9, BnsegmuePeer::STASEGMUE => 10, BnsegmuePeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codmue' => 1, 'nrosegmue' => 2, 'fecsegmue' => 3, 'nomsegmue' => 4, 'cobsegmue' => 5, 'monsegmue' => 6, 'fecsegven' => 7, 'prosegmue' => 8, 'obssegmue' => 9, 'stasegmue' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BnsegmueMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BnsegmueMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BnsegmuePeer::getTableMap();
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
		return str_replace(BnsegmuePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BnsegmuePeer::CODACT);

		$criteria->addSelectColumn(BnsegmuePeer::CODMUE);

		$criteria->addSelectColumn(BnsegmuePeer::NROSEGMUE);

		$criteria->addSelectColumn(BnsegmuePeer::FECSEGMUE);

		$criteria->addSelectColumn(BnsegmuePeer::NOMSEGMUE);

		$criteria->addSelectColumn(BnsegmuePeer::COBSEGMUE);

		$criteria->addSelectColumn(BnsegmuePeer::MONSEGMUE);

		$criteria->addSelectColumn(BnsegmuePeer::FECSEGVEN);

		$criteria->addSelectColumn(BnsegmuePeer::PROSEGMUE);

		$criteria->addSelectColumn(BnsegmuePeer::OBSSEGMUE);

		$criteria->addSelectColumn(BnsegmuePeer::STASEGMUE);

		$criteria->addSelectColumn(BnsegmuePeer::ID);

	}

	const COUNT = 'COUNT(bnsegmue.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bnsegmue.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BnsegmuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BnsegmuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BnsegmuePeer::doSelectRS($criteria, $con);
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
		$objects = BnsegmuePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BnsegmuePeer::populateObjects(BnsegmuePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BnsegmuePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BnsegmuePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return BnsegmuePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(BnsegmuePeer::ID);
			$selectCriteria->add(BnsegmuePeer::ID, $criteria->remove(BnsegmuePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BnsegmuePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BnsegmuePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bnsegmue) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BnsegmuePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bnsegmue $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BnsegmuePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BnsegmuePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BnsegmuePeer::DATABASE_NAME, BnsegmuePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BnsegmuePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BnsegmuePeer::DATABASE_NAME);

		$criteria->add(BnsegmuePeer::ID, $pk);


		$v = BnsegmuePeer::doSelect($criteria, $con);

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
			$criteria->add(BnsegmuePeer::ID, $pks, Criteria::IN);
			$objs = BnsegmuePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBnsegmuePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BnsegmueMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BnsegmueMapBuilder');
}
