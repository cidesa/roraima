<?php


abstract class BaseCaartaocPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caartaoc';

	
	const CLASS_DEFAULT = 'lib.model.Caartaoc';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const AJUOC = 'caartaoc.AJUOC';

	
	const CODART = 'caartaoc.CODART';

	
	const CODCAT = 'caartaoc.CODCAT';

	
	const CANORD = 'caartaoc.CANORD';

	
	const CANAJU = 'caartaoc.CANAJU';

	
	const MONTOT = 'caartaoc.MONTOT';

	
	const MONRGO = 'caartaoc.MONRGO';

	
	const MONAJU = 'caartaoc.MONAJU';

	
	const MONREC = 'caartaoc.MONREC';

	
	const ID = 'caartaoc.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Ajuoc', 'Codart', 'Codcat', 'Canord', 'Canaju', 'Montot', 'Monrgo', 'Monaju', 'Monrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaartaocPeer::AJUOC, CaartaocPeer::CODART, CaartaocPeer::CODCAT, CaartaocPeer::CANORD, CaartaocPeer::CANAJU, CaartaocPeer::MONTOT, CaartaocPeer::MONRGO, CaartaocPeer::MONAJU, CaartaocPeer::MONREC, CaartaocPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ajuoc', 'codart', 'codcat', 'canord', 'canaju', 'montot', 'monrgo', 'monaju', 'monrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Ajuoc' => 0, 'Codart' => 1, 'Codcat' => 2, 'Canord' => 3, 'Canaju' => 4, 'Montot' => 5, 'Monrgo' => 6, 'Monaju' => 7, 'Monrec' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (CaartaocPeer::AJUOC => 0, CaartaocPeer::CODART => 1, CaartaocPeer::CODCAT => 2, CaartaocPeer::CANORD => 3, CaartaocPeer::CANAJU => 4, CaartaocPeer::MONTOT => 5, CaartaocPeer::MONRGO => 6, CaartaocPeer::MONAJU => 7, CaartaocPeer::MONREC => 8, CaartaocPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('ajuoc' => 0, 'codart' => 1, 'codcat' => 2, 'canord' => 3, 'canaju' => 4, 'montot' => 5, 'monrgo' => 6, 'monaju' => 7, 'monrec' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaartaocMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaartaocMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaartaocPeer::getTableMap();
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
		return str_replace(CaartaocPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaartaocPeer::AJUOC);

		$criteria->addSelectColumn(CaartaocPeer::CODART);

		$criteria->addSelectColumn(CaartaocPeer::CODCAT);

		$criteria->addSelectColumn(CaartaocPeer::CANORD);

		$criteria->addSelectColumn(CaartaocPeer::CANAJU);

		$criteria->addSelectColumn(CaartaocPeer::MONTOT);

		$criteria->addSelectColumn(CaartaocPeer::MONRGO);

		$criteria->addSelectColumn(CaartaocPeer::MONAJU);

		$criteria->addSelectColumn(CaartaocPeer::MONREC);

		$criteria->addSelectColumn(CaartaocPeer::ID);

	}

	const COUNT = 'COUNT(caartaoc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caartaoc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaartaocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaartaocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaartaocPeer::doSelectRS($criteria, $con);
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
		$objects = CaartaocPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaartaocPeer::populateObjects(CaartaocPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaartaocPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaartaocPeer::getOMClass();
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
		return CaartaocPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaartaocPeer::ID); 

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
			$comparison = $criteria->getComparison(CaartaocPeer::ID);
			$selectCriteria->add(CaartaocPeer::ID, $criteria->remove(CaartaocPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaartaocPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaartaocPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caartaoc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaartaocPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caartaoc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaartaocPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaartaocPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaartaocPeer::DATABASE_NAME, CaartaocPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaartaocPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaartaocPeer::DATABASE_NAME);

		$criteria->add(CaartaocPeer::ID, $pk);


		$v = CaartaocPeer::doSelect($criteria, $con);

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
			$criteria->add(CaartaocPeer::ID, $pks, Criteria::IN);
			$objs = CaartaocPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaartaocPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaartaocMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaartaocMapBuilder');
}
