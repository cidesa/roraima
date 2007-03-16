<?php


abstract class BaseHisconb1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'hisconb1';

	
	const CLASS_DEFAULT = 'lib.model.Hisconb1';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCTA = 'hisconb1.CODCTA';

	
	const FECINI = 'hisconb1.FECINI';

	
	const FECCIE = 'hisconb1.FECCIE';

	
	const PEREJE = 'hisconb1.PEREJE';

	
	const TOTDEB = 'hisconb1.TOTDEB';

	
	const TOTCRE = 'hisconb1.TOTCRE';

	
	const SALACT = 'hisconb1.SALACT';

	
	const ID = 'hisconb1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta', 'Fecini', 'Feccie', 'Pereje', 'Totdeb', 'Totcre', 'Salact', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Hisconb1Peer::CODCTA, Hisconb1Peer::FECINI, Hisconb1Peer::FECCIE, Hisconb1Peer::PEREJE, Hisconb1Peer::TOTDEB, Hisconb1Peer::TOTCRE, Hisconb1Peer::SALACT, Hisconb1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta', 'fecini', 'feccie', 'pereje', 'totdeb', 'totcre', 'salact', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta' => 0, 'Fecini' => 1, 'Feccie' => 2, 'Pereje' => 3, 'Totdeb' => 4, 'Totcre' => 5, 'Salact' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (Hisconb1Peer::CODCTA => 0, Hisconb1Peer::FECINI => 1, Hisconb1Peer::FECCIE => 2, Hisconb1Peer::PEREJE => 3, Hisconb1Peer::TOTDEB => 4, Hisconb1Peer::TOTCRE => 5, Hisconb1Peer::SALACT => 6, Hisconb1Peer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta' => 0, 'fecini' => 1, 'feccie' => 2, 'pereje' => 3, 'totdeb' => 4, 'totcre' => 5, 'salact' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Hisconb1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Hisconb1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Hisconb1Peer::getTableMap();
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
		return str_replace(Hisconb1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Hisconb1Peer::CODCTA);

		$criteria->addSelectColumn(Hisconb1Peer::FECINI);

		$criteria->addSelectColumn(Hisconb1Peer::FECCIE);

		$criteria->addSelectColumn(Hisconb1Peer::PEREJE);

		$criteria->addSelectColumn(Hisconb1Peer::TOTDEB);

		$criteria->addSelectColumn(Hisconb1Peer::TOTCRE);

		$criteria->addSelectColumn(Hisconb1Peer::SALACT);

		$criteria->addSelectColumn(Hisconb1Peer::ID);

	}

	const COUNT = 'COUNT(hisconb1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hisconb1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Hisconb1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Hisconb1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Hisconb1Peer::doSelectRS($criteria, $con);
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
		$objects = Hisconb1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Hisconb1Peer::populateObjects(Hisconb1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Hisconb1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Hisconb1Peer::getOMClass();
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
		return Hisconb1Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Hisconb1Peer::ID);
			$selectCriteria->add(Hisconb1Peer::ID, $criteria->remove(Hisconb1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Hisconb1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Hisconb1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Hisconb1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Hisconb1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Hisconb1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Hisconb1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Hisconb1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Hisconb1Peer::DATABASE_NAME, Hisconb1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Hisconb1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Hisconb1Peer::DATABASE_NAME);

		$criteria->add(Hisconb1Peer::ID, $pk);


		$v = Hisconb1Peer::doSelect($criteria, $con);

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
			$criteria->add(Hisconb1Peer::ID, $pks, Criteria::IN);
			$objs = Hisconb1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHisconb1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Hisconb1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Hisconb1MapBuilder');
}
