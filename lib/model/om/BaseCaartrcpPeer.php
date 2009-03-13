<?php


abstract class BaseCaartrcpPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caartrcp';

	
	const CLASS_DEFAULT = 'lib.model.Caartrcp';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RCPART = 'caartrcp.RCPART';

	
	const CODART = 'caartrcp.CODART';

	
	const ORDCOM = 'caartrcp.ORDCOM';

	
	const CODCAT = 'caartrcp.CODCAT';

	
	const CANREC = 'caartrcp.CANREC';

	
	const CANDEV = 'caartrcp.CANDEV';

	
	const CANTOT = 'caartrcp.CANTOT';

	
	const MONTOT = 'caartrcp.MONTOT';

	
	const MONRGO = 'caartrcp.MONRGO';

	
	const MONDES = 'caartrcp.MONDES';

	
	const CANASILOT = 'caartrcp.CANASILOT';

	
	const CODFAL = 'caartrcp.CODFAL';

	
	const FECEST = 'caartrcp.FECEST';

	
	const SERIAL = 'caartrcp.SERIAL';

	
	const CODALM = 'caartrcp.CODALM';

	
	const CODUBI = 'caartrcp.CODUBI';

	
	const ID = 'caartrcp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Rcpart', 'Codart', 'Ordcom', 'Codcat', 'Canrec', 'Candev', 'Cantot', 'Montot', 'Monrgo', 'Mondes', 'Canasilot', 'Codfal', 'Fecest', 'Serial', 'Codalm', 'Codubi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaartrcpPeer::RCPART, CaartrcpPeer::CODART, CaartrcpPeer::ORDCOM, CaartrcpPeer::CODCAT, CaartrcpPeer::CANREC, CaartrcpPeer::CANDEV, CaartrcpPeer::CANTOT, CaartrcpPeer::MONTOT, CaartrcpPeer::MONRGO, CaartrcpPeer::MONDES, CaartrcpPeer::CANASILOT, CaartrcpPeer::CODFAL, CaartrcpPeer::FECEST, CaartrcpPeer::SERIAL, CaartrcpPeer::CODALM, CaartrcpPeer::CODUBI, CaartrcpPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('rcpart', 'codart', 'ordcom', 'codcat', 'canrec', 'candev', 'cantot', 'montot', 'monrgo', 'mondes', 'canasilot', 'codfal', 'fecest', 'serial', 'codalm', 'codubi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Rcpart' => 0, 'Codart' => 1, 'Ordcom' => 2, 'Codcat' => 3, 'Canrec' => 4, 'Candev' => 5, 'Cantot' => 6, 'Montot' => 7, 'Monrgo' => 8, 'Mondes' => 9, 'Canasilot' => 10, 'Codfal' => 11, 'Fecest' => 12, 'Serial' => 13, 'Codalm' => 14, 'Codubi' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (CaartrcpPeer::RCPART => 0, CaartrcpPeer::CODART => 1, CaartrcpPeer::ORDCOM => 2, CaartrcpPeer::CODCAT => 3, CaartrcpPeer::CANREC => 4, CaartrcpPeer::CANDEV => 5, CaartrcpPeer::CANTOT => 6, CaartrcpPeer::MONTOT => 7, CaartrcpPeer::MONRGO => 8, CaartrcpPeer::MONDES => 9, CaartrcpPeer::CANASILOT => 10, CaartrcpPeer::CODFAL => 11, CaartrcpPeer::FECEST => 12, CaartrcpPeer::SERIAL => 13, CaartrcpPeer::CODALM => 14, CaartrcpPeer::CODUBI => 15, CaartrcpPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('rcpart' => 0, 'codart' => 1, 'ordcom' => 2, 'codcat' => 3, 'canrec' => 4, 'candev' => 5, 'cantot' => 6, 'montot' => 7, 'monrgo' => 8, 'mondes' => 9, 'canasilot' => 10, 'codfal' => 11, 'fecest' => 12, 'serial' => 13, 'codalm' => 14, 'codubi' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaartrcpMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaartrcpMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaartrcpPeer::getTableMap();
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
		return str_replace(CaartrcpPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaartrcpPeer::RCPART);

		$criteria->addSelectColumn(CaartrcpPeer::CODART);

		$criteria->addSelectColumn(CaartrcpPeer::ORDCOM);

		$criteria->addSelectColumn(CaartrcpPeer::CODCAT);

		$criteria->addSelectColumn(CaartrcpPeer::CANREC);

		$criteria->addSelectColumn(CaartrcpPeer::CANDEV);

		$criteria->addSelectColumn(CaartrcpPeer::CANTOT);

		$criteria->addSelectColumn(CaartrcpPeer::MONTOT);

		$criteria->addSelectColumn(CaartrcpPeer::MONRGO);

		$criteria->addSelectColumn(CaartrcpPeer::MONDES);

		$criteria->addSelectColumn(CaartrcpPeer::CANASILOT);

		$criteria->addSelectColumn(CaartrcpPeer::CODFAL);

		$criteria->addSelectColumn(CaartrcpPeer::FECEST);

		$criteria->addSelectColumn(CaartrcpPeer::SERIAL);

		$criteria->addSelectColumn(CaartrcpPeer::CODALM);

		$criteria->addSelectColumn(CaartrcpPeer::CODUBI);

		$criteria->addSelectColumn(CaartrcpPeer::ID);

	}

	const COUNT = 'COUNT(caartrcp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caartrcp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaartrcpPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaartrcpPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaartrcpPeer::doSelectRS($criteria, $con);
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
		$objects = CaartrcpPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaartrcpPeer::populateObjects(CaartrcpPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaartrcpPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaartrcpPeer::getOMClass();
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
		return CaartrcpPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaartrcpPeer::ID); 

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
			$comparison = $criteria->getComparison(CaartrcpPeer::ID);
			$selectCriteria->add(CaartrcpPeer::ID, $criteria->remove(CaartrcpPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaartrcpPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaartrcpPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caartrcp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaartrcpPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caartrcp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaartrcpPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaartrcpPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaartrcpPeer::DATABASE_NAME, CaartrcpPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaartrcpPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaartrcpPeer::DATABASE_NAME);

		$criteria->add(CaartrcpPeer::ID, $pk);


		$v = CaartrcpPeer::doSelect($criteria, $con);

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
			$criteria->add(CaartrcpPeer::ID, $pks, Criteria::IN);
			$objs = CaartrcpPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaartrcpPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaartrcpMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaartrcpMapBuilder');
}
