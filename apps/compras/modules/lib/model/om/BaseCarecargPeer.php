<?php


abstract class BaseCarecargPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'carecarg';

	
	const CLASS_DEFAULT = 'lib.model.Carecarg';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODRGO = 'carecarg.CODRGO';

	
	const NOMRGO = 'carecarg.NOMRGO';

	
	const CODPRE = 'carecarg.CODPRE';

	
	const TIPRGO = 'carecarg.TIPRGO';

	
	const MONRGO = 'carecarg.MONRGO';

	
	const CALCUL = 'carecarg.CALCUL';

	
	const CODCTA = 'carecarg.CODCTA';

	
	const ID = 'carecarg.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codrgo', 'Nomrgo', 'Codpre', 'Tiprgo', 'Monrgo', 'Calcul', 'Codcta', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CarecargPeer::CODRGO, CarecargPeer::NOMRGO, CarecargPeer::CODPRE, CarecargPeer::TIPRGO, CarecargPeer::MONRGO, CarecargPeer::CALCUL, CarecargPeer::CODCTA, CarecargPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codrgo', 'nomrgo', 'codpre', 'tiprgo', 'monrgo', 'calcul', 'codcta', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codrgo' => 0, 'Nomrgo' => 1, 'Codpre' => 2, 'Tiprgo' => 3, 'Monrgo' => 4, 'Calcul' => 5, 'Codcta' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (CarecargPeer::CODRGO => 0, CarecargPeer::NOMRGO => 1, CarecargPeer::CODPRE => 2, CarecargPeer::TIPRGO => 3, CarecargPeer::MONRGO => 4, CarecargPeer::CALCUL => 5, CarecargPeer::CODCTA => 6, CarecargPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codrgo' => 0, 'nomrgo' => 1, 'codpre' => 2, 'tiprgo' => 3, 'monrgo' => 4, 'calcul' => 5, 'codcta' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CarecargMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CarecargMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CarecargPeer::getTableMap();
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
		return str_replace(CarecargPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CarecargPeer::CODRGO);

		$criteria->addSelectColumn(CarecargPeer::NOMRGO);

		$criteria->addSelectColumn(CarecargPeer::CODPRE);

		$criteria->addSelectColumn(CarecargPeer::TIPRGO);

		$criteria->addSelectColumn(CarecargPeer::MONRGO);

		$criteria->addSelectColumn(CarecargPeer::CALCUL);

		$criteria->addSelectColumn(CarecargPeer::CODCTA);

		$criteria->addSelectColumn(CarecargPeer::ID);

	}

	const COUNT = 'COUNT(carecarg.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT carecarg.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CarecargPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CarecargPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CarecargPeer::doSelectRS($criteria, $con);
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
		$objects = CarecargPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CarecargPeer::populateObjects(CarecargPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CarecargPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CarecargPeer::getOMClass();
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
		return CarecargPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CarecargPeer::ID); 

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
			$comparison = $criteria->getComparison(CarecargPeer::ID);
			$selectCriteria->add(CarecargPeer::ID, $criteria->remove(CarecargPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CarecargPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CarecargPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Carecarg) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CarecargPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Carecarg $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CarecargPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CarecargPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CarecargPeer::DATABASE_NAME, CarecargPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CarecargPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CarecargPeer::DATABASE_NAME);

		$criteria->add(CarecargPeer::ID, $pk);


		$v = CarecargPeer::doSelect($criteria, $con);

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
			$criteria->add(CarecargPeer::ID, $pks, Criteria::IN);
			$objs = CarecargPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCarecargPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CarecargMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CarecargMapBuilder');
}
