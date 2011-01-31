<?php


abstract class BaseCpimpapaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpimpapa';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpimpapa';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFAPA = 'cpimpapa.REFAPA';

	
	const CODPRE = 'cpimpapa.CODPRE';

	
	const MONIMP = 'cpimpapa.MONIMP';

	
	const MONCOM = 'cpimpapa.MONCOM';

	
	const MONCAU = 'cpimpapa.MONCAU';

	
	const MONPAG = 'cpimpapa.MONPAG';

	
	const MONAJU = 'cpimpapa.MONAJU';

	
	const STAIMP = 'cpimpapa.STAIMP';

	
	const ID = 'cpimpapa.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refapa', 'Codpre', 'Monimp', 'Moncom', 'Moncau', 'Monpag', 'Monaju', 'Staimp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpimpapaPeer::REFAPA, CpimpapaPeer::CODPRE, CpimpapaPeer::MONIMP, CpimpapaPeer::MONCOM, CpimpapaPeer::MONCAU, CpimpapaPeer::MONPAG, CpimpapaPeer::MONAJU, CpimpapaPeer::STAIMP, CpimpapaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refapa', 'codpre', 'monimp', 'moncom', 'moncau', 'monpag', 'monaju', 'staimp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refapa' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Moncom' => 3, 'Moncau' => 4, 'Monpag' => 5, 'Monaju' => 6, 'Staimp' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CpimpapaPeer::REFAPA => 0, CpimpapaPeer::CODPRE => 1, CpimpapaPeer::MONIMP => 2, CpimpapaPeer::MONCOM => 3, CpimpapaPeer::MONCAU => 4, CpimpapaPeer::MONPAG => 5, CpimpapaPeer::MONAJU => 6, CpimpapaPeer::STAIMP => 7, CpimpapaPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refapa' => 0, 'codpre' => 1, 'monimp' => 2, 'moncom' => 3, 'moncau' => 4, 'monpag' => 5, 'monaju' => 6, 'staimp' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpimpapaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpimpapaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpimpapaPeer::getTableMap();
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
		return str_replace(CpimpapaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpimpapaPeer::REFAPA);

		$criteria->addSelectColumn(CpimpapaPeer::CODPRE);

		$criteria->addSelectColumn(CpimpapaPeer::MONIMP);

		$criteria->addSelectColumn(CpimpapaPeer::MONCOM);

		$criteria->addSelectColumn(CpimpapaPeer::MONCAU);

		$criteria->addSelectColumn(CpimpapaPeer::MONPAG);

		$criteria->addSelectColumn(CpimpapaPeer::MONAJU);

		$criteria->addSelectColumn(CpimpapaPeer::STAIMP);

		$criteria->addSelectColumn(CpimpapaPeer::ID);

	}

	const COUNT = 'COUNT(cpimpapa.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpimpapa.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpimpapaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpimpapaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpimpapaPeer::doSelectRS($criteria, $con);
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
		$objects = CpimpapaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpimpapaPeer::populateObjects(CpimpapaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpimpapaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpimpapaPeer::getOMClass();
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
		return CpimpapaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpimpapaPeer::ID); 

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
			$comparison = $criteria->getComparison(CpimpapaPeer::ID);
			$selectCriteria->add(CpimpapaPeer::ID, $criteria->remove(CpimpapaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpimpapaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpimpapaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpimpapa) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpimpapaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpimpapa $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpimpapaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpimpapaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpimpapaPeer::DATABASE_NAME, CpimpapaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpimpapaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpimpapaPeer::DATABASE_NAME);

		$criteria->add(CpimpapaPeer::ID, $pk);


		$v = CpimpapaPeer::doSelect($criteria, $con);

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
			$criteria->add(CpimpapaPeer::ID, $pks, Criteria::IN);
			$objs = CpimpapaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpimpapaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpimpapaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpimpapaMapBuilder');
}
