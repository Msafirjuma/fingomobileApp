@extends('layouts.app')

@section('title', 'Dashboard Home')

@section('content')
<div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
              </div>
</div>
<div class="row pt-3">

<div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$user}}</h3>
                <p>User ID</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$group}}</h3>
                <p>Total Groups</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>

    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$goal}}</h3>
                <p>Total Goals</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$accomp}}</h3>
                <p>Accompleshed Goals</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
        
    </div>

</div>

<div class="raw h-100">
    

</div>
@endsection