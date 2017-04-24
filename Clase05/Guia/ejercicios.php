<?php/*1)*/	
select * 
from Productos ordenby 
Order by pNombre 

/*2)*/
select * 
from Proveedores 
where Localidad = 'Quilmes'

/*3)*/
select * 
from Envios 
where Cantidad >= 200 and Cantidad <= 300

/*4)*/
select sum(Cantidad) as Cantidad 
from Envios

/*5)*///incompleto



/*6)*///incompleto

/*7)*/
select (Precio*Cantidad) 
from Productos as t1 
inner join Envios as t2 on t1.pNumero = t2.pNumero

/*8)*/
select sum(Cantidad) as CantidadTotal 
from Envios 
where Numero = 102 and pNumero = 1

/*9)*/ 
select Prod.pNombre from Productos as Prod 
inner join Envios as Env  on Env.pNumero=Prod.pNumero 
inner join Proveedores as Prov on Prov.Numero = Env.Numero 
where Prov.Localidad = 'Avellaneda'

/*10)*/
select Prov.Domicilio, Prov.Localidad from Proveedores as Prov where Prov.Localidad Like '%i%'

/*11)*/
use [TP3-2016];
insert into Productos 
(pNumero, pNombre, Precio, Tamaño) 
Values ('4','Chocolate', '25.35' , 'Chico')

/*12)*/
use [TP3-2016];
insert into Proveedores(Nombre, Domicilio,Localidad)
Values('Gomez','Centenario 1250','Lanus')

/*13)*/
use [TP3-2016];
insert into Proveedores (Numero, Nombre, Domicilio, Localidad)
values ('107','Rosales','','La Plata')

/*14)*/
use [TP3-2016];
update Productos 
set Precio = 97.50
where Tamaño = 'Grande'

/*15)*/
use [TP3-2016];
update Productos
set Tamaño = 'Mediano'
from Productos, Envios
where Productos.pNumero = Envios.pNumero and Productos.pNumero = 1 and Envios.Cantidad>= 300

/*16)*/
Delete from Productos
where pNumero = 1

/*17)*/
delete Proveedores from Proveedores 
where not exists(Select Envios.Numero from Envios where Envios.Numero = Proveedores.Numero
?>