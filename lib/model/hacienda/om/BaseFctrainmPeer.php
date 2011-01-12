<?php


abstract class BaseFctrainmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fctrainm';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fctrainm';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMTRA = 'fctrainm.NUMTRA';

	
	const NROINM = 'fctrainm.NROINM';

	
	const FECTRA = 'fctrainm.FECTRA';

	
	const RIFCON = 'fctrainm.RIFCON';

	
	const RIFREP = 'fctrainm.RIFREP';

	
	const RIFCONANT = 'fctrainm.RIFCONANT';

	
	const RIFREPANT = 'fctrainm.RIFREPANT';

	
	const FUNREC = 'fctrainm.FUNREC';

	
	const ID = 'fctrainm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra', 'Nroinm', 'Fectra', 'Rifcon', 'Rifrep', 'Rifconant', 'Rifrepant', 'Funrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FctrainmPeer::NUMTRA, FctrainmPeer::NROINM, FctrainmPeer::FECTRA, FctrainmPeer::RIFCON, FctrainmPeer::RIFREP, FctrainmPeer::RIFCONANT, FctrainmPeer::RIFREPANT, FctrainmPeer::FUNREC, FctrainmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra', 'nroinm', 'fectra', 'rifcon', 'rifrep', 'rifconant', 'rifrepant', 'funrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra' => 0, 'Nroinm' => 1, 'Fectra' => 2, 'Rifcon' => 3, 'Rifrep' => 4, 'Rifconant' => 5, 'Rifrepant' => 6, 'Funrec' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (FctrainmPeer::NUMTRA => 0, FctrainmPeer::NROINM => 1, FctrainmPeer::FECTRA => 2, FctrainmPeer::RIFCON => 3, FctrainmPeer::RIFREP => 4, FctrainmPeer::RIFCONANT => 5, FctrainmPeer::RIFREPANT => 6, FctrainmPeer::FUNREC => 7, FctrainmPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra' => 0, 'nroinm' => 1, 'fectra' => 2, 'rifcon' => 3, 'rifrep' => 4, 'rifconant' => 5, 'rifrepant' => 6, 'funrec' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FctrainmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FctrainmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FctrainmPeer::getTableMap();
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
		return str_replace(FctrainmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FctrainmPeer::NUMTRA);

		$criteria->addSelectColumn(FctrainmPeer::NROINM);

		$criteria->addSelectColumn(FctrainmPeer::FECTRA);

		$criteria->addSelectColumn(FctrainmPeer::RIFCON);

		$criteria->addSelectColumn(FctrainmPeer::RIFREP);

		$criteria->addSelectColumn(FctrainmPeer::RIFCONANT);

		$criteria->addSelectColumn(FctrainmPeer::RIFREPANT);

		$criteria->addSelectColumn(FctrainmPeer::FUNREC);

		$criteria->addSelectColumn(FctrainmPeer::ID);

	}

	const COUNT = 'COUNT(fctrainm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fctrainm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FctrainmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FctrainmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FctrainmPeer::doSelectRS($criteria, $con);
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
		$objects = FctrainmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FctrainmPeer::populateObjects(FctrainmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FctrainmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FctrainmPeer::getOMClass();
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
		return FctrainmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FctrainmPeer::ID); 

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
			$comparison = $criteria->getComparison(FctrainmPeer::ID);
			$selectCriteria->add(FctrainmPeer::ID, $criteria->remove(FctrainmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FctrainmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FctrainmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fctrainm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FctrainmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fctrainm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FctrainmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FctrainmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FctrainmPeer::DATABASE_NAME, FctrainmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FctrainmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FctrainmPeer::DATABASE_NAME);

		$criteria->add(FctrainmPeer::ID, $pk);


		$v = FctrainmPeer::doSelect($criteria, $con);

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
			$criteria->add(FctrainmPeer::ID, $pks, Criteria::IN);
			$objs = FctrainmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFctrainmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FctrainmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FctrainmMapBuilder');
}
