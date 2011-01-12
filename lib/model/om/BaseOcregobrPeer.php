<?php


abstract class BaseOcregobrPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocregobr';

	
	const CLASS_DEFAULT = 'lib.model.Ocregobr';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODOBR = 'ocregobr.CODOBR';

	
	const CODTIPOBR = 'ocregobr.CODTIPOBR';

	
	const DESOBR = 'ocregobr.DESOBR';

	
	const FECREG = 'ocregobr.FECREG';

	
	const FECINI = 'ocregobr.FECINI';

	
	const FECFIN = 'ocregobr.FECFIN';

	
	const UNOCON = 'ocregobr.UNOCON';

	
	const CODPRE = 'ocregobr.CODPRE';

	
	const CODPAI = 'ocregobr.CODPAI';

	
	const CODEDO = 'ocregobr.CODEDO';

	
	const CODMUN = 'ocregobr.CODMUN';

	
	const CODPAR = 'ocregobr.CODPAR';

	
	const CODSEC = 'ocregobr.CODSEC';

	
	const DIROBR = 'ocregobr.DIROBR';

	
	const MONOBR = 'ocregobr.MONOBR';

	
	const STAOBR = 'ocregobr.STAOBR';

	
	const DESPRE = 'ocregobr.DESPRE';

	
	const SUBTOT = 'ocregobr.SUBTOT';

	
	const MONIVA = 'ocregobr.MONIVA';

	
	const IVAOBR = 'ocregobr.IVAOBR';

	
	const CODPREIVA = 'ocregobr.CODPREIVA';

	
	const ID = 'ocregobr.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codobr', 'Codtipobr', 'Desobr', 'Fecreg', 'Fecini', 'Fecfin', 'Unocon', 'Codpre', 'Codpai', 'Codedo', 'Codmun', 'Codpar', 'Codsec', 'Dirobr', 'Monobr', 'Staobr', 'Despre', 'Subtot', 'Moniva', 'Ivaobr', 'Codpreiva', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcregobrPeer::CODOBR, OcregobrPeer::CODTIPOBR, OcregobrPeer::DESOBR, OcregobrPeer::FECREG, OcregobrPeer::FECINI, OcregobrPeer::FECFIN, OcregobrPeer::UNOCON, OcregobrPeer::CODPRE, OcregobrPeer::CODPAI, OcregobrPeer::CODEDO, OcregobrPeer::CODMUN, OcregobrPeer::CODPAR, OcregobrPeer::CODSEC, OcregobrPeer::DIROBR, OcregobrPeer::MONOBR, OcregobrPeer::STAOBR, OcregobrPeer::DESPRE, OcregobrPeer::SUBTOT, OcregobrPeer::MONIVA, OcregobrPeer::IVAOBR, OcregobrPeer::CODPREIVA, OcregobrPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codobr', 'codtipobr', 'desobr', 'fecreg', 'fecini', 'fecfin', 'unocon', 'codpre', 'codpai', 'codedo', 'codmun', 'codpar', 'codsec', 'dirobr', 'monobr', 'staobr', 'despre', 'subtot', 'moniva', 'ivaobr', 'codpreiva', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codobr' => 0, 'Codtipobr' => 1, 'Desobr' => 2, 'Fecreg' => 3, 'Fecini' => 4, 'Fecfin' => 5, 'Unocon' => 6, 'Codpre' => 7, 'Codpai' => 8, 'Codedo' => 9, 'Codmun' => 10, 'Codpar' => 11, 'Codsec' => 12, 'Dirobr' => 13, 'Monobr' => 14, 'Staobr' => 15, 'Despre' => 16, 'Subtot' => 17, 'Moniva' => 18, 'Ivaobr' => 19, 'Codpreiva' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (OcregobrPeer::CODOBR => 0, OcregobrPeer::CODTIPOBR => 1, OcregobrPeer::DESOBR => 2, OcregobrPeer::FECREG => 3, OcregobrPeer::FECINI => 4, OcregobrPeer::FECFIN => 5, OcregobrPeer::UNOCON => 6, OcregobrPeer::CODPRE => 7, OcregobrPeer::CODPAI => 8, OcregobrPeer::CODEDO => 9, OcregobrPeer::CODMUN => 10, OcregobrPeer::CODPAR => 11, OcregobrPeer::CODSEC => 12, OcregobrPeer::DIROBR => 13, OcregobrPeer::MONOBR => 14, OcregobrPeer::STAOBR => 15, OcregobrPeer::DESPRE => 16, OcregobrPeer::SUBTOT => 17, OcregobrPeer::MONIVA => 18, OcregobrPeer::IVAOBR => 19, OcregobrPeer::CODPREIVA => 20, OcregobrPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('codobr' => 0, 'codtipobr' => 1, 'desobr' => 2, 'fecreg' => 3, 'fecini' => 4, 'fecfin' => 5, 'unocon' => 6, 'codpre' => 7, 'codpai' => 8, 'codedo' => 9, 'codmun' => 10, 'codpar' => 11, 'codsec' => 12, 'dirobr' => 13, 'monobr' => 14, 'staobr' => 15, 'despre' => 16, 'subtot' => 17, 'moniva' => 18, 'ivaobr' => 19, 'codpreiva' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcregobrMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcregobrMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcregobrPeer::getTableMap();
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
		return str_replace(OcregobrPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcregobrPeer::CODOBR);

		$criteria->addSelectColumn(OcregobrPeer::CODTIPOBR);

		$criteria->addSelectColumn(OcregobrPeer::DESOBR);

		$criteria->addSelectColumn(OcregobrPeer::FECREG);

		$criteria->addSelectColumn(OcregobrPeer::FECINI);

		$criteria->addSelectColumn(OcregobrPeer::FECFIN);

		$criteria->addSelectColumn(OcregobrPeer::UNOCON);

		$criteria->addSelectColumn(OcregobrPeer::CODPRE);

		$criteria->addSelectColumn(OcregobrPeer::CODPAI);

		$criteria->addSelectColumn(OcregobrPeer::CODEDO);

		$criteria->addSelectColumn(OcregobrPeer::CODMUN);

		$criteria->addSelectColumn(OcregobrPeer::CODPAR);

		$criteria->addSelectColumn(OcregobrPeer::CODSEC);

		$criteria->addSelectColumn(OcregobrPeer::DIROBR);

		$criteria->addSelectColumn(OcregobrPeer::MONOBR);

		$criteria->addSelectColumn(OcregobrPeer::STAOBR);

		$criteria->addSelectColumn(OcregobrPeer::DESPRE);

		$criteria->addSelectColumn(OcregobrPeer::SUBTOT);

		$criteria->addSelectColumn(OcregobrPeer::MONIVA);

		$criteria->addSelectColumn(OcregobrPeer::IVAOBR);

		$criteria->addSelectColumn(OcregobrPeer::CODPREIVA);

		$criteria->addSelectColumn(OcregobrPeer::ID);

	}

	const COUNT = 'COUNT(ocregobr.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocregobr.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcregobrPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcregobrPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcregobrPeer::doSelectRS($criteria, $con);
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
		$objects = OcregobrPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcregobrPeer::populateObjects(OcregobrPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcregobrPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcregobrPeer::getOMClass();
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
		return OcregobrPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OcregobrPeer::ID); 

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
			$comparison = $criteria->getComparison(OcregobrPeer::ID);
			$selectCriteria->add(OcregobrPeer::ID, $criteria->remove(OcregobrPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OcregobrPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OcregobrPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocregobr) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcregobrPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ocregobr $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcregobrPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcregobrPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OcregobrPeer::DATABASE_NAME, OcregobrPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcregobrPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OcregobrPeer::DATABASE_NAME);

		$criteria->add(OcregobrPeer::ID, $pk);


		$v = OcregobrPeer::doSelect($criteria, $con);

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
			$criteria->add(OcregobrPeer::ID, $pks, Criteria::IN);
			$objs = OcregobrPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcregobrPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcregobrMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcregobrMapBuilder');
}
