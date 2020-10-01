<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Phase_2_tables extends CI_Migration
{
    public function __construct() {
       parent::__construct();
       $this->load->dbforge();
    }

   public function up() {
        /**
         * User Meta
         */
        $this->dbforge->add_field([
          'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
          'user_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
          'meta_key'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
          'meta_value'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ]
        ]);
        $this->dbforge->add_key('ID', true);
        $this->dbforge->create_table('tr_user_meta');
    }
    
    public function down() {
       $this->dbforge->drop_table('tr_user_meta', true);
    }
}
/* End of file '002_phase_2_tables' */
/* Location: ./C:\xampp\htdocs\first-Turbo-test\application\migrations/002_phase_2_tables.php */
