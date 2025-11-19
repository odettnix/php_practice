# PHP Docker Setup

## Запуск проекта

### Запуск всех сервисов
```bash
docker-compose up -d
```

### Остановка всех сервисов
```bash
docker-compose down
```

### Просмотр логов
```bash
docker-compose logs -f
```

### Пересборка контейнеров
```bash
docker-compose up -d --build
```

## Доступ к сервисам

- **PHP приложение**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081
- **MySQL**: localhost:3306

## Данные для подключения к MySQL

- **Host**: mysql (внутри Docker сети) или localhost (снаружи)
- **Port**: 3306
- **Database**: phpdb
- **Username**: phpuser
- **Password**: phppassword
- **Root Password**: rootpassword

## Структура проекта

- `Dockerfile` - конфигурация PHP контейнера
- `docker-compose.yml` - оркестрация сервисов
- `index.php` - тестовый файл PHP

