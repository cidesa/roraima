<?php


abstract class BaseFcsoldetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcsoldet';

	
	const CLASS_DEFAULT = 'lib.model.Fcsoldet';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODSOL = 'fcsoldet.CODSOL';

	
	const CODFUE = 'fcsoldet.CODFUE';

	
	const NOMFUE = 'fcsoldet.NOMFUE';

	
	const OBJETO = 'fcsoldet.OBJETO';

	
	const FECVEN = 'fcsoldet.FECVEN';

	
	const EDODEC = 'fcsoldet.EDODEC';

	
	const FECULTPAG = 'fcsoldet.FECULTPAG';

	
	const ID = 'fcsoldet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codsol', 'Codfue', 'Nomfue', 'Objeto', 'Fecven', 'Edodec', 'Fecultpag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcsoldetPeer::CODSOL, FcsoldetPeer::CODFUE, FcsoldetPeer::NOMFUE, FcsoldetPeer::OBJETO, FcsoldetPeer::FECVEN, FcsoldetPeer::EDODEC, FcsoldetPeer::FECULTPAG, FcsoldetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codsol', 'codfue', 'nomfue', 'objeto', 'fecven', 'edodec', 'fecultpag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codsol' => 0, 'Codfue' => 1, 'Nomfue' => 2, 'Objeto' => 3, 'Fecven' => 4, 'Edodec' => 5, 'Fecultpag' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FcsoldetPeer::CODSOL => 0, FcsoldetPeer::CODFUE => 1, FcsoldetPeer::NOMFUE => 2, FcsoldetPeer::OBJETO => 3, FcsoldetPeer::FECVEN => 4, FcsoldetPeer::EDODEC => 5, FcsoldetPeer::FECULTPAG => 6, FcsoldetPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codsol' => 0, 'codfue' => 1, 'nomfue' => 2, 'objeto' => 3, 'fecven' => 4, 'edodec' => 5, 'fecultpag' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcsoldetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcsoldetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcsoldetPeer::getTableMap();
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
		return str_replace(FcsoldetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcsoldetPeer::CODSOL);

		$criteria->addSelectColumn(FcsoldetPeer::CODFUE);

		$criteria->addSelectColumn(FcsoldetPeer::NOMFUE);

		$criteria->addSelectColumn(FcsoldetPeer::OBJETO);

		$criteria->addSelectColumn(FcsoldetPeer::FECVEN);

		$criteria->addSelectColumn(FcsoldetPeer::EDODEC);

		$criteria->addSelectColumn(FcsoldetPeer::FECULTPAG);

		$criteria->addSelectColumn(FcsoldetPeer::ID);

	}

	const COUNT = 'COUNT(fcsoldet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcsoldet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcsoldetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcsoldetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcsoldetPeer::doSelectRS($criteria, $con);
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
		$objects = FcsoldetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcsoldetPeer::populateObjects(FcsoldetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcsoldetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcsoldetPeer::getOMClass();
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
		return FcsoldetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcsoldetPeer::ID); 

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
			$comparison = $criteria->getComparison(FcsoldetPeer::ID);
			$selectCriteria->add(FcsoldetPeer::ID, $criteria->remove(FcsoldetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcsoldetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcsoldetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcsoldet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcsoldetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcsoldet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcsoldetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcsoldetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcsoldetPeer::DATABASE_NAME, FcsoldetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcsoldetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcsoldetPeer::DATABASE_NAME);

		$criteria->add(FcsoldetPeer::ID, $pk);


		$v = FcsoldetPeer::doSelect($criteria, $con);

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
			$criteria->add(FcsoldetPeer::ID, $pks, Criteria::IN);
			$objs = FcsoldetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcsoldetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcsoldetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcsoldetMapBuilder');
}
