<?php

const DSN = "mysql:host=127.0.0.1;dbname=photos;charset=utf8";

const DOUBLE_USER = 'Пользователь с таким e-mail уже есть в системе';
const WRONG_USER = 'Неверная пара пользователь/пароль';
const WRONG_PASSWORD = 'Неверный пароль';

const BAN_FILE_TYPE = 'Запрещённый тип файла';
const LARGE_FILE = 'Слишком большой размер файла';
const FILE_IS_NOT_LOADED = 'Файл не загрузился';
const SUCCESS = 'Загрузка прошла успешно';
const ERR_USER_TITLE= 'Были обнаружены следующие ошибки: ';
const ERR_FILE_TITLE = 'При загрузке возникли ошибки:';
const MODE = 'dev';
const PATH = 'images/';
