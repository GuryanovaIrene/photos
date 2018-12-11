<?php
namespace App;
use Intervention\Image\ImageManagerStatic as IImage;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class File extends User
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
        parent::__construct($userID, '', '', '', '', '');
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
            $res = @copy($this->tmpName, $this->imageName);
            if (!$res) {
                $this->error[] = FILE_IS_NOT_LOADED;
            }
        }
    }

    public function addToDb()
    {
        $imageName = $this->generate_random_string(8) . '.' . $this->imageExt;

        require "../core/capsule.php";
        Capsule::table('photos')
            ->insert(['userID' => $this->userID]);
        $photoID = Capsule::table('photos')
                    ->max('photoID');
        $this->fileID = $photoID;

        //  Почему 2 запроса? Хотелось бы получить уникальное имя файла.
        //  Поэтому сначала добавляем запись, получаем ИД, затем имя формируем имя файла:
        //    идФайла_случайноеИмя.расширение
        $imageName = PATH . $this->fileID .'_' . $imageName;
        Capsule::table('photos')
            ->where('photoID', '=', $this->fileID)
            ->update(['url' => $imageName]);
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