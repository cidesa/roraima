<?php


abstract class BaseNppreliqPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nppreliq';

	
	const CLASS_DEFAULT = 'lib.model.Nppreliq';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FECVIG = 'nppreliq.FECVIG';

	
	const CODNOM = 'nppreliq.CODNOM';

	
	const MES = 'nppreliq.MES';

	
	const DIAPRE = 'nppreliq.DIAPRE';

	
	const DIAANT = 'nppreliq.DIAANT';

	
	const DIAVAC = 'nppreliq.DIAVAC';

	
	const DIAVACFRA = 'nppreliq.DIAVACFRA';

	
	const DIABONVAC = 'nppreliq.DIABONVAC';

	
	const ID = 'nppreliq.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Fecvig', 'Codnom', 'Mes', 'Diapre', 'Diaant', 'Diavac', 'Diavacfra', 'Diabonvac', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NppreliqPeer::FECVIG, NppreliqPeer::CODNOM, NppreliqPeer::MES, NppreliqPeer::DIAPRE, NppreliqPeer::DIAANT, NppreliqPeer::DIAVAC, NppreliqPeer::DIAVACFRA, NppreliqPeer::DIABONVAC, NppreliqPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('fecvig', 'codnom', 'mes', 'diapre', 'diaant', 'diavac', 'diavacfra', 'diabonvac', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Fecvig' => 0, 'Codnom' => 1, 'Mes' => 2, 'Diapre' => 3, 'Diaant' => 4, 'Diavac' => 5, 'Diavacfra' => 6, 'Diabonvac' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (NppreliqPeer::FECVIG => 0, NppreliqPeer::CODNOM => 1, NppreliqPeer::MES => 2, NppreliqPeer::DIAPRE => 3, NppreliqPeer::DIAANT => 4, NppreliqPeer::DIAVAC => 5, NppreliqPeer::DIAVACFRA => 6, NppreliqPeer::DIABONVAC => 7, NppreliqPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('fecvig' => 0, 'codnom' => 1, 'mes' => 2, 'diapre' => 3, 'diaant' => 4, 'diavac' => 5, 'diavacfra' => 6, 'diabonvac' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NppreliqMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NppreliqMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NppreliqPeer::getTableMap();
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
		return str_replace(NppreliqPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NppreliqPeer::FECVIG);

		$criteria->addSelectColumn(NppreliqPeer::CODNOM);

		$criteria->addSelectColumn(NppreliqPeer::MES);

		$criteria->addSelectColumn(NppreliqPeer::DIAPRE);

		$criteria->addSelectColumn(NppreliqPeer::DIAANT);

		$criteria->addSelectColumn(NppreliqPeer::DIAVAC);

		$criteria->addSelectColumn(NppreliqPeer::DIAVACFRA);

		$criteria->addSelectColumn(NppreliqPeer::DIABONVAC);

		$criteria->addSelectColumn(NppreliqPeer::ID);

	}

	const COUNT = 'COUNT(nppreliq.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nppreliq.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NppreliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NppreliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NppreliqPeer::doSelectRS($criteria, $con);
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
		$objects = NppreliqPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NppreliqPeer::populateObjects(NppreliqPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NppreliqPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NppreliqPeer::getOMClass();
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
		return NppreliqPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NppreliqPeer::ID); 

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
			$comparison = $criteria->getComparison(NppreliqPeer::ID);
			$selectCriteria->add(NppreliqPeer::ID, $criteria->remove(NppreliqPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NppreliqPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NppreliqPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Nppreliq) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NppreliqPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Nppreliq $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NppreliqPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NppreliqPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NppreliqPeer::DATABASE_NAME, NppreliqPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NppreliqPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NppreliqPeer::DATABASE_NAME);

		$criteria->add(NppreliqPeer::ID, $pk);


		$v = NppreliqPeer::doSelect($criteria, $con);

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
			$criteria->add(NppreliqPeer::ID, $pks, Criteria::IN);
			$objs = NppreliqPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNppreliqPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NppreliqMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NppreliqMapBuilder');
}
