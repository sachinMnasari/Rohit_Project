(function() {
    console.log("here");
    angular.module("StudentApp", ['ui.bootstrap']);
    angular.module("StudentApp").controller("StudentFormCtrl", StudentFormCtrl);

    function StudentFormCtrl($filter,$http) {
        var vm = this;
        vm.selectedBoard = 0;
        vm.selectedField = 0;
        vm.selectedClass = 0;
        vm.selectedSubject = [];
        vm.subjectsToTeach = [];
        vm.fields = [];
        vm.classes = [];
        vm.subjects = [];
        vm.data =[];
        vm.onChangeBoard = onChangeBoard;
        vm.onChangeField = onChangeField;
        vm.onChangeClass = onChangeClass;
        vm.deleteSubject = deleteSubject;
        $http.get('dropdowns/getAllCombs').then(function (response){
           vm.data = response.data;
           console.log(vm.data);
        });
        function onChangeBoard() {
            vm.selectedField = 0;
            vm.selectedClass = 0;
            vm.selectedSubject = 0;
            $('#dates-field2').multiselect('destroy');
             $(function() {
                $('#dates-field2').multiselect('destroy');
                $('#dates-field2').multiselect({
                    includeSelectAllOption: true
                });
            });

        }

        function onChangeField() {
            vm.selectedClass = 0;
            vm.selectedSubject = 0;
                $('#dates-field2').multiselect('destroy');
             $(function() {
                $('#dates-field2').multiselect('destroy');
                $('#dates-field2').multiselect({
                   includeSelectAllOption: true
                 });
            });                

        }

        function onChangeClass() {
            vm.selectedSubject = 0;
            // $("#multiselect").multiselect('dataprovider', vm.selectedClass.subjects);
               $(function() {
                $('#dates-field2').multiselect('destroy');
                $('#dates-field2').multiselect({
                    includeSelectAllOption: true
                });
            });
        }

        function deleteSubject(index) {
            vm.subjectsToTeach.splice(index, 1);
        }
        function abcd() {
            console.log("We are here");
            console.log(document.getElementById("dates-field2"));
        }
    }


})();
