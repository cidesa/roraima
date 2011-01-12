<?php


abstract class BaseCaproveePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caprovee';

	
	const CLASS_DEFAULT = 'lib.model.Caprovee';

	
	const NUM_COLUMNS = 47;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRO = 'caprovee.CODPRO';

	
	const NOMPRO = 'caprovee.NOMPRO';

	
	const RIFPRO = 'caprovee.RIFPRO';

	
	const NITPRO = 'caprovee.NITPRO';

	
	const DIRPRO = 'caprovee.DIRPRO';

	
	const TELPRO = 'caprovee.TELPRO';

	
	const FAXPRO = 'caprovee.FAXPRO';

	
	const EMAIL = 'caprovee.EMAIL';

	
	const LIMCRE = 'caprovee.LIMCRE';

	
	const CODCTA = 'caprovee.CODCTA';

	
	const REGMER = 'caprovee.REGMER';

	
	const FECREG = 'caprovee.FECREG';

	
	const TOMREG = 'caprovee.TOMREG';

	
	const FOLREG = 'caprovee.FOLREG';

	
	const CAPSUS = 'caprovee.CAPSUS';

	
	const CAPPAG = 'caprovee.CAPPAG';

	
	const RIFREPLEG = 'caprovee.RIFREPLEG';

	
	const NOMREPLEG = 'caprovee.NOMREPLEG';

	
	const DIRREPLEG = 'caprovee.DIRREPLEG';

	
	const TELREPLEG = 'caprovee.TELREPLEG';

	
	const NROCEI = 'caprovee.NROCEI';

	
	const CODRAM = 'caprovee.CODRAM';

	
	const FECINSCIR = 'caprovee.FECINSCIR';

	
	const NUMINSCIR = 'caprovee.NUMINSCIR';

	
	const NACPRO = 'caprovee.NACPRO';

	
	const CODORD = 'caprovee.CODORD';

	
	const CODPERCON = 'caprovee.CODPERCON';

	
	const CODTIPREC = 'caprovee.CODTIPREC';

	
	const CODORDADI = 'caprovee.CODORDADI';

	
	const CODPERCONADI = 'caprovee.CODPERCONADI';

	
	const TIPO = 'caprovee.TIPO';

	
	const FECVEN = 'caprovee.FECVEN';

	
	const CIUDAD = 'caprovee.CIUDAD';

	
	const CODORDMERCON = 'caprovee.CODORDMERCON';

	
	const CODPERMERCON = 'caprovee.CODPERMERCON';

	
	const CODORDCONTRA = 'caprovee.CODORDCONTRA';

	
	const CODPERCONTRA = 'caprovee.CODPERCONTRA';

	
	const TEMCODPRO = 'caprovee.TEMCODPRO';

	
	const TEMRIFPRO = 'caprovee.TEMRIFPRO';

	
	const CODCTASEC = 'caprovee.CODCTASEC';

	
	const CODTIPEMP = 'caprovee.CODTIPEMP';

	
	const RAMGEN = 'caprovee.RAMGEN';

	
	const ESTPRO = 'caprovee.ESTPRO';

	
	const CODBAN = 'caprovee.CODBAN';

	
	const NUMCUE = 'caprovee.NUMCUE';

	
	const CODTIP = 'caprovee.CODTIP';

	
	const ID = 'caprovee.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro', 'Nompro', 'Rifpro', 'Nitpro', 'Dirpro', 'Telpro', 'Faxpro', 'Email', 'Limcre', 'Codcta', 'Regmer', 'Fecreg', 'Tomreg', 'Folreg', 'Capsus', 'Cappag', 'Rifrepleg', 'Nomrepleg', 'Dirrepleg', 'Telrepleg', 'Nrocei', 'Codram', 'Fecinscir', 'Numinscir', 'Nacpro', 'Codord', 'Codpercon', 'Codtiprec', 'Codordadi', 'Codperconadi', 'Tipo', 'Fecven', 'Ciudad', 'Codordmercon', 'Codpermercon', 'Codordcontra', 'Codpercontra', 'Temcodpro', 'Temrifpro', 'Codctasec', 'Codtipemp', 'Ramgen', 'Estpro', 'Codban', 'Numcue', 'Codtip', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaproveePeer::CODPRO, CaproveePeer::NOMPRO, CaproveePeer::RIFPRO, CaproveePeer::NITPRO, CaproveePeer::DIRPRO, CaproveePeer::TELPRO, CaproveePeer::FAXPRO, CaproveePeer::EMAIL, CaproveePeer::LIMCRE, CaproveePeer::CODCTA, CaproveePeer::REGMER, CaproveePeer::FECREG, CaproveePeer::TOMREG, CaproveePeer::FOLREG, CaproveePeer::CAPSUS, CaproveePeer::CAPPAG, CaproveePeer::RIFREPLEG, CaproveePeer::NOMREPLEG, CaproveePeer::DIRREPLEG, CaproveePeer::TELREPLEG, CaproveePeer::NROCEI, CaproveePeer::CODRAM, CaproveePeer::FECINSCIR, CaproveePeer::NUMINSCIR, CaproveePeer::NACPRO, CaproveePeer::CODORD, CaproveePeer::CODPERCON, CaproveePeer::CODTIPREC, CaproveePeer::CODORDADI, CaproveePeer::CODPERCONADI, CaproveePeer::TIPO, CaproveePeer::FECVEN, CaproveePeer::CIUDAD, CaproveePeer::CODORDMERCON, CaproveePeer::CODPERMERCON, CaproveePeer::CODORDCONTRA, CaproveePeer::CODPERCONTRA, CaproveePeer::TEMCODPRO, CaproveePeer::TEMRIFPRO, CaproveePeer::CODCTASEC, CaproveePeer::CODTIPEMP, CaproveePeer::RAMGEN, CaproveePeer::ESTPRO, CaproveePeer::CODBAN, CaproveePeer::NUMCUE, CaproveePeer::CODTIP, CaproveePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro', 'nompro', 'rifpro', 'nitpro', 'dirpro', 'telpro', 'faxpro', 'email', 'limcre', 'codcta', 'regmer', 'fecreg', 'tomreg', 'folreg', 'capsus', 'cappag', 'rifrepleg', 'nomrepleg', 'dirrepleg', 'telrepleg', 'nrocei', 'codram', 'fecinscir', 'numinscir', 'nacpro', 'codord', 'codpercon', 'codtiprec', 'codordadi', 'codperconadi', 'tipo', 'fecven', 'ciudad', 'codordmercon', 'codpermercon', 'codordcontra', 'codpercontra', 'temcodpro', 'temrifpro', 'codctasec', 'codtipemp', 'ramgen', 'estpro', 'codban', 'numcue', 'codtip', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro' => 0, 'Nompro' => 1, 'Rifpro' => 2, 'Nitpro' => 3, 'Dirpro' => 4, 'Telpro' => 5, 'Faxpro' => 6, 'Email' => 7, 'Limcre' => 8, 'Codcta' => 9, 'Regmer' => 10, 'Fecreg' => 11, 'Tomreg' => 12, 'Folreg' => 13, 'Capsus' => 14, 'Cappag' => 15, 'Rifrepleg' => 16, 'Nomrepleg' => 17, 'Dirrepleg' => 18, 'Telrepleg' => 19, 'Nrocei' => 20, 'Codram' => 21, 'Fecinscir' => 22, 'Numinscir' => 23, 'Nacpro' => 24, 'Codord' => 25, 'Codpercon' => 26, 'Codtiprec' => 27, 'Codordadi' => 28, 'Codperconadi' => 29, 'Tipo' => 30, 'Fecven' => 31, 'Ciudad' => 32, 'Codordmercon' => 33, 'Codpermercon' => 34, 'Codordcontra' => 35, 'Codpercontra' => 36, 'Temcodpro' => 37, 'Temrifpro' => 38, 'Codctasec' => 39, 'Codtipemp' => 40, 'Ramgen' => 41, 'Estpro' => 42, 'Codban' => 43, 'Numcue' => 44, 'Codtip' => 45, 'Id' => 46, ),
		BasePeer::TYPE_COLNAME => array (CaproveePeer::CODPRO => 0, CaproveePeer::NOMPRO => 1, CaproveePeer::RIFPRO => 2, CaproveePeer::NITPRO => 3, CaproveePeer::DIRPRO => 4, CaproveePeer::TELPRO => 5, CaproveePeer::FAXPRO => 6, CaproveePeer::EMAIL => 7, CaproveePeer::LIMCRE => 8, CaproveePeer::CODCTA => 9, CaproveePeer::REGMER => 10, CaproveePeer::FECREG => 11, CaproveePeer::TOMREG => 12, CaproveePeer::FOLREG => 13, CaproveePeer::CAPSUS => 14, CaproveePeer::CAPPAG => 15, CaproveePeer::RIFREPLEG => 16, CaproveePeer::NOMREPLEG => 17, CaproveePeer::DIRREPLEG => 18, CaproveePeer::TELREPLEG => 19, CaproveePeer::NROCEI => 20, CaproveePeer::CODRAM => 21, CaproveePeer::FECINSCIR => 22, CaproveePeer::NUMINSCIR => 23, CaproveePeer::NACPRO => 24, CaproveePeer::CODORD => 25, CaproveePeer::CODPERCON => 26, CaproveePeer::CODTIPREC => 27, CaproveePeer::CODORDADI => 28, CaproveePeer::CODPERCONADI => 29, CaproveePeer::TIPO => 30, CaproveePeer::FECVEN => 31, CaproveePeer::CIUDAD => 32, CaproveePeer::CODORDMERCON => 33, CaproveePeer::CODPERMERCON => 34, CaproveePeer::CODORDCONTRA => 35, CaproveePeer::CODPERCONTRA => 36, CaproveePeer::TEMCODPRO => 37, CaproveePeer::TEMRIFPRO => 38, CaproveePeer::CODCTASEC => 39, CaproveePeer::CODTIPEMP => 40, CaproveePeer::RAMGEN => 41, CaproveePeer::ESTPRO => 42, CaproveePeer::CODBAN => 43, CaproveePeer::NUMCUE => 44, CaproveePeer::CODTIP => 45, CaproveePeer::ID => 46, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro' => 0, 'nompro' => 1, 'rifpro' => 2, 'nitpro' => 3, 'dirpro' => 4, 'telpro' => 5, 'faxpro' => 6, 'email' => 7, 'limcre' => 8, 'codcta' => 9, 'regmer' => 10, 'fecreg' => 11, 'tomreg' => 12, 'folreg' => 13, 'capsus' => 14, 'cappag' => 15, 'rifrepleg' => 16, 'nomrepleg' => 17, 'dirrepleg' => 18, 'telrepleg' => 19, 'nrocei' => 20, 'codram' => 21, 'fecinscir' => 22, 'numinscir' => 23, 'nacpro' => 24, 'codord' => 25, 'codpercon' => 26, 'codtiprec' => 27, 'codordadi' => 28, 'codperconadi' => 29, 'tipo' => 30, 'fecven' => 31, 'ciudad' => 32, 'codordmercon' => 33, 'codpermercon' => 34, 'codordcontra' => 35, 'codpercontra' => 36, 'temcodpro' => 37, 'temrifpro' => 38, 'codctasec' => 39, 'codtipemp' => 40, 'ramgen' => 41, 'estpro' => 42, 'codban' => 43, 'numcue' => 44, 'codtip' => 45, 'id' => 46, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaproveeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaproveeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaproveePeer::getTableMap();
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
		return str_replace(CaproveePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaproveePeer::CODPRO);

		$criteria->addSelectColumn(CaproveePeer::NOMPRO);

		$criteria->addSelectColumn(CaproveePeer::RIFPRO);

		$criteria->addSelectColumn(CaproveePeer::NITPRO);

		$criteria->addSelectColumn(CaproveePeer::DIRPRO);

		$criteria->addSelectColumn(CaproveePeer::TELPRO);

		$criteria->addSelectColumn(CaproveePeer::FAXPRO);

		$criteria->addSelectColumn(CaproveePeer::EMAIL);

		$criteria->addSelectColumn(CaproveePeer::LIMCRE);

		$criteria->addSelectColumn(CaproveePeer::CODCTA);

		$criteria->addSelectColumn(CaproveePeer::REGMER);

		$criteria->addSelectColumn(CaproveePeer::FECREG);

		$criteria->addSelectColumn(CaproveePeer::TOMREG);

		$criteria->addSelectColumn(CaproveePeer::FOLREG);

		$criteria->addSelectColumn(CaproveePeer::CAPSUS);

		$criteria->addSelectColumn(CaproveePeer::CAPPAG);

		$criteria->addSelectColumn(CaproveePeer::RIFREPLEG);

		$criteria->addSelectColumn(CaproveePeer::NOMREPLEG);

		$criteria->addSelectColumn(CaproveePeer::DIRREPLEG);

		$criteria->addSelectColumn(CaproveePeer::TELREPLEG);

		$criteria->addSelectColumn(CaproveePeer::NROCEI);

		$criteria->addSelectColumn(CaproveePeer::CODRAM);

		$criteria->addSelectColumn(CaproveePeer::FECINSCIR);

		$criteria->addSelectColumn(CaproveePeer::NUMINSCIR);

		$criteria->addSelectColumn(CaproveePeer::NACPRO);

		$criteria->addSelectColumn(CaproveePeer::CODORD);

		$criteria->addSelectColumn(CaproveePeer::CODPERCON);

		$criteria->addSelectColumn(CaproveePeer::CODTIPREC);

		$criteria->addSelectColumn(CaproveePeer::CODORDADI);

		$criteria->addSelectColumn(CaproveePeer::CODPERCONADI);

		$criteria->addSelectColumn(CaproveePeer::TIPO);

		$criteria->addSelectColumn(CaproveePeer::FECVEN);

		$criteria->addSelectColumn(CaproveePeer::CIUDAD);

		$criteria->addSelectColumn(CaproveePeer::CODORDMERCON);

		$criteria->addSelectColumn(CaproveePeer::CODPERMERCON);

		$criteria->addSelectColumn(CaproveePeer::CODORDCONTRA);

		$criteria->addSelectColumn(CaproveePeer::CODPERCONTRA);

		$criteria->addSelectColumn(CaproveePeer::TEMCODPRO);

		$criteria->addSelectColumn(CaproveePeer::TEMRIFPRO);

		$criteria->addSelectColumn(CaproveePeer::CODCTASEC);

		$criteria->addSelectColumn(CaproveePeer::CODTIPEMP);

		$criteria->addSelectColumn(CaproveePeer::RAMGEN);

		$criteria->addSelectColumn(CaproveePeer::ESTPRO);

		$criteria->addSelectColumn(CaproveePeer::CODBAN);

		$criteria->addSelectColumn(CaproveePeer::NUMCUE);

		$criteria->addSelectColumn(CaproveePeer::CODTIP);

		$criteria->addSelectColumn(CaproveePeer::ID);

	}

	const COUNT = 'COUNT(caprovee.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caprovee.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaproveePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaproveePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaproveePeer::doSelectRS($criteria, $con);
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
		$objects = CaproveePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaproveePeer::populateObjects(CaproveePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaproveePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaproveePeer::getOMClass();
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
		return CaproveePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaproveePeer::ID); 

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
			$comparison = $criteria->getComparison(CaproveePeer::ID);
			$selectCriteria->add(CaproveePeer::ID, $criteria->remove(CaproveePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaproveePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaproveePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caprovee) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaproveePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caprovee $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaproveePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaproveePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaproveePeer::DATABASE_NAME, CaproveePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaproveePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaproveePeer::DATABASE_NAME);

		$criteria->add(CaproveePeer::ID, $pk);


		$v = CaproveePeer::doSelect($criteria, $con);

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
			$criteria->add(CaproveePeer::ID, $pks, Criteria::IN);
			$objs = CaproveePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaproveePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaproveeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaproveeMapBuilder');
}
