<?php


abstract class BaseOcdatstePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocdatste';

	
	const CLASS_DEFAULT = 'lib.model.Ocdatste';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDSTE = 'ocdatste.CEDSTE';

	
	const NOMSTE = 'ocdatste.NOMSTE';

	
	const CODSTE = 'ocdatste.CODSTE';

	
	const DIRSTE = 'ocdatste.DIRSTE';

	
	const TELSTE = 'ocdatste.TELSTE';

	
	const FAXSTE = 'ocdatste.FAXSTE';

	
	const EMASTE = 'ocdatste.EMASTE';

	
	const CEDREP = 'ocdatste.CEDREP';

	
	const NOMREP = 'ocdatste.NOMREP';

	
	const DIRREP = 'ocdatste.DIRREP';

	
	const TELREP = 'ocdatste.TELREP';

	
	const FAXREP = 'ocdatste.FAXREP';

	
	const EMAREP = 'ocdatste.EMAREP';

	
	const CODPAI = 'ocdatste.CODPAI';

	
	const CODEDO = 'ocdatste.CODEDO';

	
	const CODMUN = 'ocdatste.CODMUN';

	
	const CODPAR = 'ocdatste.CODPAR';

	
	const CODSEC = 'ocdatste.CODSEC';

	
	const ID = 'ocdatste.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedste', 'Nomste', 'Codste', 'Dirste', 'Telste', 'Faxste', 'Emaste', 'Cedrep', 'Nomrep', 'Dirrep', 'Telrep', 'Faxrep', 'Emarep', 'Codpai', 'Codedo', 'Codmun', 'Codpar', 'Codsec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcdatstePeer::CEDSTE, OcdatstePeer::NOMSTE, OcdatstePeer::CODSTE, OcdatstePeer::DIRSTE, OcdatstePeer::TELSTE, OcdatstePeer::FAXSTE, OcdatstePeer::EMASTE, OcdatstePeer::CEDREP, OcdatstePeer::NOMREP, OcdatstePeer::DIRREP, OcdatstePeer::TELREP, OcdatstePeer::FAXREP, OcdatstePeer::EMAREP, OcdatstePeer::CODPAI, OcdatstePeer::CODEDO, OcdatstePeer::CODMUN, OcdatstePeer::CODPAR, OcdatstePeer::CODSEC, OcdatstePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedste', 'nomste', 'codste', 'dirste', 'telste', 'faxste', 'emaste', 'cedrep', 'nomrep', 'dirrep', 'telrep', 'faxrep', 'emarep', 'codpai', 'codedo', 'codmun', 'codpar', 'codsec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedste' => 0, 'Nomste' => 1, 'Codste' => 2, 'Dirste' => 3, 'Telste' => 4, 'Faxste' => 5, 'Emaste' => 6, 'Cedrep' => 7, 'Nomrep' => 8, 'Dirrep' => 9, 'Telrep' => 10, 'Faxrep' => 11, 'Emarep' => 12, 'Codpai' => 13, 'Codedo' => 14, 'Codmun' => 15, 'Codpar' => 16, 'Codsec' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (OcdatstePeer::CEDSTE => 0, OcdatstePeer::NOMSTE => 1, OcdatstePeer::CODSTE => 2, OcdatstePeer::DIRSTE => 3, OcdatstePeer::TELSTE => 4, OcdatstePeer::FAXSTE => 5, OcdatstePeer::EMASTE => 6, OcdatstePeer::CEDREP => 7, OcdatstePeer::NOMREP => 8, OcdatstePeer::DIRREP => 9, OcdatstePeer::TELREP => 10, OcdatstePeer::FAXREP => 11, OcdatstePeer::EMAREP => 12, OcdatstePeer::CODPAI => 13, OcdatstePeer::CODEDO => 14, OcdatstePeer::CODMUN => 15, OcdatstePeer::CODPAR => 16, OcdatstePeer::CODSEC => 17, OcdatstePeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('cedste' => 0, 'nomste' => 1, 'codste' => 2, 'dirste' => 3, 'telste' => 4, 'faxste' => 5, 'emaste' => 6, 'cedrep' => 7, 'nomrep' => 8, 'dirrep' => 9, 'telrep' => 10, 'faxrep' => 11, 'emarep' => 12, 'codpai' => 13, 'codedo' => 14, 'codmun' => 15, 'codpar' => 16, 'codsec' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcdatsteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcdatsteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcdatstePeer::getTableMap();
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
		return str_replace(OcdatstePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcdatstePeer::CEDSTE);

		$criteria->addSelectColumn(OcdatstePeer::NOMSTE);

		$criteria->addSelectColumn(OcdatstePeer::CODSTE);

		$criteria->addSelectColumn(OcdatstePeer::DIRSTE);

		$criteria->addSelectColumn(OcdatstePeer::TELSTE);

		$criteria->addSelectColumn(OcdatstePeer::FAXSTE);

		$criteria->addSelectColumn(OcdatstePeer::EMASTE);

		$criteria->addSelectColumn(OcdatstePeer::CEDREP);

		$criteria->addSelectColumn(OcdatstePeer::NOMREP);

		$criteria->addSelectColumn(OcdatstePeer::DIRREP);

		$criteria->addSelectColumn(OcdatstePeer::TELREP);

		$criteria->addSelectColumn(OcdatstePeer::FAXREP);

		$criteria->addSelectColumn(OcdatstePeer::EMAREP);

		$criteria->addSelectColumn(OcdatstePeer::CODPAI);

		$criteria->addSelectColumn(OcdatstePeer::CODEDO);

		$criteria->addSelectColumn(OcdatstePeer::CODMUN);

		$criteria->addSelectColumn(OcdatstePeer::CODPAR);

		$criteria->addSelectColumn(OcdatstePeer::CODSEC);

		$criteria->addSelectColumn(OcdatstePeer::ID);

	}

	const COUNT = 'COUNT(ocdatste.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocdatste.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcdatstePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcdatstePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcdatstePeer::doSelectRS($criteria, $con);
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
		$objects = OcdatstePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcdatstePeer::populateObjects(OcdatstePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcdatstePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcdatstePeer::getOMClass();
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
		return OcdatstePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OcdatstePeer::ID); 

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
			$comparison = $criteria->getComparison(OcdatstePeer::ID);
			$selectCriteria->add(OcdatstePeer::ID, $criteria->remove(OcdatstePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OcdatstePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OcdatstePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocdatste) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcdatstePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ocdatste $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcdatstePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcdatstePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OcdatstePeer::DATABASE_NAME, OcdatstePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcdatstePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OcdatstePeer::DATABASE_NAME);

		$criteria->add(OcdatstePeer::ID, $pk);


		$v = OcdatstePeer::doSelect($criteria, $con);

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
			$criteria->add(OcdatstePeer::ID, $pks, Criteria::IN);
			$objs = OcdatstePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcdatstePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcdatsteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcdatsteMapBuilder');
}
