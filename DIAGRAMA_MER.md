**Proyecto:** Base de Datos `todobarberos`  
**Motor:** MariaDB / MySQL  

---

## 1. Representación Textual / Mermaid del Diagrama ER

```mermaid
erDiagram
    PROVEEDOR ||--o{ PRODUCTO : surte
    PRODUCTO ||--o{ DETALLE_COMPRA : incluye
    COMPRA ||--|{ DETALLE_COMPRA : contiene
    PROVEEDOR ||--o{ COMPRA : realiza
    CLIENTE ||--o{ VENTA : realiza
    EMPLEADO ||--o{ VENTA : atiende
    VENTA ||--|{ DETALLE_VENTA : contiene
    PRODUCTO ||--o{ DETALLE_VENTA : incluye

    PRODUCTO {
        int ID_Producto PK
        string Nombre
        string Descripcion
        decimal Precio_Compra
        decimal Precio_Venta
        int Stock
        string Imagen
        int ID_Proveedor FK
        bit Activo
    }

    CLIENTE {
        int ID_Cliente PK
        string Nombre
        string Telefono
        string Email
        bit Activo
    }

    PROVEEDOR {
        int ID_Proveedor PK
        string Nombre
        string Telefono
        string Email
        bit Activo
    }

    EMPLEADO {
        int ID_Empleado PK
        string Nombre
        string Cargo
        string Telefono
        bit Activo
    }

    USUARIO {
        int ID_Usuario PK
        string Usuario
        string Password
        string Rol
    }

    COMPRA {
        int ID_Compra PK
        int ID_Proveedor FK
        datetime Fecha
        decimal Total
    }

    DETALLE_COMPRA {
        int ID_DetalleCompra PK
        int ID_Compra FK
        int ID_Producto FK
        int Cantidad
        decimal Precio_Compra
        decimal Subtotal
    }

    VENTA {
        int ID_Venta PK
        int ID_Cliente FK
        int ID_Empleado FK
        datetime Fecha
        decimal Total
        tinyint Procesada
    }

    DETALLE_VENTA {
        int ID_DetalleVenta PK
        int ID_Venta FK
        int ID_Producto FK
        int Cantidad
        decimal Precio_Venta
        decimal Subtotal
    }
