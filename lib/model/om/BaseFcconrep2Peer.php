<?php


abstract class BaseFcconrep2Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcconrep2';

	
	const CLASS_DEFAULT = 'lib.model.Fcconrep2';

	
	const NUM_COLUMNS = 28;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDCON = 'fcconrep2.CEDCON';

	
	const RIFCON = 'fcconrep2.RIFCON';

	
	const NOMCON = 'fcconrep2.NOMCON';

	
	const REPCON = 'fcconrep2.REPCON';

	
	const DIRCON = 'fcconrep2.DIRCON';

	
	const TELCON = 'fcconrep2.TELCON';

	
	const EMACON = 'fcconrep2.EMACON';

	
	const CODSEC = 'fcconrep2.CODSEC';

	
	const CODPAR = 'fcconrep2.CODPAR';

	
	const NITCON = 'fcconrep2.NITCON';

	
	const CODMUN = 'fcconrep2.CODMUN';

	
	const CODEDO = 'fcconrep2.CODEDO';

	
	const CODPAI = 'fcconrep2.CODPAI';

	
	const CIUCON = 'fcconrep2.CIUCON';

	
	const CPOCON = 'fcconrep2.CPOCON';

	
	const APOCON = 'fcconrep2.APOCON';

	
	const URLCON = 'fcconrep2.URLCON';

	
	const NACCON = 'fcconrep2.NACCON';

	
	const TIPCON = 'fcconrep2.TIPCON';

	
	const FAXCON = 'fcconrep2.FAXCON';

	
	const CLACON = 'fcconrep2.CLACON';

	
	const FECDESCON = 'fcconrep2.FECDESCON';

	
	const FECACTCON = 'fcconrep2.FECACTCON';

	
	const STACON = 'fcconrep2.STACON';

	
	const ORIGEN = 'fcconrep2.ORIGEN';

	
	const NOMNEG = 'fcconrep2.NOMNEG';

	
	const RECCON = 'fcconrep2.RECCON';

	
	const ID = 'fcconrep2.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedcon', 'Rifcon', 'Nomcon', 'Repcon', 'Dircon', 'Telcon', 'Emacon', 'Codsec', 'Codpar', 'Nitcon', 'Codmun', 'Codedo', 'Codpai', 'Ciucon', 'Cpocon', 'Apocon', 'Urlcon', 'Naccon', 'Tipcon', 'Faxcon', 'Clacon', 'Fecdescon', 'Fecactcon', 'Stacon', 'Origen', 'Nomneg', 'Reccon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Fcconrep2Peer::CEDCON, Fcconrep2Peer::RIFCON, Fcconrep2Peer::NOMCON, Fcconrep2Peer::REPCON, Fcconrep2Peer::DIRCON, Fcconrep2Peer::TELCON, Fcconrep2Peer::EMACON, Fcconrep2Peer::CODSEC, Fcconrep2Peer::CODPAR, Fcconrep2Peer::NITCON, Fcconrep2Peer::CODMUN, Fcconrep2Peer::CODEDO, Fcconrep2Peer::CODPAI, Fcconrep2Peer::CIUCON, Fcconrep2Peer::CPOCON, Fcconrep2Peer::APOCON, Fcconrep2Peer::URLCON, Fcconrep2Peer::NACCON, Fcconrep2Peer::TIPCON, Fcconrep2Peer::FAXCON, Fcconrep2Peer::CLACON, Fcconrep2Peer::FECDESCON, Fcconrep2Peer::FECACTCON, Fcconrep2Peer::STACON, Fcconrep2Peer::ORIGEN, Fcconrep2Peer::NOMNEG, Fcconrep2Peer::RECCON, Fcconrep2Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedcon', 'rifcon', 'nomcon', 'repcon', 'dircon', 'telcon', 'emacon', 'codsec', 'codpar', 'nitcon', 'codmun', 'codedo', 'codpai', 'ciucon', 'cpocon', 'apocon', 'urlcon', 'naccon', 'tipcon', 'faxcon', 'clacon', 'fecdescon', 'fecactcon', 'stacon', 'origen', 'nomneg', 'reccon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedcon' => 0, 'Rifcon' => 1, 'Nomcon' => 2, 'Repcon' => 3, 'Dircon' => 4, 'Telcon' => 5, 'Emacon' => 6, 'Codsec' => 7, 'Codpar' => 8, 'Nitcon' => 9, 'Codmun' => 10, 'Codedo' => 11, 'Codpai' => 12, 'Ciucon' => 13, 'Cpocon' => 14, 'Apocon' => 15, 'Urlcon' => 16, 'Naccon' => 17, 'Tipcon' => 18, 'Faxcon' => 19, 'Clacon' => 20, 'Fecdescon' => 21, 'Fecactcon' => 22, 'Stacon' => 23, 'Origen' => 24, 'Nomneg' => 25, 'Reccon' => 26, 'Id' => 27, ),
		BasePeer::TYPE_COLNAME => array (Fcconrep2Peer::CEDCON => 0, Fcconrep2Peer::RIFCON => 1, Fcconrep2Peer::NOMCON => 2, Fcconrep2Peer::REPCON => 3, Fcconrep2Peer::DIRCON => 4, Fcconrep2Peer::TELCON => 5, Fcconrep2Peer::EMACON => 6, Fcconrep2Peer::CODSEC => 7, Fcconrep2Peer::CODPAR => 8, Fcconrep2Peer::NITCON => 9, Fcconrep2Peer::CODMUN => 10, Fcconrep2Peer::CODEDO => 11, Fcconrep2Peer::CODPAI => 12, Fcconrep2Peer::CIUCON => 13, Fcconrep2Peer::CPOCON => 14, Fcconrep2Peer::APOCON => 15, Fcconrep2Peer::URLCON => 16, Fcconrep2Peer::NACCON => 17, Fcconrep2Peer::TIPCON => 18, Fcconrep2Peer::FAXCON => 19, Fcconrep2Peer::CLACON => 20, Fcconrep2Peer::FECDESCON => 21, Fcconrep2Peer::FECACTCON => 22, Fcconrep2Peer::STACON => 23, Fcconrep2Peer::ORIGEN => 24, Fcconrep2Peer::NOMNEG => 25, Fcconrep2Peer::RECCON => 26, Fcconrep2Peer::ID => 27, ),
		BasePeer::TYPE_FIELDNAME => array ('cedcon' => 0, 'rifcon' => 1, 'nomcon' => 2, 'repcon' => 3, 'dircon' => 4, 'telcon' => 5, 'emacon' => 6, 'codsec' => 7, 'codpar' => 8, 'nitcon' => 9, 'codmun' => 10, 'codedo' => 11, 'codpai' => 12, 'ciucon' => 13, 'cpocon' => 14, 'apocon' => 15, 'urlcon' => 16, 'naccon' => 17, 'tipcon' => 18, 'faxcon' => 19, 'clacon' => 20, 'fecdescon' => 21, 'fecactcon' => 22, 'stacon' => 23, 'origen' => 24, 'nomneg' => 25, 'reccon' => 26, 'id' => 27, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Fcconrep2MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Fcconrep2MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Fcconrep2Peer::getTableMap();
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
		return str_replace(Fcconrep2Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Fcconrep2Peer::CEDCON);

		$criteria->addSelectColumn(Fcconrep2Peer::RIFCON);

		$criteria->addSelectColumn(Fcconrep2Peer::NOMCON);

		$criteria->addSelectColumn(Fcconrep2Peer::REPCON);

		$criteria->addSelectColumn(Fcconrep2Peer::DIRCON);

		$criteria->addSelectColumn(Fcconrep2Peer::TELCON);

		$criteria->addSelectColumn(Fcconrep2Peer::EMACON);

		$criteria->addSelectColumn(Fcconrep2Peer::CODSEC);

		$criteria->addSelectColumn(Fcconrep2Peer::CODPAR);

		$criteria->addSelectColumn(Fcconrep2Peer::NITCON);

		$criteria->addSelectColumn(Fcconrep2Peer::CODMUN);

		$criteria->addSelectColumn(Fcconrep2Peer::CODEDO);

		$criteria->addSelectColumn(Fcconrep2Peer::CODPAI);

		$criteria->addSelectColumn(Fcconrep2Peer::CIUCON);

		$criteria->addSelectColumn(Fcconrep2Peer::CPOCON);

		$criteria->addSelectColumn(Fcconrep2Peer::APOCON);

		$criteria->addSelectColumn(Fcconrep2Peer::URLCON);

		$criteria->addSelectColumn(Fcconrep2Peer::NACCON);

		$criteria->addSelectColumn(Fcconrep2Peer::TIPCON);

		$criteria->addSelectColumn(Fcconrep2Peer::FAXCON);

		$criteria->addSelectColumn(Fcconrep2Peer::CLACON);

		$criteria->addSelectColumn(Fcconrep2Peer::FECDESCON);

		$criteria->addSelectColumn(Fcconrep2Peer::FECACTCON);

		$criteria->addSelectColumn(Fcconrep2Peer::STACON);

		$criteria->addSelectColumn(Fcconrep2Peer::ORIGEN);

		$criteria->addSelectColumn(Fcconrep2Peer::NOMNEG);

		$criteria->addSelectColumn(Fcconrep2Peer::RECCON);

		$criteria->addSelectColumn(Fcconrep2Peer::ID);

	}

	const COUNT = 'COUNT(fcconrep2.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcconrep2.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Fcconrep2Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Fcconrep2Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Fcconrep2Peer::doSelectRS($criteria, $con);
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
		$objects = Fcconrep2Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Fcconrep2Peer::populateObjects(Fcconrep2Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Fcconrep2Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Fcconrep2Peer::getOMClass();
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
		return Fcconrep2Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Fcconrep2Peer::ID); 

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
			$comparison = $criteria->getComparison(Fcconrep2Peer::ID);
			$selectCriteria->add(Fcconrep2Peer::ID, $criteria->remove(Fcconrep2Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Fcconrep2Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Fcconrep2Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcconrep2) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Fcconrep2Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcconrep2 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Fcconrep2Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Fcconrep2Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Fcconrep2Peer::DATABASE_NAME, Fcconrep2Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Fcconrep2Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Fcconrep2Peer::DATABASE_NAME);

		$criteria->add(Fcconrep2Peer::ID, $pk);


		$v = Fcconrep2Peer::doSelect($criteria, $con);

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
			$criteria->add(Fcconrep2Peer::ID, $pks, Criteria::IN);
			$objs = Fcconrep2Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcconrep2Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Fcconrep2MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Fcconrep2MapBuilder');
}
