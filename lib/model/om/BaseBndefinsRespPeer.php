<?php


abstract class BaseBndefinsRespPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bndefins_resp';

	
	const CLASS_DEFAULT = 'lib.model.BndefinsResp';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODINS = 'bndefins_resp.CODINS';

	
	const NOMINS = 'bndefins_resp.NOMINS';

	
	const DIRINS = 'bndefins_resp.DIRINS';

	
	const TELINS = 'bndefins_resp.TELINS';

	
	const FAXINS = 'bndefins_resp.FAXINS';

	
	const EMAIL = 'bndefins_resp.EMAIL';

	
	const EDOINS = 'bndefins_resp.EDOINS';

	
	const MUNINS = 'bndefins_resp.MUNINS';

	
	const PAQINS = 'bndefins_resp.PAQINS';

	
	const FORACT = 'bndefins_resp.FORACT';

	
	const DESACT = 'bndefins_resp.DESACT';

	
	const LONACT = 'bndefins_resp.LONACT';

	
	const FORUBI = 'bndefins_resp.FORUBI';

	
	const DESUBI = 'bndefins_resp.DESUBI';

	
	const LONUBI = 'bndefins_resp.LONUBI';

	
	const FECPER = 'bndefins_resp.FECPER';

	
	const FECEJE = 'bndefins_resp.FECEJE';

	
	const CODDES = 'bndefins_resp.CODDES';

	
	const PORREV = 'bndefins_resp.PORREV';

	
	const ID = 'bndefins_resp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codins', 'Nomins', 'Dirins', 'Telins', 'Faxins', 'Email', 'Edoins', 'Munins', 'Paqins', 'Foract', 'Desact', 'Lonact', 'Forubi', 'Desubi', 'Lonubi', 'Fecper', 'Feceje', 'Coddes', 'Porrev', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BndefinsRespPeer::CODINS, BndefinsRespPeer::NOMINS, BndefinsRespPeer::DIRINS, BndefinsRespPeer::TELINS, BndefinsRespPeer::FAXINS, BndefinsRespPeer::EMAIL, BndefinsRespPeer::EDOINS, BndefinsRespPeer::MUNINS, BndefinsRespPeer::PAQINS, BndefinsRespPeer::FORACT, BndefinsRespPeer::DESACT, BndefinsRespPeer::LONACT, BndefinsRespPeer::FORUBI, BndefinsRespPeer::DESUBI, BndefinsRespPeer::LONUBI, BndefinsRespPeer::FECPER, BndefinsRespPeer::FECEJE, BndefinsRespPeer::CODDES, BndefinsRespPeer::PORREV, BndefinsRespPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codins', 'nomins', 'dirins', 'telins', 'faxins', 'email', 'edoins', 'munins', 'paqins', 'foract', 'desact', 'lonact', 'forubi', 'desubi', 'lonubi', 'fecper', 'feceje', 'coddes', 'porrev', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codins' => 0, 'Nomins' => 1, 'Dirins' => 2, 'Telins' => 3, 'Faxins' => 4, 'Email' => 5, 'Edoins' => 6, 'Munins' => 7, 'Paqins' => 8, 'Foract' => 9, 'Desact' => 10, 'Lonact' => 11, 'Forubi' => 12, 'Desubi' => 13, 'Lonubi' => 14, 'Fecper' => 15, 'Feceje' => 16, 'Coddes' => 17, 'Porrev' => 18, 'Id' => 19, ),
		BasePeer::TYPE_COLNAME => array (BndefinsRespPeer::CODINS => 0, BndefinsRespPeer::NOMINS => 1, BndefinsRespPeer::DIRINS => 2, BndefinsRespPeer::TELINS => 3, BndefinsRespPeer::FAXINS => 4, BndefinsRespPeer::EMAIL => 5, BndefinsRespPeer::EDOINS => 6, BndefinsRespPeer::MUNINS => 7, BndefinsRespPeer::PAQINS => 8, BndefinsRespPeer::FORACT => 9, BndefinsRespPeer::DESACT => 10, BndefinsRespPeer::LONACT => 11, BndefinsRespPeer::FORUBI => 12, BndefinsRespPeer::DESUBI => 13, BndefinsRespPeer::LONUBI => 14, BndefinsRespPeer::FECPER => 15, BndefinsRespPeer::FECEJE => 16, BndefinsRespPeer::CODDES => 17, BndefinsRespPeer::PORREV => 18, BndefinsRespPeer::ID => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('codins' => 0, 'nomins' => 1, 'dirins' => 2, 'telins' => 3, 'faxins' => 4, 'email' => 5, 'edoins' => 6, 'munins' => 7, 'paqins' => 8, 'foract' => 9, 'desact' => 10, 'lonact' => 11, 'forubi' => 12, 'desubi' => 13, 'lonubi' => 14, 'fecper' => 15, 'feceje' => 16, 'coddes' => 17, 'porrev' => 18, 'id' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BndefinsRespMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BndefinsRespMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BndefinsRespPeer::getTableMap();
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
		return str_replace(BndefinsRespPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BndefinsRespPeer::CODINS);

		$criteria->addSelectColumn(BndefinsRespPeer::NOMINS);

		$criteria->addSelectColumn(BndefinsRespPeer::DIRINS);

		$criteria->addSelectColumn(BndefinsRespPeer::TELINS);

		$criteria->addSelectColumn(BndefinsRespPeer::FAXINS);

		$criteria->addSelectColumn(BndefinsRespPeer::EMAIL);

		$criteria->addSelectColumn(BndefinsRespPeer::EDOINS);

		$criteria->addSelectColumn(BndefinsRespPeer::MUNINS);

		$criteria->addSelectColumn(BndefinsRespPeer::PAQINS);

		$criteria->addSelectColumn(BndefinsRespPeer::FORACT);

		$criteria->addSelectColumn(BndefinsRespPeer::DESACT);

		$criteria->addSelectColumn(BndefinsRespPeer::LONACT);

		$criteria->addSelectColumn(BndefinsRespPeer::FORUBI);

		$criteria->addSelectColumn(BndefinsRespPeer::DESUBI);

		$criteria->addSelectColumn(BndefinsRespPeer::LONUBI);

		$criteria->addSelectColumn(BndefinsRespPeer::FECPER);

		$criteria->addSelectColumn(BndefinsRespPeer::FECEJE);

		$criteria->addSelectColumn(BndefinsRespPeer::CODDES);

		$criteria->addSelectColumn(BndefinsRespPeer::PORREV);

		$criteria->addSelectColumn(BndefinsRespPeer::ID);

	}

	const COUNT = 'COUNT(bndefins_resp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bndefins_resp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BndefinsRespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BndefinsRespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BndefinsRespPeer::doSelectRS($criteria, $con);
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
		$objects = BndefinsRespPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BndefinsRespPeer::populateObjects(BndefinsRespPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BndefinsRespPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BndefinsRespPeer::getOMClass();
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
		return BndefinsRespPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BndefinsRespPeer::ID); 

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
			$comparison = $criteria->getComparison(BndefinsRespPeer::ID);
			$selectCriteria->add(BndefinsRespPeer::ID, $criteria->remove(BndefinsRespPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BndefinsRespPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BndefinsRespPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof BndefinsResp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BndefinsRespPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(BndefinsResp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BndefinsRespPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BndefinsRespPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BndefinsRespPeer::DATABASE_NAME, BndefinsRespPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BndefinsRespPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BndefinsRespPeer::DATABASE_NAME);

		$criteria->add(BndefinsRespPeer::ID, $pk);


		$v = BndefinsRespPeer::doSelect($criteria, $con);

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
			$criteria->add(BndefinsRespPeer::ID, $pks, Criteria::IN);
			$objs = BndefinsRespPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBndefinsRespPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BndefinsRespMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BndefinsRespMapBuilder');
}
