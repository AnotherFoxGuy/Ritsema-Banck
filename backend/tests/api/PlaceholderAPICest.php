<?php

use Codeception\Util\HttpCode;

class PlaceholderAPICest
{    // tests
    public function testIndex(ApiTester $I)
    {
        $data = array(
            'x' => '10',
            'y' => '10'
        );
        $I->sendGET('/', $data);
        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"result":20}');
    }
    public function testErrorIndex(ApiTester $I)
    {
        $I->sendGET('/');
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST); // 400
    }
}
