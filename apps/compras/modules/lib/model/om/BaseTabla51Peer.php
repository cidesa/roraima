<?php


abstract class BaseTabla51Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla51';

	
	const CLASS_DEFAULT = 'lib.model.Tabla51';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFADI = 'tabla51.REFADI';

	
	const FECADI = 'tabla51.FECADI';

	
	const ANOADI = 'tabla51.ANOADI';

	
	const DESADI = 'tabla51.DESADI';

	
	const DESANU = 'tabla51.DESANU';

	
	const ADIDIS = 'tabla51.ADIDIS';

	
	const TOTADI = 'tabla51.TOTADI';

	
	const STAADI = 'tabla51.STAADI';

	
	const NUMCOM = 'tabla51.NUMCOM';

	
	const FECANU = 'tabla51.FECANU';

	
	const PERADI = 'tabla51.PERADI';

	
	const TIPGAS = 'tabla51.TIPGAS';

	
	const ID = 'tabla51.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refadi', 'Fecadi', 'Anoadi', 'Desadi', 'Desanu', 'Adidis', 'Totadi', 'Staadi', 'Numcom', 'Fecanu', 'Peradi', 'Tipgas', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla51Peer::REFADI, Tabla51Peer::FECADI, Tabla51Peer::ANOADI, Tabla51Peer::DESADI, Tabla51Peer::DESANU, Tabla51Peer::ADIDIS, Tabla51Peer::TOTADI, Tabla51Peer::STAADI, Tabla51Peer::NUMCOM, Tabla51Peer::FECANU, Tabla51Peer::PERADI, Tabla51Peer::TIPGAS, Tabla51Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refadi', 'fecadi', 'anoadi', 'desadi', 'desanu', 'adidis', 'totadi', 'staadi', 'numcom', 'fecanu', 'peradi', 'tipgas', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refadi' => 0, 'Fecadi' => 1, 'Anoadi' => 2, 'Desadi' => 3, 'Desanu' => 4, 'Adidis' => 5, 'Totadi' => 6, 'Staadi' => 7, 'Numcom' => 8, 'Fecanu' => 9, 'Peradi' => 10, 'Tipgas' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (Tabla51Peer::REFADI => 0, Tabla51Peer::FECADI => 1, Tabla51Peer::ANOADI => 2, Tabla51Peer::DESADI => 3, Tabla51Peer::DESANU => 4, Tabla51Peer::ADIDIS => 5, Tabla51Peer::TOTADI => 6, Tabla51Peer::STAADI => 7, Tabla51Peer::NUMCOM => 8, Tabla51Peer::FECANU => 9, Tabla51Peer::PERADI => 10, Tabla51Peer::TIPGAS => 11, Tabla51Peer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('refadi' => 0, 'fecadi' => 1, 'anoadi' => 2, 'desadi' => 3, 'desanu' => 4, 'adidis' => 5, 'totadi' => 6, 'staadi' => 7, 'numcom' => 8, 'fecanu' => 9, 'peradi' => 10, 'tipgas' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla51MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla51MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla51Peer::getTableMap();
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
		return str_replace(Tabla51Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla51Peer::REFADI);

		$criteria->addSelectColumn(Tabla51Peer::FECADI);

		$criteria->addSelectColumn(Tabla51Peer::ANOADI);

		$criteria->addSelectColumn(Tabla51Peer::DESADI);

		$criteria->addSelectColumn(Tabla51Peer::DESANU);

		$criteria->addSelectColumn(Tabla51Peer::ADIDIS);

		$criteria->addSelectColumn(Tabla51Peer::TOTADI);

		$criteria->addSelectColumn(Tabla51Peer::STAADI);

		$criteria->addSelectColumn(Tabla51Peer::NUMCOM);

		$criteria->addSelectColumn(Tabla51Peer::FECANU);

		$criteria->addSelectColumn(Tabla51Peer::PERADI);

		$criteria->addSelectColumn(Tabla51Peer::TIPGAS);

		$criteria->addSelectColumn(Tabla51Peer::ID);

	}

	const COUNT = 'COUNT(tabla51.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla51.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla51Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla51Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla51Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla51Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla51Peer::populateObjects(Tabla51Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla51Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla51Peer::getOMClass();
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
		return Tabla51Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla51Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla51Peer::ID);
			$selectCriteria->add(Tabla51Peer::ID, $criteria->remove(Tabla51Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla51Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla51Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla51) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla51Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla51 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla51Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla51Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla51Peer::DATABASE_NAME, Tabla51Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla51Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla51Peer::DATABASE_NAME);

		$criteria->add(Tabla51Peer::ID, $pk);


		$v = Tabla51Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla51Peer::ID, $pks, Criteria::IN);
			$objs = Tabla51Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla51Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla51MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla51MapBuilder');
}
