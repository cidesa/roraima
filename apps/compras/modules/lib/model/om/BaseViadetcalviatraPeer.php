<?php


abstract class BaseViadetcalviatraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viadetcalviatra';

	
	const CLASS_DEFAULT = 'lib.model.Viadetcalviatra';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCAL = 'viadetcalviatra.NUMCAL';

	
	const FECCAL = 'viadetcalviatra.FECCAL';

	
	const CODRUB = 'viadetcalviatra.CODRUB';

	
	const NUMDIA = 'viadetcalviatra.NUMDIA';

	
	const MONDIA = 'viadetcalviatra.MONDIA';

	
	const MONTOT = 'viadetcalviatra.MONTOT';

	
	const TIPO = 'viadetcalviatra.TIPO';

	
	const ID = 'viadetcalviatra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcal', 'Feccal', 'Codrub', 'Numdia', 'Mondia', 'Montot', 'Tipo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViadetcalviatraPeer::NUMCAL, ViadetcalviatraPeer::FECCAL, ViadetcalviatraPeer::CODRUB, ViadetcalviatraPeer::NUMDIA, ViadetcalviatraPeer::MONDIA, ViadetcalviatraPeer::MONTOT, ViadetcalviatraPeer::TIPO, ViadetcalviatraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcal', 'feccal', 'codrub', 'numdia', 'mondia', 'montot', 'tipo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcal' => 0, 'Feccal' => 1, 'Codrub' => 2, 'Numdia' => 3, 'Mondia' => 4, 'Montot' => 5, 'Tipo' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (ViadetcalviatraPeer::NUMCAL => 0, ViadetcalviatraPeer::FECCAL => 1, ViadetcalviatraPeer::CODRUB => 2, ViadetcalviatraPeer::NUMDIA => 3, ViadetcalviatraPeer::MONDIA => 4, ViadetcalviatraPeer::MONTOT => 5, ViadetcalviatraPeer::TIPO => 6, ViadetcalviatraPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('numcal' => 0, 'feccal' => 1, 'codrub' => 2, 'numdia' => 3, 'mondia' => 4, 'montot' => 5, 'tipo' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViadetcalviatraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViadetcalviatraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViadetcalviatraPeer::getTableMap();
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
		return str_replace(ViadetcalviatraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViadetcalviatraPeer::NUMCAL);

		$criteria->addSelectColumn(ViadetcalviatraPeer::FECCAL);

		$criteria->addSelectColumn(ViadetcalviatraPeer::CODRUB);

		$criteria->addSelectColumn(ViadetcalviatraPeer::NUMDIA);

		$criteria->addSelectColumn(ViadetcalviatraPeer::MONDIA);

		$criteria->addSelectColumn(ViadetcalviatraPeer::MONTOT);

		$criteria->addSelectColumn(ViadetcalviatraPeer::TIPO);

		$criteria->addSelectColumn(ViadetcalviatraPeer::ID);

	}

	const COUNT = 'COUNT(viadetcalviatra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viadetcalviatra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadetcalviatraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadetcalviatraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViadetcalviatraPeer::doSelectRS($criteria, $con);
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
		$objects = ViadetcalviatraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViadetcalviatraPeer::populateObjects(ViadetcalviatraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViadetcalviatraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViadetcalviatraPeer::getOMClass();
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
		return ViadetcalviatraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViadetcalviatraPeer::ID); 

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
			$comparison = $criteria->getComparison(ViadetcalviatraPeer::ID);
			$selectCriteria->add(ViadetcalviatraPeer::ID, $criteria->remove(ViadetcalviatraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViadetcalviatraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViadetcalviatraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viadetcalviatra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViadetcalviatraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viadetcalviatra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViadetcalviatraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViadetcalviatraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViadetcalviatraPeer::DATABASE_NAME, ViadetcalviatraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViadetcalviatraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViadetcalviatraPeer::DATABASE_NAME);

		$criteria->add(ViadetcalviatraPeer::ID, $pk);


		$v = ViadetcalviatraPeer::doSelect($criteria, $con);

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
			$criteria->add(ViadetcalviatraPeer::ID, $pks, Criteria::IN);
			$objs = ViadetcalviatraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViadetcalviatraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViadetcalviatraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViadetcalviatraMapBuilder');
}
