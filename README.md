# Tdesis
###############################  SISTEMA DE VOTACIONES (Test Desis) ###################################
El presente Test cumple con los requisitos solicitados, para lo cual se ha desarrollado en 
el siguiente Stack:
Html, Bootstrap, Javascript, Ajax, PHP, MySQL
* El sistema fue diseñado en ambiente PHP v 5.3.0, pero se han usado funciones estandar a v 7.0
* La codificación interna en PHP esta acoplada a funciones nativas (PHP puro, Core, Legacy)
* validación a nivel de Frontend es controlada por javascript mediante alert y se previene el submit
  del formulario principal, mediante el cumplimiento de retur de funciones de validación
* validación a nivel de Backend
* para la conexion a base de datos se ha usado PDO mediante POO con patrón Singleton y llamadas
  de clase



######################## instrucciones para instalacion sistema de votaciones ########################

Ejecutar las siguientes tareas en el orden indicado
- crear las bases de datos
- clonar repositorio
- configurar archivo de conexion.php

- para la creación de bases de datos, ejecutar en cualquier BDMS el archivo Dtest.sql

########################################  Estructura de archivos #####################################

	┬
	├─ busquedas.php	clase busquedas con los statements (String de query) y conformado de respuestas json
	├─ conexion.php		clase Singleton para conexion base de datos
	├─ data.php		interface para llamadas
	├─ error.php		página genérica de Frontend
	├─ grabarvoto.php	Clase que graba el voto y validación de Backend
	├─ helper.php		Helper con método de ejemplo que sanitiza variables expuestas en GET (url)
	├─ index.php		Endpoint inicial del aplicativo
	├─ query.php		Clase con metodos genéricos preformateados con PDO (query e insert)
	└─ script.js		Código JS para validaciones en Frontend




######################################## Estructura de Base de Datos ##################################


	┬
	├─ candidato		datos del candidato
	├─ comuna		listado de comunas, con asociación a región por campo region
	├─ contacto		como se contacto con nosotros, con relación al id_votante
	├─ region		listado de regiones
	├─ tipo_contacto	tipo de forma de contacto
	├─ votante		datos del votante
	└─ voto			datos del voto, registrando al votante por su id + id del 
				candidato y la fecha/hora de la votación (voto)

####################################### Disclaimer y consideraciones finales ###############################

* No se han usado Foreing keys en base de datos, esto se ha hecho así para probar la integridad del flujo 
  de validación, tanto a nivel de front como de backend
* No se han usado modales ni otros métodos para mantener código simplificado
* No se han usado Namespaces, se podría haber hecho dado que todos los archivos se encuentran al mismo nivel de carpeta 
* se usaron en su mayoría variables tipo get, aunque no es recomendable por temas de seguridad
* dado el tiempo dado se intentó completar los requisitos solicitados, sino se han cumplido, pidos las disculpas respectivas.
