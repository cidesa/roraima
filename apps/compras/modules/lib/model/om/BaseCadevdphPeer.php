<?php


abstract class BaseCadevdphPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadevdph';

	
	const CLASS_DEFAULT = 'lib.model.Cadevdph';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DEVDPH = 'cadevdph.DEVDPH';

	
	const FECDEV = 'cadevdph.FECDEV';

	
	const DPHART = 'cadevdph.DPHART';

	
	const DESDEV = 'cadevdph.DESDEV';

	
	const MONDEV = 'cadevdph.MONDEV';

	
	const STADEV = 'cadevdph.STADEV';

	
	const NUMCOM = 'cadevdph.NUMCOM';

	
	const ID = 'cadevdph.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Devdph', 'Fecdev', 'Dphart', 'Desdev', 'Mondev', 'Stadev', 'Numcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadevdphPeer::DEVDPH, CadevdphPeer::FECDEV, CadevdphPeer::DPHART, CadevdphPeer::DESDEV, CadevdphPeer::MONDEV, CadevdphPeer::STADEV, CadevdphPeer::NUMCOM, CadevdphPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('devdph', 'fecdev', 'dphart', 'desdev', 'mondev', 'stadev', 'numcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Devdph' => 0, 'Fecdev' => 1, 'Dphart' => 2, 'Desdev' => 3, 'Mondev' => 4, 'Stadev' => 5, 'Numcom' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (CadevdphPeer::DEVDPH => 0, CadevdphPeer::FECDEV => 1, CadevdphPeer::DPHART => 2, CadevdphPeer::DESDEV => 3, CadevdphPeer::MONDEV => 4, CadevdphPeer::STADEV => 5, CadevdphPeer::NUMCOM => 6, CadevdphPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('devdph' => 0, 'fecdev' => 1, 'dphart' => 2, 'desdev' => 3, 'mondev' => 4, 'stadev' => 5, 'numcom' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CadevdphMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CadevdphMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadevdphPeer::getTableMap();
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
		return str_replace(CadevdphPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadevdphPeer::DEVDPH);

		$criteria->addSelectColumn(CadevdphPeer::FECDEV);

		$criteria->addSelectColumn(CadevdphPeer::DPHART);

		$criteria->addSelectColumn(CadevdphPeer::DESDEV);

		$criteria->addSelectColumn(CadevdphPeer::MONDEV);

		$criteria->addSelectColumn(CadevdphPeer::STADEV);

		$criteria->addSelectColumn(CadevdphPeer::NUMCOM);

		$criteria->addSelectColumn(CadevdphPeer::ID);

	}

	const COUNT = 'COUNT(cadevdph.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadevdph.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadevdphPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadevdphPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadevdphPeer::doSelectRS($criteria, $con);
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
		$objects = CadevdphPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadevdphPeer::populateObjects(CadevdphPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadevdphPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadevdphPeer::getOMClass();
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
		return CadevdphPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CadevdphPeer::ID);
			$selectCriteria->add(CadevdphPeer::ID, $criteria->remove(CadevdphPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadevdphPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadevdphPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadevdph) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadevdphPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadevdph $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadevdphPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadevdphPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadevdphPeer::DATABASE_NAME, CadevdphPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadevdphPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadevdphPeer::DATABASE_NAME);

		$criteria->add(CadevdphPeer::ID, $pk);


		$v = CadevdphPeer::doSelect($criteria, $con);

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
			$criteria->add(CadevdphPeer::ID, $pks, Criteria::IN);
			$objs = CadevdphPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadevdphPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CadevdphMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CadevdphMapBuilder');
}
