<?php


abstract class BaseFctipproPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fctippro';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fctippro';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TIPPRO = 'fctippro.TIPPRO';

	
	const ANOVIG = 'fctippro.ANOVIG';

	
	const DESTIP = 'fctippro.DESTIP';

	
	const PORMON = 'fctippro.PORMON';

	
	const ALIMON = 'fctippro.ALIMON';

	
	const STATIP = 'fctippro.STATIP';

	
	const UNIPAR = 'fctippro.UNIPAR';

	
	const FREPAR = 'fctippro.FREPAR';

	
	const PARPRO = 'fctippro.PARPRO';

	
	const ID = 'fctippro.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Tippro', 'Anovig', 'Destip', 'Pormon', 'Alimon', 'Statip', 'Unipar', 'Frepar', 'Parpro', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FctipproPeer::TIPPRO, FctipproPeer::ANOVIG, FctipproPeer::DESTIP, FctipproPeer::PORMON, FctipproPeer::ALIMON, FctipproPeer::STATIP, FctipproPeer::UNIPAR, FctipproPeer::FREPAR, FctipproPeer::PARPRO, FctipproPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('tippro', 'anovig', 'destip', 'pormon', 'alimon', 'statip', 'unipar', 'frepar', 'parpro', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Tippro' => 0, 'Anovig' => 1, 'Destip' => 2, 'Pormon' => 3, 'Alimon' => 4, 'Statip' => 5, 'Unipar' => 6, 'Frepar' => 7, 'Parpro' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (FctipproPeer::TIPPRO => 0, FctipproPeer::ANOVIG => 1, FctipproPeer::DESTIP => 2, FctipproPeer::PORMON => 3, FctipproPeer::ALIMON => 4, FctipproPeer::STATIP => 5, FctipproPeer::UNIPAR => 6, FctipproPeer::FREPAR => 7, FctipproPeer::PARPRO => 8, FctipproPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('tippro' => 0, 'anovig' => 1, 'destip' => 2, 'pormon' => 3, 'alimon' => 4, 'statip' => 5, 'unipar' => 6, 'frepar' => 7, 'parpro' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FctipproMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FctipproMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FctipproPeer::getTableMap();
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
		return str_replace(FctipproPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FctipproPeer::TIPPRO);

		$criteria->addSelectColumn(FctipproPeer::ANOVIG);

		$criteria->addSelectColumn(FctipproPeer::DESTIP);

		$criteria->addSelectColumn(FctipproPeer::PORMON);

		$criteria->addSelectColumn(FctipproPeer::ALIMON);

		$criteria->addSelectColumn(FctipproPeer::STATIP);

		$criteria->addSelectColumn(FctipproPeer::UNIPAR);

		$criteria->addSelectColumn(FctipproPeer::FREPAR);

		$criteria->addSelectColumn(FctipproPeer::PARPRO);

		$criteria->addSelectColumn(FctipproPeer::ID);

	}

	const COUNT = 'COUNT(fctippro.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fctippro.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FctipproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FctipproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FctipproPeer::doSelectRS($criteria, $con);
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
		$objects = FctipproPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FctipproPeer::populateObjects(FctipproPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FctipproPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FctipproPeer::getOMClass();
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
		return FctipproPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FctipproPeer::ID); 

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
			$comparison = $criteria->getComparison(FctipproPeer::ID);
			$selectCriteria->add(FctipproPeer::ID, $criteria->remove(FctipproPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FctipproPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FctipproPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fctippro) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FctipproPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fctippro $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FctipproPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FctipproPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FctipproPeer::DATABASE_NAME, FctipproPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FctipproPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FctipproPeer::DATABASE_NAME);

		$criteria->add(FctipproPeer::ID, $pk);


		$v = FctipproPeer::doSelect($criteria, $con);

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
			$criteria->add(FctipproPeer::ID, $pks, Criteria::IN);
			$objs = FctipproPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFctipproPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FctipproMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FctipproMapBuilder');
}
