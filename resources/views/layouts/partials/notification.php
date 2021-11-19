<?php

use App\Models\Mainrisk;
use Illuminate\Support\Facades\Auth;

$count_myrisks = Mainrisk::where('member_id', Auth::id())->where('status_del', false)->count();
$count_rmadmin_manage = Mainrisk::where('member_id', Auth::id())->where('status_del', false)->where('riskstep_id', 1)->count();

echo $count_myrisks;
