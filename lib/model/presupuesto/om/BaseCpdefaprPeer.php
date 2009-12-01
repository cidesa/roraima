<?php


abstract class BaseCpdefaprPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpdefapr';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpdefapr';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const STACON = 'cpdefapr.STACON';

	
	const ABRSTACON = 'cpdefapr.ABRSTACON';

	
	const STAGOB = 'cpdefapr.STAGOB';

	
	const ABRSTAGOB = 'cpdefapr.ABRSTAGOB';

	
	const STAPRE = 'cpdefapr.STAPRE';

	
	const ABRSTAPRE = 'cpdefapr.ABRSTAPRE';

	
	const STANIV4 = 'cpdefapr.STANIV4';

	
	const ABRSTANIV4 = 'cpdefapr.ABRSTANIV4';

	
	const STANIV5 = 'cpdefapr.STANIV5';

	
	const ABRSTANIV5 = 'cpdefapr.ABRSTANIV5';

	
	const STANIV6 = 'cpdefapr.STANIV6';

	
	const ABRSTANIV6 = 'cpdefapr.ABRSTANIV6';

	
	const ID = 'cpdefapr.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Stacon', 'Abrstacon', 'Stagob', 'Abrstagob', 'Stapre', 'Abrstapre', 'Staniv4', 'Abrstaniv4', 'Staniv5', 'Abrstaniv5', 'Staniv6', 'Abrstaniv6', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpdefaprPeer::STACON, CpdefaprPeer::ABRSTACON, CpdefaprPeer::STAGOB, CpdefaprPeer::ABRSTAGOB, CpdefaprPeer::STAPRE, CpdefaprPeer::ABRSTAPRE, CpdefaprPeer::STANIV4, CpdefaprPeer::ABRSTANIV4, CpdefaprPeer::STANIV5, CpdefaprPeer::ABRSTANIV5, CpdefaprPeer::STANIV6, CpdefaprPeer::ABRSTANIV6, CpdefaprPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('stacon', 'abrstacon', 'stagob', 'abrstagob', 'stapre', 'abrstapre', 'staniv4', 'abrstaniv4', 'staniv5', 'abrstaniv5', 'staniv6', 'abrstaniv6', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Stacon' => 0, 'Abrstacon' => 1, 'Stagob' => 2, 'Abrstagob' => 3, 'Stapre' => 4, 'Abrstapre' => 5, 'Staniv4' => 6, 'Abrstaniv4' => 7, 'Staniv5' => 8, 'Abrstaniv5' => 9, 'Staniv6' => 10, 'Abrstaniv6' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (CpdefaprPeer::STACON => 0, CpdefaprPeer::ABRSTACON => 1, CpdefaprPeer::STAGOB => 2, CpdefaprPeer::ABRSTAGOB => 3, CpdefaprPeer::STAPRE => 4, CpdefaprPeer::ABRSTAPRE => 5, CpdefaprPeer::STANIV4 => 6, CpdefaprPeer::ABRSTANIV4 => 7, CpdefaprPeer::STANIV5 => 8, CpdefaprPeer::ABRSTANIV5 => 9, CpdefaprPeer::STANIV6 => 10, CpdefaprPeer::ABRSTANIV6 => 11, CpdefaprPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('stacon' => 0, 'abrstacon' => 1, 'stagob' => 2, 'abrstagob' => 3, 'stapre' => 4, 'abrstapre' => 5, 'staniv4' => 6, 'abrstaniv4' => 7, 'staniv5' => 8, 'abrstaniv5' => 9, 'staniv6' => 10, 'abrstaniv6' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpdefaprMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpdefaprMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpdefaprPeer::getTableMap();
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
		return str_replace(CpdefaprPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpdefaprPeer::STACON);

		$criteria->addSelectColumn(CpdefaprPeer::ABRSTACON);

		$criteria->addSelectColumn(CpdefaprPeer::STAGOB);

		$criteria->addSelectColumn(CpdefaprPeer::ABRSTAGOB);

		$criteria->addSelectColumn(CpdefaprPeer::STAPRE);

		$criteria->addSelectColumn(CpdefaprPeer::ABRSTAPRE);

		$criteria->addSelectColumn(CpdefaprPeer::STANIV4);

		$criteria->addSelectColumn(CpdefaprPeer::ABRSTANIV4);

		$criteria->addSelectColumn(CpdefaprPeer::STANIV5);

		$criteria->addSelectColumn(CpdefaprPeer::ABRSTANIV5);

		$criteria->addSelectColumn(CpdefaprPeer::STANIV6);

		$criteria->addSelectColumn(CpdefaprPeer::ABRSTANIV6);

		$criteria->addSelectColumn(CpdefaprPeer::ID);

	}

	const COUNT = 'COUNT(cpdefapr.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpdefapr.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpdefaprPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpdefaprPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpdefaprPeer::doSelectRS($criteria, $con);
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
		$objects = CpdefaprPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpdefaprPeer::populateObjects(CpdefaprPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpdefaprPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpdefaprPeer::getOMClass();
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
		return CpdefaprPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpdefaprPeer::ID); 

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
			$comparison = $criteria->getComparison(CpdefaprPeer::ID);
			$selectCriteria->add(CpdefaprPeer::ID, $criteria->remove(CpdefaprPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpdefaprPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpdefaprPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpdefapr) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpdefaprPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpdefapr $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpdefaprPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpdefaprPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpdefaprPeer::DATABASE_NAME, CpdefaprPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpdefaprPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpdefaprPeer::DATABASE_NAME);

		$criteria->add(CpdefaprPeer::ID, $pk);


		$v = CpdefaprPeer::doSelect($criteria, $con);

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
			$criteria->add(CpdefaprPeer::ID, $pks, Criteria::IN);
			$objs = CpdefaprPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpdefaprPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpdefaprMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpdefaprMapBuilder');
}
