<?php


abstract class BaseFcconrepPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcconrep';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcconrep';

	
	const NUM_COLUMNS = 29;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDCON = 'fcconrep.CEDCON';

	
	const RIFCON = 'fcconrep.RIFCON';

	
	const NOMCON = 'fcconrep.NOMCON';

	
	const REPCON = 'fcconrep.REPCON';

	
	const DIRCON = 'fcconrep.DIRCON';

	
	const TELCON = 'fcconrep.TELCON';

	
	const EMACON = 'fcconrep.EMACON';

	
	const CODSEC = 'fcconrep.CODSEC';

	
	const CODPAR = 'fcconrep.CODPAR';

	
	const NITCON = 'fcconrep.NITCON';

	
	const CODMUN = 'fcconrep.CODMUN';

	
	const CODEDO = 'fcconrep.CODEDO';

	
	const CODPAI = 'fcconrep.CODPAI';

	
	const CIUCON = 'fcconrep.CIUCON';

	
	const CPOCON = 'fcconrep.CPOCON';

	
	const APOCON = 'fcconrep.APOCON';

	
	const URLCON = 'fcconrep.URLCON';

	
	const NACCON = 'fcconrep.NACCON';

	
	const TIPCON = 'fcconrep.TIPCON';

	
	const FAXCON = 'fcconrep.FAXCON';

	
	const CLACON = 'fcconrep.CLACON';

	
	const FECDESCON = 'fcconrep.FECDESCON';

	
	const FECACTCON = 'fcconrep.FECACTCON';

	
	const STACON = 'fcconrep.STACON';

	
	const ORIGEN = 'fcconrep.ORIGEN';

	
	const NOMNEG = 'fcconrep.NOMNEG';

	
	const RECCON = 'fcconrep.RECCON';

	
	const TEM = 'fcconrep.TEM';

	
	const ID = 'fcconrep.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedcon', 'Rifcon', 'Nomcon', 'Repcon', 'Dircon', 'Telcon', 'Emacon', 'Codsec', 'Codpar', 'Nitcon', 'Codmun', 'Codedo', 'Codpai', 'Ciucon', 'Cpocon', 'Apocon', 'Urlcon', 'Naccon', 'Tipcon', 'Faxcon', 'Clacon', 'Fecdescon', 'Fecactcon', 'Stacon', 'Origen', 'Nomneg', 'Reccon', 'Tem', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcconrepPeer::CEDCON, FcconrepPeer::RIFCON, FcconrepPeer::NOMCON, FcconrepPeer::REPCON, FcconrepPeer::DIRCON, FcconrepPeer::TELCON, FcconrepPeer::EMACON, FcconrepPeer::CODSEC, FcconrepPeer::CODPAR, FcconrepPeer::NITCON, FcconrepPeer::CODMUN, FcconrepPeer::CODEDO, FcconrepPeer::CODPAI, FcconrepPeer::CIUCON, FcconrepPeer::CPOCON, FcconrepPeer::APOCON, FcconrepPeer::URLCON, FcconrepPeer::NACCON, FcconrepPeer::TIPCON, FcconrepPeer::FAXCON, FcconrepPeer::CLACON, FcconrepPeer::FECDESCON, FcconrepPeer::FECACTCON, FcconrepPeer::STACON, FcconrepPeer::ORIGEN, FcconrepPeer::NOMNEG, FcconrepPeer::RECCON, FcconrepPeer::TEM, FcconrepPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedcon', 'rifcon', 'nomcon', 'repcon', 'dircon', 'telcon', 'emacon', 'codsec', 'codpar', 'nitcon', 'codmun', 'codedo', 'codpai', 'ciucon', 'cpocon', 'apocon', 'urlcon', 'naccon', 'tipcon', 'faxcon', 'clacon', 'fecdescon', 'fecactcon', 'stacon', 'origen', 'nomneg', 'reccon', 'tem', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedcon' => 0, 'Rifcon' => 1, 'Nomcon' => 2, 'Repcon' => 3, 'Dircon' => 4, 'Telcon' => 5, 'Emacon' => 6, 'Codsec' => 7, 'Codpar' => 8, 'Nitcon' => 9, 'Codmun' => 10, 'Codedo' => 11, 'Codpai' => 12, 'Ciucon' => 13, 'Cpocon' => 14, 'Apocon' => 15, 'Urlcon' => 16, 'Naccon' => 17, 'Tipcon' => 18, 'Faxcon' => 19, 'Clacon' => 20, 'Fecdescon' => 21, 'Fecactcon' => 22, 'Stacon' => 23, 'Origen' => 24, 'Nomneg' => 25, 'Reccon' => 26, 'Tem' => 27, 'Id' => 28, ),
		BasePeer::TYPE_COLNAME => array (FcconrepPeer::CEDCON => 0, FcconrepPeer::RIFCON => 1, FcconrepPeer::NOMCON => 2, FcconrepPeer::REPCON => 3, FcconrepPeer::DIRCON => 4, FcconrepPeer::TELCON => 5, FcconrepPeer::EMACON => 6, FcconrepPeer::CODSEC => 7, FcconrepPeer::CODPAR => 8, FcconrepPeer::NITCON => 9, FcconrepPeer::CODMUN => 10, FcconrepPeer::CODEDO => 11, FcconrepPeer::CODPAI => 12, FcconrepPeer::CIUCON => 13, FcconrepPeer::CPOCON => 14, FcconrepPeer::APOCON => 15, FcconrepPeer::URLCON => 16, FcconrepPeer::NACCON => 17, FcconrepPeer::TIPCON => 18, FcconrepPeer::FAXCON => 19, FcconrepPeer::CLACON => 20, FcconrepPeer::FECDESCON => 21, FcconrepPeer::FECACTCON => 22, FcconrepPeer::STACON => 23, FcconrepPeer::ORIGEN => 24, FcconrepPeer::NOMNEG => 25, FcconrepPeer::RECCON => 26, FcconrepPeer::TEM => 27, FcconrepPeer::ID => 28, ),
		BasePeer::TYPE_FIELDNAME => array ('cedcon' => 0, 'rifcon' => 1, 'nomcon' => 2, 'repcon' => 3, 'dircon' => 4, 'telcon' => 5, 'emacon' => 6, 'codsec' => 7, 'codpar' => 8, 'nitcon' => 9, 'codmun' => 10, 'codedo' => 11, 'codpai' => 12, 'ciucon' => 13, 'cpocon' => 14, 'apocon' => 15, 'urlcon' => 16, 'naccon' => 17, 'tipcon' => 18, 'faxcon' => 19, 'clacon' => 20, 'fecdescon' => 21, 'fecactcon' => 22, 'stacon' => 23, 'origen' => 24, 'nomneg' => 25, 'reccon' => 26, 'tem' => 27, 'id' => 28, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcconrepMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcconrepMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcconrepPeer::getTableMap();
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
		return str_replace(FcconrepPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcconrepPeer::CEDCON);

		$criteria->addSelectColumn(FcconrepPeer::RIFCON);

		$criteria->addSelectColumn(FcconrepPeer::NOMCON);

		$criteria->addSelectColumn(FcconrepPeer::REPCON);

		$criteria->addSelectColumn(FcconrepPeer::DIRCON);

		$criteria->addSelectColumn(FcconrepPeer::TELCON);

		$criteria->addSelectColumn(FcconrepPeer::EMACON);

		$criteria->addSelectColumn(FcconrepPeer::CODSEC);

		$criteria->addSelectColumn(FcconrepPeer::CODPAR);

		$criteria->addSelectColumn(FcconrepPeer::NITCON);

		$criteria->addSelectColumn(FcconrepPeer::CODMUN);

		$criteria->addSelectColumn(FcconrepPeer::CODEDO);

		$criteria->addSelectColumn(FcconrepPeer::CODPAI);

		$criteria->addSelectColumn(FcconrepPeer::CIUCON);

		$criteria->addSelectColumn(FcconrepPeer::CPOCON);

		$criteria->addSelectColumn(FcconrepPeer::APOCON);

		$criteria->addSelectColumn(FcconrepPeer::URLCON);

		$criteria->addSelectColumn(FcconrepPeer::NACCON);

		$criteria->addSelectColumn(FcconrepPeer::TIPCON);

		$criteria->addSelectColumn(FcconrepPeer::FAXCON);

		$criteria->addSelectColumn(FcconrepPeer::CLACON);

		$criteria->addSelectColumn(FcconrepPeer::FECDESCON);

		$criteria->addSelectColumn(FcconrepPeer::FECACTCON);

		$criteria->addSelectColumn(FcconrepPeer::STACON);

		$criteria->addSelectColumn(FcconrepPeer::ORIGEN);

		$criteria->addSelectColumn(FcconrepPeer::NOMNEG);

		$criteria->addSelectColumn(FcconrepPeer::RECCON);

		$criteria->addSelectColumn(FcconrepPeer::TEM);

		$criteria->addSelectColumn(FcconrepPeer::ID);

	}

	const COUNT = 'COUNT(fcconrep.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcconrep.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcconrepPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcconrepPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcconrepPeer::doSelectRS($criteria, $con);
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
		$objects = FcconrepPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcconrepPeer::populateObjects(FcconrepPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcconrepPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcconrepPeer::getOMClass();
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
		return FcconrepPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcconrepPeer::ID); 

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
			$comparison = $criteria->getComparison(FcconrepPeer::ID);
			$selectCriteria->add(FcconrepPeer::ID, $criteria->remove(FcconrepPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcconrepPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcconrepPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcconrep) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcconrepPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcconrep $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcconrepPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcconrepPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcconrepPeer::DATABASE_NAME, FcconrepPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcconrepPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcconrepPeer::DATABASE_NAME);

		$criteria->add(FcconrepPeer::ID, $pk);


		$v = FcconrepPeer::doSelect($criteria, $con);

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
			$criteria->add(FcconrepPeer::ID, $pks, Criteria::IN);
			$objs = FcconrepPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcconrepPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcconrepMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcconrepMapBuilder');
}
