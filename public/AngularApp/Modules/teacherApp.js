(function() {
    console.log("here");
    angular.module("teacherApp", ['ui.bootstrap', "ngMessages"]);
    angular.module("teacherApp").controller("TeacherFormCtrl", TeacherFormCtrl);

    function TeacherFormCtrl($filter, $scope, $http) {
        var vm = this;
        var selectedSubjects = [];
        vm.selectedBoard = 0;
        vm.selectedField = 0;
        vm.selectedClass = 0;
        vm.selectedSubject = 0;
        vm.selectedDay = 0;
        // vm.selecctedDay = "Select Day",
        // vm.selectedTimeFrom = 0,
        // vm.selectedTimeTo = 0,
        vm.subjectsToTeach = [];
        vm.timeSlots = [];
        vm.fields = [];
        vm.classes = [];
        vm.subjects = [];
        vm.addSubject = addSubject;
        vm.onChangeBoard = onChangeBoard;
        vm.onChangeField = onChangeField;
        vm.onChangeClass = onChangeClass;
        vm.onChangeSubject = onChangeSubject;
        vm.deleteSubject = deleteSubject;
        vm.deleteTimeSlot = deleteTimeSlot;
        vm.addTime = addTime;
        vm.clickFileUpload = clickFileUpload;
        vm.onFileSelect = onFileSelect;
        vm.physical = 2;
        vm.selectedFileName = "";
        vm.emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        vm.mobileRegex = /^(\+\d{1,3}[- ]?)?\d{10}$/;
        vm.aadharRegex = /^\d{12}$/;


        vm.removeFile = removeFile;
        vm.uploadFile = uploadFile;
        // vm.getFields = getFields;
        // vm.getClasses = getClasses;
        // vm.getSubjects = getSubjects;
        vm.subjects = ["'ACCO Brands", "Accuquote", "Google"];
        vm.availableCompanies = ['ACCO Brands',
            'Accuquote',
            'Accuride Corporation',
            'Ace Hardware',
            'Google',
            'FaceBook',
            'Paypal',
            'Pramati',
            'Bennigan',
            'Berkshire Hathaway',
            'Berry Plastics',
            'Best Buy',
            'Carlisle Companies',
            'Carlson Companies',
            'Carlyle Group',
            'Denbury Resources',
            'Denny',
            'Dentsply',
            'Ebonite International',
            'EBSCO Industries',
            'EchoStar',
            'Gateway, Inc.',
            'Gatorade',
            'Home Shopping Network',
            'Honeywell',
        ];
        vm.days = [
            { "Id": 1, "value": "Monday" },
            { "Id": 2, "value": "Tuesday" },
            { "Id": 3, "value": "Wednesday" },
            { "Id": 4, "value": "Thursday" },
            { "Id": 5, "value": "Friday" },
            { "Id": 6, "value": "Saturday" },
            { "Id": 7, "value": "Sunday" },
            { "Id": 8, "value": "WeekDays (Mon-Fri)" },
            { "Id": 9, "value": "Weekends (Sat-Sun)" },
            { "Id": 10, "value": "Everyday" }
        ]
        vm.data = [{
            "boardID": 1,
            "boardName": "Maharashtra Board",
            "fields": [{
                "fieldID": 1,
                "fieldName": "Secondary",
                "classes": [{
                    "classID": 1,
                    "className": "8TH",
                    "subjects": [{
                        "subjectID": 1,
                        "subjectName": "MATHS"
                    }, {
                        "subjectID": 2,
                        "subjectName": "SCIENCE"
                    }, {
                        "subjectID": 3,
                        "subjectName": "SST"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }, {
                        "subjectID": 5,
                        "subjectName": "HINDI"
                    }, {
                        "subjectID": 6,
                        "subjectName": "MARATHI"
                    }]

                }, {
                    "classID": 2,
                    "className": "9TH",
                    "subjects": [{
                        "subjectID": 1,
                        "subjectName": "MATHS"
                    }, {
                        "subjectID": 2,
                        "subjectName": "SCIENCE"
                    }, {
                        "subjectID": 3,
                        "subjectName": "SST"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }, {
                        "subjectID": 5,
                        "subjectName": "HINDI"
                    }, {
                        "subjectID": 6,
                        "subjectName": "MARATHI"
                    }]

                }, {
                    "classID": 3,
                    "className": "10TH",
                    "subjects": [{
                        "subjectID": 1,
                        "subjectName": "MATHS"
                    }, {
                        "subjectID": 2,
                        "subjectName": "SCIENCE"
                    }, {
                        "subjectID": 3,
                        "subjectName": "SST"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }, {
                        "subjectID": 5,
                        "subjectName": "HINDI"
                    }, {
                        "subjectID": 6,
                        "subjectName": "MARATHI"
                    }]

                }]
            }, {
                "fieldID": 2,
                "fieldName": "SCIENCE",
                "classes": [{
                    "classID": 4,
                    "className": "FYJC(11TH)",
                    "subjects": [{
                        "subjectID": 7,
                        "subjectName": "PHYSICS"
                    }, {
                        "subjectID": 8,
                        "subjectName": "CHEMISTRY"
                    }, {
                        "subjectID": 9,
                        "subjectName": "MAaTHS"
                    }, {
                        "subjectID": 10,
                        "subjectName": "BIOLOGY"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }]

                }, {
                    "classID": 5,
                    "className": "SYJC(12th)",
                    "subjects": [{
                        "subjectID": 7,
                        "subjectName": "PHYSICS"
                    }, {
                        "subjectID": 8,
                        "subjectName": "CHEMISTRY"
                    }, {
                        "subjectID": 9,
                        "subjectName": "MAaTHS"
                    }, {
                        "subjectID": 10,
                        "subjectName": "BIOLOGY"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }]

                }]
            }]
        }, {
            "boardID": 2,
            "boardName": "CBSE Board",
            "fields": [{
                "fieldID": 1,
                "fieldName": "Secondary",
                "classes": [{
                    "classID": 1,
                    "className": "8TH",
                    "subjects": [{
                        "subjectID": 1,
                        "subjectName": "MATHS"
                    }, {
                        "subjectID": 2,
                        "subjectName": "SCIENCE"
                    }, {
                        "subjectID": 3,
                        "subjectName": "SST"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }, {
                        "subjectID": 5,
                        "subjectName": "HINDI"
                    }, {
                        "subjectID": 6,
                        "subjectName": "MARATHI"
                    }]

                }, {
                    "classID": 2,
                    "className": "9TH",
                    "subjects": [{
                        "subjectID": 1,
                        "subjectName": "MATHS"
                    }, {
                        "subjectID": 2,
                        "subjectName": "SCIENCE"
                    }, {
                        "subjectID": 3,
                        "subjectName": "SST"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }, {
                        "subjectID": 5,
                        "subjectName": "HINDI"
                    }, {
                        "subjectID": 6,
                        "subjectName": "MARATHI"
                    }]

                }, {
                    "classID": 3,
                    "className": "10TH",
                    "subjects": [{
                        "subjectID": 1,
                        "subjectName": "MATHS"
                    }, {
                        "subjectID": 2,
                        "subjectName": "SCIENCE"
                    }, {
                        "subjectID": 3,
                        "subjectName": "SST"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }, {
                        "subjectID": 5,
                        "subjectName": "HINDI"
                    }, {
                        "subjectID": 6,
                        "subjectName": "MARATHI"
                    }]

                }]
            }, {
                "fieldID": 2,
                "fieldName": "SCIENCE",
                "classes": [{
                    "classID": 4,
                    "className": "FYJC(11TH)",
                    "subjects": [{
                        "subjectID": 7,
                        "subjectName": "PHYSICS"
                    }, {
                        "subjectID": 8,
                        "subjectName": "CHEMISTRY"
                    }, {
                        "subjectID": 9,
                        "subjectName": "MAaTHS"
                    }, {
                        "subjectID": 10,
                        "subjectName": "BIOLOGY"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }]

                }, {
                    "classID": 5,
                    "className": "SYJC(12th)",
                    "subjects": [{
                        "subjectID": 7,
                        "subjectName": "PHYSICS"
                    }, {
                        "subjectID": 8,
                        "subjectName": "CHEMISTRY"
                    }, {
                        "subjectID": 9,
                        "subjectName": "MAaTHS"
                    }, {
                        "subjectID": 10,
                        "subjectName": "BIOLOGY"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }]

                }]
            }]
        }, {
            "boardID": 3,
            "boardName": "ICSE Board",
            "fields": [{
                "fieldID": 1,
                "fieldName": "Secondary",
                "classes": [{
                    "classID": 1,
                    "className": "8TH",
                    "subjects": [{
                        "subjectID": 1,
                        "subjectName": "MATHS"
                    }, {
                        "subjectID": 2,
                        "subjectName": "SCIENCE"
                    }, {
                        "subjectID": 3,
                        "subjectName": "SST"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }, {
                        "subjectID": 5,
                        "subjectName": "HINDI"
                    }, {
                        "subjectID": 6,
                        "subjectName": "MARATHI"
                    }]

                }, {
                    "classID": 2,
                    "className": "9TH",
                    "subjects": [{
                        "subjectID": 1,
                        "subjectName": "MATHS"
                    }, {
                        "subjectID": 2,
                        "subjectName": "SCIENCE"
                    }, {
                        "subjectID": 3,
                        "subjectName": "SST"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }, {
                        "subjectID": 5,
                        "subjectName": "HINDI"
                    }, {
                        "subjectID": 6,
                        "subjectName": "MARATHI"
                    }]

                }, {
                    "classID": 3,
                    "className": "10TH",
                    "subjects": [{
                        "subjectID": 1,
                        "subjectName": "MATHS"
                    }, {
                        "subjectID": 2,
                        "subjectName": "SCIENCE"
                    }, {
                        "subjectID": 3,
                        "subjectName": "SST"
                    }, {
                        "subjectID": 4,
                        "subjectName": "ENGLISH"
                    }, {
                        "subjectID": 5,
                        "subjectName": "HINDI"
                    }, {
                        "subjectID": 6,
                        "subjectName": "MARATHI"
                    }]

                }]
            }]
        }];

        console.log(vm.data);

        // function getFields() {
        //     var fields = [];
        //     if (vm.selectedBoard > 0) {
        //         // console.log(vm.selectedBoard);
        //         fields = $filter("filter")(vm.data, { "boardID": vm.selectedBoard })[0].fields;
        //         // console.log(fields);
        //     }
        //     return fields;
        // }

        // function getClasses() {
        //  console.log(vm.selectedField);
        //  console.log(vm.fields)
        //     var classes = [];
        //     if (vm.selectedField> 0) {
        //      console.log(vm.fields);
        //         var classes = $filter("filter")(vm.fields, {"fieldID": vm.selectedField })[0].classes;
        //         console.log(classes);
        //     }
        //     return classes;
        // }

        //  function getSubjects() {
        //     var subjects = [];
        //     console.log(vm.selectedClass);
        //     if (vm.selectedClass> 0) {
        //      console.log(vm.classes)
        //         var subjects = $filter("filter")(vm.classes, { "classID": vm.selectedClass})[0].subjects;
        //     }
        //     return subjects;
        // }

        function addSubject() {
            if (vm.selectedSubject.subjectID) {
                var subjectCombination = vm.selectedBoard.boardID + "" + vm.selectedField.fieldID + "" + vm.selectedClass.classID + "" + vm.selectedSubject.subjectID;
                if (selectedSubjects.indexOf(subjectCombination) == -1) {
                    console.log(subjectCombination);
                    var subjectObj = {
                        "board": {},
                        "field": {},
                        "class": {},
                        "subject": {},
                    };
                    subjectObj.board.boardID = vm.selectedBoard.boardID;
                    subjectObj.board.boardName = vm.selectedBoard.boardName;
                    subjectObj.field.fieldID = vm.selectedField.fieldID;
                    subjectObj.field.fieldName = vm.selectedField.fieldName;
                    subjectObj.class.classID = vm.selectedClass.classID;
                    subjectObj.class.className = vm.selectedClass.className;
                    subjectObj.subject.subjectID = vm.selectedSubject.subjectID;
                    subjectObj.subject.subjectName = vm.selectedSubject.subjectName;

                    vm.subjectsToTeach.push(subjectObj);
                    selectedSubjects.push(subjectCombination);
                } else {
                    vm.showRequriedSubjectError = false;
                    vm.showDuplicateSubjectError = true;
                }
            } else {
                vm.showRequriedSubjectError = true;
            }

        }

        function onChangeBoard() {
            vm.selectedField = 0;
            vm.selectedClass = 0;
            vm.selectedSubject = 0;
        }

        function onChangeField() {
            vm.selectedClass = 0;
            vm.selectedSubject = 0;
        }

        function onChangeClass() {
            vm.selectedSubject = 0;
        }

        function onChangeSubject() {
            vm.showRequriedSubjectError = false;
            vm.showDuplicateSubjectError = false;
        }

        function deleteSubject(index) {
            vm.subjectsToTeach.splice(index, 1);
        }

        function addTime() {
            console.log("here");
            var invalidTime = false;
            var timeObject = {};
            timeObject.fromTime = {};
            timeObject.toTime = {};
            timeObject.day = vm.selectedDay;
            timeObject.fromTime.hour = vm.fromTime.getHours();
            timeObject.fromTime.min = vm.fromTime.getMinutes();
            timeObject.toTime.hour = vm.toTime.getHours();
            timeObject.toTime.min = vm.toTime.getMinutes();
            console.log(timeObject)
            if (timeObject.toTime.hour > timeObject.fromTime.hour || (timeObject.toTime.hour == timeObject.fromTime.hour && timeObject.toTime.min > timeObject.fromTime.min)) {
                for (var i = 0; i < vm.timeSlots.length; i++) {
                    if (timeObject.day.Id == vm.timeSlots[i].day.Id) {
                        if ((timeObject.fromTime.hour < vm.timeSlots[i].fromTime.hour || (timeObject.fromTime.hour == vm.timeSlots[i].fromTime.hour && timeObject.fromTime.min < vm.timeSlots[i].fromTime.min)) && (timeObject.toTime.hour < vm.timeSlots[i].fromTime.hour || (timeObject.toTime.hour == vm.timeSlots[i].fromTime.hour && timeObject.toTime.min < vm.timeSlots[i].fromTime.min))) {} else if ((timeObject.fromTime.hour > vm.timeSlots[i].toTime.hour || (timeObject.fromTime.hour == vm.timeSlots[i].toTime.hour && timeObject.fromTime.min > vm.timeSlots[i].toTime.min)) && (timeObject.toTime.hour > vm.timeSlots[i].toTime.hour || (timeObject.toTime.hour == vm.timeSlots[i].toTime.hour && timeObject.toTime.min > vm.timeSlots[i].toTime.min))) {} else {
                            invalidTime = true;
                            break;
                        }
                    }
                }
                if (!invalidTime) {

                    vm.timeSlots.push(timeObject);
                } else {
                    console.log("invalid time");
                }
            } else {
                console.log("invalid time");
            }
        }

        function deleteTimeSlot(index) {
            vm.timeSlots.splice(index, 1);
        }

        function clickFileUpload() {
            console.log(vm.teacherForm);
            console.log(document.getElementById("file_upload"));
            document.getElementById("file_upload").click();
        }

        function onFileSelect(file) {
            console.log(vm.selectedFile);
            console.log(file.files[0]);
            console.log(file.files[0].name);
            vm.selectedFileName = file.files[0].name;
            vm.selectedFile = file.files[0];
            parser = new DOMParser();
            var object = parser.parseFromString(file, "text/html");
            console.log(object);
            console.log(vm.selectedFileName);
            if (!$scope.$$phase) {
                $scope.$digest()
            }
        }

        function removeFile() {
            vm.selectedFileName = "";
        }

        function uploadFile() {
            var csrf_token = document.getElementById("csrf_token").value;
            config = {
                transformRequest: angular.identity,
                headers: {
                    'X-CSRF-TOKEN': csrf_token,
                    'Content-Type': undefined
                },
            }
            var form_data = new FormData();
            form_data.enctype = "multipart/form-data";
            form_data.append('file', vm.selectedFile)
                // var objToSend={"userFile":}
            console.log(vm.selectedFile);
            // $http.post("/file/uploadfile", form_data, config).then(function(response) {

            // }, function(response) {

            // },function(response){
            //     console.log(response);
            // })

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log(xhttp.responseText);
                }
            };
            xhttp.upload.onprogress = function(e) {
                console.log(e);
                console.log((e.loaded / e.total) * 100);
            }
            xhttp.open("POST", "/file/uploadfile", true);
            xhttp.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            xhttp.send(form_data);


        }
    }


})();
