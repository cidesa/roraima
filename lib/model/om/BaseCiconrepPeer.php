<?php


abstract class BaseCiconrepPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ciconrep';

	
	const CLASS_DEFAULT = 'lib.model.Ciconrep';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RIFCON = 'ciconrep.RIFCON';

	
	const REPCON = 'ciconrep.REPCON';

	
	const NITCON = 'ciconrep.NITCON';

	
	const NOMCON = 'ciconrep.NOMCON';

	
	const NACCON = 'ciconrep.NACCON';

	
	const DIRCON = 'ciconrep.DIRCON';

	
	const CODPAR = 'ciconrep.CODPAR';

	
	const CIUCON = 'ciconrep.CIUCON';

	
	const CPOCON = 'ciconrep.CPOCON';

	
	const APOCON = 'ciconrep.APOCON';

	
	const TIPCON = 'ciconrep.TIPCON';

	
	const TELCON = 'ciconrep.TELCON';

	
	const FAXCON = 'ciconrep.FAXCON';

	
	const EMACON = 'ciconrep.EMACON';

	
	const URLCON = 'ciconrep.URLCON';

	
	const ID = 'ciconrep.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Rifcon', 'Repcon', 'Nitcon', 'Nomcon', 'Naccon', 'Dircon', 'Codpar', 'Ciucon', 'Cpocon', 'Apocon', 'Tipcon', 'Telcon', 'Faxcon', 'Emacon', 'Urlcon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CiconrepPeer::RIFCON, CiconrepPeer::REPCON, CiconrepPeer::NITCON, CiconrepPeer::NOMCON, CiconrepPeer::NACCON, CiconrepPeer::DIRCON, CiconrepPeer::CODPAR, CiconrepPeer::CIUCON, CiconrepPeer::CPOCON, CiconrepPeer::APOCON, CiconrepPeer::TIPCON, CiconrepPeer::TELCON, CiconrepPeer::FAXCON, CiconrepPeer::EMACON, CiconrepPeer::URLCON, CiconrepPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('rifcon', 'repcon', 'nitcon', 'nomcon', 'naccon', 'dircon', 'codpar', 'ciucon', 'cpocon', 'apocon', 'tipcon', 'telcon', 'faxcon', 'emacon', 'urlcon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Rifcon' => 0, 'Repcon' => 1, 'Nitcon' => 2, 'Nomcon' => 3, 'Naccon' => 4, 'Dircon' => 5, 'Codpar' => 6, 'Ciucon' => 7, 'Cpocon' => 8, 'Apocon' => 9, 'Tipcon' => 10, 'Telcon' => 11, 'Faxcon' => 12, 'Emacon' => 13, 'Urlcon' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (CiconrepPeer::RIFCON => 0, CiconrepPeer::REPCON => 1, CiconrepPeer::NITCON => 2, CiconrepPeer::NOMCON => 3, CiconrepPeer::NACCON => 4, CiconrepPeer::DIRCON => 5, CiconrepPeer::CODPAR => 6, CiconrepPeer::CIUCON => 7, CiconrepPeer::CPOCON => 8, CiconrepPeer::APOCON => 9, CiconrepPeer::TIPCON => 10, CiconrepPeer::TELCON => 11, CiconrepPeer::FAXCON => 12, CiconrepPeer::EMACON => 13, CiconrepPeer::URLCON => 14, CiconrepPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('rifcon' => 0, 'repcon' => 1, 'nitcon' => 2, 'nomcon' => 3, 'naccon' => 4, 'dircon' => 5, 'codpar' => 6, 'ciucon' => 7, 'cpocon' => 8, 'apocon' => 9, 'tipcon' => 10, 'telcon' => 11, 'faxcon' => 12, 'emacon' => 13, 'urlcon' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CiconrepMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CiconrepMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CiconrepPeer::getTableMap();
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
		return str_replace(CiconrepPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CiconrepPeer::RIFCON);

		$criteria->addSelectColumn(CiconrepPeer::REPCON);

		$criteria->addSelectColumn(CiconrepPeer::NITCON);

		$criteria->addSelectColumn(CiconrepPeer::NOMCON);

		$criteria->addSelectColumn(CiconrepPeer::NACCON);

		$criteria->addSelectColumn(CiconrepPeer::DIRCON);

		$criteria->addSelectColumn(CiconrepPeer::CODPAR);

		$criteria->addSelectColumn(CiconrepPeer::CIUCON);

		$criteria->addSelectColumn(CiconrepPeer::CPOCON);

		$criteria->addSelectColumn(CiconrepPeer::APOCON);

		$criteria->addSelectColumn(CiconrepPeer::TIPCON);

		$criteria->addSelectColumn(CiconrepPeer::TELCON);

		$criteria->addSelectColumn(CiconrepPeer::FAXCON);

		$criteria->addSelectColumn(CiconrepPeer::EMACON);

		$criteria->addSelectColumn(CiconrepPeer::URLCON);

		$criteria->addSelectColumn(CiconrepPeer::ID);

	}

	const COUNT = 'COUNT(ciconrep.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ciconrep.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CiconrepPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CiconrepPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CiconrepPeer::doSelectRS($criteria, $con);
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
		$objects = CiconrepPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CiconrepPeer::populateObjects(CiconrepPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CiconrepPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CiconrepPeer::getOMClass();
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
		return CiconrepPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CiconrepPeer::ID);
			$selectCriteria->add(CiconrepPeer::ID, $criteria->remove(CiconrepPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CiconrepPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CiconrepPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ciconrep) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CiconrepPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ciconrep $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CiconrepPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CiconrepPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CiconrepPeer::DATABASE_NAME, CiconrepPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CiconrepPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CiconrepPeer::DATABASE_NAME);

		$criteria->add(CiconrepPeer::ID, $pk);


		$v = CiconrepPeer::doSelect($criteria, $con);

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
			$criteria->add(CiconrepPeer::ID, $pks, Criteria::IN);
			$objs = CiconrepPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCiconrepPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CiconrepMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CiconrepMapBuilder');
}
