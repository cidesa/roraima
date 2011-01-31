<?php


abstract class BaseViaextviatraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viaextviatra';

	
	const CLASS_DEFAULT = 'lib.model.Viaextviatra';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMEXT = 'viaextviatra.NUMEXT';

	
	const FECEXT = 'viaextviatra.FECEXT';

	
	const REFCAL = 'viaextviatra.REFCAL';

	
	const CODCAT = 'viaextviatra.CODCAT';

	
	const DIACONPER = 'viaextviatra.DIACONPER';

	
	const DIASINPER = 'viaextviatra.DIASINPER';

	
	const STATUS = 'viaextviatra.STATUS';

	
	const OBSERVACIONES = 'viaextviatra.OBSERVACIONES';

	
	const REFCOM = 'viaextviatra.REFCOM';

	
	const ID = 'viaextviatra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numext', 'Fecext', 'Refcal', 'Codcat', 'Diaconper', 'Diasinper', 'Status', 'Observaciones', 'Refcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViaextviatraPeer::NUMEXT, ViaextviatraPeer::FECEXT, ViaextviatraPeer::REFCAL, ViaextviatraPeer::CODCAT, ViaextviatraPeer::DIACONPER, ViaextviatraPeer::DIASINPER, ViaextviatraPeer::STATUS, ViaextviatraPeer::OBSERVACIONES, ViaextviatraPeer::REFCOM, ViaextviatraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numext', 'fecext', 'refcal', 'codcat', 'diaconper', 'diasinper', 'status', 'observaciones', 'refcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numext' => 0, 'Fecext' => 1, 'Refcal' => 2, 'Codcat' => 3, 'Diaconper' => 4, 'Diasinper' => 5, 'Status' => 6, 'Observaciones' => 7, 'Refcom' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (ViaextviatraPeer::NUMEXT => 0, ViaextviatraPeer::FECEXT => 1, ViaextviatraPeer::REFCAL => 2, ViaextviatraPeer::CODCAT => 3, ViaextviatraPeer::DIACONPER => 4, ViaextviatraPeer::DIASINPER => 5, ViaextviatraPeer::STATUS => 6, ViaextviatraPeer::OBSERVACIONES => 7, ViaextviatraPeer::REFCOM => 8, ViaextviatraPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('numext' => 0, 'fecext' => 1, 'refcal' => 2, 'codcat' => 3, 'diaconper' => 4, 'diasinper' => 5, 'status' => 6, 'observaciones' => 7, 'refcom' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViaextviatraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViaextviatraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViaextviatraPeer::getTableMap();
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
		return str_replace(ViaextviatraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViaextviatraPeer::NUMEXT);

		$criteria->addSelectColumn(ViaextviatraPeer::FECEXT);

		$criteria->addSelectColumn(ViaextviatraPeer::REFCAL);

		$criteria->addSelectColumn(ViaextviatraPeer::CODCAT);

		$criteria->addSelectColumn(ViaextviatraPeer::DIACONPER);

		$criteria->addSelectColumn(ViaextviatraPeer::DIASINPER);

		$criteria->addSelectColumn(ViaextviatraPeer::STATUS);

		$criteria->addSelectColumn(ViaextviatraPeer::OBSERVACIONES);

		$criteria->addSelectColumn(ViaextviatraPeer::REFCOM);

		$criteria->addSelectColumn(ViaextviatraPeer::ID);

	}

	const COUNT = 'COUNT(viaextviatra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viaextviatra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaextviatraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaextviatraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViaextviatraPeer::doSelectRS($criteria, $con);
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
		$objects = ViaextviatraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViaextviatraPeer::populateObjects(ViaextviatraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViaextviatraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViaextviatraPeer::getOMClass();
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
		return ViaextviatraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViaextviatraPeer::ID); 

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
			$comparison = $criteria->getComparison(ViaextviatraPeer::ID);
			$selectCriteria->add(ViaextviatraPeer::ID, $criteria->remove(ViaextviatraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViaextviatraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViaextviatraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viaextviatra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViaextviatraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viaextviatra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViaextviatraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViaextviatraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViaextviatraPeer::DATABASE_NAME, ViaextviatraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViaextviatraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViaextviatraPeer::DATABASE_NAME);

		$criteria->add(ViaextviatraPeer::ID, $pk);


		$v = ViaextviatraPeer::doSelect($criteria, $con);

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
			$criteria->add(ViaextviatraPeer::ID, $pks, Criteria::IN);
			$objs = ViaextviatraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViaextviatraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViaextviatraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViaextviatraMapBuilder');
}
