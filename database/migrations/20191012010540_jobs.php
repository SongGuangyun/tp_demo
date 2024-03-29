<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Jobs extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // create the table
        $table = $this->table('jobs',array('engine'=>'InnoDB'));
        $table->addColumn('queue', 'string',array('limit'  =>  200))
            ->addColumn('payload', 'text')
            ->addColumn('attempts', 'integer',array('limit'  =>  11))
            ->addColumn('reserve_time', 'integer',array('limit'  =>  11,'null'=>true))
            ->addColumn('available_time', 'integer',array('default'=>11))
            ->addColumn('create_time', 'integer',array('limit'  =>  11))
            ->create();
    }
}
