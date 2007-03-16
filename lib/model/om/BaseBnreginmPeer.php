<?php


abstract class BaseBnreginmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bnreginm';

	
	const CLASS_DEFAULT = 'lib.model.Bnreginm';

	
	const NUM_COLUMNS = 46;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bnreginm.CODACT';

	
	const CODINM = 'bnreginm.CODINM';

	
	const DESINM = 'bnreginm.DESINM';

	
	const CODPRO = 'bnreginm.CODPRO';

	
	const ORDCOM = 'bnreginm.ORDCOM';

	
	const FECREG = 'bnreginm.FECREG';

	
	const FECCOM = 'bnreginm.FECCOM';

	
	const FECDEP = 'bnreginm.FECDEP';

	
	const FECAJU = 'bnreginm.FECAJU';

	
	const FECACT = 'bnreginm.FECACT';

	
	const FECEXP = 'bnreginm.FECEXP';

	
	const ORDRCP = 'bnreginm.ORDRCP';

	
	const FOTINM = 'bnreginm.FOTINM';

	
	const DENINM = 'bnreginm.DENINM';

	
	const NROEXP = 'bnreginm.NROEXP';

	
	const DETINM = 'bnreginm.DETINM';

	
	const CODUBI = 'bnreginm.CODUBI';

	
	const AVAACT = 'bnreginm.AVAACT';

	
	const CLAFUN = 'bnreginm.CLAFUN';

	
	const AVACOM = 'bnreginm.AVACOM';

	
	const EDOLEG = 'bnreginm.EDOLEG';

	
	const VIDUTI = 'bnreginm.VIDUTI';

	
	const OBSINM = 'bnreginm.OBSINM';

	
	const LINNOR = 'bnreginm.LINNOR';

	
	const LINSUR = 'bnreginm.LINSUR';

	
	const LINEST = 'bnreginm.LINEST';

	
	const LINOES = 'bnreginm.LINOES';

	
	const ARETER = 'bnreginm.ARETER';

	
	const ARECUB = 'bnreginm.ARECUB';

	
	const ARECON = 'bnreginm.ARECON';

	
	const AREOTR = 'bnreginm.AREOTR';

	
	const ARETOT = 'bnreginm.ARETOT';

	
	const EDOINM = 'bnreginm.EDOINM';

	
	const MUNINM = 'bnreginm.MUNINM';

	
	const DEPINM = 'bnreginm.DEPINM';

	
	const DIRINM = 'bnreginm.DIRINM';

	
	const MESDEP = 'bnreginm.MESDEP';

	
	const VALINI = 'bnreginm.VALINI';

	
	const VALRES = 'bnreginm.VALRES';

	
	const VALLIB = 'bnreginm.VALLIB';

	
	const VALREX = 'bnreginm.VALREX';

	
	const COSREP = 'bnreginm.COSREP';

	
	const DEPMEN = 'bnreginm.DEPMEN';

	
	const DEPACU = 'bnreginm.DEPACU';

	
	const STAINM = 'bnreginm.STAINM';

	
	const ID = 'bnreginm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codinm', 'Desinm', 'Codpro', 'Ordcom', 'Fecreg', 'Feccom', 'Fecdep', 'Fecaju', 'Fecact', 'Fecexp', 'Ordrcp', 'Fotinm', 'Deninm', 'Nroexp', 'Detinm', 'Codubi', 'Avaact', 'Clafun', 'Avacom', 'Edoleg', 'Viduti', 'Obsinm', 'Linnor', 'Linsur', 'Linest', 'Linoes', 'Areter', 'Arecub', 'Arecon', 'Areotr', 'Aretot', 'Edoinm', 'Muninm', 'Depinm', 'Dirinm', 'Mesdep', 'Valini', 'Valres', 'Vallib', 'Valrex', 'Cosrep', 'Depmen', 'Depacu', 'Stainm', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BnreginmPeer::CODACT, BnreginmPeer::CODINM, BnreginmPeer::DESINM, BnreginmPeer::CODPRO, BnreginmPeer::ORDCOM, BnreginmPeer::FECREG, BnreginmPeer::FECCOM, BnreginmPeer::FECDEP, BnreginmPeer::FECAJU, BnreginmPeer::FECACT, BnreginmPeer::FECEXP, BnreginmPeer::ORDRCP, BnreginmPeer::FOTINM, BnreginmPeer::DENINM, BnreginmPeer::NROEXP, BnreginmPeer::DETINM, BnreginmPeer::CODUBI, BnreginmPeer::AVAACT, BnreginmPeer::CLAFUN, BnreginmPeer::AVACOM, BnreginmPeer::EDOLEG, BnreginmPeer::VIDUTI, BnreginmPeer::OBSINM, BnreginmPeer::LINNOR, BnreginmPeer::LINSUR, BnreginmPeer::LINEST, BnreginmPeer::LINOES, BnreginmPeer::ARETER, BnreginmPeer::ARECUB, BnreginmPeer::ARECON, BnreginmPeer::AREOTR, BnreginmPeer::ARETOT, BnreginmPeer::EDOINM, BnreginmPeer::MUNINM, BnreginmPeer::DEPINM, BnreginmPeer::DIRINM, BnreginmPeer::MESDEP, BnreginmPeer::VALINI, BnreginmPeer::VALRES, BnreginmPeer::VALLIB, BnreginmPeer::VALREX, BnreginmPeer::COSREP, BnreginmPeer::DEPMEN, BnreginmPeer::DEPACU, BnreginmPeer::STAINM, BnreginmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codinm', 'desinm', 'codpro', 'ordcom', 'fecreg', 'feccom', 'fecdep', 'fecaju', 'fecact', 'fecexp', 'ordrcp', 'fotinm', 'deninm', 'nroexp', 'detinm', 'codubi', 'avaact', 'clafun', 'avacom', 'edoleg', 'viduti', 'obsinm', 'linnor', 'linsur', 'linest', 'linoes', 'areter', 'arecub', 'arecon', 'areotr', 'aretot', 'edoinm', 'muninm', 'depinm', 'dirinm', 'mesdep', 'valini', 'valres', 'vallib', 'valrex', 'cosrep', 'depmen', 'depacu', 'stainm', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codinm' => 1, 'Desinm' => 2, 'Codpro' => 3, 'Ordcom' => 4, 'Fecreg' => 5, 'Feccom' => 6, 'Fecdep' => 7, 'Fecaju' => 8, 'Fecact' => 9, 'Fecexp' => 10, 'Ordrcp' => 11, 'Fotinm' => 12, 'Deninm' => 13, 'Nroexp' => 14, 'Detinm' => 15, 'Codubi' => 16, 'Avaact' => 17, 'Clafun' => 18, 'Avacom' => 19, 'Edoleg' => 20, 'Viduti' => 21, 'Obsinm' => 22, 'Linnor' => 23, 'Linsur' => 24, 'Linest' => 25, 'Linoes' => 26, 'Areter' => 27, 'Arecub' => 28, 'Arecon' => 29, 'Areotr' => 30, 'Aretot' => 31, 'Edoinm' => 32, 'Muninm' => 33, 'Depinm' => 34, 'Dirinm' => 35, 'Mesdep' => 36, 'Valini' => 37, 'Valres' => 38, 'Vallib' => 39, 'Valrex' => 40, 'Cosrep' => 41, 'Depmen' => 42, 'Depacu' => 43, 'Stainm' => 44, 'Id' => 45, ),
		BasePeer::TYPE_COLNAME => array (BnreginmPeer::CODACT => 0, BnreginmPeer::CODINM => 1, BnreginmPeer::DESINM => 2, BnreginmPeer::CODPRO => 3, BnreginmPeer::ORDCOM => 4, BnreginmPeer::FECREG => 5, BnreginmPeer::FECCOM => 6, BnreginmPeer::FECDEP => 7, BnreginmPeer::FECAJU => 8, BnreginmPeer::FECACT => 9, BnreginmPeer::FECEXP => 10, BnreginmPeer::ORDRCP => 11, BnreginmPeer::FOTINM => 12, BnreginmPeer::DENINM => 13, BnreginmPeer::NROEXP => 14, BnreginmPeer::DETINM => 15, BnreginmPeer::CODUBI => 16, BnreginmPeer::AVAACT => 17, BnreginmPeer::CLAFUN => 18, BnreginmPeer::AVACOM => 19, BnreginmPeer::EDOLEG => 20, BnreginmPeer::VIDUTI => 21, BnreginmPeer::OBSINM => 22, BnreginmPeer::LINNOR => 23, BnreginmPeer::LINSUR => 24, BnreginmPeer::LINEST => 25, BnreginmPeer::LINOES => 26, BnreginmPeer::ARETER => 27, BnreginmPeer::ARECUB => 28, BnreginmPeer::ARECON => 29, BnreginmPeer::AREOTR => 30, BnreginmPeer::ARETOT => 31, BnreginmPeer::EDOINM => 32, BnreginmPeer::MUNINM => 33, BnreginmPeer::DEPINM => 34, BnreginmPeer::DIRINM => 35, BnreginmPeer::MESDEP => 36, BnreginmPeer::VALINI => 37, BnreginmPeer::VALRES => 38, BnreginmPeer::VALLIB => 39, BnreginmPeer::VALREX => 40, BnreginmPeer::COSREP => 41, BnreginmPeer::DEPMEN => 42, BnreginmPeer::DEPACU => 43, BnreginmPeer::STAINM => 44, BnreginmPeer::ID => 45, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codinm' => 1, 'desinm' => 2, 'codpro' => 3, 'ordcom' => 4, 'fecreg' => 5, 'feccom' => 6, 'fecdep' => 7, 'fecaju' => 8, 'fecact' => 9, 'fecexp' => 10, 'ordrcp' => 11, 'fotinm' => 12, 'deninm' => 13, 'nroexp' => 14, 'detinm' => 15, 'codubi' => 16, 'avaact' => 17, 'clafun' => 18, 'avacom' => 19, 'edoleg' => 20, 'viduti' => 21, 'obsinm' => 22, 'linnor' => 23, 'linsur' => 24, 'linest' => 25, 'linoes' => 26, 'areter' => 27, 'arecub' => 28, 'arecon' => 29, 'areotr' => 30, 'aretot' => 31, 'edoinm' => 32, 'muninm' => 33, 'depinm' => 34, 'dirinm' => 35, 'mesdep' => 36, 'valini' => 37, 'valres' => 38, 'vallib' => 39, 'valrex' => 40, 'cosrep' => 41, 'depmen' => 42, 'depacu' => 43, 'stainm' => 44, 'id' => 45, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BnreginmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BnreginmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BnreginmPeer::getTableMap();
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
		return str_replace(BnreginmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BnreginmPeer::CODACT);

		$criteria->addSelectColumn(BnreginmPeer::CODINM);

		$criteria->addSelectColumn(BnreginmPeer::DESINM);

		$criteria->addSelectColumn(BnreginmPeer::CODPRO);

		$criteria->addSelectColumn(BnreginmPeer::ORDCOM);

		$criteria->addSelectColumn(BnreginmPeer::FECREG);

		$criteria->addSelectColumn(BnreginmPeer::FECCOM);

		$criteria->addSelectColumn(BnreginmPeer::FECDEP);

		$criteria->addSelectColumn(BnreginmPeer::FECAJU);

		$criteria->addSelectColumn(BnreginmPeer::FECACT);

		$criteria->addSelectColumn(BnreginmPeer::FECEXP);

		$criteria->addSelectColumn(BnreginmPeer::ORDRCP);

		$criteria->addSelectColumn(BnreginmPeer::FOTINM);

		$criteria->addSelectColumn(BnreginmPeer::DENINM);

		$criteria->addSelectColumn(BnreginmPeer::NROEXP);

		$criteria->addSelectColumn(BnreginmPeer::DETINM);

		$criteria->addSelectColumn(BnreginmPeer::CODUBI);

		$criteria->addSelectColumn(BnreginmPeer::AVAACT);

		$criteria->addSelectColumn(BnreginmPeer::CLAFUN);

		$criteria->addSelectColumn(BnreginmPeer::AVACOM);

		$criteria->addSelectColumn(BnreginmPeer::EDOLEG);

		$criteria->addSelectColumn(BnreginmPeer::VIDUTI);

		$criteria->addSelectColumn(BnreginmPeer::OBSINM);

		$criteria->addSelectColumn(BnreginmPeer::LINNOR);

		$criteria->addSelectColumn(BnreginmPeer::LINSUR);

		$criteria->addSelectColumn(BnreginmPeer::LINEST);

		$criteria->addSelectColumn(BnreginmPeer::LINOES);

		$criteria->addSelectColumn(BnreginmPeer::ARETER);

		$criteria->addSelectColumn(BnreginmPeer::ARECUB);

		$criteria->addSelectColumn(BnreginmPeer::ARECON);

		$criteria->addSelectColumn(BnreginmPeer::AREOTR);

		$criteria->addSelectColumn(BnreginmPeer::ARETOT);

		$criteria->addSelectColumn(BnreginmPeer::EDOINM);

		$criteria->addSelectColumn(BnreginmPeer::MUNINM);

		$criteria->addSelectColumn(BnreginmPeer::DEPINM);

		$criteria->addSelectColumn(BnreginmPeer::DIRINM);

		$criteria->addSelectColumn(BnreginmPeer::MESDEP);

		$criteria->addSelectColumn(BnreginmPeer::VALINI);

		$criteria->addSelectColumn(BnreginmPeer::VALRES);

		$criteria->addSelectColumn(BnreginmPeer::VALLIB);

		$criteria->addSelectColumn(BnreginmPeer::VALREX);

		$criteria->addSelectColumn(BnreginmPeer::COSREP);

		$criteria->addSelectColumn(BnreginmPeer::DEPMEN);

		$criteria->addSelectColumn(BnreginmPeer::DEPACU);

		$criteria->addSelectColumn(BnreginmPeer::STAINM);

		$criteria->addSelectColumn(BnreginmPeer::ID);

	}

	const COUNT = 'COUNT(bnreginm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bnreginm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BnreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BnreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BnreginmPeer::doSelectRS($criteria, $con);
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
		$objects = BnreginmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BnreginmPeer::populateObjects(BnreginmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BnreginmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BnreginmPeer::getOMClass();
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
		return BnreginmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(BnreginmPeer::ID);
			$selectCriteria->add(BnreginmPeer::ID, $criteria->remove(BnreginmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BnreginmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BnreginmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bnreginm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BnreginmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bnreginm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BnreginmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BnreginmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BnreginmPeer::DATABASE_NAME, BnreginmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BnreginmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BnreginmPeer::DATABASE_NAME);

		$criteria->add(BnreginmPeer::ID, $pk);


		$v = BnreginmPeer::doSelect($criteria, $con);

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
			$criteria->add(BnreginmPeer::ID, $pks, Criteria::IN);
			$objs = BnreginmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBnreginmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BnreginmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BnreginmMapBuilder');
}
