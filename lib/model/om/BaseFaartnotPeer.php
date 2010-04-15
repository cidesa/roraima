<?php


abstract class BaseFaartnotPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'faartnot';

	
	const CLASS_DEFAULT = 'lib.model.Faartnot';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NRONOT = 'faartnot.NRONOT';

	
	const CODART = 'faartnot.CODART';

	
	const CODALM = 'faartnot.CODALM';

	
	const NUMLOT = 'faartnot.NUMLOT';

	
	const CANSOL = 'faartnot.CANSOL';

	
	const CANENT = 'faartnot.CANENT';

	
	const CANDES = 'faartnot.CANDES';

	
	const CANAJU = 'faartnot.CANAJU';

	
	const CANDEV = 'faartnot.CANDEV';

	
	const CANTOT = 'faartnot.CANTOT';

	
	const PREART = 'faartnot.PREART';

	
	const MONDES = 'faartnot.MONDES';

	
	const MONRGO = 'faartnot.MONRGO';

	
	const TOTART = 'faartnot.TOTART';

	
	const ID = 'faartnot.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nronot', 'Codart', 'Codalm', 'Numlot', 'Cansol', 'Canent', 'Candes', 'Canaju', 'Candev', 'Cantot', 'Preart', 'Mondes', 'Monrgo', 'Totart', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaartnotPeer::NRONOT, FaartnotPeer::CODART, FaartnotPeer::CODALM, FaartnotPeer::NUMLOT, FaartnotPeer::CANSOL, FaartnotPeer::CANENT, FaartnotPeer::CANDES, FaartnotPeer::CANAJU, FaartnotPeer::CANDEV, FaartnotPeer::CANTOT, FaartnotPeer::PREART, FaartnotPeer::MONDES, FaartnotPeer::MONRGO, FaartnotPeer::TOTART, FaartnotPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nronot', 'codart', 'codalm', 'numlot', 'cansol', 'canent', 'candes', 'canaju', 'candev', 'cantot', 'preart', 'mondes', 'monrgo', 'totart', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nronot' => 0, 'Codart' => 1, 'Codalm' => 2, 'Numlot' => 3, 'Cansol' => 4, 'Canent' => 5, 'Candes' => 6, 'Canaju' => 7, 'Candev' => 8, 'Cantot' => 9, 'Preart' => 10, 'Mondes' => 11, 'Monrgo' => 12, 'Totart' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (FaartnotPeer::NRONOT => 0, FaartnotPeer::CODART => 1, FaartnotPeer::CODALM => 2, FaartnotPeer::NUMLOT => 3, FaartnotPeer::CANSOL => 4, FaartnotPeer::CANENT => 5, FaartnotPeer::CANDES => 6, FaartnotPeer::CANAJU => 7, FaartnotPeer::CANDEV => 8, FaartnotPeer::CANTOT => 9, FaartnotPeer::PREART => 10, FaartnotPeer::MONDES => 11, FaartnotPeer::MONRGO => 12, FaartnotPeer::TOTART => 13, FaartnotPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('nronot' => 0, 'codart' => 1, 'codalm' => 2, 'numlot' => 3, 'cansol' => 4, 'canent' => 5, 'candes' => 6, 'canaju' => 7, 'candev' => 8, 'cantot' => 9, 'preart' => 10, 'mondes' => 11, 'monrgo' => 12, 'totart' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FaartnotMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FaartnotMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaartnotPeer::getTableMap();
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
		return str_replace(FaartnotPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaartnotPeer::NRONOT);

		$criteria->addSelectColumn(FaartnotPeer::CODART);

		$criteria->addSelectColumn(FaartnotPeer::CODALM);

		$criteria->addSelectColumn(FaartnotPeer::NUMLOT);

		$criteria->addSelectColumn(FaartnotPeer::CANSOL);

		$criteria->addSelectColumn(FaartnotPeer::CANENT);

		$criteria->addSelectColumn(FaartnotPeer::CANDES);

		$criteria->addSelectColumn(FaartnotPeer::CANAJU);

		$criteria->addSelectColumn(FaartnotPeer::CANDEV);

		$criteria->addSelectColumn(FaartnotPeer::CANTOT);

		$criteria->addSelectColumn(FaartnotPeer::PREART);

		$criteria->addSelectColumn(FaartnotPeer::MONDES);

		$criteria->addSelectColumn(FaartnotPeer::MONRGO);

		$criteria->addSelectColumn(FaartnotPeer::TOTART);

		$criteria->addSelectColumn(FaartnotPeer::ID);

	}

	const COUNT = 'COUNT(faartnot.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faartnot.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaartnotPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaartnotPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaartnotPeer::doSelectRS($criteria, $con);
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
		$objects = FaartnotPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaartnotPeer::populateObjects(FaartnotPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaartnotPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaartnotPeer::getOMClass();
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
		return FaartnotPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaartnotPeer::ID); 

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
			$comparison = $criteria->getComparison(FaartnotPeer::ID);
			$selectCriteria->add(FaartnotPeer::ID, $criteria->remove(FaartnotPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaartnotPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaartnotPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faartnot) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaartnotPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Faartnot $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaartnotPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaartnotPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaartnotPeer::DATABASE_NAME, FaartnotPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaartnotPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaartnotPeer::DATABASE_NAME);

		$criteria->add(FaartnotPeer::ID, $pk);


		$v = FaartnotPeer::doSelect($criteria, $con);

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
			$criteria->add(FaartnotPeer::ID, $pks, Criteria::IN);
			$objs = FaartnotPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaartnotPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FaartnotMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FaartnotMapBuilder');
}
