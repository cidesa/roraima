<?php


abstract class BaseFcdecpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcdecpag';

	
	const CLASS_DEFAULT = 'lib.model.Fcdecpag';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPAG = 'fcdecpag.NUMPAG';

	
	const NUMDEC = 'fcdecpag.NUMDEC';

	
	const NUMREF = 'fcdecpag.NUMREF';

	
	const FECVEN = 'fcdecpag.FECVEN';

	
	const MONDEC = 'fcdecpag.MONDEC';

	
	const NUMERO = 'fcdecpag.NUMERO';

	
	const FUEING = 'fcdecpag.FUEING';

	
	const MONPAG = 'fcdecpag.MONPAG';

	
	const ID = 'fcdecpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpag', 'Numdec', 'Numref', 'Fecven', 'Mondec', 'Numero', 'Fueing', 'Monpag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcdecpagPeer::NUMPAG, FcdecpagPeer::NUMDEC, FcdecpagPeer::NUMREF, FcdecpagPeer::FECVEN, FcdecpagPeer::MONDEC, FcdecpagPeer::NUMERO, FcdecpagPeer::FUEING, FcdecpagPeer::MONPAG, FcdecpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpag', 'numdec', 'numref', 'fecven', 'mondec', 'numero', 'fueing', 'monpag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpag' => 0, 'Numdec' => 1, 'Numref' => 2, 'Fecven' => 3, 'Mondec' => 4, 'Numero' => 5, 'Fueing' => 6, 'Monpag' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (FcdecpagPeer::NUMPAG => 0, FcdecpagPeer::NUMDEC => 1, FcdecpagPeer::NUMREF => 2, FcdecpagPeer::FECVEN => 3, FcdecpagPeer::MONDEC => 4, FcdecpagPeer::NUMERO => 5, FcdecpagPeer::FUEING => 6, FcdecpagPeer::MONPAG => 7, FcdecpagPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('numpag' => 0, 'numdec' => 1, 'numref' => 2, 'fecven' => 3, 'mondec' => 4, 'numero' => 5, 'fueing' => 6, 'monpag' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcdecpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcdecpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcdecpagPeer::getTableMap();
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
		return str_replace(FcdecpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcdecpagPeer::NUMPAG);

		$criteria->addSelectColumn(FcdecpagPeer::NUMDEC);

		$criteria->addSelectColumn(FcdecpagPeer::NUMREF);

		$criteria->addSelectColumn(FcdecpagPeer::FECVEN);

		$criteria->addSelectColumn(FcdecpagPeer::MONDEC);

		$criteria->addSelectColumn(FcdecpagPeer::NUMERO);

		$criteria->addSelectColumn(FcdecpagPeer::FUEING);

		$criteria->addSelectColumn(FcdecpagPeer::MONPAG);

		$criteria->addSelectColumn(FcdecpagPeer::ID);

	}

	const COUNT = 'COUNT(fcdecpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcdecpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdecpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdecpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcdecpagPeer::doSelectRS($criteria, $con);
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
		$objects = FcdecpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcdecpagPeer::populateObjects(FcdecpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcdecpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcdecpagPeer::getOMClass();
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
		return FcdecpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcdecpagPeer::ID); 

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
			$comparison = $criteria->getComparison(FcdecpagPeer::ID);
			$selectCriteria->add(FcdecpagPeer::ID, $criteria->remove(FcdecpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcdecpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcdecpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcdecpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcdecpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcdecpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcdecpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcdecpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcdecpagPeer::DATABASE_NAME, FcdecpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcdecpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcdecpagPeer::DATABASE_NAME);

		$criteria->add(FcdecpagPeer::ID, $pk);


		$v = FcdecpagPeer::doSelect($criteria, $con);

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
			$criteria->add(FcdecpagPeer::ID, $pks, Criteria::IN);
			$objs = FcdecpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcdecpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcdecpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcdecpagMapBuilder');
}
