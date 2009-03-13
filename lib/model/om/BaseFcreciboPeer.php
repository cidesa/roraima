<?php


abstract class BaseFcreciboPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcrecibo';

	
	const CLASS_DEFAULT = 'lib.model.Fcrecibo';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODREC = 'fcrecibo.CODREC';

	
	const FECREC = 'fcrecibo.FECREC';

	
	const DESREC = 'fcrecibo.DESREC';

	
	const NUMLIC = 'fcrecibo.NUMLIC';

	
	const RIFCON = 'fcrecibo.RIFCON';

	
	const MONREC = 'fcrecibo.MONREC';

	
	const NOMCON = 'fcrecibo.NOMCON';

	
	const DIRCON = 'fcrecibo.DIRCON';

	
	const FECHA = 'fcrecibo.FECHA';

	
	const ID = 'fcrecibo.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codrec', 'Fecrec', 'Desrec', 'Numlic', 'Rifcon', 'Monrec', 'Nomcon', 'Dircon', 'Fecha', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcreciboPeer::CODREC, FcreciboPeer::FECREC, FcreciboPeer::DESREC, FcreciboPeer::NUMLIC, FcreciboPeer::RIFCON, FcreciboPeer::MONREC, FcreciboPeer::NOMCON, FcreciboPeer::DIRCON, FcreciboPeer::FECHA, FcreciboPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codrec', 'fecrec', 'desrec', 'numlic', 'rifcon', 'monrec', 'nomcon', 'dircon', 'fecha', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codrec' => 0, 'Fecrec' => 1, 'Desrec' => 2, 'Numlic' => 3, 'Rifcon' => 4, 'Monrec' => 5, 'Nomcon' => 6, 'Dircon' => 7, 'Fecha' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (FcreciboPeer::CODREC => 0, FcreciboPeer::FECREC => 1, FcreciboPeer::DESREC => 2, FcreciboPeer::NUMLIC => 3, FcreciboPeer::RIFCON => 4, FcreciboPeer::MONREC => 5, FcreciboPeer::NOMCON => 6, FcreciboPeer::DIRCON => 7, FcreciboPeer::FECHA => 8, FcreciboPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codrec' => 0, 'fecrec' => 1, 'desrec' => 2, 'numlic' => 3, 'rifcon' => 4, 'monrec' => 5, 'nomcon' => 6, 'dircon' => 7, 'fecha' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcreciboMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcreciboMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcreciboPeer::getTableMap();
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
		return str_replace(FcreciboPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcreciboPeer::CODREC);

		$criteria->addSelectColumn(FcreciboPeer::FECREC);

		$criteria->addSelectColumn(FcreciboPeer::DESREC);

		$criteria->addSelectColumn(FcreciboPeer::NUMLIC);

		$criteria->addSelectColumn(FcreciboPeer::RIFCON);

		$criteria->addSelectColumn(FcreciboPeer::MONREC);

		$criteria->addSelectColumn(FcreciboPeer::NOMCON);

		$criteria->addSelectColumn(FcreciboPeer::DIRCON);

		$criteria->addSelectColumn(FcreciboPeer::FECHA);

		$criteria->addSelectColumn(FcreciboPeer::ID);

	}

	const COUNT = 'COUNT(fcrecibo.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcrecibo.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcreciboPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcreciboPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcreciboPeer::doSelectRS($criteria, $con);
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
		$objects = FcreciboPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcreciboPeer::populateObjects(FcreciboPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcreciboPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcreciboPeer::getOMClass();
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
		return FcreciboPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcreciboPeer::ID); 

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
			$comparison = $criteria->getComparison(FcreciboPeer::ID);
			$selectCriteria->add(FcreciboPeer::ID, $criteria->remove(FcreciboPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcreciboPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcreciboPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcrecibo) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcreciboPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcrecibo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcreciboPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcreciboPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcreciboPeer::DATABASE_NAME, FcreciboPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcreciboPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcreciboPeer::DATABASE_NAME);

		$criteria->add(FcreciboPeer::ID, $pk);


		$v = FcreciboPeer::doSelect($criteria, $con);

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
			$criteria->add(FcreciboPeer::ID, $pks, Criteria::IN);
			$objs = FcreciboPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcreciboPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcreciboMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcreciboMapBuilder');
}
