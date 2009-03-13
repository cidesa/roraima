<?php


abstract class BaseNpvacdiasbonovacPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npvacdiasbonovac';

	
	const CLASS_DEFAULT = 'lib.model.Npvacdiasbonovac';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npvacdiasbonovac.CODNOM';

	
	const PERINI = 'npvacdiasbonovac.PERINI';

	
	const PERFIN = 'npvacdiasbonovac.PERFIN';

	
	const RANGODESDE = 'npvacdiasbonovac.RANGODESDE';

	
	const RANGOHASTA = 'npvacdiasbonovac.RANGOHASTA';

	
	const DIASBONOVAC = 'npvacdiasbonovac.DIASBONOVAC';

	
	const ID = 'npvacdiasbonovac.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Perini', 'Perfin', 'Rangodesde', 'Rangohasta', 'Diasbonovac', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpvacdiasbonovacPeer::CODNOM, NpvacdiasbonovacPeer::PERINI, NpvacdiasbonovacPeer::PERFIN, NpvacdiasbonovacPeer::RANGODESDE, NpvacdiasbonovacPeer::RANGOHASTA, NpvacdiasbonovacPeer::DIASBONOVAC, NpvacdiasbonovacPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'perini', 'perfin', 'rangodesde', 'rangohasta', 'diasbonovac', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Perini' => 1, 'Perfin' => 2, 'Rangodesde' => 3, 'Rangohasta' => 4, 'Diasbonovac' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (NpvacdiasbonovacPeer::CODNOM => 0, NpvacdiasbonovacPeer::PERINI => 1, NpvacdiasbonovacPeer::PERFIN => 2, NpvacdiasbonovacPeer::RANGODESDE => 3, NpvacdiasbonovacPeer::RANGOHASTA => 4, NpvacdiasbonovacPeer::DIASBONOVAC => 5, NpvacdiasbonovacPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'perini' => 1, 'perfin' => 2, 'rangodesde' => 3, 'rangohasta' => 4, 'diasbonovac' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpvacdiasbonovacMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpvacdiasbonovacMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpvacdiasbonovacPeer::getTableMap();
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
		return str_replace(NpvacdiasbonovacPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpvacdiasbonovacPeer::CODNOM);

		$criteria->addSelectColumn(NpvacdiasbonovacPeer::PERINI);

		$criteria->addSelectColumn(NpvacdiasbonovacPeer::PERFIN);

		$criteria->addSelectColumn(NpvacdiasbonovacPeer::RANGODESDE);

		$criteria->addSelectColumn(NpvacdiasbonovacPeer::RANGOHASTA);

		$criteria->addSelectColumn(NpvacdiasbonovacPeer::DIASBONOVAC);

		$criteria->addSelectColumn(NpvacdiasbonovacPeer::ID);

	}

	const COUNT = 'COUNT(npvacdiasbonovac.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npvacdiasbonovac.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpvacdiasbonovacPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpvacdiasbonovacPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpvacdiasbonovacPeer::doSelectRS($criteria, $con);
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
		$objects = NpvacdiasbonovacPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpvacdiasbonovacPeer::populateObjects(NpvacdiasbonovacPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpvacdiasbonovacPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpvacdiasbonovacPeer::getOMClass();
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
		return NpvacdiasbonovacPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpvacdiasbonovacPeer::ID); 

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
			$comparison = $criteria->getComparison(NpvacdiasbonovacPeer::ID);
			$selectCriteria->add(NpvacdiasbonovacPeer::ID, $criteria->remove(NpvacdiasbonovacPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpvacdiasbonovacPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpvacdiasbonovacPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npvacdiasbonovac) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpvacdiasbonovacPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npvacdiasbonovac $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpvacdiasbonovacPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpvacdiasbonovacPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpvacdiasbonovacPeer::DATABASE_NAME, NpvacdiasbonovacPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpvacdiasbonovacPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpvacdiasbonovacPeer::DATABASE_NAME);

		$criteria->add(NpvacdiasbonovacPeer::ID, $pk);


		$v = NpvacdiasbonovacPeer::doSelect($criteria, $con);

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
			$criteria->add(NpvacdiasbonovacPeer::ID, $pks, Criteria::IN);
			$objs = NpvacdiasbonovacPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpvacdiasbonovacPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpvacdiasbonovacMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpvacdiasbonovacMapBuilder');
}
