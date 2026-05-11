<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration
{
    public function up()
    {
        $this->forge->addField([
           'id' => [
               'type'           => 'INT',
               'constraint'     => 11,
               'unsigned'       => true,
               'auto_increment' => true,
           ],

           'name' => [
               'type'       => 'VARCHAR',
               'constraint' => 100,
           ],

           'email' => [
               'type'       => 'VARCHAR',
               'constraint' => 100,
           ],

           'phone' => [
               'type'       => 'VARCHAR',
               'constraint' => 20,
           ],

           'address' => [
               'type' => 'TEXT',
           ],

           'photo' => [
               'type'       => 'VARCHAR',
               'constraint' => 255,
           ],

           'position' => [
               'type'       => 'VARCHAR',
               'constraint' => 100,
           ],

           'created_by' => [
               'type'       => 'INT',
               'constraint' => 11,
               'unsigned'   => true,
           ],

           'created_at' => [
               'type'    => 'TIMESTAMP',
               'null' => true,
           ],
           'updated_at' => [
               'type'    => 'TIMESTAMP',
               'null' => true,
           ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey(
            'created_by',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
