<?php


abstract class BaseFordefpryaccmetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fordefpryaccmet';

	
	const CLASS_DEFAULT = 'lib.model.Fordefpryaccmet';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRO = 'fordefpryaccmet.CODPRO';

	
	const CODACCESP = 'fordefpryaccmet.CODACCESP';

	
	const CODMET = 'fordefpryaccmet.CODMET';

	
	const DESMET = 'fordefpryaccmet.DESMET';

	
	const CODUNIMED = 'fordefpryaccmet.CODUNIMED';

	
	const CANMET = 'fordefpryaccmet.CANMET';

	
	const ID = 'fordefpryaccmet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro', 'Codaccesp', 'Codmet', 'Desmet', 'Codunimed', 'Canmet', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FordefpryaccmetPeer::CODPRO, FordefpryaccmetPeer::CODACCESP, FordefpryaccmetPeer::CODMET, FordefpryaccmetPeer::DESMET, FordefpryaccmetPeer::CODUNIMED, FordefpryaccmetPeer::CANMET, FordefpryaccmetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro', 'codaccesp', 'codmet', 'desmet', 'codunimed', 'canmet', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro' => 0, 'Codaccesp' => 1, 'Codmet' => 2, 'Desmet' => 3, 'Codunimed' => 4, 'Canmet' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (FordefpryaccmetPeer::CODPRO => 0, FordefpryaccmetPeer::CODACCESP => 1, FordefpryaccmetPeer::CODMET => 2, FordefpryaccmetPeer::DESMET => 3, FordefpryaccmetPeer::CODUNIMED => 4, FordefpryaccmetPeer::CANMET => 5, FordefpryaccmetPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro' => 0, 'codaccesp' => 1, 'codmet' => 2, 'desmet' => 3, 'codunimed' => 4, 'canmet' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FordefpryaccmetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FordefpryaccmetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FordefpryaccmetPeer::getTableMap();
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
		return str_replace(FordefpryaccmetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FordefpryaccmetPeer::CODPRO);

		$criteria->addSelectColumn(FordefpryaccmetPeer::CODACCESP);

		$criteria->addSelectColumn(FordefpryaccmetPeer::CODMET);

		$criteria->addSelectColumn(FordefpryaccmetPeer::DESMET);

		$criteria->addSelectColumn(FordefpryaccmetPeer::CODUNIMED);

		$criteria->addSelectColumn(FordefpryaccmetPeer::CANMET);

		$criteria->addSelectColumn(FordefpryaccmetPeer::ID);

	}

	const COUNT = 'COUNT(fordefpryaccmet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fordefpryaccmet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FordefpryaccmetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FordefpryaccmetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FordefpryaccmetPeer::doSelectRS($criteria, $con);
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
		$objects = FordefpryaccmetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FordefpryaccmetPeer::populateObjects(FordefpryaccmetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FordefpryaccmetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FordefpryaccmetPeer::getOMClass();
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
		return FordefpryaccmetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FordefpryaccmetPeer::ID); 

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
			$comparison = $criteria->getComparison(FordefpryaccmetPeer::ID);
			$selectCriteria->add(FordefpryaccmetPeer::ID, $criteria->remove(FordefpryaccmetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FordefpryaccmetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FordefpryaccmetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fordefpryaccmet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FordefpryaccmetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fordefpryaccmet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FordefpryaccmetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FordefpryaccmetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FordefpryaccmetPeer::DATABASE_NAME, FordefpryaccmetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FordefpryaccmetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FordefpryaccmetPeer::DATABASE_NAME);

		$criteria->add(FordefpryaccmetPeer::ID, $pk);


		$v = FordefpryaccmetPeer::doSelect($criteria, $con);

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
			$criteria->add(FordefpryaccmetPeer::ID, $pks, Criteria::IN);
			$objs = FordefpryaccmetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFordefpryaccmetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FordefpryaccmetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FordefpryaccmetMapBuilder');
}
