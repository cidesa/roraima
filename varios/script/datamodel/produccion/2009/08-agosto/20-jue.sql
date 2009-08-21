--CARLOS RAMIREZ
create SEQUENCE npparamsalint_seq;
CREATE TABLE npparamsalint
(
  codnom character varying(3) NOT NULL,
  codcon character varying(3) NOT NULL,
  afecta character varying(3) NOT NULL,
  id integer NOT NULL DEFAULT nextval('npparamsalint_seq'::regclass)
);