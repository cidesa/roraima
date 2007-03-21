<?php


abstract class BaseRcpadidisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rcpadidis';

	
	const CLASS_DEFAULT = 'lib.model.Rcpadidis';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFADI = 'rcpadidis.REFADI';

	
	const FECADI = 'rcpadidis.FECADI';

	
	const ANOADI = 'rcpadidis.ANOADI';

	
	const DESADI = 'rcpadidis.DESADI';

	
	const DESANU = 'rcpadidis.DESANU';

	
	const ADIDIS = 'rcpadidis.ADIDIS';

	
	const TOTADI = 'rcpadidis.TOTADI';

	
	const STAADI = 'rcpadidis.STAADI';

	
	const NUMCOM = 'rcpadidis.NUMCOM';

	
	const FECANU = 'rcpadidis.FECANU';

	
	const PERADI = 'rcpadidis.PERADI';

	
	const ID = 'rcpadidis.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refadi', 'Fecadi', 'Anoadi', 'Desadi', 'Desanu', 'Adidis', 'Totadi', 'Staadi', 'Numcom', 'Fecanu', 'Peradi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (RcpadidisPeer::REFADI, RcpadidisPeer::FECADI, RcpadidisPeer::ANOADI, RcpadidisPeer::DESADI, RcpadidisPeer::DESANU, RcpadidisPeer::ADIDIS, RcpadidisPeer::TOTADI, RcpadidisPeer::STAADI, RcpadidisPeer::NUMCOM, RcpadidisPeer::FECANU, RcpadidisPeer::PERADI, RcpadidisPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refadi', 'fecadi', 'anoadi', 'desadi', 'desanu', 'adidis', 'totadi', 'staadi', 'numcom', 'fecanu', 'peradi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refadi' => 0, 'Fecadi' => 1, 'Anoadi' => 2, 'Desadi' => 3, 'Desanu' => 4, 'Adidis' => 5, 'Totadi' => 6, 'Staadi' => 7, 'Numcom' => 8, 'Fecanu' => 9, 'Peradi' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (RcpadidisPeer::REFADI => 0, RcpadidisPeer::FECADI => 1, RcpadidisPeer::ANOADI => 2, RcpadidisPeer::DESADI => 3, RcpadidisPeer::DESANU => 4, RcpadidisPeer::ADIDIS => 5, RcpadidisPeer::TOTADI => 6, RcpadidisPeer::STAADI => 7, RcpadidisPeer::NUMCOM => 8, RcpadidisPeer::FECANU => 9, RcpadidisPeer::PERADI => 10, RcpadidisPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('refadi' => 0, 'fecadi' => 1, 'anoadi' => 2, 'desadi' => 3, 'desanu' => 4, 'adidis' => 5, 'totadi' => 6, 'staadi' => 7, 'numcom' => 8, 'fecanu' => 9, 'peradi' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RcpadidisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RcpadidisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RcpadidisPeer::getTableMap();
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
		return str_replace(RcpadidisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RcpadidisPeer::REFADI);

		$criteria->addSelectColumn(RcpadidisPeer::FECADI);

		$criteria->addSelectColumn(RcpadidisPeer::ANOADI);

		$criteria->addSelectColumn(RcpadidisPeer::DESADI);

		$criteria->addSelectColumn(RcpadidisPeer::DESANU);

		$criteria->addSelectColumn(RcpadidisPeer::ADIDIS);

		$criteria->addSelectColumn(RcpadidisPeer::TOTADI);

		$criteria->addSelectColumn(RcpadidisPeer::STAADI);

		$criteria->addSelectColumn(RcpadidisPeer::NUMCOM);

		$criteria->addSelectColumn(RcpadidisPeer::FECANU);

		$criteria->addSelectColumn(RcpadidisPeer::PERADI);

		$criteria->addSelectColumn(RcpadidisPeer::ID);

	}

	const COUNT = 'COUNT(rcpadidis.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT rcpadidis.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RcpadidisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RcpadidisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RcpadidisPeer::doSelectRS($criteria, $con);
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
		$objects = RcpadidisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RcpadidisPeer::populateObjects(RcpadidisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RcpadidisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RcpadidisPeer::getOMClass();
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
		return RcpadidisPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(RcpadidisPeer::ID);
			$selectCriteria->add(RcpadidisPeer::ID, $criteria->remove(RcpadidisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RcpadidisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RcpadidisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Rcpadidis) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RcpadidisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Rcpadidis $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RcpadidisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RcpadidisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RcpadidisPeer::DATABASE_NAME, RcpadidisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RcpadidisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RcpadidisPeer::DATABASE_NAME);

		$criteria->add(RcpadidisPeer::ID, $pk);


		$v = RcpadidisPeer::doSelect($criteria, $con);

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
			$criteria->add(RcpadidisPeer::ID, $pks, Criteria::IN);
			$objs = RcpadidisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRcpadidisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RcpadidisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RcpadidisMapBuilder');
}
