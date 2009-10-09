<?php


abstract class BaseFaartpedPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'faartped';

	
	const CLASS_DEFAULT = 'lib.model.Faartped';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROPED = 'faartped.NROPED';

	
	const CODART = 'faartped.CODART';

	
	const CANORD = 'faartped.CANORD';

	
	const CANAJU = 'faartped.CANAJU';

	
	const CANDES = 'faartped.CANDES';

	
	const CANTOT = 'faartped.CANTOT';

	
	const PREART = 'faartped.PREART';

	
	const MONDESC = 'faartped.MONDESC';

	
	const MONRGO = 'faartped.MONRGO';

	
	const TOTART = 'faartped.TOTART';

	
	const ID = 'faartped.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nroped', 'Codart', 'Canord', 'Canaju', 'Candes', 'Cantot', 'Preart', 'Mondesc', 'Monrgo', 'Totart', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaartpedPeer::NROPED, FaartpedPeer::CODART, FaartpedPeer::CANORD, FaartpedPeer::CANAJU, FaartpedPeer::CANDES, FaartpedPeer::CANTOT, FaartpedPeer::PREART, FaartpedPeer::MONDESC, FaartpedPeer::MONRGO, FaartpedPeer::TOTART, FaartpedPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nroped', 'codart', 'canord', 'canaju', 'candes', 'cantot', 'preart', 'mondesc', 'monrgo', 'totart', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nroped' => 0, 'Codart' => 1, 'Canord' => 2, 'Canaju' => 3, 'Candes' => 4, 'Cantot' => 5, 'Preart' => 6, 'Mondesc' => 7, 'Monrgo' => 8, 'Totart' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (FaartpedPeer::NROPED => 0, FaartpedPeer::CODART => 1, FaartpedPeer::CANORD => 2, FaartpedPeer::CANAJU => 3, FaartpedPeer::CANDES => 4, FaartpedPeer::CANTOT => 5, FaartpedPeer::PREART => 6, FaartpedPeer::MONDESC => 7, FaartpedPeer::MONRGO => 8, FaartpedPeer::TOTART => 9, FaartpedPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('nroped' => 0, 'codart' => 1, 'canord' => 2, 'canaju' => 3, 'candes' => 4, 'cantot' => 5, 'preart' => 6, 'mondesc' => 7, 'monrgo' => 8, 'totart' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FaartpedMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FaartpedMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaartpedPeer::getTableMap();
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
		return str_replace(FaartpedPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaartpedPeer::NROPED);

		$criteria->addSelectColumn(FaartpedPeer::CODART);

		$criteria->addSelectColumn(FaartpedPeer::CANORD);

		$criteria->addSelectColumn(FaartpedPeer::CANAJU);

		$criteria->addSelectColumn(FaartpedPeer::CANDES);

		$criteria->addSelectColumn(FaartpedPeer::CANTOT);

		$criteria->addSelectColumn(FaartpedPeer::PREART);

		$criteria->addSelectColumn(FaartpedPeer::MONDESC);

		$criteria->addSelectColumn(FaartpedPeer::MONRGO);

		$criteria->addSelectColumn(FaartpedPeer::TOTART);

		$criteria->addSelectColumn(FaartpedPeer::ID);

	}

	const COUNT = 'COUNT(faartped.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faartped.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaartpedPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaartpedPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaartpedPeer::doSelectRS($criteria, $con);
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
		$objects = FaartpedPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaartpedPeer::populateObjects(FaartpedPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaartpedPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaartpedPeer::getOMClass();
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
		return FaartpedPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaartpedPeer::ID); 

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
			$comparison = $criteria->getComparison(FaartpedPeer::ID);
			$selectCriteria->add(FaartpedPeer::ID, $criteria->remove(FaartpedPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaartpedPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaartpedPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faartped) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaartpedPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Faartped $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaartpedPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaartpedPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaartpedPeer::DATABASE_NAME, FaartpedPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaartpedPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaartpedPeer::DATABASE_NAME);

		$criteria->add(FaartpedPeer::ID, $pk);


		$v = FaartpedPeer::doSelect($criteria, $con);

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
			$criteria->add(FaartpedPeer::ID, $pks, Criteria::IN);
			$objs = FaartpedPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaartpedPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FaartpedMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FaartpedMapBuilder');
}
