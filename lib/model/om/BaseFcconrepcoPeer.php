<?php


abstract class BaseFcconrepcoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcconrepco';

	
	const CLASS_DEFAULT = 'lib.model.Fcconrepco';

	
	const NUM_COLUMNS = 26;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDCON = 'fcconrepco.CEDCON';

	
	const RIFCON = 'fcconrepco.RIFCON';

	
	const NOMCON = 'fcconrepco.NOMCON';

	
	const REPCON = 'fcconrepco.REPCON';

	
	const DIRCON = 'fcconrepco.DIRCON';

	
	const TELCON = 'fcconrepco.TELCON';

	
	const EMACON = 'fcconrepco.EMACON';

	
	const CODSEC = 'fcconrepco.CODSEC';

	
	const CODPAR = 'fcconrepco.CODPAR';

	
	const NITCON = 'fcconrepco.NITCON';

	
	const CODMUN = 'fcconrepco.CODMUN';

	
	const CODEDO = 'fcconrepco.CODEDO';

	
	const CODPAI = 'fcconrepco.CODPAI';

	
	const CIUCON = 'fcconrepco.CIUCON';

	
	const CPOCON = 'fcconrepco.CPOCON';

	
	const APOCON = 'fcconrepco.APOCON';

	
	const URLCON = 'fcconrepco.URLCON';

	
	const NACCON = 'fcconrepco.NACCON';

	
	const TIPCON = 'fcconrepco.TIPCON';

	
	const FAXCON = 'fcconrepco.FAXCON';

	
	const CLACON = 'fcconrepco.CLACON';

	
	const FECDESCON = 'fcconrepco.FECDESCON';

	
	const FECACTCON = 'fcconrepco.FECACTCON';

	
	const STACON = 'fcconrepco.STACON';

	
	const ORIGEN = 'fcconrepco.ORIGEN';

	
	const ID = 'fcconrepco.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedcon', 'Rifcon', 'Nomcon', 'Repcon', 'Dircon', 'Telcon', 'Emacon', 'Codsec', 'Codpar', 'Nitcon', 'Codmun', 'Codedo', 'Codpai', 'Ciucon', 'Cpocon', 'Apocon', 'Urlcon', 'Naccon', 'Tipcon', 'Faxcon', 'Clacon', 'Fecdescon', 'Fecactcon', 'Stacon', 'Origen', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcconrepcoPeer::CEDCON, FcconrepcoPeer::RIFCON, FcconrepcoPeer::NOMCON, FcconrepcoPeer::REPCON, FcconrepcoPeer::DIRCON, FcconrepcoPeer::TELCON, FcconrepcoPeer::EMACON, FcconrepcoPeer::CODSEC, FcconrepcoPeer::CODPAR, FcconrepcoPeer::NITCON, FcconrepcoPeer::CODMUN, FcconrepcoPeer::CODEDO, FcconrepcoPeer::CODPAI, FcconrepcoPeer::CIUCON, FcconrepcoPeer::CPOCON, FcconrepcoPeer::APOCON, FcconrepcoPeer::URLCON, FcconrepcoPeer::NACCON, FcconrepcoPeer::TIPCON, FcconrepcoPeer::FAXCON, FcconrepcoPeer::CLACON, FcconrepcoPeer::FECDESCON, FcconrepcoPeer::FECACTCON, FcconrepcoPeer::STACON, FcconrepcoPeer::ORIGEN, FcconrepcoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedcon', 'rifcon', 'nomcon', 'repcon', 'dircon', 'telcon', 'emacon', 'codsec', 'codpar', 'nitcon', 'codmun', 'codedo', 'codpai', 'ciucon', 'cpocon', 'apocon', 'urlcon', 'naccon', 'tipcon', 'faxcon', 'clacon', 'fecdescon', 'fecactcon', 'stacon', 'origen', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedcon' => 0, 'Rifcon' => 1, 'Nomcon' => 2, 'Repcon' => 3, 'Dircon' => 4, 'Telcon' => 5, 'Emacon' => 6, 'Codsec' => 7, 'Codpar' => 8, 'Nitcon' => 9, 'Codmun' => 10, 'Codedo' => 11, 'Codpai' => 12, 'Ciucon' => 13, 'Cpocon' => 14, 'Apocon' => 15, 'Urlcon' => 16, 'Naccon' => 17, 'Tipcon' => 18, 'Faxcon' => 19, 'Clacon' => 20, 'Fecdescon' => 21, 'Fecactcon' => 22, 'Stacon' => 23, 'Origen' => 24, 'Id' => 25, ),
		BasePeer::TYPE_COLNAME => array (FcconrepcoPeer::CEDCON => 0, FcconrepcoPeer::RIFCON => 1, FcconrepcoPeer::NOMCON => 2, FcconrepcoPeer::REPCON => 3, FcconrepcoPeer::DIRCON => 4, FcconrepcoPeer::TELCON => 5, FcconrepcoPeer::EMACON => 6, FcconrepcoPeer::CODSEC => 7, FcconrepcoPeer::CODPAR => 8, FcconrepcoPeer::NITCON => 9, FcconrepcoPeer::CODMUN => 10, FcconrepcoPeer::CODEDO => 11, FcconrepcoPeer::CODPAI => 12, FcconrepcoPeer::CIUCON => 13, FcconrepcoPeer::CPOCON => 14, FcconrepcoPeer::APOCON => 15, FcconrepcoPeer::URLCON => 16, FcconrepcoPeer::NACCON => 17, FcconrepcoPeer::TIPCON => 18, FcconrepcoPeer::FAXCON => 19, FcconrepcoPeer::CLACON => 20, FcconrepcoPeer::FECDESCON => 21, FcconrepcoPeer::FECACTCON => 22, FcconrepcoPeer::STACON => 23, FcconrepcoPeer::ORIGEN => 24, FcconrepcoPeer::ID => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('cedcon' => 0, 'rifcon' => 1, 'nomcon' => 2, 'repcon' => 3, 'dircon' => 4, 'telcon' => 5, 'emacon' => 6, 'codsec' => 7, 'codpar' => 8, 'nitcon' => 9, 'codmun' => 10, 'codedo' => 11, 'codpai' => 12, 'ciucon' => 13, 'cpocon' => 14, 'apocon' => 15, 'urlcon' => 16, 'naccon' => 17, 'tipcon' => 18, 'faxcon' => 19, 'clacon' => 20, 'fecdescon' => 21, 'fecactcon' => 22, 'stacon' => 23, 'origen' => 24, 'id' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcconrepcoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcconrepcoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcconrepcoPeer::getTableMap();
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
		return str_replace(FcconrepcoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcconrepcoPeer::CEDCON);

		$criteria->addSelectColumn(FcconrepcoPeer::RIFCON);

		$criteria->addSelectColumn(FcconrepcoPeer::NOMCON);

		$criteria->addSelectColumn(FcconrepcoPeer::REPCON);

		$criteria->addSelectColumn(FcconrepcoPeer::DIRCON);

		$criteria->addSelectColumn(FcconrepcoPeer::TELCON);

		$criteria->addSelectColumn(FcconrepcoPeer::EMACON);

		$criteria->addSelectColumn(FcconrepcoPeer::CODSEC);

		$criteria->addSelectColumn(FcconrepcoPeer::CODPAR);

		$criteria->addSelectColumn(FcconrepcoPeer::NITCON);

		$criteria->addSelectColumn(FcconrepcoPeer::CODMUN);

		$criteria->addSelectColumn(FcconrepcoPeer::CODEDO);

		$criteria->addSelectColumn(FcconrepcoPeer::CODPAI);

		$criteria->addSelectColumn(FcconrepcoPeer::CIUCON);

		$criteria->addSelectColumn(FcconrepcoPeer::CPOCON);

		$criteria->addSelectColumn(FcconrepcoPeer::APOCON);

		$criteria->addSelectColumn(FcconrepcoPeer::URLCON);

		$criteria->addSelectColumn(FcconrepcoPeer::NACCON);

		$criteria->addSelectColumn(FcconrepcoPeer::TIPCON);

		$criteria->addSelectColumn(FcconrepcoPeer::FAXCON);

		$criteria->addSelectColumn(FcconrepcoPeer::CLACON);

		$criteria->addSelectColumn(FcconrepcoPeer::FECDESCON);

		$criteria->addSelectColumn(FcconrepcoPeer::FECACTCON);

		$criteria->addSelectColumn(FcconrepcoPeer::STACON);

		$criteria->addSelectColumn(FcconrepcoPeer::ORIGEN);

		$criteria->addSelectColumn(FcconrepcoPeer::ID);

	}

	const COUNT = 'COUNT(fcconrepco.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcconrepco.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcconrepcoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcconrepcoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcconrepcoPeer::doSelectRS($criteria, $con);
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
		$objects = FcconrepcoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcconrepcoPeer::populateObjects(FcconrepcoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcconrepcoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcconrepcoPeer::getOMClass();
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
		return FcconrepcoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcconrepcoPeer::ID); 

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
			$comparison = $criteria->getComparison(FcconrepcoPeer::ID);
			$selectCriteria->add(FcconrepcoPeer::ID, $criteria->remove(FcconrepcoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcconrepcoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcconrepcoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcconrepco) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcconrepcoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcconrepco $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcconrepcoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcconrepcoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcconrepcoPeer::DATABASE_NAME, FcconrepcoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcconrepcoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcconrepcoPeer::DATABASE_NAME);

		$criteria->add(FcconrepcoPeer::ID, $pk);


		$v = FcconrepcoPeer::doSelect($criteria, $con);

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
			$criteria->add(FcconrepcoPeer::ID, $pks, Criteria::IN);
			$objs = FcconrepcoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcconrepcoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcconrepcoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcconrepcoMapBuilder');
}
