<?php
/**
 * Licitacion: Clase estática para el control de licitaciones
 *
 * @package    Roraima
 * @subpackage licitacion
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Licitacion.class.php 43251 2011-03-30 07:47:18Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Licitacion
{
    public static function SalvarGridPliego($clase,$gridart,$griddep, $gridmec, $gridact, $gridpub, $gridleg, $gridtec, $gridfin, $gridfia, $gridtipemp)
    {
        self::EliminarGridPLiegoArt($clase);
        self::SalvarGridPLiegoArt($clase,$gridart);
        $arrget=array('Numplie','Numexp');
        H::Guardar_Grid($griddep, $arrget, $clase);
        H::Guardar_Grid($gridmec, $arrget, $clase);
        H::Guardar_Grid($gridact, $arrget, $clase);
        H::Guardar_Grid($gridpub, $arrget, $clase);
        H::Guardar_Grid($gridleg, $arrget, $clase);
        H::Guardar_Grid($gridtec, $arrget, $clase);
        H::Guardar_Grid($gridfin, $arrget, $clase);
        H::Guardar_Grid($gridfia, $arrget, $clase);
        H::Guardar_Grid($gridtipemp, $arrget, $clase);
    }

    public static function EliminarGridPliego($clase)
    {
        self::EliminarGridPLiegoArt($clase);
    }

    public static function EliminarGridPLiegoArt($clase)
    {
        $c = new Criteria();
        $c->add(LiplieartPeer::NUMPLIE,$clase->getNumplie());
        $c->add(LiplieartPeer::NUMEXP,$clase->getNumexp());
        $per = LiplieartPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function SalvarGridPLiegoArt($clase,$gridart)
    {
        foreach($gridart[0] as $reg)
        {
            $obj = new Liplieart();
            $obj->setNumplie($clase->getNumplie());
            $obj->setNumexp($clase->getNumexp());
            $obj->setCodart($reg['codart']);
            $obj->setCantid($reg['cantid']);
            $obj->save();
        }
    }

    public static function SalvarGridOferta($clase,$gridart,$gridrgo, $gridforpag, $gridcroent, $gridleg, $gridtec, $gridfin, $gridfia)
    {
        self::EliminarGridOferta($clase);
        self::SalvarGridOfertaArt($clase, $gridart);
        $arrget=array('Numofe');
        H::Guardar_Grid($gridrgo, $arrget, $clase);
        H::Guardar_Grid($gridforpag, $arrget, $clase);
        self::SalvarGridOfertaCroEnt($clase, $gridcroent);
        self::SalvarGridOfertaCriLeg($clase, $gridleg);
        self::SalvarGridOfertaCriTec($clase, $gridtec);
        self::SalvarGridOfertaCriFin($clase, $gridfin);
        self::SalvarGridOfertaCriFia($clase, $gridfia);
    }

    public static function SalvarGridOfertaArt($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            $obj = new Liregofedet();
            $obj->setNumofe($clase->getNumofe());
            $obj->setCodart($reg['codart']);
            $obj->setUnimed($reg['unimed']);
            $obj->setCantid($reg['cantid']);
            $obj->setPreuni($reg['preuni']);
            $obj->setMonrec($reg['monrec']);
            $obj->setSubtot($reg['subtot']);
            $obj->save();
        }
    }

    public static function EliminarGridOferta($clase)
    {
        self::EliminarGridOfertaArt($clase);
        #self::EliminarGridOfertaRgo($clase);
        #self::EliminarGridOfertaForPag($clase);
        self::EliminarGridOfertaCroEnt($clase);
        self::EliminarGridOfertaCriLeg($clase);
        self::EliminarGridOfertaCriTec($clase);
        self::EliminarGridOfertaCriFin($clase);
        self::EliminarGridOfertaCriFia($clase);
    }

    public static function EliminarGridOfertaArt($clase)
    {
        $c = new Criteria();
        $c->add(LiregofedetPeer::NUMOFE,$clase->getNumofe());
        $per = LiregofedetPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridOfertaRgo($clase)
    {
        $c = new Criteria();
        $c->add(LiregofergoPeer::NUMOFE,$clase->getNumofe());
        $per = LiregofergoPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridOfertaForPag($clase)
    {
        $c = new Criteria();
        $c->add(LiforpagPeer::NUMOFE,$clase->getNumofe());
        $per = LiforpagPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridOfertaCroEnt($clase)
    {
        $c = new Criteria();
        $c->add(LicroentPeer::NUMOFE,$clase->getNumofe());
        $per = LicroentPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridOfertaCriLeg($clase)
    {
        $c = new Criteria();
        $c->add(LiregofelegPeer::NUMOFE,$clase->getNumofe());
        $per = LiregofelegPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridOfertaCriTec($clase)
    {
        $c = new Criteria();
        $c->add(LiregofetecPeer::NUMOFE,$clase->getNumofe());
        $per = LiregofetecPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridOfertaCriFin($clase)
    {
        $c = new Criteria();
        $c->add(LiregofefinPeer::NUMOFE,$clase->getNumofe());
        $per = LiregofefinPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridOfertaCrifia($clase)
    {
        $c = new Criteria();
        $c->add(LiregofefiaPeer::NUMOFE,$clase->getNumofe());
        $per = LiregofefiaPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function SalvarGridOfertaCroEnt($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            $obj = new Licroent();
            $obj->setNumofe($clase->getNumofe());
            $obj->setCodart($reg['codart']);
            $obj->setCantid($reg['cantid']);
            $obj->setCoduniadm($reg['coduniadm']);
            $obj->setFecent($reg['fecent']);
            $obj->setCondic($reg['condic']);
            $obj->save();
        }
    }

    public static function SalvarGridOfertaCriLeg($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            if($reg['check']=='1')
            {
                $obj = new Liregofeleg();
                $obj->setNumofe($clase->getNumofe());
                $obj->setCodcri($reg['codcri']);
                $obj->setObserv($reg['observ']);
                $obj->save();
            }
        }
    }

    public static function SalvarGridOfertaCriTec($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            if($reg['check']=='1')
            {
                $obj = new Liregofetec();
                $obj->setNumofe($clase->getNumofe());
                $obj->setCodcri($reg['codcri']);
                $obj->setObserv($reg['observ']);
                $obj->save();
            }
        }
    }

    public static function SalvarGridOfertaCriFin($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            if($reg['check']=='1')
            {
                $obj = new Liregofefin();
                $obj->setNumofe($clase->getNumofe());
                $obj->setCodcri($reg['codcri']);
                $obj->setObserv($reg['observ']);
                $obj->save();
            }
        }
    }

    public static function SalvarGridOfertaCriFia($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            if($reg['check']=='1')
            {
                $obj = new Liregofefia();
                $obj->setNumofe($clase->getNumofe());
                $obj->setCodcomres($reg['codcomres']);
                $obj->setObserv($reg['observ']);
                $obj->save();
            }
        }
    }

    public static function SalvarGridAnalisisOferta($clase, $gridleg, $gridtec, $gridfin, $gridfia, $gridtipemp)
    {
        self::EliminarGridAnalisisOferta($clase);
        self::SalvarGridAnaOfeLeg($clase, $gridleg);
        self::SalvarGridAnaOfeTec($clase, $gridtec);
        self::SalvarGridAnaOfeFin($clase, $gridfin);
        self::SalvarGridAnaOfeFia($clase, $gridfia);
        self::SalvarGridAnaOfeTipEmp($clase, $gridtipemp);
    }

    public static function EliminarGridAnalisisOferta($clase)
    {
        self::EliminarGridanaOfeLeg($clase);
        self::EliminarGridanaOfeTec($clase);
        self::EliminarGridanaOfeFin($clase);
        self::EliminarGridanaOfeFia($clase);
        self::EliminarGridanaOfeTipEmp($clase);
    }


    public static function EliminarGridanaOfeLeg($clase)
    {
        $c = new Criteria();
        $c->add(LianaofelegPeer::NUMANAOFE,$clase->getNumanaofe());
        $per = LianaofelegPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridanaOfeTec($clase)
    {
        $c = new Criteria();
        $c->add(LianaofetecPeer::NUMANAOFE,$clase->getNumanaofe());
        $per = LianaofetecPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridanaOfeFin($clase)
    {
        $c = new Criteria();
        $c->add(LianaofefinPeer::NUMANAOFE,$clase->getNumanaofe());
        $per = LianaofefinPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridanaOfeFia($clase)
    {
        $c = new Criteria();
        $c->add(LianaofefiaPeer::NUMANAOFE,$clase->getNumanaofe());
        $per = LianaofefiaPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function EliminarGridanaOfeTipEmp($clase)
    {
        $c = new Criteria();
        $c->add(LianaofetipempPeer::NUMANAOFE,$clase->getNumanaofe());
        $per = LianaofetipempPeer::doselect($c);
        foreach($per as $r)
          $r->delete();
    }

    public static function SalvarGridAnaOfeLeg($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            $obj = new Lianaofeleg();
            $obj->setNumanaofe($clase->getNumanaofe());
            $obj->setCodcri($reg['codcri']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridAnaOfeTec($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            $obj = new Lianaofetec();
            $obj->setNumanaofe($clase->getNumanaofe());
            $obj->setCodcri($reg['codcri']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridAnaOfeFin($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            $obj = new Lianaofefin();
            $obj->setNumanaofe($clase->getNumanaofe());
            $obj->setCodcri($reg['codcri']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridAnaOfeFia($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            $obj = new Lianaofefia();
            $obj->setNumanaofe($clase->getNumanaofe());
            $obj->setCodcomres($reg['codcomres']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridAnaOfeTipEmp($clase,$grid)
    {
        foreach($grid[0] as $reg)
        {
            $obj = new Lianaofetipemp();
            $obj->setNumanaofe($clase->getNumanaofe());
            $obj->setCodtipemp($reg['codtipemp']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridRecomen($clase, $grid)
    {
        self::EliminarGridRecomen($clase);
        foreach($grid[0] as $reg)
        {
            $obj = new Lirecomendet();
            $obj->setNumrecofe($clase->getNumrecofe());
            $obj->setCodpro($reg['codpro']);
            $obj->setPunleg($reg['punleg']);
            $obj->setPuntec($reg['puntec']);
            $obj->setPunfin($reg['punfin']);
            $obj->setPunfia($reg['punfia']);
            $obj->setPuntipemp($reg['puntipemp']);
            $obj->setPunvan($reg['punvan']);
            $obj->setPunmin($reg['punmin']);
            $obj->setPuntot($reg['puntot']);
            $obj->save();
        }
    }

    public static function EliminarGridRecomen($clase)
    {
        $c = new Criteria();
        $c->add(LirecomendetPeer::NUMRECOFE,$clase->getNumrecofe());
        $per = LirecomendetPeer::doSelect($c);
        foreach($per as $r)
            $r->delete();
    }



}
?>