<?php

use COREPOS\pos\lib\FormLib;

class Test extends PHPUnit_Framework_TestCase
{
    public function testPlugin()
    {
        $obj = new PhoneLookup();
    }

    public function testSearch()
    {
        $s = new ByPhoneMemberLookup();
        $res = array('CardNo'=>1, 'personNum'=>1, 'LastName'=>'Foo', 'FirstName'=>'Bar', 'phone'=>'8675309');
        $expect = array('results'=> array('1::1'=>'Foo, Bar (8675309)'));
        SQLManager::addResult($res);
        $this->assertEquals($expect, $s->lookup_by_number(1));
        SQLManager::clear();
        $this->assertEquals(false, $s->handle_text());
    }
}

