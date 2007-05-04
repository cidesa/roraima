<?php


abstract class BaseFcdecatpPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcdecatp';

	
	const CLASS_DEFAULT = 'lib.model.Fcdecatp';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMDEC = 'fcdecatp.NUMDEC';

	
	const NUMSOL = 'fcdecatp.NUMSOL';

	
	const NUMLIC = 'fcdecatp.NUMLIC';

	
	const FECDEC = 'fcdecatp.FECDEC';

	
	const MONDEC = 'fcdecatp.MONDEC';

	
	const FUNDEC = 'fcdecatp.FUNDEC';

	
	const EDODEC = 'fcdecatp.EDODEC';

	
	const ID = 'fcdecatp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numdec', 'Numsol', 'Numlic', 'Fecdec', 'Mondec', 'Fundec', 'Edodec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcdecatpPeer::NUMDEC, FcdecatpPeer::NUMSOL, FcdecatpPeer::NUMLIC, FcdecatpPeer::FECDEC, FcdecatpPeer::MONDEC, FcdecatpPeer::FUNDEC, FcdecatpPeer::EDODEC, FcdecatpPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numdec', 'numsol', 'numlic', 'fecdec', 'mondec', 'fundec', 'edodec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numdec' => 0, 'Numsol' => 1, 'Numlic' => 2, 'Fecdec' => 3, 'Mondec' => 4, 'Fundec' => 5, 'Edodec' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FcdecatpPeer::NUMDEC => 0, FcdecatpPeer::NUMSOL => 1, FcdecatpPeer::NUMLIC => 2, FcdecatpPeer::FECDEC => 3, FcdecatpPeer::MONDEC => 4, FcdecatpPeer::FUNDEC => 5, FcdecatpPeer::EDODEC => 6, FcdecatpPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('numdec' => 0, 'numsol' => 1, 'numlic' => 2, 'fecdec' => 3, 'mondec' => 4, 'fundec' => 5, 'edodec' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcdecatpMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcdecatpMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcdecatpPeer::getTableMap();
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
		return str_replace(FcdecatpPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcdecatpPeer::NUMDEC);

		$criteria->addSelectColumn(FcdecatpPeer::NUMSOL);

		$criteria->addSelectColumn(FcdecatpPeer::NUMLIC);

		$criteria->addSelectColumn(FcdecatpPeer::FECDEC);

		$criteria->addSelectColumn(FcdecatpPeer::MONDEC);

		$criteria->addSelectColumn(FcdecatpPeer::FUNDEC);

		$criteria->addSelectColumn(FcdecatpPeer::EDODEC);

		$criteria->addSelectColumn(FcdecatpPeer::ID);

	}

	const COUNT = 'COUNT(fcdecatp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcdecatp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdecatpPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdecatpPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcdecatpPeer::doSelectRS($criteria, $con);
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
		$objects = FcdecatpPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcdecatpPeer::populateObjects(FcdecatpPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcdecatpPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcdecatpPeer::getOMClass();
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
		return FcdecatpPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcdecatpPeer::ID);
			$selectCriteria->add(FcdecatpPeer::ID, $criteria->remove(FcdecatpPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcdecatpPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcdecatpPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcdecatp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcdecatpPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcdecatp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcdecatpPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcdecatpPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcdecatpPeer::DATABASE_NAME, FcdecatpPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcdecatpPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcdecatpPeer::DATABASE_NAME);

		$criteria->add(FcdecatpPeer::ID, $pk);


		$v = FcdecatpPeer::doSelect($criteria, $con);

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
			$criteria->add(FcdecatpPeer::ID, $pks, Criteria::IN);
			$objs = FcdecatpPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcdecatpPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcdecatpMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcdecatpMapBuilder');
}
