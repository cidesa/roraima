create trigger "trig_modcom" after update
on "SIMA002"."cpimpcom" for each row
execute procedure "SIMA002"."trig_modcom"();

create trigger "trig_modprc" after update
on "SIMA002"."cpimpprc" for each row
execute procedure "SIMA002"."trig_modprc"();

create trigger "trig_actcom" after update
on "SIMA002"."contabc" for each row
execute procedure "SIMA002"."trig_actcom"();


create trigger "trig_anuadi" after update
on "SIMA002"."cpmovadi" for each row
execute procedure "SIMA002"."trig_anuadi"();

create trigger "trig_anuaju" after update
on "SIMA002"."cpmovaju" for each row
execute procedure "SIMA002"."trig_anuaju"();

create trigger "trig_anucau" after update
on "SIMA002"."cpimpcau" for each row
execute procedure "SIMA002"."trig_anucau"();

create trigger "trig_anucop" after update
on "SIMA002"."cpimpcom" for each row
execute procedure "SIMA002"."trig_anucop"();

create trigger "trig_anupag" after update
on "SIMA002"."cpimppag" for each row
execute procedure "SIMA002"."trig_anupag"();

create trigger "trig_anuprc" after update
on "SIMA002"."cpimpprc" for each row
execute procedure "SIMA002"."trig_anuprc"();

create trigger "trig_anutra" after update
on "SIMA002"."cpmovtra" for each row
execute procedure "SIMA002"."trig_anutra"();

create trigger "trig_eliadi" after delete
on "SIMA002"."cpmovadi" for each row
execute procedure "SIMA002"."trig_eliadi"();

create trigger "trig_eliaju" after delete
on "SIMA002"."cpmovaju" for each row
execute procedure "SIMA002"."trig_eliaju"();

create trigger "trig_elicau" after delete
on "SIMA002"."cpimpcau" for each row
execute procedure "SIMA002"."trig_elicau"();

create trigger "trig_elicom" after delete
on "SIMA002"."cpimpcom" for each row
execute procedure "SIMA002"."trig_elicom"();

create trigger "trig_elipag" after delete
on "SIMA002"."cpimppag" for each row
execute procedure "SIMA002"."trig_elipag"();

create trigger "trig_eliprc" after delete
on "SIMA002"."cpimpprc" for each row
execute procedure "SIMA002"."trig_eliprc"();

create trigger "trig_elitra" after delete
on "SIMA002"."cpmovtra" for each row
execute procedure "SIMA002"."trig_elitra"();

create trigger "trig_incadi" after insert
on "SIMA002"."cpmovadi" for each row
execute procedure "SIMA002"."trig_incadi"();

create trigger "trig_incaju" after insert
on "SIMA002"."cpmovaju" for each row
execute procedure "SIMA002"."trig_incaju"();

create trigger "trig_inccau" after insert
on "SIMA002"."cpimpcau" for each row
execute procedure "SIMA002"."trig_inccau"();

create trigger "trig_inccom" after insert
on "SIMA002"."cpimpcom" for each row
execute procedure "SIMA002"."trig_inccom"();

create trigger "trig_incpag" after insert
on "SIMA002"."cpimppag" for each row
execute procedure "SIMA002"."trig_incpag"();

create trigger "trig_incprc" after insert
on "SIMA002"."cpimpprc" for each row
execute procedure "SIMA002"."trig_incprc"();

create trigger "trig_inctra" after insert
on "SIMA002"."cpmovtra" for each row
execute procedure "SIMA002"."trig_inctra"();

create trigger "trig_modcau1" after update
on "SIMA002"."cpimpcau" for each row
execute procedure "SIMA002"."trig_modcau1"();

create trigger "trig_modcau2" after update
on "SIMA002"."cpimpcau" for each row
execute procedure "SIMA002"."trig_modcau2"();

create trigger "trig_modpag" after update
on "SIMA002"."cpimppag" for each row
execute procedure "SIMA002"."trig_modpag"();

create trigger "trig_anuajuing" after update
on "SIMA002"."cimovaju" for each row
execute procedure "SIMA002"."trig_anuajuing"();

create trigger "trig_anuing" after update
on "SIMA002"."ciimping" for each row
execute procedure "SIMA002"."trig_anuing"();

create trigger "trig_eliajuing" after delete
on "SIMA002"."cimovaju" for each row
execute procedure "SIMA002"."trig_eliajuing"();

--create trigger "trig_elianuprc" after delete
--on "SIMA002"."cpimpprc" for each row
--execute procedure "SIMA002"."trig_elianuprc"();

create trigger "trig_eliing" after delete
on "SIMA002"."ciimping" for each row
execute procedure "SIMA002"."trig_eliing"();

create trigger "trig_incajuing" after insert
on "SIMA002"."cimovaju" for each row
execute procedure "SIMA002"."trig_incajuing"();

create trigger "trig_incing" after insert
on "SIMA002"."ciimping" for each row
execute procedure "SIMA002"."trig_incing"();

create trigger "trig_incmovlib" before insert
on "SIMA002"."tsmovlib" for each row
execute procedure "SIMA002"."trig_incmovlib"();