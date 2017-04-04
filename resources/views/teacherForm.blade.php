<!DOCTYPE html>
<html>

<head>
    <link href="<% URL::asset('external/bootstrap-3.3.7-dist/css/bootstrap.min.css') %>" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <!-- <link href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <style>
    .exprience-input-right {
        padding-right: 0px;
    }
    
    .exprience-input-left {
        padding-left: 0px;
    }
    .subject-display-box {
    height:20vh;
    overflow: auto;
    padding :15px;
    background-color: #f7f7f9;
    border: 1px solid #e1e1e8;
    border-radius: 4px;
    }
    </style>
</head>

<body ng-app="teacherApp" ng-controller="TeacherFormCtrl as formCtrl">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <form name="formCtrl.teacherForm" novalidate="">
                <p></p>
                <input type="hidden" value="<% csrf_token()%>" id="csrf_token">
                <div class="row">
                    <div class="form-group col-md-6" ng-class="{'has-success':formCtrl.teacherForm.firstName.$valid}">
                        <label for="firstname">First Name*</label>
                        <input class="form-control" type="text" id="firstname" ng-model="formCtrl.firstName" name="firstName" placeholder="First Name" required="" minlength="2" maxlength="50">
                        <div ng-messages="formCtrl.teacherForm.firstName.$error" style="color:red" ng-show="formCtrl.teacherForm.firstName.$touched">
                            <div ng-message="required">Please enter firstname</div>
                            <div ng-message="minlength">minimum 2 char required</div>
                            <div ng-message="maxlength">maximum 50 char allowed</div>
                        </div>
                    </div>
                    <div class="form-group col-md-6" ng-class="{'has-success':formCtrl.teacherForm.lastName.$valid}">
                        <label for="lastname">Last Name*</label>
                        <input class="form-control" type="text" id="lastname" placeholder="Last Name" name="lastName" ng-model="formCtrl.lastName" required minlength="2" maxlength="50">
                        <div ng-messages="formCtrl.teacherForm.lastName.$error" style="color:red" ng-show="formCtrl.teacherForm.lastName.$touched">
                            <div ng-message="required">Please enter lastname</div>
                            <div ng-message="minlength">minimum 2 char required</div>
                            <div ng-message="maxlength">maximum 50 char allowed</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6" ng-class="{'has-success':formCtrl.teacherForm.email.$valid}">
                        <label for="email">Email*</label>
                        <input class="form-control" type="email" id="email" name="email" ng-model="formCtrl.email" placeholder="Email" required maxlength="100" ng-pattern="formCtrl.emailRegex">
                        <div ng-messages="formCtrl.teacherForm.email.$error" style="color:red" ng-show="formCtrl.teacherForm.email.$touched">
                            <div ng-message="required">Please enter email Id</div>
                            <div ng-message="pattern">Invalid Email</div>
                            <div ng-message="maxlength">maximum 100 char allowed</div>
                        </div>
                    </div>
                    <div class="form-group col-md-6" ng-class="{'has-success':formCtrl.teacherForm.mobileNo.$valid}">
                        <label for="number">Mobile Number*</label>
                        <input class="form-control" type="text" id="number" name="mobileNo" ng-model="formCtrl.mobileNo" placeholder="Mobile Number" required ng-pattern="formCtrl.mobileRegex">
                        <div ng-messages="formCtrl.teacherForm.mobileNo.$error" style="color:red" ng-show="formCtrl.teacherForm.mobileNo.$touched">
                            <div ng-message="required">Please enter Mobile Number </div>
                            <div ng-message="pattern">Invalid Mobile Number</div>
                            <div ng-message="maxlength">maximum 10 char allowed</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6" ng-class="{'has-success':formCtrl.teacherForm.DOB.$valid}">
                        <label for="number">Date Of Birth*</label>
                        <input class="form-control" type="date" id="number" name="DOB" ng-model="formCtrl.DOB" placeholder="Mobile Number" required>
                        <div ng-messages="formCtrl.teacherForm.DOB.$error" style="color:red" ng-show="formCtrl.teacherForm.DOB.$touched">
                            <div ng-message="required">Please enter date of birth </div>
                            <div ng-message="date">Invalid Date</div>
                            <div ng-message="maxlength">maximum 10 char allowed</div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="expreince">Exprience:</label>
                        <div class="col-md-12 input-group" id="expreince">
                            <div class="col-md-6 exprience-input-left " ng-class="{'has-success':formCtrl.teacherForm.DOB.$valid}">
                                <div class="input-group">
                                    <input type="number" id="expreince_year" class="form-control" name="experiencYear" ng-model="formCtrl.experience.year" aria-describedby="year_text" required min="0"><span class="input-group-addon" id="year_text"> year</span>
                                </div>
                                <div ng-messages="formCtrl.teacherForm.experiencYear.$error" style="color:red" ng-show="formCtrl.teacherForm.experiencYear.$touched">
                                    <div ng-message="required">Please enter value </div>
                                    <div ng-message="min">Invalid Years</div>
                                </div>
                            </div>
                            <div class="col-md-6 exprience-input-right" ng-class="{'has-success':formCtrl.teacherForm.expreinceMonth.$valid}">
                                <div class="input-group">
                                    <input type="number" id="expreince_month" class="form-control" ng-model="formCtrl.experience.month" aria-describedby="month_text" name="expreinceMonth" required min="0" max="11"><span id="month_text" class="input-group-addon"> month</span>
                                </div>
                                <div ng-messages="formCtrl.teacherForm.expreinceMonth.$error" style="color:red" ng-show="formCtrl.teacherForm.expreinceMonth.$touched">
                                    <div ng-message="required">Please enter value </div>
                                    <div ng-message="min">Invalid Months</div>
                                    <div ng-message="max">Invalid Months Enter 0-11
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 ">
                        <label for="gender">Gender* :</label>
                        <div id="gender">
                            <input type="radio" ng-model="formCtrl.getnder" name="gender" id="inlineRadio1" value="option1" required> Male
                            <input type="radio" ng-model="formCtrl.getnder" name="gender" id="inlineRadio2" value="option2" required> Female
                            <div ng-messages="formCtrl.teacherForm.gender.$error" style="color:red" ng-show="formCtrl.teacherForm.gender.$touched">
                                <div ng-message="required">Please select gender </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="aadhar">Aadhar Number*</label>
                        <input type="text" class="form-control" id="aadhar" ng-model="formCtrl.aadhar" ng-pattern="formCtrl.aadharRegex" name="aadharNumber" maxlength="" required="">
                         <div ng-messages="formCtrl.teacherForm.aadharNumber.$error" style="color:red" ng-show="formCtrl.teacherForm.aadharNumber.$touched">
                                <div ng-message="required">Please Enter Aadhar Number </div>
                                <div ng-message="pattern">Invalid Aadhar Number</div>

                            </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                    <label for="number">Board</label>
                    <select class="form-control" ng-model="formCtrl.selectedBoard" ng-change="formCtrl.onChangeBoard()">
                        <option ng-value="0" ng-if="formCtrl.selectedBoard == 0" selected="selected">Select Board</option>
                        <option ng-value="option" ng-repeat="option in formCtrl.data">
                            {{option.boardName}}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="number">Stream</label>
                    <select class="form-control" ng-model="formCtrl.selectedField" ng-change="formCtrl.onChangeField()">
                        <option ng-value="0" ng-if="formCtrl.selectedField == 0" selected="selected">Select Stream</option>
                        <option ng-value="option" ng-repeat="option in formCtrl.selectedBoard.fields">
                            {{option.fieldName}}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="number">Class</label>
                    <select class="form-control" ng-model="formCtrl.selectedClass" ng-change="formCtrl.onChangeClass()">
                        <option ng-value="0" ng-if="formCtrl.selectedClass == 0" selected="selected">Select Class</option>
                        <option ng-value="option" ng-repeat="option in formCtrl.selectedField.classes">
                            {{option.className}}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="number">Subject</label>
                    <select class="form-control" ng-model="formCtrl.selectedSubject" ng-change="formCtrl.onChangeSubject()">
                        <option ng-value="0" ng-if="formCtrl.selectedSubject == 0" selected="selected">Select Subject</option>
                        <option ng-repeat="option in formCtrl.selectedClass.subjects" ng-value="option">
                            {{option.subjectName}}
                        </option>
                    </select>
                    <div ng-show="formCtrl.showRequriedSubjectError" style="color:red">Please Select Subject</div>
                    <div ng-show="formCtrl.showDuplicateSubjectError" style="color:red">Already Selected</div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <button ng-click="formCtrl.addSubject()">Add</button>
                </div>
                </div>
                <div class="subject-display-box">
                    <div class="row" ng-repeat="subj in formCtrl.subjectsToTeach" >
                        <div class="col-md-4">{{subj.board.boardName}}</div>
                        <div class="col-md-2">{{subj.field.fieldName}}</div>
                        <div class="col-md-2">{{subj.class.className}}</div>
                        <div class="col-md-2">{{subj.subject.subjectName}}</div>
                        <div class="col-md-2">
                            <button ng-click="formCtrl.deleteSubject($index)">delete</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="number">Day</label>
                    <select class="form-control" ng-model="formCtrl.selectedDay">
                        <option ng-value="0" ng-if="formCtrl.selectedDay == 0" selected="selected">Select Day</option>
                        <option ng-repeat="day in formCtrl.days" ng-value="day">
                            {{day.value}}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="number">From</label>
                    <input type='time' name="time" ng-model="formCtrl.fromTime" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="number">To</label>
                    <input type='time' ng-model="formCtrl.toTime" class="form-control">
                </div>
                <div class="col-md-12">
                    <button ng-click="formCtrl.addTime()">Add</button>
                </div>
                <div class="row">
                    <div  ng-repeat="timeSlot in formCtrl.timeSlots">
                        <div class="col-md-4">{{timeSlot.day.value}}</div>
                        <div class="col-md-3"><span ng-if="timeSlot.fromTime.hour<10">0</span>{{timeSlot.fromTime.hour}}:<span ng-if="timeSlot.fromTime.min<10">0</span>{{timeSlot.fromTime.min}}</div>
                        <div class="col-md-3"><span ng-if="timeSlot.toTime.hour<10">0</span>{{timeSlot.toTime.hour}}:<span ng-if="timeSlot.toTime.min<10">0</span>{{timeSlot.toTime.min}}</div>
                        <div class="col-md-2">
                            <button ng-click="formCtrl.deleteTimeSlot($index)">delete</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="address">Address*</label>
                    <textarea class="form-control" id="address" rows="3" ng-model="formCtrl.address"></textarea>
                </div>
                <div class="row">
                    <div class=" form-group form-inline col-md-12">
                        <label for="inlineRadio1">Physically Challenged* :</label>
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" ng-model="formCtrl.physical"> Yes
                        <input type="radio" name="inlineRadioOptions" sid="inlineRadio2" value="2" ng-model="formCtrl.physical" ng-checked="true"> No
                    </div>
                </div>
                <div ng-if="formCtrl.physical==1" class="form-group col-md-12">
                    <label for="pref_location">Prefered Locations (seprate by comma)</label>
                    <input type="text" id="pref_location" class="form-control" ng-model="formCtrl.prefLocation">
                </div>
                <div class="form-group">
                    <label for="upload_resume">Upload Resume</label>
                    <input class="file" id="file_upload" type="file" style="display:none" onChange="angular.element(this).scope().formCtrl.onFileSelect(this)">
                    <div class="input-group" id="upload_resume">
                        <div id="file_name_box" class="form-control">{{formCtrl.selectedFileName}}
                            <span ng-show="formCtrl.selectedFileName" class="glyphicon glyphicon-remove" ng-click="formCtrl.removeFile()"></span></div>
                        <div class="input-group-btn">
                            <button ng-show="formCtrl.selectedFileName" class="btn btn-toolbar" ng-click="formCtrl.uploadFile()">
                                Upload
                            </button>
                            <button class="btn btn-primary" ng-click="formCtrl.clickFileUpload()">
                                Browse File</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <script src="<% asset('external/angularjs/angular.min.js') %>"></script>
    <script src="<% asset('external/angular-messages/angular-messages.min.js') %>"></script>
    <script src="<% asset('external/angularboostrap/ui-bootstrap-tpls-2.5.0.min.js') %>"></script>
    <script src="<% asset('external/jQuery-Multiple-Select-Plugin-For-Bootstrap-Bootstrap-Multiselect/dist/js/bootstrap-multiselect.js') %>"></script>
    <script src="<% asset('AngularApp/Modules/teacherApp.js') %>"></script>
</body>

</html>
