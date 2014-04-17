<?php

use Phinx\Migration\AbstractMigration;

class CreateThemesTable extends AbstractMigration
{
    /**
     * Change Method.
     */
    public function change()
    {
        $table = $this->table('themes');
        $table->addColumn('name', 'string', array('limit' => 30));
        $table->addColumn('bootstrap_version', 'string', array('limit' => 10));
        $table->addColumn('less_files', 'text');
        $table->addColumn('jquery_plugins', 'text');
        $table->addColumn('less_variables', 'text');
        $table->addColumn('created', 'datetime');
        $table->addColumn('modified', 'datetime', array('default' => null));
        $table->create();
    }
}
