<?php
interface TodoInterface {
    
    public function addtodo(array $data);

    public function marktodo(array $data);
    
    public function listtodos(array $data);
}