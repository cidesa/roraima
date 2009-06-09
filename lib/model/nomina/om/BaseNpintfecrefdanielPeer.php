<?php


abstract class BaseNpintfecrefdanielPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npintfecrefdaniel';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npintfecrefdaniel';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FECINIREF = 'npintfecrefdaniel.FECINIREF';

	
	const FECFINREF = 'npintfecrefdaniel.FECFINREF';

	
	const TASINT = 'npintfecrefdaniel.TASINT';

	
	const TASINTPRO = 'npintfecrefdaniel.TASINTPRO';

	
	const TASINTPAS = 'npintfecrefdaniel.TASINTPAS';

	
	const TASINTACT = 'npintfecrefdaniel.TASINTACT';

	
	const ID = 'npintfecrefdaniel.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Feciniref', 'Fecfinref', 'Tasint', 'Tasintpro', 'Tasintpas', 'Tasintact', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpintfecrefdanielPeer::FECINIREF, NpintfecrefdanielPeer::FECFINREF, NpintfecrefdanielPeer::TASINT, NpintfecrefdanielPeer::TASINTPRO, NpintfecrefdanielPeer::TASINTPAS, NpintfecrefdanielPeer::TASINTACT, NpintfecrefdanielPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('feciniref', 'fecfinref', 'tasint', 'tasintpro', 'tasintpas', 'tasintact', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Feciniref' => 0, 'Fecfinref' => 1, 'Tasint' => 2, 'Tasintpro' => 3, 'Tasintpas' => 4, 'Tasintact' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (NpintfecrefdanielPeer::FECINIREF => 0, NpintfecrefdanielPeer::FECFINREF => 1, NpintfecrefdanielPeer::TASINT => 2, NpintfecrefdanielPeer::TASINTPRO => 3, NpintfecrefdanielPeer::TASINTPAS => 4, NpintfecrefdanielPeer::TASINTACT => 5, NpintfecrefdanielPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('feciniref' => 0, 'fecfinref' => 1, 'tasint' => 2, 'tasintpro' => 3, 'tasintpas' => 4, 'tasintact' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpintfecrefdanielMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpintfecrefdanielMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpintfecrefdanielPeer::getTableMap();
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
		return str_replace(NpintfecrefdanielPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpintfecrefdanielPeer::FECINIREF);

		$criteria->addSelectColumn(NpintfecrefdanielPeer::FECFINREF);

		$criteria->addSelectColumn(NpintfecrefdanielPeer::TASINT);

		$criteria->addSelectColumn(NpintfecrefdanielPeer::TASINTPRO);

		$criteria->addSelectColumn(NpintfecrefdanielPeer::TASINTPAS);

		$criteria->addSelectColumn(NpintfecrefdanielPeer::TASINTACT);

		$criteria->addSelectColumn(NpintfecrefdanielPeer::ID);

	}

	const COUNT = 'COUNT(npintfecrefdaniel.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npintfecrefdaniel.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpintfecrefdanielPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpintfecrefdanielPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpintfecrefdanielPeer::doSelectRS($criteria, $con);
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
		$objects = NpintfecrefdanielPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpintfecrefdanielPeer::populateObjects(NpintfecrefdanielPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpintfecrefdanielPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpintfecrefdanielPeer::getOMClass();
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
		return NpintfecrefdanielPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpintfecrefdanielPeer::ID); 

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
			$comparison = $criteria->getComparison(NpintfecrefdanielPeer::ID);
			$selectCriteria->add(NpintfecrefdanielPeer::ID, $criteria->remove(NpintfecrefdanielPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpintfecrefdanielPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpintfecrefdanielPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npintfecrefdaniel) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpintfecrefdanielPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npintfecrefdaniel $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpintfecrefdanielPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpintfecrefdanielPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpintfecrefdanielPeer::DATABASE_NAME, NpintfecrefdanielPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpintfecrefdanielPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpintfecrefdanielPeer::DATABASE_NAME);

		$criteria->add(NpintfecrefdanielPeer::ID, $pk);


		$v = NpintfecrefdanielPeer::doSelect($criteria, $con);

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
			$criteria->add(NpintfecrefdanielPeer::ID, $pks, Criteria::IN);
			$objs = NpintfecrefdanielPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpintfecrefdanielPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpintfecrefdanielMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpintfecrefdanielMapBuilder');
}
