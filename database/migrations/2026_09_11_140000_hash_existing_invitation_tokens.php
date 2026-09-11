<?php

use App\Models\Invitation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $invitations = DB::table('invitations')->select('id', 'token')->get();

        foreach ($invitations as $invitation) {
            if (! str_starts_with($invitation->token, hash('sha256', ''))) {
                DB::table('invitations')
                    ->where('id', $invitation->id)
                    ->update(['token' => Invitation::hashToken($invitation->token)]);
            }
        }
    }

    public function down(): void
    {
        //
    }
};
