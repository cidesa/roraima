<?php


abstract class BaseFacorrelatPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'facorrelat';

	
	const CLASS_DEFAULT = 'lib.model.Facorrelat';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CORPRE = 'facorrelat.CORPRE';

	
	const CORPED = 'facorrelat.CORPED';

	
	const CORFAC = 'facorrelat.CORFAC';

	
	const CORNOT = 'facorrelat.CORNOT';

	
	const CORDPH = 'facorrelat.CORDPH';

	
	const CORDEV = 'facorrelat.CORDEV';

	
	const CORAJU = 'facorrelat.CORAJU';

	
	const CODPRO = 'facorrelat.CODPRO';

	
	const PROFORM = 'facorrelat.PROFORM';

	
	const CORFACCONT = 'facorrelat.CORFACCONT';

	
	const ID = 'facorrelat.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Corpre', 'Corped', 'Corfac', 'Cornot', 'Cordph', 'Cordev', 'Coraju', 'Codpro', 'Proform', 'Corfaccont', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FacorrelatPeer::CORPRE, FacorrelatPeer::CORPED, FacorrelatPeer::CORFAC, FacorrelatPeer::CORNOT, FacorrelatPeer::CORDPH, FacorrelatPeer::CORDEV, FacorrelatPeer::CORAJU, FacorrelatPeer::CODPRO, FacorrelatPeer::PROFORM, FacorrelatPeer::CORFACCONT, FacorrelatPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('corpre', 'corped', 'corfac', 'cornot', 'cordph', 'cordev', 'coraju', 'codpro', 'proform', 'corfaccont', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Corpre' => 0, 'Corped' => 1, 'Corfac' => 2, 'Cornot' => 3, 'Cordph' => 4, 'Cordev' => 5, 'Coraju' => 6, 'Codpro' => 7, 'Proform' => 8, 'Corfaccont' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (FacorrelatPeer::CORPRE => 0, FacorrelatPeer::CORPED => 1, FacorrelatPeer::CORFAC => 2, FacorrelatPeer::CORNOT => 3, FacorrelatPeer::CORDPH => 4, FacorrelatPeer::CORDEV => 5, FacorrelatPeer::CORAJU => 6, FacorrelatPeer::CODPRO => 7, FacorrelatPeer::PROFORM => 8, FacorrelatPeer::CORFACCONT => 9, FacorrelatPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('corpre' => 0, 'corped' => 1, 'corfac' => 2, 'cornot' => 3, 'cordph' => 4, 'cordev' => 5, 'coraju' => 6, 'codpro' => 7, 'proform' => 8, 'corfaccont' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FacorrelatMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FacorrelatMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FacorrelatPeer::getTableMap();
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
		return str_replace(FacorrelatPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FacorrelatPeer::CORPRE);

		$criteria->addSelectColumn(FacorrelatPeer::CORPED);

		$criteria->addSelectColumn(FacorrelatPeer::CORFAC);

		$criteria->addSelectColumn(FacorrelatPeer::CORNOT);

		$criteria->addSelectColumn(FacorrelatPeer::CORDPH);

		$criteria->addSelectColumn(FacorrelatPeer::CORDEV);

		$criteria->addSelectColumn(FacorrelatPeer::CORAJU);

		$criteria->addSelectColumn(FacorrelatPeer::CODPRO);

		$criteria->addSelectColumn(FacorrelatPeer::PROFORM);

		$criteria->addSelectColumn(FacorrelatPeer::CORFACCONT);

		$criteria->addSelectColumn(FacorrelatPeer::ID);

	}

	const COUNT = 'COUNT(facorrelat.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT facorrelat.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FacorrelatPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FacorrelatPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FacorrelatPeer::doSelectRS($criteria, $con);
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
		$objects = FacorrelatPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FacorrelatPeer::populateObjects(FacorrelatPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FacorrelatPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FacorrelatPeer::getOMClass();
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
		return FacorrelatPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FacorrelatPeer::ID); 

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
			$comparison = $criteria->getComparison(FacorrelatPeer::ID);
			$selectCriteria->add(FacorrelatPeer::ID, $criteria->remove(FacorrelatPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FacorrelatPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FacorrelatPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Facorrelat) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FacorrelatPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Facorrelat $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FacorrelatPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FacorrelatPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FacorrelatPeer::DATABASE_NAME, FacorrelatPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FacorrelatPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FacorrelatPeer::DATABASE_NAME);

		$criteria->add(FacorrelatPeer::ID, $pk);


		$v = FacorrelatPeer::doSelect($criteria, $con);

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
			$criteria->add(FacorrelatPeer::ID, $pks, Criteria::IN);
			$objs = FacorrelatPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFacorrelatPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FacorrelatMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FacorrelatMapBuilder');
}
