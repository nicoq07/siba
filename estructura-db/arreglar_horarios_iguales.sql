/* primero buscar los horarios iguales , hasta hoy son estos


SELECT h.id, h.nombre_dia,h.num_dia,h.hora 
FROM Horarios as h
   INNER JOIN (
       SELECT h.* FROM `horarios`  as h, ciclolectivo as c
		where YEAR(c.fecha_inicio) = 2018 AND
		c.id = h.ciclolectivo_id
		GROUP  BY  h.nombre_dia ,h.num_dia ,h.hora 
HAVING COUNT(h.id) > 1) test
ON 
 h.nombre_dia = test.nombre_dia AND
 h.num_dia = test.num_dia AND
 h.hora = test.hora AND
 h.ciclolectivo_id = test.ciclolectivo_id


60 	Tuesday 	2 	18:00:00
61 	Tuesday 	2 	18:00:00
71 	Friday 	5 	17:00:00
72 	Friday 	5 	16:00:00
74 	Friday 	5 	17:00:00
76 	Friday 	5 	16:00:00
79 	Friday 	5 	17:00:00
80 	Friday 	5 	16:00:00
96 	Friday 	5 	19:30:00
97 	Friday 	5 	19:30:00

*/

/* 

*despues busco las clases que esten en ese mismo dia y horario y ciclolectivo 
ejemplo: SELECT * FROM `clases` as c WHERE c.horario_id in (60,61)

*actualizo la clase para que use un solo horario 
UPDATE `clases` SET `horario_id` = '60' WHERE `clases`.`id` = 169;

*borro el horario
DELETE FROM `horarios` WHERE `horarios`.`id` = 61;

SELECT * FROM `clases` as c WHERE c.horario_id in (74,79)

UPDATE `clases` SET `horario_id` = '74' WHERE `clases`.`id` = 247;

DELETE FROM `horarios` WHERE `horarios`.`id` = 79;

DELETE FROM `horarios` WHERE `horarios`.`id` = 96


*/