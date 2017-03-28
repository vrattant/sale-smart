<a onclick="openNewTab()">app2</a>

<a onclick="refreshExistingTab()">Refresh</a>


<script>
 var childWindow = "";
    var newTabUrl="https://www.google.co.in/?gfe_rd=cr&ei=EoeLV62tK-bA8gfe6J7YBw";

    function openNewTab(){
        childWindow = window.open(newTabUrl);
    }

    function refreshExistingTab(){
        childWindow.location.href=newTabUrl;
    }


</script>