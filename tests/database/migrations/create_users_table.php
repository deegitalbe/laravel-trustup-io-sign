<?php

namespace Deegitalebe\PackageSign\Tests\database\migrations;


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Deegitalebe\PackageSign\Services\Traits\TrustupioSignedDocumentRelatedMigrations;

class CreateUsersTable extends Migration
{
    use TrustupioSignedDocumentRelatedMigrations;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
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
        $this->addSignedDocumentColumn('users', 'trustup_io_signed_document_uuid');
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
