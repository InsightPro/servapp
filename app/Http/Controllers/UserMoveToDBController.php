<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class UserMoveToDBController extends Controller {
    use RegistersUsers;
    protected $fillable = [
        'username',
        'status',
        'user_type',
        'iqama',
        'national_id',
        'certified',
        'nationality',
        'reg_date',
        'rate_ph',
        'no_projects',
        'revenue',
        'comments',
        'professions',
        'bio',
        'skills',
        'gender',
        'long_lat',
    ];
    public function insert_user() {
        $json_file = \file_get_contents( "https://servapp.9bravo.com/js/csvjson.json" );

        $json_array = json_decode( $json_file, true );

        foreach ( $json_array as $single_user ) {
            $this->create( $single_user );

            // print_r($single_user['username']);

        }

        return "Successfull";

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array              $data
     * @return \App\Models\User
     */
    protected function create( array $data ) {
        User::insert( [
            'name'        => $data['fullname'],
            'role'        => 'default',
            'username'    => $data['username'],
            'user_type'   => $data['user_type'],
            'phone'       => $data['telephone'],
            'email'       => $data['email'],
            'address1'    => $data['sa_address1'],
            'city'        => $data['sa_city'],
            'country'     => $data['country'],
            'status'      => $data['status'],
            'iqama'       => $data['iqama'],
            'national_id' => $data['national_id'],
            'certified'   => $data['certified'],
            'nationality' => $data['nationality'],
            'reg_date'    => $data['reg_date'],
            'rate_ph'     => $data['rate_ph'],
            'no_projects' => $data['no_projects'],
            'revenue'     => $data['revenue'],
            'comments'    => $data['comments'],
            'professions' => $data['profession'],
            'bio'         => $data['bio'],
            'skills'      => $data['skills'],
            'gender'      => $data['gender'],
            'long_lat'    => $data['long_lat'],
            'password'    => Hash::make( 'ServApp9087' ),
        ] );
    }

    public function update_profile_url( $country ) {

        $files = glob(  storage_path('app/public/media/Avatar/') . 'india-*'  );
        $user  = DB::table( 'users' )->where( 'country', $country )->get();
        // dd( $user);
        // storage/app/public/media/Avatar/india-01.jpg
        $i = 1;
        foreach ( $user as $data ) {
            if($country == 'India'){
                DB::table( 'users' )->where( 'id', '=', $data->id)->update( ['profile_img_url' => 'storage/media/Avatar/india-'. sprintf("%02d", $i).'.jpg'] );
            }

            if($country == 'Saudi Arabia'){
                DB::table( 'users' )->where( 'id', '=', $data->id)->update( ['profile_img_url' => 'storage/media/Avatar/saudi-'. sprintf("%02d", $i).'.jpg'] );
            }
            if($country == 'Bangladesh'){
                DB::table( 'users' )->where( 'id', '=', $data->id)->update( ['profile_img_url' => 'storage/media/Avatar/bd-'. sprintf("%02d", $i).'.jpg'] );
            }
            $i++;
        }

        return "done";
    }
}
