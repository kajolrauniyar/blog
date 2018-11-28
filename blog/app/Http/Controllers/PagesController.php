<?php
 namespace App/Http/Controllers;
 class PagesController extends Controller{
 	public function getWelcome(){
 		$posts=Post::orderBy('created_at','desc')->limit(4)->get();

 	}

 

 	public function getAbout(){
 		$first='Kajol';
 		$last='Rauniyar';
 		$full=$first." ".$last;
 		return view ('welcome')->with("fullname",$full);


 	}

 
 	public function getContact(){
 		$first='Kajol';
 		$last='Rauniyar';
 		$full=$first." ".$last;
 		return view ('welcome')->with("fullname",$full);


 	}

 }



?>