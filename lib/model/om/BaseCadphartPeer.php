<?php


abstract class BaseCadphartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadphart';

	
	const CLASS_DEFAULT = 'lib.model.Cadphart';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DPHART = 'cadphart.DPHART';

	
	const FECDPH = 'cadphart.FECDPH';

	
	const REQART = 'cadphart.REQART';

	
	const DESDPH = 'cadphart.DESDPH';

	
	const CODORI = 'cadphart.CODORI';

	
	const STADPH = 'cadphart.STADPH';

	
	const NUMCOM = 'cadphart.NUMCOM';

	
	const REFPAG = 'cadphart.REFPAG';

	
	const CODALM = 'cadphart.CODALM';

	
	const TIPDPH = 'cadphart.TIPDPH';

	
	const CODCLI = 'cadphart.CODCLI';

	
	const MONDPH = 'cadphart.MONDPH';

	
	const OBSDPH = 'cadphart.OBSDPH';

	
	const FORDESP = 'cadphart.FORDESP';

	
	const REAPOR = 'cadphart.REAPOR';

	
	const FECANU = 'cadphart.FECANU';

	
	const ID = 'cadphart.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Dphart', 'Fecdph', 'Reqart', 'Desdph', 'Codori', 'Stadph', 'Numcom', 'Refpag', 'Codalm', 'Tipdph', 'Codcli', 'Mondph', 'Obsdph', 'Fordesp', 'Reapor', 'Fecanu', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadphartPeer::DPHART, CadphartPeer::FECDPH, CadphartPeer::REQART, CadphartPeer::DESDPH, CadphartPeer::CODORI, CadphartPeer::STADPH, CadphartPeer::NUMCOM, CadphartPeer::REFPAG, CadphartPeer::CODALM, CadphartPeer::TIPDPH, CadphartPeer::CODCLI, CadphartPeer::MONDPH, CadphartPeer::OBSDPH, CadphartPeer::FORDESP, CadphartPeer::REAPOR, CadphartPeer::FECANU, CadphartPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('dphart', 'fecdph', 'reqart', 'desdph', 'codori', 'stadph', 'numcom', 'refpag', 'codalm', 'tipdph', 'codcli', 'mondph', 'obsdph', 'fordesp', 'reapor', 'fecanu', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Dphart' => 0, 'Fecdph' => 1, 'Reqart' => 2, 'Desdph' => 3, 'Codori' => 4, 'Stadph' => 5, 'Numcom' => 6, 'Refpag' => 7, 'Codalm' => 8, 'Tipdph' => 9, 'Codcli' => 10, 'Mondph' => 11, 'Obsdph' => 12, 'Fordesp' => 13, 'Reapor' => 14, 'Fecanu' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (CadphartPeer::DPHART => 0, CadphartPeer::FECDPH => 1, CadphartPeer::REQART => 2, CadphartPeer::DESDPH => 3, CadphartPeer::CODORI => 4, CadphartPeer::STADPH => 5, CadphartPeer::NUMCOM => 6, CadphartPeer::REFPAG => 7, CadphartPeer::CODALM => 8, CadphartPeer::TIPDPH => 9, CadphartPeer::CODCLI => 10, CadphartPeer::MONDPH => 11, CadphartPeer::OBSDPH => 12, CadphartPeer::FORDESP => 13, CadphartPeer::REAPOR => 14, CadphartPeer::FECANU => 15, CadphartPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('dphart' => 0, 'fecdph' => 1, 'reqart' => 2, 'desdph' => 3, 'codori' => 4, 'stadph' => 5, 'numcom' => 6, 'refpag' => 7, 'codalm' => 8, 'tipdph' => 9, 'codcli' => 10, 'mondph' => 11, 'obsdph' => 12, 'fordesp' => 13, 'reapor' => 14, 'fecanu' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CadphartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CadphartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadphartPeer::getTableMap();
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
		return str_replace(CadphartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadphartPeer::DPHART);

		$criteria->addSelectColumn(CadphartPeer::FECDPH);

		$criteria->addSelectColumn(CadphartPeer::REQART);

		$criteria->addSelectColumn(CadphartPeer::DESDPH);

		$criteria->addSelectColumn(CadphartPeer::CODORI);

		$criteria->addSelectColumn(CadphartPeer::STADPH);

		$criteria->addSelectColumn(CadphartPeer::NUMCOM);

		$criteria->addSelectColumn(CadphartPeer::REFPAG);

		$criteria->addSelectColumn(CadphartPeer::CODALM);

		$criteria->addSelectColumn(CadphartPeer::TIPDPH);

		$criteria->addSelectColumn(CadphartPeer::CODCLI);

		$criteria->addSelectColumn(CadphartPeer::MONDPH);

		$criteria->addSelectColumn(CadphartPeer::OBSDPH);

		$criteria->addSelectColumn(CadphartPeer::FORDESP);

		$criteria->addSelectColumn(CadphartPeer::REAPOR);

		$criteria->addSelectColumn(CadphartPeer::FECANU);

		$criteria->addSelectColumn(CadphartPeer::ID);

	}

	const COUNT = 'COUNT(cadphart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadphart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadphartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadphartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadphartPeer::doSelectRS($criteria, $con);
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
		$objects = CadphartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadphartPeer::populateObjects(CadphartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadphartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadphartPeer::getOMClass();
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
		return CadphartPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CadphartPeer::ID);
			$selectCriteria->add(CadphartPeer::ID, $criteria->remove(CadphartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadphartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadphartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadphart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadphartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadphart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadphartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadphartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadphartPeer::DATABASE_NAME, CadphartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadphartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadphartPeer::DATABASE_NAME);

		$criteria->add(CadphartPeer::ID, $pk);


		$v = CadphartPeer::doSelect($criteria, $con);

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
			$criteria->add(CadphartPeer::ID, $pks, Criteria::IN);
			$objs = CadphartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadphartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CadphartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CadphartMapBuilder');
}
