<?php


abstract class BaseFcmodapuPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcmodapu';

	
	const CLASS_DEFAULT = 'lib.model.Fcmodapu';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFMOD = 'fcmodapu.REFMOD';

	
	const NROCON = 'fcmodapu.NROCON';

	
	const FECMOD = 'fcmodapu.FECMOD';

	
	const TIPAPU = 'fcmodapu.TIPAPU';

	
	const DESAPU = 'fcmodapu.DESAPU';

	
	const MONAPU = 'fcmodapu.MONAPU';

	
	const MONIMP = 'fcmodapu.MONIMP';

	
	const TIPAPUANT = 'fcmodapu.TIPAPUANT';

	
	const DESAPUANT = 'fcmodapu.DESAPUANT';

	
	const MONAPUANT = 'fcmodapu.MONAPUANT';

	
	const MONIMPANT = 'fcmodapu.MONIMPANT';

	
	const FUNREC = 'fcmodapu.FUNREC';

	
	const ID = 'fcmodapu.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod', 'Nrocon', 'Fecmod', 'Tipapu', 'Desapu', 'Monapu', 'Monimp', 'Tipapuant', 'Desapuant', 'Monapuant', 'Monimpant', 'Funrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcmodapuPeer::REFMOD, FcmodapuPeer::NROCON, FcmodapuPeer::FECMOD, FcmodapuPeer::TIPAPU, FcmodapuPeer::DESAPU, FcmodapuPeer::MONAPU, FcmodapuPeer::MONIMP, FcmodapuPeer::TIPAPUANT, FcmodapuPeer::DESAPUANT, FcmodapuPeer::MONAPUANT, FcmodapuPeer::MONIMPANT, FcmodapuPeer::FUNREC, FcmodapuPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod', 'nrocon', 'fecmod', 'tipapu', 'desapu', 'monapu', 'monimp', 'tipapuant', 'desapuant', 'monapuant', 'monimpant', 'funrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod' => 0, 'Nrocon' => 1, 'Fecmod' => 2, 'Tipapu' => 3, 'Desapu' => 4, 'Monapu' => 5, 'Monimp' => 6, 'Tipapuant' => 7, 'Desapuant' => 8, 'Monapuant' => 9, 'Monimpant' => 10, 'Funrec' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (FcmodapuPeer::REFMOD => 0, FcmodapuPeer::NROCON => 1, FcmodapuPeer::FECMOD => 2, FcmodapuPeer::TIPAPU => 3, FcmodapuPeer::DESAPU => 4, FcmodapuPeer::MONAPU => 5, FcmodapuPeer::MONIMP => 6, FcmodapuPeer::TIPAPUANT => 7, FcmodapuPeer::DESAPUANT => 8, FcmodapuPeer::MONAPUANT => 9, FcmodapuPeer::MONIMPANT => 10, FcmodapuPeer::FUNREC => 11, FcmodapuPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod' => 0, 'nrocon' => 1, 'fecmod' => 2, 'tipapu' => 3, 'desapu' => 4, 'monapu' => 5, 'monimp' => 6, 'tipapuant' => 7, 'desapuant' => 8, 'monapuant' => 9, 'monimpant' => 10, 'funrec' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcmodapuMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcmodapuMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcmodapuPeer::getTableMap();
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
		return str_replace(FcmodapuPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcmodapuPeer::REFMOD);

		$criteria->addSelectColumn(FcmodapuPeer::NROCON);

		$criteria->addSelectColumn(FcmodapuPeer::FECMOD);

		$criteria->addSelectColumn(FcmodapuPeer::TIPAPU);

		$criteria->addSelectColumn(FcmodapuPeer::DESAPU);

		$criteria->addSelectColumn(FcmodapuPeer::MONAPU);

		$criteria->addSelectColumn(FcmodapuPeer::MONIMP);

		$criteria->addSelectColumn(FcmodapuPeer::TIPAPUANT);

		$criteria->addSelectColumn(FcmodapuPeer::DESAPUANT);

		$criteria->addSelectColumn(FcmodapuPeer::MONAPUANT);

		$criteria->addSelectColumn(FcmodapuPeer::MONIMPANT);

		$criteria->addSelectColumn(FcmodapuPeer::FUNREC);

		$criteria->addSelectColumn(FcmodapuPeer::ID);

	}

	const COUNT = 'COUNT(fcmodapu.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcmodapu.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcmodapuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcmodapuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcmodapuPeer::doSelectRS($criteria, $con);
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
		$objects = FcmodapuPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcmodapuPeer::populateObjects(FcmodapuPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcmodapuPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcmodapuPeer::getOMClass();
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
		return FcmodapuPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcmodapuPeer::ID); 

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
			$comparison = $criteria->getComparison(FcmodapuPeer::ID);
			$selectCriteria->add(FcmodapuPeer::ID, $criteria->remove(FcmodapuPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcmodapuPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcmodapuPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcmodapu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcmodapuPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcmodapu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcmodapuPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcmodapuPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcmodapuPeer::DATABASE_NAME, FcmodapuPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcmodapuPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcmodapuPeer::DATABASE_NAME);

		$criteria->add(FcmodapuPeer::ID, $pk);


		$v = FcmodapuPeer::doSelect($criteria, $con);

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
			$criteria->add(FcmodapuPeer::ID, $pks, Criteria::IN);
			$objs = FcmodapuPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcmodapuPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcmodapuMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcmodapuMapBuilder');
}
