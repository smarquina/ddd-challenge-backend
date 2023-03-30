![Image description](public/img/logo.svg)

------------------------------------------------------
               Reto candidato Cuideo                   
------------------------------------------------------

Bienvenido al Reto candidato Cuideo, te acabamos de dar permiso al repositorio con lo cual has podido acceder a realizar
nuestro Test.

Te hemos dejado un dump ubicado en info/orders.sql

Para este feature contamos con un symfony 4.3 pelao que solo tiene manejo de orm's y doctrine.

y lo que queremos es listar los pedidos realizados por un comando de consola, no necesitas entorno web para nada
pero si quieres probar algo sera en http://localhost

###### Se pide:
    - Crea una rama desde master con tu nombre y apellido.
    - Configurar en .env.local la conexion con la base de datos.
    - En el BoundedContext CuideoCandidate ya tienes montada la arquitectura hexagonal pero queremos que entiendas
      la diferencias y el uso de las capas de esta arquitectura hexagonal.
    - Editar modelo Orders.php con las propiedades de la tabla orders.              CAPA DOMAIN
    - Editar interface OrdersRepository con los métodos que consideres necesarios.  CAPA DOMAIN
    - Editar repositorio DoctrineOrdersRepository                                   CAPA INFRASTRUCTURE
    - Crear caso de uso GetOrders                                                   CAPA APPLICATION
    - Queremos que dentro del BoundedContext CuideoCandidate apliques:
        - principios SOLID
        - arquitectura hexagoonal
        - DDD, apostamos por llevar toda nuestra lógica de negocio al dominio y así evitar tenerla desperdigada por todo
          el proyecto.
        - TDD, aplica tests.
    - Editar un camando de consola                                                  CAPA INFRASTRUCTURE
    - Queremos ver el resultado en un comando de consola 'cuideo:get:orders'     

###### Docker:        
- El proyecto consta con Docker, por tanto si ejecutas desde terminal:
    - make start ya tendrás el container docker.

- Acceder por terminal al container docker y ejecutar comandos de consola
	- sudo docker-compose run web php bin/console cuideo:list:orders
    - make bash y dentro del container bin/console cuideo:list:orders

###### Resultado esperado:
    ========================Cuideo Candidate Begin======================
    
    +-------------------- Orders ----------+---------+
    | id                                   | name    |
    +--------------------------------------+---------+
    | 68ba2622-c8da-41d7-9a5c-64a19214d7de | order 1 |
    | 68ba2622-c8da-41d7-9a5c-64a19214d7df | order 2 |
    +--------------- total orders: 2 ------+---------+
    
    ========================Cuideo Candidate End========================
    

###### Se valorara agregar algo de lógica al modelo de Orders, la lógica que tu quieras inventarte.


## Elementos añadidos

#### Creación de una nueva orden por consola:
 - php bin/console cuideo:create:order
 - recibe por parámetro el nombre del pedido (cuideo:create:order "test 1")

#### Listado de pedidos via http:
 - Ruta: /
 - Respuesta: Los mismos datos que el comando list:orders, formateados según el serializador incluido.

#### Testing:
 - test unitario asociado a la query de pedidos.
