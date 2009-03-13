<?php


abstract class BaseFcabonosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcabonos';

	
	const CLASS_DEFAULT = 'lib.model.Fcabonos';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPAG = 'fcabonos.NUMPAG';

	
	const FECPAG = 'fcabonos.FECPAG';

	
	const RIFCON = 'fcabonos.RIFCON';

	
	const FUEING = 'fcabonos.FUEING';

	
	const DESPAG = 'fcabonos.DESPAG';

	
	const MONPAG = 'fcabonos.MONPAG';

	
	const MONEFE = 'fcabonos.MONEFE';

	
	const FUNPAG = 'fcabonos.FUNPAG';

	
	const CODREC = 'fcabonos.CODREC';

	
	const SALPAG = 'fcabonos.SALPAG';

	
	const STAPAG = 'fcabonos.STAPAG';

	
	const FECREC = 'fcabonos.FECREC';

	
	const NUMPAG2 = 'fcabonos.NUMPAG2';

	
	const NUMREF = 'fcabonos.NUMREF';

	
	const ID = 'fcabonos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpag', 'Fecpag', 'Rifcon', 'Fueing', 'Despag', 'Monpag', 'Monefe', 'Funpag', 'Codrec', 'Salpag', 'Stapag', 'Fecrec', 'Numpag2', 'Numref', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcabonosPeer::NUMPAG, FcabonosPeer::FECPAG, FcabonosPeer::RIFCON, FcabonosPeer::FUEING, FcabonosPeer::DESPAG, FcabonosPeer::MONPAG, FcabonosPeer::MONEFE, FcabonosPeer::FUNPAG, FcabonosPeer::CODREC, FcabonosPeer::SALPAG, FcabonosPeer::STAPAG, FcabonosPeer::FECREC, FcabonosPeer::NUMPAG2, FcabonosPeer::NUMREF, FcabonosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpag', 'fecpag', 'rifcon', 'fueing', 'despag', 'monpag', 'monefe', 'funpag', 'codrec', 'salpag', 'stapag', 'fecrec', 'numpag2', 'numref', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpag' => 0, 'Fecpag' => 1, 'Rifcon' => 2, 'Fueing' => 3, 'Despag' => 4, 'Monpag' => 5, 'Monefe' => 6, 'Funpag' => 7, 'Codrec' => 8, 'Salpag' => 9, 'Stapag' => 10, 'Fecrec' => 11, 'Numpag2' => 12, 'Numref' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (FcabonosPeer::NUMPAG => 0, FcabonosPeer::FECPAG => 1, FcabonosPeer::RIFCON => 2, FcabonosPeer::FUEING => 3, FcabonosPeer::DESPAG => 4, FcabonosPeer::MONPAG => 5, FcabonosPeer::MONEFE => 6, FcabonosPeer::FUNPAG => 7, FcabonosPeer::CODREC => 8, FcabonosPeer::SALPAG => 9, FcabonosPeer::STAPAG => 10, FcabonosPeer::FECREC => 11, FcabonosPeer::NUMPAG2 => 12, FcabonosPeer::NUMREF => 13, FcabonosPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('numpag' => 0, 'fecpag' => 1, 'rifcon' => 2, 'fueing' => 3, 'despag' => 4, 'monpag' => 5, 'monefe' => 6, 'funpag' => 7, 'codrec' => 8, 'salpag' => 9, 'stapag' => 10, 'fecrec' => 11, 'numpag2' => 12, 'numref' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcabonosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcabonosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcabonosPeer::getTableMap();
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
		return str_replace(FcabonosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcabonosPeer::NUMPAG);

		$criteria->addSelectColumn(FcabonosPeer::FECPAG);

		$criteria->addSelectColumn(FcabonosPeer::RIFCON);

		$criteria->addSelectColumn(FcabonosPeer::FUEING);

		$criteria->addSelectColumn(FcabonosPeer::DESPAG);

		$criteria->addSelectColumn(FcabonosPeer::MONPAG);

		$criteria->addSelectColumn(FcabonosPeer::MONEFE);

		$criteria->addSelectColumn(FcabonosPeer::FUNPAG);

		$criteria->addSelectColumn(FcabonosPeer::CODREC);

		$criteria->addSelectColumn(FcabonosPeer::SALPAG);

		$criteria->addSelectColumn(FcabonosPeer::STAPAG);

		$criteria->addSelectColumn(FcabonosPeer::FECREC);

		$criteria->addSelectColumn(FcabonosPeer::NUMPAG2);

		$criteria->addSelectColumn(FcabonosPeer::NUMREF);

		$criteria->addSelectColumn(FcabonosPeer::ID);

	}

	const COUNT = 'COUNT(fcabonos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcabonos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcabonosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcabonosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcabonosPeer::doSelectRS($criteria, $con);
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
		$objects = FcabonosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcabonosPeer::populateObjects(FcabonosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcabonosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcabonosPeer::getOMClass();
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
		return FcabonosPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcabonosPeer::ID); 

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
			$comparison = $criteria->getComparison(FcabonosPeer::ID);
			$selectCriteria->add(FcabonosPeer::ID, $criteria->remove(FcabonosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcabonosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcabonosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcabonos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcabonosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcabonos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcabonosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcabonosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcabonosPeer::DATABASE_NAME, FcabonosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcabonosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcabonosPeer::DATABASE_NAME);

		$criteria->add(FcabonosPeer::ID, $pk);


		$v = FcabonosPeer::doSelect($criteria, $con);

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
			$criteria->add(FcabonosPeer::ID, $pks, Criteria::IN);
			$objs = FcabonosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcabonosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcabonosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcabonosMapBuilder');
}
