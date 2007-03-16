<?php


abstract class BaseCpdisfuefinacuPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpdisfuefinacu';

	
	const CLASS_DEFAULT = 'lib.model.Cpdisfuefinacu';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CORREL = 'cpdisfuefinacu.CORREL';

	
	const ORIGEN = 'cpdisfuefinacu.ORIGEN';

	
	const FUEFIN = 'cpdisfuefinacu.FUEFIN';

	
	const FECDIS = 'cpdisfuefinacu.FECDIS';

	
	const CODPRE = 'cpdisfuefinacu.CODPRE';

	
	const MONASI = 'cpdisfuefinacu.MONASI';

	
	const REFDIS = 'cpdisfuefinacu.REFDIS';

	
	const STATUS = 'cpdisfuefinacu.STATUS';

	
	const ID = 'cpdisfuefinacu.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Correl', 'Origen', 'Fuefin', 'Fecdis', 'Codpre', 'Monasi', 'Refdis', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpdisfuefinacuPeer::CORREL, CpdisfuefinacuPeer::ORIGEN, CpdisfuefinacuPeer::FUEFIN, CpdisfuefinacuPeer::FECDIS, CpdisfuefinacuPeer::CODPRE, CpdisfuefinacuPeer::MONASI, CpdisfuefinacuPeer::REFDIS, CpdisfuefinacuPeer::STATUS, CpdisfuefinacuPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('correl', 'origen', 'fuefin', 'fecdis', 'codpre', 'monasi', 'refdis', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Correl' => 0, 'Origen' => 1, 'Fuefin' => 2, 'Fecdis' => 3, 'Codpre' => 4, 'Monasi' => 5, 'Refdis' => 6, 'Status' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CpdisfuefinacuPeer::CORREL => 0, CpdisfuefinacuPeer::ORIGEN => 1, CpdisfuefinacuPeer::FUEFIN => 2, CpdisfuefinacuPeer::FECDIS => 3, CpdisfuefinacuPeer::CODPRE => 4, CpdisfuefinacuPeer::MONASI => 5, CpdisfuefinacuPeer::REFDIS => 6, CpdisfuefinacuPeer::STATUS => 7, CpdisfuefinacuPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('correl' => 0, 'origen' => 1, 'fuefin' => 2, 'fecdis' => 3, 'codpre' => 4, 'monasi' => 5, 'refdis' => 6, 'status' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpdisfuefinacuMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpdisfuefinacuMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpdisfuefinacuPeer::getTableMap();
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
		return str_replace(CpdisfuefinacuPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpdisfuefinacuPeer::CORREL);

		$criteria->addSelectColumn(CpdisfuefinacuPeer::ORIGEN);

		$criteria->addSelectColumn(CpdisfuefinacuPeer::FUEFIN);

		$criteria->addSelectColumn(CpdisfuefinacuPeer::FECDIS);

		$criteria->addSelectColumn(CpdisfuefinacuPeer::CODPRE);

		$criteria->addSelectColumn(CpdisfuefinacuPeer::MONASI);

		$criteria->addSelectColumn(CpdisfuefinacuPeer::REFDIS);

		$criteria->addSelectColumn(CpdisfuefinacuPeer::STATUS);

		$criteria->addSelectColumn(CpdisfuefinacuPeer::ID);

	}

	const COUNT = 'COUNT(cpdisfuefinacu.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpdisfuefinacu.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpdisfuefinacuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpdisfuefinacuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpdisfuefinacuPeer::doSelectRS($criteria, $con);
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
		$objects = CpdisfuefinacuPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpdisfuefinacuPeer::populateObjects(CpdisfuefinacuPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpdisfuefinacuPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpdisfuefinacuPeer::getOMClass();
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
		return CpdisfuefinacuPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CpdisfuefinacuPeer::ID);
			$selectCriteria->add(CpdisfuefinacuPeer::ID, $criteria->remove(CpdisfuefinacuPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpdisfuefinacuPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpdisfuefinacuPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpdisfuefinacu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpdisfuefinacuPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpdisfuefinacu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpdisfuefinacuPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpdisfuefinacuPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpdisfuefinacuPeer::DATABASE_NAME, CpdisfuefinacuPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpdisfuefinacuPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpdisfuefinacuPeer::DATABASE_NAME);

		$criteria->add(CpdisfuefinacuPeer::ID, $pk);


		$v = CpdisfuefinacuPeer::doSelect($criteria, $con);

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
			$criteria->add(CpdisfuefinacuPeer::ID, $pks, Criteria::IN);
			$objs = CpdisfuefinacuPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpdisfuefinacuPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpdisfuefinacuMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpdisfuefinacuMapBuilder');
}
