<?php


abstract class BaseCpdefnivPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpdefniv';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpdefniv';

	
	const NUM_COLUMNS = 38;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'cpdefniv.CODEMP';

	
	const LONCOD = 'cpdefniv.LONCOD';

	
	const RUPCAT = 'cpdefniv.RUPCAT';

	
	const RUPPAR = 'cpdefniv.RUPPAR';

	
	const NIVDIS = 'cpdefniv.NIVDIS';

	
	const FORPRE = 'cpdefniv.FORPRE';

	
	const ASIPER = 'cpdefniv.ASIPER';

	
	const NUMPER = 'cpdefniv.NUMPER';

	
	const PERACT = 'cpdefniv.PERACT';

	
	const FECPER = 'cpdefniv.FECPER';

	
	const FECINI = 'cpdefniv.FECINI';

	
	const FECCIE = 'cpdefniv.FECCIE';

	
	const ETADEF = 'cpdefniv.ETADEF';

	
	const STAPRC = 'cpdefniv.STAPRC';

	
	const CORAEP = 'cpdefniv.CORAEP';

	
	const GENCOM = 'cpdefniv.GENCOM';

	
	const NUMCOM = 'cpdefniv.NUMCOM';

	
	const CARAEP = 'cpdefniv.CARAEP';

	
	const TIPTRAPRC = 'cpdefniv.TIPTRAPRC';

	
	const FUEORD = 'cpdefniv.FUEORD';

	
	const FUECRE = 'cpdefniv.FUECRE';

	
	const FUETRA = 'cpdefniv.FUETRA';

	
	const NOMGOB = 'cpdefniv.NOMGOB';

	
	const NOMSEC = 'cpdefniv.NOMSEC';

	
	const UNIDAD = 'cpdefniv.UNIDAD';

	
	const CORTRASLA = 'cpdefniv.CORTRASLA';

	
	const CORADIDIS = 'cpdefniv.CORADIDIS';

	
	const CORPRC = 'cpdefniv.CORPRC';

	
	const CORCOM = 'cpdefniv.CORCOM';

	
	const CORCAU = 'cpdefniv.CORCAU';

	
	const CORPAG = 'cpdefniv.CORPAG';

	
	const CORSOLADIDIS = 'cpdefniv.CORSOLADIDIS';

	
	const CORSOLTRA = 'cpdefniv.CORSOLTRA';

	
	const CORAJU = 'cpdefniv.CORAJU';

	
	const CORFUE = 'cpdefniv.CORFUE';

	
	const BTNANU = 'cpdefniv.BTNANU';

	
	const BTNELI = 'cpdefniv.BTNELI';

	
	const ID = 'cpdefniv.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Loncod', 'Rupcat', 'Ruppar', 'Nivdis', 'Forpre', 'Asiper', 'Numper', 'Peract', 'Fecper', 'Fecini', 'Feccie', 'Etadef', 'Staprc', 'Coraep', 'Gencom', 'Numcom', 'Caraep', 'Tiptraprc', 'Fueord', 'Fuecre', 'Fuetra', 'Nomgob', 'Nomsec', 'Unidad', 'Cortrasla', 'Coradidis', 'Corprc', 'Corcom', 'Corcau', 'Corpag', 'Corsoladidis', 'Corsoltra', 'Coraju', 'Corfue', 'Btnanu', 'Btneli', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpdefnivPeer::CODEMP, CpdefnivPeer::LONCOD, CpdefnivPeer::RUPCAT, CpdefnivPeer::RUPPAR, CpdefnivPeer::NIVDIS, CpdefnivPeer::FORPRE, CpdefnivPeer::ASIPER, CpdefnivPeer::NUMPER, CpdefnivPeer::PERACT, CpdefnivPeer::FECPER, CpdefnivPeer::FECINI, CpdefnivPeer::FECCIE, CpdefnivPeer::ETADEF, CpdefnivPeer::STAPRC, CpdefnivPeer::CORAEP, CpdefnivPeer::GENCOM, CpdefnivPeer::NUMCOM, CpdefnivPeer::CARAEP, CpdefnivPeer::TIPTRAPRC, CpdefnivPeer::FUEORD, CpdefnivPeer::FUECRE, CpdefnivPeer::FUETRA, CpdefnivPeer::NOMGOB, CpdefnivPeer::NOMSEC, CpdefnivPeer::UNIDAD, CpdefnivPeer::CORTRASLA, CpdefnivPeer::CORADIDIS, CpdefnivPeer::CORPRC, CpdefnivPeer::CORCOM, CpdefnivPeer::CORCAU, CpdefnivPeer::CORPAG, CpdefnivPeer::CORSOLADIDIS, CpdefnivPeer::CORSOLTRA, CpdefnivPeer::CORAJU, CpdefnivPeer::CORFUE, CpdefnivPeer::BTNANU, CpdefnivPeer::BTNELI, CpdefnivPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'loncod', 'rupcat', 'ruppar', 'nivdis', 'forpre', 'asiper', 'numper', 'peract', 'fecper', 'fecini', 'feccie', 'etadef', 'staprc', 'coraep', 'gencom', 'numcom', 'caraep', 'tiptraprc', 'fueord', 'fuecre', 'fuetra', 'nomgob', 'nomsec', 'unidad', 'cortrasla', 'coradidis', 'corprc', 'corcom', 'corcau', 'corpag', 'corsoladidis', 'corsoltra', 'coraju', 'corfue', 'btnanu', 'btneli', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Loncod' => 1, 'Rupcat' => 2, 'Ruppar' => 3, 'Nivdis' => 4, 'Forpre' => 5, 'Asiper' => 6, 'Numper' => 7, 'Peract' => 8, 'Fecper' => 9, 'Fecini' => 10, 'Feccie' => 11, 'Etadef' => 12, 'Staprc' => 13, 'Coraep' => 14, 'Gencom' => 15, 'Numcom' => 16, 'Caraep' => 17, 'Tiptraprc' => 18, 'Fueord' => 19, 'Fuecre' => 20, 'Fuetra' => 21, 'Nomgob' => 22, 'Nomsec' => 23, 'Unidad' => 24, 'Cortrasla' => 25, 'Coradidis' => 26, 'Corprc' => 27, 'Corcom' => 28, 'Corcau' => 29, 'Corpag' => 30, 'Corsoladidis' => 31, 'Corsoltra' => 32, 'Coraju' => 33, 'Corfue' => 34, 'Btnanu' => 35, 'Btneli' => 36, 'Id' => 37, ),
		BasePeer::TYPE_COLNAME => array (CpdefnivPeer::CODEMP => 0, CpdefnivPeer::LONCOD => 1, CpdefnivPeer::RUPCAT => 2, CpdefnivPeer::RUPPAR => 3, CpdefnivPeer::NIVDIS => 4, CpdefnivPeer::FORPRE => 5, CpdefnivPeer::ASIPER => 6, CpdefnivPeer::NUMPER => 7, CpdefnivPeer::PERACT => 8, CpdefnivPeer::FECPER => 9, CpdefnivPeer::FECINI => 10, CpdefnivPeer::FECCIE => 11, CpdefnivPeer::ETADEF => 12, CpdefnivPeer::STAPRC => 13, CpdefnivPeer::CORAEP => 14, CpdefnivPeer::GENCOM => 15, CpdefnivPeer::NUMCOM => 16, CpdefnivPeer::CARAEP => 17, CpdefnivPeer::TIPTRAPRC => 18, CpdefnivPeer::FUEORD => 19, CpdefnivPeer::FUECRE => 20, CpdefnivPeer::FUETRA => 21, CpdefnivPeer::NOMGOB => 22, CpdefnivPeer::NOMSEC => 23, CpdefnivPeer::UNIDAD => 24, CpdefnivPeer::CORTRASLA => 25, CpdefnivPeer::CORADIDIS => 26, CpdefnivPeer::CORPRC => 27, CpdefnivPeer::CORCOM => 28, CpdefnivPeer::CORCAU => 29, CpdefnivPeer::CORPAG => 30, CpdefnivPeer::CORSOLADIDIS => 31, CpdefnivPeer::CORSOLTRA => 32, CpdefnivPeer::CORAJU => 33, CpdefnivPeer::CORFUE => 34, CpdefnivPeer::BTNANU => 35, CpdefnivPeer::BTNELI => 36, CpdefnivPeer::ID => 37, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'loncod' => 1, 'rupcat' => 2, 'ruppar' => 3, 'nivdis' => 4, 'forpre' => 5, 'asiper' => 6, 'numper' => 7, 'peract' => 8, 'fecper' => 9, 'fecini' => 10, 'feccie' => 11, 'etadef' => 12, 'staprc' => 13, 'coraep' => 14, 'gencom' => 15, 'numcom' => 16, 'caraep' => 17, 'tiptraprc' => 18, 'fueord' => 19, 'fuecre' => 20, 'fuetra' => 21, 'nomgob' => 22, 'nomsec' => 23, 'unidad' => 24, 'cortrasla' => 25, 'coradidis' => 26, 'corprc' => 27, 'corcom' => 28, 'corcau' => 29, 'corpag' => 30, 'corsoladidis' => 31, 'corsoltra' => 32, 'coraju' => 33, 'corfue' => 34, 'btnanu' => 35, 'btneli' => 36, 'id' => 37, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpdefnivMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpdefnivMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpdefnivPeer::getTableMap();
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
		return str_replace(CpdefnivPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpdefnivPeer::CODEMP);

		$criteria->addSelectColumn(CpdefnivPeer::LONCOD);

		$criteria->addSelectColumn(CpdefnivPeer::RUPCAT);

		$criteria->addSelectColumn(CpdefnivPeer::RUPPAR);

		$criteria->addSelectColumn(CpdefnivPeer::NIVDIS);

		$criteria->addSelectColumn(CpdefnivPeer::FORPRE);

		$criteria->addSelectColumn(CpdefnivPeer::ASIPER);

		$criteria->addSelectColumn(CpdefnivPeer::NUMPER);

		$criteria->addSelectColumn(CpdefnivPeer::PERACT);

		$criteria->addSelectColumn(CpdefnivPeer::FECPER);

		$criteria->addSelectColumn(CpdefnivPeer::FECINI);

		$criteria->addSelectColumn(CpdefnivPeer::FECCIE);

		$criteria->addSelectColumn(CpdefnivPeer::ETADEF);

		$criteria->addSelectColumn(CpdefnivPeer::STAPRC);

		$criteria->addSelectColumn(CpdefnivPeer::CORAEP);

		$criteria->addSelectColumn(CpdefnivPeer::GENCOM);

		$criteria->addSelectColumn(CpdefnivPeer::NUMCOM);

		$criteria->addSelectColumn(CpdefnivPeer::CARAEP);

		$criteria->addSelectColumn(CpdefnivPeer::TIPTRAPRC);

		$criteria->addSelectColumn(CpdefnivPeer::FUEORD);

		$criteria->addSelectColumn(CpdefnivPeer::FUECRE);

		$criteria->addSelectColumn(CpdefnivPeer::FUETRA);

		$criteria->addSelectColumn(CpdefnivPeer::NOMGOB);

		$criteria->addSelectColumn(CpdefnivPeer::NOMSEC);

		$criteria->addSelectColumn(CpdefnivPeer::UNIDAD);

		$criteria->addSelectColumn(CpdefnivPeer::CORTRASLA);

		$criteria->addSelectColumn(CpdefnivPeer::CORADIDIS);

		$criteria->addSelectColumn(CpdefnivPeer::CORPRC);

		$criteria->addSelectColumn(CpdefnivPeer::CORCOM);

		$criteria->addSelectColumn(CpdefnivPeer::CORCAU);

		$criteria->addSelectColumn(CpdefnivPeer::CORPAG);

		$criteria->addSelectColumn(CpdefnivPeer::CORSOLADIDIS);

		$criteria->addSelectColumn(CpdefnivPeer::CORSOLTRA);

		$criteria->addSelectColumn(CpdefnivPeer::CORAJU);

		$criteria->addSelectColumn(CpdefnivPeer::CORFUE);

		$criteria->addSelectColumn(CpdefnivPeer::BTNANU);

		$criteria->addSelectColumn(CpdefnivPeer::BTNELI);

		$criteria->addSelectColumn(CpdefnivPeer::ID);

	}

	const COUNT = 'COUNT(cpdefniv.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpdefniv.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpdefnivPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpdefnivPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpdefnivPeer::doSelectRS($criteria, $con);
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
		$objects = CpdefnivPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpdefnivPeer::populateObjects(CpdefnivPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpdefnivPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpdefnivPeer::getOMClass();
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
		return CpdefnivPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpdefnivPeer::ID); 

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
			$comparison = $criteria->getComparison(CpdefnivPeer::ID);
			$selectCriteria->add(CpdefnivPeer::ID, $criteria->remove(CpdefnivPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpdefnivPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpdefnivPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpdefniv) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpdefnivPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpdefniv $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpdefnivPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpdefnivPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpdefnivPeer::DATABASE_NAME, CpdefnivPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpdefnivPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpdefnivPeer::DATABASE_NAME);

		$criteria->add(CpdefnivPeer::ID, $pk);


		$v = CpdefnivPeer::doSelect($criteria, $con);

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
			$criteria->add(CpdefnivPeer::ID, $pks, Criteria::IN);
			$objs = CpdefnivPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpdefnivPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpdefnivMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpdefnivMapBuilder');
}
