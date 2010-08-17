<script language="Javascript">

    $('viacalviatra_fecha').hide();
    Calculartotal();
    function rellenarcorr(id)
    {
        if($(id).value=='')
            $(id).value=$(id).value.pad(10,'#',0)
        else
            $(id).value=$(id).value.pad(10,'0',0)
    }

    function bloquearcajacorr(id)
    {
        if($(id).value!='')
            $(id).readOnly=true;

    }
    function calculamontofinal(id,colu)
    {
        if($(id).readOnly==false)
        {
            var auxid=id.split('_');
            var col=auxid[2];
            var name=auxid[0];
            var fil= auxid[1];
            if(colu=='3')
            {
                var colval = parseInt(colu)+1;
                var colotr = parseInt(colu)+2;
            }
            else
            {
                var colval = parseInt(colu)+1;
                var colotr = parseInt(colu);
            }
            var idval = name+'_'+fil+'_'+colval;
            var idotr = name+'_'+fil+'_'+colotr;
            var idmon = name+'_'+fil+'_6';
            var val = $(idval).value
            val = val.replace('.','');
            val = val.replace(',','.');

            var valor = $(idotr).value
            valor = valor.replace('.','');
            valor = valor.replace(',','.');

            $(idmon).value=number_format(parseFloat(valor)*parseFloat(val),2,',','.');
            Calculartotal();
        }


    }

    function Calculartotal()
    {
        var total2=0;
        var filsuple='';
        var totfil = obtener_filas_grid('a', '3');
        for(i=0;i<totfil;i++)
        {
            if($('ax_'+i+'_2').value=='VI' && $('ax_'+i+'_7').value!='I3')
            {
                if($('ax_'+i+'_1').checked==true)
                {
                    var val2 = $('ax_'+i+'_5').value
                    val2 = val2.replace('.','');
                    val2 = val2.replace(',','.');
                    total2 = parseFloat(total2)+parseFloat(val2);
                }
            }
            if($('ax_'+i+'_7').value=='I3')
            {
                var filsuple =i;
            }

        }
        if(filsuple!='')
        {
            cold = 'ax_'+filsuple+'_4';
            colmd = 'ax_'+filsuple+'_5';
            colt = 'ax_'+filsuple+'_6';
            colmddol = 'ax_'+filsuple+'_9';
            coltdol = 'ax_'+filsuple+'_10';
            $(colmd).value=number_format(total2*0.3,2,',','.');
            $(colmddol).value=number_format((total2*0.3)/4.3,2,',','.');
            var val3=$(colmd).value;
            val3 = val3.replace('.','');
            val3 = val3.replace(',','.');
            var val4=$(cold).value;
            val4 = val4.replace('.','');
            val4 = val4.replace(',','.');
            $(colt).value=number_format(parseFloat(val3)*parseFloat(val4),2,',','.');
            $(coltdol).value=number_format((parseFloat(val3)*parseFloat(val4))/4.3,2,',','.');
        }
        ReCalculartotal();
    }

    function ReCalculartotal()
    {
        var total=0;
        var total2=0;
        var filsuple='';
        var totfil = obtener_filas_grid('a', '3');
        for(i=0;i<totfil;i++)
        {

            if($('ax_'+i+'_8').value=='F')
            {
                $('ax_'+i+'_4').readOnly=false;
                $('ax_'+i+'_5').readOnly=false;
            }else
            {
                if($('ax_'+i+'_6').value=='0,00')
                   $('ax_'+i+'_1').disabled=true;
            }
            if($('ax_'+i+'_1').checked==true)
            {
                var val = $('ax_'+i+'_6').value
                val = val.replace('.','');
                val = val.replace(',','.');
                total = parseFloat(total)+parseFloat(val);
            }

        }
        $('viacalviatra_totvia').value=number_format(total,2,',','.');
        $('viacalviatra_totviadol').value=number_format(total/4.3,2,',','.');
        toAjax(2,getUrlModulo()+'ajax','1','','&monto='+total);
    }
    if('<?php echo $viacalviatra->getTipvia()?>'=='NACIONAL' || '<?php echo $viacalviatra->getTipvia()?>'=='')
    {
        $('divtotviadol').hide();
    }else
    {
        $('divtotviadol').show();
    }    
</script>
