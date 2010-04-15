<?php


abstract class BaseCiajustePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ciajuste';

	
	const CLASS_DEFAULT = 'lib.model.Ciajuste';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFAJU = 'ciajuste.REFAJU';

	
	const FECAJU = 'ciajuste.FECAJU';

	
	const ANOAJU = 'ciajuste.ANOAJU';

	
	const REFERE = 'ciajuste.REFERE';

	
	const DESAJU = 'ciajuste.DESAJU';

	
	const DESANU = 'ciajuste.DESANU';

	
	const TOTAJU = 'ciajuste.TOTAJU';

	
	const STAAJU = 'ciajuste.STAAJU';

	
	const FECANU = 'ciajuste.FECANU';

	
	const ID = 'ciajuste.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refaju', 'Fecaju', 'Anoaju', 'Refere', 'Desaju', 'Desanu', 'Totaju', 'Staaju', 'Fecanu', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CiajustePeer::REFAJU, CiajustePeer::FECAJU, CiajustePeer::ANOAJU, CiajustePeer::REFERE, CiajustePeer::DESAJU, CiajustePeer::DESANU, CiajustePeer::TOTAJU, CiajustePeer::STAAJU, CiajustePeer::FECANU, CiajustePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refaju', 'fecaju', 'anoaju', 'refere', 'desaju', 'desanu', 'totaju', 'staaju', 'fecanu', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refaju' => 0, 'Fecaju' => 1, 'Anoaju' => 2, 'Refere' => 3, 'Desaju' => 4, 'Desanu' => 5, 'Totaju' => 6, 'Staaju' => 7, 'Fecanu' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (CiajustePeer::REFAJU => 0, CiajustePeer::FECAJU => 1, CiajustePeer::ANOAJU => 2, CiajustePeer::REFERE => 3, CiajustePeer::DESAJU => 4, CiajustePeer::DESANU => 5, CiajustePeer::TOTAJU => 6, CiajustePeer::STAAJU => 7, CiajustePeer::FECANU => 8, CiajustePeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('refaju' => 0, 'fecaju' => 1, 'anoaju' => 2, 'refere' => 3, 'desaju' => 4, 'desanu' => 5, 'totaju' => 6, 'staaju' => 7, 'fecanu' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CiajusteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CiajusteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CiajustePeer::getTableMap();
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
		return str_replace(CiajustePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CiajustePeer::REFAJU);

		$criteria->addSelectColumn(CiajustePeer::FECAJU);

		$criteria->addSelectColumn(CiajustePeer::ANOAJU);

		$criteria->addSelectColumn(CiajustePeer::REFERE);

		$criteria->addSelectColumn(CiajustePeer::DESAJU);

		$criteria->addSelectColumn(CiajustePeer::DESANU);

		$criteria->addSelectColumn(CiajustePeer::TOTAJU);

		$criteria->addSelectColumn(CiajustePeer::STAAJU);

		$criteria->addSelectColumn(CiajustePeer::FECANU);

		$criteria->addSelectColumn(CiajustePeer::ID);

	}

	const COUNT = 'COUNT(ciajuste.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ciajuste.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CiajustePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CiajustePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CiajustePeer::doSelectRS($criteria, $con);
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
		$objects = CiajustePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CiajustePeer::populateObjects(CiajustePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CiajustePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CiajustePeer::getOMClass();
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
		return CiajustePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CiajustePeer::ID); 

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
			$comparison = $criteria->getComparison(CiajustePeer::ID);
			$selectCriteria->add(CiajustePeer::ID, $criteria->remove(CiajustePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CiajustePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CiajustePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ciajuste) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CiajustePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ciajuste $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CiajustePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CiajustePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CiajustePeer::DATABASE_NAME, CiajustePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CiajustePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CiajustePeer::DATABASE_NAME);

		$criteria->add(CiajustePeer::ID, $pk);


		$v = CiajustePeer::doSelect($criteria, $con);

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
			$criteria->add(CiajustePeer::ID, $pks, Criteria::IN);
			$objs = CiajustePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCiajustePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CiajusteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CiajusteMapBuilder');
}
