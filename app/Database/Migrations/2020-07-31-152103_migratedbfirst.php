<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migratedbfirst extends Migration {

	public function up() {
		$this->db->disableForeignKeyChecks();
		$this->db->enableForeignKeyChecks();

		/**
		 * Users
		 */
		$this->forge->addField([
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
		$this->forge->addKey('id', true);
		$this->forge->createTable('tr_users');

		/**
		 * Company
		 */
		$this->forge->addField([
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
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('user_id', 'tr_users', 'id', false, 'CASCADE');
		$this->forge->createTable('tr_company');

		/**
		 * Hotels
		 */
		$this->forge->addField([
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
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('user_id', 'tr_users', 'id', false, 'CASCADE');
		$this->forge->createTable('tr_hotels');

		/**
		 * Locations
		 */
		$this->forge->addField([
			'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
			'location'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tr_locations');

		/**
		 * Hotel Locations
		 */
		$this->forge->addField([
			'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
			'location_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
			'hotel_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, ]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('location_id', 'tr_locations', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('hotel_id', 'tr_hotels', 'id', false, 'CASCADE');
		$this->forge->createTable('tr_hotel_locations');

		/**
		 * Links
		 */
		$this->forge->addField([
			'id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
			'hotel_location_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
			'company_id' => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
			'url'=> [ 'type' => 'VARCHAR', 'constraint' => '255' ],
			'expiration_date' => ['type' => 'datetime', 'null' => true]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('hotel_location_id', 'tr_hotel_locations', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('company_id', 'tr_company', 'id', false, 'CASCADE');
		$this->forge->createTable('tr_links');

		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down() {
		$this->forge->dropForeignKey('tr_company', 'tr_company_user_id_foreign');
		$this->forge->dropForeignKey('tr_hotels', 'tr_hotels_user_id_foreign');
		$this->forge->dropForeignKey('tr_hotel_locations', 'tr_hotel_locations_location_id_foreign');
		$this->forge->dropForeignKey('tr_hotel_locations', 'tr_hotel_locations_hotel_id_foreign');
		$this->forge->dropForeignKey('tr_links', 'tr_links_hotel_location_id_foreign');
		$this->forge->dropForeignKey('tr_links', 'tr_links_company_id_foreign');


		$this->forge->dropTable('tr_users', true);
		$this->forge->dropTable('tr_company', true);
		$this->forge->dropTable('tr_hotels', true);
		$this->forge->dropTable('tr_locations', true);
		$this->forge->dropTable('tr_hotel_locations', true);
		$this->forge->dropTable('tr_links', true);
		
	}
}
