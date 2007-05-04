<?php


abstract class BaseFcpagosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcpagos';

	
	const CLASS_DEFAULT = 'lib.model.Fcpagos';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPAG = 'fcpagos.NUMPAG';

	
	const FECPAG = 'fcpagos.FECPAG';

	
	const RIFCON = 'fcpagos.RIFCON';

	
	const DESPAG = 'fcpagos.DESPAG';

	
	const MONPAG = 'fcpagos.MONPAG';

	
	const MONEFE = 'fcpagos.MONEFE';

	
	const FUNPAG = 'fcpagos.FUNPAG';

	
	const CODREC = 'fcpagos.CODREC';

	
	const NUMPAGOLD = 'fcpagos.NUMPAGOLD';

	
	const EDOPAG = 'fcpagos.EDOPAG';

	
	const FECANU = 'fcpagos.FECANU';

	
	const MOTANU = 'fcpagos.MOTANU';

	
	const CEDANU = 'fcpagos.CEDANU';

	
	const ID = 'fcpagos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpag', 'Fecpag', 'Rifcon', 'Despag', 'Monpag', 'Monefe', 'Funpag', 'Codrec', 'Numpagold', 'Edopag', 'Fecanu', 'Motanu', 'Cedanu', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcpagosPeer::NUMPAG, FcpagosPeer::FECPAG, FcpagosPeer::RIFCON, FcpagosPeer::DESPAG, FcpagosPeer::MONPAG, FcpagosPeer::MONEFE, FcpagosPeer::FUNPAG, FcpagosPeer::CODREC, FcpagosPeer::NUMPAGOLD, FcpagosPeer::EDOPAG, FcpagosPeer::FECANU, FcpagosPeer::MOTANU, FcpagosPeer::CEDANU, FcpagosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpag', 'fecpag', 'rifcon', 'despag', 'monpag', 'monefe', 'funpag', 'codrec', 'numpagold', 'edopag', 'fecanu', 'motanu', 'cedanu', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpag' => 0, 'Fecpag' => 1, 'Rifcon' => 2, 'Despag' => 3, 'Monpag' => 4, 'Monefe' => 5, 'Funpag' => 6, 'Codrec' => 7, 'Numpagold' => 8, 'Edopag' => 9, 'Fecanu' => 10, 'Motanu' => 11, 'Cedanu' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (FcpagosPeer::NUMPAG => 0, FcpagosPeer::FECPAG => 1, FcpagosPeer::RIFCON => 2, FcpagosPeer::DESPAG => 3, FcpagosPeer::MONPAG => 4, FcpagosPeer::MONEFE => 5, FcpagosPeer::FUNPAG => 6, FcpagosPeer::CODREC => 7, FcpagosPeer::NUMPAGOLD => 8, FcpagosPeer::EDOPAG => 9, FcpagosPeer::FECANU => 10, FcpagosPeer::MOTANU => 11, FcpagosPeer::CEDANU => 12, FcpagosPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('numpag' => 0, 'fecpag' => 1, 'rifcon' => 2, 'despag' => 3, 'monpag' => 4, 'monefe' => 5, 'funpag' => 6, 'codrec' => 7, 'numpagold' => 8, 'edopag' => 9, 'fecanu' => 10, 'motanu' => 11, 'cedanu' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcpagosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcpagosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcpagosPeer::getTableMap();
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
		return str_replace(FcpagosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcpagosPeer::NUMPAG);

		$criteria->addSelectColumn(FcpagosPeer::FECPAG);

		$criteria->addSelectColumn(FcpagosPeer::RIFCON);

		$criteria->addSelectColumn(FcpagosPeer::DESPAG);

		$criteria->addSelectColumn(FcpagosPeer::MONPAG);

		$criteria->addSelectColumn(FcpagosPeer::MONEFE);

		$criteria->addSelectColumn(FcpagosPeer::FUNPAG);

		$criteria->addSelectColumn(FcpagosPeer::CODREC);

		$criteria->addSelectColumn(FcpagosPeer::NUMPAGOLD);

		$criteria->addSelectColumn(FcpagosPeer::EDOPAG);

		$criteria->addSelectColumn(FcpagosPeer::FECANU);

		$criteria->addSelectColumn(FcpagosPeer::MOTANU);

		$criteria->addSelectColumn(FcpagosPeer::CEDANU);

		$criteria->addSelectColumn(FcpagosPeer::ID);

	}

	const COUNT = 'COUNT(fcpagos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcpagos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcpagosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcpagosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcpagosPeer::doSelectRS($criteria, $con);
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
		$objects = FcpagosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcpagosPeer::populateObjects(FcpagosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcpagosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcpagosPeer::getOMClass();
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
		return FcpagosPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcpagosPeer::ID);
			$selectCriteria->add(FcpagosPeer::ID, $criteria->remove(FcpagosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcpagosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcpagosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcpagos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcpagosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcpagos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcpagosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcpagosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcpagosPeer::DATABASE_NAME, FcpagosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcpagosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcpagosPeer::DATABASE_NAME);

		$criteria->add(FcpagosPeer::ID, $pk);


		$v = FcpagosPeer::doSelect($criteria, $con);

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
			$criteria->add(FcpagosPeer::ID, $pks, Criteria::IN);
			$objs = FcpagosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcpagosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcpagosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcpagosMapBuilder');
}
