<?php


abstract class BaseFaartfacPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'faartfac';

	
	const CLASS_DEFAULT = 'lib.model.Faartfac';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFFAC = 'faartfac.REFFAC';

	
	const CODART = 'faartfac.CODART';

	
	const DESART = 'faartfac.DESART';

	
	const CODREF = 'faartfac.CODREF';

	
	const CANTOT = 'faartfac.CANTOT';

	
	const PRECIO = 'faartfac.PRECIO';

	
	const MONRGO = 'faartfac.MONRGO';

	
	const MONDES = 'faartfac.MONDES';

	
	const TOTART = 'faartfac.TOTART';

	
	const CANAJU = 'faartfac.CANAJU';

	
	const CANDES = 'faartfac.CANDES';

	
	const NRONOT = 'faartfac.NRONOT';

	
	const ID = 'faartfac.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reffac', 'Codart', 'Desart', 'Codref', 'Cantot', 'Precio', 'Monrgo', 'Mondes', 'Totart', 'Canaju', 'Candes', 'Nronot', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaartfacPeer::REFFAC, FaartfacPeer::CODART, FaartfacPeer::DESART, FaartfacPeer::CODREF, FaartfacPeer::CANTOT, FaartfacPeer::PRECIO, FaartfacPeer::MONRGO, FaartfacPeer::MONDES, FaartfacPeer::TOTART, FaartfacPeer::CANAJU, FaartfacPeer::CANDES, FaartfacPeer::NRONOT, FaartfacPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reffac', 'codart', 'desart', 'codref', 'cantot', 'precio', 'monrgo', 'mondes', 'totart', 'canaju', 'candes', 'nronot', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reffac' => 0, 'Codart' => 1, 'Desart' => 2, 'Codref' => 3, 'Cantot' => 4, 'Precio' => 5, 'Monrgo' => 6, 'Mondes' => 7, 'Totart' => 8, 'Canaju' => 9, 'Candes' => 10, 'Nronot' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (FaartfacPeer::REFFAC => 0, FaartfacPeer::CODART => 1, FaartfacPeer::DESART => 2, FaartfacPeer::CODREF => 3, FaartfacPeer::CANTOT => 4, FaartfacPeer::PRECIO => 5, FaartfacPeer::MONRGO => 6, FaartfacPeer::MONDES => 7, FaartfacPeer::TOTART => 8, FaartfacPeer::CANAJU => 9, FaartfacPeer::CANDES => 10, FaartfacPeer::NRONOT => 11, FaartfacPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('reffac' => 0, 'codart' => 1, 'desart' => 2, 'codref' => 3, 'cantot' => 4, 'precio' => 5, 'monrgo' => 6, 'mondes' => 7, 'totart' => 8, 'canaju' => 9, 'candes' => 10, 'nronot' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FaartfacMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FaartfacMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaartfacPeer::getTableMap();
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
		return str_replace(FaartfacPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaartfacPeer::REFFAC);

		$criteria->addSelectColumn(FaartfacPeer::CODART);

		$criteria->addSelectColumn(FaartfacPeer::DESART);

		$criteria->addSelectColumn(FaartfacPeer::CODREF);

		$criteria->addSelectColumn(FaartfacPeer::CANTOT);

		$criteria->addSelectColumn(FaartfacPeer::PRECIO);

		$criteria->addSelectColumn(FaartfacPeer::MONRGO);

		$criteria->addSelectColumn(FaartfacPeer::MONDES);

		$criteria->addSelectColumn(FaartfacPeer::TOTART);

		$criteria->addSelectColumn(FaartfacPeer::CANAJU);

		$criteria->addSelectColumn(FaartfacPeer::CANDES);

		$criteria->addSelectColumn(FaartfacPeer::NRONOT);

		$criteria->addSelectColumn(FaartfacPeer::ID);

	}

	const COUNT = 'COUNT(faartfac.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faartfac.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaartfacPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaartfacPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaartfacPeer::doSelectRS($criteria, $con);
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
		$objects = FaartfacPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaartfacPeer::populateObjects(FaartfacPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaartfacPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaartfacPeer::getOMClass();
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
		return FaartfacPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaartfacPeer::ID); 

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
			$comparison = $criteria->getComparison(FaartfacPeer::ID);
			$selectCriteria->add(FaartfacPeer::ID, $criteria->remove(FaartfacPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaartfacPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaartfacPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faartfac) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaartfacPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Faartfac $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaartfacPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaartfacPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaartfacPeer::DATABASE_NAME, FaartfacPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaartfacPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaartfacPeer::DATABASE_NAME);

		$criteria->add(FaartfacPeer::ID, $pk);


		$v = FaartfacPeer::doSelect($criteria, $con);

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
			$criteria->add(FaartfacPeer::ID, $pks, Criteria::IN);
			$objs = FaartfacPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaartfacPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FaartfacMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FaartfacMapBuilder');
}