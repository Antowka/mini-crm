<?php

class DatabaseSeeder extends Seeder{
    public function run() {
        Eloquent::unguard();
        
        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');
        
        $this->call('RoleTableSeeder');
        $this->command->info('Role table seeded!');
        
        $this->call('TransactionsTableSeeder');
        $this->command->info('Transactions table seeded!');

        $this->call('CompaniesTableSeeder');
        $this->command->info('Companies table seeded!');

        $this->call('UserCompaniesTableSeeder');
        $this->command->info('User_Companies table seeded!');

        $this->call('UserCompaniesStatusTableSeeder');
        $this->command->info('User Companies Status table seeded!');

        $this->call('DepartmentsInCompanyTableSeeder');
        $this->command->info('Companies Departaments table seeded!');
        
        $this->call('UserRolesSeeder');
        $this->command->info('User Roles relative table seeded!');

        $this->call('TasksSeeder');
        $this->command->info('Tasks relative table seeded!');
        
    }
}
 
class UserTableSeeder extends Seeder{
    public function run() {
        DB::table('users')->delete();
        User::create(array(
            'login'    => '662307@gmail.com',
            'name'     => 'Anton Nikanorov',
            'password' => Hash::make('la136dop'),
            'remember_token' => ''
        ));
    }
}
 
class RoleTableSeeder extends Seeder{
    public function run() {
        DB::table('roles')->delete();
        Role::create(array('name' => 'admin'));
        Role::create(array('name' => 'user'));
        Role::create(array('name' => 'gold'));
        Role::create(array('name' => 'worker'));
        Role::create(array('name' => 'client'));
    }
}

class TransactionsTableSeeder extends Seeder{
	public function run() {
		DB::table('transactions')->delete();
		$transactions = array(
			array(
	            'user_id'     => 1,
	            'type_id'    => 1,
	            'amount' => 150,
	            'description' => 'ds sd gf'
	        ),
		);
		DB::table('transactions')->insert($transactions);
	}
}

class CompaniesTableSeeder extends Seeder{
    public function run() {
        DB::table('companies')->delete();
        $companies = array(
            array(
                'id'     => 1,
                'name'    => '3M',
                'email' => 'main@3m.com',
                'phone' => '911-11-11',
                'description' => 'ds sd gf'
            ),
        );
        DB::table('companies')->insert($companies);
    }
}

class UserCompaniesTableSeeder extends Seeder{
    public function run() {
        DB::table('user_companies')->delete();
        $UserCompanies = array(
            array(
                'user_id'    => 1,
                'company_id' => 1,
            	'profession' => 'coder',
                'departments_id' => 1,
                'status_in_company_id' => 1,
            ),
        );
        DB::table('user_companies')->insert($UserCompanies);
    }
}

class UserCompaniesStatusTableSeeder extends Seeder{
    public function run() {
        DB::table('user_companies_status')->delete();
        
        $UserCompaniesStatus1 = array(
            array(
                'id'     => 1,
                'status_name'    => 'client',
            ),
        );
        DB::table('user_companies_status')->insert($UserCompaniesStatus1);

        $UserCompaniesStatus2 = array(
            array(
                'id'     => 2,
                'status_name'    => 'manager',
            ),
        );
        DB::table('user_companies_status')->insert($UserCompaniesStatus2);

        $UserCompaniesStatus3 = array(
            array(
                'id'     => 3,
                'status_name'    => 'worker',
            ),
        );
        DB::table('user_companies_status')->insert($UserCompaniesStatus3);

    }
}

class DepartmentsInCompanyTableSeeder extends Seeder{
    public function run() {
        DB::table('departments_in_company')->delete();
        $Departments = array(
            array(
                'id'     => 1,
                'name'    => 'IT-dep',
                'company_id' => 1,
            ),
        );
        DB::table('departments_in_company')->insert($Departments);
    }
}
    
class UserRolesSeeder extends Seeder{
	public function run() {
		DB::table('users_roles')->delete();
		$UserRole = array(
				array(
					'user_id' =>1,
					'role_id' => 1,
				),
		);
		DB::table('users_roles')->insert($UserRole);
    }
}

class TasksSeeder extends Seeder{
    public function run() {
        DB::table('tasks')->delete();
        $tasks = array(
                array(
                    'id' =>1,
                    'company_id'=>1,
                    'project_id'=>1,
                    'name'=>'First Task',
                    'description'=>'test task, test task, test task, test task, test task,',
                    'status_id'=>1,
                ),
        );
        DB::table('tasks')->insert($tasks);
    }
}