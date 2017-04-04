<!DOCTYPE html>
<html>

<head>
    <link href="{!! URL::asset(bootstrap-3.3.7-dist/css/bootstrap.min.css) !!}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
</head>

<body ng-app="teacherApp" ng-controller="TeacherFormCtrl as formCtrl">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <form>
                <div class="form-group col-md-6">
                    <label for="firstname">First Name*</label>
                    <input class="form-control" type="text" id="firstname" placeholder="First Name" />
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Last Name*</label>
                    <input class="form-control" type="text" id="lastname" placeholder="Last Name" />
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email*</label>
                    <input class="form-control" type="email" id="email" placeholder="Email" />
                </div>
                <div class="form-group col-md-6">
                    <label for="number">Mobile Number*</label>
                    <input class="form-control" type="text" id="number" placeholder="Mobile Number" />
                </div>
                <div class="form-group col-md-6">
                    <label for="number">Date Of Birth*</label>
                    <input class="form-control" type="date" id="number" placeholder="Mobile Number" />
                </div>
                <div class="form-group col-md-6">
                    <label for="expreince">Exprience:</label>
                    <div class="col-md-12 input-group" id="expreince">
                        <div class="col-md-6 ">
                            <div class="input-group">
                                <input type="number" id="expreince_year" class="form-control" ng-model="formCtrl.experience.year" aria-describedby="year_text"><span class="input-group-addon" id="year_text"> year</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="number" id="expreince_month" class="form-control" ng-model="formCtrl.experience.month" aria-describedby="month_text"><span id="month_text" class="input-group-addon"> month</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="gender">Gender* :</label>
                    <div id="gender">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="aadhar">Aadhar Number*</label>
                    <input type="text" class="form-control" id="aadhar" ng-model="formCtrl.aadhar">
                </div>
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
                    <select class="form-control" ng-model="formCtrl.selectedSubject">
                        <option ng-value="0" ng-if="formCtrl.selectedSubject == 0" selected="selected">Select Subject</option>
                        <option ng-repeat="option in formCtrl.selectedClass.subjects" ng-value="option">
                            {{option.subjectName}}
                        </option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button ng-click="formCtrl.addSubject()">Add</button>
                </div>
                <div>
                    <div class="row" ng-repeat="subj in formCtrl.subjectsToTeach">
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
                <div>
                    <div class="row" ng-repeat="timeSlot in formCtrl.timeSlots">
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
                        <input type="radio" name="inlineRadioOptions"  id="inlineRadio1" value="1" ng-model="formCtrl.physical"> Yes
                        <input type="radio" name="inlineRadioOptions" sid="inlineRadio2" value="2" ng-model="formCtrl.physical" ng-checked="true"> No
                    </div>
                </div>
                <div ng-if="formCtrl.physical==1" class="form-group col-md-12" >
                    <label for="pref_location">Prefered Locations (seprate by comma)</label>
                    <input type="text" id="pref_location" class="form-control"   ng-model="formCtrl.prefLocation">
                </div>
                <div class="form-group">
                    <label for="upload_resume">Upload Resume</label>
                    <input class="file" id="file_upload" type="file" style="display:none" onChange="angular.element(this).scope().formCtrl.onFileSelect(this)"> 
                    <div class="input-group" id="upload_resume">
                        <div  id="file_name_box" class="form-control" >{{formCtrl.selectedFile}}
                        <span  ng-show="formCtrl.selectedFile" class="glyphicon glyphicon-remove" ng-click="formCtrl.removeFile()"></span></div>
                        <div class="input-group-btn">
                            <button ng-show="formCtrl.selectedFile" class="btn btn-toolbar" ng-click="formCtrl.clickFileUpload()">
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
        <script src="../assets/angularjs/angular.min.js"></script>
        <script src="../assets/angular-chips/angular-chips.min.js"></script>
        <script src="../assets/angularboostrap/ui-bootstrap-tpls-2.5.0.min.js"></script>
        <script src="../assets/jQuery-Multiple-Select-Plugin-For-Bootstrap-Bootstrap-Multiselect/dist/js/bootstrap-multiselect.js"></script>
        <script src="../AngularApp/Modules/teacherApp.js"></script>
</body>

</html>
