(function () { //run these on document load
    var dateFilterInput = document.getElementById('dateFilterInput');
    var textFilterInput = document.getElementById('textFilterInput');
    var filterOptions = document.getElementById('filterOptions');
    var importDataFileInput = document.getElementById('importDataFileInput');
    var filterValToSubmit = document.getElementById('filterValToSubmit');
    var filterBtn = document.getElementById('filterBtn');


    function onUploadFileChange(event) {//on change event for data upload file input
        var reader = new FileReader();
        reader.onload = onReaderLoad;
        reader.readAsText(event.target.files[0]);
    }

    function onReaderLoad(event) {
        //console.log(event.target.result);
        var obj = JSON.parse(event.target.result);
        document.getElementById('impDataInput').setAttribute("value", JSON.stringify(obj));
    }


    function onChangeFilter() { //on change event for filter selection component
        localStorage.setItem("search_key",this.value);
        if (this.value == "event_date") {
            dateFilterInput.setAttribute("required",true);
            textFilterInput.removeAttribute("required");
            dateFilterInput.style.display = "inline";
            textFilterInput.style.display = "none";
            filterBtn.style.display = "inline";
        }else {
            this.value=="employee_name"?textFilterInput.setAttribute("placeholder","Enter Employee's name"):textFilterInput.setAttribute("placeholder","Enter Event name");
            dateFilterInput.removeAttribute("required");
            textFilterInput.setAttribute("required",true);
            dateFilterInput.style.display = "none";
            textFilterInput.style.display = "inline";
            filterBtn.style.display = "inline";
        }
    }

    function onTextFilterInputChange(event) { //on change event for text input change during filtering
        filterValToSubmit.setAttribute("value", this.value);
        localStorage.setItem("search_value",this.value);
    }

    function onDateFilterInputChange(event) { //on change event for date input change during filtering
        filterValToSubmit.setAttribute("value", this.value);
        localStorage.setItem("search_value",this.value);
    }
    
    dateFilterInput.addEventListener('change', onDateFilterInputChange);
    textFilterInput.addEventListener('change', onTextFilterInputChange);
    filterOptions.addEventListener('change', onChangeFilter);
    importDataFileInput.addEventListener('change', onUploadFileChange);

}());