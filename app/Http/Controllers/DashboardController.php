<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB; 

class DashboardController extends Controller {
    public function systemSetup() {
        $page_title       = 'System Setup';
        $page_description = 'Some description for the page';

        return view( 'dashboard.system_setup', compact( 'page_title', 'page_description' ) );
    }

    public function apis() {
        $page_title       = 'APIs';
        $page_description = 'Some description for the page';

        return view( 'dashboard.apis', compact( 'page_title', 'page_description' ) );
    }
    public function roles() {
        $page_title       = 'Roles';
        $page_description = 'Some description for the page';

        return view( 'dashboard.roles', compact( 'page_title', 'page_description' ) );
    }

    public function permissions() {
        $page_title       = 'Permissions';
        $page_description = 'Some description for the page';

        return view( 'dashboard.permissions', compact( 'page_title', 'page_description' ) );
    }
    public function configurationModels() {
        $page_title       = 'Configuration Models';
        $page_description = 'Some description for the page';

        return view( 'dashboard.configurationModels', compact( 'page_title', 'page_description' ) );
    }
    public function languages() {
        $page_title       = 'Languages';
        $page_description = 'Some description for the page';

        return view( 'dashboard.languages', compact( 'page_title', 'page_description' ) );
    }
    public function allUsers() {
        $page_title       = 'All Users';
        $page_description = 'Some description for the page';
        $users = DB::table( 'users' )->inRandomOrder()->get();
        $allUsers = json_encode( $users, true );


        return view( 'dashboard.allUsers', compact( 'page_title', 'page_description', 'allUsers' ) );
    }
    public function singleuser($id)
    {
        $user = User::whereId($id)->get();

       $single_user_data = json_decode(json_encode($user), true);
    //    dd($single_user_data);

        return view( 'dashboard.singleuser',  compact('id', 'single_user_data'));
    }
    public function serviceProviders() {
        $page_title       = 'Service Providers';
        $page_description = '';

        $serviceProviders = User::where('user_type', 'Service Provider')->inRandomOrder()->get();
        $serviceProviders = json_encode( $serviceProviders, true );
        // dd($serviceProviders);

        return view( 'dashboard.serviceProviders', compact( 'page_title', 'page_description', 'serviceProviders' ) );
    }
    public function customers() {
        $page_title       = 'Customers';
        $page_description = '';
        $customers = User::where('user_type', 'Customer')->inRandomOrder()->get();
        $customers = json_encode( $customers, true );

        return view( 'dashboard.customers', compact( 'page_title', 'page_description', 'customers' ) );
    }
    public function allJobs() {
        $page_title       = 'All Jobs';
        $page_description = '';

        return view( 'dashboard.allJobs', compact( 'page_title', 'page_description' ) );
    }
    public function scheduled() {
        $page_title       = 'Scheduled';
        $page_description = 'Some description for the page';

        return view( 'dashboard.scheduled', compact( 'page_title', 'page_description' ) );
    }
    public function inProgress() {
        $page_title       = 'In Progress';
        $page_description = 'Some description for the page';

        return view( 'dashboard.inProgress', compact( 'page_title', 'page_description' ) );
    }

    public function completed() {
        $page_title       = 'Completed';
        $page_description = 'Some description for the page';

        return view( 'dashboard.completed', compact( 'page_title', 'page_description' ) );
    }

    public function accountsFinance() {
        $page_title       = 'Accounts Finance';
        $page_description = 'Some description for the page';

        return view( 'dashboard.accountsFinance', compact( 'page_title', 'page_description' ) );
    }
    public function tasks() {
        $page_title       = 'Tasks';
        $page_description = 'Some description for the page';

        return view( 'dashboard.tasks', compact( 'page_title', 'page_description' ) );
    }
    public function reports() {
        $page_title       = 'Reports';
        $page_description = 'Some description for the page';

        return view( 'dashboard.reports', compact( 'page_title', 'page_description' ) );
    }
    public function chat() {
        $page_title       = 'Chat';
        $page_description = 'Some description for the page';

        return view( 'dashboard.chat', compact( 'page_title', 'page_description' ) );
    }
    public function supportDashboard() {
        $page_title       = 'Support Dashboard';
        $page_description = 'Some description for the page';

        return view( 'dashboard.supportDashboard', compact( 'page_title', 'page_description' ) );
    }
    public function eMails() {
        $page_title       = 'eMails';
        $page_description = 'Some description for the page';

        return view( 'dashboard.eMails', compact( 'page_title', 'page_description' ) );
    }
    public function tickets() {
        $page_title       = 'Tickets';
        $page_description = 'Some description for the page';

        return view( 'dashboard.tickets', compact( 'page_title', 'page_description' ) );
    }
    public function articles() {
        $page_title       = 'Articles';
        $page_description = 'Some description for the page';

        return view( 'dashboard.articles', compact( 'page_title', 'page_description' ) );
    }
    public function faqs() {
        $page_title       = 'FAQs';
        $page_description = 'Some description for the page';

        return view( 'dashboard.faqs', compact( 'page_title', 'page_description' ) );
    }
    public function trainingVideos() {
        $page_title       = 'Training Videos';
        $page_description = 'Some description for the page';

        return view( 'dashboard.trainingVideos', compact( 'page_title', 'page_description' ) );
    }

    public function jsonTable()
    {
        $page_title       = 'JSON Data Table';
        $page_description = 'Some description for the page';
        return view( 'dashboard.jsonTable', compact( 'page_title', 'page_description' ));
    }
}
