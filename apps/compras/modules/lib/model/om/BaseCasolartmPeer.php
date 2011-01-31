<?php


abstract class BaseCasolartmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'casolartm';

	
	const CLASS_DEFAULT = 'lib.model.Casolartm';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REQART = 'casolartm.REQART';

	
	const FECREQ = 'casolartm.FECREQ';

	
	const DESREQ = 'casolartm.DESREQ';

	
	const MONREQ = 'casolartm.MONREQ';

	
	const STAREQ = 'casolartm.STAREQ';

	
	const MOTREQ = 'casolartm.MOTREQ';

	
	const BENREQ = 'casolartm.BENREQ';

	
	const MONDES = 'casolartm.MONDES';

	
	const OBSREQ = 'casolartm.OBSREQ';

	
	const UNIRES = 'casolartm.UNIRES';

	
	const TIPMON = 'casolartm.TIPMON';

	
	const VALMON = 'casolartm.VALMON';

	
	const FECANU = 'casolartm.FECANU';

	
	const ID = 'casolartm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart', 'Fecreq', 'Desreq', 'Monreq', 'Stareq', 'Motreq', 'Benreq', 'Mondes', 'Obsreq', 'Unires', 'Tipmon', 'Valmon', 'Fecanu', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CasolartmPeer::REQART, CasolartmPeer::FECREQ, CasolartmPeer::DESREQ, CasolartmPeer::MONREQ, CasolartmPeer::STAREQ, CasolartmPeer::MOTREQ, CasolartmPeer::BENREQ, CasolartmPeer::MONDES, CasolartmPeer::OBSREQ, CasolartmPeer::UNIRES, CasolartmPeer::TIPMON, CasolartmPeer::VALMON, CasolartmPeer::FECANU, CasolartmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart', 'fecreq', 'desreq', 'monreq', 'stareq', 'motreq', 'benreq', 'mondes', 'obsreq', 'unires', 'tipmon', 'valmon', 'fecanu', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart' => 0, 'Fecreq' => 1, 'Desreq' => 2, 'Monreq' => 3, 'Stareq' => 4, 'Motreq' => 5, 'Benreq' => 6, 'Mondes' => 7, 'Obsreq' => 8, 'Unires' => 9, 'Tipmon' => 10, 'Valmon' => 11, 'Fecanu' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (CasolartmPeer::REQART => 0, CasolartmPeer::FECREQ => 1, CasolartmPeer::DESREQ => 2, CasolartmPeer::MONREQ => 3, CasolartmPeer::STAREQ => 4, CasolartmPeer::MOTREQ => 5, CasolartmPeer::BENREQ => 6, CasolartmPeer::MONDES => 7, CasolartmPeer::OBSREQ => 8, CasolartmPeer::UNIRES => 9, CasolartmPeer::TIPMON => 10, CasolartmPeer::VALMON => 11, CasolartmPeer::FECANU => 12, CasolartmPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart' => 0, 'fecreq' => 1, 'desreq' => 2, 'monreq' => 3, 'stareq' => 4, 'motreq' => 5, 'benreq' => 6, 'mondes' => 7, 'obsreq' => 8, 'unires' => 9, 'tipmon' => 10, 'valmon' => 11, 'fecanu' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CasolartmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CasolartmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CasolartmPeer::getTableMap();
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
		return str_replace(CasolartmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CasolartmPeer::REQART);

		$criteria->addSelectColumn(CasolartmPeer::FECREQ);

		$criteria->addSelectColumn(CasolartmPeer::DESREQ);

		$criteria->addSelectColumn(CasolartmPeer::MONREQ);

		$criteria->addSelectColumn(CasolartmPeer::STAREQ);

		$criteria->addSelectColumn(CasolartmPeer::MOTREQ);

		$criteria->addSelectColumn(CasolartmPeer::BENREQ);

		$criteria->addSelectColumn(CasolartmPeer::MONDES);

		$criteria->addSelectColumn(CasolartmPeer::OBSREQ);

		$criteria->addSelectColumn(CasolartmPeer::UNIRES);

		$criteria->addSelectColumn(CasolartmPeer::TIPMON);

		$criteria->addSelectColumn(CasolartmPeer::VALMON);

		$criteria->addSelectColumn(CasolartmPeer::FECANU);

		$criteria->addSelectColumn(CasolartmPeer::ID);

	}

	const COUNT = 'COUNT(casolartm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT casolartm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CasolartmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CasolartmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CasolartmPeer::doSelectRS($criteria, $con);
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
		$objects = CasolartmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CasolartmPeer::populateObjects(CasolartmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CasolartmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CasolartmPeer::getOMClass();
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
		return CasolartmPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CasolartmPeer::ID);
			$selectCriteria->add(CasolartmPeer::ID, $criteria->remove(CasolartmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CasolartmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CasolartmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Casolartm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CasolartmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Casolartm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CasolartmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CasolartmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CasolartmPeer::DATABASE_NAME, CasolartmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CasolartmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CasolartmPeer::DATABASE_NAME);

		$criteria->add(CasolartmPeer::ID, $pk);


		$v = CasolartmPeer::doSelect($criteria, $con);

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
			$criteria->add(CasolartmPeer::ID, $pks, Criteria::IN);
			$objs = CasolartmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCasolartmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CasolartmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CasolartmMapBuilder');
}
