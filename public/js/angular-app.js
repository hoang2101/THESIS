var app = angular.module('MyApp',['ngMaterial']);
app.controller('AccountCtrl', function($scope, $mdDialog,$mdMedia, $mdToast){
 $scope.status = '  ';
 $scope.showLogin = function(ev) {
    $mdDialog.show({
      controller: DialogController,
      templateUrl: 'dialog.login.html',
      parent: angular.element(document.body),
      targetEvent: ev,
      clickOutsideToClose:false,
      fullscreen: false
    })
    .then(function(answer) {
      $scope.status = 'You said the information was "' + answer + '".';
    }, function() {
      $scope.status = 'You cancelled the dialog.';
    });
  };
 
 $scope.showRegister = function(ev) {
     $mdDialog.show({
      controller: DialogController,
      templateUrl: 'dialog.login',
      parent: angular.element(document.body),
      targetEvent: ev,
      clickOutsideToClose:true,
      fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
    })
    .then(function(answer) {
      $scope.status = 'You said the information was "' + answer + '".';
    }, function() {
      $scope.status = 'You cancelled the dialog.';
    });
  };

function DialogController($scope, $mdDialog) {
    $scope.hide = function() {
      $mdDialog.hide();
    };

    $scope.cancel = function() {
      $mdDialog.cancel();
    };

    $scope.answer = function(answer) {
      $mdDialog.hide(answer);
    };
    // $scope.login = function () {
    //    $mdDialog.hide({ username: this.username, password: this.password });
    // };
  }

});