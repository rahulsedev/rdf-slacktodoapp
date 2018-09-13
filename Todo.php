<?php
class Todo implements TodoInterface {
    
    private $dbh = null;

    public function __construct() {
        try {
            $this->dbh = new PDO(DATABASE['DSN'], DATABASE['USER'], DATABASE['PASS']);
        } catch (PDOException $e) {
            $this->throwResponse('Connection failed: ' . $e->getMessage());
        }
    }

    public function addtodo(array $rqData) {
        $message = MESSAGES['TODO_ADDED_ERR'];
        if (!empty($rqData['text'])) {
            $isAdded = $this->saveTodo($rqData);
            if ($isAdded > 0) 
            $message = MESSAGES['TODO_ADDED'] . ' for: ' . $rqData['text'];
        }
        $this->throwResponse($message);
    }

    public function marktodo(array $rqData) {
        $message = MESSAGES['TODO_NOT_FOUND'];
        if (!empty($rqData['text'])) {
            $todoId = $todoMrkdDone = 0;            
            $todoId = $this->getTodoId($rqData['text']);
            if ($todoId > 0) {
                $todoMrkdDone = $this->saveMarkTodo($todoId);
                if ($todoMrkdDone > 0) {
                    $message = MESSAGES['TODO_MARKED_DONE'] . ' for: ' . $rqData['text'];
                } else {
                    $message = MESSAGES['TODO_MARKED_ERR'];
                }
            } else {
                $message = MESSAGES['TODO_NOT_FOUND'];
            }
        }
        $this->throwResponse($message);
    }
    
    public function listtodos(array $rqData) {
        $message = MESSAGES['NO_TODO_EXISTS'];
        if (!empty($rqData['channel_id'])) {
            $cId = $rqData['channel_id'];
            $stmt = $this->dbh->prepare("SELECT txt FROM todos WHERE channel_id='{$cId}' AND status='NEW'"); 
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $lineBrk = ', ';
            if (!empty($rows)) {
                $messageArr = [];
                $message = MESSAGES['TODO_LIST'];
                array_walk($rows, function ($val) use(&$messageArr, $lineBrk) {
                    if (!empty($val['txt'])) {
                        $messageArr[] = $val['txt'];
                    }
                });
                $message .= implode($lineBrk, $messageArr);
            }
        }
        $this->throwResponse($message);
    }

    private function getTodoId(string $todo) : int {
        $redordId = 0;
        $stmt = $this->dbh->prepare("SELECT id FROM todos WHERE txt='{$todo}' AND status='NEW' LIMIT 1"); 
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($row['id']) && $row['id'] > 0) {
            $recordId = $row['id'];
        }
        return $recordId;
    }

    private function saveMarkTodo(int $todoId) : int {
        if ($todoId > 0) {
            $statement = $this->dbh->prepare("UPDATE `todos` SET `status` = 'DONE' WHERE `todos`.`id` = $todoId");
            $saveStatus = $statement->execute();
            return $saveStatus === true ? 1 : 0;    
        }
        return 0;
    }

    private function saveTodo(array $data) : int {
        $saveDt = [
            'txt' => $data['text'],
            'team_id' => $data['team_id'],
            'channel_id' => $data['channel_id'],
            'user_id' => $data['user_id']
        ];
        $statement = $this->dbh->prepare("INSERT INTO todos(`txt`, `team_id`, `channel_id`, `user_id`) VALUES(:txt, :team_id, :channel_id, :user_id)");
        $saveStatus = $statement->execute($saveDt);
        return $saveStatus === true ? 1 : 0;
    }

    private function throwResponse($data) {
        if (is_array($data)) {
            echo json_encode($data, true);
        } else {
            echo $data;
        }
        exit;
    }

    public function logging(string $message) {
        $fileName = "response.log";
        $file = fopen($fileName, "a+");
        fwrite($file, $message);
        fclose($file);
    }

}