<?php


abstract class BaseNpasiconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npasicon';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npasicon';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCAT = 'npasicon.CODCAT';

	
	const CODCAR = 'npasicon.CODCAR';

	
	const CODCON = 'npasicon.CODCON';

	
	const NOMSUS = 'npasicon.NOMSUS';

	
	const FECINI = 'npasicon.FECINI';

	
	const FECEXP = 'npasicon.FECEXP';

	
	const SALCON = 'npasicon.SALCON';

	
	const MONPRE = 'npasicon.MONPRE';

	
	const CANMON = 'npasicon.CANMON';

	
	const CALCON = 'npasicon.CALCON';

	
	const ACTCON = 'npasicon.ACTCON';

	
	const FRECON = 'npasicon.FRECON';

	
	const CODPRE = 'npasicon.CODPRE';

	
	const MONMEN = 'npasicon.MONMEN';

	
	const FRECUE = 'npasicon.FRECUE';

	
	const ID = 'npasicon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat', 'Codcar', 'Codcon', 'Nomsus', 'Fecini', 'Fecexp', 'Salcon', 'Monpre', 'Canmon', 'Calcon', 'Actcon', 'Frecon', 'Codpre', 'Monmen', 'Frecue', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpasiconPeer::CODCAT, NpasiconPeer::CODCAR, NpasiconPeer::CODCON, NpasiconPeer::NOMSUS, NpasiconPeer::FECINI, NpasiconPeer::FECEXP, NpasiconPeer::SALCON, NpasiconPeer::MONPRE, NpasiconPeer::CANMON, NpasiconPeer::CALCON, NpasiconPeer::ACTCON, NpasiconPeer::FRECON, NpasiconPeer::CODPRE, NpasiconPeer::MONMEN, NpasiconPeer::FRECUE, NpasiconPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat', 'codcar', 'codcon', 'nomsus', 'fecini', 'fecexp', 'salcon', 'monpre', 'canmon', 'calcon', 'actcon', 'frecon', 'codpre', 'monmen', 'frecue', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat' => 0, 'Codcar' => 1, 'Codcon' => 2, 'Nomsus' => 3, 'Fecini' => 4, 'Fecexp' => 5, 'Salcon' => 6, 'Monpre' => 7, 'Canmon' => 8, 'Calcon' => 9, 'Actcon' => 10, 'Frecon' => 11, 'Codpre' => 12, 'Monmen' => 13, 'Frecue' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (NpasiconPeer::CODCAT => 0, NpasiconPeer::CODCAR => 1, NpasiconPeer::CODCON => 2, NpasiconPeer::NOMSUS => 3, NpasiconPeer::FECINI => 4, NpasiconPeer::FECEXP => 5, NpasiconPeer::SALCON => 6, NpasiconPeer::MONPRE => 7, NpasiconPeer::CANMON => 8, NpasiconPeer::CALCON => 9, NpasiconPeer::ACTCON => 10, NpasiconPeer::FRECON => 11, NpasiconPeer::CODPRE => 12, NpasiconPeer::MONMEN => 13, NpasiconPeer::FRECUE => 14, NpasiconPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat' => 0, 'codcar' => 1, 'codcon' => 2, 'nomsus' => 3, 'fecini' => 4, 'fecexp' => 5, 'salcon' => 6, 'monpre' => 7, 'canmon' => 8, 'calcon' => 9, 'actcon' => 10, 'frecon' => 11, 'codpre' => 12, 'monmen' => 13, 'frecue' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpasiconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpasiconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpasiconPeer::getTableMap();
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
		return str_replace(NpasiconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpasiconPeer::CODCAT);

		$criteria->addSelectColumn(NpasiconPeer::CODCAR);

		$criteria->addSelectColumn(NpasiconPeer::CODCON);

		$criteria->addSelectColumn(NpasiconPeer::NOMSUS);

		$criteria->addSelectColumn(NpasiconPeer::FECINI);

		$criteria->addSelectColumn(NpasiconPeer::FECEXP);

		$criteria->addSelectColumn(NpasiconPeer::SALCON);

		$criteria->addSelectColumn(NpasiconPeer::MONPRE);

		$criteria->addSelectColumn(NpasiconPeer::CANMON);

		$criteria->addSelectColumn(NpasiconPeer::CALCON);

		$criteria->addSelectColumn(NpasiconPeer::ACTCON);

		$criteria->addSelectColumn(NpasiconPeer::FRECON);

		$criteria->addSelectColumn(NpasiconPeer::CODPRE);

		$criteria->addSelectColumn(NpasiconPeer::MONMEN);

		$criteria->addSelectColumn(NpasiconPeer::FRECUE);

		$criteria->addSelectColumn(NpasiconPeer::ID);

	}

	const COUNT = 'COUNT(npasicon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npasicon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpasiconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpasiconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpasiconPeer::doSelectRS($criteria, $con);
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
		$objects = NpasiconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpasiconPeer::populateObjects(NpasiconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpasiconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpasiconPeer::getOMClass();
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
		return NpasiconPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpasiconPeer::ID); 

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
			$comparison = $criteria->getComparison(NpasiconPeer::ID);
			$selectCriteria->add(NpasiconPeer::ID, $criteria->remove(NpasiconPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpasiconPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpasiconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npasicon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpasiconPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npasicon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpasiconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpasiconPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpasiconPeer::DATABASE_NAME, NpasiconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpasiconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpasiconPeer::DATABASE_NAME);

		$criteria->add(NpasiconPeer::ID, $pk);


		$v = NpasiconPeer::doSelect($criteria, $con);

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
			$criteria->add(NpasiconPeer::ID, $pks, Criteria::IN);
			$objs = NpasiconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpasiconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpasiconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpasiconMapBuilder');
}
