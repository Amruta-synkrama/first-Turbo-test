<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Phase_3_tables extends CI_Migration
{
    public function __construct() {
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up() {
	    /**
         * Company Employees
         */
        $this->dbforge->add_field([
          'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
          'user_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
          'company_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
          'emp_id' => [ 'type' => 'VARCHAR', 'constraint' => '255' ],
          'email'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
          'location'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
          'updated_at' => ['type' => 'datetime', 'null' => true]
        ]);
        $this->dbforge->add_key('ID', true);
        $this->dbforge->create_table('tr_company_emp');

        /**
         * Hotel Employees
         */
        $this->dbforge->add_field([
          'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
          'user_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
          'hotel_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
          'emp_id' => [ 'type' => 'VARCHAR', 'constraint' => '255' ],
          'email'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
          'location'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
          'updated_at' => ['type' => 'datetime', 'null' => true]
        ]);
        $this->dbforge->add_key('ID', true);
        $this->dbforge->create_table('tr_hotels_emp');

        /**
         * OTP Data
         */
        $this->dbforge->add_field([
          'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
          'user_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
          'otp' => [ 'type' => 'INT', 'constraint' => 5, 'unsigned' => true ],
          'ip_addr' => [ 'type' => 'VARCHAR', 'constraint' => '255' ],
          'expiry_date' => ['type' => 'datetime', 'null' => true]
        ]);
        $this->dbforge->add_key('ID', true);
        $this->dbforge->create_table('tr_otp_data');


        
    }
    
	public function down() {
	    $this->dbforge->drop_table('tr_company_emp', TRUE);
        $this->dbforge->drop_table('tr_hotels_emp', TRUE);
        $this->dbforge->drop_table('tr_otp_data', TRUE);
    }
}
/* End of file '003_phase_3_tables' */
/* Location: ./C:\xampp\htdocs\first-Turbo-test\application\migrations/003_phase_3_tables.php */
