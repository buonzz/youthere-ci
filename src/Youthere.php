<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
*  A Library that will try to check if the file is present in another server via FTP.
*
*  @author Darwin Biler <buonzz@gmail.com>
*/
class Youthere {

	/**
	*  Checks if the file is present.
	*
	*  @param array $paths the paths of the files you want to check, 
	*  note that this is the path in the remote server, not in the local
	*  @param string $ftp_host the ftp hostname
	*  @param string $ftp_username the ftp username
	*  @param string $ftp_password the ftp password
	*
	*  @return array
	*/
    public function check_files_presence($paths = array(), $ftp_host, $ftp_username, $ftp_password)
    {
    	$server = $ftp_host;
		$port   =  21; 
		$user   = $ftp_username;
		$pwd    = $ftp_password;

		$conn = ftp_connect($server);
		$ret = ftp_login($conn, $user, $pwd);

		$output = array();

		foreach($paths as $file) {
		    $listing = ftp_nlist($conn, $file);
		    if(empty($listing)) {
		        $output[$file] =  FALSE;
		    } else {
		        $output[$file] =  TRUE;
		    }
		}

		return $output;
    }
}

/* End of file Youthere.php */