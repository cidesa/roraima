<?php


abstract class BaseViadetextviatraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viadetextviatra';

	
	const CLASS_DEFAULT = 'lib.model.Viadetextviatra';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMEXT = 'viadetextviatra.NUMEXT';

	
	const FECEXT = 'viadetextviatra.FECEXT';

	
	const CODRUB = 'viadetextviatra.CODRUB';

	
	const NUMDIA = 'viadetextviatra.NUMDIA';

	
	const MONDIA = 'viadetextviatra.MONDIA';

	
	const MONTOT = 'viadetextviatra.MONTOT';

	
	const TIPO = 'viadetextviatra.TIPO';

	
	const ID = 'viadetextviatra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numext', 'Fecext', 'Codrub', 'Numdia', 'Mondia', 'Montot', 'Tipo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViadetextviatraPeer::NUMEXT, ViadetextviatraPeer::FECEXT, ViadetextviatraPeer::CODRUB, ViadetextviatraPeer::NUMDIA, ViadetextviatraPeer::MONDIA, ViadetextviatraPeer::MONTOT, ViadetextviatraPeer::TIPO, ViadetextviatraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numext', 'fecext', 'codrub', 'numdia', 'mondia', 'montot', 'tipo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numext' => 0, 'Fecext' => 1, 'Codrub' => 2, 'Numdia' => 3, 'Mondia' => 4, 'Montot' => 5, 'Tipo' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (ViadetextviatraPeer::NUMEXT => 0, ViadetextviatraPeer::FECEXT => 1, ViadetextviatraPeer::CODRUB => 2, ViadetextviatraPeer::NUMDIA => 3, ViadetextviatraPeer::MONDIA => 4, ViadetextviatraPeer::MONTOT => 5, ViadetextviatraPeer::TIPO => 6, ViadetextviatraPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('numext' => 0, 'fecext' => 1, 'codrub' => 2, 'numdia' => 3, 'mondia' => 4, 'montot' => 5, 'tipo' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViadetextviatraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViadetextviatraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViadetextviatraPeer::getTableMap();
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
		return str_replace(ViadetextviatraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViadetextviatraPeer::NUMEXT);

		$criteria->addSelectColumn(ViadetextviatraPeer::FECEXT);

		$criteria->addSelectColumn(ViadetextviatraPeer::CODRUB);

		$criteria->addSelectColumn(ViadetextviatraPeer::NUMDIA);

		$criteria->addSelectColumn(ViadetextviatraPeer::MONDIA);

		$criteria->addSelectColumn(ViadetextviatraPeer::MONTOT);

		$criteria->addSelectColumn(ViadetextviatraPeer::TIPO);

		$criteria->addSelectColumn(ViadetextviatraPeer::ID);

	}

	const COUNT = 'COUNT(viadetextviatra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viadetextviatra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadetextviatraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadetextviatraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViadetextviatraPeer::doSelectRS($criteria, $con);
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
		$objects = ViadetextviatraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViadetextviatraPeer::populateObjects(ViadetextviatraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViadetextviatraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViadetextviatraPeer::getOMClass();
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
		return ViadetextviatraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViadetextviatraPeer::ID); 

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
			$comparison = $criteria->getComparison(ViadetextviatraPeer::ID);
			$selectCriteria->add(ViadetextviatraPeer::ID, $criteria->remove(ViadetextviatraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViadetextviatraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViadetextviatraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viadetextviatra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViadetextviatraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viadetextviatra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViadetextviatraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViadetextviatraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViadetextviatraPeer::DATABASE_NAME, ViadetextviatraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViadetextviatraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViadetextviatraPeer::DATABASE_NAME);

		$criteria->add(ViadetextviatraPeer::ID, $pk);


		$v = ViadetextviatraPeer::doSelect($criteria, $con);

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
			$criteria->add(ViadetextviatraPeer::ID, $pks, Criteria::IN);
			$objs = ViadetextviatraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViadetextviatraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViadetextviatraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViadetextviatraMapBuilder');
}
