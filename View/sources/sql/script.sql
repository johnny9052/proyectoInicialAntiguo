create table usuario(
 id SERIAL primary key, 
 usuario varchar(20),
 contrasena varchar(100),
 nombre varchar(20),
 apellido varchar(20),
 id_rol integer,
 CONSTRAINT usuario_id_rol_fkey FOREIGN KEY (id_rol)  REFERENCES rol (id)
)

create table rol(
 id SERIAL primary key, 
 nombre varchar(20),
 descripcion varchar(100) 
)

insert into rol(nombre) values('administrador');
insert into usuario(usuario,contrasena,nombre,apellido,id_rol) values('admin','202cb962ac59075b964b07152d234b70','Johnny Alexander','Salazar',1);



CREATE OR REPLACE FUNCTION "login"(character varying, character varying, result refcursor)
  RETURNS refcursor AS
$BODY$
DECLARE

 usu ALIAS FOR $1;
 pass ALIAS FOR $2;
 
BEGIN
	open result for
	select usuario,nombre,apellido from usuario where contrasena=pass and usuario=usu;		
	return result;
END;

$BODY$
  LANGUAGE 'plpgsql' VOLATILE





create or replace function guardaRol(varchar,varchar) returns varchar AS
$BODY$
DECLARE
 nom ALIAS FOR $1;
 descr ALIAS FOR $2;
 resultado varchar;


BEGIN
	IF NOT EXISTS(select nombre from rol where nombre=nom)
		THEN
			insert into rol(nombre,descripcion) values(nom,descr);			
			resultado=1;
		ELSE
			resultado=0;		 
		END IF;
	

	
	return resultado;
END;

$BODY$

LANGUAGE 'plpgsql' VOLATILE;









CREATE OR REPLACE FUNCTION guardaRol(varchar,varchar,result refcursor)
  RETURNS refcursor AS
$BODY$
DECLARE
 nom ALIAS FOR $1;
 descr ALIAS FOR $2;
 
BEGIN

IF NOT EXISTS(select nombre from rol where nombre=nom)
		THEN
			insert into rol(nombre,descripcion) values(nom,descr);			
			open result for
			select '1' as res,'guardado con exito' as msj;		
			return result;
		ELSE
			open result for
			select '0' as res,'El rol ya existe' as msj;		
			return result;
		END IF;	
END;

$BODY$
  LANGUAGE 'plpgsql' VOLATILE








CREATE OR REPLACE FUNCTION "listarol"(result refcursor)
  RETURNS refcursor AS
$BODY$
DECLARE
 
BEGIN
	open result for
	select id,nombre,descripcion from rol;		
	return result;
END;

$BODY$
  LANGUAGE 'plpgsql' VOLATILE




create or replace function editaRol(int,varchar,varchar) returns varchar AS
$BODY$
DECLARE
 ide ALIAS FOR $1;
 nom ALIAS FOR $2;
 descr ALIAS FOR $3;
 resultado varchar;


BEGIN
	IF EXISTS(select 1 from rol where id=ide)
		THEN
			update rol set nombre=nom,descripcion=descr where id=ide ;
			resultado=1;
		ELSE
			resultado=0;
		 
		END IF;
	

	
	return resultado;
END;

$BODY$

LANGUAGE 'plpgsql' VOLATILE;





create or replace function editaRol(int,varchar,varchar,result refcursor) RETURNS refcursor AS
$BODY$
DECLARE
 ide ALIAS FOR $1;
 nom ALIAS FOR $2;
 descr ALIAS FOR $3;
 


BEGIN
	IF EXISTS(select 1 from rol where id=ide)
		THEN
			update rol set nombre=nom,descripcion=descr where id=ide ;
			open result for
			select '1' as res,'editado con exito' as msj;		
			return result;
		ELSE
			open result for
			select '0' as res,'No se pudo editar' as msj;		
			return result;
		 
		END IF;
	
	
END;

$BODY$

LANGUAGE 'plpgsql' VOLATILE;








create or replace function eliminaRol(int) returns varchar AS
$BODY$
DECLARE
 ide ALIAS FOR $1;
 resultado varchar;


BEGIN
	IF EXISTS(select 1 from rol where id=ide)
		THEN
			delete from rol where id=ide;
			resultado=1;
		ELSE
			resultado=0;		 
		END IF;
		
	return resultado;
END;

$BODY$

LANGUAGE 'plpgsql' VOLATILE;








create or replace function eliminaRol(int,result refcursor) RETURNS refcursor AS
$BODY$
DECLARE
 ide ALIAS FOR $1;
 

BEGIN
	IF EXISTS(select 1 from rol where id=ide)
		THEN
			delete from rol where id=ide;
			open result for
			select '1' as res,'eliminado con exito' as msj;		
			return result;
		ELSE
			open result for
			select '0' as res,'No se pudo eliminar' as msj;		
			return result;
		END IF;
		
	return resultado;
END;

$BODY$

LANGUAGE 'plpgsql' VOLATILE;








CREATE OR REPLACE FUNCTION listaUsuario(result refcursor)
  RETURNS refcursor AS
$BODY$
DECLARE
 
BEGIN
	open result for
	select id as id_lock,usuario,contrasena as pass_lock,nombre,apellido,id_rol from usuario;		
	return result;

	
END;

$BODY$
  LANGUAGE 'plpgsql' VOLATILE








