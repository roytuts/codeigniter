<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
*
* @author https://www.roytuts.com
*/
class Backup extends CI_Controller {

	/**
	* error messages
	*/
	private $error;

	/**
	* success messages
	*/
	private $success;

	/**
	* base path or root directory of the site i.e. <drive>:/<folder>/<folder>/ or /<folder>/<folder>/
	*/
	public $base_path = "";

	/**
	* folder names to backup that are in the same directory as the CI index.php
	* these can either be just 1 folder name "application" or a path like "application/controllers"
	* if this array is empty then entire site structure is backed up
	* public $directories = array("application", "forum", "assets/images", "assets/js", "assets/css", "system");
	*/
	private $directories = array();

	/**
	* containts a list of all the directories to ignore, leave empty to backup all
	*/
	private $ignore_directories = array('backups');

	/**
	* the directory name used for the temp file copy when everything is backed up
	*/
	private $copy_directory = "site_backup";

	/**
	* used to mark that the directory structure has alread been copied
	*/
	private $structure_copied = FALSE;

	/**
	* backup home url, i.e., http://www.example.com/backup
	* access backup home page where you can create site and database backup
	*/
	private $home_url = 'backup';

	/**
	* site backup download url, i.e., http://www.example.com/download_site_file
	* clicking on this url the site backup will be downloaded
	*/
	private $site_download_url = 'backup/download_site_file/';

	/**
	* site backup delete url, i.e., http://www.example.com/delete_site_file
	* clicking on this url the site backup will be deleted
	*/
	private $site_delete_url = 'backup/delete_site_file/';

	/**
	* db backup download url, i.e., http://www.example.com/download_db_file
	* clicking on this link the database backup will be downloaded
	*/
	private $db_download_url = 'backup/download_db_file/';

	/**
	* db backup delete url, i.e., http://www.example.com/delete_db_file
	* clicking on this url the database backup will be deleted
	*/
	private $db_delete_url = 'backup/delete_db_file/';

	/**
	* this referrer_url_key is used to store the referrer url
	* this referrer url will be used for backup operations like backup, download, delete
	* after backup operation is over then we want to redirect to referrer url
	*/
	private $back_url_key = 'referrer_url_key';
	private $back_url = 'backup';
	private $db_backup_path = 'backups/databases/';
	private $site_backup_path = 'backups/sites/';

	function __construct() {
		parent::__construct();
		$this->load->dbutil();
		$this->load->library('zip');
		$this->load->library('form_validation');
		$this->load->model('backup_model', 'backup');
		$this->back_url = $this->session->flashdata($this->back_url_key);
	}

	private function handle_error($err) {
		$this->error .= $err . "\r\n"; // "\r\n" means each error message will display in a new line
	}

	private function handle_success($succ) {
		$this->success .= $succ . "\r\n"; // "\r\n" means each error message will display in a new line
	}

	/**
	* display the main backup view page
	*/
	function index() {
		if ($this->input->post('backup')) {
			$this->form_validation->set_rules('backup_type', 'Backup Type', 'required');
			$this->form_validation->set_rules('file_type', 'File Type', 'required');
			
			if ($this->form_validation->run($this)) {
				$backup_type = $this->input->post('backup_type');
				$file_format = $this->input->post('file_type');
				
				if (trim($backup_type) == 1) {
					$this->get_db_backup($this->db_backup_path, $backup_type, $file_format);
				} else if (trim($backup_type) == 2) {
					$this->get_site_backup($this->site_backup_path, $backup_type, $file_format);
				}
			}
		}
		
		$data['errors'] = $this->error;
		$data['success'] = $this->success;
		$this->load->view('backup', $data);
	}

	/**
	*
	* db_backup
	*
	* this backs up database
	*
	* @access private
	*/
	private function get_db_backup($file_path, $backup_type, $file_format = 1) {
		$this->load->helper('string');
		$key_name1 = md5(date("d_m_Y_H_i_s")) . '_';
		$key_name2 = '_db';
		$key_name3 = date("d_m_Y_H_i_s");
		
		if ($file_format == 1) {
			//strong file name
			$file_name = $key_name1 . $key_name3 . $key_name2 . '.zip';
			$prefs = array(
				'ignore' => array($this->ignore_directories),
				'format' => 'zip', // gzip, zip, txt
				'filename' => $file_name, // File name - NEEDED ONLY WITH ZIP FILES
				'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
				'add_insert' => TRUE, // Whether to add INSERT data to backup file
				'newline' => "\n" // Newline character used in backup
			);
			
			//Backup your entire database and assign it to a variable
			$backup = & $this->dbutil->backup($prefs);
			$file = $file_path . $file_name;
		
			if (strlen($backup)) {
				if (!write_file($file, $backup)) {
					$this->handle_error('Error while writing db backup to disk: ' . $file_name);
				} else {
					$this->handle_success('File Name: ' . $file_name . '. ');
					$this->handle_success('DB backup successfully written to disk. ');
					$date_arr = explode('_', $key_name3);
					$date = $date_arr[0] . '-' . $date_arr[1] . '-' . $date_arr[2] . ' ' . $date_arr[3] . ':' . $date_arr[4] . ':' . $date_arr[5];
					$saved_data = $this->backup->save_backup_details($file_name, $file_path);
					
					if ($saved_data !== NULL) {
						$this->handle_success('DB Backup details successfully saved to database. ');
						$this->handle_success('You can download db backup here ' . anchor($this->db_download_url . $saved_data, 'download', array('class' => 'download')));
						$this->handle_success('You can delete db backup here ' . anchor($this->db_delete_url . $saved_data, 'delete', array('class' => 'delete', 'onclick' => "return confirm('Are you sure want to delete this file ?')")));
					} else {
						if (file_exists($file)) {
							unlink($file);
						}
						$this->handle_error('Error while saving db backup to database: ' . $file_name);
					}
				}
			} else {
				$this->handle_error('Error while getting db backup: ' . $file_name);
			}
		} else if ($file_format == 2) {
			$file_name = $key_name1 . $key_name3 . $key_name2 . '.sql.gz';
			$prefs = array(
				'ignore' => array($this->ignore_directories),
				'format' => 'gzip', // gzip, zip, txt
				'filename' => $file_name, // File name - NEEDED ONLY WITH ZIP FILES
				'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
				'add_insert' => TRUE, // Whether to add INSERT data to backup file
				'newline' => "\n" // Newline character used in backup file
			);
			//Backup your entire database and assign it to a variable
			$backup = & $this->dbutil->backup($prefs);
			$file = $file_path . $file_name;
			
			if (strlen($backup)) {
				if (!write_file($file, $backup)) {
					$this->handle_error('Error while writing db backup to disk: ' . $file_name);
				} else {
					$this->handle_success('File Name: ' . $file_name . '. ');
					$this->handle_success('DB backup successfully written to disk. ');
					$date_arr = explode('_', $key_name3);
					$date = $date_arr[0] . '-' . $date_arr[1] . '-' . $date_arr[2] . ' ' . $date_arr[3] . ':' . $date_arr[4] . ':' . $date_arr[5];
					$saved_data = $this->backup->save_backup_details($file_name, $file_path);
					
					if ($saved_data !== NULL) {
						$this->handle_success('DB Backup details successfully saved to database. ');
						$this->handle_success('You can download db backup here ' . anchor($this->db_download_url . $saved_data, 'download', array('class' => 'download')));
						$this->handle_success('You can delete db backup here ' . anchor($this->db_delete_url . $saved_data, 'delete', array('class' => 'delete', 'onclick' => "return confirm('Are you sure want to delete this file ?')")));
					} else {
						if (file_exists($file)) {
							unlink($file);
						}
						$this->handle_error('Error while saving db backup to database: ' . $file_name);
					}
				}
			} else {
				$this->handle_error('Error while getting db backup: ' . $file_name);
			}
		}
	}

	/**
	*
	* delete db file
	*
	* delete backup of database
	*
	* @access public
	*/
	function delete_db_file($file_id) {
		$this->session->keep_flashdata($this->back_url_key);
		
		if (strlen(trim($this->back_url)) <= 0 || $this->back_url == NULL) {
			$this->back_url = $this->home_url;
		}
		
		$file_data = $this->backup->delete_db_file($file_id);
		
		if ($file_data !== NULL) {
			$file = $file_data->backup_location . $file_data->backup_name;
			
			if (file_exists($file)) {
				unlink($file);
			}
		}
		
		redirect($this->back_url);
	}

	/*
	*
	* delete db file
	*
	* delete backup of the entire site
	*
	* @access public
	*/

	function download_db_file($file_id) {
		$this->session->keep_flashdata($this->back_url_key);
		
		if (strlen(trim($this->back_url)) <= 0 || $this->back_url == NULL) {
			$this->back_url = $this->home_url;
		}
		
		$file_data = $this->backup->check_db_file($file_id);
		
		if ($file_data !== NULL) {
			$this->load->helper('download');
			$file_path = $this->db_backup_path . $file_data->backup_name;
			$data = file_get_contents($file_path); // Read the file's contents
			$filename = basename($file_path);
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$name = md5(date('d-m-Y H:i:s')) . date('_d-m-Y_H:i:s') . '.' . $ext;
			force_download($name, $data);
		}
		
		redirect($this->back_url);
	}

	/**
	*
	* delete_site_file
	*
	* delete backup of the database
	*
	* @access public
	*/
	function delete_site_file($file_id) {
		$this->session->keep_flashdata($this->back_url_key);
		
		if (strlen(trim($this->back_url)) <= 0 || $this->back_url == NULL) {
			$this->back_url = $this->home_url;
		}
		
		$file_data = $this->backup->delete_site_file($file_id);
		
		if ($file_data !== NULL) {
			$file = $file_data->backup_location . $file_data->backup_name;
			
			if (file_exists($file)) {
				unlink($file);
			}
		}
		
		redirect($this->back_url);
	}

	/*
	*
	* download_site_file
	*
	* download the file after successful backup of the entire site
	*
	* @access public
	*/

	function download_site_file($file_id) {
		$this->session->keep_flashdata($this->back_url_key);
		
		if (strlen(trim($this->back_url)) <= 0 || $this->back_url == NULL) {
			$this->back_url = $this->home_url;
		}
		
		$file_data = $this->backup->check_site_file($file_id);
		
		if ($file_data !== NULL) {
			$this->load->helper('download');
			$file_path = $file_data->backup_location . $file_data->backup_name;
			$data = file_get_contents($file_path); // Read the file's contents
			$filename = basename($file_path);
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$name = md5(date('d-m-Y H:i:s')) . date('_d-m-Y_H:i:s') . '.' . $ext;
			force_download($name, $data);
		}
		
		redirect($this->back_url);
	}

	/**
	*
	* site_backup
	*
	* this backs up all the files located in the directories
	* specified.
	*
	* @access private
	*/
	private function get_site_backup($file_path, $backup_type, $file_format = 1) {
		$this->zip->clear_data();
		$this->check_directory($file_path);
		$this->check_directory($this->copy_directory);
		//loop each of the folder that will be backed up
		if (count($this->directories) > 0) {
			foreach ($this->directories as $dir) {
				if (!in_array($dir, $this->ignore_directories)) {
					$location = $this->base_path . $dir . "/";
					$this->zip->read_dir($location, FALSE);
				}
			}
		} else {	
			//takes a copy of the code to ensure that the backup of backups is not made.
			$copied = FALSE;
			if ($this->structure_copied === FALSE) {
				$path = str_replace('\\', '/', realpath($this->base_path));
				$copied = $this->copy_site_files($path, $this->base_path . $this->copy_directory . "/");
			}
			if (($copied === TRUE) || ($this->structure_copied === TRUE)) {
				$this->zip->read_dir($this->base_path . $this->copy_directory . "/", FALSE);
			}
		}
		flush();
		$key_name = date("d_m_Y_H_i_s");
		if ($file_format == 1) {
			$file_name = md5($key_name) . '_site.zip';
			$zipped = $this->zip->archive($file_path . $file_name);
			$this->zip->clear_data();
			
			if ($this->structure_copied === TRUE) { //we need to remove the copied files to ensure that the server is kept nice and tidy
				$this->remove_temp_files($this->base_path . $this->copy_directory . "/");
			}
			
			if ($zipped == 1) {
				$this->handle_success('File Name: ' . $file_name . '. ');
				$this->handle_success('Site backup successfully written to disk. ');
				$date_arr = explode('_', $key_name);
				$date = $date_arr[0] . '-' . $date_arr[1] . '-' . $date_arr[2] . ' ' . $date_arr[3] . ':' . $date_arr[4] . ':' . $date_arr[5];
				$file = $file_path . $file_name;
				$saved_data = $this->backup->save_backup_details($file_name, $file_path, $backup_type);
				
				if ($saved_data !== NULL) {
					$this->handle_success('Site Backup details successfully saved to database. ');
					$this->handle_success('You can get site backup here ' . anchor($this->site_download_url . $saved_data, 'download', array('class' => 'download')));
					$this->handle_success('You can delete site backup here ' . anchor($this->site_delete_url . $saved_data, 'delete', array('class' => 'delete', 'onclick' => "return confirm('Are you sure want to delete this file ?')")));
				} else {
					if (file_exists($file)) {
						unlink($file);
					}
					$this->handle_success('Error while saving site backup to database: ' . $file_name);
				}
			} else {
				$this->handle_error('Error while writing site backup to disk: ' . $file_name);
			}
		} else if ($file_format == 2) {
			$file_name = md5($key_name) . '_site.tar.gz';
			$zipped = $this->zip->archive($file_path . $file_name);
			$this->zip->clear_data();
			
			if ($this->structure_copied === TRUE) { //we need to remove the copied files to ensure that the server is kept nice and tidy
				$this->remove_temp_files($this->base_path . $this->copy_directory . "/");
			}
			
			if ($zipped == 1) {
				$this->handle_success('File Name: ' . $file_name . '. ');
				$this->handle_success('Site backup successfully written to disk. ');
				$date_arr = explode('_', $key_name);
				$date = $date_arr[0] . '-' . $date_arr[1] . '-' . $date_arr[2] . ' ' . $date_arr[3] . ':' . $date_arr[4] . ':' . $date_arr[5];
				$file = $file_path . $file_name;
				$saved_data = $this->backup->save_backup_details($file_name, $file_path, $backup_type);
				
				if ($saved_data !== NULL) {
					$this->handle_success('Site Backup details successfully saved to database. ');
					$this->handle_success('You can get site backup here ' . anchor($this->site_download_url . $saved_data, 'download', array('class' => 'download')));
					$this->handle_success('You can delete site backup here ' . anchor($this->site_delete_url . $saved_data, 'delete', array('class' => 'delete', 'onclick' => "return confirm('Are you sure want to delete this file ?')")));
				} else {
					if (file_exists($file)) {
						unlink($file);
					}
					$this->handle_success('Error while saving site backup to database: ' . $file_name);
				}
			} else {
				$this->handle_error('Error while writing site backup to disk: ' . $file_name);
			}
		}
	}

	/**
	*
	* copy_site_files
	*
	* this copies all the files located in the site
	* specified.
	*
	* @access private
	*/
	private function copy_site_files($path, $dest) {
		if (is_dir($path)) {
			@mkdir($dest);
			$objects = scandir($path);
			if (sizeof($objects) > 0) {
				foreach ($objects as $file) {
					if ($file == "." || $file == "..") {
					continue;
					}
					// go on
					if (is_dir($path . "/" . $file)) {
						if ((!in_array($file, $this->ignore_directories)) && ($file != $this->copy_directory)) {
							$this->copy_site_files($path . "/" . $file, $dest . "/" . $file);
						}
					} else {
						copy($path . "/" . $file, $dest . "/" . $file);
					}
				}
			}
			$this->structure_copied = TRUE;
			return TRUE;
		} elseif (is_file($path)) {
			$this->structure_copied = TRUE;
			return copy($path, $dest);
		} else {
			$this->structure_copied = TRUE;
			return FALSE;
		}
	}

	/*
	*
	* remove_temp_files
	*
	* this removes all the files and directories located in the directory
	*
	* WRITTEN BY: O S 18-Jun-2010 10:30 from the PHP manual rmdir comments
	*
	* WANRING: if you run this on you base_path then all the files in the site will be deleted
	*
	* @access private
	*/

	private function remove_temp_files($directory) {
		if (substr($directory, -1) == "/") {
			$directory = substr($directory, 0, -1);
		}
		if (!file_exists($directory) || !is_dir($directory)) {
			return FALSE;
		} elseif (!is_readable($directory)) {
			return FALSE;
		} else {
			$directoryHandle = opendir($directory);
			
			while ($contents = readdir($directoryHandle)) {
				if ($contents != '.' && $contents != '..') {
					$path = $directory . "/" . $contents;
					if (is_dir($path)) {
						$this->remove_temp_files($path);
					} else {
						unlink($path);
					}
				}
			}
			closedir($directoryHandle);
			if (!rmdir($directory)) {
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}

	/*
	*
	* check_directory
	*
	* checks the directory to make sure it exists before we attempt to create the file
	*
	* @params string
	* @access private
	*/

	private function check_directory($path) {
		if (!@opendir($path)) {
			mkdir($path, 0755);
		} //if(!@opendir($path))
		return;
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/Backup.php */