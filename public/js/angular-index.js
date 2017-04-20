// app.controller('accountController',function	($scope,$http,$mdDialog, APT_URL){
// 	$scope.showLogin = function(ev) {
//     $mdDialog.show({
//       controller: DialogController,
//       templateUrl: 'dialog1.login',
//       parent: angular.element(document.body),
//       targetEvent: ev,
//       clickOutsideToClose:true,
//       fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
//     })
//     .then(function(answer) {
//       $scope.status = 'You said the information was "' + answer + '".';
//     }, function() {
//       $scope.status = 'You cancelled the dialog.';
//     });
//   };
//   $scope.showRegister = function(ev) {
//     $mdDialog.show({
//       controller: DialogController,
//       templateUrl: 'dialog.register',
//       parent: angular.element(document.body),
//       targetEvent: ev,
//       clickOutsideToClose:true,
//       fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
//     })
//     .then(function(answer) {
//       $scope.status = 'You said the information was "' + answer + '".';
//     }, function() {
//       $scope.status = 'You cancelled the dialog.';
//     });
//   };
// });