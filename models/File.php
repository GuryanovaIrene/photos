<?php
namespace App;

class File extends MainModel
{
    public $fileID;
    public $url;
    public $fileType;
    public $fileSize;
    public $tmpName;
    public $imageName;
    public $imageExt;

    public function __construct($userID, $fileType, $fileSize, $tmpName, $fileName)
    {
        $this->userID = $userID;
        $this->fileType = $fileType;
        $this->fileSize = $fileSize;
        $this->tmpName = $tmpName;
        // Получим расширение файла путем отсечения от последней точки
        $this->imageExt = substr($fileName, strrpos($fileName, '.') + 1);
    }

    public function check()
    {
        // Массив допустимых значений типа файла
        $types = array('image/gif', 'image/png', 'image/jpeg');
        // Максимальный размер файла
        $size = 1024000;

        // Проверяем тип файла
        if (!in_array($this->fileType, $types)) {
            $this->error[] = BAN_FILE_TYPE;
        }

        // Проверяем размер файла
        if ($this->fileSize > $size) {
           $this->error[] = LARGE_FILE;
        }
    }

    public function loadPhoto()
    {
        $this->addToDb();
        $this->savePhoto();
    }

    public function savePhoto()
    {
        $this->check();
        if (empty($this->error)) {
            // Загрузка файла и вывод сообщения
            $res = @copy($this->tmpName, PATH . $this->imageName);
            echo $res;
            if (!$res) {
                $arr[] = FILE_IS_NOT_LOADED;
            }
        }
    }

    public function addToDb()
    {
        $imageName = $this->generate_random_string(8) . '.' . $this->imageExt;
        $pdo = $this->conn();
        $prepare = $pdo->prepare('insert into photos(userID)
                                        values (:userID)');
        $prepare->execute(['userID' => $this->userID]);
        $this->fileID = $pdo->lastInsertId();
        //  Почему 2 запроса? Хотелось бы получить уникальное имя файла.
        //  Поэтому сначала добавляем запись, получаем ИД, затем имя формируем имя файла:
        //    идФайла_случайноеИмя.расширение
        $imageName = $this->fileID .'_' . $imageName;
        $prepare = $pdo->prepare('update photos set url = :url where photoID = :photoID');
        $prepare->execute(['photoID' => $this->fileID, 'url' => PATH . $imageName]);
        $this->imageName = $imageName;
    }

    // Генерация случайной строки для формирования имени файла
    function generate_random_string($length) {

        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        $random = '';

        for ($i = 0; $i < $length; $i++) {
            $random .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $random;
    }
}