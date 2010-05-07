<?php


abstract class BaseTssalcajPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tssalcaj';

	
	const CLASS_DEFAULT = 'lib.model.Tssalcaj';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFSAL = 'tssalcaj.REFSAL';

	
	const FECSAL = 'tssalcaj.FECSAL';

	
	const CEDRIF = 'tssalcaj.CEDRIF';

	
	const DESSAL = 'tssalcaj.DESSAL';

	
	const MONSAL = 'tssalcaj.MONSAL';

	
	const STASAL = 'tssalcaj.STASAL';

	
	const CODCAJ = 'tssalcaj.CODCAJ';


	const ID = 'tssalcaj.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refsal', 'Fecsal', 'Cedrif', 'Dessal', 'Monsal', 'Stasal', 'Codcaj', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TssalcajPeer::REFSAL, TssalcajPeer::FECSAL, TssalcajPeer::CEDRIF, TssalcajPeer::DESSAL, TssalcajPeer::MONSAL, TssalcajPeer::STASAL, TssalcajPeer::CODCAJ, TssalcajPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refsal', 'fecsal', 'cedrif', 'dessal', 'monsal', 'stasal', 'codcaj', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refsal' => 0, 'Fecsal' => 1, 'Cedrif' => 2, 'Dessal' => 3, 'Monsal' => 4, 'Stasal' => 5, 'Codcaj' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (TssalcajPeer::REFSAL => 0, TssalcajPeer::FECSAL => 1, TssalcajPeer::CEDRIF => 2, TssalcajPeer::DESSAL => 3, TssalcajPeer::MONSAL => 4, TssalcajPeer::STASAL => 5, TssalcajPeer::CODCAJ => 6, TssalcajPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('refsal' => 0, 'fecsal' => 1, 'cedrif' => 2, 'dessal' => 3, 'monsal' => 4, 'stasal' => 5, 'codcaj' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TssalcajMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TssalcajMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TssalcajPeer::getTableMap();
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
		return str_replace(TssalcajPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TssalcajPeer::REFSAL);

		$criteria->addSelectColumn(TssalcajPeer::FECSAL);

		$criteria->addSelectColumn(TssalcajPeer::CEDRIF);

		$criteria->addSelectColumn(TssalcajPeer::DESSAL);

		$criteria->addSelectColumn(TssalcajPeer::MONSAL);

		$criteria->addSelectColumn(TssalcajPeer::STASAL);

		$criteria->addSelectColumn(TssalcajPeer::CODCAJ);

		$criteria->addSelectColumn(TssalcajPeer::ID);

	}

	const COUNT = 'COUNT(tssalcaj.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tssalcaj.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TssalcajPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TssalcajPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TssalcajPeer::doSelectRS($criteria, $con);
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
		$objects = TssalcajPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TssalcajPeer::populateObjects(TssalcajPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TssalcajPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TssalcajPeer::getOMClass();
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
		return TssalcajPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TssalcajPeer::ID); 

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
			$comparison = $criteria->getComparison(TssalcajPeer::ID);
			$selectCriteria->add(TssalcajPeer::ID, $criteria->remove(TssalcajPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TssalcajPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TssalcajPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tssalcaj) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TssalcajPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tssalcaj $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TssalcajPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TssalcajPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TssalcajPeer::DATABASE_NAME, TssalcajPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TssalcajPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TssalcajPeer::DATABASE_NAME);

		$criteria->add(TssalcajPeer::ID, $pk);


		$v = TssalcajPeer::doSelect($criteria, $con);

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
			$criteria->add(TssalcajPeer::ID, $pks, Criteria::IN);
			$objs = TssalcajPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTssalcajPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TssalcajMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TssalcajMapBuilder');
}
