<?php
include("../booking_system/src/controllers/bookings.controller.php");
include("../booking_system/src/utils/version_compare.php");
$bookingsController = new BookingsController();
$ver_comp = new VersionCompare();

//if there isn't any data to import just fetch existing bookings
$bookings = isset($_GET["activity"])&&isset($_POST["dataToImport"])&&$_GET["activity"]=="import"&&$_POST["dataToImport"] ? $bookingsController->syncBookings($_POST["dataToImport"]) : $bookingsController->fetchBookings();
$bookings_count = $bookings ? count($bookings) : 0;
?>

<div>
    <div style="padding-left: 20px;padding-right: 20px;">
        <h1>Rexx Event Bookings</h1>
        <!-- <button class="button filter-button">Filter Bookings</button> -->
        <div class="tooltip">
            <button id="importBtn" class="button import-button">Import New Bookings</button>
            <span class="tooltiptext">Note: Importing new Bookings will overwrite old bookings on system</span>
        </div>
        <!-- <button id="reloadBtn" class="button import-button" onclick="location.reload(true);">Reload Data</button> -->
        <div id="filterComp">
            <form action="./" method="GET">
                <label>Filter By:</label>
                <select name="filterBy" required id="filterOptions" style="height: 28px;">
                    <option value=""></option>
                    <option value="employee_name">Employee Name</option>
                    <option value="event_name">Event Name</option>
                    <option value="event_date">Event Date</option>
                </select>
                <input id="textFilterInput" type="text" placeholder="" style="display: none;height:25px;" />
                <input id="dateFilterInput" type="date" placeholder="select Date" style="display: none;height:25px;" />
                <input type="hidden" name="val" id="filterValToSubmit">
                <button type="submit" id="filterBtn" style="display: none;height:25px">Submit</button>
            </form>
        </div>

        <table id="bookings">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Event Name</th>
                    <th>Participation Fee</th>
                    <th>Event Date</th>
                    <th>Time Zone</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($bookings_count == 0) { ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>No</td>
                        <td>Data</td>
                        <td></td>
                    </tr>
                <?php } else { ?>
                    <?php foreach ($bookings as $booking) { ?>
                        <tr>
                            <td><?= $booking["employee_name"] ?></td>
                            <td><?= $booking["employee_mail"] ?></td>
                            <td><?= $booking["event_name"] ?></td>
                            <td><?= $booking["participation_fee"] ?></td>
                            <td><?= $booking["event_date"] ?></td>
                            <td><?= $booking["version"] ? $ver_comp->getTimeZone($booking["version"]) : "" ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>