<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">Todo</a>

    

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            <?php if(Auth::check()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/create">New Todo</a>
                </li>
                <?php if(!isset($delete) && !isset($new) && !isset($show)): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="deleteTodo()">Delete</a>
                    </li>



                <li>
                    <div class="dropdown show">

                        <a class="nav-link btn dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort Project by
                        </a>
                        <div class="dropdown-content">
                            <a class="dropdown-item" href="/?offset=-1">All</a>
                            <a class="dropdown-item" href="/sortByType">Type</a>
                            <a class="dropdown-item" href="/sortByCurrMonth">Current Month</a>
                            <a class="dropdown-item" href="/sortByComp">Complete</a>
                            <a class="dropdown-item" href="/sortByInComp">Incomplete</a>
                            <a class="dropdown-item" href="/sortByClosed">Closed</a>
                            <a class="dropdown-item" href="/sortByOpen">Open</a>
                            <a class="dropdown-item" href="/sortByCompC">Complete closed</a>
                            <a class="dropdown-item" href="/sortByInCompC">Incomplete closed</a>
                        </div>
                    </div>
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
             <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            <?php endif; ?>

        </ul>
        <form class="form-inline my-2 my-lg-0" method="get"
              action="/login">
        >
            <button class="btn btn-outline-success my-2 my-sm-0"
                    type="submit"
                    onClick="preventLink(event, <?php echo e(Auth::check()); ?>)"
            >
                <?php echo e(Auth::check()? title_case(Auth::User()->name) : "Login"); ?>

            </button>
        </form>

    </div>
</nav>