![](./wedo.png)

# Standard WEDO PHP Job Application Test

## Purposes

The aim of the task is to evaluate the following traits of the candidates:
- Skills at PHP MVC development
- Knowledge of PHP, OOP, SQL etc.
- Creative thinking
- Code style


## Requirements

Estimated development time is 8 hours.

You're free to use any of the following technologies


| Category           | Requirements                                            |
|--------------------|---------------------------------------------------------|
| Framework          | Either Laravel or own solution                          |
| External libraries | Any libraries available on Packagist.org                |
| Php                | >=7.1                                                   |
| Db                 | mysql, mariadb, postgres                                |


The applicant is also free to use whatever libraries/frameworks/patterns he/she desires.

Please provide the database migrations or equivalent SQL scripts and an installation/deployment guide in a README with your solution.


## Expected functionality

The application features access both from the command line (see CLI API) and via REST API.
The applicant is required to implement all interfaces at `\App\Task` namespace.

### CLI API

The following protocol is established for CLI usage:

```
php cli.php COMMAND     # Outputs method COMMAND of \Task\Models\CLI
```

All commands are contained in ` \Task\Models\CLI` interface.

### REST API

REST API implements **GET** (view), **POST**(add), **PATCH**(edit) and **DELETE**(delete) HTTP methods

Api features the following endpoints:
- `users` (Model implements `\Task\Models\User`)
- `posts` (Models implement `\Task\Models\Post` and `\Task\Models\MediaPost`, as well as `\Task\Models\User`, `\Task\Models\Comment`)
- `posts/{id}/comments` (Model implements `\Task\Models\Comment`)

Possible requests:
- `GET /{ENDPOINT}` - View list
- `GET /{ENDPOINT}?sort=views&sortType=desc&page=1&perPage=20` - View list with optional parameters **sort**, **sortType**, **page** and **perPage**
- `GET /{ENDPOINT}/{id}` - View element
- `POST /{ENDPOINT}` - Add element
- `PATCH /{ENDPOINT}/{id}` - Edit element
- `DELETE /{ENDPOINT}/{id}` - Remove element

Each post contains a body of comments, expected output looks like this:

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

Please note: `GET /posts/44/comments` returns a list of 2 comments, one of which has a reply.
However, `GET /posts/44/comments/143`, where `143` is the reply comment ID is a valid request, and so are all other methods for this endpoint.

Please note that output fields are not necessarily equal to public fields of mentioned models.

Tip: compress images if necessary.

## Optional

Optionally, you might also do one (or all) of the following:
- Wrap the application into a docker container
- Add user registration API
- Add authentication / login API
- Write unit tests for your classes
- Add front-end for post gallery

