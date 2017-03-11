(function() {
    console.log("here");
    angular.module("teacherApp", ['ui.bootstrap']);
    angular.module("teacherApp").controller("TeacherFormCtrl", TeacherFormCtrl);

    function TeacherFormCtrl($filter) {
        var vm = this;
        vm.selectedBoard = 0;
        vm.selectedField = 0;
        vm.selectedClass = 0;
        vm.selectedSubject = 0;
        vm.subjectsToTeach = [];
        vm.fields = [];
        vm.classes = [];
        vm.subjects = [];
        vm.addSubject = addSubject;
        vm.onChangeBoard = onChangeBoard;
        vm.onChangeField = onChangeField;
        vm.onChangeClass = onChangeClass;
        vm.deleteSubject = deleteSubject;
        // vm.getFields = getFields;
        // vm.getClasses = getClasses;
        // vm.getSubjects = getSubjects;
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
        // 	console.log(vm.selectedField);
        // 	console.log(vm.fields)
        //     var classes = [];
        //     if (vm.selectedField> 0) {
        //     	console.log(vm.fields);
        //         var classes = $filter("filter")(vm.fields, {"fieldID": vm.selectedField })[0].classes;
        //         console.log(classes);
        //     }
        //     return classes;
        // }

        //  function getSubjects() {
        //     var subjects = [];
        //     console.log(vm.selectedClass);
        //     if (vm.selectedClass> 0) {
        //     	console.log(vm.classes)
        //         var subjects = $filter("filter")(vm.classes, { "classID": vm.selectedClass})[0].subjects;
        //     }
        //     return subjects;
        // }

        function addSubject() {
            console.log("here");
            var subjectObj = {
                "board": {},
                "field": {},
                "class": {},
                "subject": {},
            };
            console.log(vm.selectedBoard.boardID)
            subjectObj.board.boardID = vm.selectedBoard.boardID;
            subjectObj.board.boardName = vm.selectedBoard.boardName;
            subjectObj.field.fieldID = vm.selectedField.fieldID;
            subjectObj.field.fieldName = vm.selectedField.fieldName;
            subjectObj.class.classID = vm.selectedClass.classID;
            subjectObj.class.className = vm.selectedClass.className;
            subjectObj.subject.subjectID = vm.selectedSubject.subjectID;
            subjectObj.subject.subjectName = vm.selectedSubject.subjectName;
            console.log(subjectObj);
            vm.subjectsToTeach.push(subjectObj);

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

        function deleteSubject(index) {
            vm.subjectsToTeach.splice(index, 1);
        }
    }


})();
