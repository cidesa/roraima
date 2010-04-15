<?php


abstract class BaseCadetordsPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadetords';

	
	const CLASS_DEFAULT = 'lib.model.Cadetords';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ORDSER = 'cadetords.ORDSER';

	
	const CODPRE = 'cadetords.CODPRE';

	
	const PRESER = 'cadetords.PRESER';

	
	const DTOSER = 'cadetords.DTOSER';

	
	const RGOSER = 'cadetords.RGOSER';

	
	const TOTSER = 'cadetords.TOTSER';

	
	const DESSER = 'cadetords.DESSER';

	
	const MONSER = 'cadetords.MONSER';

	
	const CANSER = 'cadetords.CANSER';

	
	const CODRGO = 'cadetords.CODRGO';

	
	const ID = 'cadetords.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Ordser', 'Codpre', 'Preser', 'Dtoser', 'Rgoser', 'Totser', 'Desser', 'Monser', 'Canser', 'Codrgo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadetordsPeer::ORDSER, CadetordsPeer::CODPRE, CadetordsPeer::PRESER, CadetordsPeer::DTOSER, CadetordsPeer::RGOSER, CadetordsPeer::TOTSER, CadetordsPeer::DESSER, CadetordsPeer::MONSER, CadetordsPeer::CANSER, CadetordsPeer::CODRGO, CadetordsPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ordser', 'codpre', 'preser', 'dtoser', 'rgoser', 'totser', 'desser', 'monser', 'canser', 'codrgo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Ordser' => 0, 'Codpre' => 1, 'Preser' => 2, 'Dtoser' => 3, 'Rgoser' => 4, 'Totser' => 5, 'Desser' => 6, 'Monser' => 7, 'Canser' => 8, 'Codrgo' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (CadetordsPeer::ORDSER => 0, CadetordsPeer::CODPRE => 1, CadetordsPeer::PRESER => 2, CadetordsPeer::DTOSER => 3, CadetordsPeer::RGOSER => 4, CadetordsPeer::TOTSER => 5, CadetordsPeer::DESSER => 6, CadetordsPeer::MONSER => 7, CadetordsPeer::CANSER => 8, CadetordsPeer::CODRGO => 9, CadetordsPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('ordser' => 0, 'codpre' => 1, 'preser' => 2, 'dtoser' => 3, 'rgoser' => 4, 'totser' => 5, 'desser' => 6, 'monser' => 7, 'canser' => 8, 'codrgo' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CadetordsMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CadetordsMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadetordsPeer::getTableMap();
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
		return str_replace(CadetordsPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadetordsPeer::ORDSER);

		$criteria->addSelectColumn(CadetordsPeer::CODPRE);

		$criteria->addSelectColumn(CadetordsPeer::PRESER);

		$criteria->addSelectColumn(CadetordsPeer::DTOSER);

		$criteria->addSelectColumn(CadetordsPeer::RGOSER);

		$criteria->addSelectColumn(CadetordsPeer::TOTSER);

		$criteria->addSelectColumn(CadetordsPeer::DESSER);

		$criteria->addSelectColumn(CadetordsPeer::MONSER);

		$criteria->addSelectColumn(CadetordsPeer::CANSER);

		$criteria->addSelectColumn(CadetordsPeer::CODRGO);

		$criteria->addSelectColumn(CadetordsPeer::ID);

	}

	const COUNT = 'COUNT(cadetords.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadetords.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadetordsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadetordsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadetordsPeer::doSelectRS($criteria, $con);
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
		$objects = CadetordsPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadetordsPeer::populateObjects(CadetordsPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadetordsPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadetordsPeer::getOMClass();
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
		return CadetordsPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CadetordsPeer::ID);
			$selectCriteria->add(CadetordsPeer::ID, $criteria->remove(CadetordsPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadetordsPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadetordsPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadetords) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadetordsPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadetords $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadetordsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadetordsPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadetordsPeer::DATABASE_NAME, CadetordsPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadetordsPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadetordsPeer::DATABASE_NAME);

		$criteria->add(CadetordsPeer::ID, $pk);


		$v = CadetordsPeer::doSelect($criteria, $con);

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
			$criteria->add(CadetordsPeer::ID, $pks, Criteria::IN);
			$objs = CadetordsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadetordsPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CadetordsMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CadetordsMapBuilder');
}
