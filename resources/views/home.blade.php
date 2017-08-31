@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

                <!-- let people make clients -->
                <div>
                <passport-clients></passport-clients>
                </div>
                <!-- list of clients people have authorized to access our account -->
                <div>
                <passport-authorized-clients></passport-authorized-clients>
                </div>
                <!-- make it simple to generate a token right in the UI to play with -->
                <div>
                <passport-personal-access-tokens></passport-personal-access-tokens>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
