<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry_data_csv_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	/**
     * Download csv file
     * @param  String $filename
     * @return file
     */
	public function download_send_headers( $filename ) {
	        // disable caching
		$now = gmdate("D, d M Y H:i:s");
		header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
		header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
		header("Last-Modified: {$now} GMT");

	        // force download
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");

	        // disposition / encoding on response body
		header("Content-Disposition: attachment;filename={$filename}");
		header("Content-Transfer-Encoding: binary");

	}


    /**
     * Convert array to csv format
     * @param  array  &$array
     * @return file csv format
     */
    public function array2csv(array &$array, $df){

    	if (count($array) == 0) {
    		return null;
    	}

    	$array_keys = array_keys($array);
    	$heading    = array();
    	$unwanted   = array('cfdb7_file', 'cfdb7_', 'your-');

    	foreach ( $array_keys as $aKeys ) {
    		if( $aKeys == 'form_date' ) $aKeys = 'Date';
    		if( $aKeys == 'id' ) $aKeys = 'Id';
    		$tmp       = str_replace( $unwanted, '', $aKeys );
    		$tmp       = str_replace( array('-','_'), ' ', $tmp );
    		$heading[] = ucwords( $tmp );
    	}

    	fputs( $df, ( chr(0xEF) . chr(0xBB) . chr(0xBF) ) ); 
    	fputcsv( $df, $heading );

    	foreach ( $array['id'] as $line => $id ) {
    		$line_values = array();
    		foreach($array_keys as $array_key ) {
    			$val = isset( $array[ $array_key ][ $line ] ) ? $array[ $array_key ][ $line ] : '';
    			$line_values[ $array_key ] = $val;
    		}
    		fputcsv($df, $line_values);
    	}
    }


    /**
     * Download file
     * @return csv file
     */
    public function download_csv_file($fid){

    	$table_name  = 'tr_enquiry_data';
    	$this->db->select('id, form_data, form_date' );
    	$this->db->where('form_id', $fid);
    	$this->db->order_by('id', 'DESC');
    	$query = $this->db->get("tr_enquiry_data");

    	$heading_row = $query->result();

    	$heading_row    = reset( $heading_row );
    	$heading_row    = unserialize( $heading_row->form_data );
    	$heading_key    = array_keys( $heading_row );
    	$rm_underscore = true;


    	$this->db->select('count(*) AS count' );
    	$this->db->where('form_id', $fid);
    	$query = $this->db->get("tr_enquiry_data");
    	$total_rows  = $query->result()[0]->count;
    	$per_query    = 1000;
    	$total_query  = ( $total_rows / $per_query );
    	$total_query  = $total_rows;

    	$this->download_send_headers( "cfdb7-" . date("Y-m-d") . ".csv" );
    	$df = fopen("php://output", 'w');
    	ob_start();

    	// for( $p = 0; $p <= $total_query; $p++ ){

    		$this->db->select('id, form_data, form_date' );
    		$this->db->where('form_id', $fid);
    		$this->db->order_by('id', 'DESC');
    		$query = $this->db->get("tr_enquiry_data");

    		$results = $query->result();

    		$data  = array();
    		$i     = 0;
    		foreach ($results as $result) :

    			$i++;
    			$data['id'][$i]    = $result->id;
    			$data['form_date'][$i]  = $result->form_date;
    			$resultTmp              = unserialize( $result->form_data );
    			$upload_dir             = '';
    			$cfdb7_dir_url          = '/cfdb7_uploads';

    			foreach ($resultTmp as $key => $value):
    				$matches = array();

    				if ( ! in_array( $key, $heading_key ) ) continue;
    				if( $rm_underscore ) preg_match('/^_.*$/m', $key, $matches);
    				if( ! empty($matches[0]) ) continue;

    				if (strpos($key, 'cfdb7_file') !== false ){
    					$data[$key][$i] = empty( $value ) ? '' : $cfdb7_dir_url.'/'.$value;
    					continue;
    				}
    				if ( is_array($value) ){

    					$data[$key][$i] = implode(', ', $value);
    					continue;
    				}

    				$data[$key][$i] = str_replace( array('&quot;','&#039;','&#047;','&#092;')
    					, array('"',"'",'/','\\'), $value );

    			endforeach;

    		endforeach;

    		echo $this->array2csv( $data, $df );

    	// }
    	echo ob_get_clean();
    	fclose( $df );
    	die();
    }		

}
/* End of file '/Enquiry_data.php' */
/* Location: ./application/models//Enquiry_data.php */