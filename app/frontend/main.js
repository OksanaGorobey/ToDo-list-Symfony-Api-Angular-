// специфический синтаксис angular. В html пишется через тире, а в js camelCase.
const app = angular.module('app', ['ngSanitize']);

app.controller('epicsCtrl', function( $http, $scope, $compile ) {
    let color_header = ['primary', 'info', 'rose', 'success', 'warning'];
    $http
        .get('http://localhost:8080/api/epic/list')
        .then(
            function( response ) {
                response.data.forEach(
                    function(el) {
                        el.color = $scope.getColor();
                    }
                );

                $scope.epics = response.data;
            },
            function( error ){
                console.log('error');
            });

    $scope.getEpics = () => $scope.epics;

    $scope.getColor = () => color_header[ Math.floor( Math.random() * color_header.length) ];

    $scope.getListTasks = function( id )
    {
        $http
            .get('http://localhost:8080/api/' + id + '/task/list')
            .then(
                function( response ) {
                    $scope.tasks = response.data;
                    const $elem =  angular.element( document.querySelector( "#list"+id ) );

                    let output = angular.element(
                         "<table class=\"table\">" +
                            "<tbody>" +
                                "<tr ng-repeat='task in tasks' ng-show='tasks.length' >" +
                                    "<td>" +
                                        "<div class=\"form-check\">" +
                                            "<label class=\"form-check-label\">" +
                                                "<input class=\"form-check-input\" type=\"checkbox\" value=\"\">" +
                                                "<span class=\"form-check-sign\">" +
                                                    "<span class=\"check\"></span>" +
                                                "</span>" +
                                            "</label>" +
                                        "</div>" +
                                    "</td>" +
                                    "<td>{{task.title}}</td>" +
                                    "<td class=\"td-actions text-right\">" +
                                        "<button type=\"button\" rel=\"tooltip\" title=\"Edit Task\" class=\"btn btn-primary btn-link btn-sm\">" +
                                            "<i class=\"material-icons\">edit</i>" +
                                        "</button>" +
                                        "<button type=\"button\" rel=\"tooltip\" title=\"Remove\" class=\"btn btn-danger btn-link btn-sm\">" +
                                            "<i class=\"material-icons\">close</i>" +
                                        "</button>" +
                                    "</td>" +
                                "</tr>" +
                            "</tbody>" +
                        "</table>"
                    );

                    $elem.empty();
                    var content = $compile(output)($scope);
                    $elem.replaceWith(content);


                },
                function( error ){
                    console.log('error');
                });
    }

    $scope.getTasks = () => $scope.tasks;

});

app.directive('epicsList', function () {
    return {
        templateUrl : 'epics.html',
        link: function (scope, element, attrs) {
            console.log('epicsList');
        }
    };
});
