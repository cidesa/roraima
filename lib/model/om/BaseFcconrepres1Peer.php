<?php


abstract class BaseFcconrepres1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcconrepres1';

	
	const CLASS_DEFAULT = 'lib.model.Fcconrepres1';

	
	const NUM_COLUMNS = 28;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDCON = 'fcconrepres1.CEDCON';

	
	const RIFCON = 'fcconrepres1.RIFCON';

	
	const NOMCON = 'fcconrepres1.NOMCON';

	
	const REPCON = 'fcconrepres1.REPCON';

	
	const DIRCON = 'fcconrepres1.DIRCON';

	
	const TELCON = 'fcconrepres1.TELCON';

	
	const EMACON = 'fcconrepres1.EMACON';

	
	const CODSEC = 'fcconrepres1.CODSEC';

	
	const CODPAR = 'fcconrepres1.CODPAR';

	
	const NITCON = 'fcconrepres1.NITCON';

	
	const CODMUN = 'fcconrepres1.CODMUN';

	
	const CODEDO = 'fcconrepres1.CODEDO';

	
	const CODPAI = 'fcconrepres1.CODPAI';

	
	const CIUCON = 'fcconrepres1.CIUCON';

	
	const CPOCON = 'fcconrepres1.CPOCON';

	
	const APOCON = 'fcconrepres1.APOCON';

	
	const URLCON = 'fcconrepres1.URLCON';

	
	const NACCON = 'fcconrepres1.NACCON';

	
	const TIPCON = 'fcconrepres1.TIPCON';

	
	const FAXCON = 'fcconrepres1.FAXCON';

	
	const CLACON = 'fcconrepres1.CLACON';

	
	const FECDESCON = 'fcconrepres1.FECDESCON';

	
	const FECACTCON = 'fcconrepres1.FECACTCON';

	
	const STACON = 'fcconrepres1.STACON';

	
	const ORIGEN = 'fcconrepres1.ORIGEN';

	
	const NOMNEG = 'fcconrepres1.NOMNEG';

	
	const RECCON = 'fcconrepres1.RECCON';

	
	const ID = 'fcconrepres1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedcon', 'Rifcon', 'Nomcon', 'Repcon', 'Dircon', 'Telcon', 'Emacon', 'Codsec', 'Codpar', 'Nitcon', 'Codmun', 'Codedo', 'Codpai', 'Ciucon', 'Cpocon', 'Apocon', 'Urlcon', 'Naccon', 'Tipcon', 'Faxcon', 'Clacon', 'Fecdescon', 'Fecactcon', 'Stacon', 'Origen', 'Nomneg', 'Reccon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Fcconrepres1Peer::CEDCON, Fcconrepres1Peer::RIFCON, Fcconrepres1Peer::NOMCON, Fcconrepres1Peer::REPCON, Fcconrepres1Peer::DIRCON, Fcconrepres1Peer::TELCON, Fcconrepres1Peer::EMACON, Fcconrepres1Peer::CODSEC, Fcconrepres1Peer::CODPAR, Fcconrepres1Peer::NITCON, Fcconrepres1Peer::CODMUN, Fcconrepres1Peer::CODEDO, Fcconrepres1Peer::CODPAI, Fcconrepres1Peer::CIUCON, Fcconrepres1Peer::CPOCON, Fcconrepres1Peer::APOCON, Fcconrepres1Peer::URLCON, Fcconrepres1Peer::NACCON, Fcconrepres1Peer::TIPCON, Fcconrepres1Peer::FAXCON, Fcconrepres1Peer::CLACON, Fcconrepres1Peer::FECDESCON, Fcconrepres1Peer::FECACTCON, Fcconrepres1Peer::STACON, Fcconrepres1Peer::ORIGEN, Fcconrepres1Peer::NOMNEG, Fcconrepres1Peer::RECCON, Fcconrepres1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedcon', 'rifcon', 'nomcon', 'repcon', 'dircon', 'telcon', 'emacon', 'codsec', 'codpar', 'nitcon', 'codmun', 'codedo', 'codpai', 'ciucon', 'cpocon', 'apocon', 'urlcon', 'naccon', 'tipcon', 'faxcon', 'clacon', 'fecdescon', 'fecactcon', 'stacon', 'origen', 'nomneg', 'reccon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedcon' => 0, 'Rifcon' => 1, 'Nomcon' => 2, 'Repcon' => 3, 'Dircon' => 4, 'Telcon' => 5, 'Emacon' => 6, 'Codsec' => 7, 'Codpar' => 8, 'Nitcon' => 9, 'Codmun' => 10, 'Codedo' => 11, 'Codpai' => 12, 'Ciucon' => 13, 'Cpocon' => 14, 'Apocon' => 15, 'Urlcon' => 16, 'Naccon' => 17, 'Tipcon' => 18, 'Faxcon' => 19, 'Clacon' => 20, 'Fecdescon' => 21, 'Fecactcon' => 22, 'Stacon' => 23, 'Origen' => 24, 'Nomneg' => 25, 'Reccon' => 26, 'Id' => 27, ),
		BasePeer::TYPE_COLNAME => array (Fcconrepres1Peer::CEDCON => 0, Fcconrepres1Peer::RIFCON => 1, Fcconrepres1Peer::NOMCON => 2, Fcconrepres1Peer::REPCON => 3, Fcconrepres1Peer::DIRCON => 4, Fcconrepres1Peer::TELCON => 5, Fcconrepres1Peer::EMACON => 6, Fcconrepres1Peer::CODSEC => 7, Fcconrepres1Peer::CODPAR => 8, Fcconrepres1Peer::NITCON => 9, Fcconrepres1Peer::CODMUN => 10, Fcconrepres1Peer::CODEDO => 11, Fcconrepres1Peer::CODPAI => 12, Fcconrepres1Peer::CIUCON => 13, Fcconrepres1Peer::CPOCON => 14, Fcconrepres1Peer::APOCON => 15, Fcconrepres1Peer::URLCON => 16, Fcconrepres1Peer::NACCON => 17, Fcconrepres1Peer::TIPCON => 18, Fcconrepres1Peer::FAXCON => 19, Fcconrepres1Peer::CLACON => 20, Fcconrepres1Peer::FECDESCON => 21, Fcconrepres1Peer::FECACTCON => 22, Fcconrepres1Peer::STACON => 23, Fcconrepres1Peer::ORIGEN => 24, Fcconrepres1Peer::NOMNEG => 25, Fcconrepres1Peer::RECCON => 26, Fcconrepres1Peer::ID => 27, ),
		BasePeer::TYPE_FIELDNAME => array ('cedcon' => 0, 'rifcon' => 1, 'nomcon' => 2, 'repcon' => 3, 'dircon' => 4, 'telcon' => 5, 'emacon' => 6, 'codsec' => 7, 'codpar' => 8, 'nitcon' => 9, 'codmun' => 10, 'codedo' => 11, 'codpai' => 12, 'ciucon' => 13, 'cpocon' => 14, 'apocon' => 15, 'urlcon' => 16, 'naccon' => 17, 'tipcon' => 18, 'faxcon' => 19, 'clacon' => 20, 'fecdescon' => 21, 'fecactcon' => 22, 'stacon' => 23, 'origen' => 24, 'nomneg' => 25, 'reccon' => 26, 'id' => 27, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Fcconrepres1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Fcconrepres1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Fcconrepres1Peer::getTableMap();
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
		return str_replace(Fcconrepres1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Fcconrepres1Peer::CEDCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::RIFCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::NOMCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::REPCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::DIRCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::TELCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::EMACON);

		$criteria->addSelectColumn(Fcconrepres1Peer::CODSEC);

		$criteria->addSelectColumn(Fcconrepres1Peer::CODPAR);

		$criteria->addSelectColumn(Fcconrepres1Peer::NITCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::CODMUN);

		$criteria->addSelectColumn(Fcconrepres1Peer::CODEDO);

		$criteria->addSelectColumn(Fcconrepres1Peer::CODPAI);

		$criteria->addSelectColumn(Fcconrepres1Peer::CIUCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::CPOCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::APOCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::URLCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::NACCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::TIPCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::FAXCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::CLACON);

		$criteria->addSelectColumn(Fcconrepres1Peer::FECDESCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::FECACTCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::STACON);

		$criteria->addSelectColumn(Fcconrepres1Peer::ORIGEN);

		$criteria->addSelectColumn(Fcconrepres1Peer::NOMNEG);

		$criteria->addSelectColumn(Fcconrepres1Peer::RECCON);

		$criteria->addSelectColumn(Fcconrepres1Peer::ID);

	}

	const COUNT = 'COUNT(fcconrepres1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcconrepres1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Fcconrepres1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Fcconrepres1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Fcconrepres1Peer::doSelectRS($criteria, $con);
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
		$objects = Fcconrepres1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Fcconrepres1Peer::populateObjects(Fcconrepres1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Fcconrepres1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Fcconrepres1Peer::getOMClass();
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
		return Fcconrepres1Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Fcconrepres1Peer::ID); 

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
			$comparison = $criteria->getComparison(Fcconrepres1Peer::ID);
			$selectCriteria->add(Fcconrepres1Peer::ID, $criteria->remove(Fcconrepres1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Fcconrepres1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Fcconrepres1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcconrepres1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Fcconrepres1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcconrepres1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Fcconrepres1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Fcconrepres1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Fcconrepres1Peer::DATABASE_NAME, Fcconrepres1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Fcconrepres1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Fcconrepres1Peer::DATABASE_NAME);

		$criteria->add(Fcconrepres1Peer::ID, $pk);


		$v = Fcconrepres1Peer::doSelect($criteria, $con);

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
			$criteria->add(Fcconrepres1Peer::ID, $pks, Criteria::IN);
			$objs = Fcconrepres1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcconrepres1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Fcconrepres1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Fcconrepres1MapBuilder');
}
