<?php


abstract class BaseOcregsolPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocregsol';

	
	const CLASS_DEFAULT = 'lib.model.Ocregsol';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'ocregsol.NUMSOL';

	
	const DESSOL = 'ocregsol.DESSOL';

	
	const CEDSTE = 'ocregsol.CEDSTE';

	
	const CODSOL = 'ocregsol.CODSOL';

	
	const CODORG = 'ocregsol.CODORG';

	
	const FECSOL = 'ocregsol.FECSOL';

	
	const FECRES = 'ocregsol.FECRES';

	
	const OBSSOL = 'ocregsol.OBSSOL';

	
	const CODEMP = 'ocregsol.CODEMP';

	
	const ID = 'ocregsol.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Dessol', 'Cedste', 'Codsol', 'Codorg', 'Fecsol', 'Fecres', 'Obssol', 'Codemp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcregsolPeer::NUMSOL, OcregsolPeer::DESSOL, OcregsolPeer::CEDSTE, OcregsolPeer::CODSOL, OcregsolPeer::CODORG, OcregsolPeer::FECSOL, OcregsolPeer::FECRES, OcregsolPeer::OBSSOL, OcregsolPeer::CODEMP, OcregsolPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'dessol', 'cedste', 'codsol', 'codorg', 'fecsol', 'fecres', 'obssol', 'codemp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Dessol' => 1, 'Cedste' => 2, 'Codsol' => 3, 'Codorg' => 4, 'Fecsol' => 5, 'Fecres' => 6, 'Obssol' => 7, 'Codemp' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (OcregsolPeer::NUMSOL => 0, OcregsolPeer::DESSOL => 1, OcregsolPeer::CEDSTE => 2, OcregsolPeer::CODSOL => 3, OcregsolPeer::CODORG => 4, OcregsolPeer::FECSOL => 5, OcregsolPeer::FECRES => 6, OcregsolPeer::OBSSOL => 7, OcregsolPeer::CODEMP => 8, OcregsolPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'dessol' => 1, 'cedste' => 2, 'codsol' => 3, 'codorg' => 4, 'fecsol' => 5, 'fecres' => 6, 'obssol' => 7, 'codemp' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcregsolMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcregsolMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcregsolPeer::getTableMap();
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
		return str_replace(OcregsolPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcregsolPeer::NUMSOL);

		$criteria->addSelectColumn(OcregsolPeer::DESSOL);

		$criteria->addSelectColumn(OcregsolPeer::CEDSTE);

		$criteria->addSelectColumn(OcregsolPeer::CODSOL);

		$criteria->addSelectColumn(OcregsolPeer::CODORG);

		$criteria->addSelectColumn(OcregsolPeer::FECSOL);

		$criteria->addSelectColumn(OcregsolPeer::FECRES);

		$criteria->addSelectColumn(OcregsolPeer::OBSSOL);

		$criteria->addSelectColumn(OcregsolPeer::CODEMP);

		$criteria->addSelectColumn(OcregsolPeer::ID);

	}

	const COUNT = 'COUNT(ocregsol.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocregsol.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcregsolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcregsolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcregsolPeer::doSelectRS($criteria, $con);
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
		$objects = OcregsolPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcregsolPeer::populateObjects(OcregsolPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcregsolPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcregsolPeer::getOMClass();
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
		return OcregsolPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OcregsolPeer::ID); 

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
			$comparison = $criteria->getComparison(OcregsolPeer::ID);
			$selectCriteria->add(OcregsolPeer::ID, $criteria->remove(OcregsolPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OcregsolPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OcregsolPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocregsol) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcregsolPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ocregsol $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcregsolPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcregsolPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OcregsolPeer::DATABASE_NAME, OcregsolPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcregsolPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OcregsolPeer::DATABASE_NAME);

		$criteria->add(OcregsolPeer::ID, $pk);


		$v = OcregsolPeer::doSelect($criteria, $con);

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
			$criteria->add(OcregsolPeer::ID, $pks, Criteria::IN);
			$objs = OcregsolPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcregsolPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcregsolMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcregsolMapBuilder');
}
