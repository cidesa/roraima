<?php


abstract class BaseTabla47Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla47';

	
	const CLASS_DEFAULT = 'lib.model.Tabla47';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCOM = 'tabla47.NUMCOM';

	
	const FECCOM = 'tabla47.FECCOM';

	
	const DEBCRE = 'tabla47.DEBCRE';

	
	const CODCTA = 'tabla47.CODCTA';

	
	const NUMASI = 'tabla47.NUMASI';

	
	const REFASI = 'tabla47.REFASI';

	
	const DESASI = 'tabla47.DESASI';

	
	const MONASI = 'tabla47.MONASI';

	
	const ID = 'tabla47.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcom', 'Feccom', 'Debcre', 'Codcta', 'Numasi', 'Refasi', 'Desasi', 'Monasi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla47Peer::NUMCOM, Tabla47Peer::FECCOM, Tabla47Peer::DEBCRE, Tabla47Peer::CODCTA, Tabla47Peer::NUMASI, Tabla47Peer::REFASI, Tabla47Peer::DESASI, Tabla47Peer::MONASI, Tabla47Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcom', 'feccom', 'debcre', 'codcta', 'numasi', 'refasi', 'desasi', 'monasi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcom' => 0, 'Feccom' => 1, 'Debcre' => 2, 'Codcta' => 3, 'Numasi' => 4, 'Refasi' => 5, 'Desasi' => 6, 'Monasi' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Tabla47Peer::NUMCOM => 0, Tabla47Peer::FECCOM => 1, Tabla47Peer::DEBCRE => 2, Tabla47Peer::CODCTA => 3, Tabla47Peer::NUMASI => 4, Tabla47Peer::REFASI => 5, Tabla47Peer::DESASI => 6, Tabla47Peer::MONASI => 7, Tabla47Peer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('numcom' => 0, 'feccom' => 1, 'debcre' => 2, 'codcta' => 3, 'numasi' => 4, 'refasi' => 5, 'desasi' => 6, 'monasi' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla47MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla47MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla47Peer::getTableMap();
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
		return str_replace(Tabla47Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla47Peer::NUMCOM);

		$criteria->addSelectColumn(Tabla47Peer::FECCOM);

		$criteria->addSelectColumn(Tabla47Peer::DEBCRE);

		$criteria->addSelectColumn(Tabla47Peer::CODCTA);

		$criteria->addSelectColumn(Tabla47Peer::NUMASI);

		$criteria->addSelectColumn(Tabla47Peer::REFASI);

		$criteria->addSelectColumn(Tabla47Peer::DESASI);

		$criteria->addSelectColumn(Tabla47Peer::MONASI);

		$criteria->addSelectColumn(Tabla47Peer::ID);

	}

	const COUNT = 'COUNT(tabla47.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla47.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla47Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla47Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla47Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla47Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla47Peer::populateObjects(Tabla47Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla47Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla47Peer::getOMClass();
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
		return Tabla47Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla47Peer::ID);
			$selectCriteria->add(Tabla47Peer::ID, $criteria->remove(Tabla47Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla47Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla47Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla47) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla47Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla47 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla47Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla47Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla47Peer::DATABASE_NAME, Tabla47Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla47Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla47Peer::DATABASE_NAME);

		$criteria->add(Tabla47Peer::ID, $pk);


		$v = Tabla47Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla47Peer::ID, $pks, Criteria::IN);
			$objs = Tabla47Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla47Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla47MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla47MapBuilder');
}
