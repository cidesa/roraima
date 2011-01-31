<?php


abstract class BaseNpfalperempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npfalperemp';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npfalperemp';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npfalperemp.CODEMP';

	
	const FECINI = 'npfalperemp.FECINI';

	
	const FECRET = 'npfalperemp.FECRET';

	
	const HORAS = 'npfalperemp.HORAS';

	
	const CODMOT = 'npfalperemp.CODMOT';

	
	const OBSERV = 'npfalperemp.OBSERV';

	
	const FECCON = 'npfalperemp.FECCON';

	
	const IVSS = 'npfalperemp.IVSS';

	
	const ID = 'npfalperemp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Fecini', 'Fecret', 'Horas', 'Codmot', 'Observ', 'Feccon', 'Ivss', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpfalperempPeer::CODEMP, NpfalperempPeer::FECINI, NpfalperempPeer::FECRET, NpfalperempPeer::HORAS, NpfalperempPeer::CODMOT, NpfalperempPeer::OBSERV, NpfalperempPeer::FECCON, NpfalperempPeer::IVSS, NpfalperempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'fecini', 'fecret', 'horas', 'codmot', 'observ', 'feccon', 'ivss', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Fecini' => 1, 'Fecret' => 2, 'Horas' => 3, 'Codmot' => 4, 'Observ' => 5, 'Feccon' => 6, 'Ivss' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (NpfalperempPeer::CODEMP => 0, NpfalperempPeer::FECINI => 1, NpfalperempPeer::FECRET => 2, NpfalperempPeer::HORAS => 3, NpfalperempPeer::CODMOT => 4, NpfalperempPeer::OBSERV => 5, NpfalperempPeer::FECCON => 6, NpfalperempPeer::IVSS => 7, NpfalperempPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'fecini' => 1, 'fecret' => 2, 'horas' => 3, 'codmot' => 4, 'observ' => 5, 'feccon' => 6, 'ivss' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpfalperempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpfalperempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpfalperempPeer::getTableMap();
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
		return str_replace(NpfalperempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpfalperempPeer::CODEMP);

		$criteria->addSelectColumn(NpfalperempPeer::FECINI);

		$criteria->addSelectColumn(NpfalperempPeer::FECRET);

		$criteria->addSelectColumn(NpfalperempPeer::HORAS);

		$criteria->addSelectColumn(NpfalperempPeer::CODMOT);

		$criteria->addSelectColumn(NpfalperempPeer::OBSERV);

		$criteria->addSelectColumn(NpfalperempPeer::FECCON);

		$criteria->addSelectColumn(NpfalperempPeer::IVSS);

		$criteria->addSelectColumn(NpfalperempPeer::ID);

	}

	const COUNT = 'COUNT(npfalperemp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npfalperemp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpfalperempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpfalperempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpfalperempPeer::doSelectRS($criteria, $con);
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
		$objects = NpfalperempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpfalperempPeer::populateObjects(NpfalperempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpfalperempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpfalperempPeer::getOMClass();
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
		return NpfalperempPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpfalperempPeer::ID); 

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
			$comparison = $criteria->getComparison(NpfalperempPeer::ID);
			$selectCriteria->add(NpfalperempPeer::ID, $criteria->remove(NpfalperempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpfalperempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpfalperempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npfalperemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpfalperempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npfalperemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpfalperempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpfalperempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpfalperempPeer::DATABASE_NAME, NpfalperempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpfalperempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpfalperempPeer::DATABASE_NAME);

		$criteria->add(NpfalperempPeer::ID, $pk);


		$v = NpfalperempPeer::doSelect($criteria, $con);

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
			$criteria->add(NpfalperempPeer::ID, $pks, Criteria::IN);
			$objs = NpfalperempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpfalperempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpfalperempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpfalperempMapBuilder');
}
