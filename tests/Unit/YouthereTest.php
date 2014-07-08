<?php 

/**
*  Corresponding Class to test Youthere class.
*
*  @author Darwin Biler <buonzz@gmail.com>
*/
class YouthereTest extends PHPUnit_Framework_TestCase{

  protected $ftp_host;
  protected $ftp_username;
  protected $ftp_password;
  
  public function setUp()
  {
     if (!defined('BASEPATH'))
       define('BASEPATH', '/');

  	 $this->ftp_host = 'ftp.us.debian.org';
  	 $this->ftp_username = 'anonymous';
  	 $this->ftp_password = 'foo@bar.xxx';
  }
  
  public function testIsThereAnySyntaxError(){
  	$var = new Youthere;
  	$this->assertTrue(is_object($var));
  	unset($var);
  }

  public function testIfCancheckfiles(){
    $obj = new Youthere;
    
    $paths_to_check = array('debian/README.html','NOT_FOUND.html');
    $result = $obj->check_files_presence(
          $paths_to_check,
          $this->ftp_host,
          $this->ftp_username,
          $this->ftp_password
        );   

    $this->assertTrue($result['debian/README.html']);
    $this->assertFalse($result['NOT_FOUND.html']);

    unset($var);
  }

  
}