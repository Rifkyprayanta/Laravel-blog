<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function index()
    {
    	$title = "Selamat Datang di Blog Laravel";
    	return view('pages.index')->with('title', $title);
    }

    public function about()
    {
    	$title = "Tentang Developer";
    	return view('pages.about')->with('title', $title);;
    }

    public function services()
    {	
    	//$number = 12;
    	//dd(count((array)$number));
    	$data = array(
    		'title' => 'Service',
    		'subtitle' => 'Dibangun dengan menggunakan Laravel. Anda dapat bekerja sama dengan developer untuk membuat sistem berbasis website. Adapun website yang sudah pernah dibuat developer adalah',
    		'services' => ['Website Peminjaman Gedung', 'Website Aspirasi Mahasiswa', 'Website Ticketing Perusahaan Pelindo', 'Website Aplikasi POS', 'Website Portal Berita', 'Website Company Profile']
    	);

    	return view('pages.services')->with($data);
    }

}
