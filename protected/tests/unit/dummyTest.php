<?php
class DummyTest extends CTestCase{
	
	public function testTrue(){
		$var=true;
		$this->assertTrue($var);
	}

    public function testIncomplete(){
        $this->markTestIncomplete('This shit is not implemented Yet!');
    }
}	
