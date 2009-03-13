<?php


abstract class BaseFcconrep1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcconrep1';

	
	const CLASS_DEFAULT = 'lib.model.Fcconrep1';

	
	const NUM_COLUMNS = 28;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDCON = 'fcconrep1.CEDCON';

	
	const RIFCON = 'fcconrep1.RIFCON';

	
	const NOMCON = 'fcconrep1.NOMCON';

	
	const REPCON = 'fcconrep1.REPCON';

	
	const DIRCON = 'fcconrep1.DIRCON';

	
	const TELCON = 'fcconrep1.TELCON';

	
	const EMACON = 'fcconrep1.EMACON';

	
	const CODSEC = 'fcconrep1.CODSEC';

	
	const CODPAR = 'fcconrep1.CODPAR';

	
	const NITCON = 'fcconrep1.NITCON';

	
	const CODMUN = 'fcconrep1.CODMUN';

	
	const CODEDO = 'fcconrep1.CODEDO';

	
	const CODPAI = 'fcconrep1.CODPAI';

	
	const CIUCON = 'fcconrep1.CIUCON';

	
	const CPOCON = 'fcconrep1.CPOCON';

	
	const APOCON = 'fcconrep1.APOCON';

	
	const URLCON = 'fcconrep1.URLCON';

	
	const NACCON = 'fcconrep1.NACCON';

	
	const TIPCON = 'fcconrep1.TIPCON';

	
	const FAXCON = 'fcconrep1.FAXCON';

	
	const CLACON = 'fcconrep1.CLACON';

	
	const FECDESCON = 'fcconrep1.FECDESCON';

	
	const FECACTCON = 'fcconrep1.FECACTCON';

	
	const STACON = 'fcconrep1.STACON';

	
	const ORIGEN = 'fcconrep1.ORIGEN';

	
	const NOMNEG = 'fcconrep1.NOMNEG';

	
	const RECCON = 'fcconrep1.RECCON';

	
	const ID = 'fcconrep1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedcon', 'Rifcon', 'Nomcon', 'Repcon', 'Dircon', 'Telcon', 'Emacon', 'Codsec', 'Codpar', 'Nitcon', 'Codmun', 'Codedo', 'Codpai', 'Ciucon', 'Cpocon', 'Apocon', 'Urlcon', 'Naccon', 'Tipcon', 'Faxcon', 'Clacon', 'Fecdescon', 'Fecactcon', 'Stacon', 'Origen', 'Nomneg', 'Reccon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Fcconrep1Peer::CEDCON, Fcconrep1Peer::RIFCON, Fcconrep1Peer::NOMCON, Fcconrep1Peer::REPCON, Fcconrep1Peer::DIRCON, Fcconrep1Peer::TELCON, Fcconrep1Peer::EMACON, Fcconrep1Peer::CODSEC, Fcconrep1Peer::CODPAR, Fcconrep1Peer::NITCON, Fcconrep1Peer::CODMUN, Fcconrep1Peer::CODEDO, Fcconrep1Peer::CODPAI, Fcconrep1Peer::CIUCON, Fcconrep1Peer::CPOCON, Fcconrep1Peer::APOCON, Fcconrep1Peer::URLCON, Fcconrep1Peer::NACCON, Fcconrep1Peer::TIPCON, Fcconrep1Peer::FAXCON, Fcconrep1Peer::CLACON, Fcconrep1Peer::FECDESCON, Fcconrep1Peer::FECACTCON, Fcconrep1Peer::STACON, Fcconrep1Peer::ORIGEN, Fcconrep1Peer::NOMNEG, Fcconrep1Peer::RECCON, Fcconrep1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedcon', 'rifcon', 'nomcon', 'repcon', 'dircon', 'telcon', 'emacon', 'codsec', 'codpar', 'nitcon', 'codmun', 'codedo', 'codpai', 'ciucon', 'cpocon', 'apocon', 'urlcon', 'naccon', 'tipcon', 'faxcon', 'clacon', 'fecdescon', 'fecactcon', 'stacon', 'origen', 'nomneg', 'reccon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedcon' => 0, 'Rifcon' => 1, 'Nomcon' => 2, 'Repcon' => 3, 'Dircon' => 4, 'Telcon' => 5, 'Emacon' => 6, 'Codsec' => 7, 'Codpar' => 8, 'Nitcon' => 9, 'Codmun' => 10, 'Codedo' => 11, 'Codpai' => 12, 'Ciucon' => 13, 'Cpocon' => 14, 'Apocon' => 15, 'Urlcon' => 16, 'Naccon' => 17, 'Tipcon' => 18, 'Faxcon' => 19, 'Clacon' => 20, 'Fecdescon' => 21, 'Fecactcon' => 22, 'Stacon' => 23, 'Origen' => 24, 'Nomneg' => 25, 'Reccon' => 26, 'Id' => 27, ),
		BasePeer::TYPE_COLNAME => array (Fcconrep1Peer::CEDCON => 0, Fcconrep1Peer::RIFCON => 1, Fcconrep1Peer::NOMCON => 2, Fcconrep1Peer::REPCON => 3, Fcconrep1Peer::DIRCON => 4, Fcconrep1Peer::TELCON => 5, Fcconrep1Peer::EMACON => 6, Fcconrep1Peer::CODSEC => 7, Fcconrep1Peer::CODPAR => 8, Fcconrep1Peer::NITCON => 9, Fcconrep1Peer::CODMUN => 10, Fcconrep1Peer::CODEDO => 11, Fcconrep1Peer::CODPAI => 12, Fcconrep1Peer::CIUCON => 13, Fcconrep1Peer::CPOCON => 14, Fcconrep1Peer::APOCON => 15, Fcconrep1Peer::URLCON => 16, Fcconrep1Peer::NACCON => 17, Fcconrep1Peer::TIPCON => 18, Fcconrep1Peer::FAXCON => 19, Fcconrep1Peer::CLACON => 20, Fcconrep1Peer::FECDESCON => 21, Fcconrep1Peer::FECACTCON => 22, Fcconrep1Peer::STACON => 23, Fcconrep1Peer::ORIGEN => 24, Fcconrep1Peer::NOMNEG => 25, Fcconrep1Peer::RECCON => 26, Fcconrep1Peer::ID => 27, ),
		BasePeer::TYPE_FIELDNAME => array ('cedcon' => 0, 'rifcon' => 1, 'nomcon' => 2, 'repcon' => 3, 'dircon' => 4, 'telcon' => 5, 'emacon' => 6, 'codsec' => 7, 'codpar' => 8, 'nitcon' => 9, 'codmun' => 10, 'codedo' => 11, 'codpai' => 12, 'ciucon' => 13, 'cpocon' => 14, 'apocon' => 15, 'urlcon' => 16, 'naccon' => 17, 'tipcon' => 18, 'faxcon' => 19, 'clacon' => 20, 'fecdescon' => 21, 'fecactcon' => 22, 'stacon' => 23, 'origen' => 24, 'nomneg' => 25, 'reccon' => 26, 'id' => 27, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Fcconrep1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Fcconrep1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Fcconrep1Peer::getTableMap();
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
		return str_replace(Fcconrep1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Fcconrep1Peer::CEDCON);

		$criteria->addSelectColumn(Fcconrep1Peer::RIFCON);

		$criteria->addSelectColumn(Fcconrep1Peer::NOMCON);

		$criteria->addSelectColumn(Fcconrep1Peer::REPCON);

		$criteria->addSelectColumn(Fcconrep1Peer::DIRCON);

		$criteria->addSelectColumn(Fcconrep1Peer::TELCON);

		$criteria->addSelectColumn(Fcconrep1Peer::EMACON);

		$criteria->addSelectColumn(Fcconrep1Peer::CODSEC);

		$criteria->addSelectColumn(Fcconrep1Peer::CODPAR);

		$criteria->addSelectColumn(Fcconrep1Peer::NITCON);

		$criteria->addSelectColumn(Fcconrep1Peer::CODMUN);

		$criteria->addSelectColumn(Fcconrep1Peer::CODEDO);

		$criteria->addSelectColumn(Fcconrep1Peer::CODPAI);

		$criteria->addSelectColumn(Fcconrep1Peer::CIUCON);

		$criteria->addSelectColumn(Fcconrep1Peer::CPOCON);

		$criteria->addSelectColumn(Fcconrep1Peer::APOCON);

		$criteria->addSelectColumn(Fcconrep1Peer::URLCON);

		$criteria->addSelectColumn(Fcconrep1Peer::NACCON);

		$criteria->addSelectColumn(Fcconrep1Peer::TIPCON);

		$criteria->addSelectColumn(Fcconrep1Peer::FAXCON);

		$criteria->addSelectColumn(Fcconrep1Peer::CLACON);

		$criteria->addSelectColumn(Fcconrep1Peer::FECDESCON);

		$criteria->addSelectColumn(Fcconrep1Peer::FECACTCON);

		$criteria->addSelectColumn(Fcconrep1Peer::STACON);

		$criteria->addSelectColumn(Fcconrep1Peer::ORIGEN);

		$criteria->addSelectColumn(Fcconrep1Peer::NOMNEG);

		$criteria->addSelectColumn(Fcconrep1Peer::RECCON);

		$criteria->addSelectColumn(Fcconrep1Peer::ID);

	}

	const COUNT = 'COUNT(fcconrep1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcconrep1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Fcconrep1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Fcconrep1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Fcconrep1Peer::doSelectRS($criteria, $con);
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
		$objects = Fcconrep1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Fcconrep1Peer::populateObjects(Fcconrep1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Fcconrep1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Fcconrep1Peer::getOMClass();
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
		return Fcconrep1Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Fcconrep1Peer::ID); 

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
			$comparison = $criteria->getComparison(Fcconrep1Peer::ID);
			$selectCriteria->add(Fcconrep1Peer::ID, $criteria->remove(Fcconrep1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Fcconrep1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Fcconrep1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcconrep1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Fcconrep1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcconrep1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Fcconrep1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Fcconrep1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Fcconrep1Peer::DATABASE_NAME, Fcconrep1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Fcconrep1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Fcconrep1Peer::DATABASE_NAME);

		$criteria->add(Fcconrep1Peer::ID, $pk);


		$v = Fcconrep1Peer::doSelect($criteria, $con);

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
			$criteria->add(Fcconrep1Peer::ID, $pks, Criteria::IN);
			$objs = Fcconrep1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcconrep1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Fcconrep1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Fcconrep1MapBuilder');
}
