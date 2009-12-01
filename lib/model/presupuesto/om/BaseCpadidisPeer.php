<?php


abstract class BaseCpadidisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpadidis';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpadidis';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFADI = 'cpadidis.REFADI';

	
	const FECADI = 'cpadidis.FECADI';

	
	const ANOADI = 'cpadidis.ANOADI';

	
	const DESADI = 'cpadidis.DESADI';

	
	const DESANU = 'cpadidis.DESANU';

	
	const ADIDIS = 'cpadidis.ADIDIS';

	
	const TOTADI = 'cpadidis.TOTADI';

	
	const STAADI = 'cpadidis.STAADI';

	
	const NUMCOM = 'cpadidis.NUMCOM';

	
	const FECANU = 'cpadidis.FECANU';

	
	const PERADI = 'cpadidis.PERADI';

	
	const TIPGAS = 'cpadidis.TIPGAS';

	
	const ID = 'cpadidis.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refadi', 'Fecadi', 'Anoadi', 'Desadi', 'Desanu', 'Adidis', 'Totadi', 'Staadi', 'Numcom', 'Fecanu', 'Peradi', 'Tipgas', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpadidisPeer::REFADI, CpadidisPeer::FECADI, CpadidisPeer::ANOADI, CpadidisPeer::DESADI, CpadidisPeer::DESANU, CpadidisPeer::ADIDIS, CpadidisPeer::TOTADI, CpadidisPeer::STAADI, CpadidisPeer::NUMCOM, CpadidisPeer::FECANU, CpadidisPeer::PERADI, CpadidisPeer::TIPGAS, CpadidisPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refadi', 'fecadi', 'anoadi', 'desadi', 'desanu', 'adidis', 'totadi', 'staadi', 'numcom', 'fecanu', 'peradi', 'tipgas', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refadi' => 0, 'Fecadi' => 1, 'Anoadi' => 2, 'Desadi' => 3, 'Desanu' => 4, 'Adidis' => 5, 'Totadi' => 6, 'Staadi' => 7, 'Numcom' => 8, 'Fecanu' => 9, 'Peradi' => 10, 'Tipgas' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (CpadidisPeer::REFADI => 0, CpadidisPeer::FECADI => 1, CpadidisPeer::ANOADI => 2, CpadidisPeer::DESADI => 3, CpadidisPeer::DESANU => 4, CpadidisPeer::ADIDIS => 5, CpadidisPeer::TOTADI => 6, CpadidisPeer::STAADI => 7, CpadidisPeer::NUMCOM => 8, CpadidisPeer::FECANU => 9, CpadidisPeer::PERADI => 10, CpadidisPeer::TIPGAS => 11, CpadidisPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('refadi' => 0, 'fecadi' => 1, 'anoadi' => 2, 'desadi' => 3, 'desanu' => 4, 'adidis' => 5, 'totadi' => 6, 'staadi' => 7, 'numcom' => 8, 'fecanu' => 9, 'peradi' => 10, 'tipgas' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpadidisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpadidisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpadidisPeer::getTableMap();
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
		return str_replace(CpadidisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpadidisPeer::REFADI);

		$criteria->addSelectColumn(CpadidisPeer::FECADI);

		$criteria->addSelectColumn(CpadidisPeer::ANOADI);

		$criteria->addSelectColumn(CpadidisPeer::DESADI);

		$criteria->addSelectColumn(CpadidisPeer::DESANU);

		$criteria->addSelectColumn(CpadidisPeer::ADIDIS);

		$criteria->addSelectColumn(CpadidisPeer::TOTADI);

		$criteria->addSelectColumn(CpadidisPeer::STAADI);

		$criteria->addSelectColumn(CpadidisPeer::NUMCOM);

		$criteria->addSelectColumn(CpadidisPeer::FECANU);

		$criteria->addSelectColumn(CpadidisPeer::PERADI);

		$criteria->addSelectColumn(CpadidisPeer::TIPGAS);

		$criteria->addSelectColumn(CpadidisPeer::ID);

	}

	const COUNT = 'COUNT(cpadidis.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpadidis.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpadidisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpadidisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpadidisPeer::doSelectRS($criteria, $con);
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
		$objects = CpadidisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpadidisPeer::populateObjects(CpadidisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpadidisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpadidisPeer::getOMClass();
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
		return CpadidisPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpadidisPeer::ID); 

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
			$comparison = $criteria->getComparison(CpadidisPeer::ID);
			$selectCriteria->add(CpadidisPeer::ID, $criteria->remove(CpadidisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpadidisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpadidisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpadidis) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpadidisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpadidis $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpadidisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpadidisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpadidisPeer::DATABASE_NAME, CpadidisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpadidisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpadidisPeer::DATABASE_NAME);

		$criteria->add(CpadidisPeer::ID, $pk);


		$v = CpadidisPeer::doSelect($criteria, $con);

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
			$criteria->add(CpadidisPeer::ID, $pks, Criteria::IN);
			$objs = CpadidisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpadidisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpadidisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpadidisMapBuilder');
}
