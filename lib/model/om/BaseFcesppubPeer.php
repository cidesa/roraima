<?php


abstract class BaseFcesppubPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcesppub';

	
	const CLASS_DEFAULT = 'lib.model.Fcesppub';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROCON = 'fcesppub.NROCON';

	
	const FECREG = 'fcesppub.FECREG';

	
	const RIFCON = 'fcesppub.RIFCON';

	
	const RIFREP = 'fcesppub.RIFREP';

	
	const NOMESP = 'fcesppub.NOMESP';

	
	const DIRESP = 'fcesppub.DIRESP';

	
	const FECESP = 'fcesppub.FECESP';

	
	const HORESP = 'fcesppub.HORESP';

	
	const TIPESP = 'fcesppub.TIPESP';

	
	const NROENT = 'fcesppub.NROENT';

	
	const MONENT = 'fcesppub.MONENT';

	
	const MONIMP = 'fcesppub.MONIMP';

	
	const NOMRES = 'fcesppub.NOMRES';

	
	const DIRRES = 'fcesppub.DIRRES';

	
	const TELRES = 'fcesppub.TELRES';

	
	const FUNREC = 'fcesppub.FUNREC';

	
	const FECREC = 'fcesppub.FECREC';

	
	const STAESP = 'fcesppub.STAESP';

	
	const STADEC = 'fcesppub.STADEC';

	
	const NOMCON = 'fcesppub.NOMCON';

	
	const DIRCON = 'fcesppub.DIRCON';

	
	const ID = 'fcesppub.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nrocon', 'Fecreg', 'Rifcon', 'Rifrep', 'Nomesp', 'Diresp', 'Fecesp', 'Horesp', 'Tipesp', 'Nroent', 'Monent', 'Monimp', 'Nomres', 'Dirres', 'Telres', 'Funrec', 'Fecrec', 'Staesp', 'Stadec', 'Nomcon', 'Dircon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcesppubPeer::NROCON, FcesppubPeer::FECREG, FcesppubPeer::RIFCON, FcesppubPeer::RIFREP, FcesppubPeer::NOMESP, FcesppubPeer::DIRESP, FcesppubPeer::FECESP, FcesppubPeer::HORESP, FcesppubPeer::TIPESP, FcesppubPeer::NROENT, FcesppubPeer::MONENT, FcesppubPeer::MONIMP, FcesppubPeer::NOMRES, FcesppubPeer::DIRRES, FcesppubPeer::TELRES, FcesppubPeer::FUNREC, FcesppubPeer::FECREC, FcesppubPeer::STAESP, FcesppubPeer::STADEC, FcesppubPeer::NOMCON, FcesppubPeer::DIRCON, FcesppubPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nrocon', 'fecreg', 'rifcon', 'rifrep', 'nomesp', 'diresp', 'fecesp', 'horesp', 'tipesp', 'nroent', 'monent', 'monimp', 'nomres', 'dirres', 'telres', 'funrec', 'fecrec', 'staesp', 'stadec', 'nomcon', 'dircon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nrocon' => 0, 'Fecreg' => 1, 'Rifcon' => 2, 'Rifrep' => 3, 'Nomesp' => 4, 'Diresp' => 5, 'Fecesp' => 6, 'Horesp' => 7, 'Tipesp' => 8, 'Nroent' => 9, 'Monent' => 10, 'Monimp' => 11, 'Nomres' => 12, 'Dirres' => 13, 'Telres' => 14, 'Funrec' => 15, 'Fecrec' => 16, 'Staesp' => 17, 'Stadec' => 18, 'Nomcon' => 19, 'Dircon' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (FcesppubPeer::NROCON => 0, FcesppubPeer::FECREG => 1, FcesppubPeer::RIFCON => 2, FcesppubPeer::RIFREP => 3, FcesppubPeer::NOMESP => 4, FcesppubPeer::DIRESP => 5, FcesppubPeer::FECESP => 6, FcesppubPeer::HORESP => 7, FcesppubPeer::TIPESP => 8, FcesppubPeer::NROENT => 9, FcesppubPeer::MONENT => 10, FcesppubPeer::MONIMP => 11, FcesppubPeer::NOMRES => 12, FcesppubPeer::DIRRES => 13, FcesppubPeer::TELRES => 14, FcesppubPeer::FUNREC => 15, FcesppubPeer::FECREC => 16, FcesppubPeer::STAESP => 17, FcesppubPeer::STADEC => 18, FcesppubPeer::NOMCON => 19, FcesppubPeer::DIRCON => 20, FcesppubPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('nrocon' => 0, 'fecreg' => 1, 'rifcon' => 2, 'rifrep' => 3, 'nomesp' => 4, 'diresp' => 5, 'fecesp' => 6, 'horesp' => 7, 'tipesp' => 8, 'nroent' => 9, 'monent' => 10, 'monimp' => 11, 'nomres' => 12, 'dirres' => 13, 'telres' => 14, 'funrec' => 15, 'fecrec' => 16, 'staesp' => 17, 'stadec' => 18, 'nomcon' => 19, 'dircon' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcesppubMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcesppubMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcesppubPeer::getTableMap();
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
		return str_replace(FcesppubPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcesppubPeer::NROCON);

		$criteria->addSelectColumn(FcesppubPeer::FECREG);

		$criteria->addSelectColumn(FcesppubPeer::RIFCON);

		$criteria->addSelectColumn(FcesppubPeer::RIFREP);

		$criteria->addSelectColumn(FcesppubPeer::NOMESP);

		$criteria->addSelectColumn(FcesppubPeer::DIRESP);

		$criteria->addSelectColumn(FcesppubPeer::FECESP);

		$criteria->addSelectColumn(FcesppubPeer::HORESP);

		$criteria->addSelectColumn(FcesppubPeer::TIPESP);

		$criteria->addSelectColumn(FcesppubPeer::NROENT);

		$criteria->addSelectColumn(FcesppubPeer::MONENT);

		$criteria->addSelectColumn(FcesppubPeer::MONIMP);

		$criteria->addSelectColumn(FcesppubPeer::NOMRES);

		$criteria->addSelectColumn(FcesppubPeer::DIRRES);

		$criteria->addSelectColumn(FcesppubPeer::TELRES);

		$criteria->addSelectColumn(FcesppubPeer::FUNREC);

		$criteria->addSelectColumn(FcesppubPeer::FECREC);

		$criteria->addSelectColumn(FcesppubPeer::STAESP);

		$criteria->addSelectColumn(FcesppubPeer::STADEC);

		$criteria->addSelectColumn(FcesppubPeer::NOMCON);

		$criteria->addSelectColumn(FcesppubPeer::DIRCON);

		$criteria->addSelectColumn(FcesppubPeer::ID);

	}

	const COUNT = 'COUNT(fcesppub.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcesppub.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcesppubPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcesppubPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcesppubPeer::doSelectRS($criteria, $con);
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
		$objects = FcesppubPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcesppubPeer::populateObjects(FcesppubPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcesppubPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcesppubPeer::getOMClass();
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
		return FcesppubPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(FcesppubPeer::ID);
			$selectCriteria->add(FcesppubPeer::ID, $criteria->remove(FcesppubPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcesppubPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcesppubPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcesppub) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcesppubPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcesppub $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcesppubPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcesppubPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcesppubPeer::DATABASE_NAME, FcesppubPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcesppubPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcesppubPeer::DATABASE_NAME);

		$criteria->add(FcesppubPeer::ID, $pk);


		$v = FcesppubPeer::doSelect($criteria, $con);

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
			$criteria->add(FcesppubPeer::ID, $pks, Criteria::IN);
			$objs = FcesppubPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcesppubPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcesppubMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcesppubMapBuilder');
}
