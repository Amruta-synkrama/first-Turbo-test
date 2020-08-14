<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_users_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
    public function up() {

        /**
         * Users
         */
        $this->dbforge->add_field([
              'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
              'name'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
              'username'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
              'password' => [ 'type' => 'VARCHAR','constraint' => '255' ],
              'email' => [ 'type' => 'VARCHAR', 'constraint' => '255' ],
              'phone_number'=> ['type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
              'entity' => ['type' => 'VARCHAR', 'constraint' => '255' ],
              'created_at' => ['type' => 'datetime', 'null' => true],
              'security_question_1' => ['type' => 'VARCHAR', 'constraint' => '255' ],
              'answer_1' => ['type' => 'VARCHAR', 'constraint' => '255' ],
              'security_question_2' => ['type' => 'VARCHAR', 'constraint' => '255' ],
              'answer_2' => ['type' => 'VARCHAR', 'constraint' => '255' ]
        ]);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('tr_users');

        /**
         * Company
         */
        $this->dbforge->add_field([
              'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
              'user_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true],
              'website'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
              'logo'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
              'cover' => [ 'type' => 'VARCHAR','constraint' => '255' ],
              'email' => [ 'type' => 'VARCHAR', 'constraint' => '255' ],
              'contact_name' => ['type' => 'VARCHAR', 'constraint' => '255' ],
              'contact_no'=> ['type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
              'contact_email' => ['type' => 'VARCHAR', 'constraint' => '255' ],
              'headquater' => ['type' => 'VARCHAR', 'constraint' => '255' ],
              'updated_at' => ['type' => 'datetime', 'null' => true]
        ]);
        $this->dbforge->add_key('id', true);
        // $this->dbforge->add_foreign_key('user_id', 'tr_users', 'id', false, 'CASCADE');
        $this->dbforge->create_table('tr_company');

        /**
         * Hotels
         */
        $this->dbforge->add_field([
              'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
              'user_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true],
              'website'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
              'logo'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
              'cover' => [ 'type' => 'VARCHAR','constraint' => '255' ],
              'email' => [ 'type' => 'VARCHAR', 'constraint' => '255' ],
              'contact_name' => ['type' => 'VARCHAR', 'constraint' => '255' ],
              'contact_no'=> ['type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
              'contact_email' => ['type' => 'VARCHAR', 'constraint' => '255' ],
              'headquater' => ['type' => 'VARCHAR', 'constraint' => '255' ],
              'updated_at' => ['type' => 'datetime', 'null' => true]
        ]);
        $this->dbforge->add_key('id', true);
        // $this->dbforge->add_foreign_key('user_id', 'tr_users', 'id', false, 'CASCADE');
        $this->dbforge->create_table('tr_hotels');

        /**
         * Locations
         */
        $this->dbforge->add_field([
              'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
              'location'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ]
        ]);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('tr_locations');

        /**
         * Hotel Locations
         */
        $this->dbforge->add_field([
              'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
              'location_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
              'hotel_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, ]
        ]);
        $this->dbforge->add_key('id', true);
        // $this->dbforge->add_foreign_key('location_id', 'tr_locations', 'id', false, 'CASCADE');
        // $this->dbforge->add_foreign_key('hotel_id', 'tr_hotels', 'id', false, 'CASCADE');
        $this->dbforge->create_table('tr_hotel_locations');

        /**
         * Links
         */
        $this->dbforge->add_field([
              'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
              'hotel_location_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
              'company_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
              'url'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
              'expiration_date' => ['type' => 'datetime', 'null' => true]
        ]);
        $this->dbforge->add_key('id', true);
        // $this->dbforge->add_foreign_key('hotel_location_id', 'tr_hotel_locations', 'id', false, 'CASCADE');
        // $this->dbforge->add_foreign_key('company_id', 'tr_company', 'id', false, 'CASCADE');
        $this->dbforge->create_table('tr_links');

    }

    //--------------------------------------------------------------------

    public function down() {
        $this->dbforge->drop_foreign_key('tr_company', 'tr_company_user_id_foreign');
        $this->dbforge->drop_foreign_key('tr_hotels', 'tr_hotels_user_id_foreign');
        $this->dbforge->drop_foreign_key('tr_hotel_locations', 'tr_hotel_locations_location_id_foreign');
        $this->dbforge->drop_foreign_key('tr_hotel_locations', 'tr_hotel_locations_hotel_id_foreign');
        $this->dbforge->drop_foreign_key('tr_links', 'tr_links_hotel_location_id_foreign');
        $this->dbforge->drop_foreign_key('tr_links', 'tr_links_company_id_foreign');


        $this->dbforge->drop_table('tr_users', true);
        $this->dbforge->drop_table('tr_company', true);
        $this->dbforge->drop_table('tr_hotels', true);
        $this->dbforge->drop_table('tr_locations', true);
        $this->dbforge->drop_table('tr_hotel_locations', true);
        $this->dbforge->drop_table('tr_links', true);
        
    }
}

/* End of file '001_create_users_table' */
/* Location: ./C:\xampp\htdocs\ci3demo\application\migrations/001_create_users_table.php */
