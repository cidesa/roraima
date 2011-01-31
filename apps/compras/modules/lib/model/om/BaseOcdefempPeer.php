<?php


abstract class BaseOcdefempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocdefemp';

	
	const CLASS_DEFAULT = 'lib.model.Ocdefemp';

	
	const NUM_COLUMNS = 36;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'ocdefemp.CODEMP';

	
	const NOMEMP = 'ocdefemp.NOMEMP';

	
	const DIREMP = 'ocdefemp.DIREMP';

	
	const TELEMP = 'ocdefemp.TELEMP';

	
	const FAXEMP = 'ocdefemp.FAXEMP';

	
	const EMAEMP = 'ocdefemp.EMAEMP';

	
	const PORANT = 'ocdefemp.PORANT';

	
	const PLAINI = 'ocdefemp.PLAINI';

	
	const PORAUMOBR = 'ocdefemp.PORAUMOBR';

	
	const PORMUL = 'ocdefemp.PORMUL';

	
	const UNITRI = 'ocdefemp.UNITRI';

	
	const CODACTPROINI = 'ocdefemp.CODACTPROINI';

	
	const CODACTINI = 'ocdefemp.CODACTINI';

	
	const CODACTPAR = 'ocdefemp.CODACTPAR';

	
	const CODACTREI = 'ocdefemp.CODACTREI';

	
	const CODACTPROTER = 'ocdefemp.CODACTPROTER';

	
	const CODACTTER = 'ocdefemp.CODACTTER';

	
	const CODACTRECPRO = 'ocdefemp.CODACTRECPRO';

	
	const CODACTRECDEF = 'ocdefemp.CODACTRECDEF';

	
	const CODINGRES = 'ocdefemp.CODINGRES';

	
	const CODCONOBR = 'ocdefemp.CODCONOBR';

	
	const CODCONINS = 'ocdefemp.CODCONINS';

	
	const CODCONSUP = 'ocdefemp.CODCONSUP';

	
	const CODCONPRO = 'ocdefemp.CODCONPRO';

	
	const CODVALANT = 'ocdefemp.CODVALANT';

	
	const CODVALPAR = 'ocdefemp.CODVALPAR';

	
	const CODVALFIN = 'ocdefemp.CODVALFIN';

	
	const CODVALRET = 'ocdefemp.CODVALRET';

	
	const CODVALREC = 'ocdefemp.CODVALREC';

	
	const CODPARREC = 'ocdefemp.CODPARREC';

	
	const IVAANT = 'ocdefemp.IVAANT';

	
	const RETANT = 'ocdefemp.RETANT';

	
	const GENCOM = 'ocdefemp.GENCOM';

	
	const TIPCOM = 'ocdefemp.TIPCOM';

	
	const NUMINI = 'ocdefemp.NUMINI';

	
	const ID = 'ocdefemp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Nomemp', 'Diremp', 'Telemp', 'Faxemp', 'Emaemp', 'Porant', 'Plaini', 'Poraumobr', 'Pormul', 'Unitri', 'Codactproini', 'Codactini', 'Codactpar', 'Codactrei', 'Codactproter', 'Codactter', 'Codactrecpro', 'Codactrecdef', 'Codingres', 'Codconobr', 'Codconins', 'Codconsup', 'Codconpro', 'Codvalant', 'Codvalpar', 'Codvalfin', 'Codvalret', 'Codvalrec', 'Codparrec', 'Ivaant', 'Retant', 'Gencom', 'Tipcom', 'Numini', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcdefempPeer::CODEMP, OcdefempPeer::NOMEMP, OcdefempPeer::DIREMP, OcdefempPeer::TELEMP, OcdefempPeer::FAXEMP, OcdefempPeer::EMAEMP, OcdefempPeer::PORANT, OcdefempPeer::PLAINI, OcdefempPeer::PORAUMOBR, OcdefempPeer::PORMUL, OcdefempPeer::UNITRI, OcdefempPeer::CODACTPROINI, OcdefempPeer::CODACTINI, OcdefempPeer::CODACTPAR, OcdefempPeer::CODACTREI, OcdefempPeer::CODACTPROTER, OcdefempPeer::CODACTTER, OcdefempPeer::CODACTRECPRO, OcdefempPeer::CODACTRECDEF, OcdefempPeer::CODINGRES, OcdefempPeer::CODCONOBR, OcdefempPeer::CODCONINS, OcdefempPeer::CODCONSUP, OcdefempPeer::CODCONPRO, OcdefempPeer::CODVALANT, OcdefempPeer::CODVALPAR, OcdefempPeer::CODVALFIN, OcdefempPeer::CODVALRET, OcdefempPeer::CODVALREC, OcdefempPeer::CODPARREC, OcdefempPeer::IVAANT, OcdefempPeer::RETANT, OcdefempPeer::GENCOM, OcdefempPeer::TIPCOM, OcdefempPeer::NUMINI, OcdefempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'nomemp', 'diremp', 'telemp', 'faxemp', 'emaemp', 'porant', 'plaini', 'poraumobr', 'pormul', 'unitri', 'codactproini', 'codactini', 'codactpar', 'codactrei', 'codactproter', 'codactter', 'codactrecpro', 'codactrecdef', 'codingres', 'codconobr', 'codconins', 'codconsup', 'codconpro', 'codvalant', 'codvalpar', 'codvalfin', 'codvalret', 'codvalrec', 'codparrec', 'ivaant', 'retant', 'gencom', 'tipcom', 'numini', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Nomemp' => 1, 'Diremp' => 2, 'Telemp' => 3, 'Faxemp' => 4, 'Emaemp' => 5, 'Porant' => 6, 'Plaini' => 7, 'Poraumobr' => 8, 'Pormul' => 9, 'Unitri' => 10, 'Codactproini' => 11, 'Codactini' => 12, 'Codactpar' => 13, 'Codactrei' => 14, 'Codactproter' => 15, 'Codactter' => 16, 'Codactrecpro' => 17, 'Codactrecdef' => 18, 'Codingres' => 19, 'Codconobr' => 20, 'Codconins' => 21, 'Codconsup' => 22, 'Codconpro' => 23, 'Codvalant' => 24, 'Codvalpar' => 25, 'Codvalfin' => 26, 'Codvalret' => 27, 'Codvalrec' => 28, 'Codparrec' => 29, 'Ivaant' => 30, 'Retant' => 31, 'Gencom' => 32, 'Tipcom' => 33, 'Numini' => 34, 'Id' => 35, ),
		BasePeer::TYPE_COLNAME => array (OcdefempPeer::CODEMP => 0, OcdefempPeer::NOMEMP => 1, OcdefempPeer::DIREMP => 2, OcdefempPeer::TELEMP => 3, OcdefempPeer::FAXEMP => 4, OcdefempPeer::EMAEMP => 5, OcdefempPeer::PORANT => 6, OcdefempPeer::PLAINI => 7, OcdefempPeer::PORAUMOBR => 8, OcdefempPeer::PORMUL => 9, OcdefempPeer::UNITRI => 10, OcdefempPeer::CODACTPROINI => 11, OcdefempPeer::CODACTINI => 12, OcdefempPeer::CODACTPAR => 13, OcdefempPeer::CODACTREI => 14, OcdefempPeer::CODACTPROTER => 15, OcdefempPeer::CODACTTER => 16, OcdefempPeer::CODACTRECPRO => 17, OcdefempPeer::CODACTRECDEF => 18, OcdefempPeer::CODINGRES => 19, OcdefempPeer::CODCONOBR => 20, OcdefempPeer::CODCONINS => 21, OcdefempPeer::CODCONSUP => 22, OcdefempPeer::CODCONPRO => 23, OcdefempPeer::CODVALANT => 24, OcdefempPeer::CODVALPAR => 25, OcdefempPeer::CODVALFIN => 26, OcdefempPeer::CODVALRET => 27, OcdefempPeer::CODVALREC => 28, OcdefempPeer::CODPARREC => 29, OcdefempPeer::IVAANT => 30, OcdefempPeer::RETANT => 31, OcdefempPeer::GENCOM => 32, OcdefempPeer::TIPCOM => 33, OcdefempPeer::NUMINI => 34, OcdefempPeer::ID => 35, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'nomemp' => 1, 'diremp' => 2, 'telemp' => 3, 'faxemp' => 4, 'emaemp' => 5, 'porant' => 6, 'plaini' => 7, 'poraumobr' => 8, 'pormul' => 9, 'unitri' => 10, 'codactproini' => 11, 'codactini' => 12, 'codactpar' => 13, 'codactrei' => 14, 'codactproter' => 15, 'codactter' => 16, 'codactrecpro' => 17, 'codactrecdef' => 18, 'codingres' => 19, 'codconobr' => 20, 'codconins' => 21, 'codconsup' => 22, 'codconpro' => 23, 'codvalant' => 24, 'codvalpar' => 25, 'codvalfin' => 26, 'codvalret' => 27, 'codvalrec' => 28, 'codparrec' => 29, 'ivaant' => 30, 'retant' => 31, 'gencom' => 32, 'tipcom' => 33, 'numini' => 34, 'id' => 35, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcdefempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcdefempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcdefempPeer::getTableMap();
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
		return str_replace(OcdefempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcdefempPeer::CODEMP);

		$criteria->addSelectColumn(OcdefempPeer::NOMEMP);

		$criteria->addSelectColumn(OcdefempPeer::DIREMP);

		$criteria->addSelectColumn(OcdefempPeer::TELEMP);

		$criteria->addSelectColumn(OcdefempPeer::FAXEMP);

		$criteria->addSelectColumn(OcdefempPeer::EMAEMP);

		$criteria->addSelectColumn(OcdefempPeer::PORANT);

		$criteria->addSelectColumn(OcdefempPeer::PLAINI);

		$criteria->addSelectColumn(OcdefempPeer::PORAUMOBR);

		$criteria->addSelectColumn(OcdefempPeer::PORMUL);

		$criteria->addSelectColumn(OcdefempPeer::UNITRI);

		$criteria->addSelectColumn(OcdefempPeer::CODACTPROINI);

		$criteria->addSelectColumn(OcdefempPeer::CODACTINI);

		$criteria->addSelectColumn(OcdefempPeer::CODACTPAR);

		$criteria->addSelectColumn(OcdefempPeer::CODACTREI);

		$criteria->addSelectColumn(OcdefempPeer::CODACTPROTER);

		$criteria->addSelectColumn(OcdefempPeer::CODACTTER);

		$criteria->addSelectColumn(OcdefempPeer::CODACTRECPRO);

		$criteria->addSelectColumn(OcdefempPeer::CODACTRECDEF);

		$criteria->addSelectColumn(OcdefempPeer::CODINGRES);

		$criteria->addSelectColumn(OcdefempPeer::CODCONOBR);

		$criteria->addSelectColumn(OcdefempPeer::CODCONINS);

		$criteria->addSelectColumn(OcdefempPeer::CODCONSUP);

		$criteria->addSelectColumn(OcdefempPeer::CODCONPRO);

		$criteria->addSelectColumn(OcdefempPeer::CODVALANT);

		$criteria->addSelectColumn(OcdefempPeer::CODVALPAR);

		$criteria->addSelectColumn(OcdefempPeer::CODVALFIN);

		$criteria->addSelectColumn(OcdefempPeer::CODVALRET);

		$criteria->addSelectColumn(OcdefempPeer::CODVALREC);

		$criteria->addSelectColumn(OcdefempPeer::CODPARREC);

		$criteria->addSelectColumn(OcdefempPeer::IVAANT);

		$criteria->addSelectColumn(OcdefempPeer::RETANT);

		$criteria->addSelectColumn(OcdefempPeer::GENCOM);

		$criteria->addSelectColumn(OcdefempPeer::TIPCOM);

		$criteria->addSelectColumn(OcdefempPeer::NUMINI);

		$criteria->addSelectColumn(OcdefempPeer::ID);

	}

	const COUNT = 'COUNT(ocdefemp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocdefemp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcdefempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcdefempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcdefempPeer::doSelectRS($criteria, $con);
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
		$objects = OcdefempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcdefempPeer::populateObjects(OcdefempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcdefempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcdefempPeer::getOMClass();
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
		return OcdefempPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OcdefempPeer::ID); 

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
			$comparison = $criteria->getComparison(OcdefempPeer::ID);
			$selectCriteria->add(OcdefempPeer::ID, $criteria->remove(OcdefempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OcdefempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OcdefempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocdefemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcdefempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ocdefemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcdefempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcdefempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OcdefempPeer::DATABASE_NAME, OcdefempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcdefempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OcdefempPeer::DATABASE_NAME);

		$criteria->add(OcdefempPeer::ID, $pk);


		$v = OcdefempPeer::doSelect($criteria, $con);

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
			$criteria->add(OcdefempPeer::ID, $pks, Criteria::IN);
			$objs = OcdefempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcdefempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcdefempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcdefempMapBuilder');
}
