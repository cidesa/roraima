<?php


abstract class BaseBndefinsPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bndefins';

	
	const CLASS_DEFAULT = 'lib.model.Bndefins';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODINS = 'bndefins.CODINS';

	
	const NOMINS = 'bndefins.NOMINS';

	
	const DIRINS = 'bndefins.DIRINS';

	
	const TELINS = 'bndefins.TELINS';

	
	const FAXINS = 'bndefins.FAXINS';

	
	const EMAIL = 'bndefins.EMAIL';

	
	const EDOINS = 'bndefins.EDOINS';

	
	const MUNINS = 'bndefins.MUNINS';

	
	const PAQINS = 'bndefins.PAQINS';

	
	const FORACT = 'bndefins.FORACT';

	
	const DESACT = 'bndefins.DESACT';

	
	const LONACT = 'bndefins.LONACT';

	
	const FORUBI = 'bndefins.FORUBI';

	
	const DESUBI = 'bndefins.DESUBI';

	
	const LONUBI = 'bndefins.LONUBI';

	
	const FECPER = 'bndefins.FECPER';

	
	const FECEJE = 'bndefins.FECEJE';

	
	const CODDES = 'bndefins.CODDES';

	
	const CODINC = 'bndefins.CODINC';

	
	const PORREV = 'bndefins.PORREV';

	
	const CORRMUE = 'bndefins.CORRMUE';

	
	const ID = 'bndefins.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codins', 'Nomins', 'Dirins', 'Telins', 'Faxins', 'Email', 'Edoins', 'Munins', 'Paqins', 'Foract', 'Desact', 'Lonact', 'Forubi', 'Desubi', 'Lonubi', 'Fecper', 'Feceje', 'Coddes', 'Codinc', 'Porrev', 'Corrmue', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BndefinsPeer::CODINS, BndefinsPeer::NOMINS, BndefinsPeer::DIRINS, BndefinsPeer::TELINS, BndefinsPeer::FAXINS, BndefinsPeer::EMAIL, BndefinsPeer::EDOINS, BndefinsPeer::MUNINS, BndefinsPeer::PAQINS, BndefinsPeer::FORACT, BndefinsPeer::DESACT, BndefinsPeer::LONACT, BndefinsPeer::FORUBI, BndefinsPeer::DESUBI, BndefinsPeer::LONUBI, BndefinsPeer::FECPER, BndefinsPeer::FECEJE, BndefinsPeer::CODDES, BndefinsPeer::CODINC, BndefinsPeer::PORREV, BndefinsPeer::CORRMUE, BndefinsPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codins', 'nomins', 'dirins', 'telins', 'faxins', 'email', 'edoins', 'munins', 'paqins', 'foract', 'desact', 'lonact', 'forubi', 'desubi', 'lonubi', 'fecper', 'feceje', 'coddes', 'codinc', 'porrev', 'corrmue', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codins' => 0, 'Nomins' => 1, 'Dirins' => 2, 'Telins' => 3, 'Faxins' => 4, 'Email' => 5, 'Edoins' => 6, 'Munins' => 7, 'Paqins' => 8, 'Foract' => 9, 'Desact' => 10, 'Lonact' => 11, 'Forubi' => 12, 'Desubi' => 13, 'Lonubi' => 14, 'Fecper' => 15, 'Feceje' => 16, 'Coddes' => 17, 'Codinc' => 18, 'Porrev' => 19, 'Corrmue' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (BndefinsPeer::CODINS => 0, BndefinsPeer::NOMINS => 1, BndefinsPeer::DIRINS => 2, BndefinsPeer::TELINS => 3, BndefinsPeer::FAXINS => 4, BndefinsPeer::EMAIL => 5, BndefinsPeer::EDOINS => 6, BndefinsPeer::MUNINS => 7, BndefinsPeer::PAQINS => 8, BndefinsPeer::FORACT => 9, BndefinsPeer::DESACT => 10, BndefinsPeer::LONACT => 11, BndefinsPeer::FORUBI => 12, BndefinsPeer::DESUBI => 13, BndefinsPeer::LONUBI => 14, BndefinsPeer::FECPER => 15, BndefinsPeer::FECEJE => 16, BndefinsPeer::CODDES => 17, BndefinsPeer::CODINC => 18, BndefinsPeer::PORREV => 19, BndefinsPeer::CORRMUE => 20, BndefinsPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('codins' => 0, 'nomins' => 1, 'dirins' => 2, 'telins' => 3, 'faxins' => 4, 'email' => 5, 'edoins' => 6, 'munins' => 7, 'paqins' => 8, 'foract' => 9, 'desact' => 10, 'lonact' => 11, 'forubi' => 12, 'desubi' => 13, 'lonubi' => 14, 'fecper' => 15, 'feceje' => 16, 'coddes' => 17, 'codinc' => 18, 'porrev' => 19, 'corrmue' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BndefinsMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BndefinsMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BndefinsPeer::getTableMap();
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
		return str_replace(BndefinsPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BndefinsPeer::CODINS);

		$criteria->addSelectColumn(BndefinsPeer::NOMINS);

		$criteria->addSelectColumn(BndefinsPeer::DIRINS);

		$criteria->addSelectColumn(BndefinsPeer::TELINS);

		$criteria->addSelectColumn(BndefinsPeer::FAXINS);

		$criteria->addSelectColumn(BndefinsPeer::EMAIL);

		$criteria->addSelectColumn(BndefinsPeer::EDOINS);

		$criteria->addSelectColumn(BndefinsPeer::MUNINS);

		$criteria->addSelectColumn(BndefinsPeer::PAQINS);

		$criteria->addSelectColumn(BndefinsPeer::FORACT);

		$criteria->addSelectColumn(BndefinsPeer::DESACT);

		$criteria->addSelectColumn(BndefinsPeer::LONACT);

		$criteria->addSelectColumn(BndefinsPeer::FORUBI);

		$criteria->addSelectColumn(BndefinsPeer::DESUBI);

		$criteria->addSelectColumn(BndefinsPeer::LONUBI);

		$criteria->addSelectColumn(BndefinsPeer::FECPER);

		$criteria->addSelectColumn(BndefinsPeer::FECEJE);

		$criteria->addSelectColumn(BndefinsPeer::CODDES);

		$criteria->addSelectColumn(BndefinsPeer::CODINC);

		$criteria->addSelectColumn(BndefinsPeer::PORREV);

		$criteria->addSelectColumn(BndefinsPeer::CORRMUE);

		$criteria->addSelectColumn(BndefinsPeer::ID);

	}

	const COUNT = 'COUNT(bndefins.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bndefins.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BndefinsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BndefinsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BndefinsPeer::doSelectRS($criteria, $con);
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
		$objects = BndefinsPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BndefinsPeer::populateObjects(BndefinsPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BndefinsPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BndefinsPeer::getOMClass();
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
		return BndefinsPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BndefinsPeer::ID); 

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
			$comparison = $criteria->getComparison(BndefinsPeer::ID);
			$selectCriteria->add(BndefinsPeer::ID, $criteria->remove(BndefinsPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BndefinsPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BndefinsPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bndefins) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BndefinsPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bndefins $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BndefinsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BndefinsPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BndefinsPeer::DATABASE_NAME, BndefinsPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BndefinsPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BndefinsPeer::DATABASE_NAME);

		$criteria->add(BndefinsPeer::ID, $pk);


		$v = BndefinsPeer::doSelect($criteria, $con);

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
			$criteria->add(BndefinsPeer::ID, $pks, Criteria::IN);
			$objs = BndefinsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBndefinsPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BndefinsMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BndefinsMapBuilder');
}
