<?php


abstract class BaseFordismetperpryaccmetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fordismetperpryaccmet';

	
	const CLASS_DEFAULT = 'lib.model.Fordismetperpryaccmet';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRO = 'fordismetperpryaccmet.CODPRO';

	
	const CODACCESP = 'fordismetperpryaccmet.CODACCESP';

	
	const CODMET = 'fordismetperpryaccmet.CODMET';

	
	const PERPRE = 'fordismetperpryaccmet.PERPRE';

	
	const CANMET = 'fordismetperpryaccmet.CANMET';

	
	const CANMETEJE = 'fordismetperpryaccmet.CANMETEJE';

	
	const ID = 'fordismetperpryaccmet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro', 'Codaccesp', 'Codmet', 'Perpre', 'Canmet', 'Canmeteje', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FordismetperpryaccmetPeer::CODPRO, FordismetperpryaccmetPeer::CODACCESP, FordismetperpryaccmetPeer::CODMET, FordismetperpryaccmetPeer::PERPRE, FordismetperpryaccmetPeer::CANMET, FordismetperpryaccmetPeer::CANMETEJE, FordismetperpryaccmetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro', 'codaccesp', 'codmet', 'perpre', 'canmet', 'canmeteje', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro' => 0, 'Codaccesp' => 1, 'Codmet' => 2, 'Perpre' => 3, 'Canmet' => 4, 'Canmeteje' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (FordismetperpryaccmetPeer::CODPRO => 0, FordismetperpryaccmetPeer::CODACCESP => 1, FordismetperpryaccmetPeer::CODMET => 2, FordismetperpryaccmetPeer::PERPRE => 3, FordismetperpryaccmetPeer::CANMET => 4, FordismetperpryaccmetPeer::CANMETEJE => 5, FordismetperpryaccmetPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro' => 0, 'codaccesp' => 1, 'codmet' => 2, 'perpre' => 3, 'canmet' => 4, 'canmeteje' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FordismetperpryaccmetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FordismetperpryaccmetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FordismetperpryaccmetPeer::getTableMap();
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
		return str_replace(FordismetperpryaccmetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FordismetperpryaccmetPeer::CODPRO);

		$criteria->addSelectColumn(FordismetperpryaccmetPeer::CODACCESP);

		$criteria->addSelectColumn(FordismetperpryaccmetPeer::CODMET);

		$criteria->addSelectColumn(FordismetperpryaccmetPeer::PERPRE);

		$criteria->addSelectColumn(FordismetperpryaccmetPeer::CANMET);

		$criteria->addSelectColumn(FordismetperpryaccmetPeer::CANMETEJE);

		$criteria->addSelectColumn(FordismetperpryaccmetPeer::ID);

	}

	const COUNT = 'COUNT(fordismetperpryaccmet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fordismetperpryaccmet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FordismetperpryaccmetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FordismetperpryaccmetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FordismetperpryaccmetPeer::doSelectRS($criteria, $con);
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
		$objects = FordismetperpryaccmetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FordismetperpryaccmetPeer::populateObjects(FordismetperpryaccmetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FordismetperpryaccmetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FordismetperpryaccmetPeer::getOMClass();
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
		return FordismetperpryaccmetPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FordismetperpryaccmetPeer::ID);
			$selectCriteria->add(FordismetperpryaccmetPeer::ID, $criteria->remove(FordismetperpryaccmetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FordismetperpryaccmetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FordismetperpryaccmetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fordismetperpryaccmet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FordismetperpryaccmetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fordismetperpryaccmet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FordismetperpryaccmetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FordismetperpryaccmetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FordismetperpryaccmetPeer::DATABASE_NAME, FordismetperpryaccmetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FordismetperpryaccmetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FordismetperpryaccmetPeer::DATABASE_NAME);

		$criteria->add(FordismetperpryaccmetPeer::ID, $pk);


		$v = FordismetperpryaccmetPeer::doSelect($criteria, $con);

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
			$criteria->add(FordismetperpryaccmetPeer::ID, $pks, Criteria::IN);
			$objs = FordismetperpryaccmetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFordismetperpryaccmetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FordismetperpryaccmetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FordismetperpryaccmetMapBuilder');
}
