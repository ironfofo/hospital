<?php

use App\Http\Controllers\MemberPrmList;
use Illuminate\Support\Facades\Route;



Route::group(["middleware"=>"manager","prefix" => "/admin/member/prm"], function () {
    Route::get("list", [MemberPrmList::class, "list"]);
    Route::get("add", [MemberPrmList::class, "add"]);
    Route::post("insert", [MemberPrmList::class, "insert"]);
    Route::get("edit/{id}", [MemberPrmList::class, "edit"]);
    Route::post("update", [MemberPrmList::class, "update"]);
    Route::post("delete", [MemberPrmList::class, "delete"]);
});