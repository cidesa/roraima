<?php


abstract class BaseReimpcauPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'reimpcau';

	
	const CLASS_DEFAULT = 'lib.model.Reimpcau';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCAU = 'reimpcau.REFCAU';

	
	const CODPRE = 'reimpcau.CODPRE';

	
	const MONIMP = 'reimpcau.MONIMP';

	
	const MONPAG = 'reimpcau.MONPAG';

	
	const MONAJU = 'reimpcau.MONAJU';

	
	const STAIMP = 'reimpcau.STAIMP';

	
	const REFERE = 'reimpcau.REFERE';

	
	const REFPRC = 'reimpcau.REFPRC';

	
	const ID = 'reimpcau.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau', 'Codpre', 'Monimp', 'Monpag', 'Monaju', 'Staimp', 'Refere', 'Refprc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ReimpcauPeer::REFCAU, ReimpcauPeer::CODPRE, ReimpcauPeer::MONIMP, ReimpcauPeer::MONPAG, ReimpcauPeer::MONAJU, ReimpcauPeer::STAIMP, ReimpcauPeer::REFERE, ReimpcauPeer::REFPRC, ReimpcauPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau', 'codpre', 'monimp', 'monpag', 'monaju', 'staimp', 'refere', 'refprc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Monpag' => 3, 'Monaju' => 4, 'Staimp' => 5, 'Refere' => 6, 'Refprc' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (ReimpcauPeer::REFCAU => 0, ReimpcauPeer::CODPRE => 1, ReimpcauPeer::MONIMP => 2, ReimpcauPeer::MONPAG => 3, ReimpcauPeer::MONAJU => 4, ReimpcauPeer::STAIMP => 5, ReimpcauPeer::REFERE => 6, ReimpcauPeer::REFPRC => 7, ReimpcauPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau' => 0, 'codpre' => 1, 'monimp' => 2, 'monpag' => 3, 'monaju' => 4, 'staimp' => 5, 'refere' => 6, 'refprc' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ReimpcauMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ReimpcauMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ReimpcauPeer::getTableMap();
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
		return str_replace(ReimpcauPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ReimpcauPeer::REFCAU);

		$criteria->addSelectColumn(ReimpcauPeer::CODPRE);

		$criteria->addSelectColumn(ReimpcauPeer::MONIMP);

		$criteria->addSelectColumn(ReimpcauPeer::MONPAG);

		$criteria->addSelectColumn(ReimpcauPeer::MONAJU);

		$criteria->addSelectColumn(ReimpcauPeer::STAIMP);

		$criteria->addSelectColumn(ReimpcauPeer::REFERE);

		$criteria->addSelectColumn(ReimpcauPeer::REFPRC);

		$criteria->addSelectColumn(ReimpcauPeer::ID);

	}

	const COUNT = 'COUNT(reimpcau.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT reimpcau.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ReimpcauPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ReimpcauPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ReimpcauPeer::doSelectRS($criteria, $con);
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
		$objects = ReimpcauPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ReimpcauPeer::populateObjects(ReimpcauPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ReimpcauPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ReimpcauPeer::getOMClass();
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
		return ReimpcauPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(ReimpcauPeer::ID);
			$selectCriteria->add(ReimpcauPeer::ID, $criteria->remove(ReimpcauPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ReimpcauPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ReimpcauPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Reimpcau) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ReimpcauPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Reimpcau $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ReimpcauPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ReimpcauPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ReimpcauPeer::DATABASE_NAME, ReimpcauPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ReimpcauPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ReimpcauPeer::DATABASE_NAME);

		$criteria->add(ReimpcauPeer::ID, $pk);


		$v = ReimpcauPeer::doSelect($criteria, $con);

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
			$criteria->add(ReimpcauPeer::ID, $pks, Criteria::IN);
			$objs = ReimpcauPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseReimpcauPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ReimpcauMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ReimpcauMapBuilder');
}
