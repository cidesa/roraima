<?php


abstract class BaseFctipespPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fctipesp';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fctipesp';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TIPESP = 'fctipesp.TIPESP';

	
	const ANOVIG = 'fctipesp.ANOVIG';

	
	const DESTIP = 'fctipesp.DESTIP';

	
	const PORMON = 'fctipesp.PORMON';

	
	const ALIMON = 'fctipesp.ALIMON';

	
	const STATIP = 'fctipesp.STATIP';

	
	const UNIPAR = 'fctipesp.UNIPAR';

	
	const FREPAR = 'fctipesp.FREPAR';

	
	const PARESP = 'fctipesp.PARESP';

	
	const EXOESP = 'fctipesp.EXOESP';

	
	const ID = 'fctipesp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Tipesp', 'Anovig', 'Destip', 'Pormon', 'Alimon', 'Statip', 'Unipar', 'Frepar', 'Paresp', 'Exoesp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FctipespPeer::TIPESP, FctipespPeer::ANOVIG, FctipespPeer::DESTIP, FctipespPeer::PORMON, FctipespPeer::ALIMON, FctipespPeer::STATIP, FctipespPeer::UNIPAR, FctipespPeer::FREPAR, FctipespPeer::PARESP, FctipespPeer::EXOESP, FctipespPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('tipesp', 'anovig', 'destip', 'pormon', 'alimon', 'statip', 'unipar', 'frepar', 'paresp', 'exoesp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Tipesp' => 0, 'Anovig' => 1, 'Destip' => 2, 'Pormon' => 3, 'Alimon' => 4, 'Statip' => 5, 'Unipar' => 6, 'Frepar' => 7, 'Paresp' => 8, 'Exoesp' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (FctipespPeer::TIPESP => 0, FctipespPeer::ANOVIG => 1, FctipespPeer::DESTIP => 2, FctipespPeer::PORMON => 3, FctipespPeer::ALIMON => 4, FctipespPeer::STATIP => 5, FctipespPeer::UNIPAR => 6, FctipespPeer::FREPAR => 7, FctipespPeer::PARESP => 8, FctipespPeer::EXOESP => 9, FctipespPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('tipesp' => 0, 'anovig' => 1, 'destip' => 2, 'pormon' => 3, 'alimon' => 4, 'statip' => 5, 'unipar' => 6, 'frepar' => 7, 'paresp' => 8, 'exoesp' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FctipespMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FctipespMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FctipespPeer::getTableMap();
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
		return str_replace(FctipespPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FctipespPeer::TIPESP);

		$criteria->addSelectColumn(FctipespPeer::ANOVIG);

		$criteria->addSelectColumn(FctipespPeer::DESTIP);

		$criteria->addSelectColumn(FctipespPeer::PORMON);

		$criteria->addSelectColumn(FctipespPeer::ALIMON);

		$criteria->addSelectColumn(FctipespPeer::STATIP);

		$criteria->addSelectColumn(FctipespPeer::UNIPAR);

		$criteria->addSelectColumn(FctipespPeer::FREPAR);

		$criteria->addSelectColumn(FctipespPeer::PARESP);

		$criteria->addSelectColumn(FctipespPeer::EXOESP);

		$criteria->addSelectColumn(FctipespPeer::ID);

	}

	const COUNT = 'COUNT(fctipesp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fctipesp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FctipespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FctipespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FctipespPeer::doSelectRS($criteria, $con);
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
		$objects = FctipespPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FctipespPeer::populateObjects(FctipespPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FctipespPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FctipespPeer::getOMClass();
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
		return FctipespPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FctipespPeer::ID); 

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
			$comparison = $criteria->getComparison(FctipespPeer::ID);
			$selectCriteria->add(FctipespPeer::ID, $criteria->remove(FctipespPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FctipespPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FctipespPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fctipesp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FctipespPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fctipesp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FctipespPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FctipespPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FctipespPeer::DATABASE_NAME, FctipespPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FctipespPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FctipespPeer::DATABASE_NAME);

		$criteria->add(FctipespPeer::ID, $pk);


		$v = FctipespPeer::doSelect($criteria, $con);

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
			$criteria->add(FctipespPeer::ID, $pks, Criteria::IN);
			$objs = FctipespPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFctipespPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FctipespMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FctipespMapBuilder');
}
