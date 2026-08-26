**Empresa:** Todo Barberos  
**Ubicación:** Cartago, Valle del Cauca, Colombia  
**Proyecto:** Sistema de Información Web para Gestión de Inventario, Compras y Ventas  
**Autores:** Andrés Felipe Mejía Suaza y Andrés David Ospina Hurtado  

---

## 1. Contexto Comercial y Problemática

**Todo Barberos** es una microempresa dedicada a la distribución y comercialización de insumos, herramientas y productos especializados para barberías, así como al mantenimiento de equipos de corte.

Actualmente, la operación interna se gestiona de manera manual mediante talonarios de papel, cuadernos de notas y registros aislados. Esta metodología tradicional genera las siguientes deficiencias operativas:
* **Pérdida de datos e inconformidad:** Riesgo elevado de extravío de registros de ventas y compras.
* **Falta de visibilidad de stock:** Inexistencia de un control en tiempo real de las existencias de productos, provocando quiebres de stock o sobreinventario.
* **Demoras en el servicio:** Tiempos elevados al procesar transacciones directas con clientes y proveedores.
* **Dificultad en la toma de decisiones:** Ausencia de reportes consolidables sobre el desempeño comercial.

---

## 2. Descripción de la Solución Tecnológica

Para resolver esta problemática, se desarrolló un prototipo funcional de **Aplicativo Web Local**, diseñado para ejecutarse en entorno `localhost` utilizando **XAMPP (Apache y MariaDB)**.

### Características Principales:
* **Gestión de Inventario (CRUD):** Registro de productos con precio de compra, precio de venta, stock actual e imagen.
* **Gestión de Compras:** Registro de reabastecimiento con proveedores e incremento automático de inventario.
* **Gestión de Ventas:** Registro de salidas de productos, vinculando cliente y empleado, con descuento automático de existencias.
* **Administración de Entidades:** Control maestro de clientes, proveedores, empleados y usuarios del sistema.
* **Reportes:** Generación de reportes de ventas filtrados por rangos de fecha.

---

## 3. Requisitos del Sistema

### Requisitos Funcionales (RF)
* **RF01 - Autenticación:** Permitir el ingreso seguro mediante usuario y contraseña cifrada.
* **RF02 - Gestión de Productos:** Permitir crear, consultar, actualizar y desactivar (borrado lógico) productos.
* **RF03 - Registro de Ventas:** Registrar la venta asociando cliente, empleado y múltiples detalles de productos.
* **RF04 - Registro de Compras:** Registrar compras asignando proveedor e insumos adquiridos.
* **RF05 - Control de Existencias:** Actualizar automáticamente el stock del producto mediante *Triggers* según compras y ventas procesadas.
* **RF06 - Gestión de Clientes y Proveedores:** Permitir el control maestro de la información de contacto de terceros.
* **RF07 - Reportes de Ventas:** Permitir la consulta de movimientos comerciales en un rango de fechas determinado.

### Requisitos No Funcionales (RNF)
* **RNF01 - Entorno de Despliegue:** Sistema ejecutable localmente sobre XAMPP (Apache/MariaDB).
* **RNF02 - Seguridad de Credenciales:** Uso de algoritmos de hashing seguro (`password_hash`) para el almacenamiento de contraseñas de usuario.
* **RNF03 - Integridad Referencial:** Garantizar la consistencia de datos mediante llaves foráneas (`FOREIGN KEY`) y reglas de borrado/actualización.
* **RNF04 - Usabilidad:** Interfaz limpia y adaptativa construida con Bootstrap.
* **RNF05 - Rendimiento:** Respuestas inmediatas al ejecutar la lógica de inventario directamente en el servidor de base de datos a través de disparadores (*Triggers*).

---

## 4. Arquitectura y Tecnologías Utilizadas

* **Lenguaje Backend:** PHP
* **Base de Datos:** MariaDB / MySQL
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap
* **Servidor Local:** Apache (XAMPP)
