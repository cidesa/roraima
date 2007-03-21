<?php


abstract class BaseNpintfecrefPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npintfecref';

	
	const CLASS_DEFAULT = 'lib.model.Npintfecref';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FECINIREF = 'npintfecref.FECINIREF';

	
	const FECFINREF = 'npintfecref.FECFINREF';

	
	const TASINT = 'npintfecref.TASINT';

	
	const TASINTPRO = 'npintfecref.TASINTPRO';

	
	const TASINTPAS = 'npintfecref.TASINTPAS';

	
	const TASINTACT = 'npintfecref.TASINTACT';

	
	const ID = 'npintfecref.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Feciniref', 'Fecfinref', 'Tasint', 'Tasintpro', 'Tasintpas', 'Tasintact', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpintfecrefPeer::FECINIREF, NpintfecrefPeer::FECFINREF, NpintfecrefPeer::TASINT, NpintfecrefPeer::TASINTPRO, NpintfecrefPeer::TASINTPAS, NpintfecrefPeer::TASINTACT, NpintfecrefPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('feciniref', 'fecfinref', 'tasint', 'tasintpro', 'tasintpas', 'tasintact', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Feciniref' => 0, 'Fecfinref' => 1, 'Tasint' => 2, 'Tasintpro' => 3, 'Tasintpas' => 4, 'Tasintact' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (NpintfecrefPeer::FECINIREF => 0, NpintfecrefPeer::FECFINREF => 1, NpintfecrefPeer::TASINT => 2, NpintfecrefPeer::TASINTPRO => 3, NpintfecrefPeer::TASINTPAS => 4, NpintfecrefPeer::TASINTACT => 5, NpintfecrefPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('feciniref' => 0, 'fecfinref' => 1, 'tasint' => 2, 'tasintpro' => 3, 'tasintpas' => 4, 'tasintact' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpintfecrefMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpintfecrefMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpintfecrefPeer::getTableMap();
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
		return str_replace(NpintfecrefPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpintfecrefPeer::FECINIREF);

		$criteria->addSelectColumn(NpintfecrefPeer::FECFINREF);

		$criteria->addSelectColumn(NpintfecrefPeer::TASINT);

		$criteria->addSelectColumn(NpintfecrefPeer::TASINTPRO);

		$criteria->addSelectColumn(NpintfecrefPeer::TASINTPAS);

		$criteria->addSelectColumn(NpintfecrefPeer::TASINTACT);

		$criteria->addSelectColumn(NpintfecrefPeer::ID);

	}

	const COUNT = 'COUNT(npintfecref.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npintfecref.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpintfecrefPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpintfecrefPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpintfecrefPeer::doSelectRS($criteria, $con);
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
		$objects = NpintfecrefPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpintfecrefPeer::populateObjects(NpintfecrefPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpintfecrefPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpintfecrefPeer::getOMClass();
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
		return NpintfecrefPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NpintfecrefPeer::ID);
			$selectCriteria->add(NpintfecrefPeer::ID, $criteria->remove(NpintfecrefPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpintfecrefPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpintfecrefPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npintfecref) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpintfecrefPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npintfecref $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpintfecrefPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpintfecrefPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpintfecrefPeer::DATABASE_NAME, NpintfecrefPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpintfecrefPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpintfecrefPeer::DATABASE_NAME);

		$criteria->add(NpintfecrefPeer::ID, $pk);


		$v = NpintfecrefPeer::doSelect($criteria, $con);

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
			$criteria->add(NpintfecrefPeer::ID, $pks, Criteria::IN);
			$objs = NpintfecrefPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpintfecrefPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpintfecrefMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpintfecrefMapBuilder');
}
