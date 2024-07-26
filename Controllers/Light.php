<?php

namespace App\Controllers;


class Light extends BaseController
{
    public function index()
    {
        //Zjednodušená verze homepage 
        // return (view('/light/lightHomepage').
        //         view('/light/lightPosts').
        //         view('/light/lightFooter'));

        //Zjednodušená verze ceník
        return (view('/light/lightHomepage').
                view('/light/lightCenik').
                view('/light/lightFooter'));

    }
}