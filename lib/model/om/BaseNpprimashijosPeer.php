<?php


abstract class BaseNpprimashijosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npprimashijos';

	
	const CLASS_DEFAULT = 'lib.model.Npprimashijos';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PARFAM = 'npprimashijos.PARFAM';

	
	const EDADDES = 'npprimashijos.EDADDES';

	
	const EDADHAS = 'npprimashijos.EDADHAS';

	
	const MONTO = 'npprimashijos.MONTO';

	
	const ESTUDIOS = 'npprimashijos.ESTUDIOS';

	
	const ID = 'npprimashijos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Parfam', 'Edaddes', 'Edadhas', 'Monto', 'Estudios', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpprimashijosPeer::PARFAM, NpprimashijosPeer::EDADDES, NpprimashijosPeer::EDADHAS, NpprimashijosPeer::MONTO, NpprimashijosPeer::ESTUDIOS, NpprimashijosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('parfam', 'edaddes', 'edadhas', 'monto', 'estudios', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Parfam' => 0, 'Edaddes' => 1, 'Edadhas' => 2, 'Monto' => 3, 'Estudios' => 4, 'Id' => 5, ),
		BasePeer::TYPE_COLNAME => array (NpprimashijosPeer::PARFAM => 0, NpprimashijosPeer::EDADDES => 1, NpprimashijosPeer::EDADHAS => 2, NpprimashijosPeer::MONTO => 3, NpprimashijosPeer::ESTUDIOS => 4, NpprimashijosPeer::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('parfam' => 0, 'edaddes' => 1, 'edadhas' => 2, 'monto' => 3, 'estudios' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpprimashijosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpprimashijosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpprimashijosPeer::getTableMap();
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
		return str_replace(NpprimashijosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpprimashijosPeer::PARFAM);

		$criteria->addSelectColumn(NpprimashijosPeer::EDADDES);

		$criteria->addSelectColumn(NpprimashijosPeer::EDADHAS);

		$criteria->addSelectColumn(NpprimashijosPeer::MONTO);

		$criteria->addSelectColumn(NpprimashijosPeer::ESTUDIOS);

		$criteria->addSelectColumn(NpprimashijosPeer::ID);

	}

	const COUNT = 'COUNT(npprimashijos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npprimashijos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpprimashijosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpprimashijosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpprimashijosPeer::doSelectRS($criteria, $con);
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
		$objects = NpprimashijosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpprimashijosPeer::populateObjects(NpprimashijosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpprimashijosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpprimashijosPeer::getOMClass();
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
		return NpprimashijosPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpprimashijosPeer::ID); 

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
			$comparison = $criteria->getComparison(NpprimashijosPeer::ID);
			$selectCriteria->add(NpprimashijosPeer::ID, $criteria->remove(NpprimashijosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpprimashijosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpprimashijosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npprimashijos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpprimashijosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npprimashijos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpprimashijosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpprimashijosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpprimashijosPeer::DATABASE_NAME, NpprimashijosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpprimashijosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpprimashijosPeer::DATABASE_NAME);

		$criteria->add(NpprimashijosPeer::ID, $pk);


		$v = NpprimashijosPeer::doSelect($criteria, $con);

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
			$criteria->add(NpprimashijosPeer::ID, $pks, Criteria::IN);
			$objs = NpprimashijosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpprimashijosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpprimashijosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpprimashijosMapBuilder');
}
