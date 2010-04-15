<?php


abstract class BaseTabla45Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla45';

	
	const CLASS_DEFAULT = 'lib.model.Tabla45';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCTA = 'tabla45.CODCTA';

	
	const FECINI = 'tabla45.FECINI';

	
	const FECCIE = 'tabla45.FECCIE';

	
	const PEREJE = 'tabla45.PEREJE';

	
	const TOTDEB = 'tabla45.TOTDEB';

	
	const TOTCRE = 'tabla45.TOTCRE';

	
	const SALACT = 'tabla45.SALACT';

	
	const SALPRGPER = 'tabla45.SALPRGPER';

	
	const SALPRGPERFOR = 'tabla45.SALPRGPERFOR';

	
	const ID = 'tabla45.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta', 'Fecini', 'Feccie', 'Pereje', 'Totdeb', 'Totcre', 'Salact', 'Salprgper', 'Salprgperfor', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla45Peer::CODCTA, Tabla45Peer::FECINI, Tabla45Peer::FECCIE, Tabla45Peer::PEREJE, Tabla45Peer::TOTDEB, Tabla45Peer::TOTCRE, Tabla45Peer::SALACT, Tabla45Peer::SALPRGPER, Tabla45Peer::SALPRGPERFOR, Tabla45Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta', 'fecini', 'feccie', 'pereje', 'totdeb', 'totcre', 'salact', 'salprgper', 'salprgperfor', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta' => 0, 'Fecini' => 1, 'Feccie' => 2, 'Pereje' => 3, 'Totdeb' => 4, 'Totcre' => 5, 'Salact' => 6, 'Salprgper' => 7, 'Salprgperfor' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (Tabla45Peer::CODCTA => 0, Tabla45Peer::FECINI => 1, Tabla45Peer::FECCIE => 2, Tabla45Peer::PEREJE => 3, Tabla45Peer::TOTDEB => 4, Tabla45Peer::TOTCRE => 5, Tabla45Peer::SALACT => 6, Tabla45Peer::SALPRGPER => 7, Tabla45Peer::SALPRGPERFOR => 8, Tabla45Peer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta' => 0, 'fecini' => 1, 'feccie' => 2, 'pereje' => 3, 'totdeb' => 4, 'totcre' => 5, 'salact' => 6, 'salprgper' => 7, 'salprgperfor' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla45MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla45MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla45Peer::getTableMap();
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
		return str_replace(Tabla45Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla45Peer::CODCTA);

		$criteria->addSelectColumn(Tabla45Peer::FECINI);

		$criteria->addSelectColumn(Tabla45Peer::FECCIE);

		$criteria->addSelectColumn(Tabla45Peer::PEREJE);

		$criteria->addSelectColumn(Tabla45Peer::TOTDEB);

		$criteria->addSelectColumn(Tabla45Peer::TOTCRE);

		$criteria->addSelectColumn(Tabla45Peer::SALACT);

		$criteria->addSelectColumn(Tabla45Peer::SALPRGPER);

		$criteria->addSelectColumn(Tabla45Peer::SALPRGPERFOR);

		$criteria->addSelectColumn(Tabla45Peer::ID);

	}

	const COUNT = 'COUNT(tabla45.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla45.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla45Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla45Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla45Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla45Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla45Peer::populateObjects(Tabla45Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla45Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla45Peer::getOMClass();
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
		return Tabla45Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla45Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla45Peer::ID);
			$selectCriteria->add(Tabla45Peer::ID, $criteria->remove(Tabla45Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla45Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla45Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla45) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla45Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla45 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla45Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla45Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla45Peer::DATABASE_NAME, Tabla45Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla45Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla45Peer::DATABASE_NAME);

		$criteria->add(Tabla45Peer::ID, $pk);


		$v = Tabla45Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla45Peer::ID, $pks, Criteria::IN);
			$objs = Tabla45Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla45Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla45MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla45MapBuilder');
}
