<?php


abstract class BaseFcotringPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcotring';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcotring';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROCON = 'fcotring.NROCON';

	
	const CODFUE = 'fcotring.CODFUE';

	
	const FECREG = 'fcotring.FECREG';

	
	const RIFCON = 'fcotring.RIFCON';

	
	const DESING = 'fcotring.DESING';

	
	const MONIMP = 'fcotring.MONIMP';

	
	const FUNREC = 'fcotring.FUNREC';

	
	const FECREC = 'fcotring.FECREC';

	
	const RIFREP = 'fcotring.RIFREP';

	
	const STAAPU = 'fcotring.STAAPU';

	
	const STADEC = 'fcotring.STADEC';

	
	const NOMCON = 'fcotring.NOMCON';

	
	const DIRCON = 'fcotring.DIRCON';

	
	const MONSAL = 'fcotring.MONSAL';

	
	const ID = 'fcotring.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nrocon', 'Codfue', 'Fecreg', 'Rifcon', 'Desing', 'Monimp', 'Funrec', 'Fecrec', 'Rifrep', 'Staapu', 'Stadec', 'Nomcon', 'Dircon', 'Monsal', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcotringPeer::NROCON, FcotringPeer::CODFUE, FcotringPeer::FECREG, FcotringPeer::RIFCON, FcotringPeer::DESING, FcotringPeer::MONIMP, FcotringPeer::FUNREC, FcotringPeer::FECREC, FcotringPeer::RIFREP, FcotringPeer::STAAPU, FcotringPeer::STADEC, FcotringPeer::NOMCON, FcotringPeer::DIRCON, FcotringPeer::MONSAL, FcotringPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nrocon', 'codfue', 'fecreg', 'rifcon', 'desing', 'monimp', 'funrec', 'fecrec', 'rifrep', 'staapu', 'stadec', 'nomcon', 'dircon', 'monsal', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nrocon' => 0, 'Codfue' => 1, 'Fecreg' => 2, 'Rifcon' => 3, 'Desing' => 4, 'Monimp' => 5, 'Funrec' => 6, 'Fecrec' => 7, 'Rifrep' => 8, 'Staapu' => 9, 'Stadec' => 10, 'Nomcon' => 11, 'Dircon' => 12, 'Monsal' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (FcotringPeer::NROCON => 0, FcotringPeer::CODFUE => 1, FcotringPeer::FECREG => 2, FcotringPeer::RIFCON => 3, FcotringPeer::DESING => 4, FcotringPeer::MONIMP => 5, FcotringPeer::FUNREC => 6, FcotringPeer::FECREC => 7, FcotringPeer::RIFREP => 8, FcotringPeer::STAAPU => 9, FcotringPeer::STADEC => 10, FcotringPeer::NOMCON => 11, FcotringPeer::DIRCON => 12, FcotringPeer::MONSAL => 13, FcotringPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('nrocon' => 0, 'codfue' => 1, 'fecreg' => 2, 'rifcon' => 3, 'desing' => 4, 'monimp' => 5, 'funrec' => 6, 'fecrec' => 7, 'rifrep' => 8, 'staapu' => 9, 'stadec' => 10, 'nomcon' => 11, 'dircon' => 12, 'monsal' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcotringMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcotringMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcotringPeer::getTableMap();
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
		return str_replace(FcotringPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcotringPeer::NROCON);

		$criteria->addSelectColumn(FcotringPeer::CODFUE);

		$criteria->addSelectColumn(FcotringPeer::FECREG);

		$criteria->addSelectColumn(FcotringPeer::RIFCON);

		$criteria->addSelectColumn(FcotringPeer::DESING);

		$criteria->addSelectColumn(FcotringPeer::MONIMP);

		$criteria->addSelectColumn(FcotringPeer::FUNREC);

		$criteria->addSelectColumn(FcotringPeer::FECREC);

		$criteria->addSelectColumn(FcotringPeer::RIFREP);

		$criteria->addSelectColumn(FcotringPeer::STAAPU);

		$criteria->addSelectColumn(FcotringPeer::STADEC);

		$criteria->addSelectColumn(FcotringPeer::NOMCON);

		$criteria->addSelectColumn(FcotringPeer::DIRCON);

		$criteria->addSelectColumn(FcotringPeer::MONSAL);

		$criteria->addSelectColumn(FcotringPeer::ID);

	}

	const COUNT = 'COUNT(fcotring.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcotring.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcotringPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcotringPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcotringPeer::doSelectRS($criteria, $con);
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
		$objects = FcotringPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcotringPeer::populateObjects(FcotringPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcotringPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcotringPeer::getOMClass();
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
		return FcotringPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcotringPeer::ID); 

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
			$comparison = $criteria->getComparison(FcotringPeer::ID);
			$selectCriteria->add(FcotringPeer::ID, $criteria->remove(FcotringPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcotringPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcotringPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcotring) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcotringPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcotring $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcotringPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcotringPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcotringPeer::DATABASE_NAME, FcotringPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcotringPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcotringPeer::DATABASE_NAME);

		$criteria->add(FcotringPeer::ID, $pk);


		$v = FcotringPeer::doSelect($criteria, $con);

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
			$criteria->add(FcotringPeer::ID, $pks, Criteria::IN);
			$objs = FcotringPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcotringPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcotringMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcotringMapBuilder');
}
