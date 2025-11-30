<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Currency;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\ChartOfAccount;
use App\Models\Journals;
use App\Models\Position;
use App\Models\Employee;
use App\Models\Education;
use App\Models\History;
use App\Models\EmployeeEducationHistories;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('123'),
        ]);

        $usd = Currency::create([
            'code'         => 'USD',
            'name'         => 'US Dollar',
            'symbol'       => '$',
            'rate_to_base' => 1.000000,
            'is_default'   => true,
        ]);

        $khr = Currency::create([
            'code'         => 'KHR',
            'name'         => 'Cambodian Riel',
            'symbol'       => '៛',
            'rate_to_base' => 4100.000000,
            'is_default'   => false,
        ]);

        $assetType = AccountType::create([
            'name'           => 'Assets',
            'code'           => 'AST',
            'category'       => 'asset',
            'normal_balance' => 'debit',
            'is_active'      => true,
            'description'    => 'Resources owned by the company.',
        ]);

        $liabilityType = AccountType::create([
            'name'           => 'Liabilities',
            'code'           => 'LIA',
            'category'       => 'liability',
            'normal_balance' => 'credit',
            'is_active'      => true,
            'description'    => 'Obligations owed to others.',
        ]);

        $equityType = AccountType::create([
            'name'           => 'Equity',
            'code'           => 'EQU',
            'category'       => 'equity',
            'normal_balance' => 'credit',
            'is_active'      => true,
            'description'    => 'Owner’s equity / retained earnings.',
        ]);

        $incomeType = AccountType::create([
            'name'           => 'Income',
            'code'           => 'INC',
            'category'       => 'income',
            'normal_balance' => 'credit',
            'is_active'      => true,
            'description'    => 'Revenue from sales and services.',
        ]);

        $expenseType = AccountType::create([
            'name'           => 'Expenses',
            'code'           => 'EXP',
            'category'       => 'expense',
            'normal_balance' => 'debit',
            'is_active'      => true,
            'description'    => 'Costs and expenses of running the business.',
        ]);

        $cashOnHandCoa = ChartOfAccount::create([
            'account_name'    => 'Cash on Hand',
            'account_type_id' => $assetType->id,
            'account_code'    => '1000',
            'description'     => 'Physical cash kept on hand.',
        ]);

        $bankCoa = ChartOfAccount::create([
            'account_name'    => 'Bank',
            'account_type_id' => $assetType->id,
            'account_code'    => '1010',
            'description'     => 'Company bank account.',
        ]);

        $accountsReceivableCoa = ChartOfAccount::create([
            'account_name'    => 'Accounts Receivable',
            'account_type_id' => $assetType->id,
            'account_code'    => '1100',
            'description'     => 'Amounts owed by customers.',
        ]);

        $accountsPayableCoa = ChartOfAccount::create([
            'account_name'    => 'Accounts Payable',
            'account_type_id' => $liabilityType->id,
            'account_code'    => '2000',
            'description'     => 'Amounts owed to suppliers.',
        ]);

        $capitalCoa = ChartOfAccount::create([
            'account_name'    => 'Owner’s Capital',
            'account_type_id' => $equityType->id,
            'account_code'    => '3000',
            'description'     => 'Owner’s capital contribution.',
        ]);

        $salesRevenueCoa = ChartOfAccount::create([
            'account_name'    => 'Sales Revenue',
            'account_type_id' => $incomeType->id,
            'account_code'    => '4000',
            'description'     => 'Revenue from product sales.',
        ]);

        $cogsCoa = ChartOfAccount::create([
            'account_name'    => 'Cost of Goods Sold',
            'account_type_id' => $expenseType->id,
            'account_code'    => '5000',
            'description'     => 'Cost of items sold.',
        ]);

        $salariesExpenseCoa = ChartOfAccount::create([
            'account_name'    => 'Salaries Expense',
            'account_type_id' => $expenseType->id,
            'account_code'    => '5100',
            'description'     => 'Employee salaries and wages.',
        ]);

        $rentExpenseCoa = ChartOfAccount::create([
            'account_name'    => 'Rent Expense',
            'account_type_id' => $expenseType->id,
            'account_code'    => '5200',
            'description'     => 'Office / building rent.',
        ]);

        $cashAccount = Account::create([
            'code'        => '1000',
            'name'        => 'Cash on Hand',
            'type'        => 'asset',
            'is_group'    => false,
            'parent_id'   => null,
            'currency_id' => $usd->id,
            'is_active'   => true,
        ]);

        $bankAccount = Account::create([
            'code'        => '1010',
            'name'        => 'Bank',
            'type'        => 'asset',
            'is_group'    => false,
            'parent_id'   => null,
            'currency_id' => $usd->id,
            'is_active'   => true,
        ]);

        $arAccount = Account::create([
            'code'        => '1100',
            'name'        => 'Accounts Receivable',
            'type'        => 'asset',
            'is_group'    => false,
            'parent_id'   => null,
            'currency_id' => $usd->id,
            'is_active'   => true,
        ]);

        $apAccount = Account::create([
            'code'        => '2000',
            'name'        => 'Accounts Payable',
            'type'        => 'liability',
            'is_group'    => false,
            'parent_id'   => null,
            'currency_id' => $usd->id,
            'is_active'   => true,
        ]);

        $capitalAccount = Account::create([
            'code'        => '3000',
            'name'        => 'Owner’s Capital',
            'type'        => 'equity',
            'is_group'    => false,
            'parent_id'   => null,
            'currency_id' => $usd->id,
            'is_active'   => true,
        ]);

        $salesRevenueAccount = Account::create([
            'code'        => '4000',
            'name'        => 'Sales Revenue',
            'type'        => 'income',
            'is_group'    => false,
            'parent_id'   => null,
            'currency_id' => $usd->id,
            'is_active'   => true,
        ]);

        $cogsAccount = Account::create([
            'code'        => '5000',
            'name'        => 'Cost of Goods Sold',
            'type'        => 'expense',
            'is_group'    => false,
            'parent_id'   => null,
            'currency_id' => $usd->id,
            'is_active'   => true,
        ]);

        $salariesExpenseAccount = Account::create([
            'code'        => '5100',
            'name'        => 'Salaries Expense',
            'type'        => 'expense',
            'is_group'    => false,
            'parent_id'   => null,
            'currency_id' => $usd->id,
            'is_active'   => true,
        ]);

        $rentExpenseAccount = Account::create([
            'code'        => '5200',
            'name'        => 'Rent Expense',
            'type'        => 'expense',
            'is_group'    => false,
            'parent_id'   => null,
            'currency_id' => $usd->id,
            'is_active'   => true,
        ]);

        Journals::create([
            'code'              => 'SALES',
            'name'              => 'Sales Journal',
            'type'              => 'sale',
            'debit_account_id'  => $arAccount->id,
            'credit_account_id' => $salesRevenueAccount->id,
            'currency_id'       => $usd->id,
            'is_active'         => true,
        ]);

        Journals::create([
            'code'              => 'PURCH',
            'name'              => 'Purchase Journal',
            'type'              => 'purchase',
            'debit_account_id'  => $cogsAccount->id,
            'credit_account_id' => $apAccount->id,
            'currency_id'       => $usd->id,
            'is_active'         => true,
        ]);

        Journals::create([
            'code'              => 'BANK',
            'name'              => 'Bank Journal',
            'type'              => 'bank',
            'debit_account_id'  => $bankAccount->id,
            'credit_account_id' => $cashAccount->id,
            'currency_id'       => $usd->id,
            'is_active'         => true,
        ]);

        Journals::create([
            'code'              => 'CASH',
            'name'              => 'Cash Journal',
            'type'              => 'cash',
            'debit_account_id'  => $cashAccount->id,
            'credit_account_id' => $bankAccount->id,
            'currency_id'       => $usd->id,
            'is_active'         => true,
        ]);

        Journals::create([
            'code'              => 'GEN',
            'name'              => 'General Journal',
            'type'              => 'general',
            'debit_account_id'  => null,
            'credit_account_id' => null,
            'currency_id'       => $usd->id,
            'is_active'         => true,
        ]);

        $positionDev = Position::create([
            'name'        => 'Junior Developer',
            'description' => 'Entry level software developer.',
            'department'  => 'IT',
        ]);

        $positionSeniorDev = Position::create([
            'name'        => 'Senior Developer',
            'description' => 'Leads development tasks and mentors juniors.',
            'department'  => 'IT',
        ]);

        $positionHrOfficer = Position::create([
            'name'        => 'HR Officer',
            'description' => 'Handles HR operations and recruitment.',
            'department'  => 'HR',
        ]);

        $employee1 = Employee::create([
            'first_name'         => 'Alice',
            'last_name'          => 'Chan',
            'email'              => 'alice@example.com',
            'phone'              => '012345678',
            'address'            => 'Phnom Penh',
            'current_position_id' => $positionSeniorDev->id,
        ]);

        $employee2 = Employee::create([
            'first_name'         => 'Bora',
            'last_name'          => 'Sok',
            'email'              => 'bora@example.com',
            'phone'              => '098765432',
            'address'            => 'Kampong Cham',
            'current_position_id' => $positionHrOfficer->id,
        ]);

        History::create([
            'employee_id' => $employee1->id,
            'position_id' => $positionDev->id,
            'start_date'  => now()->subYears(2)->startOfYear(),
            'end_date'    => now()->subYear(),
            'note'        => 'Joined as Junior Developer.',
        ]);

        History::create([
            'employee_id' => $employee1->id,
            'position_id' => $positionSeniorDev->id,
            'start_date'  => now()->subYear(),
            'end_date'    => null,
            'note'        => 'Promoted to Senior Developer.',
        ]);

        History::create([
            'employee_id' => $employee2->id,
            'position_id' => $positionHrOfficer->id,
            'start_date'  => now()->subYears(1),
            'end_date'    => null,
            'note'        => 'Hired as HR Officer.',
        ]);

        $eduItBachelor = Education::create([
            'school_name' => 'Royal University of Phnom Penh',
            'major'       => 'Computer Science',
            'degree'      => 'Bachelor',
        ]);

        $eduBusinessBachelor = Education::create([
            'school_name' => 'National University of Management',
            'major'       => 'Business Administration',
            'degree'      => 'Bachelor',
        ]);

        $eduHrDiploma = Education::create([
            'school_name' => 'Institute of HR Management',
            'major'       => 'Human Resources',
            'degree'      => 'Diploma',
        ]);

        EmployeeEducationHistories::create([
            'employee_id' => $employee1->id,
            'education_id' => $eduItBachelor->id,
            'start_year'  => 2016,
            'end_year'    => 2020,
            'note'        => 'Graduated with honors.',
        ]);

        EmployeeEducationHistories::create([
            'employee_id' => $employee2->id,
            'education_id' => $eduBusinessBachelor->id,
            'start_year'  => 2015,
            'end_year'    => 2019,
            'note'        => null,
        ]);

        EmployeeEducationHistories::create([
            'employee_id' => $employee2->id,
            'education_id' => $eduHrDiploma->id,
            'start_year'  => 2020,
            'end_year'    => 2021,
            'note'        => 'Specialized in HR operations.',
        ]);
    }
}
