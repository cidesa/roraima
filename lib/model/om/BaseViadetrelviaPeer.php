<?php


abstract class BaseViadetrelviaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viadetrelvia';

	
	const CLASS_DEFAULT = 'lib.model.Viadetrelvia';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMREL = 'viadetrelvia.NUMREL';

	
	const FECREL = 'viadetrelvia.FECREL';

	
	const CODPRO = 'viadetrelvia.CODPRO';

	
	const NUMFAC = 'viadetrelvia.NUMFAC';

	
	const FECFAC = 'viadetrelvia.FECFAC';

	
	const MONTONET = 'viadetrelvia.MONTONET';

	
	const MONTOREC = 'viadetrelvia.MONTOREC';

	
	const CODCAT = 'viadetrelvia.CODCAT';

	
	const CODPAR = 'viadetrelvia.CODPAR';

	
	const REFSOL = 'viadetrelvia.REFSOL';

	
	const ID = 'viadetrelvia.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numrel', 'Fecrel', 'Codpro', 'Numfac', 'Fecfac', 'Montonet', 'Montorec', 'Codcat', 'Codpar', 'Refsol', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViadetrelviaPeer::NUMREL, ViadetrelviaPeer::FECREL, ViadetrelviaPeer::CODPRO, ViadetrelviaPeer::NUMFAC, ViadetrelviaPeer::FECFAC, ViadetrelviaPeer::MONTONET, ViadetrelviaPeer::MONTOREC, ViadetrelviaPeer::CODCAT, ViadetrelviaPeer::CODPAR, ViadetrelviaPeer::REFSOL, ViadetrelviaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numrel', 'fecrel', 'codpro', 'numfac', 'fecfac', 'montonet', 'montorec', 'codcat', 'codpar', 'refsol', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numrel' => 0, 'Fecrel' => 1, 'Codpro' => 2, 'Numfac' => 3, 'Fecfac' => 4, 'Montonet' => 5, 'Montorec' => 6, 'Codcat' => 7, 'Codpar' => 8, 'Refsol' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (ViadetrelviaPeer::NUMREL => 0, ViadetrelviaPeer::FECREL => 1, ViadetrelviaPeer::CODPRO => 2, ViadetrelviaPeer::NUMFAC => 3, ViadetrelviaPeer::FECFAC => 4, ViadetrelviaPeer::MONTONET => 5, ViadetrelviaPeer::MONTOREC => 6, ViadetrelviaPeer::CODCAT => 7, ViadetrelviaPeer::CODPAR => 8, ViadetrelviaPeer::REFSOL => 9, ViadetrelviaPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('numrel' => 0, 'fecrel' => 1, 'codpro' => 2, 'numfac' => 3, 'fecfac' => 4, 'montonet' => 5, 'montorec' => 6, 'codcat' => 7, 'codpar' => 8, 'refsol' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViadetrelviaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViadetrelviaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViadetrelviaPeer::getTableMap();
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
		return str_replace(ViadetrelviaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViadetrelviaPeer::NUMREL);

		$criteria->addSelectColumn(ViadetrelviaPeer::FECREL);

		$criteria->addSelectColumn(ViadetrelviaPeer::CODPRO);

		$criteria->addSelectColumn(ViadetrelviaPeer::NUMFAC);

		$criteria->addSelectColumn(ViadetrelviaPeer::FECFAC);

		$criteria->addSelectColumn(ViadetrelviaPeer::MONTONET);

		$criteria->addSelectColumn(ViadetrelviaPeer::MONTOREC);

		$criteria->addSelectColumn(ViadetrelviaPeer::CODCAT);

		$criteria->addSelectColumn(ViadetrelviaPeer::CODPAR);

		$criteria->addSelectColumn(ViadetrelviaPeer::REFSOL);

		$criteria->addSelectColumn(ViadetrelviaPeer::ID);

	}

	const COUNT = 'COUNT(viadetrelvia.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viadetrelvia.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadetrelviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadetrelviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViadetrelviaPeer::doSelectRS($criteria, $con);
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
		$objects = ViadetrelviaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViadetrelviaPeer::populateObjects(ViadetrelviaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViadetrelviaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViadetrelviaPeer::getOMClass();
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
		return ViadetrelviaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViadetrelviaPeer::ID); 

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
			$comparison = $criteria->getComparison(ViadetrelviaPeer::ID);
			$selectCriteria->add(ViadetrelviaPeer::ID, $criteria->remove(ViadetrelviaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViadetrelviaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViadetrelviaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viadetrelvia) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViadetrelviaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viadetrelvia $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViadetrelviaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViadetrelviaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViadetrelviaPeer::DATABASE_NAME, ViadetrelviaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViadetrelviaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViadetrelviaPeer::DATABASE_NAME);

		$criteria->add(ViadetrelviaPeer::ID, $pk);


		$v = ViadetrelviaPeer::doSelect($criteria, $con);

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
			$criteria->add(ViadetrelviaPeer::ID, $pks, Criteria::IN);
			$objs = ViadetrelviaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViadetrelviaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViadetrelviaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViadetrelviaMapBuilder');
}
