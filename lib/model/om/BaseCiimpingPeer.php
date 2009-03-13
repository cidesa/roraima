<?php


abstract class BaseCiimpingPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ciimping';

	
	const CLASS_DEFAULT = 'lib.model.Ciimping';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFING = 'ciimping.REFING';

	
	const CODPRE = 'ciimping.CODPRE';

	
	const MONING = 'ciimping.MONING';

	
	const MONREC = 'ciimping.MONREC';

	
	const MONDES = 'ciimping.MONDES';

	
	const MONTOT = 'ciimping.MONTOT';

	
	const FECING = 'ciimping.FECING';

	
	const STAIMP = 'ciimping.STAIMP';

	
	const MONAJU = 'ciimping.MONAJU';

	
	const ID = 'ciimping.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refing', 'Codpre', 'Moning', 'Monrec', 'Mondes', 'Montot', 'Fecing', 'Staimp', 'Monaju', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CiimpingPeer::REFING, CiimpingPeer::CODPRE, CiimpingPeer::MONING, CiimpingPeer::MONREC, CiimpingPeer::MONDES, CiimpingPeer::MONTOT, CiimpingPeer::FECING, CiimpingPeer::STAIMP, CiimpingPeer::MONAJU, CiimpingPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refing', 'codpre', 'moning', 'monrec', 'mondes', 'montot', 'fecing', 'staimp', 'monaju', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refing' => 0, 'Codpre' => 1, 'Moning' => 2, 'Monrec' => 3, 'Mondes' => 4, 'Montot' => 5, 'Fecing' => 6, 'Staimp' => 7, 'Monaju' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (CiimpingPeer::REFING => 0, CiimpingPeer::CODPRE => 1, CiimpingPeer::MONING => 2, CiimpingPeer::MONREC => 3, CiimpingPeer::MONDES => 4, CiimpingPeer::MONTOT => 5, CiimpingPeer::FECING => 6, CiimpingPeer::STAIMP => 7, CiimpingPeer::MONAJU => 8, CiimpingPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('refing' => 0, 'codpre' => 1, 'moning' => 2, 'monrec' => 3, 'mondes' => 4, 'montot' => 5, 'fecing' => 6, 'staimp' => 7, 'monaju' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CiimpingMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CiimpingMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CiimpingPeer::getTableMap();
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
		return str_replace(CiimpingPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CiimpingPeer::REFING);

		$criteria->addSelectColumn(CiimpingPeer::CODPRE);

		$criteria->addSelectColumn(CiimpingPeer::MONING);

		$criteria->addSelectColumn(CiimpingPeer::MONREC);

		$criteria->addSelectColumn(CiimpingPeer::MONDES);

		$criteria->addSelectColumn(CiimpingPeer::MONTOT);

		$criteria->addSelectColumn(CiimpingPeer::FECING);

		$criteria->addSelectColumn(CiimpingPeer::STAIMP);

		$criteria->addSelectColumn(CiimpingPeer::MONAJU);

		$criteria->addSelectColumn(CiimpingPeer::ID);

	}

	const COUNT = 'COUNT(ciimping.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ciimping.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CiimpingPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CiimpingPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CiimpingPeer::doSelectRS($criteria, $con);
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
		$objects = CiimpingPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CiimpingPeer::populateObjects(CiimpingPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CiimpingPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CiimpingPeer::getOMClass();
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
		return CiimpingPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CiimpingPeer::ID); 

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
			$comparison = $criteria->getComparison(CiimpingPeer::ID);
			$selectCriteria->add(CiimpingPeer::ID, $criteria->remove(CiimpingPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CiimpingPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CiimpingPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ciimping) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CiimpingPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ciimping $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CiimpingPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CiimpingPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CiimpingPeer::DATABASE_NAME, CiimpingPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CiimpingPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CiimpingPeer::DATABASE_NAME);

		$criteria->add(CiimpingPeer::ID, $pk);


		$v = CiimpingPeer::doSelect($criteria, $con);

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
			$criteria->add(CiimpingPeer::ID, $pks, Criteria::IN);
			$objs = CiimpingPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCiimpingPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CiimpingMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CiimpingMapBuilder');
}
