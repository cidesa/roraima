<?php


abstract class BaseCacontxtalmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cacontxtalm';

	
	const CLASS_DEFAULT = 'lib.model.Cacontxtalm';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODALM = 'cacontxtalm.CODALM';

	
	const INIART = 'cacontxtalm.INIART';

	
	const FINART = 'cacontxtalm.FINART';

	
	const INIDES = 'cacontxtalm.INIDES';

	
	const FINDES = 'cacontxtalm.FINDES';

	
	const INICAN = 'cacontxtalm.INICAN';

	
	const FINCAN = 'cacontxtalm.FINCAN';

	
	const INISUB = 'cacontxtalm.INISUB';

	
	const FINSUB = 'cacontxtalm.FINSUB';

	
	const INIIVA = 'cacontxtalm.INIIVA';

	
	const FINIVA = 'cacontxtalm.FINIVA';

	
	const INIPRE = 'cacontxtalm.INIPRE';

	
	const FINPRE = 'cacontxtalm.FINPRE';

	
	const ID = 'cacontxtalm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codalm', 'Iniart', 'Finart', 'Inides', 'Findes', 'Inican', 'Fincan', 'Inisub', 'Finsub', 'Iniiva', 'Finiva', 'Inipre', 'Finpre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CacontxtalmPeer::CODALM, CacontxtalmPeer::INIART, CacontxtalmPeer::FINART, CacontxtalmPeer::INIDES, CacontxtalmPeer::FINDES, CacontxtalmPeer::INICAN, CacontxtalmPeer::FINCAN, CacontxtalmPeer::INISUB, CacontxtalmPeer::FINSUB, CacontxtalmPeer::INIIVA, CacontxtalmPeer::FINIVA, CacontxtalmPeer::INIPRE, CacontxtalmPeer::FINPRE, CacontxtalmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codalm', 'iniart', 'finart', 'inides', 'findes', 'inican', 'fincan', 'inisub', 'finsub', 'iniiva', 'finiva', 'inipre', 'finpre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codalm' => 0, 'Iniart' => 1, 'Finart' => 2, 'Inides' => 3, 'Findes' => 4, 'Inican' => 5, 'Fincan' => 6, 'Inisub' => 7, 'Finsub' => 8, 'Iniiva' => 9, 'Finiva' => 10, 'Inipre' => 11, 'Finpre' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (CacontxtalmPeer::CODALM => 0, CacontxtalmPeer::INIART => 1, CacontxtalmPeer::FINART => 2, CacontxtalmPeer::INIDES => 3, CacontxtalmPeer::FINDES => 4, CacontxtalmPeer::INICAN => 5, CacontxtalmPeer::FINCAN => 6, CacontxtalmPeer::INISUB => 7, CacontxtalmPeer::FINSUB => 8, CacontxtalmPeer::INIIVA => 9, CacontxtalmPeer::FINIVA => 10, CacontxtalmPeer::INIPRE => 11, CacontxtalmPeer::FINPRE => 12, CacontxtalmPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('codalm' => 0, 'iniart' => 1, 'finart' => 2, 'inides' => 3, 'findes' => 4, 'inican' => 5, 'fincan' => 6, 'inisub' => 7, 'finsub' => 8, 'iniiva' => 9, 'finiva' => 10, 'inipre' => 11, 'finpre' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CacontxtalmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CacontxtalmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CacontxtalmPeer::getTableMap();
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
		return str_replace(CacontxtalmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CacontxtalmPeer::CODALM);

		$criteria->addSelectColumn(CacontxtalmPeer::INIART);

		$criteria->addSelectColumn(CacontxtalmPeer::FINART);

		$criteria->addSelectColumn(CacontxtalmPeer::INIDES);

		$criteria->addSelectColumn(CacontxtalmPeer::FINDES);

		$criteria->addSelectColumn(CacontxtalmPeer::INICAN);

		$criteria->addSelectColumn(CacontxtalmPeer::FINCAN);

		$criteria->addSelectColumn(CacontxtalmPeer::INISUB);

		$criteria->addSelectColumn(CacontxtalmPeer::FINSUB);

		$criteria->addSelectColumn(CacontxtalmPeer::INIIVA);

		$criteria->addSelectColumn(CacontxtalmPeer::FINIVA);

		$criteria->addSelectColumn(CacontxtalmPeer::INIPRE);

		$criteria->addSelectColumn(CacontxtalmPeer::FINPRE);

		$criteria->addSelectColumn(CacontxtalmPeer::ID);

	}

	const COUNT = 'COUNT(cacontxtalm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cacontxtalm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CacontxtalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CacontxtalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CacontxtalmPeer::doSelectRS($criteria, $con);
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
		$objects = CacontxtalmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CacontxtalmPeer::populateObjects(CacontxtalmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CacontxtalmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CacontxtalmPeer::getOMClass();
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
		return CacontxtalmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CacontxtalmPeer::ID); 

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
			$comparison = $criteria->getComparison(CacontxtalmPeer::ID);
			$selectCriteria->add(CacontxtalmPeer::ID, $criteria->remove(CacontxtalmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CacontxtalmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CacontxtalmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cacontxtalm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CacontxtalmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cacontxtalm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CacontxtalmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CacontxtalmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CacontxtalmPeer::DATABASE_NAME, CacontxtalmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CacontxtalmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CacontxtalmPeer::DATABASE_NAME);

		$criteria->add(CacontxtalmPeer::ID, $pk);


		$v = CacontxtalmPeer::doSelect($criteria, $con);

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
			$criteria->add(CacontxtalmPeer::ID, $pks, Criteria::IN);
			$objs = CacontxtalmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCacontxtalmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CacontxtalmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CacontxtalmMapBuilder');
}
