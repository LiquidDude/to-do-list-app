
angular.module('todoApp', ["ui.sortable"])
    .controller('todoController', function($scope, $http) {

        $scope.tasks = [];
        $scope.IsVisible = false;

        $scope.add = function(){
        	$scope.tasks.push({'title':$scope.newtask, 'done':false});
        	$scope.newtask = "";
        }

        $scope.delete = function() {
    		$scope.tasks.splice(this.$index, 1);
		}

		$scope.todoSortable = {
		    containment : "parent",
		    cursor : "move",
		    tolerance : "pointer"
   		}

   		$scope.save = function() {

   			var request = $http({
			    method: 'POST',
			    url: 'ajax/save-list.php',
			    data: $scope.tasks
			});

			request.then(function (response) {
			    console.log(response.data);
			    $scope.ShowHideSucc();
			}, function (error) {
        		console.log(error.data);
    		});
		
		}

		$scope.load = function() {

   			var request = $http({
			    method: 'POST',
			    url: 'ajax/get-list.php'
			});

			request.then(function (response) {
				$scope.tasks = response.data;
			    console.log(response.data);
			}, function (error) {
        		console.log(error.data);
    		});
		
		}

        $scope.ShowHideSucc = function() {
            $scope.IsVisible = $scope.IsVisible ? false : true;
        }

        $scope.load();

});