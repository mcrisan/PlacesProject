/*modal claim ownership button*/
homePage.controller('ModalDemoCtrl', function($scope, $modal, $log, $http){

    $scope.user = {
        name: "",
        email: "",
        tel: ""
    };

    $scope.open = function () {

        $modal.open({
            templateUrl: 'myModalContent.html',
            backdrop: true,
            windowClass: 'modal',
            controller: function ($scope, $modalInstance, $log, user) {
                $scope.user = user;
                $scope.submit = function (placeId) {
                    $scope.user.placeId = placeId;
                    $http({
                        method: 'POST',
                        url: 'ownershipdetails',
                        data: user,
                        dataType: 'json',
                        headers: {'Content-Type': 'application/json'}
                    }).success(function(data) {
                        var transform = function(data){
                            return $.param(data);
                        };
                        $modalInstance.dismiss('submit');

                    });
                };
                $scope.cancel = function () {
                    $modalInstance.dismiss('cancel');
                };
            },
            resolve: {
                user: function () {
                    return $scope.user;
                }
            }
        });

    };

});

