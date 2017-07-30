/**
 * Created by sokthaitang on 7/17/17.
 */

function preventLink(event, login){
    if (login){
        alert("You are already login");
        event.preventDefault();
    }
}

function clearInput(){
    document.getElementById('desc').value="";
    document.getElementById('comment').value="";
    document.getElementById('projectName').value="";
    document.getElementById('newType').value="";
    document.getElementById('path').value="";
    setDefault();
}


function setDefault(){
    $('#type').val('--Select Type--');
}

function deleteTodo() {
    var check = false;
    var arrId = [];
    $("input:checkbox[name=delete]:checked").map(function () {
         arrId.push($(this).val());
        check = true;
    });

    if (!check) {
        return alert("please select a checkbox to delete");
    }else{
        var sure = confirm("are you sure you want to delete the selected projects?");
        if (sure)
            window.location.replace('/confirm/' + arrId);
    }

}

function selectType(event){
    var newType = document.getElementById('newType').value;
    var dropDown =  document.getElementById('type');
    var selectTypes = dropDown.options[dropDown.selectedIndex].value;

    if (!newType && (selectTypes === '--Select Type--')){
        event.preventDefault();
        return false;
    }


}
function disableNewType(){
    var type = document.getElementById('type').value;
    if (type === "--Select Type--"){
        document.getElementById("newType").disabled = false;
    }else{
        document.getElementById("newType").disabled = true;
    }
}





// get Latitude and Longitude of the current user with HTML build-in geo feature
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            var latLng = lat + ',' +lng;
            setCookie('latLng', latLng, 2);
            return latLng;
        });
    }else{
        return false;
    }
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}





