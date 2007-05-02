<?php


abstract class BaseFctipapuPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fctipapu';

	
	const CLASS_DEFAULT = 'lib.model.Fctipapu';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TIPAPU = 'fctipapu.TIPAPU';

	
	const ANOVIG = 'fctipapu.ANOVIG';

	
	const DESTIP = 'fctipapu.DESTIP';

	
	const PORMON = 'fctipapu.PORMON';

	
	const ALIMON = 'fctipapu.ALIMON';

	
	const STATIP = 'fctipapu.STATIP';

	
	const ID = 'fctipapu.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Tipapu', 'Anovig', 'Destip', 'Pormon', 'Alimon', 'Statip', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FctipapuPeer::TIPAPU, FctipapuPeer::ANOVIG, FctipapuPeer::DESTIP, FctipapuPeer::PORMON, FctipapuPeer::ALIMON, FctipapuPeer::STATIP, FctipapuPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('tipapu', 'anovig', 'destip', 'pormon', 'alimon', 'statip', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Tipapu' => 0, 'Anovig' => 1, 'Destip' => 2, 'Pormon' => 3, 'Alimon' => 4, 'Statip' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (FctipapuPeer::TIPAPU => 0, FctipapuPeer::ANOVIG => 1, FctipapuPeer::DESTIP => 2, FctipapuPeer::PORMON => 3, FctipapuPeer::ALIMON => 4, FctipapuPeer::STATIP => 5, FctipapuPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('tipapu' => 0, 'anovig' => 1, 'destip' => 2, 'pormon' => 3, 'alimon' => 4, 'statip' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FctipapuMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FctipapuMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FctipapuPeer::getTableMap();
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
		return str_replace(FctipapuPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FctipapuPeer::TIPAPU);

		$criteria->addSelectColumn(FctipapuPeer::ANOVIG);

		$criteria->addSelectColumn(FctipapuPeer::DESTIP);

		$criteria->addSelectColumn(FctipapuPeer::PORMON);

		$criteria->addSelectColumn(FctipapuPeer::ALIMON);

		$criteria->addSelectColumn(FctipapuPeer::STATIP);

		$criteria->addSelectColumn(FctipapuPeer::ID);

	}

	const COUNT = 'COUNT(fctipapu.TIPAPU)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fctipapu.TIPAPU)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FctipapuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FctipapuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FctipapuPeer::doSelectRS($criteria, $con);
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
		$objects = FctipapuPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FctipapuPeer::populateObjects(FctipapuPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FctipapuPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FctipapuPeer::getOMClass();
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
		return FctipapuPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FctipapuPeer::TIPAPU);
			$selectCriteria->add(FctipapuPeer::TIPAPU, $criteria->remove(FctipapuPeer::TIPAPU), $comparison);

			$comparison = $criteria->getComparison(FctipapuPeer::ANOVIG);
			$selectCriteria->add(FctipapuPeer::ANOVIG, $criteria->remove(FctipapuPeer::ANOVIG), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FctipapuPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FctipapuPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fctipapu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

				$vals[0][] = $value[0];
				$vals[1][] = $value[1];
			}

			$criteria->add(FctipapuPeer::TIPAPU, $vals[0], Criteria::IN);
			$criteria->add(FctipapuPeer::ANOVIG, $vals[1], Criteria::IN);
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

	
	public static function doValidate(Fctipapu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FctipapuPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FctipapuPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FctipapuPeer::DATABASE_NAME, FctipapuPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FctipapuPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $tipapu, $anovig, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(FctipapuPeer::TIPAPU, $tipapu);
		$criteria->add(FctipapuPeer::ANOVIG, $anovig);
		$v = FctipapuPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseFctipapuPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FctipapuMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FctipapuMapBuilder');
}
