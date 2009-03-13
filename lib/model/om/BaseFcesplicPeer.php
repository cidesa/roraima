<?php


abstract class BaseFcesplicPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcesplic';

	
	const CLASS_DEFAULT = 'lib.model.Fcesplic';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROCON = 'fcesplic.NROCON';

	
	const FECREG = 'fcesplic.FECREG';

	
	const RIFCON = 'fcesplic.RIFCON';

	
	const TIPESP = 'fcesplic.TIPESP';

	
	const DESESP = 'fcesplic.DESESP';

	
	const DIRESP = 'fcesplic.DIRESP';

	
	const MONESP = 'fcesplic.MONESP';

	
	const MONIMP = 'fcesplic.MONIMP';

	
	const FUNREC = 'fcesplic.FUNREC';

	
	const FECREC = 'fcesplic.FECREC';

	
	const RIFREP = 'fcesplic.RIFREP';

	
	const STAESP = 'fcesplic.STAESP';

	
	const STADEC = 'fcesplic.STADEC';

	
	const NOMCON = 'fcesplic.NOMCON';

	
	const DIRCON = 'fcesplic.DIRCON';

	
	const SEMDIA = 'fcesplic.SEMDIA';

	
	const TEXEXO = 'fcesplic.TEXEXO';

	
	const FECESP = 'fcesplic.FECESP';

	
	const HORESPI = 'fcesplic.HORESPI';

	
	const NROENT = 'fcesplic.NROENT';

	
	const MONENT = 'fcesplic.MONENT';

	
	const EXOESP = 'fcesplic.EXOESP';

	
	const HORESPF = 'fcesplic.HORESPF';

	
	const ID = 'fcesplic.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nrocon', 'Fecreg', 'Rifcon', 'Tipesp', 'Desesp', 'Diresp', 'Monesp', 'Monimp', 'Funrec', 'Fecrec', 'Rifrep', 'Staesp', 'Stadec', 'Nomcon', 'Dircon', 'Semdia', 'Texexo', 'Fecesp', 'Horespi', 'Nroent', 'Monent', 'Exoesp', 'Horespf', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcesplicPeer::NROCON, FcesplicPeer::FECREG, FcesplicPeer::RIFCON, FcesplicPeer::TIPESP, FcesplicPeer::DESESP, FcesplicPeer::DIRESP, FcesplicPeer::MONESP, FcesplicPeer::MONIMP, FcesplicPeer::FUNREC, FcesplicPeer::FECREC, FcesplicPeer::RIFREP, FcesplicPeer::STAESP, FcesplicPeer::STADEC, FcesplicPeer::NOMCON, FcesplicPeer::DIRCON, FcesplicPeer::SEMDIA, FcesplicPeer::TEXEXO, FcesplicPeer::FECESP, FcesplicPeer::HORESPI, FcesplicPeer::NROENT, FcesplicPeer::MONENT, FcesplicPeer::EXOESP, FcesplicPeer::HORESPF, FcesplicPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nrocon', 'fecreg', 'rifcon', 'tipesp', 'desesp', 'diresp', 'monesp', 'monimp', 'funrec', 'fecrec', 'rifrep', 'staesp', 'stadec', 'nomcon', 'dircon', 'semdia', 'texexo', 'fecesp', 'horespi', 'nroent', 'monent', 'exoesp', 'horespf', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nrocon' => 0, 'Fecreg' => 1, 'Rifcon' => 2, 'Tipesp' => 3, 'Desesp' => 4, 'Diresp' => 5, 'Monesp' => 6, 'Monimp' => 7, 'Funrec' => 8, 'Fecrec' => 9, 'Rifrep' => 10, 'Staesp' => 11, 'Stadec' => 12, 'Nomcon' => 13, 'Dircon' => 14, 'Semdia' => 15, 'Texexo' => 16, 'Fecesp' => 17, 'Horespi' => 18, 'Nroent' => 19, 'Monent' => 20, 'Exoesp' => 21, 'Horespf' => 22, 'Id' => 23, ),
		BasePeer::TYPE_COLNAME => array (FcesplicPeer::NROCON => 0, FcesplicPeer::FECREG => 1, FcesplicPeer::RIFCON => 2, FcesplicPeer::TIPESP => 3, FcesplicPeer::DESESP => 4, FcesplicPeer::DIRESP => 5, FcesplicPeer::MONESP => 6, FcesplicPeer::MONIMP => 7, FcesplicPeer::FUNREC => 8, FcesplicPeer::FECREC => 9, FcesplicPeer::RIFREP => 10, FcesplicPeer::STAESP => 11, FcesplicPeer::STADEC => 12, FcesplicPeer::NOMCON => 13, FcesplicPeer::DIRCON => 14, FcesplicPeer::SEMDIA => 15, FcesplicPeer::TEXEXO => 16, FcesplicPeer::FECESP => 17, FcesplicPeer::HORESPI => 18, FcesplicPeer::NROENT => 19, FcesplicPeer::MONENT => 20, FcesplicPeer::EXOESP => 21, FcesplicPeer::HORESPF => 22, FcesplicPeer::ID => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('nrocon' => 0, 'fecreg' => 1, 'rifcon' => 2, 'tipesp' => 3, 'desesp' => 4, 'diresp' => 5, 'monesp' => 6, 'monimp' => 7, 'funrec' => 8, 'fecrec' => 9, 'rifrep' => 10, 'staesp' => 11, 'stadec' => 12, 'nomcon' => 13, 'dircon' => 14, 'semdia' => 15, 'texexo' => 16, 'fecesp' => 17, 'horespi' => 18, 'nroent' => 19, 'monent' => 20, 'exoesp' => 21, 'horespf' => 22, 'id' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcesplicMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcesplicMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcesplicPeer::getTableMap();
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
		return str_replace(FcesplicPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcesplicPeer::NROCON);

		$criteria->addSelectColumn(FcesplicPeer::FECREG);

		$criteria->addSelectColumn(FcesplicPeer::RIFCON);

		$criteria->addSelectColumn(FcesplicPeer::TIPESP);

		$criteria->addSelectColumn(FcesplicPeer::DESESP);

		$criteria->addSelectColumn(FcesplicPeer::DIRESP);

		$criteria->addSelectColumn(FcesplicPeer::MONESP);

		$criteria->addSelectColumn(FcesplicPeer::MONIMP);

		$criteria->addSelectColumn(FcesplicPeer::FUNREC);

		$criteria->addSelectColumn(FcesplicPeer::FECREC);

		$criteria->addSelectColumn(FcesplicPeer::RIFREP);

		$criteria->addSelectColumn(FcesplicPeer::STAESP);

		$criteria->addSelectColumn(FcesplicPeer::STADEC);

		$criteria->addSelectColumn(FcesplicPeer::NOMCON);

		$criteria->addSelectColumn(FcesplicPeer::DIRCON);

		$criteria->addSelectColumn(FcesplicPeer::SEMDIA);

		$criteria->addSelectColumn(FcesplicPeer::TEXEXO);

		$criteria->addSelectColumn(FcesplicPeer::FECESP);

		$criteria->addSelectColumn(FcesplicPeer::HORESPI);

		$criteria->addSelectColumn(FcesplicPeer::NROENT);

		$criteria->addSelectColumn(FcesplicPeer::MONENT);

		$criteria->addSelectColumn(FcesplicPeer::EXOESP);

		$criteria->addSelectColumn(FcesplicPeer::HORESPF);

		$criteria->addSelectColumn(FcesplicPeer::ID);

	}

	const COUNT = 'COUNT(fcesplic.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcesplic.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcesplicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcesplicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcesplicPeer::doSelectRS($criteria, $con);
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
		$objects = FcesplicPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcesplicPeer::populateObjects(FcesplicPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcesplicPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcesplicPeer::getOMClass();
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
		return FcesplicPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcesplicPeer::ID); 

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
			$comparison = $criteria->getComparison(FcesplicPeer::ID);
			$selectCriteria->add(FcesplicPeer::ID, $criteria->remove(FcesplicPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcesplicPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcesplicPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcesplic) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcesplicPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcesplic $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcesplicPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcesplicPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcesplicPeer::DATABASE_NAME, FcesplicPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcesplicPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcesplicPeer::DATABASE_NAME);

		$criteria->add(FcesplicPeer::ID, $pk);


		$v = FcesplicPeer::doSelect($criteria, $con);

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
			$criteria->add(FcesplicPeer::ID, $pks, Criteria::IN);
			$objs = FcesplicPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcesplicPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcesplicMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcesplicMapBuilder');
}
