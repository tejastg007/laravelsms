<div class="search-stud">
    <div class="search-bar">
        <i class="fa fa-search search-icon"></i>
        <input type="text" class="search-input" id="search-input" oninput="searchstud(this.value)">
    </div>
</div>
<div class="search-panel-container ">
    <div class="search-results text-capitalize px-4 py-2">
        <button style="position:absolute;right:0px" class="btn btn-sm btn-danger mr-2"
            onclick='closesearch()'>close</button>
        <p class=""> click <button class=" btn btn-sm btn-primary p-1"> esc </button> to hide</p>
        <hr>
        <div class="search-result-container">

        </div>
    </div>
</div>
