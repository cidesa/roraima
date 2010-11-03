<?php


abstract class BaseNpfalperPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npfalper';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npfalper';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npfalper.CODEMP';

	
	const CODMOT = 'npfalper.CODMOT';

	
	const CODNOM = 'npfalper.CODNOM';

	
	const NRODIA = 'npfalper.NRODIA';

	
	const OBSERV = 'npfalper.OBSERV';

	
	const FECDES = 'npfalper.FECDES';

	
	const FECHAS = 'npfalper.FECHAS';

	
	const NROHORAS = 'npfalper.NROHORAS';

	
	const NUMCTR = 'npfalper.NUMCTR';

	
	const ID = 'npfalper.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Codmot', 'Codnom', 'Nrodia', 'Observ', 'Fecdes', 'Fechas', 'Nrohoras', 'Numctr', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpfalperPeer::CODEMP, NpfalperPeer::CODMOT, NpfalperPeer::CODNOM, NpfalperPeer::NRODIA, NpfalperPeer::OBSERV, NpfalperPeer::FECDES, NpfalperPeer::FECHAS, NpfalperPeer::NROHORAS, NpfalperPeer::NUMCTR, NpfalperPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'codmot', 'codnom', 'nrodia', 'observ', 'fecdes', 'fechas', 'nrohoras', 'numctr', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Codmot' => 1, 'Codnom' => 2, 'Nrodia' => 3, 'Observ' => 4, 'Fecdes' => 5, 'Fechas' => 6, 'Nrohoras' => 7, 'Numctr' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (NpfalperPeer::CODEMP => 0, NpfalperPeer::CODMOT => 1, NpfalperPeer::CODNOM => 2, NpfalperPeer::NRODIA => 3, NpfalperPeer::OBSERV => 4, NpfalperPeer::FECDES => 5, NpfalperPeer::FECHAS => 6, NpfalperPeer::NROHORAS => 7, NpfalperPeer::NUMCTR => 8, NpfalperPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'codmot' => 1, 'codnom' => 2, 'nrodia' => 3, 'observ' => 4, 'fecdes' => 5, 'fechas' => 6, 'nrohoras' => 7, 'numctr' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpfalperMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpfalperMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpfalperPeer::getTableMap();
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
		return str_replace(NpfalperPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpfalperPeer::CODEMP);

		$criteria->addSelectColumn(NpfalperPeer::CODMOT);

		$criteria->addSelectColumn(NpfalperPeer::CODNOM);

		$criteria->addSelectColumn(NpfalperPeer::NRODIA);

		$criteria->addSelectColumn(NpfalperPeer::OBSERV);

		$criteria->addSelectColumn(NpfalperPeer::FECDES);

		$criteria->addSelectColumn(NpfalperPeer::FECHAS);

		$criteria->addSelectColumn(NpfalperPeer::NROHORAS);

		$criteria->addSelectColumn(NpfalperPeer::NUMCTR);

		$criteria->addSelectColumn(NpfalperPeer::ID);

	}

	const COUNT = 'COUNT(npfalper.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npfalper.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpfalperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpfalperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpfalperPeer::doSelectRS($criteria, $con);
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
		$objects = NpfalperPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpfalperPeer::populateObjects(NpfalperPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpfalperPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpfalperPeer::getOMClass();
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
		return NpfalperPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpfalperPeer::ID); 

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
			$comparison = $criteria->getComparison(NpfalperPeer::ID);
			$selectCriteria->add(NpfalperPeer::ID, $criteria->remove(NpfalperPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpfalperPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpfalperPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npfalper) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpfalperPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npfalper $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpfalperPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpfalperPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpfalperPeer::DATABASE_NAME, NpfalperPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpfalperPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpfalperPeer::DATABASE_NAME);

		$criteria->add(NpfalperPeer::ID, $pk);


		$v = NpfalperPeer::doSelect($criteria, $con);

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
			$criteria->add(NpfalperPeer::ID, $pks, Criteria::IN);
			$objs = NpfalperPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpfalperPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpfalperMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpfalperMapBuilder');
}
