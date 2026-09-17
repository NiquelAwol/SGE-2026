# INFORME DE ENTREGA - TALLER CLASE 4
## Seminario de Desarrollo de Aplicaciones Web en Laravel con Enfoque RAD
### Cotecnova - 2026

---

**Asignatura:** Software de Gestión Empresarial (SGE)  
**Proyecto:** Todo Barberos ERP  
**Autores:** Andrés Felipe Mejía Suaza y Andrés David Ospina Hurtado  
**Enlace del Repositorio en GitHub:** [https://github.com/NiquelAwol/SGE-2026](https://github.com/NiquelAwol/SGE-2026)  
**Entorno de Desarrollo:** WSL2 (Ubuntu) + Docker Desktop + Laravel Sail (PHP 8.5 / MySQL 8.4)  

---

## 1. Resumen de la Actividad Desarrollada

En cumplimiento de la **Guía Completa de la Clase 4: De la Teoría al Código - Migraciones y Modelos**, se implementó la arquitectura de datos del sistema **Todo Barberos ERP**, traduciendo el Diagrama Entidad-Relación (MER) a código ejecutable en Laravel.

Se completaron exitosamente:
1. **Práctica Guiada:** Migraciones de `categories` y `products`, modelos Eloquent con relaciones directas e inversas (`hasMany` y `belongsTo`), y pruebas en consola interactiva Tinker.
2. **Trabajo Independiente para la Empresa (Todo Barberos ERP):** Se diseñaron e implementaron 6 entidades relacionales (`categories`, `products`, `clients`, `providers`, `sales`, `sale_details`), garantizando integridad referencial mediante claves foráneas y cascada.
3. **Poblado de Datos (Seeders):** Creación y ejecución de Seeders con más de 5 registros reales de barbería por tabla.
4. **Validación Automatizada:** Suite de pruebas PHPUnit con 7 pruebas y 30 aserciones que certifican la consistencia de las tablas y relaciones.

---

## 2. Entregables Solicitados en la Guía

### Entregable A: Listado de Tablas Creadas en MySQL (`SHOW TABLES;`)

**Comando ejecutado:**
```bash
./vendor/bin/sail mysql
USE laravel;
SHOW TABLES;
```

**Resultado obtenido:**
```sql
+-----------------------+
| Tables_in_laravel     |
+-----------------------+
| cache                 |
| cache_locks           |
| categories            |
| clients               |
| failed_jobs           |
| job_batches           |
| jobs                  |
| migrations            |
| password_reset_tokens |
| products              |
| providers             |
| sale_details          |
| sales                 |
| sessions              |
| users                 |
+-----------------------+
15 rows in set (0.01 sec)
```

---

### Entregable B: Registro Insertado y Relaciones en Tinker

**Comando ejecutado:**
```bash
./vendor/bin/sail php artisan tinker
```

**Sesión interactiva en Tinker:**
```php
> $category = App\Models\Category::first();
= App\Models\Category {#6156
    id: 1,
    name: "Máquinas de Corte y Patilleras",
    description: "Clippers inalámbricas, trimmers de precisión, shavers y cuchillas de repuesto.",
    active: 1,
    created_at: "2026-09-17 03:46:08",
    updated_at: "2026-09-17 03:46:08",
  }

> $product = App\Models\Product::create([
    'name' => 'Laptop Lenovo ThinkPad',
    'description' => 'Laptop 16GB RAM 512GB SSD',
    'price' => 4500000,
    'stock' => 10,
    'category_id' => $category->id,
    'active' => true,
  ]);
= App\Models\Product {#6157
    name: "Laptop Lenovo ThinkPad",
    description: "Laptop 16GB RAM 512GB SSD",
    price: 4500000,
    stock: 10,
    category_id: 1,
    active: true,
    updated_at: "2026-09-17 03:50:38",
    created_at: "2026-09-17 03:50:38",
    id: 7,
  }

> $product->category->name;
= "Máquinas de Corte y Patilleras"

> $category->products->pluck('name');
= Illuminate\Support\Collection {#6160
    all: [
      "Wahl Magic Clip Cordless 5 Star",
      "Andis Slimline Pro Li Trimmer",
      "Laptop Lenovo ThinkPad",
    ],
  }
```

---

### Entregable C: Listado de Categorías en MySQL (`SELECT * FROM categories;`)

**Comando ejecutado:**
```bash
./vendor/bin/sail mysql -e "SELECT id, name, description, active FROM categories;"
```

**Resultado obtenido:**
```sql
+----+-------------------------------------+-----------------------------------------------------------------------------------------------+--------+
| id | name                                | description                                                                                   | active |
+----+-------------------------------------+-----------------------------------------------------------------------------------------------+--------+
|  1 | Máquinas de Corte y Patilleras      | Clippers inalámbricas, trimmers de precisión, shavers y cuchillas de repuesto.                |      1 |
|  2 | Tijeras y Navajas Profesionales     | Tijeras de corte microdentadas, filo dulce, navajines tradicionales y hojas intercambiables.  |      1 |
|  3 | Ceras, Pomadas y Fijadores          | Pomadas base agua, efecto mate, fijadores en spray y polvos de volumen para estilizado.       |      1 |
|  4 | Cuidado Facial, Barba y Aftershave  | Geles de afeitar transparentes, lociones astringentes, aceites humectantes y tónicos.         |      1 |
|  5 | Mobiliario y Accesorios de Barbería | Capas de corte antiestáticas, cepillos degradados, pulverizadores continuos y desinfectantes. |      1 |
|  6 | Electrónicos                        | Equipos y dispositivos electrónicos de barbería.                                              |      1 |
+----+-------------------------------------+-----------------------------------------------------------------------------------------------+--------+
6 rows in set (0.00 sec)
```

---

### Entregable D: Enlace al Repositorio de GitHub con los Cambios

- **URL del Repositorio:** [https://github.com/NiquelAwol/SGE-2026](https://github.com/NiquelAwol/SGE-2026)
- **Rama:** `main`
- **Mensaje de confirmación (Commit):** `"Clase 4: Migraciones y modelos para el ERP"`

---

## 3. Evidencias Adicionales de Integridad y Robustez

### Estructura de la Tabla de Productos (`DESCRIBE products;`)
```sql
+-------------+-----------------+------+-----+---------+----------------+
| Field       | Type            | Null | Key | Default | Extra          |
+-------------+-----------------+------+-----+---------+----------------+
| id          | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| name        | varchar(150)    | NO   |     | NULL    |                |
| description | text            | YES  |     | NULL    |                |
| price       | decimal(12,2)   | NO   |     | NULL    |                |
| stock       | int             | NO   |     | 0       |                |
| category_id | bigint unsigned | NO   | MUL | NULL    |                |
| active      | tinyint(1)      | NO   |     | 1       |                |
| created_at  | timestamp       | YES  |     | NULL    |                |
| updated_at  | timestamp       | YES  |     | NULL    |                |
+-------------+-----------------+------+-----+---------+----------------+
```

### Poblado de Productos de Barbería (`ProductSeeder`)
```sql
+----+--------------------------------------------+-----------+-------+-------------+
| id | name                                       | price     | stock | category_id |
+----+--------------------------------------------+-----------+-------+-------------+
|  1 | Wahl Magic Clip Cordless 5 Star            | 480000.00 |    15 |           1 |
|  2 | Andis Slimline Pro Li Trimmer              | 395000.00 |    12 |           1 |
|  3 | Tijera Filo Dulce Kasho Japanese 6.0 pulg  | 220000.00 |     8 |           2 |
|  4 | Pomada Fijadora Suavecito Firme Hold 4oz   |  65000.00 |    45 |           3 |
|  5 | Gel de Afeitar Elegance Plus 500ml         |  42000.00 |    30 |           4 |
|  6 | Capa de Barbero Antiestática Todo Barberos |  35000.00 |    25 |           5 |
+----+--------------------------------------------+-----------+-------+-------------+
```

### Relación 1:N y N:N Probada (Venta Facturada con Detalles)
```
Venta #1:
- Cliente: Barbero Real Studio (Tel: 3104567890)
- Fecha: 2026-09-12 03:46:08 | Método de Pago: transferencia
- Detalle Ítems:
  * Wahl Magic Clip Cordless 5 Star x 1 @ $480,000.00 = $480,000.00
  * Pomada Fijadora Suavecito Firme Hold 4oz x 2 @ $65,000.00 = $130,000.00
- Total Facturado: $610,000.00
```

### Resultados de la Suite Automatizada de Pruebas (`php artisan test`)
```text
   PASS  Tests\Unit\ExampleTest
  ✓ that true is true

   PASS  Tests\Feature\Clase4ModelsAndRelationsTest
  ✓ categories and products relationship                                 3.43s  
  ✓ clients and sales relationship                                       0.01s  
  ✓ sales and products many to many with details                         0.01s  
  ✓ minimum five records per table from seeders                          0.01s  
  ✓ tinker style creation and inverse relation                           0.01s  

   PASS  Tests\Feature\ExampleTest
  ✓ the application returns a successful response                        0.05s  

  Tests:    7 passed (30 assertions)
  Duration: 3.60s
```
