<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Table;
use LaravelDoctrine\Migrations\Schema\Builder;

class Version20180329022504 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        (new Builder($schema))->create('posts', function (Table $table) {
            $table->increments('id');
            $table->integer('user_id')->setUnsigned(true);
            $table->string('title');
            $table->text('body');
            $table->timestamps();

            $table->foreign('users', 'user_id', 'id');
        });
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        (new Builder($schema))->drop('posts');
    }
}
