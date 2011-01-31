<?php


abstract class BaseCaconpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caconpag';

	
	const CLASS_DEFAULT = 'lib.model.Caconpag';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCONPAG = 'caconpag.CODCONPAG';

	
	const DESCONPAG = 'caconpag.DESCONPAG';

	
	const TIPCONPAG = 'caconpag.TIPCONPAG';

	
	const NUMDIA = 'caconpag.NUMDIA';

	
	const GENERAOP = 'caconpag.GENERAOP';

	
	const ASIPARREC = 'caconpag.ASIPARREC';

	
	const GENERACOM = 'caconpag.GENERACOM';

	
	const MERCON = 'caconpag.MERCON';

	
	const CTADEV = 'caconpag.CTADEV';

	
	const CTAVCO = 'caconpag.CTAVCO';

	
	const UNIVTA = 'caconpag.UNIVTA';

	
	const ID = 'caconpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codconpag', 'Desconpag', 'Tipconpag', 'Numdia', 'Generaop', 'Asiparrec', 'Generacom', 'Mercon', 'Ctadev', 'Ctavco', 'Univta', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaconpagPeer::CODCONPAG, CaconpagPeer::DESCONPAG, CaconpagPeer::TIPCONPAG, CaconpagPeer::NUMDIA, CaconpagPeer::GENERAOP, CaconpagPeer::ASIPARREC, CaconpagPeer::GENERACOM, CaconpagPeer::MERCON, CaconpagPeer::CTADEV, CaconpagPeer::CTAVCO, CaconpagPeer::UNIVTA, CaconpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codconpag', 'desconpag', 'tipconpag', 'numdia', 'generaop', 'asiparrec', 'generacom', 'mercon', 'ctadev', 'ctavco', 'univta', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codconpag' => 0, 'Desconpag' => 1, 'Tipconpag' => 2, 'Numdia' => 3, 'Generaop' => 4, 'Asiparrec' => 5, 'Generacom' => 6, 'Mercon' => 7, 'Ctadev' => 8, 'Ctavco' => 9, 'Univta' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (CaconpagPeer::CODCONPAG => 0, CaconpagPeer::DESCONPAG => 1, CaconpagPeer::TIPCONPAG => 2, CaconpagPeer::NUMDIA => 3, CaconpagPeer::GENERAOP => 4, CaconpagPeer::ASIPARREC => 5, CaconpagPeer::GENERACOM => 6, CaconpagPeer::MERCON => 7, CaconpagPeer::CTADEV => 8, CaconpagPeer::CTAVCO => 9, CaconpagPeer::UNIVTA => 10, CaconpagPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codconpag' => 0, 'desconpag' => 1, 'tipconpag' => 2, 'numdia' => 3, 'generaop' => 4, 'asiparrec' => 5, 'generacom' => 6, 'mercon' => 7, 'ctadev' => 8, 'ctavco' => 9, 'univta' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaconpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaconpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaconpagPeer::getTableMap();
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
		return str_replace(CaconpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaconpagPeer::CODCONPAG);

		$criteria->addSelectColumn(CaconpagPeer::DESCONPAG);

		$criteria->addSelectColumn(CaconpagPeer::TIPCONPAG);

		$criteria->addSelectColumn(CaconpagPeer::NUMDIA);

		$criteria->addSelectColumn(CaconpagPeer::GENERAOP);

		$criteria->addSelectColumn(CaconpagPeer::ASIPARREC);

		$criteria->addSelectColumn(CaconpagPeer::GENERACOM);

		$criteria->addSelectColumn(CaconpagPeer::MERCON);

		$criteria->addSelectColumn(CaconpagPeer::CTADEV);

		$criteria->addSelectColumn(CaconpagPeer::CTAVCO);

		$criteria->addSelectColumn(CaconpagPeer::UNIVTA);

		$criteria->addSelectColumn(CaconpagPeer::ID);

	}

	const COUNT = 'COUNT(caconpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caconpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaconpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaconpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaconpagPeer::doSelectRS($criteria, $con);
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
		$objects = CaconpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaconpagPeer::populateObjects(CaconpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaconpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaconpagPeer::getOMClass();
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
		return CaconpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaconpagPeer::ID); 

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
			$comparison = $criteria->getComparison(CaconpagPeer::ID);
			$selectCriteria->add(CaconpagPeer::ID, $criteria->remove(CaconpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaconpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaconpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caconpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaconpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caconpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaconpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaconpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaconpagPeer::DATABASE_NAME, CaconpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaconpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaconpagPeer::DATABASE_NAME);

		$criteria->add(CaconpagPeer::ID, $pk);


		$v = CaconpagPeer::doSelect($criteria, $con);

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
			$criteria->add(CaconpagPeer::ID, $pks, Criteria::IN);
			$objs = CaconpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaconpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaconpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaconpagMapBuilder');
}
