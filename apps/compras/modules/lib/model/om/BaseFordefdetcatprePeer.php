<?php


abstract class BaseFordefdetcatprePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fordefdetcatpre';

	
	const CLASS_DEFAULT = 'lib.model.Fordefdetcatpre';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCAT = 'fordefdetcatpre.CODCAT';

	
	const CODVOLTRA = 'fordefdetcatpre.CODVOLTRA';

	
	const DESVOLTRA = 'fordefdetcatpre.DESVOLTRA';

	
	const CODUNIMED = 'fordefdetcatpre.CODUNIMED';

	
	const CANVOLTRA = 'fordefdetcatpre.CANVOLTRA';

	
	const PERSEG = 'fordefdetcatpre.PERSEG';

	
	const ID = 'fordefdetcatpre.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat', 'Codvoltra', 'Desvoltra', 'Codunimed', 'Canvoltra', 'Perseg', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FordefdetcatprePeer::CODCAT, FordefdetcatprePeer::CODVOLTRA, FordefdetcatprePeer::DESVOLTRA, FordefdetcatprePeer::CODUNIMED, FordefdetcatprePeer::CANVOLTRA, FordefdetcatprePeer::PERSEG, FordefdetcatprePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat', 'codvoltra', 'desvoltra', 'codunimed', 'canvoltra', 'perseg', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat' => 0, 'Codvoltra' => 1, 'Desvoltra' => 2, 'Codunimed' => 3, 'Canvoltra' => 4, 'Perseg' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (FordefdetcatprePeer::CODCAT => 0, FordefdetcatprePeer::CODVOLTRA => 1, FordefdetcatprePeer::DESVOLTRA => 2, FordefdetcatprePeer::CODUNIMED => 3, FordefdetcatprePeer::CANVOLTRA => 4, FordefdetcatprePeer::PERSEG => 5, FordefdetcatprePeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat' => 0, 'codvoltra' => 1, 'desvoltra' => 2, 'codunimed' => 3, 'canvoltra' => 4, 'perseg' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FordefdetcatpreMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FordefdetcatpreMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FordefdetcatprePeer::getTableMap();
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
		return str_replace(FordefdetcatprePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FordefdetcatprePeer::CODCAT);

		$criteria->addSelectColumn(FordefdetcatprePeer::CODVOLTRA);

		$criteria->addSelectColumn(FordefdetcatprePeer::DESVOLTRA);

		$criteria->addSelectColumn(FordefdetcatprePeer::CODUNIMED);

		$criteria->addSelectColumn(FordefdetcatprePeer::CANVOLTRA);

		$criteria->addSelectColumn(FordefdetcatprePeer::PERSEG);

		$criteria->addSelectColumn(FordefdetcatprePeer::ID);

	}

	const COUNT = 'COUNT(fordefdetcatpre.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fordefdetcatpre.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FordefdetcatprePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FordefdetcatprePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FordefdetcatprePeer::doSelectRS($criteria, $con);
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
		$objects = FordefdetcatprePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FordefdetcatprePeer::populateObjects(FordefdetcatprePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FordefdetcatprePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FordefdetcatprePeer::getOMClass();
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
		return FordefdetcatprePeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FordefdetcatprePeer::ID);
			$selectCriteria->add(FordefdetcatprePeer::ID, $criteria->remove(FordefdetcatprePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FordefdetcatprePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FordefdetcatprePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fordefdetcatpre) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FordefdetcatprePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fordefdetcatpre $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FordefdetcatprePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FordefdetcatprePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FordefdetcatprePeer::DATABASE_NAME, FordefdetcatprePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FordefdetcatprePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FordefdetcatprePeer::DATABASE_NAME);

		$criteria->add(FordefdetcatprePeer::ID, $pk);


		$v = FordefdetcatprePeer::doSelect($criteria, $con);

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
			$criteria->add(FordefdetcatprePeer::ID, $pks, Criteria::IN);
			$objs = FordefdetcatprePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFordefdetcatprePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FordefdetcatpreMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FordefdetcatpreMapBuilder');
}
