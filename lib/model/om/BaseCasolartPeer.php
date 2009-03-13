<?php


abstract class BaseCasolartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'casolart';

	
	const CLASS_DEFAULT = 'lib.model.Casolart';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REQART = 'casolart.REQART';

	
	const FECREQ = 'casolart.FECREQ';

	
	const DESREQ = 'casolart.DESREQ';

	
	const MONREQ = 'casolart.MONREQ';

	
	const STAREQ = 'casolart.STAREQ';

	
	const MOTREQ = 'casolart.MOTREQ';

	
	const BENREQ = 'casolart.BENREQ';

	
	const MONDES = 'casolart.MONDES';

	
	const OBSREQ = 'casolart.OBSREQ';

	
	const UNIRES = 'casolart.UNIRES';

	
	const TIPMON = 'casolart.TIPMON';

	
	const VALMON = 'casolart.VALMON';

	
	const FECANU = 'casolart.FECANU';

	
	const CODPRO = 'casolart.CODPRO';

	
	const REQCOM = 'casolart.REQCOM';

	
	const TIPFIN = 'casolart.TIPFIN';

	
	const TIPREQ = 'casolart.TIPREQ';

	
	const APRREQ = 'casolart.APRREQ';

	
	const ID = 'casolart.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart', 'Fecreq', 'Desreq', 'Monreq', 'Stareq', 'Motreq', 'Benreq', 'Mondes', 'Obsreq', 'Unires', 'Tipmon', 'Valmon', 'Fecanu', 'Codpro', 'Reqcom', 'Tipfin', 'Tipreq', 'Aprreq', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CasolartPeer::REQART, CasolartPeer::FECREQ, CasolartPeer::DESREQ, CasolartPeer::MONREQ, CasolartPeer::STAREQ, CasolartPeer::MOTREQ, CasolartPeer::BENREQ, CasolartPeer::MONDES, CasolartPeer::OBSREQ, CasolartPeer::UNIRES, CasolartPeer::TIPMON, CasolartPeer::VALMON, CasolartPeer::FECANU, CasolartPeer::CODPRO, CasolartPeer::REQCOM, CasolartPeer::TIPFIN, CasolartPeer::TIPREQ, CasolartPeer::APRREQ, CasolartPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart', 'fecreq', 'desreq', 'monreq', 'stareq', 'motreq', 'benreq', 'mondes', 'obsreq', 'unires', 'tipmon', 'valmon', 'fecanu', 'codpro', 'reqcom', 'tipfin', 'tipreq', 'aprreq', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart' => 0, 'Fecreq' => 1, 'Desreq' => 2, 'Monreq' => 3, 'Stareq' => 4, 'Motreq' => 5, 'Benreq' => 6, 'Mondes' => 7, 'Obsreq' => 8, 'Unires' => 9, 'Tipmon' => 10, 'Valmon' => 11, 'Fecanu' => 12, 'Codpro' => 13, 'Reqcom' => 14, 'Tipfin' => 15, 'Tipreq' => 16, 'Aprreq' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (CasolartPeer::REQART => 0, CasolartPeer::FECREQ => 1, CasolartPeer::DESREQ => 2, CasolartPeer::MONREQ => 3, CasolartPeer::STAREQ => 4, CasolartPeer::MOTREQ => 5, CasolartPeer::BENREQ => 6, CasolartPeer::MONDES => 7, CasolartPeer::OBSREQ => 8, CasolartPeer::UNIRES => 9, CasolartPeer::TIPMON => 10, CasolartPeer::VALMON => 11, CasolartPeer::FECANU => 12, CasolartPeer::CODPRO => 13, CasolartPeer::REQCOM => 14, CasolartPeer::TIPFIN => 15, CasolartPeer::TIPREQ => 16, CasolartPeer::APRREQ => 17, CasolartPeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart' => 0, 'fecreq' => 1, 'desreq' => 2, 'monreq' => 3, 'stareq' => 4, 'motreq' => 5, 'benreq' => 6, 'mondes' => 7, 'obsreq' => 8, 'unires' => 9, 'tipmon' => 10, 'valmon' => 11, 'fecanu' => 12, 'codpro' => 13, 'reqcom' => 14, 'tipfin' => 15, 'tipreq' => 16, 'aprreq' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CasolartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CasolartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CasolartPeer::getTableMap();
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
		return str_replace(CasolartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CasolartPeer::REQART);

		$criteria->addSelectColumn(CasolartPeer::FECREQ);

		$criteria->addSelectColumn(CasolartPeer::DESREQ);

		$criteria->addSelectColumn(CasolartPeer::MONREQ);

		$criteria->addSelectColumn(CasolartPeer::STAREQ);

		$criteria->addSelectColumn(CasolartPeer::MOTREQ);

		$criteria->addSelectColumn(CasolartPeer::BENREQ);

		$criteria->addSelectColumn(CasolartPeer::MONDES);

		$criteria->addSelectColumn(CasolartPeer::OBSREQ);

		$criteria->addSelectColumn(CasolartPeer::UNIRES);

		$criteria->addSelectColumn(CasolartPeer::TIPMON);

		$criteria->addSelectColumn(CasolartPeer::VALMON);

		$criteria->addSelectColumn(CasolartPeer::FECANU);

		$criteria->addSelectColumn(CasolartPeer::CODPRO);

		$criteria->addSelectColumn(CasolartPeer::REQCOM);

		$criteria->addSelectColumn(CasolartPeer::TIPFIN);

		$criteria->addSelectColumn(CasolartPeer::TIPREQ);

		$criteria->addSelectColumn(CasolartPeer::APRREQ);

		$criteria->addSelectColumn(CasolartPeer::ID);

	}

	const COUNT = 'COUNT(casolart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT casolart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CasolartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CasolartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CasolartPeer::doSelectRS($criteria, $con);
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
		$objects = CasolartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CasolartPeer::populateObjects(CasolartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CasolartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CasolartPeer::getOMClass();
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
		return CasolartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CasolartPeer::ID); 

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
			$comparison = $criteria->getComparison(CasolartPeer::ID);
			$selectCriteria->add(CasolartPeer::ID, $criteria->remove(CasolartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CasolartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CasolartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Casolart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CasolartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Casolart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CasolartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CasolartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CasolartPeer::DATABASE_NAME, CasolartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CasolartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CasolartPeer::DATABASE_NAME);

		$criteria->add(CasolartPeer::ID, $pk);


		$v = CasolartPeer::doSelect($criteria, $con);

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
			$criteria->add(CasolartPeer::ID, $pks, Criteria::IN);
			$objs = CasolartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCasolartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CasolartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CasolartMapBuilder');
}
