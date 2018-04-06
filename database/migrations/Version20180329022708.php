<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Builder;
use LaravelDoctrine\Migrations\Schema\Table;

class Version20180329022708 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        (new Builder($schema))->create('comments', function (Table $table) {
            $table->increments('id');
            $table->integer('user_id')->setUnsigned(true);
            $table->integer('post_id')->setUnsigned(true);
            $table->string('text');
            $table->timestamps();

            $table->foreign('users', 'user_id', 'id');
            $table->foreign('posts', 'post_id', 'id');
        });
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        (new Builder($schema))->drop('comments');
    }
}
