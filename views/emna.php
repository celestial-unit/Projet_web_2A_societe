
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recommended Formations</title>

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./emna.css">
    
</head>
<body>

<div class="filter">
    <input id="all" type="checkbox" onchange="filterFormations()" />
    <!-- Les autres cases à cocher ici -->
    <input id="paid" type="checkbox" onchange="filterFormations1()" />
    <input id="free" type="checkbox" onchange="filterFormations2()"/>
    <input id="accelere" type="checkbox" onchange="filterFormations3()" />
    <input id="normale" type="checkbox" onchange="filterFormations4()"/>
    <input id="normalclasses" type="checkbox" onchange="filterFormations5()"/>
    <input id="nightclasses" type="checkbox" onchange="filterFormations6()" />
    <input id="weekendclasses" type="checkbox" onchange="filterFormations7()"/>
    <div class="filter__control">
        <h3>Filter</h3>
        <label class="filter__button" for="all">All</label>
        <!-- Les autres labels ici -->
        <label class="filter__button" for="paid">Paid</label>
        <label class="filter__button" for="free">Free</label>
        <label class="filter__button" for="accelere">Accelere</label>
        <label class="filter__button" for="normale">Normale</label>
        <label class="filter__button" for="normalclasses">Normal classes</label>
        <label class="filter__button" for="nightclasses">Night classes</label>
        <label class="filter__button" for="weekendclasses">Weekend classes</label>
    </div>
</div>

<div id="formations-list"></div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="emna.js"></script>
</body>
</html>
