<?php


abstract class BaseBnsegsemPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bnsegsem';

	
	const CLASS_DEFAULT = 'lib.model.Bnsegsem';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bnsegsem.CODACT';

	
	const CODSEM = 'bnsegsem.CODSEM';

	
	const NROSEGSEM = 'bnsegsem.NROSEGSEM';

	
	const FECSEGSEM = 'bnsegsem.FECSEGSEM';

	
	const NOMSEGSEM = 'bnsegsem.NOMSEGSEM';

	
	const COBSEGSEM = 'bnsegsem.COBSEGSEM';

	
	const MONSEGSEM = 'bnsegsem.MONSEGSEM';

	
	const FECSEGVEN = 'bnsegsem.FECSEGVEN';

	
	const PROSEGSEM = 'bnsegsem.PROSEGSEM';

	
	const OBSSEGSEM = 'bnsegsem.OBSSEGSEM';

	
	const STASEGSEM = 'bnsegsem.STASEGSEM';

	
	const ID = 'bnsegsem.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codsem', 'Nrosegsem', 'Fecsegsem', 'Nomsegsem', 'Cobsegsem', 'Monsegsem', 'Fecsegven', 'Prosegsem', 'Obssegsem', 'Stasegsem', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BnsegsemPeer::CODACT, BnsegsemPeer::CODSEM, BnsegsemPeer::NROSEGSEM, BnsegsemPeer::FECSEGSEM, BnsegsemPeer::NOMSEGSEM, BnsegsemPeer::COBSEGSEM, BnsegsemPeer::MONSEGSEM, BnsegsemPeer::FECSEGVEN, BnsegsemPeer::PROSEGSEM, BnsegsemPeer::OBSSEGSEM, BnsegsemPeer::STASEGSEM, BnsegsemPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codsem', 'nrosegsem', 'fecsegsem', 'nomsegsem', 'cobsegsem', 'monsegsem', 'fecsegven', 'prosegsem', 'obssegsem', 'stasegsem', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codsem' => 1, 'Nrosegsem' => 2, 'Fecsegsem' => 3, 'Nomsegsem' => 4, 'Cobsegsem' => 5, 'Monsegsem' => 6, 'Fecsegven' => 7, 'Prosegsem' => 8, 'Obssegsem' => 9, 'Stasegsem' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (BnsegsemPeer::CODACT => 0, BnsegsemPeer::CODSEM => 1, BnsegsemPeer::NROSEGSEM => 2, BnsegsemPeer::FECSEGSEM => 3, BnsegsemPeer::NOMSEGSEM => 4, BnsegsemPeer::COBSEGSEM => 5, BnsegsemPeer::MONSEGSEM => 6, BnsegsemPeer::FECSEGVEN => 7, BnsegsemPeer::PROSEGSEM => 8, BnsegsemPeer::OBSSEGSEM => 9, BnsegsemPeer::STASEGSEM => 10, BnsegsemPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codsem' => 1, 'nrosegsem' => 2, 'fecsegsem' => 3, 'nomsegsem' => 4, 'cobsegsem' => 5, 'monsegsem' => 6, 'fecsegven' => 7, 'prosegsem' => 8, 'obssegsem' => 9, 'stasegsem' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BnsegsemMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BnsegsemMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BnsegsemPeer::getTableMap();
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
		return str_replace(BnsegsemPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BnsegsemPeer::CODACT);

		$criteria->addSelectColumn(BnsegsemPeer::CODSEM);

		$criteria->addSelectColumn(BnsegsemPeer::NROSEGSEM);

		$criteria->addSelectColumn(BnsegsemPeer::FECSEGSEM);

		$criteria->addSelectColumn(BnsegsemPeer::NOMSEGSEM);

		$criteria->addSelectColumn(BnsegsemPeer::COBSEGSEM);

		$criteria->addSelectColumn(BnsegsemPeer::MONSEGSEM);

		$criteria->addSelectColumn(BnsegsemPeer::FECSEGVEN);

		$criteria->addSelectColumn(BnsegsemPeer::PROSEGSEM);

		$criteria->addSelectColumn(BnsegsemPeer::OBSSEGSEM);

		$criteria->addSelectColumn(BnsegsemPeer::STASEGSEM);

		$criteria->addSelectColumn(BnsegsemPeer::ID);

	}

	const COUNT = 'COUNT(bnsegsem.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bnsegsem.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BnsegsemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BnsegsemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BnsegsemPeer::doSelectRS($criteria, $con);
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
		$objects = BnsegsemPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BnsegsemPeer::populateObjects(BnsegsemPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BnsegsemPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BnsegsemPeer::getOMClass();
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
		return BnsegsemPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BnsegsemPeer::ID); 

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
			$comparison = $criteria->getComparison(BnsegsemPeer::ID);
			$selectCriteria->add(BnsegsemPeer::ID, $criteria->remove(BnsegsemPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BnsegsemPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BnsegsemPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bnsegsem) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BnsegsemPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bnsegsem $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BnsegsemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BnsegsemPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BnsegsemPeer::DATABASE_NAME, BnsegsemPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BnsegsemPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BnsegsemPeer::DATABASE_NAME);

		$criteria->add(BnsegsemPeer::ID, $pk);


		$v = BnsegsemPeer::doSelect($criteria, $con);

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
			$criteria->add(BnsegsemPeer::ID, $pks, Criteria::IN);
			$objs = BnsegsemPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBnsegsemPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BnsegsemMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BnsegsemMapBuilder');
}
