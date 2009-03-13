<?php


abstract class BaseBnrevactPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bnrevact';

	
	const CLASS_DEFAULT = 'lib.model.Bnrevact';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bnrevact.CODACT';

	
	const CODMUE = 'bnrevact.CODMUE';

	
	const NROSEGINM = 'bnrevact.NROSEGINM';

	
	const FECSEGINM = 'bnrevact.FECSEGINM';

	
	const NOMSEGINM = 'bnrevact.NOMSEGINM';

	
	const COBSEGINM = 'bnrevact.COBSEGINM';

	
	const MONSEGINM = 'bnrevact.MONSEGINM';

	
	const FECSEGVEN = 'bnrevact.FECSEGVEN';

	
	const PROSEGINM = 'bnrevact.PROSEGINM';

	
	const OBSSEGINM = 'bnrevact.OBSSEGINM';

	
	const STASEGINM = 'bnrevact.STASEGINM';

	
	const ID = 'bnrevact.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codmue', 'Nroseginm', 'Fecseginm', 'Nomseginm', 'Cobseginm', 'Monseginm', 'Fecsegven', 'Proseginm', 'Obsseginm', 'Staseginm', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BnrevactPeer::CODACT, BnrevactPeer::CODMUE, BnrevactPeer::NROSEGINM, BnrevactPeer::FECSEGINM, BnrevactPeer::NOMSEGINM, BnrevactPeer::COBSEGINM, BnrevactPeer::MONSEGINM, BnrevactPeer::FECSEGVEN, BnrevactPeer::PROSEGINM, BnrevactPeer::OBSSEGINM, BnrevactPeer::STASEGINM, BnrevactPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codmue', 'nroseginm', 'fecseginm', 'nomseginm', 'cobseginm', 'monseginm', 'fecsegven', 'proseginm', 'obsseginm', 'staseginm', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codmue' => 1, 'Nroseginm' => 2, 'Fecseginm' => 3, 'Nomseginm' => 4, 'Cobseginm' => 5, 'Monseginm' => 6, 'Fecsegven' => 7, 'Proseginm' => 8, 'Obsseginm' => 9, 'Staseginm' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (BnrevactPeer::CODACT => 0, BnrevactPeer::CODMUE => 1, BnrevactPeer::NROSEGINM => 2, BnrevactPeer::FECSEGINM => 3, BnrevactPeer::NOMSEGINM => 4, BnrevactPeer::COBSEGINM => 5, BnrevactPeer::MONSEGINM => 6, BnrevactPeer::FECSEGVEN => 7, BnrevactPeer::PROSEGINM => 8, BnrevactPeer::OBSSEGINM => 9, BnrevactPeer::STASEGINM => 10, BnrevactPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codmue' => 1, 'nroseginm' => 2, 'fecseginm' => 3, 'nomseginm' => 4, 'cobseginm' => 5, 'monseginm' => 6, 'fecsegven' => 7, 'proseginm' => 8, 'obsseginm' => 9, 'staseginm' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BnrevactMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BnrevactMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BnrevactPeer::getTableMap();
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
		return str_replace(BnrevactPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BnrevactPeer::CODACT);

		$criteria->addSelectColumn(BnrevactPeer::CODMUE);

		$criteria->addSelectColumn(BnrevactPeer::NROSEGINM);

		$criteria->addSelectColumn(BnrevactPeer::FECSEGINM);

		$criteria->addSelectColumn(BnrevactPeer::NOMSEGINM);

		$criteria->addSelectColumn(BnrevactPeer::COBSEGINM);

		$criteria->addSelectColumn(BnrevactPeer::MONSEGINM);

		$criteria->addSelectColumn(BnrevactPeer::FECSEGVEN);

		$criteria->addSelectColumn(BnrevactPeer::PROSEGINM);

		$criteria->addSelectColumn(BnrevactPeer::OBSSEGINM);

		$criteria->addSelectColumn(BnrevactPeer::STASEGINM);

		$criteria->addSelectColumn(BnrevactPeer::ID);

	}

	const COUNT = 'COUNT(bnrevact.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bnrevact.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BnrevactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BnrevactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BnrevactPeer::doSelectRS($criteria, $con);
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
		$objects = BnrevactPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BnrevactPeer::populateObjects(BnrevactPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BnrevactPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BnrevactPeer::getOMClass();
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
		return BnrevactPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BnrevactPeer::ID); 

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
			$comparison = $criteria->getComparison(BnrevactPeer::ID);
			$selectCriteria->add(BnrevactPeer::ID, $criteria->remove(BnrevactPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BnrevactPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BnrevactPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bnrevact) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BnrevactPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bnrevact $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BnrevactPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BnrevactPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BnrevactPeer::DATABASE_NAME, BnrevactPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BnrevactPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BnrevactPeer::DATABASE_NAME);

		$criteria->add(BnrevactPeer::ID, $pk);


		$v = BnrevactPeer::doSelect($criteria, $con);

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
			$criteria->add(BnrevactPeer::ID, $pks, Criteria::IN);
			$objs = BnrevactPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBnrevactPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BnrevactMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BnrevactMapBuilder');
}
