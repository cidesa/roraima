<?php


abstract class BaseRhevaempobjPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rhevaempobj';

	
	const CLASS_DEFAULT = 'lib.model.Rhevaempobj';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEVDO = 'rhevaempobj.CODEVDO';

	
	const CODNIV = 'rhevaempobj.CODNIV';

	
	const CODOBJ = 'rhevaempobj.CODOBJ';

	
	const PLAOBJ = 'rhevaempobj.PLAOBJ';

	
	const ALCOBJ = 'rhevaempobj.ALCOBJ';

	
	const PESOBJ = 'rhevaempobj.PESOBJ';

	
	const PUNOBJ = 'rhevaempobj.PUNOBJ';

	
	const FECEVAL = 'rhevaempobj.FECEVAL';

	
	const ID = 'rhevaempobj.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codevdo', 'Codniv', 'Codobj', 'Plaobj', 'Alcobj', 'Pesobj', 'Punobj', 'Feceval', 'Id', ),
		BasePeer::TYPE_COLNAME => array (RhevaempobjPeer::CODEVDO, RhevaempobjPeer::CODNIV, RhevaempobjPeer::CODOBJ, RhevaempobjPeer::PLAOBJ, RhevaempobjPeer::ALCOBJ, RhevaempobjPeer::PESOBJ, RhevaempobjPeer::PUNOBJ, RhevaempobjPeer::FECEVAL, RhevaempobjPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codevdo', 'codniv', 'codobj', 'plaobj', 'alcobj', 'pesobj', 'punobj', 'feceval', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codevdo' => 0, 'Codniv' => 1, 'Codobj' => 2, 'Plaobj' => 3, 'Alcobj' => 4, 'Pesobj' => 5, 'Punobj' => 6, 'Feceval' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (RhevaempobjPeer::CODEVDO => 0, RhevaempobjPeer::CODNIV => 1, RhevaempobjPeer::CODOBJ => 2, RhevaempobjPeer::PLAOBJ => 3, RhevaempobjPeer::ALCOBJ => 4, RhevaempobjPeer::PESOBJ => 5, RhevaempobjPeer::PUNOBJ => 6, RhevaempobjPeer::FECEVAL => 7, RhevaempobjPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codevdo' => 0, 'codniv' => 1, 'codobj' => 2, 'plaobj' => 3, 'alcobj' => 4, 'pesobj' => 5, 'punobj' => 6, 'feceval' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RhevaempobjMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RhevaempobjMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RhevaempobjPeer::getTableMap();
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
		return str_replace(RhevaempobjPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RhevaempobjPeer::CODEVDO);

		$criteria->addSelectColumn(RhevaempobjPeer::CODNIV);

		$criteria->addSelectColumn(RhevaempobjPeer::CODOBJ);

		$criteria->addSelectColumn(RhevaempobjPeer::PLAOBJ);

		$criteria->addSelectColumn(RhevaempobjPeer::ALCOBJ);

		$criteria->addSelectColumn(RhevaempobjPeer::PESOBJ);

		$criteria->addSelectColumn(RhevaempobjPeer::PUNOBJ);

		$criteria->addSelectColumn(RhevaempobjPeer::FECEVAL);

		$criteria->addSelectColumn(RhevaempobjPeer::ID);

	}

	const COUNT = 'COUNT(rhevaempobj.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT rhevaempobj.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RhevaempobjPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RhevaempobjPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RhevaempobjPeer::doSelectRS($criteria, $con);
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
		$objects = RhevaempobjPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RhevaempobjPeer::populateObjects(RhevaempobjPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RhevaempobjPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RhevaempobjPeer::getOMClass();
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
		return RhevaempobjPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RhevaempobjPeer::ID); 

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
			$comparison = $criteria->getComparison(RhevaempobjPeer::ID);
			$selectCriteria->add(RhevaempobjPeer::ID, $criteria->remove(RhevaempobjPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RhevaempobjPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RhevaempobjPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Rhevaempobj) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RhevaempobjPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Rhevaempobj $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RhevaempobjPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RhevaempobjPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RhevaempobjPeer::DATABASE_NAME, RhevaempobjPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RhevaempobjPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RhevaempobjPeer::DATABASE_NAME);

		$criteria->add(RhevaempobjPeer::ID, $pk);


		$v = RhevaempobjPeer::doSelect($criteria, $con);

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
			$criteria->add(RhevaempobjPeer::ID, $pks, Criteria::IN);
			$objs = RhevaempobjPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRhevaempobjPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RhevaempobjMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RhevaempobjMapBuilder');
}
