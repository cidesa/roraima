<?php


abstract class BaseNpvaccolPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npvaccol';

	
	const CLASS_DEFAULT = 'lib.model.Npvaccol';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npvaccol.CODNOM';

	
	const DISDES = 'npvaccol.DISDES';

	
	const DISHAS = 'npvaccol.DISHAS';

	
	const FECREG = 'npvaccol.FECREG';

	
	const DIAVAC = 'npvaccol.DIAVAC';

	
	const DIANHAB = 'npvaccol.DIANHAB';

	
	const STAREG = 'npvaccol.STAREG';

	
	const ID = 'npvaccol.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Disdes', 'Dishas', 'Fecreg', 'Diavac', 'Dianhab', 'Stareg', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpvaccolPeer::CODNOM, NpvaccolPeer::DISDES, NpvaccolPeer::DISHAS, NpvaccolPeer::FECREG, NpvaccolPeer::DIAVAC, NpvaccolPeer::DIANHAB, NpvaccolPeer::STAREG, NpvaccolPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'disdes', 'dishas', 'fecreg', 'diavac', 'dianhab', 'stareg', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Disdes' => 1, 'Dishas' => 2, 'Fecreg' => 3, 'Diavac' => 4, 'Dianhab' => 5, 'Stareg' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (NpvaccolPeer::CODNOM => 0, NpvaccolPeer::DISDES => 1, NpvaccolPeer::DISHAS => 2, NpvaccolPeer::FECREG => 3, NpvaccolPeer::DIAVAC => 4, NpvaccolPeer::DIANHAB => 5, NpvaccolPeer::STAREG => 6, NpvaccolPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'disdes' => 1, 'dishas' => 2, 'fecreg' => 3, 'diavac' => 4, 'dianhab' => 5, 'stareg' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpvaccolMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpvaccolMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpvaccolPeer::getTableMap();
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
		return str_replace(NpvaccolPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpvaccolPeer::CODNOM);

		$criteria->addSelectColumn(NpvaccolPeer::DISDES);

		$criteria->addSelectColumn(NpvaccolPeer::DISHAS);

		$criteria->addSelectColumn(NpvaccolPeer::FECREG);

		$criteria->addSelectColumn(NpvaccolPeer::DIAVAC);

		$criteria->addSelectColumn(NpvaccolPeer::DIANHAB);

		$criteria->addSelectColumn(NpvaccolPeer::STAREG);

		$criteria->addSelectColumn(NpvaccolPeer::ID);

	}

	const COUNT = 'COUNT(npvaccol.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npvaccol.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpvaccolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpvaccolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpvaccolPeer::doSelectRS($criteria, $con);
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
		$objects = NpvaccolPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpvaccolPeer::populateObjects(NpvaccolPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpvaccolPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpvaccolPeer::getOMClass();
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
		return NpvaccolPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpvaccolPeer::ID); 

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
			$comparison = $criteria->getComparison(NpvaccolPeer::ID);
			$selectCriteria->add(NpvaccolPeer::ID, $criteria->remove(NpvaccolPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpvaccolPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpvaccolPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npvaccol) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpvaccolPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npvaccol $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpvaccolPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpvaccolPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpvaccolPeer::DATABASE_NAME, NpvaccolPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpvaccolPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpvaccolPeer::DATABASE_NAME);

		$criteria->add(NpvaccolPeer::ID, $pk);


		$v = NpvaccolPeer::doSelect($criteria, $con);

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
			$criteria->add(NpvaccolPeer::ID, $pks, Criteria::IN);
			$objs = NpvaccolPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpvaccolPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpvaccolMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpvaccolMapBuilder');
}
