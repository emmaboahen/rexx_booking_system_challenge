<!-- Import Modal -->
<div id="dataImportModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div>
            <form action="./?activity=import" method="POST">

                <div style="margin-bottom: 20px;">
                    <label>Please Upload your JSON File</label>
                </div>

                <input type="file" id="importDataFileInput" name="filename" accept=".json" placeholder="Upload File" required size="60">
                <input type="hidden" name="dataToImport" id="impDataInput" value="">
                <div>
                    <input type="submit" value="Import" id="import_data_btn">
                </div>

            </form>
        </div>
    </div>

</div>