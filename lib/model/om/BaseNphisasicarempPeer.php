<?php


abstract class BaseNphisasicarempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nphisasicaremp';

	
	const CLASS_DEFAULT = 'lib.model.Nphisasicaremp';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'nphisasicaremp.CODEMP';

	
	const CODCAR = 'nphisasicaremp.CODCAR';

	
	const CODNOM = 'nphisasicaremp.CODNOM';

	
	const CODCAT = 'nphisasicaremp.CODCAT';

	
	const FECASI = 'nphisasicaremp.FECASI';

	
	const NOMEMP = 'nphisasicaremp.NOMEMP';

	
	const NOMCAR = 'nphisasicaremp.NOMCAR';

	
	const NOMNOM = 'nphisasicaremp.NOMNOM';

	
	const NOMCAT = 'nphisasicaremp.NOMCAT';

	
	const UNIEJE = 'nphisasicaremp.UNIEJE';

	
	const SUELDO = 'nphisasicaremp.SUELDO';

	
	const STATUS = 'nphisasicaremp.STATUS';

	
	const MONTONOMINA = 'nphisasicaremp.MONTONOMINA';

	
	const CODTIP = 'nphisasicaremp.CODTIP';

	
	const CODTIPGAS = 'nphisasicaremp.CODTIPGAS';

	
	const ID = 'nphisasicaremp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Codcar', 'Codnom', 'Codcat', 'Fecasi', 'Nomemp', 'Nomcar', 'Nomnom', 'Nomcat', 'Unieje', 'Sueldo', 'Status', 'Montonomina', 'Codtip', 'Codtipgas', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NphisasicarempPeer::CODEMP, NphisasicarempPeer::CODCAR, NphisasicarempPeer::CODNOM, NphisasicarempPeer::CODCAT, NphisasicarempPeer::FECASI, NphisasicarempPeer::NOMEMP, NphisasicarempPeer::NOMCAR, NphisasicarempPeer::NOMNOM, NphisasicarempPeer::NOMCAT, NphisasicarempPeer::UNIEJE, NphisasicarempPeer::SUELDO, NphisasicarempPeer::STATUS, NphisasicarempPeer::MONTONOMINA, NphisasicarempPeer::CODTIP, NphisasicarempPeer::CODTIPGAS, NphisasicarempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'codcar', 'codnom', 'codcat', 'fecasi', 'nomemp', 'nomcar', 'nomnom', 'nomcat', 'unieje', 'sueldo', 'status', 'montonomina', 'codtip', 'codtipgas', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Codcar' => 1, 'Codnom' => 2, 'Codcat' => 3, 'Fecasi' => 4, 'Nomemp' => 5, 'Nomcar' => 6, 'Nomnom' => 7, 'Nomcat' => 8, 'Unieje' => 9, 'Sueldo' => 10, 'Status' => 11, 'Montonomina' => 12, 'Codtip' => 13, 'Codtipgas' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (NphisasicarempPeer::CODEMP => 0, NphisasicarempPeer::CODCAR => 1, NphisasicarempPeer::CODNOM => 2, NphisasicarempPeer::CODCAT => 3, NphisasicarempPeer::FECASI => 4, NphisasicarempPeer::NOMEMP => 5, NphisasicarempPeer::NOMCAR => 6, NphisasicarempPeer::NOMNOM => 7, NphisasicarempPeer::NOMCAT => 8, NphisasicarempPeer::UNIEJE => 9, NphisasicarempPeer::SUELDO => 10, NphisasicarempPeer::STATUS => 11, NphisasicarempPeer::MONTONOMINA => 12, NphisasicarempPeer::CODTIP => 13, NphisasicarempPeer::CODTIPGAS => 14, NphisasicarempPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'codcar' => 1, 'codnom' => 2, 'codcat' => 3, 'fecasi' => 4, 'nomemp' => 5, 'nomcar' => 6, 'nomnom' => 7, 'nomcat' => 8, 'unieje' => 9, 'sueldo' => 10, 'status' => 11, 'montonomina' => 12, 'codtip' => 13, 'codtipgas' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NphisasicarempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NphisasicarempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NphisasicarempPeer::getTableMap();
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
		return str_replace(NphisasicarempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NphisasicarempPeer::CODEMP);

		$criteria->addSelectColumn(NphisasicarempPeer::CODCAR);

		$criteria->addSelectColumn(NphisasicarempPeer::CODNOM);

		$criteria->addSelectColumn(NphisasicarempPeer::CODCAT);

		$criteria->addSelectColumn(NphisasicarempPeer::FECASI);

		$criteria->addSelectColumn(NphisasicarempPeer::NOMEMP);

		$criteria->addSelectColumn(NphisasicarempPeer::NOMCAR);

		$criteria->addSelectColumn(NphisasicarempPeer::NOMNOM);

		$criteria->addSelectColumn(NphisasicarempPeer::NOMCAT);

		$criteria->addSelectColumn(NphisasicarempPeer::UNIEJE);

		$criteria->addSelectColumn(NphisasicarempPeer::SUELDO);

		$criteria->addSelectColumn(NphisasicarempPeer::STATUS);

		$criteria->addSelectColumn(NphisasicarempPeer::MONTONOMINA);

		$criteria->addSelectColumn(NphisasicarempPeer::CODTIP);

		$criteria->addSelectColumn(NphisasicarempPeer::CODTIPGAS);

		$criteria->addSelectColumn(NphisasicarempPeer::ID);

	}

	const COUNT = 'COUNT(nphisasicaremp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nphisasicaremp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NphisasicarempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NphisasicarempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NphisasicarempPeer::doSelectRS($criteria, $con);
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
		$objects = NphisasicarempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NphisasicarempPeer::populateObjects(NphisasicarempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NphisasicarempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NphisasicarempPeer::getOMClass();
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
		return NphisasicarempPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NphisasicarempPeer::ID); 

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
			$comparison = $criteria->getComparison(NphisasicarempPeer::ID);
			$selectCriteria->add(NphisasicarempPeer::ID, $criteria->remove(NphisasicarempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NphisasicarempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NphisasicarempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Nphisasicaremp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NphisasicarempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Nphisasicaremp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NphisasicarempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NphisasicarempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NphisasicarempPeer::DATABASE_NAME, NphisasicarempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NphisasicarempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NphisasicarempPeer::DATABASE_NAME);

		$criteria->add(NphisasicarempPeer::ID, $pk);


		$v = NphisasicarempPeer::doSelect($criteria, $con);

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
			$criteria->add(NphisasicarempPeer::ID, $pks, Criteria::IN);
			$objs = NphisasicarempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNphisasicarempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NphisasicarempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NphisasicarempMapBuilder');
}
