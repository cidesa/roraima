<?php


abstract class BaseFordefaccespPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fordefaccesp';

	
	const CLASS_DEFAULT = 'lib.model.Fordefaccesp';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRO = 'fordefaccesp.CODPRO';

	
	const CODACCESP = 'fordefaccesp.CODACCESP';

	
	const DESACCESP = 'fordefaccesp.DESACCESP';

	
	const NOMABRACCESP = 'fordefaccesp.NOMABRACCESP';

	
	const CODEMPRES = 'fordefaccesp.CODEMPRES';

	
	const FECINI = 'fordefaccesp.FECINI';

	
	const FECCUL = 'fordefaccesp.FECCUL';

	
	const DESBIESER = 'fordefaccesp.DESBIESER';

	
	const ORGEJE = 'fordefaccesp.ORGEJE';

	
	const CODUNIMED = 'fordefaccesp.CODUNIMED';

	
	const CODEST = 'fordefaccesp.CODEST';

	
	const CODMUN = 'fordefaccesp.CODMUN';

	
	const CODPAR = 'fordefaccesp.CODPAR';

	
	const ESPADIUBIGEO = 'fordefaccesp.ESPADIUBIGEO';

	
	const ID = 'fordefaccesp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro', 'Codaccesp', 'Desaccesp', 'Nomabraccesp', 'Codempres', 'Fecini', 'Feccul', 'Desbieser', 'Orgeje', 'Codunimed', 'Codest', 'Codmun', 'Codpar', 'Espadiubigeo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FordefaccespPeer::CODPRO, FordefaccespPeer::CODACCESP, FordefaccespPeer::DESACCESP, FordefaccespPeer::NOMABRACCESP, FordefaccespPeer::CODEMPRES, FordefaccespPeer::FECINI, FordefaccespPeer::FECCUL, FordefaccespPeer::DESBIESER, FordefaccespPeer::ORGEJE, FordefaccespPeer::CODUNIMED, FordefaccespPeer::CODEST, FordefaccespPeer::CODMUN, FordefaccespPeer::CODPAR, FordefaccespPeer::ESPADIUBIGEO, FordefaccespPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro', 'codaccesp', 'desaccesp', 'nomabraccesp', 'codempres', 'fecini', 'feccul', 'desbieser', 'orgeje', 'codunimed', 'codest', 'codmun', 'codpar', 'espadiubigeo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro' => 0, 'Codaccesp' => 1, 'Desaccesp' => 2, 'Nomabraccesp' => 3, 'Codempres' => 4, 'Fecini' => 5, 'Feccul' => 6, 'Desbieser' => 7, 'Orgeje' => 8, 'Codunimed' => 9, 'Codest' => 10, 'Codmun' => 11, 'Codpar' => 12, 'Espadiubigeo' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (FordefaccespPeer::CODPRO => 0, FordefaccespPeer::CODACCESP => 1, FordefaccespPeer::DESACCESP => 2, FordefaccespPeer::NOMABRACCESP => 3, FordefaccespPeer::CODEMPRES => 4, FordefaccespPeer::FECINI => 5, FordefaccespPeer::FECCUL => 6, FordefaccespPeer::DESBIESER => 7, FordefaccespPeer::ORGEJE => 8, FordefaccespPeer::CODUNIMED => 9, FordefaccespPeer::CODEST => 10, FordefaccespPeer::CODMUN => 11, FordefaccespPeer::CODPAR => 12, FordefaccespPeer::ESPADIUBIGEO => 13, FordefaccespPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro' => 0, 'codaccesp' => 1, 'desaccesp' => 2, 'nomabraccesp' => 3, 'codempres' => 4, 'fecini' => 5, 'feccul' => 6, 'desbieser' => 7, 'orgeje' => 8, 'codunimed' => 9, 'codest' => 10, 'codmun' => 11, 'codpar' => 12, 'espadiubigeo' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FordefaccespMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FordefaccespMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FordefaccespPeer::getTableMap();
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
		return str_replace(FordefaccespPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FordefaccespPeer::CODPRO);

		$criteria->addSelectColumn(FordefaccespPeer::CODACCESP);

		$criteria->addSelectColumn(FordefaccespPeer::DESACCESP);

		$criteria->addSelectColumn(FordefaccespPeer::NOMABRACCESP);

		$criteria->addSelectColumn(FordefaccespPeer::CODEMPRES);

		$criteria->addSelectColumn(FordefaccespPeer::FECINI);

		$criteria->addSelectColumn(FordefaccespPeer::FECCUL);

		$criteria->addSelectColumn(FordefaccespPeer::DESBIESER);

		$criteria->addSelectColumn(FordefaccespPeer::ORGEJE);

		$criteria->addSelectColumn(FordefaccespPeer::CODUNIMED);

		$criteria->addSelectColumn(FordefaccespPeer::CODEST);

		$criteria->addSelectColumn(FordefaccespPeer::CODMUN);

		$criteria->addSelectColumn(FordefaccespPeer::CODPAR);

		$criteria->addSelectColumn(FordefaccespPeer::ESPADIUBIGEO);

		$criteria->addSelectColumn(FordefaccespPeer::ID);

	}

	const COUNT = 'COUNT(fordefaccesp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fordefaccesp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FordefaccespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FordefaccespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FordefaccespPeer::doSelectRS($criteria, $con);
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
		$objects = FordefaccespPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FordefaccespPeer::populateObjects(FordefaccespPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FordefaccespPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FordefaccespPeer::getOMClass();
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
		return FordefaccespPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FordefaccespPeer::ID); 

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
			$comparison = $criteria->getComparison(FordefaccespPeer::ID);
			$selectCriteria->add(FordefaccespPeer::ID, $criteria->remove(FordefaccespPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FordefaccespPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FordefaccespPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fordefaccesp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FordefaccespPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fordefaccesp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FordefaccespPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FordefaccespPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FordefaccespPeer::DATABASE_NAME, FordefaccespPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FordefaccespPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FordefaccespPeer::DATABASE_NAME);

		$criteria->add(FordefaccespPeer::ID, $pk);


		$v = FordefaccespPeer::doSelect($criteria, $con);

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
			$criteria->add(FordefaccespPeer::ID, $pks, Criteria::IN);
			$objs = FordefaccespPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFordefaccespPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FordefaccespMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FordefaccespMapBuilder');
}
