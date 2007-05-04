<?php


abstract class BaseFcprolicPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcprolic';

	
	const CLASS_DEFAULT = 'lib.model.Fcprolic';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROCON = 'fcprolic.NROCON';

	
	const FECREG = 'fcprolic.FECREG';

	
	const RIFCON = 'fcprolic.RIFCON';

	
	const TIPPRO = 'fcprolic.TIPPRO';

	
	const DESPRO = 'fcprolic.DESPRO';

	
	const DIRPRO = 'fcprolic.DIRPRO';

	
	const MONPRO = 'fcprolic.MONPRO';

	
	const MONIMP = 'fcprolic.MONIMP';

	
	const FUNREC = 'fcprolic.FUNREC';

	
	const FECREC = 'fcprolic.FECREC';

	
	const RIFREP = 'fcprolic.RIFREP';

	
	const STAPRO = 'fcprolic.STAPRO';

	
	const STADEC = 'fcprolic.STADEC';

	
	const NOMCON = 'fcprolic.NOMCON';

	
	const DIRCON = 'fcprolic.DIRCON';

	
	const SEMDIA = 'fcprolic.SEMDIA';

	
	const ID = 'fcprolic.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nrocon', 'Fecreg', 'Rifcon', 'Tippro', 'Despro', 'Dirpro', 'Monpro', 'Monimp', 'Funrec', 'Fecrec', 'Rifrep', 'Stapro', 'Stadec', 'Nomcon', 'Dircon', 'Semdia', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcprolicPeer::NROCON, FcprolicPeer::FECREG, FcprolicPeer::RIFCON, FcprolicPeer::TIPPRO, FcprolicPeer::DESPRO, FcprolicPeer::DIRPRO, FcprolicPeer::MONPRO, FcprolicPeer::MONIMP, FcprolicPeer::FUNREC, FcprolicPeer::FECREC, FcprolicPeer::RIFREP, FcprolicPeer::STAPRO, FcprolicPeer::STADEC, FcprolicPeer::NOMCON, FcprolicPeer::DIRCON, FcprolicPeer::SEMDIA, FcprolicPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nrocon', 'fecreg', 'rifcon', 'tippro', 'despro', 'dirpro', 'monpro', 'monimp', 'funrec', 'fecrec', 'rifrep', 'stapro', 'stadec', 'nomcon', 'dircon', 'semdia', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nrocon' => 0, 'Fecreg' => 1, 'Rifcon' => 2, 'Tippro' => 3, 'Despro' => 4, 'Dirpro' => 5, 'Monpro' => 6, 'Monimp' => 7, 'Funrec' => 8, 'Fecrec' => 9, 'Rifrep' => 10, 'Stapro' => 11, 'Stadec' => 12, 'Nomcon' => 13, 'Dircon' => 14, 'Semdia' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (FcprolicPeer::NROCON => 0, FcprolicPeer::FECREG => 1, FcprolicPeer::RIFCON => 2, FcprolicPeer::TIPPRO => 3, FcprolicPeer::DESPRO => 4, FcprolicPeer::DIRPRO => 5, FcprolicPeer::MONPRO => 6, FcprolicPeer::MONIMP => 7, FcprolicPeer::FUNREC => 8, FcprolicPeer::FECREC => 9, FcprolicPeer::RIFREP => 10, FcprolicPeer::STAPRO => 11, FcprolicPeer::STADEC => 12, FcprolicPeer::NOMCON => 13, FcprolicPeer::DIRCON => 14, FcprolicPeer::SEMDIA => 15, FcprolicPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('nrocon' => 0, 'fecreg' => 1, 'rifcon' => 2, 'tippro' => 3, 'despro' => 4, 'dirpro' => 5, 'monpro' => 6, 'monimp' => 7, 'funrec' => 8, 'fecrec' => 9, 'rifrep' => 10, 'stapro' => 11, 'stadec' => 12, 'nomcon' => 13, 'dircon' => 14, 'semdia' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcprolicMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcprolicMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcprolicPeer::getTableMap();
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
		return str_replace(FcprolicPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcprolicPeer::NROCON);

		$criteria->addSelectColumn(FcprolicPeer::FECREG);

		$criteria->addSelectColumn(FcprolicPeer::RIFCON);

		$criteria->addSelectColumn(FcprolicPeer::TIPPRO);

		$criteria->addSelectColumn(FcprolicPeer::DESPRO);

		$criteria->addSelectColumn(FcprolicPeer::DIRPRO);

		$criteria->addSelectColumn(FcprolicPeer::MONPRO);

		$criteria->addSelectColumn(FcprolicPeer::MONIMP);

		$criteria->addSelectColumn(FcprolicPeer::FUNREC);

		$criteria->addSelectColumn(FcprolicPeer::FECREC);

		$criteria->addSelectColumn(FcprolicPeer::RIFREP);

		$criteria->addSelectColumn(FcprolicPeer::STAPRO);

		$criteria->addSelectColumn(FcprolicPeer::STADEC);

		$criteria->addSelectColumn(FcprolicPeer::NOMCON);

		$criteria->addSelectColumn(FcprolicPeer::DIRCON);

		$criteria->addSelectColumn(FcprolicPeer::SEMDIA);

		$criteria->addSelectColumn(FcprolicPeer::ID);

	}

	const COUNT = 'COUNT(fcprolic.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcprolic.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcprolicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcprolicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcprolicPeer::doSelectRS($criteria, $con);
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
		$objects = FcprolicPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcprolicPeer::populateObjects(FcprolicPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcprolicPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcprolicPeer::getOMClass();
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
		return FcprolicPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcprolicPeer::ID);
			$selectCriteria->add(FcprolicPeer::ID, $criteria->remove(FcprolicPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcprolicPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcprolicPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcprolic) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcprolicPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcprolic $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcprolicPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcprolicPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcprolicPeer::DATABASE_NAME, FcprolicPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcprolicPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcprolicPeer::DATABASE_NAME);

		$criteria->add(FcprolicPeer::ID, $pk);


		$v = FcprolicPeer::doSelect($criteria, $con);

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
			$criteria->add(FcprolicPeer::ID, $pks, Criteria::IN);
			$objs = FcprolicPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcprolicPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcprolicMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcprolicMapBuilder');
}
