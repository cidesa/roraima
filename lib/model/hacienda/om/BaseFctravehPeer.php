<?php


abstract class BaseFctravehPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fctraveh';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fctraveh';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMTRA = 'fctraveh.NUMTRA';

	
	const PLAVEH = 'fctraveh.PLAVEH';

	
	const FECTRA = 'fctraveh.FECTRA';

	
	const RIFCON = 'fctraveh.RIFCON';

	
	const RIFREP = 'fctraveh.RIFREP';

	
	const RIFCONANT = 'fctraveh.RIFCONANT';

	
	const RIFREPANT = 'fctraveh.RIFREPANT';

	
	const FUNREC = 'fctraveh.FUNREC';

	
	const ID = 'fctraveh.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra', 'Plaveh', 'Fectra', 'Rifcon', 'Rifrep', 'Rifconant', 'Rifrepant', 'Funrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FctravehPeer::NUMTRA, FctravehPeer::PLAVEH, FctravehPeer::FECTRA, FctravehPeer::RIFCON, FctravehPeer::RIFREP, FctravehPeer::RIFCONANT, FctravehPeer::RIFREPANT, FctravehPeer::FUNREC, FctravehPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra', 'plaveh', 'fectra', 'rifcon', 'rifrep', 'rifconant', 'rifrepant', 'funrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra' => 0, 'Plaveh' => 1, 'Fectra' => 2, 'Rifcon' => 3, 'Rifrep' => 4, 'Rifconant' => 5, 'Rifrepant' => 6, 'Funrec' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (FctravehPeer::NUMTRA => 0, FctravehPeer::PLAVEH => 1, FctravehPeer::FECTRA => 2, FctravehPeer::RIFCON => 3, FctravehPeer::RIFREP => 4, FctravehPeer::RIFCONANT => 5, FctravehPeer::RIFREPANT => 6, FctravehPeer::FUNREC => 7, FctravehPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra' => 0, 'plaveh' => 1, 'fectra' => 2, 'rifcon' => 3, 'rifrep' => 4, 'rifconant' => 5, 'rifrepant' => 6, 'funrec' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FctravehMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FctravehMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FctravehPeer::getTableMap();
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
		return str_replace(FctravehPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FctravehPeer::NUMTRA);

		$criteria->addSelectColumn(FctravehPeer::PLAVEH);

		$criteria->addSelectColumn(FctravehPeer::FECTRA);

		$criteria->addSelectColumn(FctravehPeer::RIFCON);

		$criteria->addSelectColumn(FctravehPeer::RIFREP);

		$criteria->addSelectColumn(FctravehPeer::RIFCONANT);

		$criteria->addSelectColumn(FctravehPeer::RIFREPANT);

		$criteria->addSelectColumn(FctravehPeer::FUNREC);

		$criteria->addSelectColumn(FctravehPeer::ID);

	}

	const COUNT = 'COUNT(fctraveh.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fctraveh.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FctravehPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FctravehPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FctravehPeer::doSelectRS($criteria, $con);
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
		$objects = FctravehPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FctravehPeer::populateObjects(FctravehPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FctravehPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FctravehPeer::getOMClass();
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
		return FctravehPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FctravehPeer::ID); 

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
			$comparison = $criteria->getComparison(FctravehPeer::ID);
			$selectCriteria->add(FctravehPeer::ID, $criteria->remove(FctravehPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FctravehPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FctravehPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fctraveh) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FctravehPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fctraveh $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FctravehPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FctravehPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FctravehPeer::DATABASE_NAME, FctravehPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FctravehPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FctravehPeer::DATABASE_NAME);

		$criteria->add(FctravehPeer::ID, $pk);


		$v = FctravehPeer::doSelect($criteria, $con);

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
			$criteria->add(FctravehPeer::ID, $pks, Criteria::IN);
			$objs = FctravehPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFctravehPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FctravehMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FctravehMapBuilder');
}
