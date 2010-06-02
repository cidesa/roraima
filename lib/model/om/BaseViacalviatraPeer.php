<?php


abstract class BaseViacalviatraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viacalviatra';

	
	const CLASS_DEFAULT = 'lib.model.Viacalviatra';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCAL = 'viacalviatra.NUMCAL';

	
	const FECCAL = 'viacalviatra.FECCAL';

	
	const TIPCOM = 'viacalviatra.TIPCOM';

	
	const REFSOL = 'viacalviatra.REFSOL';

	
	const CODCAT = 'viacalviatra.CODCAT';

	
	const DIACONPER = 'viacalviatra.DIACONPER';

	
	const DIASINPER = 'viacalviatra.DIASINPER';

	
	const STATUS = 'viacalviatra.STATUS';

	
	const OBSERVACIONES = 'viacalviatra.OBSERVACIONES';

	
	const ID = 'viacalviatra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcal', 'Feccal', 'Tipcom', 'Refsol', 'Codcat', 'Diaconper', 'Diasinper', 'Status', 'Observaciones', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViacalviatraPeer::NUMCAL, ViacalviatraPeer::FECCAL, ViacalviatraPeer::TIPCOM, ViacalviatraPeer::REFSOL, ViacalviatraPeer::CODCAT, ViacalviatraPeer::DIACONPER, ViacalviatraPeer::DIASINPER, ViacalviatraPeer::STATUS, ViacalviatraPeer::OBSERVACIONES, ViacalviatraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcal', 'feccal', 'tipcom', 'refsol', 'codcat', 'diaconper', 'diasinper', 'status', 'observaciones', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcal' => 0, 'Feccal' => 1, 'Tipcom' => 2, 'Refsol' => 3, 'Codcat' => 4, 'Diaconper' => 5, 'Diasinper' => 6, 'Status' => 7, 'Observaciones' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (ViacalviatraPeer::NUMCAL => 0, ViacalviatraPeer::FECCAL => 1, ViacalviatraPeer::TIPCOM => 2, ViacalviatraPeer::REFSOL => 3, ViacalviatraPeer::CODCAT => 4, ViacalviatraPeer::DIACONPER => 5, ViacalviatraPeer::DIASINPER => 6, ViacalviatraPeer::STATUS => 7, ViacalviatraPeer::OBSERVACIONES => 8, ViacalviatraPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('numcal' => 0, 'feccal' => 1, 'tipcom' => 2, 'refsol' => 3, 'codcat' => 4, 'diaconper' => 5, 'diasinper' => 6, 'status' => 7, 'observaciones' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViacalviatraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViacalviatraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViacalviatraPeer::getTableMap();
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
		return str_replace(ViacalviatraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViacalviatraPeer::NUMCAL);

		$criteria->addSelectColumn(ViacalviatraPeer::FECCAL);

		$criteria->addSelectColumn(ViacalviatraPeer::TIPCOM);

		$criteria->addSelectColumn(ViacalviatraPeer::REFSOL);

		$criteria->addSelectColumn(ViacalviatraPeer::CODCAT);

		$criteria->addSelectColumn(ViacalviatraPeer::DIACONPER);

		$criteria->addSelectColumn(ViacalviatraPeer::DIASINPER);

		$criteria->addSelectColumn(ViacalviatraPeer::STATUS);

		$criteria->addSelectColumn(ViacalviatraPeer::OBSERVACIONES);

		$criteria->addSelectColumn(ViacalviatraPeer::ID);

	}

	const COUNT = 'COUNT(viacalviatra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viacalviatra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViacalviatraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViacalviatraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViacalviatraPeer::doSelectRS($criteria, $con);
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
		$objects = ViacalviatraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViacalviatraPeer::populateObjects(ViacalviatraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViacalviatraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViacalviatraPeer::getOMClass();
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
		return ViacalviatraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViacalviatraPeer::ID); 

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
			$comparison = $criteria->getComparison(ViacalviatraPeer::ID);
			$selectCriteria->add(ViacalviatraPeer::ID, $criteria->remove(ViacalviatraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViacalviatraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViacalviatraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viacalviatra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViacalviatraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viacalviatra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViacalviatraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViacalviatraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViacalviatraPeer::DATABASE_NAME, ViacalviatraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViacalviatraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViacalviatraPeer::DATABASE_NAME);

		$criteria->add(ViacalviatraPeer::ID, $pk);


		$v = ViacalviatraPeer::doSelect($criteria, $con);

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
			$criteria->add(ViacalviatraPeer::ID, $pks, Criteria::IN);
			$objs = ViacalviatraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViacalviatraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViacalviatraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViacalviatraMapBuilder');
}
