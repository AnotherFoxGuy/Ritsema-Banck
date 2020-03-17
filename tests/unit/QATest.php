<?php

use Codeception\Test\Unit;
use RitsemaBanck\models\QA;
use RitsemaBanck\QA_Manager;

require __DIR__ . '/../../vendor/autoload.php';

class QATest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected QA_Manager $man;

    // tests
    public function test001SaveQA()
    {
        $man = new QA_Manager();
        $qa = new QA();
        $qa->Question = "Waarvan is kaas gemaakt?";
        $qa->Answer = "Van melk";
        $man->SaveQA($qa);

        $this->tester->seeInDatabase('QA', ['question' => 'Waarvan is kaas gemaakt?', 'answer' => 'Van melk']);
    }

    public function test002GetAllQA()
    {
        $man = new QA_Manager();
        $qa = new QA();
        $qa->Question = "Waarvan is kaas gemaakt?";
        $qa->Answer = "Van melk";
        $man->SaveQA($qa);

        sleep(1);

        $list = $man->GetListFromDB();

        $found = 0;
        foreach ($list as $item) {
            if ($item[2] === 'Van melk')
                $found++;
        }

        $this->assertGreaterThan(0, $found, "QA Not found in DB!!!");
    }

    public function test003DeleteQA()
    {
        $man = new QA_Manager();
        $list = $man->GetListFromDB();
        foreach ($list as $i) {
            $man->DeleteByID($i[0]);
        }

        $this->tester->dontSeeInDatabase('QA', ['question' => 'Waarvan is kaas gemaakt?', 'answer' => 'Van melk']);
    }

}
