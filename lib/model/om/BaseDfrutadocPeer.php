<?php


abstract class BaseDfrutadocPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dfrutadoc';

	
	const CLASS_DEFAULT = 'lib.model.Dfrutadoc';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RUTDOC = 'dfrutadoc.RUTDOC';

	
	const TIPDOC = 'dfrutadoc.TIPDOC';

	
	const NUMUNI1 = 'dfrutadoc.NUMUNI1';

	
	const DIAPER1 = 'dfrutadoc.DIAPER1';

	
	const NUMUNI2 = 'dfrutadoc.NUMUNI2';

	
	const DIAPER2 = 'dfrutadoc.DIAPER2';

	
	const NUMUNI3 = 'dfrutadoc.NUMUNI3';

	
	const DIAPER3 = 'dfrutadoc.DIAPER3';

	
	const NUMUNI4 = 'dfrutadoc.NUMUNI4';

	
	const DIAPER4 = 'dfrutadoc.DIAPER4';

	
	const NUMUNI5 = 'dfrutadoc.NUMUNI5';

	
	const DIAPER5 = 'dfrutadoc.DIAPER5';

	
	const NUMUNI6 = 'dfrutadoc.NUMUNI6';

	
	const DIAPER6 = 'dfrutadoc.DIAPER6';

	
	const NUMUNI7 = 'dfrutadoc.NUMUNI7';

	
	const DIAPER7 = 'dfrutadoc.DIAPER7';

	
	const ID = 'dfrutadoc.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Rutdoc', 'Tipdoc', 'Numuni1', 'Diaper1', 'Numuni2', 'Diaper2', 'Numuni3', 'Diaper3', 'Numuni4', 'Diaper4', 'Numuni5', 'Diaper5', 'Numuni6', 'Diaper6', 'Numuni7', 'Diaper7', 'Id', ),
		BasePeer::TYPE_COLNAME => array (DfrutadocPeer::RUTDOC, DfrutadocPeer::TIPDOC, DfrutadocPeer::NUMUNI1, DfrutadocPeer::DIAPER1, DfrutadocPeer::NUMUNI2, DfrutadocPeer::DIAPER2, DfrutadocPeer::NUMUNI3, DfrutadocPeer::DIAPER3, DfrutadocPeer::NUMUNI4, DfrutadocPeer::DIAPER4, DfrutadocPeer::NUMUNI5, DfrutadocPeer::DIAPER5, DfrutadocPeer::NUMUNI6, DfrutadocPeer::DIAPER6, DfrutadocPeer::NUMUNI7, DfrutadocPeer::DIAPER7, DfrutadocPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('rutdoc', 'tipdoc', 'numuni1', 'diaper1', 'numuni2', 'diaper2', 'numuni3', 'diaper3', 'numuni4', 'diaper4', 'numuni5', 'diaper5', 'numuni6', 'diaper6', 'numuni7', 'diaper7', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Rutdoc' => 0, 'Tipdoc' => 1, 'Numuni1' => 2, 'Diaper1' => 3, 'Numuni2' => 4, 'Diaper2' => 5, 'Numuni3' => 6, 'Diaper3' => 7, 'Numuni4' => 8, 'Diaper4' => 9, 'Numuni5' => 10, 'Diaper5' => 11, 'Numuni6' => 12, 'Diaper6' => 13, 'Numuni7' => 14, 'Diaper7' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (DfrutadocPeer::RUTDOC => 0, DfrutadocPeer::TIPDOC => 1, DfrutadocPeer::NUMUNI1 => 2, DfrutadocPeer::DIAPER1 => 3, DfrutadocPeer::NUMUNI2 => 4, DfrutadocPeer::DIAPER2 => 5, DfrutadocPeer::NUMUNI3 => 6, DfrutadocPeer::DIAPER3 => 7, DfrutadocPeer::NUMUNI4 => 8, DfrutadocPeer::DIAPER4 => 9, DfrutadocPeer::NUMUNI5 => 10, DfrutadocPeer::DIAPER5 => 11, DfrutadocPeer::NUMUNI6 => 12, DfrutadocPeer::DIAPER6 => 13, DfrutadocPeer::NUMUNI7 => 14, DfrutadocPeer::DIAPER7 => 15, DfrutadocPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('rutdoc' => 0, 'tipdoc' => 1, 'numuni1' => 2, 'diaper1' => 3, 'numuni2' => 4, 'diaper2' => 5, 'numuni3' => 6, 'diaper3' => 7, 'numuni4' => 8, 'diaper4' => 9, 'numuni5' => 10, 'diaper5' => 11, 'numuni6' => 12, 'diaper6' => 13, 'numuni7' => 14, 'diaper7' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DfrutadocMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DfrutadocMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DfrutadocPeer::getTableMap();
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
		return str_replace(DfrutadocPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DfrutadocPeer::RUTDOC);

		$criteria->addSelectColumn(DfrutadocPeer::TIPDOC);

		$criteria->addSelectColumn(DfrutadocPeer::NUMUNI1);

		$criteria->addSelectColumn(DfrutadocPeer::DIAPER1);

		$criteria->addSelectColumn(DfrutadocPeer::NUMUNI2);

		$criteria->addSelectColumn(DfrutadocPeer::DIAPER2);

		$criteria->addSelectColumn(DfrutadocPeer::NUMUNI3);

		$criteria->addSelectColumn(DfrutadocPeer::DIAPER3);

		$criteria->addSelectColumn(DfrutadocPeer::NUMUNI4);

		$criteria->addSelectColumn(DfrutadocPeer::DIAPER4);

		$criteria->addSelectColumn(DfrutadocPeer::NUMUNI5);

		$criteria->addSelectColumn(DfrutadocPeer::DIAPER5);

		$criteria->addSelectColumn(DfrutadocPeer::NUMUNI6);

		$criteria->addSelectColumn(DfrutadocPeer::DIAPER6);

		$criteria->addSelectColumn(DfrutadocPeer::NUMUNI7);

		$criteria->addSelectColumn(DfrutadocPeer::DIAPER7);

		$criteria->addSelectColumn(DfrutadocPeer::ID);

	}

	const COUNT = 'COUNT(dfrutadoc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT dfrutadoc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfrutadocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfrutadocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DfrutadocPeer::doSelectRS($criteria, $con);
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
		$objects = DfrutadocPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DfrutadocPeer::populateObjects(DfrutadocPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DfrutadocPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DfrutadocPeer::getOMClass();
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
		return DfrutadocPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(DfrutadocPeer::ID);
			$selectCriteria->add(DfrutadocPeer::ID, $criteria->remove(DfrutadocPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DfrutadocPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DfrutadocPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Dfrutadoc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DfrutadocPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Dfrutadoc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DfrutadocPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DfrutadocPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DfrutadocPeer::DATABASE_NAME, DfrutadocPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DfrutadocPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DfrutadocPeer::DATABASE_NAME);

		$criteria->add(DfrutadocPeer::ID, $pk);


		$v = DfrutadocPeer::doSelect($criteria, $con);

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
			$criteria->add(DfrutadocPeer::ID, $pks, Criteria::IN);
			$objs = DfrutadocPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDfrutadocPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DfrutadocMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DfrutadocMapBuilder');
}
