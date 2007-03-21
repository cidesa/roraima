<?php


abstract class BaseTabla16Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla16';

	
	const CLASS_DEFAULT = 'lib.model.Tabla16';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFAJU = 'tabla16.REFAJU';

	
	const TIPAJU = 'tabla16.TIPAJU';

	
	const FECAJU = 'tabla16.FECAJU';

	
	const ANOAJU = 'tabla16.ANOAJU';

	
	const REFERE = 'tabla16.REFERE';

	
	const DESAJU = 'tabla16.DESAJU';

	
	const DESANU = 'tabla16.DESANU';

	
	const TOTAJU = 'tabla16.TOTAJU';

	
	const STAAJU = 'tabla16.STAAJU';

	
	const FECANU = 'tabla16.FECANU';

	
	const NUMCOM = 'tabla16.NUMCOM';

	
	const CUOANU = 'tabla16.CUOANU';

	
	const FECANUDES = 'tabla16.FECANUDES';

	
	const FECANUHAS = 'tabla16.FECANUHAS';

	
	const ORDPAG = 'tabla16.ORDPAG';

	
	const FECENVCON = 'tabla16.FECENVCON';

	
	const FECENVFIN = 'tabla16.FECENVFIN';

	
	const ID = 'tabla16.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refaju', 'Tipaju', 'Fecaju', 'Anoaju', 'Refere', 'Desaju', 'Desanu', 'Totaju', 'Staaju', 'Fecanu', 'Numcom', 'Cuoanu', 'Fecanudes', 'Fecanuhas', 'Ordpag', 'Fecenvcon', 'Fecenvfin', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla16Peer::REFAJU, Tabla16Peer::TIPAJU, Tabla16Peer::FECAJU, Tabla16Peer::ANOAJU, Tabla16Peer::REFERE, Tabla16Peer::DESAJU, Tabla16Peer::DESANU, Tabla16Peer::TOTAJU, Tabla16Peer::STAAJU, Tabla16Peer::FECANU, Tabla16Peer::NUMCOM, Tabla16Peer::CUOANU, Tabla16Peer::FECANUDES, Tabla16Peer::FECANUHAS, Tabla16Peer::ORDPAG, Tabla16Peer::FECENVCON, Tabla16Peer::FECENVFIN, Tabla16Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refaju', 'tipaju', 'fecaju', 'anoaju', 'refere', 'desaju', 'desanu', 'totaju', 'staaju', 'fecanu', 'numcom', 'cuoanu', 'fecanudes', 'fecanuhas', 'ordpag', 'fecenvcon', 'fecenvfin', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refaju' => 0, 'Tipaju' => 1, 'Fecaju' => 2, 'Anoaju' => 3, 'Refere' => 4, 'Desaju' => 5, 'Desanu' => 6, 'Totaju' => 7, 'Staaju' => 8, 'Fecanu' => 9, 'Numcom' => 10, 'Cuoanu' => 11, 'Fecanudes' => 12, 'Fecanuhas' => 13, 'Ordpag' => 14, 'Fecenvcon' => 15, 'Fecenvfin' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (Tabla16Peer::REFAJU => 0, Tabla16Peer::TIPAJU => 1, Tabla16Peer::FECAJU => 2, Tabla16Peer::ANOAJU => 3, Tabla16Peer::REFERE => 4, Tabla16Peer::DESAJU => 5, Tabla16Peer::DESANU => 6, Tabla16Peer::TOTAJU => 7, Tabla16Peer::STAAJU => 8, Tabla16Peer::FECANU => 9, Tabla16Peer::NUMCOM => 10, Tabla16Peer::CUOANU => 11, Tabla16Peer::FECANUDES => 12, Tabla16Peer::FECANUHAS => 13, Tabla16Peer::ORDPAG => 14, Tabla16Peer::FECENVCON => 15, Tabla16Peer::FECENVFIN => 16, Tabla16Peer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('refaju' => 0, 'tipaju' => 1, 'fecaju' => 2, 'anoaju' => 3, 'refere' => 4, 'desaju' => 5, 'desanu' => 6, 'totaju' => 7, 'staaju' => 8, 'fecanu' => 9, 'numcom' => 10, 'cuoanu' => 11, 'fecanudes' => 12, 'fecanuhas' => 13, 'ordpag' => 14, 'fecenvcon' => 15, 'fecenvfin' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla16MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla16MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla16Peer::getTableMap();
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
		return str_replace(Tabla16Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla16Peer::REFAJU);

		$criteria->addSelectColumn(Tabla16Peer::TIPAJU);

		$criteria->addSelectColumn(Tabla16Peer::FECAJU);

		$criteria->addSelectColumn(Tabla16Peer::ANOAJU);

		$criteria->addSelectColumn(Tabla16Peer::REFERE);

		$criteria->addSelectColumn(Tabla16Peer::DESAJU);

		$criteria->addSelectColumn(Tabla16Peer::DESANU);

		$criteria->addSelectColumn(Tabla16Peer::TOTAJU);

		$criteria->addSelectColumn(Tabla16Peer::STAAJU);

		$criteria->addSelectColumn(Tabla16Peer::FECANU);

		$criteria->addSelectColumn(Tabla16Peer::NUMCOM);

		$criteria->addSelectColumn(Tabla16Peer::CUOANU);

		$criteria->addSelectColumn(Tabla16Peer::FECANUDES);

		$criteria->addSelectColumn(Tabla16Peer::FECANUHAS);

		$criteria->addSelectColumn(Tabla16Peer::ORDPAG);

		$criteria->addSelectColumn(Tabla16Peer::FECENVCON);

		$criteria->addSelectColumn(Tabla16Peer::FECENVFIN);

		$criteria->addSelectColumn(Tabla16Peer::ID);

	}

	const COUNT = 'COUNT(tabla16.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla16.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla16Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla16Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla16Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla16Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla16Peer::populateObjects(Tabla16Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla16Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla16Peer::getOMClass();
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
		return Tabla16Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla16Peer::ID);
			$selectCriteria->add(Tabla16Peer::ID, $criteria->remove(Tabla16Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla16Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla16Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla16) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla16Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla16 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla16Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla16Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla16Peer::DATABASE_NAME, Tabla16Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla16Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla16Peer::DATABASE_NAME);

		$criteria->add(Tabla16Peer::ID, $pk);


		$v = Tabla16Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla16Peer::ID, $pks, Criteria::IN);
			$objs = Tabla16Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla16Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla16MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla16MapBuilder');
}
