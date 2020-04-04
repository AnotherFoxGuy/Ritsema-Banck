<?php


namespace RitsemaBanck;

class Hypotheek
{
    public $application_date = "02-02-2020";
    public $message = "testing";
    public $edit;

    //validations for Hypotheek

    public function getApplication_date()
    {
        return $this->application_date;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getEdit()
    {
        return $this->edit;
    }
}
