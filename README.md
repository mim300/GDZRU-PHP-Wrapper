# GDZ.RU PHP Wrapper
PHP враппер для gdz.ru.

## Зачем он нужен?

- Ну, во первых, тут есть обложки.  
- Во-вторых, он позволяет обходить блокировки на школьном wi-fi т.к. все запросы к API производятся на стороне сервера, а картинки передаются вместе со страницей
- В-третьих... В-третьих, такой интерфейс удобнее _имхо_  

## Установка

Этот скрипт будет работать на любом PHP сервере с поддержкой внешних API запросов и версией не ниже 5.3.  
Для установки достаточно просто скачать ZIP с файлами и закинуть все файлы в любую директорию на сервере. Все, скрипт установлен и уже готов к работе.

## Настройка

В папке с файлами есть файл `config.json`. Редактируя его можно настроить некоторые аспекты главной страницы.  
Формат:
```json
{
  "description": "Это пример описания сайта. Настройте в config.json",
  "title": "GDZRU PHP WRAPPER",
  "additional": [
    {
      "lnk": "http://example.com",
      "txt": "Пример ссылки"
    },
    {
      "lnk": "https://github.com/TaizoGem/GDZRU-PHP-Wrapper",
      "txt": "Репозиторий"
    }
  ],
  "additional_note": "Это пример описания доп. ссылок. Настройте в config.json"
}
```

Просто отредактируйте файл любым текстовым редактором, и изменения сразу же применятся.  
Файл настроек подхватывается динамически уже на стороне браузера.
