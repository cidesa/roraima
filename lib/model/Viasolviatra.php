<?php

/**
 * Subclase para representar una fila de la tabla 'viasolviatra'.
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
class Viasolviatra extends BaseViasolviatra
{
    protected $grid=array();
    protected $check='';
    protected $codnivaprsig='';

    public function getNomemp()
    {
        return H::GetX('Codemp','Nphojint','Nomemp',$this->codemp);
    }
    public function getCedemp()
    {
        return H::GetX('Codemp','Nphojint','Cedemp',$this->codemp);
    }
    public function getCargo()
    {
        $codcar = NphojintPeer::getCodcar($this->codemp);
        $nomcar = NphojintPeer::getNomcar($codcar);
        return $codcar.'  -  '.$nomcar;
    }
    public function getNivel()
    {
        $nomniv='';
        $codniv = H::GetX('Codemp','Nphojint','Codniv',$this->codemp);
        $c2 = new Criteria();
        $c2->add(NpestorgPeer::CODNIV,$codniv);
        $per2 = NpestorgPeer::doSelectOne($c2);
        if($per2)
            $nomniv=$per2->getDesniv();
        return $codniv.'  -  '.$nomniv;
    }
    public function getNomcat()
    {
        return H::GetX('Codcat','Npcatpre','Nomcat',$this->codcat);
    }
    public function getDesniv()
    {
        return H::GetX('Codniv','Viadefniv','Desniv',$this->codniv);
    }
    public function getNomempaco()
    {
        return H::GetX('Codemp','Nphojint','Nomemp',$this->codempaco);
    }
    public function getCedempaco()
    {
        return H::GetX('Codemp','Nphojint','Cedemp',$this->codempaco);
    }
    public function getCargoaco()
    {
        $codcar = NphojintPeer::getCodcar($this->codempaco);
        $nomcar = NphojintPeer::getNomcar($codcar);
        return $codcar.'  -  '.$nomcar;
    }
    public function getNivelaco()
    {
        $nomniv='';
        $codniv = H::GetX('Codemp','Nphojint','Codniv',$this->codempaco);
        $c2 = new Criteria();
        $c2->add(NpestorgPeer::CODNIV,$codniv);
        $per2 = NpestorgPeer::doSelectOne($c2);
        if($per2)
            $nomniv=$per2->getDesniv();
        return $codniv.'  -  '.$nomniv;
    }
    public function getDesnivaco()
    {
        return H::GetX('Codniv','Viadefniv','Desniv',$this->codnivaco);
    }
    public function getNomempaut()
    {
        return H::GetX('Codemp','Nphojint','Nomemp',$this->codempaut);
    }
    public function getCedempaut()
    {
        return H::GetX('Codemp','Nphojint','Cedemp',$this->codempaut);
    }
    public function getNivelaut()
    {
        $nomniv='';
        $codniv = H::GetX('Codemp','Nphojint','Codniv',$this->codempaut);
        $c2 = new Criteria();
        $c2->add(NpestorgPeer::CODNIV,$codniv);
        $per2 = NpestorgPeer::doSelectOne($c2);
        if($per2)
            $nomniv=$per2->getDesniv();
        return $codniv.'  -  '.$nomniv;
    }
    public function getDesproced()
    {
        return H::GetX('Codproced','Viadefproced','Desproced',$this->codproced);
    }
    public function getDesfortra()
    {
        return H::GetX('Codfortra','Viadeffortra','Desfortra',$this->codfortra);
    }
    public function getRefsol()
    {
        return self::getNumsol();
    }
    public function getEmpleado()
    {        
        $nomemp=H::getX('Codemp','Nphojint','Nomemp',$this->codemp);
        return  $this->codemp!='' ? $this->codemp.'  -  '.$nomemp : '';
    }
    public function getCodnivapract()
    {
        return self::getCodnivapr();
    }
    public function getNivact()
    {
        return H::getX('Codnivapr','Viadefnivapr','Desnivapr',$this->codnivapr);
    }
    public function getCodnivaprsig()
    {
        $priori=0;
        $c = new Criteria();
        $c->add(ViaasopronivPeer::CODPROCED,$this->codproced);
        $c->add(ViaasopronivPeer::CODNIVAPR,$this->codnivapr);        
        $per = ViaasopronivPeer::doSelectOne($c);
        if($per)
          $priori=$per->getPrioriapr();

        $c = new Criteria();
        $c->add(ViaasopronivPeer::CODPROCED,$this->codproced);
        $c->add(ViaasopronivPeer::PRIORIAPR,($priori+1));
        $per = ViaasopronivPeer::doSelectOne($c);
        if($per)
          return $per->getCodnivapr();
        else
          return '';
    }
    public function getNivsig()
    {
        $desniv=H::getX('Codnivapr','Viadefnivapr','Desnivapr',self::getCodnivaprsig());
        return  $desniv ? $desniv : 'NIVEL ACTUAL ES ULTIMO' ;
    }
    public function getNomciu()
    {
        return H::GetX('Codciu','Viaciudad','Nomciu',$this->codciu);
    }
    public function getCodest()
    {
        return H::GetX('Codciu','Viaciudad','Codest',$this->codciu);
    }
    public function getNomest()
    {
        return H::GetX('Codest','Viaestado','Nomest',self::getCodest());
    }
}
