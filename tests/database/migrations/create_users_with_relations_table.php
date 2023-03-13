<?php

namespace Deegitalbe\TrustupIoSign\Tests\database\migrations;


use Deegitalebe\PackageSign\Services\Traits\TrustupioSignedDocumentRelatedMigrations;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersWithRelationsTable extends Migration
{
    use TrustupioSignedDocumentRelatedMigrations;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_with_relations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        $this->addSignedDocumentColumn('users_with_relations', 'trustup_io_signed_document_uuid');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        // $this->removeAuditLogColumn('users', 'trustup_io_audit_log_uuid');
    }
}
