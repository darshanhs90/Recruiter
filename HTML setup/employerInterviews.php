<?php
session_start();
if(!isset($_SESSION['user'])) {
  header("location: login.php");
  exit();
}
/*else{
  echo $_SESSION['user_mail'];
}*/
?>
<!DOCTYPE HTML>
<!--
	Halcyonic by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html ng-app="myApp">
	<head>
		<title>Techruit App</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<style>
#todo-app {
    margin: 1em;
    text-align: center;
}

#todo-list,
#todo-stats {
    margin: 1em auto;
    text-align: left;
    width: 200px;
}

#todo-list {
    list-style: none;
    padding: 0;
}

#todo-stats,
.todo-clear { color: #777; }

.todo-clear { float: right; }

.todo-done .todo-content {
    color: #666;
    text-decoration: line-through;
}

.todo-edit,
.editing .todo-view { display: none; }

.editing .todo-edit { display: block; }

.todo-input {
    display: block;
    font-family: Helvetica, sans-serif;
    font-size: 20px;
    line-height: normal;
    margin: 5px auto 0;
    width: 200px;
}

.todo-item {
    border-bottom: 1px dotted #cfcfcf;
    font-size: 20px;
    padding: 6px;
    position: relative;
}

.todo-label {
    color: #444;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
}

.todo-remaining {
    color: #333;
    font-weight: bold;
}

.todo-remove {
    position: absolute;
    right: 0;
    top: 12px;
}

.todo-remove-icon {
    /*
    Delete icon courtesy of The Noun Project:
    http://thenounproject.com/noun/delete/
    */
    background: url(../assets/app/remove.png) no-repeat;
    display: block;
    height: 16px;
    opacity: 0.6;
    visibility: hidden;
    width: 23px;
}

.todo-remove:hover .todo-remove-icon { opacity: 1.0; }

.todo-hover .todo-remove-icon,
.todo-remove:focus .todo-remove-icon { visibility: visible; }

.editing .todo-remove-icon { visibility: hidden; }
</style>
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="public/lib/fullcalendar/fullcalendar.css">
    <script src='public/lib/jquery/dist/jquery.min.js'></script>
    <script src='public/lib/jquery-ui/ui/jquery-ui.js'></script>	
    <script src='public/lib/angular/angular.min.js'></script>
    <script src='public/lib/fullcalendar/fullcalendar.js'></script>
    <script src='public/lib/angular-ui-calendar/src/calendar.js'></script>
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<script src="js/employerInterviews.js"></script>		
	</head>
	<body class="subpage" ng-controller='MainController'>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">
						<div class="row">
							<div class="12u">

								<!-- Logo -->
									<h1><a href="#" id="logo">Techruit-Employer</a></h1>

								<!-- Nav -->
									<nav id="nav">
                                        <a href="employerPostLoginHome.php">Homepage</a>
                                        <a href="employerInterviews.php">Interview Dashboard</a>
                                        <a href="employerAnalyseProfiles.php">Analyse Profiles</a>
                                        <a href="employerShortlists.php">Shortlisted Students</a>
                                        <a href="employerProfile.php">My Profile</a>
                                        <a href="logout.php">Logout</a>
                                    </nav>

							</div>
						</div>
					</header>
				</div>

			<!-- Content -->
				<div id="content-wrapper">
					<div id="content">
						<div class="container">
							<div class="row">
								<div class="3u 12u(mobile)">

									<!-- Left Sidebar -->
										<section>
											<div id="todo-app">
    <label class="todo-label" for="new-todo">To Do List : Add here</label>
    <input type="text" id="new-todo" class="todo-input"
        placeholder="Apply for Google">

    <ul id="todo-list"></ul>
    <div id="todo-stats"></div>
</div>


<!-- asdasd -->
<!-- This template HTML will be used to render each todo item. -->
<script type="text/x-template" id="todo-item-template">
    <div class="todo-view">
        <input type="checkbox" class="todo-checkbox" {checked}>
        <span class="todo-content" tabindex="0">{text}</span>
    </div>

    <div class="todo-edit">
        <input type="text" class="todo-input" value="{text}">
    </div>

    <a href="#" class="todo-remove" title="Remove this task">
        <span class="todo-remove-icon"></span>
    </a>
</script>

<!-- This template HTML will be used to render the statistics at the bottom
     of the todo list. -->
<script type="text/x-template" id="todo-stats-template">
    <span class="todo-count">
        <span class="todo-remaining">{numRemaining}</span>
        <span class="todo-remaining-label">{remainingLabel}</span> left.
    </span>

    <a href="#" class="todo-clear">
        Clear <span class="todo-done">{numDone}</span>
        completed <span class="todo-done-label">{doneLabel}</span>
    </a>
</script>

<!-- Include YUI on the page if you haven't already. -->
<script src="http://yui.yahooapis.com/3.18.1/build/yui/yui-min.js"></script>

<script>
YUI().use('event-focus', 'json', 'model', 'model-list', 'view', function (Y) {
    var TodoAppView, TodoList, TodoModel, TodoView;

// -- Model --------------------------------------------------------------------

// The TodoModel class extends Y.Model and customizes it to use a localStorage
// sync provider (the source for that is further below) and to provide
// attributes and methods useful for todo items.

TodoModel = Y.TodoModel = Y.Base.create('todoModel', Y.Model, [], {
    // This tells the Model to use a localStorage sync provider (which we'll
    // create below) to save and load information about a todo item.
    sync: LocalStorageSync('todo'),

    // This method will toggle the `done` attribute from `true` to `false`, or
    // vice versa.
    toggleDone: function () {
        this.set('done', !this.get('done')).save();
    }
}, {
    ATTRS: {
        // Indicates whether or not this todo item has been completed.
        done: {value: false},

        // Contains the text of the todo item.
        text: {value: ''}
    }
});


// -- ModelList ----------------------------------------------------------------

// The TodoList class extends Y.ModelList and customizes it to hold a list of
// TodoModel instances, and to provide some convenience methods for getting
// information about the todo items in the list.

TodoList = Y.TodoList = Y.Base.create('todoList', Y.ModelList, [], {
    // This tells the list that it will hold instances of the TodoModel class.
    model: TodoModel,

    // This tells the list to use a localStorage sync provider (which we'll
    // create below) to load the list of todo items.
    sync: LocalStorageSync('todo'),

    // Returns an array of all models in this list with the `done` attribute
    // set to `true`.
    done: function () {
        return this.filter(function (model) {
            return model.get('done');
        });
    },

    // Returns an array of all models in this list with the `done` attribute
    // set to `false`.
    remaining: function () {
        return this.filter(function (model) {
            return !model.get('done');
        });
    }
});


// -- Todo App View ------------------------------------------------------------

// The TodoAppView class extends Y.View and customizes it to represent the
// main shell of the application, including the new item input field and the
// list of todo items.
//
// This class also takes care of initializing a TodoList instance and creating
// and rendering a TodoView instance for each todo item when the list is
// initially loaded or reset.

TodoAppView = Y.TodoAppView = Y.Base.create('todoAppView', Y.View, [], {
    // This is where we attach DOM events for the view. The `events` object is a
    // mapping of selectors to an object containing one or more events to attach
    // to the node(s) matching each selector.
    events: {
        // Handle <enter> keypresses on the "new todo" input field.
        '#new-todo': {keypress: 'createTodo'},

        // Clear all completed items from the list when the "Clear" link is
        // clicked.
        '.todo-clear': {click: 'clearDone'},

        // Add and remove hover states on todo items.
        '.todo-item': {
            mouseover: 'hoverOn',
            mouseout : 'hoverOff'
        }
    },

    // The `template` property is a convenience property for holding a
    // template for this view. In this case, we'll use it to store the
    // contents of the #todo-stats-template element, which will serve as the
    // template for the statistics displayed at the bottom of the list.
    template: Y.one('#todo-stats-template').getHTML(),

    // The initializer runs when a TodoAppView instance is created, and gives
    // us an opportunity to set up the view.
    initializer: function () {
        // Create a new TodoList instance to hold the todo items.
        var list = this.todoList = new TodoList();

        // Update the display when a new item is added to the list, or when the
        // entire list is reset.
        list.after('add', this.add, this);
        list.after('reset', this.reset, this);

        // Re-render the stats in the footer whenever an item is added, removed
        // or changed, or when the entire list is reset.
        list.after(['add', 'reset', 'remove', 'todoModel:doneChange'],
                this.render, this);

        // Load saved items from localStorage, if available.
        list.load();
    },

    // The render function is called whenever a todo item is added, removed, or
    // changed, thanks to the list event handler we attached in the initializer
    // above.
    render: function () {
        var todoList = this.todoList,
            stats    = this.get('container').one('#todo-stats'),
            numRemaining, numDone;

        // If there are no todo items, then clear the stats.
        if (todoList.isEmpty()) {
            stats.empty();
            return this;
        }

        // Figure out how many todo items are completed and how many remain.
        numDone      = todoList.done().length;
        numRemaining = todoList.remaining().length;

        // Update the statistics.
        stats.setHTML(Y.Lang.sub(this.template, {
            numDone       : numDone,
            numRemaining  : numRemaining,
            doneLabel     : numDone === 1 ? 'task' : 'tasks',
            remainingLabel: numRemaining === 1 ? 'task' : 'tasks'
        }));

        // If there are no completed todo items, don't show the "Clear
        // completed items" link.
        if (!numDone) {
            stats.one('.todo-clear').remove();
        }

        return this;
    },

    // -- Event Handlers -------------------------------------------------------

    // Creates a new TodoView instance and renders it into the list whenever a
    // todo item is added to the list.
    add: function (e) {
        var view = new TodoView({model: e.model});

        this.get('container').one('#todo-list').append(
            view.render().get('container')
        );
    },

    // Removes all finished todo items from the list.
    clearDone: function (e) {
        var done = this.todoList.done();

        e.preventDefault();

        // Remove all finished items from the list, but do it silently so as not
        // to re-render the app view after each item is removed.
        this.todoList.remove(done, {silent: true});

        // Destroy each removed TodoModel instance.
        Y.Array.each(done, function (todo) {
            // Passing {remove: true} to the todo model's `destroy()` method
            // tells it to delete itself from localStorage as well.
            todo.destroy({remove: true});
        });

        // Finally, re-render the app view.
        this.render();
    },

    // Creates a new todo item when the enter key is pressed in the new todo
    // input field.
    createTodo: function (e) {
        var inputNode, value;

        if (e.keyCode === 13) { // enter key
            inputNode = this.get('inputNode');
            value     = Y.Lang.trim(inputNode.get('value'));

            if (!value) { return; }

            // This tells the list to create a new TodoModel instance with the
            // specified text and automatically save it to localStorage in a
            // single step.
            this.todoList.create({text: value});

            inputNode.set('value', '');
        }
    },

    // Turns off the hover state on a todo item.
    hoverOff: function (e) {
        e.currentTarget.removeClass('todo-hover');
    },

    // Turns on the hover state on a todo item.
    hoverOn: function (e) {
        e.currentTarget.addClass('todo-hover');
    },

    // Creates and renders views for every todo item in the list when the entire
    // list is reset.
    reset: function (e) {
        var fragment = Y.one(Y.config.doc.createDocumentFragment());

        Y.Array.each(e.models, function (model) {
            var view = new TodoView({model: model});
            fragment.append(view.render().get('container'));
        });

        this.get('container').one('#todo-list').setHTML(fragment);
    }
}, {
    ATTRS: {
        // The container node is the wrapper for this view. All the view's
        // events will be delegated from the container. In this case, the
        // #todo-app node already exists on the page, so we don't need to create
        // it.
        container: {
            valueFn: function () {
                return '#todo-app';
            }
        },

        // This is a custom attribute that we'll use to hold a reference to the
        // "new todo" input field.
        inputNode: {
            valueFn: function () {
                return Y.one('#new-todo');
            }
        }
    }
});


// -- Todo item view -----------------------------------------------------------

// The TodoView class extends Y.View and customizes it to represent the content
// of a single todo item in the list. It also handles DOM events on the item to
// allow it to be edited and removed from the list.

TodoView = Y.TodoView = Y.Base.create('todoView', Y.View, [], {
    // This customizes the HTML used for this view's container node.
    containerTemplate: '<li class="todo-item"/>',

    // Delegated DOM events to handle this view's interactions.
    events: {
        // Toggle the "done" state of this todo item when the checkbox is
        // clicked.
        '.todo-checkbox': {click: 'toggleDone'},

        // When the text of this todo item is clicked or focused, switch to edit
        // mode to allow editing.
        '.todo-content': {
            click: 'edit',
            focus: 'edit'
        },

        // On the edit field, when enter is pressed or the field loses focus,
        // save the current value and switch out of edit mode.
        '.todo-input'   : {
            blur    : 'save',
            keypress: 'enter'
        },

        // When the remove icon is clicked, delete this todo item.
        '.todo-remove': {click: 'remove'}
    },

    // The template property holds the contents of the #todo-item-template
    // element, which will be used as the HTML template for each todo item.
    template: Y.one('#todo-item-template').getHTML(),

    initializer: function () {
        // The model property is set to a TodoModel instance by TodoAppView when
        // it instantiates this TodoView.
        var model = this.get('model');

        // Re-render this view when the model changes, and destroy this view
        // when the model is destroyed.
        model.after('change', this.render, this);

        model.after('destroy', function () {
            this.destroy({remove: true});
        }, this);
    },

    render: function () {
        var container = this.get('container'),
            model     = this.get('model'),
            done      = model.get('done');

        container.setHTML(Y.Lang.sub(this.template, {
            checked: done ? 'checked' : '',
            text   : model.getAsHTML('text')
        }));

        container[done ? 'addClass' : 'removeClass']('todo-done');
        this.set('inputNode', container.one('.todo-input'));

        return this;
    },

    // -- Event Handlers -------------------------------------------------------

    // Toggles this item into edit mode.
    edit: function () {
        this.get('container').addClass('editing');
        this.get('inputNode').focus();
    },

    // When the enter key is pressed, focus the new todo input field. This
    // causes a blur event on the current edit field, which calls the save()
    // handler below.
    enter: function (e) {
        if (e.keyCode === 13) { // enter key
            Y.one('#new-todo').focus();
        }
    },

    // Removes this item from the list.
    remove: function (e) {
        e.preventDefault();

        this.constructor.superclass.remove.call(this);
        this.get('model').destroy({'delete': true});
    },

    // Toggles this item out of edit mode and saves it.
    save: function () {
        this.get('container').removeClass('editing');
        this.get('model').set('text', this.get('inputNode').get('value')).save();
    },

    // Toggles the `done` state on this item's model.
    toggleDone: function () {
        this.get('model').toggleDone();
    }
});


// -- localStorage Sync Implementation -----------------------------------------

// This is a simple factory function that returns a `sync()` function that can
// be used as a sync layer for either a Model or a ModelList instance. The
// TodoModel and TodoList instances above use it to save and load items.

function LocalStorageSync(key) {
    var localStorage;

    if (!key) {
        Y.error('No storage key specified.');
    }

    if (Y.config.win.localStorage) {
        localStorage = Y.config.win.localStorage;
    }

    // Try to retrieve existing data from localStorage, if there is any.
    // Otherwise, initialize `data` to an empty object.
    var data = Y.JSON.parse((localStorage && localStorage.getItem(key)) || '{}');

    // Delete a model with the specified id.
    function destroy(id) {
        var modelHash;

        if ((modelHash = data[id])) {
            delete data[id];
            save();
        }

        return modelHash;
    }

    // Generate a unique id to assign to a newly-created model.
    function generateId() {
        var id = '',
            i  = 4;

        while (i--) {
            id += (((1 + Math.random()) * 0x10000) | 0)
                    .toString(16).substring(1);
        }

        return id;
    }

    // Loads a model with the specified id. This method is a little tricky,
    // since it handles loading for both individual models and for an entire
    // model list.
    //
    // If an id is specified, then it loads a single model. If no id is
    // specified then it loads an array of all models. This allows the same sync
    // layer to be used for both the TodoModel and TodoList classes.
    function get(id) {
        return id ? data[id] : Y.Object.values(data);
    }

    // Saves the entire `data` object to localStorage.
    function save() {
        localStorage && localStorage.setItem(key, Y.JSON.stringify(data));
    }

    // Sets the id attribute of the specified model (generating a new id if
    // necessary), then saves it to localStorage.
    function set(model) {
        var hash        = model.toJSON(),
            idAttribute = model.idAttribute;

        if (!Y.Lang.isValue(hash[idAttribute])) {
            hash[idAttribute] = generateId();
        }

        data[hash[idAttribute]] = hash;
        save();

        return hash;
    }

    // Returns a `sync()` function that can be used with either a Model or a
    // ModelList instance.
    return function (action, options, callback) {
        // `this` refers to the Model or ModelList instance to which this sync
        // method is attached.
        var isModel = Y.Model && this instanceof Y.Model;

        switch (action) {
        case 'create': // intentional fallthru
        case 'update':
            callback(null, set(this));
            return;

        case 'read':
            callback(null, get(isModel && this.get('id')));
            return;

        case 'delete':
            callback(null, destroy(isModel && this.get('id')));
            return;
        }
    };
}


// -- Start your engines! ------------------------------------------------------

// Finally, all we have to do is instantiate a new TodoAppView to set everything
// in motion and bring our todo list into existence.
new TodoAppView();

});
</script>









										</section>
										
								</div>
								<div class="6u 12u(mobile) important(mobile)">

									<!-- Main Content -->
										<section>
											<header>
												<h2>My Dashboard</h2>
											</header>
                                            <div ng-repeat="field in dashboardData track by $index"><!-- ng-repeat="" -->
                                            <p>
                                                <h4>Employer with email id {{field.remail}} of company {{field.cname}} has {{field.analysed}} you on {{field.ts}}</h4>
                                            </p>
                                            <hr/>
                                            </div>



										</section>

								</div>
								<div class="3u 12u(mobile)">

									<!-- Right Sidebar -->
										<section>
											<div class="calendar" ui-calendar="calOptions" ng-model="eventSources"></div>
										</section>
										

								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="8u 12u(mobile)">

								<!-- Links -->
									<section>
										<h2>Links to Important Stuff</h2>
										<div>
											<div class="row">
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
											</div>
										</div>
									</section>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Blurb -->
									<section>
										<h2>An Informative Text Blurb</h2>
										<p>
											Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse eu
											varius nibh. Suspendisse vitae magna eget odio amet mollis. Duis neque nisi,
											dapibus sed mattis quis, sed rutrum accumsan sed. Suspendisse eu varius nibh
											lorem ipsum amet dolor sit amet lorem ipsum consequat gravida justo mollis.
										</p>
									</section>

							</div>
						</div>
					</footer>
				</div>

			<!-- Copyright -->
				<div id="copyright">
					&copy; All rights reserved. | Techruit App
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>