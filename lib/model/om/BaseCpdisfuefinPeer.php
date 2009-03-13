<?php


abstract class BaseCpdisfuefinPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpdisfuefin';

	
	const CLASS_DEFAULT = 'lib.model.Cpdisfuefin';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CORREL = 'cpdisfuefin.CORREL';

	
	const ORIGEN = 'cpdisfuefin.ORIGEN';

	
	const FUEFIN = 'cpdisfuefin.FUEFIN';

	
	const FECDIS = 'cpdisfuefin.FECDIS';

	
	const CODPRE = 'cpdisfuefin.CODPRE';

	
	const MONASI = 'cpdisfuefin.MONASI';

	
	const REFDIS = 'cpdisfuefin.REFDIS';

	
	const STATUS = 'cpdisfuefin.STATUS';

	
	const ID = 'cpdisfuefin.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Correl', 'Origen', 'Fuefin', 'Fecdis', 'Codpre', 'Monasi', 'Refdis', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpdisfuefinPeer::CORREL, CpdisfuefinPeer::ORIGEN, CpdisfuefinPeer::FUEFIN, CpdisfuefinPeer::FECDIS, CpdisfuefinPeer::CODPRE, CpdisfuefinPeer::MONASI, CpdisfuefinPeer::REFDIS, CpdisfuefinPeer::STATUS, CpdisfuefinPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('correl', 'origen', 'fuefin', 'fecdis', 'codpre', 'monasi', 'refdis', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Correl' => 0, 'Origen' => 1, 'Fuefin' => 2, 'Fecdis' => 3, 'Codpre' => 4, 'Monasi' => 5, 'Refdis' => 6, 'Status' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CpdisfuefinPeer::CORREL => 0, CpdisfuefinPeer::ORIGEN => 1, CpdisfuefinPeer::FUEFIN => 2, CpdisfuefinPeer::FECDIS => 3, CpdisfuefinPeer::CODPRE => 4, CpdisfuefinPeer::MONASI => 5, CpdisfuefinPeer::REFDIS => 6, CpdisfuefinPeer::STATUS => 7, CpdisfuefinPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('correl' => 0, 'origen' => 1, 'fuefin' => 2, 'fecdis' => 3, 'codpre' => 4, 'monasi' => 5, 'refdis' => 6, 'status' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpdisfuefinMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpdisfuefinMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpdisfuefinPeer::getTableMap();
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
		return str_replace(CpdisfuefinPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpdisfuefinPeer::CORREL);

		$criteria->addSelectColumn(CpdisfuefinPeer::ORIGEN);

		$criteria->addSelectColumn(CpdisfuefinPeer::FUEFIN);

		$criteria->addSelectColumn(CpdisfuefinPeer::FECDIS);

		$criteria->addSelectColumn(CpdisfuefinPeer::CODPRE);

		$criteria->addSelectColumn(CpdisfuefinPeer::MONASI);

		$criteria->addSelectColumn(CpdisfuefinPeer::REFDIS);

		$criteria->addSelectColumn(CpdisfuefinPeer::STATUS);

		$criteria->addSelectColumn(CpdisfuefinPeer::ID);

	}

	const COUNT = 'COUNT(cpdisfuefin.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpdisfuefin.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpdisfuefinPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpdisfuefinPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpdisfuefinPeer::doSelectRS($criteria, $con);
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
		$objects = CpdisfuefinPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpdisfuefinPeer::populateObjects(CpdisfuefinPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpdisfuefinPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpdisfuefinPeer::getOMClass();
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
		return CpdisfuefinPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpdisfuefinPeer::ID); 

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
			$comparison = $criteria->getComparison(CpdisfuefinPeer::ID);
			$selectCriteria->add(CpdisfuefinPeer::ID, $criteria->remove(CpdisfuefinPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpdisfuefinPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpdisfuefinPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpdisfuefin) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpdisfuefinPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpdisfuefin $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpdisfuefinPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpdisfuefinPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpdisfuefinPeer::DATABASE_NAME, CpdisfuefinPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpdisfuefinPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpdisfuefinPeer::DATABASE_NAME);

		$criteria->add(CpdisfuefinPeer::ID, $pk);


		$v = CpdisfuefinPeer::doSelect($criteria, $con);

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
			$criteria->add(CpdisfuefinPeer::ID, $pks, Criteria::IN);
			$objs = CpdisfuefinPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpdisfuefinPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpdisfuefinMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpdisfuefinMapBuilder');
}
