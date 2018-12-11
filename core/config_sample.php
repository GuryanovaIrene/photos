<?php

//const DSN = "mysql:host=127.0.0.1;dbname=photos;charset=utf8";

const DOUBLE_USER = 'Пользователь с таким e-mail уже есть в системе';
const WRONG_USER = 'Неверная пара пользователь/пароль';
const WRONG_PASSWORD = 'Неверный пароль';

const BAN_FILE_TYPE = 'Запрещённый тип файла';
const LARGE_FILE = 'Слишком большой размер файла';
const FILE_IS_NOT_LOADED = 'Файл не загрузился';
const SUCCESS = 'Загрузка прошла успешно';
const ERR_USER_TITLE= 'При вводе обнаружены следующие ошибки: ';
const ERR_FILE_TITLE = 'При загрузке возникли ошибки:';
const SUCCESS_GENERATE_USER = 'Пользователь сгенерирован успешно';
const TRY_ENTER_AGAIN = 'Попытаться войти снова';

const SORT_TYPE_ASC = 'по возрастанию';
const SORT_TYPE_DESC = 'по убыванию';

const MODE = 'dev';
const PATH = '../images/';
require "../vendor/autoload.php";