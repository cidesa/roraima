<?php


abstract class BaseNpvacfraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npvacfra';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npvacfra';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npvacfra.CODEMP';

	
	const CODCAR = 'npvacfra.CODCAR';

	
	const CAUDES = 'npvacfra.CAUDES';

	
	const CAUHAS = 'npvacfra.CAUHAS';

	
	const DIAVAC = 'npvacfra.DIAVAC';

	
	const DIABON = 'npvacfra.DIABON';

	
	const MONVAC = 'npvacfra.MONVAC';

	
	const MONBON = 'npvacfra.MONBON';

	
	const ID = 'npvacfra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Codcar', 'Caudes', 'Cauhas', 'Diavac', 'Diabon', 'Monvac', 'Monbon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpvacfraPeer::CODEMP, NpvacfraPeer::CODCAR, NpvacfraPeer::CAUDES, NpvacfraPeer::CAUHAS, NpvacfraPeer::DIAVAC, NpvacfraPeer::DIABON, NpvacfraPeer::MONVAC, NpvacfraPeer::MONBON, NpvacfraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'codcar', 'caudes', 'cauhas', 'diavac', 'diabon', 'monvac', 'monbon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Codcar' => 1, 'Caudes' => 2, 'Cauhas' => 3, 'Diavac' => 4, 'Diabon' => 5, 'Monvac' => 6, 'Monbon' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (NpvacfraPeer::CODEMP => 0, NpvacfraPeer::CODCAR => 1, NpvacfraPeer::CAUDES => 2, NpvacfraPeer::CAUHAS => 3, NpvacfraPeer::DIAVAC => 4, NpvacfraPeer::DIABON => 5, NpvacfraPeer::MONVAC => 6, NpvacfraPeer::MONBON => 7, NpvacfraPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'codcar' => 1, 'caudes' => 2, 'cauhas' => 3, 'diavac' => 4, 'diabon' => 5, 'monvac' => 6, 'monbon' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpvacfraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpvacfraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpvacfraPeer::getTableMap();
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
		return str_replace(NpvacfraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpvacfraPeer::CODEMP);

		$criteria->addSelectColumn(NpvacfraPeer::CODCAR);

		$criteria->addSelectColumn(NpvacfraPeer::CAUDES);

		$criteria->addSelectColumn(NpvacfraPeer::CAUHAS);

		$criteria->addSelectColumn(NpvacfraPeer::DIAVAC);

		$criteria->addSelectColumn(NpvacfraPeer::DIABON);

		$criteria->addSelectColumn(NpvacfraPeer::MONVAC);

		$criteria->addSelectColumn(NpvacfraPeer::MONBON);

		$criteria->addSelectColumn(NpvacfraPeer::ID);

	}

	const COUNT = 'COUNT(npvacfra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npvacfra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpvacfraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpvacfraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpvacfraPeer::doSelectRS($criteria, $con);
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
		$objects = NpvacfraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpvacfraPeer::populateObjects(NpvacfraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpvacfraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpvacfraPeer::getOMClass();
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
		return NpvacfraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpvacfraPeer::ID); 

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
			$comparison = $criteria->getComparison(NpvacfraPeer::ID);
			$selectCriteria->add(NpvacfraPeer::ID, $criteria->remove(NpvacfraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpvacfraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpvacfraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npvacfra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpvacfraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npvacfra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpvacfraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpvacfraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpvacfraPeer::DATABASE_NAME, NpvacfraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpvacfraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpvacfraPeer::DATABASE_NAME);

		$criteria->add(NpvacfraPeer::ID, $pk);


		$v = NpvacfraPeer::doSelect($criteria, $con);

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
			$criteria->add(NpvacfraPeer::ID, $pks, Criteria::IN);
			$objs = NpvacfraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpvacfraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpvacfraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpvacfraMapBuilder');
}
