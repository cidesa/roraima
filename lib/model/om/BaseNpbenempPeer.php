<?php


abstract class BaseNpbenempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npbenemp';

	
	const CLASS_DEFAULT = 'lib.model.Npbenemp';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npbenemp.CODNOM';

	
	const CODCON = 'npbenemp.CODCON';

	
	const CODEMP = 'npbenemp.CODEMP';

	
	const CEDBEN = 'npbenemp.CEDBEN';

	
	const NOMBEN = 'npbenemp.NOMBEN';

	
	const CODBAN = 'npbenemp.CODBAN';

	
	const NUMCUE = 'npbenemp.NUMCUE';

	
	const CODCAR = 'npbenemp.CODCAR';

	
	const ID = 'npbenemp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codcon', 'Codemp', 'Cedben', 'Nomben', 'Codban', 'Numcue', 'Codcar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpbenempPeer::CODNOM, NpbenempPeer::CODCON, NpbenempPeer::CODEMP, NpbenempPeer::CEDBEN, NpbenempPeer::NOMBEN, NpbenempPeer::CODBAN, NpbenempPeer::NUMCUE, NpbenempPeer::CODCAR, NpbenempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codcon', 'codemp', 'cedben', 'nomben', 'codban', 'numcue', 'codcar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codcon' => 1, 'Codemp' => 2, 'Cedben' => 3, 'Nomben' => 4, 'Codban' => 5, 'Numcue' => 6, 'Codcar' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (NpbenempPeer::CODNOM => 0, NpbenempPeer::CODCON => 1, NpbenempPeer::CODEMP => 2, NpbenempPeer::CEDBEN => 3, NpbenempPeer::NOMBEN => 4, NpbenempPeer::CODBAN => 5, NpbenempPeer::NUMCUE => 6, NpbenempPeer::CODCAR => 7, NpbenempPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codcon' => 1, 'codemp' => 2, 'cedben' => 3, 'nomben' => 4, 'codban' => 5, 'numcue' => 6, 'codcar' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpbenempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpbenempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpbenempPeer::getTableMap();
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
		return str_replace(NpbenempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpbenempPeer::CODNOM);

		$criteria->addSelectColumn(NpbenempPeer::CODCON);

		$criteria->addSelectColumn(NpbenempPeer::CODEMP);

		$criteria->addSelectColumn(NpbenempPeer::CEDBEN);

		$criteria->addSelectColumn(NpbenempPeer::NOMBEN);

		$criteria->addSelectColumn(NpbenempPeer::CODBAN);

		$criteria->addSelectColumn(NpbenempPeer::NUMCUE);

		$criteria->addSelectColumn(NpbenempPeer::CODCAR);

		$criteria->addSelectColumn(NpbenempPeer::ID);

	}

	const COUNT = 'COUNT(npbenemp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npbenemp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpbenempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpbenempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpbenempPeer::doSelectRS($criteria, $con);
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
		$objects = NpbenempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpbenempPeer::populateObjects(NpbenempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpbenempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpbenempPeer::getOMClass();
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
		return NpbenempPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpbenempPeer::ID); 

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
			$comparison = $criteria->getComparison(NpbenempPeer::ID);
			$selectCriteria->add(NpbenempPeer::ID, $criteria->remove(NpbenempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpbenempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpbenempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npbenemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpbenempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npbenemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpbenempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpbenempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpbenempPeer::DATABASE_NAME, NpbenempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpbenempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpbenempPeer::DATABASE_NAME);

		$criteria->add(NpbenempPeer::ID, $pk);


		$v = NpbenempPeer::doSelect($criteria, $con);

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
			$criteria->add(NpbenempPeer::ID, $pks, Criteria::IN);
			$objs = NpbenempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpbenempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpbenempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpbenempMapBuilder');
}
