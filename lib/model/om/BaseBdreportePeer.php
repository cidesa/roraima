<?php


abstract class BaseBdreportePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bdreporte';

	
	const CLASS_DEFAULT = 'lib.model.Bdreporte';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CAMPO1 = 'bdreporte.CAMPO1';

	
	const CAMPO2 = 'bdreporte.CAMPO2';

	
	const CAMPO3 = 'bdreporte.CAMPO3';

	
	const CAMPO4 = 'bdreporte.CAMPO4';

	
	const CAMPO5 = 'bdreporte.CAMPO5';

	
	const CAMPO6 = 'bdreporte.CAMPO6';

	
	const CAMPO7 = 'bdreporte.CAMPO7';

	
	const CAMPO8 = 'bdreporte.CAMPO8';

	
	const ID = 'bdreporte.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Campo1', 'Campo2', 'Campo3', 'Campo4', 'Campo5', 'Campo6', 'Campo7', 'Campo8', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BdreportePeer::CAMPO1, BdreportePeer::CAMPO2, BdreportePeer::CAMPO3, BdreportePeer::CAMPO4, BdreportePeer::CAMPO5, BdreportePeer::CAMPO6, BdreportePeer::CAMPO7, BdreportePeer::CAMPO8, BdreportePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('campo1', 'campo2', 'campo3', 'campo4', 'campo5', 'campo6', 'campo7', 'campo8', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Campo1' => 0, 'Campo2' => 1, 'Campo3' => 2, 'Campo4' => 3, 'Campo5' => 4, 'Campo6' => 5, 'Campo7' => 6, 'Campo8' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (BdreportePeer::CAMPO1 => 0, BdreportePeer::CAMPO2 => 1, BdreportePeer::CAMPO3 => 2, BdreportePeer::CAMPO4 => 3, BdreportePeer::CAMPO5 => 4, BdreportePeer::CAMPO6 => 5, BdreportePeer::CAMPO7 => 6, BdreportePeer::CAMPO8 => 7, BdreportePeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('campo1' => 0, 'campo2' => 1, 'campo3' => 2, 'campo4' => 3, 'campo5' => 4, 'campo6' => 5, 'campo7' => 6, 'campo8' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BdreporteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BdreporteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BdreportePeer::getTableMap();
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
		return str_replace(BdreportePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BdreportePeer::CAMPO1);

		$criteria->addSelectColumn(BdreportePeer::CAMPO2);

		$criteria->addSelectColumn(BdreportePeer::CAMPO3);

		$criteria->addSelectColumn(BdreportePeer::CAMPO4);

		$criteria->addSelectColumn(BdreportePeer::CAMPO5);

		$criteria->addSelectColumn(BdreportePeer::CAMPO6);

		$criteria->addSelectColumn(BdreportePeer::CAMPO7);

		$criteria->addSelectColumn(BdreportePeer::CAMPO8);

		$criteria->addSelectColumn(BdreportePeer::ID);

	}

	const COUNT = 'COUNT(bdreporte.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bdreporte.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BdreportePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BdreportePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BdreportePeer::doSelectRS($criteria, $con);
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
		$objects = BdreportePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BdreportePeer::populateObjects(BdreportePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BdreportePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BdreportePeer::getOMClass();
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
		return BdreportePeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(BdreportePeer::ID);
			$selectCriteria->add(BdreportePeer::ID, $criteria->remove(BdreportePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BdreportePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BdreportePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bdreporte) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BdreportePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bdreporte $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BdreportePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BdreportePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BdreportePeer::DATABASE_NAME, BdreportePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BdreportePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BdreportePeer::DATABASE_NAME);

		$criteria->add(BdreportePeer::ID, $pk);


		$v = BdreportePeer::doSelect($criteria, $con);

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
			$criteria->add(BdreportePeer::ID, $pks, Criteria::IN);
			$objs = BdreportePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBdreportePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BdreporteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BdreporteMapBuilder');
}
