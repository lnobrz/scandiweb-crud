<?php
class Response
{
    private $_success;
    private $_httpStatusCode;
    private $_messages = array();
    private $_data;
    private $_toCache = false;
    private $_responseData = array();

    public function addMessage($message): void
    {
        $this->_messages[] = $message;
    }

    public function send(): void
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

        if (count($this->_data) > 0) {
            echo json_encode($this->_data, true);
        } else {
            echo $this->_responseData['messages'][0];
        }
    }

    public function __construct(bool $success, int $httpStatusCode, string $message, bool $toCache, array $data)
    {

        $this->_success = $success;
        $this->_httpStatusCode = $httpStatusCode;
        $this->_messages[] = $message;
        $this->_toCache = $toCache;
        $this->_data = $data;
    }
}
