<?php


abstract class BaseCpajustePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpajuste';

	
	const CLASS_DEFAULT = 'lib.model.Cpajuste';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFAJU = 'cpajuste.REFAJU';

	
	const TIPAJU = 'cpajuste.TIPAJU';

	
	const FECAJU = 'cpajuste.FECAJU';

	
	const ANOAJU = 'cpajuste.ANOAJU';

	
	const REFERE = 'cpajuste.REFERE';

	
	const DESAJU = 'cpajuste.DESAJU';

	
	const DESANU = 'cpajuste.DESANU';

	
	const TOTAJU = 'cpajuste.TOTAJU';

	
	const STAAJU = 'cpajuste.STAAJU';

	
	const FECANU = 'cpajuste.FECANU';

	
	const NUMCOM = 'cpajuste.NUMCOM';

	
	const CUOANU = 'cpajuste.CUOANU';

	
	const FECANUDES = 'cpajuste.FECANUDES';

	
	const FECANUHAS = 'cpajuste.FECANUHAS';

	
	const ORDPAG = 'cpajuste.ORDPAG';

	
	const FECENVCON = 'cpajuste.FECENVCON';

	
	const FECENVFIN = 'cpajuste.FECENVFIN';

	
	const ID = 'cpajuste.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refaju', 'Tipaju', 'Fecaju', 'Anoaju', 'Refere', 'Desaju', 'Desanu', 'Totaju', 'Staaju', 'Fecanu', 'Numcom', 'Cuoanu', 'Fecanudes', 'Fecanuhas', 'Ordpag', 'Fecenvcon', 'Fecenvfin', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpajustePeer::REFAJU, CpajustePeer::TIPAJU, CpajustePeer::FECAJU, CpajustePeer::ANOAJU, CpajustePeer::REFERE, CpajustePeer::DESAJU, CpajustePeer::DESANU, CpajustePeer::TOTAJU, CpajustePeer::STAAJU, CpajustePeer::FECANU, CpajustePeer::NUMCOM, CpajustePeer::CUOANU, CpajustePeer::FECANUDES, CpajustePeer::FECANUHAS, CpajustePeer::ORDPAG, CpajustePeer::FECENVCON, CpajustePeer::FECENVFIN, CpajustePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refaju', 'tipaju', 'fecaju', 'anoaju', 'refere', 'desaju', 'desanu', 'totaju', 'staaju', 'fecanu', 'numcom', 'cuoanu', 'fecanudes', 'fecanuhas', 'ordpag', 'fecenvcon', 'fecenvfin', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refaju' => 0, 'Tipaju' => 1, 'Fecaju' => 2, 'Anoaju' => 3, 'Refere' => 4, 'Desaju' => 5, 'Desanu' => 6, 'Totaju' => 7, 'Staaju' => 8, 'Fecanu' => 9, 'Numcom' => 10, 'Cuoanu' => 11, 'Fecanudes' => 12, 'Fecanuhas' => 13, 'Ordpag' => 14, 'Fecenvcon' => 15, 'Fecenvfin' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (CpajustePeer::REFAJU => 0, CpajustePeer::TIPAJU => 1, CpajustePeer::FECAJU => 2, CpajustePeer::ANOAJU => 3, CpajustePeer::REFERE => 4, CpajustePeer::DESAJU => 5, CpajustePeer::DESANU => 6, CpajustePeer::TOTAJU => 7, CpajustePeer::STAAJU => 8, CpajustePeer::FECANU => 9, CpajustePeer::NUMCOM => 10, CpajustePeer::CUOANU => 11, CpajustePeer::FECANUDES => 12, CpajustePeer::FECANUHAS => 13, CpajustePeer::ORDPAG => 14, CpajustePeer::FECENVCON => 15, CpajustePeer::FECENVFIN => 16, CpajustePeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('refaju' => 0, 'tipaju' => 1, 'fecaju' => 2, 'anoaju' => 3, 'refere' => 4, 'desaju' => 5, 'desanu' => 6, 'totaju' => 7, 'staaju' => 8, 'fecanu' => 9, 'numcom' => 10, 'cuoanu' => 11, 'fecanudes' => 12, 'fecanuhas' => 13, 'ordpag' => 14, 'fecenvcon' => 15, 'fecenvfin' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpajusteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpajusteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpajustePeer::getTableMap();
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
		return str_replace(CpajustePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpajustePeer::REFAJU);

		$criteria->addSelectColumn(CpajustePeer::TIPAJU);

		$criteria->addSelectColumn(CpajustePeer::FECAJU);

		$criteria->addSelectColumn(CpajustePeer::ANOAJU);

		$criteria->addSelectColumn(CpajustePeer::REFERE);

		$criteria->addSelectColumn(CpajustePeer::DESAJU);

		$criteria->addSelectColumn(CpajustePeer::DESANU);

		$criteria->addSelectColumn(CpajustePeer::TOTAJU);

		$criteria->addSelectColumn(CpajustePeer::STAAJU);

		$criteria->addSelectColumn(CpajustePeer::FECANU);

		$criteria->addSelectColumn(CpajustePeer::NUMCOM);

		$criteria->addSelectColumn(CpajustePeer::CUOANU);

		$criteria->addSelectColumn(CpajustePeer::FECANUDES);

		$criteria->addSelectColumn(CpajustePeer::FECANUHAS);

		$criteria->addSelectColumn(CpajustePeer::ORDPAG);

		$criteria->addSelectColumn(CpajustePeer::FECENVCON);

		$criteria->addSelectColumn(CpajustePeer::FECENVFIN);

		$criteria->addSelectColumn(CpajustePeer::ID);

	}

	const COUNT = 'COUNT(cpajuste.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpajuste.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpajustePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpajustePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpajustePeer::doSelectRS($criteria, $con);
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
		$objects = CpajustePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpajustePeer::populateObjects(CpajustePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpajustePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpajustePeer::getOMClass();
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
		return CpajustePeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CpajustePeer::ID);
			$selectCriteria->add(CpajustePeer::ID, $criteria->remove(CpajustePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpajustePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpajustePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpajuste) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpajustePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpajuste $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpajustePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpajustePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpajustePeer::DATABASE_NAME, CpajustePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpajustePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpajustePeer::DATABASE_NAME);

		$criteria->add(CpajustePeer::ID, $pk);


		$v = CpajustePeer::doSelect($criteria, $con);

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
			$criteria->add(CpajustePeer::ID, $pks, Criteria::IN);
			$objs = CpajustePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpajustePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpajusteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpajusteMapBuilder');
}
