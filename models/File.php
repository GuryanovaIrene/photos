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

    public function __construct($userID, $fileType, $fileSize, $tmpName, $imageName)
    {
        $this->userID = $userID;
        $this->fileType = $fileType;
        $this->fileSize = $fileSize;
        $this->tmpName = $tmpName;
        $this->imageName = $imageName;
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
        $this->savePhoto();
        $this->addToDb();
    }

    public function savePhoto()
    {
        $this->check();
        if (empty($this->error)) {
            // Загрузка файла и вывод сообщения
            $res = @copy($this->tmpName, PATH . $this->imageName);
            if (!$res) {
                $arr[] = FILE_IS_NOT_LOADED;
            }
        }
    }

    public function addToDb()
    {
        $pdo = $this->conn();
        $prepare = $pdo->prepare('insert into photos(userID, url)
                                        values (:userID, :url)');
        $prepare->execute(['userID' => $this->userID, 'url' => '../images/' . $this->imageName]);
    }
}