
// New Script //
// Main Angular Application
var App = angular.module("CwApp", []);
// Master Angular Controller
App.controller('cwMasterCtrl', function($scope){
 


$scope.ContentTitle = '';
$scope.ContentBanner = '';
$scope.contentList = [
    {
        title: '',
        img: '',
        date: '',
	    text: '',
	    url: '',
	    price: '',
	    venu: ''
	},
]
  setTimeout(function(){} , 1000);








});

function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
      e.preventDefault();
  e.returnValue = false;
}
