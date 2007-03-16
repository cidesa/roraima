<?php


abstract class BaseNpasicarracempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npasicarracemp';

	
	const CLASS_DEFAULT = 'lib.model.Npasicarracemp';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npasicarracemp.CODEMP';

	
	const CODCARRAC = 'npasicarracemp.CODCARRAC';

	
	const CODSECUE = 'npasicarracemp.CODSECUE';

	
	const COMCAR = 'npasicarracemp.COMCAR';

	
	const PRICAR = 'npasicarracemp.PRICAR';

	
	const CODACCADM = 'npasicarracemp.CODACCADM';

	
	const CODREGPAI = 'npasicarracemp.CODREGPAI';

	
	const CODREGEDO = 'npasicarracemp.CODREGEDO';

	
	const CODREGCIU = 'npasicarracemp.CODREGCIU';

	
	const CODCATRAC = 'npasicarracemp.CODCATRAC';

	
	const CODBANRAC = 'npasicarracemp.CODBANRAC';

	
	const CODGRULAB = 'npasicarracemp.CODGRULAB';

	
	const NOMSUP = 'npasicarracemp.NOMSUP';

	
	const CARSUP = 'npasicarracemp.CARSUP';

	
	const CODNIVORG = 'npasicarracemp.CODNIVORG';

	
	const ID = 'npasicarracemp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Codcarrac', 'Codsecue', 'Comcar', 'Pricar', 'Codaccadm', 'Codregpai', 'Codregedo', 'Codregciu', 'Codcatrac', 'Codbanrac', 'Codgrulab', 'Nomsup', 'Carsup', 'Codnivorg', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpasicarracempPeer::CODEMP, NpasicarracempPeer::CODCARRAC, NpasicarracempPeer::CODSECUE, NpasicarracempPeer::COMCAR, NpasicarracempPeer::PRICAR, NpasicarracempPeer::CODACCADM, NpasicarracempPeer::CODREGPAI, NpasicarracempPeer::CODREGEDO, NpasicarracempPeer::CODREGCIU, NpasicarracempPeer::CODCATRAC, NpasicarracempPeer::CODBANRAC, NpasicarracempPeer::CODGRULAB, NpasicarracempPeer::NOMSUP, NpasicarracempPeer::CARSUP, NpasicarracempPeer::CODNIVORG, NpasicarracempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'codcarrac', 'codsecue', 'comcar', 'pricar', 'codaccadm', 'codregpai', 'codregedo', 'codregciu', 'codcatrac', 'codbanrac', 'codgrulab', 'nomsup', 'carsup', 'codnivorg', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Codcarrac' => 1, 'Codsecue' => 2, 'Comcar' => 3, 'Pricar' => 4, 'Codaccadm' => 5, 'Codregpai' => 6, 'Codregedo' => 7, 'Codregciu' => 8, 'Codcatrac' => 9, 'Codbanrac' => 10, 'Codgrulab' => 11, 'Nomsup' => 12, 'Carsup' => 13, 'Codnivorg' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (NpasicarracempPeer::CODEMP => 0, NpasicarracempPeer::CODCARRAC => 1, NpasicarracempPeer::CODSECUE => 2, NpasicarracempPeer::COMCAR => 3, NpasicarracempPeer::PRICAR => 4, NpasicarracempPeer::CODACCADM => 5, NpasicarracempPeer::CODREGPAI => 6, NpasicarracempPeer::CODREGEDO => 7, NpasicarracempPeer::CODREGCIU => 8, NpasicarracempPeer::CODCATRAC => 9, NpasicarracempPeer::CODBANRAC => 10, NpasicarracempPeer::CODGRULAB => 11, NpasicarracempPeer::NOMSUP => 12, NpasicarracempPeer::CARSUP => 13, NpasicarracempPeer::CODNIVORG => 14, NpasicarracempPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'codcarrac' => 1, 'codsecue' => 2, 'comcar' => 3, 'pricar' => 4, 'codaccadm' => 5, 'codregpai' => 6, 'codregedo' => 7, 'codregciu' => 8, 'codcatrac' => 9, 'codbanrac' => 10, 'codgrulab' => 11, 'nomsup' => 12, 'carsup' => 13, 'codnivorg' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpasicarracempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpasicarracempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpasicarracempPeer::getTableMap();
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
		return str_replace(NpasicarracempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpasicarracempPeer::CODEMP);

		$criteria->addSelectColumn(NpasicarracempPeer::CODCARRAC);

		$criteria->addSelectColumn(NpasicarracempPeer::CODSECUE);

		$criteria->addSelectColumn(NpasicarracempPeer::COMCAR);

		$criteria->addSelectColumn(NpasicarracempPeer::PRICAR);

		$criteria->addSelectColumn(NpasicarracempPeer::CODACCADM);

		$criteria->addSelectColumn(NpasicarracempPeer::CODREGPAI);

		$criteria->addSelectColumn(NpasicarracempPeer::CODREGEDO);

		$criteria->addSelectColumn(NpasicarracempPeer::CODREGCIU);

		$criteria->addSelectColumn(NpasicarracempPeer::CODCATRAC);

		$criteria->addSelectColumn(NpasicarracempPeer::CODBANRAC);

		$criteria->addSelectColumn(NpasicarracempPeer::CODGRULAB);

		$criteria->addSelectColumn(NpasicarracempPeer::NOMSUP);

		$criteria->addSelectColumn(NpasicarracempPeer::CARSUP);

		$criteria->addSelectColumn(NpasicarracempPeer::CODNIVORG);

		$criteria->addSelectColumn(NpasicarracempPeer::ID);

	}

	const COUNT = 'COUNT(npasicarracemp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npasicarracemp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpasicarracempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpasicarracempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpasicarracempPeer::doSelectRS($criteria, $con);
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
		$objects = NpasicarracempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpasicarracempPeer::populateObjects(NpasicarracempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpasicarracempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpasicarracempPeer::getOMClass();
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
		return NpasicarracempPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NpasicarracempPeer::ID);
			$selectCriteria->add(NpasicarracempPeer::ID, $criteria->remove(NpasicarracempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpasicarracempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpasicarracempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npasicarracemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpasicarracempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npasicarracemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpasicarracempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpasicarracempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpasicarracempPeer::DATABASE_NAME, NpasicarracempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpasicarracempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpasicarracempPeer::DATABASE_NAME);

		$criteria->add(NpasicarracempPeer::ID, $pk);


		$v = NpasicarracempPeer::doSelect($criteria, $con);

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
			$criteria->add(NpasicarracempPeer::ID, $pks, Criteria::IN);
			$objs = NpasicarracempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpasicarracempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpasicarracempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpasicarracempMapBuilder');
}
