<?php


abstract class BaseFadevoluPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fadevolu';

	
	const CLASS_DEFAULT = 'lib.model.Fadevolu';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NRODEV = 'fadevolu.NRODEV';

	
	const FECDEV = 'fadevolu.FECDEV';

	
	const REFDES = 'fadevolu.REFDES';

	
	const CODTIDEV = 'fadevolu.CODTIDEV';

	
	const CODALM = 'fadevolu.CODALM';

	
	const DESDEV = 'fadevolu.DESDEV';

	
	const STADPH = 'fadevolu.STADPH';

	
	const MONDEV = 'fadevolu.MONDEV';

	
	const OBSDEV = 'fadevolu.OBSDEV';

	
	const ID = 'fadevolu.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nrodev', 'Fecdev', 'Refdes', 'Codtidev', 'Codalm', 'Desdev', 'Stadph', 'Mondev', 'Obsdev', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FadevoluPeer::NRODEV, FadevoluPeer::FECDEV, FadevoluPeer::REFDES, FadevoluPeer::CODTIDEV, FadevoluPeer::CODALM, FadevoluPeer::DESDEV, FadevoluPeer::STADPH, FadevoluPeer::MONDEV, FadevoluPeer::OBSDEV, FadevoluPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nrodev', 'fecdev', 'refdes', 'codtidev', 'codalm', 'desdev', 'stadph', 'mondev', 'obsdev', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nrodev' => 0, 'Fecdev' => 1, 'Refdes' => 2, 'Codtidev' => 3, 'Codalm' => 4, 'Desdev' => 5, 'Stadph' => 6, 'Mondev' => 7, 'Obsdev' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (FadevoluPeer::NRODEV => 0, FadevoluPeer::FECDEV => 1, FadevoluPeer::REFDES => 2, FadevoluPeer::CODTIDEV => 3, FadevoluPeer::CODALM => 4, FadevoluPeer::DESDEV => 5, FadevoluPeer::STADPH => 6, FadevoluPeer::MONDEV => 7, FadevoluPeer::OBSDEV => 8, FadevoluPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('nrodev' => 0, 'fecdev' => 1, 'refdes' => 2, 'codtidev' => 3, 'codalm' => 4, 'desdev' => 5, 'stadph' => 6, 'mondev' => 7, 'obsdev' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FadevoluMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FadevoluMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FadevoluPeer::getTableMap();
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
		return str_replace(FadevoluPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FadevoluPeer::NRODEV);

		$criteria->addSelectColumn(FadevoluPeer::FECDEV);

		$criteria->addSelectColumn(FadevoluPeer::REFDES);

		$criteria->addSelectColumn(FadevoluPeer::CODTIDEV);

		$criteria->addSelectColumn(FadevoluPeer::CODALM);

		$criteria->addSelectColumn(FadevoluPeer::DESDEV);

		$criteria->addSelectColumn(FadevoluPeer::STADPH);

		$criteria->addSelectColumn(FadevoluPeer::MONDEV);

		$criteria->addSelectColumn(FadevoluPeer::OBSDEV);

		$criteria->addSelectColumn(FadevoluPeer::ID);

	}

	const COUNT = 'COUNT(fadevolu.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fadevolu.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadevoluPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadevoluPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FadevoluPeer::doSelectRS($criteria, $con);
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
		$objects = FadevoluPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FadevoluPeer::populateObjects(FadevoluPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FadevoluPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FadevoluPeer::getOMClass();
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
		return FadevoluPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FadevoluPeer::ID);
			$selectCriteria->add(FadevoluPeer::ID, $criteria->remove(FadevoluPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FadevoluPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FadevoluPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fadevolu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FadevoluPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fadevolu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FadevoluPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FadevoluPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FadevoluPeer::DATABASE_NAME, FadevoluPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FadevoluPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FadevoluPeer::DATABASE_NAME);

		$criteria->add(FadevoluPeer::ID, $pk);


		$v = FadevoluPeer::doSelect($criteria, $con);

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
			$criteria->add(FadevoluPeer::ID, $pks, Criteria::IN);
			$objs = FadevoluPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFadevoluPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FadevoluMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FadevoluMapBuilder');
}
