<?php


namespace RitsemaBanck\models;


class QA
{
    public string $Question;
    public string $Answer;

    /**
     * QA constructor.
     * @param string $Question
     * @param string $Answer
     */
    public function __construct(string $Question, string $Answer)
    {
        $this->Question = $Question;
        $this->Answer = $Answer;
    }

}
