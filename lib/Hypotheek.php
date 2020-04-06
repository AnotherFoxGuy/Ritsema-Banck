<?php


namespace RitsemaBanck;

class Hypotheek
{
    public $application_date = "02-02-2020";
    public $message = "testing";
    public $edit;
    public $date = "02-08-2019";
    public $status = "goedgekeurd";

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

    public function GetDate()
    {
        return $this->date;
    }

    public function GetStatus()
    {
        return $this->status;
    }
}
