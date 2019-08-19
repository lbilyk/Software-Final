$(function () {
  let usernames = getLogbookUsernames();
  displayLogbookUsernames(usernames.sort());
    selectUsername();
});

function getLogbookUsernames() {

    let data = 'action=getLogbookUsernames';
    let dataType='json';
    return callToServer(data,dataType);
}

function displayLogbookUsernames(usernames) {

    let nameList = '';
    $.each(usernames, function(key, value){
        nameList += '<option value=' + key + '>' + value + '</option>';
    });
    $('#logbookUsernames').append(nameList);

}
function callToServer(data, dataType) {

    var response;
    $.ajax({
        url: 'server/serverRequests.php',
        type: 'POST',
        data: data,
        async: false,
        dataType: dataType,
        success: function (data) {
            response = data;
        },
    });
    return response;
}

function selectUsername() {

    let username = $('#logbookUsernames').find(":selected").text();
    $('#user').prop('value',username);

}

function validateLogin() {

    const NOT_EXIST = "not exist";
    const USER_ACCESS = "user";
    const GUEST_ACCESS = "guest";
    const INVALID = "invalid";
        let form = $('#loginForm');
        $.ajax({
            type: "POST",
            url: 'authorize.php',
            data: form.serialize(),
            success: function(data)
            {
                let response = data.trim();
                console.log(response);
                if(response == NOT_EXIST) {
                    alert("The username does not exist.");
                }
                else if(response == USER_ACCESS) {
                    alert("Granted User Access");
                    window.location ='logbook.php';
                }
                else if(response == GUEST_ACCESS) {
                    alert("Granted Guest Access");
                    window.location ='logbook.php';

                }
                else if(response == INVALID) {
                    alert("Invalid Password");
                }
                else {
                    alert("Server Error");
                }
            }
        });

}