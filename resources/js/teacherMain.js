scripts = [
    "../assets/angularjs/angularjs.min.js",
    "../AngularApp/Modules/teacherApp.js"
]

for (var i = 0; i < scripts.length; i++) {
    var element = document.createElement("script");
    element.src = scripts[i];
    document.body.appendChild(element);
}
