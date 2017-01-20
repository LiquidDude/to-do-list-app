<!DOCTYPE html>
<html lang="en" ng-app="todoApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>To Do List</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome core CSS -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css" media="all" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Core JS -->
    <script type="text/javascript" src="js/lib/jquery.3.1.0.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery-ui.1.12.1.min.js"></script>
    <script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/angular/angular.min.js"></script>
    <script type="text/javascript" src="js/angular/sortable.js"></script>

    <!-- Custom JS -->
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/app.js"></script>

  </head>

  <body>

    <section class="todo-app" ng-controller="todoController">

      <header>

        <h1>To Do List</h1>

          <form id="addForm" name="addForm" class="form-signin" ng-submit="add()">

              <div class="input-group">
                <input type="text" name="newtask" ng-model="newtask" class="form-control" placeholder="New task..." required />
                <span class="input-group-btn">
                  <button form="addForm" class="btn btn-default btn-add" type="submit">Add task</button>
                </span>
              </div><!-- /input-group -->

            </div>

          </form>

      </header>


      <section class="main">

        <ul id="draggableList" class="list-group" ui-sortable="todoSortable" ng-model="tasks">

          <li ng-repeat="task in tasks track by $index" class="list-group-item">
            <div class="input-group">
              <span class="input-group-addon">
                <input type="checkbox" ng-model="task.done">
              </span> 
              <label class="form-control list-item-handle" ng-class="{'completed':task.done}">{{task.title}}</label>
              <span class="input-group-addon">
                <i ng-click="delete()" class="fa fa-times btn-delete text-danger" aria-hidden="true"></i>
              </span>
            </div><!-- /input-group -->
          </li>

        </ul>

      </section>

      <footer>

        <button type="button" class="btn btn-success" ng-click="save()">Save List</button>

        <div class="alert alert-success alert-saved" role="alert" ng-show="IsVisible">
          <span>List saved successfully!</span> 
          <div class="float-wrap">
            <i ng-click="ShowHideSucc()" class="fa fa-times btn-delete" aria-hidden="true"></i>
          </div>
        </div>

      </footer>

    </section>

  </body>

</html>
