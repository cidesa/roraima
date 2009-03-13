<?php


abstract class BaseReimppagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'reimppag';

	
	const CLASS_DEFAULT = 'lib.model.Reimppag';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPAG = 'reimppag.REFPAG';

	
	const CODPRE = 'reimppag.CODPRE';

	
	const MONIMP = 'reimppag.MONIMP';

	
	const MONAJU = 'reimppag.MONAJU';

	
	const STAIMP = 'reimppag.STAIMP';

	
	const REFERE = 'reimppag.REFERE';

	
	const REFPRC = 'reimppag.REFPRC';

	
	const REFCOM = 'reimppag.REFCOM';

	
	const ID = 'reimppag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag', 'Codpre', 'Monimp', 'Monaju', 'Staimp', 'Refere', 'Refprc', 'Refcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ReimppagPeer::REFPAG, ReimppagPeer::CODPRE, ReimppagPeer::MONIMP, ReimppagPeer::MONAJU, ReimppagPeer::STAIMP, ReimppagPeer::REFERE, ReimppagPeer::REFPRC, ReimppagPeer::REFCOM, ReimppagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag', 'codpre', 'monimp', 'monaju', 'staimp', 'refere', 'refprc', 'refcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Monaju' => 3, 'Staimp' => 4, 'Refere' => 5, 'Refprc' => 6, 'Refcom' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (ReimppagPeer::REFPAG => 0, ReimppagPeer::CODPRE => 1, ReimppagPeer::MONIMP => 2, ReimppagPeer::MONAJU => 3, ReimppagPeer::STAIMP => 4, ReimppagPeer::REFERE => 5, ReimppagPeer::REFPRC => 6, ReimppagPeer::REFCOM => 7, ReimppagPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag' => 0, 'codpre' => 1, 'monimp' => 2, 'monaju' => 3, 'staimp' => 4, 'refere' => 5, 'refprc' => 6, 'refcom' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ReimppagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ReimppagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ReimppagPeer::getTableMap();
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
		return str_replace(ReimppagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ReimppagPeer::REFPAG);

		$criteria->addSelectColumn(ReimppagPeer::CODPRE);

		$criteria->addSelectColumn(ReimppagPeer::MONIMP);

		$criteria->addSelectColumn(ReimppagPeer::MONAJU);

		$criteria->addSelectColumn(ReimppagPeer::STAIMP);

		$criteria->addSelectColumn(ReimppagPeer::REFERE);

		$criteria->addSelectColumn(ReimppagPeer::REFPRC);

		$criteria->addSelectColumn(ReimppagPeer::REFCOM);

		$criteria->addSelectColumn(ReimppagPeer::ID);

	}

	const COUNT = 'COUNT(reimppag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT reimppag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ReimppagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ReimppagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ReimppagPeer::doSelectRS($criteria, $con);
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
		$objects = ReimppagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ReimppagPeer::populateObjects(ReimppagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ReimppagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ReimppagPeer::getOMClass();
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
		return ReimppagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ReimppagPeer::ID); 

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
			$comparison = $criteria->getComparison(ReimppagPeer::ID);
			$selectCriteria->add(ReimppagPeer::ID, $criteria->remove(ReimppagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ReimppagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ReimppagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Reimppag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ReimppagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Reimppag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ReimppagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ReimppagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ReimppagPeer::DATABASE_NAME, ReimppagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ReimppagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ReimppagPeer::DATABASE_NAME);

		$criteria->add(ReimppagPeer::ID, $pk);


		$v = ReimppagPeer::doSelect($criteria, $con);

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
			$criteria->add(ReimppagPeer::ID, $pks, Criteria::IN);
			$objs = ReimppagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseReimppagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ReimppagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ReimppagMapBuilder');
}
