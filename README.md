# Software de Gestión Empresarial (SGE) - Cotecnova 2026

**Proyecto Base:** Todo Barberos ERP  
**Integrantes:** Andrés Felipe Mejía Suaza y Andrés David Ospina Hurtado  
**Entorno de Ejecución:** WSL2 (Ubuntu) + Docker Desktop + Laravel Sail  
**Repositorio GitHub:** [https://github.com/NiquelAwol/SGE-2026](https://github.com/NiquelAwol/SGE-2026)

---

## Capítulo 2: Instalación de Laravel y Entorno Sail

El proyecto fue inicializado utilizando el framework **Laravel 11/12** mediante Composer en un subsistema Ubuntu (WSL2), orquestado con **Laravel Sail** para proveer contenedores aislados de PHP 8.x y MySQL 8.4 sin depender de servicios instalados globalmente en Windows.

### Comandos de Ejecución Local:
```bash
# Iniciar servicios con Laravel Sail en segundo plano
./vendor/bin/sail up -d

# Ejecutar migraciones de base de datos
./vendor/bin/sail php artisan migrate

# Detener los contenedores
./vendor/bin/sail down
```

---

## Capítulo 4: De la Teoría al Código - Migraciones y Modelos para el ERP

En este módulo se tradujo el Diagrama Entidad-Relación (MER) del proyecto **Todo Barberos ERP** a código estructurado en Laravel mediante migraciones de base de datos, modelos Eloquent con relaciones de integridad referencial y seeders para poblar datos de prueba del sector barbería.

### 1. Entidades y Migraciones Implementadas

| Tabla | Descripción de Entidad | Llaves / Restricciones |
| :--- | :--- | :--- |
| `categories` | Categorías de catálogo de insumos y herramientas | PK `id`, `name (varchar 100)`, `active (boolean)` |
| `products` | Catálogo de máquinas, tijeras, ceras y repuestos | PK `id`, FK `category_id` (cascade), `price (decimal 12,2)`, `stock (int)` |
| `clients` | Barberías y profesionales independientes clientes | PK `id`, `name`, `phone`, `email (unique)`, `address`, `active` |
| `providers` | Distribuidores mayoristas (Wahl, Andis, Elegance) | PK `id`, `name`, `contact_person`, `phone`, `email`, `address` |
| `sales` | Cabecera de facturas y ventas realizadas | PK `id`, FK `client_id` (cascade), `sale_date`, `total`, `status` |
| `sale_details`| Tabla pivote / detalle de ítems facturados | PK `id`, FK `sale_id` (cascade), FK `product_id` (cascade), `quantity`, `subtotal` |

### 2. Modelos Eloquent y Relaciones

- **`Category` (`app/Models/Category.php`)**:
  - `products()`: Relación 1:N (`hasMany(Product::class)`)
- **`Product` (`app/Models/Product.php`)**:
  - `category()`: Relación N:1 (`belongsTo(Category::class)`)
  - `saleDetails()`: Relación 1:N (`hasMany(SaleDetail::class)`)
  - `sales()`: Relación N:N (`belongsToMany(Sale::class, 'sale_details')->withPivot(...)`)
- **`Client` (`app/Models/Client.php`)**:
  - `sales()`: Relación 1:N (`hasMany(Sale::class)`)
- **`Provider` (`app/Models/Provider.php`)**:
  - Catálogo de proveedores del ERP.
- **`Sale` (`app/Models/Sale.php`)**:
  - `client()`: Relación N:1 (`belongsTo(Client::class)`)
  - `details()`: Relación 1:N (`hasMany(SaleDetail::class)`)
  - `products()`: Relación N:N (`belongsToMany(Product::class, 'sale_details')->withPivot(...)`)
- **`SaleDetail` (`app/Models/SaleDetail.php`)**:
  - `sale()`: Relación N:1 (`belongsTo(Sale::class)`)
  - `product()`: Relación N:1 (`belongsTo(Product::class)`)

### 3. Seeders de Prueba (Poblado de Base de Datos)

Se diseñaron Seeders específicos con más de 5 registros reales cada uno:
- **`CategorySeeder`**: 6 categorías de barbería (`Máquinas de Corte y Patilleras`, `Tijeras y Navajas Profesionales`, `Ceras, Pomadas y Fijadores`, etc.).
- **`ProductSeeder`**: 6 productos con especificaciones y precios reales en pesos colombianos (COP).
- **`ClientSeeder`**: 5 barberías y barberos del municipio de Cartago y Pereira.
- **`ProviderSeeder`**: 5 proveedores oficiales mayoristas.
- **`SaleSeeder`**: 5 ventas facturadas con cálculo automático de subtotales e ítems detallados.
- **`DatabaseSeeder`**: Orquestación coordinada de todos los seeders.

### 4. Comandos de Verificación

```bash
# Ejecutar migraciones desde cero y poblar con seeders
./vendor/bin/sail php artisan migrate:fresh --seed

# Ejecutar la suite completa de pruebas automatizadas (30 aserciones)
./vendor/bin/sail php artisan test

# Ingresar a MySQL en el contenedor Sail
./vendor/bin/sail mysql

# Probar modelos y relaciones de manera interactiva
./vendor/bin/sail php artisan tinker
```
