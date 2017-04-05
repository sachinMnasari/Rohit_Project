<html>

<head>
    <link href="<% URL::asset('external/bootstrap-3.3.7-dist/css/bootstrap.min.css') %>" rel="stylesheet">
    <link href="<% URL::asset('external/Bootstrap_Multiselect/CSS/multiSelect.css') %>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
</head>

<body ng-app="StudentApp" ng-controller="StudentFormCtrl as formCtrl">
    
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-12">
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <form>
                <div class="form-group col-md-6 col-sm-12 col-xs-12" >
                    <label for="firstname">First Name*</label>
                    <input class="form-control" type="text" id="firstname" placeholder="First Name" />
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="lastname">Last Name*</label>
                    <input class="form-control" type="text" id="lastname" placeholder="Last Name" />
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="email">Email*</label>
                    <input class="form-control" type="email" id="email" placeholder="Email" />
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="number">Mobile Number*</label>
                    <input class="form-control" type="text" id="number" placeholder="Mobile Number" />
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="number">Date Of Birth*</label>
                    <input class="form-control" type="date" id="number" placeholder="Mobile Number" />
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="number">Studing In*</label>
                    <input class="form-control" type="text" id="Studing" placeholder="Studing In" />
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="number">School*</label>
                    <input class="form-control" type="text" id="School" placeholder="School" />
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="number">Extracericular</label>
                    <input class="form-control" type="text" id="Extracericular" placeholder="Extracericular" />
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="number">Recent Percent*</label>
                    <input class="form-control" type="text" id="Recent_Percent" placeholder="Recent Percent" />
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label for="number">Adhar*</label>
                    <input class="form-control" type="text" id="Adhar" placeholder="Adhar No" />
                </div>
                <div class="form-group">
                    <label for="number">Address*</label>
                    <input class="form-control" type="text" id="Address" placeholder="Address" />
                </div>
                <center><div class="form-group">
                    <label for="number">Gender* :</label>
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                </div></center>
                <div>
                    <div class="col-md-4 col-sm-12 col-xs-12" >Board </div>
                     <div class="col-md-8 col-sm-12 col-xs-12" >
                    <select class="form-control" ng-model="formCtrl.selectedBoard" ng-change="formCtrl.onChangeBoard()">
                        <option ng-value="0" ng-if="formCtrl.selectedBoard == 0" selected="selected">Select Board</option>
                        <option ng-value="option" ng-repeat="option in formCtrl.data">
                            {{option.Board_NM}}
                        </option>
                    </select>
                     </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">Stream </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                    <select class="form-control" ng-model="formCtrl.selectedField" ng-change="formCtrl.onChangeField()">
                        <option ng-value="0" ng-if="formCtrl.selectedField == 0" selected="selected">Select Stream</option>
                        <option ng-value="option" ng-repeat="option in formCtrl.selectedBoard.Fields">
                            {{option.Field_NM}}
                        </option>
                    </select>
                    </div>
                </div>
                
                
                    <div class="col-md-4 col-sm-12 col-xs-12">Class </div>
                     <div class="col-md-8 col-sm-12 col-xs-12">
                    <select class="form-control" ng-model="formCtrl.selectedClass" ng-change="formCtrl.onChangeClass()">
                        <option ng-value="0" ng-if="formCtrl.selectedClass == 0" selected="selected">Select Class</option>
                        <option ng-value="option" ng-repeat="option in formCtrl.selectedField.Classes">
                            {{option.Class_nm}}
                        </option>
                    </select>
                    </div>
                   <!--  {{formCtrl.selectedSubject}} -->
                    <div class="col-md-4 col-sm-12 col-xs-12">Subject </div>
                    <div class="col-md-8 col-sm-12 col-xs-12 form-group">
                     <select id="dates-field2" class="form-control multiselect-ui  " ng-model="formCtrl.selectedSubject" multiple="multiple" ng-close="formCtrl.abcd()">
                        <!-- <option class ="col-md-12 col-sm-12 col-xs-12" ng-value="0" ng-if="formCtrl.selectedSubject == 0" selected="selected">Select Subject</option>   -->
                         <option class ="col-md-12 col-sm-12 col-xs-12" ng-repeat="option in formCtrl.selectedClass.Subjects" ng-value="option">
                            {{option.Sub_Nm}}
                        </option> 
                        </select>
                        </div>
                    <!-- <div class="form-group">
    <label class="col-md-4 control-label" for="rolename">Role Name</label>
    <div class="col-md-4">
        <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
            <option value="cheese">Cheese</option>
            <option value="tomatoes">Tomatoes</option>
            <option value="mozarella">Mozzarella</option>
            <option value="mushrooms">Mushrooms</option>
            <option value="pepperoni">Pepperoni</option>
            <option value="onions">Onions</option>
        </select>
    </div> -->
<!-- </div> -->
            <div class="form-group">
                    <button class="btn btn-success">submit</button>
            </div>
                
            </form>
        </div>
        <div class="col-md-2 col-sm-2">
        </div>
    </div>
    </div>
    <script src="<% asset('external/angularjs/angular.min.js') %>"></script>
    <script src="<% asset('external/angular-messages/angular-messages.min.js') %>"></script>

    <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="
    sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>

    <script src="<% asset('external/bootstrap-3.3.7-dist/js/bootstrap.min.js') %>"></script>
    <script src="<% asset('external/angularboostrap/ui-bootstrap-tpls-2.5.0.min.js') %>"></script>
     <script src="<% asset('AngularApp/Modules/studentApp.js') %>"></script>
     <script src="<% asset('external/Bootstrap_Multiselect/BooT_Multiselect.js') %>"></script>
    <script src="<% asset('external/Bootstrap_Multiselect/MyJS.js') %>"></script>
    <!-- <script >
        $(function() {
    $('#dates-field2').multiselect({
        includeSelectAllOption: true
    });
});
    </script> -->
</body>