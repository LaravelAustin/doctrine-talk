<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Builder;
use LaravelDoctrine\Migrations\Schema\Table;

class Version20180329023025 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        (new Builder($schema))->create('posts_tags', function (Table $table) {
            $table->integer('post_id')->setUnsigned(true);
            $table->integer('tag_id')->setUnsigned(true);

            $table->foreign('tags', 'tag_id', 'id');
            $table->foreign('posts', 'post_id', 'id');
        });
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        (new Builder($schema))->drop('posts_tags');
    }
}
