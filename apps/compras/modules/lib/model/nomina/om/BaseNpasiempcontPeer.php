<?php


abstract class BaseNpasiempcontPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npasiempcont';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npasiempcont';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODTIPCON = 'npasiempcont.CODTIPCON';

	
	const CODNOM = 'npasiempcont.CODNOM';

	
	const CODEMP = 'npasiempcont.CODEMP';

	
	const NOMEMP = 'npasiempcont.NOMEMP';

	
	const FECCAL = 'npasiempcont.FECCAL';

	
	const FECDES = 'npasiempcont.FECDES';

	
	const FECHAS = 'npasiempcont.FECHAS';

	
	const STATUS = 'npasiempcont.STATUS';

	
	const ID = 'npasiempcont.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codtipcon', 'Codnom', 'Codemp', 'Nomemp', 'Feccal', 'Fecdes', 'Fechas', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpasiempcontPeer::CODTIPCON, NpasiempcontPeer::CODNOM, NpasiempcontPeer::CODEMP, NpasiempcontPeer::NOMEMP, NpasiempcontPeer::FECCAL, NpasiempcontPeer::FECDES, NpasiempcontPeer::FECHAS, NpasiempcontPeer::STATUS, NpasiempcontPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codtipcon', 'codnom', 'codemp', 'nomemp', 'feccal', 'fecdes', 'fechas', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codtipcon' => 0, 'Codnom' => 1, 'Codemp' => 2, 'Nomemp' => 3, 'Feccal' => 4, 'Fecdes' => 5, 'Fechas' => 6, 'Status' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (NpasiempcontPeer::CODTIPCON => 0, NpasiempcontPeer::CODNOM => 1, NpasiempcontPeer::CODEMP => 2, NpasiempcontPeer::NOMEMP => 3, NpasiempcontPeer::FECCAL => 4, NpasiempcontPeer::FECDES => 5, NpasiempcontPeer::FECHAS => 6, NpasiempcontPeer::STATUS => 7, NpasiempcontPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codtipcon' => 0, 'codnom' => 1, 'codemp' => 2, 'nomemp' => 3, 'feccal' => 4, 'fecdes' => 5, 'fechas' => 6, 'status' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpasiempcontMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpasiempcontMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpasiempcontPeer::getTableMap();
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
		return str_replace(NpasiempcontPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpasiempcontPeer::CODTIPCON);

		$criteria->addSelectColumn(NpasiempcontPeer::CODNOM);

		$criteria->addSelectColumn(NpasiempcontPeer::CODEMP);

		$criteria->addSelectColumn(NpasiempcontPeer::NOMEMP);

		$criteria->addSelectColumn(NpasiempcontPeer::FECCAL);

		$criteria->addSelectColumn(NpasiempcontPeer::FECDES);

		$criteria->addSelectColumn(NpasiempcontPeer::FECHAS);

		$criteria->addSelectColumn(NpasiempcontPeer::STATUS);

		$criteria->addSelectColumn(NpasiempcontPeer::ID);

	}

	const COUNT = 'COUNT(npasiempcont.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npasiempcont.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpasiempcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpasiempcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpasiempcontPeer::doSelectRS($criteria, $con);
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
		$objects = NpasiempcontPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpasiempcontPeer::populateObjects(NpasiempcontPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpasiempcontPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpasiempcontPeer::getOMClass();
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
		return NpasiempcontPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpasiempcontPeer::ID); 

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
			$comparison = $criteria->getComparison(NpasiempcontPeer::ID);
			$selectCriteria->add(NpasiempcontPeer::ID, $criteria->remove(NpasiempcontPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpasiempcontPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpasiempcontPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npasiempcont) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpasiempcontPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npasiempcont $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpasiempcontPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpasiempcontPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpasiempcontPeer::DATABASE_NAME, NpasiempcontPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpasiempcontPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpasiempcontPeer::DATABASE_NAME);

		$criteria->add(NpasiempcontPeer::ID, $pk);


		$v = NpasiempcontPeer::doSelect($criteria, $con);

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
			$criteria->add(NpasiempcontPeer::ID, $pks, Criteria::IN);
			$objs = NpasiempcontPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpasiempcontPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpasiempcontMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpasiempcontMapBuilder');
}
