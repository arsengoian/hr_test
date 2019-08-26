# Стандартный тест WEDO по PHP

## Требования

Рассчётное время разработки - 5-8 часов.

Вы можете использовать следующие технологии:

| Категория          | Требования                                              |
|--------------------|---------------------------------------------------------|
| Фреймворк          | Laravel или собственное решение (без фреймворка)        |
| Внешние библиотеки | Любые библиотеки, доступные из composer                 |
| PHP                | >=7.1                                                   |
| База данных        | mysql, mariadb, postgresql                              |

Пожалуйста, предоставьте вместе с решением миграции для структуры таблиц или эквивалентные SQL-скрипты, а также краткую инструкцию по разворачиванию/установке в README.


## Ожидаемый функционал

Доступ к приложению предоставляется посредством REST API. 
Для выполнения задания нужно имплементировать все интерфейсы в пространстве имён `\App\Task`.

Имплементация интерфейса `\Task\Models\CLI` является опциональной (смотр. Необязательные задания).

### REST API

REST API реализует HTTP-методы **GET** (просмотреть), **POST**(добавить), **PATCH**(редактировать) and **DELETE**(удалить)

В API присутствуют следующие конечные точки для запросов:
- `users` (Модель реализует интерфейс `\Task\Models\User`)
- `posts` (Модель реализует интерфейсы `\Task\Models\Post` и `\Task\Models\MediaPost`, в зависимости от содержания)
- `posts/{id}/comments` (Модель реализует интерфейс `\Task\Models\Comment`)

Возможные варианты запросов (`ENDPOINT` может быть `users`, `posts`, `posts/{postID}/comments`):
- `GET /{ENDPOINT}` - Просмотреть список
- `GET /{ENDPOINT}?sort=views&sortType=desc&page=1&perPage=20` - Просмотреть список с опциональными параметрами **sort**, **sortType**, **page** и **perPage**
- `GET /{ENDPOINT}/{id}` - Просмотреть элемент
- `POST /{ENDPOINT}` - Добавить элемент
- `PATCH /{ENDPOINT}/{id}` - Редактировать элемент
- `DELETE /{ENDPOINT}/{id}` - Удалить элемент

Каждый пост содержит тело комментариев, ожидаемый вывод сервера в формате JSON имеет следующий вид:

```http
GET /posts HTTP/1.1
Content-Type: application/json

[
  {
    "id": 42,
    "created_at": "1 Серпня 2019, 04:20",
    "text": "Коли навколо ні душі, коли моя не може спати, чомусь так хочеться мені для тебе пісню заспівати... ",
    "views": 1000
  },
  {
    "id": 43,
    "created_at": "1 Серпня 2019, 10:10",
    "views": 100,
    "text": "Одна в моїй кімнаті, нема куди тікати. І їй напевно не поможуть навіть танки і гармати... ",
    "image": "https://images.unsplash.com/photo-1553613599-d0f3dd9416ae"
  },
  {
    "id": 44,
    "created_at": "1 Серпня 2019, 10:10",
    "views": 500,
    "text": "Що ж це я, шо ж це я не зумів зупинитися вчасно? все ясно... ",
    "image": "https://images.unsplash.com/photo-1558032776-805c74bd1e54",
    "comments": [
      {
        "id": 141,
        "text": "Це з якої опери??",
        "user": {
          "id": 1,
          "created_at": "30 Липня 2019, 12:00",
          "name": "Ріхард Вагнер",
          "age": 25 
        },
      },
      {
        "id": 142,
        "text": "З тобою тепер...",
        "user": {
          "id": 4,
          "created_at": "30 Липня 2019, 23:59",
          "name": "Майкл Щур",
          "age": 37 
        },
        "replies": [
          {
            "id": 143,
            "text": "І назавжди... Пізно не йди!",
            "user": {
              "id": 14,
              "created_at": "29 Липня 2019, 22:30",
              "name": "Євген Шатайло",
              "age": 12 
            }
          }
        ]
      }
    ]
  }
]
```

Обратите внимание: `GET /posts/44/comments` возвращает список из 2 комментариев, у у одного из которых есть ответ.
Однако, `GET /posts/44/comments/143`, где `143` - ID комментария-ответа является действительным запросом, как и все прочие запросы для этого адреса.

Более подробная информация о моделях и их полях содержится в комментариях к интерфейсам.
Если вы не реализуете дополнительное задание с интерфейсом `\Task\Models\CLI`, предоставьте, пожалуйста, вместе с решением набор тестовых данных.

Обратите внимание, что поля ответа не обязательно соответствуют тем полям, которые хранятся в базе данных (возможно, нужно будет их модифицировать / изменить формат).
Подсказка: сжимайте изображения, если в этом есть потребность.



## Необязательные задания

Задание считается готовым и выполненным, если соответствует всем указанным выше требованиям, но если у Вас есть желание продемонстрировать углублённые навыки бэкенд-разработки, предлагаем ряд необязательных заданий:

### Интерфейс для коммандной строки

В интерфейсе `\Task\Models\CLI` содержится 3 дополнительных метода. 
Для выполнения этой части задания, реализуйте выполнение этих методов через запрос с коммандной строки.

Пример запроса:

```
php cli.php COMMAND     # Outputs method COMMAND of \Task\Models\CLI
```

### Дополнительные задания

В качестве бонуса, можете реализовать следующее:
- Создать юнит-тесты для классов проекта
- Заверните приложение в контейнер docker
