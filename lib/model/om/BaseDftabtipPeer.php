<?php


abstract class BaseDftabtipPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dftabtip';

	
	const CLASS_DEFAULT = 'lib.model.Dftabtip';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TIPDOC = 'dftabtip.TIPDOC';

	
	const NOMTAB = 'dftabtip.NOMTAB';

	
	const VIDUTIL = 'dftabtip.VIDUTIL';

	
	const CLVPRM = 'dftabtip.CLVPRM';

	
	const CLVFRN = 'dftabtip.CLVFRN';

	
	const MONDOC = 'dftabtip.MONDOC';

	
	const FECDOC = 'dftabtip.FECDOC';

	
	const DESDOC = 'dftabtip.DESDOC';

	
	const STADOC = 'dftabtip.STADOC';

	
	const ID = 'dftabtip.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Tipdoc', 'Nomtab', 'Vidutil', 'Clvprm', 'Clvfrn', 'Mondoc', 'Fecdoc', 'Desdoc', 'Stadoc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (DftabtipPeer::TIPDOC, DftabtipPeer::NOMTAB, DftabtipPeer::VIDUTIL, DftabtipPeer::CLVPRM, DftabtipPeer::CLVFRN, DftabtipPeer::MONDOC, DftabtipPeer::FECDOC, DftabtipPeer::DESDOC, DftabtipPeer::STADOC, DftabtipPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('tipdoc', 'nomtab', 'vidutil', 'clvprm', 'clvfrn', 'mondoc', 'fecdoc', 'desdoc', 'stadoc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Tipdoc' => 0, 'Nomtab' => 1, 'Vidutil' => 2, 'Clvprm' => 3, 'Clvfrn' => 4, 'Mondoc' => 5, 'Fecdoc' => 6, 'Desdoc' => 7, 'Stadoc' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (DftabtipPeer::TIPDOC => 0, DftabtipPeer::NOMTAB => 1, DftabtipPeer::VIDUTIL => 2, DftabtipPeer::CLVPRM => 3, DftabtipPeer::CLVFRN => 4, DftabtipPeer::MONDOC => 5, DftabtipPeer::FECDOC => 6, DftabtipPeer::DESDOC => 7, DftabtipPeer::STADOC => 8, DftabtipPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('tipdoc' => 0, 'nomtab' => 1, 'vidutil' => 2, 'clvprm' => 3, 'clvfrn' => 4, 'mondoc' => 5, 'fecdoc' => 6, 'desdoc' => 7, 'stadoc' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DftabtipMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DftabtipMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DftabtipPeer::getTableMap();
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
		return str_replace(DftabtipPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DftabtipPeer::TIPDOC);

		$criteria->addSelectColumn(DftabtipPeer::NOMTAB);

		$criteria->addSelectColumn(DftabtipPeer::VIDUTIL);

		$criteria->addSelectColumn(DftabtipPeer::CLVPRM);

		$criteria->addSelectColumn(DftabtipPeer::CLVFRN);

		$criteria->addSelectColumn(DftabtipPeer::MONDOC);

		$criteria->addSelectColumn(DftabtipPeer::FECDOC);

		$criteria->addSelectColumn(DftabtipPeer::DESDOC);

		$criteria->addSelectColumn(DftabtipPeer::STADOC);

		$criteria->addSelectColumn(DftabtipPeer::ID);

	}

	const COUNT = 'COUNT(dftabtip.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT dftabtip.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DftabtipPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DftabtipPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DftabtipPeer::doSelectRS($criteria, $con);
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
		$objects = DftabtipPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DftabtipPeer::populateObjects(DftabtipPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DftabtipPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DftabtipPeer::getOMClass();
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
		return DftabtipPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(DftabtipPeer::ID);
			$selectCriteria->add(DftabtipPeer::ID, $criteria->remove(DftabtipPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DftabtipPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DftabtipPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Dftabtip) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DftabtipPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Dftabtip $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DftabtipPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DftabtipPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DftabtipPeer::DATABASE_NAME, DftabtipPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DftabtipPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DftabtipPeer::DATABASE_NAME);

		$criteria->add(DftabtipPeer::ID, $pk);


		$v = DftabtipPeer::doSelect($criteria, $con);

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
			$criteria->add(DftabtipPeer::ID, $pks, Criteria::IN);
			$objs = DftabtipPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDftabtipPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DftabtipMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DftabtipMapBuilder');
}
