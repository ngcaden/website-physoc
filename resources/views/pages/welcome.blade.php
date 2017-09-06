@extends('main')

@section('title', '| Home')

@section('content')
    
    <div class='row'>
        <div class='col-md-6'>
            <div class="card" id="welcome-column">   
                
                <div class="banner text-center">
                    <img src="{{ asset('images/banner_bahfest.png') }}"  style='width:100%;'>
                </div>
                
                &nbsp

                <h1 class='text-center'>
                    Welcome to Imperial College Physics Society! 
                </h1>
                 
                <hr>

                <p class="text-justify">We run multiple events throughout the year, including lab tours and an annual physics. We also hold physics conferences and invite notable researchers for cutting-edge research during Research Frontier sessions. Furthermore, we run a number of social events to bring together the community of students who are interested in Physics.</p>
                &nbsp
                <p class="text-center"><strong>We are currently looking for 2017/18 sponsors of all tiers.</strong></p>
                
                <p class="text-center"><strong>Email us at <a href="mailto:physics.society@imperial.ac.uk">physics.society@imperial.ac.uk</a> if you are interested.</strong></p>
 
            </div> <!-- .card -->
        &nbsp 
        </div> <!-- .col-md-6 -->

        <div class='col-md-6' ng-app='eventApp'>            
            <div class="card" ng-controller='ListCtrl as ctrl'  id="event-column">
                <h3>Upcoming Events</h3>
                <hr>
                <div class='text-center'>
                    <button class="btn btn-info" ng-click="myFilter = {category:'Social'}">Social</button>
                    <button class="btn btn-success" ng-click="myFilter = {category:'Careers'}">Careers</button>
                    <button class="btn btn-warning" ng-click="myFilter = {category:'Lab Tour'}">Lab Tour</button>
                    <button class="btn btn-danger" ng-click="myFilter = {category:'Research'}">Research</button>
                    <button class="btn btn-default" ng-click="myFilter = {}">All</button>
                </div>
                &nbsp 

                <div class='well' style='height:65%;overflow:scroll;'>

                    <div class="panel-group">
                        <div ng-repeat="event in ctrl.events  | filter:myFilter" class="panel" ng-class='ctrl.getEventClass(event)'>
                            <div class="panel-heading">
                                <a data-toggle="collapse" href="#collapse@{{event.id}}">
                                    <strong ng-bind='event.time'></strong> &nbsp <span ng-bind='event.title'></span>
                                    {{--  <span class='pull-right badge' ng-bind='event.category'></span>  --}}
                                </a>
                            </div>
                            
                            <div id="collapse@{{event.id}}" class="panel-collapse collapse"> 
                                <div class="panel-body">
                                    Location: <span ng-bind='event.location'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  <div ng-repeat='event in ctrl.events' class="panel" ng-class='ctrl.getEventClass(event)'>
                    <div class="panel-heading">
                        @{{event.title}} 
                        <strong>@{{event.time}}</strong>
                    </div>
                    <div class="panel-body">
                        @{{event.location}}
                    </div>
                </div> 
                      --}}
                <div class="text-center">
                    <a href="#"><button class="btn btn-primary" role="button">Show Past Events</button></a>    
                </div>

                 
            </div> <!-- .card -->
            &nbsp 
        </div> <!-- .col-md-6 -->
    </div> <!-- .row -->
@endsection <!-- content -->


@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="/js/app/controllers/eventController.js"></script>
@endsection