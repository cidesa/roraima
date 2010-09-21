<?php


abstract class BaseFcmodespPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcmodesp';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcmodesp';

	
	const NUM_COLUMNS = 27;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFMOD = 'fcmodesp.REFMOD';

	
	const NROCON = 'fcmodesp.NROCON';

	
	const FECMOD = 'fcmodesp.FECMOD';

	
	const NOMESP = 'fcmodesp.NOMESP';

	
	const DIRESP = 'fcmodesp.DIRESP';

	
	const FECESP = 'fcmodesp.FECESP';

	
	const HORESP = 'fcmodesp.HORESP';

	
	const TIPESP = 'fcmodesp.TIPESP';

	
	const NROENT = 'fcmodesp.NROENT';

	
	const MONENT = 'fcmodesp.MONENT';

	
	const MONIMP = 'fcmodesp.MONIMP';

	
	const NOMRES = 'fcmodesp.NOMRES';

	
	const DIRRES = 'fcmodesp.DIRRES';

	
	const TELRES = 'fcmodesp.TELRES';

	
	const NOMESPANT = 'fcmodesp.NOMESPANT';

	
	const DIRESPANT = 'fcmodesp.DIRESPANT';

	
	const FECESPANT = 'fcmodesp.FECESPANT';

	
	const HORESPANT = 'fcmodesp.HORESPANT';

	
	const TIPESPANT = 'fcmodesp.TIPESPANT';

	
	const NROENTANT = 'fcmodesp.NROENTANT';

	
	const MONENTANT = 'fcmodesp.MONENTANT';

	
	const MONIMPANT = 'fcmodesp.MONIMPANT';

	
	const NOMRESANT = 'fcmodesp.NOMRESANT';

	
	const DIRRESANT = 'fcmodesp.DIRRESANT';

	
	const TELRESANT = 'fcmodesp.TELRESANT';

	
	const FUNREC = 'fcmodesp.FUNREC';

	
	const ID = 'fcmodesp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod', 'Nrocon', 'Fecmod', 'Nomesp', 'Diresp', 'Fecesp', 'Horesp', 'Tipesp', 'Nroent', 'Monent', 'Monimp', 'Nomres', 'Dirres', 'Telres', 'Nomespant', 'Direspant', 'Fecespant', 'Horespant', 'Tipespant', 'Nroentant', 'Monentant', 'Monimpant', 'Nomresant', 'Dirresant', 'Telresant', 'Funrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcmodespPeer::REFMOD, FcmodespPeer::NROCON, FcmodespPeer::FECMOD, FcmodespPeer::NOMESP, FcmodespPeer::DIRESP, FcmodespPeer::FECESP, FcmodespPeer::HORESP, FcmodespPeer::TIPESP, FcmodespPeer::NROENT, FcmodespPeer::MONENT, FcmodespPeer::MONIMP, FcmodespPeer::NOMRES, FcmodespPeer::DIRRES, FcmodespPeer::TELRES, FcmodespPeer::NOMESPANT, FcmodespPeer::DIRESPANT, FcmodespPeer::FECESPANT, FcmodespPeer::HORESPANT, FcmodespPeer::TIPESPANT, FcmodespPeer::NROENTANT, FcmodespPeer::MONENTANT, FcmodespPeer::MONIMPANT, FcmodespPeer::NOMRESANT, FcmodespPeer::DIRRESANT, FcmodespPeer::TELRESANT, FcmodespPeer::FUNREC, FcmodespPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod', 'nrocon', 'fecmod', 'nomesp', 'diresp', 'fecesp', 'horesp', 'tipesp', 'nroent', 'monent', 'monimp', 'nomres', 'dirres', 'telres', 'nomespant', 'direspant', 'fecespant', 'horespant', 'tipespant', 'nroentant', 'monentant', 'monimpant', 'nomresant', 'dirresant', 'telresant', 'funrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod' => 0, 'Nrocon' => 1, 'Fecmod' => 2, 'Nomesp' => 3, 'Diresp' => 4, 'Fecesp' => 5, 'Horesp' => 6, 'Tipesp' => 7, 'Nroent' => 8, 'Monent' => 9, 'Monimp' => 10, 'Nomres' => 11, 'Dirres' => 12, 'Telres' => 13, 'Nomespant' => 14, 'Direspant' => 15, 'Fecespant' => 16, 'Horespant' => 17, 'Tipespant' => 18, 'Nroentant' => 19, 'Monentant' => 20, 'Monimpant' => 21, 'Nomresant' => 22, 'Dirresant' => 23, 'Telresant' => 24, 'Funrec' => 25, 'Id' => 26, ),
		BasePeer::TYPE_COLNAME => array (FcmodespPeer::REFMOD => 0, FcmodespPeer::NROCON => 1, FcmodespPeer::FECMOD => 2, FcmodespPeer::NOMESP => 3, FcmodespPeer::DIRESP => 4, FcmodespPeer::FECESP => 5, FcmodespPeer::HORESP => 6, FcmodespPeer::TIPESP => 7, FcmodespPeer::NROENT => 8, FcmodespPeer::MONENT => 9, FcmodespPeer::MONIMP => 10, FcmodespPeer::NOMRES => 11, FcmodespPeer::DIRRES => 12, FcmodespPeer::TELRES => 13, FcmodespPeer::NOMESPANT => 14, FcmodespPeer::DIRESPANT => 15, FcmodespPeer::FECESPANT => 16, FcmodespPeer::HORESPANT => 17, FcmodespPeer::TIPESPANT => 18, FcmodespPeer::NROENTANT => 19, FcmodespPeer::MONENTANT => 20, FcmodespPeer::MONIMPANT => 21, FcmodespPeer::NOMRESANT => 22, FcmodespPeer::DIRRESANT => 23, FcmodespPeer::TELRESANT => 24, FcmodespPeer::FUNREC => 25, FcmodespPeer::ID => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod' => 0, 'nrocon' => 1, 'fecmod' => 2, 'nomesp' => 3, 'diresp' => 4, 'fecesp' => 5, 'horesp' => 6, 'tipesp' => 7, 'nroent' => 8, 'monent' => 9, 'monimp' => 10, 'nomres' => 11, 'dirres' => 12, 'telres' => 13, 'nomespant' => 14, 'direspant' => 15, 'fecespant' => 16, 'horespant' => 17, 'tipespant' => 18, 'nroentant' => 19, 'monentant' => 20, 'monimpant' => 21, 'nomresant' => 22, 'dirresant' => 23, 'telresant' => 24, 'funrec' => 25, 'id' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcmodespMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcmodespMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcmodespPeer::getTableMap();
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
		return str_replace(FcmodespPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcmodespPeer::REFMOD);

		$criteria->addSelectColumn(FcmodespPeer::NROCON);

		$criteria->addSelectColumn(FcmodespPeer::FECMOD);

		$criteria->addSelectColumn(FcmodespPeer::NOMESP);

		$criteria->addSelectColumn(FcmodespPeer::DIRESP);

		$criteria->addSelectColumn(FcmodespPeer::FECESP);

		$criteria->addSelectColumn(FcmodespPeer::HORESP);

		$criteria->addSelectColumn(FcmodespPeer::TIPESP);

		$criteria->addSelectColumn(FcmodespPeer::NROENT);

		$criteria->addSelectColumn(FcmodespPeer::MONENT);

		$criteria->addSelectColumn(FcmodespPeer::MONIMP);

		$criteria->addSelectColumn(FcmodespPeer::NOMRES);

		$criteria->addSelectColumn(FcmodespPeer::DIRRES);

		$criteria->addSelectColumn(FcmodespPeer::TELRES);

		$criteria->addSelectColumn(FcmodespPeer::NOMESPANT);

		$criteria->addSelectColumn(FcmodespPeer::DIRESPANT);

		$criteria->addSelectColumn(FcmodespPeer::FECESPANT);

		$criteria->addSelectColumn(FcmodespPeer::HORESPANT);

		$criteria->addSelectColumn(FcmodespPeer::TIPESPANT);

		$criteria->addSelectColumn(FcmodespPeer::NROENTANT);

		$criteria->addSelectColumn(FcmodespPeer::MONENTANT);

		$criteria->addSelectColumn(FcmodespPeer::MONIMPANT);

		$criteria->addSelectColumn(FcmodespPeer::NOMRESANT);

		$criteria->addSelectColumn(FcmodespPeer::DIRRESANT);

		$criteria->addSelectColumn(FcmodespPeer::TELRESANT);

		$criteria->addSelectColumn(FcmodespPeer::FUNREC);

		$criteria->addSelectColumn(FcmodespPeer::ID);

	}

	const COUNT = 'COUNT(fcmodesp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcmodesp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcmodespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcmodespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcmodespPeer::doSelectRS($criteria, $con);
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
		$objects = FcmodespPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcmodespPeer::populateObjects(FcmodespPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcmodespPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcmodespPeer::getOMClass();
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
		return FcmodespPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcmodespPeer::ID); 

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
			$comparison = $criteria->getComparison(FcmodespPeer::ID);
			$selectCriteria->add(FcmodespPeer::ID, $criteria->remove(FcmodespPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcmodespPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcmodespPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcmodesp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcmodespPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcmodesp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcmodespPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcmodespPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcmodespPeer::DATABASE_NAME, FcmodespPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcmodespPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcmodespPeer::DATABASE_NAME);

		$criteria->add(FcmodespPeer::ID, $pk);


		$v = FcmodespPeer::doSelect($criteria, $con);

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
			$criteria->add(FcmodespPeer::ID, $pks, Criteria::IN);
			$objs = FcmodespPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcmodespPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcmodespMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcmodespMapBuilder');
}
