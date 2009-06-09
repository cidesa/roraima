<?php


abstract class BaseNpvacdefgenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npvacdefgen';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npvacdefgen';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOMVAC = 'npvacdefgen.CODNOMVAC';

	
	const CODCONVAC = 'npvacdefgen.CODCONVAC';

	
	const PAGOAD = 'npvacdefgen.PAGOAD';

	
	const CODCONCOM = 'npvacdefgen.CODCONCOM';

	
	const CODCONUTI = 'npvacdefgen.CODCONUTI';

	
	const ID = 'npvacdefgen.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnomvac', 'Codconvac', 'Pagoad', 'Codconcom', 'Codconuti', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpvacdefgenPeer::CODNOMVAC, NpvacdefgenPeer::CODCONVAC, NpvacdefgenPeer::PAGOAD, NpvacdefgenPeer::CODCONCOM, NpvacdefgenPeer::CODCONUTI, NpvacdefgenPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnomvac', 'codconvac', 'pagoad', 'codconcom', 'codconuti', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnomvac' => 0, 'Codconvac' => 1, 'Pagoad' => 2, 'Codconcom' => 3, 'Codconuti' => 4, 'Id' => 5, ),
		BasePeer::TYPE_COLNAME => array (NpvacdefgenPeer::CODNOMVAC => 0, NpvacdefgenPeer::CODCONVAC => 1, NpvacdefgenPeer::PAGOAD => 2, NpvacdefgenPeer::CODCONCOM => 3, NpvacdefgenPeer::CODCONUTI => 4, NpvacdefgenPeer::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('codnomvac' => 0, 'codconvac' => 1, 'pagoad' => 2, 'codconcom' => 3, 'codconuti' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpvacdefgenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpvacdefgenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpvacdefgenPeer::getTableMap();
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
		return str_replace(NpvacdefgenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpvacdefgenPeer::CODNOMVAC);

		$criteria->addSelectColumn(NpvacdefgenPeer::CODCONVAC);

		$criteria->addSelectColumn(NpvacdefgenPeer::PAGOAD);

		$criteria->addSelectColumn(NpvacdefgenPeer::CODCONCOM);

		$criteria->addSelectColumn(NpvacdefgenPeer::CODCONUTI);

		$criteria->addSelectColumn(NpvacdefgenPeer::ID);

	}

	const COUNT = 'COUNT(npvacdefgen.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npvacdefgen.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpvacdefgenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpvacdefgenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpvacdefgenPeer::doSelectRS($criteria, $con);
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
		$objects = NpvacdefgenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpvacdefgenPeer::populateObjects(NpvacdefgenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpvacdefgenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpvacdefgenPeer::getOMClass();
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
		return NpvacdefgenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpvacdefgenPeer::ID); 

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
			$comparison = $criteria->getComparison(NpvacdefgenPeer::ID);
			$selectCriteria->add(NpvacdefgenPeer::ID, $criteria->remove(NpvacdefgenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpvacdefgenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpvacdefgenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npvacdefgen) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpvacdefgenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npvacdefgen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpvacdefgenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpvacdefgenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpvacdefgenPeer::DATABASE_NAME, NpvacdefgenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpvacdefgenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpvacdefgenPeer::DATABASE_NAME);

		$criteria->add(NpvacdefgenPeer::ID, $pk);


		$v = NpvacdefgenPeer::doSelect($criteria, $con);

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
			$criteria->add(NpvacdefgenPeer::ID, $pks, Criteria::IN);
			$objs = NpvacdefgenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpvacdefgenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpvacdefgenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpvacdefgenMapBuilder');
}
