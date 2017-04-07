<?php

/**
 * Класс Task - модель для работы с задачами
 */
class Task {
 
    
     /**
     * Возвращает массив задач
     * @param type $count [optional] <p>Количество</p>
     * @param type $item [optional] <p>Параметр сортировки</p>
     * @return array <p>Массив записей</p>
     */
    public static function getTaskList($item = 1)
    {
        
        $db = Db::getConnection();

        $taskList = array();
        
        switch ($item){
            case 1: $sql = 'SELECT * FROM task_table ORDER BY name'; break;
            case 2: $sql = 'SELECT * FROM task_table ORDER BY email'; break;
            case 3: $sql = 'SELECT * FROM task_table ORDER BY status'; break;
            default :$sql = 'SELECT * FROM task_table'; break;
        }
        
        $result = $db->query($sql);

        $i = 0;
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['name'] = $row['name'];
            $taskList[$i]['email'] = $row['email'];
            $taskList[$i]['text'] = $row['text'];
            $taskList[$i]['status'] = $row['status'];
            
            $i++;
        }

        return $taskList;
    }
    
     /**
     * Возвращает запись с указанным id
     * @param integer $id <p>id записи(задача)</p>
     * @return array <p>Массив с информацией о записи</p>
     */
    public static function getTaskItemByID($id)
    {
        $id = intval($id);
        
        if($id){
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM task_table WHERE id='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }
    
    /**
     * Редактирование данных записи
     * @param integer $id <p>id задачи</p>
     * @param string $text <p>Текст задачи</p>
     * @param string $status <p>Статус задачи</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function edit($id, $text, $status)
    {
        $db = Db::getConnection();
        
        $sql = "UPDATE task_table 
            SET text = :text, status = :status  
            WHERE id = :id";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':id', $id, PDO::PARAM_INT);        
        $result->bindParam(':text', $text, PDO::PARAM_STR); 
        $result->bindParam(':status', $status, PDO::PARAM_STR); 
        
        return $result->execute();
     
    }
    /**
     * Возвращает текстое пояснение статуса для задачи :<br/>
     * <i>0 - Не выполнено, 1 - Выполнено</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
   public static function getStatusTask($status)
    {
        switch ($status) {
            case '0':
                return 'Не выполнено';
                break;
            case '1':
                return 'Выполнено';
                break;
        }
    }
    
    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/upload/images/';
        // Путь к изображению товара
        $pathToImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            self::cropImage($_SERVER['DOCUMENT_ROOT'] . "{$pathToImage}", $_SERVER['DOCUMENT_ROOT'] . "{$pathToImage}", 320, 240);
            return $pathToImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }
    
    public static function cropImage($aInitialImageFilePath, $aNewImageFilePath, $aNewImageWidth, $aNewImageHeight) {
        
    if (($aNewImageWidth < 0) || ($aNewImageHeight < 0)) {
        return false;
    }

    // Массив с поддерживаемыми типами изображений
    $lAllowedExtensions = array(1 => "gif", 2 => "jpeg", 3 => "png"); 
    
    // Получаем размеры и тип изображения в виде числа
    list($lInitialImageWidth, $lInitialImageHeight, $lImageExtensionId) = getimagesize($aInitialImageFilePath); 
    
    if (!array_key_exists($lImageExtensionId, $lAllowedExtensions)) {
        return false;
    }
    $lImageExtension = $lAllowedExtensions[$lImageExtensionId];
    
    // Получаем название функции, соответствующую типу, для создания изображения
    $func = 'imagecreatefrom' . $lImageExtension; 
    // Создаём дескриптор исходного изображения
    $lInitialImageDescriptor = $func($aInitialImageFilePath);

    // Определяем отображаемую область
    $lCroppedImageWidth = 0;
    $lCroppedImageHeight = 0;
    $lInitialImageCroppingX = 0;
    $lInitialImageCroppingY = 0;
    if ($aNewImageWidth / $aNewImageHeight > $lInitialImageWidth / $lInitialImageHeight) {
        $lCroppedImageWidth = floor($lInitialImageWidth);
        $lCroppedImageHeight = floor($lInitialImageWidth * $aNewImageHeight / $aNewImageWidth);
        $lInitialImageCroppingY = floor(($lInitialImageHeight - $lCroppedImageHeight) / 2);
    } else {
        $lCroppedImageWidth = floor($lInitialImageHeight * $aNewImageWidth / $aNewImageHeight);
        $lCroppedImageHeight = floor($lInitialImageHeight);
        $lInitialImageCroppingX = floor(($lInitialImageWidth - $lCroppedImageWidth) / 2);
    }
    
    // Создаём дескриптор для выходного изображения
    $lNewImageDescriptor = imagecreatetruecolor($aNewImageWidth, $aNewImageHeight);
    imagecopyresampled($lNewImageDescriptor, $lInitialImageDescriptor, 0, 0, $lInitialImageCroppingX, $lInitialImageCroppingY, $aNewImageWidth, $aNewImageHeight, $lCroppedImageWidth, $lCroppedImageHeight);
    $func = 'image' . $lImageExtension;
    
    // сохраняем полученное изображение в указанный файл
    return $func($lNewImageDescriptor, $aNewImageFilePath);
}
}
