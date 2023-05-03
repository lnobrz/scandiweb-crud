<?php
class Response
{
    private $_success;
    private $_httpStatusCode;
    private $_messages = array();
    private $_data;
    private $_toCache = false;
    private $_responseData = array();

    public function addMessage($message)
    {
        $this->_messages[] = $message;
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    public function send()
    {
        header("Content-type: application/json;charset=utf-8");

        if ($this->_toCache == true) {
            header("Cache-control: max-age=60");
        } else {
            header("Cache-control: no-cache, no store");
        }

        if (($this->_success !== false && $this->_success !== true) || (!is_numeric($this->_httpStatusCode))) {
            http_response_code(500);
            $this->_responseData['statusCode'] = 500;
            $this->_responseData['success'] = false;
            $this->addMessage("Response creation error");
            $this->_responseData['messages'] = $this->_messages;
        } else {
            http_response_code($this->_httpStatusCode);
            $this->_responseData['statusCode'] = $this->_httpStatusCode;
            $this->_responseData['success'] = $this->_success;
            $this->_responseData['messages'] = $this->_messages;
            $this->_responseData['data'] = $this->_data;
        }

        if ($this->_data){
            echo json_decode($this->_data);
        } else {
            echo $this->_responseData['messages'][0];
        }
       
    }

    public function __construct($success, $httpStatusCode, $message, $toCache)
    {
        $this->_success = $success;
        $this->_httpStatusCode = $httpStatusCode;
        $this->_messages[] = $message;
        $this->_toCache = $toCache;
    }
}