<?php


abstract class BaseNpvacsalidasDetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npvacsalidas_det';

	
	const CLASS_DEFAULT = 'lib.model.NpvacsalidasDet';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npvacsalidas_det.CODEMP';

	
	const PERINI = 'npvacsalidas_det.PERINI';

	
	const PERFIN = 'npvacsalidas_det.PERFIN';

	
	const DIASDISFUTAR = 'npvacsalidas_det.DIASDISFUTAR';

	
	const DIASDISFRUTADOS = 'npvacsalidas_det.DIASDISFRUTADOS';

	
	const DIASVAC = 'npvacsalidas_det.DIASVAC';

	
	const FECVAC = 'npvacsalidas_det.FECVAC';

	
	const ID = 'npvacsalidas_det.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Perini', 'Perfin', 'Diasdisfutar', 'Diasdisfrutados', 'Diasvac', 'Fecvac', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpvacsalidasDetPeer::CODEMP, NpvacsalidasDetPeer::PERINI, NpvacsalidasDetPeer::PERFIN, NpvacsalidasDetPeer::DIASDISFUTAR, NpvacsalidasDetPeer::DIASDISFRUTADOS, NpvacsalidasDetPeer::DIASVAC, NpvacsalidasDetPeer::FECVAC, NpvacsalidasDetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'perini', 'perfin', 'diasdisfutar', 'diasdisfrutados', 'diasvac', 'fecvac', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Perini' => 1, 'Perfin' => 2, 'Diasdisfutar' => 3, 'Diasdisfrutados' => 4, 'Diasvac' => 5, 'Fecvac' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (NpvacsalidasDetPeer::CODEMP => 0, NpvacsalidasDetPeer::PERINI => 1, NpvacsalidasDetPeer::PERFIN => 2, NpvacsalidasDetPeer::DIASDISFUTAR => 3, NpvacsalidasDetPeer::DIASDISFRUTADOS => 4, NpvacsalidasDetPeer::DIASVAC => 5, NpvacsalidasDetPeer::FECVAC => 6, NpvacsalidasDetPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'perini' => 1, 'perfin' => 2, 'diasdisfutar' => 3, 'diasdisfrutados' => 4, 'diasvac' => 5, 'fecvac' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpvacsalidasDetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpvacsalidasDetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpvacsalidasDetPeer::getTableMap();
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
		return str_replace(NpvacsalidasDetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpvacsalidasDetPeer::CODEMP);

		$criteria->addSelectColumn(NpvacsalidasDetPeer::PERINI);

		$criteria->addSelectColumn(NpvacsalidasDetPeer::PERFIN);

		$criteria->addSelectColumn(NpvacsalidasDetPeer::DIASDISFUTAR);

		$criteria->addSelectColumn(NpvacsalidasDetPeer::DIASDISFRUTADOS);

		$criteria->addSelectColumn(NpvacsalidasDetPeer::DIASVAC);

		$criteria->addSelectColumn(NpvacsalidasDetPeer::FECVAC);

		$criteria->addSelectColumn(NpvacsalidasDetPeer::ID);

	}

	const COUNT = 'COUNT(npvacsalidas_det.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npvacsalidas_det.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpvacsalidasDetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpvacsalidasDetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpvacsalidasDetPeer::doSelectRS($criteria, $con);
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
		$objects = NpvacsalidasDetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpvacsalidasDetPeer::populateObjects(NpvacsalidasDetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpvacsalidasDetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpvacsalidasDetPeer::getOMClass();
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
		return NpvacsalidasDetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpvacsalidasDetPeer::ID); 

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
			$comparison = $criteria->getComparison(NpvacsalidasDetPeer::ID);
			$selectCriteria->add(NpvacsalidasDetPeer::ID, $criteria->remove(NpvacsalidasDetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpvacsalidasDetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpvacsalidasDetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NpvacsalidasDet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpvacsalidasDetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(NpvacsalidasDet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpvacsalidasDetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpvacsalidasDetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpvacsalidasDetPeer::DATABASE_NAME, NpvacsalidasDetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpvacsalidasDetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpvacsalidasDetPeer::DATABASE_NAME);

		$criteria->add(NpvacsalidasDetPeer::ID, $pk);


		$v = NpvacsalidasDetPeer::doSelect($criteria, $con);

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
			$criteria->add(NpvacsalidasDetPeer::ID, $pks, Criteria::IN);
			$objs = NpvacsalidasDetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpvacsalidasDetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpvacsalidasDetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpvacsalidasDetMapBuilder');
}
