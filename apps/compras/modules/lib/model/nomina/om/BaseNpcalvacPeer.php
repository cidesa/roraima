<?php


abstract class BaseNpcalvacPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npcalvac';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npcalvac';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npcalvac.CODEMP';

	
	const CODCAR = 'npcalvac.CODCAR';

	
	const CAUDES = 'npcalvac.CAUDES';

	
	const CAUHAS = 'npcalvac.CAUHAS';

	
	const DISDES = 'npcalvac.DISDES';

	
	const DISHAS = 'npcalvac.DISHAS';

	
	const FECREI = 'npcalvac.FECREI';

	
	const FECREG = 'npcalvac.FECREG';

	
	const DIAVAC = 'npcalvac.DIAVAC';

	
	const DIANHAB = 'npcalvac.DIANHAB';

	
	const DIAANT = 'npcalvac.DIAANT';

	
	const DIAPAG = 'npcalvac.DIAPAG';

	
	const DIADIS = 'npcalvac.DIADIS';

	
	const DIABON = 'npcalvac.DIABON';

	
	const MONVAC = 'npcalvac.MONVAC';

	
	const MONBON = 'npcalvac.MONBON';

	
	const STATUS = 'npcalvac.STATUS';

	
	const STAPAG = 'npcalvac.STAPAG';

	
	const ID = 'npcalvac.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Codcar', 'Caudes', 'Cauhas', 'Disdes', 'Dishas', 'Fecrei', 'Fecreg', 'Diavac', 'Dianhab', 'Diaant', 'Diapag', 'Diadis', 'Diabon', 'Monvac', 'Monbon', 'Status', 'Stapag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpcalvacPeer::CODEMP, NpcalvacPeer::CODCAR, NpcalvacPeer::CAUDES, NpcalvacPeer::CAUHAS, NpcalvacPeer::DISDES, NpcalvacPeer::DISHAS, NpcalvacPeer::FECREI, NpcalvacPeer::FECREG, NpcalvacPeer::DIAVAC, NpcalvacPeer::DIANHAB, NpcalvacPeer::DIAANT, NpcalvacPeer::DIAPAG, NpcalvacPeer::DIADIS, NpcalvacPeer::DIABON, NpcalvacPeer::MONVAC, NpcalvacPeer::MONBON, NpcalvacPeer::STATUS, NpcalvacPeer::STAPAG, NpcalvacPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'codcar', 'caudes', 'cauhas', 'disdes', 'dishas', 'fecrei', 'fecreg', 'diavac', 'dianhab', 'diaant', 'diapag', 'diadis', 'diabon', 'monvac', 'monbon', 'status', 'stapag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Codcar' => 1, 'Caudes' => 2, 'Cauhas' => 3, 'Disdes' => 4, 'Dishas' => 5, 'Fecrei' => 6, 'Fecreg' => 7, 'Diavac' => 8, 'Dianhab' => 9, 'Diaant' => 10, 'Diapag' => 11, 'Diadis' => 12, 'Diabon' => 13, 'Monvac' => 14, 'Monbon' => 15, 'Status' => 16, 'Stapag' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (NpcalvacPeer::CODEMP => 0, NpcalvacPeer::CODCAR => 1, NpcalvacPeer::CAUDES => 2, NpcalvacPeer::CAUHAS => 3, NpcalvacPeer::DISDES => 4, NpcalvacPeer::DISHAS => 5, NpcalvacPeer::FECREI => 6, NpcalvacPeer::FECREG => 7, NpcalvacPeer::DIAVAC => 8, NpcalvacPeer::DIANHAB => 9, NpcalvacPeer::DIAANT => 10, NpcalvacPeer::DIAPAG => 11, NpcalvacPeer::DIADIS => 12, NpcalvacPeer::DIABON => 13, NpcalvacPeer::MONVAC => 14, NpcalvacPeer::MONBON => 15, NpcalvacPeer::STATUS => 16, NpcalvacPeer::STAPAG => 17, NpcalvacPeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'codcar' => 1, 'caudes' => 2, 'cauhas' => 3, 'disdes' => 4, 'dishas' => 5, 'fecrei' => 6, 'fecreg' => 7, 'diavac' => 8, 'dianhab' => 9, 'diaant' => 10, 'diapag' => 11, 'diadis' => 12, 'diabon' => 13, 'monvac' => 14, 'monbon' => 15, 'status' => 16, 'stapag' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpcalvacMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpcalvacMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpcalvacPeer::getTableMap();
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
		return str_replace(NpcalvacPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpcalvacPeer::CODEMP);

		$criteria->addSelectColumn(NpcalvacPeer::CODCAR);

		$criteria->addSelectColumn(NpcalvacPeer::CAUDES);

		$criteria->addSelectColumn(NpcalvacPeer::CAUHAS);

		$criteria->addSelectColumn(NpcalvacPeer::DISDES);

		$criteria->addSelectColumn(NpcalvacPeer::DISHAS);

		$criteria->addSelectColumn(NpcalvacPeer::FECREI);

		$criteria->addSelectColumn(NpcalvacPeer::FECREG);

		$criteria->addSelectColumn(NpcalvacPeer::DIAVAC);

		$criteria->addSelectColumn(NpcalvacPeer::DIANHAB);

		$criteria->addSelectColumn(NpcalvacPeer::DIAANT);

		$criteria->addSelectColumn(NpcalvacPeer::DIAPAG);

		$criteria->addSelectColumn(NpcalvacPeer::DIADIS);

		$criteria->addSelectColumn(NpcalvacPeer::DIABON);

		$criteria->addSelectColumn(NpcalvacPeer::MONVAC);

		$criteria->addSelectColumn(NpcalvacPeer::MONBON);

		$criteria->addSelectColumn(NpcalvacPeer::STATUS);

		$criteria->addSelectColumn(NpcalvacPeer::STAPAG);

		$criteria->addSelectColumn(NpcalvacPeer::ID);

	}

	const COUNT = 'COUNT(npcalvac.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npcalvac.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpcalvacPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpcalvacPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpcalvacPeer::doSelectRS($criteria, $con);
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
		$objects = NpcalvacPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpcalvacPeer::populateObjects(NpcalvacPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpcalvacPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpcalvacPeer::getOMClass();
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
		return NpcalvacPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpcalvacPeer::ID); 

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
			$comparison = $criteria->getComparison(NpcalvacPeer::ID);
			$selectCriteria->add(NpcalvacPeer::ID, $criteria->remove(NpcalvacPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpcalvacPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpcalvacPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npcalvac) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpcalvacPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npcalvac $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpcalvacPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpcalvacPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpcalvacPeer::DATABASE_NAME, NpcalvacPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpcalvacPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpcalvacPeer::DATABASE_NAME);

		$criteria->add(NpcalvacPeer::ID, $pk);


		$v = NpcalvacPeer::doSelect($criteria, $con);

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
			$criteria->add(NpcalvacPeer::ID, $pks, Criteria::IN);
			$objs = NpcalvacPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpcalvacPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpcalvacMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpcalvacMapBuilder');
}
