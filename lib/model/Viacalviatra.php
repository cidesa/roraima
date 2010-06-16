<?php

/**
 * Subclase para representar una fila de la tabla 'viacalviatra'.
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
class Viacalviatra extends BaseViacalviatra
{
    protected $grid=array();
    protected $check='';
    protected $tipvia='';

    public function getNomext()
    {
        return H::getX('Tipcom','Cpdoccom','Nomext',$this->tipcom);
    }

    public function getFecsol()
    {
        if($this->refsol)
            return date('d/m/Y',strtotime(H::getX('Numsol','Viasolviatra','Fecsol',$this->refsol)));
        else
            return '';
    }
    public function getTipvia()
    {
        if(H::getX('Numsol','Viasolviatra','Tipvia',$this->refsol)=='N')
            return 'NACIONAL';
        elseif(H::getX('Numsol','Viasolviatra','Tipvia',$this->refsol)=='I')
            return 'INTERNACIONAL';
        else
            return '';
    }
    public function getEmpleado()
    {
        $codemp=H::getX('Numsol','Viasolviatra','Codemp',$this->refsol);
        $nomemp=H::getX('Codemp','Nphojint','Nomemp',$codemp);
        return  $codemp!='' ? $codemp.'  -  '.$nomemp : '';

    }
    public function getNivel()
    {
        $codniv=H::getX('Numsol','Viasolviatra','Codniv',$this->refsol);
        $desniv=H::getX('Codniv','Viadefniv','Desniv',$codniv);
        return $codniv!='' ? $codniv.'  -  '.$desniv : '';
    }
    public function getEmpleadoaco()
    {
        $codemp=H::getX('Numsol','Viasolviatra','Codempaco',$this->refsol);
        $nomemp=H::getX('Codemp','Nphojint','Nomemp',$codemp);
        return  $codemp!='' ? $codemp.'  -  '.$nomemp : '';
    }
    public function getNivelaco()
    {
        $codniv=H::getX('Numsol','Viasolviatra','Codnivaco',$this->refsol);
        $desniv=H::getX('Codniv','Viadefniv','Desniv',$codniv);
        return $codniv!='' ? $codniv.'  -  '.$desniv : '';
    }
    public function getTipviatic()
    {
        return H::getX('Numsol','Viasolviatra','Tipvia',$this->refsol);
    }
    public function getProced()
    {
        $codproced=H::getX('Numsol','Viasolviatra','Codproced',$this->refsol);
        $desproced = H::GetX('Codproced','Viadefproced','Desproced',$codproced);
        return $codproced!='' ? $codproced.'  -  '.$desproced : '';
    }
    public function getFortra()
    {
        $codfortra = H::getX('Numsol','Viasolviatra','Codfortra',$this->refsol);
        $desfortra = H::GetX('Codfortra','Viadeffortra','Desfortra',$codfortra);
        return $codfortra!='' ? $codfortra.'  -  '.$desfortra : '';
    }
    public function getFecdes()
    {
        return $this->refsol ? date('d/m/Y',strtotime(H::getX('Numsol','Viasolviatra','Fecdes',$this->refsol))): '';
    }
    public function getFechas()
    {
        return $this->refsol ?  date('d/m/Y',strtotime(H::getX('Numsol','Viasolviatra','Fechas',$this->refsol))): '';
    }
    public function getNumdia()
    {
        return H::getX('Numsol','Viasolviatra','Numdia',$this->refsol);
    }
    public function getEmpleadoaut()
    {
        $codemp=H::getX('Numsol','Viasolviatra','Codempaut',$this->refsol);
        $nomemp=H::getX('Codemp','Nphojint','Nomemp',$codemp);
        return  $codemp!='' ? $codemp.'  -  '.$nomemp : '';
    }
    public function getDessol()
    {
        return H::getX('Numsol','Viasolviatra','dessol',$this->refsol);
    }
    public function getNomcat()
    {
        return H::getX('Codcat','Npcatpre','Nomcat',$this->codcat);
    }
    public function getCodnivaco()
    {
        return H::getX('Numsol','Viasolviatra','Codnivaco',$this->refsol);
    }
    public function getCodniv()
    {
        return H::getX('Numsol','Viasolviatra','Codniv',$this->refsol);
    }
    public function getMontot()
    {
        $monto=0;
        $c = new Criteria();
        $c->add(ViadetcalviatraPeer::NUMCAL,$this->numcal);
        $per = ViadetcalviatraPeer::doSelect($c);
        foreach($per as $r)
        {
            $monto+=$r->getMontot();
        }
        return H::FormatoMonto($monto);
    }
    public function getFecha()
    {
        return self::getFeccal();
    }
    public function getDescrip()
    {
        return H::GetX('Numsol','Viasolviatra','Dessol',$this->refsol);
    }
    public function getCodemp()
    {
        return H::getX('Numsol','Viasolviatra','Codemp',$this->refsol);
    }
    public function getCompromiso()
    {
        return $this->refcom ? 'COMPROMISO NRO '.$this->refcom : '';
    }
    public function getCiudad()
    {
        $codciu = H::GetX('Numsol','Viasolviatra','Codciu',$this->refsol);
        return $codciu.'  -  '.H::getX('Codciu','Viaciudad','Nomciu',$codciu);
    }
    public function getEstado()
    {
        $codciu = H::GetX('Numsol','Viasolviatra','Codciu',$this->refsol);
        $codest = H::getX('Codciu','Viaciudad','Codest',$codciu);
        return $codest.'  -  '.H::getX('Codest','Viaestado','Nomest',$codest);
    }
    public function getPais()
    {
        $codciu = H::GetX('Numsol','Viasolviatra','Codciu',$this->refsol);
        $codpai = H::getX('Codciu','Viaciudad','Codpai',$codciu);
        return $codpai.'  -  '.H::getX('Codpai','Viapais','Nompai',$codpai);
    }

}
