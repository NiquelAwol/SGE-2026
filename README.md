cat << 'EOF' > README.md
# Software de Gestión Empresarial (SGE) - Cotecnova 2026

**Proyecto Base:** Todo Barberos ERP  
**Integrantes:** Andrés Felipe Mejía Suaza y Andrés David Ospina Hurtado  
**Entorno de Ejecución:** WSL2 (Ubuntu) + Docker Desktop + Laravel Sail  

---

## Capítulo 2: Instalación de Laravel y Entorno Sail

El proyecto fue inicializado utilizando el framework **Laravel 11/12** mediante Composer en un subsistema Ubuntu (WSL2), orquestado con **Laravel Sail** para proveer contenedores aislados de PHP 8.x y MySQL 8.0 sin depender de servicios instalados globalmente en Windows.

### Comandos de Ejecución Local:
```bash
# Iniciar servicios con Laravel Sail en segundo plano
./vendor/bin/sail up -d

# Ejecutar migraciones de base de datos
./vendor/bin/sail php artisan migrate

# Detener los contenedores
./vendor/bin/sail down
