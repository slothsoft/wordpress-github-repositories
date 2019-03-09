<?php
namespace test;

use PHPUnit\Framework\TestCase;
use slothsoft\RepositoryList;
use DeepCopy\Filter\ReplaceFilter;

class RepositoryListTest extends TestCase {

    private $repositoryList;

    protected function setUp() {
        parent::setUp();
        
        if (! defined('ABSPATH'))
            define('ABSPATH', "lol");
        include_once ("../slothsoft/RepositoryList.php");

        $this->repositoryList = new RepositoryList();
    }

    protected function tearDown() {
        $this->repositoryList = null;
        parent::tearDown();
    }

    public function testSimple_OneRepository() {
        $repositories = json_decode('[{"name" : "My Name", "html_url" : "slothsoft.de", "description" : "A nice description"}]');
        $result = $this->repositoryList->printRepositories($repositories);
        
        $this->assertEquals('<ul><li><a href="slothsoft.de"><b>My Name</b></a> - A nice description</li></ul>', $result);
    }
    
    public function testSimple_ManyRepositories() {
        $repositories = json_decode('[{"name" : "1", "html_url" : "A", "description" : "I"},{"name" : "2", "html_url" : "B", "description" : "II"},{"name" : "3", "html_url" : "C", "description" : "III"}]');
        $result = $this->repositoryList->printRepositories($repositories);
        
        $this->assertEquals('<ul><li><a href="A"><b>1</b></a> - I</li><li><a href="B"><b>2</b></a> - II</li><li><a href="C"><b>3</b></a> - III</li></ul>', $result);
    }
}

