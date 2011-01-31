<?php


abstract class BaseCsdefempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'csdefemp';

	
	const CLASS_DEFAULT = 'lib.model.Csdefemp';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NOMEMP = 'csdefemp.NOMEMP';

	
	const DIREMP = 'csdefemp.DIREMP';

	
	const TELEMP = 'csdefemp.TELEMP';

	
	const FAXEMP = 'csdefemp.FAXEMP';

	
	const PORGASADM = 'csdefemp.PORGASADM';

	
	const PORMARUTIL = 'csdefemp.PORMARUTIL';

	
	const PORPERMAT = 'csdefemp.PORPERMAT';

	
	const CODTIPDIG = 'csdefemp.CODTIPDIG';

	
	const CODTIPVIA = 'csdefemp.CODTIPVIA';

	
	const CODTIPFAB = 'csdefemp.CODTIPFAB';

	
	const VALUT = 'csdefemp.VALUT';

	
	const ID = 'csdefemp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nomemp', 'Diremp', 'Telemp', 'Faxemp', 'Porgasadm', 'Pormarutil', 'Porpermat', 'Codtipdig', 'Codtipvia', 'Codtipfab', 'Valut', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CsdefempPeer::NOMEMP, CsdefempPeer::DIREMP, CsdefempPeer::TELEMP, CsdefempPeer::FAXEMP, CsdefempPeer::PORGASADM, CsdefempPeer::PORMARUTIL, CsdefempPeer::PORPERMAT, CsdefempPeer::CODTIPDIG, CsdefempPeer::CODTIPVIA, CsdefempPeer::CODTIPFAB, CsdefempPeer::VALUT, CsdefempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nomemp', 'diremp', 'telemp', 'faxemp', 'porgasadm', 'pormarutil', 'porpermat', 'codtipdig', 'codtipvia', 'codtipfab', 'valut', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nomemp' => 0, 'Diremp' => 1, 'Telemp' => 2, 'Faxemp' => 3, 'Porgasadm' => 4, 'Pormarutil' => 5, 'Porpermat' => 6, 'Codtipdig' => 7, 'Codtipvia' => 8, 'Codtipfab' => 9, 'Valut' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (CsdefempPeer::NOMEMP => 0, CsdefempPeer::DIREMP => 1, CsdefempPeer::TELEMP => 2, CsdefempPeer::FAXEMP => 3, CsdefempPeer::PORGASADM => 4, CsdefempPeer::PORMARUTIL => 5, CsdefempPeer::PORPERMAT => 6, CsdefempPeer::CODTIPDIG => 7, CsdefempPeer::CODTIPVIA => 8, CsdefempPeer::CODTIPFAB => 9, CsdefempPeer::VALUT => 10, CsdefempPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('nomemp' => 0, 'diremp' => 1, 'telemp' => 2, 'faxemp' => 3, 'porgasadm' => 4, 'pormarutil' => 5, 'porpermat' => 6, 'codtipdig' => 7, 'codtipvia' => 8, 'codtipfab' => 9, 'valut' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CsdefempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CsdefempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CsdefempPeer::getTableMap();
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
		return str_replace(CsdefempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CsdefempPeer::NOMEMP);

		$criteria->addSelectColumn(CsdefempPeer::DIREMP);

		$criteria->addSelectColumn(CsdefempPeer::TELEMP);

		$criteria->addSelectColumn(CsdefempPeer::FAXEMP);

		$criteria->addSelectColumn(CsdefempPeer::PORGASADM);

		$criteria->addSelectColumn(CsdefempPeer::PORMARUTIL);

		$criteria->addSelectColumn(CsdefempPeer::PORPERMAT);

		$criteria->addSelectColumn(CsdefempPeer::CODTIPDIG);

		$criteria->addSelectColumn(CsdefempPeer::CODTIPVIA);

		$criteria->addSelectColumn(CsdefempPeer::CODTIPFAB);

		$criteria->addSelectColumn(CsdefempPeer::VALUT);

		$criteria->addSelectColumn(CsdefempPeer::ID);

	}

	const COUNT = 'COUNT(csdefemp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT csdefemp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CsdefempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CsdefempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CsdefempPeer::doSelectRS($criteria, $con);
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
		$objects = CsdefempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CsdefempPeer::populateObjects(CsdefempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CsdefempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CsdefempPeer::getOMClass();
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
		return CsdefempPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CsdefempPeer::ID);
			$selectCriteria->add(CsdefempPeer::ID, $criteria->remove(CsdefempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CsdefempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CsdefempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Csdefemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CsdefempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Csdefemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CsdefempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CsdefempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CsdefempPeer::DATABASE_NAME, CsdefempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CsdefempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CsdefempPeer::DATABASE_NAME);

		$criteria->add(CsdefempPeer::ID, $pk);


		$v = CsdefempPeer::doSelect($criteria, $con);

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
			$criteria->add(CsdefempPeer::ID, $pks, Criteria::IN);
			$objs = CsdefempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCsdefempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CsdefempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CsdefempMapBuilder');
}
