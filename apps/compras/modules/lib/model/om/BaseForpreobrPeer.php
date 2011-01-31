<?php


abstract class BaseForpreobrPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'forpreobr';

	
	const CLASS_DEFAULT = 'lib.model.Forpreobr';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCAT = 'forpreobr.CODCAT';

	
	const CODOBR = 'forpreobr.CODOBR';

	
	const CODPAREGR = 'forpreobr.CODPAREGR';

	
	const MONPRE = 'forpreobr.MONPRE';

	
	const CODTIP = 'forpreobr.CODTIP';

	
	const OBSERV = 'forpreobr.OBSERV';

	
	const CODFIN = 'forpreobr.CODFIN';

	
	const FUNCIONARIO = 'forpreobr.FUNCIONARIO';

	
	const FECINI = 'forpreobr.FECINI';

	
	const FECFIN = 'forpreobr.FECFIN';

	
	const SITUACION = 'forpreobr.SITUACION';

	
	const COMPROANOANT = 'forpreobr.COMPROANOANT';

	
	const COMPROVIG = 'forpreobr.COMPROVIG';

	
	const EJECANOANT = 'forpreobr.EJECANOANT';

	
	const EJECANOVIG = 'forpreobr.EJECANOVIG';

	
	const ESTANOPOST = 'forpreobr.ESTANOPOST';

	
	const NOMPAREGR = 'forpreobr.NOMPAREGR';

	
	const ID = 'forpreobr.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat', 'Codobr', 'Codparegr', 'Monpre', 'Codtip', 'Observ', 'Codfin', 'Funcionario', 'Fecini', 'Fecfin', 'Situacion', 'Comproanoant', 'Comprovig', 'Ejecanoant', 'Ejecanovig', 'Estanopost', 'Nomparegr', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ForpreobrPeer::CODCAT, ForpreobrPeer::CODOBR, ForpreobrPeer::CODPAREGR, ForpreobrPeer::MONPRE, ForpreobrPeer::CODTIP, ForpreobrPeer::OBSERV, ForpreobrPeer::CODFIN, ForpreobrPeer::FUNCIONARIO, ForpreobrPeer::FECINI, ForpreobrPeer::FECFIN, ForpreobrPeer::SITUACION, ForpreobrPeer::COMPROANOANT, ForpreobrPeer::COMPROVIG, ForpreobrPeer::EJECANOANT, ForpreobrPeer::EJECANOVIG, ForpreobrPeer::ESTANOPOST, ForpreobrPeer::NOMPAREGR, ForpreobrPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat', 'codobr', 'codparegr', 'monpre', 'codtip', 'observ', 'codfin', 'funcionario', 'fecini', 'fecfin', 'situacion', 'comproanoant', 'comprovig', 'ejecanoant', 'ejecanovig', 'estanopost', 'nomparegr', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat' => 0, 'Codobr' => 1, 'Codparegr' => 2, 'Monpre' => 3, 'Codtip' => 4, 'Observ' => 5, 'Codfin' => 6, 'Funcionario' => 7, 'Fecini' => 8, 'Fecfin' => 9, 'Situacion' => 10, 'Comproanoant' => 11, 'Comprovig' => 12, 'Ejecanoant' => 13, 'Ejecanovig' => 14, 'Estanopost' => 15, 'Nomparegr' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (ForpreobrPeer::CODCAT => 0, ForpreobrPeer::CODOBR => 1, ForpreobrPeer::CODPAREGR => 2, ForpreobrPeer::MONPRE => 3, ForpreobrPeer::CODTIP => 4, ForpreobrPeer::OBSERV => 5, ForpreobrPeer::CODFIN => 6, ForpreobrPeer::FUNCIONARIO => 7, ForpreobrPeer::FECINI => 8, ForpreobrPeer::FECFIN => 9, ForpreobrPeer::SITUACION => 10, ForpreobrPeer::COMPROANOANT => 11, ForpreobrPeer::COMPROVIG => 12, ForpreobrPeer::EJECANOANT => 13, ForpreobrPeer::EJECANOVIG => 14, ForpreobrPeer::ESTANOPOST => 15, ForpreobrPeer::NOMPAREGR => 16, ForpreobrPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat' => 0, 'codobr' => 1, 'codparegr' => 2, 'monpre' => 3, 'codtip' => 4, 'observ' => 5, 'codfin' => 6, 'funcionario' => 7, 'fecini' => 8, 'fecfin' => 9, 'situacion' => 10, 'comproanoant' => 11, 'comprovig' => 12, 'ejecanoant' => 13, 'ejecanovig' => 14, 'estanopost' => 15, 'nomparegr' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ForpreobrMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ForpreobrMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ForpreobrPeer::getTableMap();
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
		return str_replace(ForpreobrPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ForpreobrPeer::CODCAT);

		$criteria->addSelectColumn(ForpreobrPeer::CODOBR);

		$criteria->addSelectColumn(ForpreobrPeer::CODPAREGR);

		$criteria->addSelectColumn(ForpreobrPeer::MONPRE);

		$criteria->addSelectColumn(ForpreobrPeer::CODTIP);

		$criteria->addSelectColumn(ForpreobrPeer::OBSERV);

		$criteria->addSelectColumn(ForpreobrPeer::CODFIN);

		$criteria->addSelectColumn(ForpreobrPeer::FUNCIONARIO);

		$criteria->addSelectColumn(ForpreobrPeer::FECINI);

		$criteria->addSelectColumn(ForpreobrPeer::FECFIN);

		$criteria->addSelectColumn(ForpreobrPeer::SITUACION);

		$criteria->addSelectColumn(ForpreobrPeer::COMPROANOANT);

		$criteria->addSelectColumn(ForpreobrPeer::COMPROVIG);

		$criteria->addSelectColumn(ForpreobrPeer::EJECANOANT);

		$criteria->addSelectColumn(ForpreobrPeer::EJECANOVIG);

		$criteria->addSelectColumn(ForpreobrPeer::ESTANOPOST);

		$criteria->addSelectColumn(ForpreobrPeer::NOMPAREGR);

		$criteria->addSelectColumn(ForpreobrPeer::ID);

	}

	const COUNT = 'COUNT(forpreobr.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT forpreobr.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ForpreobrPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ForpreobrPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ForpreobrPeer::doSelectRS($criteria, $con);
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
		$objects = ForpreobrPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ForpreobrPeer::populateObjects(ForpreobrPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ForpreobrPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ForpreobrPeer::getOMClass();
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
		return ForpreobrPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ForpreobrPeer::ID); 

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
			$comparison = $criteria->getComparison(ForpreobrPeer::ID);
			$selectCriteria->add(ForpreobrPeer::ID, $criteria->remove(ForpreobrPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ForpreobrPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ForpreobrPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Forpreobr) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ForpreobrPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Forpreobr $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ForpreobrPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ForpreobrPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ForpreobrPeer::DATABASE_NAME, ForpreobrPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ForpreobrPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ForpreobrPeer::DATABASE_NAME);

		$criteria->add(ForpreobrPeer::ID, $pk);


		$v = ForpreobrPeer::doSelect($criteria, $con);

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
			$criteria->add(ForpreobrPeer::ID, $pks, Criteria::IN);
			$objs = ForpreobrPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseForpreobrPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ForpreobrMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ForpreobrMapBuilder');
}
