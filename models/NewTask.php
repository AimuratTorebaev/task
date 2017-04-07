<?php

/**
 * Класс NewTask - модель создания задачи
 */
class NewTask {
    
    /**
     * Добавляет новую запись
     * @param string $name <p>Название</p>
     * @param string $email <p>Email</p>
     * @param string $text <p>Текст записи</p>
     */
    public static function addTask($name, $email, $text)
    {
        $db = Db::getConnection();
        
        $sql = 'INSERT INTO task_table (name, email, text) VALUES (:name, :email, :text)';
                
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
       
        
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }
}
