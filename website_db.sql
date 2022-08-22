drop table product_add ;

CREATE TABLE IF NOT EXISTS product_add (
   id integer NOT NULL DEFAULT nextval('product_product_id_seq'::regclass),
   name character varying COLLATE pg_catalog."default" NOT NULL,

   price numeric NOT NULL,
description text COLLATE pg_catalog."default",
   create_date TIMESTAMP WITHOUT TIME ZONE DEFAULT now(),
	image text,
PRIMARY KEY(id)
   
);