<?php


abstract class BaseCacroconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cacrocon';

	
	const CLASS_DEFAULT = 'lib.model.Cacrocon';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ORDCON = 'cacrocon.ORDCON';

	
	const FECPAG = 'cacrocon.FECPAG';

	
	const NROPAG = 'cacrocon.NROPAG';

	
	const MONPAG = 'cacrocon.MONPAG';

	
	const PORMON = 'cacrocon.PORMON';

	
	const PORAMO = 'cacrocon.PORAMO';

	
	const ID = 'cacrocon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcon', 'Fecpag', 'Nropag', 'Monpag', 'Pormon', 'Poramo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CacroconPeer::ORDCON, CacroconPeer::FECPAG, CacroconPeer::NROPAG, CacroconPeer::MONPAG, CacroconPeer::PORMON, CacroconPeer::PORAMO, CacroconPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcon', 'fecpag', 'nropag', 'monpag', 'pormon', 'poramo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcon' => 0, 'Fecpag' => 1, 'Nropag' => 2, 'Monpag' => 3, 'Pormon' => 4, 'Poramo' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (CacroconPeer::ORDCON => 0, CacroconPeer::FECPAG => 1, CacroconPeer::NROPAG => 2, CacroconPeer::MONPAG => 3, CacroconPeer::PORMON => 4, CacroconPeer::PORAMO => 5, CacroconPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcon' => 0, 'fecpag' => 1, 'nropag' => 2, 'monpag' => 3, 'pormon' => 4, 'poramo' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CacroconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CacroconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CacroconPeer::getTableMap();
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
		return str_replace(CacroconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CacroconPeer::ORDCON);

		$criteria->addSelectColumn(CacroconPeer::FECPAG);

		$criteria->addSelectColumn(CacroconPeer::NROPAG);

		$criteria->addSelectColumn(CacroconPeer::MONPAG);

		$criteria->addSelectColumn(CacroconPeer::PORMON);

		$criteria->addSelectColumn(CacroconPeer::PORAMO);

		$criteria->addSelectColumn(CacroconPeer::ID);

	}

	const COUNT = 'COUNT(cacrocon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cacrocon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CacroconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CacroconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CacroconPeer::doSelectRS($criteria, $con);
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
		$objects = CacroconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CacroconPeer::populateObjects(CacroconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CacroconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CacroconPeer::getOMClass();
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
		return CacroconPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CacroconPeer::ID); 

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
			$comparison = $criteria->getComparison(CacroconPeer::ID);
			$selectCriteria->add(CacroconPeer::ID, $criteria->remove(CacroconPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CacroconPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CacroconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cacrocon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CacroconPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cacrocon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CacroconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CacroconPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CacroconPeer::DATABASE_NAME, CacroconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CacroconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CacroconPeer::DATABASE_NAME);

		$criteria->add(CacroconPeer::ID, $pk);


		$v = CacroconPeer::doSelect($criteria, $con);

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
			$criteria->add(CacroconPeer::ID, $pks, Criteria::IN);
			$objs = CacroconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCacroconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CacroconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CacroconMapBuilder');
}
