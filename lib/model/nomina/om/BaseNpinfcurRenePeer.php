<?php


abstract class BaseNpinfcurRenePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npinfcur_rene';

	
	const CLASS_DEFAULT = 'lib.model.nomina.NpinfcurRene';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npinfcur_rene.CODEMP';

	
	const NOMTIT = 'npinfcur_rene.NOMTIT';

	
	const DESCUR = 'npinfcur_rene.DESCUR';

	
	const INSTIT = 'npinfcur_rene.INSTIT';

	
	const DURCUR = 'npinfcur_rene.DURCUR';

	
	const FECCUR = 'npinfcur_rene.FECCUR';

	
	const FECINI = 'npinfcur_rene.FECINI';

	
	const FECFIN = 'npinfcur_rene.FECFIN';

	
	const NIVEST = 'npinfcur_rene.NIVEST';

	
	const DIAINI = 'npinfcur_rene.DIAINI';

	
	const MESINI = 'npinfcur_rene.MESINI';

	
	const ANOINI = 'npinfcur_rene.ANOINI';

	
	const DIAFIN = 'npinfcur_rene.DIAFIN';

	
	const MESFIN = 'npinfcur_rene.MESFIN';

	
	const ANOFIN = 'npinfcur_rene.ANOFIN';

	
	const ID = 'npinfcur_rene.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Nomtit', 'Descur', 'Instit', 'Durcur', 'Feccur', 'Fecini', 'Fecfin', 'Nivest', 'Diaini', 'Mesini', 'Anoini', 'Diafin', 'Mesfin', 'Anofin', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpinfcurRenePeer::CODEMP, NpinfcurRenePeer::NOMTIT, NpinfcurRenePeer::DESCUR, NpinfcurRenePeer::INSTIT, NpinfcurRenePeer::DURCUR, NpinfcurRenePeer::FECCUR, NpinfcurRenePeer::FECINI, NpinfcurRenePeer::FECFIN, NpinfcurRenePeer::NIVEST, NpinfcurRenePeer::DIAINI, NpinfcurRenePeer::MESINI, NpinfcurRenePeer::ANOINI, NpinfcurRenePeer::DIAFIN, NpinfcurRenePeer::MESFIN, NpinfcurRenePeer::ANOFIN, NpinfcurRenePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'nomtit', 'descur', 'instit', 'durcur', 'feccur', 'fecini', 'fecfin', 'nivest', 'diaini', 'mesini', 'anoini', 'diafin', 'mesfin', 'anofin', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Nomtit' => 1, 'Descur' => 2, 'Instit' => 3, 'Durcur' => 4, 'Feccur' => 5, 'Fecini' => 6, 'Fecfin' => 7, 'Nivest' => 8, 'Diaini' => 9, 'Mesini' => 10, 'Anoini' => 11, 'Diafin' => 12, 'Mesfin' => 13, 'Anofin' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (NpinfcurRenePeer::CODEMP => 0, NpinfcurRenePeer::NOMTIT => 1, NpinfcurRenePeer::DESCUR => 2, NpinfcurRenePeer::INSTIT => 3, NpinfcurRenePeer::DURCUR => 4, NpinfcurRenePeer::FECCUR => 5, NpinfcurRenePeer::FECINI => 6, NpinfcurRenePeer::FECFIN => 7, NpinfcurRenePeer::NIVEST => 8, NpinfcurRenePeer::DIAINI => 9, NpinfcurRenePeer::MESINI => 10, NpinfcurRenePeer::ANOINI => 11, NpinfcurRenePeer::DIAFIN => 12, NpinfcurRenePeer::MESFIN => 13, NpinfcurRenePeer::ANOFIN => 14, NpinfcurRenePeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'nomtit' => 1, 'descur' => 2, 'instit' => 3, 'durcur' => 4, 'feccur' => 5, 'fecini' => 6, 'fecfin' => 7, 'nivest' => 8, 'diaini' => 9, 'mesini' => 10, 'anoini' => 11, 'diafin' => 12, 'mesfin' => 13, 'anofin' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpinfcurReneMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpinfcurReneMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpinfcurRenePeer::getTableMap();
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
		return str_replace(NpinfcurRenePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpinfcurRenePeer::CODEMP);

		$criteria->addSelectColumn(NpinfcurRenePeer::NOMTIT);

		$criteria->addSelectColumn(NpinfcurRenePeer::DESCUR);

		$criteria->addSelectColumn(NpinfcurRenePeer::INSTIT);

		$criteria->addSelectColumn(NpinfcurRenePeer::DURCUR);

		$criteria->addSelectColumn(NpinfcurRenePeer::FECCUR);

		$criteria->addSelectColumn(NpinfcurRenePeer::FECINI);

		$criteria->addSelectColumn(NpinfcurRenePeer::FECFIN);

		$criteria->addSelectColumn(NpinfcurRenePeer::NIVEST);

		$criteria->addSelectColumn(NpinfcurRenePeer::DIAINI);

		$criteria->addSelectColumn(NpinfcurRenePeer::MESINI);

		$criteria->addSelectColumn(NpinfcurRenePeer::ANOINI);

		$criteria->addSelectColumn(NpinfcurRenePeer::DIAFIN);

		$criteria->addSelectColumn(NpinfcurRenePeer::MESFIN);

		$criteria->addSelectColumn(NpinfcurRenePeer::ANOFIN);

		$criteria->addSelectColumn(NpinfcurRenePeer::ID);

	}

	const COUNT = 'COUNT(npinfcur_rene.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npinfcur_rene.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpinfcurRenePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpinfcurRenePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpinfcurRenePeer::doSelectRS($criteria, $con);
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
		$objects = NpinfcurRenePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpinfcurRenePeer::populateObjects(NpinfcurRenePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpinfcurRenePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpinfcurRenePeer::getOMClass();
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
		return NpinfcurRenePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpinfcurRenePeer::ID); 

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
			$comparison = $criteria->getComparison(NpinfcurRenePeer::ID);
			$selectCriteria->add(NpinfcurRenePeer::ID, $criteria->remove(NpinfcurRenePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpinfcurRenePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpinfcurRenePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NpinfcurRene) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpinfcurRenePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(NpinfcurRene $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpinfcurRenePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpinfcurRenePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpinfcurRenePeer::DATABASE_NAME, NpinfcurRenePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpinfcurRenePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpinfcurRenePeer::DATABASE_NAME);

		$criteria->add(NpinfcurRenePeer::ID, $pk);


		$v = NpinfcurRenePeer::doSelect($criteria, $con);

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
			$criteria->add(NpinfcurRenePeer::ID, $pks, Criteria::IN);
			$objs = NpinfcurRenePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpinfcurRenePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpinfcurReneMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpinfcurReneMapBuilder');
}
