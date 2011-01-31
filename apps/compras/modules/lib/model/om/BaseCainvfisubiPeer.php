<?php


abstract class BaseCainvfisubiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cainvfisubi';

	
	const CLASS_DEFAULT = 'lib.model.Cainvfisubi';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FECINV = 'cainvfisubi.FECINV';

	
	const CODALM = 'cainvfisubi.CODALM';

	
	const CODART = 'cainvfisubi.CODART';

	
	const CODUBI = 'cainvfisubi.CODUBI';

	
	const EXIACT = 'cainvfisubi.EXIACT';

	
	const EXIACT2 = 'cainvfisubi.EXIACT2';

	
	const ID = 'cainvfisubi.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Fecinv', 'Codalm', 'Codart', 'Codubi', 'Exiact', 'Exiact2', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CainvfisubiPeer::FECINV, CainvfisubiPeer::CODALM, CainvfisubiPeer::CODART, CainvfisubiPeer::CODUBI, CainvfisubiPeer::EXIACT, CainvfisubiPeer::EXIACT2, CainvfisubiPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('fecinv', 'codalm', 'codart', 'codubi', 'exiact', 'exiact2', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Fecinv' => 0, 'Codalm' => 1, 'Codart' => 2, 'Codubi' => 3, 'Exiact' => 4, 'Exiact2' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (CainvfisubiPeer::FECINV => 0, CainvfisubiPeer::CODALM => 1, CainvfisubiPeer::CODART => 2, CainvfisubiPeer::CODUBI => 3, CainvfisubiPeer::EXIACT => 4, CainvfisubiPeer::EXIACT2 => 5, CainvfisubiPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('fecinv' => 0, 'codalm' => 1, 'codart' => 2, 'codubi' => 3, 'exiact' => 4, 'exiact2' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CainvfisubiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CainvfisubiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CainvfisubiPeer::getTableMap();
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
		return str_replace(CainvfisubiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CainvfisubiPeer::FECINV);

		$criteria->addSelectColumn(CainvfisubiPeer::CODALM);

		$criteria->addSelectColumn(CainvfisubiPeer::CODART);

		$criteria->addSelectColumn(CainvfisubiPeer::CODUBI);

		$criteria->addSelectColumn(CainvfisubiPeer::EXIACT);

		$criteria->addSelectColumn(CainvfisubiPeer::EXIACT2);

		$criteria->addSelectColumn(CainvfisubiPeer::ID);

	}

	const COUNT = 'COUNT(cainvfisubi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cainvfisubi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CainvfisubiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CainvfisubiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CainvfisubiPeer::doSelectRS($criteria, $con);
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
		$objects = CainvfisubiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CainvfisubiPeer::populateObjects(CainvfisubiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CainvfisubiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CainvfisubiPeer::getOMClass();
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
		return CainvfisubiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CainvfisubiPeer::ID); 

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
			$comparison = $criteria->getComparison(CainvfisubiPeer::ID);
			$selectCriteria->add(CainvfisubiPeer::ID, $criteria->remove(CainvfisubiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CainvfisubiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CainvfisubiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cainvfisubi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CainvfisubiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cainvfisubi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CainvfisubiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CainvfisubiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CainvfisubiPeer::DATABASE_NAME, CainvfisubiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CainvfisubiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CainvfisubiPeer::DATABASE_NAME);

		$criteria->add(CainvfisubiPeer::ID, $pk);


		$v = CainvfisubiPeer::doSelect($criteria, $con);

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
			$criteria->add(CainvfisubiPeer::ID, $pks, Criteria::IN);
			$objs = CainvfisubiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCainvfisubiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CainvfisubiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CainvfisubiMapBuilder');
}
