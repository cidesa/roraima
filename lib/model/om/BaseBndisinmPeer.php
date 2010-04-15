<?php


abstract class BaseBndisinmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bndisinm';

	
	const CLASS_DEFAULT = 'lib.model.Bndisinm';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bndisinm.CODACT';

	
	const CODMUE = 'bndisinm.CODMUE';

	
	const NRODISINM = 'bndisinm.NRODISINM';

	
	const MOTDISINM = 'bndisinm.MOTDISINM';

	
	const TIPDISINM = 'bndisinm.TIPDISINM';

	
	const FECDISINM = 'bndisinm.FECDISINM';

	
	const FECDEVDIS = 'bndisinm.FECDEVDIS';

	
	const MONDISINM = 'bndisinm.MONDISINM';

	
	const DETDISINM = 'bndisinm.DETDISINM';

	
	const CODUBIORI = 'bndisinm.CODUBIORI';

	
	const CODUBIDES = 'bndisinm.CODUBIDES';

	
	const OBSDISINM = 'bndisinm.OBSDISINM';

	
	const STADISINM = 'bndisinm.STADISINM';

	
	const VIDUTIL = 'bndisinm.VIDUTIL';

	
	const ID = 'bndisinm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codmue', 'Nrodisinm', 'Motdisinm', 'Tipdisinm', 'Fecdisinm', 'Fecdevdis', 'Mondisinm', 'Detdisinm', 'Codubiori', 'Codubides', 'Obsdisinm', 'Stadisinm', 'Vidutil', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BndisinmPeer::CODACT, BndisinmPeer::CODMUE, BndisinmPeer::NRODISINM, BndisinmPeer::MOTDISINM, BndisinmPeer::TIPDISINM, BndisinmPeer::FECDISINM, BndisinmPeer::FECDEVDIS, BndisinmPeer::MONDISINM, BndisinmPeer::DETDISINM, BndisinmPeer::CODUBIORI, BndisinmPeer::CODUBIDES, BndisinmPeer::OBSDISINM, BndisinmPeer::STADISINM, BndisinmPeer::VIDUTIL, BndisinmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codmue', 'nrodisinm', 'motdisinm', 'tipdisinm', 'fecdisinm', 'fecdevdis', 'mondisinm', 'detdisinm', 'codubiori', 'codubides', 'obsdisinm', 'stadisinm', 'vidutil', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codmue' => 1, 'Nrodisinm' => 2, 'Motdisinm' => 3, 'Tipdisinm' => 4, 'Fecdisinm' => 5, 'Fecdevdis' => 6, 'Mondisinm' => 7, 'Detdisinm' => 8, 'Codubiori' => 9, 'Codubides' => 10, 'Obsdisinm' => 11, 'Stadisinm' => 12, 'Vidutil' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (BndisinmPeer::CODACT => 0, BndisinmPeer::CODMUE => 1, BndisinmPeer::NRODISINM => 2, BndisinmPeer::MOTDISINM => 3, BndisinmPeer::TIPDISINM => 4, BndisinmPeer::FECDISINM => 5, BndisinmPeer::FECDEVDIS => 6, BndisinmPeer::MONDISINM => 7, BndisinmPeer::DETDISINM => 8, BndisinmPeer::CODUBIORI => 9, BndisinmPeer::CODUBIDES => 10, BndisinmPeer::OBSDISINM => 11, BndisinmPeer::STADISINM => 12, BndisinmPeer::VIDUTIL => 13, BndisinmPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codmue' => 1, 'nrodisinm' => 2, 'motdisinm' => 3, 'tipdisinm' => 4, 'fecdisinm' => 5, 'fecdevdis' => 6, 'mondisinm' => 7, 'detdisinm' => 8, 'codubiori' => 9, 'codubides' => 10, 'obsdisinm' => 11, 'stadisinm' => 12, 'vidutil' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BndisinmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BndisinmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BndisinmPeer::getTableMap();
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
		return str_replace(BndisinmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BndisinmPeer::CODACT);

		$criteria->addSelectColumn(BndisinmPeer::CODMUE);

		$criteria->addSelectColumn(BndisinmPeer::NRODISINM);

		$criteria->addSelectColumn(BndisinmPeer::MOTDISINM);

		$criteria->addSelectColumn(BndisinmPeer::TIPDISINM);

		$criteria->addSelectColumn(BndisinmPeer::FECDISINM);

		$criteria->addSelectColumn(BndisinmPeer::FECDEVDIS);

		$criteria->addSelectColumn(BndisinmPeer::MONDISINM);

		$criteria->addSelectColumn(BndisinmPeer::DETDISINM);

		$criteria->addSelectColumn(BndisinmPeer::CODUBIORI);

		$criteria->addSelectColumn(BndisinmPeer::CODUBIDES);

		$criteria->addSelectColumn(BndisinmPeer::OBSDISINM);

		$criteria->addSelectColumn(BndisinmPeer::STADISINM);

		$criteria->addSelectColumn(BndisinmPeer::VIDUTIL);

		$criteria->addSelectColumn(BndisinmPeer::ID);

	}

	const COUNT = 'COUNT(bndisinm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bndisinm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BndisinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BndisinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BndisinmPeer::doSelectRS($criteria, $con);
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
		$objects = BndisinmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BndisinmPeer::populateObjects(BndisinmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BndisinmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BndisinmPeer::getOMClass();
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
		return BndisinmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BndisinmPeer::ID); 

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
			$comparison = $criteria->getComparison(BndisinmPeer::ID);
			$selectCriteria->add(BndisinmPeer::ID, $criteria->remove(BndisinmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BndisinmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BndisinmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bndisinm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BndisinmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bndisinm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BndisinmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BndisinmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BndisinmPeer::DATABASE_NAME, BndisinmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BndisinmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BndisinmPeer::DATABASE_NAME);

		$criteria->add(BndisinmPeer::ID, $pk);


		$v = BndisinmPeer::doSelect($criteria, $con);

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
			$criteria->add(BndisinmPeer::ID, $pks, Criteria::IN);
			$objs = BndisinmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBndisinmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BndisinmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BndisinmMapBuilder');
}
