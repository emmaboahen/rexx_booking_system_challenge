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
                <tr>
                    <td>Leandro Bußmann</td>
                    <td>leandro.bussmann@no-reply.rexx-systems.com</td>
                    <td>International PHP Conference</td>
                    <td>657.50</td>
                    <td>2019-10-21 10:00:00</td>
                    <td>Europe/Berlin</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>