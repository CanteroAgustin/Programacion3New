--1. Obtener los detalles completos de todos los productos, ordenados alfabéticamente.
SELECT * FROM productos order by nombre ASC

--2. Obtener los detalles completos de todos los proveedores de ‘Quilmes’.
SELECT * FROM provedores WHERE localidad = 'Quilmes';

--3. Obtener todos los envíos en los cuales la cantidad este entre 200 y 300 inclusive.
SELECT * FROM envios WHERE cantidad >= 200 AND cantidad <= 300;

--4. Obtener la cantidad total de todos los productos enviados.
SELECT SUM(cantidad) FROM envios;

--5. Mostrar los primeros 3 números de productos que se han enviado.
SELECT * FROM envios LIMIT 3;

--6. Mostrar los nombres de proveedores y los nombres de los productos enviados.
SELECT pr.nombre AS proveedor, p.nombre AS producto  FROM productos p 
INNER JOIN envios e ON p.pnumero = e.pnumero 
INNER JOIN provedores pr ON e.numero = pr.numero; 

--7. Indicar el monto (cantidad * precio) de todos los envíos.
SELECT p.nombre, e.cantidad AS cantidad, p.precio AS precio, TRUNCATE((cantidad * precio),2) AS Total FROM envios e
INNER JOIN productos p ON p.pnumero = e.pnumero;  

--8 Obtener la cantidad total del producto 1 enviado por el proveedor 102.
SELECT pr.nombre AS proveedor, p.nombre AS producto, e.cantidad AS cantidad, p.precio AS precio, TRUNCATE((cantidad * precio),2) AS Total FROM envios e
INNER JOIN productos p ON p.pnumero = e.pnumero 
INNER JOIN provedores pr ON e.numero = pr.numero
where p.pnumero = 1 AND pr.numero = 102;

--9 Obtener todos los números de los productos suministrados por algún proveedor de Avellaneda.
SELECT pr.localidad AS LOCALIDAD, e.pnumero AS ID_PRODUCTO FROM envios e
INNER JOIN provedores pr ON e.numero = pr.numero
where pr.localidad = 'Avellaneda';

--10 Obtener los domicilios y localidades de los proveedores cuyos nombres contengan la letra I.
SELECT nombre, localidad, domicilio FROM provedores
where nombre LIKE '%i%';

--11 Agregar el producto numero 4, llamado ‘Chocolate’, de tamaño chico y con un precio de 25,35.
INSERT INTO productos('nombre', 'precio', 'tamaño') VALUES ('Chocolate',25.35,'Chico');

--12. Insertar un nuevo proveedor (únicamente con los campos obligatorios).
INSERT INTO provedores('numero') VALUES (203);

--13. Insertar un nuevo proveedor (107), donde el nombre y la localidad son Rosales y La Plata.
INSERT INTO provedores('numero', 'nombre', 'domicilio', 'localidad') VALUES (107,'Rosales',null,"La Plata")

--14. Cambiar los precios de los productos de tamaño ‘grande’ a 97,50.
UPDATE productos SET (precio = 97.50) where tamaño = 'Grande'

--15. Cambiar el tamaño de ‘Chico’ a ‘Mediano’ de todos los productos cuyas cantidades 
--sean mayores a 300 inclusive.
UPDATE `productos` p 
INNER JOIN `envios` e ON e.pnumero = p.pnumero
SET p.`tamaño` = 'Mediano'
where p.`tamaño` = 'Chico' AND e.cantidad >= 300

--16. Eliminar el producto número 1.
DELETE FROM `productos` WHERE `pnumero` = 1

--17. Eliminar a todos los proveedores que no han enviado productos.
DELETE FROM `provedores` 
WHERE NOT EXISTS (SELECT * FROM `envios` e WHERE e.`numero` = `provedores`.`numero`);
