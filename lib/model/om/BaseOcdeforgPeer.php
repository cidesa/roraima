<?php


abstract class BaseOcdeforgPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocdeforg';

	
	const CLASS_DEFAULT = 'lib.model.Ocdeforg';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODORG = 'ocdeforg.CODORG';

	
	const DESORG = 'ocdeforg.DESORG';

	
	const CODTIPORG = 'ocdeforg.CODTIPORG';

	
	const ENTORG = 'ocdeforg.ENTORG';

	
	const DIRORG = 'ocdeforg.DIRORG';

	
	const CODPAI = 'ocdeforg.CODPAI';

	
	const CODEDO = 'ocdeforg.CODEDO';

	
	const CODCIU = 'ocdeforg.CODCIU';

	
	const TELORG = 'ocdeforg.TELORG';

	
	const FAXORG = 'ocdeforg.FAXORG';

	
	const EMAORG = 'ocdeforg.EMAORG';

	
	const ID = 'ocdeforg.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codorg', 'Desorg', 'Codtiporg', 'Entorg', 'Dirorg', 'Codpai', 'Codedo', 'Codciu', 'Telorg', 'Faxorg', 'Emaorg', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcdeforgPeer::CODORG, OcdeforgPeer::DESORG, OcdeforgPeer::CODTIPORG, OcdeforgPeer::ENTORG, OcdeforgPeer::DIRORG, OcdeforgPeer::CODPAI, OcdeforgPeer::CODEDO, OcdeforgPeer::CODCIU, OcdeforgPeer::TELORG, OcdeforgPeer::FAXORG, OcdeforgPeer::EMAORG, OcdeforgPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codorg', 'desorg', 'codtiporg', 'entorg', 'dirorg', 'codpai', 'codedo', 'codciu', 'telorg', 'faxorg', 'emaorg', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codorg' => 0, 'Desorg' => 1, 'Codtiporg' => 2, 'Entorg' => 3, 'Dirorg' => 4, 'Codpai' => 5, 'Codedo' => 6, 'Codciu' => 7, 'Telorg' => 8, 'Faxorg' => 9, 'Emaorg' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (OcdeforgPeer::CODORG => 0, OcdeforgPeer::DESORG => 1, OcdeforgPeer::CODTIPORG => 2, OcdeforgPeer::ENTORG => 3, OcdeforgPeer::DIRORG => 4, OcdeforgPeer::CODPAI => 5, OcdeforgPeer::CODEDO => 6, OcdeforgPeer::CODCIU => 7, OcdeforgPeer::TELORG => 8, OcdeforgPeer::FAXORG => 9, OcdeforgPeer::EMAORG => 10, OcdeforgPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codorg' => 0, 'desorg' => 1, 'codtiporg' => 2, 'entorg' => 3, 'dirorg' => 4, 'codpai' => 5, 'codedo' => 6, 'codciu' => 7, 'telorg' => 8, 'faxorg' => 9, 'emaorg' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcdeforgMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcdeforgMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcdeforgPeer::getTableMap();
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
		return str_replace(OcdeforgPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcdeforgPeer::CODORG);

		$criteria->addSelectColumn(OcdeforgPeer::DESORG);

		$criteria->addSelectColumn(OcdeforgPeer::CODTIPORG);

		$criteria->addSelectColumn(OcdeforgPeer::ENTORG);

		$criteria->addSelectColumn(OcdeforgPeer::DIRORG);

		$criteria->addSelectColumn(OcdeforgPeer::CODPAI);

		$criteria->addSelectColumn(OcdeforgPeer::CODEDO);

		$criteria->addSelectColumn(OcdeforgPeer::CODCIU);

		$criteria->addSelectColumn(OcdeforgPeer::TELORG);

		$criteria->addSelectColumn(OcdeforgPeer::FAXORG);

		$criteria->addSelectColumn(OcdeforgPeer::EMAORG);

		$criteria->addSelectColumn(OcdeforgPeer::ID);

	}

	const COUNT = 'COUNT(ocdeforg.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocdeforg.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcdeforgPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcdeforgPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcdeforgPeer::doSelectRS($criteria, $con);
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
		$objects = OcdeforgPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcdeforgPeer::populateObjects(OcdeforgPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcdeforgPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcdeforgPeer::getOMClass();
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
		return OcdeforgPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OcdeforgPeer::ID); 

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
			$comparison = $criteria->getComparison(OcdeforgPeer::ID);
			$selectCriteria->add(OcdeforgPeer::ID, $criteria->remove(OcdeforgPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OcdeforgPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OcdeforgPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocdeforg) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcdeforgPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ocdeforg $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcdeforgPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcdeforgPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OcdeforgPeer::DATABASE_NAME, OcdeforgPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcdeforgPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OcdeforgPeer::DATABASE_NAME);

		$criteria->add(OcdeforgPeer::ID, $pk);


		$v = OcdeforgPeer::doSelect($criteria, $con);

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
			$criteria->add(OcdeforgPeer::ID, $pks, Criteria::IN);
			$objs = OcdeforgPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcdeforgPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcdeforgMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcdeforgMapBuilder');
}
