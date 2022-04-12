<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;

class RoleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function create_a_role() {
        $this->assertCount(0, Role::all());
        $this->post('/admin/roles', ['title'=>'Admin','slug'=>'admin','description'=>'admin description']);
        $this->assertCount(1, Role::all());
    }

    /** @test */
    public function create_a_role_validation() {
        Role::create(['title'=>'Admin','slug'=>'admin','description'=>'admin description']);
        $this->post('/admin/roles', [
            'title'=>'Admin','slug'=>'admin','description'=>'admin description'
        ])->assertRedirect()->assertSessionHasErrors(['title','slug']); // Role already exists with that title and slug

        $this->post('/admin/roles', [
            'title'=>'Author','description'=>'author description'
        ])->assertRedirect()->assertSessionHasErrors(['slug']); // slug field is required
    }

    /** @test */
    public function update_a_role() {
        Role::create(['title'=>'Admib','slug'=>'admib','description'=>'admib description']);
        $role = Role::first();

        $this->assertEquals($role->title, 'Admib');
        $this->assertEquals($role->slug, 'admib');
        $this->assertEquals($role->description, 'admib description');
        $this->patch('/admin/roles', [
            'role_id'=>$role->id,
            'title'=>'Admin','slug'=>'admin','description'=>'admin description'
        ]);
        $role->refresh();
        $this->assertEquals($role->title, 'Admin');
        $this->assertEquals($role->slug, 'admin');
        $this->assertEquals($role->description, 'admin description');
    }

    /** @test */
    public function update_a_role_validation() {
        $siteowner = Role::create(['title'=>'Site Owner','slug'=>'site-owner','description'=>'site owner description']);
        $admin = Role::create(['title'=>'Admin','slug'=>'admin','description'=>'admin description']);

        $this->patch('/admin/roles', ['role_id'=>168945,'title'=>'Author'])
            ->assertRedirect()->assertSessionHasErrors(['role_id']); // invalid role id

        $this->patch('/admin/roles', ['role_id'=>$siteowner->id,'title'=>'Admin','slug'=>'admin'])
            ->assertRedirect()->assertSessionHasErrors(['title','slug']);
    }
}
