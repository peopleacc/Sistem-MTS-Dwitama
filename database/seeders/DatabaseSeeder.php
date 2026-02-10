<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectPic;
use App\Models\ProjectDetil;
use App\Models\ProjectFoto;
use App\Models\ProjectAgenda;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ===== USERS =====
        // SuperAdmin
        User::factory()->create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@example.com',
            'role' => 'superadmin',
            'level' => 'SA',
            'status' => 1,
            'notelp' => '08123456789',
            'alamat' => 'Jl. Contoh No. 123',
            'password' => 'password'
        ]);

        // Admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'level' => 'AD',
            'status' => 1,
            'notelp' => '08123456789',
            'alamat' => 'Jl. Contoh No. 123',
            'password' => 'password'
        ]);

        // Sales
        $sales = User::factory()->create([
            'name' => 'Sales',
            'email' => 'sales@example.com',
            'role' => 'sales',
            'level' => 'SL',
            'status' => 1,
            'notelp' => '08123456789',
            'alamat' => 'Jl. Contoh No. 123',
            'password' => 'password'
        ]);

        // ===== CUSTOMERS (10 data) =====
        $customers = Customer::factory(10)->create([
            'user_id' => $sales->id,
        ]);

        // ===== PROJECTS (10 data) =====
        $projects = collect();
        foreach ($customers as $index => $customer) {
            $project = Project::factory()->create([
                'custid' => $customer->custid,
            ]);
            $projects->push($project);
        }

        // ===== PROJECT PICs (10 data) =====
        foreach ($projects as $project) {
            ProjectPic::factory()->create([
                'project_id' => $project->project_id,
            ]);
        }

        // ===== PROJECT DETILs (10 data) =====
        foreach ($projects as $project) {
            ProjectDetil::factory()->create([
                'project_id' => $project->project_id,
            ]);
        }

        // ===== PROJECT FOTOs (10 data) =====
        foreach ($projects as $project) {
            ProjectFoto::factory()->create([
                'project_id' => $project->project_id,
            ]);
        }

        // ===== PROJECT AGENDAs (10 data) =====
        foreach ($projects as $project) {
            ProjectAgenda::factory()->create([
                'project_id' => $project->project_id,
            ]);
        }
    }
}
