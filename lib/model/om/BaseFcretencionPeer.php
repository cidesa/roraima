<?php


abstract class BaseFcretencionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcretencion';

	
	const CLASS_DEFAULT = 'lib.model.Fcretencion';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMRET = 'fcretencion.NUMRET';

	
	const FUEING = 'fcretencion.FUEING';

	
	const FECRET = 'fcretencion.FECRET';

	
	const FECREG = 'fcretencion.FECREG';

	
	const MONRET = 'fcretencion.MONRET';

	
	const NUMREL = 'fcretencion.NUMREL';

	
	const DESRET = 'fcretencion.DESRET';

	
	const MONSAL = 'fcretencion.MONSAL';

	
	const ID = 'fcretencion.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numret', 'Fueing', 'Fecret', 'Fecreg', 'Monret', 'Numrel', 'Desret', 'Monsal', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcretencionPeer::NUMRET, FcretencionPeer::FUEING, FcretencionPeer::FECRET, FcretencionPeer::FECREG, FcretencionPeer::MONRET, FcretencionPeer::NUMREL, FcretencionPeer::DESRET, FcretencionPeer::MONSAL, FcretencionPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numret', 'fueing', 'fecret', 'fecreg', 'monret', 'numrel', 'desret', 'monsal', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numret' => 0, 'Fueing' => 1, 'Fecret' => 2, 'Fecreg' => 3, 'Monret' => 4, 'Numrel' => 5, 'Desret' => 6, 'Monsal' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (FcretencionPeer::NUMRET => 0, FcretencionPeer::FUEING => 1, FcretencionPeer::FECRET => 2, FcretencionPeer::FECREG => 3, FcretencionPeer::MONRET => 4, FcretencionPeer::NUMREL => 5, FcretencionPeer::DESRET => 6, FcretencionPeer::MONSAL => 7, FcretencionPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('numret' => 0, 'fueing' => 1, 'fecret' => 2, 'fecreg' => 3, 'monret' => 4, 'numrel' => 5, 'desret' => 6, 'monsal' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcretencionMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcretencionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcretencionPeer::getTableMap();
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
		return str_replace(FcretencionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcretencionPeer::NUMRET);

		$criteria->addSelectColumn(FcretencionPeer::FUEING);

		$criteria->addSelectColumn(FcretencionPeer::FECRET);

		$criteria->addSelectColumn(FcretencionPeer::FECREG);

		$criteria->addSelectColumn(FcretencionPeer::MONRET);

		$criteria->addSelectColumn(FcretencionPeer::NUMREL);

		$criteria->addSelectColumn(FcretencionPeer::DESRET);

		$criteria->addSelectColumn(FcretencionPeer::MONSAL);

		$criteria->addSelectColumn(FcretencionPeer::ID);

	}

	const COUNT = 'COUNT(fcretencion.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcretencion.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcretencionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcretencionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcretencionPeer::doSelectRS($criteria, $con);
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
		$objects = FcretencionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcretencionPeer::populateObjects(FcretencionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcretencionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcretencionPeer::getOMClass();
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
		return FcretencionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcretencionPeer::ID); 

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
			$comparison = $criteria->getComparison(FcretencionPeer::ID);
			$selectCriteria->add(FcretencionPeer::ID, $criteria->remove(FcretencionPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcretencionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcretencionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcretencion) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcretencionPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcretencion $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcretencionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcretencionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcretencionPeer::DATABASE_NAME, FcretencionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcretencionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcretencionPeer::DATABASE_NAME);

		$criteria->add(FcretencionPeer::ID, $pk);


		$v = FcretencionPeer::doSelect($criteria, $con);

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
			$criteria->add(FcretencionPeer::ID, $pks, Criteria::IN);
			$objs = FcretencionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcretencionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcretencionMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcretencionMapBuilder');
}
