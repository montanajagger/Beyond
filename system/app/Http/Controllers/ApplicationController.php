<?php

namespace App\Http\Controllers;

class ApplicationController extends Controller
{
    public function emailApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-email', ['pageConfigs' => $pageConfigs]);
    }
    public function emailContentApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-email-content', ['pageConfigs' => $pageConfigs]);
    }
    public function chatApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-chat', ['pageConfigs' => $pageConfigs]);
    }
    public function todoApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-todo', ['pageConfigs' => $pageConfigs]);
    }
    public function kanbanApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page menu-collapse'];
        return view('pages.app-kanban', ['pageConfigs' => $pageConfigs]);
    }
    public function fileManagerApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-file-manager', ['pageConfigs' => $pageConfigs]);
    }
    public function contactApp()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-contacts', ['pageConfigs' => $pageConfigs]);
    }
    public function calendarApp()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "App"], ['name' => "Calendar"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.app-calendar', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
    public function invoiceList()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-invoice-list', ['pageConfigs' => $pageConfigs]);
    }
    public function invoiceView()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-invoice-view', ['pageConfigs' => $pageConfigs]);
    }
    public function invoiceEdit()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-invoice-edit', ['pageConfigs' => $pageConfigs]);
    }
    public function invoiceAdd()
    {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        return view('pages.app-invoice-add', ['pageConfigs' => $pageConfigs]);
    }
    public function ecommerceProduct()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javacript:void(0)", 'name' => "App"], ['name' => "eCommerce Products Page"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.eCommerce-products-page', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
    public function eCommercePricing()
    { // Breadcrumbs
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javacript:void(0)", 'name' => "eCommerce"], ['name' => "eCommerce Pricing"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.eCommerce-pricing', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }
}
