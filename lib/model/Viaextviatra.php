<?php

/**
 * Subclase para representar una fila de la tabla 'viaextviatra'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Viaextviatra extends BaseViaextviatra
{
    protected $grid=array();
    protected $check='';

    public function getFeccal()
    {
        if($this->refcal)
            return date('d/m/Y',strtotime(H::getX('Numcal','Viacalviatra','Feccal',$this->refcal)));
        else
            return '';
    }

    public function getRefsol()
    {
        return H::getX('Numcal','Viacalviatra','Refsol',$this->refcal);
    }

    public function getEmpleado()
    {
        $codemp=H::getX('Numsol','Viasolviatra','Codemp',self::getRefsol());
        $nomemp=H::getX('Codemp','Nphojint','Nomemp',$codemp);
        return  $codemp!='' ? $codemp.'  -  '.$nomemp : '';

    }
    public function getNivel()
    {
        $codniv=H::getX('Numsol','Viasolviatra','Codniv',self::getRefsol());
        $desniv=H::getX('Codniv','Viadefniv','Desniv',$codniv);
        return $codniv!='' ? $codniv.'  -  '.$desniv : '';
    }
    public function getFecdes()
    {
        return self::getRefsol() ? date('d/m/Y',strtotime(H::getX('Numsol','Viasolviatra','Fecdes',self::getRefsol()))): '';
    }
    public function getFechas()
    {
        return self::getRefsol() ?  date('d/m/Y',strtotime(H::getX('Numsol','Viasolviatra','Fechas',self::getRefsol()))): '';
    }
    public function getNumdia()
    {
        return H::getX('Numsol','Viasolviatra','Numdia',self::getRefsol());
    }
    public function getNomcat()
    {
        return H::getX('Codcat','Npcatpre','Nomcat',$this->codcat);
    }
}
