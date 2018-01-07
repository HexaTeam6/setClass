<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackupDatabase extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
    }

    public function backup()
    {
        $this->load->dbutil();
        $db_format = array(
            'format' => 'zip',
            'filename' => 'penguruskelas_backup.sql'
        );
        $backup =& $this->dbutil->backup($db_format);
        $dbname = 'backup-on-'.date('Y-m-d').'.zip';
        $save = 'assets/db_backup/'.$dbname;
        write_file($save, $backup);
        force_download($dbname, $backup);
    }
}