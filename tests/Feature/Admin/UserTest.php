<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\{User,Permission,BanReason,Ban};

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public $authuser;
    public $uncategorized;

    public function setUp():void {
        parent::setUp();

        $permissions = [
            'access-admin-section' => Permission::factory()->create(['title'=>'aas', 'slug'=>'access-admin-section']),
            'ban-user' => Permission::factory()->create(['title'=>'bu', 'slug'=>'ban-user']),
        ];

        $user = $this->authuser = User::factory()->create();
        $this->actingAs($user);
        $user->attach_permission('access-admin-section');
        $user->attach_permission('ban-user');
    }

    /** @test */
    public function ban_a_user_permanently() {
        $user = User::factory()->create(['password'=>Hash::make('Hostname47')]);
        $banreason = BanReason::create(['title'=>'foo','slug'=>'foo','reason'=>'foo']);

        $this->assertEquals('active', $user->status);
        $this->assertCount(0, Ban::all());
        $this->post('/admin/users/ban', [
            'user_id'=>$user->id,
            'ban_reason'=>$banreason->id,
            'type'=>'permanent'
        ]);
        $this->assertEquals('banned', $user->refresh()->status);
        $this->assertCount(1, Ban::all());
    }
}
