<?php


abstract class BaseFaconpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'faconpag';

	
	const CLASS_DEFAULT = 'lib.model.Faconpag';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DESCONPAG = 'faconpag.DESCONPAG';

	
	const TIPCONPAG = 'faconpag.TIPCONPAG';

	
	const NUMDIA = 'faconpag.NUMDIA';

	
	const GENERAOP = 'faconpag.GENERAOP';

	
	const ASIPARREC = 'faconpag.ASIPARREC';

	
	const GENERACOM = 'faconpag.GENERACOM';

	
	const MERCON = 'faconpag.MERCON';

	
	const CTADEV = 'faconpag.CTADEV';

	
	const CTAVCO = 'faconpag.CTAVCO';

	
	const UNIVTA = 'faconpag.UNIVTA';

	
	const ID = 'faconpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Desconpag', 'Tipconpag', 'Numdia', 'Generaop', 'Asiparrec', 'Generacom', 'Mercon', 'Ctadev', 'Ctavco', 'Univta', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaconpagPeer::DESCONPAG, FaconpagPeer::TIPCONPAG, FaconpagPeer::NUMDIA, FaconpagPeer::GENERAOP, FaconpagPeer::ASIPARREC, FaconpagPeer::GENERACOM, FaconpagPeer::MERCON, FaconpagPeer::CTADEV, FaconpagPeer::CTAVCO, FaconpagPeer::UNIVTA, FaconpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('desconpag', 'tipconpag', 'numdia', 'generaop', 'asiparrec', 'generacom', 'mercon', 'ctadev', 'ctavco', 'univta', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Desconpag' => 0, 'Tipconpag' => 1, 'Numdia' => 2, 'Generaop' => 3, 'Asiparrec' => 4, 'Generacom' => 5, 'Mercon' => 6, 'Ctadev' => 7, 'Ctavco' => 8, 'Univta' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (FaconpagPeer::DESCONPAG => 0, FaconpagPeer::TIPCONPAG => 1, FaconpagPeer::NUMDIA => 2, FaconpagPeer::GENERAOP => 3, FaconpagPeer::ASIPARREC => 4, FaconpagPeer::GENERACOM => 5, FaconpagPeer::MERCON => 6, FaconpagPeer::CTADEV => 7, FaconpagPeer::CTAVCO => 8, FaconpagPeer::UNIVTA => 9, FaconpagPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('desconpag' => 0, 'tipconpag' => 1, 'numdia' => 2, 'generaop' => 3, 'asiparrec' => 4, 'generacom' => 5, 'mercon' => 6, 'ctadev' => 7, 'ctavco' => 8, 'univta' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FaconpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FaconpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaconpagPeer::getTableMap();
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
		return str_replace(FaconpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaconpagPeer::DESCONPAG);

		$criteria->addSelectColumn(FaconpagPeer::TIPCONPAG);

		$criteria->addSelectColumn(FaconpagPeer::NUMDIA);

		$criteria->addSelectColumn(FaconpagPeer::GENERAOP);

		$criteria->addSelectColumn(FaconpagPeer::ASIPARREC);

		$criteria->addSelectColumn(FaconpagPeer::GENERACOM);

		$criteria->addSelectColumn(FaconpagPeer::MERCON);

		$criteria->addSelectColumn(FaconpagPeer::CTADEV);

		$criteria->addSelectColumn(FaconpagPeer::CTAVCO);

		$criteria->addSelectColumn(FaconpagPeer::UNIVTA);

		$criteria->addSelectColumn(FaconpagPeer::ID);

	}

	const COUNT = 'COUNT(faconpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faconpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaconpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaconpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaconpagPeer::doSelectRS($criteria, $con);
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
		$objects = FaconpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaconpagPeer::populateObjects(FaconpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaconpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaconpagPeer::getOMClass();
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
		return FaconpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaconpagPeer::ID); 

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
			$comparison = $criteria->getComparison(FaconpagPeer::ID);
			$selectCriteria->add(FaconpagPeer::ID, $criteria->remove(FaconpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaconpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaconpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faconpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaconpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Faconpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaconpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaconpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaconpagPeer::DATABASE_NAME, FaconpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaconpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaconpagPeer::DATABASE_NAME);

		$criteria->add(FaconpagPeer::ID, $pk);


		$v = FaconpagPeer::doSelect($criteria, $con);

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
			$criteria->add(FaconpagPeer::ID, $pks, Criteria::IN);
			$objs = FaconpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaconpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FaconpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FaconpagMapBuilder');
}
