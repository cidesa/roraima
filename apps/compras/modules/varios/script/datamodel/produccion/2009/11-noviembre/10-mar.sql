--Matriz 31 - Logicasa - Compras

ALTER TABLE cadetent
  ADD COLUMN "fecven" date;

alter table carcpart
add column nomcli varchar(100);

alter table carcpart
add column cancaj numeric(10,2) ;

alter table carcpart
add column canjau numeric(10,2) ;

---